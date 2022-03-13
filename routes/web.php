<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HelperController;

use Illuminate\Support\Facades\Artisan;
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


// admin routes
Route::get('/', [AdminController::class, 'getLogin']);
Route::post('admin/login', [AdminController::class, 'postLogin']);
Route::get('admin/not_allow', [AdminController::class, 'not_allow']);
Route::group(array('prefix' => 'admin', 'middleware' => 'admin'), function () {
    Route::get('logout', [AdminController::class, 'logout']);

    Route::resource('users', UserController::class);
    Route::resource('admins', AdminsController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('profile', ProfileController::class);
    //tasks
    Route::get('tasks', [TaskController::class, 'index']);
    Route::post('tasks', [TaskController::class, 'store']);
    Route::post('tasks/done/{id}', [TaskController::class, 'done']);
    Route::get('fetch-tasks', [TaskController::class, 'fetchtask']);
    //end tasks
    Route::get('edit_active/{type}/{id}', [AdminController::class, 'edit_active']);
    Route::get('photo/{id}', [PhotoController::class, 'destroy'])->name('admin.photo.destroy');
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/create', [HelperController::class, 'create']);
    Route::resource('log', LogController::class);
});

// website routes
Route::get('/clear', function () {
    //Artisan::call('migrate:fresh --seed');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return 'view cache cleared';
});



//Auth::routes();
Route::get('lang', [HomeController::class, 'language']);
