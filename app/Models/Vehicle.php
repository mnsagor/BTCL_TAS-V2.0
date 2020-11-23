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

class Vehicle extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'vehicles';

    const DRIVER_ALLOCATION_STATUS_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    const VEHICLE_ALLOCATION_STATUS_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    protected $appends = [
        'fc_file',
        'tt_file',
        'other_document',
        'image',
    ];

    public static $searchable = [
        'registration_number',
        'chassis_number',
        'engine_number',
    ];

    const CONDITION_SELECT = [
        'Weak'      => 'Weak',
        'Medium'    => 'Medium',
        'Strong'    => 'Strong',
        'Abandoned' => 'Abandoned',
        'Lost'      => 'Lost',
    ];

    protected $dates = [
        'ragistration_date',
        'fc_start_date',
        'fc_end_date',
        'tt_start_date',
        'tt_end_date',
        'engine_overhaulting_date',
        'entry_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'registration_number',
        'vehicle_type_id',
        'model',
        'model_year',
        'engine_capacity',
        'chassis_number',
        'engine_number',
        'condition',
        'ragistration_date',
        'fc_start_date',
        'fc_end_date',
        'tt_start_date',
        'tt_end_date',
        'fuel_consumption_rate',
        'engine_overhaulting_date',
        'vehicle_source',
        'entry_date',
        'vehicle_allocation_status',
        'driver_allocation_status',
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

    public function vehicleVehicleAllocations()
    {
        return $this->hasMany(VehicleAllocation::class, 'vehicle_id', 'id');
    }

    public function registrationNumberDriverAllocations()
    {
        return $this->hasMany(DriverAllocation::class, 'registration_number_id', 'id');
    }

    public function registrationNumberMaintenanceHistories()
    {
        return $this->hasMany(MaintenanceHistory::class, 'registration_number_id', 'id');
    }

    public function vehicle_type()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }

    public function getRagistrationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRagistrationDateAttribute($value)
    {
        $this->attributes['ragistration_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFcStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFcStartDateAttribute($value)
    {
        $this->attributes['fc_start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFcEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFcEndDateAttribute($value)
    {
        $this->attributes['fc_end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFcFileAttribute()
    {
        return $this->getMedia('fc_file');
    }

    public function getTtStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTtStartDateAttribute($value)
    {
        $this->attributes['tt_start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTtEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTtEndDateAttribute($value)
    {
        $this->attributes['tt_end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTtFileAttribute()
    {
        return $this->getMedia('tt_file');
    }

    public function getOtherDocumentAttribute()
    {
        return $this->getMedia('other_document');
    }

    public function fuel_types()
    {
        return $this->belongsToMany(FuelType::class);
    }

    public function getEngineOverhaultingDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEngineOverhaultingDateAttribute($value)
    {
        $this->attributes['engine_overhaulting_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEntryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEntryDateAttribute($value)
    {
        $this->attributes['entry_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getImageAttribute()
    {
        $files = $this->getMedia('image');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
}
