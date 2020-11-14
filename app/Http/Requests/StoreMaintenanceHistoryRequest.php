<?php

namespace App\Http\Requests;

use App\Models\MaintenanceHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMaintenanceHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('maintenance_history_create');
    }

    public function rules()
    {
        return [
            'region_name_id'         => [
                'required',
                'integer',
            ],
            'office_name_id'         => [
                'required',
                'integer',
            ],
            'registration_number_id' => [
                'required',
                'integer',
            ],
            'date'                   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'cost'                   => [
                'string',
                'required',
            ],
            'work_detail'            => [
                'required',
            ],
        ];
    }
}
