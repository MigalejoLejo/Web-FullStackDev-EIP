<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::get('/', [Controller::class, 'index']);

Route::get('/register', [RegistrationController::class, 'register'])->name('register');
