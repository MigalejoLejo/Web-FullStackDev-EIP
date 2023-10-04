<?php
/* ***********************************
    ACTIVIDAD LECCION 1
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);

const nombre = "Miguel";   
const apellidos = "Rodríguez Fernández";   
const edad = "55";   
const intereses = "Los deportes, la música y la naturaleza";   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1> Alumno de <span>EIP</span> </h1>
        
    <p><b>Nombre: </b> <span> <?php echo nombre ?> </span></p>

    <p><b>Apellidos: </b> <span> <?php echo apellidos ?> </span></p>

    <p><b>Edad: </b> <span> <?php echo edad ?> </span></p>

    <p><b>Intereses: </b> <span> <?php echo intereses ?> </span></p>


</body>
</html>


