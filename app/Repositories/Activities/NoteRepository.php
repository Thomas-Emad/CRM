<?php

namespace App\Repositories\Activities;


use App\Models\{Note, Lead};
use Illuminate\Support\Facades\Auth;
use App\Interfaces\Activities\NoteRepositoryInterface;

class NoteRepository implements NoteRepositoryInterface
{
    /**
     * Retrieves a call by its ID.
     *
     * @param int $id The ID of the call to retrieve.
     *
     * @return \App\Models\Note|null The call if found, otherwise null.
     */
    public function get(int $id): ?Note
    {
        return Note::with([
            'lead:id,name',
            'noteable',
        ])->findOrFail($id);
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
        $lead = Lead::findOrFail($attributes['lead_id']);
        $lead->notes()->create([
            'lead_id' => $attributes['lead_id'],
            'creator_id' => Auth::id(),
            'content' => $attributes['content'],
        ]);
    }

    /**
     * Updates a note by its ID.
     *
     * @param int $id The ID of the note to update.
     * @param array $attributes The attributes to update with.
     *
     * @return \App\Models\Note The note if updated, otherwise null.
     */
    public function update(int $id, array $attributes): Note
    {
        $note = Note::findOrFail($id);
        $note->notes()->update([
            'lead_id' => $attributes['lead_id'],
            'creator_id' => Auth::id(),
            'content' => $attributes['content'],
        ]);
        return $note;
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
        $lead = Note::findOrFail($id);
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
            'content' => 'required|string|max:2000',
        ];
    }
}
