<?php

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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/admin', [AuthAdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AuthAdminController::class, 'logstore'])->name('admin.logstore');
Route::get('/admin/register', [AuthAdminController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [AuthAdminController::class, 'registore'])->name('admin.registore');
Route::post('/admin/logout', [AuthAdminController::class, 'destroy'])
->name('admin.logout');

Route::resource('admin/dashboard', AdminController::class);
Route::resource('admin/menu', MenuController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
