<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionsSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            SourcesSeeder::class,
            StatusesSeeder::class,
            GroupsSeeder::class,
            CurrenciesSeeder::class,
            CountriesSeeder::class,
            LeadsSeeder::class
        ]);
    }
}
