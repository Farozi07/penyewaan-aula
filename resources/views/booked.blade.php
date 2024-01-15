@extends('layouts.app')
@section('title', 'Daftar Pemesan')
@section('pagetitle', 'Daftar Pemesan')
@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Pemesan</a><br><br>
            <table id="responsive-datatable" class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $p)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $p->pemesan->no_ktp }}</td>
                            <td>{{ $p->pemesan->nama }}</td>
                            <td>{{ $p->status }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#detail-{{ $p->id }}">
                                    Detail
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="detail-{{ $p->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <h5 class="modal-title">Detail Pemesan</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><b>No KTP :</b> {{ $p->pemesan->no_ktp }}</p>
                                                <p><b>Nama :</b> {{ $p->pemesan->nama }}</p>
                                                <p><b>No Telp :</b> {{ $p->pemesan->telp }}</p>
                                                <p><b>Email :</b> {{ $p->pemesan->email }}</p>
                                                <p><b>Alamat :</b> {{ $p->pemesan->alamat }}</p>
                                                <p><b>Mulai :</b> {{ $p->start }}</p>
                                                <p><b>Selesai :</b> {{ $p->finish }}</p>
                                                <p><b>Keperluan :</b> {{ $p->keperluan }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Modal Info --}}

                                <!-- Button trigger modal -->
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#modalDelete-{{ $p->id }}">
                                    Arsipkan
                                </button>

                                <!-- Modal Body -->
                                <!-- If you want to close by clicking outside the modal, remove data-backdrop and data-keyboard -->
                                <div class="modal fade" id="modalDelete-{{ $p->pemesan->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin Mengarsipkan {{ $p->pemesan->nama }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.arsip', $p->pemesan->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Arsipkan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- Bootstrap 4 requires Popper.js and Bootstrap.js -->
                                <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
