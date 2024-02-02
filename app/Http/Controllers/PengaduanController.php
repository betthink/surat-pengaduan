<?php

namespace App\Http\Controllers;

use App\Models\ModelPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Mpdf\Mpdf;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;
use NcJoes\OfficeConverter\OfficeConverter;
// use PhpOffice\PhpWord\Writer\PDF;
// use Barryvdh\DomPDF\Facade\Pdf as PDF;
// use Barryvdh\DomPDF\Facade\Pdf;
// use PhpOffice\PhpWord\SimpleType\TblWidth;


class PengaduanController extends Controller
{

    public function show(): View
    {
        $user = Auth::guard('adminusers')->user();
        $dataPengaduan = ModelPengaduan::all()->toArray();
        return view('admin.pengaduan.index', ['data' => $dataPengaduan, "user" => $user, 'title'=> 'Pengaduan']);
        // return view('admin.kelola_pengaduan', ['data' => $dataPengaduan, "user" => $user]);
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required|string|max:255',
            'rujukan' => 'required|string|max:255',
            'hasil' => 'required|string|max:255',
            'rujukan' => 'required|string|max:255',
            'id' => 'required',
        ]);
        $pengaduan = ModelPengaduan::find($request->id);
        if (!$pengaduan) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }
        // update pengaduan
        $pengaduan->status = $request->status;
        $pengaduan->rujukan = $request->rujukan;
        $pengaduan->hasil = $request->hasil;
        // Simpan pengguna ke dalam database
        $result = $pengaduan->save();
        if ($result) {
            return redirect('/kelola-pengaduan')->with('success', 'Berhasil Mengubah data pengaduan');
        }
    }
    public function detail(int $id)
    {
        $pengaduan = ModelPengaduan::findOrFail($id);

        return view('admin.pengaduan.detail_pengaduan', ['data' => $pengaduan, 'title'=>'Unduh pengaduan']);
    }


    public function delete(int $id)
    {

        $pengaduan = ModelPengaduan::findOrFail($id)->delete();

        if ($pengaduan) {
            return redirect()->back()->with('success', 'Pengaduan telah dihapus');
        } else {
            return redirect()->back()->with('error', 'Pengaduan gagal dihapus');
        }
    }
    public function unduh(int $id)
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
        return response()->download($filename . '.docx');
    }
    public function unduhPdf(int $id)
    {
        // Temukan pengaduan berdasarkan ID
        $dataGabung = DB::table('laporan')
            ->join('masyarakat', 'laporan.id_user', '=', 'masyarakat.id')
            ->select('laporan.*', 'masyarakat.*')
            ->where('laporan.id', $id)
            ->first();

        if (!$dataGabung) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        // dd($dataGabung);
        // Tentukan path ke template Word
        $templatePath = public_path('word-template/new-template.docx');

        // Inisialisasi TemplateProcessor
        $templateProcessor = new TemplateProcessor($templatePath);
        $templateProcessor->setValue('nama', $dataGabung->nama);
        $templateProcessor->setValue('nik', $dataGabung->nik);
        $templateProcessor->setValue('alamat', $dataGabung->alamat);
        $templateProcessor->setValue('jeniskelamin', $dataGabung->jenis_kelamin);
        $templateProcessor->setValue('jeniskelaminterlapor', $dataGabung->jenis_kelamin);
        $templateProcessor->setValue(
            'nama_terlapor',
            $dataGabung->nama_terlapor
        );
        $templateProcessor->setValue('notelp', $dataGabung->nomor_telp);
        $templateProcessor->setValue('perkara', $dataGabung->judul_perkara);
        $templateProcessor->setValue('deskripsi', $dataGabung->deskripsi);
        $templateProcessor->setValue('status', $dataGabung->status);
        $templateProcessor->setValue('hasil', $dataGabung->hasil);
        $templateProcessor->setValue('tanggal', $dataGabung->tanggal);
        $templateProcessor->setValue('rujukan', $dataGabung->rujukan);

        // Tentukan path untuk menyimpan dokumen Word
        $filename = $dataGabung->judul_perkara;
        $wordFilename = $filename . '.docx';
        $wordPath = public_path('pdf/' . $wordFilename);
        $templateProcessor->saveAs($wordPath);

        // Konversi Word ke PDF menggunakan OfficeConverter
        $converter = new OfficeConverter($wordPath);
        $converter->convertTo(public_path('pdf/' . $filename . '.pdf'));

        // Hapus dokumen Word setelah dikonversi ke PDF (opsional)
        unlink($wordPath);

        // Buat respons unduhan untuk pengguna
        $response = response()->download(public_path('pdf/' . $filename . '.pdf'));
        return $response;die;
        // Konversi Word ke PDF menggunakan MPDF
        $phpword = IOFactory::load($wordPath, 'Word2007');
        // Inisialisasi objek MPDF dengan pengaturan ukuran kertas
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',  // Ganti dengan ukuran kertas yang diinginkan, misalnya 'Letter'
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 16,
            'margin_bottom' => 16,
            'margin_header' => 9,
            'margin_footer' => 9,
        ]);
        \PhpOffice\PhpWord\Settings::setPdfRendererPath(base_path('vendor/mpdf/mpdf'));
        \PhpOffice\PhpWord\Settings::setPdfRendererName(\PhpOffice\PhpWord\Settings::PDF_RENDERER_MPDF);
        $pdfWriter = IOFactory::createWriter($phpword, 'PDF');
        $pdfPath = public_path('pdf/' . $filename . '.pdf');
        $pdfWriter->save($pdfPath);

        // Hapus dokumen Word setelah dikonversi ke PDF (opsional)
        unlink($wordPath);

        // Buat respons unduhan untuk pengguna
        $response = response()->download($pdfPath)->deleteFileAfterSend();
        return $response;
    }


    public function table()
    {
        return view('admin.pengaduan.data_pengaduan');
    }
}
