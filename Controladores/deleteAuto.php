<?php


include_once("../Modelo/util.php");

if (deleteAuto() == 1) header('Location:../Vistas/misautos.php');
include('../Vistas/misautos.php');

?>
