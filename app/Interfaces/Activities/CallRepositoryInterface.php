<?php

namespace App\Interfaces\Activities;

use Illuminate\Support\Collection;
use App\Models\Activity;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CallRepositoryInterface
{
    public function all(string $search,  string $type): LengthAwarePaginator;
    public function get(int $id): ?Activity;
    public function getCalls(int $id): Collection;
    public function getNotes(int $id): Collection;
    public function getLeads(): Collection;
    public function store(array $attributes): void;
    public function update(int $id, array $attributes): Activity;
    public function delete(int $id): bool;
    public function typeCalling(): Collection;
    public function callReason(): Collection;
    public function callResponse(): Collection;
    public function rules(): array;
    public function attributes(): array;
}
