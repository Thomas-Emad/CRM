<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingCustomer extends Model
{
    protected $fillable = [
        'country_id',
        'customer_id',
        'street',
        'city',
        'zip_code',
    ];
}
