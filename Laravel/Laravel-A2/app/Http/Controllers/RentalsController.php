<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalsController extends Controller {

    public function index() {
        $rentals = Rental::all();
        return view('rentals.all', compact('rentals'));
    }

    public function showCreateRental($id) {
        $book = Book::getBookById($id);
        return view('rentals.create', compact('book'));
    }

    public function showRentalDetails($id) {
        $rental = Rental::getRentalById($id);
        $book = Book::getBookById($rental->book_id);
        return view('rentals.details', compact(['rental', 'book']));
    }

    public function createRental (Request $data) {
        $rental = Rental::create($data->input('userId'), $data->input('bookId'));

        if (is_string($rental)) {
            $errorMessage = $rental;
            return view('error', compact('errorMessage'));
        } else {
            $book = Book::getBookById($rental->book_id);
            return view ('rentals.createdDetails', compact(['rental', 'book']));
        }
    }

    public function endRental ($id){
        $rental = Rental::endRental($id);
        $book = Book::getBookById($rental->book_id);
        return view('rentals.details', compact(['rental', 'book']));
    }
}
