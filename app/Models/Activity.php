<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'lead_id',
        'assigned_to',
        'creator_id',
        'reminder',
        'type',
        'title',
        'notes',
        'activityable_type',
        'activityable_id'
    ];



    public function activityable()
    {
        return $this->morphTo();
    }

    public function call()
    {
        return $this->belongsTo(Call::class);
    }

    public function assigned()
    {
        return $this->belongsTo(User::class, 'assigned_id');
    }
}
