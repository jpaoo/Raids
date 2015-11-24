
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


/*
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
			session_start();
			$_SESSION['mail'] = $mail;


			$_SESSION['idUsuario'] = $mail;
			header("Location:../Vistas/mis_viajes.php");
			exit;
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
*/

function login($mail, $pass)
{
	$conn = connect();
	// Check connection
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
	}
	$sql = "SELECT * FROM usuarios WHERE mail='$mail'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$passw = md5(md5($mail).$pass);

		if($row["password"] == $passw)
		{
			session_start();
			$_SESSION['mail'] = $mail;

			$_SESSION['idUsuario'] = $row["id"];
			header("Location:../Vistas/mis_viajes.php");
			exit;
		}
		else {
			$errMail = "Correo electrónico o contraseña incorrectos.";
			include("../Vistas/login.html");
		}

	}
	else {
		$errMail = "Correo electrónico o contraseña incorrectos.";
		$errPass = "";
		include("../Vistas/login.html");
	}
	$conn->close();
}

function getname($mail)
{
	$conn = connect();
	// Check connection
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
	}

	$sql="SELECT * FROM usuarios WHERE  mail ='$mail'";
	$result = mysqli_query($conn,$sql);
	if ($result->num_rows > 0)
	{
		while($row = mysqli_fetch_array($result)) {
			$_SESSION['nom'] = $row['nombre'];
			$_SESSION['app'] = $row['apellido'];
		}
		$conn->close();
	}
}

function getpass($mail)
{
	$conn = connect();
	// Check connection
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
	}

	$sql="SELECT * FROM usuarios WHERE  mail ='$mail'";
	$result = mysqli_query($conn,$sql);
	if ($result->num_rows > 0)
	{
		while($row = mysqli_fetch_array($result)) {
			$_SESSION['pass'] = $row['password'];
		}
		$conn->close();
	}
}

/*

function getname($mail)
{
	$conn = connect();
// Check connection
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
	}

	$sql="SELECT * FROM usuarios WHERE  mail ='$mail'";
    $result = mysqli_query($conn,$sql);

    if ($result->num_rows > 0)
    {
    while($row = mysqli_fetch_array($result)) {
        $_SESSION['nom'] = $row['nombre'];
        $_SESSION['app'] = $row['apellido'];
    }

	$conn->close();
}
}

function getpass($mail)
{
	$conn = connect();
// Check connection
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
	}

	$sql="SELECT * FROM usuarios WHERE  mail ='$mail'";
    $result = mysqli_query($conn,$sql);

    if ($result->num_rows > 0)
    {
    while($row = mysqli_fetch_array($result)) {
        $_SESSION['pass'] = $row['password'];
    }

	$conn->close();
}
}
*/

function agregarAuto($conn, $marca, $modelo, $placa, $color) {
	//
	// echo "HOLAAA";

	// $conn = connect();
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
		return 0;
	}
	session_start();

	$aux = $_SESSION['idUsuario'];
	// echo $aux;
	$sql = "INSERT INTO auto(idusuario,placa, marca, modelo, color) VALUES ('$aux', '$placa', '$marca', '$modelo', '$color')";
	mysqli_query($conn, $sql);

	// $conn->close();

	return 1;

}

function modificarNombre($conn, $nombre) {

	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
		return 0;
	}
	session_start();
	$aux = $_SESSION['idUsuario'];
	$sql = "UPDATE usuarios SET nombre ='$nombre' WHERE id='$aux'";
	mysqli_query($conn, $sql);
	return 1;
}

function modificarApellido($conn, $apellido) {

	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
		return 0;
	}
	session_start();
	$aux = $_SESSION['idUsuario'];
	$sql = "UPDATE usuarios SET apellido ='$apellido' WHERE id='$aux'";
	mysqli_query($conn, $sql);
	return 1;
}

function modificarPass($conn, $pass) {

	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
		return 0;
	}
	session_start();
	$aux = $_SESSION['idUsuario'];
	$mail = $_SESSION['mail'];

	$passw = md5(md5($mail).$pass);

	$sql = "UPDATE usuarios SET password ='$passw' WHERE id='$aux'";
	mysqli_query($conn, $sql);
	return 1;
}



function getCar($mail) {
	session_start();

	$id= $_SESSION['idUsuario'];

	$conn = connect();

	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
	}

	$sql = "SELECT 	* FROM auto WHERE idUsuario = '$id'";
	$result = mysqli_query($conn,$sql);
	if ($result->num_rows > 0) {
		while ($row = mysqli_fetch_array($result)) {
			$_SESSION['mca'] = $row['marca'];
			$_SESSION['mdl'] = $row['modelo'];
			$_SESSION['plca'] = $row['placa'];
			$_SESSION['clr'] = $row['color'];
		}
		$conn->close();
	}
}




function saveNewRoute($route,$start,$end,$title){

	$conn = connect();
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
	}
	session_start();

	$aux = $_SESSION['idUsuario'];

	$sql = "INSERT INTO ruta(idusuario, origen, destino, camino, nombre) VALUES ('$aux', '$start', '$end', '$route', '$title')";
	mysqli_query($conn, $sql);


	$conn->close();

}

function getUserRoutes(){

	session_start();

	$id= $_SESSION['idUsuario'];

	$conn = connect();
	$cosas=[];

	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
	}
	$sql = "SELECT * FROM ruta WHERE idUsuario='$id'";
	$result = mysqli_query($conn,$sql);
	if ($result->num_rows > 0)
	{
		while($cosas[] = mysqli_fetch_array($result));
		$conn->close();
		return $cosas;
	}else{
		$conn->close();
		return NULL;
	}


}
?>
