<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

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

Route::resource('products', ProductController::class);
// new
Route::get('/catactive/{id}', [ProductController::class, 'CatActive'])->name('CatActive');
Route::get('/cat/deactive/{id}', [ProductController::class, 'CatDeactive'])->name('CatDeactive');