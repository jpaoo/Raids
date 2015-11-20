<?php

echo "jajajajajaj";
   if(isset($_POST['get_option']))
   {
     $conn = connect();


     $make = $_POST['get_option'];
     $sql = "SELECT model FROM modelos WHERE make = '$make'"
     echo "hahahahahaha";
     $find=mysqli_query($conn,$sql);
     while($row=mysqli_fetch_array($find))
     {
       echo "<option>".$row['model']."</option>";
     }

     exit;
   }

?>
