<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
        	'name' => 'Emirhan Ataman',
        	'email' => 'emirhan.1ataman@gmail.com',
        	'password' => Hash::make('krhncddm12'),
        	'admin' => 1
        ]);

        App\Profile::create([
        	'user_id' => $user->id,
        	'avatar' => 'uploads\avatars\default.jpg',
        	'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			    cillum dolore eu fugiat nulla pariatur.',
		    'facebook' => 'facebook.com',
		    'twitter' => 'twitter.com',
		    'pinterest' => 'pinterest.com'
        ]);

    }
}
