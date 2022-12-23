<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'telepon' => '0895326251331',
            'password' => bcrypt('admin123'),
            'level' => 'admin'
        ],
        [
            'nama' => ' User',
            'email' => 'user@gmail.com',
            'telepon' => '0872378239384',
            'password' => bcrypt('user123'),
            'level' => 'user'
        ]
        ];
            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
