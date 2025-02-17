<?php
@$Url_Caritas="http://207.249.133.124/pruebas/SIGA/dist/img/";
$error=false;
$style_td="color:white;background:#969191;font-weight: bold;";
@$Encabezado="";

@$Id_Usr_Encrip="";
@$Id_Estatus_Proceso="";
@$Sistema="";
@$Url_Id_Solicitud="";

$css="
<style type='text/css'>
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



	#tbl .thead #tr .td{
	  text-align:center;
	  background:#19294a;
	  color:#fff;
	}
	
	#tbl .tbody #tr .td{
	  border:0.5px solid #ccc;
	  font-size:11px;
	  padding: 4px;
	}
	
	#tbl .tbody #tr .comentarios{
	  border:0.5px solid #ccc;
	  font-size:11px;
	  padding: 4px;
	  height:60px;
	}
	
	#tbl .tbody #tr.photo{
	  background:#f4f4f4;
	  color:#666;
	  text-align:center;
	}
	#tbl .tbody tr.adjuntos td{
	  padding:1em 0;
	}
	#tbl .tbody tr td.check img{
	  width:15px;
	  height:15px;
	  margin:0 auto;
	  display:block;
	}
	#tbl .tbody #tr .sign{
	  vertical-align:top;
	  height:6em;
	  text-align:center;
	}
	#tbl .tbody #tr .td .sign .comments{
	  text-align:left;
	}
	#tbl .tbody #tr .td .author{
	  vertical-align:center;
	  text-align:center;
	}
	#tbl .tbody #tr.faces .td{
	}
	#tbl .tbody #tr.faces .td img{
	  margin:0 auto;
	  display:block;
	  width:40px;
	  vertical-align:middle;
	}
	
	.foto {border:0px solid; height:150px; width:160px; text-align:center}
	.recuadro {border:1px solid; padding:5px 0; margin:5px 0; text-align:center;}
	
	//Comentarios calificacion
	#tbl .tbody #tr .comen{
	  border:0.5px solid #ccc;
	  font-size:11px;
	  padding: 4px;
	}
  </style>

";

include("mail/correo.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_solicitud_tickets/Siga_solicitud_ticketsDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_solicitud_tickets/Siga_solicitud_ticketsDAO.Class.php");
include_once(dirname(__FILE__)."/../../../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php");

include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_ticket_calificacion/Siga_ticket_calificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../fachadas/activos/siga_ticket_calificacion/Siga_ticket_calificacionFacade.Class.php");

include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");

@$Id_Solicitud=$_POST["Id_Solicitud_Correo"];

//////////////////////////////Solicitud Tickets
//Instanciamos un obbejeto de esta misma clase "Siga_vale_resguardoFacade";
$siga_solicitud_ticketsFacade = new Siga_solicitud_ticketsFacade();
$siga_solicitud_ticketsDto = new Siga_solicitud_ticketsDTO();
//Cargamos las variables mediante el metodo set
$siga_solicitud_ticketsDto->setEstatus_Reg("1");
$siga_solicitud_ticketsDto->setId_Solicitud($Id_Solicitud);
//Realizamos la consulta y le pasamos el objeto con las variables cargadas
$Respuesta=json_decode($siga_solicitud_ticketsFacade->selectSiga_solicitud_tickets($siga_solicitud_ticketsDto,""), true);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




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

if($Calificacion["totalCount"]>0){
	$Res_Pregunta1=$Calificacion["data"][0]["Id_Respuesta1"];
	$Desc_Res_Pregunta1=$Calificacion["data"][0]["Desc_Comentario1"];
	
	
	$Res_Pregunta2=$Calificacion["data"][0]["Id_Respuesta2"];
	$Desc_Res_Pregunta2=$Calificacion["data"][0]["Desc_Comentario2"];
	
	
	$Res_Pregunta3=$Calificacion["data"][0]["Id_Respuesta3"];
	$Desc_Res_Pregunta3=$Calificacion["data"][0]["Desc_Comentario3"];
}	

//Funcion para encriptar
function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}

