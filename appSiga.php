<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/catalogos.class.php");

$catalogoClass = new catalogos();

$usuariosInfo = $catalogoClass->getSigaUsuariosVigentes();


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<style type="text/css">
    body { 
			padding-top: 0 !important; 
			padding-bottom: 0 !important; 
			padding-top: 0 !important; 
			padding-bottom: 0 !important; 
			margin:0 !important; 
			width: 100% !important; 
			-webkit-text-size-adjust: 100% !important; -ms-text-size-adjust: 100% !important; -webkit-font-smoothing: antialiased !important; font-family: Tahoma; }
    .tableContent img { border: 0 !important; display: block !important; outline: none !important; }
    p, h2 { margin:0; }
    div,p,ul,h2,h2 { margin:0; }
    .bgBody{ background: #F0F0F0; }
    .bgItem{ background: #ffffff; }
    @media only screen and (max-width:480px) {
      table[class="MainContainer"], td[class="cell"] { width: 100% !important; height:auto !important; }
      td[class="specbundle"] { width: 100% !important; float:left !important; font-size:13px !important; line-height:17px !important; display:block !important; }
      td[class="specbundle3"] { width:90% !important; float:left !important; font-size:14px !important; line-height:18px !important; display:block !important; padding-left:5% !important; padding-right:5% !important; padding-bottom:20px !important; text-align:center !important; }
      td[class="spechide"] { display:none !important; }
      img[class="banner"] { width: 50% !important; height: auto !important; }
    }	
    @media only screen and (max-width:540px) 
    {
      table[class="MainContainer"], td[class="cell"] { width: 100% !important; height:auto !important; }
      td[class="specbundle"] { width: 100% !important; float:left !important; font-size:13px !important; line-height:17px !important; display:block !important; }
      td[class="specbundle3"] { width:90% !important; float:left !important; font-size:14px !important; line-height:18px !important; display:block !important; padding-left:5% !important; padding-right:5% !important; padding-bottom:20px !important; text-align:center !important; }
      td[class="spechide"] { display:none !important; }
      img[class="banner"] { width: 50% !important; height: auto !important; }
    }

canvas {
  width: 100%;
  height: 50%;
  display: block;   /* this is IMPORTANT! */
}

.defaultInput
    {
     width: 185px;
     height:16px; 
		 padding: 5px;  
    }

.error
{
 border:2px solid red;
}
 
</style>

<link rel="stylesheet" href="/siga/plugins/sweetalert2/sweetalert2.css">

</head>
<body>

  <div paddingwidth="0" paddingheight="0" style="font-family: Tahoma; padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">
    <!-- ==== Cuerpo central de manera vertical ==== -->
    <div style="background: #414F69;">
      <font face="Tahoma">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableContent bgBody" align="center">
          <tbody>
            <tr>
              <!-- ==== Col izquierdo. Equivalente a un col-md de Boostrap ==== -->
              <td valign="top" class="spechide" style="background: #F0F0F0;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td height="170" bgcolor="#414F69"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </tbody>
                </table>
              </td>

              <!-- ==== Col central. Contiene el cuerpo principal del del correo. Equivalente a un col-md de Boostrap ==== -->
              <td valign="top" width="600">
                <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="MainContainer" bgcolor="#ffffff">
                  <tbody>
                    <tr>
                      <td class="movableContentContainer">
                        <!-- ==== Area 1: Logotipo de la Empresa ==== -->
                        <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
                            <tr>
                              <td bgcolor="#414F69" valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
                                  <tr>
                                    <td align="center">
                                      <img src="https://apps2.hospitalsatelite.com/public_resources/images/logo_mail_blanco.png" />
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </div>

                        <!-- ==== Area 2: Area de la Imagen del sistema correspondiente ==== -->
                        <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
                            <tr><td height="25" bgcolor="#414F69"></td></tr>
                            <tr><td height="5" bgcolor="#62A9D2"></td></tr>
                            <tr><td height="20" class="bgItem"></td></tr>
                            <tr>
                              <td align="center" style="padding-left: 20px; padding-right: 20px;">
                                <div class="contentEditableContainer contentImageEditable">
                                  <div class="contentEditable">
                                    <img src="https://apps2.hospitalsatelite.com/public_resources/images/logo_siga_mail.png" />
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
															<td height="10" class="bgItem"></td>
														</tr>
                            <tr>
                              <td bgcolor="#000000" style="padding:8px 0;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tbody>
                                    <tr>
                                      <td width="5" class="spechide">&nbsp;</td>
                                      <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tbody>
                                            <tr>
                                              <td align="center" valign="top" class="specbundle3">
                                                <div class="contentEditableContainer contentTextEditable">
                                                  <div class="contentEditable" style="color: #ffffff; font-size: 21px; line-height: 19px;">
                                                    <p><span>Ticket por calificar</span></p>
                                                  </div>
                                                </div>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                      <td width="10" class="spechide">&nbsp;</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </div>


<!-- ====|||||||||||||||||||||||||||||||||||||| Cuerpo principal |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||==== -->
      <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;" id="siga_ticket_por_cerrar_div">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td height="2"></td>
                </tr>
                <tr>
                  <td style="padding: 8px;">
                    <div style="border: 1px solid #EEEEEE; border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px; padding: 15px;">

                      <div class="contentEditableContainer contentTextEditable">

                        <table>
                          <tbody>
                            <tr>
                              <td>No. Ticket:</td>
                              <td>
                                <input type="text" name="siga_ticket_por_cerrar_noTicket" id="siga_ticket_por_cerrar_noTicket"  maxlength="6" class="defaultInput">
                              </td>
                              <td>
                                <center><button id="siga_ticket_por_cerrar_buscarTicket" name="siga_ticket_por_cerrar_buscarTicket">Buscar</button></center>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                      </div>
                    </div>
                  </td>
                </tr>

              </table>
            </td>
          </tr>
        </table>
      </div>

<!-- ====|||||||||||||||||||||||||||||||||||||| Cuerpo principal |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||==== -->
<!-- ====|||||||||||||||||||||||||||||||||||||| Cuerpo principal |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||==== -->

<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;" id="siga_ticket_por_cerrar_div">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top">
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

                <tr>
                  <td style="padding: 8px;">
                    <div style="border: 1px solid #EEEEEE; border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px; padding: 15px;">

                      <div class="contentEditableContainer contentTextEditable">

                        <table  width="100%" border="0">
                          <tbody>
                            <tr>
                              <td width="40%"><b>Ticket:</b></td><p id="siga_appSiga_UsuarioInicial" name="siga_appSiga_UsuarioInicial"></p>
                              <td width="60%"><p id="siga_appSiga_idSolicitud" name="siga_appSiga_idSolicitud"></p></td>
                            </tr>
                            <tr>
                              <td width="40%"><b>F. Solicitud:</b></td>
                              <td width="60%"><p id="siga_appSiga_Fech_Solicitud"></p></td>
                            </tr>
                            <tr>
                              <td width="40%"><b>F. Calificar:</b></td>
                              <td width="60%"><p id="siga_appSiga_Fech_Espera_Cierre"></p></td>
                            </tr>
                            <tr>
                              <td><b>Activo:</b></td>
                              <td width="60%"><p id="siga_appSiga_activo"></p></td>
                            </tr>
                            <tr>
                              <td><b>Marca:</b></td>
                              <td width="60%"><p id="siga_appSiga_marca"></p></td>
                            </tr>
                            <tr>
                              <td><b>No. de Serie:</b></td>
                              <td width="60%"><p id="siga_appSiga_serie"></p></td>
                            </tr>
                            <tr>
                              <td><b>U. Primaria:</b></td>
                              <td width="60%"><p id="siga_appSiga_uPrimaria"></p></td>
                            </tr>
                            <tr>
                              <td><b>U. Secundaria:</b></td>
                              <td width="60%"><p id="siga_appSiga_uSecundaria"></p></td>
                            </tr>
                            <tr>
                              <td><b>Mot. Aparente:</b></td>
                              <td width="60%"><p id="siga_appSiga_aparente"></p></td>
                            </tr>
                            <tr>
                              <td><b>Mot. Real:</b></td>
                              <td width="60%"><p id="siga_appSiga_real"></p></td>
                            </tr>
                            <tr>
                              <td><b>Categoría:</b></td>
                              <td width="60%"><p id="siga_appSiga_categoria"></p></td>
                            </tr>
                            <tr>
                              <td><b>Sub categoría:</b></td>
                              <td width="60%"><p id="siga_appSiga_subCategoria"></p></td>
                            </tr>
                            <tr>
                              <td><b>Estatus final del equipo:</b></td>
                              <td width="60%"><p id="siga_appSiga_estatus"></p></td>
                            </tr>
                            <tr>
                              <td colspan="2"><b>Descripción de acciones realizadas por el usuario:</b></td>                              
                            </tr>
                            <tr>
                              <td colspan="2">
                                <div style="overflow-wrap: anywhere;">
                                <p id="siga_appSiga_ComentarioCierre"></p>
                                </div>                                
                              </td>                              
                            </tr>
                            <tr>
                              <td colspan="2">
                                <b>Usuario Final:</b>
                              </td>                              
                            </tr>
                            <tr>
                              <td colspan="2">
<select style="width: 98%;" id="siga_appSiga_UsuarioFinal" name="siga_appSiga_UsuarioFinal">
  <option value="-1">Seleccione usuario</option>
  <?php foreach($usuariosInfo as $item) { ?>
    <option value="<?php echo $item['Id_Usuario']; ?>"><?php echo $item['Nombre_Usuario'].' / '.$item['No_Usuario'];?></option>
  <?php } ?>                                  
</select>
                              </td>                              
                            </tr>
                            <tr>
                              <td colspan="2" style="padding: 10px;">
                              
                              </td>                              
                            </tr>
                            <tr>
                              <td colspan="2">
                                <b>Solución Ofrecida:</b>
                              </td>                              
                            </tr>
                            <tr>
                              <td colspan="2">
                                <label style="float:left"><input type="radio" value="5" name="siga_appSiga_Ofrecida_c"></label><img src="dist/img/05-face-off.png" alt="" width="20" height="20" style="float:left" id="a5">
                                <label style="float:left"><input type="radio" value="4" name="siga_appSiga_Ofrecida_c"></label><img src="dist/img/04-face-off.png" alt="" width="20" height="20" style="float:left" id="a4">
                                <label style="float:left"><input type="radio" value="3" name="siga_appSiga_Ofrecida_c" checked></label><img src="dist/img/03-face.png" alt="" width="20" height="20" style="float:left" id="a3">
                                <label style="float:left"><input type="radio" value="2" name="siga_appSiga_Ofrecida_c"></label><img src="dist/img/02-face-off.png" alt="" width="20" height="20" style="float:left" id="a2">
                                <label style="float:left"><input type="radio" value="1" name="siga_appSiga_Ofrecida_c"></label><img src="dist/img/01-face-off.png" alt="" width="20" height="20" style="float:left" id="a1">
                              </td>                              
                            </tr>
                            <tr>
                              <td colspan="2">
                                <textarea name="siga_appSiga_Ofrecida" id="siga_appSiga_Ofrecida" style="width: 98%;" rows="3" placeholder="Comentarios..."></textarea>
                              </td>                              
                            </tr>
                            <tr>
                              <td colspan="2">
                                <b>Actitud de Servicio:</b>
                              </td>                              
                            </tr>
                            <tr>
                              <td colspan="2">
                                <label style="float:left"><input type="radio"value="5" name="siga_appSiga_Servicio_c"></label><img src="dist/img/05-face-off.png" alt="" width="20" height="20" style="float:left" id="b5">
                                <label style="float:left"><input type="radio"value="4" name="siga_appSiga_Servicio_c"></label><img src="dist/img/04-face-off.png" alt="" width="20" height="20" style="float:left" id="b4">
                                <label style="float:left"><input type="radio"value="3" name="siga_appSiga_Servicio_c" checked></label><img src="dist/img/03-face.png" alt="" width="20" height="20" style="float:left" id="b3">
                                <label style="float:left"><input type="radio"value="2" name="siga_appSiga_Servicio_c"></label><img src="dist/img/02-face-off.png" alt="" width="20" height="20" style="float:left" id="b2">
                                <label style="float:left"><input type="radio"value="1" name="siga_appSiga_Servicio_c"></label><img src="dist/img/01-face-off.png" alt="" width="20" height="20" style="float:left" id="b1">
                              </td>                              
                            </tr>
                            <tr>
                              <td colspan="2">
                                <textarea name="siga_appSiga_Servicio" id="siga_appSiga_Servicio" style="width: 98%;" rows="3" placeholder="Comentarios..."></textarea>
                              </td>                              
                            </tr>
                            <tr>
                              <td colspan="2">
                                <b>Tiempo de Respuesta:</b>
                              </td>                              
                            </tr>
                            <tr>
                              <td colspan="2">
                                <label style="float:left"><input type="radio"value="5" name="siga_appSiga_Respuesta_c"></label><img src="dist/img/05-face-off.png" alt="" width="20" height="20" style="float:left" id="c5">
                                <label style="float:left"><input type="radio"value="4" name="siga_appSiga_Respuesta_c"></label><img src="dist/img/04-face-off.png" alt="" width="20" height="20" style="float:left" id="c4">
                                <label style="float:left"><input type="radio"value="3" name="siga_appSiga_Respuesta_c" checked></label><img src="dist/img/03-face.png" alt="" width="20" height="20" style="float:left" id="c3">
                                <label style="float:left"><input type="radio"value="2" name="siga_appSiga_Respuesta_c"></label><img src="dist/img/02-face-off.png" alt="" width="20" height="20" style="float:left" id="c2">
                                <label style="float:left"><input type="radio"value="1" name="siga_appSiga_Respuesta_c"></label><img src="dist/img/01-face-off.png" alt="" width="20" height="20" style="float:left" id="c1">
                              </td>                              
                            </tr>
                            <tr>
                              <td colspan="2">
                                <textarea name="siga_appSiga_Respuesta" id="siga_appSiga_Respuesta" style="width: 98%;" rows="3" placeholder="Comentarios..."></textarea>
                              </td>                              
                            </tr>
                            <tr>
                              <td style="padding: 10px;" colspan="2">
                                <div style="border: 1px solid #EEEEEE; border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px; padding: 10px;" style="width: 98%;">
                                  <div>
                                    <canvas id="signature-pad" class="signature-pad"></canvas>
                                  </div>																				
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                      </div>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td style="padding: 5px;">
                    <div style="border: 1px solid #EEEEEE; border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px; padding: 10px;">
                      <div class="">
                        <center>
                          <div>
                            <input type="button" value="Limpiar Firma" id="clear">                            
                            <input type="button" value="Calificar ticket" id="sigaCerrarTicket">
                          </div>
                        </center>  
                      </div>
                    </div>
                  </td>
                </tr>

              </table>

            </td>
          </tr>
        </table>
      </div>

<!-- ====|||||||||||||||||||||||||||||||||||||| Cuerpo principal |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||==== -->
<!-- ====|||||||||||||||||||||||||||||||||||||| Cuerpo principal |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||==== -->

<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" valign="top" class="bgBody">
    <tr>
      <td valign="top" align="center">
        <div class="contentEditableContainer contentTextEditable">
          <div class="contentEditable" style="color:#A8B0B6; font-size:13px; line-height: 16px;">&nbsp;</div><!-- ==== Aqui va texto==== -->
        </div>
      </td>
    </tr>
  </table>
</div>

</td>
</tr>
</tbody>
</table>
</td>

<!-- ====|||||||||||||||||||||||||||||||||||||| Cuerpo principal |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||==== -->
<!-- ====|||||||||||||||||||||||||||||||||||||| Cuerpo principal |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||==== -->

              <td valign="top" class="spechide" style="background: #F0F0F0;">

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td height="170" bgcolor="#414F69">&nbsp;</td>
                    </tr>
                  </tbody>
                </table>

              </td>
            </tr>
          </tbody>
        </table>
      </font>
    </div>
    <!-- ==== Cinta de pie de pagina ==== -->
    <div>
      <table border="0" cellspacing="0" cellpadding="0" align="center" valign="top" width="100%">
        <tbody>
          <tr>
            <td height="25" style="background: #414F69; width: 100%;" width="100"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

<!-- ====|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||==== -->
<!-- ====|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||==== -->

<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script src="/siga/plugins/sweetalert2/sweetalert2.js"></script>

<script>
$(document).ready(function() {

	$('#siga_ticket_por_cerrar_resultado').hide();
	$('#siga_ticket_por_cerrar_div').show();
	$('#siga_ticket_por_cerrar_noTicket').focus();
  $('#siga_appSiga_UsuarioInicial').hide();
  $("#sigaCerrarTicket").prop("disabled", true);
  $("#clear").prop("disabled", true);
 
	var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
			backgroundColor: 'rgba(255, 255, 255, 0)',
			penColor: 'rgb(0, 0, 0)',
			minDistance:2,
			velocityFilterWeight:.5,
	});

  signaturePad.clear();

  $('#clear').click(function(e) {
      e.preventDefault();
      signaturePad.clear();
  });

 

//**************************************************************************************************************************************************************************/

  $("input[name=siga_appSiga_Ofrecida_c]").click(function () {
    var id = $('input:radio[name=siga_appSiga_Ofrecida_c]:checked').val();
    if(id==5){
      borrarImagenA();
      $("#a5").replaceWith('<img src="dist/img/05-face.png" alt="" width="20" height="20" style="float:left" id="a5">');
    }else if(id==4){
      borrarImagenA();
      $("#a4").replaceWith('<img src="dist/img/04-face.png" alt="" width="20" height="20" style="float:left" id="a4">');
    }else if(id==3){
      borrarImagenA();
      $("#a3").replaceWith('<img src="dist/img/03-face.png" alt="" width="20" height="20" style="float:left" id="a3">');
    }else if(id==2){
      borrarImagenA();
      $("#a2").replaceWith('<img src="dist/img/02-face.png" alt="" width="20" height="20" style="float:left" id="a2">');
    }else if(id==1){
      borrarImagenA();
      $("#a1").replaceWith('<img src="dist/img/01-face.png" alt="" width="20" height="20" style="float:left" id="a1">');
    }           
  });

  $("input[name=siga_appSiga_Servicio_c]").click(function () {
    var id = $('input:radio[name=siga_appSiga_Servicio_c]:checked').val();
    if(id==5){
      borrarImagenB();
      $("#b5").replaceWith('<img src="dist/img/05-face.png" alt="" width="20" height="20" style="float:left" id="b5">');
    }else if(id==4){
      borrarImagenB();
      $("#b4").replaceWith('<img src="dist/img/04-face.png" alt="" width="20" height="20" style="float:left" id="b4">');
    }else if(id==3){
      borrarImagenB();
      $("#b3").replaceWith('<img src="dist/img/03-face.png" alt="" width="20" height="20" style="float:left" id="b3">');
    }else if(id==2){
      borrarImagenB();
      $("#b2").replaceWith('<img src="dist/img/02-face.png" alt="" width="20" height="20" style="float:left" id="b2">');
    }else if(id==1){
      borrarImagenB();
      $("#b1").replaceWith('<img src="dist/img/01-face.png" alt="" width="20" height="20" style="float:left" id="b1">');
    }           
  });

  $("input[name=siga_appSiga_Respuesta_c]").click(function () {
    var id = $('input:radio[name=siga_appSiga_Respuesta_c]:checked').val();
    if(id==5){
      borrarImagenC();
      $("#c5").replaceWith('<img src="dist/img/05-face.png" alt="" width="20" height="20" style="float:left" id="c5">');
    }else if(id==4){
      borrarImagenC();
      $("#c4").replaceWith('<img src="dist/img/04-face.png" alt="" width="20" height="20" style="float:left" id="c4">');
    }else if(id==3){
      borrarImagenC();
      $("#c3").replaceWith('<img src="dist/img/03-face.png" alt="" width="20" height="20" style="float:left" id="c3">');
    }else if(id==2){
      borrarImagenC();
      $("#c2").replaceWith('<img src="dist/img/02-face.png" alt="" width="20" height="20" style="float:left" id="c2">');
    }else if(id==1){
      borrarImagenC();
      $("#c1").replaceWith('<img src="dist/img/01-face.png" alt="" width="20" height="20" style="float:left" id="c1">');
    }           
  });
//**************************************************************************************************************************************************************************/
$('#siga_ticket_por_cerrar_buscarTicket').on("click", function(){
  
  borrar();
  var validar = true;
  var siga_ticket_por_cerrar_noTicket = $('#siga_ticket_por_cerrar_noTicket').val();
    
  if(siga_ticket_por_cerrar_noTicket==''){
    $('#siga_ticket_por_cerrar_noTicket').addClass('error');
    $('#siga_ticket_por_cerrar_noTicket').attr('placeholder','Campo Obligatorio');    
    validar=false;
  }

if(validar){
  borrar();
  $('#siga_ticket_por_cerrar_noTicket').val('');
    
  $.ajax({
    type: "POST",
    url: "class/biomedica/appSiga/appSiga.ajax.php",
    data: {accion:1,siga_ticket_por_cerrar_noTicket:siga_ticket_por_cerrar_noTicket},
    dataType: "JSON",
    cache: false,    
    success: function (response) {
      var Estatus_Proceso = response['Estatus_Proceso'];
      var af_bc           = response['AF_BC'];
      if(Estatus_Proceso == 3){
        if(af_bc != null){
          $('#siga_appSiga_idSolicitud').html(response['Id_Solicitud']);
          $('#siga_appSiga_Fech_Solicitud').html(response['Fech_Solicitud']);
          $('#siga_appSiga_Fech_Espera_Cierre').html(response['Fech_Espera_Cierre']);
          $('#siga_appSiga_activo').html(response['AF_BC']+'/'+response['DescCorta']);
          $('#siga_appSiga_marca').html(response['Marca']);
          $('#siga_appSiga_serie').html(response['NumSerie']);
          $('#siga_appSiga_uPrimaria').html(response['Id_Ubic_Prim']);
          $('#siga_appSiga_uSecundaria').html(response['Id_Ubic_Sec']);
          $('#siga_appSiga_aparente').html(response['Id_Motivo_Aparente']);
          $('#siga_appSiga_real').html(response['Id_Motivo_Real']);
          $('#siga_appSiga_estatus').html(response['Id_Est_Equipo']);
          $('#siga_appSiga_categoria').html(response['Id_Categoria']);
          $('#siga_appSiga_subCategoria').html(response['Id_Subcategoria']);
          $('#siga_appSiga_ComentarioCierre').html(response['ComentarioCierre']);
          $('#siga_appSiga_UsuarioInicial').html(response['Id_Usuario_Inicial']);
          $("#sigaCerrarTicket").prop("disabled", false);
          $("#clear").prop("disabled", false);
          signaturePad.clear();
        }else{
          borrar();
          alerta('error','Este ticket no tiene un activo');          
        }

      } else {
        borrar();
        alerta('error', 'Ticket inválido');
      }
      
    }
  });
  
  }

});

$('#sigaCerrarTicket').on('click',function(){

  let dato = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAAAXNSR0IArs4c6QAABGJJREFUeF7t1AEJAAAMAsHZv/RyPNwSyDncOQIECEQEFskpJgECBM5geQICBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAgQdWMQCX4yW9owAAAABJRU5ErkJggg==';
  let id_solicitud            = $('#siga_appSiga_idSolicitud').text();
  let siga_appSiga_UsuarioInicial  = $('#siga_appSiga_UsuarioInicial').text();
  let siga_appSiga_Ofrecida   = $('#siga_appSiga_Ofrecida').val();
  let siga_appSiga_Servicio   = $('#siga_appSiga_Servicio').val();
  let siga_appSiga_Respuesta  = $('#siga_appSiga_Respuesta').val();
  let validar                 = true;
  let siga_appSiga_Ofrecida_c = $('input:radio[name=siga_appSiga_Ofrecida_c]:checked').val();
  let siga_appSiga_Servicio_c = $('input:radio[name=siga_appSiga_Servicio_c]:checked').val();
  let siga_appSiga_Respuesta_c= $('input:radio[name=siga_appSiga_Respuesta_c]:checked').val();
  let imageData								= signaturePad.toDataURL('image/png');
  let siga_appSiga_UsuarioFinal = $('#siga_appSiga_UsuarioFinal').val();

  if(id_solicitud ==''){
    alerta('error','Ticket no válido');
    location.reload(true);
    validar = false;
  } else if (siga_appSiga_UsuarioFinal==-1){
    alerta('error','Usuario cierre: Obligatorio');
    validar = false;
  } else if(siga_appSiga_Ofrecida == ''){    
    $('#siga_appSiga_Ofrecida').attr('placeholder','Campo Obligatorio');
    $('#siga_appSiga_Ofrecida').focus();
    alerta('error','Solución Ofrecida: Campo Obligatorio');
    validar = false;
  } else if (siga_appSiga_Servicio==''){
    $('#siga_appSiga_Servicio').attr('placeholder','Campo Obligatorio');
    $('#siga_appSiga_Servicio').focus();
    alerta('error','Actitud de servicio: Campo Obligatorio');
    validar = false;
  } else if(siga_appSiga_Respuesta==''){
    $('#siga_appSiga_Respuesta').attr('placeholder','Campo Obligatorio');
    $('#siga_appSiga_Respuesta').focus();
    alerta('error','Tiempo de Respuesta: Campo Obligatorio');
    validar = false;
  } else if (imageData == dato){
    alerta('error','Firma: Campo Obligatorio');
    validar=false;
  }

  if(validar){

    $.ajax({
      type: "POST",
      url: "class/biomedica/appSiga/appSiga.ajax.php",
      data: {accion:2,id_solicitud:id_solicitud,siga_appSiga_UsuarioFinal:siga_appSiga_UsuarioFinal,siga_appSiga_Ofrecida:siga_appSiga_Ofrecida,
            siga_appSiga_Servicio:siga_appSiga_Servicio,siga_appSiga_Respuesta:siga_appSiga_Respuesta,siga_appSiga_Ofrecida_c:siga_appSiga_Ofrecida_c,
            siga_appSiga_Servicio_c:siga_appSiga_Servicio_c,siga_appSiga_Respuesta_c:siga_appSiga_Respuesta_c,imageData:imageData},
      dataType: "JSON",
      cache: false,
      beforeSend:function(){

      },
      success: function (response) {
        
        if(response == 1){
          Swal.fire({
              position: "center",
              icon: "success",
              title: "Ticket cerrado correctamente",
              showConfirmButton: false,
              timer: 1500
            }).then(function() {
              location.replace ("appSiga.php");
            });
        
        } else if(response == 5){
          Swal.fire({
              position: "center",
              icon: "error",
              title: "Ticket cerrado sin éxito.",
              showConfirmButton: false,
              timer: 1500
            }).then(function() {
              location.replace ("appSiga.php");
            });
        
        }


        
        
      }
    });

  }

});

//***************************************************************************** */
});
//***************************************************************************** */

function borrar(){
  $('#siga_ticket_por_cerrar_noTicket').addClass('defaultInput');
  $('#siga_ticket_por_cerrar_noTicket').attr('placeholder','');
  $('#siga_appSiga_idSolicitud').html('');
  $('#siga_appSiga_Fech_Solicitud').html('');
  $('#siga_appSiga_Fech_Espera_Cierre').html('');
  $('#siga_appSiga_activo').html('');
  $('#siga_appSiga_marca').html('');
  $('#siga_appSiga_serie').html('');
  $('#siga_appSiga_uPrimaria').html('');
  $('#siga_appSiga_uSecundaria').html('');
  $('#siga_appSiga_aparente').html('');
  $('#siga_appSiga_real').html('');
  $('#siga_appSiga_estatus').html('');
  $('#siga_appSiga_categoria').html('');
  $('#siga_appSiga_subCategoria').html('');
  $('#siga_appSiga_ComentarioCierre').html('');
  $('#siga_appSiga_Ofrecida').val('');
  $('#siga_appSiga_Servicio').val('');
  $('#siga_appSiga_Respuesta').val('');
  $('#siga_appSiga_UsuarioFinal option:first').prop('selected',true);
}

function borrarImagenA(){
  $("#a5").replaceWith('<img src="dist/img/05-face-off.png" alt="" width="20" height="20" style="float:left" id="a5">');
  $("#a4").replaceWith('<img src="dist/img/04-face-off.png" alt="" width="20" height="20" style="float:left" id="a4">');
  $("#a3").replaceWith('<img src="dist/img/03-face-off.png" alt="" width="20" height="20" style="float:left" id="a3">');
  $("#a2").replaceWith('<img src="dist/img/02-face-off.png" alt="" width="20" height="20" style="float:left" id="a2">');
  $("#a1").replaceWith('<img src="dist/img/01-face-off.png" alt="" width="20" height="20" style="float:left" id="a1">');
}
function borrarImagenB(){
  $("#b5").replaceWith('<img src="dist/img/05-face-off.png" alt="" width="20" height="20" style="float:left" id="b5">');
  $("#b4").replaceWith('<img src="dist/img/04-face-off.png" alt="" width="20" height="20" style="float:left" id="b4">');
  $("#b3").replaceWith('<img src="dist/img/03-face-off.png" alt="" width="20" height="20" style="float:left" id="b3">');
  $("#b2").replaceWith('<img src="dist/img/02-face-off.png" alt="" width="20" height="20" style="float:left" id="b2">');
  $("#b1").replaceWith('<img src="dist/img/01-face-off.png" alt="" width="20" height="20" style="float:left" id="b1">');
}
function borrarImagenC(){
  $("#c5").replaceWith('<img src="dist/img/05-face-off.png" alt="" width="20" height="20" style="float:left" id="c5">');
  $("#c4").replaceWith('<img src="dist/img/04-face-off.png" alt="" width="20" height="20" style="float:left" id="c4">');
  $("#c3").replaceWith('<img src="dist/img/03-face-off.png" alt="" width="20" height="20" style="float:left" id="c3">');
  $("#c2").replaceWith('<img src="dist/img/02-face-off.png" alt="" width="20" height="20" style="float:left" id="c2">');
  $("#c1").replaceWith('<img src="dist/img/01-face-off.png" alt="" width="20" height="20" style="float:left" id="c1">');
}

function alerta(icon,text){
  Swal.fire({
  position: "center",
  icon: icon,
  title: text,
  showConfirmButton: false,
  timer: 1500
});
}

</script>
</body>
</html>