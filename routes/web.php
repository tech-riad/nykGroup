<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SliderController;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Blog Category
Route::get('/blogcategory/index', [BlogCategoryController::class, 'index'])->name('blogcategory.index');
Route::get('/blogcategory/create', [BlogCategoryController::class, 'create'])->name('blogcategory.create');
Route::post('/blogcategory/store', [BlogCategoryController::class, 'store'])->name('blogcategory.store');
Route::get('/blogcategory/edit/{id}', [BlogCategoryController::class, 'edit'])->name('blogcategory.edit');
Route::post('/blogcategory/update/{id}', [BlogCategoryController::class, 'update'])->name('blogcategory.update');
Route::delete('/blogcategory/delete/{id}',[BlogCategoryController::class, 'destroy'])->name('blogcategory.destory');



Route::get('/blog/index', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/delete/{id}',[BlogController::class, 'destroy'])->name('blog.destory');

// Page Route

Route::get('/page/index', [PageController::class, 'index'])->name('page.index');
Route::get('/page/create', [PageController::class, 'create'])->name('page.create');
Route::post('/page/store', [PageController::class, 'store'])->name('page.store');
Route::get('/page/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
Route::post('/page/update/{id}', [PageController::class, 'update'])->name('page.update');
Route::delete('/page/delete/{id}',[PageController::class, 'destroy'])->name('page.destory');

// Slider Route
Route::get('/slider/index', [SliderController::class, 'index'])->name('slider.index');
Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
Route::delete('/slider/delete/{id}',[SliderController::class, 'destroy'])->name('slider.destory');


// Route::resource('blog', 'App\Http\Controllers\BlogController');
