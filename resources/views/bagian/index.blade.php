@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="py-4 d-flex justify-content-end align-items-center">
                <h1 class="h2 mr-auto">Tabel Bagian</h1>
                @can('create', App\Bagian::class)
                <a href="{{url('/bagians/create')}}" class="btn btn-primary">
                    Tambah Bagian
                </a>
                @endcan
            </div>
            @if(session()->has('pesan'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('pesan')}}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Bagian</th>
                        <th>Nama Supervisior</th>
                        <th>Jumlah Bagian</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bagians as $bagian)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>
                                @can('view', $bagian)
                                <a href="{{ url('/bagians/'.$bagian->id) }}">
                                    {{$bagian->nama_bagian}}
                                </a>
                                @endcan
                                @cannot('view', $bagian)
                                    {{ $bagian->nama_bagian }}
                                @endcannot
                            </td>
                            <td>{{$bagian->nama_supervisior}}</td>
                            <td>{{$bagian->jumlah_bagian}}</td>
                        </tr>
                        @empty
                            <td colspan="6" class="text-center">Data Kosong</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection