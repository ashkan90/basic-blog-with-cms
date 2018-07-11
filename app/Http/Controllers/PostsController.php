<?php

namespace App\Http\Controllers;


use Auth;
use Session;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $_posts = Post::all();

        return view('admin.posts.index')->with('posts' ,$_posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if ($categories->count() == 0 or $tags->count() == 0) {
            $notification = [
                'message' => 'You must have some categories or tags before attempting to create a post',
                'alert-type' => 'info'
            ];
            return redirect()->route('categories')->with($notification);
        }

        return view('admin.posts.create')->with('categories', $categories)
                                         ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:128',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'tags' => 'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        $_post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'slug' => str_slug($request->title)
        ]);

        $notification = [
            'message' => 'Post created successfully',
            'alert-type' => 'success'
        ];

        $_post->tags()->attach($request->tags);

        return redirect()->route('posts')->with($notification);


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
        $_posts = Post::find($id);

        return view('admin.posts.edit')
                                ->with('post', $_posts)
                                ->with('categories',Category::all())
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
        $_posts = Post::find($id);
        $_posts->delete();

        $notification = [
            'message' => 'The post trashed successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function trashed()
    {
        $_posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $_posts);
    }

    public function kill($id)
    {
        $_posts = Post::withTrashed()->where('id', $id)->first();
        $_posts->forceDelete();

        $notification = [
            'message' => 'Post deleted permanently',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function restore($id)
    {
        $_posts = Post::withTrashed()->where('id', $id)->first();
        $_posts->restore();

        
        $notification = [
            'message' => 'Post restored successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
