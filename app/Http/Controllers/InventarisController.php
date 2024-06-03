<?php

namespace App\Http\Controllers;
use App\Models\Inventaris;
use App\Models\Jenis;
use App\Models\Ruang;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\facades\db;

class InventarisController extends Controller
{
    public function index()
    {
        $judul = "Data Inventaris";
        $data = Inventaris::orderBy('id_inventaris', 'desc')->get();;
        foreach ($data as $d) {
            $d->d_keterangan = $d->keterangan > 0 ? 'Tersedia' : 'Tidak Tersedia';
        }
        return view('administrator.inventaris.tampil',  compact('judul', 'data'));
    }

    public function create()
    {
        $judul = "Tambah Data Inventaris";
        $data = Inventaris::all();
        $jenis = Jenis::all();
        $ruang = Ruang::all();
        $petugas = User::all();
        $detail_jenis = $jenis->map(function ($item) {
            return [
                'id_jenis' => $item->id_jenis,
                'kode_jenis' => $item->kode_jenis
            ];
        });
        $detail_ruang = $ruang->map(function ($item) {
            return [
                'id_ruang' => $item->id_ruang,
                'nama_ruang' => $item->nama_ruang
            ];
        });
        $level_id_3 = $petugas->filter(function ($item) {
            return $item->role_id === 3;
        });
        $detail_petugas = $level_id_3->map(function ($item) {
            return [
                'id' => $item->id,
                'nama' => $item->nama
            ];
        });
        foreach ($data as $d) {
            $d->keterangan = $d->keterangan >= 0 ? 'Tersedia' : 'Tidak Tersedia';
        }
        return view('administrator.inventaris.input', compact('judul', 'data', 'detail_jenis', 'detail_ruang', 'detail_petugas'));
    }

    public function store(Request $request)
    {
        DB::table('inventaris')->insert([
            'nama_barang'=> $request->nama_barang,
            'kondisi'=> $request->kondisi,
            'keterangan'=> $request->keterangan,
            'jumlah'=> $request->jumlah,
            'id_jenis'=> $request->id_jenis,
            'tanggal_register'=> $request->tanggal_register,
            'id_ruang'=> $request->id_ruang,
            'kode_inventaris'=> $request->kode_inventaris,
            'id_petugas'=> $request->id_petugas
        ]);
        return redirect('/inventaris');
    }
    public function show(string $id)
    {
        $judul = "Detail Data Inventaris";
        $inventaris = DB::table('inventaris')
        ->join('jenis', 'inventaris.id_jenis', '=', 'jenis.id_jenis')
        ->join('ruangs', 'inventaris.id_ruang', '=', 'ruangs.id_ruang')
        ->join('users', 'inventaris.id_petugas', '=', 'users.id')
        ->where('id_inventaris', $id)        
        ->select([
            'inventaris.*',
            'jenis.nama_jenis',
            'ruangs.nama_ruang',
            'users.nama',
        ])
        ->get();
        return view('administrator.inventaris.detail',['data' => $inventaris], compact('judul'));
    }

    public function edit(string $id)
    {
        $judul = "Edit Data Inventaris";
        $data = DB::table('inventaris')->where('id_inventaris',$id)->get();
        $jenis = Jenis::all();
        $ruang = Ruang::all();
        $petugas = User::all();
        $detail_jenis = $jenis->map(function ($item) {
            return [
                'id_jenis' => $item->id_jenis,
                'kode_jenis' => $item->kode_jenis
            ];
        });
        $detail_ruang = $ruang->map(function ($item) {
            return [
                'id_ruang' => $item->id_ruang,
                'nama_ruang' => $item->nama_ruang
            ];
        });
        $level_id_3 = $petugas->filter(function ($item) {
            return $item->role_id === 3;
        });
        $detail_petugas = $level_id_3->map(function ($item) {
            return [
                'id' => $item->id,
                'nama' => $item->nama
            ];
        });
        foreach ($data as $d) {
            $d->keterangan = $d->keterangan > 0 ? 'Tersedia' : 'Tidak Tersedia';
        }
        return view('administrator.inventaris.edit',['inventaris' => $data], compact('judul', 'detail_jenis', 'detail_ruang', 'detail_petugas'));
    }

    public function update(Request $request)
    {
        DB::table('inventaris')->where('id_inventaris',$request->id_inventaris)->update([
            'nama_barang'=> $request->nama_barang,
            'kondisi'=> $request->kondisi,
            'keterangan'=> $request->keterangan,
            'jumlah'=> $request->jumlah,
            'id_jenis'=> $request->id_jenis,
            'tanggal_register'=> $request->tanggal_register,
            'id_ruang'=> $request->id_ruang,
            'kode_inventaris'=> $request->kode_inventaris,
            'id_petugas'=> $request->id_petugas
        ]);
        return redirect('/inventaris');
    }

    public function destroy(string $id)
    {
        DB::table('inventaris')->where('id_inventaris',$id)->delete();
        
        return redirect('/inventaris');
    }
}
