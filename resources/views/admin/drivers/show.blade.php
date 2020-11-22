@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.driver.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.drivers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $driver->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $driver->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.emp_type') }}
                                    </th>
                                    <td>
                                        {{ $driver->emp_type }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.emp_number') }}
                                    </th>
                                    <td>
                                        {{ $driver->emp_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.mobile') }}
                                    </th>
                                    <td>
                                        {{ $driver->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.dl_number') }}
                                    </th>
                                    <td>
                                        {{ $driver->dl_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.dl_validity_year') }}
                                    </th>
                                    <td>
                                        {{ $driver->dl_validity_year }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.is_posted') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Driver::IS_POSTED_RADIO[$driver->is_posted] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.is_allocated') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Driver::IS_ALLOCATED_RADIO[$driver->is_allocated] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.driver.fields.is_active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Driver::IS_ACTIVE_RADIO[$driver->is_active] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.drivers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#name_posting_allocations" aria-controls="name_posting_allocations" role="tab" data-toggle="tab">
                            {{ trans('cruds.postingAllocation.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#driver_name_driver_allocations" aria-controls="driver_name_driver_allocations" role="tab" data-toggle="tab">
                            {{ trans('cruds.driverAllocation.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="name_posting_allocations">
                        @includeIf('admin.drivers.relationships.namePostingAllocations', ['postingAllocations' => $driver->namePostingAllocations])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="driver_name_driver_allocations">
                        @includeIf('admin.drivers.relationships.driverNameDriverAllocations', ['driverAllocations' => $driver->driverNameDriverAllocations])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection