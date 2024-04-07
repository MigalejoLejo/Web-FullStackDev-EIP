<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index'])->name('index');



Route::get('/crearLibro', [BookController::class, 'showAddBook'])->name('showAddBook');
Route::get('/libro/{id}', [BookController::class, 'showBookDetails'])->name('showBookDetails');
Route::get('/actualizarLibro/{id}', [BookController::class, 'showEditBookDetails'])->name('showEditBookDetails');


Route::post('/crearLibro', [BookController::class, 'addBook'])->name('addBook');
Route::put('/actualizarLibro', [BookController::class, 'updateBookDetails'])->name('updateBookDetails');

