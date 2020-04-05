<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Teknoloji',
            'description' =>  'Teknolojik Ürünler',

        ]);
        Category::create([
            'name' => 'Gıda',
            
            'description' =>  'Yiyecek İçecek',

        ]);

       // DB::table('categories')->insert([
       //     'name' => 'Teknoloji',
      //      'description' =>  'Teknolojik Ürünler',
            
      //  ]);
      //  DB::table('products')->insert([
        //    'name' => 'Gıda',
         //   
           // 'description' =>  'Yiyecek İçecek',
            
       // ]);
    }
}
