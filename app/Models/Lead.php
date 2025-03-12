<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tags',
        'address',
        'position',
        'city',
        'email',
        'company',
        'group_id',
        'website',
        'phone',
        'zip_code',
        'lead_value',
        'description',
        'status_id',
        'assigned_id',
        'currency_id',
        'source_id',
        'country_id',
        'is_customer',
    ];

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function assigned(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }

    public function billings(): HasMany
    {
        return $this->hasMany(BillingCustomer::class, 'customer_id');
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class,);
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'noteable');
    }

    public function allNotes()
    {
        return $this->hasMany(Note::class, 'lead_id',  'id');
    }
}
