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
    
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Data Karyawan</h1>
                <hr>
                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>               
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ old('alamat') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" name="image" class="form-control" required>
                      </div>
                    <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>

<script src="/js/bootstrap.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>