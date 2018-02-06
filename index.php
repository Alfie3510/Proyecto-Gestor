


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mesa de servicio</title>
<link rel="icon" type="image/png" href="Resources/img/favicon.ico" />
    <link rel="stylesheet" href="Resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css.css" type="text/css">

</head>
 
<body background="../Resources/img/favicon.png">
    <!--Barra de Navegacion-->
<nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Gestor</a>
        </div>

    
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <div class="panel panel-primary">
                    <div class="panel-heading">Iniciar Sesion</div>
                    <div class="panel-body"> 
                        <div class="alert alert-danger text-center" style="display:none;" id="error">
                            <p>Usuario o Password no identificados</p>
                        </div>                     
                        <form role="form">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="email" class="form-control" id="email" placeholder="Nombre.Apellido">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>                     
<button type="submit" class="btn btn-primary" onclick="confirmar();"><span class="glyphicon glyphicon-lock"></span> Entrar</button>                        </form>
                    </div>
                </div>
            </div>
        </div>
      <center>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;José Loyola V2.6</center>
    </div>

    
       
	<script src="Resources/js/jquery-1.11.2.js"></script>
	<script src="Resources/js/bootstrap.min.js"></script>
    <script>
        function confirmar(){
            var email = $('#email').val();
            var password = $('#password').val();
            $.ajax({
                url:'Controllers/usuario.php',
                type:'POST',
                data:'email='+email+'&password='+password+"&boton=ingresar"
            }).done(function(resp){
                if(resp=='0'){
                    $('#error').show();
                }else{
                    location.href='Views/principal.php';
                }
            });
        }
               
    </script>
</body>
</html>