<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SliderController;

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
// Route::resource('blogcategory', 'App\Http\Controllers\BlogCategoryController');
// Route::resource('blog', 'App\Http\Controllers\BlogController');
// Route::resource('page', 'App\Http\Controllers\PageController');
// Route::resource('slider', 'App\Http\Controllers\SliderController');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
