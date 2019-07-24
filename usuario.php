
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
<div id="modal1" class="modal">
    <div class="modal-content">
        <br>
        <h4 class="center">Agregar Usuario</h4>
        <div class="container">
            <form id="frmUsuario" action="altaUsuario.php">
                <div class="input-field">
                    <input type="text" class="text" name="nombre">
                    <label for="nombre">Ingrese el Usuario</label>
                </div>
                
                <div class="input-field">
                    <input type="text" class="text" name="correo">
                    <label for="correo">Ingrese correo</label>
                </div>

                <div class="input-field">
                    <input type="password" class="text" name="pwd">
                    <label for="pwd">Ingrese la Contraseña</label>
                </div>

                <div class="input-field">
                <select name="tipoUser" id='select' class='select'>
                            <option value="1">Usuario</option>
                            <option value="2">Cliente</option>
                            <option value="3">Administrador</option>
                        </select>
                </div>
                <div 
                    id="status">
                </div>
                <div class="row">
                    <input type="submit" class="btnAlta blue" id="btnAlta" value="Agregar">
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
<div class="card">
    <br>
    <h4 class="center">Gestion de Usuario</h4>
    <div class="container">
    <a class="btn modal-trigger" href="#modal1"><i class='fas fa-plus'></i> Agregar</a>
        <table>
            <tr>
                <th>Id Usuario</th>
                <th>nombre</th>
                <th>correo</th>
                <th>Contraseña</th>
                <th>Tipo de Usuario</th>
            </tr>
        <?php 
            require_once("conecta.php");
            $resultado=mysqli_query($con,"select * from usuario");
            while($fila=mysqli_fetch_array($resultado)){
                $usuario=$fila['idUsuario'];
                $nombre=$fila['nombre'];
                $correo=$fila['correo'];
                $pwd=$fila['pwd'];
                $tipoUser=$fila['tipoUser'];
                echo"<tr>";
                echo"<td>$usuario</td>";
                echo"<td>$nombre</td>";
                echo"<td>$correo</td>";
                echo"<td>$pwd</td>";
                echo"<td>$tipoUser</td>";
                echo"<td><a class='btn green' href='editarUsuario.php?idUsuario=$usuario&nombre=$nombre&correo=$correo&pwd=$pwd&tipoUser=$tipoUser'><i class='fas fa-pen'></i></a> 
                    <a class='btn red' href='borrarUsuario.php?idUsuario=$usuario'><i class='fas fa-trash'></i></a></td>";
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
    $("#frmUsuario").validate({
        rules:{
            nombre: {
                required: true,
            },
            correo:{
                required:true,
                email:true,

            },
            pwd:{
                requered:true,
                password:true,
            },
        },
        messages:{
            nombre: {
                required: "no deve ser vacio",
            },
            correo:{
                required:"no deve ser vacio",
                email:"tiene que ser egmail",

            },
            pwd:{
                required:"no deve ser vacio",
                password:"tiene que ser password",
            },

        },
        errorElement:"div",
        errorPlacement: function(error,element){
            error.insertAfter(element);
            },
            
        });
    });
</script>
</body>
</html>