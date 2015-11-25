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
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    	<style media="screen">
    		*{
    font-family: 'Montserrat', sans-serif;
    		}
    	</style>
  <body>

	<?php include("templates.php"); ?>
	<?php echo sideBar(); ?>

	<?php include_once("../Modelo/util.php"); ?>

	<div class="text-center col-xs-8 col-sm-8 col-md-8">
		<h1>Perfil</h1>
		<hr>
		<br>
		<br>
		<h2>Nombre: <?php if(session_status() == PHP_SESSION_NONE) {session_start();} getname($_SESSION['mail']); echo $_SESSION['nom']; ?></h2>
		<h2>Apellido: <?php if(session_status() == PHP_SESSION_NONE) {session_start();} getname($_SESSION['mail']); echo $_SESSION['app']; ?></h2>
		<h2>Correo: <?php if(session_status() == PHP_SESSION_NONE) {session_start();} getname($_SESSION['mail']); echo $_SESSION['mail'];?></h2>
		<hr>
		<a href="../Controladores/modificarprofile.php"><button type="button" class="btn btn-warning">Modificar Perfil</button></a>
		<a href="misautos.php"><button type="button" class="btn btn-warning">Mis autos.</button></a>
		<br>
		<br>
	<div class="container">
		<div class="row">
	
		</div>
	</div>
	</div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--RATY-->
	<script src="js/jquery.raty.js"></script>

	<script>
		$('.stars').raty();
	</script>

</body>

</html>
