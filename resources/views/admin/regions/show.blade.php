@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.region.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.regions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.region.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $region->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.region.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $region->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.region.fields.is_active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Region::IS_ACTIVE_RADIO[$region->is_active] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.regions.index') }}">
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
                        <a href="#region_offices" aria-controls="region_offices" role="tab" data-toggle="tab">
                            {{ trans('cruds.office.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#region_name_posting_allocations" aria-controls="region_name_posting_allocations" role="tab" data-toggle="tab">
                            {{ trans('cruds.postingAllocation.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#region_vehicle_allocations" aria-controls="region_vehicle_allocations" role="tab" data-toggle="tab">
                            {{ trans('cruds.vehicleAllocation.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#region_name_maintenance_histories" aria-controls="region_name_maintenance_histories" role="tab" data-toggle="tab">
                            {{ trans('cruds.maintenanceHistory.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="region_offices">
                        @includeIf('admin.regions.relationships.regionOffices', ['offices' => $region->regionOffices])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="region_name_posting_allocations">
                        @includeIf('admin.regions.relationships.regionNamePostingAllocations', ['postingAllocations' => $region->regionNamePostingAllocations])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="region_vehicle_allocations">
                        @includeIf('admin.regions.relationships.regionVehicleAllocations', ['vehicleAllocations' => $region->regionVehicleAllocations])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="region_name_maintenance_histories">
                        @includeIf('admin.regions.relationships.regionNameMaintenanceHistories', ['maintenanceHistories' => $region->regionNameMaintenanceHistories])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection