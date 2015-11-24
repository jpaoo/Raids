<?php

include_once("../Modelo/util.php");

// function test_input($data) {
//  $data = trim($data);
//  $data = stripslashes($data);
//  $data = htmlspecialchars($data);
//  return $data;
// }

$errMarca = $errModelo = $errPlaca = $errColor = "";
$marca = $modelo = $placa = $color = "";

$errors = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["placa"])) {
   $errPlaca = "Debes escribir una placa";
   $errors++;
 }

 $plac = $_POST["placa"];
 if( strlen($plac) < 7 ) {
  $errPlaca = "Códidgo de placas no es valido.";
  $errors++;
}



if ($_POST["marca"] == "Selecciona una marca") {
 $errMarca = "Debes seleccionar una marca.";
 $errors++;
}

if (empty($_POST["color"])) {
 $errColor = "Debes seleccionar un color.";
 $errors++;
}

if (empty($_POST["modelo"])) {
 $errModelo = "Debes seleccionar un modelo.";
 $errors++;
}


if($errors == 0) {
  $m = $_POST["marca"];
  $mo = $_POST["modelo"];
  $p = $_POST["placa"];
  $c = $_POST["color"];

   $conn = connect();

  if(agregarAuto($conn, $m, $mo, $p, $c) == 1) header("Location:../Vistas/misautos.php");
   disconnect($conn);

}
else include_once("../Vistas/registrarAuto.html");
}

else include_once("../Vistas/registrarAuto.html");

?>
