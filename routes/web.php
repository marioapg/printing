<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\JobLogController;
use App\Http\Controllers\Admin\GerenceController;
use App\Http\Controllers\Admin\SubGerenceController;
use App\Http\Controllers\User\JobController as UJobController;
use App\Http\Controllers\Gerencia\JobController as GJobController;
use App\Http\Controllers\User\JobLogController as UJobLogController;
use App\Http\Controllers\AGerencia\JobController as AGerenciaJobController;
use App\Http\Controllers\AGerencia\JobLogController as AGerenciaJobLogController;

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
Route::group(['middleware' => ['https']], function(){
    // Authentication Routes...
    Route::get('/', [LoginController::class, 'showLoginForm'])
        ->name('app.root');
    Route::get('login', [LoginController::class, 'showLoginForm'])
        ->name('login');
    Route::post('login', [LoginController::class, 'login'])
    ->name('login');
});

Route::group(['middleware' => ['auth', 'https']], function(){
    Route::post('logout', [LoginController::class, 'logout'])
        ->name('logout');
    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');

    Route::prefix('admin')->group(function () {
        // Admin users routes
        Route::get('users', [UserController::class, 'index'])
            ->name('users.index');
        Route::post('users', [UserController::class, 'store'])
            ->name('users.store');
        Route::get('users/{user_id}', [UserController::class, 'edit'])
            ->name('users.edit');
        Route::put('users/{user_id}', [UserController::class, 'update'])
            ->name('users.update');
        Route::delete('users/{user_id}', [UserController::class, 'delete'])
            ->name('users.delete');
        Route::get('users-create', [UserController::class, 'create'])
            ->name('users.create');

        // Admin Routes
        Route::get('jobs', [JobController::class, 'index'])
            ->name('jobs.index');
        Route::get('jobs-create', [JobController::class, 'create'])
            ->name('jobs.create');
        Route::post('jobs-store', [JobController::class, 'store'])
            ->name('jobs.store');
        Route::get('jobs/{job_id}', [JobController::class, 'show'])
            ->name('jobs.show');
        Route::get('jobs/{job_id}/edit', [JobController::class, 'edit'])
            ->name('jobs.edit');
        Route::get('gerences', [GerenceController::class, 'index'])
            ->name('gerences.index');
        Route::get('subgerences', [SubGerenceController::class, 'index'])
            ->name('subgerences.index');
    });

    Route::put('jobs/{job_id}', [JobController::class, 'update'])
        ->name('jobs.update');
    Route::post('jobs/{job_id}/comment', [JobLogController::class, 'store'])
        ->name('comments.store');
    Route::post('jobs/{job_id}/comment/user', [UJobLogController::class, 'store'])
        ->name('user.comments.store');
    Route::post('jobs/{job_id}/comment/admin-gerence', [AGerenciaJobLogController::class, 'store'])
        ->name('agerence.comments.store');
    Route::get('jobs/{job_id}/comment/{comment_id}', [JobLogController::class, 'show'])
        ->name('comments.show');
    Route::get('gerences/{gerence_id}/subgerences', [SubGerenceController::class, 'ajax'])
        ->name('subgerences.ajax');


    Route::prefix('user')->group(function () {
        // User routes: JOBS
        Route::get('myjobs', [UJobController::class, 'index'])
        ->name('myjobs.index');
        Route::get('myjobs/{job_id}', [UJobController::class, 'show'])
        ->name('myjobs.show');
        Route::get('myjobs/{job_id}/edit', [UJobController::class, 'edit'])
        ->name('myjobs.edit');
        Route::put('myjobs/{job_id}', [UJobController::class, 'update'])
        ->name('myjobs.update');
    });

    // GERENCIA
    Route::prefix('gerencia')->group(function () {
        Route::get('jobs', [GJobController::class, 'index'])
            ->name('gerencejobs.index');
        Route::get('jobs/{job_id}', [GJobController::class, 'show'])
            ->name('gerencejobs.show');
    });

    // ADMIN GERENCIA
    Route::prefix('admingerencia')->group(function () {
        Route::get('jobs', [AGerenciaJobController::class, 'index'])
            ->name('agerence.jobs.index');
        Route::get('jobs-create', [AGerenciaJobController::class, 'create'])
            ->name('agerence.jobs.create');
        Route::post('jobs-store', [AGerenciaJobController::class, 'store'])
            ->name('agerence.jobs.store');
        Route::get('jobs/{job_id}', [AGerenciaJobController::class, 'show'])
            ->name('agerence.jobs.show');
        Route::get('jobs/{job_id}/edit', [AGerenciaJobController::class, 'edit'])
            ->name('agerence.jobs.edit');
        Route::put('jobs/{job_id}', [AGerenciaJobController::class, 'update'])
            ->name('agerence.jobs.update');
    });

    Route::get('tablas/info', function(){
        return view('tablas');
    })->name('tablas.index');
});
