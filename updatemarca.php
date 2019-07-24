<?php
		$id=$_GET["idMarca"];
		$nom=$_GET["nomMarca"];
	$con=mysqli_connect("localhost","root","","tiendaverano");
	if(mysqli_query($con,"update marca set nomMarca='".$nom."'  where idMarca=".$id)){
		echo"Se actualizo exitosamente";
		header("location:marca.php");
	}
else
{
	echo"No se pudo actualizar";
}
	
?>					
		