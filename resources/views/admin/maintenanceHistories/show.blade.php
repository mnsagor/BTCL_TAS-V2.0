@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.maintenanceHistory.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.maintenance-histories.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.maintenanceHistory.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $maintenanceHistory->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.maintenanceHistory.fields.region_name') }}
                                    </th>
                                    <td>
                                        {{ $maintenanceHistory->region_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.maintenanceHistory.fields.office_name') }}
                                    </th>
                                    <td>
                                        {{ $maintenanceHistory->office_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.maintenanceHistory.fields.registration_number') }}
                                    </th>
                                    <td>
                                        {{ $maintenanceHistory->registration_number->registration_number ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.maintenanceHistory.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $maintenanceHistory->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.maintenanceHistory.fields.cost') }}
                                    </th>
                                    <td>
                                        {{ $maintenanceHistory->cost }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.maintenanceHistory.fields.work_detail') }}
                                    </th>
                                    <td>
                                        {!! $maintenanceHistory->work_detail !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.maintenance-histories.index') }}">
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