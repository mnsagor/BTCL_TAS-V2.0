@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.office.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.offices.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.office.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $office->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.office.fields.region') }}
                                    </th>
                                    <td>
                                        {{ $office->region->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.office.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $office->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.office.fields.is_active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Office::IS_ACTIVE_RADIO[$office->is_active] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.office.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $office->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.office.fields.area') }}
                                    </th>
                                    <td>
                                        {{ $office->area }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.office.fields.contact') }}
                                    </th>
                                    <td>
                                        {{ $office->contact }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.offices.index') }}">
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
                        <a href="#office_name_posting_allocations" aria-controls="office_name_posting_allocations" role="tab" data-toggle="tab">
                            {{ trans('cruds.postingAllocation.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#division_vehicle_allocations" aria-controls="division_vehicle_allocations" role="tab" data-toggle="tab">
                            {{ trans('cruds.vehicleAllocation.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#office_name_driver_allocations" aria-controls="office_name_driver_allocations" role="tab" data-toggle="tab">
                            {{ trans('cruds.driverAllocation.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#office_name_maintenance_histories" aria-controls="office_name_maintenance_histories" role="tab" data-toggle="tab">
                            {{ trans('cruds.maintenanceHistory.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#office_employees" aria-controls="office_employees" role="tab" data-toggle="tab">
                            {{ trans('cruds.employee.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="office_name_posting_allocations">
                        @includeIf('admin.offices.relationships.officeNamePostingAllocations', ['postingAllocations' => $office->officeNamePostingAllocations])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="division_vehicle_allocations">
                        @includeIf('admin.offices.relationships.divisionVehicleAllocations', ['vehicleAllocations' => $office->divisionVehicleAllocations])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="office_name_driver_allocations">
                        @includeIf('admin.offices.relationships.officeNameDriverAllocations', ['driverAllocations' => $office->officeNameDriverAllocations])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="office_name_maintenance_histories">
                        @includeIf('admin.offices.relationships.officeNameMaintenanceHistories', ['maintenanceHistories' => $office->officeNameMaintenanceHistories])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="office_employees">
                        @includeIf('admin.offices.relationships.officeEmployees', ['employees' => $office->officeEmployees])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection