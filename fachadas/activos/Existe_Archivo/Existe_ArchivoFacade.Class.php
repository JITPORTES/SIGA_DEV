<?php
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
class Existe_ArchivoFacade {
private $proveedor;
public function __construct() {
}

public function Existe_Archivo($url){
	
	$jsonDto = new Encode_JSON();
	$respuesta="";
	//Comprobamos si existe el fichero
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_NOBODY, true);
	curl_exec($ch);
	$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	if($retcode==200 || $retcode==302){
		return $jsonDto->encode(array("totalCount"=>"1","text"=>"EL ARCHIVO EXISTE"));
	}else{
		return $jsonDto->encode(array("totalCount"=>"0","text"=>"EL ARCHIVO NO EXISTE"));
	}

}

}

@$Url=$_POST["Url"];
@$accion=$_POST["accion"];
$existe_ArchivoFacade = new Existe_ArchivoFacade();


if($accion=="existe_archivo"){
$existe_Archivo=$existe_ArchivoFacade->Existe_Archivo($Url);
echo $existe_Archivo;
}


?>