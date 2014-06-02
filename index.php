<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Signin CUR</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="signin.css" rel="stylesheet">
        <script language="javascript" type="text/javascript" src="scripts/validariniciosesion.js"></script>
    </head>
    <body>
        <div class="container">
            <form  method="post" action="vista/validarusuario.php" class="form-signin" role="form">
                <h2 class="form-signin-heading">Iniciar Sesion</h2>
                <input name="Usuario" id="Usuario"  class="form-control" placeholder="User" required autofocus>
                <input name="Contrasena" id="Contrasena"type="password" class="form-control" placeholder="Password" required>
                <button value="Ingresar" class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
            </form>
        </div>
    </body>
</html>