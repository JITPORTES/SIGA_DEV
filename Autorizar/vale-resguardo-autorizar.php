<?php

$Id_Vale_Resguardo="";
$Num_Empleado="";
$Tipo="";


if (isset($_GET['Id_Vale_Resguardo'])) {
	$Id_Vale_Resguardo = @$_GET['Id_Vale_Resguardo'];
}

if (isset($_GET['Num_Empleado'])) {
	$Num_Empleado = @$_GET['Num_Empleado'];
}

if (isset($_GET['Tipo'])) {
	$Tipo = @$_GET['Tipo'];
}
//Variables la noificacion
///////////////////////////////////////////////////////////////////////////////
$Usr_Envia="";
$Aplicacion="";
$Area="";
$Menu="";
$Submenu="";
if (isset($_GET['Usr_Envia'])) {
	$Usr_Envia = @$_GET['Usr_Envia'];
}
if (isset($_GET['Aplicacion'])) {
	$Aplicacion = @$_GET['Aplicacion'];
}
if (isset($_GET['Area'])) {
	$Area = @$_GET['Area'];
}
if (isset($_GET['Menu'])) {
	$Menu = @$_GET['Menu'];
}
if (isset($_GET['Submenu'])) {
	$Submenu = @$_GET['Submenu'];
}
/////////////////////////////////////////////////////
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">

  <title>Login Autorizacion</title>
  <style>
	  .gritter-item-wrapper {
  background-image: none !important;
  box-shadow: 0 2px 10px rgba(50, 50, 50, 0.5);
  background: rgba(50, 50, 50, 0.92);
}
.gritter-item-wrapper.gritter-info {
  background: rgba(49, 81, 133, 0.92);
}
.gritter-item-wrapper.gritter-error {
  background: rgba(153, 40, 18, 0.92);
}
.gritter-item-wrapper.gritter-success {
  background: rgba(89, 131, 75, 0.92);
}
.gritter-item-wrapper.gritter-warning {
  background: rgba(190, 112, 31, 0.92);
}
.gritter-item-wrapper.gritter-light {
  background: rgba(245, 245, 245, 0.95);
  border: 1px solid #BBB;
}
.gritter-item-wrapper.gritter-light.gritter-info {
  background: rgba(232, 242, 255, 0.95);
}
.gritter-item-wrapper.gritter-light.gritter-info .gritter-item {
  color: #4A577D;
}
.gritter-item-wrapper.gritter-light.gritter-error {
  background: rgba(255, 235, 235, 0.95);
}
.gritter-item-wrapper.gritter-light.gritter-error .gritter-item {
  color: #894A38;
}
.gritter-item-wrapper.gritter-light.gritter-success {
  background: rgba(239, 250, 227, 0.95);
}
.gritter-item-wrapper.gritter-light.gritter-success .gritter-item {
  color: #416131;
}
.gritter-item-wrapper.gritter-light.gritter-warning {
  background: rgba(252, 248, 227, 0.95);
}
.gritter-item-wrapper.gritter-light.gritter-warning .gritter-item {
  color: #946446;
}
.gritter-item p {
  line-height: 1.8;
}
.gritter-top,
.gritter-bottom,
.gritter-item {
  background-image: none;
}
.gritter-close {
  left: auto;
  right: 3px;
  background-image: none;
  width: 18px;
  height: 18px;
  line-height: 17px;
  text-align: center;
  border: 2px solid transparent;
  border-radius: 16px;
  color: #E17B67;
}
.gritter-close:before {
  font-family: FontAwesome;
  font-size: 16px;
  content: "\f00d";
}
.gritter-info .gritter-close {
  color: #FFA500;
}
.gritter-error .gritter-close,
.gritter-success .gritter-close,
.gritter-warning .gritter-close {
  color: #FFEA07;
}
.gritter-close:hover {
  color: #FFF !important;
}
.gritter-title {
  text-shadow: none;
}
.gritter-light .gritter-item,
.gritter-light .gritter-bottom,
.gritter-light .gritter-top,
.gritter-light .gritter-close {
  background-image: none;
  color: #444;
}
.gritter-light .gritter-title {
  text-shadow: none;
}
.gritter-light .gritter-close:hover {
  color: #8A3104 !important;
}
.gritter-center {
  position: fixed;
  left: 33%;
  right: 33%;
  top: 33%;
}
@media only screen and (max-width: 767px) {
  .gritter-center {
    left: 16%;
    right: 16%;
    top: 30%;
  }
}
@media only screen and (max-width: 480px) {
  .gritter-center {
    left: 30px;
    right: 30px;
  }
}
@media only screen and (max-width: 320px) {
  .gritter-center {
    left: 10px;
    right: 10px;
  }
}
	  
.btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
.btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
.btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
.btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
.btn-primary.active { color: rgba(255, 255, 255, 0.75); }
.btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
.btn-block { width: 100%; display:block; }

* { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

html { width: 100%; height:100%; overflow:hidden; }

body { 
	width: 100%;
	height:100%;
	font-family: 'Open Sans', sans-serif;
	background: #092756;
	background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
	background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
}
.login { 
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -150px 0 0 -150px;
	width:300px;
	height:300px;
}
h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; font-family: Arial,Helvetica Neue,Helvetica,sans-serif;}
.login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; font-family: Arial,Helvetica Neue,Helvetica,sans-serif;}
.login h4 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; font-family: Arial,Helvetica Neue,Helvetica,sans-serif; }
input { 
	width: 100%; 
	margin-bottom: 10px; 
	background: rgba(0,0,0,0.3);
	border: none;
	outline: none;
	padding: 10px;
	font-size: 13px;
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
	border: 1px solid rgba(0,0,0,0.3);
	border-radius: 4px;
	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
	-webkit-transition: box-shadow .5s ease;
	-moz-transition: box-shadow .5s ease;
	-o-transition: box-shadow .5s ease;
	-ms-transition: box-shadow .5s ease;
	transition: box-shadow .5s ease;
}
input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

    </style>

</head>

<body>
<input type="hidden" id="Id_Vale_Resguardo" value="<?php echo $Id_Vale_Resguardo;?>">
<input type="hidden" id="Num_Empleado" value="<?php echo $Num_Empleado;?>">
<input type="hidden" id="Tipo" value="<?php echo $Tipo;?>">
<h1 id="bienvenida"></h1>	
  <div class="login" style="display:none" id="form_login">
	<h4>Escribe el Usuario y Contraseña para Autorizar</h4>
    <form method="post">
    	<input type="text" name="u" id="txtUsuario" placeholder="Username" required="required" />
        <input type="password" name="p" id="txtPassword" placeholder="Password" required="required" />
        <button type="button" id="btnIngresar" class="btn btn-primary btn-block btn-large">Autorizar</button>
	</form>
</div>
<div id="vale_autorizado" style="display:none"><h1>El vale se encuentra con estatus Autorizado</h1></div>
<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>  
<input type="hidden" id="Nombre_Solicitante">
<input type="hidden" id="Num_Empleado">
<input type="hidden" id="Correo_Solicitante">
<input type="hidden" id="Nombre_Jefe_Area">
<input type="hidden" id="Correo_Jefe_Area">
<input type="hidden" id="Num_Empleado_Jefe">

<script type="text/javascript">

