<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPostingAllocationRequest;
use App\Http\Requests\StorePostingAllocationRequest;
use App\Http\Requests\UpdatePostingAllocationRequest;
use App\Models\Driver;
use App\Models\Office;
use App\Models\PostingAllocation;
use App\Models\Region;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostingAllocationController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('posting_allocation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postingAllocations = PostingAllocation::all();

        $drivers = Driver::get();

        $regions = Region::get();

        $offices = Office::get();

        return view('admin.postingAllocations.index', compact('postingAllocations', 'drivers', 'regions', 'offices'));
    }

    public function create()
    {
        abort_if(Gate::denies('posting_allocation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $names = Driver::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $region_names = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $office_names = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.postingAllocations.create', compact('names', 'region_names', 'office_names'));
    }

    public function store(StorePostingAllocationRequest $request)
    {
        $postingAllocation = PostingAllocation::create($request->all());

        return redirect()->route('admin.posting-allocations.index');
    }

    public function edit(PostingAllocation $postingAllocation)
    {
        abort_if(Gate::denies('posting_allocation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $names = Driver::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $region_names = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $office_names = Office::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $postingAllocation->load('name', 'region_name', 'office_name');

        return view('admin.postingAllocations.edit', compact('names', 'region_names', 'office_names', 'postingAllocation'));
    }

    public function update(UpdatePostingAllocationRequest $request, PostingAllocation $postingAllocation)
    {
        $postingAllocation->update($request->all());

        return redirect()->route('admin.posting-allocations.index');
    }

    public function show(PostingAllocation $postingAllocation)
    {
        abort_if(Gate::denies('posting_allocation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postingAllocation->load('name', 'region_name', 'office_name');

        return view('admin.postingAllocations.show', compact('postingAllocation'));
    }

    public function destroy(PostingAllocation $postingAllocation)
    {
        abort_if(Gate::denies('posting_allocation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postingAllocation->delete();

        return back();
    }

    public function massDestroy(MassDestroyPostingAllocationRequest $request)
    {
        PostingAllocation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
