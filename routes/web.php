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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin',[App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::resource('/admin/schedule', App\Http\Controllers\AdminScheduleController::class);#
Route::get('/admin/schedule/{schedule}/delete', [App\Http\Controllers\AdminScheduleController::class, 'delete'])->name('schedule.delete');