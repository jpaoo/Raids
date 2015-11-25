<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Main Page</title>
	<!-- Bootstrap -->
	<link href="../Vistas/css/bootstrap.min.css" rel="stylesheet">
	<!--Custom CSS-->
	<link href="../Vistas/css/custom_css_main_page.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<!--Google Maps-->

	<style type="text/css">
		*{
			font-family: 'Montserrat', sans-serif;
		}
	</style>



	<?php
include("../Controladores/routeHandler.php");

for($i=0;$i<sizeof($routeList);$i++){
	echo'<style type="text/css">
		#map'.$i. '{
			margin: auto;
			height: 10em;
			width: 25em;
		}
	</style>';
}

	?>

</head>

<body>

	<?php include("templates.php"); ?>
	<?php echo sideBar(); ?>


	<div class="row col-xs-8 col-sm-8 col-md-8">
		<h1 class="text-center">MIS RUTAS GUARDADAS</h1>
	</div>
	<!--LISTA TOMADOS-->


	<div class="col-xs-8 col-sm-8 col-md-9 text-center" >
		<?php
include("../Controladores/routeHandler.php");


if(sizeof($routeList)==0){
	echo '<p class="text-center">No tienes rutas guardadas</p>';
}else{
	echo '<table class="table table-hover report">
			<tr>
				<th class="text-center">NOMBRE DE LA RUTA</th>
				<th class="text-center">ORIGEN</th>
				<th class="text-center">DESTINO</th>
			</tr>';

	for($i=0;$i<sizeof($routeList);$i++){
		echo

			"<tr>
				<td>".$routeList[$i]['nombre']."</td>
				<td>".$routeList[$i]['origen']."</td>
				<td>".$routeList[$i]['destino']."</td>

			</tr>
			<tr>
				<td colspan=\"3\" class=\"text-center\" id=\"" . $routeList[$i]['id'] . "\">
					<h4>RUTA</h4>
					<div id=\"map".$i."\"></div>
					</br>
					<button name=\"modificar\" class=\"btn-info\" onclick=\"sendRouteId(this)\" value=\"". $routeList[$i]['id'] ."\">Modificar</button>
					<button onclick=\"createTrip(this)\" type=\"button\" class=\"btn-warning\" data-toggle=\"modal\" data-target=\"#modal\">Activar</button>

					<button class=\"btn-danger\" onclick=\"deleteRoute(this)\" >Eliminar</button>


				</td>

			</tr>"


			;
	}

	echo '</table>';
}
		?>

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


	<div id="modal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<div class="modal-content">
				  <div class="modal-header">
				<h4 class="modal-title">Nuevo Viaje</h4>
				  </div>
				  <div class="modal-body">
				
					<p>Para crear tu nuevo viaje solo llenas los siguientes datos:</p>
					<form class="text-center">
						<label>Fecha: </label> <input type="date" id="routeDate">
					 	<label>Hora: </label><input type="time" id="routeTime"><br><br>
					 	
					  	<label>Selecciona tu Auto: </label>
					  	
									
									<select name="autos" id="selectAuto">
									<?php
										include("../Controladores/crearViaje.php"); 
										for($i=0;$i<sizeof($cars)-1;$i++){
										
									  	echo "<option value=\"".$cars[$i]['id']."\">".$cars[$i]['placa']." ".$cars[$i]['modelo']."</option>";
										}
									?>
									
									</select>			
   										
 						<br><br>
					  	
						<label>Capacidad: </label><input type="number" id="routeCapacity" min="1"><br>
					
					</form>
					
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" onclick="isActivated()" data-dismiss="modal">Activar</button>

				  </div>
				</div>

			  </div>
			</div>
					
	
	<!--DELETE-->

	<script>
		function deleteRoute(btn){
			var idRuta = parseInt($(btn).closest("td").attr("id"));

			$.post("../Controladores/eliminarRuta.php",
				   {
				idRuta: idRuta

			},
				   function(data, status){
				window.location.replace("../Vistas/mis_rutas.php");

			});
				
			

		}

		<!--ACTIVAR-->
			
			var idRuta;

			function createTrip(btn){

				idRuta = parseInt($(btn).closest("td").attr("id"));

			
				


			}
		
			function isActivated(){
					

				$.post("../Controladores/crearViaje.php",
					   {
						idRuta: idRuta,
						date: $("#routeDate").val(),
						time: $("#routeTime").val()+":00",
						capacidad: $("#routeCapacity").val(),
						idAuto: $("#selectAuto").val()
					


				},
					   function(data, status){
					window.location.replace("../Vistas/mis_viajes.php");

				});

			}

		<!--MODIFICAR-->

			function sendRouteId(btn){

				var idRuta = parseInt($(btn).closest("td").attr("id"));

				$.post("../Controladores/modificarRuta.php",
					   {
					idRuta: idRuta

				},
					   function(data, status){
					window.location.replace("../Vistas/modificarRutaView.php");

				});


			}
	</script>



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

for($i=0;$i<sizeof($routeList);$i++){

	echo "map = new google.maps.Map(document.getElementById('map".$i."'), options);

							maps.push(map);";


	echo "var decodedPath=google.maps.geometry.encoding.decodePath(\"".$routeList[$i]['camino']."\");";

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


			//google.maps.event.trigger(map, 'resize');








		}
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_j5eIplRjkqWaN4Xz-3LyVj45yIfFT6U&callback=initMap&libraries=geometry">
	</script>

	<!--RATY-->
	<script src="js/jquery.raty.js"></script>

	<script>
		$('.stars').raty();
	</script>

</body>

</html>
