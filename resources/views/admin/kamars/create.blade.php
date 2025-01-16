@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('create kamars') }}</h1>
        <a href="{{ route('admin.kamars.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
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
                <form action="{{ route('admin.kamars.store') }}" method="POST">
                    @csrf

                    <!-- Nomor Kamar -->
                    <div class="form-group">
                        <label for="room_number">{{ __('Nomor Kamar') }}</label>
                        <input type="text" class="form-control" id="room_number" name="room_number" placeholder="{{ __('Nomor Kamar') }}" value="{{ old('room_number') }}" required/>
                    </div>

                    <!-- Kapasitas -->
                    <div class="form-group">
                        <label for="kapasitas">{{ __('Kapasitas') }}</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="{{ __('Kapasitas') }}" value="{{ old('kapasitas') }}" min=1 max=4 required/>
                    </div>

                    <!-- Tipe Bed -->
                     <div class="form-group">
                        <label for="tipe_bed">{{ __('Tipe Bed') }}</label>
                        <select name="tipe_bed" class="form-control" id="tipe_bed">
                            <option value="Queen Size">Queen Size Bed</option>
                            <option value="King Size">King Size Bed</option>
                            <option value="Twin Bed">Twin Bed</option>
                        </select>
                     </div>

                    <!-- Harga -->
                    <div class="form-group">
                        <label for="harga">{{ __('Harga') }}</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="{{ __('Harga') }}" value="{{ old('harga') }}" required/>
                    </div>

                    <div class="form-group">
                        <label for="category_id">{{ __('Category') }}</label>
                        <select name="category_id" class="form-control" id="category_id">
                            @foreach($categories as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach 
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection