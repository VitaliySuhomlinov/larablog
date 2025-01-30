<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/', [MainController::class, 'index'])->name('admin.main.index');
    Route::resource('categories', CategoryController::class)->names(
        [
            'index'   => 'admin.categories.index',
            'create'  => 'admin.categories.create',
            'store'   => 'admin.categories.store',
            'show'    => 'admin.categories.show',
            'edit'    => 'admin.categories.edit',
            'update'  => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy',
        ]
    );
    Route::resource('posts', PostController::class)->names(
        [
            'index'   => 'admin.posts.index',
            'create'  => 'admin.posts.create',
            'store'   => 'admin.posts.store',
            'show'    => 'admin.posts.show',
            'edit'    => 'admin.posts.edit',
            'update'  => 'admin.posts.update',
            'destroy' => 'admin.posts.destroy',
        ]
    );
});



Route::middleware('guest')->group(function(){
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authenticate'])->name('login.authenticate');
});

