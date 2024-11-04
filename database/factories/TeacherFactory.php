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
            'nip' => fake() -> randomNumber(5),
            'name' => fake() -> name(),
            'concent' => fake() -> randomElements('Matematika', 'Fisika', 'Kimia'),
            'phone' => fake() -> phoneNumber(),
            'email' => fake() -> email(),
            'gender' => fake() -> randomElement('L', 'P'),
            'place_born' => fake() -> city(),
            'date_born' => fake() -> date(),
            'address' => fake() -> address(),
            'foto' => fake() -> imageUrl($width = 640, $height = 480),
            'qr_code' => fake() -> ean8(),
        ];
    }
}
