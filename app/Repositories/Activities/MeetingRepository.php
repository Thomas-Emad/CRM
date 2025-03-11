<?php

namespace App\Repositories\Activities;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Activities\MeetingRepositoryInterface;
use App\Models\{Meeting, Activity, Note};

class MeetingRepository implements MeetingRepositoryInterface
{
    /**
     * Retrieves a meeting by its ID.
     *
     * @param int $id The ID of the meeting to retrieve.
     *
     * @return \App\Models\Activity|null The meeting if found, otherwise null.
     */
    public function get(int $id): ?Activity
    {
        return Activity::with([
            'lead:id,name',
            'assigned:id,name',
            'creator:id,name',
            'activityable',
        ])->findOrFail($id);
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
        ])->where('lead_id', $id)->get();
    }

    /**
     * Stores a new meeting.
     *
     * @param array $attributes The attributes to store a new meeting with.
     *
     * @return void
     */
    public function store(array $attributes): void
    {
        $meeting = Meeting::create($attributes);

        Activity::create([
            'lead_id' => $attributes['lead_id'],
            'assigned_id' => $attributes['assigned_id'],
            'creator_id' => Auth::id(),
            'reminder' => $attributes['reminder'],
            'title' => $attributes['title'],
            'notes' => $attributes['notes'],
            'activityable_type' => Meeting::class,
            'activityable_id' => $meeting->id,
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
        $activity->update($attributes);
        $activity->activityable()->update($attributes);
        return $activity;
    }

    /**
     * Deletes a meeting by its ID.
     *
     * @param int $id The ID of the meeting to delete.
     *
     * @return bool True if the meeting was deleted, otherwise false.
     */
    public function delete(int $id): bool
    {
        $lead = Activity::findOrFail($id);
        return  $lead->delete();
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
            'start' => 'required|string|max:255',
            'end' => 'required|date',
            'online' => 'nullable|boolean',
            'link' => 'nullable|url|max:255',
            'location' => 'nullable|string|max:255',
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
        ];
    }
}
