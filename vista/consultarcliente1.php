<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CRUD PHP">
    <meta name="author" content="Daniel Fuentes">
    <link rel="shortcut icon" href="../img/glyphicons_086_display.png">
    <title>Menu CRUD</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/starter-template.css" rel="stylesheet">
     <script language="javascript" type="text/javascript" src="../scripts/ajax.js"></script>
        <script language="javascript" type="text/javascript" src="../scripts/validartexto.js"></script> 
  </head>
  <body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CRUD Php</a>
        </div>
        <div class="collapse navbar-collapse" id="menudesplegable">
          <ul class="nav navbar-nav">
            <li class="active"><a href="listarclientes.php">Listar</a></li>
            <li><a href="consultarcliente.php">Consultar</a></li>
            <li><a href="ingresocliente.php">Crear</a></li>
            <li><a href="modificarcliente.php">Modificar</a></li>
            <li><a href="eliminarcliente.php">Eliminar</a></li>
            <li><a href="../scripts/finalizarsesion.php"><b>Cerrar Sesion</b></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">

      <div class="starter-template">
        <h1>Consulta Personas</h1>
        <?php
$Cedula=$_POST["Cedula"];
//-------------inclucion de datos de cliente----------------------------------
include("../modelo/cliente.php");
include("../control/ctrcliente.php");
        $ObjCliente=new Cliente();
        $ObjCtrCliente=new CtrCliente($ObjCliente);
        $ObjCliente->setCedula($Cedula);
        $error=$ObjCtrCliente->consultar();
       $resultado=$ObjCtrCliente->getResultado();
        if($error)
        {
            die("Error en la consulta: ".mysqli_error($error));
        }
        $row=mysqli_num_rows($resultado);
        if($row>0)
        {
        ?>
        <table class="table table-striped">
        <tr>
        <td>Cedula</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Direccion</td>
        <td>Telefono</td>
        <td>Celular</td>
        <td>Email</td>
        </tr>
        <?php
        while ($filas=mysqli_fetch_array($resultado))
        {
        ?>
        <tr>
            <td><?php echo $filas["Cedula"]?></td>
            <td><?php echo $filas["Nombres"]?></td>
            <td><?php echo $filas["Apellidos"]?></td>
            <td><?php echo $filas["Direccion"]?></td>
            <td><?php echo $filas["Telefono"]?></td>
            <td><?php echo $filas["Celular"]?></td>
            <td><?php echo $filas["Email"]?></td>

        </tr>
        <?php
        }
        ?>
        </table>
        <br />
    <?php
    }
    else
    {
    echo "El registro que ingreso no existe";
    echo "<br /> <a href='menu.php'>Menu</a>";
    }
?>
      </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
