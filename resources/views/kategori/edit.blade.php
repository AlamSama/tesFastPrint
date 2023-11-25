@extends('layouts.index')


@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4 min-vh-100">
        <div class="row justify-content-center g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4 text-center">Update Kategori</h6>
                    <form action="{{ route('updateKategori', $kategori->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="namaKategori" name="nama_kategori" placeholder="" value="{{ old('nama_kategori') ? old('nama_kategori') : $kategori->nama_kategori }}">
                            <label for="namaKategori">Nama Kategori</label>
                            @error('nama_kategori')
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->
@endsection
