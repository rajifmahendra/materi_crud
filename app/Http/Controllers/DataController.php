<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{

    public function daftarKaryawan(Request $request)
    {
        if(Auth::check())
        {
            echo "Selamat datang, ".$request->user()->name;
        }
        else
        {
            echo "Silahkan login terlebih dahulu";
        }
    }
    public function tabelKaryawan()
    {
        return view('halaman', ['judul' => 'Tabel Karyawan']);
    }
    public function blogKaryawan()
    {
        return view('halaman', ['judul' => 'Blog Karyawan']);
    }
}
