<?php 
error_reporting(1);

require_once("class/SIGA.php");
require_once("CURL.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/catalogos.class.php");
 
$Id_Activo 	= $_POST["Id_Activo"];
$Id_Baja 		= $_POST["Id_Baja"];
$Id_Usuario 	= $_POST["Usuario"];
$Paso 				= $_POST["Paso"];
 
$email = "itdeveloper@hospitalsatelite.com";
$dir 	 = "https://apps2.hospitalsatelite.com";
 
$obj 						= new SIGA();
$catalogosClass = new catalogos();
$SigaEmailInfo 	= $catalogosClass->getSigaEmail($Id_Usuario); 
$Existe 				= $obj->verifica_proceso_workflow($Id_Baja,$Paso);  

if($SigaEmailInfo[1] !=''){
//-----------------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------------------

if($Existe==0){			

	$rutaip 							= "https://apps2.hospitalsatelite.com";
	$RUTA 								= $rutaip."/".$obj->rutaSistema();
	$FORMATOBAJA 					= $rutaip."/".$obj->rutaSistema()."/controladores/activos/siga_activos/Reporte-Baja.php?Id_baja=".$Id_Baja."&Id_Activo=".$Id_Activo."&Nom=1";
	$activo 							= $obj->obtenCatalogo($Id_Activo,"siga_activos","Id_Activo","Nombre_Activo",""," and Estatus_Reg<>3 ");
	$motivo 							= $obj->obtenDetalleBaja($Id_Activo, $Id_Baja);
	$primaria_secundaria 	= $obj->ubic_prim_y_ubic_sev($Id_Activo);
	$propiedad_activo 		= $obj->propiedad_activo($Id_Activo);
	$usuarioEnvia 				= $obj->obtenCatalogo($Id_Usuario,"siga_usuarios","Id_Usuario","Nombre_Usuario");
	$emailUsuario 				= $SigaEmailInfo[1];
	$nombre 							= $SigaEmailInfo[0]; 
	$Paso 								= $obj->insertaProcesoWorkflow($Id_Activo,$Id_Baja,$Id_Usuario,$emailUsuario);
 
	$subject 		 = "Solicitud de baja activo: ".$activo[0]["Nombre_Activo"]." AFBC: ".$activo[0]["AF_BC"];
	$mensajeFinal = file_get_contents('../datos/mail/correosiga.html');
	$mensajeFinal = str_replace("#ACTIVO#",$activo[0]["Nombre_Activo"],$mensajeFinal);
	$mensajeFinal = str_replace("#Id_Activo#",$Id_Activo,$mensajeFinal);
	$mensajeFinal = str_replace("#FORMATOBAJA#",$FORMATOBAJA,$mensajeFinal);
	$mensajeFinal = str_replace("#RUTA#",$RUTA,$mensajeFinal);
	$mensajeFinal = str_replace("#PASO#",$Paso,$mensajeFinal);
	$mensajeFinal = str_replace("#Id_Usuario#",$Id_Usuario,$mensajeFinal);
	$mensajeFinal = str_replace("#USER#",$nombre,$mensajeFinal);
	
	$mensajeFinal = str_replace("#AFBC#",$activo[0]["AF_BC"],$mensajeFinal);
	$mensajeFinal = str_replace("#Ubic_Prim#",$primaria_secundaria[0]["Desc_Ubic_Prim"],$mensajeFinal);
	$mensajeFinal = str_replace("#Ubic_Sec#",$primaria_secundaria[0]["Desc_Ubic_Sec"],$mensajeFinal);
	$mensajeFinal = str_replace("#DescCorta#",$activo[0]["DescCorta"],$mensajeFinal);
	$mensajeFinal = str_replace("#Marca#",$activo[0]["Marca"],$mensajeFinal);
	$mensajeFinal = str_replace("#Modelo#",$activo[0]["Modelo"],$mensajeFinal);
	$mensajeFinal = str_replace("#Serie#",$activo[0]["NumSerie"],$mensajeFinal);
	$mensajeFinal = str_replace("#Propiedad#",$propiedad_activo[0]["Desc_Propiedad"],$mensajeFinal);
	$mensajeFinal = str_replace("#Desc_Motivo_baja#",$motivo[0]["Desc_Motivo_baja"],$mensajeFinal);
	$mensajeFinal = str_replace("#Desc_Destino_final#",$motivo[0]["Desc_Destino_final"],$mensajeFinal);
	$mensajeFinal = str_replace("#Comentarios#",$motivo[0]["Comentarios"],$mensajeFinal);
	$mensajeFinal = str_replace("#Costos#",$motivo[0]["Costos"],$mensajeFinal);
	
	$mensajeFinal=str_replace("á", "a|", $mensajeFinal);
	$mensajeFinal=str_replace("Á", "A|", $mensajeFinal);
	$mensajeFinal=str_replace("é", "e|", $mensajeFinal);
	$mensajeFinal=str_replace("É", "E|", $mensajeFinal);
	$mensajeFinal=str_replace("í", "i|", $mensajeFinal);
	$mensajeFinal=str_replace("Í", "I|", $mensajeFinal);
	$mensajeFinal=str_replace("ó", "o|", $mensajeFinal);
	$mensajeFinal=str_replace("Ó", "O|", $mensajeFinal);
	$mensajeFinal=str_replace("ú", "u|", $mensajeFinal);
	$mensajeFinal=str_replace("Ú", "U|", $mensajeFinal);
	$mensajeFinal=str_replace("ñ", "n|", $mensajeFinal);
	$mensajeFinal=str_replace("Ñ", "N|", $mensajeFinal);
	
	$obj = new CURL();
	$url = "http://207.249.133.119:8080/envio_correo_externo/send_external_email.asp";                      
 
	$data = array('strPassword' => 'C68H17S49', 'strSubject' => $subject,'strTo'=>$emailUsuario,'strHTMLBody'=>$mensajeFinal,'strCc'=>"",'strBCC'=>$email);
	$correoASP = $obj->curlData($url,$data);
 }

 echo json_encode(0);
//-----------------------------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------------------------
} else {
	echo json_encode(1);
}

