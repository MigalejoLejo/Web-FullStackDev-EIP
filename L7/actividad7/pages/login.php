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

            <form action="" method="POST">

                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input  name="email"  class="form-control" id="email">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"> Login</button>
                </br>

                <!-- This are error messages that will be displayed if there is an issue with the login -->
                <?php if ($emailErrorMessage !== "") { ?>
                    <div class="flex justify-content-center align-items-center rounded bg-danger text-white text-center align-self-center p-1 my-1 mx-3">
                        <p class=''> <?= $emailErrorMessage ?> </p>
                    </div>
                <?php }
                if ($passwordErrorMessage !== "") { ?>
                    <div class="flex justify-content-center align-items-center rounded bg-danger text-white text-center align-self-center p-1 my-1 mx-3">
                        <p class=''> <?= $passwordErrorMessage ?> </p>
                    </div>
                <?php } ?>
                <!-- End of Error Messages for the User.-->

        </div>
        </form>

    </div>
</div>
