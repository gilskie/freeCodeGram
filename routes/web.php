<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

// temporary only!
Route::get('/email', function () {
    return new App\Mail\NewUserWelcomeMail();
});

Route::post('follow/{user}', 'App\Http\Controllers\FollowsController@store');
// Route::get('follow/{user}', 'App\Http\Controllers\FollowsController@store');

Route::get('/', 'App\Http\Controllers\PostsController@index');
Route::get('/p/create', 'App\Http\Controllers\PostsController@create');
Route::get('/p/{post}', 'App\Http\Controllers\PostsController@show');
Route::post('/p', 'App\Http\Controllers\PostsController@store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\ProfilesController::class, 'index'])->name('home');

Route::get('/profile/{user}', 'App\Http\Controllers\ProfilesController@index')->name('profile.show');

// Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::get('/profile/{user}/edit', 'App\Http\Controllers\ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'App\Http\Controllers\ProfilesController@update')->name('profile.update');
