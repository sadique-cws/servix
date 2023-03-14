<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            'name' => 'sadique',
            'email' => 'rock@gmail.com',
            'password' => '123456789'
        ];

        Admin::create($data);
    }
}
