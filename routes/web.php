<?php

use App\Http\Controllers\{PostController, UserController, ViacepController};
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/', function () {
	return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
	
	Route::delete('/user/{id}', [UserController::class, 'delete'])->name('user.delete');
	Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

	Route::get('/users/{id}/posts', [PostController::class, 'show'])->name('posts.show');

	Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
	Route::get('/users', [UserController::class, 'index'])->name('users.index');
	Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

	Route::post('/user', [UserController::class, 'store'])->name('user.store');
	Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
	Route::get('/viacep', [ViacepController::class, 'index'])->name('viacep.index');
	Route::post('/viacep', [ViacepController::class, 'index'])->name('viacep.index.post');
	Route::get('/viacep/{cep}', [ViacepController::class, 'show'])->name('viacep.show');

	Route::middleware('admin')->group(function () {
		Route::get('/admin', [UserController::class, 'admin'])->name('admin.index');
	});
});