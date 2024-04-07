<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    use HasFactory;
    protected $table = 'book';

    public static function getAll() {
        return Book::all();
    }

    public static function getBookById($id) {
        return Book::find($id);
    }

    public static function getBookByTitle($title) {
        return Book::where('title', '=', $title);
    }

    public static function saveBook($title, $author, $genre, $available) {
        $book = new Book;

        $book->title = $title;
        $book->author = $author;
        $book->genre = $genre;
        $book->available = $available;
        $book->save();

        return $book;
    }

    public static function updateBook($id,$title, $author, $genre, $available) {
        $book = static::getBookById($id);

        if (isset($book)) {
            return static::saveBook($title, $author, $genre, $available);
        } else {
            return "Libro con id $id no encontrado.";
        }
    }

    public static function deleteBook($id) {
        $book = static::getBookById($id);

        if (isset($book)) {
            $book->delete();
            return "El Libro ha sido borrado";
        } else {
            return "Libro con id [$id] no encontrado.";
        }
    }
}
