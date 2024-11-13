<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Process\FakeProcessResult;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => fake() -> unique()-> numberBetween(0, 100),
            'name' => fake() -> name,
            'concent' => fake() -> randomElement(['Biologi', 'Fisika', 'Kimia']),
            'phone' => fake() -> phoneNumber(),
            'email' => fake() -> unique()->safeEmail(),
            'gender' => fake() -> randomElement(['Pria', 'Wanita']),
            'place_born' => fake() -> city(),
            'date_born' => fake() -> date(),
            'address' => fake() -> address(),
            'foto' => fake() -> image,
            // 'qr_code' => fake() -> ean13(),
        ];
    }
}
