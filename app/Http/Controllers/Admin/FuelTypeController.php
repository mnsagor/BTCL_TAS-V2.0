<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyFuelTypeRequest;
use App\Http\Requests\StoreFuelTypeRequest;
use App\Http\Requests\UpdateFuelTypeRequest;
use App\Models\FuelType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FuelTypeController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('fuel_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fuelTypes = FuelType::all();

        return view('admin.fuelTypes.index', compact('fuelTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('fuel_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fuelTypes.create');
    }

    public function store(StoreFuelTypeRequest $request)
    {
        $fuelType = FuelType::create($request->all());

        return redirect()->route('admin.fuel-types.index');
    }

    public function edit(FuelType $fuelType)
    {
        abort_if(Gate::denies('fuel_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fuelTypes.edit', compact('fuelType'));
    }

    public function update(UpdateFuelTypeRequest $request, FuelType $fuelType)
    {
        $fuelType->update($request->all());

        return redirect()->route('admin.fuel-types.index');
    }

    public function show(FuelType $fuelType)
    {
        abort_if(Gate::denies('fuel_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fuelTypes.show', compact('fuelType'));
    }

    public function destroy(FuelType $fuelType)
    {
        abort_if(Gate::denies('fuel_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fuelType->delete();

        return back();
    }

    public function massDestroy(MassDestroyFuelTypeRequest $request)
    {
        FuelType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
