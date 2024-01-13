<?php

namespace App\Http\Controllers;

use App\Models\ModelPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PhpOffice\PhpWord\TemplateProcessor;

class PengaduanController extends Controller
{

    public function show(): View
    {
        $user = Auth::guard('adminusers')->user();
        $dataPengaduan = ModelPengaduan::all()->toArray();
        return view('admin.kelola_pengaduan', ['username' => 'Robetson', 'data' => $dataPengaduan, "user" => $user]);
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
  
        return view('admin.pengaduan.detail_pengaduan', ['data' => $pengaduan]);
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
        $templateProcessor->setValue('nama_terlapor', $dataGabung->nama_terlapor);
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
        return response()->download($filename . '.docx')->deleteFileAfterSend(true);
    }
}