$Estatus_Proceso=encrypt($Respuesta["data"][0]["Id_Estatus_Proceso"],'siga');
$Id_Usr_Encrip=encrypt($Respuesta["data"][0]["Id_Usuario"],'siga');
$Url_Id_Solicitud=encrypt($Respuesta["data"][0]["Id_Solicitud"],'siga');
$Sistema=encrypt("1",'siga');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Print the date from the response
	
	/*if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}*/
	
	$correo = new Correo();
	if ($_POST["tipocorreo"] == "nuevo")
	$subject = "Solicitud de ticket";
	if ($_POST["tipocorreo"] == "seguimiento")
	$subject = "Seguimiento a su ticket";
    if ($_POST["tipocorreo"] == "cerrar_gestor")
	$subject = "Solicitud de cierre por el gestor";
	if ($_POST["tipocorreo"] == "cerrar")
	$subject = "El ticket ha sido cerrado";
	$attach="";
	
	$mensajeFinal= $css;
	$mensajeFinal .= '<!DOCTYPE html>
<html>
<head>
 
</head>
<body class="hold-transition skin-blue sidebar-mini">';

 if($Respuesta["data"][0]["Id_Estatus_Proceso"]=="1"){
	$Encabezado="<br>Estimado usuario, se ha generado un nuevo ticket de soporte:<br>";
 }else{
	if($Respuesta["data"][0]["Id_Estatus_Proceso"]=="2"){
		$Encabezado="<br>Estimado usuario, su ticket se encuentra en proceso de seguimiento:<br>"; 
	}else{
		if($Respuesta["data"][0]["Id_Estatus_Proceso"]=="3"){
			$Encabezado="<br>Estimado usuario, el gestor ha solicitado el cierre del ticket:<br>"; 
		}else{
			if($Respuesta["data"][0]["Id_Estatus_Proceso"]=="4"){
				$Encabezado="<br>Estimado usuario, el ticket se ha cerrado satisfactoriamente:<br>"; 
			}
		}	
	}	
 }
	$mensajeFinal.='
	<table id="tbl" style="width: 100%;"  border="0" cellpadding="10"  cellspacing="0" height="20">
	<tbody class="tbody">
	<tr id="tr" align="center">
	<td>
		<label>'.$Encabezado.'</label>
	</td>
	</tr>
	<tr id="tr" align="center">
	<td>
	
	<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
		<thead class="thead">
			<tr id="tr">
				<td colspan="6" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;" align="center">DATOS DEL TICKET</td>
			</tr>
		</thead>
		<tbody class="tbody">
			<tr id="tr">
				<td class="td" style="width: 9%;'.$style_td.'"  >Folio Ticket:</td>
				<td class="td" style="width: 20%;" valign="top">'.$Respuesta["data"][0]["Id_Solicitud"].'</td>
				<td class="td" style="width: 10%;'.$style_td.'">&Aacute;rea:</td>
				<td class="td" style="width: 31%;" valign="top">';if($Respuesta["data"][0]["Area"]!=null){ $mensajeFinal.=$Respuesta["data"][0]["Area"];} $mensajeFinal.='</td>
				<td class="td" style="width: 10%;'.$style_td.'">Secci&oacute;n:</td>
				<td class="td" style="width: 20%;" valign="top">';if($Respuesta["data"][0]["NombreSeccion"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["NombreSeccion"]);}$mensajeFinal.='</td>
			</tr>
			<tr id="tr">
				<td class="td" style="width: 9%;'.$style_td.'"  >Categor&iacute;a:</td>
				<td class="td" style="width: 20%;" valign="top">';if($Respuesta["data"][0]["Categoria"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["Categoria"]);} $mensajeFinal.='</td>
				<td class="td" style="width: 10%;'.$style_td.'">Subcategoria:</td>
				<td class="td" style="width: 31%;" valign="top">';if($Respuesta["data"][0]["Subcategoria"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["Subcategoria"]);} $mensajeFinal.='</td>
				<td class="td" style="width: 10%;'.$style_td.'">Prioridad:</td>
				<td class="td" style="width: 20%;" valign="top">';if($Respuesta["data"][0]["Prioridad"]!=null){if($Respuesta["data"][0]["Prioridad"]=="1"){$mensajeFinal.= "Alta";} if($Respuesta["data"][0]["Prioridad"]=="2"){$mensajeFinal.= "Media";} if($Respuesta["data"][0]["Prioridad"]=="3"){$mensajeFinal.= "Baja";}} $mensajeFinal.='</td>
			</tr>
			<tr id="tr">
				<td class="td" style="width: 9%;'.$style_td.'"  >Gestor:</td>
				<td class="td" style="width: 20%;" valign="top">'; if($Respuesta["data"][0]["Gestor"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["Gestor"]);} $mensajeFinal.='</td>
				<td class="td" style="width: 10%;'.$style_td.'">Usuario Resguardo:</td>
				<td class="td" style="width: 31%;" valign="top">'; if($Respuesta["data"][0]["Usuario"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["Usuario"]);} $mensajeFinal.='</td>
				<td class="td" style="width: 10%;'.$style_td.'">Horario de Atenci&oacute;n:</td>
				<td class="td" style="width: 20%;" valign="top">'; if($Respuesta["data"][0]["Fech_Inser"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["Fech_Inser"]);} $mensajeFinal.='</td>
			</tr>
			<tr id="tr">
				<td class="td" style="width: 9%;'.$style_td.'"  >Descripci&oacute;n:</td>
				<td class="td" colspan="5" valign="top">'; if($Respuesta["data"][0]["Titulo"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["Titulo"]);}$mensajeFinal.='</td>
			</tr>
			<tr id="tr">
				<td class="td" style="width: 9%;'.$style_td.'"  >Descripci&oacute;n Detallada:</td>
				<td class="td" colspan="5" valign="top">'; if($Respuesta["data"][0]["Desc_Motivo_Reporte"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["Desc_Motivo_Reporte"]);} $mensajeFinal.='</td>
			</tr>
		</tbody>
	</table>
	</td>
	</tr>
	<tr>
	<td>
	
	<table id="tbl" style="width: 100%;"  border cellpadding="10"  cellspacing="0">
		<thead class="thead">
			<tr id="tr">
				<td colspan="6" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;" align="center">DATOS DEL ACTIVO</td>
			</tr>
		</thead>
		<tbody class="tbody">
			<tr id="tr">
				<td class="td" style="width: 9%;'.$style_td.'"  >AF/BC:</td>
				<td class="td" style="width: 20%;" valign="top">';if($Respuesta["data"][0]["AF_BC"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["AF_BC"]);} $mensajeFinal.='</td>
				<td class="td" style="width: 10%;'.$style_td.'">Nombre:</td>
				<td class="td" style="width: 31%;" valign="top">';if($Respuesta["data"][0]["Nombre_Activo"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["Nombre_Activo"]);} $mensajeFinal.='</td>
				<td class="td" style="width: 10%;'.$style_td.'">Marca:</td>
				<td class="td" style="width: 20%;" valign="top">';if($Respuesta["data"][0]["Marca"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["Marca"]);}$mensajeFinal.='</td>
			</tr>
			<tr id="tr">
				<td class="td" style="width: 9%;'.$style_td.'"  >Modelo:</td>
				<td class="td" style="width: 20%;" valign="top">';if($Respuesta["data"][0]["Modelo"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["Modelo"]);} $mensajeFinal.='</td>
				<td class="td" style="width: 10%;'.$style_td.'">No. Serie:</td>
				<td class="td" style="width: 31%;" valign="top">';if($Respuesta["data"][0]["No_Serie"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["No_Serie"]);} $mensajeFinal.='</td>
				<td class="td" style="width: 10%;'.$style_td.'">Ubicaci&oacute;n Primaria:</td>
				<td class="td" style="width: 20%;" valign="top">';if($Respuesta["data"][0]["Ubic_Prim"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["Ubic_Prim"]);} $mensajeFinal.='</td>
			</tr>
			<tr id="tr">
				<td class="td" style="width: 9%;'.$style_td.'"  >Ubicaci&oacute;n Secundaria:</td>
				<td class="td" style="width: 20%;" valign="top">'; if($Respuesta["data"][0]["Ubic_Sec"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["Ubic_Sec"]);} $mensajeFinal.='</td>
				<td class="td" style="width: 10%;'.$style_td.'">Ubicaci&oacute;n Especifica:</td>
				<td class="td" style="width: 31%;" valign="top">'; if($Respuesta["data"][0]["Ubic_Esp"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["Ubic_Esp"]);} $mensajeFinal.='</td>
				<td class="td" style="width: 10%;'.$style_td.'"  >Descripci&oacute;n:</td>
				<td class="td" style="width: 20%;" valign="top">'; if($Respuesta["data"][0]["Desc_Lar_Activo"]!=null){$mensajeFinal.= htmlentities($Respuesta["data"][0]["Desc_Lar_Activo"]);} $mensajeFinal.='</td>
		</tbody>
	</table>
	</td>
	</tr>';
	
	if($Respuesta["data"][0]["Id_Estatus_Proceso"]=="4"){
	$mensajeFinal.='
	<tr>
	<td>
	<table id="tbl" style="width: 100%;"  border="0" cellpadding="10"  cellspacing="0" height="20">
		<tbody class="tbody">
			<tr id="tr" align="center">
				<td style="width: 33.33%;align:right">
					<table id="tbl"  border cellpadding="10"  cellspacing="0">
						<thead class="thead">
							<tr id="tr">
								<td colspan="5" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">SOLUCIÓN OFRECIDA</td>
							</tr>
						</thead>
						<tbody class="tbody">
							<tr id="tr">
								<td class="td" style="width: 20%;">';
								
								if($Res_Pregunta1!=""){if($Res_Pregunta1=="5"){$mensajeFinal.= '<img src="'.$Url_Caritas.'05-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'05-face-off.png">';}}
								$mensajeFinal.='
								</td>
								<td class="td" style="width: 20%;">';
								if($Res_Pregunta1!=""){if($Res_Pregunta1=="4"){$mensajeFinal.= '<img src="'.$Url_Caritas.'04-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'04-face-off.png">';}}
								$mensajeFinal.='
								</td>
								<td class="td" style="width: 20%;">';
								if($Res_Pregunta1!=""){if($Res_Pregunta1=="3"){$mensajeFinal.= '<img src="'.$Url_Caritas.'03-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'03-face-off.png">';}}
								$mensajeFinal.='
								</td>
								<td class="td" style="width: 20%;">';
								if($Res_Pregunta1!=""){if($Res_Pregunta1=="2"){$mensajeFinal.= '<img src="'.$Url_Caritas.'02-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'02-face-off.png">';}}
								$mensajeFinal.='
								</td>
								<td class="td" style="width: 20%;">';
								if($Res_Pregunta1!=""){if($Res_Pregunta1=="1"){$mensajeFinal.= '<img src="'.$Url_Caritas.'01-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'01-face-off.png">';}}
								$mensajeFinal.='
								</td>
							</tr>
							<tr id="tr" align="left">
								<td class="comentarios" colspan="5" valign="top">Comentarios:';  if($Desc_Res_Pregunta1!=""){$mensajeFinal.= htmlentities($Desc_Res_Pregunta1);} $mensajeFinal.='</td>
							</tr>
						</tbody>
					</table>
				</td>
				<td style="width: 33.33%;" >
					<table id="tbl" style="text-align: center;"  border cellpadding="10"  cellspacing="0">
						<thead class="thead">
							<tr id="tr">
								<td colspan="5" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">ACTITUD DE LA SOLUCIÓN</td>
							</tr>
						</thead>
						<tbody class="tbody">
							<tr id="tr">
								<td class="td" style="width: 20%;">';
								
								if($Res_Pregunta2!=""){if($Res_Pregunta2=="5"){$mensajeFinal.= '<img src="'.$Url_Caritas.'05-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'05-face-off.png">';}}
								$mensajeFinal.='
								</td>
								<td class="td" style="width: 20%;">';
								if($Res_Pregunta2!=""){if($Res_Pregunta2=="4"){$mensajeFinal.= '<img src="'.$Url_Caritas.'04-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'04-face-off.png">';}}
								$mensajeFinal.='
								</td>
								<td class="td" style="width: 20%;">';
								if($Res_Pregunta2!=""){if($Res_Pregunta2=="3"){$mensajeFinal.= '<img src="'.$Url_Caritas.'03-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'03-face-off.png">';}}
								$mensajeFinal.='
								</td>
								<td class="td" style="width: 20%;">';
								if($Res_Pregunta2!=""){if($Res_Pregunta2=="2"){$mensajeFinal.= '<img src="'.$Url_Caritas.'02-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'02-face-off.png">';}}
								$mensajeFinal.='
								</td>
								<td class="td" style="width: 20%;">';
								if($Res_Pregunta2!=""){if($Res_Pregunta2=="1"){$mensajeFinal.= '<img src="'.$Url_Caritas.'01-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'01-face-off.png">';}}
								$mensajeFinal.='
								</td>
							</tr>
						
							<tr id="tr" align="left">
								<td class="comentarios" colspan="5" valign="top">Comentarios:'; if($Desc_Res_Pregunta2!=""){$mensajeFinal.= htmlentities($Desc_Res_Pregunta2);} $mensajeFinal.='</td>
							</tr>
						</tbody>
					</table>
				</td>
				<td style="width: 33.33%;" >
					<table id="tbl"  border cellpadding="10"  cellspacing="0">
						<thead class="thead">
							<tr id="tr">
								<td colspan="5" class="td" style="width: 100%; border-top: 0px solid #ddd;line-height: 1.42857143;padding: 8px;vertical-align: top;font-size:13px;">TIEMPO DE RESPUESTA</td>
							</tr>
						</thead>
						<tbody class="tbody">
							<tr id="tr">
								<td class="td" style="width: 20%;">';
								if($Res_Pregunta3!=""){if($Res_Pregunta3=="5"){$mensajeFinal.= '<img src="'.$Url_Caritas.'05-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'05-face-off.png">';}}
								$mensajeFinal.='
								</td>
								<td class="td" style="width: 20%;">';
								if($Res_Pregunta3!=""){if($Res_Pregunta3=="4"){$mensajeFinal.= '<img src="'.$Url_Caritas.'04-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'04-face-off.png">';}}
								$mensajeFinal.='
								</td>
								<td class="td" style="width: 20%;">';
								if($Res_Pregunta3!=""){if($Res_Pregunta3=="3"){$mensajeFinal.= '<img src="'.$Url_Caritas.'03-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'03-face-off.png">';}}
								$mensajeFinal.='
								</td>
								<td class="td" style="width: 20%;">';
								if($Res_Pregunta3!=""){if($Res_Pregunta3=="2"){$mensajeFinal.= '<img src="'.$Url_Caritas.'02-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'02-face-off.png">';}}
								$mensajeFinal.='
								</td>
								<td class="td" style="width: 20%;">';
								if($Res_Pregunta3!=""){if($Res_Pregunta3=="1"){$mensajeFinal.= '<img src="'.$Url_Caritas.'01-face.png">';}else{$mensajeFinal.= '<img src="'.$Url_Caritas.'01-face-off.png">';}}
								$mensajeFinal.='
								</td>
							</tr>
							<tr id="tr" height="30px" align="left">
								<td class="comentarios" colspan="5" valign="top">Comentarios:';if($Desc_Res_Pregunta3!=""){$mensajeFinal.= htmlentities($Desc_Res_Pregunta3);} $mensajeFinal.='</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	</td>
	</tr>';
	}
	$mensajeFinal.='
	</tbody>
	</table>';
	
	//Sistema 1=Solicitante, 2=Gestores
	//$mensajeFinal.='<br> Para dar seguimiento de click <a href="http://192.168.1.191/pruebas/SIGA/vistas/login.php?Id_Usuario='.$Id_Usr_Encrip.'&EstProc='.$Estatus_Proceso.'&Sis='.$Sistema.'&Solic='.$Url_Id_Solicitud.'">aqui</a>';
	$mensajeFinal.='</body></html>';
	
	$correo->enviaCorreo("itdeveloper@hospitalsatelite.com","Hospital Satelite",$subject,$mensajeFinal,$CorreoSalas="",$attach);
	
	echo '{"status": "Enviado Correctamente:"}';
?>