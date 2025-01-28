@extends('layouts.manager')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Booking Time') }}
            </h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('manager.Booking_Time.store') }}">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('Kategori Kamar - Tipe Bed') }}</th>
                            <th>{{ __('Stock') }}</th>
                            <th>{{ __('Waktu Mulai') }}</th>
                            <th>{{ __('Waktu Selesai') }}</th>
                            <th>{{ __('Jumlah Kamar') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kamars as $kamar)
                        <tr>
                            <td>{{ $kamar->category->name ?? 'Unknown Category' }} - {{ $kamar->tipe_bed }}</td>
                            <td>{{ $kamar->stock }}</td> <!-- Menampilkan stock terbaru -->
                            <td>
                                <input type="datetime-local" name="start_time[{{ $kamar->id }}]" class="form-control" value="{{ $currentTime }}">
                            </td>
                            <td>
                                <input type="datetime-local" name="end_time[{{ $kamar->id }}]" class="form-control" value="{{ $currentTime }}">
                            </td>
                            <td>
                                <input type="number" name="quantity[{{ $kamar->id }}]" class="form-control" min="0"{{ $kamar->stock }}" value="0">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                </table>
            </form>
            <form action="{{ route('manager.Booking_Time.reset') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Reset Booking</button>
            </form>
        </div>
    </div>
</div>
@endsection
