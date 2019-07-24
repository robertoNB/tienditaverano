<?php
    require_once("conecta.php");
    $id=$_GET["idMarca"];
    $query=mysqli_query($con,"select * from marca where idMarca=".$id);
    //mysqli_query($con,"update marca set nomMarca='".$nom."'  where idMarca=".$id);
    while($row=mysqli_fetch_array($query)){
        $nombre=$row["nomMarca"];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/materialize.min.css">
    <title>Editmarca</title>
</head>
<body>
    <?php
    include_once("nav.php");
    ?>
    <div class="container">
        <h4 class="center">Actualizar marca</h4>
            <form id="frmUpd" action="updatemarca.php">
                    <div class="input-field">
                    <input type="hidden" class="text" name="idMarca" value="<?php echo "$id";?>">
                        <input type="text" class="text" name="nomMarca" value="<?php echo "$nombre";?>">
                        <label for="nomMarca">Ingrese la Marca</label>
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

</body>
</html>