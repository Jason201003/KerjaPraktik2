@extends('layouts.manager')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('edit kamar')}}</h1>
        <a href="{{ route('manager.kamars.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
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
                <form action="{{ route('manager.kamars.update', $kamar) }}" method="POST">
                    @csrf
                    @method('put')
                    
                    <!-- Nomor Kamar -->
                    <div class="form-group">
                        <label for="room_number">{{ __('Nomor Kamar') }}</label>
                        <input type="text" class="form-control" id="room_number" name="room_number" placeholder="{{ __('Nomor Kamar') }}" value="{{ old('room_number', $kamar->room_number) }}" required/>
                    </div>

                    <!-- Kapasitas -->
                    <div class="form-group">
                        <label for="kapasitas">{{ __('Kapasitas') }}</label>
                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="{{ __('Kapasitas') }}" value="{{ old('kapasitas', $kamar->kapasitas) }}" min=1 max=4 required/>
                    </div>

                    <!-- Tipe Bed -->
                     <div class="form-group">
                        <label for="tipe_bed">{{ __('Tipe Bed') }}</label>
                        <select name="tipe_bed" class="form-control" id="tipe_bed">
                            <option value="Queen Size" {{ old('tipe_bed', $kamar->tipe_bed) == 'Queen Size' ? 'selected' : '' }}>Queen Size Bed</option>
                            <option value="King Size" {{ old('tipe_bed', $kamar->tipe_bed) == 'King Size' ? 'selected' : '' }}>King Size Bed</option>
                            <option value="Twin Size" {{ old('tipe_bed', $kamar->tipe_bed) == 'Twin Size' ? 'selected' : '' }}>Twin Size Bed</option>
                        </select>
                     </div>

                    <!-- Harga -->
                    <div class="form-group">
                        <label for="harga">{{ __('Harga') }}</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="{{ __('Harga') }}" value="{{ old('harga', $kamar->harga) }}" required/>
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label for="category_id">{{ __('Category') }}</label>
                        <select name="category_id" class="form-control" id="category_id">
                            @foreach($categories as $id => $name)
                                <option value="{{ $id }}" {{ old('category_id', $kamar->category_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach 
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status">{{ __('Category') }}</label>
                        <select name="status" class="form-control" required>
                            <option value="booked" {{ old('status', $kamar->status) == 'booked' ? 'selected' : '' }}>Booked</option>
                            <option value="occupied" {{ old('status', $kamar->status) == 'occupied' ? 'selected' : '' }}>Occupied</option>
                            <option value="unoccupied" {{ old('status', $kamar->status) == 'unoccupied' ? 'selected' : '' }}>Unoccupied</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save')}}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection