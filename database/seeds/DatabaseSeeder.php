<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        \DB::table('users')->insert([
        	'name'    => 'quang',
        	'email'   =>'quang@gmail.com',
        	'password' => Hash::make('12345678')
        ]);

        \DB::table('clients')->insert([
            'name'    => 'quang',
            'email'   =>'quang@gmail.com',
            'phone'    =>'0981558501',
            'password' => Hash::make('12345678')
        ]);
    }
}
