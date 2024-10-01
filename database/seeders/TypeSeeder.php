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
            [ 'name' => 'Laptop/DeskTop'],
            [ 'name' => 'Printer'],
            [ 'name' => 'LED T.v'],
            [ 'name' => 'Mobile/Tablet'],
            
        ];
         
        Type::insert($types);

    }
}
