<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Thinkpad',
            'Yoga',
            'Legion',
            'LOQ',
            'ThinkBook',
            'Ideapad',
            'Lenovo Slim',
            'Lenovo',
        ];

        foreach ($brands as $brand){
            Brand::create(['name' => $brand]);
        }
    }
}
