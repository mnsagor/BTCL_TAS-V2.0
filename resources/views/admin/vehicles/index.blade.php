@extends('layouts.admin')
@section('content')
<div class="content">
    @can('vehicle_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.vehicles.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.vehicle.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Vehicle', 'route' => 'admin.vehicles.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.vehicle.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Vehicle">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.registration_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.vehicle_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.engine_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.condition') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.ragistration_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.fc_end_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.tt_start_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.tt_end_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.vehicle_allocation_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.driver_allocation_status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($vehicle_types as $key => $item)
                                                <option value="{{ $item->type }}">{{ $item->type }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Vehicle::CONDITION_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Vehicle::VEHICLE_ALLOCATION_STATUS_RADIO as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Vehicle::DRIVER_ALLOCATION_STATUS_RADIO as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehicles as $key => $vehicle)
                                    <tr data-entry-id="{{ $vehicle->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $vehicle->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vehicle->registration_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vehicle->vehicle_type->type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vehicle->engine_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Vehicle::CONDITION_SELECT[$vehicle->condition] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vehicle->ragistration_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vehicle->fc_end_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vehicle->tt_start_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $vehicle->tt_end_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Vehicle::VEHICLE_ALLOCATION_STATUS_RADIO[$vehicle->vehicle_allocation_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Vehicle::DRIVER_ALLOCATION_STATUS_RADIO[$vehicle->driver_allocation_status] ?? '' }}
                                        </td>
                                        <td>
                                            @can('vehicle_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.vehicles.show', $vehicle->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('vehicle_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.vehicles.edit', $vehicle->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('vehicle_delete')
                                                <form action="{{ route('admin.vehicles.destroy', $vehicle->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('vehicle_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vehicles.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Vehicle:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      table
        .column($(this).parent().index())
        .search(value, strict)
        .draw()
  });
})

</script>
@endsection