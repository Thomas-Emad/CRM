<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LeadUnit;

class LeadUnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            ['name' => 'FF&E'],
            ['name' => 'Kitchen'],
            ['name' => 'Recreational'],
            ['name' => 'Integrated'],
        ];
        LeadUnit::insert($units);
    }
}
