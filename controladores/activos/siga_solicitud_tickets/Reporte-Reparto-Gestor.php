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
			<td class="td" style="width: 33.3%;" align="center"><h3>% de Participación<br>por Gestores<br>
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
		if($Respuesta_gestor!=""){
			echo "&nbsp;&nbsp;&nbsp;<strong> Gestor: </strong> "; 
			echo $Respuesta_gestor['data'][0]['Nombre_Usuario'];
		}
		?>
		
		</div>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<thead class="thead">
				<tr id="tr">
					<td class="td" style="width: 20%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">GESTORES</td>
					<td  class="td" style="width: 20%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">REPARTO %</td>
					<td  class="td" style="width: 15%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">CALIFICACIÓN</td>
					<td  class="td" style="width: 15%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">SEGUIMIENTO</td>
					<td  class="td" style="width: 15%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">X CALIFICAR</td>
					<td  class="td" style="width: 15%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">CERRADAS</td>
				</tr>
			</thead>
			<tbody class="tbody">
				<?php 
					$Con_cerradas=0;
					$Promedio_Calif=0;
					$Con_reasignados=0;
					$Con_seguimiento=0;
					$Con_por_calificar=0;
					if($Respuesta['totalCount']>0){
						for($i=0;$i < $Respuesta['totalCount']; $i++){
							$valor_porcent=0;
							$Con_cerradas=$Con_cerradas+$Respuesta['data'][$i]['Total'];
							$Con_seguimiento=$Con_seguimiento+$Respuesta['data'][$i]['Total_Seguimiento'];
							$Con_por_calificar=$Con_por_calificar+$Respuesta['data'][$i]['Total_Por_Calificar'];
							$Promedio_Calif=$Respuesta['data'][$i]['Promedio_General']+$Promedio_Calif;
							(boolean) $valor_porcent=((int)($Respuesta['data'][$i]['Total'])/(int)$Respuesta['Total'])*100;
							$valor_porcent=redondeado($valor_porcent,1);
				?>
							<tr id="tr">
								<td class="td" style="width: 20%;<?php echo $style_td;?>"  ><?php echo $Respuesta['data'][$i]['Nombre_Usuario']; ?></td>
								<td class="td" style="width: 20%;" align="center" valign="top"><strong><?php echo $valor_porcent; ?> %</strong></td>
								<td class="td" style="width: 15%;" align="center" valign="top" ><?php echo number_format($Respuesta['data'][$i]['Promedio_General'], 1); ?></td>			
								<td class="td" style="width: 15%;" align="center" valign="top"><?php if($Respuesta['data'][$i]['Total_Seguimiento']>0){echo $Respuesta['data'][$i]['Total_Seguimiento'];}?></td>
								<td class="td" style="width: 15%;" align="center" valign="top"><?php if($Respuesta['data'][$i]['Total_Por_Calificar']>0){echo $Respuesta['data'][$i]['Total_Por_Calificar'];}?></td>
								<td class="td" style="width: 15%;" align="center" valign="top"><?php echo $Respuesta['data'][$i]['Total']; ?></td>
							</tr>
				<?php
						}
					}
					
				?>
			
				
			</tbody>
		</table>
		<br>
		<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
			<tbody class="tbody">	
				<tr id="tr">
					<td class="td" style="width: 20%;<?php echo $style_td;?>"  >Totales</td>
					<td class="td" style="width: 20%;" align="center" valign="top"><strong>100 %</strong></td>
					<td class="td" style="width: 15%;" align="center" valign="top" ><?php  echo number_format(($Promedio_Calif/$Respuesta['totalCount']),1)?></td>			
					<td class="td" style="width: 15%;" align="center" valign="top"><?php  echo $Con_seguimiento;?></td>
					<td class="td" style="width: 15%;" align="center" valign="top"><?php  echo $Con_por_calificar;?></td>
					<td class="td" style="width: 15%;" align="center" valign="top"><?php  echo $Con_cerradas;?></td>
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
        $html2pdf->Output("Reporte-Por-Gestor.pdf");
		// return the filename to ajax request
		//echo $filename;
	}
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>