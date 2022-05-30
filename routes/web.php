<?php

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

Route::group(["middleware" => ["auth", "can:leader-higher"]], function(){
    Route::get('/users', [UserManagementController::class, "index"])->name("user-manage.index");
    Route::get('/users/{id}', [UserManagementController::class, "show"])->name("user-manage.show");
    Route::get('/user/create', [UserManagementController::class, "create"])->name("user-manage.create");
    Route::get('/user/store', [UserManagementController::class, "store"])->name("user-manage.store");
    Route::get('/users/edit/{id}', [UserManagementController::class, "edit"])->name("user-manage.edit");
    Route::get('/users/update/{id}', [UserManagementController::class, "update"])->name("user-manage.update");
    Route::get('/users/delete/{id}', [UserManagementController::class, "delete"])->name("user-manage.delete");
});

require __DIR__.'/auth.php';
