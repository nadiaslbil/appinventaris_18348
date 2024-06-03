<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function dologin(Request $request) {
        // validasi
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            $user = auth()->user();
            if (auth()->user()->role_id === 1 ) {
                return redirect('/administrator'); // Or '/kepala_gudang' if separate dashboards exist
              } else if (auth()->user()->role_id === 2 ) {
                return redirect('/operator'); // Or '/kepala_gudang' if separate dashboards exist
              } else{
                return redirect('/kepalagudang');
              }    

        }
        return back()->with('error', 'username atau password salah');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
