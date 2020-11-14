<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVehicleRequest;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\FuelType;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VehicleController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('vehicle_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicles = Vehicle::all();

        $vehicle_types = VehicleType::get();

        $fuel_types = FuelType::get();

        return view('admin.vehicles.index', compact('vehicles', 'vehicle_types', 'fuel_types'));
    }

    public function create()
    {
        abort_if(Gate::denies('vehicle_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle_types = VehicleType::all()->pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fuel_types = FuelType::all()->pluck('name', 'id');

        return view('admin.vehicles.create', compact('vehicle_types', 'fuel_types'));
    }

    public function store(StoreVehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->all());
        $vehicle->fuel_types()->sync($request->input('fuel_types', []));

        foreach ($request->input('fc_file', []) as $file) {
            $vehicle->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('fc_file');
        }

        foreach ($request->input('tt_file', []) as $file) {
            $vehicle->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('tt_file');
        }

        foreach ($request->input('other_document', []) as $file) {
            $vehicle->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('other_document');
        }

        foreach ($request->input('image', []) as $file) {
            $vehicle->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $vehicle->id]);
        }

        return redirect()->route('admin.vehicles.index');
    }

    public function edit(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle_types = VehicleType::all()->pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fuel_types = FuelType::all()->pluck('name', 'id');

        $vehicle->load('vehicle_type', 'fuel_types');

        return view('admin.vehicles.edit', compact('vehicle_types', 'fuel_types', 'vehicle'));
    }

    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        $vehicle->fuel_types()->sync($request->input('fuel_types', []));

        if (count($vehicle->fc_file) > 0) {
            foreach ($vehicle->fc_file as $media) {
                if (!in_array($media->file_name, $request->input('fc_file', []))) {
                    $media->delete();
                }
            }
        }

        $media = $vehicle->fc_file->pluck('file_name')->toArray();

        foreach ($request->input('fc_file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $vehicle->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('fc_file');
            }
        }

        if (count($vehicle->tt_file) > 0) {
            foreach ($vehicle->tt_file as $media) {
                if (!in_array($media->file_name, $request->input('tt_file', []))) {
                    $media->delete();
                }
            }
        }

        $media = $vehicle->tt_file->pluck('file_name')->toArray();

        foreach ($request->input('tt_file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $vehicle->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('tt_file');
            }
        }

        if (count($vehicle->other_document) > 0) {
            foreach ($vehicle->other_document as $media) {
                if (!in_array($media->file_name, $request->input('other_document', []))) {
                    $media->delete();
                }
            }
        }

        $media = $vehicle->other_document->pluck('file_name')->toArray();

        foreach ($request->input('other_document', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $vehicle->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('other_document');
            }
        }

        if (count($vehicle->image) > 0) {
            foreach ($vehicle->image as $media) {
                if (!in_array($media->file_name, $request->input('image', []))) {
                    $media->delete();
                }
            }
        }

        $media = $vehicle->image->pluck('file_name')->toArray();

        foreach ($request->input('image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $vehicle->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('image');
            }
        }

        return redirect()->route('admin.vehicles.index');
    }

    public function show(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle->load('vehicle_type', 'fuel_types', 'vehicleVehicleAllocations', 'registrationNumberDriverAllocations', 'registrationNumberMaintenanceHistories');

        return view('admin.vehicles.show', compact('vehicle'));
    }

    public function destroy(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle->delete();

        return back();
    }

    public function massDestroy(MassDestroyVehicleRequest $request)
    {
        Vehicle::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('vehicle_create') && Gate::denies('vehicle_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Vehicle();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
