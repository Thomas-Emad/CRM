<?php

namespace Database\Seeders;

use App\Models\CallReason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CallReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CallReason::factory()->count(10)->create();
    }
}
