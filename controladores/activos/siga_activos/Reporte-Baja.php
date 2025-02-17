<?php
date_default_timezone_set('America/Mexico_City');
ob_start();

//Estilos css
require_once(dirname(__FILE__).'/../../../html2pdf/css.php');
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");

@$Id_Activo=$_GET["Id_Activo"];
@$Nom=$_GET["Nom"];
@$Id_baja=$_GET["Id_baja"];
//Variables Activo 
	$Foto="";
	$AF_BC="";
	$Area="";
	$Marca="";
	$Modelo="";
	$NumSerie="";
	$TipoActivo="";
	$UbicacionPrimaria="";
	$UbicacionSecundaria="";
	$UbicacionEspecifica="";
	$Clasificacion="";
	$Propiedad="";
	$Familia="";
	$Subfamilia="";
	$DescLarga="";
	$Id_ActivoPadre="";
	$NumActivoAnterior="";
	$ParticipaPre="";
	$ParticipaSeguros="";
	$ParticipaCertificacion="";
	$ImporteSeguros="";
	$Garantia="";
	$ExtGarantia="";
	$Estatus="";
	$Desc_Tipo_Vale_Resg="";
	$Jefe_Area="";
	$Usuario_Resp="";
	$Motivo_Alta="";
	$Frecuencia="";
	//Contabilidad
	$No_Capex="";
	$Participa_Depreciacion="";
	$Fecha_Inicio_Depr="";
	
	$Num_Empleado="";
//


	$NumOrdenCompra="";
	$NumFactura="";
	$FechaFactura="";
	$NombreProveedor="";
	$UUID="";
	$MontoF="";
	$MontoFactura="";
	$NumContrato="";
	$Contacto="";
	$Telefono="";
	$Correo="";
	$DocRecibida="";
	$Accesorios="";
	$Consumibles="";
	$VidaUtilFabricante="";
	$VidaUtilCHS="";
	$Url_Contrato="";
	$Url_Factura="";
	$Url_Otro_Doc="";
	$Url_Xml="";

