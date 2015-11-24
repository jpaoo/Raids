<?php

  include_once("../Modelo/util.php");

   if(isset($_POST['get_option'])) {
    $make = $_POST['get_option'];
     getModel($make);
   }

?>
