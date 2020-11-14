<?php

namespace App\Http\Requests;

use App\Models\PostingAllocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPostingAllocationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('posting_allocation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:posting_allocations,id',
        ];
    }
}
