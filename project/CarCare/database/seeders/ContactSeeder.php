<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i <= 30; $i++) {

            $data = new Contact();

            $data->name = fake()->name();
            $data->email = fake()->unique()->safeEmail();
            $data->phone = fake()->phoneNumber();
            $data->subject = fake()->sentence();
            $data->message = fake()->paragraph();

            $data->save();
        }
    }
}