<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
        	'url' => 'http://example.com',
        	'title' => 'Kafa Kafaya',
        	'description' => 'some description',
        	'keywords' => 'some keywords',
        	'copyright' => '&copy; 2018 Kafa Kafaya. All Rights Reserved.',
        	'logo' => 'uploads/logo/logo.png',
        	'email' => 'h2h@info.com',
        	'phone' => 'some number',
        	'country' => 'Turkey',
        	'city' => 'Istanbul',
        	'address' => 'some address',
        	'name' => 'Kafa Kafaya Interactive Limited.'
        ]);
    }
}
