<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tags.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'tag' => 'required'
        ]);
        Tag::create([
            'tag' => $request->tag
        ]);

        $notification = [
                'message' => 'Tag created successfully.',
                'alert-type' => 'success'
        ];

        return redirect()->route('tags')->with($notification);
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
        $_tags = Tag::find($id);

        return view('admin.tags.edit')->with('tag', $_tags);
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

        //dd($request->all());
        $_tag = Tag::find($id);
        $_tag->tag = $request->tag;

        $_tag->save();

        $notification = [
                'message' => 'Tag updated successfully.',
                'alert-type' => 'success'
        ];

        return redirect()->route('tags')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $_tag = Tag::find($id);
        $_tag->delete();


        $notification = [
                'message' => 'Tag deleted successfully.',
                'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
