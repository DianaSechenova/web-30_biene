<?php

use App\Http\Controllers\FreeController;
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

Route::get('/', '\App\Http\Controllers\SimplePageController@index')->name('index');
Route::get('/free', FreeController::class)->name('free');
Route::get('/about', '\App\Http\Controllers\SimplePageController@about')->name('about');
Route::get('/individuelle', '\App\Http\Controllers\SimplePageController@individuelle')->name('form');
Route::post('/individuelle', '\App\Http\Controllers\SimplePageController@save_message')->name('save_message');

//auth
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//admin
Route::get('/admin/add_image', '\App\Http\Controllers\AdminImagesController@add')->name('add_image_get');
Route::post('/admin/add_image', '\App\Http\Controllers\AdminImagesController@save')->name('add_image_post');

Route::get('/admin/edit_image/{id}', '\App\Http\Controllers\AdminImagesController@edit')->name('edit_image_get');
Route::post('/admin/edit_image/{id}', '\App\Http\Controllers\AdminImagesController@edit_save')->name('edit_image_post');
//
Route::get('/admin/admin_image', '\App\Http\Controllers\AdminImagesController@delete')->name('admin_image_get');
Route::delete('/admin/admin_image', '\App\Http\Controllers\AdminImagesController@delete')->name('admin_image_post');
Route::get('/404', function (){
    return view('404');
})->name('404');
