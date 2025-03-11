<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Meeting extends Model
{
    protected $fillable = [
        'start',
        'end',
        'online',
        'link',
        'location',
    ];



    public function activity(): MorphOne
    {
        return $this->morphOne(Activity::class, 'activityable');
    }
}
