<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_solicitud_tickets/Siga_solicitud_ticketsDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_solicitud_tickets/Siga_solicitud_ticketsDAO.Class.php");
include_once(dirname(__FILE__)."/../../../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php");

include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_ticket_calificacion/Siga_ticket_calificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../fachadas/activos/siga_ticket_calificacion/Siga_ticket_calificacionFacade.Class.php");

include_once(dirname(__FILE__)."/../../../fachadas/activos/Existe_Archivo/Existe_ArchivoFacade.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_ticket_chat/Siga_ticket_chatDTO.Class.php");
include_once(dirname(__FILE__)."/../../../fachadas/activos/siga_ticket_chat/Siga_ticket_chatFacade.Class.php");

//Actividades
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_actividades/Siga_actividadesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_actividades/Siga_actividadesDAO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_actividades/Siga_det_actividadesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_det_actividades/Siga_det_actividadesDAO.Class.php");
include_once(dirname(__FILE__)."/../../../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php");


include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");


//Recibimos nuestra variable mediante GET
@$Id_Solicitud=$_GET["Id_Solicitud"];

//////////////////////////////Solicitud Tickets
//Instanciamos un obbejeto de esta misma clase "Siga_vale_resguardoFacade";
$siga_solicitud_ticketsFacade = new Siga_solicitud_ticketsFacade();
$siga_solicitud_ticketsDto = new Siga_solicitud_ticketsDTO();
//Cargamos las variables mediante el metodo set
$siga_solicitud_ticketsDto->setEstatus_Reg("1");
$siga_solicitud_ticketsDto->setId_Solicitud($Id_Solicitud);
//Realizamos la consulta y le pasamos el objeto con las variables cargadas
$Respuesta=json_decode($siga_solicitud_ticketsFacade->selectSiga_solicitud_tickets($siga_solicitud_ticketsDto,""), true);
//Accesorios
$Accesorios_Nota_Salida=json_decode($siga_solicitud_ticketsFacade->accesorios_act_ext_nota_salida($Id_Solicitud), true);


$Imagenes_Chat=json_decode($siga_solicitud_ticketsFacade->Archivos_Chat($siga_solicitud_ticketsDto,""), true);


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////Chat
$siga_ticket_chatFacade = new Siga_ticket_chatFacade();
$siga_ticket_chatDto = new Siga_ticket_chatDTO();
$siga_ticket_chatDto->setId_Solicitud($Id_Solicitud);
$Chat=json_decode($siga_ticket_chatFacade->selectSiga_ticket_chat($siga_ticket_chatDto,""), true);
$existe_ArchivoFacade = new Existe_ArchivoFacade();





//////////////////////////////Calificacion Tickets
$siga_ticket_calificacionFacade = new Siga_ticket_calificacionFacade();
$siga_ticket_calificacionDto = new Siga_ticket_calificacionDTO();
//Cargamos las variables mediante el metodo set
$siga_ticket_calificacionDto->setId_Solicitud($Id_Solicitud);
//Realizamos la consulta y le pasamos el objeto con las variables cargadas
$Calificacion=json_decode($siga_ticket_calificacionFacade->selectSiga_ticket_calificacion($siga_ticket_calificacionDto,""), true);
$Res_Pregunta1="";
$Desc_Res_Pregunta1="";
$Res_Pregunta2="";
$Desc_Res_Pregunta2="";
$Res_Pregunta3="";
$Desc_Res_Pregunta3="";

$Firma_Base64="";


$Adjuntos_1="";
$Adjuntos_2="";
$Adjuntos_3="";
$Adjuntos_4="";
$Exis_Arch_Adj=false;
$Adjuntos=json_decode($siga_solicitud_ticketsFacade->Archivos_Adjuntos($siga_solicitud_ticketsDto,""), true);
if($Adjuntos["totalCount"]>0){
	
	$Adjuntos_1=$Adjuntos["data"][0]["Archivo_Binario"];
	$Adjuntos_2=$Adjuntos["data"][0]["Archivo_Binario2"];
	$Adjuntos_3=$Adjuntos["data"][0]["Archivo_Binario3"];
	$Adjuntos_4=$Adjuntos["data"][0]["Archivo_Binario4"];
	
	if($Adjuntos_1!=""){
		$Exis_Arch_Adj=true;
	}
	if($Adjuntos_2!=""){
		$Exis_Arch_Adj=true;
	}
	if($Adjuntos_3!=""){
		$Exis_Arch_Adj=true;
	}
	if($Adjuntos_4!=""){
		$Exis_Arch_Adj=true;
	}
	
}


