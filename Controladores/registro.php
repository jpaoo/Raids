<?php

include_once("../Modelo/util.php");

function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}

$errNombre = $errApellido = $errMail = $errTerm = $errCont1 = $errCont2 = "";
$nombre = $apellido = $mail = $terminos = "";

$errors = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["nombre"])) {
   $errNombre = "Debes escribir tu nombre.";
   $errors++;
 } else {
  $nombre = test_input($_POST["nombre"]);
  if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
   $errNombre = "Escribe tu nombre solo con letras y espacios en blanco.";
   $errors++;
 }
 $nom = $_POST["nombre"];
 if( strlen($nom) < 2 ) {
  $errNombre = "Nombre muy corto";
  $errors++;
}
}


if (empty($_POST["apellido"])) {
 $errApellido = "Debes escribir tu apellido.";
 $errors++;
} else {
 $nombre = test_input($_POST["apellido"]);
 if (!preg_match("/^[a-zA-Z ]*$/",$apellido)) {
   $errApellido = "Escribe tu apellido solo con letras y espacios en blanco.";
   $errors++;
 }
 $apl = $_POST["apellido"];
 if( strlen($apl) < 2 ) {
  $errApellido = "Apellido muy corto";
  $errors++;
}
}



if (empty($_POST["mail"])) {
 $errMail = "Necesitas ingresar tu correo.";
 $errors++;
} else {
 $mail = test_input($_POST["mail"]);
 if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  $errMail = "Correo electrónico invalido.";
  $errors++;
}
}


if (empty($_POST["pass"])) {
 $errCont1 = "Debes poner tu contraseña";
 $errors++;
}
else
{
  $pwd = $_POST['pass'];
  $errorsp = 0;
  if( strlen($pwd) < 8 ) {
    $errorsp++;
  }
  if( strlen($pwd) > 15 ) {
    $errorsp++;
  }
  if( !preg_match("#[0-9]+#", $pwd) ) {
    $errorsp++;
  }
  if( !preg_match("#[a-z]+#", $pwd) ) {
    $errorsp++;
  }
  if( !preg_match("#[A-Z]+#", $pwd) ) {
    $errorsp++;
  }
  if( !preg_match("#\W+#", $pwd) ) {
    $errorsp++;
  }
  if($errorsp != 0)
  {
    $errCont1 = "Contraseña débil. Debe contener minusculas, mayusculas, caracteres especiales, números y tener mínimo 8 caracteres.";
    $errors++;
  }
}

if (empty($_POST["pass2"])) {
 $errCont2 = "Debes reingresar tu contraseña.";
 $errors++;
}
else if($_POST["pass"] == $_POST["pass2"]) {
  $errCont2 = "";
}
else {
  $errCont2 = "Las contraseñas deben coincidir.";
}

if (empty($_POST["terminos"])) {
 $errTerm = "Debes aceptar los términos y condiciones.";
 $errors++;
} else {
 $terminos = test_input($_POST["terminos"]);
}

if($errors == 0)
{
  $n = $_POST["nombre"];
  $a = $_POST["apellido"];
  $m = $_POST["mail"];
  $p = $_POST["pass"];

  $conn = connect();

  if(agregarUsuario($conn, $n, $a, $m, $p) == 1)
  {
    include("../Vistas/login.html");
  }
  disconnect($conn);
}
else {
  include("../Vistas/register.html");
}
}
else {
  include("../Vistas/register.html");
}

?>
