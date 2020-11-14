<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDriverAllocationRequest;
use App\Http\Requests\UpdateDriverAllocationRequest;
use App\Http\Resources\Admin\DriverAllocationResource;
use App\Models\DriverAllocation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DriverAllocationApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('driver_allocation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DriverAllocationResource(DriverAllocation::with(['office_name', 'driver_name', 'registration_number'])->get());
    }

    public function store(StoreDriverAllocationRequest $request)
    {
        $driverAllocation = DriverAllocation::create($request->all());

        return (new DriverAllocationResource($driverAllocation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DriverAllocation $driverAllocation)
    {
        abort_if(Gate::denies('driver_allocation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DriverAllocationResource($driverAllocation->load(['office_name', 'driver_name', 'registration_number']));
    }

    public function update(UpdateDriverAllocationRequest $request, DriverAllocation $driverAllocation)
    {
        $driverAllocation->update($request->all());

        return (new DriverAllocationResource($driverAllocation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DriverAllocation $driverAllocation)
    {
        abort_if(Gate::denies('driver_allocation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $driverAllocation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
