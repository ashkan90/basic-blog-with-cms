<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Tag::create([
        	'tag' => 'Laravel 5.6',
            'slug' => 'laravel-5-6'
        ]);
        App\Tag::create([
        	'tag' => 'Xiaomi Mi Mix',
            'slug' => 'xiaomi-mi-mix'
        ]);
        App\Tag::create([
        	'tag' => 'C++',
            'slug' => 'c'
        ]);
        App\Tag::create([
        	'tag' => 'C#',
            'slug' => 'c'
        ]);
        App\Tag::create([
        	'tag' => 'History',
            'slug' => 'history'
        ]);
    }
}
