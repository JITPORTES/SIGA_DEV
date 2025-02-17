<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_solicitud_tickets/Siga_solicitud_ticketsDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_solicitud_tickets/Siga_solicitud_ticketsDAO.Class.php");
include_once(dirname(__FILE__)."/../../../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php");

include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_usuarios/Siga_usuariosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_usuarios/Siga_usuariosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php");

include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ticket_seccion/Siga_cat_ticket_seccionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_ticket_seccion/Siga_cat_ticket_seccionDAO.Class.php");
include_once(dirname(__FILE__)."/../../../fachadas/activos/siga_cat_ticket_seccion/Siga_cat_ticket_seccionFacade.Class.php");

include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");

function redondeado ($numero, $decimales) { 
   $factor = pow(10, $decimales); 
   return (round($numero*$factor)/$factor); 
}


@$Fecha_Inicial=$_GET["Fecha_Inicial"];
@$Fecha_Final=$_GET["Fecha_Final"];
@$Id_Area=$_GET["Id_Area"];
@$Id_Seccion=$_GET["Id_Seccion"];
@$Id_Gestor=$_GET["Id_Gestor"];


//////////////////////////////Solicitud Tickets
//Instanciamos un obbejeto de esta misma clase "Siga_vale_resguardoFacade";
$siga_solicitud_ticketsFacade = new Siga_solicitud_ticketsFacade();
$siga_solicitud_ticketsDto = new Siga_solicitud_ticketsDTO();
//Cargamos las variables mediante el metodo set
$siga_solicitud_ticketsDto->setEstatus_Reg("1");
$siga_solicitud_ticketsDto->setId_Area($Id_Area);
$siga_solicitud_ticketsDto->setSeccion($Id_Seccion);
$siga_solicitud_ticketsDto->setId_Gestor($Id_Gestor);
//Realizamos la consulta y le pasamos el objeto con las variables cargadas
$Respuesta=json_decode($siga_solicitud_ticketsFacade->selectreporte_por_reparto($siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final), true);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////Seccion
//Instanciamos un obbejeto de esta misma clase "Siga_vale_resguardoFacade";
$Respuesta_seccion="";
if($Id_Seccion!=""&&$Id_Seccion!="-1"){

$siga_cat_ticket_seccionFacade = new Siga_cat_ticket_seccionFacade();
$siga_cat_ticket_seccionDto = new Siga_cat_ticket_seccionDTO();
//Cargamos las variables mediante el metodo set
$siga_cat_ticket_seccionDto->setId_Seccion($Id_Seccion);
//Realizamos la consulta y le pasamos el objeto con las variables cargadas
$Respuesta_seccion=json_decode($siga_cat_ticket_seccionFacade->selectSiga_cat_ticket_seccion($siga_cat_ticket_seccionDto), true);
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////Gestor
//Instanciamos un obbejeto de esta misma clase "Siga_vale_resguardoFacade";
$Respuesta_gestor="";
if($Id_Gestor!=""&&$Id_Gestor!="-1"){

$siga_usuariosFacade = new Siga_usuariosFacade();
$siga_usuariosDto = new Siga_usuariosDTO();
//Cargamos las variables mediante el metodo set
$siga_usuariosDto->setEstatus_Reg("1");
$siga_usuariosDto->setId_Usuario($Id_Gestor);
//Realizamos la consulta y le pasamos el objeto con las variables cargadas
$Respuesta_gestor=json_decode($siga_usuariosFacade->selectSiga_usuarios($siga_usuariosDto), true);
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
			<td class="td" style="width: 33.3%;" align="center"><h3>Reporte de <br>Calificación por Gestor<br>
			</h3></td>
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
  
		<div align="center"><?php echo "<strong>Fecha Inicial: </strong> "; 
		echo $Fecha_Inicial;echo "&nbsp;&nbsp;&nbsp;<strong> Fecha Final: </strong> "; 
		echo $Fecha_Final;
		if($Respuesta_seccion!=""){
			echo "&nbsp;&nbsp;&nbsp;<strong> Sección: </strong> "; 
			echo $Respuesta_seccion['data'][0]['Desc_Seccion'];
		}
		
		$Promedio_Final=$Respuesta['data'][0]['Solucion_Ofrecida_Promedio']+$Respuesta['data'][0]['Actitud_Servicio_Promedio']+$Respuesta['data'][0]['Tiempo_Respuesta_Promedio'];
		?>
		
		</div>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
					<td class="td" style="border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;" colspan='3'><?php echo $Respuesta_gestor['data'][0]['Nombre_Usuario']; ?></td>
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">CALIFICACIÓN</td>
					<td  class="td" style="width: 33.33%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">DESCRIPCIÓN</td>
					<td  class="td" style="width: 33.33%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">PROMEDIO</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<tr id="tr">
					<td class="td" style="width: 33.33%;<?php echo $style_td;?>"  >SOLUCIÓN OFRECIDA</td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">EXCELENTE</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >10</td>			
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%;"></td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">MUY BUENO</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >8</td>			
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%;"></td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">BUENO</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >6</td>			
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%;"></td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">MALO</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >4</td>			
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%;"></td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">MUY MALO</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >2</td>			
				</tr>
				<tr id="tr">
					<td class="td" colspan="2" align="right"><strong>PROMEDIO</strong></td>
					<td class="td" style="width: 33.33%;" align="center" valign="top"><strong><?php echo number_format($Respuesta['data'][0]['Solucion_Ofrecida_Promedio'],2); ?></strong></td>			
				</tr>
				<tr id="tr">
					<td class="td" colspan="3"></td>	
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%;<?php echo $style_td;?>" >ACTITUD DE SERVICIO</td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">EXCELENTE</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >10</td>			
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%;"></td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">MUY BUENO</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >8</td>			
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%;"></td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">BUENO</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >6</td>			
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%;"></td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">MALO</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >4</td>			
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%;"></td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">MUY MALO</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >2</td>			
				</tr>
				<tr id="tr">
					<td class="td" colspan="2" align="right"><strong>PROMEDIO</strong></td>
					<td class="td" style="width: 33.33%;" align="center" valign="top"><strong><?php echo number_format($Respuesta['data'][0]['Actitud_Servicio_Promedio'],2); ?></strong></td>			
				</tr>
				<tr id="tr">
					<td class="td" colspan="3"></td>	
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%;<?php echo $style_td;?>" >TIEMPO DE RESPUESTA</td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">EXCELENTE</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >10</td>			
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%;"></td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">MUY BUENO</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >8</td>			
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%;"></td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">BUENO</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >6</td>			
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%;"></td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">MALO</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >4</td>			
				</tr>
				<tr id="tr">
					<td class="td" style="width: 33.33%;"></td>
					<td class="td" style="width: 33.33%;" align="right" valign="top">MUY MALO</td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" >2</td>			
				</tr>
				<tr id="tr">
					<td class="td" colspan="2" align="right"><strong>PROMEDIO</strong></td>
					<td class="td" style="width: 33.33%;" align="center" valign="top"><strong><?php echo number_format($Respuesta['data'][0]['Tiempo_Respuesta_Promedio'],2); ?></strong></td>			
				</tr>
				
			
				
			</tbody>
		</table>
		<br>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<tbody class="tbody">	
				<tr id="tr">
					<td class="td" style="width: 33.33%;<?php echo $style_td;?>"  >TOTALES</td>
					<td class="td" style="width: 33.33%;" align="right" valign="top"><strong>PROMEDIO FINAL</strong></td>
					<td class="td" style="width: 33.33%;" align="center" valign="top" ><strong><?php  echo number_format(($Promedio_Final/3),2)?></strong></td>
				</tr>
			</tbody>
		</table>
		
		
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
        $html2pdf->Output("Reporte-Calificacion-Por-Gestor.pdf");
		// return the filename to ajax request
		//echo $filename;
	}
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>