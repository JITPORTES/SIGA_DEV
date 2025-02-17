<?php
session_start();

if(!isset($_SESSION["Id_Usuario"]) || (empty($_SESSION["Id_Usuario"]))){
  echo "<script>location.replace('https://apps2.hospitalsatelite.com/siga/vistas/login.php'); alert('Sesión Vencida');</script>;";
  session_destroy();
  exit();
}

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");