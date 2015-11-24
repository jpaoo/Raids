
<?php
session_start();

function sesdest() {
  session_unset(); 
  session_destroy(); 
}

function connect(){


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "avientame";
	$conn = mysqli_connect($servername, $username, $password, $dbname);


	/*$servername = "localhost";
    $username = "jp_ao";
    $password = "";
    $database = "avientame";
    $dbport = 3306;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database, $dbport);*/


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
			// session_start();
			$_SESSION['mail'] = $mail;
			$_SESSION['idUsuario'] = $row["id"];
			$_SESSION['nombre'] = $row["nombre"];
			$_SESSION['apellido'] = $row["apellido"];
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

	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
		return 0;
	}
	// session_start();

	$aux = $_SESSION['idUsuario'];

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
	// session_start();
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
	// session_start();
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
	// session_start();
	$aux = $_SESSION['idUsuario'];
	$mail = $_SESSION['mail'];


	$passw = md5(md5($mail).$pass);

	$sql = "UPDATE usuarios SET password ='$passw' WHERE id='$aux'";
	mysqli_query($conn, $sql);
	return 1;
}



function getCar($mail) {
	// session_start();

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
	// session_start();

	$aux = $_SESSION['idUsuario'];

	$sql = "INSERT INTO ruta(idusuario, origen, destino, camino, nombre) VALUES ('$aux', '$start', '$end', '$route', '$title')";
	mysqli_query($conn, $sql);


	$conn->close();

}

function modifyRoute($id,$route,$start,$end,$title){

	$conn = connect();
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
	}
	// session_start();

	$sql = "UPDATE ruta SET origen='$start', destino='$end', camino='$route', nombre='$title' WHERE id='$id'";
	mysqli_query($conn, $sql);


	$conn->close();

}

function deleteRoute($id){

	$conn = connect();
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
	}
	// session_start();

	$sql = "UPDATE ruta SET activo='0' WHERE id='$id'";
	mysqli_query($conn, $sql);


	$conn->close();

}

function getUserRoutes(){

	// session_start();

	$id= $_SESSION['idUsuario'];

	$conn = connect();
	$cosas=[];

	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");

	}
	$sql = "SELECT * FROM ruta WHERE idUsuario='$id' AND activo='1'";

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


function getMake(){
	$conn = connect();
	$sql = "SELECT DISTINCT make FROM modelos ORDER BY make ASC";
	$result = mysqli_query($conn,$sql);
	$s = "";
	$s = "<option>Selecciona una marca</option><option>Otro</option>";
	while($data=mysqli_fetch_array($result)) $s = $s."<option>".$data['make']."</option>";
	echo $s;
	disconnect($conn);
	return $s;
}

function getModel($make){
	$conn = connect();
	$sql = "SELECT DISTINCT model FROM modelos WHERE make = '$make' ORDER BY model";
	$find=mysqli_query($conn,$sql);
	$s = "";
	while($row=mysqli_fetch_array($find)) $s = $s."<option>".$row['model']."</option>";
	if ($make == "Otro") $s = $s."<option>Otro</option>";
	echo $s;
	disconnect($conn);
	return $s;
}

function show_car($id) {

		$conn = connect();

		if ($conn->connect_error) {
			die("No se pudo establecer la conexión.");
		}

		$sql = "SELECT 	* FROM auto WHERE idUsuario = '$id' AND activo = 1";

		$result = mysqli_query($conn,$sql);

		echo "<tr><th style='text-align:center;'>Marca</th><th style='text-align:center;'>Modelo</th><th style='text-align:center;'>Placa</th><th style='text-align:center;'>Color</th></tr>";
		while ($data = mysqli_fetch_array($result)){
			$id = $data['id'];
			echo "<tr>";
			echo "<td>" .$data['marca']. "</td><td>" .$data['modelo']. "</td><td>" .$data['placa']. "</td><td>" .$data['color']. "</td><td><a href='../Controladores/delete.php?id=$id'><button type='submit' class='btn btn-danger' name='delete' value='Eliminar Auto' >Eliminar Auto</button></a></td>";
			// echo "<td>" .$data['marca']. "</td><td>" .$data['modelo']. "</td><td>" .$data['placa']. "</td><td>" .$data['color']. "</td><td><a href='../Controladores/delete.php?id=$id'><button type='submit' class='btn btn-danger' name='delete' value='Eliminar Auto' data-toggle='modal' data-target='#myModal'>Eliminar Auto</button></a></td>";

			echo "</tr>";
		}

		echo "</table>";


}


function saveIdRoute($idRoute){

	if(isset($idRoute)){
		$_SESSION['idRoute'] = $idRoute;

	}

}

function getRoute(){

	
	$id= $_SESSION['idRoute'];

	$conn = connect();
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
	}
	//session_start();

	$sql = "SELECT *  FROM ruta WHERE id='$id'";
	$result = mysqli_query($conn, $sql);


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


function getUserCars(){
	
	$id= $_SESSION['idUsuario'];

	$conn = connect();
	$cosas=[];

	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");

	}
	$sql = "SELECT * FROM auto WHERE idusuario='$id' AND activo!='0'";

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

