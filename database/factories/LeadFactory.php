<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Lead;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Model associated with the factory.
     */
    protected $model = Lead::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'tags' => implode(',', $this->faker->words(3)),
            'address' => $this->faker->address,
            'position' => $this->faker->jobTitle,
            'city' => $this->faker->city,
            'email' => $this->faker->unique()->safeEmail,
            'company' => $this->faker->company,
            'group_id' => rand(1, 5),
            'website' => $this->faker->url,
            'phone' => $this->faker->phoneNumber,
            'zip_code' => $this->faker->postcode,
            'lead_value' => $this->faker->randomFloat(2, 100, 5000),
            'description' => $this->faker->text(200),
            'status_id' => rand(1, 5),
            'assigned_id' => 1,
            'source_id' => rand(1, 5),
            'country_id' => rand(1, 5),
            'currency_id' => rand(1, 5),
            'vat_number' => Str::random(10),
            'is_customer' => $this->faker->boolean,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
