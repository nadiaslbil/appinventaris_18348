<?php

namespace App\Http\Controllers;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\facades\db;

class JenisController extends Controller
{
    public function index()
    {
        $judul = "Data Jenis";
        $data = Jenis::orderBy('id_jenis', 'desc')->get();
        return view('administrator.jenis.tampil',  compact('judul', 'data'));
    }

    public function create()
    {
        $judul = "Tambah Data Jenis";
        return view('administrator.jenis.input', compact('judul'));
    }

    public function store(Request $request)
    {
        DB::table('jenis')->insert([
            'nama_jenis'=> $request->nama_jenis,
            'kode_jenis'=> $request->kode_jenis,
            'keterangan'=> $request->keterangan
        ]);
        return redirect('/jenis');
    }

    public function edit(string $id)
    {
        $judul = "Edit Data Jenis";
        $data = DB::table('jenis')->where('id_jenis',$id)->get();
        return view('administrator.jenis.edit',['jenis' => $data], compact('judul'));
    }

    public function update(Request $request)
    {
        DB::table('jenis')->where('id_jenis',$request->id_jenis)->update([
            'nama_jenis'=> $request->nama_jenis,
            'kode_jenis'=> $request->kode_jenis,
            'keterangan'=> $request->keterangan
        ]);
        return redirect('/jenis');
    }

    public function destroy(string $id)
    {
        DB::table('jenis')->where('id_jenis',$id)->delete();
        
        return redirect('/jenis');
    }
}
