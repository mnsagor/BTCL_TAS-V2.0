<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFuelTypeRequest;
use App\Http\Requests\UpdateFuelTypeRequest;
use App\Http\Resources\Admin\FuelTypeResource;
use App\Models\FuelType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FuelTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fuel_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FuelTypeResource(FuelType::all());
    }

    public function store(StoreFuelTypeRequest $request)
    {
        $fuelType = FuelType::create($request->all());

        return (new FuelTypeResource($fuelType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(FuelType $fuelType)
    {
        abort_if(Gate::denies('fuel_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new FuelTypeResource($fuelType);
    }

    public function update(UpdateFuelTypeRequest $request, FuelType $fuelType)
    {
        $fuelType->update($request->all());

        return (new FuelTypeResource($fuelType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(FuelType $fuelType)
    {
        abort_if(Gate::denies('fuel_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fuelType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
