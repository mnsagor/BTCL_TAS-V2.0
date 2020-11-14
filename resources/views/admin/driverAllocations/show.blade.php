@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.driverAllocation.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.driver-allocations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driverAllocation.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $driverAllocation->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driverAllocation.fields.office_name') }}
                                    </th>
                                    <td>
                                        {{ $driverAllocation->office_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driverAllocation.fields.driver_name') }}
                                    </th>
                                    <td>
                                        {{ $driverAllocation->driver_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driverAllocation.fields.registration_number') }}
                                    </th>
                                    <td>
                                        {{ $driverAllocation->registration_number->registration_number ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driverAllocation.fields.allocation_date') }}
                                    </th>
                                    <td>
                                        {{ $driverAllocation->allocation_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driverAllocation.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $driverAllocation->description !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.driver-allocations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection