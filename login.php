<?php

include_once("util.php");


$errMail = "";
$nombre = $apellido = "";
$errors = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["mail"])) {
   $errMail = "Debes ingresar tu correo";
   $errors++;
 }
 if (empty($_POST["pass"])) {
  $errMail = "Correo electrónico o contraseña inválidos";
  $errors++;
}

if($errors == 0) 
{
  $mail = $_POST["mail"];
  $pass = $_POST["pass"];
  login($mail, $pass);
}
else
{
 include("login.html");
}
}
else {
  include("login.html");
}
?>
