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
	<?php echo "oli plz" ?>
	<?php include("templates.php"); ?>
	<?php echo sideBar(); ?>

	<div class="row col-xs-8 col-sm-8 col-md-8">
		<div class="span12 centered-pills">
			<h1 class="text-center">CREAR RUTA</h1>
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


	<br>

	<div id="map"></div>


	<!--GOOGLE MAPS-->

	<script type="text/javascript">
		var map;

		function initMap() {
			var directionsService = new google.maps.DirectionsService;
			var directionsDisplay = new google.maps.DirectionsRenderer;
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 12,
				center: {lat: 20.612888, lng: -100.404657}
			});
			directionsDisplay.setMap(map);

			var onChangeHandler = function() {
				calculateAndDisplayRoute(directionsService, directionsDisplay);
			};
			document.getElementById('start').addEventListener('change', onChangeHandler);
			document.getElementById('end').addEventListener('change', onChangeHandler);
		}

		function calculateAndDisplayRoute(directionsService, directionsDisplay) {
			directionsService.route({
				origin: document.getElementById('start').value,
				destination: document.getElementById('end').value,
				travelMode: google.maps.TravelMode.DRIVING
			}, function(response, status) {
				if (status === google.maps.DirectionsStatus.OK) {
					directionsDisplay.setDirections(response);
				} else {
					window.alert('Directions request failed due to ' + status);
				}
			});
		}




	</script>

	<div class="text-center">
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_j5eIplRjkqWaN4Xz-3LyVj45yIfFT6U&callback=initMap">


		</script>
		</.div>
	<br>
	<br>
	<div class="text-center">
		<form action="misautos.html">
			<button type="submit" class="btn btn-primary">Agregar</button>
		</form>
	</div>
	<br>
	<br>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
