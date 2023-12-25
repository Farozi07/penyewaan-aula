@extends('layouts.frontend.app')
@section('title', 'Halaman Test')
@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-6">
            <h2>Gambar</h2>
            <hr>
            <img src="https://via.placeholder.com/800x400" alt="Gambar" class="img-fluid">
        </div>
        <div class="col-md-5 col-xl-5">
            <h2>Formulir Pemesanan</h2>
            <hr>
            <form action="{{ route('pemesan.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="no_ktp" class="form-label">No KTP</label>
                    <input type="text" id="no_ktp" name="no_ktp" value="{{ old('no_ktp') }}"
                        class="form-control @error('no_ktp') is-invalid @enderror">
                    @error('no_ktp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                        class="form-control @error('nama') is-invalid @enderror">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="telp">No Telp</label>
                    <input type="text" id="telp" name="telp" value="{{ old('telp') }}"
                        class="form-control @error('telp') is-invalid @enderror">
                    @error('telp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="start" class="form-label" id="start">Tanggal Mulai:</label>
                    <input type="date" class="form-control" id="start" name="start" required>
                </div>
                <div class="mb-3">
                    <label for="finish" class="form-label" id="start">Tanggal Selesai:</label>
                    <input type="date" class="form-control" id="finish" name="finish" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                    @error('alamat')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="aula" class="form-label">Pilih Aula:</label>
                    <select class="form-select" id="aula" name="aula" required>
                        <option value="" selected disabled>Pilih Aula</option>
                        @foreach ($aula as $a)
                            <option value="{{ $a->id }}">{{ $a->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="keperluan">Keperluan</label>
                    <input type="text" id="keperluan" name="keperluan" value="{{ old('keperluan') }}"
                        class="form-control @error('keperluan') is-invalid @enderror">
                    @error('keperluan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary"> Pesan Sekarang</button>
                <a href="{{ route('pemesan.index') }}" class="btn btn-success"> Kembali</a>
            </form>
        </div>

    </div>
@endsection
