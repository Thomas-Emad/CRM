<?php

namespace App\Interfaces\Activities;

use Illuminate\Support\Collection;

interface CallRepositoryInterface
{
    public function typeCalling(): Collection;
}
