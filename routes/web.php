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

Route::controller(UserManagementController::class)->prefix("users")
    ->middleware(["auth", "can:leader-higher"])->group(function(){
        Route::get('/', "index")->name("user-manage.index");
        Route::get('/{id}',"show")->name("user-manage.show")->where("id", "[0-9]+");
        Route::get('/create', "create")->name("user-manage.create");
        Route::get('/store', "store")->name("user-manage.store");
        Route::get('/edit/{id}', "edit")->name("user-manage.edit");
        Route::get('/update/{id}', "update")->name("user-manage.update");
        Route::get('/delete/{id}', "delete")->name("user-manage.delete");
});

require __DIR__.'/auth.php';
