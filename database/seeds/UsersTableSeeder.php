<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
        	'name' => 'emirhan',
        	'email' => 'emirhan.1ataman@gmail.com',
        	'password' => Hash::make('krhncddm12'),
            'admin' => 1
        ]);

        $profile = App\Profile::create([
            'avatar' => 'assets/uploads/avatars/default.jpeg',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'facebook' => 'facebook.com',
            'twitter' => 'twitter.com',
            'google' => 'google.com',
            'pinterest' => 'pinterest.com',
            'user_id' => $user->id
        ]);
    }
}
