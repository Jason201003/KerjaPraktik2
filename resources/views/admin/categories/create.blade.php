@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('create categories') }}</h1>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required/>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection