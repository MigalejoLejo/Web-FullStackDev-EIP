<?php
/* ***********************************
    ACTIVIDAD LECCION 7
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);

require("data/menu.php");
require ("services/validateLogin.php");



$showLogin = true;

?>
<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php require("modules/head.php"); ?>

<body>

    <!-- Nav -->
    <?php require("modules/nav.php"); ?>

    <main>


    <?php if (isset($_SESSION["isLoggedIn"]) && !empty($_SESSION["isLoggedIn"])) {
        require("pages/products.php"); 
    } else {
        require("pages/login.php"); 
    } ?>


       


    </main>

    <!-- Footer + Scripts -->
    <?php require("modules/footer.php"); ?>

</body>

</html>