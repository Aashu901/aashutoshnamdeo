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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'userDashboard'])->name('home');


// Admin Routes
Route::group(['middleware' => ['auth', 'is_admin'] , 'prefix' => 'admin'], function() {
    // Admin Dashboard
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

    // Category creat
    Route::get('cerate-category', [App\Http\Controllers\Admin\CategoryController::class, 'createCategory'])->name('admin.category.create');
    Route::post('cerate-category', [App\Http\Controllers\Admin\CategoryController::class, 'createCategorySave'])->name('admin.category.create.save');

    // Category Edit
    Route::get('edit/category/{categoryId}', [App\Http\Controllers\Admin\CategoryController::class, 'editCategory'])->name('admin.category.edit');
    Route::post('edit/category/save', [App\Http\Controllers\Admin\CategoryController::class, 'editCategorySave'])->name('admin.category.edit.save');

    // Delete Category
    Route::get('delete/category/{categoryId}', [App\Http\Controllers\Admin\CategoryController::class, 'deleteCategory'])->name('admin.category.delete');

    // List User 
    Route::get('user/list', [App\Http\Controllers\Admin\UsersController::class, 'listUser'])->name('admin.user.list');


});
