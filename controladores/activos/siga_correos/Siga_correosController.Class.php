<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_correos/Siga_correosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_correos/Siga_correosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
require("mail/correo.php");

class Siga_correosController {
private $proveedor;
private $style='<html>
	<head>
    <style type="text/css">
        p {
            margin: 10px 0;
            padding: 0;
        }
        table {
            border-collapse: collapse;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            display: block;
            margin: 0;
            padding: 0;
        }
        img,
        a img {
            border: 0;
            height: auto;
            outline: none;
            text-decoration: none;
        }
        body,
        #bodyTable,
        #bodyCell {
            height: 100%;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        #outlook a {
            padding: 0;
        }
        img {
            -ms-interpolation-mode: bicubic;
        }
        table {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        .ReadMsgBody {
            width: 100%;
        }
        .ExternalClass {
            width: 100%;
        }
        p,
        a,
        li,
        td,
        blockquote {
            mso-line-height-rule: exactly;
        }
        a[href^=tel],
        a[href^=sms] {
            color: inherit;
            cursor: default;
            text-decoration: none;
        }
        p,
        a,
        li,
        td,
        body,
        table,
        blockquote {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass td,
        .ExternalClass div,
        .ExternalClass span,
        .ExternalClass font {
            line-height: 100%;
        }
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        #bodyCell {
            padding: 10px;
        }
        .templateContainer {
            max-width: 600px !important;
        }
        a.mcnButton {
            display: block;
        }
        .mcnImage {
            vertical-align: bottom;
        }
        .mcnTextContent {
            word-break: break-word;
        }
        .mcnTextContent img {
            height: auto !important;
        }
        .mcnDividerBlock {
            table-layout: fixed !important;
        }
        body,
        #bodyTable {
            background-color: #ffffff;
        }
        #bodyCell {
            border-top: 0;
        }
        .templateContainer {
            border: 0;
        }
        h1 {
            color: #202020;
            font-family: Helvetica;
            font-size: 26px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }
        h2 {
            color: #202020;
            font-family: Helvetica;
            font-size: 22px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }
        h3 {
            color: #202020;
            font-family: Helvetica;
            font-size: 20px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }
        h4 {
            color: #202020;
            font-family: Helvetica;
            font-size: 18px;
            font-style: normal;
            font-weight: bold;
            line-height: 125%;
            letter-spacing: normal;
            text-align: left;
        }
        #templatePreheader {
            background-color: #ffffff;
            background-image: none;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-top: 0;
            border-bottom: 0;
            padding-top: 9px;
            padding-bottom: 9px;
        }
        #templatePreheader .mcnTextContent,
        #templatePreheader .mcnTextContent p {
            color: #656565;
            font-family: Helvetica;
            font-size: 12px;
            line-height: 150%;
            text-align: left;
        }
        #templatePreheader .mcnTextContent a,
        #templatePreheader .mcnTextContent p a {
            color: #656565;
            font-weight: normal;
            text-decoration: underline;
        }
        #templateHeader {
            background-color: #FFFFFF;
            background-image: none;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-top: 0;
            border-bottom: 0;
            padding-top: 9px;
            padding-bottom: 0;
        }
        #templateHeader .mcnTextContent,
        #templateHeader .mcnTextContent p {
            color: #202020;
            font-family: Helvetica;
            font-size: 16px;
            line-height: 150%;
            text-align: left;
        }
        #templateHeader .mcnTextContent a,
        #templateHeader .mcnTextContent p a {
            color: #2BAADF;
            font-weight: normal;
            text-decoration: underline;
        }
        #templateBody {
            background-color: #FFFFFF;
            background-image: none;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-top: 0;
            border-bottom: 2px solid #EAEAEA;
            padding-top: 0;
            padding-bottom: 9px;
        }
        #templateBody .mcnTextContent,
        #templateBody .mcnTextContent p {
            color: #202020;
            font-family: Helvetica;
            font-size: 16px;
            line-height: 150%;
            text-align: left;
        }
        #templateBody .mcnTextContent a,
        #templateBody .mcnTextContent p a {
            color: #2BAADF;
            font-weight: normal;
            text-decoration: underline;
        }
        #templateFooter {
            background-color: #ffffff;
            background-image: none;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-top: 0;
            border-bottom: 0;
            padding-top: 9px;
            padding-bottom: 9px;
        }
        #templateFooter .mcnTextContent,
        #templateFooter .mcnTextContent p {
            color: #656565;
            font-family: Helvetica;
            font-size: 12px;
            line-height: 150%;
            text-align: center;
        }
        #templateFooter .mcnTextContent a,
        #templateFooter .mcnTextContent p a {
            color: #656565;
            font-weight: normal;
            text-decoration: underline;
        }
        @media only screen and (min-width: 768px) {
            .templateContainer {
                width: 600px !important;
            }
        }
        @media only screen and (max-width: 480px) {
            body,
            table,
            td,
            p,
            a,
            li,
            blockquote {
                -webkit-text-size-adjust: none !important;
            }
        }
        @media only screen and (max-width: 480px) {
            body {
                width: 100% !important;
                min-width: 100% !important;
            }
        }
        @media only screen and (max-width: 480px) {
            #bodyCell {
                padding-top: 10px !important;
            }
        }
        @media only screen and (max-width: 480px) {
            .mcnImage {
                width: 100% !important;
            }
        }
        @media only screen and (max-width: 480px) {
            .mcnCartContainer,
            .mcnCaptionTopContent,
            .mcnRecContentContainer,
            .mcnCaptionBottomContent,
            .mcnTextContentContainer,
            .mcnBoxedTextContentContainer,
            .mcnImageGroupContentContainer,
            .mcnCaptionLeftTextContentContainer,
            .mcnCaptionRightTextContentContainer,
            .mcnCaptionLeftImageContentContainer,
            .mcnCaptionRightImageContentContainer,
            .mcnImageCardLeftTextContentContainer,
            .mcnImageCardRightTextContentContainer {
                max-width: 100% !important;
                width: 100% !important;
            }
        }
        @media only screen and (max-width: 480px) {
            .mcnBoxedTextContentContainer {
                min-width: 100% !important;
            }
        }
        @media only screen and (max-width: 480px) {
            .mcnImageGroupContent {
                padding: 9px !important;
            }
        }
        @media only screen and (max-width: 480px) {
            .mcnCaptionLeftContentOuter .mcnTextContent,
            .mcnCaptionRightContentOuter .mcnTextContent {
                padding-top: 9px !important;
            }
        }
        @media only screen and (max-width: 480px) {
            .mcnImageCardTopImageContent,
            .mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent {
                padding-top: 18px !important;
            }
        }
        @media only screen and (max-width: 480px) {
            .mcnImageCardBottomImageContent {
                padding-bottom: 9px !important;
            }
        }
        @media only screen and (max-width: 480px) {
            .mcnImageGroupBlockInner {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }
        }
        @media only screen and (max-width: 480px) {
            .mcnImageGroupBlockOuter {
                padding-top: 9px !important;
                padding-bottom: 9px !important;
            }
        }
        @media only screen and (max-width: 480px) {
            .mcnTextContent,
            .mcnBoxedTextContentColumn {
                padding-right: 18px !important;
                padding-left: 18px !important;
            }
        }
        @media only screen and (max-width: 480px) {
            .mcnImageCardLeftImageContent,
            .mcnImageCardRightImageContent {
                padding-right: 18px !important;
                padding-bottom: 0 !important;
                padding-left: 18px !important;
            }
        }
        @media only screen and (max-width: 480px) {
            .mcpreview-image-uploader {
                display: none !important;
                width: 100% !important;
            }
        }
        @media only screen and (max-width: 480px) {
       
            
            h1 {
                font-size: 22px !important;
                line-height: 125% !important;
            }
        }
        @media only screen and (max-width: 480px) {
       
            
            h2 {
                font-size: 20px !important;
                line-height: 125% !important;
            }
        }
        @media only screen and (max-width: 480px) {
       
            
            h3 {
                font-size: 18px !important;
                line-height: 125% !important;
            }
        }
        @media only screen and (max-width: 480px) {
       
            
            h4 {
                font-size: 16px !important;
                line-height: 150% !important;
            }
        }
        @media only screen and (max-width: 480px) {
       
            
            .mcnBoxedTextContentContainer .mcnTextContent,
            .mcnBoxedTextContentContainer .mcnTextContent p {
                font-size: 14px !important;
                line-height: 150% !important;
            }
        }
        @media only screen and (max-width: 480px) {
       
            
            #templatePreheader {
                display: block !important;
            }
        }
        @media only screen and (max-width: 480px) {
       
            
            #templatePreheader .mcnTextContent,
            #templatePreheader .mcnTextContent p {
                font-size: 14px !important;
                line-height: 150% !important;
            }
        }
        @media only screen and (max-width: 480px) {
       
            
            #templateHeader .mcnTextContent,
            #templateHeader .mcnTextContent p {
                font-size: 16px !important;
                line-height: 150% !important;
            }
        }
        @media only screen and (max-width: 480px) {
       
            
            #templateBody .mcnTextContent,
            #templateBody .mcnTextContent p {
                font-size: 16px !important;
                line-height: 150% !important;
            }
        }
        @media only screen and (max-width: 480px) {
       
            
            #templateFooter .mcnTextContent,
            #templateFooter .mcnTextContent p {
                font-size: 14px !important;
                line-height: 150% !important;
            }
        }
    </style></head>';
	

