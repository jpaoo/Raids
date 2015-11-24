<?php
include_once("../Modelo/util.php");
if(array_key_exists("encodedRoute",$_POST)){
	saveNewRoute($_POST["encodedRoute"],$_POST["startAdress"],$_POST["endAdress"],$_POST["title"]);
}else{
	$routeList=getUserRoutes();
}
?>