@extends('layouts.app')
@section('title', 'Arsip Pemesan')
@section('pagetitle', 'Arsip Pemesan')
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.arsip') }}" method="get" class="form-inline">
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
            </form><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>No Telpon</th>
                        <th>Email</th>
                        <th>Alamat</th>
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
                        </tr>
                    @empty
                        <td colspan class="text-center"> Tidak ada Pemesan</td>
                    @endforelse
                </tbody>
            </table>
            {{ $pemesan->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
