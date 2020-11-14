<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVehicleAllocationRequest;
use App\Http\Requests\UpdateVehicleAllocationRequest;
use App\Http\Resources\Admin\VehicleAllocationResource;
use App\Models\VehicleAllocation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleAllocationApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vehicle_allocation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleAllocationResource(VehicleAllocation::with(['vehicle', 'region', 'division', 'allottee_name', 'allottee_designation'])->get());
    }

    public function store(StoreVehicleAllocationRequest $request)
    {
        $vehicleAllocation = VehicleAllocation::create($request->all());

        return (new VehicleAllocationResource($vehicleAllocation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VehicleAllocation $vehicleAllocation)
    {
        abort_if(Gate::denies('vehicle_allocation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleAllocationResource($vehicleAllocation->load(['vehicle', 'region', 'division', 'allottee_name', 'allottee_designation']));
    }

    public function update(UpdateVehicleAllocationRequest $request, VehicleAllocation $vehicleAllocation)
    {
        $vehicleAllocation->update($request->all());

        return (new VehicleAllocationResource($vehicleAllocation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VehicleAllocation $vehicleAllocation)
    {
        abort_if(Gate::denies('vehicle_allocation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicleAllocation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
