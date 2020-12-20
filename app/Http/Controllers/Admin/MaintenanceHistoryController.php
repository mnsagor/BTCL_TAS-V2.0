<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMaintenanceHistoryRequest;
use App\Http\Requests\StoreMaintenanceHistoryRequest;
use App\Http\Requests\UpdateMaintenanceHistoryRequest;
use App\Models\MaintenanceHistory;
use App\Models\Office;
use App\Models\Region;
use App\Models\Vehicle;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MaintenanceHistoryController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('maintenance_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MaintenanceHistory::with(['region_name', 'office_name', 'registration_number'])->select(sprintf('%s.*', (new MaintenanceHistory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'maintenance_history_show';
                $editGate      = 'maintenance_history_edit';
                $deleteGate    = 'maintenance_history_delete';
                $crudRoutePart = 'maintenance-histories';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('region_name_name', function ($row) {
                return $row->region_name ? $row->region_name->name : '';
            });

            $table->addColumn('office_name_name', function ($row) {
                return $row->office_name ? $row->office_name->name : '';
            });

            $table->addColumn('registration_number_registration_number', function ($row) {
                return $row->registration_number ? $row->registration_number->registration_number : '';
            });

            $table->editColumn('cost', function ($row) {
                return $row->cost ? $row->cost : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'region_name', 'office_name', 'registration_number']);

            return $table->make(true);
        }

        $regions  = Region::get();
        $offices  = Office::get();
        $vehicles = Vehicle::get();

        return view('admin.maintenanceHistories.index', compact('regions', 'offices', 'vehicles'));
    }

    public function create()
    {
        abort_if(Gate::denies('maintenance_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $region_names = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $office_names = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registration_numbers = Vehicle::all()->pluck('registration_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.maintenanceHistories.create', compact('region_names', 'office_names', 'registration_numbers'));
    }

    public function store(StoreMaintenanceHistoryRequest $request)
    {
        $maintenanceHistory = MaintenanceHistory::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $maintenanceHistory->id]);
        }

        return redirect()->route('admin.maintenance-histories.index');
    }

    public function edit(MaintenanceHistory $maintenanceHistory)
    {
        abort_if(Gate::denies('maintenance_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $region_names = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $office_names = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $registration_numbers = Vehicle::all()->pluck('registration_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $maintenanceHistory->load('region_name', 'office_name', 'registration_number');

        return view('admin.maintenanceHistories.edit', compact('region_names', 'office_names', 'registration_numbers', 'maintenanceHistory'));
    }

    public function update(UpdateMaintenanceHistoryRequest $request, MaintenanceHistory $maintenanceHistory)
    {
        $maintenanceHistory->update($request->all());

        return redirect()->route('admin.maintenance-histories.index');
    }

    public function show(MaintenanceHistory $maintenanceHistory)
    {
        abort_if(Gate::denies('maintenance_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maintenanceHistory->load('region_name', 'office_name', 'registration_number');

        return view('admin.maintenanceHistories.show', compact('maintenanceHistory'));
    }

    public function destroy(MaintenanceHistory $maintenanceHistory)
    {
        abort_if(Gate::denies('maintenance_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maintenanceHistory->delete();

        return back();
    }

    public function massDestroy(MassDestroyMaintenanceHistoryRequest $request)
    {
        MaintenanceHistory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('maintenance_history_create') && Gate::denies('maintenance_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MaintenanceHistory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
