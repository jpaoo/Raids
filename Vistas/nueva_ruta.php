<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Main Page</title>

	<!--Custom CSS-->
	<link href="css/custom_css_main_page.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<style type="text/css">
		#map {
			margin: auto;
			height: 20em;
			width: 100%;
		}

	</style>


</head>

<body>



	<?php include("templates.php"); ?>
	<?php echo sideBar(); ?>

	<div class="row col-xs-8 col-sm-8 col-md-8">
		<div class="span12 centered-pills">
			<h1 class="text-center">CREAR RUTA</h1>
			<br>
			<br>
		</div>
	</div>

	<div class="row col-xs-8 col-sm-8 col-md-8">

		Origen: <input type="text" type="text" id="start" placeholder="Origen" />						
		Destino: <input type="text" type="text" id="end" placeholder="Destino" />

	</div>
	<br>
	<div class="row col-xs-8 col-sm-8 col-md-8">
		<div id="map"></div>
	</div>

	<textarea id="encoded-polyline"></textarea>


	<!--GOOGLE MAPS-->

	<!--Google Maps-->
	<!--<script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>-->

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_j5eIplRjkqWaN4Xz-3LyVj45yIfFT6U&callback=initMap">
	</script>


	<script type="text/javascript">
		var map;
		var clicks=1;
		var routePath;

		function initMap() {
			var directionsService = new google.maps.DirectionsService;
			var directionsDisplay = new google.maps.DirectionsRenderer;

			var start;
			var end;


			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 15,
				center: {lat: 20.612888, lng: -100.404657},
				disableDefaultUI: true

			});

			directionsDisplay.setMap(map);

			var onChangeHandler = function() {
				calculateAndDisplayRoute(directionsService, directionsDisplay);
			};
			document.getElementById('start').addEventListener('change', onChangeHandler);
			document.getElementById('end').addEventListener('change', onChangeHandler);

			google.maps.event.addListener(map, 'click', function(event) {
				placeMarker(event.latLng);
				if(clicks>1){
					calculateAndDisplayRoute(directionsService,directionsDisplay);
				}
				clicks++;

			});


			function placeMarker(location) {

				if(clicks%2!=0){

					if(clicks>2){
						start.setMap(null);	
					}

					start = new google.maps.Marker({
						draggable:false,
						position: location, 
						map: map,
						animation: google.maps.Animation.DROP
					});

					start.setMap(map);

				}else{

					if(clicks>2){
						end.setMap(null);	
					}

					end = new google.maps.Marker({
						draggable:false,
						position: location, 
						map: map,
						animation: google.maps.Animation.DROP
					});

					end.setMap(map);

				}
			}


			function calculateAndDisplayRoute(directionsService, directionsDisplay) {
				directionsService.route({
					origin: start.position,
					destination: end.position,
					travelMode: google.maps.TravelMode.DRIVING
				}, function(response, status) {
					if (status === google.maps.DirectionsStatus.OK) {
						directionsDisplay.setDirections(response);
						var pointsArray = [];
						pointsArray = response.routes[0].overview_path;


						if(clicks>3){
							routePath.setMap(null);	
						}

						routePath = new google.maps.Polyline({
							path: pointsArray,
							geodesic: true,
							strokeColor: '#FF0000',
							strokeOpacity: 1.0,
							strokeWeight: 2
						});

						routePath.setMap(map);
						
						var pathAlone=routePath.getPath();
						
						var encodedRoute = google.maps.geometry.encoding.encodePath(pathAlone);
						
						encodedRoute = encodedRoute.replace(/\\/g,"\\\\");
						
						console.log(encodedRoute);
						
						if (encodedRoute) {
							document.getElementById('encoded-polyline').value = encodedRoute;
						}

					} else {
						window.alert('Directions request failed due to ' + status);
					}
				});
			}





		}







	</script>



	<br>
	<div class="text-center">
		<form action="misautos.html">
			<button type="submit" class="btn btn-primary">Agregar</button>
		</form>
	</div>

	<!--JQuery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>


</body>

</html>
