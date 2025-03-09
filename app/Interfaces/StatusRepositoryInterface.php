<?php

namespace App\Interfaces;


use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface StatusRepositoryInterface
{
    public function all(string $title): LengthAwarePaginator;
    public function get(int $id): ?Status;
    public function store(array $attributes): Status;
    public function update(int $id, array $attributes): bool;
    public function delete(int $id): ?bool;
    public function rules(): array;
}
