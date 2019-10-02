<?php

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
        factory(\App\User::class)->create([
            'email' => 'aaaaa@aaaaa.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
        ]);


        factory(\App\Book::class, 10)->create();
    }
}
