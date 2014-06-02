<?php
session_start();//se debe poner para que continue con la sesi�n que abri, si no existe la crea
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
if(!isset($_SESSION["_PKUsuario"]))//pregunto por variable SESSION
{
echo "<script languge='javascript'>alert('No te has autenticado') </script>";
echo "<script languge='javascript'>location.href='../index.php'</script>";
}
else
{
$fechaOld= $_SESSION["ultimoAcceso"]; //para caducidad
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaOld));
    if($tiempo_transcurrido >= 60) { //comparamos el tiempo y verificamos si pasaron 10 minutos o m�s
      include "../scripts/finalizarsesion.php";
    }
    else
    {       //sino, actualizo la fecha de la sesi�n
        $_SESSION["ultimoAcceso"] = $ahora; //para caducidad

?>
  <div style="float: left;">Usted est� en el sistema como: <b><?php echo $_SESSION["_PKUsuario"]." ====> ".$_SESSION["_Nombre"]?></b></div>
  <div align="right"><a href="../scripts/finalizarsesion.php"><b>Finalizar Sesi�n</b></a></div>
  <br />

  <div id="menudesplegable">
    <table align="center">
      <tr>
        <td><a href="mclientes.php" title="Menu Cliente">Cliente</a></td>
        <td><a href="#2" title="Menu Empleado">Empleado</a></td>
        <td><a href="#3" title="Menu Marca">Marca</a></td>
        <td><a href="#4" title="Menu Producto">Producto</a></td>
        <td><a href="#5" title="Menu Ventas">Ventas</a></td>
      </tr>
    </table>
  </div>
  <?php
  }
}
?>
 </body>
</html>