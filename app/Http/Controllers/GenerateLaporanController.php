<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenerateLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function laporanadmin()
    { 
        $judul = "Laporan Peminjaman";
        $data = Peminjaman::with('anggota')->get();$data = DB::table('peminjamen')
        ->join('anggotas', 'peminjamen.id_anggota', '=', 'anggotas.id_anggota')
        ->select('peminjamen.*', 'anggotas.nama_anggota')
        ->latest()
        ->get();           
        return view(' administrator.laporan.tampil',  compact('judul', 'data'));
    }

    public function datalaporan()
    { 
        $judul = "Laporan Peminjaman";
        $data = Peminjaman::with('anggota')->get();$data = DB::table('peminjamen')
        ->join('anggotas', 'peminjamen.id_anggota', '=', 'anggotas.id_anggota')
        ->select('peminjamen.*', 'anggotas.nama_anggota')
        ->latest()
        ->get();             
        return view('administrator.laporan.datalaporan',  compact('judul', 'data'));
    }

    public function generatePdfadmin()
    {
        $peminjaman = Peminjaman::with('anggota')->get();$peminjaman = DB::table('peminjamen')
        ->join('anggotas', 'peminjamen.id_anggota', '=', 'anggotas.id_anggota')
        ->select('peminjamen.*', 'anggotas.nama_anggota')
        ->latest()
        ->get();   

        $data = [
            'judul' => 'Data Peminjaman',
            'data' => $peminjaman, // Pastikan model Peminjaman sudah di-import
        ];

        $pdf = new Dompdf();
        $pdf->loadHtml(view('administrator.laporan.datalaporan', $data));

        // (Opsi) Atur ukuran dan orientasi halaman
        $pdf->setPaper('A4', 'potrait');

        // Render PDF
        $pdf->render();

        // Tampilkan PDF atau simpan ke file
        return $pdf->stream('laporan_peminjaman.pdf');
    }

    public function laporankp()
    { 
        $judul = "Laporan Peminjaman";
        $data = Peminjaman::with('anggota')->get();$data = DB::table('peminjamen')
        ->join('anggotas', 'peminjamen.id_anggota', '=', 'anggotas.id_anggota')
        ->select('peminjamen.*', 'anggotas.nama_anggota')
        ->latest()
        ->get();     
        return view('kepalagudang.laporan.tampil',  compact('judul', 'data'));
    }

    public function datalaporankp()
    { 
        $judul = "Laporan Peminjaman";
        $data = Peminjaman::with('anggota')->get();$data = DB::table('peminjamen')
        ->join('anggotas', 'peminjamen.id_anggota', '=', 'anggotas.id_anggota')
        ->select('peminjamen.*', 'anggotas.nama_anggota')
        ->latest()
        ->get();     
        return view('kepalagudang.laporan.datalaporan',  compact('judul', 'data'));
    }

    public function generatePdfkp()
    {
        $peminjaman = Peminjaman::with('anggota')->get();$peminjaman = DB::table('peminjamen')
        ->join('anggotas', 'peminjamen.id_anggota', '=', 'anggotas.id_anggota')
        ->select('peminjamen.*', 'anggotas.nama_anggota')
        ->latest()
        ->get();   

        $data = [
            'judul' => 'Data Peminjaman',
            'data' => $peminjaman, // Pastikan model Peminjaman sudah di-import
        ];

        $pdf = new Dompdf();
        $pdf->loadHtml(view('kepalagudang.laporan.datalaporan', $data));

        // (Opsi) Atur ukuran dan orientasi halaman
        $pdf->setPaper('A4', 'potrait');

        // Render PDF
        $pdf->render();

        // Tampilkan PDF atau simpan ke file
        return $pdf->stream('laporan_peminjaman.pdf');
    }
}
