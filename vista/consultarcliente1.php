<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
   <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
</head>
<body>

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
        <table border=1 align="center">
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
 <a href="menu.php">Menu</a>
    <?php
    }
    else
    {
    echo "Registro no encontrado";
    echo "<br /> <a href='menu.php'>Menu</a>";
    }
?>
 
</body>
 </html>