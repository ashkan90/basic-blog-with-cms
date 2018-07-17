<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')
                                        ->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create')
                                        ->with('categories', Category::all())
                                        ->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'featured' => 'required|image',
            'category_id' => 'required',

            'tags' => 'required'
        ]);

        /*$post = Post::where('title',$request->title)
                      ->orWhere('slug', str_slug($request->title))
                      ->get()->first();*/
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('assets/uploads/posts', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'content' => $request->content,
            'user_id' => Auth::id(),
            'featured' => 'assets/uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id
        ]);

        $post->tags()->attach($request->tags);

        return redirect()->route('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit')
                                    ->with('post', $post)
                                    ->with('categories', Category::all())
                                    ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:128',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $_posts = Post::find($id);

        if ($request->hasFile('featured')) {
            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);

            $_posts->featured = 'uploads/posts/'.$featured_new_name;
        }

        $_posts->content = $request->content;
        $_posts->title = $request->title;
        $_posts->category_id = $request->category_id;

        $_posts->save();
        $_posts->tags()->sync($request->tags);

        $notification = [
            'message' => 'The post updated successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('posts')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();


        return redirect()->route('posts');

    }

    public function trashed()
    {
        $post = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $post);
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->forceDelete();
        $post->tags()->delete();

        return redirect()->route('trashed.post');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->restore()->first();

        return redirect()->route('posts');
    }
}
