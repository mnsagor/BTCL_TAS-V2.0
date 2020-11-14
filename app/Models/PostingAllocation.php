<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class PostingAllocation extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'posting_allocations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_id',
        'region_name_id',
        'office_name_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function name()
    {
        return $this->belongsTo(Driver::class, 'name_id');
    }

    public function region_name()
    {
        return $this->belongsTo(Region::class, 'region_name_id');
    }

    public function office_name()
    {
        return $this->belongsTo(Office::class, 'office_name_id');
    }
}
