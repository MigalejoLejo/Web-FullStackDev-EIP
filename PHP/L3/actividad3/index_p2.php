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
    En esta parte he aplicado mas explicitamente 
    lo pedido en el enunciado 2.1 y 2.2
    usando un FOR para 2.1 y un foreach para 2.2.

    Por esta razon no he usado modulos para el nav
    ni los productos. 
    
    Creo que me adelanté un poco haciendo de todo,
    ya en la tarea 1.1 😅
 *********************************** */
?>


<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php require("modules/head.php"); ?>

<body>
    
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">LOGO</a>
        <ul class="nav justify-content-end">

        <?php for ( $i=0; $i < count( $menu); $i++ ) {
                echo "<a class='link' href='#' >". $menu[$i]." </a>";
            } ?>

            <li class="nav-item">
                <a class="btn btn-outline-light" href="#">Login</a>
            </li>
        </ul>
    </nav>

    <main>
        <div class="container">
            <div class="row">
                <?php foreach ($products as $article) {
                   echo "
                    <div class='card' style='width: 18rem;'>
                        <img src= ". $article['img']. " alt=''>
                        <div class='card-body'>
                            <h5 class='card-title'>". $article['title']. " </h5>
                            <p class='card-text'>". $article['description']. " <br>
                            <b>". $article['price']. "</b>
                            </p>
                            <a href='#' class='btn btn-primary'> Ver </a>
                            <a href='#' class='btn btn-primary'> Añadir </a>
                        </div>
                    </div>";
                } ?>
            </div>
        </div>
    </main>

    <!-- Footer + Scripts -->
    <?php require("modules/footer.php"); ?>

</body>

</html>