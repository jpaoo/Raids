<?php

function connect(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "avientame";
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Falló la conexión a la base de datos");

	}
	else{
		return $conn;
	} 
}

function disconnect($conn){
	$conn->close();
}

function agregarUsuario($conn, $nombre, $apellido, $mail, $password)
{
	

	$sql = "SELECT mail FROM usuarios WHERE mail='$mail'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$errNombre = $errApellido = $errTerm = $errCont1 = $errCont2 = "";
		$errMail = "Ya existe una cuenta asociada a este correo.";
		include("../Vistas/register.html");
		return 0;
	}
	else
	{
		$pass = md5(md5($mail).$password);
		$sql = "INSERT INTO usuarios(nombre, apellido, mail, password) VALUES ('$nombre', '$apellido', '$mail', '$pass')";
		mysqli_query($conn, $sql);
		return 1;
	}
}

function login($mail, $pass)
{
	$conn = connect();
// Check connection
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
	} 

	$sql = "SELECT mail FROM usuarios WHERE mail='$mail'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$sql = "SELECT password FROM usuarios WHERE mail='$mail'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$aux = $row["password"];
		
		$passw = md5(md5($mail).$pass);

		if($aux == $passw)
		{
			$sql = "SELECT nombre, apellido FROM usuarios WHERE mail='$mail'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			echo "Bienvenido " . $row["nombre"]. " " . $row["apellido"]. "<br>";
		}
		else {
			$errMail = "Correo electrónico o contraseña incorrectos.";
			include("../Vistas/login.html");
		}
		
	}
	else {
		$errMail = "Correo electrónico no registrado";
		$errPass = "";
		include("../Vistas/login.html");
	}
	$conn->close();
}

?>