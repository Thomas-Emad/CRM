<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::insert([
            [
                'name' => 'New',
                'color' => '#184291',
                'is_default' => true
            ],
            [
                'name' => 'In Progress',
                'color' => '#7c98ae',
                'is_default' => true
            ],
            [
                'name' => 'Converted',
                'color' => '#64dc26',
                'is_default' => true
            ]
        ]);

        Status::factory()->count(10)->create();
    }
}
