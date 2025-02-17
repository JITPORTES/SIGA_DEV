<?php
	$Id_Solicitud=$_GET['key'];
	$Id_Usuario=$_GET['gest'];
	$Tipo=$_GET['tipo'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ticket</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- File Input -->
  <link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- fullCalendar -->
  <link rel="stylesheet" href="../plugins/fullcalendaryear/fullcalendar.css">
  <link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

	 <!-- PNotify -->
  <link href="../plugins/pnotify/dist/pnotify.css" rel="stylesheet">
  <link href="../plugins/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
  <link href="../plugins/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
	<link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
  <link rel="stylesheet" href="../dist/css/jquery-confirm.min.css">
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
	<style>
		.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
				background-color: #ffffff;
		}
		
	</style>
</head>
<body class="hold-transition skin-blue sidebar-collapse">
 <input type="hidden" id="Id_Solicitud" value="<?php echo $Id_Solicitud; ?>">
 <input type="hidden" id="Id_Cirugia" >
 <input type="hidden" id="Id_Usuario" value="<?php echo $Id_Usuario; ?>">
  <input type="hidden" id="Tipo" value="<?php echo $Tipo; ?>">
	<div style="background-color:#242982" align="center" >
		<h3><font color="white"><?php if($Tipo==2){echo "PRE-REGISTRO DE EQUIPO";}else{echo "RECEPCI&Oacute;N DE EQUIPO";}?></font></h3>
	</div>
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content">
				<div class="col-md-12" align="center">
						<label class="control-label" style="font-size: 12px;">DATOS DE LA CIRUG&Iacute;A / PROCEDIMIENTO</label>
					</div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">Nombre Procedimiento</label>	
              <input  class="form-control" id="Pre_Re_Procedimiento" placeholder="Nombre Procedimiento" disabled>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">Fecha / Hora Cirug&iacute;a  / Procedimiento</label>	
              <input  class="form-control" id="Pre_Re_Fecha_Hora_Cirugia" placeholder="Fecha / Hora Cirug&iacute;a / Procedimiento" disabled>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">Quir&oacute;fano / Sala</label>	
              <input  class="form-control" id="Pre_Re_Quirofano" placeholder="Quir&oacute;fano / Sala" disabled>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Paciente</label>	
              <input  class="form-control" id="Pre_Re_Paciente" placeholder="Paciente" disabled>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Cirujano / M&eacute;dico Tratante</label>	
              <input  class="form-control" id="Pre_Re_Cirujano" placeholder="Cirujano / M&eacute;dico Tratante" disabled>
            </div>
          </div>
					<div class="col-md-12" align="center">
						<label class="control-label" style="font-size: 12px;">DATOS DEL PROVEEDOR</label>
					</div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">Empresa</label>	
              <input  class="form-control" id="Pre_Re_Empresa" placeholder="Empresa" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">Nombre Proveedor</label>	
              <input  class="form-control" id="Pre_Re_Nombre_Proveedor" placeholder="Nombre Proveedor" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">Tel&eacute;fono</label>	
              <input  class="form-control" id="Pre_Re_Telefono" placeholder="Tel&eacute;fono" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">Correo</label>	
              <input  class="form-control" id="Pre_Re_Correo" placeholder="Correo" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>
            </div>
          </div>
					<div class="col-md-12" align="center">
						<label class="control-label" style="font-size: 12px;">DATOS DEL EQUIPO</label>
					</div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">Nombre</label>	
              <input  class="form-control" id="Pre_Re_Nombre" placeholder="Nombre" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">Marca</label>	
              <input  class="form-control" id="Pre_Re_Marca" placeholder="Marca" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">Modelo</label>	
              <input  class="form-control" id="Pre_Re_Modelo" placeholder="Modelo" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">No. Serie</label>	
              <input  class="form-control" id="Pre_Re_No_Serie" placeholder="No. Serie" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">Cantidad de Equipos</label>	
              <input  class="form-control" id="Pre_Re_Cantidad_Equipos" placeholder="Cantidad de Equipos" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>
            </div>
          </div>
					<div class="col-md-12">
						<hr>
						<div class="form-group" align="center">
							<label class="control-label" style="font-size: 12px;">Accesorios</label>
						</div>
						</hr>
          </div>
					<div class="table-responsive col-md-12">
						<table class="table table table-bordered table-striped table-chs" id="tbl_accesorios_act_pre">
							<tbody id="body_accesorios_act_pre" border="0">
								
							</tbody>
						</table>
					</div>	
					<div class="col-md-12" style="<?php if($Tipo==2 || $Tipo==3 ){echo "display:none";}?>">
            <div class="form-group" align="center">
							<input type="button" class="btn chs" value="Agregar Accesorios" id="Agregar_Accesorios_Preregistro" style="display: inline-block;">
            </div>
          </div>
							
					<div class="col-md-12">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">Observaciones Pre-Registro</label>	
              <textarea  class="form-control" id="Pre_Re_Observaciones" placeholder="Observaciones" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>></textarea>
            </div>
          </div>
					
					<div class="col-md-12" >
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">Comentarios de la recepci&oacute;n del Equipo</label>	
              <textarea  class="form-control" id="Comentarios_Recepcion" placeholder="" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>></textarea>
            </div>
          </div>
					<div class="col-md-3" style="display:none" id="div_mot_rech">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 12px;">Motivo del Rechazo</label>	
              <select class="form-control" id="Id_Motivo_Rechazo">
                    <option value="-1">--Motivo Rechazo--</option>
              </select>
            </div>
          </div>
					<div class="form-group row" id="div_btns" align="center" style="<?php if($Tipo==2 || $Tipo==3 ){echo "display:none";}?>">
						<div class="col-md-12 col-sm-12  offset-md-3">
							<button type="button" class="btn btn-primary" onclick="Guardar_Preregistro()">Aceptar Ingreso</button>
							<button type="button" class="btn btn-danger" onclick="Guardar_Rechazo()">Rechazo</button>
						</div>
					</div>
					<div id="div_calif_ticket" align="center">
					</div>
					<?php if($Tipo==2){ ?>
					<div class="col-md-12 col-sm-12  offset-md-3" align="center" align="center" style="display:none">
						<a href="#noir" class="btn btn-primary" onclick="modal_biomedica()">Ingresar solo usuarios de Biom&eacute;dica</a>
						<br>
					</div>
					
					
					
					<div class="modal fade modalchs" data-backdrop="true" id="Modal_login_biomedica">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header azuldef">
								<button type="button" class="close"  data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Seguimiento Recepci&oacute;n de Equipo </h4>
								</div>

								<div class="modal-body nopsides">
								
								<div class="col-md-12">
									<div class="col-md-2"></div>
									<div class="col-md-8">
										<img src="../dist/img/logo.png" alt="" class="img-fluid">
									</div>
									<div class="col-md-2"></div>									
								</div>
								<div class="col-md-12">
									<label class="control-label" style="font-size: 11px;">Acceso para personal de Biom&eacute;dica del Corporativo Hospital Sat&eacute;lite.</label>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label" style="font-size: 11px;">Usuario</label>
										<input  class="form-control" id="txtUsuario" name="txtUsuario" placeholder="Usuario">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label" style="font-size: 11px;">Contrase&ntilde;a</label>
										<input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Contrase&ntilde;a">
									</div>
								</div>
								<div class="tab-content">
									 <div class="modal-footer">
										<input type="button" class="btn btn-primary btn-block chs" id="btnIngresar" name="btnIngresar" value="Ingresar">
										<input type="button" class="btn btn-danger btn-block chs" id="btnIngresar" name="btnIngresar" value="Cerrar Ventana" onclick="cerrar_ventana()">
										
										<div class="col-md-12">
											<div class="alert alert-danger alert-dismissible fade in" role="alert" style="display:none" id="divmensajeerror">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">�</span>
											</button>
											<strong id="divErrorMnj"></strong>
											</div>
										</div>
									 </div>
								</div>
							</div>
							</div>
						</div>
					</div>	
					
					<?php } ?>
					
			</section>
        <!-- /.content -->
    </div>
    
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- File Input -->
<script src="../plugins/fileinput/fileinput.js"></script>
<script src="../plugins/fileinput/fileinput_locale_es.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/fullcalendaryear/fullcalendar.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../js/Funciones.js"></script>

