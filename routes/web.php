<?php

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





// Route::group(["middleware" => ["auth", "can:user-higher"]], function(){
//     Route::get('/skills/index',[SkillController::class,'index'])->name('skills.index');
// });
// Route::group(["middleware" => ["auth", "can:admin"]], function(){
//     Route::get('/skills/create',[SkillController::class,'create'])->name('skills.create');
//     Route::post('/skills/store',[SkillController::class,'store'])->name('skills.store');
// });

    Route::get('/skills/index',[SkillController::class,'index'])->name('skills.index');
    Route::get('/skills/create',[SkillController::class,'create'])->name('skills.create');
    Route::post('/skills/store',[SkillController::class,'store'])->name('skills.store');
    Route::post('/skills/{id}/delete',[SkillController::class,'delete'])->name('skills.delete');
    Route::post('/skills/{id}/update',[SkillController::class,'update'])->name('skills.update');
    Route::get('/skills/{id}/edit',[SkillController::class,'edit'])->name('skills.edit');





Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
