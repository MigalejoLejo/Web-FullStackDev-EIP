<?php
/* ***********************************
    ACTIVIDAD LECCION 7
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);

// Session is started here Since this is the initial page
session_start();

require("data/menu.php");
require("services/validateLogin.php");
require("data/products.php");

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
            include("pages/products.php");
        } else {
            require("pages/login.php");
        } ?>

    </main>

    <!-- Footer + Scripts -->
    <?php require("modules/footer.php"); ?>

</body>

</html>
