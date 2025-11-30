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
                'name' => 'Laptop',
                'description' => 'High performance laptop.',
                'price' => 1500000,
            ],
            [
                'name' => 'Smartphone',
                'description' => 'Latest generation smartphone.',
                'price' => 800000,
            ],
            [
                'name' => 'Headphones',
                'description' => 'Noise-cancelling wireless headphones.',
                'price' => 150000,
            ],
        ];

        foreach ($products as $item) {
            Product::create($item);
        }
    }
}
