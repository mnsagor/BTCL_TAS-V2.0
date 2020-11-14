<?php

namespace App\Http\Requests;

use App\Models\Vehicle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVehicleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_create');
    }

    public function rules()
    {
        return [
            'registration_number'      => [
                'string',
                'required',
                'unique:vehicles',
            ],
            'vehicle_type_id'          => [
                'required',
                'integer',
            ],
            'model'                    => [
                'string',
                'nullable',
            ],
            'model_year'               => [
                'string',
                'nullable',
            ],
            'engine_capacity'          => [
                'string',
                'required',
            ],
            'chassis_number'           => [
                'string',
                'required',
                'unique:vehicles',
            ],
            'engine_number'            => [
                'string',
                'required',
                'unique:vehicles',
            ],
            'ragistration_date'        => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fc_start_date'            => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fc_end_date'              => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'tt_start_date'            => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'tt_end_date'              => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fuel_types.*'             => [
                'integer',
            ],
            'fuel_types'               => [
                'array',
            ],
            'fuel_consumption_rate'    => [
                'string',
                'nullable',
            ],
            'engine_overhaulting_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'vehicle_source'           => [
                'string',
                'nullable',
            ],
            'entry_date'               => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'image.*'                  => [
                'required',
            ],
        ];
    }
}
