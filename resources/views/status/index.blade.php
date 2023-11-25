@extends('layouts.index')


@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4 min-vh-100">
        <div class="mb-3">
            <button class="btn btn-success">
                <i class="fas fa-plus" style="color: #ffffff;"></i>
                <a href="{{ route('createStatus') }}" class="text-white">Status</a>
            </button>
            <button class="btn btn-success">
                <i class="fas fa-archive" style="color: #ffffff;"></i>
                <a href="{{ route('arsipStatus') }}" class="text-white">Arsip Status</a>
            </button>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Data Status</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statuses as $item => $status)
                                    <tr>
                                        <td>{{ $item + 1 }}</td>
                                        <td>{{ $status->nama_status }}</td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <button type="button" class="btn btn-success"><a
                                                        href="{{ route('editStatus', $status->id) }}"><i class="fas fa-pen"
                                                            style="color: #ffffff;"></i></a></button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteStatus{{ $status->id }}">
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


    @foreach ($statuses as $status1)
        <div class="modal fade" id="deleteStatus{{ $status1->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('destroyStatus', $status1->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="staticBackdropLabel">Delete Data {{$status1->nama_status}}</h1>
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
