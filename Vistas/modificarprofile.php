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
	#tit {
		font-family: 'Montserrat', sans-serif;
	}
	</style>

</head>

<body>

	<!-- Navbar top-->
	<div class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="../Vistas/profile.php">
					<span id="tit">Regresar al perfil</span>
				</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-ex-collapse">
				<ul class="nav navbar-nav navbar-right"></ul>
			</div>
		</div>
	</div>

	<!--Logo image -->
	<div class="text-center">
		<img src="../Vistas/images/AvientameIconOscuro.png" alt="logo" class="img-responsive center-block">
		<br>
	</div>
	<div class="container">
		<div class="row">
			<div class = "col-md-6 col-md-offset-3">
				<p>Ingresa la información a los campos que desees cambiar de tu perfil. Los campos que no se llenen no serán modificados.</p>
			</div>
		</div>
	</div>

	<!--Inicia el form-->
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form method="POST" action="../Controladores/modificarprofile.php">

					<div class="row">
						<div class="form-group col-md-6">
							<label for="nombre">Nombre:
								<span id="errname">
									<font color = "red">	<?php echo $errNombre ?></font>
								</span>
							</label>
							<input type="text" class="form-control" id="nombre" name="nombre" value=<?php if (isset($_POST[ "nombre"])) echo $_POST[ "nombre"] ?> >
						</div>

						<div class="form-group col-md-6">
							<label for="apellido">Apellido:
								<span id="errApellido">
									<font color = "red"><?php echo $errApellido ?></font>
								</span>
							</label>
							<input type="text" class="form-control" id="apellido" name="apellido" value=<?php if (isset($_POST[ "apellido"])) echo $_POST[ "apellido"] ?> >
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label for="pass">Contraseña:
								<span id="errCont1">
									<font color = "red"><?php echo $errCont1 ?></font>
								</span>
							</label>
							<input type="password" class="form-control" id="pass" name="pass" value=<?php if (isset($_POST[ "pass"])) echo $_POST[ "pass"] ?> >
						</div>

						<div class="form-group col-md-6">
							<label for="pass2">Confirmar contraseña:
								<span id="errCont2">
									<font color = "red"><?php echo $errCont2 ?></font>
								</span>
							</label>
							<input type="password" class="form-control" id="pass2" name="pass2" value=<?php if (isset($_POST[ "pass2"])) echo $_POST[ "pass2"] ?>>
						</div>

					</div>

					<button type="submit" name="submit" class="btn btn-success">Modificar Datos</button>
				</form>

				<div class="container">
					<form action="../Controladores/upload.php" method="post" enctype="multipart/form-data">
						Selecciona una imagen de perfil:
						<span id="errimg">
									<font color = "red"><?php echo $errimg ?></font>
						</span>
						<input type="file" name="fileToUpload" id="fileToUpload">
						<input type="submit" value="Cambiar foto de perfil" name="submit">
					</form>
				</div>

			</div>
		</div>
	</div>


	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>

</html>
