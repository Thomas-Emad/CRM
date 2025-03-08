<?php

namespace App\Repositories;

use App\Models\Lead;
use App\Interfaces\LeadRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LeadRepository implements LeadRepositoryInterface
{
    /**
     * Retrieve all leads with their ID, name, and description.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The collection of users.
     */
    public function all(string $title = ''): LengthAwarePaginator
    {
        return Lead::query()
            ->with([
                'status:id,name,color',
                'interactives:id,created_at',
                'assigned:id,name',
                'source:id,name',
                'country:id,name',
            ])
            ->where('name', 'like', "%$title%")
            ->orderBy('is_customer', 'desc')
            ->paginate(10);
    }

    /**
     * Retrieves a lead by its ID.
     *
     * @param int $id The ID of the lead to retrieve.
     *
     * @return \App\Models\Lead|null The lead if found, otherwise null.
     */
    public function get(int $id): ?Lead
    {
        return Lead::with([
            'status:id,name',
            'group:id,name',
            'assigned:id,name',
            'source:id,name',
            'country:id,name',
            'interactives',
            'interactives.status:id,name,color',
        ])->findOrFail($id);
    }

    /**
     * Stores a new lead using the given attributes.
     *
     * @param array $attributes The attributes for creating the lead.
     *
     * @return \App\Models\Lead The lead if it was successfully created, otherwise null.
     */
    public function store(array $attributes): Lead
    {
        return Lead::create($attributes);
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
        $lead = Lead::findorFail($id);
        return $lead->update($attributes);
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
        $lead = Lead::findOrFail($id);
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
            'status_id' => 'required|exists:statuses,id',
            'source_id' => 'required|exists:sources,id',
            'assigned_id' => 'required|exists:users,id',
            'tags' => 'nullable|string',
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'group_id' => 'nullable|exists:groups,id',
            'website' => 'nullable|string|url',
            'country_id' => 'required|exists:countries,id',
            'phone' => 'required|string|max:255',
            'zipCode' => 'nullable|string|max:255',
            'leadValue' => 'nullable|numeric',
            'description' => 'nullable|string|max:2000',
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

    /**
     * Converts a lead to a customer by updating the `is_customer` and `status_id`.
     *
     * @param int $id The lead's ID to convert.
     * @param int $status The status ID to set the lead to.
     *
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the lead is not found.
     */
    public function convertToCustomer(int $id, int $status): void
    {
        $lead = Lead::findOrFail($id);
        $lead->update([
            'is_customer' => true,
            'status_id' => $status
        ]);
    }
}
