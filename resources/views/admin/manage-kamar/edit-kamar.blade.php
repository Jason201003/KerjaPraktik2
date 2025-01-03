@extends('layouts.admin')

@section('title', 'Edit Kamar')

@section('content')
<div class="container">
    <h2>Edit Kamar</h2>
    
    @if(session('fail'))
        <div class="alert alert-danger">{{ session('fail') }}</div>
    @endif
    
    <form action="{{ route('EditKamar', $kamar->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nomor Kamar</label>
            <input type="text" name="room_number" class="form-control" value="{{ $kamar->room_number }}" required>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $kamar->harga }}">
        </div>

        <div class="form-group">
            <label>Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" value="{{ $kamar->kapasitas }}" required>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category" class="form-control" required>
                @foreach($categories as $id => $category)
                    <option {{ $id == $room->category->id ? 'selected' : null }} value="{{ $id }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Tipe Bed</label>
            <select name="tipe_bed" class="form-control" required>
                <option value="queen" {{ $kamar->tipe_bed == 'queen' ? 'selected' : '' }}>Queen Size Bed</option>
                <option value="king" {{ $kamar->tipe_bed == 'king' ? 'selected' : '' }}>King Size Bed</option>
                <option value="twin" {{ $kamar->tipe_bed == 'twin' ? 'selected' : '' }}>Twin Bed</option>
            </select>
        </div>

        <div class="form-group">
            <label>Fasilitas</label>
            <textarea name="fasilitas" class="form-control">{{ $kamars->fasilitas }}</textarea>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $kamars->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Kamar</button>
    </form>
</div>
@endsection
