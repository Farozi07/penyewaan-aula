<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Calendar | Adminto - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Plugin css -->
    <link href="assets/libs/fullcalendar/main.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->

    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<!-- body start -->

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid"
    data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default'
    data-sidebar-user='true'>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Logo di sebelah kiri -->
        <a class="navbar-brand" href="#">
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
                    <a class="nav-link" href="{{ route('pemesan.index') }}">Pesan</a>
                </li>
                <li class="nav-item {{ request()->is('sewa-aula') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('pemesan.index') }}">Informasi</a>
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

    <!-- Begin page -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page ms-0">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <button class="btn btn-lg font-16 btn-success w-100" id="btn-new-event"><i
                                            class="fa fa-plus me-1"></i> Create New</button>

                                    <div id="external-events">
                                        <br>
                                        <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                        <div class="external-event bg-primary" data-class="bg-primary">
                                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>New Theme
                                            Release
                                        </div>
                                        <div class="external-event bg-pink" data-class="bg-pink">
                                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>My Event
                                        </div>
                                        <div class="external-event bg-warning" data-class="bg-warning">
                                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Meet
                                            manager
                                        </div>
                                        <div class="external-event bg-purple" data-class="bg-danger">
                                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Create
                                            New theme
                                        </div>
                                    </div>

                                    <!-- checkbox -->
                                    <div class="form-check mt-3">
                                        <input type="checkbox" class="form-check-input" id="drop-remove">
                                        <label class="form-check-label" for="drop-remove">Remove after drop</label>
                                    </div>

                                </div> <!-- end col-->

                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">

                                            <div id="calendar"></div>

                                        </div> <!-- end card body-->
                                    </div> <!-- end card -->
                                </div> <!-- end col -->

                            </div> <!-- end row -->


                            <!-- Add New Event MODAL -->
                            <div class="modal fade" id="event-modal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                                            <button type="button" class="btn-close float-end"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                            <h5 class="modal-title" id="modal-title">Event</h5>
                                        </div>
                                        <div class="modal-body px-4 pb-4 pt-0">
                                            <form class="needs-validation" name="event-form" id="form-event"
                                                novalidate>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Event Name</label>
                                                            <input class="form-control"
                                                                placeholder="Insert Event Name" type="text"
                                                                name="title" id="event-title" required />
                                                            <div class="invalid-feedback">Please provide a valid event
                                                                name</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Category</label>
                                                            <select class="form-select" name="category"
                                                                id="event-category" required>
                                                                <option value="bg-danger" selected>Danger</option>
                                                                <option value="bg-success">Success</option>
                                                                <option value="bg-primary">Primary</option>
                                                                <option value="bg-info">Info</option>
                                                                <option value="bg-dark">Dark</option>
                                                                <option value="bg-warning">Warning</option>
                                                            </select>
                                                            <div class="invalid-feedback">Please select a valid event
                                                                category</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-6 col-4">
                                                        <button type="button" class="btn btn-danger"
                                                            id="btn-delete-event">Delete</button>
                                                    </div>
                                                    <div class="col-md-6 col-8 text-end">
                                                        <button type="button" class="btn btn-light me-1"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success"
                                                            id="btn-save-event">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div> <!-- end modal-content-->
                                </div> <!-- end modal dialog-->
                            </div>
                            <!-- end modal-->
                        </div>
                        <!-- end col-12 -->
                    </div> <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->
    <footer class="mt-4 text-center bg-light py-3"
        style="padding-top: 20px;
    padding-bottom: 20px;
    background-color: #f8f9fa;
    color: #343a40; ">
        <div class="container">
            &copy; {{ date('Y') }} Penyewaan Aula. All rights reserved.
        </div>
    </footer>




    <!-- Vendor -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>

    <!-- plugin js -->
    <script src="assets/libs/moment/min/moment.min.js"></script>
    <script src="assets/libs/fullcalendar/main.min.js"></script>

    <!-- Calendar init -->
    <script src="assets/js/pages/calendar.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>
