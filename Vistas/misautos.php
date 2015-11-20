<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mis autos</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!--Custom CSS-->
	<link href="css/custom_css_main_page.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

		<style media="screen">
			*{
	font-family: 'Montserrat', sans-serif;
			}
		</style>

	<!--Google Maps-->
	<style type="text/css">
		#map {
			height: 10em;
			width: 18em;
		}

		#map2 {
			height: 10em;
			width: 18em;
		}
	</style>
</head>

<body>

	<?php include("templates.php"); ?>
	<?php echo sideBar(); ?>

	<?php include_once("../Modelo/util.php"); ?>


	<!--MENU ARRIBA VIAJES-->
	<div class="row col-xs-8 col-sm-8 col-md-8">
		<div class="span12 centered-pills">
			<h1 class="text-center">MIS AUTOS</h1>
			<ul class="nav nav-pills ">
				<!-- <li role="presentation" class="active" id="nav-Pills-active"><a href="#">EN CURSO</a></li>
			<li role="presentation"><a href="#">TOMADOS</a></li>
			<li role="presentation"><a href="#">OFRECIDOS</a></li> -->
			</ul>
		</div>
	</div>

<!-- <?php session_start(); getCar($_SESSION['mail']); echo $_SESSION['nom']. " ". $_SESSION['app']; ?> -->



	<table class="table-hover col-xs-8 col-sm-8 col-md-8 text-center">
		<tr>
			<th style="text-align: center;">Marca</th>
			<th style="text-align: center;">Modelo</th>
			<th style="text-align: center;">Placa</th>
			<th style="text-align: center;">Color</th>
		</tr>
			<?php
					$id= $_SESSION['idUsuario'];

						$conn = connect();

						if ($conn->connect_error) {
							die("No se pudo establecer la conexión.");
						}

						$sql = "SELECT 	* FROM auto WHERE idUsuario = '$id'";
						$result = mysqli_query($conn,$sql);
						while ($data = mysqli_fetch_array($result)){
							$id = $data['id'];
							echo "<tr>";
							echo "<td>" .$data['marca']. "</td><td>" .$data['modelo']. "</td><td>" .$data['placa']. "</td><td>" .$data['color']. "</td><td><a href='delete.php?id=$id'><button type='submit' class='btn btn-danger' name='delete' value='Eliminar Auto'>Eliminar Auto</button></a></td>";
							echo "</tr>";
						}

						echo "</table>";


			?>


		</tr>
	</table>



	<div class="col-md-2 col-md-offset-6" style="padding-top: 3%;">
		<a href="registrarAuto.html"><button type="button" class="btn btn-success">Agregar Auto</button></a>
	</div>
		<!--JQUERY-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!--BOOSTRAP-->
		<script src="js/bootstrap.min.js"></script>
		<!--JANKO-->
		<script type="text/javascript">
			$(document).ready(function () {
				$(".report tr:odd").addClass("odd");
				$(".report tr:not(.odd)").hide();
				$(".report tr:first-child").show();

				$(".report tr.odd").click(function () {
					$(this).next("tr").toggle();
					$(this).find(".arrow").toggleClass("up");
				});
				//$("#report").jExpand();
			});
		</script>

		<!--GOOGLE MAPS-->

		<script type="text/javascript">
			var map;

			function initMap() {
				map = new google.maps.Map(document.getElementById('map'), {
					center: {
						lat: -34.397,
						lng: 150.644
					},
					zoom: 8
				});
			}
		</script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_j5eIplRjkqWaN4Xz-3LyVj45yIfFT6U&callback=initMap">
		</script>

		<!--RATY-->
		<script src="js/jquery.raty.js"></script>

		<script>
			$('.stars').raty();
		</script>

</body>

</html>
