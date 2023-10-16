<?php
/* ***********************************
    ACTIVIDAD LECCION 7
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);

require("data/products.php");
?>



<div class="container">

    <form action="" method="GET">

        <div class="row mb-3">
            <label for="busqueda" class="col-sm-2 col-form-label">Busqueda: </label>
            <div class="col-sm-10">
                <input type="text" name="search" value="" class="form-control" id="search">
            </div>
        </div>

        <div class="row">

            <?php foreach ($products as $article) {
                require("modules/card.php");
            } ?>
        </div>
</div>

