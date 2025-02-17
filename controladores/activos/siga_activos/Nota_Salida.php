<?php



date_default_timezone_set('America/Mexico_City');
ob_start();
//Estilos css
require_once(dirname(__FILE__).'/../../../html2pdf/css.php');
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");

@$Id_Nota_Salida=$_GET["key"];

$Area="";
$Ubic_Prim="";
$Ubic_Sec="";
$Motivo_Salida="";
$Empresa_Que_Recibe="";
$Nombre_Contacto="";
$Telefono="";
$Correo="";
$Observaciones="";
$Fech_Firma_Recibe="";
$Realiza_Nota="";
$Autoriza_Salida="";
$Recibe="";
$baseFromJavascript = "";
$Tipo_Solicitud="";
$Firma1="";
$Firma2="";
$Firma3="";
$Url_Adjuntos="";
if($Id_Nota_Salida!=""){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql="
		select 
		(select top 1 Nom_Area from siga_catareas where siga_catareas.Id_Area=siga_nota_salida.Id_Area_Realiza) as Area,
		(select top 1 Desc_Ubic_Prim from siga_cat_ubic_prim where siga_cat_ubic_prim.Id_Ubic_Prim=siga_nota_salida.Id_Ubic_Prim) as Ubic_Prim,
		(select top 1 Desc_Ubic_Sec from siga_cat_ubic_sec where siga_cat_ubic_sec.Id_Ubic_Sec=siga_nota_salida.Id_Ubic_Sec) as Ubic_Sec, 
		(select top 1 Desc_Motivo_Alta from siga_cat_motivo_salida where siga_cat_motivo_salida.Id_Motivo_Salida=siga_nota_salida.Id_Motivo_Salida) as Motivo_Salida, 
		convert(varchar, Fech_Firma_Recibe, 20) as Fecha, 
		*
		from siga_nota_salida where Id_Nota_Salida=".$Id_Nota_Salida." and Estatus_Reg<>3
	";
	$proveedor->execute($sql);
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Area=$row["Area"];
				$Ubic_Prim=$row["Ubic_Prim"];
				$Ubic_Sec=$row["Ubic_Sec"];
				$Motivo_Salida=$row["Motivo_Salida"];
				$Empresa_Que_Recibe=$row["Empresa_Recibe"];
				$Nombre_Contacto=$row["Nombre_Contacto"];
				$Telefono=$row["Telefono_Contacto"];
				$Correo=$row["Mail_Contacto"];
				$Observaciones=$row["Observaciones"];
				$Fech_Firma_Recibe=$row["Fecha"];
				$Tipo_Solicitud=$row["Tipo_Solicitud"];
				$Realiza_Nota=$row["Nombre_Realiza_Nota"];
				$Autoriza_Salida=$row["Nombre_Quien_Autoriza"];
				$Recibe=$row["Nombre_Contacto"];
				$Firma1=$row["Firma_Realiza_Nota"];
				$Firma2=$row["Firma_Quien_Autoriza"];
				$Firma3=$row["Firma_Quien_Recibe"];
				$Url_Adjuntos=$row["Url_Adjuntos"];		
			}
		}
	}		
}


?>


