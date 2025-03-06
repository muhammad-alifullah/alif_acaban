<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



 //Dashboard
 route::get('/dashboard',[App\Http\Controllers\Dashboard\DashboardController::class,'index'])->name('dashboard');




//Users
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard/user', [App\Http\Controllers\dashboard\UserController::class, 'index'])->name('dashboard.users');
Route::get('/dashboard/user/create', [App\Http\Controllers\dashboard\UserController::class, 'create'])->name('dashboard.users.create');
Route::post('/dashboard/user', [App\Http\Controllers\dashboard\UserController::class, 'store'])->name('dashboard.users.store');
Route::get('/dashboard/user/edit/{user}', [App\Http\Controllers\Dashboard\UserController::class, 'edit'])->name('dashboard.users.edit');
Route::put('/dashboard/user/update/{user}', [App\Http\Controllers\Dashboard\UserController::class, 'update'])->name('dashboard.users.update');
Route::delete('/dashboard/user/delete/{user}', [App\Http\Controllers\Dashboard\UserController::class, 'destroy'])->name('dashboard.users.delete');


//Siswa
Route::get('/dashboard/siswa', [App\Http\Controllers\dashboard\SiswaController::class, 'index'])->name('dashboard.siswa');
Route::get('/dashboard/siswa/create', [App\Http\Controllers\Dashboard\SiswaController::class, 'create'])->name('dashboard.siswa.create');
Route::post('/dashboard/siswa', [App\Http\Controllers\Dashboard\SiswaController::class, 'store'])->name('dashboard.siswa.store');
Route::delete('/dashboard/siswa/{siswa}', [App\Http\Controllers\Dashboard\SiswaController::class, 'destroy'])->name('dashboard.siswa.delete');
Route::get('/dashboard/siswa/edit/{siswa}', [App\Http\Controllers\Dashboard\SiswaController::class, 'edit'])->name('dashboard.siswa.edit');
Route::put('/dashboard/siswa/edit/{siswa}', [App\Http\Controllers\Dashboard\SiswaController::class, 'update'])->name('dashboard.siswa.update');
Route::get('/dashboard/siswa/{siswa}', [App\Http\Controllers\dashboard\SiswaController::class, 'show'])->name('dashboard.siswa.show');

