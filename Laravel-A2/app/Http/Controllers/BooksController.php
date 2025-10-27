<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Exceptions\NotFound;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class BooksController extends Controller {

    // VIEWS

    public function index() {
        $books = Book::all();
        return view('books.all', compact('books'));
    }


    public function showAddBook(){
        return view('books.addNew');
    }



    public function showBookDetails($id) {
        $book = Book::getBookById($id);
        return view('books.details', compact('book'));
    }

    public function showEditBookDetails($id) {
        $book = Book::getBookById($id);
        return view('books.editDetails', compact('book'));
    }

    //CRUD

    public function addBook (Request $data) {
        $book = Book::saveBook($data->input('title'), $data->input('author'), $data->input('genre'), $data->input('publicationDate'), $data->input('description'));
        return view('books.createdDetails', compact('book'));

    }

    public function updateBookDetails(Request $data) {
        $book = Book::updateBookDetails($data->input('id'), $data->input('title'), $data->input('author'), $data->input('genre'), $data->input('publicationDate'), $data->input('description'));

        if (isset($book) && !is_string($book)) {
            return view('books.details', compact('book'));
        } else {
            $errorMessage = $book;
            // return redirect()->route('index')->with('error', 'Libro no encontrado');
            return view('error', compact('errorMessage'));
        }
    }
}
