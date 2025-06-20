<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        DB::table('products')->delete();

        \App\Models\Product::create([
            'category_id' => 1,
            'name'=>'Kaos Keren',
            'slug'=>'kaos-keren',
            'description'=>'kaus bagus banget',
            'price'=>120000,
            'stock'=>12,
            'image'=>"kaus.png",
        ]);

         \App\Models\Product::create([
            'category_id' => 2,
            'name'=>'Laptop Asus',
            'slug'=>'asus-laptop',
            'description'=>'Laptop gaming 2000 an',
            'price'=>2000,
            'stock'=>1,
            'image'=>"laptop.png",
        ]);

        \App\Models\Product::create([
            'category_id' => 2,
            'name'=>'Laptop axxio',
            'slug'=>'axxio-laptop',
            'description'=>'Laptop gaming 3000 an',
            'price'=>3000,
            'stock'=>1,
            'image'=>"laptop.png",
        ]);

    }
}
