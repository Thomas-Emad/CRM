<?php

namespace App\Repositories\Activities;

use App\Enums\CallTypesEnum;
use App\Enums\ActivityTypeEnum;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Activities\CallRepositoryInterface;
use App\Models\{Call, CallReason, CallResponse, Activity, Note};

class CallRepository implements CallRepositoryInterface
{
    /**
     * Retrieves a call by its ID.
     *
     * @param int $id The ID of the call to retrieve.
     *
     * @return \App\Models\Activity|null The call if found, otherwise null.
     */
    public function get(int $id): ?Activity
    {
        return Activity::with([
            'lead:id,name',
            'assigned:id,name',
            'creator:id,name',
            'activityable',
            'activityable.callReason',
            'activityable.callResponse',
        ])->findOrFail($id);
    }

    /**
     * Retrieves all calls of a lead.
     *
     * @param int $id The ID of the lead to retrieve the calls of.
     *
     * @return \Illuminate\Support\Collection A collection of calls.
     */
    public function getCalls(int $id): Collection
    {
        return Activity::with([
            'lead:id,name',
            'activityable',
        ])->where('type', ActivityTypeEnum::Calls->value)
            ->where('lead_id', $id)->get();
    }

    /**
     * Retrieves all notes of a lead.
     *
     * @param int $id The ID of the lead to retrieve the notes from.
     *
     * @return \Illuminate\Support\Collection A collection of notes.
     */
    public function getNotes(int $id): Collection
    {
        return Note::with([
            'creator:id,name',
        ])->where('lead_id', $id)->where('noteable_type', 'App\Models\Call')->get();
    }

    /**
     * Stores a new call.
     *
     * @param array $attributes The attributes to store a new call with.
     *
     * @return void
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
     * Updates a activity by its ID.
     *
     * @param int $id The ID of the activity to update.
     * @param array $attributes The attributes to update with.
     *
     * @return \App\Models\Activity The activity if updated, otherwise null.
     */
    public function update(int $id, array $attributes): Activity
    {
        $activity = Activity::with(['activityable'])->findOrFail($id);
        $activity->update([
            'assigned_id' => $attributes['assigned_id'],
            'reminder' => $attributes['reminder'],
            'title' => $attributes['title'],
            'notes' => $attributes['notes'],
        ]);
        $activity->activityable()->update([
            'call_reason_id' => $attributes['reason_id'],
            'call_response_id' => $attributes['response_id'],
            'call_date' => $attributes['date_calling'],
            'duration_call' => $attributes['duration'],
            'type' => $attributes['typeCall'],
        ]);
        return $activity;
    }

    /**
     * Deletes a call by its ID.
     *
     * @param int $id The ID of the call to delete.
     *
     * @return bool True if the call was deleted, otherwise false.
     */
    public function delete(int $id): bool
    {
        $lead = Activity::findOrFail($id);
        return  $lead->delete();
    }

    /**
     * Retrieves the types of calls.
     *
     * @return \Illuminate\Support\Collection An array of objects containing the id and name of the types of calls.
     */
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

    /**
     * Retrieves the reasons for a call.
     *
     * @return \Illuminate\Support\Collection An array of objects containing the id and name of the reasons for a call.
     */
    public function callReason(): Collection
    {
        return CallReason::get(['id', 'name']);
    }

    /**
     * Retrieves the responses for a call.
     *
     * @return \Illuminate\Support\Collection An array of objects containing the id and name of the responses for a call.
     */
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
            'title' => 'required|string|max:255',
            'reminder' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'reason_id' => 'nullable|exists:call_reasons,id',
            'response_id' => 'nullable|exists:call_responses,id',
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
            'assigned_id' => 'assigned',
            'reason_id' => 'reason call',
            'response_id' => 'response call',
        ];
    }
}
