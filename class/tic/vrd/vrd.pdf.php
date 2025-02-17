<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_vale_resguardo/Siga_vale_resguardoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_vale_resguardo/Siga_vale_resguardoDAO.Class.php");

include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_vale_resguardo/Siga_det_vale_resguardoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_det_vale_resguardo/Siga_det_vale_resguardoDAO.Class.php");

include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__) . "/../../../datos/logger/Logger.Class.php");
//Controlador
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_vale_resguardo/Siga_vale_resguardoController.Class.php");
////////////
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");

//Clase Fachada
class Siga_vale_resguardoFacade {
	private $proveedor;
	public function __construct() {
	}

	public function selectSiga_vale_resguardo_pdf($Siga_vale_resguardoDto){
		$Siga_vale_resguardoController = new Siga_vale_resguardoController();
		$Siga_vale_resguardoDto = $Siga_vale_resguardoController->selectSiga_vale_resguardo_pdf($Siga_vale_resguardoDto);
	
		//$jsonDto = new Encode_JSON();
		//return $jsonDto->encode($Siga_vale_resguardoDto);
		return $Siga_vale_resguardoDto;
	}
}


//Recibimos nuestra variable mediante GET
@$Id_Vale_Resguardo=$_GET["Id_Vale_Resguardo"];

//Instanciamos un obbejeto de esta misma clase "Siga_vale_resguardoFacade";
$siga_vale_resguardoFacade = new Siga_vale_resguardoFacade();
$siga_vale_resguardoDto = new Siga_vale_resguardoDTO();
//Cargamos las variables mediante el metodo set
$siga_vale_resguardoDto->setEstatus_Reg("1");
$siga_vale_resguardoDto->setId_Vale_Resguardo($Id_Vale_Resguardo);
//Realizamos la consulta y le pasamos el objeto con las variables cargadas
$Respuesta=$siga_vale_resguardoFacade->selectSiga_vale_resguardo_pdf($siga_vale_resguardoDto);
//echo $siga_vale_resguardoDto;


//Variables PDF
$Tipo_Vale="";
$Area="";
$Usuario_Vale_Res="";
$Num_Usuario="";
$Departamento="";
$Puesto="";
$Telefono_Ext="";
$Correo="";
$Observaciones="";
$Fech_Inser="";
$Telefono_Resp="";
$Correo_Resp="";
$Oficina_Resp="";
if($Respuesta["totalCount"]>0){
	$Tipo_Vale=$Respuesta["data"][0]["Desc_Tipo_Vale_Resg"];
	$Area=$Respuesta["data"][0]["Nom_Area"];
	$Usuario_Vale_Res=$Respuesta["data"][0]["Nombre_Solicitante"];
	$Num_Usuario=$Respuesta["data"][0]["Num_Empleado"];
	$Departamento=$Respuesta["data"][0]["Departamento"];
	$Fech_Inser=$Respuesta["data"][0]["Fech_Inser"];
	$Puesto=$Respuesta["data"][0]["Puesto"];
	$Telefono_Ext=$Respuesta["data"][0]["Extension_Tel"];
	$Correo=$Respuesta["data"][0]["Correo"];
	$Observaciones=$Respuesta["data"][0]["Observaciones"];
	$Nombre_Jefe_Area=$Respuesta["data"][0]["Nombre_Jefe_Area"];
	
	$Telefono_Resp=$Respuesta["data"][0]["Tel_Resp"];
	$Correo_Resp=$Respuesta["data"][0]["Correo_Resp"];
	$Oficina_Resp=$Respuesta["data"][0]["Oficina_Resp"];
}
date_default_timezone_set('America/Mexico_City');
ob_start();
?>

	

 <style type="text/css">
	<!--
	
	#encabezado {padding:2px 0; border-top: 0px solid; border-bottom: 1px solid; width:100%;}
	#encabezado .fila #col_1 {width: 24%}
	#encabezado .fila #col_2 {text-align:center; width: 55%; font-size: 12px; face:Arial;font-family: Arial; }
	#encabezado .fila #col_3 {width: 21%}
	
	#encabezado .fila #col_6 {width: 15%}
	#encabezado .fila #col_5 {width: 70%; font-size: 12px; face:Arial;font-family: Arial; }
	#encabezado .fila #col_7 {width: 15%}
	
	#footer {padding-top:5px 0; border-top: 1px solid; width:100%;}
	#footer .fila td {text-align:left; width:50%;}
	#footer .fila td span {font-size: 10px;}
	#footer .fila td div {font-size: 10px;text-align: right}
	
	#tbl
	{
		 width: 100%;
	}

	.text-center
	{
		text-align: center;
	}


	body { font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif; font-weight: 400; overflow-x: hidden; overflow-y: auto; }



	#pdf_1 #tbl .thead #tr .td{
	  text-align:center;
	  background:#19294a;
	  color:#fff;
	}
	
	#pdf_1 #tbl .tbody #tr .td{
	  border:1px solid #ccc;
	  font-size:11px;
	  padding: 4px;
	}
	#pdf_1 #tbl .tbody #tr.photo{
	  background:#f4f4f4;
	  color:#666;
	  text-align:center;
	}
	#pdf_1 #tbl .tbody tr.adjuntos td{
	  padding:1em 0;
	}
	#pdf_1 #tbl .tbody tr td.check img{
	  width:15px;
	  height:15px;
	  margin:0 auto;
	  display:block;
	}
	#pdf_1 #tbl .tbody #tr .sign{
	  vertical-align:top;
	  height:6em;
	  text-align:center;
	}
	#pdf_1 #tbl .tbody #tr .td .sign .comments{
	  text-align:left;
	}
	#pdf_1 #tbl .tbody #tr .td .author{
	  vertical-align:center;
	  text-align:center;
	}
	#pdf_1 #tbl .tbody #tr.faces .td{
	}
	#pdf_1 #tbl .tbody #tr.faces .td img{
	  margin:0 auto;
	  display:block;
	  width:40px;
	  vertical-align:middle;
	}
	.fotochs {border:0px solid; height:160px; width:160px; text-align:center}
	-->
  </style>