if($Id_Activo!=""){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql="SELECT S.Id_Activo,S.Especifica,S.Foto,S.AF_BC,S.Num_Empleado,S.Nombre_Completo as Usuario_Resp,S.Garantia,S.ExtGarantia,S.ParticipaPre,S.ParticipaSeguros, S.ImporteSeguros, S.ParticipaCertificacion,S.Id_ActivoPadre,S.NumActivoAnterior,S.DescLarga,S.Foto,S.Nombre_Activo,S.Marca, S.Modelo, S.NumSerie,(select Nom_Area from siga_catareas A where A.id_Area=S.Id_Area) as Area,";
	$sql.=" S.siga_activos_fch_recepcion_equipo, S.siga_activos_fch_operacion,";
	$sql.=" (SELECT siga_condicion_de_recepcion_descripcion FROM siga_cat_condicion_de_recepcion X WHERE siga_condicion_de_recepcion_id=S.siga_activos_condicion_recepcion) as condicionEquipo,";
	$sql.=" (select Desc_Clasificacion from siga_cat_clasificacion C where C.Id_Clasificacion=S.Id_Clasificacion) as Clasificacion,";
	$sql.=" (select Desc_Tipo_Vale_Resg from siga_cat_tipo_vale_resg TV where TV.Id_Tipo_Vale_Resg=S.Id_Tipo_Vale_Resg) as Tipo_Vale,";
	$sql.=" (select Des_Departamento from siga_cat_departamento D where D.Id_Departamento=S.Id_Departamento) as Departamento,";
	$sql.=" (select Desc_Propiedad from siga_cat_propiedad C where C.Id_Propiedad=S.Id_Propiedad) as Propiedad,";
	$sql.=" (select Desc_Tipo_Activo from siga_cat_tipo_activo T where T.Id_Tipo_Activo=S.Id_Tipo_Activo) as TipoActivo,DescCorta,";
	$sql.=" (select Desc_Ubic_Prim from siga_cat_ubic_prim T where T.Id_Ubic_Prim=S.Id_Ubic_Prim) as UbicacionPrimaria,";
	$sql.=" (select Desc_Ubic_Sec from siga_cat_ubic_sec T where T.Id_Ubic_Sec=S.Id_Ubic_Sec) as UbicacionSecundaria,";
	$sql.=" (select Desc_Familia from siga_cat_familia T where T.Id_Familia=S.Id_Familia) as Familia,";
	$sql.=" (select Desc_Subfamilia from siga_cat_subfamilia T where T.Id_Subfamilia=S.Id_Subfamilia) as Subfamilia,";
	$sql.=" (select Desc_Estatus from siga_cat_estatus T where T.Id_Estatus=S.Id_Situacion_Activo) as Estatus,";
	$sql.="	(select Desc_Tipo_Vale_Resg from siga_cat_tipo_vale_resg T where T.Id_Tipo_Vale_Resg=S.Id_Tipo_Vale_Resg) as Tipo_Vale_Res,";
	$sql.=" (select Nombre from siga_jefe_area T where T.Id_Area=S.Id_Area) as Jefe_Area,S.Fech_Inser,";
	$sql.=" (select Nombre_Usuario from siga_usuarios T where T.Id_Usuario=S.Usr_Inser) as Nombre_Usuario,";
	$sql.=" (select No_Usuario from siga_usuarios T where T.Id_Usuario=S.Usr_Inser) as No_Usuario,";
	$sql.="	SC.No_Capex, SC.Participa_Depreciacion, SC.Fecha_Inicio_Depr, SC.Centro_Costos";
	$sql.=" FROM siga_activos S  LEFT JOIN siga_activos_contabilidad SC ON S.Id_Activo=SC.Id_Activo WHERE 0=0 AND S.Estatus_Reg<>'3' AND S.Id_Activo='".$Id_Activo."'";
	
	$proveedor->execute($sql);
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Foto=$row["Foto"];
				$AF_BC=$row["AF_BC"];
				$Marca=$row["Marca"];
				$Modelo=$row["Modelo"];
				$NumSerie=$row["NumSerie"];
				$TipoActivo=$row["TipoActivo"];
				$Clasificacion=$row["Clasificacion"];
				$UbicacionPrimaria=$row["UbicacionPrimaria"];
				$UbicacionSecundaria=$row["UbicacionSecundaria"];
				$UbicacionEspecifica=$row["Especifica"];
				$Area=$row["Area"];
				$Propiedad=$row["Propiedad"];
				$Familia=$row["Familia"];
				$Subfamilia=$row["Subfamilia"];
				$DescLarga=$row["DescLarga"];
				$Id_ActivoPadre=$row["Id_ActivoPadre"];
				$NumActivoAnterior=$row["NumActivoAnterior"];
				$Num_Empleado=$row["Num_Empleado"];
				if(rtrim(ltrim($row["ParticipaPre"]))=="1"){
					$ParticipaPre="Si";
				}else{
					if(rtrim(ltrim($row["ParticipaPre"]))=="2"){
						$ParticipaPre="No";
					}	
				}
				if(rtrim(ltrim($row["ParticipaSeguros"]))=="1"){
					$ParticipaSeguros="Si";
				}else{
					if(rtrim(ltrim($row["ParticipaSeguros"]))=="2"){
						$ParticipaSeguros="No";
					}	
				}
				if(rtrim(ltrim($row["ParticipaCertificacion"]))=="1"){
					$ParticipaCertificacion="Si";
				}else{
					if(rtrim(ltrim($row["ParticipaCertificacion"]))=="2"){
						$ParticipaCertificacion="No";
					}	
				}
				$ImporteSeguros=$row["ImporteSeguros"];
				$Garantia=$row["Garantia"];
				$ExtGarantia=$row["ExtGarantia"];
				$Estatus=$row["Estatus"];
				$Desc_Tipo_Vale_Resg=$row["Tipo_Vale_Res"];
				$Jefe_Area=$row["Jefe_Area"];
				$Usuario_Resp=$row["Usuario_Resp"];
				$Fech_Inser=$row["Fech_Inser"];
				$Nombre_Activo=$row["Nombre_Activo"];
				
				//Contabilidad
				$No_Capex=$row["No_Capex"];
				$Centro_Costos=$row["Centro_Costos"];
				if(rtrim(ltrim($row["Participa_Depreciacion"]))=="1"){
					$Participa_Depreciacion="Si";
				}else{
					if(rtrim(ltrim($row["Participa_Depreciacion"]))=="2"){
						$Participa_Depreciacion="No";
					}	
				}
				
				$Fecha_Inicio_Depr=$row["Fecha_Inicio_Depr"];
				
				$Fech_Inser=$row["Fech_Inser"];
				$Usr_Inser =$row["No_Usuario"];
				$Nombre_Usuario =$row["Nombre_Usuario"];

				$siga_activos_fch_recepcion_equipo 	= $row["siga_activos_fch_recepcion_equipo"];
				$siga_activos_fch_operacion 				=	$row["siga_activos_fch_operacion"];
				$condicionEquipo 										= $row["condicionEquipo"];

			}
		}
	}else{
		$error=true;
	}
	
	$proveedor->close();	
	

   	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$sql="select S.* from siga_activo_proveedor S where S.Id_Activo=".$Id_Activo."";
	
	$proveedor->execute($sql);
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$NumOrdenCompra=$row["NumOrdenCompra"];
				$NumFactura=$row["NumFactura"];
				$FechaFactura=$row["FechaFactura"];
				$NombreProveedor=$row["NombreProveedor"];
				$UUID=$row["UUID"];
				$MontoF=$row["Monto_F"];
				$MontoFactura=$row["MontoFactura"];
				$NumContrato=$row["NumContrato"];
				$Contacto=$row["Contacto"];
				$Telefono=$row["Telefono"];
				$Correo=$row["Correo"];
				$DocRecibida=$row["DocRecibida"];
				$Accesorios=$row["Accesorios"];
				$Consumibles=$row["Consumibles"];
				$VidaUtilFabricante=$row["VidaUtilFabricante"];
				$VidaUtilCHS=$row["VidaUtilCHS"];
				$Url_Contrato=$row["Url_Contrato"];
				$Url_Factura=$row["Url_Factura"];
				$Url_Otro_Doc=$row["Url_Otro_Doc"];
				$Url_Xml=$row["Url_Xml"];
			}
		}
	}
	$proveedor->close();
	
	
}else{
	$error=true;
}
////////////////////////////////////////////////////////////////////////////////////////////////
if($Id_baja==""&&$Id_Activo!=""){
	$proveedor_busc_id_baj = new Proveedor('sqlserver', 'activos');
	$proveedor_busc_id_baj->connect();
	$sql="select top 1 Id_baja from siga_baja_activo where Id_Activo=".$Id_Activo." and Estatus_Cancelacion<>1 order by Fecha_Baja desc";
	
	$proveedor_busc_id_baj->execute($sql);
	if (!$proveedor_busc_id_baj->error()){
		if ($proveedor_busc_id_baj->rows($proveedor_busc_id_baj->stmt) > 0) {
			while ($row = $proveedor_busc_id_baj->fetch_array($proveedor_busc_id_baj->stmt, 0)) {
				$Id_baja=$row["Id_baja"];
			}
		}
	}
	$proveedor_busc_id_baj->close();
}

