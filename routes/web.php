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
    dd(App\Tag::find(4)->posts);
});

Route::get('/', [
        'uses' => 'FrontEndController@index',
        'as' => 'index'

    ]);

Route::get('/post/{slug}',[
        'uses' => 'FrontEndController@singlePost',
        'as' => 'post.single'


    ]);

Route::get('/category/{id}',[
        'uses' => 'FrontEndController@category',
        'as' => 'category.single'


    ]);

Route::get('/results',function(){

    $posts = App\Post::where('title','like','%'.request('query').'%')->get();
    return view('results')
                          ->with('posts',$posts)
                          ->with('settings',App\Settings::first())
                          ->with('title','Search Results : '.request('query'))
                          ->with('categories',App\Category::take(5)->get())
                          ->with('query',request('query'));

});


Auth::routes();





Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {


     Route::get('/dashboard',[
        'uses' => 'HomeController@index',
        'as' => 'home'


    ]);


    Route::get('/post/create',[
        'uses' => 'PostsController@create',
        'as' => 'post.create'


    ]);

    Route::get('/category/create',[
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'


    ]);

    Route::get('/tag/create',[
        'uses' => 'TagsController@create',
        'as' => 'tag.create'


    ]);

    Route::get('/user/create',[
        'uses' => 'UsersController@create',
        'as' => 'user.create'


    ]);


    Route::get('/categories',[
        'uses' => 'CategoriesController@index',
        'as' => 'categories'


    ]);

    Route::get('/posts',[
        'uses' => 'PostsController@index',
        'as' => 'posts'


    ]);

    Route::get('/tags',[
        'uses' => 'TagsController@index',
        'as' => 'tags'


    ]);

    Route::get('/users',[
        'uses' => 'UsersController@index',
        'as' => 'users'


    ]);

    Route::get('/posts/trashed',[
        'uses' => 'PostsController@trashed',
        'as' => 'post.trashed'


    ]);

    Route::get('/posts/kill/{id}',[
        'uses' => 'PostsController@kill',
        'as' => 'post.kill'


    ]);

    Route::get('/posts/restore/{id}',[
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'


    ]);

    Route::get('/category/edit/{id}',[
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'


    ]);

    Route::get('/category/delete/{id}',[
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'


    ]);

    Route::get('/tag/edit/{id}',[
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'


    ]);

    Route::get('/tag/delete/{id}',[
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'


    ]);

    Route::post('/tag/update/{id}',[
        'uses' => 'TagsController@update',
        'as' => 'tag.update'


    ]);

    Route::post('/category/update/{id}',[
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'


    ]);

        Route::get('/post/edit/{id}',[
        'uses' => 'PostsController@edit',
        'as' => 'post.edit'


    ]);

    Route::get('/post/delete/{id}',[
        'uses' => 'PostsController@destroy',
        'as' => 'post.delete'


    ]);

    Route::get('/user/delete/{id}',[
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'


    ]);

    Route::get('/user/admin/{id}',[
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'


    ]);

    Route::get('/user/profile',[
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'


    ]);


    Route::get('/user/not-admin/{id}',[
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'


    ]);

    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as' => 'settings'


    ]);



    Route::post('/settings/update',[
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'


    ]);


    Route::post('/post/update/{id}',[
        'uses' => 'PostsController@update',
        'as' => 'post.update'


    ]);


    Route::post('/post/store',[
        'uses' => 'PostsController@store',
        'as' => 'post.store'


    ]);

        Route::post('/category/store',[
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'


    ]);

     Route::post('/tag/store',[
        'uses' => 'TagsController@store',
        'as' => 'tag.store'


    ]);

    Route::post('/user/store',[
        'uses' => 'UsersController@store',
        'as' => 'user.store'


    ]);

     Route::post('/user/profile/update',[
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'


    ]);




});
