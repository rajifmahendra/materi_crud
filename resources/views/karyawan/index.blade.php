<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
</head>
<body>
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="py-4">
                    <h2>Tabel Data Karyawan</h2>
                    <a href="{{ route('karyawans.create') }}" class="btn btn-primary">
                        Tambah Karyawan
                    </a>
                </div>

                @if(session()->has('pesan'))
                    <div class="alert alert-success">
                        {{ session()->get('pesan') }}
                    </div>
                @endif

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Nomer Telepon</th>
                            <th>Jenis Kelamin</th>
                            <th>Bagian</th>
                            <th>Alamat</th>
                            <th>Hobi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($karyawans as $karyawan)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td><a href="{{ url('/karyawans/'.$karyawan->id) }}">{{$karyawan->nik}}</a></td>
                            <td>{{ $karyawan->nama }}</td>
                            <td>{{ $karyawan->telepon->nomer_telepon}}</td>
                            <td>{{$karyawan->jenis_kelamin == 'P'?'Perempuan':'Laki-laki'}}</td>
                            <td>{{$karyawan->bagian->nama_bagian}}</td>
                            <td>{{$karyawan->alamat == '' ? 'N/A' : $karyawan->alamat}}</td>
                            <td>
                                @foreach ($karyawan->hobi as $item)
                                    {{ "$item->nama_hobi," }}
                                @endforeach
                            </td>
                        </tr>
                        @empty
                            <td colspan="6" class="text-center">Data Kosong</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script src="/js/bootstrap.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>