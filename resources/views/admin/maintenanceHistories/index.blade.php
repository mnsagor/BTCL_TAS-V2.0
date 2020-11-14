@extends('layouts.admin')
@section('content')
<div class="content">
    @can('maintenance_history_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.maintenance-histories.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.maintenanceHistory.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'MaintenanceHistory', 'route' => 'admin.maintenance-histories.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.maintenanceHistory.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-MaintenanceHistory">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.maintenanceHistory.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.maintenanceHistory.fields.region_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.maintenanceHistory.fields.office_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.maintenanceHistory.fields.registration_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.maintenanceHistory.fields.date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.maintenanceHistory.fields.cost') }}
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
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($regions as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($offices as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($vehicles as $key => $item)
                                                <option value="{{ $item->registration_number }}">{{ $item->registration_number }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($maintenanceHistories as $key => $maintenanceHistory)
                                    <tr data-entry-id="{{ $maintenanceHistory->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $maintenanceHistory->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $maintenanceHistory->region_name->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $maintenanceHistory->office_name->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $maintenanceHistory->registration_number->registration_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $maintenanceHistory->date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $maintenanceHistory->cost ?? '' }}
                                        </td>
                                        <td>
                                            @can('maintenance_history_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.maintenance-histories.show', $maintenanceHistory->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('maintenance_history_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.maintenance-histories.edit', $maintenanceHistory->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('maintenance_history_delete')
                                                <form action="{{ route('admin.maintenance-histories.destroy', $maintenanceHistory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('maintenance_history_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.maintenance-histories.massDestroy') }}",
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
  let table = $('.datatable-MaintenanceHistory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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