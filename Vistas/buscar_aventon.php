<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buscar Aventon</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom_css_main_page.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

		<style media="screen">
			*{
	font-family: 'Montserrat', sans-serif;
			}
		</style>
</head>

<body>

	<?php include("templates.php"); ?>
	<?php echo sideBar(); ?>



	<div class="row col-xs-8 col-sm-8 col-md-8">
		<div class="span12 centered-pills">
			<h1 class="text-center">BUSCAR AVENTÓN</h1>
			<br>
			<br>
		</div>
	</div>



	<table class="table-hover col-xs-8 col-sm-8 col-md-8">

		<tr>
			<td>
				<fieldset class="scheduler-border">
					<legend class="scheduler-border">Origen: </legend>
					<div class="control-group">
						<div>
							<input type="text" class="datetime" type="text" id="startTime" name="startTime" placeholder="Origen" />
							<i class="icon-time"></i>
						</div>
					</div>
					<br>
					<br>
				</fieldset>
			</td>
			<td>
				<fieldset class="scheduler-border">
					<legend class="scheduler-border">Destino: </legend>
					<div class="control-group">
						<div>
							<input type="text" class="datetime" type="text" id="startTime" name="startTime" placeholder="Destino" />
							<i class="icon-time"></i>
						</div>
					</div>
					<br>
					<br>
				</fieldset>
			</td>
		</tr>
	</table>

	<div id="map"></div>
	<!--Google Maps-->
	<style type="text/css">
		#map {
			height: 10em;
			width: 25em;
		}
	</style>

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
	<br>
	<br>
	<div class="text-center">
	<form action="rutas_disponibles.html">
	<button type="submit" class="btn btn-primary">Buscar</button>
		</form>
	</div>
	<br>
	<br>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
