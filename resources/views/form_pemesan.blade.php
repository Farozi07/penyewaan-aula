<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}/assets/images/favicon.ico">

    <!-- App css -->

    <link href="{{ asset('/') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="{{ asset('/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="{{ asset('/') }}assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Plugin css -->
    <link href="{{ asset('/') }}/assets/libs/fullcalendar/main.min.css" rel="stylesheet" type="text/css" />

    <!-- third party css -->
    <link href="{{ asset('/') }}assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('/') }}assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <!-- third party css end -->
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

    <footer class="mt-4 text-center bg-light py-3">
        <div class="container">
            &copy; {{ date('Y') }} Penyewaan Aula. All rights reserved.
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- Vendor -->
    <script src="{{ asset('/') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('/') }}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('/') }}/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="{{ asset('/') }}/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="{{ asset('/') }}/assets/libs/feather-icons/feather.min.js"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('/') }}assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="{{ asset('/') }}assets/js/pages/sweet-alerts.init.js"></script>

    <!-- plugin js -->
    <script src="{{ asset('/') }}/assets/libs/moment/min/moment.min.js"></script>
    <script src="{{ asset('/') }}/assets/libs/fullcalendar/main.min.js"></script>

    <!-- Calendar init -->
    <script src="{{ asset('/') }}/assets/js/pages/calendar.init.js"></script>

    <!-- third party js -->
    <script src="{{ asset('/') }}assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('/') }}assets/js/pages/datatables.init.js"></script>

    <!-- App js -->
    <script src="{{ asset('/') }}/assets/js/app.min.js"></script>
</body>

</html>
