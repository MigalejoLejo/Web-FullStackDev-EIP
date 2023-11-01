<?php
/* ***********************************
    ACTIVIDAD LECCION 12
    MIGUEL A. CORREA AVILA
 *********************************** */

// Here we save error outputs for the User
// so that the user knows what is wrong 
// eg: if the email is in wrong format, or the image is not an image.
$errorMessages = array(
    "forEmail" => "",
    "forPassword" => "",
    "forImage" => "",
);

// here we save the return values of each validation
$emailIsValid = validateEmail();
$passwordIsValid = validatePassword();
$imageIsValid = validateImage();


// Here are the functions that validate Email, Password and Image format
// ---------------------------------------------------------------------
function validateEmail(): bool {
    global $errorMessages;
    $errorMessages["forEmail"] = "";

    if (!isset($_POST["email"])) {
        return false;
    }

    if (empty($_POST["email"])){
        $errorMessages["forEmail"] = "Por favor introduce un email.";
        return false;
    }

    $email = trim($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessages["forEmail"] = "El Email parece no ser correcto. Por favor chequealo.";
        return false;
    } 

    $_SESSION["email"] = $_POST["email"];
    return true;     
} 


function validatePassword(){
    global $errorMessages;
    $errorMessages["forPassword"] = "";

    if (!isset($_POST["password"])) {
        return false;
    }

    if (empty($_POST["password"])) {
        $errorMessages["forPassword"] = "Por favor introduce una contraseña.";
        return false;
    } 

    $password = $_POST["password"];
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/", $password)) {
        $errorMessages["forPassword"] = "Tu contraseña es invalida. Ten en cuenta que la contraseña debe tener al menos 6 caracteres, y entre estos tiene que haber mínimo una minúscula, una mayúscula, un número y un caracter especial.";
        return false;
    } 

    $_SESSION["password"] = $password;
    return true;
}


function validateImage(): bool {
    global $errorMessages;

    if (!isset($_FILES["image"])) {
        $errorMessages["forImage"] = "";
        return false;
    }

    $image = $_FILES["image"];
    if (!(($image["type"] == "image/png") || ($image["type"] == "image/jpeg") || ($image["type"] == "image/jpg"))) {
        $errorMessages["forImage"] = "Por favor selecciona una imagen en formato .png o .jpg";
        return false;
    }

    return true;
}


// This is a function to save the image
function saveImage()
{
    $image = $_FILES["image"];
    $loginImageFolder = "uploads";
    if (!file_exists($loginImageFolder)) {
        mkdir($loginImageFolder);
    }

    // prepare file to be saved
    $imageType = pathinfo($image["name"])["extension"];

    $origin = $image["tmp_name"];
    $destination = $loginImageFolder . "/login." . $imageType;

    //save path in session
    $_SESSION["loginImage"] = $destination;

    // save image
    if (!move_uploaded_file($origin, $destination)) {
        return false;
    } else {
        return true;
    }
}


// FINALLY:
// If all validations are correct, we set the 
// session as logged in and we save the image
if ($emailIsValid && $passwordIsValid && $imageIsValid) {
    $savedSuccesfully = saveImage();
    if (!$savedSuccesfully) {
        $errorMessages["forImage"] = "Image could not be saved";
    }
    $_SESSION["isLoggedIn"] = true;
} 