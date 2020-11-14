<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVehicleAllocationRequest;
use App\Http\Requests\StoreVehicleAllocationRequest;
use App\Http\Requests\UpdateVehicleAllocationRequest;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Office;
use App\Models\Region;
use App\Models\Vehicle;
use App\Models\VehicleAllocation;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VehicleAllocationController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('vehicle_allocation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleAllocations = VehicleAllocation::all();

        $vehicles = Vehicle::get();

        $regions = Region::get();

        $offices = Office::get();

        $employees = Employee::get();

        $designations = Designation::get();

        return view('admin.vehicleAllocations.index', compact('vehicleAllocations', 'vehicles', 'regions', 'offices', 'employees', 'designations'));
    }

    public function create()
    {
        abort_if(Gate::denies('vehicle_allocation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicles = Vehicle::all()->pluck('registration_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $regions = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $divisions = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $allottee_names = Employee::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $allottee_designations = Designation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vehicleAllocations.create', compact('vehicles', 'regions', 'divisions', 'allottee_names', 'allottee_designations'));
    }

    public function store(StoreVehicleAllocationRequest $request)
    {
        $vehicleAllocation = VehicleAllocation::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $vehicleAllocation->id]);
        }

        return redirect()->route('admin.vehicle-allocations.index');
    }

    public function edit(VehicleAllocation $vehicleAllocation)
    {
        abort_if(Gate::denies('vehicle_allocation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicles = Vehicle::all()->pluck('registration_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $regions = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $divisions = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $allottee_names = Employee::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $allottee_designations = Designation::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicleAllocation->load('vehicle', 'region', 'division', 'allottee_name', 'allottee_designation');

        return view('admin.vehicleAllocations.edit', compact('vehicles', 'regions', 'divisions', 'allottee_names', 'allottee_designations', 'vehicleAllocation'));
    }

    public function update(UpdateVehicleAllocationRequest $request, VehicleAllocation $vehicleAllocation)
    {
        $vehicleAllocation->update($request->all());

        return redirect()->route('admin.vehicle-allocations.index');
    }

    public function show(VehicleAllocation $vehicleAllocation)
    {
        abort_if(Gate::denies('vehicle_allocation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleAllocation->load('vehicle', 'region', 'division', 'allottee_name', 'allottee_designation');

        return view('admin.vehicleAllocations.show', compact('vehicleAllocation'));
    }

    public function destroy(VehicleAllocation $vehicleAllocation)
    {
        abort_if(Gate::denies('vehicle_allocation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleAllocation->delete();

        return back();
    }

    public function massDestroy(MassDestroyVehicleAllocationRequest $request)
    {
        VehicleAllocation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('vehicle_allocation_create') && Gate::denies('vehicle_allocation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new VehicleAllocation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
