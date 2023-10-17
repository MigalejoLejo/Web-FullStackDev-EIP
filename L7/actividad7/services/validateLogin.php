<?php

// Recogida de datos 
$emailIsValid = false;
$passwordIsValid = false;
$isLoggedIn = false;
$emailErrorMessage = "";
$passwordErrorMessage = "";


// Email Validation
function validateEmail(): bool
{
    $isValid = false;
    $message = "";
    $email = "";

    // Validation:
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $email = trim($_POST["email"]);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = "";
            $isValid = true;
        }
    }

    // ErrorMesage generation:
    if (!$isValid){
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


// Password Validation
function validatePassword(): bool
{
    $isValid = false;
    $message = "";
    $password = "";

    // Validation
    if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $password = $_POST["password"];
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


// Validating Session
if (isset($_SESSION["isLoggedIn"]) && !empty($_SESSION["isLoggedIn"])) {
    $isLoggedIn = true;
} else {
    $emailIsValid = validateEmail();
    $passwordIsValid = validatePassword();
    if ($emailIsValid && $passwordIsValid) {
        $isLoggedIn = true;
        $_SESSION["isLoggedIn"] = $isLoggedIn;
    }
}

?>
