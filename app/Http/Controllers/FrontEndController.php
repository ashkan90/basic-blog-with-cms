<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Menu;
use App\Post;
use App\Category;
use App\Tag;

class FrontEndController extends Controller
{
    public function index()
    {

    	$menu = Menu::all()
            					->where('main', '=',  1)
            					->first();

    	$career =  Category::where('name', 'career')
              						->orWhere('name', 'Career')
              						->first();
      $tutorials = Category::where('name', 'tutorial')
                             ->orWhere('name', 'Tutorial') 
                             ->orWhere('name', 'tutorials')
                             ->orWhere('name', 'Tutorials') 
                             ->first();

    	return view('welcome')
							->with('title', Setting::first()->site_name)
							->with('menu', $menu->categories)
							->with('first_post', Post::orderBy('created_at', 'desc')->first())
							->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
							->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
							->with('career', $career)
              ->with('tutorials', $tutorials)
              ->with('settings', Setting::first());
    }

    public function singlePost($category, $slug)
    {
      $_post = Post::where('slug', $slug)->first();
      $next_id = Post::where('id', '>', $_post->id)->min('id');
      $prev_id = Post::where('id', '<', $_post->id)->min('id');
      //dd(Tag::all()->all());
      return view('single')->with('post', $_post)
                           ->with('title', $_post->title)
                           ->with('menu', Menu::where('main', 1)->first()->categories)
                           ->with('settings', Setting::first())
                           ->with('tags', Tag::all())
                           ->with('next_post', Post::find($next_id))
                           ->with('prev_post', Post::find($prev_id));
    }

    public function category($category)
    {
      $_category = Category::where('name', $category)->get()->first();

      return view('category')->with('category', $_category)
                             ->with('title', $_category->name)
                             ->with('settings', Setting::first())

                             ->with('menu', Menu::where('main', 1)->first()->categories);
    }

    public function tag($tag)
    {
      $_tag = Tag::where('tag', $tag)->get()->first();

      return view('tag')->with('tag', $_tag)
                        ->with('title', $_tag->tag)
                        ->with('settings', Setting::first())
                        ->with('menu', Menu::where('main', 1)->first()->categories);
    }
}
