<?php

namespace App\Interfaces;

use App\Models\Group;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


interface GroupRepositoryInterface
{
    public function all(): LengthAwarePaginator;
    public function get(int $id): ?Group;
    public function store(array $attributes): Group;
    public function update(int $id, array $attributes): bool;
    public function delete(int $id): ?bool;
    public function rules(): array;
}
