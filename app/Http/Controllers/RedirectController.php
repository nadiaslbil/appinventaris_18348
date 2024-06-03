<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek() {
        if (auth()->user()->role_id === 1 ) {
            // User is administrator or kepala gudang (role_id = 3)
            return redirect('/administrator'); // Or '/kepala_gudang' if separate dashboards exist
          } else if (auth()->user()->role_id === 2 ) {
            // User is administrator or kepala gudang (role_id = 3)
            return redirect('/operator'); // Or '/kepala_gudang' if separate dashboards exist
          } else{
            // User is operator or other role
            return redirect('/kepalagudang');
          }          
    }
}