<?php
session_start();//se debe poner para que continue con la sesión que abri, si no existe la crea
?>
<html>
<head>
<title></title>
   <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
</head>
<body>
  <h1>Consultar Cliente</h1>
<form name="Cliente" action="consultarcliente1.php" method="post">
<table border=1 cellspacin ='2' cellpadding="2" class="tableinformes">
  <tr>
    <td>Cedula</td>
    <td><input name="Cedula" size="30"/></td>
  </tr>
    <tr>
    <td colspan="2" align="center"><input type="submit" name="Consultar" value="Consultar" /></td>
  </tr>
</table>
</form>
<br />
 <a href="mclientes.php">Menu Clientes</a>
</body>
</html>
