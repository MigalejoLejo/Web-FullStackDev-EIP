<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Utils\Utils; // Import the 'App\Utils' class

class Utils_Test extends TestCase {

    use \Illuminate\Foundation\Testing\RefreshDatabase;

    public function test_print() {
        Utils::log('Hello World', 'test');
    }


}
