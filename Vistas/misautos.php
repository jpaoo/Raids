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

	</style>
</head>

<body onload="showCars()">

	<?php include("templates.php"); ?>
	<?php echo sideBar(); ?>


	<!--MENU ARRIBA VIAJES-->
	<div class="row col-xs-8 col-sm-8 col-md-8">
		<div class="span12 centered-pills">
				<h1 class="text-center">MIS AUTOS</h1>
		</div>
	</div>




	<table class="table-hover col-xs-8 col-sm-8 col-md-8 text-center" id="tabledance"></table>

	<!-- Modal -->
	<!-- <div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	     Modal content-->
	    <!-- <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title"></h4>
	      </div>
	      <div class="modal-body">
	        <p>Seguro que quieres borrar el auto?</p>
	      </div>
	      <div class="modal-footer"> -->
					<!-- <button type='button' class='btn btn-default' data-dismiss='modal' onclick="deleteCar()">Si</button>
					<button type='button' class='btn btn-default' data-dismiss='modal'>No</button> -->
	      <!-- </div>
	    </div>
	  </div>
	</div> -->


	<div class="col-md-2 col-md-offset-6" style="padding-top: 3%;">
		<a href="../Controladores/registrarAuto.php"><button type="button" class="btn btn-success">Agregar Auto</button></a>
	</div>


<script>
	function showCars(){
		$.ajax({
			type : 'GET',
			url : '../Controladores/show_car.php',
			DataType: 'string',
			success: function (response) {
			document.getElementById("tabledance").innerHTML = response;
			}
		});
	}




</script>


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


</body>

</html>
