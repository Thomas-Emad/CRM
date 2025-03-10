<?php

namespace App\Enums;

enum CallTypesEnum: string
{
    case InComing = 'incoming';
    case OutGoing = 'outgoing';
    case Missing = 'missing';

    public function label(): string
    {
        return match ($this) {
            self::InComing => 'Incoming Call',
            self::OutGoing => 'Outgoing Call',
            self::Missing => 'Missing Call',
        };
    }
}
