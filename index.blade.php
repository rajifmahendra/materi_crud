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
                    <a href="{{ route('gallery.create') }}" class="btn btn-primary">
                        Tambah Karyawan
                    </a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($item as $items)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $items->nama }}</td>
                            <td>{{ $items->alamat }}</td>
                            <td>
                                <img src="{{ Storage::url($items->image) }}" alt="" style="width:150px">
                            </td>
                            <td>
                                <a href="{{ route('gallery.edit', $items->id) }}" class="btn btn-info">Edit</a>

                                <form class="d-inline" action="{{ route('gallery.destroy', $items->id) }}"
                                    method="post">
                                      @csrf
                                      @method('delete')
                                      <button class="btn btn-danger">
                                        Hapus
                                      </button>
                                </form>
                            </td>
                        <tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Data Kosong</td>
                            </tr>
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