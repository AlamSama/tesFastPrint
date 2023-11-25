@extends('layouts.index')


@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4 min-vh-100">
        <div class="row justify-content-center g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4 text-center">Edit Status</h6>
                    <form action="{{ route('updateStatus', $status->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_status') is-invalid @enderror" id="namaStatus" name="nama_status" placeholder="" value="{{ old('nama_status') ? old('nama_status') : $status->nama_status }}">
                            <label for="namaStatus">Nama Status</label>
                            @error('nama_status')
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
