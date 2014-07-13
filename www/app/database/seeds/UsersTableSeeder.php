<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        User::create(array(
            'email'         => 'kevin@develpr.com',
            'password'      => Hash::make('password123'),
            'first_name'    => 'Kevin',
            'last_name'     => 'Mitchell',
            'gender'        => 1
        ));

    }

}