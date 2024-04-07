<?php

namespace Tests\Unit\Models;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase {
    use RefreshDatabase;

    public function testSaveBook() {
        $title = "The Test Book";
        $author = "Test Author";
        $genre = "Fantasy";
        $publicationDate = Carbon::now();

        $book = Book::saveBook($title, $author, $genre, $publicationDate, null);

        $this->assertInstanceOf(Book::class, $book);
        $this->assertEquals($title, $book->title);
        $this->assertEquals($author, $book->author);
        $this->assertEquals($genre, $book->genre);
        $this->assertTrue($book->is_available);
        $this->assertNotNull($publicationDate, $book->publication_date);

    }

    public function testUpdateBookReturnNewBook() {
        $title = "The Test Book";
        $author = "Test Author";
        $genre = "Fantasy";
        $publicationDate = Carbon::now();

        $book = Book::saveBook($title, $author, $genre, $publicationDate, null);

        $title = "The Test Book updated";
        $author = "Test Author updated";
        $genre = "Adventure";
        $publicationDate = Carbon::now();
        // Update return status to returned
        $book = Book::updateBookDetails($book->id, $title, $author, $genre, $publicationDate, null);

        $this->assertEquals($title, $book->title);
        $this->assertEquals($author, $book->author);
        $this->assertEquals($genre, $book->genre);
        $this->assertTrue($book->is_available);
        $this->assertNotNull($publicationDate, $book->publication_date);

        // echo ($rental);

    }


    // public function testUpdateRentalReturnStatus_IsNotNullWhenUpdatedWithFalse() {
    //     $userId = 1;
    //     $bookId = 2;
    //     $rental = Rental::saveRental($userId, $bookId);
    //     echo ($rental);

    //     // Update return status to returned
    //     $rental = Rental::updateRentalReturnStatusById($rental->id, true);

    //     //removing return date
    //     $rental = Rental::updateRentalReturnStatusById($rental->id, false);

    //     $this->assertNull($rental->return_date);
    // }
}
