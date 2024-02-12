<?php

namespace App\Http\Controllers;

use App\Models\ModelPengaduan;
use Illuminate\Support\Facades\Auth;

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
        $all_surat = ModelPengaduan::find($id_user);
        dd($all_surat);
        return view('public.surat.index', ['title' => 'Halaman lihat surat', 'user' => $user]);
    }
}
