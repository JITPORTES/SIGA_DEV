<?php

require("correo.php");	

$mensajeFinal = "MENSAJE desde mockups";
$correo = new Correo();
$BitCorreoEnviado=$correo->enviaCorreo("javier@mockup.mx","javier","javier@mockup.mx",$mensajeFinal,"","");
if ($BitCorreoEnviado)
{
	echo "<script>javascript:alert('Correo Enviado');</script>";
}
else
{
	echo "<script>javascript:alert('Correo NO Enviado');</script>";
}
?>
