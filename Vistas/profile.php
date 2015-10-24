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
  <body>

	<?php include("templates.php"); ?>
	<?php echo sideBar(); ?>

	<?php include_once("../Modelo/util.php"); ?>


	<div class="text-center col-xs-8 col-sm-9 col-md-9">
		<h1><?php session_start(); getname($_SESSION['mail']); echo $_SESSION['nom']. " ". $_SESSION['app']; ?></h1>
		<hr>
	</div>



	<div class="col-md-4 col-sm-4 col-md-6">
		<h3 class="text-center">Reputación como viajero</h3>
		<hr>

		<div class="stars col-md-9 col-sm-9"></div>
		</br>

		</div>




	<div class="col-md-4 col-sm-4 col-md-4">
		<h3 class="text-center">Reputación como chófer</h3>
		<hr>

		<div class="stars col-md-9 col-sm-9"></div>
			</div>

<div class="col-md-4 col-md-offset-4">


		<h3>Agrega un auto para poder obtener calificaciones como chofer.</h3>

		<a href="misautos.php"><button type="button" class="btn btn-warning">Mis autos.</button></a>

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
