@extends('layouts.index')


@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4 min-vh-100">
        <div class="mb-3">
            <button class="btn btn-success">
                <i class="fas fa-plus" style="color: #ffffff;"></i>
                <a href="{{ route('createKategori') }}" class="text-white">Kategori</a>
            </button>
            <button class="btn btn-success">
                <i class="fas fa-archive" style="color: #ffffff;"></i>
                <a href="{{ route('arsipKategori') }}" class="text-white">Arsip Kategori</a>
            </button>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Data Kategori</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $item => $kategori)
                                    <tr>
                                        <td>{{ $item + 1 }}</td>
                                        <td>{{ $kategori->nama_kategori }}</td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <button type="button" class="btn btn-success"><a
                                                        href="{{ route('editKategori', $kategori->id) }}"><i
                                                            class="fas fa-pen" style="color: #ffffff;"></i></a></button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteKategori{{ $kategori->id }}">
                                                    <i class="fas fa-backspace" style="color: #ffffff;"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->


    @foreach ($kategoris as $kategori)
        <div class="modal fade" id="deleteKategori{{ $kategori->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('destroyKategori', $kategori->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="staticBackdropLabel">Delete Data {{ $kategori->nama_kategori}}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus kategori? Setelah dihapus data akan berada ke arsip
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
