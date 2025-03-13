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
        'company',
        'parent_account',
        'contractor',
        'developer',
        'consultant',
        'investor',
        'architect',
        'industry',
        'address',
        'city',
        'person_name',
        'person_phone',
        'person_email',
        'person_position',
        'next_step',
        'next_step_date',
        'step_description',
        'decision_makers',
        'section',
        'status_id',
        'country_id',
        'currency_id',
        'team_id',
        'source_id',
        'lead_type_id',
        'lead_unit_id',
        'assigned_id',
        'priority',
        'date_acquired',
        'lead_value',
        'project_brief',
        'is_customer',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(LeadType::class);
    }
    public function unit(): BelongsTo
    {
        return $this->belongsTo(LeadUnit::class);
    }

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
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

    protected $casts = [
        'next_step_date' => 'date',
        'date_acquired' => 'date',
        'lead_value' => 'double',
        'is_customer' => 'boolean',
    ];
}
