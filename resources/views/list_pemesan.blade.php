@extends('layouts.app')
@section('title', 'Daftar Pemesan')
@section('pagetitle', 'Daftar Pemesan')
@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Pemesan</a><br><br>
            <form action="{{ route('admin.list') }}" method="get" class="form-inline">
                <div class="row">
                    <div class="col-md-6 col-xl-6">
                        <label for="search" class="mr-2">Cari Pemesan:</label>
                        <input type="text" name="search" class="form-control">
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <br>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>No Telpon</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pemesan as $p)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $p->no_ktp }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->telp }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->alamat }}</td>
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
                                                <p><b>No KTP :</b> {{ $p->no_ktp }}</p>
                                                <p><b>Nama :</b> {{ $p->nama }}</p>
                                                <p><b>No Telp :</b> {{ $p->telp }}</p>
                                                <p><b>Email :</b> {{ $p->email }}</p>
                                                <p><b>Alamat :</b> {{ $p->alamat }}</p>
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
                                    Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- If you want to close by clicking outside the modal, remove data-backdrop and data-keyboard -->
                                <div class="modal fade" id="modalDelete-{{ $p->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">Hapus</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus {{ $p->nama }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.delete', $p->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Delete</button>
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
                    @empty
                        <td colspan class="text-center"> Tidak ada Pemesan</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
