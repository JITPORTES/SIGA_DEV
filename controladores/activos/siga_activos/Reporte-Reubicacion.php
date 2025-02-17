<?php



date_default_timezone_set('America/Mexico_City');
ob_start();
//Estilos css
require_once(dirname(__FILE__).'/../../../html2pdf/css.php');
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
@$Id_Activo=$_GET["Id_Activo"];
@$Id_Activo_Reubicacion=$_GET["Id_Activo_Reubicacion"];
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
//


	$NumOrdenCompra="";
	$NumFactura="";
	$FechaFactura="";
	$NombreProveedor="";
	$UUID="";
	$Monto_F="";
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
	
	$Desc_Ubi_Prim_Historico="";
	$Desc_Ubi_Sec_Historico="";
	$Ubic_Especifica_Historico="";
	$Desc_Area_Historico="";
	$Responsable_Activo_Procedencia="";
	
	
if($Id_Activo!=""){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql="SELECT S.Id_Activo,S.Especifica,S.Foto,S.AF_BC,S.Nombre_Completo as Usuario_Resp,S.Garantia,S.ExtGarantia,S.ParticipaPre,S.ParticipaSeguros, S.ImporteSeguros, S.ParticipaCertificacion,S.Id_ActivoPadre,S.NumActivoAnterior,S.DescLarga,S.Foto,S.Nombre_Activo,S.Marca, S.Modelo, S.NumSerie,(select Nom_Area from siga_catareas A where A.id_Area=S.Id_Area) as Area,";
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
	$sql.=" (select Desc_Motivo_Alta from siga_cat_motivo_alta M where S.Id_Motivo_Alta=M.Id_Motivo_Alta) as Motivo_Alta,";
	$sql.=" (select SCF.Desc_Frecuencia from siga_actividades SA
			left join siga_cat_frecuencia SCF on SA.Id_Frecuencia=SCF.Id_Frecuencia
			where Id_Actividad=(select max(Id_Actividad) as Id_Actividad from siga_actividades where Id_Activo='".$Id_Activo."' and Tipo_Actividad='2' and Estatus_Reg<>'3')
			) as Frecuencia,
		  ";
	$sql.="	(select Desc_Tipo_Vale_Resg from siga_cat_tipo_vale_resg T where T.Id_Tipo_Vale_Resg=S.Id_Tipo_Vale_Resg) as Tipo_Vale_Res,";
	$sql.=" (select Nombre from siga_jefe_area T where T.Id_Area=S.Id_Area) as Jefe_Area,S.Fech_Inser";
	$sql.=" FROM siga_activos S     where 0=0  and S.Estatus_Reg<>'3' and Id_Activo='".$Id_Activo."'";
	
	
	
	$proveedor->execute($sql);
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Foto=$row["Foto"];
				$AF_BC=$row["AF_BC"];
				$Marca=$row["Marca"];
				$Modelo=$row["Modelo"];
				$NumSerie=$row["NumSerie"];
				$Motivo_Alta=$row["Motivo_Alta"];
				$Frecuencia=$row["Frecuencia"];
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
				$Monto_F=$row["Monto_F"];
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
$Reub_Nom_Usuario_Reponsable="";
$Reub_UbicacionPrimaria="";
$Reub_UbicacionSecundaria="";
$Reub_Jefe_Area="";
$Reub_Desc_Centro_Costos="";
$Reub_Centro_Costos="";
$Reub_Motivo_Reubicacion="";
$Reub_Comentarios_Reubicacion="";
$Reub_Fech_Insert="";
$Solicitante="";
if($Id_Activo_Reubicacion!=""){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$sql="select Id_Activo_Reubicacion,Nom_Usuario_Reponsable, 
		(select Desc_Ubic_Prim from siga_cat_ubic_prim T where T.Id_Ubic_Prim=S.Id_Ubic_Prim) as UbicacionPrimaria,
		(select Desc_Ubic_Sec from siga_cat_ubic_sec T where T.Id_Ubic_Sec=S.Id_Ubic_Sec) as UbicacionSecundaria,
		(select Nombre from siga_jefe_area T where T.Id_Area=S.Id_Area) as Jefe_Area, S.Fech_Inser,
		(select Nombre_Usuario from siga_usuarios T where T.Id_Usuario=S.Usr_Inser) as Solicitante,
		(select top 1 Desc_Centro_de_costos from siga_cat_centro_de_costos CC where CC.Id_Centros_de_costos=S.Centro_Costos) as Desc_Centro_Costos,
		S.Centro_Costos,
		S.Motivo_Reubicacion,
		S.Comentarios_Reubicacion
		from siga_reubicacion_activo S where Id_Activo_Reubicacion=".$Id_Activo_Reubicacion."";
	
	$proveedor->execute($sql);
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Reub_Nom_Usuario_Reponsable=$row["Nom_Usuario_Reponsable"];
				$Reub_UbicacionPrimaria=$row["UbicacionPrimaria"];
				$Reub_UbicacionSecundaria=$row["UbicacionSecundaria"];
				$Solicitante=$row["Solicitante"];
				$Reub_Jefe_Area=$row["Jefe_Area"];
				$Reub_Desc_Centro_Costos=$row["Desc_Centro_Costos"];
				$Reub_Centro_Costos=$row["Centro_Costos"];
				$Reub_Motivo_Reubicacion=$row["Motivo_Reubicacion"];
				$Reub_Comentarios_Reubicacion=$row["Comentarios_Reubicacion"];
				$Folio = $row["Id_Activo_Reubicacion"];
				$Nom_Usuario_Reponsable = $row["Nom_Usuario_Reponsable"];
				$Reub_Fech_Insert=$row["Fech_Inser"];
			}
		}
	}
	$proveedor->close();

	
	
	$proveedor_hist = new Proveedor('sqlserver', 'activos');
	$proveedor_hist->connect();
	$sql="
		select top 1 *, (select top 1  Desc_Ubic_Prim from siga_cat_ubic_prim where siga_historico_reubicacion.Id_Ubic_Prim=siga_cat_ubic_prim.Id_Ubic_Prim) as Desc_ubic_prim, 
		(select top 1  Desc_Ubic_Sec from siga_cat_ubic_sec where siga_historico_reubicacion.Id_Ubic_Sec=siga_cat_ubic_sec.Id_Ubic_Sec) as Desc_ubic_sec, Ubic_Especifica,
		(select top 1 Nom_Area from siga_catareas where siga_catareas.Id_Area=siga_historico_reubicacion.Id_Area) as Desc_area, Responsable_Activo_Procedencia
		from siga_historico_reubicacion where Id_Activo_Reubicacion=".$Id_Activo_Reubicacion." and Id_Activo=".$Id_Activo." order by 1 desc

		
		";
	
	$proveedor_hist->execute($sql);
	if (!$proveedor_hist->error()){
		if ($proveedor_hist->rows($proveedor_hist->stmt) > 0) {
			while ($row_hist = $proveedor_hist->fetch_array($proveedor_hist->stmt, 0)) {
				$Desc_Ubi_Prim_Historico=$row_hist["Desc_ubic_prim"];
				$Desc_Ubi_Sec_Historico=$row_hist["Desc_ubic_sec"];
				$Ubic_Especifica_Historico=$row_hist["Ubic_Especifica"];
				$Desc_Area_Historico=$row_hist["Desc_area"];
				$Responsable_Activo_Procedencia=$row_hist["Responsable_Activo_Procedencia"];
			}
		}
	}
	$proveedor_hist->close();
	
}