$Baja_Motivo_Baja="";
$Baja_Destino="";
$Baja_Fecha_Baja="";
$Baja_Comentarios="";



if($Id_baja != ""){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$sql="SELECT S.Motivo_Baja, S.Destino, S.Fecha_Baja, S.Comentarios,A.Desc_Motivo_baja,B.Desc_Destino_final FROM siga_baja_activo S, siga_cast_motivo_baja A, siga_cast_destino_final B 
	WHERE S.Motivo_Baja=A.Id_Motivo_baja AND S.Destino=B.Id_Destino_final AND S.Estatus_Cancelacion<>1 AND S.Id_baja=".$Id_baja."";
	
	$proveedor->execute($sql);
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Baja_Motivo_Baja=$row["Desc_Motivo_baja"];
				$Baja_Destino=$row["Desc_Destino_final"];
				$Baja_Fecha_Baja=$row["Fecha_Baja"];
				$Baja_Comentarios=$row["Comentarios"];
				$Folio=$Id_baja;
			}
		}
	}
	$proveedor->close();
	
	
	// Detalle del Workflow
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$sql = "SELECT B.*, A.Nombre_Usuario FROM siga_workflow_activo B,siga_usuarios A WHERE A.Id_Usuario=B.Id_Usuario AND B.Id_Activo=".$Id_Activo." AND B.Aceptado=1 AND Id_baja=".$Id_baja." ORDER BY CveWorkflow";
	$Firma = array();
	$FechaAceptado = array();
	$WorkFlowDetalleBaja = array();
	$proveedor->execute($sql);
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Firma[] = $row["Nombre_Usuario"];
				$FechaAceptado[] = $row["FechaAceptado"];

				if($row["ComentarioBaja"] != null) {
					// Objeto generico para el manejo de comentarios
					$myObj = new stdClass();
					$myObj->CveWorkflow = $row["CveWorkflow"];
					$myObj->Nombre_Usuario = $row["Nombre_Usuario"];
					$myObj->CorreoElectronico = $row["Correo"];
					$myObj->FechaAceptado = $row["FechaAceptado"];
					$myObj->ComentarioBaja = $row["ComentarioBaja"];
					array_push($WorkFlowDetalleBaja, $myObj);
				}
			}
		}
	}
	$proveedor->close();
}


	// Genera un icono para determinar el tipo de archivo
	function obtenerIconoArchivo($nombreArchivo) {
		// Determina la extensión del archivo
		$ext = obtenerExtensionArchivo($nombreArchivo);
		// Devuelve el icono del formarto del archivo
		switch ($ext) {
			case 'doc': return '<i class="fa fa-file-word-o text-primary"></i>'; break;
			case 'xls': return '<i class="fa fa-file-excel-o text-success"></i>'; break;
			case 'ppt': return '<i class="fa fa-file-powerpoint-o text-danger"></i>'; break;
			case 'pdf': return '<i class="fa fa-file-pdf-o text-danger"></i>'; break;
			case 'zip': return '<i class="fa fa-file-archive-o text-muted"></i>'; break;
			case 'htm': return '<i class="fa fa-file-code-o text-info"></i>'; break;
			case 'txt': return '<i class="fa fa-file-text-o text-info"></i>'; break;
			case 'mov': return '<i class="fa fa-file-movie-o text-warning"></i>'; break;
			case 'mp3': return '<i class="fa fa-file-audio-o text-warning"></i>'; break;
			// note for these file types below no extension determination logic 
			// has been configured (the keys itself will be used as extensions)
			case 'jpg': return '<i class="fa fa-file-photo-o text-light"></i>'; break;
			case 'heic': return '<i class="fa fa-file-photo-o text-primary"></i>'; break;
			case 'HEIC': return '<i class="fa fa-file-photo-o text-danger"></i>'; break;
			default: return '<i class="fa fa-file-code-o text-danger"></i>'; break;
		}
	}
	
	// Obtiene la extensión del archivo
	function obtenerExtensionArchivo($nombreArchivo) {
		// Determina la extensión del archivo
		$splitNombre = explode(".", $nombreArchivo);
		$ext = strtolower(end($splitNombre));

		// Agrupar algunos tipos de archivo
		if(preg_match('/(doc|docx)/i', $ext) > 0) { $ext = 'doc'; }
		if(preg_match('/(xls|xlsx)/i', $ext) > 0) { $ext = 'xls'; }
		if(preg_match('/(ppt|pptx)/i', $ext) > 0) { $ext = 'ppt'; }
		if(preg_match('/(zip|rar|tar|gzip|gz|7z)/i', $ext) > 0) { $ext = 'zip'; }
		if(preg_match('/(htm|html)/i', $ext) > 0) { $ext = 'htm'; }
		if(preg_match('/(txt|ini|csv|java|php|js|css)/i', $ext) > 0) { $ext = 'txt'; }
		if(preg_match('/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)/i', $ext) > 0) {$ext = 'mov'; }
		if(preg_match('/(mp3|wav)/i', $ext) > 0) { $ext = 'mp3'; }
		if(preg_match('/(png|jpg|jpge|bmp|gif)/i', $ext) > 0) { $ext = 'jpg'; }

		return $ext;
	}

