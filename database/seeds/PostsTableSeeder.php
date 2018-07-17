<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Post::create([
        	'title' => 'WRITE YOUR OWN COMPILER IN C ! PART - 1',
        	'slug' => 'write-your-own-compiler-in-c-part-1',
        	'content' => 'This is the first post in a series on writing your own C compiler. Here are some reasons to write a compiler: You’ll learn about abstract syntax trees (ASTs) and how programs can represent and manipulate other programs. Handy for working with linters, static analyzers, and metaprogramming of all sorts. You’ll learn about assembly, calling conventions, and all the gritty, low-level details of how computers, like, do stuff. It seems like an impossibly hard project (but isn’t!), so writing one will make you feel like a badass. I’ve been working on my own C compiler, nqcc for the past several weeks, using Abdulaziz Ghuloum’s An Incremental Approach to Compiler Construction as a roadmap. I really like Ghuloum’s approach: you start by compiling a tiny, trivial subset of your source language all the way down to x86 assembly. Then you add new language features, one step at a time. In step one, you just return constants; in a later step you handle addition and subtraction; and so on. Every step is small enough to feel manageable, and at the end of the every step you have a working compiler. This series is adapted from Ghuloum’s paper - the original paper is about compiling Scheme, so I had to make some adjustments to compile C instead. I’ll cover arithmetic operations, conditionals, local variables, function calls, and perhaps more. I’ve also written some test programs that you can use to validate that each stage of your compiler works correctly. ',
        	'featured' => 'uploads/posts/1531608786Jellyfish.jpeg',
        	'category_id' => '1',
        	'user_id' => '1'
        ]);
    }
}