<page backtop="35mm" backbottom="5mm" backleft="1mm" backright="1mm" orientation="portrait">
	<page_header>
	<table id="tbl" style="width: 100%;">
		<tr id="tr">
			<td class="td" style="width: 33.3%;"><div class="fotochs"><img src="logo.png"  class="logos" style="width:100%"></div></td>
			<td class="td" style="width: 33.3%;" align="center"><h3>Vale de<br/>Resguardo</h3></td>
			<td class="td" style="width: 33.3%;" align="right"><br><div align="left" class="fotochs"><img src="..\..\..\dist\img\LOGO-SIGA.PNG" style="width:120%"></div></td>
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
	<table id="tbl" style="width: 100%;" border cellpadding="10"  cellspacing="0">
      <thead class="thead">
        <tr id="tr">
          <td colspan="2" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;"><strong>DATOS GENERALES</strong></td>
        </tr>
      </thead>
      <tbody class="tbody">
        <tr id="tr">
          <td class="td" style="width: 50%;font-size:11px">Fecha y Hora de Emisi&oacute;n: <?php echo substr($Fech_Inser, 0, 16); ?></td>
          <td class="td" style="width: 50%;font-size:11px">Tipo vale resguardo: <?php echo $Tipo_Vale; ?></td>
        </tr>
        <tr id="tr">
          <td class="td" style="width: 50%;">Área: <?php echo $Area; ?></td>
          <td class="td" style="width: 50%;">Jefe de área: <?php echo $Nombre_Jefe_Area; ?></td>
        </tr>
      </tbody>
    </table>
	<br>
    <table id="tbl" style="width: 100%;" border cellpadding="10"  cellspacing="0">
      <thead class="thead">
        <tr id="tr">
          <td colspan="3" class="td" style="width:100%; border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;"><strong>ASIGNACIÓN DEL RESGUARDO</strong></td>
        </tr>
      </thead>
      <tbody class="tbody">
        <tr id="tr">
          <td colspan="2"  class="td">Colaborador: <?php echo $Usuario_Vale_Res; ?></td>
          <td colspan="1"  class="td">No. Empleado: <?php echo $Num_Usuario; ?></td>
        </tr>
        <tr id="tr">
          <td class="td" style="width: 33.3%">Departamento: <?php echo $Departamento; ?></td>
          <td class="td" style="width: 33.3%">Puesto: <?php echo $Puesto; ?></td>
          <td class="td" style="width: 33.3%">Oficina: <?php echo $Oficina_Resp; ?></td>
        </tr>
        <tr id="tr">
          <td colspan="1" class="td">Teléfono (ext): <?php echo $Telefono_Resp;?> </td>
          <td colspan="2" class="td">Correo: <?php echo $Correo_Resp; ?> </td>
        </tr>
      </tbody>
    </table>
	<br>
    <table id="tbl" border cellpadding="10"  cellspacing="0">
      <thead class="thead">
        <tr id="tr">
          <td colspan="9" class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;"><strong>CONTROL DE ACTIVO FIJO</strong></td>
        </tr>
      </thead>
      <tbody class="tbody">
        <tr style="background:#bcbbbb;" id="tr">
          <td class="text-center td" style="width: 4%">No</td>
		  <td class="text-center td" style="width: 8%">AF/BC</td>
          <td  class="td text-center" style="width: 15%">Activo</td>
          <td  class="td text-center" style="width: 10%">Area</td>
          <td  class="td text-center" style="width: 15%">Ubicaci&oacute;n Primaria</td>
          <td  class="td text-center" style="width: 15%">Ubicaci&oacute;n Secundaria</td>
          <td  class="td text-center" style="width: 16%">No. Serie</td>
          <td  class="td text-center" style="width: 8%">Fech. Alta Act.</td>
          <td  class="td text-center" style="width: 9%">Estatus Activo</td>
        </tr>
		<?php 
		if($Respuesta["totalCountDetalle"]>0){
			for($i=0;$i<$Respuesta["totalCountDetalle"];$i++)
			{
		?>
				<tr id="tr">
				  <td class="td" style="width: 4%;font-size:9px"><?php echo ($i+1); ?></td>
				  <td class="td" style="width: 8%;font-size:9px"><?php if($Respuesta["data_Detalle"][$i]["AF_BC"]!=null){echo $Respuesta["data_Detalle"][$i]["AF_BC"];} ?></td>
				  <td class="td" style="width: 12%;font-size:9px"><?php if($Respuesta["data_Detalle"][$i]["Nombre_Activo"]!=null){echo $Respuesta["data_Detalle"][$i]["Nombre_Activo"];} ?></td>
				  <td class="td" style="width: 10%;font-size:9px"><?php if($Respuesta["data_Detalle"][$i]["Nom_Area"]!=null){echo $Respuesta["data_Detalle"][$i]["Nom_Area"];} ?></td>
				  <td class="td" style="width: 13%;font-size:9px"><?php if($Respuesta["data_Detalle"][$i]["Desc_Ubic_Prim"]!=null){echo $Respuesta["data_Detalle"][$i]["Desc_Ubic_Prim"];} ?></td>
				  <td class="td" style="width: 12%;font-size:9px"><?php if($Respuesta["data_Detalle"][$i]["Desc_Ubic_Sec"]!=null){echo $Respuesta["data_Detalle"][$i]["Desc_Ubic_Sec"];} ?></td>
				  <td class="td" style="width: 12%;font-size:9px"><?php if($Respuesta["data_Detalle"][$i]["NumSerie"]!=null){echo $Respuesta["data_Detalle"][$i]["NumSerie"];} ?></td>
				  <td class="td" style="width: 8%;font-size:9px"><?php if($Respuesta["data_Detalle"][$i]["Fech_Inser"]!=null){echo substr($Respuesta["data_Detalle"][$i]["Fech_Inser"], 0, 10);} ?></td>
				  <td class="td" style="width: 9%;font-size:9px"><?php if($Respuesta["data_Detalle"][$i]["Estatus_Activo"]!='3'){echo "Activo";}else{echo "Baja";}?></td>
				</tr>
		<?php
			}
		}
		?>	
		
		
		
      </tbody>
    </table>
	<br>
    <table id="tbl" style="width: 100%" border cellpadding="10"  cellspacing="0">
      <thead class="thead">
        <tr id="tr">
          <td class="td" style="width: 100%; border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;"><strong>OBSERVACIONES</strong></td>
        </tr>
      </thead>
      <tbody class="tbody">
        <tr id="tr">
          <td class="td" style="width: 100%;">Comentario: <?php echo $Observaciones;?></td>
        </tr>
      </tbody>
    </table>
	<br>
    <table id="tbl" border cellpadding="10"  cellspacing="0">
      <thead class="thead">
        <tr id="tr">
          <td colspan="2" class="td" style="border-top: 1px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;"><strong>NOMBRE Y FIRMA RESPONSABLES</strong></td>
        </tr>
      </thead>
      <tbody class="tbody">
        <tr id="tr">
          <td class="td" style="width: 50%;">RESPONSABLE DEL ÁREA</td>
          <td class="td" style="width: 50%;">RESPONSABLE AF/BC:</td>
        </tr>
        <tr id="tr">
          <td class="td sign" style="width: 50%;">Firma	<br><br><?php //if($Respuesta["data"][0]["Estatus_Correo_Responsable"]==0){echo "No Autorizado";}else{echo "Autorizado";}?><br><br><br></td>
          <td class="td sign" style="width: 50%;">Firma	<br><br><?php //if($Respuesta["data"][0]["Estatus_Correo_Solicitante"]==0){echo "No Autorizado";}else{echo "Autorizado";}?><br><br><br></td>
        </tr>
        <tr id="tr">
          <td class="td author" align="center" style="width: 50%;"><?php echo $Nombre_Jefe_Area;?></td>
          <td class="td author" align="center" style="width: 50%;"><?php echo $Usuario_Vale_Res; ?></td>
        </tr>
      </tbody>
    </table>
  </div>
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
        $html2pdf->Output("".$Num_Usuario."-".$Usuario_Vale_Res."-".$Tipo_Vale.".pdf");
		// return the filename to ajax request
		//echo $filename;
	}
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>
