<?php

namespace App\Http\Controllers;

use App\Models\ModelPengaduan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;

class SuratController extends Controller
{
    //


    public function downloadPDF(int $id)
    {
        $data = ModelPengaduan::find($id);
        if (!$data) {
            abort(404); // Jika data tidak ditemukan, kirim respons 404 Not Found
        }
        $html = view('admin.pengaduan.view-surat', ['data' => $data])->render();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);

        return $mpdf->Output($data['judul_perkara'] . '.pdf', 'D');
    }

    public function show_surat()
    {

        $user = Auth::guard('publicusers')->user();
        $id_user = $user['id'];

        // Mengambil semua data pengaduan
        $all_surat = ModelPengaduan::all();

        // Memfilter data pengaduan berdasarkan id_user yang sesuai dengan id pengguna yang sedang masuk
        $selected = $all_surat->filter(function ($item) use ($id_user) {
            return $item['id_user'] == $id_user;
        })->toArray();
        // dd($selected);
        // Mengecek hasil filtering

        return view('public.surat.index', ['title' => 'Halaman lihat surat', 'user' => $user, 'list_surat' => $selected]);
    }
    public function detail_surat(int $id)
    {

        $pengaduan = ModelPengaduan::findOrFail($id);
        $user = Auth::guard('publicusers')->user();
        return view('public.surat.detail_surat', ['title' => 'Halaman detail surat', 'datas' => $pengaduan, 'user' => $user]);
    }
    public function public_unduh(int $id)
    {
        // Temukan pengaduan berdasarkan ID
        $dataGabung = DB::table('laporan')
        ->join('masyarakat', 'laporan.id_user', '=', 'masyarakat.id')
        ->select('laporan.*', 'masyarakat.*') // Mengambil semua kolom dari tabel masyarakat
        ->where('laporan.id', $id) // Menambahkan kondisi where untuk ID pengaduan
        ->first();
        // $pengaduan = ModelPengaduan::with('suratpengaduan')->findOrFail($id);
        if (!$dataGabung) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        // Tentukan path ke template Word
        $templatePath = public_path('word-template/templete.docx');

        // Inisialisasi TemplateProcessor
        $templateProcessor = new TemplateProcessor($templatePath);
        $templateProcessor->setValue('nama', $dataGabung->nama);
        $templateProcessor->setValue('nik', $dataGabung->nik);
        $templateProcessor->setValue('alamat', $dataGabung->alamat);
        $templateProcessor->setValue('jeniskelamin', $dataGabung->jenis_kelamin);
        $templateProcessor->setValue('nama_terlapor', $dataGabung->nama_terlapor);
        $templateProcessor->setValue('notelp', $dataGabung->nomor_telp);
        $templateProcessor->setValue('perkara', $dataGabung->judul_perkara);
        $templateProcessor->setValue('deskripsi', $dataGabung->deskripsi);
        $templateProcessor->setValue('status', $dataGabung->status);
        $templateProcessor->setValue('hasil', $dataGabung->hasil);
        $templateProcessor->setValue('tanggal', $dataGabung->tanggal);
        $templateProcessor->setValue('rujukan', $dataGabung->rujukan);
        // $outputPath = storage_path('app/public/word-template/output.docx');
        $filename = $dataGabung->judul_perkara;
        $templateProcessor->saveAs($filename . '.docx');
        // Buat respons unduhan untuk pengguna
        return response()->download($filename . '.docx')->deleteFileAfterSend();
    }
}
