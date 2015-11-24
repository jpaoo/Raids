<?php

  include_once("../Modelo/util.php");

   if(isset($_POST['get_option'])) {

     $conn = connect();

     $make = $_POST['get_option'];
     $sql = "SELECT DISTINCT model FROM modelos WHERE make = '$make' ORDER BY model";
     $find=mysqli_query($conn,$sql);
     $s = "asdf";
     while($row=mysqli_fetch_array($find)) {
       $s = $s."<option>".$row['model']."</option>";
     }
    echo $s;
    return s;
   }

?>
