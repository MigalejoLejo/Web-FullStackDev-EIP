<?php

namespace Tests\Unit\Models;

use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RentalTest extends TestCase {
    use RefreshDatabase;

    public function testSaveRental() {
        $userId = 1;
        $bookId = 2;

        $rental = Rental::saveRental($userId, $bookId);

        $this->assertInstanceOf(Rental::class, $rental);
        $this->assertEquals($userId, $rental->user_id);
        $this->assertEquals($bookId, $rental->book_id);
        $this->assertNotNull($rental->rent_date);
    }

     // Test return status is null before update
    public function testUpdateRentalReturnStatus_IsNullWhenCreated() {
        $userId = 1;
        $bookId = 2;
        $rental = Rental::saveRental($userId, $bookId);

        $this->assertNull($rental->return_date);
        // echo ($rental);

    }


    public function testUpdateRentalReturnStatus_IsNotNullWhenUpdatedWithTrue() {
        $userId = 1;
        $bookId = 2;
        $rental = Rental::saveRental($userId, $bookId);

        // Update return status to returned
        $rental = Rental::updateRentalReturnStatusById($rental->id, true);

        $this->assertNotNull($rental->return_date);
        // echo ($rental);

    }


    public function testUpdateRentalReturnStatus_IsNotNullWhenUpdatedWithFalse() {
        $userId = 1;
        $bookId = 2;
        $rental = Rental::saveRental($userId, $bookId);
        echo ($rental);

        // Update return status to returned
        $rental = Rental::updateRentalReturnStatusById($rental->id, true);

        //removing return date
        $rental = Rental::updateRentalReturnStatusById($rental->id, false);

        $this->assertNull($rental->return_date);
        echo ($rental);

    }



}
