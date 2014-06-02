<?php
session_start();//se debe poner para que continue con la sesión que abri, si no existe la crea
$_SESSION = array();//array a todas las tablas de sesión que hay y luego destruye todas
unset($_SESSION); //session_unset();
session_destroy();//se destruye sesión
echo "<script languge='javascript'>location.href='../index.php'</script>";
?>
