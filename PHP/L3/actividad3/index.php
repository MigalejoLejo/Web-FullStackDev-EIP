<?php
/* ***********************************
    ACTIVIDAD LECCION 3
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);

require("data/menu.php");
require("data/products.php");

/* ***********************************
    He ido un poco por libre usando lo aprendido
    hasta ahora. Sin embargo creo que he cumplido
    los ejercicios 1.1 y 1.2    
 *********************************** */


?>
<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php require("modules/head.php"); ?>

<body>

    <!-- Nav -->
    <?php require("modules/nav.php"); ?>

    <main>
        <div class="container">
            <div class="row">
                <?php foreach ($products as $article) {
                    require("modules/card.php");
                } ?>
            </div>
        </div>
    </main>

 <!-- Footer + Scripts -->
 <?php require("modules/footer.php"); ?>

</body>

</html>