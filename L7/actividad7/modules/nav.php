<?php
/* ***********************************
    ACTIVIDAD LECCION 7
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);
?>

<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">LOGO</a>
    <ul class="nav justify-content-end">

        <?php foreach ($menu as $item) {
            echo "<a class='link' href='#' > $item </a>";
        } ?>

        <li class="nav-item">
            <?php if ($isLoggedIn) { 
                echo " <a class='btn btn-outline-danger text-danger' href='./'>Log Out</a>";
            } else {
                echo " <a class='btn btn-outline-light' href='./'>Login</a>";
            } ?>
        </li>
    </ul>
</nav>