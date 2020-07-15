@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="pt-4 d-flex justify-content-end align-items-center">
                <h1 class="h2 mr-auto">Info Bagian {{$bagian->nama_bagian}}</h1>
                    <a href="{{url('/bagians/'.$bagian->id.'/edit')}}" class="btn btn-primary">Edit</a>
                    @can('delete', $bagian)
                    <form action="{{url('/bagians/'.$bagian->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger ml-3">Hapus</button>
                    </form>
                    @endcan
                </div>
                <hr>
                @if(session()->has('pesan'))
                    <div class="alert alert-success" role="alert">
                {{ session()->get('pesan')}}
            </div>
            @endif
            <ul>
                <li>Nama Bagian: {{$bagian->nama_bagian}} </li>
                <li>Nama Supervisior: {{$bagian->nama_supervisior}} </li>
                <li>Jumlah Bagian: {{$bagian->jumlah_bagian}} </li>
            </ul>
        </div>
    </div>
</div>

@endsection