<?php
/* ***********************************
    ACTIVIDAD LECCION 12
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);

session_start();
$path =  $_SESSION["loginImage"];
unlink("../".$path);
rmdir ( "../uploads" );

session_destroy();
header("Location: ../index.php");
exit();
?>
