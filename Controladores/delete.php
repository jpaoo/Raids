<?php

function connect(){


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "avientame";
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// $servername = "localhost";
  //   $username = "jp_ao";
  //   $password = "";
  //   $database = "avientame";
  //   $dbport = 3306;

    // Create connection
    // $conn = new mysqli($servername, $username, $password, $database, $dbport);


	if ($conn->connect_error) {
		die("Falló la conexión a la base de datos");
	}
	else{
		return $conn;
	}
}


$conn = connect();

$id = $_REQUEST['id'];
$flag = 0;

	$sql = "UPDATE auto SET activo='0' WHERE id='$id'";
	if (mysqli_query($conn,$sql)) header('Location:../Vistas/misautos.php');

$conn->close();

?>
