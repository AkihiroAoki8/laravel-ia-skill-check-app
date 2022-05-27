<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TextController;

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
	Route::get('/home/', [UserController::class, 'home'])->name('users.home');
	Route::get('/users/{id}/skill', [UserController::class, 'skill'])->name('users.skill');
	Route::get('/users/{id}/skill/edit', [UserController::class, 'edit'])->name('users.edit');
});

require __DIR__.'/auth.php';
