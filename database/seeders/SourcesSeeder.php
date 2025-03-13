<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Source;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Source::factory()->count(10)->create();
        $sources = [
            ['name' => 'Social Media', 'website' => 'https://fake-link.com/social-media'],
            ['name' => 'Email Marketing', 'website' => 'https://fake-link.com/email-marketing'],
            ['name' => 'Organic Search', 'website' => 'https://fake-link.com/organic-search'],
            ['name' => 'Paid Social', 'website' => 'https://fake-link.com/paid-social'],
            ['name' => 'Paid Search', 'website' => 'https://fake-link.com/paid-search'],
            ['name' => 'Suppliers', 'website' => 'https://fake-link.com/suppliers'],
            ['name' => 'Direct Traffic', 'website' => 'https://fake-link.com/direct-traffic'],
            ['name' => 'Internal Employees', 'website' => 'https://fake-link.com/internal-employees'],
            ['name' => 'Partners', 'website' => 'https://fake-link.com/partners'],
            ['name' => 'Other', 'website' => 'https://fake-link.com/other'],
        ];

        Source::insert($sources);
    }
}
