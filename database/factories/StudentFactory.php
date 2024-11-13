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
            'nisn' => '001',
            'name' => 'Josep Gilbert Andriano Simbolon',
            'parent_id' => 1,
            'phone' => '0812324214',
            'class_of_student_id' => '',
        ];
    }
}
