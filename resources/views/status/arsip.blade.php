@extends('layouts.index')


@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4 min-vh-100">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Data Arsip Status</h6>
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
                                @foreach ($status as $item => $status)
                                    <tr>
                                        <td>{{ $item + 1 }}</td>
                                        <td>{{ $status->nama_status }}</td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <button type="button" class="btn btn-success"><a href="{{ route('restoreStatus', $status->id)}}"><i class="fas fa-trash-restore" style="color: #ffffff;"></i></a></button>
                                                <form action="{{ route('destroyStatus', $status->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
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
@endsection
