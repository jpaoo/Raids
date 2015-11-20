<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

		<style media="screen">
			*{
	font-family: 'Montserrat', sans-serif;
			}
		</style>
</head>

<body>



	<!-- Navbar top-->
	<div class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="profile.php"><span class="glyphicon glyphicon-arrow-left"> Regresar a mi perfil</span></a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-ex-collapse">
				<ul class="nav navbar-nav navbar-right"></ul>
			</div>
		</div>
	</div>

	<!--Logo image -->
	<div class="text-center">
		<img src="images/AvientameIconOscuro.png" alt="logo" class="img-responsive center-block">
		<br>
	</div>


	<!--Inicia el form-->
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">

				<form method="POST" action="../Controladores/registrarAuto.php">

					<div class="row">
						<div class="form-group col-md-6">
							<label for="marca">Marca:
								<span id="errmarca">
									<font color = "red">	<?php echo $errMarca; ?></font>
								</span>
							</label>
							<select class="form-control" id="marca" name = "marca" value=<?php if (isset($_POST[ "marca"])) echo $_POST[ "marca"] ?> >
								<option></option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
						 </select>
							<!-- <input type="text" class="form-control" id="marca" name="marca" value=<?php if (isset($_POST[ "marca"])) echo $_POST[ "marca"] ?> > -->
						</div>

						<div class="form-group col-md-6">
							<label for="modelo">Modelo
								<span id="errModelo">
									<font color = "red"><?php echo $errModelo ?></font>
								</span>
							</label>
							<select class="form-control" id="modelo" name = "modelo" value=<?php if (isset($_POST[ "modelo"])) echo $_POST[ "modelo"] ?> >
								<option></option>
							 	<option>1</option>
							 	<option>2</option>
							 	<option>3</option>
							 	<option>4</option>
						 </select>
							<!-- <input type="text" class="form-control" id="modelo" name="modelo" value=<?php if (isset($_POST[ "modelo"])) echo $_POST[ "modelo"] ?> > -->
						</div>
					</div>

					<div class="form-group col-md-6">
						<label for="placa">Placas:
							<span id="errPlaca">
									<font color = "red"><?php echo $errPlaca ?></font>
							</span>
						</label>
						<input type="text" class="form-control"  maxlength="7" id="placa" name="placa" placeholder="Ej: LMN2345" value=<?php if (isset($_POST[ "placa"])) echo $_POST[ "placa"] ?> >
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label for="color">Color:
								<span id="errColor">
										<font color = "red"><?php echo $errColor ?></font>
								</span>
							</label>
							<select class="form-control" id="color" name = "color" value=<?php if (isset($_POST[ "color"])) echo $_POST[ "color"] ?> >
								<option></option>
							 <option>Amarillo</option>
							 <option>Azul</option>
							 <option>Blanco</option>
							 <option>Café</option>
							 <option>Gris</option>
							 <option>Morado</option>
							 <option>Negro</option>
							 <option>Naranja</option>
							 <option>Plata</option>
							 <option>Rojo</option>
							 <option>Verde</option>
						 </select>
							<!-- <input type="" class="form-control" id="pass" name="pass" value=<?php if (isset($_POST[ "pass"])) echo $_POST[ "pass"] ?> > -->
						</div>



					</div>
					<button type="submit" name="submit" class="btn btn-success">Registrar</button>
				</form>

			</div>
		</div>
	</div>




	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



</body>

</html>