private $encabezado='
	<body>
    <center>
        <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
        <tr>
        <td align="center" valign="top" id="bodyCell">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
        <tr>
            <td valign="top" id="templatePreheader"></td>
        </tr>
        <tr>
        <td valign="top" id="templateHeader">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
        <tbody class="mcnImageBlockOuter">
        <tr>
        <td valign="top" style="padding:0px" class="mcnImageBlockInner">
        <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
        <tbody>
        <tr>
        <td class="mcnImageContent" valign="top" style="padding-right: 0px; padding-left: 0px; padding-top: 0; padding-bottom: 0; text-align:center;">
            <img align="center" alt="" src="http://apps.hospitalsatelite.com:8080/ece/Consultador/vistas/img/CHS.jpg" width="100" style="max-width:100px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        <tr>
        <td valign="top" id="templateBody">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
        <tbody class="mcnTextBlockOuter">
        <tr>
        <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
        <tbody>
        <tr>
        <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">';

private $contenido='</td>
        </tr>
        </tbody>
        </table>
		
		</td>
        </tr>
        </tbody>
        </table>
		</td>
        </tr>
        <tr>
		<td valign="top" id="templateFooter">
        <div align="center">';

private $cierre='</div>	
		<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
        <tbody class="mcnDividerBlockOuter">
        <tr>
        <td class="mcnDividerBlockInner" style="min-width: 100%; padding: 20px 18px;">
        <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #EAEAEA;">
        <tbody>
        <tr>
			<td align="center">
				
			</td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </tbody>
        </table>
        </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
    </center></body></html>';	
	
