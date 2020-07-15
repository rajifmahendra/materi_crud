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

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/daftar-karyawan')}}">
                            Daftar Karyawan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/tabel-karyawan')}}">
                            Tabel Karyawan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/blog-karyawan')}}">
                            Blog Karyawan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="my-4">Form Login</h2>
        <hr>
        @if(session()->has('pesan'))
            <div class="alert alert-info w-50">
                {{ session()->get('pesan') }}
            </div>
        @endif
        <form action="{{url('/login')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control w-50" id="username" name="username" value="{{ old('username') }}">
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary my-2">Login</button>
        </form>
    </div>

<script src="{{ asset('js/jquery-3.5.0.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>