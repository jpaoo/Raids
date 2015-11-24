<?php
include_once("../Modelo/util.php");
if(array_key_exists("capacidad",$_POST)){
	crearViaje($_POST["idRuta"],$_POST["date"],$_POST["time"],$_POST["capacidad"],$_POST["idAuto"]);
	echo "alert('jajajajalgograndote')";
}else{
	$cars=getUserCars();
}
?>