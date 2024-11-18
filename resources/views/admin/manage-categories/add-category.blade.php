@extends('layouts.admin')

@section('content')
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
