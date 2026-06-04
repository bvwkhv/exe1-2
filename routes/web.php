<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;


Route::get('register', [CrudUserController::class, 'register'])->name('user.register');
Route::post('register', [CrudUserController::class, 'postUser'])->name('user.postUser');

Route::get('login', [CrudUserController::class, 'login'])->name('user.login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

Route::get('list', [CrudUserController::class, 'list'])->name('user.list');

Route::get('update', [CrudUserController::class, 'update'])->name('user.update');
Route::post('update', [CrudUserController::class, 'postUpdate'])->name('user.postUpdate');

Route::get('view/{id}', [CrudUserController::class, 'user_view'])->name('user.view');

Route::get('/', function () {
    return view('welcome');
});
