<?php

 require_once("class/SIGA.php");
 
// header("Content-Type: text/plain");
// header("Content-Disposition: attachment;Filename=Cierre.txt");

 
 $Dia = date("d");
 
 $Anio = date("Y");
 if (isset($_GET["Anio"]))
 $Anio = $_GET["Anio"];	

 $Mes = date("m");
 if (isset($_GET["Mes"]))
 $Mes = $_GET["Mes"];

 $Agrupar = 2;
 if (isset($_GET["Agrupar"]))
 $Agrupar = $_GET["Agrupar"];

 $inpcperiodo = 2018;
 if (isset($_GET["INPCPeriodo"]))
 $inpcperiodo = $_GET["INPCPeriodo"];

 $TipoPoliza = "03";
 if (isset($_GET["TipoPoliza"]))
 $TipoPoliza = $_GET["TipoPoliza"];

 $obj = new SIGA(); 

 
 $activos = $obj->obtenActivosContables("",$Anio,1); 
 //print_r($activos);
 //die();
 for ($i=0; $i < count($activos); $i++)
 {
  $obj->cierreMes($activos[$i]["AF_BC"],$Anio,$Mes,$Agrupar,$inpcperiodo);
  echo "AFBC".$activos[$i]["AF_BC"]." cerrado<br>";
 }
 
echo "Mes Cerrado";

?>