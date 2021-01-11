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
        DB::table('users')->insert([
            [
                'name' => 'John',
                'email' => 'takaki_5573031@yahoo.co.jp',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Dave',
                'email' => 'cheap_trick_magic@yahoo.co.jp',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Pepe',
                'email' => 'takaproject777@gmail.com',
                'password' => Hash::make('ggz6kxp3'),
            ],
            [
                'name' => 'Takaki',
                'email' => 'takaki55730317@gmail.com',
                'password' => Hash::make('5t5a7k3a'),
            ],

        ]);
    }
}

// php artisan make:seeder UsersTableSeeder
