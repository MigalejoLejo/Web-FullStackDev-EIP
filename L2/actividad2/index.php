<?php
/* ***********************************
    ACTIVIDAD LECCION 2
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);

$title = "Lenovo IdeaPad 3";
$description = "Lenovo IdeaPad 3 15IAU7 Intel Core i5-1235U/16GB/512GB SSD/15.6''";
$price = 1233.99;

$pageName = "index"

?>

<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php require("modules/head.php"); ?>


<body>
        
    <!-- Nav-Bar -->
    <?php require("modules/navigator.php");?>

    <!-- Main Content -->
    <main>
        <div class="container">
            <div class="row">
                <div class="card" style="width: 18rem;">
                    <img src="https://thumb.pccomponentes.com/w-300-300/articles/1063/10639213/1359-lenovo-ideapad-3-15iau7-intel-core-i5-1235u-16gb-512gb-ssd-156.jpg" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?= $title; ?></h5>
                        <p class="card-text"><?= $description; ?> <br>
                            <b> <?= $price; ?> </b>
                        </p>
                        <a href="#" class="btn btn-primary"> Ver </a>
                        <a href="#" class="btn btn-primary"> Añadir </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer with Scripts -->
   <?php require("modules/footer.php"); ?>

  
</body>

</html>