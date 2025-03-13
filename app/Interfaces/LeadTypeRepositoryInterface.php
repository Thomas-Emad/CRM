<?php

namespace App\Interfaces;

use App\Models\LeadType;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface LeadTypeRepositoryInterface
{
    public function all(): LengthAwarePaginator;
    public function get(int $id): ?LeadType;
    public function store(array $attributes): LeadType;
    public function update(int $id, array $attributes): bool;
    public function delete(int $id): ?bool;
    public function rules(): array;
}
