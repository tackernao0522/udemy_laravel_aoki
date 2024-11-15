<?php

use App\Models\ContactForm;
use Illuminate\Database\Seeder;

class ContactFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ContactForm::class, 200)->create();
    }
}

// php artisan make:seeder ContactFormSeeder
