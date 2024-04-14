<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\RentalsController;

Route::get('/', [Controller::class, 'home'])->name('home');
Route::get('/libros', [BooksController::class, 'index'])->name('allBooks');
Route::get('/prestamos', [RentalsController::class, 'index'])->name('allRentals');

Route::get('/error', [BooksController::class, 'error'])->name('error');

// Books
Route::get('/libro/{id}', [BooksController::class, 'showBookDetails'])->name('showBookDetails');
Route::get('/crearLibro', [BooksController::class, 'showAddBook'])->name('showAddBook');
Route::get('/actualizarLibro/{id}', [BooksController::class, 'showEditBookDetails'])->name('showEditBookDetails');


Route::post('/crearLibro', [BooksController::class, 'addBook'])->name('addBook');
Route::put('/actualizarLibro', [BooksController::class, 'updateBookDetails'])->name('updateBookDetails');


// Rentals
Route::get('/crearPrestamo/{id}', [RentalsController::class, 'showCreateRental'])->name('showCreateRental');
Route::get('/prestamo/{id}', [RentalsController::class, 'showRentalDetails'])->name('showRentalDetails');


// Create rental (POST request)
Route::post('/crearPrestamo', [RentalsController::class, 'createRental'])->name('createRental');
Route::get('/regresado/{id}', [RentalsController::class, 'endRental'])->name('endRental');





