<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nisn' => fake() -> randomNumber(),
            'name' => fake() -> name(),
            'class' => fake() -> randomElement(['9-1', '9-2', '9-3']),
            'phone' => fake() -> phoneNumber(),
            'email' => fake() -> unique() -> safeEmail(),
            'gender' => fake() -> randomElement(['Pria', 'Wanita']),
            'place_born' => fake() -> city(),
            'date_born' => fake() -> date(),
            'address' => fake() -> address(),
            'foto' => fake() -> image,
            'qr_code' => fake() -> ean13(),
        ];
    }
}
