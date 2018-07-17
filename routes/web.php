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


Route::get('/', 'FrontendController@index')->name('index');
Route::get('/asd', function() {
	$asd= App\Tag::find(1)->posts()->get();
	foreach ($asd as $post) {
		return $post->title;
	}

});

Auth::routes();

//Route::get('/{category}/{slug}', 'FrontendController@single')->name('single');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/post/{category}/{slug}', 'FrontendController@single')->name('single');

Route::get('/category/{category}', 'FrontendController@category')->name('category');

Route::get('/tag/{tag}', 'FrontendController@tag')->name('tag');


Route::get('/results', function () {
	$posts = App\Post::where('title', 'like', '%' . request('term') . '%')->get();
	return view('result')
						->with('posts', $posts)
						->with('term', request('term'))
						->with('site', App\Setting::first())
						->with('categories', App\Category::all())
						->with('menus', App\Menu::where('main', 1)->first()->categories)
						->with('latest_post', App\Post::orderBy('created_at', 'desc')->get());
})->name('results');

/**
 * Group route for admin managamenet
 * @param middleware
 * @param added URL
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	
	/* <!--  Post Routes  -->
	1-) Index*/
	Route::get('/posts', 'PostsController@index')->name('posts');
	/*
	2-) Create Route (goto 5)
	*/
	Route::get('/post/create', 'PostsController@create')->name('create.post');
	/*
	3-) Edit Route (goto 4)
	*/
	Route::get('/post/edit/{id}', 'PostsController@edit')->name('edit.post');
	/*
	4-) Update data
	*/
	Route::post('/post/update/{id}', 'PostsController@update')->name('update.post');
	/*
	5-) Store data
	*/
	Route::post('/post/store', 'PostsController@store')->name('store.post');
	/*
	6-) Trashed route
	*/
	Route::get('/post/trashed', 'PostsController@trashed')->name('trashed.post');
	/*
	7-) Restoring Trashed Post
	*/
	Route::post('/post/trashed/restore', 'PostsController@restore')->name('restore.post');
	/*
	8-) Post to trashed posts
	*/
	Route::get('/post/destroy/{id}', 'PostsController@destroy')->name('delete.post');
	/*
	9-) Delete post permanently
	*/
	Route::get('/post/delete/{id}', 'PostsController@kill')->name('kill.post');
	/* <!--  End Post Routes  --> */


	/* <!--  Categories Routes  --> 
	1-) Index*/
	Route::get('/categories', 'CategoriesController@index')->name('categories');
	/*
	2-) Create Route
	*/
	Route::get('/category/create', 'CategoriesController@create')->name('create.category');
	/*
	3-) Store Data
	*/
	Route::post('/category/store', 'CategoriesController@store')->name('store.category');
	/*
	4-) Edit Route
	*/
	Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('edit.category');
	/*
	5-) Updating Data
	*/
	Route::post('/category/update/{id}', 'CategoriesController@update')->name('update.category');
	/*
	6-) Deleting Data permanently
	*/
	Route::get('/category/destroy/{id}', 'CategoriesController@destroy')->name('delete.category');
	/* <!--  End Category Routes  --> */


	/* <!--  Settings Routes  --> 
	1-) Index*/
	Route::get('/settings', 'SettingsController@index')->name('settings');
	/*
	2-) Updating settings
	*/
	Route::post('/setting/update', 'SettingsController@update')->name('update.setting');
	/* <!--  End Settings Routes  --> */


	/* <!--  Settings Routes  --> 
	1-) Index*/
	Route::get('/tags', 'TagsController@index')->name('tags');
	/*
	2-) Edit Route
	*/
	Route::get('/tag/edit/{id}', 'TagsController@edit')->name('edit.tag');
	/*
	3-) Updating Data
	*/
	Route::post('/tag/update/{id}', 'TagsController@update')->name('update.tag');
	/*
	4-) Create Route
	*/
	Route::get('/tag/create', 'TagsController@create')->name('create.tag');
	/*
	5-) Store Data
	*/
	Route::post('/tag/store', 'TagsController@store')->name('store.tag');
	/*
	6-) Deleting data permanently
	*/
	Route::get('/tag/delete/{id}', 'TagsController@destroy')->name('destroy.tag');
	/* <!--  End Tag Routes  --> */


	/* <!--  Menus Routes  --> 
	1-) Index*/
	Route::get('/menus', 'MenusController@index')->name('menus');
	/*
	2-) Create Route
	*/
	Route::get('/menu/create', 'MenusController@create')->name('create.menu');
	/*
	3-) Store Data
	*/
	Route::post('/menu/store', 'MenusController@store')->name('store.menu');
	/*
	4-) Edit Route
	*/
	Route::get('/menu/edit/{id}', 'MenusController@edit')->name('edit.menu');
	/*
	5-) Updating data
	*/
	Route::post('/menu/update/{id}', 'MenusController@update')->name('update.menu');
	/*
	6-) Deleting data permanently
	*/
	Route::get('/menu/destroy/{id}', 'MenusController@destroy')->name('destroy.menu');
	/* <!--  End Menus Routes  --> */


	/* <!--  User-Profile Routes  --> 
	1-) Index*/
	Route::get('/users', 'UsersController@index')->name('users');

	Route::get('/user/profile', 'ProfilesController@index')->name('user.profile');

	Route::post('/user/profile/edit', 'ProfilesController@update')->name('user.profile.update');

	Route::get('user/create', 'UsersController@create')->name('user.create');

	Route::post('/user/store', 'UsersController@store')->name('user.store');

	Route::get('/user/delete/{id}', 'UsersController@destroy')->name('user.destroy');
});