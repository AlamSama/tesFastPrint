@extends('layouts.index')


@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4 min-vh-100">
        <div class="row justify-content-center g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4 text-center">Tambah Produk</h6>
                    <form action="{{ route('storeProduk') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="namaProduk" name="nama_produk" placeholder="">
                            <label for="namaProduk">Nama Produk</label>
                            @error('nama_produk')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="">
                            <label for="harga">Harga</label>
                            @error('harga')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select @error('kategori_id') is-invalid @enderror" id="floatingSelectKategori" name="kategori_id"
                                aria-label="Floating label select example">
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectKategori">Katgeori Produk</label>
                            @error('kategori_id')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select @error('status_id') is-invalid @enderror" id="floatingSelectStatus" name="status_id"
                                aria-label="Floating label select example">
                                @foreach ($statues as $status)
                                    <option value="{{ $status->id }}">{{ $status->nama_status }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectStatus">Status Produk</label>
                            @error('status_id')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection
