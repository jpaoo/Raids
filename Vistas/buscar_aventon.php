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

	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<!--Google Maps-->

	<style type="text/css">
		*{
			font-family: 'Montserrat', sans-serif;
		}
	</style>


			<?php
				include("../Controladores/buscarAventonController.php");
				if($possibleRoutes!=NULL){

				for($i=0;$i<sizeof($possibleRoutes);$i++){
					echo'<style type="text/css">
						#map'.$i. '{
							margin: auto;
							height: 10em;
							width: 25em;
						}
					</style>';
				}
				}

			?>
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
	
	<div class='row col-xs-8 col-sm-8 col-md-8 text-center'>

	<?php if(sizeof($possibleRoutes)==NULL){
				
			echo "No hay rutas disponibles para ti en este momento.";	
			}else{
				
				echo '<table class="table table-hover report">
			<tr>
				<th class="text-center">ORIGEN</th>
				<th class="text-center">HORA</th>
				<th class="text-center">FECHA</th>
			</tr>';

					for($i=0;$i<sizeof($possibleRoutes)-1;$i++){
						echo

							"<tr>
								<td>".$possibleRoutes[$i]['origen']."</td>
								<td>".$possibleRoutes[$i]['hora']."</td>
								<td>".$possibleRoutes[$i]['fecha']."</td>

							</tr>
							<tr>
								<td colspan=\"3\" class=\"text-center\" id=\"" . $possibleRoutes[$i]['id'] . "\">
									<h4>RUTA</h4>
									<div id=\"map".$i."\"></div>
									</br>
									<button name=\"modificar\" class=\"btn-info\" onclick=\"selectRoute(this)\" value=\"". $possibleRoutes[$i]['id'] ."\">Seleccionar</button>

								</td>

							</tr>"


							;
					}

				echo '</table>';
				
			}
	?>
	</div>





	<!--GOOGLE MAPS-->

	<script type="text/javascript">
		var map;

		function initMap() {
			var directionsService = new google.maps.DirectionsService;
			var directionsDisplay = new google.maps.DirectionsRenderer;
			var geocoder = new google.maps.Geocoder();

			var maps=[];
			var map;

			var options = {
				zoom: 15,
				center: {lat: 20.612888, lng: -100.404657},
				disableDefaultUI: true

			};

			<?php

					for($i=0;$i<sizeof($possibleRoutes)-1;$i++){

						echo "map = new google.maps.Map(document.getElementById('map".$i."'), options);

												maps.push(map);";


						echo "var decodedPath=google.maps.geometry.encoding.decodePath(\"".$possibleWays[$i]["camino"]."\");";

						echo "var routePath = new google.maps.Polyline({
											path: decodedPath,
											geodesic: true,
											strokeColor: '#FF0000',
											strokeOpacity: 1.0,
											strokeWeight: 2
										});

										routePath.setMap(maps[".$i."]);";
					}

			?>
		}
		
		function selectRoute(btn){
			
			var idViaje = parseInt($(btn).closest("td").attr("id"));
			$.post("../Controladores/agregarCopiloto.php",
					   {
						idViaje: idViaje		


				},
					   function(data, status){
					window.location.replace("../Vistas/mis_viajes.php");

				});
			
		}
	</script>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_j5eIplRjkqWaN4Xz-3LyVj45yIfFT6U&callback=initMap&libraries=geometry">
	</script>
	


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
