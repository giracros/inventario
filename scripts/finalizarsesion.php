<?php

session_start();
$_SESSION = array();
unset($_SESSION);
session_destroy();
echo "<script languge='javascript'>location.href='../index.php'</script>";
?>
