<?php
    require_once("conecta.php");
    $id=$_GET["idProducto"];
    $query=mysqli_query($con,"select * from producto where idProducto=".$id);
    //mysqli_query($con,"update marca set nomMarca='".$nom."'  where idMarca=".$id);
    while($row=mysqli_fetch_array($query)){
        $nombre=$row["nomProducto"];
        $precio=$row["precio"];
        $existencia=$row["existencia"];
        $idMarca=$row["idMarca"];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/materialize.min.css">
    <title>EditProducto</title>
</head>
<body>
    <?php
    include_once("nav.php");
    ?>
    <div class="container">
        <h4 class="center">Actualizar Producto</h4>
            <form id="frmUpd" action="updateProducto.php">
                    <div class="input-field">
                    <input type="hidden" class="text" name="idProducto" value="<?php echo "$id";?>">
                        <input type="text" class="text" name="nomProducto" value="<?php echo "$nombre";?>">
                        <label for="nomProducto">Ingrese el producto</label>
                    </div>
                    <div class="input-field">
                    <input type="text" class="text" name="precio" value="<?php echo "$precio";?>">
                        <label for="precio">Ingrese el precio</label>
                    </div>
                    <div class="input-field">
                    <input type="text" class="text" name="existencia" value="<?php echo "$existencia";?>">
                        <label for="existencia">Ingrese la existencia</label>
                    </div>
                    <div class="input-field">
                    <?php include("selec.php");?>
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