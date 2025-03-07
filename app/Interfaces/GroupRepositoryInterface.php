<?php

namespace App\Interfaces;


use Illuminate\Database\Eloquent\Collection;
use App\Models\Group;

interface GroupRepositoryInterface
{
    public function all(): Collection;
    public function get(int $id): ?Group;
    public function delete(int $id): ?bool;
    public function store(array $attributes): Group;
    public function update(int $id, array $attributes): bool;
    public function rules(): array;
}
