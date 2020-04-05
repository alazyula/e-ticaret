<?php

use Illuminate\Database\Seeder;
use App\Product;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([

            'name' => 'Laptop',
            'category_id'=>1,
            'price'=> 500.0,
            'stock'=>50,
            'description' =>  'Oyun Laptopu',



        ]);
        Product::create([

            'name' => 'Telefon',
            'category_id'=>1,
            'price'=> 5000.0,
            'stock'=>50,
            'description' =>  'ayfon',



        ]);
       
        
    }
}
