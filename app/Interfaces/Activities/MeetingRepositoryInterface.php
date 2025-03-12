<?php

namespace App\Interfaces\Activities;

use Illuminate\Support\Collection;
use App\Models\Activity;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface MeetingRepositoryInterface
{
    public function all(string $search, string $type = "all"): LengthAwarePaginator;
    public function get(int $id): ?Activity;
    public function getNotes(int $id): Collection;
    public function getLeads(): Collection;
    public function store(array $attributes): void;
    public function update(int $id, array $attributes): Activity;
    public function delete(int $id): bool;
    public function rules(): array;
    public function attributes(): array;
    public function typeMeeting(): Collection;
    public function getMeetings(int $id): Collection;
}
