<?php
/* ***********************************
    ACTIVIDAD LECCION 3
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);
?>

<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">LOGO</a>
    <ul class="nav justify-content-end">

        <?php foreach ($menu as $item) {
            echo "<a class='link' href='#' > $item </a>";
        } ?>

        <li class="nav-item">
            <a class="btn btn-outline-light" href="#">Login</a>
        </li>
    </ul>
</nav>