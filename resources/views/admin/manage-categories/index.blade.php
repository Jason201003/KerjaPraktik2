@extends('layouts.admin')

@section('title', 'Manage Categories')

@section('content')
<script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

<script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('template/js/demo/datatables-demo.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<div class="container-fluid">
    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-2 text-gray-800">Data Kategori</h1> --}}

    <!-- DataTales Example -->
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h2>Daftar Kategori</h2>
            <a href="{{ route('AddCategory') }}" class="btn btn-success btn-sm ml-auto">Tambah Kategori Baru</a>
        </div>
        
        {{-- Flash message for success or failure --}}
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif

        <div class="mb-3">
            <form action="{{ route('categories.search') }}" method="GET" class="d-flex mt-3">
                <input type="text" name="query" class="form-control w-50 ml-3" placeholder="Search here">
                <button type="submit" class="btn btn-primary ml-2">Search</button>
                <a href="{{ route('manage-categories') }}" class="btn btn-secondary ml-3">Reset</a>
            </form>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Slug</th>
                            <th>Tanggal Ditambah</th>
                            <th>Tanggal Diupdate</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($all_categories) && count($all_categories) > 0)
                            @foreach ($all_categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td><a href="/edit-category/{{ $category->id }}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <td>
                                        <form action="{{ route('categories.delete', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                    <td><a href="/detail-category/{{ $category->id }}" class="btn btn-info btn-sm">Detail</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">Kategori tidak ditemukan!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
