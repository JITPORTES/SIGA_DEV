<?php 
	error_reporting(1);
	require_once("class/SIGA.php");
	require_once("../datos/mail/correo.php");
	require_once("CURL.php");
	$obj = new SIGA();
	$EstatusAceptado=0;
	
	if (isset($_GET["Paso"])) {
		// Si acepta	 
		$Paso = $_GET["Paso"];
		$Id_Activo = $_GET["Id_Activo"];
		$Id_Baja = $_GET["Id_Baja"];
		$Id_Usuario = $_GET["Id_Usuario"];
		$Comentario = $_GET["Comentario"];

		$workflow = $obj->obtenWorkflow($Paso);
		$email = $workflow[0]["CorreoResponsable"];
		$email = "itdeveloper@hospitalsatelite.com";
		$ClaveWorkflow = $workflow[0]["CveWorkflow"]; 
		$Seguimiento = $workflow[0]["ClaveTabla"];

		//print_r($workflow);
		$EstatusAceptado = $obj->verifico_baja_aceptada($Id_Activo, $ClaveWorkflow, $Id_Baja);
		if($EstatusAceptado == 0) {
			$obj->actualizaSeguimientoBaja($Id_Activo, $ClaveWorkflow, $Seguimiento, $Comentario, $Paso, $Id_Baja);
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CHS | Log in</title>
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
		<!-- jQuery 2.2.3 -->
		<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<!-- iCheck -->
		<script src="../plugins/iCheck/icheck.min.js"></script>
		<!-- iCheck -->
		<link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
		<!-- PNotify -->
		<link href="../plugins/pnotify/dist/pnotify.css" rel="stylesheet">
		<link href="../plugins/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
		<link href="../plugins/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
		<script src="../plugins/pnotify/dist/pnotify.js"></script>
		<script src="../plugins/pnotify/dist/pnotify.buttons.js"></script>
		<script src="../plugins/pnotify/dist/pnotify.nonblock.js"></script>

		<!-- Funciones -->
		<script src="../js/Funciones.js"></script>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="hold-transition login-page">
		<div class="login-box" style="width: 500px;">
			<div class="login-box-body">
				<div class="login-logo"><a href="#"><img src="../dist/img/logo.png" alt=""></a></div>
				<div class="fluid-container" align="center" style="align:center;background-color:#19294a">
					<br><img src="../dist/img//LOGO-SIGA-BLANCO.PNG" style="width:155px;height:55px" alt="User Image"><br>
				</div>
				<br>
				<form action="login.php" method="post">
					<input type="hidden" name="Id_Activo" value="<?php echo $_GET["Id_Activo"] ?>" />
					<input type="hidden" name="Paso" value="<?php echo $_GET["Paso"] ?>" />

					<div class="row">  
						<div class="col-md-12">  
							<div class="checkbox icheck">
								<label style="font-size: x-large;">Baja Aceptada</label>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-4">
							<input type="button" class="btn btn-primary btn-block chs" id="btnIngresar" name="btnIngresar" value="Salir">
						</div>
						<div class="col-md-12">
							<div class="alert alert-danger alert-dismissible fade in" role="alert" style="display:none" id="divmensajeerror">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<strong id="divErrorMnj"></strong>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php if($EstatusAceptado==0) { ?>
			<script type="text/javascript">
				function enviaCorreoBaja(Id_Activo,Id_Baja,usuario,Paso) {
					$.ajax({
						type: "POST",
						encoding:"UTF-8",
						url: "../vistas/enviacorreobaja.php",
						async: false,
						data: {Id_Activo:Id_Activo,Id_Baja:Id_Baja,Paso:Paso,Usuario:usuario},
						dataType: "html",
						beforeSend: function (xhr) {
						},
						success: function (datos) {
							alert("Correo enviado Correctamente.");	
						},
						error: function () {
							alert("Ocurrio un error al enviar.");
						}
					});
				}
			
				<?php if (isset($_GET["Paso"])) {
					// Si acepta
					$Paso = $Paso + 1;
					$email = "jrivera@hospitalsatelite.com";

					if ($Paso == 2) {
						// Obtiene el correo del Responsable del activo
						$activo = $obj->obtenCatalogo($Id_Activo,"siga_activos","Id_Activo","Id_Activo"); 
						//print_r($usuarioEnvia);
						$usuarioResp = $activo[0]["Num_Empleado"];
						$workflowAct = $obj->obtenWorkflow(2); 
						if ($workflowAct[0]["CorreoResponsable"] != "")
							$usuarioResp = $workflowAct[0]["CorreoResponsable"];
						$usuarioEnvia = $obj->obtenCatalogo($usuarioResp,"siga_usuarios","No_Usuario","No_Usuario");
					}
				
					if ($Paso == 3) {
						// Obtiene el correo del Titular del area gestora
						$activo = $obj->obtenCatalogo($Id_Activo,"siga_activos","Id_Activo","Id_Activo"); 
						//print_r($usuarioEnvia);
						$Id_Area = $activo[0]["Id_Area"];
						//echo "Id_Area=".$Id_Area;
						$usuarioEnvia = $obj->obtenCatalogo($Id_Area,"siga_jefe_area","Id_Area","Id_Area"); 
						//print_r($usuarioEnvia);
						$usuarioResp = $usuarioEnvia[0]["Num_Empleado"];
						$workflowAct = $obj->obtenWorkflow(3); 
						if ($workflowAct[0]["CorreoResponsable"] != "")
							$usuarioResp = $workflowAct[0]["CorreoResponsable"];
						//echo $usuarioResp;
						$usuarioEnvia = $obj->obtenCatalogo($usuarioResp,"siga_usuarios","No_Usuario","No_Usuario");
					}

					if ($Paso == 4) {
						// Obtiene el correo del Titular Dirección Administrativa
						$usuarioResp = 242;
						$workflowAct = $obj->obtenWorkflow(4); 
						if ($workflowAct[0]["CorreoResponsable"] != "")
							$usuarioResp = $workflowAct[0]["CorreoResponsable"];
						//echo $usuarioResp;
						$usuarioEnvia = $obj->obtenCatalogo($usuarioResp,"siga_usuarios","No_Usuario","No_Usuario");
					}
				
					if ($Paso == 5) {
						// Obtiene el correo del Titular Contabilidad
						$usuarioResp = 1440;
						$workflowAct = $obj->obtenWorkflow(5); 
						if ($workflowAct[0]["CorreoResponsable"] != "")
							$usuarioResp = $workflowAct[0]["CorreoResponsable"];
						//echo $usuarioResp;
						$usuarioEnvia = $obj->obtenCatalogo($usuarioResp,"siga_usuarios","No_Usuario","No_Usuario");
					}

					if ($Paso == 6) {
						// Obtiene el correo de Seguridad
						/*
						$usuarioResp = 1440;
						//echo $usuarioResp;
						$usuarioEnvia = $obj->obtenCatalogo($usuarioResp,"siga_usuarios","No_Usuario","No_Usuario");
						*/
					}


					if ($Paso < 6) {
						if (count($usuarioEnvia) > 0) { ?>
							alert('Siguiente autorización enviada a <?php echo $usuarioEnvia[0]["Usuario"] ?>');
							enviaCorreoBaja(<?php echo $Id_Activo ?>,<?php echo $Id_Baja ?>,'<?php echo $usuarioEnvia[0]["Id_Usuario"] ?>',<?php echo $Paso ?>);
							<?php
						}
						else { ?>
							alert('No existe usuario responsable del activo');
						<?php }
					}
					else {
						// Envío de la baja al área de hemodinamia a través de un webservices
						// Solo aplica para el último paso en el Workflow
						// Ruta para dar de baja un activo en hemodinamia
						$url = "http://gtihdm.hospitalsatelite.com:8083/gtihdm/controllers/catalog_eq_biomedico_c_delete.asp";
						// Obtiene la información del Activo
						$activo = $obj->obtenCatalogo($Id_Activo, "siga_activos", "Id_Activo", "Nombre_Activo", "", " and Estatus_Reg<>3 ");
						// Activo a dar de baja en hemodinamia
						$bajaActivoASP = "";
						if($activo[0]["Id_Area"] == 1) {
							// Solo aplica para equipos del Area Biomedica	
							$data = array('x_af_bc_siga' => $activo[0]["AF_BC"]);
							// Realiza la ejecución de baja del activo al sistema de hemodinamia
							$obj = new CURL();
							$bajaActivoASP = utf8_decode(trim($obj->curlData($url, $data, false)));
						}
						// Adjunta el mensaje cuando se vió reflejada la baja en el Sistema de Hemodinamia
						?>setTimeout(function() {
							mensajesalerta("Informaci&oacute;n", 'Proceso finalizado.\n<?php echo $bajaActivoASP; ?>', "info", "dark");
						}, 100);<?php
					}
				} ?>
			
				$("#btnIngresar").click(function(e){
					document.location = 'login.php';
				});
			</script>
		<?php } ?>
	</body>
</html>