if($Calificacion["totalCount"]>0){
	$Res_Pregunta1=$Calificacion["data"][0]["Id_Respuesta1"];
	$Desc_Res_Pregunta1=$Calificacion["data"][0]["Desc_Comentario1"];
	
	
	$Res_Pregunta2=$Calificacion["data"][0]["Id_Respuesta2"];
	$Desc_Res_Pregunta2=$Calificacion["data"][0]["Desc_Comentario2"];
	
	
	$Res_Pregunta3=$Calificacion["data"][0]["Id_Respuesta3"];
	$Desc_Res_Pregunta3=$Calificacion["data"][0]["Desc_Comentario3"];
	
	$Firma_Base64=$Calificacion["data"][0]["Archivo_Binario"];
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



date_default_timezone_set('America/Mexico_City');
ob_start();
//Estilos css
require_once(dirname(__FILE__).'/../../../html2pdf/css.php');

$contador_img=0;
?>


<page backtop="35mm" backbottom="5mm" backleft="1mm" backright="1mm" orientation="portrait">
	<page_header>
	<table id="tbl" style="width: 100%;">
		<tr id="tr">
			<td class="td" style="width: 33.3%;"><div class="fotochs"><img src="logo.png"  class="logos" style="width:105%"></div></td>
			<td class="td" style="width: 33.3%;" align="center"><h3>Formato<br/>Tickets</h3></td>
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
  
		<nobreak>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
					<td colspan="6" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">DATOS DEL TICKET</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>"  >Folio Ticket:</td>
					<td class="td" style="width: 20%;" valign="top"><?php  if($Respuesta["data"][0]["Id_Solicitud"]!=null){echo htmlentities($Respuesta["data"][0]["Id_Solicitud"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">&Aacute;rea:</td>
					<td class="td" style="width: 31%;" valign="top"><?php  if($Respuesta["data"][0]["Area"]!=null){echo htmlentities($Respuesta["data"][0]["Area"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Secci&oacute;n:</td>
					<td class="td" style="width: 20%;" valign="top"><?php  if($Respuesta["data"][0]["NombreSeccion"]!=null){echo htmlentities($Respuesta["data"][0]["NombreSeccion"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>"  >Categor&iacute;a:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Categoria"]!=null){echo htmlentities($Respuesta["data"][0]["Categoria"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Subcategoria:</td>
					<td class="td" style="width: 31%;" valign="top"><?php if($Respuesta["data"][0]["Subcategoria"]!=null){echo htmlentities($Respuesta["data"][0]["Subcategoria"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Prioridad:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Prioridad"]!=null){if($Respuesta["data"][0]["Prioridad"]=="1"){echo "Alta";} if($Respuesta["data"][0]["Prioridad"]=="2"){echo "Media";} if($Respuesta["data"][0]["Prioridad"]=="3"){echo "Baja";}} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>"  >Gestor:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Gestor"]!=null){echo htmlentities($Respuesta["data"][0]["Gestor"]);}  ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Usuario Resguardo:</td>
					<td class="td" style="width: 31%;" valign="top"><?php if($Respuesta["data"][0]["Usuario"]!=null){echo htmlentities($Respuesta["data"][0]["Usuario"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Horario de Atenci&oacute;n:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Fech_Inser"]!=null){echo htmlentities($Respuesta["data"][0]["Fech_Inser"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>"  >Titulo Reporte:</td>
					<td class="td" colspan="5" valign="top"><?php if($Respuesta["data"][0]["Titulo"]!=null){echo htmlentities($Respuesta["data"][0]["Titulo"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>"  >Descripción Detallada de lo Reportado:</td>
					<td class="td" style="width: 91%;" colspan="5" valign="top"><?php if($Respuesta["data"][0]["Desc_Motivo_Reporte"]!=null){echo htmlentities($Respuesta["data"][0]["Desc_Motivo_Reporte"]);} ?></td>
				</tr>
				
				
			</tbody>
		</table>
		</nobreak>
		<br>
		<nobreak>
		
		
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
					<td colspan="6" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">DATOS GENERALES ACTIVO</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>"  >AF/BC:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["AF_BC_Ext"]!=null){echo htmlentities($Respuesta["data"][0]["AF_BC_Ext"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Nombre:</td>
					<td class="td" style="width: 31%;" valign="top"><?php if($Respuesta["data"][0]["Nombre_Act_Ext"]!=null){echo htmlentities($Respuesta["data"][0]["Nombre_Act_Ext"]);} ?></td>
					<td class="td" style="width: 30%;" rowspan="4" colspan="2" align="center">
						<div class="foto">
						<?php if($Respuesta["data"][0]["Foto"]!=null){?>
						<?php if($Respuesta["data"][0]["Foto"]!=""){
							$Ruta_Archivo="..\..\..\Archivos\Archivos-Activos\"".$Respuesta["data"][0]["Foto"];
							if (file_exists($Ruta_Archivo)) {
							
						?>
						
						<img src="<?php echo $Ruta_Archivo;?>" style=" width:100%">
						<?php } } }?>
						</div>
					</td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>">Marca:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Marca_Act_Ext"]!=null){echo htmlentities($Respuesta["data"][0]["Marca_Act_Ext"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>" rowspan="3">Descripci&oacute;n:</td>
					<td class="td" style="width: 31%;" rowspan="3" valign="top"><?php if($Respuesta["data"][0]["Desc_Lar_Activo"]!=null){echo htmlentities($Respuesta["data"][0]["Desc_Lar_Activo"]);} ?></td>
					
				</tr>
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>">Modelo:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Modelo_Act_Ext"]!=null){echo htmlentities($Respuesta["data"][0]["Modelo_Act_Ext"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>">SN:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["No_Serie_Act_Ext"]!=null){echo htmlentities($Respuesta["data"][0]["No_Serie_Act_Ext"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>">Ubicaci&oacute;n Primaria:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Ubic_Prim"]!=null){echo htmlentities($Respuesta["data"][0]["Ubic_Prim"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Ubicaci&oacute;n Secundaria:</td>
					<td class="td" style="width: 31%;" valign="top"><?php if($Respuesta["data"][0]["Ubic_Sec"]!=null){echo htmlentities($Respuesta["data"][0]["Ubic_Sec"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Ubicaci&oacute;n Espec&iacute;fica:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Ubic_Esp"]!=null){echo htmlentities($Respuesta["data"][0]["Ubic_Esp"]);} ?></td>
				
				</tr>
			</tbody>
		</table>
		</nobreak>
		<br>
		
		
		<?php
		if($Accesorios_Nota_Salida["totalCount"]>0){
		?>
		<nobreak>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
				<td colspan="6" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">EQUIPO Y ACCESORIOS ADICIONALES</td>
				</tr>
			</thead>
			<tbody class="tbody">
			  <tr id="tr">
					<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Cantidad:</td>
					<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Unidad:</td>
					<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Marca:</td>
					<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Modelo:</td>
					<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Descripción:</td>
					<td class="td" style="width: 14.28%;<?php echo $style_td;?>">No. Serie:</td>
				</tr>
				<?php		
				for($n=0; $n<$Accesorios_Nota_Salida["totalCount"]; $n++){
					echo '<tr id="tr">';
					echo '	<td class="td" style="width: 14.28%;">'.$Accesorios_Nota_Salida["data"][$n]["Cantidad_DNS"].'</td>';
					echo '	<td class="td" style="width: 14.28%;">'.$Accesorios_Nota_Salida["data"][$n]["Unidad_DNS"].'</td>';
					echo '	<td class="td" style="width: 14.28%;">'.$Accesorios_Nota_Salida["data"][$n]["Marca_DNS"].'</td>';
					echo '	<td class="td" style="width: 14.28%;">'.$Accesorios_Nota_Salida["data"][$n]["Modelo_DNS"].'</td>';
					echo '	<td class="td" style="width: 14.28%;">'.$Accesorios_Nota_Salida["data"][$n]["Descripcion_DNS"].'</td>';
					echo '	<td class="td" style="width: 14.28%;">'.$Accesorios_Nota_Salida["data"][$n]["No_Serie_DNS"].'</td>';
					echo '</tr>';
				}
				?>
				
			</tbody>
		</table>
		</nobreak>
		<br>
		<?php
		}else{
			//
			$Accesorios_Mesa_Ayuda=json_decode($siga_solicitud_ticketsFacade->accesorios_act_ext_mesa_ayuda($Id_Solicitud), true);
			if($Accesorios_Mesa_Ayuda["totalCount"]>0){
		?>
				<nobreak>
				<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
					<thead class="thead">
						<tr id="tr">
						<td colspan="6" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">EQUIPO Y ACCESORIOS ADICIONALES</td>
						</tr>
					</thead>
					<tbody class="tbody">
						<tr id="tr">
							<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Cantidad:</td>
							<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Unidad:</td>
							<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Marca:</td>
							<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Modelo:</td>
							<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Descripción:</td>
							<td class="td" style="width: 14.28%;<?php echo $style_td;?>">No. Serie:</td>
						</tr>
						<?php
						  echo '<tr id="tr">';
							echo '	<td class="td" style="width: 14.28%;">1</td>';
							echo '	<td class="td" style="width: 14.28%;">EQU</td>';
							echo '	<td class="td" style="width: 14.28%;">';
											if($Respuesta["data"][0]["Marca_Act_Ext"]!=null){echo htmlentities($Respuesta["data"][0]["Marca_Act_Ext"]);}
							echo '	</td>';
							echo '	<td class="td" style="width: 14.28%;">';
											if($Respuesta["data"][0]["Modelo_Act_Ext"]!=null){echo htmlentities($Respuesta["data"][0]["Modelo_Act_Ext"]);}
							echo '	</td>';
							echo '	<td class="td" style="width: 14.28%;">';
											if($Respuesta["data"][0]["Nombre_Act_Ext"]!=null){echo htmlentities($Respuesta["data"][0]["Nombre_Act_Ext"]);}
							echo '	</td>';
							echo '	<td class="td" style="width: 14.28%;">';
											if($Respuesta["data"][0]["No_Serie_Act_Ext"]!=null){echo htmlentities($Respuesta["data"][0]["No_Serie_Act_Ext"]);}
							echo '	</td>';
							echo '</tr>';
						
						for($j=0; $j<$Accesorios_Mesa_Ayuda["totalCount"]; $j++){
							echo '<tr id="tr">';
							echo '	<td class="td" style="width: 14.28%;">'.$Accesorios_Mesa_Ayuda["data"][$j]["Cantidad_Ext"].'</td>';
							echo '	<td class="td" style="width: 14.28%;">'.$Accesorios_Mesa_Ayuda["data"][$j]["Unidad_Ext"].'</td>';
							echo '	<td class="td" style="width: 14.28%;">'.$Accesorios_Mesa_Ayuda["data"][$j]["Marca_Ext"].'</td>';
							echo '	<td class="td" style="width: 14.28%;">'.$Accesorios_Mesa_Ayuda["data"][$j]["Modelo_Ext"].'</td>';
							echo '	<td class="td" style="width: 14.28%;">'.$Accesorios_Mesa_Ayuda["data"][$j]["Nombre_Ext"].'</td>';
							echo '	<td class="td" style="width: 14.28%;">'.$Accesorios_Mesa_Ayuda["data"][$j]["No_Serie_Ext"].'</td>';
							echo '</tr>';
						}
						?>
						
					</tbody>
				</table>
				</nobreak>
				<br>
		<?php 
			}
		}
		?>
		
		
		
		<?php
		if($Respuesta["data"][0]["Id_Actividad"]!=null){
			//Recibimos nuestra variable mediante GET
			@$Id_Actividad=$Respuesta["data"][0]["Id_Actividad"];

			//Instanciamos un obbejeto de esta misma clase "Siga_vale_resguardoFacade";
			$siga_actividadesFacade = new Siga_actividadesFacade();
			$siga_actividadesDto = new Siga_actividadesDTO();
			//Cargamos las variables mediante el metodo set
			$siga_actividadesDto->setEstatus_Reg("1");
			$siga_actividadesDto->setId_Actividad($Id_Actividad);
			//Realizamos la consulta y le pasamos el objeto con las variables cargadas
			$Actividades=json_decode($siga_actividadesFacade->selectSiga_actividades_detalle($siga_actividadesDto,""), true);
		?>
		<nobreak>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
					<td class="td" style="width: 4%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						No.
					</td>
					<td class="td" style="width: 20%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						Actividades
					</td>
					<td class="td" style="width: 12%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						Valor Ref.
					</td>
					<td class="td" style="width: 12%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						Valor Med.
					</td>
					<td class="td" style="width: 4%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						Ok
					</td>
					<td class="td" style="width: 5%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						Fallo
					</td>
					<td class="td" style="width: 4%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						N/A
					</td>
					<td class="td" style="width: 18%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						Observaciones
					</td>
					<td class="td" style="width: 5%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:11px;">
						No. Img
					</td>
					<td class="td" style="width: 8%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						F-P
					</td>
					<td class="td" style="width: 8%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						F-R
					</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<?php 
				if($Actividades["totalCountDetalle"]>0){
					for($i=0;$i<$Actividades["totalCountDetalle"];$i++)
					{
				?>
				<tr id="tr">
					<td class="td" style="width: 4%;"><?php echo ($i+1);?></td>
					<td class="td" style="width: 20%;"><?php if($Actividades["data_det"][$i]["Nombre_Actividad"]!=null){echo htmlentities($Actividades["data_det"][$i]["Nombre_Actividad"]);} ?></td>
					<td class="td" style="width: 12%;"><?php if($Actividades["data_det"][$i]["Valor_Referencia"]!=null){echo htmlentities($Actividades["data_det"][$i]["Valor_Referencia"]);} ?></td>
					<td class="td" style="width: 12%;"><?php if($Actividades["data_det"][$i]["Valor_Medido"]!=null){echo htmlentities($Actividades["data_det"][$i]["Valor_Medido"]);} ?></td>
					<td class="td" style="width: 4%;" align="center"><?php if($Actividades["data_det"][$i]["Estatus_Actividad"]==1){echo '<img src="check-icon.png" alt="">';} ?></td>
					<td class="td" style="width: 5%;" align="center"><?php if($Actividades["data_det"][$i]["Estatus_Actividad"]==2){echo '<img src="check-icon.png" alt="">';} ?></td>
					<td class="td" style="width: 4%;" align="center"><?php if($Actividades["data_det"][$i]["Estatus_Actividad"]==3){echo '<img src="check-icon.png" alt="">';} ?></td>
					<td class="td" style="width: 18%;"><?php if($Actividades["data_det"][$i]["Observaciones"]!=null){echo htmlentities($Actividades["data_det"][$i]["Observaciones"]);} ?></td>
					<td class="td" style="width: 5%;" align="center">
						<?php if($Actividades["data_det"][$i]["Url_Adjunto"]!=null){?>
							<?php if($Actividades["data_det"][$i]["Url_Adjunto"]!=""){$contador_img=$contador_img+1; echo $contador_img;?>
						<?php } }?>
					</td>
					<td class="td" style="width: 8%;"><?php if($Actividades["data_det"][$i]["Fecha_Programada"]!=null){echo fecha_ddmmyyyy($Actividades["data_det"][$i]["Fecha_Programada"]);} ?></td>
					<td class="td" style="width: 8%;"><?php if($Actividades["data_det"][$i]["Fecha_Realizada"]!=null){echo fecha_ddmmyyyy($Actividades["data_det"][$i]["Fecha_Realizada"]);} ?></td>
				</tr>
				<?php
					}
				}
				?>	
			</tbody>
		</table>
		</nobreak>
		<br>
		
		<?php
		}
		
		
		?>
		<nobreak>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
					<td colspan="6" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">DATOS TICKET CERRADO</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>"  >Motivo Aparente (Reportado):</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Desc_Motivo_Aparente"]!=null){echo htmlentities($Respuesta["data"][0]["Desc_Motivo_Aparente"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Motivo Real Encontrado:</td>
					<td class="td" style="width: 31%;" valign="top"><?php if($Respuesta["data"][0]["Desc_Motivo_Real"]!=null){echo htmlentities($Respuesta["data"][0]["Desc_Motivo_Real"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Estatus Final del Equipo:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Desc_Est_Equipo"]!=null){echo htmlentities($Respuesta["data"][0]["Desc_Est_Equipo"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>"  >Descripción de Acciones Realizadas:</td>
					<td class="td" colspan="5" style="width: 91%;" valign="top"><?php  if($Respuesta["data"][0]["ComentarioCierre"]!=null){echo htmlentities($Respuesta["data"][0]["ComentarioCierre"]);}  ?></td>
				</tr>
				
			</tbody>
		</table>
		</nobreak>
		
		
		<?php
		if($Chat["totalCount"]>0){
		?>
		<br>
		<nobreak>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
					<td colspan="2" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">SEGUIMIENTO CHAT</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<?php
				for($ch=0; $ch<$Chat["totalCount"]; $ch++){
				?>
				<tr id="tr">
					<td class="td" style="width: 20%;text-align:center;<?php echo $style_td;?>">
					<?php 
						if($Chat["data"][$ch]["Id_Estatus_Proceso"]==2){
							$Ruta_foto_chat="http://192.168.1.234/Fotos/".$Chat["data"][$ch]["No_Empl_Gestor"].".jpg";
							$Existe_Archivo=json_decode($existe_ArchivoFacade->Existe_Archivo($Ruta_foto_chat), true);
							if($Existe_Archivo["totalCount"]==1){
								echo '<img src="'.$Ruta_foto_chat.'" style="width:40%"><br>';
							}else{
								echo '<img src="sinfoto.png" style="width:40%"><br>';
							}
							echo "<span style='font-size:10px; font-weight: bold'>".htmlentities($Chat["data"][$ch]["Nombre_Gestor"])."</span>";
						}else{
							$Ruta_foto_chat="http://192.168.1.234/Fotos/".$Chat["data"][$ch]["No_Empl_Solicitante"].".jpg";
							$Existe_Archivo=json_decode($existe_ArchivoFacade->Existe_Archivo($Ruta_foto_chat), true);
							if($Existe_Archivo["totalCount"]==1){
								echo '<img src="'.$Ruta_foto_chat.'" style="width:40%"><br>';
							}else{
								echo '<img src="sinfoto.png" style="width:40%"><br>';
							}
							echo "<span style='font-size:10px; font-weight: bold'>".htmlentities($Chat["data"][$ch]["Nombre_Usuario"])."</span>";
						}
					?>
					</td>
					<td class="td" style="width: 80%;" valign="top">
						<?php 
							echo "<span style='font-size:10px; font-weight: bold'>".htmlentities($Chat["data"][$ch]["Fecha_Alta"])."</span>";
							echo "<br>";
							echo htmlentities($Chat["data"][$ch]["Mensaje"]);
						?>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		</nobreak>
		<?php
		}
		?>
		<br>
		<nobreak>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
					<td colspan="5" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">SOLUCIÓN OFRECIDA</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta1!=""){if($Res_Pregunta1=="5"){echo '<img src="..\..\..\dist\img\05-face.png">';}else{echo '<img  src="..\..\..\dist\img\05-face-off.png">';}}
					?>
					</td>
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta1!=""){if($Res_Pregunta1=="4"){echo '<img src="..\..\..\dist\img\04-face.png">';}else{echo '<img src="..\..\..\dist\img\04-face-off.png">';}}
					?>
					</td>
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta1!=""){if($Res_Pregunta1=="3"){echo '<img src="..\..\..\dist\img\03-face.png">';}else{echo '<img src="..\..\..\dist\img\03-face-off.png">';}}
					?>
					</td>
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta1!=""){if($Res_Pregunta1=="2"){echo '<img src="..\..\..\dist\img\02-face.png">';}else{echo '<img src="..\..\..\dist\img\02-face-off.png">';}}
					?>
					</td>
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta1!=""){if($Res_Pregunta1=="1"){echo '<img src="..\..\..\dist\img\01-face.png">';}else{echo '<img src="..\..\..\dist\img\01-face-off.png">';}}
					?>
					</td>
				</tr>
				<tr id="tr" align="left">
					<td class="comentarios" colspan="5" valign="top">Comentarios: <?php  if($Desc_Res_Pregunta1!=""){echo htmlentities($Desc_Res_Pregunta1);} ?></td>
				</tr>
			</tbody>
		</table>
		</nobreak>
		<br>
		<nobreak>
		<table id="tbl" style="width: 100%;text-align: center;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
					<td colspan="5" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">ACTITUD DE LA SOLUCIÓN</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta2!=""){if($Res_Pregunta2=="5"){echo '<img src="..\..\..\dist\img\05-face.png">';}else{echo '<img src="..\..\..\dist\img\05-face-off.png">';}}
					?>
					</td>
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta2!=""){if($Res_Pregunta2=="4"){echo '<img src="..\..\..\dist\img\04-face.png">';}else{echo '<img src="..\..\..\dist\img\04-face-off.png">';}}
					?>
					</td>
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta2!=""){if($Res_Pregunta2=="3"){echo '<img src="..\..\..\dist\img\03-face.png">';}else{echo '<img src="..\..\..\dist\img\03-face-off.png">';}}
					?>
					</td>
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta2!=""){if($Res_Pregunta2=="2"){echo '<img src="..\..\..\dist\img\02-face.png">';}else{echo '<img src="..\..\..\dist\img\02-face-off.png">';}}
					?>
					</td>
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta2!=""){if($Res_Pregunta2=="1"){echo '<img src="..\..\..\dist\img\01-face.png">';}else{echo '<img src="..\..\..\dist\img\01-face-off.png">';}}
					?>
					</td>
				</tr>
			
				<tr id="tr" align="left">
					<td class="comentarios" colspan="5" valign="top">Comentarios: <?php if($Desc_Res_Pregunta2!=""){echo htmlentities($Desc_Res_Pregunta2);} ?></td>
				</tr>
			</tbody>
		</table>
		</nobreak>
		<br>
		<nobreak>		
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
					<td colspan="5" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">TIEMPO DE RESPUESTA</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta3!=""){if($Res_Pregunta3=="5"){echo '<img src="..\..\..\dist\img\05-face.png">';}else{echo '<img src="..\..\..\dist\img\05-face-off.png">';}}
					?>
					</td>
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta3!=""){if($Res_Pregunta3=="4"){echo '<img src="..\..\..\dist\img\04-face.png">';}else{echo '<img src="..\..\..\dist\img\04-face-off.png">';}}
					?>
					</td>
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta3!=""){if($Res_Pregunta3=="3"){echo '<img src="..\..\..\dist\img\03-face.png">';}else{echo '<img src="..\..\..\dist\img\03-face-off.png">';}}
					?>
					</td>
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta3!=""){if($Res_Pregunta3=="2"){echo '<img src="..\..\..\dist\img\02-face.png">';}else{echo '<img src="..\..\..\dist\img\02-face-off.png">';}}
					?>
					</td>
					<td class="td" style="width: 20%;">
					<?php
					if($Res_Pregunta3!=""){if($Res_Pregunta3=="1"){echo '<img src="..\..\..\dist\img\01-face.png">';}else{echo '<img src="..\..\..\dist\img\01-face-off.png">';}}
					?>
					</td>
				</tr>
				
				
				<tr id="tr" height="30px" align="left">
					<td class="comentarios" colspan="5" valign="top">Comentarios: <?php if($Desc_Res_Pregunta3!=""){echo htmlentities($Desc_Res_Pregunta3);} ?></td>
				</tr>
			</tbody>
		</table>
		</nobreak>
		<nobreak>	
		<table id="tbl" style="width: 100%;"  border="0" cellpadding="10"  cellspacing="0" height="20">
			<tbody class="tbody">
				<tr id="tr" align="center">
					<td style="width: 33.33%;align:right" >
					</td>
					<td style="width: 33.33%;" >
					</td>
					<td style="width: 33.33%;" >
					</td>
				</tr>
			</tbody>
		</table>
		</nobreak>
		<br>
		<nobreak>
		<nobreak>
		<table id="tbl" border cellpadding="10"  cellspacing="0">
		  <thead class="thead">
			<tr id="tr">
			  <td colspan="2" class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px">NOMBRE DE USUARIO Y GESTOR INICIALES</td>
			</tr>
		  </thead>
		  <tbody class="tbody">
			<tr id="tr">
			  <td class="td" style="width: 50%;">USUARIO SOLICITANTE</td>
			  <td class="td" style="width: 50%;">GESTOR SEGUIMIENTO</td>
			</tr>
			<tr id="tr">
			  <td class="td sign" style="width: 50%;">
				<?php
					echo "<br><br><br><br><br><br><br>";
					if($Respuesta["data"][0]["Usuario"]!=null){
						echo htmlentities($Respuesta["data"][0]["No_Usuario"]);echo "&nbsp;&nbsp;";
						echo htmlentities($Respuesta["data"][0]["Usuario"]);
					}
					echo "<br>";
					echo $Respuesta["data"][0]["Fech_Solicitud"];
				?>
				</td>
			  <td class="td sign" style="width: 50%;">
					<br><br><br><br><br><br><br>
					<?php if($Respuesta["data"][0]["Gestor"]!=null){
						echo htmlentities($Respuesta["data"][0]["No_Gestor"]);echo "&nbsp;&nbsp;";
						echo htmlentities($Respuesta["data"][0]["Gestor"]);
					}  ?>
					<br>
					<?php echo $Respuesta["data"][0]["Fech_Seguimiento"]; ?>
			  </td>
			</tr>
			<tr id="tr">
			  <td colspan="2" class="td" align="center" style="text-align:center; background:#19294a; color:#fff; border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">USUARIO Y GESTOR FINALES</td>
			</tr>
			<tr id="tr">
			  <td class="td" style="width: 50%;">FINAL QUE RECIBE</td>
			  <td class="td" style="width: 50%;">GESTOR FINAL</td>
			</tr>
			<tr id="tr">
			  <td class="td sign" style="width: 50%;">
				<?php if($Firma_Base64!=""){?>
					Firma<br>
					<img src="data:image/png;base64,<?php $baseFromJavascript = "data:image/jpeg;base64,".$Firma_Base64.""; echo preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript);?>" width="120" height="60">	
					<br>FIRMADO POR:<br>
					<?php if($Respuesta["data"][0]["Usuario"]!=null){
						echo htmlentities($Respuesta["data"][0]["No_Usuario"]);echo "&nbsp;&nbsp;";
						echo htmlentities($Respuesta["data"][0]["Usuario"]);
					}  ?>
					<br>
					<?php if($Respuesta["data"][0]["Fech_Cierre"]!=null){echo htmlentities($Respuesta["data"][0]["Fech_Cierre"]);} ?>
				<?php }else{
					echo "Firma<br><br><br><br><br><br>FIRMADO POR:<br>";
					if($Respuesta["data"][0]["Usuario"]!=null){
						echo htmlentities($Respuesta["data"][0]["No_Usuario"]);echo "&nbsp;&nbsp;";
						echo htmlentities($Respuesta["data"][0]["Usuario"]);
					}
					echo "<br>";
					if($Respuesta["data"][0]["Fech_Cierre"]!=null){echo htmlentities($Respuesta["data"][0]["Fech_Cierre"]);}
				}?>
				</td>
			  <td class="td sign" style="width: 50%;">
					Firma<br><br><br><br><br><br>
					FIRMADO DIGITALMENTE POR<br>
					<?php 
						if($Respuesta["data"][0]["Gestor"]!=null){echo htmlentities($Respuesta["data"][0]["Gestor_Finaliza"]);}  
					?>
					<br>
					<?php echo $Respuesta["data"][0]["Fech_Cierre"]; ?>
			  </td>
			</tr>
		  </tbody>
		</table>
		</nobreak>
		</nobreak>
		
		<?php 
		if($Exis_Arch_Adj==true){?>
		<br>
		<br>
		<nobreak>
		<nobreak>
		<table id="tbl" border cellpadding="10"  cellspacing="0">
		  <thead class="thead">
			<tr id="tr">
			  <td colspan="2" class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px">ADJUNTOS APP</td>
			</tr>
		  </thead>
		  <tbody class="tbody">
			<tr id="tr">
			  <td class="td" style="width: 50%;" align="center">
				<?php 
				if($Adjuntos_1!=""){
					$baseFromJavascript = "data:image/jpeg;base64,".$Adjuntos_1.""; $baseFromJavascript=preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript);
					list($width, $height, $type, $attr) = getimagesize("data:image/png;base64,".$baseFromJavascript);
					if($width<$height){
						
						echo '<img src="data:image/png;base64,'.$baseFromJavascript.'" width="260" height="370">	';
					}else{
						echo '<img src="data:image/png;base64,'.$baseFromJavascript.'" width="375" height="360">	';
					}
				}
				?>
			  </td>	
			  <td class="td" style="width: 50%;" align="center">	
				<?php 
				if($Adjuntos_2!=""){
					$baseFromJavascript = "data:image/jpeg;base64,".$Adjuntos_2.""; $baseFromJavascript=preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript);
					list($width, $height, $type, $attr) = getimagesize("data:image/png;base64,".$baseFromJavascript);
					if($width<$height){
						echo '<img src="data:image/png;base64,'.$baseFromJavascript.'" width="260" height="390">	';
					}else{
						echo '<img src="data:image/png;base64,'.$baseFromJavascript.'" width="375" height="260">	';
					}
				}
				?>
			   </td>	
			</tr>  
			<tr id="tr">  
			  <td class="td" style="width: 50%;" align="center">		
				<?php 
				if($Adjuntos_3!=""){
					$baseFromJavascript = "data:image/jpeg;base64,".$Adjuntos_3.""; $baseFromJavascript=preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript);
					list($width, $height, $type, $attr) = getimagesize("data:image/png;base64,".$baseFromJavascript);
					if($width<$height){
						echo '<img src="data:image/png;base64,'.$baseFromJavascript.'" width="260" height="390">	';
					}else{
						echo '<img src="data:image/png;base64,'.$baseFromJavascript.'" width="375" height="260">	';
					}
				}
				?>
			  </td>	
			  <td class="td" style="width: 50%;" align="center">
				<?php 
				if($Adjuntos_4!=""){
					$baseFromJavascript = "data:image/jpeg;base64,".$Adjuntos_4.""; $baseFromJavascript=preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript);
					list($width, $height, $type, $attr) = getimagesize("data:image/png;base64,".$baseFromJavascript);
					if($width<$height){
						echo '<img src="data:image/png;base64,'.$baseFromJavascript.'" width="260" height="390">	';
					}else{
						echo '<img src="data:image/png;base64,'.$baseFromJavascript.'" width="375" height="260">	';
					}
				}
				?>
			  </td>
			</tr>
		  </tbody>
		</table>
		</nobreak>
		</nobreak>
		
		<?php }?>
		
	
		
		
		
		
	
	
	

	<br>
  <!-- /.login-box-body -->
</page> 
<?php
if($contador_img>0){
?>

<page backtop="5mm" backbottom="5mm" backleft="1mm" backright="1mm" orientation="portrait">
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
	
	<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
		<thead class="thead">
			<tr id="tr">
				<td colspan="2" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">ADJUNTOS</td>
			</tr>
		</thead>
		<tbody class="tbody">
		<?php 
		if($Actividades["totalCountDetalle"]>0){
			$contadoradjuntos_img=0;
			$tablafoto="";
			$tablafotolabel="";
			
			for($m=0;$m<$Actividades["totalCountDetalle"];$m++){
				if($Actividades["data_det"][$m]["Url_Adjunto"]!=null){
					if($Actividades["data_det"][$m]["Url_Adjunto"]!=""){
						
						$contadoradjuntos_img=$contadoradjuntos_img+1;
						
						if($contadoradjuntos_img%2!=0){
							$tablafotolabel.=	'<tr id="tr">';
						}
						
						$tablafotolabel.='<td class="td" style="width: 50%;"><div align="center"><img src="../../../Archivos/Archivos-Actividades/Mantenimiento-Preventivo/'.$Actividades["data_det"][$m]["Url_Adjunto"].'" width="260" height="260"></div><br><div style="text-align:center;background:#f4f4f4;font-size: 11px;">Foto '.$contadoradjuntos_img.'</div></td>';
						
						if($contadoradjuntos_img%2==0){
							$tablafotolabel.='</tr>';	
						}
						
					}
				}
			}
			
			if($contadoradjuntos_img%2!=0){
				$tablafotolabel.='</tr>';
			}
			echo $tablafotolabel;
		}	
		?>	
		</tbody>
	</table>
	

</page> 
<?php
}
?>




<?php
if($Imagenes_Chat!=""){
?>

<page backtop="5mm" backbottom="5mm" backleft="1mm" backright="1mm" orientation="portrait">
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
	
	<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
		<thead class="thead">
			<tr id="tr">
				<td colspan="2" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">ADJUNTOS CHAT</td>
			</tr>
		</thead>
		<tbody class="tbody">
		<?php 
		
		if($Imagenes_Chat["totalCount"]>0){
			$contadoradjuntos_img=0;
			$tablafoto="";
			$tablafotolabel="";
			
			for($m=0;$m<$Imagenes_Chat["totalCount"];$m++){
				if($Imagenes_Chat["data"][$m]["Url_Adjunto"]!=null){
					if($Imagenes_Chat["data"][$m]["Url_Adjunto"]!=""){
						
						$contadoradjuntos_img=$contadoradjuntos_img+1;
						
						if($contadoradjuntos_img%2!=0){
							$tablafotolabel.=	'<tr id="tr">';
						}
						
						$tablafotolabel.='<td class="td" style="width: 50%;"><div align="center"><img src="../../../Archivos/Archivos-Chat/'.$Imagenes_Chat["data"][$m]["Url_Adjunto"].'" width="260" height="260"></div><br><div style="text-align:center;background:#f4f4f4;font-size: 11px;">Foto '.$contadoradjuntos_img.'</div></td>';
						
						if($contadoradjuntos_img%2==0){
							$tablafotolabel.='</tr>';	
						}
						
					}
				}
			}
			
			if($contadoradjuntos_img%2!=0){
				$tablafotolabel.='</tr>';
			}
			echo $tablafotolabel;
		}	
		?>	
		</tbody>
	</table>
	

</page> 
<?php
}
?>



<?php






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
        $html2pdf->Output("solicitud_ticket.pdf");
		// return the filename to ajax request
		//echo $filename;
	}
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>