public function __construct() {
}

public function validarSiga_correos($Siga_correosDto){
$Siga_correosDto->setCadena_Mail(strtoupper(str_ireplace("'","",trim($Siga_correosDto->getCadena_Mail()))));
$Siga_correosDto->setCadena_Mail_Copia(strtoupper(str_ireplace("'","",trim($Siga_correosDto->getCadena_Mail_Copia()))));
$Siga_correosDto->setCadena_Mail_Copia_Oculta(strtoupper(str_ireplace("'","",trim($Siga_correosDto->getCadena_Mail_Copia_Oculta()))));
$Siga_correosDto->setCadena_Archivos(strtoupper(str_ireplace("'","",trim($Siga_correosDto->getCadena_Archivos()))));
$Siga_correosDto->setSubject(strtoupper(str_ireplace("'","",trim($Siga_correosDto->getSubject()))));
$Siga_correosDto->setMensaje(strtoupper(str_ireplace("'","",trim($Siga_correosDto->getMensaje()))));
$Siga_correosDto->setCorreo_Envio(strtoupper(str_ireplace("'","",trim($Siga_correosDto->getCorreo_Envio()))));
$Siga_correosDto->setPass_Correo_Envio(strtoupper(str_ireplace("'","",trim($Siga_correosDto->getPass_Correo_Envio()))));
$Siga_correosDto->setCadena_Archivos_Nombre(strtoupper(str_ireplace("'","",trim($Siga_correosDto->getCadena_Archivos_Nombre()))));
return $Siga_correosDto;
}

public function selectSiga_correos($Siga_correosDto,$proveedor=null){
$Siga_correosDto=$this->validarSiga_correos($Siga_correosDto);
$Siga_correosDao = new Siga_correosDAO();
$Siga_correosDto = $Siga_correosDao->selectSiga_correos($Siga_correosDto,$proveedor);
return $Siga_correosDto;
}

public function insertSiga_correos($Siga_correosDto,$proveedor=null){
//$Siga_correosDto=$this->validarSiga_correos($Siga_correosDto);
$Siga_correosDao = new Siga_correosDAO();
$Siga_correosDto = $Siga_correosDao->insertSiga_correos($Siga_correosDto,$proveedor);
return $Siga_correosDto;
}

public function updateSiga_correos($Siga_correosDto,$proveedor=null){
//$Siga_correosDto=$this->validarSiga_correos($Siga_correosDto);
$Siga_correosDao = new Siga_correosDAO();
//$tmpDto = new Siga_correosDTO();
//$tmpDto = $Siga_correosDao->selectSiga_correos($Siga_correosDto,$proveedor);
//if($tmpDto!=""){//$Siga_correosDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_correosDto = $Siga_correosDao->updateSiga_correos($Siga_correosDto,$proveedor);
return $Siga_correosDto;
//}
//return "";
}