<!-- PNotify -->
<script src="../plugins/pnotify/dist/pnotify.js"></script>
<script src="../plugins/pnotify/dist/pnotify.buttons.js"></script>
<script src="../plugins/pnotify/dist/pnotify.nonblock.js"></script>

<script src="../dist/js/jquery-confirm.min.js"></script>  

<!--Se utilizan para el calendario de fecha y hora de preregistro-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" rel="stylesheet"/>
<!--Fin Se utilizan para el calendario de fecha y hora de preregistro-->

<script>
		$('#Pre_Re_Fecha_Hora_Cirugia').datetimepicker({
				dateFormat: 'yyyy:mm:dd HH:ii'
		});


		$("#Modal_login_biomedica").modal("show");
		var numfila=0;
		var array_accesorios_act_ext=[];
		var array_eliminados_act_ext=[]; var cont_eliminados_act_ext=0;
		cmb_motivo_rechazo();
		ver_preregistro();
		function ver_preregistro(){
			numfila=0;
			array_accesorios_act_ext=[];
			array_eliminados_act_ext=[]; 
			cont_eliminados_act_ext=0;
			
			$("#Pre_Re_Procedimiento").val("");
			$("#Pre_Re_Procedimiento").prop("disabled", true);
			$("#Pre_Re_Fecha_Hora_Cirugia").val("");
			$("#Pre_Re_Fecha_Hora_Cirugia").prop("disabled", true);
			$("#Pre_Re_Quirofano").val("");
			$("#Pre_Re_Quirofano").prop("disabled", true);
			$("#Pre_Re_Paciente").val("");
			$("#Pre_Re_Paciente").prop("disabled", true);
			$("#Pre_Re_Cirujano").val("");
			$("#Pre_Re_Cirujano").prop("disabled", true);
			
			$("#Modal_enviar_preregistro").modal("show");
			
			if($("#Id_Solicitud").val()!=""){
				var readonly=""; var Estatus_Recepcion="";
				$.ajax({
						type: "POST",
						url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
						async: false,
						data: {
							Id_Solicitud: $.trim($("#Id_Solicitud").val()),
							Estatus_Reg:'1',
							accion: "consultar"
						},
						dataType: "html",
						beforeSend: function (xhr) {
							jsShowWindowLoad("Cargando Informaci&oacuten.");
						},
						success: function (data) {
							data = eval("(" + data + ")");
							var Prioridad = "";
							if (data.totalCount > 0) {
								Estatus_Recepcion=data.data[0].Estatus_Recepcion;
								if(data.data[0].Estatus_Recepcion==1){
									$("#Pre_Re_Nombre").prop("disabled", true);
									$("#Pre_Re_Marca").prop("disabled", true);
									$("#Pre_Re_Modelo").prop("disabled", true);
									$("#Pre_Re_No_Serie").prop("disabled", true);
									$("#Pre_Re_Cantidad_Equipos").prop("disabled", true);
									$("#Pre_Re_Empresa").prop("disabled", true);
									$("#Pre_Re_Nombre_Proveedor").prop("disabled", true);
									$("#Pre_Re_Telefono").prop("disabled", true);
									$("#Pre_Re_Correo").prop("disabled", true);
									$("#Pre_Re_Observaciones").prop("disabled", true);
									$("#Comentarios_Recepcion").prop("disabled", true);
									if(data.data[0].Id_Motivo_Rechazo!=""){
										$("#div_mot_rech").show();
										$("#Id_Motivo_Rechazo").val(data.data[0].Id_Motivo_Rechazo);
										$("#Id_Motivo_Rechazo").prop("disabled", true);
									}
									$("#Agregar_Accesorios_Preregistro").hide();
									$("#div_btns").hide();
									readonly="readonly";
									
									if("<?php echo $Tipo;?>"=="1"){
										var url_ticket="";
										
										var Request_Uri="<?php echo $_SERVER["REQUEST_URI"];?>";
										
										Request_Uri = Request_Uri.split('/');
										if(Request_Uri[1]=="sigapruebas"||Request_Uri[1]=="SIGAPRUEBAS"){
											//url_ticket="http://siga.hospitalsatelite.com:8080/SIGAPRUEBAS/vistas/login.php?Area="+data.data[0].Id_Area+"&Sis=2&EstProc=2&Solic="+data.data[0].Id_Solicitud+"&Seccion="+data.data[0].Seccion+"";
											url_ticket="https://apps2.hospitalsatelite.com/SIGAPRUEBAS/vistas/login.php?Area="+data.data[0].Id_Area+"&Sis=2&EstProc=2&Solic="+data.data[0].Id_Solicitud+"&Seccion="+data.data[0].Seccion+"";
										}
										if(Request_Uri[1]=="siga"||Request_Uri[1]=="SIGA"){
											//url_ticket="http://siga.hospitalsatelite.com/SIGA/vistas/login.php?Area="+data.data[0].Id_Area+"&Sis=2&EstProc=2&Solic="+data.data[0].Id_Solicitud+"&Seccion="+data.data[0].Seccion+"";
											url_ticket="https://apps2.hospitalsatelite.com/SIGA/vistas/login.php?Area="+data.data[0].Id_Area+"&Sis=2&EstProc=2&Solic="+data.data[0].Id_Solicitud+"&Seccion="+data.data[0].Seccion+"";
										}
										if(url_ticket!=""){
											$("#div_calif_ticket").html('<a href="'+url_ticket+'" class="btn btn-primary">Calificar Ticket</a>');
										}
										
										$('html,body').animate({
											scrollTop: $("#div_calif_ticket").offset().top
										}, 100);
									}
								}
								
								
								if(data.data[0].Id_Cirugia==""){
									$("#Pre_Re_Procedimiento").val(data.data[0].Pre_Re_Procedimiento);
									$("#Pre_Re_Fecha_Hora_Cirugia").val(data.data[0].Pre_Re_Fecha_Hora_Cirugia);
									$("#Pre_Re_Quirofano").val(data.data[0].Pre_Re_Quirofano);
									$("#Pre_Re_Paciente").val(data.data[0].Pre_Re_Paciente);
									$("#Pre_Re_Cirujano").val(data.data[0].Pre_Re_Cirujano);
								}
								
								
								$("#Pre_Re_Nombre").val(data.data[0].Nombre_Act_Ext);
								$("#Pre_Re_Marca").val(data.data[0].Marca_Act_Ext);
								$("#Pre_Re_Modelo").val(data.data[0].Modelo_Act_Ext);
								$("#Pre_Re_No_Serie").val(data.data[0].No_Serie_Act_Ext);
								$("#Pre_Re_Cantidad_Equipos").val(data.data[0].Cantidad_Equ_Ext);
								$("#Pre_Re_Empresa").val(data.data[0].Empresa_Ext);
								$("#Pre_Re_Nombre_Proveedor").val(data.data[0].Nombre_Completo_Ext);
								$("#Pre_Re_Telefono").val(data.data[0].Telefono_Ext);
								$("#Pre_Re_Correo").val(data.data[0].Correo_Ext);
								$("#Pre_Re_Observaciones").val(data.data[0].Observ_Pre_Reg_Ext);
								$("#Comentarios_Recepcion").val(data.data[0].Comentarios_Recepcion);
								$("#Id_Cirugia").val(data.data[0].Id_Cirugia);
								consulta_gtiqx(data.data[0].Id_Cirugia);
									
							}
						},
						complete: function (xhr) {
							jsRemoveWindowLoad();
						},
						error: function () {
							mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
						}
				});
				
				$.ajax({
						type: "POST",
						url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
						async: true,
						data: {
							Id_Solicitud: $.trim($("#Id_Solicitud").val()),
							accion: "Accesorios_Ext"
						},
						dataType: "html",
						beforeSend: function (xhr) {
							jsShowWindowLoad("Cargando Informaci&oacuten.");
						},
						success: function (json) {
							json = eval("(" + json + ")");
							var Prioridad = "";
							if (json.totalCount > 0) {
								var tr="";
								tr+='<tr>';
								tr+='	<td>';
								tr+='		<div class="col-md-12">';
								tr+='			<div class="form-group">';
								tr+='				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="red">*</font></span>';
								tr+='				<label class="control-label" style="font-size: 11px;">Accesorio</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								tr+='			</div>';
								tr+='		</div>';
								tr+='	</td>';
								tr+='	<td>';
								tr+='		<div class="col-md-12">';
								tr+='			<div class="form-group">';
								tr+='				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="red">*</font></span>';
								tr+='				<label class="control-label" style="font-size: 11px;">Cantidad</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								tr+='			</div>';
								tr+='		</div>';
								tr+='	</td>';
								tr+='	<td>';
								tr+='		<div class="col-md-12">';
								tr+='			<div class="form-group">';
								tr+='				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="red">*</font></span>';
								tr+='				<label class="control-label" style="font-size: 11px;">Marca</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								tr+='			</div>';
								tr+='		</div>';
								tr+='	</td>';
								tr+='	<td>';
								tr+='		<div class="col-md-12">';
								tr+='			<div class="form-group">';
								tr+='				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="red">*</font></span>';
								tr+='				<label class="control-label" style="font-size: 11px;">Modelo</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								tr+='			</div>';
								tr+='		</div>';
								tr+='	</td>';
								tr+='	<td>';
								tr+='		<div class="col-md-12">';
								tr+='			<div class="form-group">';
								tr+='				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="red">*</font></span>';
								tr+='				<label class="control-label" style="font-size: 11px;">No&nbsp;Serie</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								tr+='			</div>';
								tr+='		</div>';
								tr+='	</td>';
								if($("#Tipo").val()==1&&Estatus_Recepcion!="1"){
								tr+='	<td >';
								tr+='		<div class="col-md-12">';
								tr+='			<div class="form-group">';
								tr+='				<label class="control-label" style="font-size: 11px;">Eliminar</label>';
								tr+='			</div>';
								tr+='		</div>';
								tr+='	</td>';
								}
								tr+='</tr>';
								$("#body_accesorios_act_pre").html(tr);
								
								
								for(var i=0; i<json.totalCount; i++){
									var clonarfila= "";
									clonarfila='<tr id="tr_acc_act_pre_'+numfila+'">';
									clonarfila+='	<td>';
									clonarfila+='		<div class="col-md-12">';
									clonarfila+='			<div class="form-group">';
									clonarfila+='				<input type="hidden" class="form-control revision_check_list_act_pre" id="hdd_id_accesorio_pre_'+numfila+'" placeholder="Nombre" value="'+json.data[i].Id_Accesorio_Ext+'" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>';
									clonarfila+='				<input '+readonly+' type="text" class="form-control revision_check_list_act_pre" id="Acc_Nombre_Pre_'+numfila+'" placeholder="Nombre" value="'+json.data[i].Nombre_Ext+'" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>';
									clonarfila+='			</div>';
									clonarfila+='		</div>';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='		<div class="col-md-12">';
									clonarfila+='			<div class="form-group">';
									clonarfila+='				<input '+readonly+' type="text" class="form-control input-number revision_check_list_act_pre" id="Acc_Cantidad_Pre_'+numfila+'" placeholder="Marca" value="'+json.data[i].Cantidad_Ext+'" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>';
									clonarfila+='			</div>';
									clonarfila+='		</div>';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='		<div class="col-md-12">';
									clonarfila+='			<div class="form-group">';
									clonarfila+='				<input '+readonly+' type="text" class="form-control revision_check_list_act_pre" id="Acc_Marca_Pre_'+numfila+'" placeholder="Marca" value="'+json.data[i].Marca_Ext+'" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>';
									clonarfila+='			</div>';
									clonarfila+='		</div>';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='		<div class="col-md-12">';
									clonarfila+='			<div class="form-group">';
									clonarfila+='				<input '+readonly+' type="text" class="form-control revision_check_list_act_pre" id="Acc_Modelo_Pre_'+numfila+'" placeholder="Modelo" value="'+json.data[i].Modelo_Ext+'" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>';
									clonarfila+='			</div>';
									clonarfila+='		</div>';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='		<div class="col-md-12">';
									clonarfila+='			<div class="form-group">';
									clonarfila+='				<input '+readonly+' type="text" class="form-control revision_check_list_act_pre" id="Acc_SeriePre_'+numfila+'" placeholder="No. Serie" value="'+json.data[i].No_Serie_Ext+'" <?php if($Tipo==2 || $Tipo==3 ){echo "readonly";}?>>';
									clonarfila+='			</div>';
									clonarfila+='		</div>';
									clonarfila+='	</td>';
									if($("#Tipo").val()==1&&Estatus_Recepcion!="1"){
									clonarfila+='	<td>';
									clonarfila+='		<div class="col-md-12">';
									clonarfila+='			<div class="form-group">';
									clonarfila+='				<button type="button"  class="btn btn-danger eliminalinea_pre" onclick="elimina_acc_pre('+numfila+')">Eliminar</button>';
									clonarfila+='			</div>';
									clonarfila+='		</div>';
									clonarfila+='	</td>';
									}
									clonarfila+='</tr>';
									numfila=numfila+1;
									
									
									$("#tbl_accesorios_act_pre tbody").append(clonarfila);
									$('.input-number').on('input', function () { 
										this.value = this.value.replace(/[^0-9]/g,'');
									});
								}
							}
						},
						complete: function (xhr) {
							jsRemoveWindowLoad();
						},
						error: function () {
							mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
						}
				});
				
			}
			
			
		}
	
		$("#Agregar_Accesorios_Preregistro").click(function(){
		var clonarfila= "";
		clonarfila='<tr id="tr_acc_act_pre_'+numfila+'">';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		clonarfila+='				<span><font color="red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></span>';
		clonarfila+='				<input type="hidden" class="form-control revision_check_list_act_pre" id="hdd_id_accesorio_pre_'+numfila+'" placeholder="Nombre" >';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" id="Acc_Nombre_Pre_'+numfila+'" placeholder="Nombre" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		clonarfila+='				<span><font color="red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></span>';
		clonarfila+='				<input type="text" class="form-control input-number revision_check_list_act_pre" id="Acc_Cantidad_Pre_'+numfila+'" placeholder="Cantidad" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		clonarfila+='				<span><font color="red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></span>';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" id="Acc_Marca_Pre_'+numfila+'" placeholder="Marca" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		clonarfila+='				<span><font color="red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></span>';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" id="Acc_Modelo_Pre_'+numfila+'" placeholder="Modelo" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		clonarfila+='				<span><font color="red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></span>';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" id="Acc_SeriePre_'+numfila+'" placeholder="No. Serie" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		clonarfila+='				<span><font color="red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></span>';
		clonarfila+='				<button type="button" class="btn btn-danger eliminalinea_pre" onclick="elimina_acc_pre('+numfila+')">Eliminar</button>';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='</tr>';
		numfila=numfila+1;
		
		
		
		//var eliminar = document.getElementsByClassName("revision_check_list_act_pre");

		//if(eliminar.length==0){
			//$("#tbl_accesorios_act_ext tbody").append(copia);
		//}else{
			$("#tbl_accesorios_act_pre tbody").append(clonarfila);
			$('.input-number').on('input', function () { 
					this.value = this.value.replace(/[^0-9]/g,'');
			});
		//}
		
		//var mat_utilizar = document.getElementsByClassName("fec_mat_label");
		
		//Limpiamos el campo fecha de inicia
		//mat_utilizar[(mat_utilizar.length-1)].value="";
		
		var revision_check_list_act_pre = document.getElementsByClassName("revision_check_list_act_pre");
		//Limpiamos los campos
		revision_check_list_act_pre[(revision_check_list_act_pre.length-1)].value="";
		
	});
	
	
	function elimina_acc_pre(num_fila){
		var id_eliminado=$("#hdd_id_accesorio_pre_"+num_fila).val();
		$("#tr_acc_act_pre_"+num_fila).closest('tr').remove();
		if(id_eliminado!=""){
			array_eliminados_act_ext[cont_eliminados_act_ext]=id_eliminado;
			cont_eliminados_act_ext=cont_eliminados_act_ext+1;
		}
	}

	Guardar_Preregistro=function(){
	
		
		var Agregar = true;
		var mensaje_error = "";
		var strDatos="";
		var Id_Solicitud=$.trim($("#Id_Solicitud").val());
		
		//Datos de la cirugia
		var Pre_Re_Procedimiento=$.trim($("#Pre_Re_Procedimiento").val());
		var Pre_Re_Fecha_Hora_Cirugia=$.trim($("#Pre_Re_Fecha_Hora_Cirugia").val());
		var Pre_Re_Quirofano=$.trim($("#Pre_Re_Quirofano").val());
		var Pre_Re_Paciente=$.trim($("#Pre_Re_Paciente").val());
		var Pre_Re_Cirujano=$.trim($("#Pre_Re_Cirujano").val());
		//Fin Datos de la cirugia
		
		
		//Usuario Sesion
		var Id_Usuario=$("#Id_Usuario").val();
		//Area de sesion
		var Nombre_Act_Ext=$.trim($("#Pre_Re_Nombre").val());
		var Marca_Act_Ext=$.trim($("#Pre_Re_Marca").val());
		var Modelo_Act_Ext=$.trim($("#Pre_Re_Modelo").val());
		var No_Serie_Act_Ext=$.trim($("#Pre_Re_No_Serie").val());
		var Cantidad_Equ_Ext=$.trim($("#Pre_Re_Cantidad_Equipos").val());
		//var Id_Ubic_Prim=$("#cmbubicacionprim").val();
		//var Id_Ubic_Sec=$("#cmbubicacionsec").val();
		var Empresa_Ext=$.trim($('#Pre_Re_Empresa').val());
		var Nombre_Completo_Ext=$.trim($('#Pre_Re_Nombre_Proveedor').val());
		var Telefono_Ext=$.trim($('#Pre_Re_Telefono').val());
		var Correo_Ext=$.trim($('#Pre_Re_Correo').val());
		var Observ_Pre_Reg_Ext=$.trim($('#Pre_Re_Observaciones').val());
		var Comentarios_Recepcion=$.trim($('#Comentarios_Recepcion').val());
		
		if($.trim($("#Id_Cirugia").val())==""){
				if (Pre_Re_Procedimiento.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el nombre del procedimiento<br/>";
				}
				
				if (Pre_Re_Fecha_Hora_Cirugia.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega la fecha y hora de la cirug�a<br/>";
				}
				
				if (Pre_Re_Quirofano.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el quirofano / sala<br/>";
				}
				
				if (Pre_Re_Paciente.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el nombre del paciente<br/>";
				}
				
				if (Pre_Re_Cirujano.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el cirujano / m�dico tratante<br/>";
				}
		}
		
		
		if (Nombre_Act_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el nombre del activo<br/>";
		}
		
		if (Marca_Act_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega la marca<br/>";
		}
		
		if (Modelo_Act_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el modelo<br/>";
		}
		
		if (No_Serie_Act_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el n�mero de serie<br/>";
		}
		
		if (Cantidad_Equ_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega la cantidad de equipos<br/>";
		}
		
		//if (Id_Ubic_Prim ==-1) {
		//	Agregar = false; 
		//	mensaje_error += " -Selecciona la ubicaci�n Primaria<br/>";
		//}
		//
		//if (Id_Ubic_Sec ==-1) {
		//	Agregar = false; 
		//	mensaje_error += " -Selecciona la ubicaci�n Secundaria<br/>";
		//}
		
		if (Empresa_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega la Empresa<br/>";
		}
		
		if (Nombre_Completo_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el nombre del proveedor<br/>";
		}
		
		if (Correo_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el correo electr&oacute;nico<br/>";
		}
		
		if (Observ_Pre_Reg_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega las Observaciones<br/>";
		}
		
		if (Comentarios_Recepcion.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega los comentarios de la recepci&oacute;n<br/>";
		}
		
		
		var contador_existe_textbox=0; var valida_texto=0;
		for(var k=0; k<=numfila; k++){
			if ( $("#Acc_Nombre_Pre_"+k).length > 0) {
				var array_existe_textbox=[];
				array_existe_textbox[0]=$.trim($("#Acc_Nombre_Pre_"+k).val());
				array_existe_textbox[1]=$.trim($("#Acc_Marca_Pre_"+k).val());
				array_existe_textbox[2]=$.trim($("#Acc_Modelo_Pre_"+k).val());
				array_existe_textbox[3]=$.trim($("#Acc_SeriePre_"+k).val());
				array_existe_textbox[4]=$.trim($("#hdd_id_accesorio_pre_"+k).val());
				array_existe_textbox[5]=$.trim($("#Acc_Cantidad_Pre_"+k).val());
				array_accesorios_act_ext[contador_existe_textbox]=array_existe_textbox;
				if($.trim($("#Acc_Nombre_Pre_"+k).val())==""){
					valida_texto=1;
					Agregar=false;
				}
				if($.trim($("#Acc_Cantidad_Pre_"+k).val())==""){
					valida_texto=1;
					Agregar=false;
				}
				
				if($.trim($("#Acc_Marca_Pre_"+k).val())==""){
					valida_texto=1;
					Agregar=false;
				}
				if($.trim($("#Acc_Modelo_Pre_"+k).val())==""){
					valida_texto=1;
					Agregar=false;
				}
				if($.trim($("#Acc_SeriePre_"+k).val())==""){
					valida_texto=1;
					Agregar=false;
				}
				contador_existe_textbox=contador_existe_textbox+1;
			}
		}
		if(valida_texto==1){
			mensaje_error+="-Agrega informaci&oacute;n en los campos obligatorios de los Accesorios\n";
			error=true;
		}
		
		/////////
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
	
		
		
		
		if(Agregar){
			$.confirm({
				title: 'Confirm!',
				content: 'Esta seguro de guardar la recepci&oacute;n del equipo.',
				buttons: {
					aceptar: function () {
						$("#Modal_enviar_preregistro").modal("hide");
						//$("#closeModal").click();
						var Id_Solicitud=$("#Id_Solicitud").val();
						var Estatus_Proceso=$("#hddEstatus_Proceso").val();
						if(Id_Solicitud!=""){
							
							$.ajax({
								type: "POST",
								url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
								async: false,
								data: {
									accion:"Guardar_Recepcion_Equipo",
									Id_Solicitud: Id_Solicitud,
									Id_Cirugia: $("#Id_Cirugia").val(),
									Id_Usuario: $("#Id_Usuario").val(),
									Nombre_Act_Ext:Nombre_Act_Ext,
									Marca_Act_Ext:Marca_Act_Ext,
									Modelo_Act_Ext:Modelo_Act_Ext,
									No_Serie_Act_Ext:No_Serie_Act_Ext,
									Cantidad_Equ_Ext:Cantidad_Equ_Ext,
									Pre_Re_Procedimiento:Pre_Re_Procedimiento,
									Pre_Re_Fecha_Hora_Cirugia:Pre_Re_Fecha_Hora_Cirugia,
									Pre_Re_Quirofano:Pre_Re_Quirofano,
									Pre_Re_Paciente:Pre_Re_Paciente,
									Pre_Re_Cirujano:Pre_Re_Cirujano,
									Empresa_Ext:Empresa_Ext,
									Nombre_Completo_Ext:Nombre_Completo_Ext,
									Telefono_Ext:Telefono_Ext,
									Correo_Ext: Correo_Ext,
									Observ_Pre_Reg_Ext:Observ_Pre_Reg_Ext,
									Comentarios_Recepcion: Comentarios_Recepcion,
									array_accesorios_act_ext: array_accesorios_act_ext,
									array_eliminados_act_ext:array_eliminados_act_ext
									
								},
								dataType: "html",
								beforeSend: function (xhr) {
									
								},
								success: function (data) {
									data = eval("(" + data + ")");
									if(data.totalCount>0){
										ver_preregistro();
										$("#Pre_Re_Procedimiento").prop("disabled", true);
										$("#Pre_Re_Fecha_Hora_Cirugia").prop("disabled", true);
										$("#Pre_Re_Quirofano").prop("disabled", true);
										$("#Pre_Re_Paciente").prop("disabled", true);
										$("#Pre_Re_Cirujano").prop("disabled", true);
										mensajesalerta("&Eacutexito!", "Se ha creado la solicitud correctamente.", "success", "dark");
									}else{
										mensajesalerta("Oh No!", "Ocurrio un error al crear la solicitud.", "error", "dark");
									}
								},
								error: function () {
									mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
								}
							});
						
						}
					},
					cancel: function () {
					}
				}
			});
		}
	}
	
	function cmb_motivo_rechazo() {
		$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
					async: false,
					data: {
						accion: "cmb_motivo_rechazo"
					},
					dataType: "html",
					beforeSend: function (xhr) {
						jsShowWindowLoad("Cargando Informaci&oacuten.");
					},
					success: function (data) {
						data = eval("(" + data + ")");
						
						if (data.totalCount > 0) {
							for(var i = 0; i < data.totalCount; i++)
							{

								$('#Id_Motivo_Rechazo').append($('<option>', { value: data.data[i].Id_Motivo_Rechazo }).text(data.data[i].Desc_Motivo_Rechazo));
							}
							
								
						}
					},
					complete: function (xhr) {
						jsRemoveWindowLoad();
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
					}
			});
		
		
		
		
	}
	Guardar_Rechazo=function(){
		$("#div_mot_rech").show();
		
		var Agregar = true;
		var mensaje_error = "";
		var strDatos="";
		var Id_Solicitud=$.trim($("#Id_Solicitud").val());
		//Usuario Sesion
		var Id_Usuario=$("#Id_Usuario").val();
		//Area de sesion
		var Nombre_Act_Ext=$.trim($("#Pre_Re_Nombre").val());
		var Marca_Act_Ext=$.trim($("#Pre_Re_Marca").val());
		var Modelo_Act_Ext=$.trim($("#Pre_Re_Modelo").val());
		var No_Serie_Act_Ext=$.trim($("#Pre_Re_No_Serie").val());
		var Cantidad_Equ_Ext=$.trim($("#Pre_Re_Cantidad_Equipos").val());
		//var Id_Ubic_Prim=$("#cmbubicacionprim").val();
		//var Id_Ubic_Sec=$("#cmbubicacionsec").val();
		var Empresa_Ext=$.trim($('#Pre_Re_Empresa').val());
		var Nombre_Completo_Ext=$.trim($('#Pre_Re_Nombre_Proveedor').val());
		var Telefono_Ext=$.trim($('#Pre_Re_Telefono').val());
		var Correo_Ext=$.trim($('#Pre_Re_Correo').val());
		var Observ_Pre_Reg_Ext=$.trim($('#Pre_Re_Observaciones').val());
		var Comentarios_Recepcion=$.trim($('#Comentarios_Recepcion').val());
		var Id_Motivo_Rechazo=$.trim($('#Id_Motivo_Rechazo').val());
		if (Nombre_Act_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el nombre del activo<br/>";
		}
		
		if (Marca_Act_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega la marca<br/>";
		}
		
		if (Modelo_Act_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el modelo<br/>";
		}
		
		if (No_Serie_Act_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el n�mero de serie<br/>";
		}
		
		if (Cantidad_Equ_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega la cantidad de equipos<br/>";
		}
		
		//if (Id_Ubic_Prim ==-1) {
		//	Agregar = false; 
		//	mensaje_error += " -Selecciona la ubicaci�n Primaria<br/>";
		//}
		//
		//if (Id_Ubic_Sec ==-1) {
		//	Agregar = false; 
		//	mensaje_error += " -Selecciona la ubicaci�n Secundaria<br/>";
		//}
		
		if (Empresa_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega la Empresa<br/>";
		}
		
		if (Nombre_Completo_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el nombre del proveedor<br/>";
		}
		
		if (Correo_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el correo electr&oacute;nico<br/>";
		}
		
		if (Observ_Pre_Reg_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega las Observaciones<br/>";
		}
		
		if (Comentarios_Recepcion.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega los comentarios de la recepci&oacute;n<br/>";
		}
		
		if (Id_Motivo_Rechazo=="-1") {
			Agregar = false; 
			mensaje_error += " -Selecciona el Motivo del Rechazo<br/>";
		}
		
		
		var contador_existe_textbox=0; var valida_texto=0;
		for(var k=0; k<=numfila; k++){
			if ( $("#Acc_Nombre_Pre_"+k).length > 0) {
				var array_existe_textbox=[];
				array_existe_textbox[0]=$.trim($("#Acc_Nombre_Pre_"+k).val());
				array_existe_textbox[1]=$.trim($("#Acc_Marca_Pre_"+k).val());
				array_existe_textbox[2]=$.trim($("#Acc_Modelo_Pre_"+k).val());
				array_existe_textbox[3]=$.trim($("#Acc_SeriePre_"+k).val());
				array_existe_textbox[4]=$.trim($("#hdd_id_accesorio_pre_"+k).val());
				array_existe_textbox[5]=$.trim($("#Acc_Cantidad_Pre_"+k).val());
				array_accesorios_act_ext[contador_existe_textbox]=array_existe_textbox;
				if($.trim($("#Acc_Nombre_Pre_"+k).val())==""){
					valida_texto=1;
					Agregar=false;
				}
				if($.trim($("#Acc_Cantidad_Pre_"+k).val())==""){
					valida_texto=1;
					Agregar=false;
				}
				contador_existe_textbox=contador_existe_textbox+1;
			}
		}
		if(valida_texto==1){
			mensaje_error+="-Agrega informaci&oacute;n en los campos obligatorios de los Accesorios\n";
			error=true;
		}
		
		/////////
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		
		if(Agregar){
			$.confirm({
				title: 'Confirm!',
				content: 'Esta seguro de rechazar la recepci&oacute;n del equipo.',
				buttons: {
					aceptar: function () {
						$("#Modal_enviar_preregistro").modal("hide");
						//$("#closeModal").click();
						var Id_Solicitud=$("#Id_Solicitud").val();
						var Estatus_Proceso=$("#hddEstatus_Proceso").val();
						if(Id_Solicitud!=""){
							
							$.ajax({
								type: "POST",
								url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
								async: false,
								data: {
									accion:"Guardar_Recepcion_Equipo",
									Id_Solicitud: Id_Solicitud,
									Id_Cirugia: $("#Id_Cirugia").val(),
									Id_Usuario: $("#Id_Usuario").val(),
									Nombre_Act_Ext:Nombre_Act_Ext,
									Marca_Act_Ext:Marca_Act_Ext,
									Modelo_Act_Ext:Modelo_Act_Ext,
									No_Serie_Act_Ext:No_Serie_Act_Ext,
									Cantidad_Equ_Ext:Cantidad_Equ_Ext,
									Empresa_Ext:Empresa_Ext,
									Nombre_Completo_Ext:Nombre_Completo_Ext,
									Telefono_Ext:Telefono_Ext,
									Correo_Ext: Correo_Ext,
									Observ_Pre_Reg_Ext:Observ_Pre_Reg_Ext,
									Comentarios_Recepcion: Comentarios_Recepcion,
									Id_Motivo_Rechazo:Id_Motivo_Rechazo,
									array_accesorios_act_ext: array_accesorios_act_ext,
									array_eliminados_act_ext:array_eliminados_act_ext
									
								},
								dataType: "html",
								beforeSend: function (xhr) {
									
								},
								success: function (data) {
									data = eval("(" + data + ")");
									if(data.totalCount>0){
										ver_preregistro();
										mensajesalerta("&Eacutexito!", "Se ha creado la solicitud correctamente.", "success", "dark");
									}else{
										mensajesalerta("Oh No!", "Ocurrio un error al crear la solicitud.", "error", "dark");
									}
								},
								error: function () {
									mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
								}
							});
						
						}
					},
					cancel: function () {
					}
				}
			});
		}
	}
	
	
	function consulta_gtiqx(Id_Cirugia) {
		if(Id_Cirugia!=""){
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
				async: false,
				data: {
					Id_Cirugia: Id_Cirugia,
					accion: "consulta_gtiqx"
				},
				dataType: "html",
				beforeSend: function (xhr) {
					jsShowWindowLoad("Cargando Informaci&oacuten.");
				},
				success: function (data) {
					data = eval("(" + data + ")");
					
					if (data.totalCount > 0) {
						for(var i = 0; i < data.totalCount; i++){
							$("#Pre_Re_Procedimiento").val(data.data[0].procedimiento);
							$("#Pre_Re_Fecha_Hora_Cirugia").val(data.data[0].fechacirugia+" "+data.data[0].horainicio);
							$("#Pre_Re_Quirofano").val(data.data[0].quirofano);
							$("#Pre_Re_Paciente").val(data.data[0].paciente);
							$("#Pre_Re_Cirujano").val(data.data[0].nombrecirujano);
						}
					}
				},
				complete: function (xhr) {
					jsRemoveWindowLoad();
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
		  });
		}else{
			//Realiza la consulta para traer los datos del preregistro capturados manualmente
		  $("#Pre_Re_Fecha_Hora_Cirugia").prop("disabled", false);
			$("#Pre_Re_Procedimiento").prop("disabled", false);
			$("#Pre_Re_Fecha_Hora_Cirugia").prop("disabled", false);
			$("#Pre_Re_Quirofano").prop("disabled", false);
			$("#Pre_Re_Paciente").prop("disabled", false);
			$("#Pre_Re_Cirujano").prop("disabled", false);
		}
		
	}
	
	function modal_biomedica(){
		$("#Modal_login_biomedica").modal("show");
	}
	
	function cerrar_ventana(){
		$("#Modal_login_biomedica").modal("hide");
	}
