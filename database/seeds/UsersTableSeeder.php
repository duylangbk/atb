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
        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                'name' => str_random(10),
                'email' => $i.'dummy@gmail.com',
                'password' => bcrypt('secret'),
                'address' => str_random(10),
                'tel' => str_random(10),
            ]);
        }
    }
}
