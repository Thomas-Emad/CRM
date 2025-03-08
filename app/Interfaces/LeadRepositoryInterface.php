<?php

namespace App\Interfaces;


use Illuminate\Database\Eloquent\Collection;
use App\Models\Lead;

interface LeadRepositoryInterface
{
    public function all(): Collection;
    public function get(int $id): ?Lead;
    public function store(array $attributes): Lead;
    public function update(int $id, array $attributes): bool;
    public function delete(int $id): ?bool;
    public function rules(): array;
    public function attributes(): array;
    public function convertToCustomer(int $id, int $status): void;
}
