<?php

use Illuminate\Database\Seeder;

class BatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Batch::class)->create(['status'=>0, 'category_id'=>1]);

        factory(App\Batch::class)->create(['status'=>1, 'category_id'=>1]);

        factory(App\Batch::class)->create(['status'=>2, 'category_id'=>1]);

        factory(App\Batch::class, 2)->create();
    }
}
