<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DropzoneController;
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
    Route::get('/user/{id}/edit', [AuthController::class, 'edit_user'])->name('edit.user');
    Route::post('/user/{id}/upload', [AuthController::class, 'upload_user'])->name('upload.user');
    Route::post('/user/delete', [AuthController::class, 'destroy'])->name('delete.user');
    Route::post('/user/multiple-delete', [AuthController::class, 'choose_delete'])->name('delete.choose.user');
    Route::get('/user/list-delete', [AuthController::class, 'list_choose_user'])->name('list.choose.user');
    Route::post('/user/come-back/', [AuthController::class, 'come_back_user'])->name("come.back.user");
    Route::post('/user/destroy-choose', [AuthController::class, 'destroy_choose_users'])->name('destroy.choose.users');
    
    //File Controller
    Route::post('/file/store', [DropzoneController::class, 'file_store'])->name('file.store');
    Route::get('/list/file', [DropzoneController::class, 'list_file'])->name('list.file');
    Route::post('/file/destroy', [DropzoneController::class, 'destroy_file'])->name('delete.file');
});



    



// Pages Controller
//Route::get('/home', [PagesController::class, 'index'])->name('template.home');

