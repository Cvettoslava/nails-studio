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

Auth::routes();

Route::get('/contactUs', [App\Http\Controllers\HomeController::class,'contact'])->name ('contact');
Route::get('/', [App\Http\Controllers\HomeController::class,'welcome'])->name ('welcome');
Route::get('/nail_services', [App\Http\Controllers\HomeController::class,'nailServices'])->name ('nailServices');///tuk
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/admin',[App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/createService',[App\Http\Controllers\AdminController::class, 'createService'])->name('admin.createService');
Route::get('/admin/editService/{service}',[App\Http\Controllers\AdminController::class, 'editService'])->name('admin.editService');
Route::get('/admin/updateService/{service}',[App\Http\Controllers\AdminController::class, 'updateService'])->name('admin.updateService');
Route::get('/admin/storeService',[App\Http\Controllers\AdminController::class, 'storeService'])->name('admin.storeService');
Route::get('/admin/deleteService/{service}',[App\Http\Controllers\AdminController::class, 'deleteService'])->name('admin.deleteService');
Route::get('/admin/destroyService/{service}',[App\Http\Controllers\AdminController::class, 'destroyService'])->name('admin.destroyService');
Route::resource('/admin/schedule', App\Http\Controllers\AdminScheduleController::class);#
Route::get('/admin/schedule/{schedule}/delete', [App\Http\Controllers\AdminScheduleController::class, 'delete'])->name('schedule.delete');