<?php

namespace App\Http\Requests;

use App\Models\FuelType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFuelTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fuel_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:fuel_types,name,' . request()->route('fuel_type')->id,
            ],
        ];
    }
}
