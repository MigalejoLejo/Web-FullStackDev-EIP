<?php
/* ***********************************
    ACTIVIDAD LECCION 7
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);

$cardArticle = $article


?>

<div class="card" style="width: 18rem;">
    <img src= <?php echo $article["img"] ?> alt="">
    <div class="card-body">
        <h5 class="card-title"><?php echo $article["title"] ?></h5>
        <p class="card-text"><?php echo $article["description"] ?><br>
            <b> <?php echo $article["price"] ?> </b>
        </p>
        <a href="#" class="btn btn-primary"> Ver </a>
        <a href="#" class="btn btn-primary"> Añadir </a>
    </div>
</div>