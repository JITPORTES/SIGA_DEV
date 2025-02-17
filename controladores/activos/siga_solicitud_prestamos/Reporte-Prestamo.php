<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_solicitud_prestamos/Siga_solicitud_prestamosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_solicitud_prestamos/Siga_solicitud_prestamosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../fachadas/activos/siga_solicitud_prestamos/Siga_solicitud_prestamosFacade.Class.php");



include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");


//Recibimos nuestra variable mediante GET
@$Id_Solicitud=$_GET["Id_Solicitud"];

//////////////////////////////Solicitud Tickets
//Instanciamos un obbejeto de esta misma clase "Siga_vale_resguardoFacade";
$siga_solicitud_prestamosFacade = new Siga_solicitud_prestamosFacade();
$siga_solicitud_prestamosDto = new Siga_solicitud_prestamosDTO();
$siga_solicitud_prestamosDto->setId_Solicitud($Id_Solicitud);
//Realizamos la consulta y le pasamos el objeto con las variables cargadas
$Respuesta=json_decode($siga_solicitud_prestamosFacade->reporte_prestamo($siga_solicitud_prestamosDto,""), true);

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
			<td class="td" style="width: 33.3%;"><div class="fotochs"><img src="..\..\..\dist\img\logo.png"  class="logos" style="width:105%"></div></td>
			<td class="td" style="width: 33.3%;" align="center"><?php  if($Respuesta["data"][0]["Estatus_Proceso"]=="4"){ echo "<h3>Devolución de<br/>Equipo</h3>"; }else{ echo "<h3>Prestamo de<br/>Equipo</h3>"; }?></td>
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
					<td class="td" style="width: 11%;<?php echo $style_td;?>"  >No. Solicitud Prestamo:</td>
					<td class="td" style="width: 20%;" valign="top"><?php  if($Respuesta["data"][0]["Id_Solicitud"]!=null){echo htmlentities($Respuesta["data"][0]["Id_Solicitud"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">&Aacute;rea:</td>
					<td class="td" style="width: 31%;" valign="top"><?php  if($Respuesta["data"][0]["Nom_Area"]!=null){echo htmlentities($Respuesta["data"][0]["Nom_Area"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Prioridad:</td>
					<td class="td" style="width: 18%;" valign="top"><?php  if($Respuesta["data"][0]["Prioridad"]!=null){echo htmlentities($Respuesta["data"][0]["Prioridad"]);} ?></td>
				</tr>
				
				<tr id="tr">
					<td class="td" style="width: 11%;<?php echo $style_td;?>"  >Fecha Préstamo / Devolución:</td>
					<td class="td" style="width: 20%;" valign="top"><?php echo $Respuesta["data"][0]["Fecha_Prestamo"]; echo" - "; echo $Respuesta["data"][0]["Fecha_Devolucion"];?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Gestor:</td>
					<td class="td" style="width: 31%;" valign="top"><?php  if($Respuesta["data"][0]["Nom_Gestor"]!=null){echo htmlentities($Respuesta["data"][0]["Nom_Gestor"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Fecha Solicitud:</td>
					<td class="td" style="width: 18%;" valign="top"><?php if($Respuesta["data"][0]["Fech_Inser"]!=null){echo htmlentities($Respuesta["data"][0]["Fech_Inser"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 11%;<?php echo $style_td;?>">Descripción:</td>
					<td class="td" style="width: 89%;" valign="top" colspan="5"><?php if($Respuesta["data"][0]["Desc_Motivo_Reporte"]!=null){echo htmlentities($Respuesta["data"][0]["Desc_Motivo_Reporte"]);} ?></td>
				</tr>
				
				
			</tbody>
		</table>
		</nobreak>
		<br>
		<nobreak>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
					<td colspan="6" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">ASIGNACION DEL PRESTAMO</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 11%;<?php echo $style_td;?>"  >Colaborador:</td>
					<td class="td" style="width: 20%;" valign="top"><?php  if($Respuesta["data"][0]["Nom_Solicitante"]!=null){echo htmlentities($Respuesta["data"][0]["Nom_Solicitante"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">No. Empleado:</td>
					<td class="td" style="width: 31%;" valign="top"><?php  if($Respuesta["data"][0]["No_Usuario"]!=null){echo htmlentities($Respuesta["data"][0]["No_Usuario"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Gerencia:</td>
					<td class="td" style="width: 18%;" valign="top"><?php  if($Respuesta["data"][0]["gerencia"]!=null){echo htmlentities($Respuesta["data"][0]["gerencia"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 11%;<?php echo $style_td;?>"  >Departamento:</td>
					<td class="td" style="width: 20%;" valign="top"><?php  if($Respuesta["data"][0]["departamento"]!=null){echo htmlentities($Respuesta["data"][0]["departamento"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Puesto:</td>
					<td class="td" style="width: 31%;" valign="top"><?php  if($Respuesta["data"][0]["puesto"]!=null){echo htmlentities($Respuesta["data"][0]["puesto"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Dirección</td>
					<td class="td" style="width: 18%;" valign="top"><?php  if($Respuesta["data"][0]["direccion"]!=null){echo htmlentities($Respuesta["data"][0]["direccion"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 11%;<?php echo $style_td;?>"  >Teléfono (ext):</td>
					<td class="td" style="width: 20%;" valign="top"><?php  if($Respuesta["data"][0]["ext_telefonica"]!=null){echo htmlentities($Respuesta["data"][0]["ext_telefonica"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Correo:</td>
					<td class="td" colspan="3" style="width: 31%;" valign="top"><?php  if($Respuesta["data"][0]["email"]!=null){echo htmlentities($Respuesta["data"][0]["email"]);} ?></td>
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
					<td class="td" style="width: 11%;<?php echo $style_td;?>"  >AF/BC:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["AF_BC"]!=null){echo htmlentities($Respuesta["data"][0]["AF_BC"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Nombre:</td>
					<td class="td" style="width: 31%;" valign="top"><?php if($Respuesta["data"][0]["Nombre_Activo"]!=null){echo htmlentities($Respuesta["data"][0]["Nombre_Activo"]);} ?></td>
					<td class="td" style="width: 28%;" rowspan="4" colspan="2" align="center">
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
					<td class="td" style="width: 11%;<?php echo $style_td;?>">Marca:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Marca"]!=null){echo htmlentities($Respuesta["data"][0]["Marca"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>" rowspan="3">Descripci&oacute;n:</td>
					<td class="td" style="width: 29%;" rowspan="3" valign="top"><?php if($Respuesta["data"][0]["Desc_Larga"]!=null){echo htmlentities($Respuesta["data"][0]["Desc_Larga"]);} ?></td>
					
				</tr>
				<tr id="tr">
					<td class="td" style="width: 11%;<?php echo $style_td;?>">Modelo:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Modelo"]!=null){echo htmlentities($Respuesta["data"][0]["Modelo"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 11%;<?php echo $style_td;?>">SN:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["NumSerie"]!=null){echo htmlentities($Respuesta["data"][0]["NumSerie"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 11%;<?php echo $style_td;?>">Ubicaci&oacute;n Primaria:</td>
					<td class="td" style="width: 20%;" valign="top"><?php if($Respuesta["data"][0]["Desc_Ubic_Prim"]!=null){echo htmlentities($Respuesta["data"][0]["Desc_Ubic_Prim"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Ubicaci&oacute;n Secundaria:</td>
					<td class="td" style="width: 31%;" valign="top"><?php if($Respuesta["data"][0]["Desc_Ubic_Sec"]!=null){echo htmlentities($Respuesta["data"][0]["Desc_Ubic_Sec"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Ubicaci&oacute;n Espec&iacute;fica:</td>
					<td class="td" style="width: 18%;" valign="top"><?php if($Respuesta["data"][0]["Especifica"]!=null){echo htmlentities($Respuesta["data"][0]["Especifica"]);} ?></td>
				
				</tr>
			</tbody>
		</table>
		</nobreak>
		<br>
		<nobreak>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
					<td  class="td" colspan="2" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">DATOS DEL CIERRE</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 11%;<?php echo $style_td;?>"  >Estado del Equipo:</td>
					<td class="td" style="width: 89%;" valign="top"><?php  if($Respuesta["data"][0]["TituloCierre"]!=null){echo htmlentities($Respuesta["data"][0]["TituloCierre"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 11%;<?php echo $style_td;?>"  >Accesorios:</td>
					<td class="td" style="width: 89%;" valign="top"><?php  if($Respuesta["data"][0]["Accesorios_Cierre"]!=null){echo htmlentities($Respuesta["data"][0]["Accesorios_Cierre"]);} ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 11%;<?php echo $style_td;?>"  >Comentarios:</td>
					<td class="td" style="width: 89%;" valign="top"><?php  if($Respuesta["data"][0]["ComentarioCierre"]!=null){echo htmlentities($Respuesta["data"][0]["ComentarioCierre"]);} ?></td>
				</tr>
			</tbody>
		</table>
		</nobreak>
		<?php  if($Respuesta["data"][0]["Estatus_Proceso"]=="4"){ ?>
		<br>
		<nobreak>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
					<td colspan="6" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">DATOS DEVOLUCIÓN</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 11%;<?php echo $style_td;?>"  >Fecha Entrega:</td>
					<td class="td" style="width: 20%;" valign="top"><?php  if($Respuesta["data"][0]["Fecha_Entrega"]!=null){echo htmlentities($Respuesta["data"][0]["Fecha_Entrega"]);} ?></td>
					<td class="td" style="width: 10%;<?php echo $style_td;?>">Comentarios Entrega:</td>
					<td class="td" style="width: 59%;" valign="top"><?php  if($Respuesta["data"][0]["ComentarioEntrega"]!=null){echo htmlentities($Respuesta["data"][0]["ComentarioEntrega"]);} ?></td>
				</tr>
			</tbody>
		</table>
		</nobreak>
		<?php } ?>
		<br>
		<nobreak>
		<table id="tbl" border cellpadding="10"  cellspacing="0">
		  <thead class="thead">
			<tr id="tr">
			  <td colspan="2" class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px">NOMBRE Y FIRMA RESPONSABLES</td>
			</tr>
		  </thead>
		  <tbody class="tbody">
			<tr id="tr">
			  <td class="td" style="width: 50%;">USUARIO SOLICITANTE</td>
			  <td class="td" style="width: 50%;">USUARIO GESTOR</td>
			</tr>
			<tr id="tr">
			  <td class="td sign" style="width: 50%;">
					Firma<br><br><br><br><br>
				</td>
			  <td class="td sign" style="width: 50%;">
					Firma	<br><br><br><br><br>
				</td>
			</tr>
			<tr id="tr">
			  <td class="td author" align="center" style="width: 50%;">	<?php  if($Respuesta["data"][0]["Nom_Solicitante"]!=null){echo htmlentities($Respuesta["data"][0]["Nom_Solicitante"]);} ?>
				</td>
			  <td class="td author" align="center" style="width: 50%;"> <?php  if($Respuesta["data"][0]["Nom_Gestor"]!=null){echo htmlentities($Respuesta["data"][0]["Nom_Gestor"]);} ?></td>
			</tr>
		  </tbody>
		</table>
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