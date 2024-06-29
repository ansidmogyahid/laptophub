<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Build your own',
            'Pre-Built Models',
        ];

        foreach($types as $type){
            ProductType::create(['name' => $type]);
        }
    }
}
