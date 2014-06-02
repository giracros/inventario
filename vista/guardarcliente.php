<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
   <script languaje ="javascript" type="text/javascript" scr="../script/validartexto.js"></script>
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
//-------------inclucion de datos de cliente----------------------------------
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
        $error=$ObjCtrCliente->consultaringreso();
        $resultado=$ObjCtrCliente->getResultado();
        if($error)
        {
            die("Error en la consulta1: ".mysqli_error($error));
        }
        $row=mysqli_num_rows($resultado);
        if($row==0)
        {
        $error=$ObjCtrCliente->insertar();
        if($error)
        {
            die("Error en la consulta1: ".mysqli_error($error));
        }
//------------------------------- ----------------------------------------------
            echo "<script languge='javascript'>alert('Registro Almacenado')</script>";
            echo "<script languge='javascript'>location.href='mclientes.php'</script>";
        }
        else
        {
            echo "Registro ya existe";
            echo "<br /> <a href='menu.php'>Menu Clientes</a>";

        }
?>
</body>
 </html>