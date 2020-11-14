@extends('layouts.admin')
@section('content')
<div class="content">
    @can('requisition_request_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.requisition-requests.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.requisitionRequest.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.requisitionRequest.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-RequisitionRequest">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.requisitionRequest.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requisitionRequest.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requisitionRequest.fields.designation') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requisitionRequest.fields.phone_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requisitionRequest.fields.start_time') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requisitionRequest.fields.end_time') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requisitionRequest.fields.request_status') }}
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
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\RequisitionRequest::REQUEST_STATUS_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($requisitionRequests as $key => $requisitionRequest)
                                    <tr data-entry-id="{{ $requisitionRequest->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $requisitionRequest->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requisitionRequest->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requisitionRequest->designation ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requisitionRequest->phone_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requisitionRequest->start_time ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requisitionRequest->end_time ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\RequisitionRequest::REQUEST_STATUS_SELECT[$requisitionRequest->request_status] ?? '' }}
                                        </td>
                                        <td>
                                            @can('requisition_request_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.requisition-requests.show', $requisitionRequest->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('requisition_request_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.requisition-requests.edit', $requisitionRequest->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('requisition_request_delete')
                                                <form action="{{ route('admin.requisition-requests.destroy', $requisitionRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('requisition_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.requisition-requests.massDestroy') }}",
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
  let table = $('.datatable-RequisitionRequest:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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