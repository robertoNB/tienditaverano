
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda</title>
    <link rel="stylesheet" href="css/materialize.min.css">
</head>
<body>
    <?php include_once("nav.php");?>
    <div class="container" id="contenido">
        <div id="modal" class="modal">
            <div class="modal-content">
                <br>
                <h4 class="center">Agregar Producto</h4>
                <div class="container">
                    <form id="frmAlta">
                        <div class="input-field">
                            <input type="text" class="text" name="nomProducto">
                            <label for="nomProducto">Ingrese el Producto</label>
                        </div>

                        <div class="input-field">
                            <input type="text" class="text" name="precio">
                            <label for="precio">Ingrese Precio</label>
                        </div>

                        <div class="input-field">
                            <input type="text" class="text" name="existencia">
                            <label for="existencia">Ingrese la existencia</label>
                        </div>

                        <div class="input-field">
                        <?php include("selec.php");?>
                        </div>
                        <div class="row">
                            <input type="submit" class="btn blue" id="btnAlta" value="Agregar">
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
<div class="card">
    <br>
    <h4 class="center">Gestion del Producto</h4>
    <div class="container">
    <a class="btn modal-trigger" href="#modal"><i class='fas fa-plus'></i> Agregar</a>
        <table>
            <tr>
                <th>Id Producto</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Existencia</th>
                <th>Marca</th>
            </tr>
            <?php 
                require_once("conecta.php");
                $resultado=mysqli_query($con,"select * from producto a inner join marca b where (a.idMarca=b.idMarca)");
                while($fila=mysqli_fetch_array($resultado)){
                    $producto=$fila['idProducto'];
                    $nombre=$fila['nomProducto'];
                    $precio=$fila['precio'];
                    $existencia=$fila['existencia'];
                    $marca=$fila['nomMarca'];
                    echo"<tr>";
                    echo"<td>$producto</td>";
                    echo"<td>$nombre</td>";
                    echo"<td>$precio</td>";
                    echo"<td>$existencia</td>";
                    echo"<td>$marca</td>";
                    echo"<td><a class='btn green' href='editaProducto.php?idProducto=$producto&nomProducto=$nombre&precio=$precio&existencia=$existencia&idMarca=$marca'><i class='fas fa-pen'></i></a> 
                        <a class='btn red' href='borrarProducto.php?idProducto=$producto'><i class='fas fa-trash'></i></a></td>";
                    echo"</tr>";
                }
            ?>    
        </table>
    </div>
</div>
</div>
<script src="js/jquery-3.1.1.js"></script>
<script src="js/materialize.js"></script>
<script src="js/all.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script>
    $('.select').formSelect();
$('.modal').modal();
$(".dropdown-trigger").dropdown();
$("#btnAlta").on("click",function(){
    $("#frmAlta").validate({
        rules:{
            nomProducto: {
                required: true,
            },
            precio:{
                required:true,
                number:true,

            },
            existencia:{
                requered:true,
                number:true,
            },
        },
        messages:{
            nomProducto:{
                required:"Deve insertar el producto",
            },
            precio:{
                required:"Deve insertar el precio",
                number:"dDeven ser numeros",

            },
            existencia:{
                required:"Deve insertar el precio",
                number:"dDeven ser numeros",
            },

        },
        errorElement:"div",
        errorPlacement: function(error,element){
            error.insertAfter(element);
            },
            submitHandler:function(){
                var info=$("#frmAlta").serialize();
                $.ajax({
                    type:"GET",
                    url:"altaProducto.php",
                    data: info,
                    success:function(){
                        document.location.href="producto.php";
                    }
                });
            }
        });
    });
</script>
</body>
</html>