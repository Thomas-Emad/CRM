<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BillingCustomer extends Model
{
    protected $fillable = [
        'country_id',
        'customer_id',
        'street',
        'city',
        'zip_code',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
