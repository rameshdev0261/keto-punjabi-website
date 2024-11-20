<?php

use App\Http\Controllers\RouteController;
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


Route::get('/', [RouteController::class, 'landing']);

Route::get('/about', [RouteController::class, 'about']);

Route::get('/contact-us', [RouteController::class, 'contactUs']);

Route::get('/recipe/{id}', [RouteController::class, 'recipe']);

Route::get('/all-recipes', [RouteController::class, 'allRecipes']);

Route::get('/all-products', [RouteController::class, 'allProducts']);

Route::get('/terms-conditions', [RouteController::class, 'terms']);

Route::get('/privacy-policy', [RouteController::class, 'privacy']);

Route::get('/blog', [RouteController::class, 'blog']);

// Admin
Route::redirect('/admin', '/admin/login')->name('login');

Route::get('/admin/{any}', [RouteController::class, 'admin'])->where('any', '.*');
