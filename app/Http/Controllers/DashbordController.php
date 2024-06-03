<?php

namespace App\Http\Controllers;

class DashbordController extends Controller
{
    public function admin()
    {
        $title = "Dashboard";
        $isi = "Selamat datang di GUDANG PINTAR!";
        return view('administrator.dashboard', ['title' => $title, 'isi' => $isi]);
    }

    public function operator()
    {
        $title = "Dashboard";
        $isi = "Selamat datang di GUDANG PINTAR!";
        return view('operator.dashboard', ['title' => $title, 'isi' => $isi]);
    }

    public function kepalagudang()
    {
        $title = "Dashboard";
        $isi = "Selamat datang di GUDANG PINTAR!";
        return view('kepalagudang.dashboard', ['title' => $title, 'isi' => $isi]);
    }
}
