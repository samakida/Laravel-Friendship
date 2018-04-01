<?php

use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile/{id}', 'ProfileController@index');
    Route::get('/profile', function () {
        return redirect()->action(
            'ProfileController@index', ['id' => Auth::user()->id]
        );
    })->name('profile');
    Route::get('/editprofile', 'ProfileController@edit')->name('editprofile');
    Route::post('/editprofile', 'ProfileController@update');
    Route::post('/uploadephoto', 'ProfileController@uploadePhoto')->name('uploadephoto');
});

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
