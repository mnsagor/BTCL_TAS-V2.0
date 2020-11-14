<?php

namespace App\Http\Requests;

use App\Models\MaintenanceHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMaintenanceHistoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('maintenance_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:maintenance_histories,id',
        ];
    }
}
