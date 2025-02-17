<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_actividades/Siga_actividadesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_actividades/Siga_actividadesDAO.Class.php");

include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_actividades/Siga_det_actividadesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_det_actividades/Siga_det_actividadesDAO.Class.php");

include_once(dirname(__FILE__)."/../../../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php");
////////////////////
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");


//Recibimos nuestra variable mediante GET
@$Id_Actividad=$_GET["Id_Actividad"];

//Instanciamos un obbejeto de esta misma clase "Siga_vale_resguardoFacade";
$siga_actividadesFacade = new Siga_actividadesFacade();
$siga_actividadesDto = new Siga_actividadesDTO();
//Cargamos las variables mediante el metodo set
$siga_actividadesDto->setEstatus_Reg("1");
$siga_actividadesDto->setId_Actividad($Id_Actividad);
//Realizamos la consulta y le pasamos el objeto con las variables cargadas
$Respuesta=json_decode($siga_actividadesFacade->selectSiga_actividades_detalle($siga_actividadesDto,""), true);



date_default_timezone_set('America/Mexico_City');
ob_start();
//Estilos css
require_once(dirname(__FILE__).'/../../../html2pdf/css.php');

$contador_img=0;
$array_fotos=[];

//echo "<pre>";
//print_r($Respuesta);
//echo "</pre>";
?>


