<?php

use App\Petition;
use Illuminate\Database\Seeder;

class PetitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        factory(Petition::class)->create(['batch_id'=>5,'user_id'=>5,'quantity'=>random_int(0,99),'status'=>random_int(0, 2)]);
        factory(Petition::class)->create(['batch_id'=>4,'user_id'=>4,'quantity'=>random_int(0,99),'status'=>random_int(0, 2)]);
        factory(Petition::class)->create(['batch_id'=>3,'user_id'=>3,'quantity'=>random_int(0,99),'status'=>random_int(0, 2)]);
        factory(Petition::class)->create(['batch_id'=>2,'user_id'=>2,'quantity'=>random_int(0,99),'status'=>1]);
        factory(Petition::class)->create(['batch_id'=>1,'user_id'=>1,'quantity'=>random_int(0,99),'status'=>random_int(0, 2)]);
        //factory(App\Petition::class, 5)->create(); 
    }
}
