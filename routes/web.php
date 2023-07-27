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

Route::get('/students', [App\Http\Controllers\StudentController::class, 'index'])->name('list-student');

Route::post('/students', [App\Http\Controllers\StudentController::class, 'index'])->name('searchStudent');

Route::match(['GET','POST'],'/add/students', [App\Http\Controllers\StudentController::class, 'add'])->name('addStudent');

Route::match(['GET','POST'],'/edit/students/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('editStudent');

Route::get('/delete/students/{id}', [App\Http\Controllers\StudentController::class, 'delete'])->name('deleteStudent');



