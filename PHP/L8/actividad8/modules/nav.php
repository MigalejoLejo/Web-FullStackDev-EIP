<?php
/* ***********************************
    ACTIVIDAD LECCION 7
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);
?>

<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="index.php">LOGO</a>
    <ul class="nav justify-content-end">

        <?php foreach ($menu as $item) {
            echo "<a class='link' href='#' > $item </a>";
        } ?>


        <?php
        if ($_SESSION["isLoggedIn"]){ ?>
            <li class="nav-item">
                <a href="#">
                    <img src="<?= $_SESSION["loginImage"]?>" alt="Image" class="rounded-circle border border-white me-4 ms-2 " width="40" height="40">
                </a>
            </li>

        <?php } ?>


        <li class="nav-item">
            <?php if ($_SESSION["isLoggedIn"]) {
                echo " <a class='btn btn-outline-danger text-danger' href='pages/logout.php'>Log Out</a>";
            } else {
                echo " <a class='btn btn-outline-light' href='./'>Login</a>";
            } ?>
        </li>

    </ul>
</nav>