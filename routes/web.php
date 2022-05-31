<?php

use App\Models\Department;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;

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

Route::get('/department/index',[DepartmentController::class,'index'])->name('departments.index');
Route::get('/department/{id}/edit',[DepartmentController::class,'edit'])->name('departments.edit');
Route::get('/department/create',[DepartmentController::class,'create'])->name('departments.create');
Route::post('/department/store',[DepartmentController::class,'store'])->name('departments.store');
Route::post('/department/{id}/update',[DepartmentController::class,'update'])->name('departments.update');
Route::post('/department/{id}/delete',[DepartmentController::class,'delete'])->name('departments.delete');
Route::get('/department/{id}/show',[DepartmentController::class,'show'])->name('departments.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
