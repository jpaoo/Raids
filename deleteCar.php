<?php
include_once("../Modelo/util.php");
session_start();
$id = $_REQUEST['id'];
if (deleteCar($id)) header("Location:../Vistas/misautos.php");
?>
