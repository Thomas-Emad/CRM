<?php

namespace App\Interfaces;


use Illuminate\Database\Eloquent\Collection;
use App\Models\Interactive;

interface InteractiveRepositoryInterface
{
    public function all(): Collection;
    public function get(int $id): ?Interactive;
    public function store(int $leadId, array $attributes): Interactive;
    public function update(int $id, array $attributes): bool;
    public function delete(int $id): ?bool;
    public function rules(): array;
    public function attributes(): array;
}
