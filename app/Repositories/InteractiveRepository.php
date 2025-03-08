<?php

namespace App\Repositories;

use App\Models\Interactive;
use App\Interfaces\InteractiveRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class InteractiveRepository implements InteractiveRepositoryInterface
{
    /**
     * Retrieve all leads with their ID, name, and description.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The collection of users.
     */
    public function all(string $title = ''): Collection
    {
        return Interactive::query()
            ->with([
                'status:id,name,color',
                'interactives:id,created_at',
                'assigned:id,name',
                'source:id,name',
                'country:id,name',
            ])
            ->where('name', 'like', "%$title%")
            ->orderBy('is_customer', 'desc')
            ->get();
    }

    /**
     * Retrieves a lead by its ID.
     *
     * @param int $id The ID of the lead to retrieve.
     *
     * @return \App\Models\Interactive|null The lead if found, otherwise null.
     */
    public function get(int $id): ?Interactive
    {
        return Interactive::findOrFail($id);
    }

    /**
     * Stores a new lead using the given attributes.
     *
     * @param array $attributes The attributes for creating the lead.
     *
     * @return bool True if the lead was successfully created, otherwise false.
     */

    public function store(int $leadId, array $attributes): Interactive
    {
        return Interactive::create(array_merge($attributes, [
            'lead_id' => $leadId,
            'user_id' => auth()->id(),
        ]));;
    }

    /**
     * Updates a lead by its ID.
     *
     * @param int $id The ID of the lead to update.
     * @param array $attributes The attributes to update with.
     *
     * @return bool True if the lead was updated, otherwise false.
     */
    public function update(int $id, array $attributes): bool
    {
        $Interactive = Interactive::findOrFail($id);
        return $Interactive->update($attributes);
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
        $lead = Interactive::findOrFail($id);
        return $lead->delete();
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
            'title' => 'required|string|min:3',
            'content' => 'required|string|max:2000',
            'type' => 'required|string',
            'status_id' => 'required|exists:statuses,id',
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
            'status_id' => 'status',
            'source_id' => 'source',
            'assigned_id' => 'assigned',
            'group_id' => 'group',
            'country_id' => 'country',
        ];
    }
}
