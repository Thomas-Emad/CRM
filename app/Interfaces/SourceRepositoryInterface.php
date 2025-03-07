<?php

namespace App\Interfaces;


use Illuminate\Database\Eloquent\Collection;
use App\Models\Source;

interface SourceRepositoryInterface
{
    public function all(): Collection;
    public function get(int $id): ?Source;
    public function delete(int $id): ?bool;
    public function store(array $attributes): Source;
    public function update(int $id, array $attributes): bool;
    public function rules(): array;
}
