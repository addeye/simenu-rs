<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MenuController;
use App\Models\Menu;
use App\Models\Setting;
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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('dologin', [AuthController::class, 'doLogin']);
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('doregister', [AuthController::class, 'doRegister']);

Route::get('/', function () {
    return view('welcome', [
        'menus' => Menu::all(),
        'setting' => Setting::find(1)
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::post('dologout', [AuthController::class, 'dologout'])->name('dologout');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resources([
        'user' => UserController::class, 'setting' => SettingController::class, 'menu' => MenuController::class

    ]);
    Route::get('set-status/{id}', [MenuController::class, 'setStatus']);
    Route::get('user-export', [UserController::class, 'export']);
    Route::get('setting-export', [SettingController::class, 'export']);
    Route::get('menu-export', [MenuController::class, 'export']);
});
