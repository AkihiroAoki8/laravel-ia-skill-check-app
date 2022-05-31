<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;

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
	Route::post('/texts/{id}', [UserController::class, 'request'])->name('users.request');
});

Route::group(["middleware" => ["auth", "can:leader-higher"]], function(){
    Route::get('/users', [UserManagementController::class, "index"])->name("user-manage.index");
    Route::get('/users/{id}', [UserManagementController::class, "show"])->name("user-manage.show");
    Route::get('/users/edit/{id}', [UserManagementController::class, "edit"])->name("user-manage.edit");
    Route::get('/users/update/{id}', [UserManagementController::class, "update"])->name("user-manage.update");
    Route::get('/users/delete/{id}', [UserManagementController::class, "delete"])->name("user-manage.delete");
});

Route::group(["middleware" => ["auth", "can:user-higher"]], function(){
    Route::get('/skills/index',[SkillController::class,'index'])->name('skills.index');
});
Route::group(["middleware" => ["auth", "can:admin-only"]], function(){
    Route::get('/skills/create',[SkillController::class,'create'])->name('skills.create');
    Route::post('/skills/store',[SkillController::class,'store'])->name('skills.store');
    Route::post('/skills/{id}/delete',[SkillController::class,'delete'])->name('skills.delete');
    Route::post('/skills/{id}/update',[SkillController::class,'update'])->name('skills.update');
    Route::get('/skills/{id}/edit',[SkillController::class,'edit'])->name('skills.edit');
});



require __DIR__.'/auth.php';