?>

<page backtop="35mm" backbottom="5mm" backleft="1mm" backright="1mm" orientation="portrait">
	<page_header>
		<table id="tbl" style="width: 100%;">
			<tr id="tr">
				<td class="td" style="width: 33.3%;"><div class="fotochs"><img src="logo.png"  class="logos" style="width:105%"></div></td>
				<td class="td" style="width: 33.3%;" align="center"><h3>Formato<br/>De Baja</h3></td>
				<td class="td" style="width: 33.3%;" align="right"><div align="right" class="foto"><img src="..\..\..\dist\img\LOGO-SIGA.PNG" style="width:110%"></div></td>
			</tr>
		</table>
	</page_header>
	<page_footer footer='page'> <!-- Define el footer de la hoja -->
		<table id="footer">
            <tr class="fila">
				<td>
					<span><strong>Fecha y hora de impresi&oacute;n <?php echo date("d/m/Y H:i:s");?></strong></span>
				</td>
				<td>
					<div><strong>P&aacute;gina [[page_cu]] de [[page_nb]]</strong></div>
				</td>
			</tr>
        </table>
    </page_footer>
		
  <!-- /.login-logo -->
  
	
	
	<div  id="pdf_1"> 
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
				<td colspan="6" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;"><strong>DATOS GENERALES</strong></td>
				</tr>
			</thead>
			<tbody class="tbody">
			
			
			   <tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Folio:</td>
					<td class="td" style="width: 20%;"><?php echo $Folio; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Nombre del Activo:</td>
					<td class="td" style="width: 20%;"><?php echo $Nombre_Activo; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Fecha de Alta:</td>
					<td class="td" style="width: 20%;"><?php if ($Fech_Inser !="") echo date("d/m/Y H:i:s",strtotime($Fech_Inser)); ?></td>
				</tr>
			
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">AF/BC:</td>
					<td class="td" style="width: 20%;"><?php echo $AF_BC; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Ubicaci&oacute;n Primaria:</td>
					<td class="td" style="width: 20%;"><?php echo $UbicacionPrimaria; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Ubicaci&oacute;n Secundaria:</td>
					<td class="td" style="width: 20%;"><?php echo $UbicacionSecundaria; ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Estatus:</td>
					<td class="td" style="width: 20%;"><?php echo $Estatus;?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Descripci&oacute;n Larga:</td>
					<td class="td" style="width: 20%;"><?php echo $DescLarga;?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Ubicaci&oacute;n Especifica:</td>
					<td class="td" style="width: 20%;"><?php echo $UbicacionEspecifica;?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Clasificaci&oacute;n:</td>
					<td class="td" style="width: 20%;"><?php echo $Clasificacion; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Propiedad:</td>
					<td class="td" style="width: 20%;"><?php echo $Propiedad; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">&Aacute;rea Gestora:</td>
					<td class="td" style="width: 20%;"><?php echo $Area;?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Familia:</td>
					<td class="td" style="width: 20%;"><?php echo $Familia; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Subfamilia:</td>
					<td class="td" style="width: 20%;"><?php echo $Subfamilia; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Jefe de &Aacute;rea Gestora:</td>
					<td class="td" style="width: 20%;"><?php echo $Jefe_Area;?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Modelo:</td>
					<td class="td" style="width: 20%;"><?php echo $Modelo; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">No. de Serie:</td>
					<td class="td" style="width: 20%;"><?php echo $NumSerie; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Marca:</td>
					<td class="td" style="width: 20%;"><?php echo $Marca; ?></td>					
				</tr>

				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Condición Del Equipo:</td>
					<td class="td" style="width: 20%;"><?php echo $siga_activos_fch_recepcion_equipo; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Fch Recepción:</td>
					<td class="td" style="width: 20%;"><?php echo $siga_activos_fch_operacion; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Fch Operación:</td>
					<td class="td" style="width: 20%;"><?php echo $condicionEquipo; ?></td>					
				</tr>
				
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Tipo de Activo:</td>
					<td class="td" style="width: 20%;"><?php echo $TipoActivo; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Activo Padre:</td>
					<td class="td" style="width: 20%;"><?php echo $Id_ActivoPadre; ?></td>
					<td class="td" colspan="2" rowspan="5" align="center" style="vertical-align: middle;">
						<div class="foto">
							<?php
								if($Foto != null) {
									if($Foto!="") {
										$Fot=explode("---", $Foto);
										?><img src="..\..\..\Archivos\Archivos-Activos\<?php echo $Fot[0]; ?>" style="height: 120px;"><?php
									}
								}
								else {
									?><img src="../../../dist/img/no-camera.png" style="width: 80%;"><?php
								}
							?>
						</div>
					</td>
				</tr>
				
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">No. Activo Anterior:</td>
					<td class="td" style="width: 20%;"><?php echo $NumActivoAnterior; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Participa en PRE:</td>
					<td class="td" style="width: 20%;"><?php echo $ParticipaPre; ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Participa en Seguros:</td>
					<td class="td" style="width: 20%;"><?php echo $ParticipaSeguros; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Importe de Seguros:</td>
					<td class="td" style="width: 20%;"><?php echo $ImporteSeguros; ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Participa en Certificaci&oacute;n:</td>
					<td class="td" style="width: 20%;"><?php echo $ParticipaCertificacion; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Garant&iacute;a:</td>
					<td class="td" style="width: 20%;"><?php echo $Garantia; ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Extensi&oacute;n Garant&iacute;a:</td>
					<td class="td" style="width: 20%;"><?php echo $ExtGarantia; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Tipo Vale Resguardo:</td>
					<td class="td" style="width: 20%;"><?php echo $Desc_Tipo_Vale_Resg;?></td>
				</tr>
				<?php if($Url_Contrato!="" || $Url_Factura!="" || $Url_Otro_Doc!="" || $Url_Xml!=""){?>
				<tr id="tr">
					<td class="td" colspan="6" style="<?php echo $style_td;?>">* Existen Archivos Adjuntos en Datos del Proveedor</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
		
		<br>
				
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
				<td colspan="6" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;"><strong>DATOS PROVEEDOR</strong></td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">No. Orden de Compra: </td>
					<td class="td" style="width: 20%;"><?php echo $NumOrdenCompra?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">No. Factura: </td>
					<td class="td" style="width: 20%;"><?php echo $NumFactura?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Fecha Factura: </td>
					<td class="td" style="width: 20%;"><?php if ($FechaFactura !="") echo date("d/m/Y H:i:s",strtotime($FechaFactura)); ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Monto Factura: </td>
					<td class="td" style="width: 20%;"><?php echo $MontoF; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Monto del Activo sin IVA: </td>
					<td class="td" style="width: 20%;"><?php echo $MontoFactura?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">No. Contrato: </td>
					<td class="td" style="width: 20%;"><?php echo $NumContrato?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Vida Util Fabricante: </td>
					<td class="td" style="width: 20%;"><?php echo $VidaUtilFabricante?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Vida Util CHS: </td>
					<td class="td" style="width: 20%;"><?php echo $VidaUtilCHS?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Nombre Proveedor: </td>
					<td class="td" style="width: 20%;"><?php echo $NombreProveedor?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Contacto: </td>
					<td class="td" style="width: 20%;"><?php echo $Contacto?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Tel&eacute;fono: </td>
					<td class="td" style="width: 20%;"><?php echo $Telefono?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Correo: </td>
					<td class="td" style="width: 20%;"><?php echo $Correo?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Doc. Recibida: </td>
					<td class="td" style="width: 20%;"><?php echo $DocRecibida?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Accesorios: </td>
					<td class="td" style="width: 20%;"><?php echo $Accesorios?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Consumibles: </td>
					<td class="td" style="width: 20%;"><?php echo $Consumibles?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">UUID/Folio Fiscal:</td>
					<td class="td" colspan="5"><?php echo $UUID?></td>
				</tr>
			</tbody>
		</table>
		<br>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
				<td colspan="8" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;"><strong>DATOS CONTABLES</strong></td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 10%;<?php echo $style_td;?>">No Capex:</td>
					<td class="td" style="width: 15%;"><?php echo $No_Capex;?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Participa en Depreciación:</td>
					<td class="td" style="width: 15%;"><?php echo $Participa_Depreciacion;?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Fecha Inicio Depreciación:</td>
					<td class="td" style="width: 15%;"><?php echo $Fecha_Inicio_Depr; ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Centro de Costos:</td>
					<td class="td" style="width: 15%;"><?php echo $Centro_Costos; ?></td>
				</tr>
			</tbody>
		</table>
		<br>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
				<td colspan="4" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;"><strong>DATOS USUARIOS</strong></td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 25%;<?php echo $style_td;?>">No. Empleado Resguardo:</td>
					<td class="td" style="width: 25%;"><?php echo $Num_Empleado;?></td>
					<td class="td" style="width: 25%;<?php echo $style_td;?>">Nombre Empleado Resguardo:</td>
					<td class="td" style="width: 25%;"><?php echo $Usuario_Resp;?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 25%;<?php echo $style_td;?>">No. Usuario Solicitante de Alta: </td>
					<td class="td" style="width: 25%;"><?php echo $Usr_Inser ?></td>
					<td class="td" style="width: 25%;<?php echo $style_td;?>">Nombre Usuario Solicitante de Alta: </td>
					<td class="td" style="width: 25%;"><?php echo $Nombre_Usuario ?></td>
				</tr>
			</tbody>
		</table>
		<br>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
				<td colspan="4" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;"><strong>DATOS BAJA EQUIPO</strong></td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 25%;<?php echo $style_td;?>">Motivo Baja:</td>
					<td class="td" style="width: 25%;"><?php echo $Baja_Motivo_Baja;?></td>
					<td class="td" style="width: 25%;<?php echo $style_td;?>">Destino Final:</td>
					<td class="td" style="width: 25%;"><?php echo $Baja_Destino;?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 25%;<?php echo $style_td;?>">Fecha Baja:</td>
					<td class="td" style="width: 25%;"><?php echo $Baja_Fecha_Baja;?></td>
					<td class="td" style="width: 25%;<?php echo $style_td;?>">Usuario Responsable:</td>
					<td class="td" style="width: 25%;"><?php echo $Usuario_Resp;?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 25%;<?php echo $style_td;?>">Comentarios:</td>
					<td class="td" colspan="3" style="width: 75%;"><?php echo $Baja_Comentarios;?></td>
				</tr>
			</tbody>
		</table>
		<br>
		<?php if($Foto!=null){
		      if($Foto!=""){	
					$Mas_Fotos=explode("---", $Foto);
		      if(count($Mas_Fotos)>0){
		?>
		
		<nobreak>
			<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
				<thead class="thead">
					<tr id="tr">
						<td colspan="3" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;"><strong>Más Fotos Activos</strong></td>
					</tr>
				</thead>
				<tbody class="tbody">
					<?php
						$contador=0;
						for($i=1;$i<count($Mas_Fotos);$i++){
							$contador=$contador+1;
							
							if($contador==1){
								echo '<tr id="tr">';
							}
					?>				
								<td class="td" style="width: 33.33%;">
									<div class="foto">
										<img src="..\..\..\Archivos\Archivos-Activos\<?php echo $Mas_Fotos[$i]; ?>" style=" width:100%">
									</div>
								</td>
					<?php 
							if($contador==3||((count($Mas_Fotos)-1)==$i)){
								echo '</tr>';	
								$contador=0;	
							}
							
							
						}
					?>
				</tbody>
			</table>
		</nobreak>
		<?php }}}?>

		<br>
		<!--nobreak-->
			<!-- ==== Lista de archivos ligados previamente ==== -->
			<?php
				// Referencia al modelo sin usar el controlador
				echo "<!--";
				require_once(dirname(__FILE__)."../../../../modelos/simple_mvc/ActivoBajaArchivosModel.Class.php");
				echo "-->";

				// Crea el método que será el encargado de realizar la inserción
				$listaArchivos = new ActivoBajaArchivosModel();
				// Recupera la información
				$listaArchivos->Id_Activo = $Id_Activo;
				// Retorna el array con la respuesta de la ejecución
				$listaResultados = $listaArchivos->ActivoBajaArchivosGet($listaArchivos);
				if(count($listaResultados) > 0) {
					$listaFotosAdjuntas = [];
					$listaArchivosAdjuntos = [];
					$cuentaArchivosAdjuntos = 1;
					for($i = 0; $i < count($listaResultados); $i++) {
						if(obtenerExtensionArchivo($listaResultados[$i]->Url_Adjunto) == "jpg") {
							array_push($listaFotosAdjuntas, $listaResultados[$i]->Url_Adjunto);
						}
						else {
							array_push($listaArchivosAdjuntos, $listaResultados[$i]->Url_Adjunto);
						}
					}
					
					// Escribe los links a los archivos agregados
					if(count($listaArchivosAdjuntos) > 0) { ?>
						<br>
						<div>
							<table id="tbl" style="width: 100%;" cellpadding="10" cellspacing="0" border>
								<thead class="thead">
									<tr id="tr">
										<td class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">
											<strong>ARCHIVOS AGREGADOS</strong>
										</td>
									</tr>
								</thead>
								<tbody class="tbody">
									<?php
										for($i = 0; $i < count($listaArchivosAdjuntos); $i++) {
											?>
												<tr id="tr">
													<td class="td">
														<a href="../../../Archivos/Archivos-Activos-Bajas/<?php echo $_GET["Id_Activo"] . "/" . $listaArchivosAdjuntos[$i] ?>" target="_blank" style="font-size: 12px; color: #19294a;">
															<?php echo ($i + 1) . "&gt; " . $listaArchivosAdjuntos[$i]; ?>
														</a>
													</td>
												</tr>
											<?php
										}
									?>
								</tbody>
							</table>
						</div><?php
					}

					// Escribe las imagenes agregadas
					if(count($listaFotosAdjuntas) > 0) { ?>
						<br>
						<table id="tbl" style="width: 100%;" cellpadding="10" cellspacing="0" border>
							<thead class="thead">
								<tr id="tr">
									<td class="td" <?php if(count($listaFotosAdjuntas) > 1) { echo 'colspan="2"'; } ?> style="width: 100%; border-top: 0px solid #ddd; line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">
										<strong>IMAGENES AGREGADAS</strong>
									</td>
								</tr>
							</thead>
							<tbody class="tbody">
								<?php
									$numImagenActual = 0;
									for($i = 0; $i < count($listaFotosAdjuntas); $i++) {
										if($numImagenActual % 2 == 0 ) { echo '<tr id="tr">'; }
										?><td class="td" style="<?php if(count($listaFotosAdjuntas) > 1) { echo 'width: 50%;'; } ?> text-align: center; vertical-align: middle;">
											<img src="..\..\..\Archivos\Archivos-Activos-Bajas\<?php echo $_GET["Id_Activo"] ?>\<?php echo $listaFotosAdjuntas[$i]; ?>" style="height: 150px;" />
										</td><?php
										$numImagenActual++;
										if($i == (count($listaFotosAdjuntas) - 1) || $numImagenActual % 2 == 0 ) {
											// Agrega la celda faltante en caso de que sean imagenes impares
											if ($numImagenActual % 2 != 0 && count($listaFotosAdjuntas) > 1) { echo "<td class='td' style='width: 50%; text-align: center; vertical-align: middle;'>&nbsp;</td>"; }
											echo "</tr>";
										}
									}
								?>
							</tbody>
						</table><?php
					}
				}
			?>
		<!--/nobreak-->

		<?php if (count($WorkFlowDetalleBaja) > 0) { ?>
			<nobreak>
				<table id="tbl" style="width: 100%;" cellpadding="10" cellspacing="0" border>
					<thead class="thead">
						<tr id="tr">
							<td class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">
								<strong>COMENTARIOS HECHOS DURANTE EL PROCESO DE BAJA</strong>
							</td>
						</tr>
					</thead>
					<tbody class="tbody">
						<?php
							for($i = 0; $i < count($WorkFlowDetalleBaja); $i++) { ?>
								<tr id="tr">
									<td class="td" style="text-align: justify;">
										<p style="margin: 0px; padding-bottom: 3px;"><b>Paso <?php echo $WorkFlowDetalleBaja[$i]->CveWorkflow; ?>:</b> <?php echo $WorkFlowDetalleBaja[$i]->Nombre_Usuario; ?> (<?php echo $WorkFlowDetalleBaja[$i]->CorreoElectronico; ?>):</p>
										<p style="margin: 0px; padding-bottom: 3px;"><?php echo $WorkFlowDetalleBaja[$i]->ComentarioBaja; ?></p>
										<p style="margin: 0px; text-align: right;"><i>Fecha: <?php echo $WorkFlowDetalleBaja[$i]->FechaAceptado; ?></i></p>
									</td>
								</tr><?php
							}
						?>
					</tbody>
				</table><br>
			</nobreak>
		<?php } ?>


		<br>
		<nobreak>
			<table id="tbl" border cellpadding="10"  cellspacing="0">
				<thead class="thead">
					<tr id="tr">
						<td colspan="2" class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px"><STRONG>NOMBRE Y FIRMA RESPONSABLES</STRONG></td>
					</tr>
				</thead>
				<tbody class="tbody">
					<tr id="tr">
						<td class="td" style="width: 50%;">USUARIO SOLICITANTE BAJA</td>
						<td class="td" style="width: 50%;">USUARIO RESGUARDO/RESPONSABLE ACTIVO</td>
					</tr>
					<tr id="tr">
						<td class="td sign" style="width: 50%;">Firma	<br><br><?php if ($Firma[0] != "") echo " FIRMADO DIGITALMENTE POR: <br>".$Firma[0]."<br>Fecha: ". Date("d/m/Y h:m:s",strtotime($FechaAceptado[0])) ?></td>
						<td class="td sign" style="width: 50%;">Firma	<br><br><?php if ($Firma[1] != "") echo " FIRMADO DIGITALMENTE POR: <br>".$Firma[1]."<br>Fecha: ". Date("d/m/Y h:m:s",strtotime($FechaAceptado[1])) ?></td>
					</tr>
					<tr id="tr">
						<td class="td author" align="center" style="width: 50%;"></td>
						<td class="td author" align="center" style="width: 50%;"></td>
					</tr>
				</tbody>
			</table>
			<table id="tbl" border cellpadding="10"  cellspacing="0">
				<thead class="thead">
					<tr id="tr">
						<td colspan="2"  style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px"></td>
					</tr>
				</thead>
				<tbody class="tbody">
					<tr id="tr">
						<td class="td" style="width: 50%;">TITULAR DEL AREA GESTORA</td>
						<td class="td" style="width: 50%;">DIRECCIÓN FINANCIERA</td>
					</tr>
					<tr id="tr">
						<td class="td sign" style="width: 50%;">Firma	<br><br><?php if ($Firma[2] != "") echo " FIRMADO DIGITALMENTE POR: <br>".$Firma[2]."<br>Fecha: ". Date("d/m/Y h:m:s",strtotime($FechaAceptado[2])) ?></td>
						<td class="td sign" style="width: 50%;">Firma	<br><br><?php if ($Firma[3] != "") echo " FIRMADO DIGITALMENTE POR: <br>".$Firma[3]."<br>Fecha: ". Date("d/m/Y h:m:s",strtotime($FechaAceptado[3])) ?></td>
					</tr>
					<tr id="tr">
						<td class="td author" align="center" style="width: 50%;"></td>
						<td class="td author" align="center" style="width: 50%;"></td>
					</tr>
				</tbody>
			</table>
			<table id="tbl" border cellpadding="10"  cellspacing="0">
				<thead class="thead">
					<tr id="tr">
						<td colspan="2"  style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px"></td>
					</tr>
				</thead>
				<tbody class="tbody">
					<tr id="tr">
						<td class="td" style="width: 50%;">CONTABILIDAD</td>
						<td class="td" style="width: 50%;"></td>
					</tr>
					<tr id="tr">
						<td class="td sign" style="width: 50%;">Firma	<br><br><?php if ($Firma[4] != "") echo " FIRMADO DIGITALMENTE POR: <br>".$Firma[4]."<br>Fecha: ". Date("d/m/Y h:m:s",strtotime($FechaAceptado[4])) ?></td>
						<td class="td sign" style="width: 50%;"></td>
					</tr>
					<tr id="tr">
						<td class="td author" align="center" style="width: 50%;"></td>
						<td class="td author" align="center" style="width: 50%;"></td>
					</tr>
				</tbody>
			</table>
		</nobreak>
	</div>
	
	

	<br>
  <!-- /.login-box-body -->
</page> 

  
<?php


if($Modelo==""){
$Modelo="sin modelo";
}


$Tipo_Archivo="C";//Muestra el archivo en el navegador
if($Nom=="1"){
	$Tipo_Archivo="D";//Descarga el archivo
}else{
}

$Nombre_Archivo=$AF_BC." Baja ".$Nombre_Activo." ".$Modelo." ".$Folio;

$Nombre_Archivo=str_replace("á", "a", $Nombre_Archivo);
$Nombre_Archivo=str_replace("Á", "A", $Nombre_Archivo);
$Nombre_Archivo=str_replace("é", "e", $Nombre_Archivo);
$Nombre_Archivo=str_replace("É", "E", $Nombre_Archivo);
$Nombre_Archivo=str_replace("í", "i", $Nombre_Archivo);
$Nombre_Archivo=str_replace("Í", "I", $Nombre_Archivo);
$Nombre_Archivo=str_replace("ó", "o", $Nombre_Archivo);
$Nombre_Archivo=str_replace("Ó", "O", $Nombre_Archivo);
$Nombre_Archivo=str_replace("ú", "u", $Nombre_Archivo);
$Nombre_Archivo=str_replace("Ú", "U", $Nombre_Archivo);
$Nombre_Archivo=str_replace("ñ", "n", $Nombre_Archivo);
$Nombre_Archivo=str_replace("Ñ", "N", $Nombre_Archivo);

//}	
    //En una variable llamada $content se obtiene lo que tenga la ruta especificada
    //NOTA: Se usa ob_get_clean porque trae SOLO el contenido
    //Evitará este error tan común en FPDF:
    //FPDF error: Some data has already been output, can't send PDF
    
	//Eliminamos los archivos del directorio
	//eliminarDir("archivospdf");
	$content = ob_get_clean();
    //Se obtiene la librería
    require_once(dirname(__FILE__).'/../../../html2pdf/html2pdf.class.php');
    /* Las lineas siguientes siempre serán las mismas
     * A mi parecer no hay mucho que explicar. Se explican
     * por sí solas :D
     * */
    try
    {
		
        $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3); //Configura la hoja
        $html2pdf->pdf->SetDisplayMode('fullpage'); //Ver otros parámetros para SetDisplaMode
        $html2pdf->writeHTML($content); //Se escribe el contenido 
		//$filename = "archivospdf/".(string)time() . ".pdf";
        $html2pdf->Output("".$Nombre_Archivo.".pdf", $Tipo_Archivo);
		// return the filename to ajax request
		//echo $filename;
	}
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>