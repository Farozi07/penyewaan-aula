@extends('layouts.app')
@section('title', 'Arsip Pemesan')
@section('pagetitle', 'Arsip Pemesan')
@section('content')
    <div class="row">
        <div class="col-12">
            <table id="responsive-datatable" class="table table-striped">
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
                    @foreach ($data as $p)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $p->pemesan->no_ktp }}</td>
                            <td>{{ $p->pemesan->nama }}</td>
                            <td>{{ $p->pemesan->telp }}</td>
                            <td>{{ $p->pemesan->email }}</td>
                            <td>{{ $p->pemesan->alamat }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
