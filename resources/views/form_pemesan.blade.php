<!doctype html>
<html lang="en">

<head>
    <title>Pemesanan AULA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container pt-4 bg-white">
            <div class="row">
                <div class="col-md-4 col-xl-4">
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
                            <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}"
                                class="form-control @error('alamat') is-invalid @enderror">
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
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
