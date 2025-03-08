<?php

namespace App\Interfaces;


use App\Models\{Team, TeamEmployee};
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TeamRepositoryInterface
{
    public function all(string $title): LengthAwarePaginator;
    public function getUsers(string $title): LengthAwarePaginator;
    public function get(int $id): ?Team;
    public function getWithEmployees(int $id, string $search): ?Team;
    public function store(array $attributes): Team;
    public function update(int $id, array $attributes): bool;
    public function delete(int $id): ?bool;
    public function rules(): array;
    public function addEmployee(int $teamId, int $userId): TeamEmployee;
    public function removeEmployee(int $teamId, int $userId): Bool;
}
