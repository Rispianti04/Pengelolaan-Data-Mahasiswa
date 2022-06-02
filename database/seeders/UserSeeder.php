<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name' => 'Staff',
                'email' => 'Staff@gmail.com',
                'password' => Hash::make('123456'),
                'roles_id' => 2
            ],
            [
                'name' => 'Assesor',
                'email' => 'Assesor@gmail.com',
                'password' => Hash::make('123456'),
                'roles_id' => 1
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
