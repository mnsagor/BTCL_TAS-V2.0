<?php

return [
    'userManagement'     => [
        'title'          => 'ইউজার ম্যানেজমেন্ট',
        'title_singular' => 'ইউজার ম্যানেজমেন্ট',
    ],
    'permission'         => [
        'title'          => 'অনুমতিসমূহ',
        'title_singular' => 'অনুমতি',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'               => [
        'title'          => 'ভূমিকা/রোলগুলি',
        'title_singular' => 'ভূমিকা/রোল',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'               => [
        'title'          => 'ব্যবহারকারীগণ',
        'title_singular' => 'ব্যবহারকারী',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
            'employee'                 => 'Employee Name',
            'employee_helper'          => ' ',
        ],
    ],
    'auditLog'           => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'setting'            => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
    ],
    'employeeManagement' => [
        'title'          => 'Employee Management',
        'title_singular' => 'Employee Management',
    ],
    'vehicleManagement'  => [
        'title'          => 'Vehicle Management',
        'title_singular' => 'Vehicle Management',
    ],
    'vehicleMaintenance' => [
        'title'          => 'Vehicle Maintenance',
        'title_singular' => 'Vehicle Maintenance',
    ],
    'driverManagement'   => [
        'title'          => 'Driver Management',
        'title_singular' => 'Driver Management',
    ],
    'vehicleRequisition' => [
        'title'          => 'Vehicle Requisition',
        'title_singular' => 'Vehicle Requisition',
    ],
    'requisitionRequest' => [
        'title'          => 'Requisition Request',
        'title_singular' => 'Requisition Request',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'name'                  => 'Employee Name',
            'name_helper'           => ' ',
            'designation'           => 'Designation',
            'designation_helper'    => ' ',
            'phone_number'          => 'Phone Number',
            'phone_number_helper'   => ' ',
            'start_time'            => 'Start Time',
            'start_time_helper'     => ' ',
            'end_time'              => 'End Time',
            'end_time_helper'       => ' ',
            'purpose'               => 'Purpose',
            'purpose_helper'        => ' ',
            'request_status'        => 'Request Status',
            'request_status_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'pendingRequest'     => [
        'title'          => 'Pending Request',
        'title_singular' => 'Pending Request',
    ],
    'approvedRequest'    => [
        'title'          => 'Approved Request',
        'title_singular' => 'Approved Request',
    ],
    'rejectedRequest'    => [
        'title'          => 'Rejected Request',
        'title_singular' => 'Rejected Request',
    ],
    'report'             => [
        'title'          => 'Reports',
        'title_singular' => 'Report',
    ],
    'allotmentHistory'   => [
        'title'          => 'Allotment History',
        'title_singular' => 'Allotment History',
    ],
    'expenceHistory'     => [
        'title'          => 'Expence History',
        'title_singular' => 'Expence History',
    ],
    'maintanenceHistory' => [
        'title'          => 'Maintanence History',
        'title_singular' => 'Maintanence History',
    ],
    'designation'        => [
        'title'          => 'Designation',
        'title_singular' => 'Designation',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Designation Name',
            'name_helper'       => ' ',
            'grade'             => 'Grade',
            'grade_helper'      => ' ',
            'is_active'         => 'Status',
            'is_active_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'region'             => [
        'title'          => 'Region',
        'title_singular' => 'Region',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Region Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'is_active'         => 'Status',
            'is_active_helper'  => ' ',
        ],
    ],
    'office'             => [
        'title'          => 'Office',
        'title_singular' => 'Office',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'region'            => 'Region Name',
            'region_helper'     => ' ',
            'name'              => 'Division/Office Name',
            'name_helper'       => ' ',
            'is_active'         => 'Status',
            'is_active_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'driver'             => [
        'title'          => 'Driver',
        'title_singular' => 'Driver',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'name'                    => 'Driver Name',
            'name_helper'             => ' ',
            'emp_type'                => 'Employment Type',
            'emp_type_helper'         => ' ',
            'emp_number'              => 'Employee ID',
            'emp_number_helper'       => ' ',
            'mobile'                  => 'Mobile Number',
            'mobile_helper'           => ' ',
            'dl_number'               => 'Driving Licence Number',
            'dl_number_helper'        => ' ',
            'dl_validity_year'        => 'Driving Licence Validity Year',
            'dl_validity_year_helper' => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'is_posted'               => 'Posting Status',
            'is_posted_helper'        => ' ',
            'is_allocated'            => 'Vehicle Allocation Status',
            'is_allocated_helper'     => ' ',
        ],
    ],
    'postingAllocation'  => [
        'title'          => 'Posting Allocation',
        'title_singular' => 'Posting Allocation',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Driver Name',
            'name_helper'        => ' ',
            'region_name'        => 'Region Name',
            'region_name_helper' => ' ',
            'office_name'        => 'Office Name',
            'office_name_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'vehicleType'        => [
        'title'          => 'Vehicle Type',
        'title_singular' => 'Vehicle Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'type'              => 'Vehicle Type',
            'type_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'fuelType'           => [
        'title'          => 'Fuel Type',
        'title_singular' => 'Fuel Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Fuel Type',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'vehicle'            => [
        'title'          => 'Vehicle Registration',
        'title_singular' => 'Vehicle Registration',
        'fields'         => [
            'id'                               => 'ID',
            'id_helper'                        => ' ',
            'registration_number'              => 'Registration Number',
            'registration_number_helper'       => ' ',
            'vehicle_type'                     => 'Vehicle Type',
            'vehicle_type_helper'              => ' ',
            'model'                            => 'Model Name/Brand Name',
            'model_helper'                     => ' ',
            'model_year'                       => 'Model Year',
            'model_year_helper'                => ' ',
            'engine_capacity'                  => 'Engine Capacity (CC)',
            'engine_capacity_helper'           => ' ',
            'chassis_number'                   => 'Chassis Number',
            'chassis_number_helper'            => ' ',
            'engine_number'                    => 'Engine Number',
            'engine_number_helper'             => ' ',
            'condition'                        => 'Vehicle Condition',
            'condition_helper'                 => ' ',
            'ragistration_date'                => 'Ragistration Date',
            'ragistration_date_helper'         => ' ',
            'fc_start_date'                    => 'Last Date of Fitness Certificate Issued',
            'fc_start_date_helper'             => ' ',
            'fc_end_date'                      => 'Fitness Certificate Expired Date',
            'fc_end_date_helper'               => ' ',
            'fc_file'                          => 'Fitness Certificate File',
            'fc_file_helper'                   => ' ',
            'tt_start_date'                    => 'Last date of Tax token certificate issued',
            'tt_start_date_helper'             => ' ',
            'tt_end_date'                      => 'Tax Token Expired Date',
            'tt_end_date_helper'               => ' ',
            'tt_file'                          => 'Tax Token File',
            'tt_file_helper'                   => ' ',
            'other_document'                   => 'Other Document',
            'other_document_helper'            => ' ',
            'fuel_type'                        => 'Fuel Type',
            'fuel_type_helper'                 => ' ',
            'fuel_consumption_rate'            => 'Fuel Consumption Rate (Km/Ltr)',
            'fuel_consumption_rate_helper'     => ' ',
            'engine_overhaulting_date'         => 'Last Date of Engine Overhaulting',
            'engine_overhaulting_date_helper'  => ' ',
            'vehicle_source'                   => 'Source of the Vehicle',
            'vehicle_source_helper'            => ' ',
            'entry_date'                       => 'First Date of Entry to this Office',
            'entry_date_helper'                => ' ',
            'created_at'                       => 'Created at',
            'created_at_helper'                => ' ',
            'updated_at'                       => 'Updated at',
            'updated_at_helper'                => ' ',
            'deleted_at'                       => 'Deleted at',
            'deleted_at_helper'                => ' ',
            'vehicle_allocation_status'        => 'Vehicle Allocation Status',
            'vehicle_allocation_status_helper' => ' ',
            'driver_allocation_status'         => 'Driver Allocation Status',
            'driver_allocation_status_helper'  => ' ',
            'image'                            => 'Vehicle Image',
            'image_helper'                     => ' ',
        ],
    ],
    'vehicleAllocation'  => [
        'title'          => 'Vehicle Allocation',
        'title_singular' => 'Vehicle Allocation',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'vehicle'                     => 'Vehicle Registration Number',
            'vehicle_helper'              => ' ',
            'region'                      => 'Region Name',
            'region_helper'               => ' ',
            'division'                    => 'Division/Office Name',
            'division_helper'             => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'allottee_name'               => 'Allottee Name',
            'allottee_name_helper'        => ' ',
            'allottee_designation'        => 'Allottee Designation',
            'allottee_designation_helper' => ' ',
            'allotment_date'              => 'Allotment Date',
            'allotment_date_helper'       => ' ',
            'description'                 => 'Description',
            'description_helper'          => ' ',
        ],
    ],
    'driverAllocation'   => [
        'title'          => 'Driver Allocation',
        'title_singular' => 'Driver Allocation',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'office_name'                => 'Office Name',
            'office_name_helper'         => ' ',
            'driver_name'                => 'Driver Name',
            'driver_name_helper'         => ' ',
            'registration_number'        => 'Vehicle Registration Number',
            'registration_number_helper' => ' ',
            'allocation_date'            => 'Allocation Date',
            'allocation_date_helper'     => ' ',
            'description'                => 'Description',
            'description_helper'         => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
        ],
    ],
    'maintenanceHistory' => [
        'title'          => 'Maintenance History',
        'title_singular' => 'Maintenance History',
        'fields'         => [
            'id'                         => 'ID',
            'id_helper'                  => ' ',
            'region_name'                => 'Region Name',
            'region_name_helper'         => ' ',
            'office_name'                => 'Office Name',
            'office_name_helper'         => ' ',
            'registration_number'        => 'Vehicle Registration Number',
            'registration_number_helper' => ' ',
            'date'                       => 'Maintenance Date',
            'date_helper'                => ' ',
            'cost'                       => 'Maintenance Cost (Tk)',
            'cost_helper'                => ' ',
            'work_detail'                => 'Maintenance Work Detail',
            'work_detail_helper'         => ' ',
            'created_at'                 => 'Created at',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'Updated at',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'Deleted at',
            'deleted_at_helper'          => ' ',
        ],
    ],
    'employee'           => [
        'title'          => 'Employee',
        'title_singular' => 'Employee',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'designation'        => 'Designation',
            'designation_helper' => ' ',
            'office'             => 'Office',
            'office_helper'      => ' ',
            'mobile'             => 'Mobile',
            'mobile_helper'      => ' ',
            'email'              => 'Email',
            'email_helper'       => ' ',
            'sex'                => 'Gender',
            'sex_helper'         => ' ',
            'nid'                => 'NID',
            'nid_helper'         => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'payroll_emp'        => 'Payroll Employee ID',
            'payroll_emp_helper' => ' ',
        ],
    ],
];
