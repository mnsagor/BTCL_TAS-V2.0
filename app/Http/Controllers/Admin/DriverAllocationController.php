<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDriverAllocationRequest;
use App\Http\Requests\StoreDriverAllocationRequest;
use App\Http\Requests\UpdateDriverAllocationRequest;
use App\Models\Driver;
use App\Models\DriverAllocation;
use App\Models\Office;
use App\Models\Vehicle;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DriverAllocationController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('driver_allocation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driverAllocations = DriverAllocation::all();

        $offices = Office::get();

        $drivers = Driver::get();

        $vehicles = Vehicle::get();

        return view('admin.driverAllocations.index', compact('driverAllocations', 'offices', 'drivers', 'vehicles'));
    }

    public function create()
    {
        abort_if(Gate::denies('driver_allocation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $office_names = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $driver_names = Driver::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registration_numbers = Vehicle::all()->pluck('registration_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.driverAllocations.create', compact('office_names', 'driver_names', 'registration_numbers'));
    }

    public function store(StoreDriverAllocationRequest $request)
    {
        $driverAllocation = DriverAllocation::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $driverAllocation->id]);
        }

        return redirect()->route('admin.driver-allocations.index');
    }

    public function edit(DriverAllocation $driverAllocation)
    {
        abort_if(Gate::denies('driver_allocation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $office_names = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $driver_names = Driver::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registration_numbers = Vehicle::all()->pluck('registration_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $driverAllocation->load('office_name', 'driver_name', 'registration_number');

        return view('admin.driverAllocations.edit', compact('office_names', 'driver_names', 'registration_numbers', 'driverAllocation'));
    }

    public function update(UpdateDriverAllocationRequest $request, DriverAllocation $driverAllocation)
    {
        $driverAllocation->update($request->all());

        return redirect()->route('admin.driver-allocations.index');
    }

    public function show(DriverAllocation $driverAllocation)
    {
        abort_if(Gate::denies('driver_allocation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driverAllocation->load('office_name', 'driver_name', 'registration_number');

        return view('admin.driverAllocations.show', compact('driverAllocation'));
    }

    public function destroy(DriverAllocation $driverAllocation)
    {
        abort_if(Gate::denies('driver_allocation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driverAllocation->delete();

        return back();
    }

    public function massDestroy(MassDestroyDriverAllocationRequest $request)
    {
        DriverAllocation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('driver_allocation_create') && Gate::denies('driver_allocation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DriverAllocation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
