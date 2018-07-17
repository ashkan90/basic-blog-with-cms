<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create([
        	'name' => 'Data Science',
            'description' => 'some description',
            'slug' => 'data-science'
        ]);
        App\Category::create([
        	'name' => 'Mathematic',
            'description' => 'some description',
            'slug' => 'mathematic'
        ]);
        App\Category::create([
        	'name' => 'Physics',
            'description' => 'some description',
            'slug' => 'physics'
        ]);
        App\Category::create([
        	'name' => 'Web Development',
            'description' => 'some description',
            'slug' => 'web-development'
        ]);
        App\Category::create([
        	'name' => 'Architecture',
            'description' => 'some description',
            'slug' => 'architecture'
        ]);
    }
}
