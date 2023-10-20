
<?php

if ($_SESSION["isLoggedIn"] != true){
  $emailIsValid = validateEmail();
  $passwordIsValid = validatePassword();
  if ($emailIsValid && $passwordIsValid) {
      $_SESSION["isLoggedIn"] = true;
  }
  
} else 


print_r($_SESSION);



?>