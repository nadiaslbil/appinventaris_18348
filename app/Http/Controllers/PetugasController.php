<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\facades\db;

class PetugasController extends Controller
{
    public function index()
    {
        $judul = "Data Petugas";
        $data = User::with('role')->get();$data = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->select('users.*', 'roles.role_name')
        ->orderBy('users.id', 'desc')
        ->get();
        return view('administrator.petugas.tampil',compact('data','judul'));
    }

    public function create()
    {
        $judul = "Tambah Data Petugas";
        $level = Role::all();
        $data = $level->map(function ($item) {
            return [
                'id' => $item->id,
                'role_name' => $item->role_name
            ];
        });
        return view('administrator.petugas.input', compact('judul', 'data'));
    }

    public function store(Request $request)
    {
        DB::table('users')->insert([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);
        return redirect('/petugas');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $judul = "Edit Data Petugas";
        $data = DB::table('users')->where('id',$id)->get();
        $level = Role::all();
        $detail_level = $level->map(function ($item) {
            return [
                'id' => $item->id,
                'role_name' => $item->role_name
            ];
        });
        return view('administrator.petugas.edit',['users' => $data], compact('judul', 'detail_level'));
    }

    public function update(Request $request)
    {
        DB::table('users')->where('id',$request->id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);
        return redirect('/petugas');
    }

    public function destroy(string $id)
    {
        DB::table('users')->where('id',$id)->delete();
        
        return redirect('/petugas');
    }
}