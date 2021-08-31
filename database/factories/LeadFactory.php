<?php

namespace Database\Factories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lead::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'ielts' => $this->faker->randomFloat(1, 1, 9),
            'qualification' => $this->faker->randomElement(['SSC', 'HSC', 'Hons', 'Masters']),
            'result' => $this->faker->randomFloat(2, 2, 4),
            'country' => $this->faker->randomElement(['Malaysia', 'UK', 'Canada']),
            'address' => $this->faker->address(),
            'note' => $this->faker->sentence()
        ];
    }
}