<?php
/* ***********************************
    ACTIVIDAD LECCION 7
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);

const scriptSource = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js";
const integrityKey = "sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3";

?>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <div class="col-4">Autor: Miguel A. Correa Avila </div>
        </div>
    </div>
</footer>


<script 
    src = <?= scriptSource ?> 
    integrity = <?= integrityKey ?> 
    crossorigin = "anonymous">
</script>