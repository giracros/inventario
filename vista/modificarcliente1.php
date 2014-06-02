<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
</head>
<body>
 <br />
  <center>
<?php
if(isset($_POST["Cedula"]))
{
$Cedula=$_POST["Cedula"];
}
if(isset($_GET["Cedula"]))
{
$Cedula=$_GET["Cedula"];
}
//--------ARCHIVOS PARA TRABAJAR CON LA ASISTENCIA------------------------------
include("../modelo/cliente.php");
include("../control/ctrcliente.php");
$ObjCliente=new Cliente();
$ObjCtrCliente=new CtrCliente($ObjCliente);
$ObjCliente->setCedula($Cedula);
$error=$ObjCtrCliente->consultar();
$resultado=$ObjCtrCliente->getResultado();
if($error)
{
    die("Error en la consutla: ".mysqli_error($error));
}
$Row=mysqli_num_rows($resultado);
if($Row==0)
{
 ?>
        <b>Registro no encontrado</b>
        <br>
        <br>
        <a href="mclientes.php">Regresar</a>
<?php
}
else
{
    $filas=mysqli_fetch_array($resultado);
?>
    <form action="guardarmodificarcliente.php" method="post">
    <table border="1" cellpadding="0" cellspacing="0" class="tablainformes">
        <tr>
            <th colspan="2"  class="titlo">CONSULTA DE CLIENTES</th>
        </tr>
    <tr>
        <td align="left"><input type="hidden" name="Cedula" id="Cedula" size="15" maxlength="15" value="<?php echo $Cedula;?>"/></td>
    </tr>
    <tr class="celda">
        <td  align="right"><b>Nombre</b></td>
        <td align="left"><input name="Nombres" id="Nombres" size="30" maxlength="45" value="<?php echo $filas["Nombres"];?>" /></td>
    </tr>
    <tr class="celda">
        <td  align="right"><b>Apellidos</b></td>
        <td align="left"><input name="Apellidos" id="Apellidos" size="30" maxlength="30" value="<?php echo $filas["Apellidos"]?>" /></td>
    </tr>
    <tr class="celda">
            <td  align="right"><b>Direccion</b></td>
            <td align="left"><input name="Direccion" id="Direccion" size="30" maxlength="45" value="<?php echo $filas["Direccion"]?>" /></td>
    </tr>
    <tr class="celda">
            <td  align="right"><b>Telefono</b></td>
            <td align="left"><input name="Telefono" id="Telefono" size="15" maxlength="15" value="<?php echo $filas["Telefono"]?>" /></td>
    </tr>
    <tr class="celda">
            <td  align="right"><b>Celular</b></td>
            <td align="left"><input name="Celular" id="Celular" size="15" maxlength="15" value="<?php echo $filas["Celular"]?>"  /></td>
    </tr>
    <tr class="celda">
        <td  align="right"><b>Email</b></td>
        <td align="left"><input name="Email" id="Email" size="30" maxlength="100" value="<?php echo $filas["Email"]?>" /></td>
    </tr>
    </table>
    <br>
    <input type="submit" value="Modificar" />
    <br />
    <a  href="menu.php">Regresar</a>
    </form>
<?php
}
?>
 </center>
</body>
 </html>