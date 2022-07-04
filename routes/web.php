<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViacepController;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

Route::delete('/user/{id}', [UserController::class , 'delete'])->name('user.delete');
Route::put('/user/{id}', [UserController::class , 'update'])->name('user.update');
Route::get('/users/{id}/edit', [UserController::class , 'edit'])->name('users.edit');
Route::get('/users', [UserController::class , 'index'])->name('users.index');
Route::get('/users/create', [UserController::class , 'create'])->name('users.create');
Route::post('/user', [UserController::class , 'store'])->name('user.store');
Route::get('/users/{id}', [UserController::class , 'show'])->name('users.show');

Route::get('/viacep', [ViacepController::class , 'index'])->name('viacep.index');
Route::post('/viacep', [ViacepController::class , 'index'])->name('viacep.index.post');
Route::get('/viacep/{cep}', [ViacepController::class , 'show'])->name('viacep.show');