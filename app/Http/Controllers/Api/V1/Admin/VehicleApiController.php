<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Resources\Admin\VehicleResource;
use App\Models\Vehicle;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vehicle_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleResource(Vehicle::with(['vehicle_type', 'fuel_types'])->get());
    }

    public function store(StoreVehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->all());
        $vehicle->fuel_types()->sync($request->input('fuel_types', []));

        if ($request->input('fc_file', false)) {
            $vehicle->addMedia(storage_path('tmp/uploads/' . $request->input('fc_file')))->toMediaCollection('fc_file');
        }

        if ($request->input('tt_file', false)) {
            $vehicle->addMedia(storage_path('tmp/uploads/' . $request->input('tt_file')))->toMediaCollection('tt_file');
        }

        if ($request->input('other_document', false)) {
            $vehicle->addMedia(storage_path('tmp/uploads/' . $request->input('other_document')))->toMediaCollection('other_document');
        }

        if ($request->input('image', false)) {
            $vehicle->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new VehicleResource($vehicle))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleResource($vehicle->load(['vehicle_type', 'fuel_types']));
    }

    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        $vehicle->fuel_types()->sync($request->input('fuel_types', []));

        if ($request->input('fc_file', false)) {
            if (!$vehicle->fc_file || $request->input('fc_file') !== $vehicle->fc_file->file_name) {
                if ($vehicle->fc_file) {
                    $vehicle->fc_file->delete();
                }

                $vehicle->addMedia(storage_path('tmp/uploads/' . $request->input('fc_file')))->toMediaCollection('fc_file');
            }
        } elseif ($vehicle->fc_file) {
            $vehicle->fc_file->delete();
        }

        if ($request->input('tt_file', false)) {
            if (!$vehicle->tt_file || $request->input('tt_file') !== $vehicle->tt_file->file_name) {
                if ($vehicle->tt_file) {
                    $vehicle->tt_file->delete();
                }

                $vehicle->addMedia(storage_path('tmp/uploads/' . $request->input('tt_file')))->toMediaCollection('tt_file');
            }
        } elseif ($vehicle->tt_file) {
            $vehicle->tt_file->delete();
        }

        if ($request->input('other_document', false)) {
            if (!$vehicle->other_document || $request->input('other_document') !== $vehicle->other_document->file_name) {
                if ($vehicle->other_document) {
                    $vehicle->other_document->delete();
                }

                $vehicle->addMedia(storage_path('tmp/uploads/' . $request->input('other_document')))->toMediaCollection('other_document');
            }
        } elseif ($vehicle->other_document) {
            $vehicle->other_document->delete();
        }

        if ($request->input('image', false)) {
            if (!$vehicle->image || $request->input('image') !== $vehicle->image->file_name) {
                if ($vehicle->image) {
                    $vehicle->image->delete();
                }

                $vehicle->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($vehicle->image) {
            $vehicle->image->delete();
        }

        return (new VehicleResource($vehicle))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
