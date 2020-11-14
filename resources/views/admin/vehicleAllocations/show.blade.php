@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.vehicleAllocation.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.vehicle-allocations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicleAllocation.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $vehicleAllocation->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicleAllocation.fields.vehicle') }}
                                    </th>
                                    <td>
                                        {{ $vehicleAllocation->vehicle->registration_number ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicleAllocation.fields.region') }}
                                    </th>
                                    <td>
                                        {{ $vehicleAllocation->region->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicleAllocation.fields.division') }}
                                    </th>
                                    <td>
                                        {{ $vehicleAllocation->division->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicleAllocation.fields.allottee_name') }}
                                    </th>
                                    <td>
                                        {{ $vehicleAllocation->allottee_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicleAllocation.fields.allottee_designation') }}
                                    </th>
                                    <td>
                                        {{ $vehicleAllocation->allottee_designation->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicleAllocation.fields.allotment_date') }}
                                    </th>
                                    <td>
                                        {{ $vehicleAllocation->allotment_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicleAllocation.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $vehicleAllocation->description !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.vehicle-allocations.index') }}">
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