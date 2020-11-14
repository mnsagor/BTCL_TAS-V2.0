<?php

namespace App\Http\Requests;

use App\Models\RequisitionRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRequisitionRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('requisition_request_edit');
    }

    public function rules()
    {
        return [
            'name'           => [
                'string',
                'required',
            ],
            'designation'    => [
                'string',
                'required',
            ],
            'phone_number'   => [
                'string',
                'required',
            ],
            'start_time'     => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_time'       => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'request_status' => [
                'required',
            ],
        ];
    }
}
