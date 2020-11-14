<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Office extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'offices';

    public static $searchable = [
        'name',
    ];

    const IS_ACTIVE_RADIO = [
        '1' => 'Active',
        '0' => 'Inactive',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'region_id',
        'name',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function officeNamePostingAllocations()
    {
        return $this->hasMany(PostingAllocation::class, 'office_name_id', 'id');
    }

    public function divisionVehicleAllocations()
    {
        return $this->hasMany(VehicleAllocation::class, 'division_id', 'id');
    }

    public function officeNameDriverAllocations()
    {
        return $this->hasMany(DriverAllocation::class, 'office_name_id', 'id');
    }

    public function officeNameMaintenanceHistories()
    {
        return $this->hasMany(MaintenanceHistory::class, 'office_name_id', 'id');
    }

    public function officeEmployees()
    {
        return $this->hasMany(Employee::class, 'office_id', 'id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
