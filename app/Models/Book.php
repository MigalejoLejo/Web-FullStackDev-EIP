<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

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

    public static function saveBook($title, $author, $genre, $publicationDate, $description) {
        $book = new Book;

        $book->title = $title;
        $book->author = $author;
        $book->genre = $genre;
        $book->publication_date = $publicationDate;
        $book->description = $description;
        $book->is_available = true;
        $book->save();

        return $book;
    }

    public static function updateBookDetails($id,$title, $author, $genre, $publicationDate, $description) {
        $book = static::getBookById($id);
        echo($book);

        if (isset($book)) {
            $book->title =  $title;
            $book->author = $author;
            $book->genre = $genre;
            $book->publication_date = $publicationDate;
            $book->description = $description;

            $book->is_available = true;
            $book->save();

            return $book;
        } else {
            return null;
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
