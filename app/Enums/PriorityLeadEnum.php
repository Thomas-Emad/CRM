<?php

namespace App\Enums;

enum PriorityLeadEnum: int
{
    case Low = 0;
    case Medium = 1;
    case High = 2;

    public function label(): string
    {
        return match ($this) {
            self::Low => 'Low',
            self::Medium => 'Medium',
            self::High => 'High',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Low => 'success',
            self::Medium => 'warning',
            self::High => 'danger',
        };
    }
}