function crearViaje($idRuta,$fecha,$hora,$capacidad,$idAuto){
	
	$conn = connect();
	
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
		return 0;
	}
	// session_start();

	$idConductor = $_SESSION['idUsuario'];
	$_SESSION['idRoute']=$idRuta;
	
	$ruta= getRoute();
	$origen = $ruta[0]['origen'];
	
	
	$sql = "INSERT INTO viaje(origen,idruta,idconductor,idauto,capacidad,hora,fecha) VALUES ('$origen', '$idRuta', '$idConductor', '$idAuto', '$capacidad','$hora','$fecha')";
	
	mysqli_query($conn, $sql);
		
	$sql = "UPDATE ruta SET activo='2' WHERE id='$idRuta'";	
	
	mysqli_query($conn, $sql);
	
	$conn->close();
	

	return 1;
	
}

function getUserPossibleRoutes(){
	
	$idUsuario = $_SESSION['idUsuario'];
	$cosas=[];
	
	$conn = connect();	
	
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
		return 0;
	}
	
	$sql = "SELECT * FROM viaje WHERE idconductor!='$idUsuario' AND activo='1'";
	
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

function getPossibleWays($routes){
	
	$idUsuario = $_SESSION['idUsuario'];
	$cosas=[];
	$conn = connect();	
	
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
		return 0;
	}
	
	for($i=0;$i<sizeof($routes)-1;$i++){
		$temp = $routes[$i]['idruta'];
		if($i==0){$sql = "SELECT camino FROM ruta WHERE id='$temp'";}else{
		$sql .= " UNION SELECT camino FROM ruta WHERE id='$temp'";}
	}
	
	
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

function agregarCopiloto($idViaje){
	
	$idUsuario = $_SESSION['idUsuario'];
	$cosas=[];
	$conn = connect();
	
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
		return 0;
	}
	
	$sql = "SELECT capacidad FROM viaje WHERE id='$idViaje'";
	$cupo=mysqli_query($conn, $sql);
	
	if($cupo>0){
		$sql= "INSERT INTO copilotos(idcopiloto,idviaje) VALUES ('$idUsuario','$idViaje')";
		$cupo --;
		mysqli_query($conn, $sql);
		
		if($cupo==0){
			$activo=1;
		}else{
			$activo=2;	
		}
		
		$sql = "UPDATE viaje SET capacidad='$cupo',activo='$activo' WHERE id='$idViaje'";
		mysqli_query($conn, $sql);
		
		
	}
	
		
		
	
	
	
	$conn->close();
	
}

function getUserActiveRoutes(){
	
	$idUsuario = $_SESSION['idUsuario'];
	$idViajes=[];
	$cosas=[];
	
	$conn = connect();	
	
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
		return 0;
	}
	
	$sql = "SELECT idviaje FROM copilotos WHERE idcopiloto!='$idUsuario'";
	$result = mysqli_query($conn,$sql);
	
	for($i=0;$i<sizeof($result)-1;$i++){
		
		$temp = $result[$i];
		if($i==0){$sql = "SELECT * FROM viaje WHERE id='$temp'";}else{
		$sql .= " UNION SELECT * FROM viaje WHERE id='$temp'";}
	}
	

	
	$result = mysqli_query($conn,$sql);
	
	
	if ($result->num_rows > 0)
	{
		while($idViajes[] = mysqli_fetch_array($result));
		$conn->close();
		return $cosas;
	}else{
		$conn->close();
		return NULL;
	}
	
	
}

function getUserCars(){
	
	$id= $_SESSION['idUsuario'];

	$conn = connect();
	$cosas=[];

	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");

	}
	$sql = "SELECT * FROM auto WHERE idusuario='$id' AND activo!='0'";

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

function crearViaje($idRuta,$fecha,$hora,$capacidad,$idAuto){
	
	$conn = connect();
	
	if ($conn->connect_error) {
		die("No se pudo establecer la conexión.");
		return 0;
	}
	// session_start();

	$idConductor = $_SESSION['idUsuario'];
	$_SESSION['idRoute']=$idRuta;
	
	$ruta= getRoute();
	$origen = $ruta[0]['origen'];

	$sql = "INSERT INTO viaje(origen,idruta,idconductor,idauto,capacidad,hora,fecha) VALUES ('$origen', '$idRuta', '$idConductor', '$idAuto', '$capacidad','$hora','$fecha')";
	
	mysqli_query($conn, $sql);
		
	$sql = "UPDATE ruta SET activo='2' WHERE id='$idRuta'";	
	
	mysqli_query($conn, $sql);
	
	$conn->close();
	

	return 1;
	
}


// function deleteCar($id) {
// 	$conn = connect();
// 	if ($conn->connect_error) {
// 		die("No se pudo establecer la conexión.");
// 	}
//
//
//
// 	$sql = "DELETE FROM avientame . auto WHERE auto . id = '$id'";
//
// 			if (mysqli_query($conn,$sql)) header('Location:../Vistas/misautos.php');
//
// 	$conn->close();
// }

?>

