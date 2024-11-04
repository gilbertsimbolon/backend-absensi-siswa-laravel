<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\QueryException;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i < 10; $i++){
            DB::table('teachers')->insert([
                'nip' => $faker->randomNumber(2),
                'name' => $faker->name,
                'concent' => $faker->randomElement(['Matematika', 'Fisika', 'Kimia', 'Biologi']),
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'gender' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'place_born' => $faker->city,
                'date_born' => $faker->date,
                'address' => $faker->address,
                'foto' => $faker->image,
                'qr_code' => $faker->ean13,
            ]);
        }
    }
}
