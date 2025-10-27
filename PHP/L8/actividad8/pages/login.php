<?php
/* ***********************************
    ACTIVIDAD LECCION 7
    MIGUEL A. CORREA AVILA
 *********************************** */

ini_set("display_errors", "1");
error_reporting(E_ALL);


?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input name="email" value="<?= $_SESSION["email"] ?>" class="form-control" id="email">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" value="Password1!" class="form-control" id="password">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-sm-2 col-form-label">Imagen</label>
                    <div class="col-sm-10">
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                </div>

                <div class="d-flex flex-row-reverse mb-3 ">
                        <button type="submit" class="btn btn-primary "> Login</button>
                </div>
                </br>

                <!-- This are error messages that will be displayed if there is an issue with the login -->
                <?php
                foreach ($errorMessages as $error) {
                    if (!empty($error) && ($error != "")) {
                ?>
                        <div class="flex justify-content-center align-items-center rounded bg-danger text-white text-center align-self-center  my-1">
                            <p class='p-1'> <?= $error ?> </p>
                        </div>
                <?php
                    }
                }
                ?>


                <!-- End of Error Messages for the User.-->

        </div>
        </form>

    </div>
</div>