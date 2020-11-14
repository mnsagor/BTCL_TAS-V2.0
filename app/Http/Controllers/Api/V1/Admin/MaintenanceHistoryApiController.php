<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMaintenanceHistoryRequest;
use App\Http\Requests\UpdateMaintenanceHistoryRequest;
use App\Http\Resources\Admin\MaintenanceHistoryResource;
use App\Models\MaintenanceHistory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceHistoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('maintenance_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MaintenanceHistoryResource(MaintenanceHistory::with(['region_name', 'office_name', 'registration_number'])->get());
    }

    public function store(StoreMaintenanceHistoryRequest $request)
    {
        $maintenanceHistory = MaintenanceHistory::create($request->all());

        return (new MaintenanceHistoryResource($maintenanceHistory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MaintenanceHistory $maintenanceHistory)
    {
        abort_if(Gate::denies('maintenance_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MaintenanceHistoryResource($maintenanceHistory->load(['region_name', 'office_name', 'registration_number']));
    }

    public function update(UpdateMaintenanceHistoryRequest $request, MaintenanceHistory $maintenanceHistory)
    {
        $maintenanceHistory->update($request->all());

        return (new MaintenanceHistoryResource($maintenanceHistory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MaintenanceHistory $maintenanceHistory)
    {
        abort_if(Gate::denies('maintenance_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maintenanceHistory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
