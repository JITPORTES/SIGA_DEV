<?php 
session_start();
require_once("class/SIGA.php");
$obj = new SIGA();

	$termino = trim($_GET["term"]);
	$error = "0";
	//echo "<pre>";
	//print_r($_REQUEST);
	//echo "</pre>";
	//die();
	$Arr = $obj->buscaProveedor($termino);

	echo json_encode($Arr);

?>