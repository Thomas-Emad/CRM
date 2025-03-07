<?php

namespace App\Repositories;

use App\Models\Group;
use App\Interfaces\GroupRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GroupRepository implements GroupRepositoryInterface
{
    /**
     * Retrieve all groups with their ID, name, and description.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(string $title = ''): Collection
    {
        return Group::select(['id', 'name', 'description'])->where('name', 'like', "%$title%")->get();
    }

    /**
     * Retrieves a group by its ID.
     *
     * @param int $id The ID of the group to retrieve.
     *
     * @return \App\Models\Group|null The group if found, otherwise null.
     */
    public function get(int $id): ?Group
    {
        return Group::select(['id', 'name', 'description'])->findOrFail($id);
    }

    /**
     * Stores a new group using the given attributes.
     *
     * @param array $attributes The attributes for creating the group.
     *
     * @return bool True if the group was successfully created, otherwise false.
     */

    public function store(array $attributes): Group
    {
        return Group::create($attributes);
    }

    /**
     * Updates a group by its ID.
     *
     * @param int $id The ID of the group to update.
     * @param array $attributes The attributes to update with.
     *
     * @return bool True if the group was updated, otherwise false.
     */
    public function update(int $id, array $attributes): bool
    {
        $group = Group::findorFail($id);
        return $group->update($attributes);
    }

    /**
     * Deletes a group by its ID.
     *
     * @param int $id The ID of the group to delete.
     *
     * @return bool True if the group was deleted, otherwise false.
     */
    public function delete(int $id): bool
    {
        $group = Group::findOrFail($id);
        return  $group->delete();
    }


    /**
     * The validation rules for the group.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'description' => 'nullable|string|max:2000',
        ];
    }
}
