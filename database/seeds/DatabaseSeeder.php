<?php

use App\Models\ContactForm;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ContactFormSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(RoutesTableSeeder::class);
    }
}
