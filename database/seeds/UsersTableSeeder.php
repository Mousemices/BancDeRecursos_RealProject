<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\User::class, 5)->create();
        factory(App\User::class)->create([
            'entity_name' => 'Banco Recursos',
            'entity_type' => 'fundacio',
            'email' =>'bancrecursos@gmail.com',
            'email_verified_at' => now(),
            'phone' => rand(8,9),
            'fiscal_address' => 'barcelona',
            'cif_dni' => Str::random(9,9),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'user_role' => 1,
        ]);
    }
}
