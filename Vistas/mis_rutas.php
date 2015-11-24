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

	<div class="col-xs-8 col-sm-8 col-md-8">
		<?php 

if($routeList==NULL){
	echo '<p class="text-center">No tienes rutas guardadas</p>';
}else{
	echo '<table class="table table-hover report">
			<tr>
				<th>NOMBRE DE LA RUTA</th>
				<th>ORIGEN</th>
				<th>DESTINO</th>
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
					<button class=\"btn-warning\" onclick=\"deleteRoute(this)\">Activar</button>
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
		
	function createTrip(btn){
		/*
		var temp = $(btn).attr("id");
		temp = temp.replace("eliminar","");
		var posEliminar= parseInt(temp);
		
		$.post("../Controladores/eliminarRuta.php",
			{
				idRuta: $routeList[posEliminar]['id']
				
			},
				function(data, status){
				window.location.replace("../Vistas/mis_rutas.php");

			});	
		*/
		
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

