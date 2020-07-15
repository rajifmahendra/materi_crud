@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-sm-8 col-md-6">
            <h1 class="h2 pt-4">Tambah Bagian</h1>
            <hr>
            <form action="{{url('/bagians')}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="nama_bagian">Nama Bagian</label>
                    <input type="text" class="form-control @error('nama_bagian') is-invalid @enderror" id="nama_bagian" name="nama_bagian" value="{{ old('nama_bagian') }}">
                    @error('nama_bagian')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_supervisior">Nama Supervisior</label>
                    <input type="text" class="form-control @error('nama_supervisior') is-invalid @enderror" id="nama_supervisior" name="nama_supervisior" value="{{ old('nama_supervisior') }}">
                    @error('nama_supervisior')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jumlah_bagian">Jumlah Bagian</label>
                    <input type="text" class="form-control @error('jumlah_bagian') is-invalid @enderror" id="jumlah_bagian" name="jumlah_bagian" value="{{ old('jumlah_bagian') }}">
                    @error('jumlah_bagian')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary my-2">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection