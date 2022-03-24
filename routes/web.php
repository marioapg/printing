<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\HomeController;
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

// Authentication Routes...
Route::get('/', [LoginController::class, 'showLoginForm'])->name('app.root');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/new-job', [HomeController::class, 'newJob'])->name('new-job');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user_id}', [UserController::class, 'show'])->name('users.show');
Route::delete('/users/{user_id}', [UserController::class, 'delete'])->name('users.delete');
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
