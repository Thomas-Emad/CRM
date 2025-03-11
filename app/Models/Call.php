<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Call extends Model
{
    protected $fillable = [
        'call_reason_id',
        'call_response_id',
        'call_date',
        'duration_call',
        'type',
    ];



    public function activity(): MorphOne
    {
        return $this->morphOne(Activity::class, 'activityable');
    }

    public function callReason(): BelongsTo
    {
        return $this->belongsTo(CallReason::class);
    }

    public function callResponse(): BelongsTo
    {
        return $this->belongsTo(CallResponse::class);
    }
}
