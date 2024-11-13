<?php

namespace Database\Factories;

use App\Models\ClassOfStudent;
use App\Models\ParentOfStudent;
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
        $parent = ParentOfStudent::pluck('id');
        // $class_of_students = ClassOfStudent::pluck('id');

        return [
            'nisn' => fake() -> unique() -> numberBetween(0, 1000),
            'name' => fake() -> name(),
            'parent_id' => $parent,
            'phone' => fake() -> phoneNumber(),
            'class_of_student_id' => fake() -> randomElement(['9-1', '9-2']),
            'email' => fake() -> email(),
            'gender' => fake() -> randomElement(['Pria', 'Wanita']),
            'place_born' => fake() -> city(),
            'date_born' => fake() -> date(),
            'address' => fake() -> address(),
            'foto' => fake() -> image(),
        ];
    }
}
