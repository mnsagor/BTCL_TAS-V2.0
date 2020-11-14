<?php

namespace App\Http\Requests;

use App\Models\VehicleAllocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVehicleAllocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_allocation_edit');
    }

    public function rules()
    {
        return [
            'vehicle_id'              => [
                'required',
                'integer',
            ],
            'region_id'               => [
                'required',
                'integer',
            ],
            'division_id'             => [
                'required',
                'integer',
            ],
            'allottee_name_id'        => [
                'required',
                'integer',
            ],
            'allottee_designation_id' => [
                'required',
                'integer',
            ],
            'allotment_date'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
