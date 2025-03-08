<?php

namespace App\Repositories;

use App\Models\{User, Team, TeamEmployee};
use App\Interfaces\TeamRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TeamRepository implements TeamRepositoryInterface
{
    /**
     * Retrieve all teames with their ID, name, and description.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all(string $title = ''): LengthAwarePaginator
    {
        return Team::withCount('employees')
            ->where('name', 'like', "%$title%")
            ->orderBy('employees_count', 'desc')
            ->paginate(10);
    }

    /**
     * Retrieves all users with their ID, name, and email.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The collection of users.
     */
    public function getUsers(string $title): LengthAwarePaginator
    {
        return User::with('teams')
            ->where('name', 'like', "%$title%")
            ->select('id', 'name', 'email')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'sales');
            })
            ->paginate(10);
    }

    /**
     * Retrieves a team by its ID.
     *
     * @param int $id The ID of the team to retrieve.
     *
     * @return \App\Models\Team|null The team if found, otherwise null.
     */
    public function getWithEmployees(int $id, string $search): ?Team
    {
        return Team::with([
            'employees' => function ($query) use ($search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                });
            }
        ])->findOrFail($id);
    }

    /**
     * Retrieves a team by its ID.
     *
     * @param int $id The ID of the team to retrieve.
     *
     * @return \App\Models\Team|null The team if found, otherwise null.
     */
    public function get(int $id): ?Team
    {
        return Team::findOrFail($id);
    }

    /**
     * Stores a new team using the given attributes.
     *
     * @param array $attributes The attributes for creating the team.
     *
     * @return bool True if the team was successfully created, otherwise false.
     */
    public function store(array $attributes): Team
    {
        return Team::create($attributes);
    }

    /**
     * Updates a team by its ID.
     *
     * @param int $id The ID of the team to update.
     * @param array $attributes The attributes to update with.
     *
     * @return bool True if the team was updated, otherwise false.
     */
    public function update(int $id, array $attributes): bool
    {
        $team = Team::findorFail($id);
        return $team->update($attributes);
    }

    /**
     * Deletes a team by its ID.
     *
     * @param int $id The ID of the team to delete.
     *
     * @return bool True if the team was deleted, otherwise false.
     */
    public function delete(int $id): bool
    {
        $team = Team::findOrFail($id);
        return  $team->delete();
    }

    /**
     * Adds an employee to a team.
     *
     * @param int $teamId The ID of the team to add the employee to.
     * @param int $userId The ID of the employee to add.
     *
     * @return \App\Models\TeamEmployee The newly created team-employee relationship.
     */
    public function addEmployee(int $teamId, int $userId): TeamEmployee
    {
        $team = Team::findOrFail($teamId);
        return $team->employees()->create([
            'user_id' => $userId
        ]);
    }

    /**
     * Removes an employee from a team.
     *
     * @param int $teamId The ID of the team to remove the employee from.
     * @param int $userId The ID of the employee to remove.
     *
     * @return bool True if the employee was removed, otherwise false.
     */
    public function removeEmployee(int $teamId, int $userId): Bool
    {
        return TeamEmployee::where('team_id', $teamId)->where('user_id', $userId)->delete();
    }

    /**
     * The validation rules for the group.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|max:2000',
        ];
    }
}
