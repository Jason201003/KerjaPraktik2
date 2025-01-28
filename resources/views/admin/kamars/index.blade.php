@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                {{ __(' List Kamar') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.kamars.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('New Kamar') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-User" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10"></th>
                                <th class="text-center">{{ __('Nomor Kamar') }}</th>
                                <th class="text-center">{{ __('Kapasitas') }}</th>
                                <th class="text-center">{{ __('Tipe Bed') }}</th>
                                <th class="text-center">{{ __('Harga') }}</th>
                                <th class="text-center">{{ __('Category') }}</th>
                                <th class="text-center">{{ __('Stock') }}</th> <!-- Tambahkan header Stock -->
                                <th class="text-center">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kamars as $kamar)
                            <tr data-entry-id="{{ $kamar->id }}">
                                <td></td>
                                <td class="text-center">{{ $kamar->room_number }}</td>
                                <td class="text-center">{{ $kamar->kapasitas }}</td>
                                <td class="text-center">{{ $kamar->tipe_bed }}</td>
                                <td class="text-center">Rp {{ number_format($kamar->harga) }}</td>
                                <td class="text-center">{{ $kamar->category->name ?? 'N/A' }}</td>
                                <td class="text-center">{{ $kamar->stock }}</td> <!-- Tampilkan nilai Stock -->
                                <td class="text-center">
                                    <a href="{{ route('admin.kamars.edit', $kamar->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure ? ')"  class="d-inline" action="{{ route('admin.kamars.destroy', $kamar->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    <!-- Content Row -->

</div>
@endsection


@push('script-alt')
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  let deleteButtonTrans = 'delete selected'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.kamars.mass_destroy') }}",
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