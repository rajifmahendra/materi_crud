@extends('layouts.master')
@section('title', 'Halaman Detail')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="pt-3 d-flex justify-content-end align-items-center">
                <h1 class="h2 mr-auto">Biodata {{$karyawan->nama}}</h1>
                <a href="{{ route('karyawans.edit',['karyawan' => $karyawan->id]) }}" class="btn btn-primary">
                    Edit
                </a>

                <form action="{{ route('karyawans.destroy',['karyawan'=>$karyawan->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-3">Hapus</button>
                </form>

            </div>
            <hr>
            @if(session()->has('pesan'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('pesan')}}
                </div>
            @endif
            <ul>
                <li>Nik: {{$karyawan->nik}} </li>
                <li>Nama: {{$karyawan->nama}} </li>
                <li>Nomer Hp : {{ $karyawan->telepon->nomer_telepon }}</li>
                <li>Jenis Kelamin: {{$karyawan->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki'}}</li>
                <li>Bagian: {{$karyawan->bagian->nama_bagian}} </li>
                <li>Alamat: {{$karyawan->alamat == '' ? 'N/A' : $karyawan->alamat}}
                <li> Hobi : 
                    @foreach ($karyawan->hobi as $item)
                    {{ "$item->nama_hobi," }}
                    @endforeach
                </li>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection