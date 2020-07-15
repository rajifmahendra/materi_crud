<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Telepon;
use App\Bagian;
use App\Hobi;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('karyawan.index',['karyawans' => $karyawans]);
    }

    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show',['karyawan' => $karyawan]);
    }

    public function create()
    {
        $bagians = Bagian::all();
        $daftar_hobi = Hobi::all();
        return view('karyawan.create', compact('bagians','daftar_hobi'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nik' => 'required|size:8|unique:karyawans',
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'bagian_id' => 'required',
            'alamat' => ''
        ]);
        $karyawan = Karyawan::create($validateData);
        $telepon = new Telepon;
        $telepon->nomer_telepon = $request->input('nomer_telepon');
        $karyawan->telepon()->save($telepon);
        $karyawan->hobi()->attach($request->hobi);
        $request->session()->flash('pesan',"Data {$validateData['nama']} berhasil disimpan");
        return redirect()->route('karyawans.index');
    }

    public function edit(Karyawan $karyawan){
        $daftar_hobi = Hobi::all();
        $bagians = Bagian::all();
        $karyawan->nomer_telepon = $karyawan->telepon->nomer_telepon;
        return view('karyawan.edit',[
            'karyawan' => $karyawan,
            'bagians' => $bagians,
            'daftar_hobi' => $daftar_hobi

        ]);
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $validateData = $request->validate([
            'nik' => 'required|size:8|unique:karyawans,nik,'.$karyawan->id,
            'nama'=> 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'bagian_id' => 'required',
            'alamat' => '',
        ]);
            $karyawan->update($validateData);
            $telepon = $karyawan->telepon;
            $telepon->nomer_telepon = $request->input('nomer_telepon');
            $karyawan->telepon()->save($telepon);
            $karyawan->hobi()->sync($request->hobi);
            return redirect()->route('karyawans.show',['karyawan' => $karyawan->id])->with('pesan',"Update data {$validateData['nama']} berhasil");
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawans.index')->with('pesan',"Hapus data $karyawan->nama berhasil");
    }
}
