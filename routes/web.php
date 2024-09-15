<?php

use App\Http\Controllers\Usuario\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('Principal');
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'vistalogin'])->name('login');
