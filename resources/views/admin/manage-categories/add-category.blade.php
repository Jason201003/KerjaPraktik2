@extends('layouts.admin')

@section('title', 'Tambah Category')

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

<div class="container">
    <h2>Tambah Category Baru</h2>
    
    @if(session('fail'))
        <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif
    
    <form action="{{ route('AddCategory') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for= "name">Nama Category</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Category</button>
    </form>
</div>
@endsection
