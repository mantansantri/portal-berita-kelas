@extends('admin.parent')

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Category </h5>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door"></i></a></li>
                <li class="breadcrumb-item active"><a href="{{ route('category.index') }}">Category</a></li>
            </ol>
        </nav>

        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
        @endif
        <!-- Create Modal -->
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSiswaModal">
                <i class="bx bxs-plus-square"><span> Add Santri </span></i>
            </button>
            @include('admin.santri.create-modal')
        </div>
        <!-- End Create Modal-->
        <div class="card container mt-3">
            <!-- Table with stripped rows -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Birth</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($santri as $row )
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $row->name }}</th>
                            <th>{{ $row->phone }}</th>
                            <th>
                                <form action="{{ route('santri.destroy', $row->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        Delete
                                    </button>

                                </form>
                            </th>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            @endsection
