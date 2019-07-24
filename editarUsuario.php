<?php
    require_once("conecta.php");
    $id=$_GET["idUsuario"];
    $query=mysqli_query($con,"select * from usuario where idUsuario=".$id);
    //mysqli_query($con,"update marca set nomMarca='".$nom."'  where idMarca=".$id);
    while($row=mysqli_fetch_array($query)){
        $nombre=$row["nombre"];
        $correo=$row["correo"];
        $pwd=$row["pwd"];
        $tipoUser=$row["tipoUser"];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/materialize.min.css">
    <title>Edit usuario</title>
</head>
<body>
    <?php
    include_once("nav.php");
    ?>
    <div class="container">
        <h4 class="center">Actualizar usuario</h4>
            <form id="frmUpd" action="updateUsuario.php">
                    <div class="input-field">
                    <input type="hidden" class="text" name="idUsuario" value="<?php echo "$id";?>">
                        <input type="text" class="text" name="nombre" value="<?php echo "$nombre";?>">
                        <label for="nombre">Ingrese el Nombre</label>
                    </div>
                    <div class="input-field">
                    <input type="text" class="text" name="correo" value="<?php echo "$correo";?>">
                        <label for="correo">Ingrese el correo</label>
                    </div>
                    <div class="input-field">
                    <input type="password" class="text" name="pwd" value="<?php echo "$pwd";?>">
                        <label for="pwd">Ingrese la contraseña</label>
                    </div>
                    <div class="input-field">
                        <select name="tipoUser" id="select" class="select">
                            <option value="1">Usuario</option>
                            <option value="2">Cliente</option>
                            <option value="3">Administrador</option>
                        </select>
                    </div>
                    <div 
                        id="status">
                    </div>
                    <div class="row">
                        <input type="submit" class="btn blue" id="btnAlta" value="Agregar">
                    </div>
                </form>
    </div>
    
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script>
    $('.select').formSelect();
    </script>
    
</body>
</html>