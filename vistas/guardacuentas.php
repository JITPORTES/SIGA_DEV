 <?php 
 error_reporting(0);
 require_once("class/SIGA.php");

 $CuentaActivo = $_POST["CuentaActivo"];
 $CuentaActivoB10 = $_POST["CuentaActivoB10"];
 $CuentaDepreciacion = $_POST["CuentaDepreciacion"];
 $CuentaDepreciacionB10 = $_POST["CuentaDepreciacionB10"];
 $CuentaResultados =  $_POST["CuentaResultados"];
 $CuentaResultadosB10 = $_POST["CuentaResultadosB10"];
 $CuentaBaja = $_POST["CuentaBaja"];
 $Id_Activo = $_POST["Id_Activo"];
 $Id_Cuentas = $_POST["Id_Cuentas"];
 
 $VidaUtilFiscal = $_POST["VidaUtilFiscal"];
 $FechaFiscal = $_POST["FechaFiscal"];
 $FechaInicioFiscal = $_POST["FechaInicioFiscal"]; 
 $MontoFiscal = $_POST["MontoFiscal"];
 $CuentaRexBaja = $_POST["CuentaRexBaja"];
 $MOIAntesCambio = $_POST["MOIAntesCambio"];
 $MOIAntesCambio = str_replace(",","",$MOIAntesCambio);
 


 $obj = new SIGA(); 
 
 $obj->actualizaCuentasContables($Id_Activo,$CuentaActivo,$CuentaActivoB10,$CuentaDepreciacion,$CuentaDepreciacionB10,$CuentaResultados,$CuentaResultadosB10,$CuentaBaja,$Id_Cuentas,$VidaUtilFiscal,$FechaFiscal,$MontoFiscal,$CuentaRexBaja,$MOIAntesCambio,$FechaInicioFiscal);
 
 //$obj->calculaDepreciacion($Id_Activo);
?>