<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('users')->insertOrIgnore([
            'name' => 'administrator',
            'email' => 'administrator@localhost',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insertOrIgnore([
            'name' => 'user1',
            'email' => 'user1@localhost',
            'password' => Hash::make('password'),
        ]);
    }
}
