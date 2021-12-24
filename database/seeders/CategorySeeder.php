<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            'name'=>'Korku',
            'slug'=>'korku',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        Category::insert([
            'name'=>'Macera',
            'slug'=>'macera',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        Category::insert([
            'name'=>'Aksiyon',
            'slug'=>'aksiyon',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        Category::insert([
            'name'=>'Animasyon',
            'slug'=>'animasyon',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        Category::insert([
            'name'=>'Bilim Kurgu',
            'slug'=>'bilim-kurgu',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
