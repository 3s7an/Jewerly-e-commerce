<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($x = 0; $x < 5; $x++){
        // Snubný prsteň
        $productId = DB::table('products')->insertGetId([
            'image' => 'product-profile/86M7U5fuWm76arPMR9neTqU2KSmXd4eyMNV9jxRm.jpg',
            'name' => 'Strieborny snubny prsten',
            'category_id' => 0,
            'description' => 'Toto je velmi pekna strieborny snubny prsten',
            'price' => '240',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_product')->insert([
            'product_id' => $productId,
            'category_id' => 18,
        ]);

        DB::table('category_product')->insert([
            'product_id' => $productId,
            'category_id' => 13,
        ]);


        // Obrúčka
        $productId = DB::table('products')->insertGetId([
            'image' => 'product-profile/86M7U5fuWm76arPMR9neTqU2KSmXd4eyMNV9jxRm.jpg',
            'name' => 'Strieborná obúčka',
            'category_id' => 0,
            'description' => 'Toto je velmi pekna strieborna obrúčka',
            'price' => '220',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('category_product')->insert([
            'product_id' => $productId,
            'category_id' => 16,
        ]);

        DB::table('category_product')->insert([
            'product_id' => $productId,
            'category_id' => 13,
        ]);
    }
}
}
