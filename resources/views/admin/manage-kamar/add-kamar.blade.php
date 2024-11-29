@extends('layouts.admin')

@section('title', 'Tambah Kamar')

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
    <h2>Tambah Kamar Baru</h2>
    
    @if(session('fail'))
        <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif
    
    <form action="{{ route('AddKamar') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nomor Kamar</label>  
            <input type="text" name="room_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Harga</label>  
            <input type="number" name="harga" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Kapasitas</label>  
            <input type="text" name="kapasitas" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="category" class="form-control" required>
                @foreach($categories as $id => $category)
                    <option value="{{ $id }}">{{ $category }}</option>
                @endforeach 
            </select>
        </div>

        <div class="form-group">
            <label>Tipe Bed</label>
            <select name="tipe_bed" class="form-control" required>
                <option value="queen">Queen Size Bed</option>
                <option value="king">King Size Bed</option>
                <option value="twin">Twin Bed</option>
            </select>
        </div>

        <div class="form-group">
            <label>Fasilitas</label>
            <textarea name="fasilitas" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Kamar</button>
    </form>
</div>
@endsection
