<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => "Light agata cigar",
                'slug' => Str::slug("Light agata cigar"),
                'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. At, accusantium illum deleniti blanditiis eligendi odit optio. Quasi esse enim, quos illum debitis cumque labore assumenda vitae nesciunt nisi voluptas vero!",
                'price' => "0.5"
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'slug' => $product['slug'],
                'description' => $product['description'],
                'price' => $product['price'],
            ]);
        }
    }
}
