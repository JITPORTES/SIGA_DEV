<?php 
	//error_reporting(E_ALL);
	//ini_set("display_errors", 1);
	require_once("class/SIGA.php");
	require_once("../datos/mail/correo.php");
	

	$obj = new SIGA();
	$Id_Activo = $_GET["Id_Activo"];
	$Paso = $_GET["Paso"];
	$Id_Usuario = $_GET["Id_Usuario"];
	$Id_Baja="";
 
 	if($Paso == "6") {
		$Paso=3;
 	}
 
	/*	
	$ip = isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'];
	if (strpos($ip, '192.168') !== false) {
		//if($_SERVER["HTTP_HOST"]!="http://207.249.133.124"){	
		//	$rutaip = "//207.249.133.124/SIGA/vistas/acepto.php?Id_Activo=".$Id_Activo."&Paso=".$Paso."&Id_Usuario=".$Id_Usuario."";
		//	header("Location: ".$rutaip."");
		//	die();
		//}
	}else{
		if($_SERVER["HTTP_HOST"]!="http://207.249.133.124"){
			$rutaip = "http://207.249.133.124/SIGA/vistas/acepto.php?Id_Activo=".$Id_Activo."&Paso=".$Paso."&Id_Usuario=".$Id_Usuario."";
			header($rutaip, true, 301);
		}
	}*/
 
	$activo = $obj->obtenCatalogo($Id_Activo,"siga_activos","Id_Activo","Nombre_Activo",""," and Estatus_Reg<>3 ");
	$bajaactivo = $obj->obtenCatalogo($Id_Activo,"siga_baja_activo","Id_Activo","Fecha_Baja");
	$motivo = $obj->obtenDetalleBaja($Id_Activo,"-1");
	$Id_Baja = $motivo[0]["Id_Baja_Activo"];
	$primaria_secundaria = $obj->ubic_prim_y_ubic_sev($Id_Activo);
	$propiedad_activo = $obj->propiedad_activo($Id_Activo);
	$usuario = $obj->obtenCatalogo($Id_Usuario,"siga_usuarios","Id_Usuario","Usuario");
	$existe = $obj->existeProceso($Id_Activo,$Id_Baja,$Paso,1);
	$existecancelacion = $obj->existeCancelacion($Id_Activo, $Id_Baja);
	$Cancelacion = explode("-", $existecancelacion);

	// Genera un icono para determinar el tipo de archivo
	function obtenerIconoArchivo($nombreArchivo) {
		// Determina la extensión del archivo
		$splitNombre = explode(".", $nombreArchivo);
		$ext = end($splitNombre);

		// Agrupar algunos tipos de archivo
		if(preg_match('/(doc|docx)/i', $ext) > 0) { $ext = 'doc'; }
		if(preg_match('/(xls|xlsx)/i', $ext) > 0) { $ext = 'xls'; }
		if(preg_match('/(ppt|pptx)/i', $ext) > 0) { $ext = 'ppt'; }
		if(preg_match('/(zip|rar|tar|gzip|gz|7z)/i', $ext) > 0) { $ext = 'zip'; }
		if(preg_match('/(htm|html)/i', $ext) > 0) { $ext = 'htm'; }
		if(preg_match('/(txt|ini|csv|java|php|js|css)/i', $ext) > 0) { $ext = 'txt'; }
		if(preg_match('/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)/i', $ext) > 0) {$ext = 'mov'; }
		if(preg_match('/(mp3|wav)/i', $ext) > 0) { $ext = 'mp3'; }
		if(preg_match('/(png|jpg|jpge|bmp|gif)/i', $ext) > 0) { $ext = 'jpg'; }

		// Devuelve el icono del formarto del archivo
		switch ($ext) {
			case 'doc': return '<i class="fa fa-file-word-o text-primary"></i>'; break;
			case 'xls': return '<i class="fa fa-file-excel-o text-success"></i>'; break;
			case 'ppt': return '<i class="fa fa-file-powerpoint-o text-danger"></i>'; break;
			case 'pdf': return '<i class="fa fa-file-pdf-o text-danger"></i>'; break;
			case 'zip': return '<i class="fa fa-file-archive-o text-muted"></i>'; break;
			case 'htm': return '<i class="fa fa-file-code-o text-info"></i>'; break;
			case 'txt': return '<i class="fa fa-file-text-o text-info"></i>'; break;
			case 'mov': return '<i class="fa fa-file-movie-o text-warning"></i>'; break;
			case 'mp3': return '<i class="fa fa-file-audio-o text-warning"></i>'; break;
			// note for these file types below no extension determination logic 
			// has been configured (the keys itself will be used as extensions)
			case 'jpg': return '<i class="fa fa-file-photo-o text-light"></i>'; break;
			case 'heic': return '<i class="fa fa-file-photo-o text-primary"></i>'; break;
			case 'HEIC': return '<i class="fa fa-file-photo-o text-danger"></i>'; break;
			default: return '<i class="fa fa-file-code-o text-danger"></i>'; break;
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CHS | Log in <?php echo $rutaip;?></title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
		
		<!-- ==== File Input ==== -->
		<link href="../plugins/fileinput/fileinput.css" type="text/css" rel="stylesheet" />
		<!-- /.login-box -->
		<!-- jQuery 2.2.3 -->
		<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<!-- iCheck -->
		<script src="../plugins/iCheck/icheck.min.js"></script>

		<!-- ==== File Input ==== -->
		<link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
		<script src="../plugins/fileinput/fileinput.js"></script>
		<script src="../plugins/fileinput/fileinput_locale_es.js"></script>
		<script src="../plugins/fileinput/fileInputFuncionesGenericas.js"></script>


		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			.login-page { background-attachment: fixed; }
			.tablaAnchoAltoFull { display: table; width: 100%; height: 100%; }
				.pseudoTr { display: table-row; }
				.pseudoTd { display: table-cell; }
				.pseudoTdCentradoVertical  { display: table-cell; vertical-align: middle; }
			.vcenter { display: inline-block; vertical-align: middle; float: none; }
			@media(max-width: 767px) {
				.vcenter { display: block; }
			}
		</style>
	</head>
	
	<body class="hold-transition login-page">
		<div class="tablaAnchoAltoFull">
			<div class="pseudoTr">
				<div class="pseudoTdCentradoVertical">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-md-offset-3" style="padding: 1em;">
							<div class="panel panel-default">
								<div class="panel-body">
									<div>
										<div class="login-logo"><a href="#"><img src="../dist/img/logo.png" style="max-width: 140px;" class="img-responsive center-block" alt=""></a></div>
											<div class="text-center" style="background-color: #19294a; border: green solid 1px; margin-bottom: 1em;">
												<img src="../dist/img//LOGO-SIGA-BLANCO.PNG" style="width: initial; height: 60px; margin: 1.5em; display: inline-block;" alt="User Image">
											</div>
										</div>
										<?php if($Cancelacion[0]!="1"){ ?>
											<form action="acepto.php" method="post">
												<input type="hidden" name="Id_Baja" value="<?php echo $motivo[0]["Id_Baja_Activo"] ?>">
												<input type="hidden" name="Id_Activo" value="<?php echo $_GET["Id_Activo"] ?>">
												<input type="hidden" name="Paso" value="<?php echo $_GET["Paso"] ?>">
												<input type="hidden" id="hddNoAcepto" value="0">

												<div class="row">
													<div class="col-md-12">
														<div class="form-group has-feedback">
															<p><center><b><?php echo $usuario[0]["Nombre_Usuario"] ?></b></center></p>
															<input type="text" class="form-control" disabled value="<?php echo $usuario[0]["Usuario"] ?>" placeholder="Usuario" id="txtUsuario" name="txtUsuario">
														</div>
													</div>
												</div>
												<?php if ($existe==0) { ?>
													<div class="row">
														<div class="col-md-12">
															<div class="form-group has-feedback">
																<input type="password" class="form-control" placeholder="Contraseña" id="txtPassword" name="txtPassword">
															</div>
															<div class="form-group has-feedback">
																<textarea placeholder="Motivo" class="form-control" id="Comentario" name="Comentario" cols="70" rows="6" ></textarea>
															</div>
														</div>
													</div>
													<hr />
													<div class="row">
														<div class="col-md-12">
															<h4>Datos de la baja:</h4>
															<div class="form-group has-feedback">
																<table class="table table-bordered">
																	<tr>
																		<td>Nombre del Activo / AFBC</td>
																		<td><?php echo $activo[0]["Nombre_Activo"] ?> / <?php echo $activo[0]["AF_BC"] ?></td>
																	</tr>
																	<tr>
																		<td>Ubicación Primaria</td>
																		<td><?php echo $primaria_secundaria[0]["Desc_Ubic_Prim"] ?></td>
																	</tr>
																	<tr>
																		<td>Ubicación Secundaria</td>
																		<td><?php echo $primaria_secundaria[0]["Desc_Ubic_Sec"] ?></td>
																	</tr>
																	<tr>
																		<td>Descripcion corta</td>
																		<td><?php echo $activo[0]["DescCorta"] ?></td>
																	</tr>
																	<tr>
																		<td>Marca</td>
																		<td><?php echo $activo[0]["Marca"] ?></td>
																	</tr>
																	<tr>
																		<td>Modelo</td>
																		<td><?php echo $activo[0]["Modelo"] ?></td>
																	</tr>
																	<tr>
																		<td>Serie</td>
																		<td><?php echo $activo[0]["NumSerie"] ?></td>
																	</tr>
																	<tr>
																		<td>Propiedad</td>
																		<td><?php echo $propiedad_activo[0]["Desc_Propiedad"] ?></td>
																	</tr>		 
																	<tr>
																		<td>Motivo de baja</td>
																		<td><?php echo $motivo[0]["Desc_Motivo_baja"] ?></td>
																	</tr>	
																	<tr>
																		<td>Destino final</td>
																		<td><?php echo $motivo[0]["Desc_Destino_final"] ?></td>
																	</tr>
																	<tr>
																		<td>Comentarios</td>
																		<td><?php echo $motivo[0]["Comentarios"] ?></td>
																	</tr>
																	<tr>
																		<td>Centro de Costos</td>
																		<td><?php echo $motivo[0]["Costos"] ?></td>
																	</tr>
																</table>
															</div>
														</div>
													</div>

													<!-- ==== Lista de archivos ligados previamente ==== -->
													<?php
														// Referencia al modelo sin usar el controlador
														echo "<!--";
														require_once("../modelos/simple_mvc/ActivoBajaArchivosModel.Class.php");
														echo "-->";
														// Crea el método que será el encargado de realizar la inserción
														$listaArchivos = new ActivoBajaArchivosModel();
														// Recupera la información
														$listaArchivos->Id_Activo = $Id_Activo;
														// Retorna el array con la respuesta de la ejecución
														$listaResultados = $listaArchivos->ActivoBajaArchivosGet($listaArchivos);
														if(count($listaResultados) > 0) { ?>
															<div class="row">
																<div class="col-md-12">
																	<h4>Archivos adjuntos de la baja:</h4>
																	<ol><?php
																	for($i = 0; $i < count($listaResultados); $i++) {
																		?><li>
																			<a href="../Archivos/Archivos-Activos-Bajas/<?php echo $_GET["Id_Activo"] . "/" . $listaResultados[$i]->Url_Adjunto ?>" target="_blank">
																				<?php echo obtenerIconoArchivo($listaResultados[$i]->Url_Adjunto) . " " . $listaResultados[$i]->Url_Adjunto; ?>
																			</a>
																		</li><?php
																	} ?>
																	</ol>
																</div>
															</div>
															<hr />
													<?php } ?>

													<!-- === Area para agregar archivos ==== -->
													<div class="row">
														<div id="ArchivosBajaArea" class="col-md-12">
															<div>
																<div class="text-justify">
																	<label for="ArchivosBajaAreaLabel" class="control-label" style="font-size: 11px;">Adjuntar máximo 5 archivos por bloque (10 Mb máximo)</label>
																	<a href="#!" class="text-danger" title="Tutorial para agregar / quitar documentos" style="float: right;" onclick="mostrarVideoAyuda('video/mp4', '../Archivos/Videos/Fase2/Funcionalidad/sigaFase2_001.mp4', '<i class=\'fa fa-info-circle \'></i>&nbsp;Tutorial para agregar / quitar documentos');"><i class="fa fa-info-circle"></i> <b>Ayuda</b></a>
																</div>
																<input id="ArchivosBajaAreaInputFile" name="imagenes[]" type="file" multiple="multiple" class="file-loading" />
																<input type="hidden" name="ArchivosBajaAreaInputHidden" id="ArchivosBajaAreaInputHidden" />
																<input type="hidden" name="Id_Activo_Baja_Form" id="Id_Activo_Baja_Form" value="<?php echo $Id_Activo; ?>" />
															</div>
															<hr />
															<div id="ArchivosBajaAreaLista"></div>
														</div>
													</div>
													<script type="text/javascript">
														// Parametros de configurtación del componente a través de funciones genericas
														var parametrosCargaArchivos = {
															nombreInputFile: "ArchivosBajaAreaInputFile",
															div_control: "ArchivosBajaArea",
															div_lista: "ArchivosBajaAreaLista",
															url_hidden: "ArchivosBajaAreaInputHidden",
															url_upload: "../Archivos/Archivos-Activos-Bajas",
															vista_imagen: false,
															show_upload: false,
															tipo_archivo: ["jpg", "jpeg", "png", "bmp", "gif", "pdf", "docx", "doc", "xls", "xlsx", "ppt","pptx", "xml" ],
															nombre_label: null,
															accionAgregar: () => guardarAdjuntoBaja(),
															accionEliminar: null,
															idInputObjetoPrincipal: "Id_Activo_Baja_Form",
															accionDespuesSubida: () => continuarWorkFlowBaja()
														};
														
														subirArchivosVsObjeto(parametrosCargaArchivos);

														// Función que guarda la relación entre el archivo y el activo dado de baja
														// La función se disparará en el momento de que se invoque ala función propia del componente Upload
														function guardarAdjuntoBaja() {
															var parametrosJson = { accion: "agregar", Id_Activo: <?php echo $Id_Activo; ?>, Id_Usuario: <?php echo $Id_Usuario; ?>, Url_Adjunto: $("#ArchivosBajaAreaInputHidden").val() };
															$.ajax({
																type: "POST",
																url: "../Controladores/activos/siga_baja_activo/Siga_baja_activo_archivosController.Class.php",
																async: false,
																data: parametrosJson,
																error: function (jqXHR) {
																	// Ha ocurrido un error
																	//mensajesalerta("Oh No!", jqXHR.responseText, "error", "dark");
																},
																success: function (data) {
																	// Recupera la respuesta
																	var respuesta = JSON.parse($.trim(data));
																	// Muestra el mensaje correspondiente
																	//mensajesalerta((respuesta.intResultado > 0 ? "&Eacute;xito" : "Oh No!"), respuesta.strMensaje, (respuesta.intResultado > 0 ? "success" : "error"), "dark");
																}
															});
														}
													</script>
												<?php
													}
												?>
												<div class="row">
													<div class="col-md-12">
														<div class="checkbox icheck" id="divMensaje">
															<label style="font-size: x-large;" class="text-center">
																<?php if ($existe==0) {?>
																	Acepto la baja del activo fijo <b><?php echo $activo[0]["Nombre_Activo"] ?></b> con clave <b><?php echo $activo[0]["AF_BC"] ?></b> mediante la validación de mi usuario y password
																<?php } else {?>
																	LA BAJA YA HA SIDO ACEPTADA
																<?php }?>
															</label>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 text-center">
														<?php if ($existe==0) {?>
															<input type="button" class="btn btn-primary btn-block chs" id="btnIngresar" name="btnIngresar" value="ACEPTO">
															<input type="button" class="btn btn-primary btn-block chs" id="btnNo" name="btnNo" value="NO ACEPTO">
															<input type="button" style="display:none" class="btn btn-primary btn-block chs" id="btnConfirmoNo" name="btnConfirmoNo" value="CONFIRMO NO ACEPTACIÓN Y COMENTARIO">
															<input type="button" style="display:none" class="btn btn-primary btn-block chs" id="btnCancelar" name="btnCancelar" value="CANCELAR">
														<?php }?>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="alert alert-danger alert-dismissible fade in" role="alert" style="display:none" id="divmensajeerror">
															<button type="button" id="alertClose" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
															<strong id="divErrorMnj"></strong>
														</div>
													</div>
												</div>
											</form>
										<?php }
										else{
											echo 'No se puede realizar la aceptación debido a que se canceló el proceso de baja.<br><br>';
											echo '<strong>Comentarios de la Cancelación: </strong>'.$Cancelacion[1].'<br>';
										} ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<script type="text/javascript">
			$(function () {
				$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
				});
			});
			$('#txtUsuario').focus();
			$("#txtUsuario").keypress(function (e) {
				if (e.which === 13) {
					if ($("#txtUsuario").val() !== "") {
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


			// Función que valida la contraseña del Usuario y realizar la acción de acpetar la baja o rechazarla
			function valida() {
				var valida = true;
				var txtUsuario = $.trim($('#txtUsuario').val());
				var txtPassword = $.trim($('#txtPassword').val());
				if ((txtUsuario !== "" && txtPassword !== "")) {
					valida = true;
				} 
				else {
					valida = false;
					$("#divErrorMnj").html("Por favor ingrese el usuario y/o contrase&ntilde;a.");
					$("#divmensajeerror").show("fade");
					$('#txtUsuario').focus();   
				}
				
				if (valida) {
					if ($("#hddNoAcepto").val() == 1) {
						var txtComentario = $.trim($('#Comentario').val());
						if (txtComentario !== "" ) {
							valida = true;
						} 
						else {
							$("#divErrorMnj").html("Por favor ingrese el comentario.");
							$("#divmensajeerror").show("fade");
							$('#Comentario').focus();
							valida = false;
						}
					}
				}
				
				if (valida) {
					$("#cargando").show();
					//$("#btnIngresar").hide();
					login();
				}
			};
		
			// Acción para el botón de Aceptar la Baja
			$('#btnIngresar').on('click', function () {
				valida();
			});
		
			
			$('#btnNo').on('click', function () {
				muestraComentario();
			});
		
			$('#btnConfirmoNo').on('click', function () {
				valida();
			});
	
			function muestraComentario() {
				$("#Comentario").show();
				$("#btnCancelar").show();
				$("#btnIngresar").hide();
				$("#btnNo").hide();
				$("#btnConfirmoNo").show();
				$("#divMensaje").hide();
				$("#hddNoAcepto").val(1);
			}
		
			$('#btnCancelar').on('click', function ()  {
				$("#Comentario").hide();
				$("#btnCancelar").hide();
				$("#btnIngresar").show();
				$("#btnNo").show();
				$("#btnConfirmoNo").hide();
				$("#divMensaje").show();
				$("#hddNoAcepto").val(0);
			});
		
			$("#alertClose").click(function(e) {
				$("#divmensajeerror").hide();
			});

			// Valida que la contraseña del usario sea valida
			login = function () {
				$("#btnIngresar").hide();
						$("#btnNo").hide();
				$.post("../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php", {
				Usuario: $.trim($('#txtUsuario').val()), 
				Password: $.trim($('#txtPassword').val()),
				accion: "login"
				},
				function (result) {
					$("#cargando").hide();
					//$("#btnIngresar").show();
					if (result !== "") {
						var jsonResult = eval("(" + result + ")");
						if (jsonResult.estatus === "ok") {
							// Enviará a la pagina que hará la actualización en el workflow de ala baja
							var numArchivosXSubir = $('#ArchivosBajaAreaInputFile').fileinput('getFilesCount');
							if(numArchivosXSubir > 0) {
								// Se dispara la subida de archivos y una vez que se hayan subido, se redirecciona a la siguiente pagina
								// Para ello, la función que redirige, esta definida en las propiedades que se pasan para ganerar el control fileinput (accionDespuesSubida)
								$('#ArchivosBajaAreaInputFile').fileinput('upload');
							}
							else {
								// Redirecciona a la página que realizará la aceptación/rechazo de la baja
								continuarWorkFlowBaja();
							}
						} 
						else {
							$("#btnIngresar").show();
							$("#btnNo").show();
							if($("#txtUsuario").val() != "") {
								$("#divErrorMnj").html("El usuario y/o contrase&ntilde;a es incorrecta");
								$("#divmensajeerror").show("fade");
								$('#txtUsuario').focus();
							}
							else {
								$("#divErrorMnj").html("Usuario o contrase&ntilde;a incorrecta");
								$("#divmensajeerror").show("fade");
								$('#txtUsuario').focus();
							}
						}
					}
				});
			};

			// Función que redireccionará a la siguiente página que almacena el siguiente paso en el proceso de baja
			function continuarWorkFlowBaja() {
				// Redirecciona a la página que realizará la aceptación/rechazo de la baja
				if ($("#hddNoAcepto").val() == 1) {
					$(location).attr('href', 'noaceptado.php?Comentario='+$.trim($('#Comentario').val())+'&Paso=<?php echo $Paso?>&Id_Activo=<?php echo $Id_Activo ?>&Id_Baja=<?php echo $Id_Baja ?>&Id_Usuario=<?php echo $Id_Usuario ?>');	
				}
				else {
					$(location).attr('href', 'aceptado.php?Paso=<?php echo $Paso?>&Id_Activo=<?php echo $Id_Activo ?>&Id_Baja=<?php echo $Id_Baja ?>&Id_Usuario=<?php echo $Id_Usuario ?>&Comentario=' + $.trim($('#Comentario').val()));
					//$.post("aceptado.php",{Paso:<?php echo $Paso?>,Id_Activo: <?php echo $Id_Activo ?>,Id_Usuario:<?php echo $Id_Usuario ?>});
				}
			}
		</script>
	</body>
</html>