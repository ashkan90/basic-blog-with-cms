<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
	$asd= App\Tag::all();
	foreach ($asd as $ss) {
		echo $ss->tag;
	}

});


Route::get('/results', function() {
	$posts = \App\Post::where('title', 'like', '%' . request('query') . '%')->get();

	return view('results')->with('posts', $posts)
						  ->with('title', 'Search results: '.request('query'))
						  ->with('settings', App\Setting::first())
						  ->with('menu', App\Menu::where('main', 1)->first()->categories)
						  ->with('query', request('query'));
});

Route::get('/', [
	'uses' => 'FrontEndController@index',
	'as' => 'index'
]);

Route::get('/post/{category}/{slug}', [
	'uses' => 'FrontEndController@singlePost',
	'as' => 'post.single'
]);

Route::get('/category/{category}', [
	'uses' => 'FrontEndController@category',
	'as' => 'category.single'
]);

Route::get('/tag/{tag}', [
	'uses' => 'FrontEndController@tag',
	'as' => 'tag.single'
]);

Auth::routes();



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){

	Route::get('/dashboard', [
		'uses' => 'HomeController@index',
		'as' => 'dashboard'
	]);

	Route::get('/post/create', [
		'uses' => 'PostsController@create',
		'as' => 'post.create'
	]);

	Route::post('/post/store', [
		'uses' => 'PostsController@store',
		'as' => 'post.store'
	]);

	Route::get('/posts', [
		'uses' => 'PostsController@index',
		'as' => 'posts'
	]);
	Route::get('/post/trashed', [
		'uses' => 'PostsController@trashed',
		'as' => 'post.trashed'
	]);

	Route::get('/post/delete/{id}', [
		'uses' => 'PostsController@destroy',
		'as' => 'post.delete'
	]);

	Route::get('/post/kill/{id}', [
		'uses' => 'PostsController@kill',
		'as' => 'post.kill'
	]);

	Route::get('/post/restore/{id}', [
		'uses' => 'PostsController@restore',
		'as' => 'post.restore'
	]);

	Route::get('/post/edit/{id}', [
		'uses' => 'PostsController@edit',
		'as' => 'post.edit'
	]);

	Route::post('/post/update/{id}', [
		'uses' => 'PostsController@update',
		'as' => 'post.update'
	]);

	Route::get('/category/create', [
		'uses' => 'CategoriesController@create',
		'as' => 'category.create'
	]);

	Route::post('/category/store', [
		'uses' => 'CategoriesController@store',
		'as' => 'category.store'
	]);

	Route::get('/categories', [
		'uses' => 'CategoriesController@index',
		'as' => 'categories'
	]);

	Route::get('/category/edit/{id}', [
		'uses' => 'CategoriesController@edit',
		'as' => 'category.edit'
	]);

	Route::get('/category/delete/{id}', [
		'uses' => 'CategoriesController@destroy',
		'as' => 'category.delete'
	]);

	Route::post('/category/update/{id}', [
		'uses' => 'CategoriesController@update',
		'as' => 'category.update'
	]);

	//---------------TAG ROUTES------------------\\

	//Tags index page
	Route::get('/tags', [
		'uses' => 'TagsController@index',
		'as' => 'tags'
	]);
	////////////////////////////////////////////////

	//Tags edit page
	Route::get('/tag/edit/{id}', [
		'uses' => 'TagsController@edit',
		'as' => 'tag.edit'
	]);
	////////////////////////////////////////////////

	//Tags create page
	Route::get('/tag/create', [
		'uses' => 'TagsController@create',
		'as' => 'tag.create'
	]);
	////////////////////////////////////////////////

	//Tags create page
	Route::post('/tag/store', [
		'uses' => 'TagsController@store',
		'as' => 'tag.store'
	]);
	////////////////////////////////////////////////

	//Tags update page
	Route::post('/tag/update/{id}', [
		'uses' => 'TagsController@update',
		'as' => 'tag.update'
	]);
	////////////////////////////////////////////////

	//Tags delete route
	Route::get('/tag/delete/{id}', [
		'uses' => 'TagsController@destroy',
		'as' => 'tag.delete'
	]);


	//-----------------Users---------------\\

	//--------Indexing Users
	Route::get('/users', [
		'uses' => 'UsersController@index',
		'as' => 'users'
	]);


	//--------Create User Route
	Route::get('/user/create', [
		'uses' => 'UsersController@create',
		'as' => 'user.create'
	]);


	//-------Creating User
	Route::post('/user/store', [
		'uses' => 'UsersController@store',
		'as' => 'user.store'
	]);

	//-------Delete User
	Route::get('/user/delete/{id}', [
		'uses' => 'UsersController@destroy',
		'as' => 'user.delete'
	]);



	//-------Make user admin
	Route::get('/user/admin/{id}', [
		'uses' => 'UsersController@admin',
		'as' => 'user.admin'
	]);

	//-------Make user not admin
	Route::get('/user/not-admin/{id}', [
		'uses' => 'UsersController@not_admin',
		'as' => 'user.not.admin'
	]);



	//-----------Profile Pages----------\\
	Route::get('/user/profile', [
		'uses' => 'ProfilesController@index',
		'as' => 'user.profile'
	]);


	//--------Edit Profile Page Route-----\\
	Route::post('/user/profile/edit', [
		'uses' => 'ProfilesController@update',
		'as' => 'user.profile.update'
	]);




	/**
	 * Settings route that should give to us a setting page
	 */
	Route::get('/settings', [
		'uses' => 'SettingsController@index',
		'as' => 'settings'
	]);

	Route::post('/settings/update', [
		'uses' => 'SettingsController@update',
		'as' => 'settings.update'
	]);

	/**
	 * 
	 *
	 *
	 *
	 *
	 *
	 */

	Route::get('/menus', [
		'uses' => 'MenuController@index',
		'as' => 'menus'
	]);

	Route::get('/menu/create', [
		'uses' => 'MenuController@create',
		'as' => 'menu.create'
	]);

	Route::post('/menu/store', [
		'uses' => 'MenuController@store',
		'as' => 'menu.store'
	]);

	Route::get('/menu/edit/{id}', [
		'uses' => 'MenuController@edit',
		'as' => 'menu.edit'
	]);

	Route::post('/menu/update/{id}', [
		'uses' => 'MenuController@update',
		'as' => 'menu.update'
	]);

	Route::post('/menu/delete/{id}', [
		'uses' => 'MenuController@destroy',
		'as' => 'menu.delete'
	]);
});