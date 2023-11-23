<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FormController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('index');
})->name('index');;


Route::get('{name}', [PageController::class,'show'])
    ->name('page.show');

Route::get('category/{slug}/{sub?}',[PostController::class,'index'])
    ->name('post.index');

Route::get('post/{slug}', [PostController::class,'show'])
    ->name('post.show');

Route::post('form', [FormController::class,'index'])
->name('form');