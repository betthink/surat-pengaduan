<?php

namespace App\Http\Controllers;

use App\Models\ModelPengaduan;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
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
        return response()->download($filename . '.docx')->deleteFileAfterSend(true);
    }
    public function unduhPdf(int $id)
    {
        // Temukan data surat berdasarkan ID dari database
        $dataSurat = DB::table('laporan')
        ->join('masyarakat', 'laporan.id_user', '=', 'masyarakat.id')
        ->select('laporan.*', 'masyarakat.*') // Mengambil semua kolom dari tabel masyarakat
        ->where('laporan.id', $id) // Menambahkan kondisi where untuk ID pengaduan
            ->first();
        // $dataSurat = DB::table('laporan')->where('id', $id)->first();
        if (!$dataSurat) {
            return response()->json(['message' => 'Data surat tidak ditemukan'], 404);
        }

        // Baca template Word dari file
        $templatePath = public_path('word-template/templete.docx');
        $phpWord = IOFactory::load($templatePath);
      
        // Manipulasi dokumen Word sesuai data dari database
        $section = $phpWord->getSection(0);
        if ($section->getHeader()) {
            $header = $section->getHeader();
            $section->getHeader()->getParagraphs()[0]->getRuns()[0]->setText($dataSurat->judul_perkara);

        } 

        // ... Sesuaikan dengan manipulasi dokumen lainnya

        // Simpan dokumen Word sebagai file temporary
        $tempFilePath = tempnam(sys_get_temp_dir(), 'phpword');
        $phpWord->save($tempFilePath, 'Word2007');

        // Gunakan Snappy untuk mengonversi ke PDF
        $pdfContent = SnappyPdf::load($tempFilePath)->output();

        // Hapus file temporary
        unlink($tempFilePath);

        // Kirimkan respons dengan file PDF
        return response()->make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename=surat_' . $dataSurat->judul . '.pdf',
        ]);
    }
    // public function unduhPdf(int $id)
    // {
    //     // Temukan pengaduan berdasarkan ID
    //     $dataGabung = DB::table('laporan')
    //     ->join('masyarakat', 'laporan.id_user', '=', 'masyarakat.id')
    //     ->select('laporan.*', 'masyarakat.*')
    //     ->where('laporan.id', $id)
    //     ->first();

    //     if (!$dataGabung) {
    //         return response()->json(['message' => 'Data tidak ditemukan'], 404);
    //     }

    //     // Buat dokumen Word dengan PhpWord
    //     $phpWord = new PhpWord();
    //     $section = $phpWord->addSection();
    //     $section->addText('Nama: ' . $dataGabung->nama);
    //     $section->addText('NIK: ' . $dataGabung->nik);
    //     $section->addText('Alamat: ' . $dataGabung->alamat);
    //     // Tambahkan informasi lainnya sesuai kebutuhan

    //     // Simpan dokumen Word sebagai file temporary
    //     $tempFilePath = tempnam(sys_get_temp_dir(), 'phpword');
    //     $phpWord->save($tempFilePath, 'Word2007');

    //     // Gunakan Snappy untuk mengonversi ke PDF
    //     $pdfContent = SnappyPdf::loadView($tempFilePath)->output();

    //     // Hapus file temporary
    //     unlink($tempFilePath);

    //     // Kirimkan respons dengan file PDF
    //     return response()->make($pdfContent, 200, [
    //         'Content-Type' => 'application/pdf',
    //         'Content-Disposition' => 'inline; filename=laporan_' . $dataGabung->judul_perkara . '.pdf',
    //     ]);
    // }
  

}
