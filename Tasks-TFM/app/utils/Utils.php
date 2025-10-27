<?php

namespace App\Utils;

class Utils {
    public static function log(...$data) {

       print_r("\n▶︎ CONSOLE LOG ... ▼\n");
        foreach ($data as $item) {
            echo json_encode( $item , JSON_PRETTY_PRINT);
            echo("\n");
        }
        echo "\n";

    }
}
