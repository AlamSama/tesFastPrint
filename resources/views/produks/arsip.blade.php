@extends('layouts.index')


@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4 min-vh-100">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Arsip Data Produk</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Kategori Produk</th>
                                    <th scope="col">Status Produk</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $item => $produk)
                                    <tr>
                                        <td>{{ $item + 1 }}</td>
                                        <td>{{ $produk->nama_produk }}</td>
                                        <td>{{ $produk->harga }}</td>
                                        <td>{{ $produk->kategori->nama_kategori }}</td>
                                        <td>{{ $produk->status->nama_status }}</td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <button type="button" class="btn btn-success"><a
                                                        href="{{ route('restoreProduk', $produk->id) }}"><i class="fas fa-trash-restore" style="color: #ffffff;"></i></a></button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteProduk{{ $produk->id }}">
                                                    <i class="fas fa-trash" style="color: #ffffff;"></i>
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


    @foreach ($produks as $produk)
        <div class="modal fade" id="deleteProduk{{ $produk->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('destroyProduk', $produk->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="staticBackdropLabel">Delete Data
                                {{ $produk->nama_produk }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin ingin menghapus? Setelah dihapus data akan berada ke arsip
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