</script>

<script type="text/javascript">
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
                $("#cargando").show();
                $("#btnIngresar").hide();
                login();
            } else {
                $("#divErrorMnj").html("Por favor ingrese el usuario y/o contrase&ntilde;a.");
                $("#divmensajeerror").show("fade");
                $('#txtUsuario').focus();   
            }
        };
        $('#btnIngresar').on('click', function () {
            valida();
        });
    });
    login = function () {
		var Area_Id=$("#Area_Id").val();
		var Usuario_Id=$("#Usuario_Id").val();
    var EstProc=$("#EstProc").val();
		var Sistema=$("#Sis").val();
		var Solicitud=$("#Solicitud_url").val();
		var Seccion=$("#Seccion_url").val();
		
    $.post("../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php", {
		Usuario: $.trim($('#txtUsuario').val()),
		Password: $.trim($('#txtPassword').val()),
		EstProc: EstProc, 
		Sistema: Sistema,
		Solicitud: Solicitud,
		Seccion: Seccion,
		Usuario_Id:Usuario_Id,
		Area_Id:Area_Id,
    accion: "login"
		},
        function (result) {
             $("#cargando").hide();
             $("#btnIngresar").show();
            if (result !== "") {
                var jsonResult = eval("(" + result + ")");
                if (jsonResult.estatus === "ok") {
									var url="";
										
									var Request_Uri="<?php echo $_SERVER["REQUEST_URI"];?>";
									
									Request_Uri = Request_Uri.split('/');
									if(Request_Uri[1].toUpperCase() =="sigapruebas"||Request_Uri[1].toUpperCase() =="SIGAPRUEBAS"){
										//url="http://siga.hospitalsatelite.com:8080/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key=<?php echo $Id_Solicitud; ?>&gest=<?php echo $Id_Usuario; ?>&tipo=1";
										url="https://apps2.hospitalsatelite.com/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key=<?php echo $Id_Solicitud; ?>&gest=<?php echo $Id_Usuario; ?>&tipo=1";
									}
									if(Request_Uri[1].toUpperCase() =="siga"||Request_Uri[1].toUpperCase() =="SIGA"){
										//url="http://siga.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key=<?php echo $Id_Solicitud; ?>&gest=<?php echo $Id_Usuario; ?>&tipo=1";
										url="https://apps2.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key=<?php echo $Id_Solicitud; ?>&gest=<?php echo $Id_Usuario; ?>&tipo=1";
									}
									
									$(location).attr('href', url);
								} else {
                    if($("#txtUsuario").val()!=""){    
                        $("#divErrorMnj").html("El usuario y/o contrase&ntilde;a es incorrecta");
                        $("#divmensajeerror").show("fade");
                        $('#txtUsuario').focus();
                    }
                    else
                    {
                        $("#divErrorMnj").html("Usuario o contrase&ntilde;a incorrecta");
                        $("#divmensajeerror").show("fade");
                        $('#txtUsuario').focus();
                    }
                }
            }
        });
    };
</script>

</body>
</html>