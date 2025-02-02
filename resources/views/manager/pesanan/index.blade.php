@extends('layouts.manager')

@section('content')
<div class="container-fluid">

    <!-- Tabel Pesanan Pending -->
    <div class="card">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
            {{ __('Pesanan Pending') }}
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm datatable datatable-User" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('ID Pesanan') }}</th>
                            <th class="text-center">{{ __('Nama Customer') }}</th>
                            <th class="text-center">{{ __('Nomor Handphone') }}</th>
                            <th class="text-center">{{ __('Email') }}</th>
                            <th class="text-center">{{ __('Check In') }}</th>
                            <th class="text-center">{{ __('Check Out') }}</th>
                            <th class="text-center">{{ __('Jumlah') }}</th>
                            <th class="text-center">{{ __('Total Harga') }}</th>
                            <th class="text-center">{{ __('Status') }}</th>
                            <th class="text-center">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesananDetail->where('status', 'pending') as $pesanan)
                        <tr>
                            <td class="text-center">{{ $pesanan->pesanan_id }}</td>
                            <td class="text-center">{{ $pesanan->nama_depan }} {{ $pesanan->nama_belakang }}</td>
                            <td class="text-center">{{ $pesanan->nomor_handphone }}</td>
                            <td class="text-center">{{ $pesanan->email }}</td>
                            <td class="text-center">{{ $pesanan->check_in }}</td>
                            <td class="text-center">{{ $pesanan->check_out }}</td>
                            <td class="text-center">{{ $pesanan->quantity }}</td>
                            <td class="text-center">Rp {{ number_format($pesanan->total_harga) }}</td>
                            <td class="text-center">
                                <span class="text-danger">{{ ucfirst($pesanan->status) }}</span>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('manager.pesanan.confirm', $pesanan->pesanan_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-sm btn-success">
                                        {{ __('Confirm') }}
                                    </button>
                                </form>
                                <form action="{{ route('manager.pesanan.destroy', $pesanan->pesanan_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this order?');">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tabel Pesanan Confirmed -->
    <div class="card mt-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
            {{ __('Pesanan Confirmed') }}
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm datatable datatable-User" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('ID Pesanan') }}</th>
                            <th class="text-center">{{ __('Nama Customer') }}</th>
                            <th class="text-center">{{ __('Nomor Handphone') }}</th>
                            <th class="text-center">{{ __('Email') }}</th>
                            <th class="text-center">{{ __('Check In') }}</th>
                            <th class="text-center">{{ __('Check Out') }}</th>
                            <th class="text-center">{{ __('Jumlah') }}</th>
                            <th class="text-center">{{ __('Total Harga') }}</th>
                            <th class="text-center">{{ __('Status') }}</th>
                            <th class="text-center">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesananDetail->where('status', 'confirmed') as $pesanan)
                        <tr>
                            <td class="text-center">{{ $pesanan->pesanan_id }}</td>
                            <td class="text-center">{{ $pesanan->nama_depan }} {{ $pesanan->nama_belakang }}</td>
                            <td class="text-center">{{ $pesanan->nomor_handphone }}</td>
                            <td class="text-center">{{ $pesanan->email }}</td>
                            <td class="text-center">{{ $pesanan->check_in }}</td>
                            <td class="text-center">{{ $pesanan->check_out }}</td>
                            <td class="text-center">{{ $pesanan->quantity }}</td>
                            <td class="text-center">Rp {{ number_format($pesanan->total_harga) }}</td>
                            <td class="text-center">
                                <span class="text-success">{{ ucfirst($pesanan->status) }}</span>
                            </td>
                            <td>
                                <form action="{{ route('manager.pesanan.destroy', $pesanan->pesanan_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this order?');">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection




    @push('script-alt')
    <script>
        $(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    let deleteButtonTrans = 'delete selected'
    let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('manager.pesanan.mass_destroy') }}",
        className: 'btn-danger',
        action: function (e, dt, node, config) {
        var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
            return $(entry).data('entry-id')
        });
        if (ids.length === 0) {
            alert('zero selected')
            return
        }
        if (confirm('are you sure ?')) {
            $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            method: 'POST',
            url: config.url,
            data: { ids: ids, _method: 'DELETE' }})
            .done(function () { location.reload() })
        }
        }
    }
    dtButtons.push(deleteButton)
    $.extend(true, $.fn.dataTable.defaults, {
        order: [[ 1, 'asc' ]],
        pageLength: 50,
    });
    $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
    </script>
    @endpush


