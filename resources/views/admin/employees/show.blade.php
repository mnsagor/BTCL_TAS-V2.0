@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.employee.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.employees.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $employee->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $employee->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.designation') }}
                                    </th>
                                    <td>
                                        {{ $employee->designation->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.office') }}
                                    </th>
                                    <td>
                                        {{ $employee->office->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.mobile') }}
                                    </th>
                                    <td>
                                        {{ $employee->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $employee->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.sex') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Employee::SEX_RADIO[$employee->sex] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.payroll_emp') }}
                                    </th>
                                    <td>
                                        {{ $employee->payroll_emp }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.employee.fields.is_active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Employee::IS_ACTIVE_RADIO[$employee->is_active] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.employees.index') }}">
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
                        <a href="#employee_users" aria-controls="employee_users" role="tab" data-toggle="tab">
                            {{ trans('cruds.user.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#allottee_name_vehicle_allocations" aria-controls="allottee_name_vehicle_allocations" role="tab" data-toggle="tab">
                            {{ trans('cruds.vehicleAllocation.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="employee_users">
                        @includeIf('admin.employees.relationships.employeeUsers', ['users' => $employee->employeeUsers])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="allottee_name_vehicle_allocations">
                        @includeIf('admin.employees.relationships.allotteeNameVehicleAllocations', ['vehicleAllocations' => $employee->allotteeNameVehicleAllocations])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection