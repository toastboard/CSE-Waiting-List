<?php

use Illuminate\Support\Facades\Route;

//namespace for Routes
use App\Http\Controllers\PagesController;

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

/*
my comments and samples

Route::get('/hello', function () {
    return '<h1>Hello World<h1>';
});

Route::get('/users/{id}/{name}', function($id, $name) {
    return 'This is user '.$name. ' with an id of '.$id;
});

*/

// Routes to home (sample form page) and login
Route::get('/', [PagesController::class, 'index'] );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
