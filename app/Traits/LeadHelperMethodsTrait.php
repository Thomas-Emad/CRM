<?php

namespace App\Traits;

use App\Enums\PriorityLeadEnum;

trait LeadHelperMethodsTrait
{
    private function sections()
    {
        return collect([
            [
                'id' => 'private',
                'name' => 'Private'
            ],
            [
                'id' => 'military',
                'name' => 'Military'
            ],
        ])->map(function ($item) {
            return (object) $item;
        });
    }

    private function priorities()
    {
        return collect([
            [
                'id' => PriorityLeadEnum::Low->value,
                'name' => PriorityLeadEnum::Low->label()
            ],
            [
                'id' => PriorityLeadEnum::Medium->value,
                'name' => PriorityLeadEnum::Medium->label()
            ],
            [
                'id' => PriorityLeadEnum::High->value,
                'name' => PriorityLeadEnum::High->label()
            ],
        ])->map(function ($item) {
            return (object) $item;
        });
    }
}
