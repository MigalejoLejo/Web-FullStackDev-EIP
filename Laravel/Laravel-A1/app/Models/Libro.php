<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $table = 'libros';

    public static function getAll () {
        return Libro::all();
    }

    public static function getBookById($id){
        return Libro::find($id)
    }

    public static function getBookByTitle($title){
        return Libro::where('titulo' , '=' , $title)
    }
}
