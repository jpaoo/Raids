<?php

include_once("../Modelo/util.php");
if (deleteAuto()) header('Location:../Vistas/misautos.php');
include('../Vistas/misautos.php');

?>
