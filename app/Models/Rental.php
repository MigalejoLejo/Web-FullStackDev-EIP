<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public static function saveRental($userId, $bookId) {

        $rental = new Rental;

        $rental->user_id = $userId;
        $rental->book_id = $bookId;
        $rental->rent_date = Carbon::now();

        $rental->save();

        return $rental;
    }

    public static function updateRentalReturnStatusById($id, $isReturned) {
        $rental = static::getRentalById($id);

        if (isset($rental)) {
            if ($isReturned) {
                $rental->return_date = Carbon::now();
                $rental->save();
                return $rental;
            } else {
                $rental->return_date = null;
                $rental->save();
                return $rental;
            }
        } else {
            return "Prestamo con id $id no encontrado.";
        }
    }
}
