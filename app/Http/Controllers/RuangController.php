<?php

namespace App\Http\Controllers;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\facades\db;

class RuangController extends Controller
{
    public function index()
    {
        $judul = "Data Ruang";
        $data = Ruang::orderBy('id_ruang', 'desc')->get();;
        return view('administrator.ruang.tampil',  compact('judul', 'data'));
    }

    public function create()
    {
        $judul = "Tambah Data Ruang";
        return view('administrator.ruang.input', compact('judul'));
    }

    public function store(Request $request)
    {
        DB::table('ruangs')->insert([
            'nama_ruang'=> $request->nama_ruang,
            'kode_ruang'=> $request->kode_ruang,
            'keterangan'=> $request->keterangan
        ]);
        return redirect('/ruang');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $judul = "Edit Data Petugas";
        $data = DB::table('ruangs')->where('id_ruang',$id)->get();
        return view('administrator.ruang.edit',['ruang' => $data], compact('judul'));
    }

    public function update(Request $request)
    {
        DB::table('ruangs')->where('id_ruang',$request->id_ruang)->update([
            'nama_ruang'=> $request->nama_ruang,
            'kode_ruang'=> $request->kode_ruang,
            'keterangan'=> $request->keterangan
        ]);
        return redirect('/ruang');
    }

    public function destroy(string $id)
    {
        DB::table('ruangs')->where('id_ruang',$id)->delete();
        
        return redirect('/ruang');
    }
}
