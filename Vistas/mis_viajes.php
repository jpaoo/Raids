<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mis Viajes</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!--Custom CSS-->
	<link href="css/custom_css_main_page.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
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

		#map3 {
			height: 10em;
			width: 18em;
		}
	</style>

</head>

<body>

	<?php include("templates.php"); ?>
	<?php echo sideBar(); ?>



	<!--MENU ARRIBA VIAJES-->
	<div class="row col-xs-8 col-sm-8 col-md-8">
		<div class="span12 centered-pills">
			<h1 class="text-center">VIAJES</h1>
			<ul class="nav nav-pills ">
				<li role="presentation" class="active nav-Pills-active" id="btnencurso"><a href="#">POR TOMAR</a></li>
			<!--	<li role="presentation" id="btntomados"><a href="#">TOMADOS</a></li>
				<li role="presentation" id="btnofrecidos"><a href="#">OFRECIDOS</a></li>-->
			</ul>
		</div>
	</div>


	<!--LISTA EN CURSO-->
	
	<div class="col-xs-8 col-sm-8 col-md-8" id="encurso">
	
	<?php
				include("../Controladores/misViajesController.php"); 

				if(sizeof($myRoutes)==0){
					var_dump($myRoutes);
				
					echo "No tienes rutas activas.";	
				}else{

						echo '<table class="table table-hover report">
					<tr>
						<th class="text-center">HORA</th>
						<th class="text-center">FECHA</th>
						<th class="text-center">ORIGEN</th>
						<th class="text-center">LUGARES DISPONIBLES</th>
					</tr>';

							for($i=0;$i<=sizeof($possibleRoutes);$i++){
								echo

									"<tr>
										<td>".$myRoutes[$i]['hora']."</td>
										<td>".$myRoutes[$i]['fecha']."</td>
										<td>".$myRoutes[$i]['origen']."</td>
										<td>".$myRoutes[$i]['capacidad']."</td>

									</tr>";
							}

						echo '</table>';

					}
			
	
	?>
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
		$("#encurso").show();
		$("#tomados").hide();
		$("#ofrecidos").hide();

		$("#btnencurso").click(function () {
			$("#encurso").show();
			$("#tomados").hide();
			$("#ofrecidos").hide();
			$("#btnofrecidos").removeClass("active nav-Pills-active");
			$("#btntomados").removeClass("active nav-Pills-active");
			$("#btnencurso").addClass("active nav-Pills-active");
		});

		$("#btntomados").click(function () {
			$("#tomados").show();
			$("#encurso").hide();
			$("#ofrecidos").hide();
			$("#btnofrecidos").removeClass("active nav-Pills-active");
			$("#btntomados").addClass("active nav-Pills-active");
			$("#btnencurso").removeClass("active nav-Pills-active");
		});

		$("#btnofrecidos").click(function () {
			$("#ofrecidos").show();
			$("#tomados").hide();
			$("#encurso").hide();
			$("#btnofrecidos").addClass("active nav-Pills-active");
			$("#btntomados").removeClass("active nav-Pills-active");
			$("#btnencurso").removeClass("active nav-Pills-active");

		});
	</script>

</body>

</html>
