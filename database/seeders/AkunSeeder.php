<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'adminagenda',
                'name' => 'admin',
                'email' => 'admin@example.com',
                'level' => 'admin',
                'password' => bcrypt('admin123')
            ],
            [
                'username' => 'guru',
                'name' => 'guru',
                'email' => 'guru@example.com',
                'level' => 'guru',
                'password' => bcrypt('guru123')
            ]
        ];
        foreach ($user as $key => $value){
            User::create($value);
        }
    }
}
