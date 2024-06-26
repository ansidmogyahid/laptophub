<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'LOQ',
                'price' => '1019',
                'brand_id' => 4
            ],
            [
                'name' => 'ThinkPad',
                'price' => '2000',
                'brand_id' => 1
            ]
        ];

        foreach($products as $product){
            Product::create([
                'name' => $product['name'],
                'price' => $product['price'],
                'brand_id' => $product['brand_id']
            ]);
        }
    }
}
