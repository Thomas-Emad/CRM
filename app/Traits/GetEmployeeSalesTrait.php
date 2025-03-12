<?php

namespace App\Traits;

use App\Models\User;

trait GetEmployeeSalesTrait
{
    /**
     * Retrieve a collection of users associated with a specific team.
     *
     * This method queries the users who belong to the team specified
     * by the given team ID and returns their IDs and names.
     *
     * @param int|null $team_id The ID of the team to filter users by.
     * @return \Illuminate\Database\Eloquent\Collection A collection of users with 'id' and 'name' attributes.
     */
    public function employees(?int $team_id)
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'sales');
        })
            ->whereHas('teams', function ($query) use ($team_id) {
                $query->where('teams.id', $team_id);
            })->get(['id', 'name']);
    }
}