public function deleteSiga_correos($Siga_correosDto,$proveedor=null){
$Siga_correosDto=$this->validarSiga_correos($Siga_correosDto);
$Siga_correosDao = new Siga_correosDAO();
$Siga_correosDto = $Siga_correosDao->deleteSiga_correos($Siga_correosDto,$proveedor);
return $Siga_correosDto;
}

public function envia_correo($siga_correosDto, $Id_Vale_Resguardo, $Nombre_Solicitante, $Num_Empleado, $Nombre_Jefe_Area, $Correo_Jefe_Area, $Num_Empleado_Jefe, $Autorizado_por,$url_solicitante, $proveedor=null)
{
 
 $correo_objeto = new Correo;
 
 $respuesta = array();	
 $cadena_email_cc="";
 $Correo_Solicitante="";
 $Correo_Resp_Area="";
 $cadena_archivos="";
 $cadena_archivos_nombre="";
 
 
 //echo $siga_correosDto->getCadena_Mail();
 $Correo_Solicitante="itdeveloper@hospitalsatelite.com";
 $Correo_Resp_Area="itdeveloper@hospitalsatelite.com";
 //$correo="carolina@mockup.mx";
 
$Titulo='<h1 style="text-align: center;"><span style="color:#c30f1f">Autorizar Vale</span></h1>';
if($Autorizado_por=="1"){
	$Html=$this->style;
	$Html.=$this->encabezado;
	$Html.=$Titulo;
	
	$Html.='<p style="text-align: center;"><span style="font-family:arial,helvetica neue,helvetica,sans-serif"><span style="font-size:16px"><span style="color:#666666">
			Buen dia <strong>'.$Nombre_Solicitante.', </strong>esta es una notificacion para autorizar la firma del vale de resguardo
			</span></span>
				</span>
			</p>';
	$Html.=$this->contenido;
	$Html.=	'<span>
				<a target="_blank" href="https://apps2.hospitalsatelite.com/pruebas/SIGA/controladores/activos/siga_vale_resguardo/reporte.php?Id_Vale_Resguardo='.$Id_Vale_Resguardo.'">Imprimir PDF</a>
			</span>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<span>
				<a target="_blank" href="https://apps2.hospitalsatelite.com/pruebas/SIGA/Autorizar/vale-resguardo-autorizar.php?Id_Vale_Resguardo='.$Id_Vale_Resguardo.'&Num_Empleado='.$Num_Empleado.'&Tipo=1'.$url_solicitante.'">Autorizar</a>
				
			</span>';
	$Html.=$this->cierre;

	$error=$correo_objeto->enviaCorreo($Correo_Solicitante,$cadena_email_cc,"",$cadena_archivos,'CHS: Vale de Resguardo (Solicitante): '.$Id_Vale_Resguardo.'',$Html,$cadena_archivos_nombre);
}

if($Autorizado_por=="2"){
	$Html=$this->style;
	$Html.=$this->encabezado;
	$Html.=$Titulo;
	
	$Html.='<p style="text-align: center;"><span style="font-family:arial,helvetica neue,helvetica,sans-serif"><span style="font-size:16px"><span style="color:#666666">
			Buen dia <strong>'.$Nombre_Jefe_Area.', </strong>esta es una notificacion para autorizar la firma del vale de resguardo
			</span></span>
				</span>
			</p>';
	$Html.=$this->contenido;
	$Html.=	'<span>
				<a target="_blank" href="https://apps2.hospitalsatelite.com/pruebas/SIGA/controladores/activos/siga_vale_resguardo/reporte.php?Id_Vale_Resguardo='.$Id_Vale_Resguardo.'">Imprimir PDF</a>
			</span>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<span>
				<a target="_blank" href="https://apps2.hospitalsatelite.com/pruebas/SIGA/Autorizar/vale-resguardo-autorizar.php?Id_Vale_Resguardo='.$Id_Vale_Resguardo.'&Num_Empleado='.$Num_Empleado.'&Tipo=1'.$url_solicitante.'">Autorizar</a>
				
			</span>';
	$Html.=$this->cierre;
	
	$error=$correo_objeto->enviaCorreo($Correo_Solicitante,$cadena_email_cc,"",$cadena_archivos,'CHS: Vale de Resguardo (Resp. Area): '.$Id_Vale_Resguardo.'',$Html,$cadena_archivos_nombre);
}

if($error==true){
	$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Enviado Correctamente");  	
}else
{
	$respuesta = array("totalCount" => "0", "estatus" => "error", "mensaje" => "No se ha enviado");  
}
 return $respuesta;	
}

}
?>