@extends('layouts.admin')
@section('content')
<div class="content">
    @can('driver_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.drivers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.driver.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Driver', 'route' => 'admin.drivers.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.driver.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Driver">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.emp_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.emp_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.mobile') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.dl_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.dl_validity_year') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.driver.fields.is_posted') }}
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
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Driver::IS_POSTED_RADIO as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($drivers as $key => $driver)
                                    <tr data-entry-id="{{ $driver->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $driver->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->emp_type ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->emp_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->mobile ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->dl_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $driver->dl_validity_year ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Driver::IS_POSTED_RADIO[$driver->is_posted] ?? '' }}
                                        </td>
                                        <td>
                                            @can('driver_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.drivers.show', $driver->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('driver_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.drivers.edit', $driver->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('driver_delete')
                                                <form action="{{ route('admin.drivers.destroy', $driver->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('driver_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.drivers.massDestroy') }}",
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
  let table = $('.datatable-Driver:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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