<?php

namespace App\Interfaces;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Collection;

interface CustomerRepositoryInterface
{
    public function all(): Collection;
    public function get(int $id): ?Lead;
    public function store(array $attributes): Lead;
    public function update(int $id, array $attributes): Lead;
    public function delete(int $id): ?bool;
    public function rules(): array;
    public function attributes(): array;
}
