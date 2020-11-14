<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostingAllocationRequest;
use App\Http\Requests\UpdatePostingAllocationRequest;
use App\Http\Resources\Admin\PostingAllocationResource;
use App\Models\PostingAllocation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostingAllocationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('posting_allocation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PostingAllocationResource(PostingAllocation::with(['name', 'region_name', 'office_name'])->get());
    }

    public function store(StorePostingAllocationRequest $request)
    {
        $postingAllocation = PostingAllocation::create($request->all());

        return (new PostingAllocationResource($postingAllocation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PostingAllocation $postingAllocation)
    {
        abort_if(Gate::denies('posting_allocation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PostingAllocationResource($postingAllocation->load(['name', 'region_name', 'office_name']));
    }

    public function update(UpdatePostingAllocationRequest $request, PostingAllocation $postingAllocation)
    {
        $postingAllocation->update($request->all());

        return (new PostingAllocationResource($postingAllocation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PostingAllocation $postingAllocation)
    {
        abort_if(Gate::denies('posting_allocation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postingAllocation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
