<?php

namespace App\Interfaces;


use App\Models\Source;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


interface SourceRepositoryInterface
{
    public function all(): LengthAwarePaginator;
    public function get(int $id): ?Source;
    public function store(array $attributes): Source;
    public function update(int $id, array $attributes): bool;
    public function delete(int $id): ?bool;
    public function rules(): array;
}
