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

    public function scopefilter($query, $modal, $type)
    {
        return match ($modal) {
            'call' => $this->filterCallsBy($query, $type),
            'meeting' => $this->filterMeetingsBy($query, $type),
        };
    }

    private function filterCallsBy($query, $type)
    {
        return match ($type) {
            'all' => $query,
            'coming' => $query->whereHasMorph(
                'activityable',
                [Call::class],
                function ($query) {
                    $query->where('call_date', '>', now());
                }
            ),
            'past' => $query->whereHasMorph(
                'activityable',
                [Call::class],
                function ($query) {
                    $query->where('call_date', '<', now());
                }
            ),
            default => $query,
        };
    }

    private function filterMeetingsBy($query, $type)
    {
        return match ($type) {
            'all' => $query,
            'coming' => $query->whereHasMorph(
                'activityable',
                [Meeting::class],
                function ($query) {
                    $query->where('start', '>', now());
                }
            ),
            'past' => $query->whereHasMorph(
                'activityable',
                [Meeting::class],
                function ($query) {
                    $query->where('end', '<', now());
                }
            ),
            default => $query,
        };
    }
}
