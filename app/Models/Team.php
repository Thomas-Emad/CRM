<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function employees(): HasMany
    {
        return $this->hasMany(TeamEmployee::class);
    }
}
