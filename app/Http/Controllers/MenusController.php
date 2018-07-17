<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Category;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.menu.index')->with('menus', Menu::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create')->with('categories', Category::all());
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
            'name' => 'required'
        ]);

        $menu = Menu::create([
            'name' => $request->name
        ]);

        $menu->categories()->attach($request->category);
        if ($menu->main == 1) {
            return redirect()->back();
        }
        elseif ($request->main) {
            $menu->main = 1;
        }

        $menu->save();
        return redirect()->route('menus');
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
        return view('admin.menu.edit')->with('menu', Menu::find($id));
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
            'name' => 'required'
        ]);

        $menu = Menu::find($id);

        $menu->name = $request->name;
        //Checking the default main menu.
        if ($menu->main != 1) {
             $menu->main = 1;
             return redirect()->route('home');
        }
        elseif ($request->main) {
            $menu->main = 1;
        }
            

        $menu->save();
        $menu->categories()->sync($request->category);

        return redirect()->route('menus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id)->delete();

        return redirect()->route('menus');
    }
}
