<?php

namespace App\Repositories\Activities;

use App\Enums\CallTypesEnum;
use App\Enums\ActivityTypeEnum;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Activities\CallRepositoryInterface;
use App\Models\{Call, CallReason, CallResponse, Activity};

class CallRepository implements CallRepositoryInterface
{
    /**
     * Stores a new call.
     *
     * This method creates a new call using the given attributes and creates an activity log entry
     * for the new call.
     *
     * @param array $attributes The attributes for creating the lead.
     */
    public function store(array $attributes): void
    {
        $call = Call::create([
            'call_reason_id' => $attributes['reason_id'],
            'call_response_id' => $attributes['response_id'],
            'call_date' => $attributes['date_calling'],
            'duration_call' => $attributes['duration'],
            'type' => $attributes['typeCall'],
        ]);

        Activity::create([
            'lead_id' => $attributes['lead_id'],
            'assigned_id' => $attributes['assigned_id'],
            'creator_id' => Auth::id(),
            'reminder' => $attributes['reminder'],
            'type' => ActivityTypeEnum::Calls->value,
            'title' => $attributes['title'],
            'notes' => $attributes['notes'],
            'activityable_type' => Call::class,
            'activityable_id' => $call->id,
        ]);
    }

    /**
     * Updates a lead by its ID.
     *
     * @param int $id The ID of the lead to update.
     * @param array $attributes The attributes to update with.
     *
     * @return \App\Models\Call The lead if updated, otherwise null.
     */
    public function update(int $id, array $attributes): Call
    {
        $lead = Call::findorFail($id);
        $lead->update($attributes);
        return $lead;
    }

    /**
     * Deletes a lead by its ID.
     *
     * @param int $id The ID of the lead to delete.
     *
     * @return bool True if the lead was deleted, otherwise false.
     */
    public function delete(int $id): bool
    {
        $lead = Call::findOrFail($id);
        return  $lead->delete();
    }

    public function typeCalling(): Collection
    {
        return collect([
            ['id' => CallTypesEnum::InComing->value, 'name' => CallTypesEnum::InComing->label()],
            ['id' => CallTypesEnum::OutGoing->value, 'name' => CallTypesEnum::OutGoing->label()],
            ['id' => CallTypesEnum::Missing->value, 'name' => CallTypesEnum::Missing->label()],
        ])->map(function ($item) {
            return (object) $item;
        });
    }

    public function callReason(): Collection
    {
        return CallReason::get(['id', 'name']);
    }

    public function callResponse(): Collection
    {
        return CallResponse::get(['id', 'name']);
    }


    /**
     * The validation rules for the lead.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'lead_id' => 'required|exists:leads,id',
            'assigned_id' => 'required|exists:users,id',
            'typeCall' => 'required|string|max:255',
            'date_calling' => 'required|date',
            'title' => 'nullable|string|max:255',
            'reminder' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'reason_id' => 'nullable|exists:call_reasons,id',
            'response_id' => 'nullable|exists:call_response,id',
            'notes' => 'nullable|string|max:2000',
        ];
    }


    /**
     * Maps the attribute names to their related model property names.
     *
     * This is used to easily convert the attributes from the request to the
     * related model's property names.
     *
     * @return array<string,string>
     */
    public function attributes(): array
    {
        return [
            'lead_id' => 'lead',
            'source_id' => 'source',
            'assigned_id' => 'assigned',
            'reason_id' => 'reason call',
            'response_id' => 'response call',
        ];
    }
}
