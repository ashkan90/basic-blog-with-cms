<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use App\User;
use App\Menu;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard')
                                      ->with('post', Post::all())
                                      ->with('user', User::all())
                                      ->with('category', Category::all())
                                      ->with('tag', Tag::all())
                                      ->with('trashed_post', Post::onlyTrashed()->get()->count())
                                      ->with('menu', Menu::all()->count());
    }
}
