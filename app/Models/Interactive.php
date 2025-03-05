<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interactive extends Model
{
    protected $fillable = [
        'lead_id',
        'user_id',
        'type',
        'status_id',
        'title',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
