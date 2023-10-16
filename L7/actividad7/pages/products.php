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
    <div class="row">
        <?php foreach ($products as $article) {
            require("modules/card.php");
        } ?>
    </div>
</div>