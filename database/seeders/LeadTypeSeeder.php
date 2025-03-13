<?php

namespace Database\Seeders;

use App\Models\LeadType;
use Illuminate\Database\Seeder;

class LeadTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Project'],
            ['name' => 'Supplies'],
            ['name' => 'Consultation'],
            ['name' => 'Maintance & Support'],
            ['name' => 'Other (Specify)'],
        ];

        LeadType::insert($types);
    }
}
