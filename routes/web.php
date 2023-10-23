<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AuthAdminController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

// admin
Route::get('/admin', [AuthAdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AuthAdminController::class, 'logstore'])->name('admin.logstore');

Route::middleware(['auth', 'role_user:1'])->group(function () {
    Route::get('/admin/register', [AuthAdminController::class, 'register'])->name('admin.register');
    Route::post('/admin/register', [AuthAdminController::class, 'registore'])->name('admin.registore');
    Route::post('/admin/logout', [AuthAdminController::class, 'destroy'])
    ->name('admin.logout');

    Route::resource('admin/dashboard', AdminController::class);
    Route::resource('admin/menu', MenuController::class);
});

// user

Route::get('/detail-menu/{id}', [HomeController::class, 'detailmenu'])->name('detail-menu');

Route::middleware(['auth', 'role_user:2'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});





// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
