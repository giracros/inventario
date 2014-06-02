<?php
$Usuario=$_POST["Usuario"];
$Contrasena=$_POST["Contrasena"];
//----------ARCHIVOS PARA TRABAJAR CON LOS USUARIOS-------------------------
include("../modelo/acceso.php");
include("../control/ctracceso.php");
$ObjAcceso=new Acceso();
$ObjCtrAcceso=new CtrAcceso($ObjAcceso);
//----------ACTUALIZAMOS LOS METODOS SET------------------------------------
$ObjAcceso->setPKUsuario($Usuario);
$ObjAcceso->setPassword($Contrasena);
//----------LLAMAMOS EL METODO QUE VALIDA EL INGRESO AL SISTEMA-------------
$error=$ObjCtrAcceso->validarusuario();
$resultado=$ObjCtrAcceso->getResultado();
if(!$resultado)
{
    die("Error en la consulta".mysqli_error($error));
}
$rows=mysqli_num_rows($resultado);
?>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
</head>
<body>
<?php
if($rows==0)
{
echo "<script languge='javascript'>alert('Error de usuario y/o contrase�a') </script>";
echo "<script languge='javascript'>location.href='../index.php'</script>";
}
else
{   session_start();// definimos inicio de sesi�n
    $filas=mysqli_fetch_array($resultado);
    $_SESSION["_PKUsuario"]=$Usuario;
    $_SESSION["_Nombre"]=$filas["Nombre"];
	$_SESSION["ultimoAcceso"]=date("Y-n-j H:i:s"); //para caducidad
    echo "<script languge='javascript'>location.href='menu.php'</script>";//redireccionando al men�
}
?>

</body>
</html>