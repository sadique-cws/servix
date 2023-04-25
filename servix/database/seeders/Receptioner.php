<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Receptioner extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'wasik',
            'contact' => '9955015651',
            'email' => 'w@gmail.com',
            'adhar' => '844882795189',
            'pan' => 'DGRPA1315N',
            'address' => 'at-islampur, po-matkopa, ps- kasba, dist- purnea',
            'password' => '123456789'
        ];

        \App\Models\Receptioner::create($data);
    }
}
