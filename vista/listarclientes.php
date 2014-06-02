<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
//-------------inclucion de datos de cliente----------------------------------
include("../modelo/cliente.php");
include("../control/ctrcliente.php");
        $ObjCliente=new Cliente();
        $ObjCtrCliente=new CtrCliente($ObjCliente);
        $error=$ObjCtrCliente->listar();
       $resultadocliente=$ObjCtrCliente->getResultado();
        if(!$resultadocliente)
        {
            die("Error en la consulta: ".mysqli_error($error));
        }
        $Row=mysqli_num_rows($resultadocliente);
        if($Row!=0)
        {
        ?>
        <table border=1 align="center">
        <tr>
        <td>Cedula</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Direccion</td>
        <td>Telefono</td>
        <td>Celular</td>
        <td>Email</td>
        <td colspan="2">Accion</td>
        </tr>
        <?php
        while ($filas=mysqli_fetch_array($resultadocliente))
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
            <td><a href = "modificarclientes1.php?Cedula=<?php echo $filas['Cedula']?>"/a><img width="32" height="32" alt="Modificar" src="../imagenes/actualizar.ico" alt="" /></a></td>
            <td><a href="eliminarcliente1.php?Cedula=<?php echo $filas['Cedula']?>" /a><img width="32" height="32" alt="Eliminar" src="../imagenes/eliminar.ico" alt="" /></a> </td>
        </tr>

        <?php
        }
        ?>
        </table>
        <?php
              echo "<a  href='menu.php'>[ Menu Cliente ]</a>";
        }
        else
        {
           echo "<center> <br /><br /><br /><br /><br />No hay registros de clientees encontrados <br>";

           echo "<a href='menu.php' >[ Menu Cliente ]</a></center>";
        }
?>
</body>
 </html>

