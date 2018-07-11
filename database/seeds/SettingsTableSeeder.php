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
        \App\Setting::create([
        	'site_name' => "Laravel's Blog",
        	'address' => 'Turkey, Istanbul',
        	'contact_number' => '+90 544 266 64 17',
        	'contact_email' => 'info@larablog.com',
            'footer_title' => "Laravel's Blog",
            'footer_description' =>
             "Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibham liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat eleifend option nihil. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius parum claram."
        ]);
    }
}
