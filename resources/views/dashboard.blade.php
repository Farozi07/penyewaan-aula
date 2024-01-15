@extends('layouts.app')
@section('title', 'Dashboard')
@section('pagetitle', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-3">
                    <button class="btn btn-lg font-16 btn-success w-100" id="btn-new-event"><i class="fa fa-plus me-1"></i>
                        Create New</button>

                    <div id="external-events">
                        <br>
                        <p class="text-muted">Drag and drop your event or click in the calendar</p>
                        <div class="external-event bg-primary" data-class="bg-primary">
                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>New Theme Release
                        </div>
                        <div class="external-event bg-pink" data-class="bg-pink">
                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>My Event
                        </div>
                        <div class="external-event bg-warning" data-class="bg-warning">
                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Meet manager
                        </div>
                        <div class="external-event bg-purple" data-class="bg-danger">
                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Create New theme
                        </div>
                    </div>

                    <!-- checkbox -->
                    <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" id="drop-remove">
                        <label class="form-check-label" for="drop-remove">Remove after drop</label>
                    </div>

                </div> <!-- end col-->

                <div class="col-lg-9">
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
                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            <h5 class="modal-title" id="modal-title">Event</h5>
                        </div>
                        <div class="modal-body px-4 pb-4 pt-0">
                            <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Event Name</label>
                                            <input class="form-control" placeholder="Insert Event Name" type="text"
                                                name="title" id="event-title" required />
                                            <div class="invalid-feedback">Please provide a valid event name</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Category</label>
                                            <select class="form-select" name="category" id="event-category" required>
                                                <option value="bg-danger" selected>Danger</option>
                                                <option value="bg-success">Success</option>
                                                <option value="bg-primary">Primary</option>
                                                <option value="bg-info">Info</option>
                                                <option value="bg-dark">Dark</option>
                                                <option value="bg-warning">Warning</option>
                                            </select>
                                            <div class="invalid-feedback">Please select a valid event category</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 col-4">
                                        <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                    </div>
                                    <div class="col-md-6 col-8 text-end">
                                        <button type="button" class="btn btn-light me-1"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
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
    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> &copy; Adminto theme by <a href="">Coderthemes</a>
                </div>
                <div class="col-md-6">
                    <div class="text-md-end footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

    </div>
@endsection
