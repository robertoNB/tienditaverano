<?php 
    require_once("conecta.php");
    $nombre=$_GET["nomProducto"];
    $precio=$_GET["precio"];
    $existencia=$_GET["existencia"];
    $idMarca=$_GET["idMarca"];
    if(mysqli_query($con,"insert into producto (nomProducto,precio,existencia,idMarca) values('".$nombre."',".$precio.",".$existencia.",".$idMarca.")"))
    {
        echo "se inserto correctamente el producto";
    }else{
        echo "se inserto incorrectamente el producto";
    }
    
?>