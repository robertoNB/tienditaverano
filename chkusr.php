<?php
$usuario=$_POST['usuario'];
$pass=$_POST['password'];
	require_once("conecta.php");
	$result=mysqli_query($con,"SELECT * FROM usuario WHERE correo='$usuario' AND pwd='$pass'");
	//contar los renglones con num_rows
	$s=$result->num_rows;
	// inyeccion sql 1 or (1=1)
	if($s==1){
		if(!isset($_SESSION))
			session_start();
		$_SESSION['rol']='admin';
		echo"T";
	}else{
		echo"F";
	}
?>
