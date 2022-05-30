<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManagementController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
	Route::get('/home', [HomeController::class, 'index'])->name('home.index');
	Route::get('/users/{id}/skill', [UserController::class, 'skill'])->name('users.skill');
	Route::get('/users/{id}/skill/edit', [UserController::class, 'edit'])->name('users.edit');
});

Route::group(["middleware" => ["auth", "can:leader-higher"]], function(){
    Route::get('/users', [UserManagementController::class, "index"])->name("users.index");
});

require __DIR__.'/auth.php';
