<?php

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@sust.edu',
                'password' => Hash::make('sust'),
                'created_at' => date('Y-m-d H-i-s'),
                'updated_at' => date('Y-m-d H-i-s')
            ]

        ];

        DB::table('users')->insert($users);
    }
}