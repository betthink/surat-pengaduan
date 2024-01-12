<?php

namespace App\Http\Controllers;

use App\Models\ModelPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $pengaduan = ModelPengaduan::findOrFail($id);
        // Tentukan path ke template Word
        $templatePath = public_path('word-template/index.docx');

        // Inisialisasi TemplateProcessor
        $templateProcessor = new TemplateProcessor($templatePath);
        $templateProcessor->setValue('nama_terlapor', $pengaduan->nama_terlapor);
        $templateProcessor->setValue('judul_perkara', $pengaduan->judul_perkara);
        $templateProcessor->setValue('deskripsi', $pengaduan->deskripsi);
        $templateProcessor->setValue('status', $pengaduan->status);
        $templateProcessor->setValue('hasil', $pengaduan->hasil);
        $templateProcessor->setValue('tanggal', $pengaduan->tanggal);
        $templateProcessor->setValue('rujukan', $pengaduan->rujukan);
        // $outputPath = storage_path('app/public/word-template/output.docx');
        $filename = $pengaduan->judul_perkara;
        $templateProcessor->saveAs($filename . '.docx');
        // Buat respons unduhan untuk pengguna
        return response()->download($filename . '.docx')->deleteFileAfterSend(true);
    }
}
