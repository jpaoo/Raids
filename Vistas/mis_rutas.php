<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Main Page</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!--Custom CSS-->
	<link href="css/custom_css_main_page.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<!--Google Maps-->
	<style type="text/css">
		#map {
			margin: auto;
			height: 10em;
			width: 25em;
		}
	</style>

</head>

<body>

	<?php include("templates.php"); ?>
	<?php echo sideBar(); ?>


	<div class="row col-xs-8 col-sm-8 col-md-8">
		<h1 class="text-center">MIS RUTAS GUARDADAS</h1>
	</div>
	<!--LISTA TOMADOS-->

	<div class="col-xs-8 col-sm-8 col-md-8">
		<table class="table table-hover report">
			<tr>
				<th>ORIGEN</th>
				<th>DESTINO</th>
			</tr>
			<tr>
				<td>Los Girasoles</td>
				<td>Tec de Monterrey</td>

			</tr>
			<tr>
				<td colspan="2" class="text-center">
					<h4>RUTA</h4>
					<div id="map"></div>
					</br>
					<button class="btn-info">Modificar</button>
				</td>

			</tr>
		</table>
	</div>

	<div class="text-center col-xs-8 col-sm-8 col-md-8">
		<a href="nueva_ruta.php"><button class="btn">Nueva Ruta</button></a>
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
