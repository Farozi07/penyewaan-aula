@extends('layouts.backend.app')
@section('title', 'Daftar Pemesan')
@section('pagetitle', '')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="py-4">
                <h2>Daftar Pemesan</h2>
            </div>
            <a href="{{ route('pemesan.create') }}" class="btn btn-primary">Tambah Pemesan</a><br><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        {{-- <th>ID</th> --}}
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
                            <td></td>
                            <td>
                                <a href=""class="btn btn-success">DETAIL</a>
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
                                                <form action="{{ route('pemesan.delete', $p->id) }}" method="post">
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
