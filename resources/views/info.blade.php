<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <link href="{{ asset('/') }}assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <!-- third party css end -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <!-- Logo di sebelah kiri -->
        <a class="navbar-brand ms-2" href="{{ route('pemesan.index') }}">
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
            </ul>
        </div>

        <!-- Tombol Login di sebelah kanan -->
        <ul class="navbar-nav ml-auto me-2">
            <li class="nav-item">
                <a class="nav-link btn btn-primary text-white" style="" href="{{ route('login') }}">Login</a>
            </li>
        </ul>
    </nav>


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
