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

// Routes to the welcome page.
Route::get('/', [PagesController::class, 'index'] );

Auth::routes();

// Route to get the form page.
Route::get('/form', [App\Http\Controllers\FormController::class, 'index'])->name('form')->middleware('auth');

// Post route to submit a form into the store function.
Route::post('/form', [App\Http\Controllers\FormController::class, 'store']);

// Route to the waiting list entries.
Route::resource('entries', 'Waiting_List_EntryController')->middleware('auth');

// Route to the dashboard page
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Route to the logoout function.
Route::get('/logout', 'LoginController@logout');
