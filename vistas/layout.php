<?php

 require_once("class/SIGA.php");
 
 header("Content-Type: text/plain");
 header("Content-Disposition: attachment;Filename=Poliza.txt");

 
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

$activos =  $obj->obtenPolizaMensual("",$Anio,$Mes,$Agrupar,$inpcperiodo);

 
 for ($i=0; $i < count($activos); $i++) 
 {					    
						/*echo $activos[$i]["Cuenta"]. 
						$activos[$i]["CC"] .
						'HTDEP'.
						'HTDEP'.
						$activos[$i]["AF_BC"]. 
						'Contable / Línea Recta'.
						number_format($activos[$i]["cargo"],2). 
						number_format($activos[$i]["abono"],2).'\n';*/
						$suma = round($activos[$i]["cargo"]+$activos[$i]["abono"],2);
						$suma = $suma*100;
						echo $TipoPoliza.str_ireplace(" ","",str_pad($activos[$i]["Cuenta"],13,"0",STR_PAD_RIGHT)).str_pad($Dia,2,"0",STR_PAD_LEFT).str_pad($Mes,2,"0",STR_PAD_LEFT).$Anio.'HTDEPMejoras a inm 2008 ---             1000000000'.$suma.$activos[$i]["CC"].'                                          000000000000000000000000000000000000000000000000000000000000                 '.PHP_EOL;
}


?>