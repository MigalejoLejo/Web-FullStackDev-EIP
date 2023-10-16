<?php

// Recogida de datos 
$emailIsValid = false;
$passwordIsValid = false;
$isLoggedIn = false;
$emailErrorMessage = "";
$passwordErrorMessage = "";


// validaciones de Login

function validateEmail(): bool
{
    $isValid = false;
    $message = "";
    $email = "";

    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $email = trim($_POST["email"]);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "";
            $isValid = true;
        }
    }

    if (!$isValid){
        if (empty($email)) {
            $message = "";
        } else {
            $message = "<p>Tu email parece no estar bien escrito.</p>";
        }
    } 

    $GLOBALS["emailErrorMessage"] = $message;
    return $isValid;
};

function validatePassword(): bool
{
    $isValid = false;
    $message = "";
    $password = "";

    if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $password = $_POST["password"];
        $isValid = preg_match(
            "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/",
            $password
        );
    }

    if (empty($password)) {
        $message = "";
    } else {
        if ($isValid) {
            $message = "";
        } else {
            $message = "<p>Tu contraseña es invalida. Ten en cuenta que la contraseña debe tener al menos 6 caracteres, y entre estos tiene que haber mínimo una minúscula, una mayúscula, un número y un caracter especial</p>";
        }
    }

    $GLOBALS["passwordErrorMessage"] = $message;
    return $isValid;
};


$emailIsValid = validateEmail();
$passwordIsValid = validatePassword();

if ($emailIsValid && $passwordIsValid) {
    $isLoggedIn = true;
}



?>