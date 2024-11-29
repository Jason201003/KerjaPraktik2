@extends('layouts.admin')

@section('title', 'Manage Kamar')

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
    {{-- <h1 class="h3 mb-2 text-gray-800">Data Kamar</h1> --}}

    <!-- DataTales Example -->
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h2>Daftar Kamar</h2>
            <a href="{{ route('AddKamar') }}" class="btn btn-success btn-sm ml-auto">Tambah Kamar Baru</a>
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
            <form action="{{ route('kamar.search') }}" method="GET" class="d-flex mt-3">
                <input type="text" name="query" class="form-control w-50 ml-3" placeholder="Search here">
                <button type="submit" class="btn btn-primary ml-2">Search</button>
                <a href="{{ route('AddKamar') }}" class="btn btn-secondary ml-3">Reset</a>
            </form>
            
        </div>
        
    
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Kamar</th>
                            <th>Harga</th>
                            <th>Kapasitas</th>
                            <th>Kategori</th>
                            <th>Tipe Bed</th>                   
                            <th>Fasilitas</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Ditambah</th>
                            <th>Tanggal Diupdate</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($all_kamars) && count($all_kamars) > 0)
                            @foreach ($all_kamars as $kamar)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kamars->room_number }}</td>
                                    <td>Rp {{ number_format($kamar->harga) }}</td>
                                    <td>{{ $kamars->kapasitas }} Orang</td>
                                    <td>{{ $kamars->category->name}}</td>
                                    <td>{{ $kamars->tipe_bed }}</td>
                                    <td>{{ $kamars->fasilitas }}</td>
                                    <td>{{ $kamars->deskripsi }}</td>
                                    <td>{{ $kamars->created_at }}</td>
                                    <td>{{ $kamars->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('edit-kamar', $kamar_id->id) }}" class="btn btn-primary
                                            btn-sm">Edit
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('kamar.delete', $kamar_id->id) }}" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Are you sure?')">Delete
                                        </a>
                                    </td>
                                    <td><a href="/detail-kamar/{{ $kamar->id }}" class="btn btn-info btn-sm">Detail</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">Kamar tidak ditemukan!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
