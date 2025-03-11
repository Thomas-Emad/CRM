<?php

namespace App\Interfaces\Activities;

use App\Models\Note;

interface NoteRepositoryInterface
{
    public function get(int $id): ?Note;
    public function store($model, $modelId, array $attributes): void;
    public function update(int $id, array $attributes): Note;
    public function delete(int $id): bool;
    public function rules(): array;
}
