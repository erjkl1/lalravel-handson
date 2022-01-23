<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(
            [
                [
                    'name'=>'admin',
                    'email' => 'admin@example.com',
                    'email_verified_at' => now(),
                    'password' => \Hash::make('1234'),
                    'created_at' => now(),
                ], [
                    'name'=>'mayo',
                    'email' => 'mayo@example.com',
                    'email_verified_at' => now(),
                    'password' => \Hash::make('1234'),
                    'created_at' => now(),
                ], [
                    'name'=>'yama',
                    'email' => 'yama@example.com',
                    'email_verified_at' => now(),
                    'password' => \Hash::make('1234'),
                    'created_at' => now(),
                ],
             ]
        );
    }
}
