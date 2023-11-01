<?php
/* ***********************************
    ACTIVIDAD LECCION 12
    MIGUEL A. CORREA AVILA
 *********************************** */

// 👉 PLEASE TAKE A LOOK AT THE README.MD FILE

ini_set("display_errors", "1");
error_reporting(E_ALL);


// Session is started here Since this is the initial page
    session_start();

    if (!isset($_SESSION["isLoggedIn"])){
            $_SESSION["email"] = "";
            $_SESSION["password"] = "";
            $_SESSION["isLoggedIn"] = false;   
    } 

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
        <?php
        if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"]) {
            require("pages/products.php");
        } else {
            require("pages/login.php");
        }
        ?>
    </main>

    <!-- Footer + Scripts -->
    <?php require("modules/footer.php"); ?>

</body>
</html>