//Codigo Javascript
$(document).ready(function(){
	cons_vale_resguardo();

	$(function () {
        $('#txtUsuario').focus();
        $("#txtUsuario").keypress(function (e) {
            if (e.which === 13) {
                if ($("#txtUsuario").val() !== "")
                {
                    $("#txtPassword").focus();                            
                }
            }
        });

        $("#txtPassword").keypress(function (e) {
            if (e.which === 13) {
                $('#btnIngresar').focus();
                valida();
            }
        });
        valida=function(){
            var txtUsuario = $.trim($('#txtUsuario').val());
            var txtPassword = $.trim($('#txtPassword').val());
            if ((txtUsuario !== "" && txtPassword !== "")) {
				//Si todo esta en orden entra a la funcsion para modificar
				login();
            } else {
				$.gritter.add({ title: 'Error', text: 'Por favor ingrese el usuario y/o contrase&ntilde;a.', class_name: 'gritter-item-wrapper gritter-error' });  //
				$('#txtUsuario').focus();   
            }
        };
        $('#btnIngresar').on('click', function () {
            valida();
        });
    });
	
	
	
	function cons_vale_resguardo(){
		var Id_Vale_Resguardo="<?php echo $Id_Vale_Resguardo;?>";
		var Tipo="<?php echo $Tipo; ?>";
		if(Id_Vale_Resguardo!=""){
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_vale_resguardo/Siga_vale_resguardoFacade.Class.php",
				data: {
					Id_Vale_Resguardo:Id_Vale_Resguardo,
					Estatus_Reg:"1",
					accion: 'consultarpdf'
				},
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
				},
				success: function (datos) {
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {
						if(Tipo=="1"){
							if((json.data[0].Estatus_Correo_Solicitante!=0)){
								$("#vale_autorizado").show();
								$("#form_login").hide();
							}else{
								$("#bienvenida").html("(Solicitante) <br> HOLA "+json.data[0].Nombre_Solicitante);
								$("#vale_autorizado").hide();
								$("#form_login").show();
							}
						}
						
						if(Tipo=="2"){
							if((json.data[0].Estatus_Correo_Responsable!=0)){
								$("#vale_autorizado").show();
								$("#form_login").hide();
							}else{
								$("#bienvenida").html("(Responsable Area) <br> HOLA "+json.data[0].Nombre_Jefe_Area);
								$("#vale_autorizado").hide();
								$("#form_login").show();
							}
						}
						$("#Nombre_Solicitante").val(json.data[0].Nombre_Solicitante);
						$("#Num_Empleado").val(json.data[0].Num_Empleado);
						$("#Correo_Solicitante").val(json.data[0].Correo);
						$("#Nombre_Jefe_Area").val(json.data[0].Nombre_Jefe_Area);
						$("#Correo_Jefe_Area").val(json.data[0].Correo_Jefe_Area);
						$("#Num_Empleado_Jefe").val(json.data[0].Num_Empleado_Jefe);
						
						
						
						
					}	
				},
				error: function (objeto, quepaso, otroobj) {
					alert("Ocurrio un error al consultar");
				}
			});
		}	
	}
	
	login = function () {
		var Id_Vale_Resguardo=$("#Id_Vale_Resguardo").val();
		var Tipo="<?php echo $Tipo; ?>";
		var data="";
		if(Id_Vale_Resguardo!=""){
			if(Tipo==1){
				data={
					Id_Vale_Resguardo:Id_Vale_Resguardo,
					Estatus_Correo_Solicitante:"1",
					accion: 'cambia_estatus_autorizacion'
				}
				envia_correo();
			}
			
			if(Tipo==2){
				data={
					Id_Vale_Resguardo:Id_Vale_Resguardo,
					Estatus_Correo_Responsable:"1",
					accion: 'cambia_estatus_autorizacion'
				}
			}
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_vale_resguardo/Siga_vale_resguardoFacade.Class.php",
				data: data,
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
				},
				success: function (datos) {
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {
						$.gritter.add({ title: '&Eacute;xito', text: 'Autorizado Correctamente', class_name: 'gritter-item-wrapper gritter-success' });  // VERDER 
						cons_vale_resguardo();
					}else{
						$.gritter.add({ title: 'Error', text: 'Ocurrio un error al Autorizar', class_name: 'gritter-item-wrapper gritter-error' });
					}	
				},
				error: function (objeto, quepaso, otroobj) {
					alert("Ocurrio un error al consultar");
				}
			});
		}
	}

	//Enviar Correo Responsable del Area
	envia_correo= function(){
		var Id_Vale_Resguardo="<?php echo $Id_Vale_Resguardo;?>";
		var Nombre_Solicitante=$("#Nombre_Solicitante").val();
		var Num_Empleado=$("#Num_Empleado").val();
		var Correo_Solicitante=$("#Correo_Solicitante").val();
		var Nombre_Jefe_Area=$("#Nombre_Jefe_Area").val();
		var Correo_Jefe_Area=$("#Correo_Jefe_Area").val();
		var Num_Empleado_Jefe=$("#Num_Empleado_Jefe").val();
		
		enviar_notificacion(Num_Empleado, Num_Empleado_Jefe, Id_Vale_Resguardo, Nombre_Solicitante, Nombre_Jefe_Area);
		
		if((Id_Vale_Resguardo!="") && (Correo_Jefe_Area!="") && (Num_Empleado_Jefe!="")){
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_correos/Siga_correosFacade.Class.php",        
				async: true,
				data: {
					Id_Vale_Resguardo:Id_Vale_Resguardo,
					Nombre_Solicitante:Nombre_Solicitante,
					Num_Empleado:Num_Empleado,
					Cadena_Mail:Correo_Solicitante,
					Nombre_Jefe_Area:Nombre_Jefe_Area,
					Correo_Jefe_Area:Correo_Jefe_Area,
					Num_Empleado_Jefe:Num_Empleado_Jefe,
					Autorizado_por:"2",
					accion:"envia_correo"
				},
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					
				},
				error: function () {
					$.gritter.add({ title: 'Error', text: 'Ocurrio un error al enviar el correo al encargado del area, comuniquese con el area de sistemas', class_name: 'gritter-item-wrapper gritter-error' });
				}
			});
		}	
	}
	
	//Envia Notificaciones
	enviar_notificacion=function(Num_Empl_Solicitante, Num_Empl_Resp_Area, Id_Vale_Resguardo, Nombre_Solicitante, Nombre_Jefe_Area){
		
		var Usr_Envia="<?php echo $Usr_Envia; ?>";
		var Aplicacion="<?php echo $Aplicacion; ?>";
		var Area="<?php echo $Area; ?>";
		var Menu="<?php echo $Menu; ?>";
		var Submenu="<?php echo $Submenu; ?>";
		var error=false;
		
		if(Usr_Envia==""){
			error=true;
		}
		if(Aplicacion==""){
			error=true;
		}
		if(Area==""){
			error=true;
		}
		if(Id_Vale_Resguardo==""){
			error=true;
		}
		if(Num_Empl_Resp_Area==""){
			error=true;
		}
		if(Nombre_Jefe_Area==""){
			error=true;
		}
		
		if(error==false)
		{
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_notificaciones/Siga_notificacionesFacade.Class.php",        
				async: false,
				data: {
					//Datos Notificacion
					Id_Usuario_Envia:Usr_Envia,
					Id_Area:Area,
					Id_Aplicacion:Aplicacion,
					Id_Menu:Menu,
					Id_Submenu:Submenu,
					//
					Id_Vale_Resguardo:Id_Vale_Resguardo,
					Num_Empl_Solicitante:Num_Empl_Solicitante,
					Num_Empl_Resp_Area:Num_Empl_Resp_Area,
					Nombre_Solicitante:Nombre_Solicitante,
					Nombre_Jefe_Area:Nombre_Jefe_Area,
					Autorizado_por:"2",
					accion:"notificacion_vale_resguardo"
				},
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					
					if(json.totalCount>0){
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al enviar la Notificacion.", "error", "dark");
				}
			});
		}
	}
});	
</script>

<a id="gritter-error" name="mensajes_de_error_alertas"></a>
<link rel="stylesheet" href="../docs/css/jquery.gritter.css"/>
<script src="../docs/js/jquery.gritter.js"></script>

</body>
</html>
