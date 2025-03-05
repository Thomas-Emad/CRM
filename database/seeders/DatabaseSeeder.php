<?php

namespace Database\Seeders;

use App\Models\{User, Status, Currency, Country};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        Status::create([
            'name' => fake()->name(),
            'color' => fake()->hexColor(),
        ]);

        Country::create([
            'name' =>  fake()->country(),
            'code' =>  fake()->countryCode(),
        ]);

        Currency::create([
            'name' => fake()->currencyCode(),
            'code' => 'BR',
            'symbol' => 'R$',
        ]);
    }
}
