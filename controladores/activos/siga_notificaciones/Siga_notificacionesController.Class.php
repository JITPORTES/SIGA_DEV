<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_notificaciones/Siga_notificacionesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_notificaciones/Siga_notificacionesDAO.Class.php");
//Usuarios
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_usuarios/Siga_usuariosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_usuarios/Siga_usuariosDAO.Class.php");

include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_notificacionesController {
private $proveedor;

private $encabezado='
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
    </center>';		

public function __construct() {
}
public function validarSiga_notificaciones($Siga_notificacionesDto){
$Siga_notificacionesDto->setId_Notificacion(strtoupper(str_ireplace("'","",trim($Siga_notificacionesDto->getId_Notificacion()))));
$Siga_notificacionesDto->setId_Usuario_Envia(strtoupper(str_ireplace("'","",trim($Siga_notificacionesDto->getId_Usuario_Envia()))));
$Siga_notificacionesDto->setId_Usuario_Recibe(strtoupper(str_ireplace("'","",trim($Siga_notificacionesDto->getId_Usuario_Recibe()))));
$Siga_notificacionesDto->setMensaje_Largo(strtoupper(str_ireplace("'","",trim($Siga_notificacionesDto->getMensaje_Largo()))));
$Siga_notificacionesDto->setMensaje_Corto(strtoupper(str_ireplace("'","",trim($Siga_notificacionesDto->getMensaje_Corto()))));
$Siga_notificacionesDto->setEstatus_Leido(strtoupper(str_ireplace("'","",trim($Siga_notificacionesDto->getEstatus_Leido()))));
$Siga_notificacionesDto->setEstatus_Eliminado(strtoupper(str_ireplace("'","",trim($Siga_notificacionesDto->getEstatus_Eliminado()))));
$Siga_notificacionesDto->setUrl_Archivho_Enviado(strtoupper(str_ireplace("'","",trim($Siga_notificacionesDto->getUrl_Archivho_Enviado()))));
$Siga_notificacionesDto->setId_Aplicacion(strtoupper(str_ireplace("'","",trim($Siga_notificacionesDto->getId_Aplicacion()))));
$Siga_notificacionesDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_notificacionesDto->getId_Area()))));
$Siga_notificacionesDto->setId_Menu(strtoupper(str_ireplace("'","",trim($Siga_notificacionesDto->getId_Menu()))));
$Siga_notificacionesDto->setId_Submenu(strtoupper(str_ireplace("'","",trim($Siga_notificacionesDto->getId_Submenu()))));
$Siga_notificacionesDto->setFecha_Envio(strtoupper(str_ireplace("'","",trim($Siga_notificacionesDto->getFecha_Envio()))));
return $Siga_notificacionesDto;
}
public function selectSiga_notificaciones($Siga_notificacionesDto,$proveedor=null){
$Siga_notificacionesDto=$this->validarSiga_notificaciones($Siga_notificacionesDto);
$Siga_notificacionesDao = new Siga_notificacionesDAO();
$Siga_notificacionesDto = $Siga_notificacionesDao->selectSiga_notificaciones($Siga_notificacionesDto,$proveedor);
return $Siga_notificacionesDto;
}
public function insertSiga_notificaciones($Siga_notificacionesDto,$proveedor=null){
//$Siga_notificacionesDto=$this->validarSiga_notificaciones($Siga_notificacionesDto);
$Siga_notificacionesDao = new Siga_notificacionesDAO();
$Siga_notificacionesDto = $Siga_notificacionesDao->insertSiga_notificaciones($Siga_notificacionesDto,$proveedor);
return $Siga_notificacionesDto;
}
public function notificacion_vale_resguardo($Siga_solicitanteDto,$Siga_resp_areaDto,$Id_Vale_Resguardo,$Nombre_Solicitante, $Num_Empl_Solicitante,$Nombre_Jefe_Area,$Num_Empl_Resp_Area,$Autorizado_por,$proveedor=null){
	$error = false;
	$respuesta = array();
	$Titulo='<h1 style="text-align: center;"><span style="color:#c30f1f">Autorizar Vale</span></h1>';
	
	if($Autorizado_por=="1"){
		//Buscamos el Id del solicitante mediante el numero de empleado, si existe realizamos el insert 
		$Siga_usuariosDao = new Siga_usuariosDAO();
		$Siga_usuariosDto = new Siga_usuariosDTO();
		$Siga_usuariosDto->setNo_Usuario($Num_Empl_Solicitante);
		$Siga_usuariosDto = $Siga_usuariosDao->selectSiga_usuarios($Siga_usuariosDto,$proveedor);	
		//Mensaje Largo
		
		
		$Html=$this->encabezado;
		$Html.=$Titulo;
		
		$Html.='<p style="text-align: center;"><span style="font-family:arial,helvetica neue,helvetica,sans-serif"><span style="font-size:16px"><span style="color:#666666">
				Buen dia <strong>'.$Nombre_Solicitante.', </strong>esta es una notificacion para autorizar la firma del vale de resguardo
				</span></span>
					</span>
				</p>';
		$Html.=$this->contenido;
		$Html.=	'<span>
					<a target="_blank" href="/../../../pruebas/SIGA/controladores/activos/siga_vale_resguardo/reporte.php?Id_Vale_Resguardo='.$Id_Vale_Resguardo.'">Imprimir PDF</a>
				</span>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<span>
					<a target="_blank" href="/../../../pruebas/SIGA/Autorizar/vale-resguardo-autorizar.php?Id_Vale_Resguardo='.$Id_Vale_Resguardo.'&Num_Empleado='.$Num_Empl_Solicitante.'&Tipo=1&Usr_Envia='.$Siga_solicitanteDto->getId_Usuario_Envia().'&Aplicacion='.$Siga_solicitanteDto->getId_Aplicacion().'&Area='.$Siga_solicitanteDto->getId_Area().'&Menu='.$Siga_solicitanteDto->getId_Menu().'&Submenu='.$Siga_solicitanteDto->getId_Submenu().'">Autorizar</a>
				</span>';
		$Html.=$this->cierre;
		//
		if($Siga_usuariosDto!=""){
			$Siga_notificacionesDao = new Siga_notificacionesDAO();
			$Siga_solicitanteDto->setId_Usuario_Recibe($Siga_usuariosDto[0]->getId_Usuario());
			$Siga_solicitanteDto->setMensaje_Corto("CHS: Vale de Resguardo (Solicitante): ".$Id_Vale_Resguardo);
			$Siga_solicitanteDto->setMensaje_Largo($Html);
			$Siga_solicitanteDto = $Siga_notificacionesDao->insertSiga_notificaciones($Siga_solicitanteDto,$proveedor);
			if($Siga_solicitanteDto==""){
				$error=true;
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////////
	}
	
	if($Autorizado_por=="2"){
		//Buscamos el Id del responsable del area mediante el numero de empleado, si existe realizamos el insert 
		$Siga_usuariosDao = new Siga_usuariosDAO();
		$Siga_usuariosDto = new Siga_usuariosDTO();
		$Siga_usuariosDto->setNo_Usuario($Num_Empl_Resp_Area);
		$Siga_usuariosDto = $Siga_usuariosDao->selectSiga_usuarios($Siga_usuariosDto,$proveedor);	
		//Mensaje Largo
		$Html=$this->encabezado;
		$Html.=$Titulo;
		$Html.='<p style="text-align: center;"><span style="font-family:arial,helvetica neue,helvetica,sans-serif"><span style="font-size:16px"><span style="color:#666666">
				Buen dia <strong>'.$Nombre_Jefe_Area.', </strong>esta es una notificacion para autorizar la firma del vale de resguardo
				</span></span>
					</span>
				</p>';
		$Html.=$this->contenido;
		$Html.=	'<span>
					<a target="_blank" href="/../../../pruebas/SIGA/controladores/activos/siga_vale_resguardo/reporte.php?Id_Vale_Resguardo='.$Id_Vale_Resguardo.'">Imprimir PDF</a>
				</span>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<span>
					<a target="_blank" href="/../../../pruebas/SIGA/Autorizar/vale-resguardo-autorizar.php?Id_Vale_Resguardo='.$Id_Vale_Resguardo.'&Num_Empleado='.$Num_Empl_Resp_Area.'&Tipo=2">Autorizar</a>
				</span>';
		$Html.=$this->cierre;
		//
		
		if($Siga_usuariosDto!=""){
			$Siga_notificacionesDao = new Siga_notificacionesDAO();
			$Siga_resp_areaDto->setId_Usuario_Recibe($Siga_usuariosDto[0]->getId_Usuario());
			$Siga_resp_areaDto->setMensaje_Corto("CHS: Vale de Resguardo (Resp. Area): ".$Id_Vale_Resguardo);
			$Siga_resp_areaDto->setMensaje_Largo($Html);
			$Siga_resp_areaDto = $Siga_notificacionesDao->insertSiga_notificaciones($Siga_resp_areaDto,$proveedor);
			
			if($Siga_resp_areaDto==""){
				$error=true;
			}
		}
		///////////////////////////////////////////////////////////////////////////////////////////////////
	}
	
	if ($error == false) {
		$respuesta = array("totalCount" => "1", "estatus"=>"ok", "text" => "REGISTRO REALIZADO DE FORMA CORRECTA");
	} else {
		$respuesta = array("totalCount" => "0", "estatus"=>"error", "text" => "OCURRIO UN ERROR AL REGISTRAR");
	}
	
	return $respuesta;
}


public function selectNotificaciones_Usuario($Siga_notificacionesDto,$proveedor=null){
	$error=false;
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$campos=[];
	$contador = 0;
	
	if($Siga_notificacionesDto!=""){
		$consulta="select SN.Id_Notificacion,SU.Nombre_Usuario, SN.Mensaje_Largo, SN.Mensaje_Corto, SN.Estatus_Leido, SN.Estatus_Eliminado, SN.Url_Archivho_Enviado, SM.Nom_Menu, CASE";
		$consulta.=" when rtrim(ltrim(SS.Nom_Submenu)) IS NULL then '0'";
		$consulta.=" else SS.Nom_Submenu end as Nom_Submenu, FORMAT(SN.Fecha_Envio,'dd/MM/yyyy hh:mm:ss') as Fecha_Envio from siga_notificaciones SN ";
		$consulta.=" left join siga_usuarios SU on SN.Id_Usuario_Envia=SU.Id_Usuario";
		$consulta.=" left join siga_menu SM ON SN.Id_Menu=SM.Id_Menu and SM.Estatus_Reg<>'3' ";
		$consulta.=" left join siga_submenu SS ON SN.Id_Submenu=SS.Id_Submenu and SS.Estatus_Reg<>'3' ";
		$consulta.=" where SN.Id_Usuario_Recibe='".$Siga_notificacionesDto->getId_Usuario_Recibe()."'";
		$consulta.=" and SN.Id_Aplicacion='".$Siga_notificacionesDto->getId_Aplicacion()."'";
		$consulta.=" and SN.Estatus_Eliminado<>'3'";
		if($Siga_notificacionesDto->getId_Area()!=""){
			$consulta.=" and SN.Id_Area='".$Siga_notificacionesDto->getId_Area()."'";
			$consulta.=" and SN.Estatus_Leido='0'";
			
		}
		$consulta.=" order by SN.Fecha_Envio desc";
		
		$proveedor->execute($consulta);
		if (!$proveedor->error()) {
			if ($proveedor->rows($proveedor->stmt) > 0) {
				
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					//$campos[$contador] = $row[0];
					$campos[$contador] = array(
						"Id_Notificacion" => $row[0], 
						"Nombre_Usuario" => $row[1], 
						//"Mensaje_Largo"=>$row[2], 
						"Mensaje_Corto"=>$row[3], 
						"Estatus_Leido"=>$row[4],
						"Estatus_Eliminado"=>$row[5],
						'Url_Archivho_Enviado'=>$row[6],
						'Nom_Menu'=>$row[7],
						'Nom_Submenu'=>$row[8],
						'Fecha_Envio'=>$row[9],
						);
                    $contador++;
                }
			}
		}else
		{
			$error=true;
		}
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($campos), "data" => $campos,"estatus" => "ok", "mensaje" => "Notificaciones");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "ok", "mensaje" => "Ocurrio un error");
	}
	
	return $respuesta;
}


public function updateSiga_notificaciones($Siga_notificacionesDto,$proveedor=null){
//$Siga_notificacionesDto=$this->validarSiga_notificaciones($Siga_notificacionesDto);
$Siga_notificacionesDao = new Siga_notificacionesDAO();
//$tmpDto = new Siga_notificacionesDTO();
//$tmpDto = $Siga_notificacionesDao->selectSiga_notificaciones($Siga_notificacionesDto,$proveedor);
//if($tmpDto!=""){//$Siga_notificacionesDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_notificacionesDto = $Siga_notificacionesDao->updateSiga_notificaciones($Siga_notificacionesDto,$proveedor);
return $Siga_notificacionesDto;
//}
//return "";
}
public function deleteSiga_notificaciones($Siga_notificacionesDto,$proveedor=null){
//$Siga_notificacionesDto=$this->validarSiga_notificaciones($Siga_notificacionesDto);
$Siga_notificacionesDao = new Siga_notificacionesDAO();
$Siga_notificacionesDto = $Siga_notificacionesDao->deleteSiga_notificaciones($Siga_notificacionesDto,$proveedor);
return $Siga_notificacionesDto;
}
}
?>