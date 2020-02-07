<?php

use App\Category;

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class)->create(['category_name'=>'see_all']);
        factory(Category::class)->create(['category_name'=>'hospitable']);
        factory(Category::class)->create(['category_name'=>'fungible sanitary']);
        factory(Category::class)->create(['category_name'=>'orthopedic']);
        factory(Category::class)->create(['category_name'=>'computer equipment']);
        factory(Category::class)->create(['category_name'=>'furniture']);
        factory(Category::class)->create(['category_name'=>'sound,image and home appliances']);
        factory(Category::class)->create(['category_name'=>'machinery and transport vehicles']);
        factory(Category::class)->create(['category_name'=>'office material']);
        factory(Category::class)->create(['category_name'=>'industrial and new clothes']);
        factory(Category::class)->create(['category_name'=>'others']);




    }
}
