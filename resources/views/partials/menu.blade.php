<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <select class="searchable-field form-control">

                </select>
            </li>
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('employee_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.employeeManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('employee_access')
                            <li class="{{ request()->is("admin/employees") || request()->is("admin/employees/*") ? "active" : "" }}">
                                <a href="{{ route("admin.employees.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.employee.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('setting_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.setting.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('designation_access')
                            <li class="{{ request()->is("admin/designations") || request()->is("admin/designations/*") ? "active" : "" }}">
                                <a href="{{ route("admin.designations.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.designation.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('region_access')
                            <li class="{{ request()->is("admin/regions") || request()->is("admin/regions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.regions.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.region.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('office_access')
                            <li class="{{ request()->is("admin/offices") || request()->is("admin/offices/*") ? "active" : "" }}">
                                <a href="{{ route("admin.offices.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.office.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('fuel_type_access')
                            <li class="{{ request()->is("admin/fuel-types") || request()->is("admin/fuel-types/*") ? "active" : "" }}">
                                <a href="{{ route("admin.fuel-types.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.fuelType.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('vehicle_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-car">

                        </i>
                        <span>{{ trans('cruds.vehicleManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('vehicle_type_access')
                            <li class="{{ request()->is("admin/vehicle-types") || request()->is("admin/vehicle-types/*") ? "active" : "" }}">
                                <a href="{{ route("admin.vehicle-types.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.vehicleType.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('vehicle_access')
                            <li class="{{ request()->is("admin/vehicles") || request()->is("admin/vehicles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.vehicles.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.vehicle.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('vehicle_allocation_access')
                            <li class="{{ request()->is("admin/vehicle-allocations") || request()->is("admin/vehicle-allocations/*") ? "active" : "" }}">
                                <a href="{{ route("admin.vehicle-allocations.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.vehicleAllocation.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('driver_allocation_access')
                            <li class="{{ request()->is("admin/driver-allocations") || request()->is("admin/driver-allocations/*") ? "active" : "" }}">
                                <a href="{{ route("admin.driver-allocations.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.driverAllocation.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('vehicle_maintenance_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw far fa-money-bill-alt">

                        </i>
                        <span>{{ trans('cruds.vehicleMaintenance.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('maintenance_history_access')
                            <li class="{{ request()->is("admin/maintenance-histories") || request()->is("admin/maintenance-histories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.maintenance-histories.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.maintenanceHistory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('driver_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw far fa-hdd">

                        </i>
                        <span>{{ trans('cruds.driverManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('driver_access')
                            <li class="{{ request()->is("admin/drivers") || request()->is("admin/drivers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.drivers.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.driver.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('posting_allocation_access')
                            <li class="{{ request()->is("admin/posting-allocations") || request()->is("admin/posting-allocations/*") ? "active" : "" }}">
                                <a href="{{ route("admin.posting-allocations.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.postingAllocation.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('vehicle_requisition_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.vehicleRequisition.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('requisition_request_access')
                            <li class="{{ request()->is("admin/requisition-requests") || request()->is("admin/requisition-requests/*") ? "active" : "" }}">
                                <a href="{{ route("admin.requisition-requests.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.requisitionRequest.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('pending_request_access')
                            <li class="{{ request()->is("admin/pending-requests") || request()->is("admin/pending-requests/*") ? "active" : "" }}">
                                <a href="{{ route("admin.pending-requests.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.pendingRequest.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('approved_request_access')
                            <li class="{{ request()->is("admin/approved-requests") || request()->is("admin/approved-requests/*") ? "active" : "" }}">
                                <a href="{{ route("admin.approved-requests.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.approvedRequest.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('rejected_request_access')
                            <li class="{{ request()->is("admin/rejected-requests") || request()->is("admin/rejected-requests/*") ? "active" : "" }}">
                                <a href="{{ route("admin.rejected-requests.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.rejectedRequest.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('report_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-receipt">

                        </i>
                        <span>{{ trans('cruds.report.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('allotment_history_access')
                            <li class="{{ request()->is("admin/allotment-histories") || request()->is("admin/allotment-histories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.allotment-histories.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.allotmentHistory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('maintanence_history_access')
                            <li class="{{ request()->is("admin/maintanence-histories") || request()->is("admin/maintanence-histories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.maintanence-histories.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.maintanenceHistory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('expence_history_access')
                            <li class="{{ request()->is("admin/expence-histories") || request()->is("admin/expence-histories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.expence-histories.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.expenceHistory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>