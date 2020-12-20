<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Driver extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'drivers';

    const IS_POSTED_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    const IS_ALLOCATED_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    const IS_ACTIVE_RADIO = [
        '1' => 'Active',
        '0' => 'Inactive',
    ];

    public static $searchable = [
        'name',
        'mobile',
        'dl_number',
    ];

    protected $dates = [
        'dl_validity_year',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'emp_type',
        'emp_number',
        'mobile',
        'dl_number',
        'dl_validity_year',
        'is_posted',
        'is_allocated',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function namePostingAllocations()
    {
        return $this->hasMany(PostingAllocation::class, 'name_id', 'id');
    }

    public function driverNameDriverAllocations()
    {
        return $this->hasMany(DriverAllocation::class, 'driver_name_id', 'id');
    }

    public function getDlValidityYearAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDlValidityYearAttribute($value)
    {
        $this->attributes['dl_validity_year'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
