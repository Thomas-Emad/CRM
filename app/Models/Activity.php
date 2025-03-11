<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Activity extends Model
{
    protected $fillable = [
        'lead_id',
        'assigned_id',
        'creator_id',
        'reminder',
        'type',
        'title',
        'notes',
        'activityable_type',
        'activityable_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($activiy) {
            $activiy->activityable->delete();
        });
    }


    public function activityable()
    {
        return $this->morphTo();
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function assigned()
    {
        return $this->belongsTo(User::class,  'assigned_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class,  'creator_id');
    }
}
