<?php

namespace App\Repositories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\StatusRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StatusRepository implements StatusRepositoryInterface
{
    /**
     * Retrieve all statuses with their ID, name, and color.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all(string $title = ''): LengthAwarePaginator
    {
        return Status::select(['id', 'name', 'color'])->where('name', 'like', "%$title%")->paginate(10);
    }

    /**
     * Retrieves a status by its ID.
     *
     * @param int $id The ID of the status to retrieve.
     *
     * @return \App\Models\Status|null The status if found, otherwise null.
     */
    public function get(int $id): ?Status
    {
        return Status::select(['id', 'name', 'color'])->findOrFail($id);
    }

    /**
     * Stores a new status using the given attributes.
     *
     * @param array $attributes The attributes for creating the status.
     *
     * @return bool True if the status was successfully created, otherwise false.
     */
    public function store(array $attributes): Status
    {
        return Status::create($attributes);
    }

    /**
     * Updates a status by its ID.
     *
     * @param int $id The ID of the status to update.
     * @param array $attributes The attributes to update with.
     *
     * @return bool True if the status was updated, otherwise false.
     */
    public function update(int $id, array $attributes): bool
    {
        $status = Status::findorFail($id);
        return $status->update($attributes);
    }

    /**
     * Deletes a status by its ID.
     *
     * @param int $id The ID of the status to delete.
     *
     * @return bool True if the status was deleted, otherwise false.
     */
    public function delete(int $id): bool
    {
        $status = Status::findOrFail($id);
        return  $status->delete();
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
            'color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
        ];
    }
}
