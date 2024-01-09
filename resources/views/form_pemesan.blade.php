<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet'>
    <link
        href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Logo di sebelah kiri -->
        <a class="navbar-brand" href="/">
            <img src="https://bpsdm.kalbarprov.go.id/wp-content/uploads/2022/11/Group-13.png" alt="Logo"
                height="30">
            Penyewaan Aula
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Beranda</a>
                </li>
                <li class="nav-item {{ request()->is('sewa-aula') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('pemesan.create') }}">Pesan</a>
                </li>
                <li class="nav-item {{ request()->is('sewa-aula') ? 'active' : '' }}">
                    <a class="nav-link " href="">Informasi</a>
                </li>
                <!-- Tambahkan menu lain sesuai kebutuhan -->
            </ul>
        </div>

        <!-- Tombol Login di sebelah kanan -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link btn btn-primary text-white" style="" href="login.blade.php">Login</a>
            </li>
        </ul>
    </nav>

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
                            <option value="{{ $a->id }}">{{ $a->nama }}</option> @endforeach
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

<footer class="mt-4 text-center bg-light py-3">
    <div class="container">
        &copy; {{ date('Y') }} Penyewaan Aula. All rights reserved.
    </div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
</body>

</html>
