<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AuthController;
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

Route::prefix('admin')->group(function () {
    // Role Controller
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles', [RoleController::class, 'update'])->name('roles.update');
    Route::post('/roles/delete', [RoleController::class, 'destroy'])->name('roles.destroy');
    // Auth Controller
    Route::get('/register', [AuthController::class, 'register_form'])->name('user.register');
    Route::post('/register/store', [AuthController::class, 'register_store'])->name('register.store');
    Route::get('/user/list', [AuthController::class, 'user_list'])->name('user.list');
});



    



// Pages Controller
//Route::get('/home', [PagesController::class, 'index'])->name('template.home');

