@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.vehicle.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.vehicles.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.registration_number') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->registration_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.vehicle_type') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->vehicle_type->type ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.model') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->model }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.model_year') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->model_year }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.engine_capacity') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->engine_capacity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.chassis_number') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->chassis_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.engine_number') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->engine_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.condition') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Vehicle::CONDITION_SELECT[$vehicle->condition] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.ragistration_date') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->ragistration_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.fc_start_date') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->fc_start_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.fc_end_date') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->fc_end_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.fc_file') }}
                                    </th>
                                    <td>
                                        @foreach($vehicle->fc_file as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.tt_start_date') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->tt_start_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.tt_end_date') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->tt_end_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.tt_file') }}
                                    </th>
                                    <td>
                                        @foreach($vehicle->tt_file as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.other_document') }}
                                    </th>
                                    <td>
                                        @foreach($vehicle->other_document as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.fuel_type') }}
                                    </th>
                                    <td>
                                        @foreach($vehicle->fuel_types as $key => $fuel_type)
                                            <span class="label label-info">{{ $fuel_type->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.fuel_consumption_rate') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->fuel_consumption_rate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.engine_overhaulting_date') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->engine_overhaulting_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.vehicle_source') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->vehicle_source }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.entry_date') }}
                                    </th>
                                    <td>
                                        {{ $vehicle->entry_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.vehicle_allocation_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Vehicle::VEHICLE_ALLOCATION_STATUS_RADIO[$vehicle->vehicle_allocation_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.driver_allocation_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Vehicle::DRIVER_ALLOCATION_STATUS_RADIO[$vehicle->driver_allocation_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.vehicle.fields.image') }}
                                    </th>
                                    <td>
                                        @foreach($vehicle->image as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.vehicles.index') }}">
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
                        <a href="#vehicle_vehicle_allocations" aria-controls="vehicle_vehicle_allocations" role="tab" data-toggle="tab">
                            {{ trans('cruds.vehicleAllocation.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#registration_number_driver_allocations" aria-controls="registration_number_driver_allocations" role="tab" data-toggle="tab">
                            {{ trans('cruds.driverAllocation.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#registration_number_maintenance_histories" aria-controls="registration_number_maintenance_histories" role="tab" data-toggle="tab">
                            {{ trans('cruds.maintenanceHistory.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="vehicle_vehicle_allocations">
                        @includeIf('admin.vehicles.relationships.vehicleVehicleAllocations', ['vehicleAllocations' => $vehicle->vehicleVehicleAllocations])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="registration_number_driver_allocations">
                        @includeIf('admin.vehicles.relationships.registrationNumberDriverAllocations', ['driverAllocations' => $vehicle->registrationNumberDriverAllocations])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="registration_number_maintenance_histories">
                        @includeIf('admin.vehicles.relationships.registrationNumberMaintenanceHistories', ['maintenanceHistories' => $vehicle->registrationNumberMaintenanceHistories])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection