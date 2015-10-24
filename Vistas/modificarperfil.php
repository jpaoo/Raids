<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mi Perfil</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!--Custom CSS-->
	<link href="css/custom_css_main_page.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script 	></script>
</head>


<body>

	<?php include("templates.php"); ?>
	<?php echo sideBar(); ?>

	<?php include_once("../Modelo/util.php"); ?>


	<script>
	function cambiardatos(){
		$.post("../Controladores/cdatos.php",
		{
			'nombre': $('#nombre').value,
			'apellido': $('#apellido').value
		},
		function(data, status){
			alert("Data: " + data + "\nStatus: " + status);
		});
	}
	</script>

	<?php session_start(); getname($_SESSION['mail']); getpass($_SESSION['mail']);?>

	<div class="col-sm-9">


		<div class="row">
			<div class="form-group col-md-6">
				<label for="nombre">Nombre:
				</label>
				<input type="text" class="form-control" id="nombre" name="nombre" value=<?php echo $_SESSION['nom'] ?> >
			</div>

			<div class="form-group col-md-6">
				<label for="apellido">Apellido:
				</label>
				<input type="text" class="form-control" id="apellido" name="apellido" value=<?php echo $_SESSION['app'] ?> >
			</div>
		</div>
		<button onClick='cambiardatos()' name="submit" class="btn btn-success">Modificar nombre y apellido</button>

		<form method="POST" action="../Controladores/cambiardatos.php">
			<div class="row">
				<div class="form-group col-md-6">
					<label for="pass">Contraseña:

					</label>
					<input type="password" class="form-control" id="pass" name="pass">
				</div>

				<div class="form-group col-md-6">
					<label for="pass2">Confirmar contraseña:
						
					</label>
					<input type="password" class="form-control" id="pass2" name="pass2">
				</div>

			</div>
			<button type="submit" name="submit" class="btn btn-success">Modificar Contraseña</button>
		</form>
	</div>

</body>

</html>
