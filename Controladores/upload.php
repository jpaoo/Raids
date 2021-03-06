<?php


include_once("../Modelo/util.php");

$errimg = "";
$target_dir = "../Vistas/uploads/";
$newname = $_SESSION['idUsuario'].".";

function findexts ($filename)  { 
 $filename = strtolower($filename) ;  $exts = split("[/\\.]", $filename) ;  $n = count($exts)-1;  $exts = $exts[$n];  
 return $exts;  

} 
$ext = findexts($_FILES['fileToUpload']['name']);
$target_file = $target_dir . $newname.$ext;
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
		$errimg = "File is not an image.";
		header("Location: ../Controladores/modificarprofile.php");
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    unlink($target_file);
    //$uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {

    $errimg = "El archivo es muy pesado.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg") {

    $errimg =  "Solo se permiten imagenes jpg.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

    $errimg =  "No se pudo cargar tu imagen.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header("Location: ../Vistas/profile.php");

    } else {
        $errimg = "Hubo un error al modificar tu foto de perfil.";
        include("../Controladores/modificarprofile.php");
    }
}
?>