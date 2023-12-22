<!doctype html>
<html lang="en">

<head>
    <title>Data Pemesan</title>
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
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="py-4">
                        <h2>Daftar Pemesan</h2>
                    </div>
                    <a href="{{ route('pemesan.create') }}" class="btn btn-primary">Tambah Pemesan</a><br><br>
                    {{-- <a href="{{ route('phone.create') }}" class="btn btn-primary">Tambah HP</a><br><br> --}}
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
                                    {{-- <td>{{ $p->id }}</td> --}}
                                    <td>{{ $p->no_ktp }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->telp }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->alamat }}</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ url('/pemesan/edit/' . $p->id) }}" class="btn btn-warning">EDIT</a>
                                        {{-- <a href="{{ url('/phone/detail/' . $p->id) }}"
                                            class="btn btn-success">DETAIL</a> --}}
                                        <!-- Button trigger modal -->
                                        <!-- Modal trigger button -->
                                        <button type="button" class="btn btn-danger " data-bs-toggle="modal"
                                            data-bs-target="#modalDelete-{{ $p->id }}">
                                            Delete
                                        </button>
                                        <!-- Modal Body -->
                                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                        <div class="modal fade" id="modalDelete-{{ $p->id }}" tabindex="-1"
                                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                            aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalTitleId">Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus {{ $p->nama }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form action="{{ route('pemesan.delete', $p->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Optional: Place to the bottom of scripts -->
                                        <script>
                                            const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                                        </script>
                                    </td>
                                </tr>
                            @empty
                                <td colspan class="text-center"> Tidak ada Pemesan</td>
                            @endforelse
                        </tbody>
                    </table>
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
