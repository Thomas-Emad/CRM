<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lead;

class LeadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lead::factory()->count(10)->create();
    }
}
