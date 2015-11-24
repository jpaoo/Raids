<?php

include_once("../Modelo/util.php");

function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}

$errNombre = $errApellido = $errMail = $errCont1 = $errCont2 = $errimg = "";
$nombre = $apellido = $mail = "";
$errn = $errors = $errapp = $errpass =  $errorsp = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["nombre"])) {
   $errNombre = "";
   $errn++;
 } else {
  $nombre = test_input($_POST["nombre"]);
  if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
   $errNombre = "Escribe tu nombre solo con letras y espacios en blanco.";
   $errn++;
 }
 $nom = $_POST["nombre"];
 if( strlen($nom) < 2 ) {
  $errNombre = "Nombre muy corto";
  $errn++;
}
}
if (!empty($_POST["nombre"]) && $errn == 0) {

  $n = $_POST["nombre"];

  $conn = connect();

if(modificarNombre($conn, $n) == 1)
  {
    header("Location:../Vistas/profile.php");
  }
  disconnect($conn);
}


if (empty($_POST["apellido"])) {
 $errApellido = "";
 $errapp++;
} else {
 $nombre = test_input($_POST["apellido"]);
 if (!preg_match("/^[a-zA-Z ]*$/",$apellido)) {
   $errApellido = "Escribe tu apellido solo con letras y espacios en blanco.";
   $errapp++;
 }
 $apl = $_POST["apellido"];
 if( strlen($apl) < 2 ) {
  $errApellido = "Apellido muy corto";
  $errapp++;
}
}

if (!empty($_POST["apellido"]) && $errapp == 0) {

  $n = $_POST["apellido"];

  $conn = connect();

if(modificarApellido($conn, $n) == 1)
  {
    header("Location:../Vistas/profile.php");
  }
  disconnect($conn);
}

if (empty($_POST["pass"])) {
 $errCont1 = "";
  $errpass++;
}
else
{
  $pwd = $_POST['pass'];
 
  if( strlen($pwd) < 8 ) {
    $errpass++;
  }
  if( strlen($pwd) > 15 ) {
    $errpass++;
  }
  if( !preg_match("#[0-9]+#", $pwd) ) {
    $errpass++;
  }
  if( !preg_match("#[a-z]+#", $pwd) ) {
    $errpass++;
  }
  if( !preg_match("#[A-Z]+#", $pwd) ) {
    $errpass++;
  }
  if( !preg_match("#\W+#", $pwd) ) {
    $errpass++;
  }
  if($errpass != 0)
  {
    $errCont1 = "Contraseña débil. Debe contener minusculas, mayusculas, caracteres especiales, números y tener mínimo 8 caracteres.";
    $errpass++;
  }
}

if (empty($_POST["pass2"]) && !empty($_POST["pass"])) {
 $errCont2 = "Debes reingresar tu contraseña.";
 $errpass++;
}
else if($_POST["pass"] == $_POST["pass2"]) {
  $errCont2 = "";
}
else {
  $errCont2 = "Las contraseñas deben coincidir.";
  $errpass++;
}

if (!empty($_POST["pass"]) && $errpass == 0) {
  $pass = $_POST["pass"];
  $conn = connect();

if(modificarPass($conn, $pass) == 1)
  {
    header("Location:../Vistas/profile.php");
  }
  disconnect($conn);
}

}

if($errn > 0 || $errpass > 0 || $errapp > 0 || $errorsp > 0 || $errApellido > 0)
{
  include("../Vistas/modificarprofile.php");
  //header("Location:../Vistas/profile.php");
}

else {
  include("../Vistas/modificarprofile.php");
}

?>
