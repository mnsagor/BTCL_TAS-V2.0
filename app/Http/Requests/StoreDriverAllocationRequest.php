<?php

namespace App\Http\Requests;

use App\Models\DriverAllocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDriverAllocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('driver_allocation_create');
    }

    public function rules()
    {
        return [
            'office_name_id'         => [
                'required',
                'integer',
            ],
            'driver_name_id'         => [
                'required',
                'integer',
            ],
            'registration_number_id' => [
                'required',
                'integer',
            ],
            'allocation_date'        => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