<page backtop="35mm" backbottom="5mm" backleft="1mm" backright="1mm" orientation="portrait">
	<page_header>
	<table id="tbl" style="width: 100%;">
		<tr id="tr">
			<td class="td" style="width: 33.3%;"><div class="fotochs"><img src="logo.png"  class="logos" style="width:105%"></div></td>
			<td class="td" style="width: 33.3%;" align="center"><h3>Formato<br/>De Salida</h3></td>
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
  
	
	  
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
				<td colspan="6" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;"><strong>DATOS GENERALES (TIC)</strong></td>
				</tr>
			</thead>
			<tbody class="tbody">
			   <tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Folio:</td>
					<td class="td" style="width: 20%;"><?php echo $Id_Nota_Salida; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Fecha y Hora de Salida:</td>
					<td class="td" style="width: 20%;"><?php echo $Fech_Firma_Recibe; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Area:</td>
					<td class="td" style="width: 20%;"><?php echo $Area; ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Ubicaci&oacute;n Primaria:</td>
					<td class="td" style="width: 20%;"><?php echo $Ubic_Prim; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Ubicaci&oacute;n Secundaria:</td>
					<td class="td" style="width: 20%;"><?php echo $Ubic_Sec; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Motivo de Salida:</td>
					<td class="td" style="width: 20%;"><?php echo $Motivo_Salida;; ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Empresa que Recibe:</td>
					<td class="td" style="width: 20%;"><?php echo $Empresa_Que_Recibe;?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Nombre del Contacto:</td>
					<td class="td" style="width: 20%;"><?php echo $Nombre_Contacto; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Teléfono:</td>
					<td class="td" style="width: 20%;"><?php echo $Telefono;?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Correo:</td>
					<td class="td" style="width: 20%;"><?php echo $Correo; ?></td>
					<td class="td" style="width: 13.33%;<?php echo $style_td;?>">Observaciones:</td>
					<td class="td" colspan="3" style="width: 53.33%;"><?php echo $Observaciones; ?></td>
				</tr>
				
			</tbody>
		</table>
		<br>
		<br>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
				<td colspan="7" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;"><strong>DETALLE DE EQUIPOS</strong></td>
				</tr>
			</thead>
			<tbody class="tbody">
			  <tr id="tr">
					<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Cantidad:</td>
					<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Unidad:</td>
					<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Marca:</td>
					<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Modelo:</td>
					<td class="td" style="width: 14.28%;<?php echo $style_td;?>">Descripción:</td>
					<?php 
					if($Tipo_Solicitud==1){
						echo '<td class="td" style="width: 14.28%;'.$style_td.'">Id Solicitud:</td>';
					}
					
					if($Tipo_Solicitud==2){
						echo '<td class="td" style="width: 14.28%;'.$style_td.'">No. Inventario:</td>';
					}
					
					?>
					
					<td class="td" style="width: 14.28%;<?php echo $style_td;?>">No. Serie:</td>
				</tr>
				<?php 
					if($Id_Nota_Salida!=""){
						$proveedor_det = new Proveedor('sqlserver', 'activos');
						$proveedor_det->connect();
						
						$sql="
							select 
								Id_Solicitud_DNS
								,Id_Activo_DNS
								,AF_BC_DNS
								,Cantidad_DNS
								,Unidad_DNS
								,Marca_DNS
								,Modelo_DNS
								,Descripcion_DNS
								,No_Serie_DNS
							from siga_det_nota_salida where Id_Nota_Salida_DNS=".$Id_Nota_Salida." and Estatus_Reg_DNS<>3
						";
						$proveedor_det->execute($sql);
						if (!$proveedor_det->error()){
							if ($proveedor_det->rows($proveedor_det->stmt) > 0) {
								while ($row_det = $proveedor_det->fetch_array($proveedor_det->stmt, 0)) {
									echo '<tr id="tr">';
									echo '	<td class="td" style="width: 14.28%;">'.$row_det["Cantidad_DNS"].'</td>';
									echo '	<td class="td" style="width: 14.28%;">'.$row_det["Unidad_DNS"].'</td>';
									echo '	<td class="td" style="width: 14.28%;">'.$row_det["Marca_DNS"].'</td>';
									echo '	<td class="td" style="width: 14.28%;">'.$row_det["Modelo_DNS"].'</td>';
									echo '	<td class="td" style="width: 14.28%;">'.$row_det["Descripcion_DNS"].'</td>';
									if($Tipo_Solicitud==1){
										echo '	<td class="td" style="width: 14.28%;">'.$row_det["Id_Solicitud_DNS"].'</td>';
									}
									
									if($Tipo_Solicitud==2){
										echo '	<td class="td" style="width: 14.28%;">'.$row_det["AF_BC_DNS"].'</td>';	
									}
									
									
									echo '	<td class="td" style="width: 14.28%;">'.$row_det["No_Serie_DNS"].'</td>';
									echo '</tr>';
								}
							}
						}
					}
				?>
				
			</tbody>
		</table>
		<br>
		<br>
		
		
		
		<nobreak>
		<table id="tbl" border cellpadding="10"  cellspacing="0">
		  <thead class="thead">
			<tr id="tr">
			  <td colspan="3" class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px">NOMBRE Y FIRMA RESPONSABLES</td>
			</tr>
		  </thead>
		  <tbody class="tbody">
			<tr id="tr">
			  <td class="td" style="width: 33.33%;">REALIZA NOTA</td>
			  <td class="td" style="width: 33.33%;">AUTORIZA SALIDA</td>
			  <td class="td" style="width: 33.33%;">RECIBE</td>
			</tr>
			<tr id="tr">
			  <td class="td sign" style="width: 33.33%;">Firma	<br><br><?php if($Firma1!=""){ echo '<img src="'.$Firma1.'" width="200" >	';}?></td>
			  <td class="td sign" style="width: 33.33%;">Firma	<br><br><?php if($Firma2!=""){ echo '<img src="'.$Firma2.'" width="200" >	';}?></td>
			  <td class="td sign" style="width: 33.33%;">Firma	<br><br><?php if($Firma3!=""){ echo '<img src="'.$Firma3.'" width="200" >	';}?></td>
			</tr>
			<tr id="tr">
			  <td class="td author" align="center" style="width: 33.33%;"><?php echo $Realiza_Nota ?></td>
			  <td class="td author" align="center" style="width: 33.33%;"><?php echo $Autoriza_Salida;?></td>
			  <td class="td author" align="center" style="width: 33.33%;"><?php echo $Recibe;?></td>
			</tr>
		  </tbody>
		</table>
		</nobreak>
	<br>
	
  <!-- /.login-box-body -->
</page> 





<?php if($Url_Adjuntos!=""){?>
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
		$Imajenes = explode("---", $Url_Adjuntos);
		
		if(count($Imajenes)>0){
			$contadoradjuntos_img=0;
			$tablafoto="";
			$tablafotolabel="";
			
			for($m=0;$m<count($Imajenes);$m++){
				
				$contadoradjuntos_img=$contadoradjuntos_img+1;
				if($contadoradjuntos_img%2!=0){
					$tablafotolabel.=	'<tr id="tr">';
				}
				
				$tablafotolabel.='<td class="td" style="width: 50%;"><div align="center"><img src="../../../Archivos/Archivos-Nota-Salida/'.$Imajenes[$m].'" width="260" height="260"></div><br><div style="text-align:center;background:#f4f4f4;font-size: 11px;">Foto '.$contadoradjuntos_img.'</div></td>';
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
        $html2pdf->Output("Nota de Salida (Folio: ".$Id_Nota_Salida.").pdf", "D");
				
		// return the filename to ajax request
		//echo $filename;
	}
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>