<page backtop="40mm" backbottom="5mm" backleft="1mm" backright="1mm" orientation="portrait">
	<page_header>
	<table id="tbl" style="width: 100%;">
		<tr id="tr">
			<td class="td" style="width: 33.3%;"><div class="fotochs"><img src="logo.png"  class="logos" style="width:105%"></div></td>
			<td class="td" style="width: 33.3%;" align="center"><h3>Mantenimiento<br/>Preventivo</h3></td>
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
					<td colspan="6" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">DATOS GENERALES</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>"  >AF/BC:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["AF_BC"]!=null){echo $Respuesta["data"][0]["AF_BC"];} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Nombre:</td>
					<td class="td" style="width: 31%;" valign="top"><?php if($Respuesta["data"][0]["Nombre_Activo"]!=null){echo htmlentities($Respuesta["data"][0]["Nombre_Activo"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Nombre Rutina:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Nombre_Rutina"]!=null){echo htmlentities($Respuesta["data"][0]["Nombre_Rutina"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>">Marca:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Marca"]!=null){echo htmlentities($Respuesta["data"][0]["Marca"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>" rowspan="3">Descripci&oacute;n:</td>
					<td class="td" style="width: 31%;" rowspan="3" valign="top"><?php if($Respuesta["data"][0]["Descripcion"]!=null){echo htmlentities($Respuesta["data"][0]["Descripcion"]);} ?></td>
					<td class="td" style="width: 30%;" rowspan="4" colspan="2" align="center">
						<div class="foto">
						<?php if($Respuesta["data"][0]["Foto"]!=null){?>
						<?php if($Respuesta["data"][0]["Foto"]!=""){?>
						<img src="..\..\..\Archivos\Archivos-Activos\<?php echo $Respuesta["data"][0]["Foto"]; ?>" style=" width:100%">
						<?php } }?>
						</div>
					</td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>">Modelo:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Modelo"]!=null){echo htmlentities($Respuesta["data"][0]["Modelo"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>">SN:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["NumSerie"]!=null){echo htmlentities($Respuesta["data"][0]["NumSerie"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 9%;<?php echo $style_td;?>">Ubicaci&oacute;n Primaria:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Desc_Ubic_Prim"]!=null){echo htmlentities($Respuesta["data"][0]["Desc_Ubic_Prim"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Ubicaci&oacute;n Secundaria:</td>
					<td class="td" style="width: 31%;" valign="top"><?php if($Respuesta["data"][0]["Desc_Ubic_Sec"]!=null){echo htmlentities($Respuesta["data"][0]["Desc_Ubic_Sec"]);} ?></td>
				</tr>
			</tbody>
		</table>
		</nobreak>
		<br>
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
				if($Respuesta["totalCountDetalle"]>0){
					for($i=0;$i<$Respuesta["totalCountDetalle"];$i++)
					{
				?>
				<tr id="tr">
					<td class="td" style="width: 4%;"><?php echo ($i+1);?></td>
					<td class="td" style="width: 20%;"><?php if($Respuesta["data_det"][$i]["Nombre_Actividad"]!=null){echo htmlentities($Respuesta["data_det"][$i]["Nombre_Actividad"]);} ?></td>
					<td class="td" style="width: 12%;"><?php if($Respuesta["data_det"][$i]["Valor_Referencia"]!=null){echo htmlentities($Respuesta["data_det"][$i]["Valor_Referencia"]);} ?></td>
					<td class="td" style="width: 12%;"><?php if($Respuesta["data_det"][$i]["Valor_Medido"]!=null){echo htmlentities($Respuesta["data_det"][$i]["Valor_Medido"]);} ?></td>
					<td class="td" style="width: 4%;" align="center"><?php if($Respuesta["data_det"][$i]["Estatus_Actividad"]==1){echo '<img src="check-icon.png" alt="">';} ?></td>
					<td class="td" style="width: 5%;" align="center"><?php if($Respuesta["data_det"][$i]["Estatus_Actividad"]==2){echo '<img src="check-icon.png" alt="">';} ?></td>
					<td class="td" style="width: 4%;" align="center"><?php if($Respuesta["data_det"][$i]["Estatus_Actividad"]==3){echo '<img src="check-icon.png" alt="">';} ?></td>
					<td class="td" style="width: 18%;"><?php if($Respuesta["data_det"][$i]["Observaciones"]!=null){echo htmlentities($Respuesta["data_det"][$i]["Observaciones"]);} ?></td>
					<td class="td" style="width: 5%;" align="center">
						<?php if($Respuesta["data_det"][$i]["Url_Adjunto"]!=null){?>
							<?php if($Respuesta["data_det"][$i]["Url_Adjunto"]!=""){$array_fotos[$contador_img]=$Respuesta["data_det"][$i]["Url_Adjunto"];	$contador_img=$contador_img+1; echo $contador_img;?>
						<?php } }?>
					</td>
					<td class="td" style="width: 8%;"><?php if($Respuesta["data_det"][$i]["Fecha_Programada"]!=null){echo fecha_ddmmyyyy($Respuesta["data_det"][$i]["Fecha_Programada"]);} ?></td>
					<td class="td" style="width: 8%;"><?php if($Respuesta["data_det"][$i]["Fecha_Realizada"]!=null){echo fecha_ddmmyyyy($Respuesta["data_det"][$i]["Fecha_Realizada"]);} ?></td>
				</tr>
				<?php
					}
				}
				?>
			</tbody>
		</table>
		<br>
		<nobreak>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
					<td class="td" style="width: 5%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						No.
					</td>
					<td class="td" style="width: 40%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						Mantenimiento (Refacciones/Accesorios/Consumibles::)
					</td>
					<td class="td" style="width: 10%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						Cantidad
					</td>
					<td class="td" style="width: 10%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						Costo
					</td>
					<td class="td" style="width: 10%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						Conceptos
					</td>
					<td class="td" style="width: 10%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						Costo Extra
					</td>
					<td class="td" style="width: 15%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:12px;">
						Costo Interno
					</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 5%;">1</td>
					<td class="td" style="width: 40%;"><?php if($Respuesta["data"][0]["Mant_RAC1"]!=null){echo htmlentities($Respuesta["data"][0]["Mant_RAC1"]);} ?></td>
					<td class="td" style="width: 10%;" align="right"><?php if($Respuesta["data"][0]["Cantidad_1"]!=null){echo htmlentities($Respuesta["data"][0]["Cantidad_1"]);} ?></td>
					<td class="td" style="width: 10%;" align="right"><?php if($Respuesta["data"][0]["Costo_1"]!=null){echo htmlentities($Respuesta["data"][0]["Costo_1"]);} ?></td>
					<td class="td" style="width: 10%;" align="right">Costos Materiales</td>
					<td class="td" style="width: 10%;" align="right"><?php if($Respuesta["data"][0]["Costos_Materiales_CE"]!=null){echo htmlentities($Respuesta["data"][0]["Costos_Materiales_CE"]);} ?></td>
					<td class="td" style="width: 15%;" align="right"><?php if($Respuesta["data"][0]["Costos_Materiales_CI"]!=null){echo htmlentities($Respuesta["data"][0]["Costos_Materiales_CI"]);} ?></td>
					
				</tr>
				<tr id="tr">
					<td class="td" style="width: 5%;">2</td>
					<td class="td" style="width: 40%;"><?php if($Respuesta["data"][0]["Mant_RAC2"]!=null){echo htmlentities($Respuesta["data"][0]["Mant_RAC2"]);} ?></td>
					<td class="td" style="width: 10%;" align="right"><?php if($Respuesta["data"][0]["Cantidad_2"]!=null){echo htmlentities($Respuesta["data"][0]["Cantidad_2"]);} ?></td>
					<td class="td" style="width: 10%;" align="right"><?php if($Respuesta["data"][0]["Costo_2"]!=null){echo htmlentities($Respuesta["data"][0]["Costo_2"]);} ?></td>
					<td class="td" style="width: 10%;" align="right">Mano de obra</td>
					<td class="td" style="width: 10%;" align="right"><?php if($Respuesta["data"][0]["Mano_Obra_CE"]!=null){echo htmlentities($Respuesta["data"][0]["Mano_Obra_CE"]);} ?></td>
					<td class="td" style="width: 15%;" align="right"><?php if($Respuesta["data"][0]["Mano_Obra_CI"]!=null){echo htmlentities($Respuesta["data"][0]["Mano_Obra_CI"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 5%;">3</td>
					<td class="td" style="width: 40%;"><?php if($Respuesta["data"][0]["Mant_RAC3"]!=null){echo htmlentities($Respuesta["data"][0]["Mant_RAC3"]);} ?></td>
					<td class="td" style="width: 10%;" align="right"><?php if($Respuesta["data"][0]["Cantidad_3"]!=null){echo htmlentities($Respuesta["data"][0]["Cantidad_3"]);} ?></td>
					<td class="td" style="width: 10%;" align="right"><?php if($Respuesta["data"][0]["Costo_3"]!=null){echo htmlentities($Respuesta["data"][0]["Costo_3"]);} ?></td>
					<td class="td" style="width: 10%;" align="right"><strong>Total:</strong></td>
					<td class="td" style="width: 10%;" align="right"><?php if($Respuesta["data"][0]["Total_CE"]!=null){echo htmlentities($Respuesta["data"][0]["Total_CE"]);} ?></td>
					<td class="td" style="width: 15%;" align="right"><?php if($Respuesta["data"][0]["Total_CI"]!=null){echo htmlentities($Respuesta["data"][0]["Total_CI"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 5%;">4</td>
					<td class="td" style="width: 40%;"><?php if($Respuesta["data"][0]["Mant_RAC4"]!=null){echo htmlentities($Respuesta["data"][0]["Mant_RAC4"]);} ?></td>
					<td class="td" style="width: 10%;" align="right"><?php if($Respuesta["data"][0]["Cantidad_4"]!=null){echo htmlentities($Respuesta["data"][0]["Cantidad_4"]);} ?></td>
					<td class="td" style="width: 10%;" align="right"><?php if($Respuesta["data"][0]["Costo_4"]!=null){echo htmlentities($Respuesta["data"][0]["Costo_4"]);} ?></td>
					<td class="td" style="width: 10%;" align="right"><strong>Horas: </strong><?php if($Respuesta["data"][0]["Horas"]!=null){echo $Respuesta["data"][0]["Horas"];} ?></td>
					<td class="td" colspan="2" align="right"><strong>Ahorro:</strong> <?php if($Respuesta["data"][0]["Ahorro"]!=null){echo $Respuesta["data"][0]["Ahorro"];} ?></td>
				</tr>
			</tbody>
		</table>
		</nobreak>
		<br>
		<nobreak>
		<?php
			if($Respuesta["data"][0]["Id_Area"]==1){
		?>
			<table id="tbl" border cellpadding="10"  cellspacing="0">
				<thead class="thead">
				<tr id="tr">
					<td  class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px">NOMBRE Y FIRMA DEL USUARIO RESPONSABLE DEL ACTIVO</td>
				</tr>
				</thead>
				<tbody class="tbody">
					<tr id="tr">
						<td class="td sign" style="width: 100%;">Firma	<br><br><br><br><br></td>
					</tr>
					<tr id="tr">
						<td class="td author" align="center" style="width: 100%;"><?php if($Respuesta["data"][0]["Responsable_Activo"]!=null){echo htmlentities($Respuesta["data"][0]["Responsable_Activo"]);} ?></td>
					</tr>
				</tbody>
			</table>
		
		
		<?php		
		
			}else{
		?>
		<table id="tbl" border cellpadding="10"  cellspacing="0">
		  <thead class="thead">
			<tr id="tr">
			  <td colspan="2" class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px">NOMBRE Y FIRMA RESPONSABLES</td>
			</tr>
		  </thead>
		  <tbody class="tbody">
			<tr id="tr">
			  <td class="td" style="width: 50%;">USUARIO RESPONSABLE DEL ACTIVO</td>
			  <td class="td" style="width: 50%;">GESTOR ASIGNADO A LA ACTIVIDAD</td>
			</tr>
			<tr id="tr">
			  <td class="td sign" style="width: 50%;">Firma	<br><br><br><br><br></td>
			  <td class="td sign" style="width: 50%;">Firma	<br><br><br><br><br></td>
			</tr>
			<tr id="tr">
			  <td class="td author" align="center" style="width: 50%;"><?php if($Respuesta["data"][0]["Responsable_Activo"]!=null){echo htmlentities($Respuesta["data"][0]["Responsable_Activo"]);} ?></td>
			  <td class="td author" align="center" style="width: 50%;"><?php if($Respuesta["data"][0]["Gestor_Asignado"]!=null){echo htmlentities($Respuesta["data"][0]["Gestor_Asignado"]);} ?></td>
			</tr>
			<tr id="tr">
			  <td class="td" colspan="2" align="center">USUARIO EJECUTANTE DE LA ACTIVIDAD</td>
			</tr>
			<tr id="tr">
			  <td class="td sign" colspan="2">Firma	<br><br><br><br><br></td>
			</tr>
			<tr id="tr">
			  <td class="td author" align="center" colspan="2"><?php if($Respuesta["data"][0]["Nombre_Ejecutante"]!=null){echo htmlentities($Respuesta["data"][0]["Nombre_Ejecutante"]);} ?></td>
			</tr>
			</tbody>
		</table>
		<?php
			}
		?>
		</nobreak>
		
		
	
	
  <!-- /.login-box-body -->
</page> 

<?php

if(rtrim(ltrim($Respuesta["data"][0]["url_documentos_adjuntos"]))!=null){
	if(rtrim(ltrim($Respuesta["data"][0]["url_documentos_adjuntos"]))!=''){
		$array_fotos = explode("---", $Respuesta["data"][0]["url_documentos_adjuntos"]);
		//$array_fotos[count($contador_img]=$Respuesta["data"][0]["url_documentos_adjuntos"];
		$contador_img=count($array_fotos);
	}
}

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
		if($contador_img>0){
			$contadoradjuntos_img=0;
			$tablafoto="";
			$tablafotolabel="";
			
			for($m=0;$m<$contador_img;$m++){
				
				$contadoradjuntos_img=$contadoradjuntos_img+1;
				
				if($contadoradjuntos_img%2!=0){
					$tablafotolabel.=	'<tr id="tr">';
				}
				
				$tablafotolabel.='<td class="td" style="width: 50%;">';
				$tablafotolabel.='	<div align="center">';
				$extension = explode(".", $array_fotos[$m]);
				if($extension[1]=="png"||$extension[1]=="jpg"||$extension[1]=="jpeg"||$extension[1]=="gif"){
					$tablafotolabel.='		<img src="../../../Archivos/Archivos-Actividades/Mantenimiento-Preventivo/'.$array_fotos[$m].'" width="260" height="260">';
				}else{
					$tablafotolabel.='		<a href="../../../Archivos/Archivos-Actividades/Mantenimiento-Preventivo/'.$array_fotos[$m].'" target="_blank">Descargar '.$extension[1].'</a>';
				}
				
				$tablafotolabel.='	</div>';
				$tablafotolabel.='	<br>';
				$tablafotolabel.='	<div style="text-align:center;background:#f4f4f4;font-size: 11px;">Adjunto '.$contadoradjuntos_img.'</div>';
				$tablafotolabel.='</td>';
				
				if($contadoradjuntos_img%2==0){
					$tablafotolabel.='</tr>';	
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
        $html2pdf->Output("mantenimiento_predictivo.pdf");
		// return the filename to ajax request
		//echo $filename;
	}
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>