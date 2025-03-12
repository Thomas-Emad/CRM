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

    public function scopeFilter($query, $type)
    {
        return $this->filterBy($query, $type);
    }

    private function filterBy($query, $type)
    {
        return match ($type) {
            'all' => $query,
            'coming' => $query->whereHas('activityable', function ($query) {
                $query->where('call_date', '>', now());
            }),
            'missing' => $query->whereHas('activityable', function ($query) {
                $query->where('call_date', '<', now());
            }),
            default => $query,
        };
    }
}
