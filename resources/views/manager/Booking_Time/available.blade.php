@extends('layouts.manager')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('Available Rooms') }}
            </h6>
        </div>
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Tipe Bed</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($openRooms as $booking)
                    <tr>
                        <td>{{ $booking->kamar->category->name ?? 'N/A' }}</td>
                        <td>{{ $booking->kamar->tipe_bed }}</td>
                        <td>{{ $booking->start_time }}</td>
                        <td>{{ $booking->end_time }}</td>
                        <td>{{ $booking->quantity }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">{{ __('No rooms are currently available.') }}</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
    