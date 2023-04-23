<?php

namespace Database\Seeders;
use App\Models\Type;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            [ 'typename' => 'Laptop/DeskTop'],
            [ 'typename' => 'Printer'],
            [ 'typename' => 'LED T.v'],
            [ 'typename' => 'Mobile/Tablet'],
            
        ];
         
        Type::insert($types);

    }
}
