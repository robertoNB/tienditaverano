<?php 
    require_once("conecta.php");
    $nombre=$_GET["nombre"];
    $correo=$_GET["correo"];
    $pwd=$_GET["pwd"];
    $tipoUser=$_GET["tipoUser"];
    if(mysqli_query($con,"insert into usuario (nombre,correo,pwd,tipoUser) values('".$nombre."','".$correo."','".$pwd."',".$tipoUser.")"))
    {
        echo "Se inserto correctamente";
        header("location:usuario.php");
    }
    else 
    {
        echo "Se inserto incorrectamente";
        header("location:usuario.php");
    }

    
?>