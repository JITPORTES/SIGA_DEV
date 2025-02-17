<?php


@$url_img_cat=$_POST["url_img_cat"];
@$Fech_In=$_POST["Fech_In"];
@$Fech_Fin=$_POST["Fech_Fin"];

@$Seccion=$_POST["Seccion"];
@$Gestor=$_POST["Gestor"];


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
			<td class="td" style="width: 33.3%;"><img src="logo.png" alt="" class="logos" width="20px" height="20px"></td>
			<td class="td" style="width: 33.3%;" align="center"><h3>Reporte de <br>Mesa de Ayuda<br></h3></td>
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
  
	<div align="center">
	<?php echo "<strong>Fecha Inicial: </strong> "; 
	echo $Fech_In;echo "&nbsp;&nbsp;&nbsp;<strong> 
	Fecha Final: </strong> "; echo $Fech_Fin;
	if($Seccion!=""){
		echo "&nbsp;&nbsp;&nbsp;"; 
		echo "<strong>Seccion: </strong> "; 
		echo $Seccion;echo "&nbsp;&nbsp;&nbsp;"; 
	}
	
	if($Gestor!=""){
		echo "<strong>Gestor: </strong> "; 
		echo $Gestor;
	}
	?>
	</div>
	<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
		<tbody class="tbody">	
			<tr id="tr">
				<td class="td" style="width: 100%;" align="center"><img src="<?php echo $url_img_cat; ?>"></td>
			</tr>
		</tbody>
	</table>
	
	<?php echo $url_img_cat; ?>	
		
	<br>
  <!-- /.login-box-body -->
</page> 

  
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
        $html2pdf->Output("Reporte-Categoria.pdf");
		// return the filename to ajax request
		//echo $filename;
	}
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>