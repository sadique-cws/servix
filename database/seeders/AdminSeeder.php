<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('123456789')
        ];

        Admin::updateOrCreate(
            ['email' => $data['email']], // Condition to check if the record exists
            $data // Data to insert or update
        );
    }
}
