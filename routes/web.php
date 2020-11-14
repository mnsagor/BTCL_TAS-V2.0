<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Requisition Requests
    Route::delete('requisition-requests/destroy', 'RequisitionRequestController@massDestroy')->name('requisition-requests.massDestroy');
    Route::post('requisition-requests/media', 'RequisitionRequestController@storeMedia')->name('requisition-requests.storeMedia');
    Route::post('requisition-requests/ckmedia', 'RequisitionRequestController@storeCKEditorImages')->name('requisition-requests.storeCKEditorImages');
    Route::resource('requisition-requests', 'RequisitionRequestController');

    // Pending Requests
    Route::resource('pending-requests', 'PendingRequestController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Approved Requests
    Route::resource('approved-requests', 'ApprovedRequestController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Rejected Requests
    Route::resource('rejected-requests', 'RejectedRequestController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Allotment Histories
    Route::resource('allotment-histories', 'AllotmentHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Expence Histories
    Route::resource('expence-histories', 'ExpenceHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Maintanence Histories
    Route::resource('maintanence-histories', 'MaintanenceHistoryController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Designations
    Route::delete('designations/destroy', 'DesignationController@massDestroy')->name('designations.massDestroy');
    Route::post('designations/parse-csv-import', 'DesignationController@parseCsvImport')->name('designations.parseCsvImport');
    Route::post('designations/process-csv-import', 'DesignationController@processCsvImport')->name('designations.processCsvImport');
    Route::resource('designations', 'DesignationController');

    // Regions
    Route::delete('regions/destroy', 'RegionController@massDestroy')->name('regions.massDestroy');
    Route::post('regions/parse-csv-import', 'RegionController@parseCsvImport')->name('regions.parseCsvImport');
    Route::post('regions/process-csv-import', 'RegionController@processCsvImport')->name('regions.processCsvImport');
    Route::resource('regions', 'RegionController');

    // Offices
    Route::delete('offices/destroy', 'OfficeController@massDestroy')->name('offices.massDestroy');
    Route::post('offices/parse-csv-import', 'OfficeController@parseCsvImport')->name('offices.parseCsvImport');
    Route::post('offices/process-csv-import', 'OfficeController@processCsvImport')->name('offices.processCsvImport');
    Route::resource('offices', 'OfficeController');

    // Drivers
    Route::delete('drivers/destroy', 'DriverController@massDestroy')->name('drivers.massDestroy');
    Route::post('drivers/parse-csv-import', 'DriverController@parseCsvImport')->name('drivers.parseCsvImport');
    Route::post('drivers/process-csv-import', 'DriverController@processCsvImport')->name('drivers.processCsvImport');
    Route::resource('drivers', 'DriverController');

    // Posting Allocations
    Route::delete('posting-allocations/destroy', 'PostingAllocationController@massDestroy')->name('posting-allocations.massDestroy');
    Route::post('posting-allocations/parse-csv-import', 'PostingAllocationController@parseCsvImport')->name('posting-allocations.parseCsvImport');
    Route::post('posting-allocations/process-csv-import', 'PostingAllocationController@processCsvImport')->name('posting-allocations.processCsvImport');
    Route::resource('posting-allocations', 'PostingAllocationController');

    // Vehicle Types
    Route::delete('vehicle-types/destroy', 'VehicleTypeController@massDestroy')->name('vehicle-types.massDestroy');
    Route::post('vehicle-types/parse-csv-import', 'VehicleTypeController@parseCsvImport')->name('vehicle-types.parseCsvImport');
    Route::post('vehicle-types/process-csv-import', 'VehicleTypeController@processCsvImport')->name('vehicle-types.processCsvImport');
    Route::resource('vehicle-types', 'VehicleTypeController');

    // Fuel Types
    Route::delete('fuel-types/destroy', 'FuelTypeController@massDestroy')->name('fuel-types.massDestroy');
    Route::post('fuel-types/parse-csv-import', 'FuelTypeController@parseCsvImport')->name('fuel-types.parseCsvImport');
    Route::post('fuel-types/process-csv-import', 'FuelTypeController@processCsvImport')->name('fuel-types.processCsvImport');
    Route::resource('fuel-types', 'FuelTypeController');

    // Vehicles
    Route::delete('vehicles/destroy', 'VehicleController@massDestroy')->name('vehicles.massDestroy');
    Route::post('vehicles/media', 'VehicleController@storeMedia')->name('vehicles.storeMedia');
    Route::post('vehicles/ckmedia', 'VehicleController@storeCKEditorImages')->name('vehicles.storeCKEditorImages');
    Route::post('vehicles/parse-csv-import', 'VehicleController@parseCsvImport')->name('vehicles.parseCsvImport');
    Route::post('vehicles/process-csv-import', 'VehicleController@processCsvImport')->name('vehicles.processCsvImport');
    Route::resource('vehicles', 'VehicleController');

    // Vehicle Allocations
    Route::delete('vehicle-allocations/destroy', 'VehicleAllocationController@massDestroy')->name('vehicle-allocations.massDestroy');
    Route::post('vehicle-allocations/media', 'VehicleAllocationController@storeMedia')->name('vehicle-allocations.storeMedia');
    Route::post('vehicle-allocations/ckmedia', 'VehicleAllocationController@storeCKEditorImages')->name('vehicle-allocations.storeCKEditorImages');
    Route::post('vehicle-allocations/parse-csv-import', 'VehicleAllocationController@parseCsvImport')->name('vehicle-allocations.parseCsvImport');
    Route::post('vehicle-allocations/process-csv-import', 'VehicleAllocationController@processCsvImport')->name('vehicle-allocations.processCsvImport');
    Route::resource('vehicle-allocations', 'VehicleAllocationController');

    // Driver Allocations
    Route::delete('driver-allocations/destroy', 'DriverAllocationController@massDestroy')->name('driver-allocations.massDestroy');
    Route::post('driver-allocations/media', 'DriverAllocationController@storeMedia')->name('driver-allocations.storeMedia');
    Route::post('driver-allocations/ckmedia', 'DriverAllocationController@storeCKEditorImages')->name('driver-allocations.storeCKEditorImages');
    Route::post('driver-allocations/parse-csv-import', 'DriverAllocationController@parseCsvImport')->name('driver-allocations.parseCsvImport');
    Route::post('driver-allocations/process-csv-import', 'DriverAllocationController@processCsvImport')->name('driver-allocations.processCsvImport');
    Route::resource('driver-allocations', 'DriverAllocationController');

    // Maintenance Histories
    Route::delete('maintenance-histories/destroy', 'MaintenanceHistoryController@massDestroy')->name('maintenance-histories.massDestroy');
    Route::post('maintenance-histories/media', 'MaintenanceHistoryController@storeMedia')->name('maintenance-histories.storeMedia');
    Route::post('maintenance-histories/ckmedia', 'MaintenanceHistoryController@storeCKEditorImages')->name('maintenance-histories.storeCKEditorImages');
    Route::post('maintenance-histories/parse-csv-import', 'MaintenanceHistoryController@parseCsvImport')->name('maintenance-histories.parseCsvImport');
    Route::post('maintenance-histories/process-csv-import', 'MaintenanceHistoryController@processCsvImport')->name('maintenance-histories.processCsvImport');
    Route::resource('maintenance-histories', 'MaintenanceHistoryController');

    // Employees
    Route::delete('employees/destroy', 'EmployeeController@massDestroy')->name('employees.massDestroy');
    Route::post('employees/parse-csv-import', 'EmployeeController@parseCsvImport')->name('employees.parseCsvImport');
    Route::post('employees/process-csv-import', 'EmployeeController@processCsvImport')->name('employees.processCsvImport');
    Route::resource('employees', 'EmployeeController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
