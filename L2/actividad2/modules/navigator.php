<?php
/* ***********************************
    ACTIVIDAD LECCION 2
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);

$currentPage = $pageName;

?>


<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">LOGO</a>
    <ul class="nav justify-content-end">
        <a class="link <?php echo ($currentPage === "servicios") ? "active" : ""?>" href="servicios.php">Servicios</a>
        <a class="link <?php echo ($currentPage === "contacto") ? "active" : ""?>" href="contacto.php">Contacto</a>
        <li class="nav-item">
            <a class="btn btn-outline-light" href="#">Login</a>
        </li>
    </ul>
</nav>