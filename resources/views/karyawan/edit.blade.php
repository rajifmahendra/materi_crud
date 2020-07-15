@extends('layouts.master')
@section('title', 'Halaman Edit')
@section('content')
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit karyawan</h1>
            <hr>
            <form action="{{ route('karyawans.update', ['karyawan' => $karyawan->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') ?? $karyawan->nik }}">
                    @error('nim')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $karyawan->nama }}">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nomer_telepon">No Hp</label>
                    <input type="text" class="form-control @error('nomer_telepon') is-invalid @enderror" id="nomer_telepon" name="nomer_telepon" value="{{ old('nomer_telepon') ?? $karyawan->telepon->nomer_telepon }}">
                    @error('nomer_telepon')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="L" {{ (old('jenis_kelamin') ?? $karyawan->jenis_kelamin) == 'L' ? 'checked': '' }} >
                    <label class="form-check-label" for="laki_laki">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P" {{ (old('jenis_kelamin') ?? $karyawan->jenis_kelamin) == 'P' ? 'checked': '' }} >
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
                @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="bagian_id">Bagian</label>
                        <select class="form-control" name="bagian_id" id="bagian_id">
                        @foreach ($bagians as $bagian)
                            <option value="{{ $bagian->id }}" {{ (old('bagian_id') ?? $karyawan->bagian_id == $bagian->id) ? 'selected': '' }} > {{ $bagian->nama_bagian }} </option>
                        @endforeach
                    </select>
                        @error('bagian_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3" name="alamat">{{ old('alamat') ?? $karyawan->alamat}}</textarea>
                </div>
                <div class="form-group">
                    <label for="hobi">Pilih Hobi</label>
                    <select class="js-example-placeholder-multiple js-states form-control" name="hobi[]" multiple="multiple">
                        @foreach ($daftar_hobi as $tampil_hobi)
                            <option value="{{ $tampil_hobi->id }}">
                                {{ $tampil_hobi->nama_hobi }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Update</button>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('js')
<script>
    $(".js-example-placeholder-multiple").select2().val({!! json_encode($karyawan->hobi()->allRelatedIds() ) !!}).trigger('change');
</script>
@endsection