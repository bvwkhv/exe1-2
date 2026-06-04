<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;


Route::get('register', [CrudUserController::class, 'register'])->name('user.register');
Route::post('register', [CrudUserController::class, 'postUser'])->name('user.postUser');

Route::get('login', [CrudUserController::class, 'login'])->name('user.login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

Route::get('/', function () {
    return view('welcome');
});
