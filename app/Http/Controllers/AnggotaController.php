<?php

namespace App\Http\Controllers;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\facades\db;

class AnggotaController extends Controller
{
    public function index()
    {
        $judul = "Data Anggota";
        $data = Anggota::orderBy('id_anggota', 'desc')->get();
        return view('administrator.anggota.tampil', compact('judul', 'data'));
    }

    public function create()
    {
        $judul = "Tambah Data Anggota";
        return view('administrator.anggota.input', compact('judul'));
    }

    public function store(Request $request)
    {
        DB::table('anggotas')->insert([
            'nama_anggota'=> $request->nama_anggota,
            'no_anggota'=> $request->no_anggota,
            'alamat'=> $request->alamat
        ]);
        return redirect('/anggota');
    }

    public function edit(string $id)
    {
        $judul = "Edit Data Anggota";
        $data = DB::table('anggotas')->where('id_anggota',$id)->get();
        return view('administrator.anggota.edit',['anggota' => $data], compact('judul'));
    }

    public function update(Request $request)
    {
        DB::table('anggotas')->where('id_anggota',$request->id_anggota)->update([
            'nama_anggota'=> $request->nama_anggota,
            'no_anggota'=> $request->no_anggota,
            'alamat'=> $request->alamat
        ]);
        return redirect('/anggota');
    }

    public function destroy(string $id)
    {
        DB::table('anggotas')->where('id_anggota',$id)->delete();
        
        return redirect('/anggota');
    }
}
