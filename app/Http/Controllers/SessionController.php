<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function index(){
        echo '<ul>';
        echo '<li><a href=/buat-session>Buat Session</a></li>';
        echo '<li><a href=/akses-session>Akses Session</a></li>';
        echo '<li><a href=/hapus-session>Hapus Session</a></li>';
        echo '<li><a href=/flash-session>Flash Session</a></li>';
        echo '</ul>';
    }

    public function buatSession()
    {
        session(['hakAkses' => 'admin','nama' => 'Rajif']);
        return "Session sudah dibuat";
    }
    public function aksesSession(Request $request)
    {
        if (session()->has('hakAkses'))
        {
            echo "Session 'hakAkses' terdeteksi: ". session('hakAkses');
        }
    }
    public function hapusSession(Request $request)
    {
        // Menghapus 1 session menggunakan helper function
        session()->forget('hakAkses');

        // Menghapus 1 session menggunakan Request object'
        $request->session()->forget('hakAkses');

        // Menghapus 1 session menggunakan facade Session
        Session::forget('hakAkses');
        echo "Session hakAkses sudah dihapus";   
    }
    
    public function flashSession(Request $request)
    {
        // Membuat 1 flash session menggunakan helper function
        session()->flash('hakAkses','admin');
        // Membuat 1 flash session menggunakan Request object
        $request->session()->flash('hakAkses','admin');
        // Membuat 1 flash session menggunakan facade Session
        Session::flash('hakAkses','admin');
        echo "Flash session hakAkses sudah dibuat";
    }
}
