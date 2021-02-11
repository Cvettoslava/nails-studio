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

Route::get('/', [App\Http\Controllers\HomeController::class,'welcome'])->name ('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/admin',[App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::resource('/admin/schedule', App\Http\Controllers\AdminScheduleController::class);#
Route::get('/admin/schedule/{schedule}/delete', [App\Http\Controllers\AdminScheduleController::class, 'delete'])->name('schedule.delete');