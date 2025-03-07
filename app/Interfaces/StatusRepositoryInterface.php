<?php

namespace App\Interfaces;


use Illuminate\Database\Eloquent\Collection;
use App\Models\Status;

interface StatusRepositoryInterface
{
    public function all(): Collection;
    public function get(int $id): ?Status;
    public function delete(int $id): ?bool;
    public function store(array $attributes): Status;
    public function update(int $id, array $attributes): bool;
    public function rules(): array;
}