?>


<page backtop="35mm" backbottom="5mm" backleft="1mm" backright="1mm" orientation="portrait">
	<page_header>
	<table id="tbl" style="width: 100%;">
		<tr id="tr">
			<td class="td" style="width: 33.3%;"><div class="fotochs"><img src="logo.png"  class="logos" style="width:105%"></div></td>
			<td class="td" style="width: 33.3%;" align="center"><h3>Formato<br/>de reubicaci&oacute;n</h3></td>
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
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Fecha Reubicaci&oacute;n:</td>
					<td class="td" style="width: 20%;"><?php if ($Reub_Fech_Insert !="") echo date("d/m/Y H:i:s",strtotime($Reub_Fech_Insert)); ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">AF/BC:</td>
					<td class="td" style="width: 20%;"><?php echo $AF_BC; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Ubicaci&oacute;n Primaria Procedencia:</td>
					<td class="td" style="width: 20%;"><?php echo $Desc_Ubi_Prim_Historico; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Ubicaci&oacute;n Secundaria Procedencia:</td>
					<td class="td" style="width: 20%;"><?php echo $Desc_Ubi_Sec_Historico; ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Estatus:</td>
					<td class="td" style="width: 20%;"><?php echo $Estatus;?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Descripci&oacute;n Larga:</td>
					<td class="td" style="width: 20%;"><?php echo $DescLarga;?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Ubicaci&oacute;n Especifica Procedencia:</td>
					<td class="td" style="width: 20%;"><?php echo $Ubic_Especifica_Historico; ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Clasificaci&oacute;n:</td>
					<td class="td" style="width: 20%;"><?php echo $Clasificacion; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Propiedad:</td>
					<td class="td" style="width: 20%;"><?php echo $Propiedad; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">&Aacute;rea Gestora Procedencia:</td>
					<td class="td" style="width: 20%;"><?php echo $Desc_Area_Historico;?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Familia:</td>
					<td class="td" style="width: 20%;"><?php echo $Familia; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Subfamilia:</td>
					<td class="td" style="width: 20%;"><?php echo $Subfamilia; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Jefe &Aacute;rea Gestora Procedencia:</td>
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
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Tipo de Activo:</td>
					<td class="td" style="width: 20%;"><?php echo $TipoActivo; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Activo Padre:</td>
					<td class="td" style="width: 20%;"><?php echo $Id_ActivoPadre; ?></td>
					<td class="td" colspan="2" rowspan="6" align="center">
						<div class="foto">
						<?php if($Foto!=null){?>
						<?php if($Foto!=""){
							$Fot=explode("---", $Foto);
							?>
							
						
						<img src="..\..\..\Archivos\Archivos-Activos\<?php echo $Fot[0]; ?>" style=" width:100%">
						<?php } }?>
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
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Motivo de Alta:</td>
					<td class="td" style="width: 20%;"><?php echo $Motivo_Alta; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Periodicidad Mto. Preventivo:</td>
					<td class="td" style="width: 20%;"><?php echo $Frecuencia;?></td>
				</tr>
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
					<td class="td" style="width: 20%;"><?php echo $Monto_F?></td>
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
				<?php if($Url_Contrato!="" || $Url_Factura!="" || $Url_Otro_Doc!="" || $Url_Xml!=""){?>
				<tr id="tr">
					<td class="td" colspan="6" style="<?php echo $style_td;?>">* Existen Archivos Adjuntos en Datos del Proveedor</td>
				</tr>
				<?php }?>
			</tbody>
		</table>
		<br>
		
		<br>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
				<td colspan="6" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;"><strong>DATOS REUBICACI&Oacute;N EQUIPO</strong></td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">&Aacute;rea Gestora Destino:</td>
					<td class="td" style="width: 20%;"><?php echo $Area;?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>" rowspan="6">Motivo Reubicaci&oacute;n:</td>
					<td class="td" style="width: 20%;" rowspan="6"><?php echo $Reub_Motivo_Reubicacion;?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>" rowspan="6">Comentarios:</td>
					<td class="td" style="width: 20%;" rowspan="6"><?php echo $Reub_Comentarios_Reubicacion;?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Ubicaci&oacute;n Primaria Destino:</td>
					<td class="td" style="width: 20%;"><?php echo $Reub_UbicacionPrimaria;?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Ubicaci&oacute;n Secundaria Destino:</td>
					<td class="td" style="width: 20%;"><?php echo $Reub_UbicacionSecundaria;?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Ubicaci&oacute;n Especifica Destino:</td>
					<td class="td" style="width: 20%;"><?php echo $UbicacionEspecifica;?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Jefe &Aacute;rea Gestora Destino:</td>
					<td class="td" style="width: 20%;"><?php echo $Reub_Jefe_Area;?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Centro de Costos Destino:</td>
					<td class="td" style="width: 20%;"><?php echo $Reub_Desc_Centro_Costos;?></td>
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
		<table id="tbl" border cellpadding="10"  cellspacing="0">
		  <thead class="thead">
			<tr id="tr">
			  <td colspan="2" class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px">NOMBRE Y FIRMA RESPONSABLES</td>
			</tr>
		  </thead>
		  <tbody class="tbody">
			<tr id="tr">
			  <td class="td" style="width: 50%;">USUARIO SOLICITANTE REUBICACIÓN</td>
			  <td class="td" style="width: 50%;">USUARIO RESGUARDO ACTIVO PROCEDENCIA</td>
			</tr>
			<tr id="tr">
			  <td class="td sign" style="width: 50%;">Firma	<br><br><br><br><br></td>
			  <td class="td sign" style="width: 50%;">Firma	<br><br><br><br><br></td>
			</tr>
			<tr id="tr">
			  <td class="td author" align="center" style="width: 50%;"><?php echo $Solicitante?></td>
			  <td class="td author" align="center" style="width: 50%;"><?php echo $Responsable_Activo_Procedencia?></td>
			</tr>
		  </tbody>
		</table>
		<BR><br><br>
		<table id="tbl" border cellpadding="10"  cellspacing="0">
		 
		  <tbody class="tbody">
			<tr id="tr">
			  <td class="td" style="width: 50%;">USUARIO RESGUARDO/RESPONSABLE ACTIVO DESTINO</td>
			  <td class="td" style="width: 50%;">RESPONSABLE DEL ÁREA GESTORA</td>
			</tr>
			<tr id="tr">
			  <td class="td sign" style="width: 50%;">Firma	<br><br><br><br><br></td>
			  <td class="td sign" style="width: 50%;">Firma	<br><br><br><br><br></td>
			</tr>
			<tr id="tr">
			  <td class="td author" align="center" style="width: 50%;"><?php echo $Nom_Usuario_Reponsable;?></td>
			  <td class="td author" align="center" style="width: 50%;"><?php echo $Jefe_Area;?></td>
			</tr>
		  </tbody>
		</table>
	</div>	
	
	

	<br>
  <!-- /.login-box-body -->
</page> 

  
<?php
if($Modelo==""){
$Modelo="sin modelo";
}
$Nombre_Archivo=$AF_BC."  Reubicacion  ".$Nombre_Activo." ".$Modelo." ".$Folio;

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
        $html2pdf->Output("".$Nombre_Archivo.".pdf");
		// return the filename to ajax request
		//echo $filename;
	}
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>
