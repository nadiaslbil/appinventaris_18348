<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;

class ValidasiPengembalianController extends Controller
{
    public function validasiadmin($id_peminjaman)
    {
        $peminjaman = Peminjaman::findOrFail($id_peminjaman);
        $peminjaman->status_peminjaman = 'Divalidasi';
        $peminjaman->save();
        return redirect()->back()->with('success', 'Status peminjaman berhasil divalidasi.');
    }

    public function pengembalianadmin()
    {
        $judul = "Peminjaman";
        $data = Peminjaman::with('anggota')->get();$data = DB::table('peminjamen')
        ->join('anggotas', 'peminjamen.id_anggota', '=', 'anggotas.id_anggota')
        ->where('peminjamen.status_peminjaman', 'Divalidasi') // Assuming 'peminjaman' table is involved
        ->select('peminjamen.*', 'anggotas.nama_anggota')
        ->latest()
        ->get();        
        return view('administrator.peminjaman.pengembalian', compact('judul', 'data'));
    }

    public function kembalikanadmin($id_peminjaman)
    {
        $peminjaman = Peminjaman::findOrFail($id_peminjaman);
        $peminjaman->tanggal_kembali = now();
        $peminjaman->status_peminjaman = 'Dikembalikan';
        $peminjaman->save();
        return redirect()->back()->with('success', 'Peminjaman berhasil dikembalikan.');
    }

    public function kembalikanoperator($id_peminjaman)
    {
        $peminjaman = Peminjaman::findOrFail($id_peminjaman);
        $peminjaman->tanggal_kembali = now();
        $peminjaman->status_peminjaman = 'Dikembalikan';
        $peminjaman->save();
        return redirect()->back()->with('success', 'Peminjaman berhasil dikembalikan.');
    }

    public function validasikp($id_peminjaman)
    {
        $peminjaman = Peminjaman::findOrFail($id_peminjaman);
        $peminjaman->status_peminjaman = 'Divalidasi';
        $peminjaman->save();
        return redirect()->back()->with('success', 'Status peminjaman berhasil divalidasi.');
    }
}
