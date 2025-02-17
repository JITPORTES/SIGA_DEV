<?php
//session_start();
//session_destroy();
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/class/utilities.class.php");

$aa = $_GET['aa'];

$utilitiesClass = new utilities();
$siga_num 		= $utilitiesClass->desencriptar($aa);
$siga_nombre 	= $utilitiesClass->getSigaDatos($siga_num);



?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CHS | Log in </title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="../../../../bootstrap/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../../../../dist/css/AdminLTE.min.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="../../../../plugins/iCheck/square/blue.css">
		
		<!-- ==== File Input ==== -->
		<link href="../../../../plugins/fileinput/fileinput.css" type="text/css" rel="stylesheet" />
		<!-- /.login-box -->
		<!-- jQuery 2.2.3 -->
		<script src="../../../../plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="../../../../bootstrap/js/bootstrap.min.js"></script>
		<!-- iCheck -->
		<script src="../../../../plugins/iCheck/icheck.min.js"></script>

		<!-- ==== File Input ==== -->
		<link rel="stylesheet" href="../../../../plugins/fileinput/fileinput.css">
		<script src="../../../../plugins/fileinput/fileinput.js"></script>
		<script src="../../../../plugins/fileinput/fileinput_locale_es.js"></script>
		<script src="../../../../plugins/fileinput/fileInputFuncionesGenericas.js"></script>

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
										<div class="login-logo"><a href="#"><img src="../../../../dist/img/logo.png" style="max-width: 140px;" class="img-responsive center-block" alt=""></a></div>
											<div class="text-center" style="background-color: #19294a; border: green solid 1px; margin-bottom: 1em;">
												<img src="../../../../dist/img/LOGO-SIGA-BLANCO.PNG" style="width: initial; height: 60px; margin: 1.5em; display: inline-block;" alt="User Image">
											</div>
										</div>
											<input type="hidden" name="siga_txt_dato" id="siga_txt_dato" value="<?php echo $aa;?>" disabled>
											<div class="row">
													<div class="col-md-12">
														<center>
														Vale de resguardo digital
														</center>														
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<center>
														Se requiere su firma VED
														</center>														
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<div class="form-group has-feedback">
															<input type="text" class="form-control" placeholder="Número de colabolador" value="<?php echo $siga_nombre;?>" id="siga_txt_Usuario" name="siga_txt_Usuario" disabled>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-md-12">
														<div class="form-group has-feedback">
															<input type="password" class="form-control" placeholder="Contraseña" value="" id="siga_txt_Password" name="siga_txt_Password">
														</div>
													</div>
												</div>
							
												<div class="row">
													<div class="col-md-12 text-center">
														<input type="button" class="btn btn-primary btn-block chs" id="btnIngresar" name="btnIngresar" value="Ingresar">
														<!-- <input type="button" class="btn btn-primary btn-block chs" id="btnNo" name="btnNo" value="NO ACEPTO"> -->
													</div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<div class="alert alert-danger alert-dismissible fade in" role="alert" style="display:none" id="divmensajeerror">
															<button type="button" id="alertClose" class="close" aria-label="Close"><span aria-hidden="true"></span></button>
															<strong id="divErrorMnj"></strong>
														</div>
													</div>
												</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<script type="text/javascript">			
		$(document).ready(function() {

    	$('#siga_txt_Password').focus();	
						
			$('#btnIngresar').on('click', function(){
				let siga_txt_dato 		= $('#siga_txt_dato').val();
				let siga_txt_Password = $('#siga_txt_Password').val();				
				let validar 					= true;

				if(siga_txt_dato==''){
					
					validar = false;
				}	else if(siga_txt_Password == ''){
					
					validar = false;
				}

				if(validar){
					

					$.ajax({
						type: "POST",
						url: "/siga/class/tic/vrd/vrd.ajax.php",
						data: {accion:3, siga_txt_dato:siga_txt_dato, siga_txt_Password:siga_txt_Password},
						dataType: "JSON",
						cache: false,
						beforeSend: function (){
							
						},
						success: function (response) {		
							console.log(response);				
								
							if(response ==1){
								$('#siga_txt_Password').val('');
								location.replace("vale-resguardo.php");								
								}else{
									alert('Firma Inválida');
									$('#siga_txt_Password').val('');
									$('#siga_txt_Password').focus();
								}
						}

					});

				}

			});


		});
	</script>

	</body>
</html>