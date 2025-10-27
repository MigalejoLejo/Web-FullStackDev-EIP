<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Book;

class Rental extends Model {
    use HasFactory;
    protected $table = 'rental';

    public static function getAll() {
        return Rental::all();
    }

    public static function getRentalById($id) {
        return Rental::find($id);
    }

    public static function getRentalByBookId($bookId) {
        return Rental::where('book_id', $bookId)->get();
    }

    public static function getRentalByUserId($userId) {
        return Rental::where('user_id', '=', $userId);
    }

    public static function create($userId, $bookId) {
        $book = Book::getBookById($bookId);
        if (isset($book)) {
            if ($book->is_available) {
                $book->is_available = false;
                $book->save();

                $rental = new Rental;
                $rental->user_id = $userId;
                $rental->book_id = $bookId;
                $rental->rent_date = Carbon::now();
                $rental->save();
                return $rental;
            } else {
                return 'Este libro no está disponible';
            }
        } else {
            return 'Este libro no existe';
        }
    }

    public static function endRental($id) {
        $rental = static::getRentalById($id);
        $book = Book::getBookById($rental->book_id);

        if (!isset($rental->return_date)) {
            $rental->return_date = Carbon::now();
            $book->is_available = true;
            $book->save();
            $rental->save();
        }

        return $rental;
    }
}
