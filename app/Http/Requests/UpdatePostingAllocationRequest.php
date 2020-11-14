<?php

namespace App\Http\Requests;

use App\Models\PostingAllocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePostingAllocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('posting_allocation_edit');
    }

    public function rules()
    {
        return [
            'name_id'        => [
                'required',
                'integer',
            ],
            'region_name_id' => [
                'required',
                'integer',
            ],
            'office_name_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
