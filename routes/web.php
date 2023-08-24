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

Route::group(['middleware' => ['auth', 'is_admin'] , 'prefix' => 'admin'], function() {
    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('cerate-category', [App\Http\Controllers\Admin\CategoryController::class, 'createCategory'])->name('admin.category.create');
    Route::post('cerate-category', [App\Http\Controllers\Admin\CategoryController::class, 'createCategorySave'])->name('admin.category.create.save');
});
