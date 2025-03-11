<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'lead_id',
        'creator_id',
        'content',
        'notable_id',
        'notable_type',
    ];


    public function noteable()
    {
        return $this->morphTo();
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }


    public function creator()
    {
        return $this->belongsTo(User::class,  'creator_id');
    }
}
