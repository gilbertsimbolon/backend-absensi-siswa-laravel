<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassOfStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i < 5; $i++){
            $teachers_id = Teacher::pluck('id')->random();

            DB::table('class_of_students')->insert([
                'name' => $faker->name,
                'teacher_id' => $teachers_id,
                'class_name' => $faker->randomElement(['9-1', '9-2']),
            ]);
        }
    }
}
