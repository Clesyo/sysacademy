<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;

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

Route::get('all_professors', [TeacherController::class, 'index'])->name('all_professors');
Route::get('add_professors', [TeacherController::class, 'create'])->name('add_professors');

Route::get('all_permissions', [PermissionController::class, 'index'])->name('all_permissions');
Route::get('permisson/new', [PermissionController::class, 'index'])->name('new_permission');


Route::get('all_roles', [RoleController::class, 'index'])->name('all_roles');