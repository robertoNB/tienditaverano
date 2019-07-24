<?php
		$id=$_GET["idUsuario"];
        $nom=$_GET["nombre"];
        $correo=$_GET["correo"];
        $pwd=$_GET["pwd"];
        $tipoUser=$_GET["tipoUser"];
    require_once("conecta.php");
        //$con=mysqli_connect("localhost","root","","tiendaverano");
	if(mysqli_query($con,"update usuario set nombre='".$nom."',correo='".$correo."',pwd='".$pwd."',tipoUser='".$tipoUser."'  where idUsuario=".$id)){
		echo"Se actualizo exitosamente";
		header("location:usuario.php");
	}
else
{
	echo"No se pudo actualizar";
}
	
?>					
		