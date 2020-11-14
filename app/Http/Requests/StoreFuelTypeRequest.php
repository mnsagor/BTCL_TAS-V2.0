<?php

namespace App\Http\Requests;

use App\Models\FuelType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFuelTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fuel_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:fuel_types',
            ],
        ];
    }
}
