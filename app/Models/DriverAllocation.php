<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class DriverAllocation extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'driver_allocations';

    protected $dates = [
        'allocation_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'office_name_id',
        'driver_name_id',
        'registration_number_id',
        'allocation_date',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function office_name()
    {
        return $this->belongsTo(Office::class, 'office_name_id');
    }

    public function driver_name()
    {
        return $this->belongsTo(Driver::class, 'driver_name_id');
    }

    public function registration_number()
    {
        return $this->belongsTo(Vehicle::class, 'registration_number_id');
    }

    public function getAllocationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAllocationDateAttribute($value)
    {
        $this->attributes['allocation_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
