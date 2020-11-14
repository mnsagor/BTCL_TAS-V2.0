<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Requisition Requests
    Route::post('requisition-requests/media', 'RequisitionRequestApiController@storeMedia')->name('requisition-requests.storeMedia');
    Route::apiResource('requisition-requests', 'RequisitionRequestApiController');

    // Designations
    Route::apiResource('designations', 'DesignationApiController');

    // Regions
    Route::apiResource('regions', 'RegionApiController');

    // Offices
    Route::apiResource('offices', 'OfficeApiController');

    // Drivers
    Route::apiResource('drivers', 'DriverApiController');

    // Posting Allocations
    Route::apiResource('posting-allocations', 'PostingAllocationApiController');

    // Vehicle Types
    Route::apiResource('vehicle-types', 'VehicleTypeApiController');

    // Fuel Types
    Route::apiResource('fuel-types', 'FuelTypeApiController');

    // Vehicles
    Route::post('vehicles/media', 'VehicleApiController@storeMedia')->name('vehicles.storeMedia');
    Route::apiResource('vehicles', 'VehicleApiController');

    // Vehicle Allocations
    Route::post('vehicle-allocations/media', 'VehicleAllocationApiController@storeMedia')->name('vehicle-allocations.storeMedia');
    Route::apiResource('vehicle-allocations', 'VehicleAllocationApiController');

    // Driver Allocations
    Route::post('driver-allocations/media', 'DriverAllocationApiController@storeMedia')->name('driver-allocations.storeMedia');
    Route::apiResource('driver-allocations', 'DriverAllocationApiController');

    // Maintenance Histories
    Route::post('maintenance-histories/media', 'MaintenanceHistoryApiController@storeMedia')->name('maintenance-histories.storeMedia');
    Route::apiResource('maintenance-histories', 'MaintenanceHistoryApiController');

    // Employees
    Route::apiResource('employees', 'EmployeeApiController');
});
