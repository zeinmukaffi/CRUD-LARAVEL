<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 5; $i++){
        DB::table('gurus')->insert([
            'nama_guru' => $faker->firstName(),
            'mapel' => $faker->randomElement(['Progdas','PPL','Kimia','Fisika','KJD']),
        ]);
    }
}
}
