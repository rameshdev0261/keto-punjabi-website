<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('test', [ApiController::class, "test"]);
Route::get('get_channel_info', [ApiController::class, "getSubCount"]);
Route::post('uploadFile', [ApiController::class, "uploadFile"]);
Route::post('login', [UserController::class, "login"]);
Route::get('sliders', [HomeSliderController::class, "index"]);
Route::get('recipes', [RecipeController::class, "index"]);
Route::post('search_recipes', [RecipeController::class, "search_recipes"]);
Route::get('categories', [CategoryController::class, "index"]);

Route::get('get_navbar_menu', [ApiController::class, "getNavbarItems"]);
Route::get('get_social_links', [ApiController::class, "getSocialLinks"]);
Route::get('get_contact_us_data', [ApiController::class, "getContactUsData"]);
Route::get('products', [ProductController::class, "index"]);
Route::get('recipes/{id}', [RecipeController::class, "show"]);
Route::get('blogs', [BlogController::class, "index"]);
Route::get('settings', [SettingController::class, "index"]);

Route::middleware('auth:sanctum')->group(function () {

    //User
    Route::post('change_password', [UserController::class, "change_password"]);

    // Dashboard
    Route::get('dashboard', [DashboardController::class, "index"]);

    // Products
    Route::delete('products/{id}', [ProductController::class, "destroy"]);
    Route::post('products/edit', [ProductController::class, "edit"]);
    Route::post('products', [ProductController::class, "create"]);

    // Recipes
    Route::delete('recipes/{id}', [RecipeController::class, "destroy"]);
    Route::post('recipes/edit', [RecipeController::class, "edit"]);
    Route::post('recipes', [RecipeController::class, "create"]);

    // Category
    Route::delete('categories/{id}', [CategoryController::class, "destroy"]);
    Route::post('categories/edit', [CategoryController::class, "edit"]);
    Route::post('categories', [CategoryController::class, "create"]);

    // Tags
    Route::get('tags', [TagsController::class, "index"]);
    Route::delete('tags/{id}', [TagsController::class, "destroy"]);
    Route::post('tags/edit', [TagsController::class, "edit"]);
    Route::post('tags', [TagsController::class, "create"]);

    // Blogs
    Route::delete('blogs/{id}', [BlogController::class, "destroy"]);
    Route::post('blogs/edit', [BlogController::class, "edit"]);
    Route::post('blogs', [BlogController::class, "create"]);

    // Contacts
    Route::get('contacts', [ContactController::class, "index"]);
    Route::post('contacts', [ContactController::class, "create"]);
    Route::delete('contacts/{id}', [ContactController::class, "destroy"]);

    // HomeSliders
    Route::delete('sliders/{id}', [HomeSliderController::class, "destroy"]);
    Route::post('sliders/edit', [HomeSliderController::class, "edit"]);
    Route::post('sliders', [HomeSliderController::class, "create"]);

    // Settings
    Route::post('settings', [SettingController::class, "create"]);
});
