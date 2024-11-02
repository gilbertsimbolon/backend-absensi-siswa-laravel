<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        for ($i=0; $i < 5; $i++){
            Teacher::create([
                'nip' => $faker -> ean8(),
                'name'=>$faker->name,
                'concent'=>$faker->randomElement('Matematika', 'Kimia', 'Fisika'),
                'phone'=>$faker->phoneNumber(),
                'email'=>$faker->email(),
                'gender'=>$faker->randomElement('Pria', 'Wanita'),
                'place_born'=>$faker->city(),
                'date_born'=>$faker->date(),
                'address'=>$faker->address(),
                'foto'=>$faker->image(640, 460),
                'qr_code'=>$faker->ean13(),
            ]);
        }
    }
}
