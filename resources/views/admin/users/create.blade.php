@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('create user') }}</h1>
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
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
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" />
                    </div>

                    <!-- Usertype -->
                    <div class="form-group">
                        <label for="usertype">{{ __('User Type') }}</label>
                        <select id="usertype" class="form-control" name="usertype" required>
                            <option value="manager" {{ old('usertype', $user->usertype ?? '') == 'manager' ? 'selected' : '' }}>Manager</option>
                        </select>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input type="email" class="form-control" id="email" placeholder="{{ __('Email') }}" name="email" value="{{ old('email') }}" />
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group">
                        <label for="no_hp">{{ __('No HP') }}</label>
                        <input type="text" class="form-control" id="name" placeholder="{{ __('No HP') }}" name="no_hp" value="{{ old('no_hp') }}" />
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="form-group">
                        <label for="tgl_lahhir">{{ __('Tanggal Lahir') }}</label>
                        <input type="date" class="form-control" id="tgl_lahir" placeholder="{{ __('Tanggal Lahir') }}" name="tgl_lahir" value="{{ old('tgl_lahir') }}" />
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input type="password" class="form-control" id="password" placeholder="{{ __('Password') }}" name="password" value="{{ old('password') }}" required />
                    </div>

                    <!-- Passworde Confirmation -->
                    <div class="form-group">
                        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                        <input type="password" class="form-control" id="password_confirmation" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" value="{{ old('password_confirmation') }}" required />
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection