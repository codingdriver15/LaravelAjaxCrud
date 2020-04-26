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
//     return view('welcome');
// });

Route::get('files', 'FileController@index');
Route::post('files', 'FileController@store')->name('file.store');
Route::post('files/remove', 'FileController@remvoeFile')->name('file.remove');



Route::get('/redirect', 'SocialController@redirect');
Route::get('/callback', 'SocialController@callback');

Route::resource('posts', 'PostController');

Route::get('image', 'ImageController@index');
Route::post('save-image', 'ImageController@save');

Auth::routes();
Route::get('/', 'frontend\DefaultController@index')->name('index');
Route::post('/contact', 'frontend\ContactController@contact');

Route::group(['middleware' => ['auth']], function () {
  Route::get('/dashboard', 'DashboardController@index')->name('index');
  Route::resource('users', 'UserController');
  // Route::get('ajax-crud', 'AjaxCrudController@manageItemAjax');
  Route::resource('item-ajax', 'AjaxCrudController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
