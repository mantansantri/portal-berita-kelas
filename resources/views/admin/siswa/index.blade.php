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

        <div class="container d-flex justify-content-end">
            <!-- Create Modal -->
            <div class="d-flex justify-content-end">
                <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                    <i class="bx bxs-plus-square"><span> Add Siswa </span></i>
                </a>

                @include('admin.siswa.create-modal')
            </div>
            <!-- End Create Modal-->
        </div>

        <div class="card container mt-3">
            <!-- Table with stripped rows -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Num</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($siswa as $row )
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $row->name }}</th>
                            <th>{{ $row->phone }}</th>
                            <th>
                                <form action="{{ route('siswa.destroy', $row->id) }}" method="post" enctype="multipart/form-data">
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
            <!-- End Table with stripped rows -->
        </div>

    </div>
</div>
@endsection

