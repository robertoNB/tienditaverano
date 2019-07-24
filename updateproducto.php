<?php
		$id=$_GET["idProducto"];
        $nom=$_GET["nomProducto"];
        $precio=$_GET["precio"];
        $existencia=$_GET["existencia"];
        $idMarca=$_GET["idMarca"];
    require_once("conecta.php");
        //$con=mysqli_connect("localhost","root","","tiendaverano");
	if(mysqli_query($con,"update producto set nomProducto='".$nom."',precio='".$precio."',existencia='".$existencia."',idMarca='".$idMarca."'  where idProducto=".$id)){
		echo"Se actualizo exitosamente";
		header("location:producto.php");
	}
else
{
	echo"No se pudo actualizar";
}
	
?>					
		