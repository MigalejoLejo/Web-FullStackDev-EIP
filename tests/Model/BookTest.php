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

        $book = Book::saveBook($title, $author, $genre, $publicationDate);

        $this->assertInstanceOf(Book::class, $book);
        $this->assertEquals($title, $book->title);
        $this->assertEquals($author, $book->author);
        $this->assertEquals($author, $book->author);
        $this->assertEquals($genre, $book->genre);
        $this->assertTrue($book->is_available);
        $this->assertNotNull($publicationDate, $book->publication_date);

    }

    // // Test return status is null before update
    // public function testUpdateRentalReturnStatus_IsNullWhenCreated() {
    //     $userId = 1;
    //     $bookId = 2;
    //     $rental = Rental::saveRental($userId, $bookId);

    //     $this->assertNull($rental->return_date);
    //     // echo ($rental);

    // }


    // public function testUpdateRentalReturnStatus_IsNotNullWhenUpdatedWithTrue() {
    //     $userId = 1;
    //     $bookId = 2;
    //     $rental = Rental::saveRental($userId, $bookId);

    //     // Update return status to returned
    //     $rental = Rental::updateRentalReturnStatusById($rental->id, true);

    //     $this->assertNotNull($rental->return_date);
    //     // echo ($rental);

    // }


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
