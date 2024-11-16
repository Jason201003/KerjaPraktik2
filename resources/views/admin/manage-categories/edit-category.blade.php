<!-- resources/views/admin/category/edit-category.blade.php -->
@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
<div class="container">
    <h1>Edit Category</h1>
    <form action="{{ route('EditCategory', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Category</button>
    </form>
</div>
@endsection
