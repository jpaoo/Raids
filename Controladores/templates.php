<?php
function sideBar() {
  return ' <nav class="navbar navbar-inverse"> <ul class="nav navbar-nav"> <li> <a href="index.html"><img alt="Avientame" src="images/AvientameIcon.png" id="pageIcon"> </a> </li></ul> </a> </nav> <div class="text-center col-xs-4 col-sm-3 col-md-3"> <div class="avatarcontainer"> <img id="avatar" src="images/Dummy1.jpg" alt="Avatar" class="img-thumbnail "> </div><div class="list-group"> <a href="profile.php" class="list-group-item">Mi Perfil </a> <a href="mis_viajes.php" class="list-group-item active" id="selected-main"> Mis viajes </a> <a href="buscar_aventon.php" class="list-group-item">Buscar Ride</a> <a href="misautos.php" class="list-group-item">Mis autos</a> <a href="mis_rutas.php" class="list-group-item" >Mis Rutas</a> <a href="#" class="list-group-item list-group-item-danger">Log out</a> </div></div>';
}


?>
