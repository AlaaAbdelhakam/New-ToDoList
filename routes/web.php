<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LiveSearch;
// use Auth;
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
// Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
// Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');

Auth::routes(['register' => false,'login' => false]);



// Route::group(['middleware' => ['signed']], function() {

// });





Route::get('/live_search',[App\Http\Controllers\LiveSearch::class, 'index'])->name('search');
Route::get('/live_search/action', [App\Http\Controllers\LiveSearch::class, 'action'])->name('live_search.action');

























// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::resource('tasks', TaskController::class);
// Route::get('/home', [App\Http\Controllers\TaskController::class, 'index'])->name('home');
// Route::get('/task/edit/{id}', [App\Http\Controllers\TaskController::class, 'edit'])->name('edit');
// Route::get('/task/delete/{id}', [App\Http\Controllers\TaskController::class, 'delete'])->name('delete');
// Route::post('/task/update/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('update');







// Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');



###########################################################################################################################
###########################################################################################################################



Route::group(['namespace' => 'App\Http\Controllers'], function()
{   

    
    Route::post('/register', 'RegisterController@register')->name('register.perform');
    Route::get('/register', 'RegisterController@show')->name('register.show');


    Route::group(['prefix' => 'posts'], function() {
    Route::get('/', 'PostsController@index')->name('posts.index');
    Route::get('/{post}/show', 'PostsController@show')->name('posts.show');
   
    });


    Route::get('/done/{id}','PostsController@done')->name('done');
    Route::get('/reopen/{id}','PostsController@reopen')->name('reopen');
    Route::get('/login', 'LoginController@show')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login.perform');
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

    Route::group(['middleware' => ['permission']], function() {
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UsersController@index')->name('users.index');
            Route::get('/create', 'UsersController@create')->name('users.create');
            Route::post('/create', 'UsersController@store')->name('users.store');
            Route::get('/{user}/show', 'UsersController@show')->name('users.show');
            Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
            Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
            Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        });


        Route::group(['prefix' => 'posts'], function() {
            Route::get('/create', 'PostsController@create')->name('posts.create');
            Route::post('/create', 'PostsController@store')->name('posts.store');
            Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
            Route::patch('/{post}/update', 'PostsController@update')->name('posts.update');
            Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
           
        });

        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });

});










