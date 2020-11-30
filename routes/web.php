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

use Illuminate\Support\Facades\Input;


Auth::routes();

/*** User Routes ***/

/** Home Page Routes **/

Route::get('/', 'User\HomeController@index')->name('welcome');

Route::get('/home', 'User\HomeController@index')->name('home');

Route::get('/about', 'User\HomeController@about')->name('about');

Route::get('/contact-us', 'User\HomeController@contact')->name('contact');

Route::get('/privacy-and-policy', 'User\HomeController@privacy')->name('privacy');

Route::get('/open-access-policy', 'User\HomeController@openAccess')->name('open-access');

/** News Routes **/

Route::get('/lnews', 'User\NewController@allNews')->name('allnews');

Route::get('/lnews/single_new/{new}', 'User\NewController@singleNew')->name('singlenew');

/** Journal Routes **/

Route::get('/journals/{journal}', 'User\JournalController@index')->name('journal');

Route::get('/scope/{journal}', 'User\JournalController@scope')->name('scope');

Route::get('/authorgl/{journal}', 'User\JournalController@authorGuidLines')->name('agl');

Route::get('/authorres/{journal}', 'User\JournalController@authorResources')->name('ares');

Route::get('/editorialboard/{journal}', 'User\JournalController@editorialBoard')->name('editorialboard');

Route::get('/researchtopics/{journal}', 'User\JournalController@researchTopics')->name('researchtopics');

Route::get('/researchtopics/{journal}/single/{topic}', 'User\JournalController@singleTopic')->name('singletopic');

Route::get('/articles/{journal}', 'User\JournalController@articles')->name('articles');

Route::get('/articles/{journal}/single/{article}', 'User\JournalController@singleArticle')->name('singlearticle');

Route::get('journal/{journal}/volume/{volume}/issue/{issue}', 'User\JournalController@issue')->name('issue');

/*** Search Route ***/

Route::get('/search', 'SearchController@search')->name('search');


/*** Admin Routes ***/

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/admin', function (){
       return redirect('admin/dashboard');
    });

    Route::get('/admin/dashboard', 'Admin\HomeController@index')->name('dashboard');

	Route::resource('admin/admins', 'Admin\AdminController', ['except' => ['show']]);

	Route::resource('admin/users', 'Admin\UserController', ['except' => ['show']]);

	Route::resource('admin/journals', 'Admin\JournalController');

	Route::resource('admin/volumes', 'Admin\VolumeController');

	Route::resource('admin/issues', 'Admin\IssueController');

	Route::resource('admin/lnews', 'Admin\LatestnewController');

	Route::resource('admin/editors', 'Admin\EditorController');

	Route::resource('admin/rtopics', 'Admin\ResearchtopicController');

	Route::resource('admin/branches', 'Admin\BranchController');

	Route::post('admin/articles/create', 'Admin\ArticleController@create')->name('articles.create');

	Route::get('admin/articles', 'Admin\ArticleController@index')->name('articles.index');
	Route::post('admin/articles', 'Admin\ArticleController@store')->name('articles.store');
	Route::get('admin/articles/{article}', 'Admin\ArticleController@show')->name('articles.show');
	Route::get('admin/articles/{article}/edit', 'Admin\ArticleController@edit')->name('articles.edit');
	Route::patch('admin/articles/{article}', 'Admin\ArticleController@update')->name('articles.update');
	Route::delete('admin/articles/{article}', 'Admin\ArticleController@destroy')->name('articles.destroy');


	Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'Admin\ProfileController@edit']);
	Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'Admin\ProfileController@update']);
	Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'Admin\ProfileController@password']);
});

