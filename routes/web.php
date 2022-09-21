<?php

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
    // Template View
Route::get('/home', function(){
    return view('template.index');
})->name('template.home');
Route::get('/about', function(){
    return view('template.pages.about');
})->name('template.about');
Route::get('/classes', function(){
    return view('template.pages.class');
})->name('template.class');
Route::get('/teams', function(){
    return view('template.pages.team');
})->name('template.team');
Route::get('/gallery', function(){
    return view('template.pages.gallery');
})->name('template.gallery');
Route::get('/blogs', function(){
    return view('template.pages.blog');
})->name('template.blog');
Route::get('/blog-detail', function(){
    return view('template.pages.single');
})->name('template.single');
Route::get('/contact', function(){
    return view('template.pages.contact');
})->name('template.contact');

// Admin View
Route::get('admin/home', function(){
    return view('admin.index');
});

// Pages Controller
//Route::get('/home', [PagesController::class, 'index'])->name('template.home');

