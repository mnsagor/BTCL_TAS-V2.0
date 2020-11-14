<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'setting_access',
            ],
            [
                'id'    => 20,
                'title' => 'employee_management_access',
            ],
            [
                'id'    => 21,
                'title' => 'vehicle_management_access',
            ],
            [
                'id'    => 22,
                'title' => 'vehicle_maintenance_access',
            ],
            [
                'id'    => 23,
                'title' => 'driver_management_access',
            ],
            [
                'id'    => 24,
                'title' => 'vehicle_requisition_access',
            ],
            [
                'id'    => 25,
                'title' => 'requisition_request_create',
            ],
            [
                'id'    => 26,
                'title' => 'requisition_request_edit',
            ],
            [
                'id'    => 27,
                'title' => 'requisition_request_show',
            ],
            [
                'id'    => 28,
                'title' => 'requisition_request_delete',
            ],
            [
                'id'    => 29,
                'title' => 'requisition_request_access',
            ],
            [
                'id'    => 30,
                'title' => 'pending_request_access',
            ],
            [
                'id'    => 31,
                'title' => 'approved_request_access',
            ],
            [
                'id'    => 32,
                'title' => 'rejected_request_access',
            ],
            [
                'id'    => 33,
                'title' => 'report_access',
            ],
            [
                'id'    => 34,
                'title' => 'allotment_history_access',
            ],
            [
                'id'    => 35,
                'title' => 'expence_history_access',
            ],
            [
                'id'    => 36,
                'title' => 'maintanence_history_access',
            ],
            [
                'id'    => 37,
                'title' => 'designation_create',
            ],
            [
                'id'    => 38,
                'title' => 'designation_edit',
            ],
            [
                'id'    => 39,
                'title' => 'designation_show',
            ],
            [
                'id'    => 40,
                'title' => 'designation_delete',
            ],
            [
                'id'    => 41,
                'title' => 'designation_access',
            ],
            [
                'id'    => 42,
                'title' => 'region_create',
            ],
            [
                'id'    => 43,
                'title' => 'region_edit',
            ],
            [
                'id'    => 44,
                'title' => 'region_show',
            ],
            [
                'id'    => 45,
                'title' => 'region_delete',
            ],
            [
                'id'    => 46,
                'title' => 'region_access',
            ],
            [
                'id'    => 47,
                'title' => 'office_create',
            ],
            [
                'id'    => 48,
                'title' => 'office_edit',
            ],
            [
                'id'    => 49,
                'title' => 'office_show',
            ],
            [
                'id'    => 50,
                'title' => 'office_delete',
            ],
            [
                'id'    => 51,
                'title' => 'office_access',
            ],
            [
                'id'    => 52,
                'title' => 'driver_create',
            ],
            [
                'id'    => 53,
                'title' => 'driver_edit',
            ],
            [
                'id'    => 54,
                'title' => 'driver_show',
            ],
            [
                'id'    => 55,
                'title' => 'driver_delete',
            ],
            [
                'id'    => 56,
                'title' => 'driver_access',
            ],
            [
                'id'    => 57,
                'title' => 'posting_allocation_create',
            ],
            [
                'id'    => 58,
                'title' => 'posting_allocation_edit',
            ],
            [
                'id'    => 59,
                'title' => 'posting_allocation_show',
            ],
            [
                'id'    => 60,
                'title' => 'posting_allocation_delete',
            ],
            [
                'id'    => 61,
                'title' => 'posting_allocation_access',
            ],
            [
                'id'    => 62,
                'title' => 'vehicle_type_create',
            ],
            [
                'id'    => 63,
                'title' => 'vehicle_type_edit',
            ],
            [
                'id'    => 64,
                'title' => 'vehicle_type_show',
            ],
            [
                'id'    => 65,
                'title' => 'vehicle_type_delete',
            ],
            [
                'id'    => 66,
                'title' => 'vehicle_type_access',
            ],
            [
                'id'    => 67,
                'title' => 'fuel_type_create',
            ],
            [
                'id'    => 68,
                'title' => 'fuel_type_edit',
            ],
            [
                'id'    => 69,
                'title' => 'fuel_type_show',
            ],
            [
                'id'    => 70,
                'title' => 'fuel_type_delete',
            ],
            [
                'id'    => 71,
                'title' => 'fuel_type_access',
            ],
            [
                'id'    => 72,
                'title' => 'vehicle_create',
            ],
            [
                'id'    => 73,
                'title' => 'vehicle_edit',
            ],
            [
                'id'    => 74,
                'title' => 'vehicle_show',
            ],
            [
                'id'    => 75,
                'title' => 'vehicle_delete',
            ],
            [
                'id'    => 76,
                'title' => 'vehicle_access',
            ],
            [
                'id'    => 77,
                'title' => 'vehicle_allocation_create',
            ],
            [
                'id'    => 78,
                'title' => 'vehicle_allocation_edit',
            ],
            [
                'id'    => 79,
                'title' => 'vehicle_allocation_show',
            ],
            [
                'id'    => 80,
                'title' => 'vehicle_allocation_delete',
            ],
            [
                'id'    => 81,
                'title' => 'vehicle_allocation_access',
            ],
            [
                'id'    => 82,
                'title' => 'driver_allocation_create',
            ],
            [
                'id'    => 83,
                'title' => 'driver_allocation_edit',
            ],
            [
                'id'    => 84,
                'title' => 'driver_allocation_show',
            ],
            [
                'id'    => 85,
                'title' => 'driver_allocation_delete',
            ],
            [
                'id'    => 86,
                'title' => 'driver_allocation_access',
            ],
            [
                'id'    => 87,
                'title' => 'maintenance_history_create',
            ],
            [
                'id'    => 88,
                'title' => 'maintenance_history_edit',
            ],
            [
                'id'    => 89,
                'title' => 'maintenance_history_show',
            ],
            [
                'id'    => 90,
                'title' => 'maintenance_history_delete',
            ],
            [
                'id'    => 91,
                'title' => 'maintenance_history_access',
            ],
            [
                'id'    => 92,
                'title' => 'employee_create',
            ],
            [
                'id'    => 93,
                'title' => 'employee_edit',
            ],
            [
                'id'    => 94,
                'title' => 'employee_show',
            ],
            [
                'id'    => 95,
                'title' => 'employee_delete',
            ],
            [
                'id'    => 96,
                'title' => 'employee_access',
            ],
            [
                'id'    => 97,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
