<?php

namespace App\Repositories;

use App\Models\LeadType;
use App\Interfaces\LeadTypeRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LeadTypeRepository implements LeadTypeRepositoryInterface
{
    /**
     * Retrieve all types with their ID, name, and description.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The collection of users.
     */
    public function all(string $title = ''): LengthAwarePaginator
    {
        return LeadType::select(['id', 'name'])
            ->where('name', 'like', "%$title%")->paginate(10);
    }

    /**
     * Retrieves a unit by its ID.
     *
     * @param int $id The ID of the unit to retrieve.
     *
     * @return \App\Models\LeadType|null The unit if found, otherwise null.
     */
    public function get(int $id): ?LeadType
    {
        return LeadType::select(['id', 'name'])->findOrFail($id);
    }


    /**
     * Stores a new unit using the given attributes.
     *
     * @param array $attributes The attributes for creating the unit.
     *
     * @return \App\Models\LeadType The unit if it was successfully created.
     */
    public function store(array $attributes): LeadType
    {
        return LeadType::create($attributes);
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
        $unit = LeadType::findorFail($id);
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
        $unit = LeadType::findOrFail($id);
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
