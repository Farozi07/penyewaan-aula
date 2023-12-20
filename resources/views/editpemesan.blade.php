<!doctype html>
<html lang="en">

<head>
    <title>Edit Data Pemesan</title>
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
                <div class="col-md-8 col-xl-6">
                    <h1>Edit Handphone</h1>
                    <hr>

                    <form action="{{ route('pemesan.update', ['pemesan' => $pemesan->id]) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="no_ktp" class="form-label">No KTP</label>
                            <input type="text" id="no_ktp" name="no_ktp"
                                value="{{ old('no_ktp') ?? $pemesan->no_ktp }}"
                                class="form-control @error('no_ktp') is-invalid @enderror">
                            @error('no_ktp')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama</label>
                            <input type="text" id="nama" name="nama"
                                value="{{ old('nama') ?? $pemesan->nama }}"
                                class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="telp">No Telp</label>
                            <input type="text" id="telp" name="telp"
                                value="{{ old('telp') ?? $pemesan->telp }}"
                                class="form-control @error('telp') is-invalid @enderror">
                            @error('telp')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">No Telp</label>
                            <input type="email" id="email" name="email"
                                value="{{ old('email') ?? $pemesan->email }}"
                                class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="alamat">No Telp</label>
                            <input type="text" id="alamat" name="alamat"
                                value="{{ old('alamat') ?? $pemesan->alamat }}"
                                class="form-control @error('alamat') is-invalid @enderror">
                            @error('alamat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary"> Update</button>
                        <a href="{{ url()->previous() }}" class="btn btn-success"> Kembali</a>
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
