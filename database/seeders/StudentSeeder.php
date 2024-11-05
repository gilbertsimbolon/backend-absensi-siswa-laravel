<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i < 10; $i++){
            DB::table('students')->insert([
                'nisn' => $faker->randomNumber(4),
                'name' => $faker->name,
                'class' => $faker->randomElement(['9-1', '9-2', '9-3']),
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'gender' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'place_born' => $faker->city,
                'date_born' => $faker->date,
                'address' => $faker->address,
                'foto' => $faker -> image,
                'qr_code' => $faker -> ean13(),
            ]);
        }
    }
}
