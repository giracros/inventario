<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
if(isset($_POST["Cedula"]))
{
$Cedula=$_POST["Cedula"];
}
elseif(isset($_GET["Cedula"]))
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
       <a href="mclientes.php">Menu Clientes</a>
<?php
}
else
{
$error=$ObjCtrCliente->eliminar();
$resultado=$ObjCtrCliente->getResultado();
if($error)
{
    die("Error en la consutla: ".mysqli_error($error));
}
            echo "<script languge='javascript'>alert('Registro Eliminado')</script>";
            echo "<script languge='javascript'>location.href='menu.php'</script>";
}
?>
</body>
</html>