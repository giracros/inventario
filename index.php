<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="CRUD Php">
        <meta name="author" content="Daniel Fuentes">
        <title>Signin CUR</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/signin.css" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            body,td,th {
                font-size: 16px;
            }
            body {
                background-image: url(img/wallpaperlogin.png);
                background-repeat: repeat;
            }
        </style>
    </head>
    <body tracingsrc="img/glyphicons_024_parents.png" tracingopacity="100">
        <div class="container">
            <form role="form" class="form-signin" action="vista/validarusuario.php" method="post">
                <h2 class="form-signin-heading">Iniciar Sesion</h2>
                <figure></figure>
                <input name="Usuario" id="Usuario"  class="form-control" placeholder="User" required autofocus>
                <input name="Contrasena" id="Contrasena"type="password" class="form-control" placeholder="Password" required>
                <button value="Ingresar" class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
            </form>
        </div>
    </body>
</html>