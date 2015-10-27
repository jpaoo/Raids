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
		.map {
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
		<?php 
include("../Controladores/routeHandler.php");
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
				<td colspan=\"3\" class=\"text-center\">
					<h4>RUTA</h4>
					<div class=\"map\"></div>
					</br>
					<button class=\"btn-info\">Modificar</button>
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

	<!--GOOGLE MAPS-->

	<script type="text/javascript">
		var map;

		function initMap() {
			var mapas = $('.map');
			for(var i=0;i<$('.map').length;i++){
				map = new google.maps.Map(mapas[i], {
					zoom: 15,
					center: {lat: 20.612888, lng: -100.404657},
					disableDefaultUI: true

				});

				/*	routePath = new google.maps.Polyline({
							path: google.maps.geometry.encoding.decodePath("wvguH`lYS_C{EnAs@cGAUoAAsA?aC@qDA}AX_K|As"),
							geodesic: true,
							strokeColor: '#FF0000',
							strokeOpacity: 1.0,
							strokeWeight: 2
						});

		routePath.setMap(map);*/

			}



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
