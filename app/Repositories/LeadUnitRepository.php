<?php

namespace App\Repositories;

use App\Models\LeadUnit;
use App\Interfaces\LeadUnitRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LeadUnitRepository implements LeadUnitRepositoryInterface
{
    /**
     * Retrieve all units with their ID, name, and description.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The collection of users.
     */
    public function all(string $title = ''): LengthAwarePaginator
    {
        return LeadUnit::select(['id', 'name'])
            ->where('name', 'like', "%$title%")->paginate(10);
    }

    /**
     * Retrieves a unit by its ID.
     *
     * @param int $id The ID of the unit to retrieve.
     *
     * @return \App\Models\LeadUnit|null The unit if found, otherwise null.
     */
    public function get(int $id): ?LeadUnit
    {
        return LeadUnit::select(['id', 'name'])->findOrFail($id);
    }


    /**
     * Stores a new unit using the given attributes.
     *
     * @param array $attributes The attributes for creating the unit.
     *
     * @return \App\Models\LeadUnit The unit if it was successfully created.
     */
    public function store(array $attributes): LeadUnit
    {
        return LeadUnit::create($attributes);
    }

    /**
     * Updates a unit by its ID.
     *
     * @param int $id The ID of the unit to update.
     * @param array $attributes The attributes to update with.
     *
     * @return bool True if the unit was updated, otherwise false.
     */
    public function update(int $id, array $attributes): bool
    {
        $unit = LeadUnit::findorFail($id);
        return $unit->update($attributes);
    }

    /**
     * Deletes a unit by its ID.
     *
     * @param int $id The ID of the unit to delete.
     *
     * @return bool True if the unit was deleted, otherwise false.
     */
    public function delete(int $id): bool
    {
        $unit = LeadUnit::findOrFail($id);
        return  $unit->delete();
    }

    /**
     * The validation rules for the unit.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
        ];
    }
}
