<?php

// Recogida de datos 
$_SESSION["email"] = "";
$_SESSION["password"] = "";



$emailIsValid = false;
$passwordIsValid = false;
$isLoggedIn = false;
$emailErrorMessage = "";
$passwordErrorMessage = "";
$imageErrorMessage = "";


// VALIDATION:

// Email Validation
function validateEmail(): bool
{
    $isValid = false;
    $message = "";
    $email = "";

    // Validation:
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $_SESSION["email"] = $_POST["email"];
        $email = trim($_POST["email"]);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "";
            $isValid = true;
        }
    }

    // ErrorMesage generation:
    if (!$isValid) {
        if (empty($email)) {
            $message = "";
        } else {
            $message = "<p>Tu email parece no estar bien escrito.</p>";
        }
    }

    // Return Values
    $GLOBALS["emailErrorMessage"] = $message;
    return $isValid;
};
// ------------------------------------------------ END EMAIL VALIDATION




// Password Validation
function validatePassword(): bool
{
    $isValid = false;
    $message = "";
    $password = "";

    // Validation
    if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $password = $_POST["password"];
        $_SESSION["password"] = $password;

        $isValid = preg_match(
            "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/",
            $password
        );
    }

    // Message Generation
    if (empty($password)) {
        $message = "";
    } else {
        if ($isValid) {
            $message = "";
        } else {
            $message = "<p>Tu contraseña es invalida. Ten en cuenta que la contraseña debe tener al menos 6 caracteres, y entre estos tiene que haber mínimo una minúscula, una mayúscula, un número y un caracter especial</p>";
        }
    }

    // Return Values
    $GLOBALS["passwordErrorMessage"] = $message;
    return $isValid;
};
// ------------------------------------------------ END PASSWORD VALIDATION




// Image Validation
function validateImage(): bool
{
    $isValid = false;
    $message = "";
    $error = 0;

    // Validation
    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];
        $isValid = saveImage();
        $error = $image["error"];   
    }

    // Message Generation
    if ($error == 0 && !$isValid) {
            $message = "";
        } 

    if ($error > 0 && !$isValid){
        $message = "<p>Por favor selecciona una imagen en formato .png o .jpg</p>";
    }
    

    // Return Values
    $GLOBALS["imageErrorMessage"] = $message;
    return $isValid;
};
// ------------------------------------------------ END IMAGE VALIDATION




function saveImage(): bool
{
    $image = $_FILES["image"];

    // check if file is of proper type:
    if (($image["type"] != "image/png") &&
        ($image["type"] != "image/jpeg")
    ) {
        return false;
    }

    // prepare folder to save image
    $loginImageFolder = "uploads";
    if (!file_exists($loginImageFolder)) {
        mkdir($loginImageFolder);
    }

    // prepare file to be saved
    $imageType = pathinfo($image["name"])["extension"];

    $origin = $image["tmp_name"];
    $destination = $loginImageFolder."/login.".$imageType;

    //save path in session
    $_SESSION["loginImage"] = $destination;

    // save image
    if (!move_uploaded_file($origin, $destination)) {
        return false;
    }

    return true;
}




// Validating Session
if (isset($_SESSION["isLoggedIn"]) && !empty($_SESSION["isLoggedIn"])) {
    $isLoggedIn = true;
} else {
    $emailIsValid = validateEmail();
    $passwordIsValid = validatePassword();
    $imageIsValid = validateImage();
    if ($emailIsValid && $passwordIsValid && $imageIsValid) {
        $isLoggedIn = true;
        $_SESSION["isLoggedIn"] = $isLoggedIn;
    }
}
// ------------------------------------------------ END SESSION VALIDATION
