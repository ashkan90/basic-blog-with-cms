<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Post;
use App\Category;
use Auth;
use App\Menu;
use App\Tag;

class FrontendController extends Controller
{

    public function index()
    {
        $settings = Setting::first();
        $menu = Menu::where('main', 1)->get()->first();
        $latest = Post::orderBy('created_at', 'desc')->get();
        
        if (Post::count() > 0) {
            $posts = Post::all();
        }
        else if (Auth::check()) {
            $posts = "";
            return redirect()->route('create.post');
        }
        else
            return "error page";
        return view('index')
                            ->with('site', $settings)
                            ->with('posts', $posts)
                            ->with('categories', Category::all())
                            ->with('menus', $menu->categories)
                            ->with('latest_post', $latest);
    }

    public function single($category, $slug)
    {
    	$category = Category::where('name', $category)->first();
    	$post = Post::where('slug', $slug)->first();
        $menu = Menu::where('main', 1)->get()->first();
        $latest = Post::orderBy('created_at', 'desc')->get();

    	return view('single')
    						->with('post', $post)
    						->with('site', Setting::first())
                            ->with('categories', Category::all())
                            ->with('menus', $menu->categories)
                            ->with('latest_post', $latest);
    }

    public function category($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        $menu = Menu::where('main', 1)->get()->first();
        $latest = Post::orderBy('created_at', 'desc')->get();


        return view('category')
                                ->with('category', $category)
                                ->with('site', Setting::first())
                                ->with('menus', $menu->categories)
                                ->with('latest_post', $latest);
    }

    public function tag($tag)
    {
        $tag = Tag::where('slug', $tag)->get()->first();
        $menu = Menu::where('main', 1)->get()->first();
        $latest = Post::orderBy('created_at', 'desc')->get();

        return view('tag')
                          ->with('tag', $tag)
                          ->with('site', Setting::first())
                          ->with('category', Category::first())
                          ->with('menus', $menu->categories)
                          ->with('latest_post', $latest);
    }
}
