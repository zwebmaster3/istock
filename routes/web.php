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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function() {
  Route::resource('users', 'UsersController');
});

/*Examples*/
// Route::get('saludo/{saludo}', function($saludo){
// 	echo $saludo;
// });

Route::group(['prefix' => 'saludos'], function(){
	Route::get('view/{saludo}', [
		'uses' => 'SaludosController@view',
		'as' => 'saludosview'
	]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', function() {
  return view('index');
})->name('index');
