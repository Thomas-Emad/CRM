<?php

namespace App\Repositories\Activities;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Activities\MeetingRepositoryInterface;
use App\Models\{Meeting, Activity, Note};
use App\Enums\ActivityTypeEnum;

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
        ])->where('lead_id', $id)->where('noteable_type', 'App\Models\Meeting')->get();
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
        $meeting = Meeting::create([
            'start' => $attributes['start'],
            'end' => $attributes['end'],
            'online' => $attributes['online'],
            'link' => $attributes['online'] == true ? $attributes['link'] : null,
            'location' => $attributes['online'] == false ? $attributes['location'] : null,
        ]);

        Activity::create([
            'lead_id' => $attributes['lead_id'],
            'assigned_id' => $attributes['assigned_id'],
            'creator_id' => Auth::id(),
            'reminder' => $attributes['reminder'],
            'title' => $attributes['title'],
            'notes' => $attributes['notes'],
            'activityable_type' => Meeting::class,
            'activityable_id' => $meeting->id,
            'type' => ActivityTypeEnum::Meetings->value,
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
        $activity->activityable()->update([
            'start' => $attributes['start'],
            'end' => $attributes['end'],
            'online' => $attributes['online'],
            'link' => $attributes['online'] == true ? $attributes['link'] : null,
            'location' => $attributes['online'] == false ? $attributes['location'] : null,
        ]);
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
            'title' => 'required|string|max:255',
            'lead_id' => 'required|exists:leads,id',
            'assigned_id' => 'required|exists:users,id',
            'start' => 'required|string|max:255',
            'end' => 'required|date',
            'online' => 'nullable|boolean',
            'link' => 'nullable|url|max:255',
            'location' => 'nullable|string|max:255',
            'reminder' => 'nullable|string|max:255',
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
            'start' => "Meeting start date",
            'end' => "Meeting end date"
        ];
    }

    /**
     * Retrieves the types of meetings.
     *
     * @return \Illuminate\Support\Collection An array of objects containing the id and name of the meeting types.
     */
    public function typeMeeting(): Collection
    {
        return collect([
            ['id' => 0, 'name' => "Offline"],
            ['id' => 1, 'name' => "Online"],
        ])->map(function ($item) {
            return (object) $item;
        });
    }


    /**
     * Retrieves all meetings for a given lead.
     *
     * @param int $id The lead's id.
     * @return \Illuminate\Support\Collection A collection of activities that are meetings, eager loaded with the lead and activityable object.
     */
    public function getMeetings(int $id): Collection
    {
        return Activity::with([
            'lead:id,name',
            'activityable',
        ])->where('type', ActivityTypeEnum::Meetings->value)
            ->where('lead_id', $id)->get();
    }
}
