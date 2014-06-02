<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
   <link rel="stylesheet" type="text/css" href="../css/">
</head>
<body>
<?php
$Cedula=$_POST["Cedula"];
$Nombre=$_POST["Nombres"];
$Apellidos=$_POST["Apellidos"];
$Direccion=$_POST["Direccion"];
$Telefono=$_POST["Telefono"];
$Celular=$_POST["Celular"];
$Email=$_POST["Email"];
//----------ARCHIVOS PARA TRABAJAR CON LA PERSONA-------------------------------
include("../modelo/cliente.php");
include("../control/ctrcliente.php");
$ObjCliente=new Cliente();
$ObjCtrCliente=new CtrCliente($ObjCliente);
$ObjCliente->setCedula($Cedula);
$ObjCliente->setNombre($Nombre);
$ObjCliente->setApellidos($Apellidos);
$ObjCliente->setDireccion($Direccion);
$ObjCliente->setTelefono($Telefono);
$ObjCliente->setCelular($Celular);
$ObjCliente->setEmail($Email);
//----------INSERTAMOS LA PERSONA-----------------------------------------------
$error=$ObjCtrCliente->modificar();
$resultado=$ObjCtrCliente->getResultado();
if(!$resultado)
{
    die("Error en la consulta: ".mysqli_error($error));
}
echo "<script languge='javascript'>alert('Registro Actualizado')</script>";
echo "<script languge='javascript'>location.href='menu.php'</script>";
?>
</body>
</html>