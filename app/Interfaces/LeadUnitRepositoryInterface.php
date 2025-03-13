<?php

namespace App\Interfaces;

use App\Models\LeadUnit;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


interface LeadUnitRepositoryInterface
{
    public function all(): LengthAwarePaginator;
    public function get(int $id): ?LeadUnit;
    public function store(array $attributes): LeadUnit;
    public function update(int $id, array $attributes): bool;
    public function delete(int $id): ?bool;
    public function rules(): array;
}
