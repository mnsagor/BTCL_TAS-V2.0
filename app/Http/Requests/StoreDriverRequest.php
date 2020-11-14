<?php

namespace App\Http\Requests;

use App\Models\Driver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDriverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('driver_create');
    }

    public function rules()
    {
        return [
            'name'             => [
                'string',
                'required',
            ],
            'emp_type'         => [
                'string',
                'nullable',
            ],
            'emp_number'       => [
                'string',
                'nullable',
            ],
            'mobile'           => [
                'string',
                'required',
                'unique:drivers',
            ],
            'dl_number'        => [
                'string',
                'required',
                'unique:drivers',
            ],
            'dl_validity_year' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
