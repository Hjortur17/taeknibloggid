<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
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

Route::get('/', [PageController::class, 'index']);
Route::get('/um-siðuna', [PageController::class, 'about']);
Route::get('/bloggið', [PostController::class, 'index']);
Route::get('/bloggið/{slug}', [PostController::class, 'show']);

