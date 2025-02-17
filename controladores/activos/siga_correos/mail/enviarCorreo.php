<?php

require("correo.php");	

$mensajeFinal = "MENSAJE desde mockups";
$correo = new Correo();
$BitCorreoEnviado=$correo->enviaCorreo("jesus23_ignacio@hotmail.com","jesus","jesus23_ignacio@hotmail.com",$mensajeFinal);
if ($BitCorreoEnviado)
{
	echo "<script>javascript:alert('Correo Enviado');</script>";
}
else
{
	echo "<script>javascript:alert('Correo NO Enviado');</script>";
}
?>
