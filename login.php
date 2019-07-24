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
    <br>
    <div class="container">
      <div class="card">
        <br>
        <h4 class="center"> Acceso </h4>
        <div class="container" id="contenido">
          <form id="loginForm" method="post">
            <div class="input-field">
              <input class="text" type="text" name="usuario"/>
              <label for="usuario">usuario:</label>
            </div>
            <div class="input-field">
              <input class="text" type="password" name="password"/>
              <label for="password">contraseña</label>
            </div>
              <br>
              <button type="button" class="btn" id="acceso">Entrar</button>
              <div class="status" id="status"></div>
            <div class="status" id="status"></div>
          </form>
          <br>
        </div>
      </div>
    </div>    
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script>
      $(".dropdown-trigger").dropdown();
      $("#acceso").on("click",function(){
    	var parametros=$("#loginForm").serialize();
  	  $.ajax({
  	    url:"chkusr.php",
        type: 'POST',
  		  data:parametros,
  	    success: function(respuesta)
        {
  			  if($.trim(respuesta)=="T"){
  	        document.location.href="index.php";
            var hola="hola";
  	        }else{
              $('#status').html("<p Error el usuario y contraseña></p>");
            }
  	    }
  	   });
    });

    </script>
</body>
</html>