<?php
	session_start();
	@$Id_Gestor=$_POST["Id_Gestor"];
	@$Tipo_Gestor=$_POST["Tipo_Gestor"];
	@$Id_Seccion=$_POST["Id_Seccion"];
	
	$Espacios="";
  ?>
  <style>
	.datepicker{z-index:1151 !important;}
	.modal { overflow-y: auto }
  </style>
	
	

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- File Input -->
  <link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
  <link rel="stylesheet" href="../dist/css/jquery-confirm.min.css">
  <script src="../dist/js/jquery-confirm.min.js"></script>  
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/prettify.js"></script>
  <!-- <script src="../js/datepicker.css"></script> -->
	<link rel="stylesheet" href="../js/datepicker.css">
  
	<!--Firma Digital-->
	<link rel="stylesheet" href="../Firma_Digital/docs/css/signature-pad.css">

  <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="../Firma_Digital/docs/css/ie9.css">
  <![endif]-->
	<!--Firma Digital-->
			
	<div class="row">
    <div class="col-md-12" align="center">
			<h2>Nota de Salida</h2>
      <hr class="separation-line">
    </div>
  </div>

  <div class="row">
		<ul class="nav nav-tabs azulf" role="tablist">
      <li role="presentation" style="display:none"><span class="label label-success"  style="display:none"></span><a onclick="" href="#Finalizados" aria-controls="Finalizados" role="tab" data-toggle="tab" >Finalizados</a></li>
      <li role="presentation" id="li_Activos_GTIQX" class="active"><a onclick="Activos_tickets_gtiqx(1)" href="#Activos_GTIQX" aria-controls="Activos_GTIQX" role="tab" data-toggle="tab"  >Activos GTIQX</a></li>
	    <li role="presentation" id="li_Activos_Inventario"><a id="a_Activos_Inventario" onclick="Activos_inventario(2)" href="#Activos_Inventario" aria-controls="Activos_Inventario" role="tab" data-toggle="tab" >Activos Inventario</a></li>
			<li role="presentation" id="li_Activos_EXTERNOS"><a onclick="Activos_tickets_externos(3)" href="#Activos_EXTERNOS" aria-controls="Activos_EXTERNOS" role="tab" data-toggle="tab"  >Activos Externos</a></li>
	    <li role="presentation" id="li_En_Proceso"><a onclick="notas_en_proceso()" href="#En_Proceso" aria-controls="En_Proceso" role="tab" data-toggle="tab" >En Proceso</a></li>
      <li role="presentation" id="li_Historial_Notas_Salida"><a onclick="historial_notas_salida()"  href="#Historial_Notas_Salida" aria-controls="Historial_Notas_Salida" role="tab" data-toggle="tab" >Historial Notas de Salida</a></li>
		</ul>
  </div>
	<div class="row">
		<div class="tab-content">
		
			
			
			<div role="tabpanel" class="tab-pane" id="Finalizados">
				<!-- table-results -->
				<div class="col-md-12">
					<div class="box">
						<!-- /.box-header -->
						<div class="box-body">
							<label>Tabla Finalizados</label>
						</div>
					</div>
				</div>
			</div>
			
			<div role="tabpanel" class="tab-pane active" id="Activos_GTIQX">
				<!-- table-results -->
				<div class="col-md-12">
					<div class="box">
						<!-- /.box-header -->
						<div class="box-body">
							<div class="col-md-4" ></div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label" style="font-size: 12px;">Empresa</label>	
									<select class="form-control" id="cmb_empresas">
										
									</select>
									
									
								</div>
							</div>
							<div class="col-md-4" ></div>
							<div class="col-md-12" align="center" style="display:none" id="div_notas_gtiqx">
								<br><br>
								<button type="button" class="btn chs" onclick="Generar_Nota_Activos_GTIQX(1, 0)" >Generar Nota de Salida</button>
								<div id="tabla_tickets_gtiqx" class="box-body"></div>
								<div id="gifcargando_tabla_gtiqx" style="display:none" align="center">
									<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div role="tabpanel" class="tab-pane" id="Activos_Inventario">
				<!-- table-results -->
				<div class="col-md-12">
					<div class="box">
						<!-- /.box-header -->
						<div class="box-body">
							<div class="col-md-12" align="center">
								<button type="button" class="btn chs" onclick="Generar_Nota_Activos(2)">Generar Nota de Salida</button>
								<div id="tabla_activos" class="box-body"></div>
								<div id="gifcargando_tabla_inventario" style="display:none" align="center">
									<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div role="tabpanel" class="tab-pane" id="Activos_EXTERNOS">
				<!-- table-results -->
				<div class="col-md-12">
					<div class="box">
						<!-- /.box-header -->
						<div class="box-body">
							<div class="col-md-12" align="center">
								<button type="button" class="btn chs" onclick="Generar_Nota_Activos_Externos(3, 0)">Generar Nota de Salida</button>
								<div id="tabla_activos_externos" class="box-body"></div>
								<div id="gifcargando_tabla_externos" style="display:none" align="center">
									<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div role="tabpanel" class="tab-pane" id="En_Proceso">
				<!-- table-results -->
				<div class="col-md-12">
					<div class="box">
						<!-- /.box-header -->
						<div class="box-body">
							<div class="col-md-12" align="center">
								<div id="tabla_en_proceso" class="box-body"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div role="tabpanel" class="tab-pane" id="Historial_Notas_Salida">
				<!-- table-results -->
				<div class="col-md-12">
					<div class="box">
						<!-- /.box-header -->
						<div class="box-body">
							<div class="col-md-12" align="center">
								<label>Realizadas</label>
								<input type="radio" id="Historial_realizadas" onchange="Cambio_historial(1)" value="1" name="Historial_notas" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label>Cenceladas</label>
								<input type="radio" id="Historial_canceladas" onchange="Cambio_historial(2)" value="2" name="Historial_notas">
								<div id="tabla_historial_notas_salida">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		
			
		</div>
	</div>
	
	
	<div class="modal fade modalchs" id="Modal_Nota_Salida" data-backdrop="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" data-dismiss="modal" id="cerrar_popup" >
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Nota de Salida</h4>
          </div>
          <div class="modal-body nopsides" id="">
						<div class="row">
							<ul class="nav nav-tabs azulf" role="tablist">
								<li role="presentation"  class="active" id="li_tab_dat_generales"><span class="label label-warning"  style="display:none"></span><a onclick="" href="#Datos_Generales" aria-controls="Datos_Generales" role="tab" data-toggle="tab" >Datos Generales</a></li>
								<li role="presentation" class="" id="li_tab_adjuntos" style="display:none"><span class="label label-success"  style="display:none"></span><a href="#Adjuntos" aria-controls="Adjuntos" role="tab" data-toggle="tab" >Adjuntos</a></li>
								<li role="presentation" class="" id="li_tab_firma" style="display:none"><span class="label label-success"  style="display:none"></span><a href="#Firma" aria-controls="Firma" role="tab" data-toggle="tab" >Firma</a></li>
								<li role="presentation" class="" id="li_tab_finalizar" style="display:none"><span class="label label-success"  style="display:none"></span><a href="#Finalizar" onclick="finalizar_nota()" aria-controls="Finalizar" role="tab" data-toggle="tab" >Finalizar</a></li>
							</ul>
						</div>
						<div class="row">
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="Datos_Generales">
									
									<!-- table-results -->
									<div class="col-md-12">
										<div class="box">
											<!-- /.box-header -->
											<div class="box-body">
												<div class="col-md-4">
													<div class="form-group">
														<input  type="hidden" id="hdd_duplicado">
														<input  type="hidden" id="hdd_tipo_solicitud">
														<input  type="hidden" id="hdd_id_nota_salida">
														<span><font color="red">*</font></span>
														<label class="control-label">Ubicación Primaria</label>	
														<select id="cmbubicacionprim" class="form-control"></select>
													</div>
												</div>
												<div class="col-md-4">
														<div class="form-group">
															<span><font color="red">*</font></span>
															<label class="control-label">Ubicación Secundaria</label>
															<select class="form-control" id="cmbubicacionsec">
																<option value="-1">--Ubicación Secundaria--</option>
															</select>
														</div>
													</div>
												<div class="col-md-4">
													<div class="form-group">
														<span><font color="red">*</font></span>
														<label class="control-label">Motivo de Salida</label>	
														<select id="cmbmotivosalida" class="form-control"></select>
													</div>
												</div>
												<div class="col-md-4">
													<span><font color="red">*</font></span>	
													<label class="control-label">Quien Autoriza</label>
													<select id="cmb_autoriza" class="demo-default" placeholder="Usuarios" style="display:none"></select>
													<div id="gifcargandoaltausuarios1" style="display:none" align="center">
														 <img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<span><font color="red">*</font></span>
														<label class="control-label">Empresa de Quien Recibe</label>	
														<input  type="text" class="form-control" id="Empresa_que_recibe" placeholder="Empresa de Quien Recibe">
													</div>
												</div>
												<div class="col-md-4">
												<div class="form-group">
													<span><font color="red">*</font></span>
													<label class="control-label">Nombre Completo de Contacto</label>	
													<input type="text" class="form-control" id="Nombre_completo_contacto" placeholder="Nombre Completo de Contacto">
												</div>
											</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label">Teléfono</label>	
														<input  type="text" class="form-control" id="Telefono" placeholder="Teléfono">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<span><font color="red">*</font></span>
														<label class="control-label">Correo</label>	
														<input  type="text" class="form-control" id="Correo" placeholder="Correo" maxlength="100">
													</div>
												</div>
												
												
												<div class="col-md-12" id="tabla_activos_nota">
													
												</div>
												
												<div class="table-responsive col-md-12">
													<table class="table table table-bordered table-striped table-chs" id="tbl_accesorios_act_ext">
														<thead>		
															<tr>			
																<th width="2%"><span><font color="red">*</font></span>Cant.</th>			
																<th width="13%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unidad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>			
																<th width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="red">*</font></span>Marca&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>			
																<th width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="red">*</font></span>Modelo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>			
																<th width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="red">*</font></span>Descripción&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>			
																<th width="10%">No.&nbsp;Solicitud</th>			
																<th width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><font color="red">*</font></span>No.&nbsp;Serie&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>		
																<th width="5%">Eliminar</th>		
															</tr>		
														</thead>
														<tbody id="body_accesorios_act_ext" border="0">
															
														</tbody>
													</table>
												</div>	
												<div class="col-md-12">
													<div class="form-group" align="center">
														<input type="button" class="btn chs" value="Agregar" id="Agregar_Accesorios" style="display: inline-block;">
													</div>
												</div>
												
												<div class="col-md-12">
													<div class="form-group">
														<span><font color="red">*</font></span>
														<label class="control-label">Observaciones</label>	
														<textarea  class="form-control" id="Observaciones" placeholder="Observaciones"></textarea>
													</div>
												</div>
												
												<div class="col-md-12 text-center" style="align:center">
													<button type="button" class="btn btn-primary" onclick="siguiente()">Guardar <i class="fa fa-arrow-right"></i></button>
												</div>	
											</div>
										</div>
									</div>
								</div>
								
								<div role="tabpanel" class="tab-pane" id="Adjuntos">
									<!-- table-results -->
									<div class="col-md-12">
										<div class="box">			
												<div class="col-md-6">
													<div class="form-group" id="Carrusel_Fotos" style="display:none">
													</div>
													<div class="form-group" id="divFoto">
													</div>
												</div><!-- columna#3 -->
												<div class="col-md-4">
													<div id="divFoto_lista"></div>
													<button type="button" class="btn btn-primary" onclick="guardar_adjuntos()" id="guardar_adjuntos">Guardar</button>
												</div>
										</div>
									</div>
								</div>
								
								<div role="tabpanel" class="tab-pane" id="Firma">
									<!-- table-results -->
									<div >
										<div class="box">
											<!-- /.box-header -->
											<div class="box-body">
												
												<div id="div_firma" class="div_firma col-md-12" align="center">
													<div id="signature-pad" class="signature-pad">
														<div class="signature-pad--body">
															<canvas class="div_canvas" width="414" height="192" id="div_canvas"></canvas>
														</div>
														<div class="signature-pad--footer">
															<div class="description"><span style="color:black; size:13px"><strong>FIRMA DIGITAL</strong></span><br><span style="color:black" id="descripcion_firma"></span></div>

															<div class="signature-pad--actions">
																<div>
																	<button type="button" class="button clear btn chs" data-action="clear" id="limpiar_firma">Limpiar</button>
																	<button type="button" class="button" data-action="change-color" style="display:none">Change color</button>
																	<button type="button" class="button" data-action="undo" style="display:none">Undo</button>
																</div>
																<div>
																	<button type="button" class="button save btn btn-primary" data-action="save-png" id="btn_guardar_firma">Guardar</button>
																	<button type="button" class="button save" data-action="save-jpg" style="display:none">Save as JPG</button>
																	<button type="button" class="button save" data-action="save-svg" style="display:none">Save as SVG</button>
																</div>
															</div>
														</div>
													</div>
												</div>
												<input  type="hidden" id="hdd_estatus_proceso">
												<input  type="hidden" id="hdd_tipo_firma">
												
											
												<div  class="col-md-12" align="center">
													<button type="button" id="btn_realiza" class="btn btn-danger" onclick="firma_digital(1)" style="display:none">Quien Realiza</button>
													<button type="button" id="btn_autoriza" class="btn btn-danger" onclick="firma_digital(2)" style="display:none">Quien Autoriza</button>
													<button type="button" id="btn_recibe" class="btn btn-danger" onclick="firma_digital(3)" style="display:none">Quien Recibe</button>
													<div id="vista_preliminar"></div>
													<br>
												</div>
											</div>
										</div>
									</div>
								</div>
							
								<div role="tabpanel" class="tab-pane" id="Finalizar">
									<!-- table-results -->
									<div class="col-md-12">
										<div class="box">			
											<div class="col-md-12" id="div_msj_finalizar" align="center">
												
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
		
	<div class="modal fade modalchs" data-backdrop="false" id="Modal_Cancelacion">
		<div class="modal-dialog modal-lg">
			<input type="hidden" id="hdd_Id_Solicitud">
			<input type="hidden" id="hdd_Id_Nota_Salida_Cancel">
			<div class="modal-content">
			  <div class="modal-header azuldef">
				<button type="button" class="close"  data-dismiss="modal" aria-label="Close" onclick="limpiar_cerrar_cancelacion_nota()" id="btn_cerrar_cancelacion">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Cancelación de Nota de Salida con Folio: <label id="cancelacion_folio"></label> </h4>
			  </div>

			  <div class="modal-body nopsides">
				<div class="col-md-12">
					<div class="form-group">
					  <span><font color="red">*</font></span>
					  <label class="control-label" style="font-size: 11px;">Motivo de Cncelación</label>
					  <textarea rows="7" class="form-control" id="Motivo_Cancelacion" placeholder="Descripción Motivo Cancelación"></textarea>
					</div>
				</div>
				<div class="tab-content">
					 <div class="modal-footer">
						<button type="button" id="botonCancelar" onclick="Cancelar_Nota()" class="btn btn-danger">Cancelar</button>
					 </div>
				</div>
			</div>
		  </div>
		</div>
	</div>


<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- File Input -->
<script src="../plugins/fileinput/fileinput.js"></script>
<script src="../plugins/fileinput/fileinput_locale_es.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App   Se comento esta linea ya que no deja desplegar el menu-->
<!--<script src="../dist/js/app.min.js"></script>-->
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>	
<script src="../js/Funciones.js"></script>


<!--Firma Digital-->
<script src="../Firma_Digital/docs/js/signature_pad.umd.js"></script>
<script src="../Firma_Digital/docs/js/app.js"></script>
<!--Firma Digital-->
<script>
$(document).ready(function(){
	//Array Activos
	var Contador_Det=0; var numfila=0;
	var array_accesorios_act_ext=[];
	var array_eliminados_act_ext=[]; var cont_eliminados_act_ext=0;
	var array_activos=[]; array_activos_gtiqx=[]; var array_activos_externos=[];
	var datatable_activos=""; var datatable_activos_gtiqx=""; var datatable_activos_externos="";
	Img_Activo();
	cmb_empresas("0");
	ubic_prim();
	motivo_salida();
	usuarios_empleados();
	//historial_notas_salida();
	
	
 Cancelar_Nota=function(){
		if($("#Motivo_Cancelacion").val()!=""){
			//Se Cancela cuando solo es una solicitud
			if($("#hdd_Id_Solicitud").val()!=""){
				$.confirm({
					title: 'Confirm!',
					content: 'Esta Seguro de Cancelar esta Nota de Salida!',
					buttons: {
						confirm: function () {
							var empresa=$("#cmb_empresas").val();
							$.ajax({
								type: "POST",
								url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",     
								async: false,
								data: {
									Id_Solicitud: $("#hdd_Id_Solicitud").val(),
									Motivo_Cancelacion: $("#Motivo_Cancelacion").val(),
									Usr_Inser:$("#usuariosesion").val(),
									accion: "Cancelar_Nota_Salida"
								},
								dataType: "html",
								beforeSend: function (xhr) {
							
								},
								success: function (data) {
									data = eval("(" + data + ")");
									
									if (data.totalCount > 0) {
										limpiar_cerrar_cancelacion_nota();
										$("#btn_cerrar_cancelacion").click();
										
										$("#div_notas_gtiqx").hide();
										$("#tabla_tickets_gtiqx").html("");
										array_activos_gtiqx=[];
										cmb_empresas(empresa);
										if($("#cmb_empresas").val()!="-1"){
											tabla_tickets_gtiqx(empresa);
										}
										
										Activos_tickets_externos(3);
										
										
										mensajesalerta("&Eacute;xito", "Cancelado Correctamente.", "success", "dark");
									}else{
										mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
									}
								},
								error: function () {
									mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
								}
							});
						},
						cancel: function () {
						}
					}
				});
			}else{
				if($("#hdd_Id_Nota_Salida_Cancel").val()!=""){
					$.confirm({
						title: 'Confirm!',
						content: 'Esta Seguro de Cancelar esta Nota de Salida!',
						buttons: {
							confirm: function () {
								$.ajax({
									type: "POST",
									url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",     
									async: false,
									data: {
										Id_Nota_Salida: $("#hdd_Id_Nota_Salida_Cancel").val(),
										Motivo_Cancelacion: $("#Motivo_Cancelacion").val(),
										Usr_Inser:$("#usuariosesion").val(),
										accion: "Cancelar_Nota_Salida_Proceso"
									},
									dataType: "html",
									beforeSend: function (xhr) {
								
									},
									success: function (data) {
										data = eval("(" + data + ")");
										
										if (data.totalCount > 0) {
											limpiar_cerrar_cancelacion_nota();
											$("#btn_cerrar_cancelacion").click();
											
											$("#div_notas_gtiqx").hide();
											$("#tabla_tickets_gtiqx").html("");
											array_activos_gtiqx=[];
											cmb_empresas(0);
											
											
											Activos_tickets_externos(3);
											
											notas_en_proceso();
											mensajesalerta("&Eacute;xito", "Cancelado Correctamente.", "success", "dark");
										}else{
											mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
										}
									},
									error: function () {
										mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
									}
								});
							},
							cancel: function () {
							}
						}
					});
				}
				
				
			}
		}else{
			mensajesalerta("Informaci&oacute;n", "-Falta agregar el motivo de la cancelación", "", "dark");
		}
		
	}
	
	function cmb_empresas(empresa){
		var resultado=new Array();
		data={accion: "cmb_empresas_gtiqx"};
		resultado=cargo_cmb("../fachadas/activos/Siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",false, data);
    $('#cmb_empresas').empty(); 
		if(resultado.totalCount>0){
			$('#cmb_empresas').append($('<option>', { value: "-1" }).text("--Empresas--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{
				if(empresa==$.trim(resultado.data[i].Empresa_Ext)){
					$('#cmb_empresas').append($('<option selected>', { value: resultado.data[i].Empresa_Ext }).text(resultado.data[i].Empresa_Ext));
				}else{
					$('#cmb_empresas').append($('<option>', { value: resultado.data[i].Empresa_Ext }).text(resultado.data[i].Empresa_Ext));
				}
			
			}
		}else{
			$('#cmb_empresas').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$("#cmb_empresas").change(function() {
		if($(this).val()!="-1"){
			$("#div_notas_gtiqx").hide();
			$("#tabla_tickets_gtiqx").html("");
			array_activos_gtiqx=[];
			tabla_tickets_gtiqx($(this).val());
		}else{
			$("#div_notas_gtiqx").hide();
			$("#tabla_tickets_gtiqx").html("");
			array_activos_gtiqx=[];
		}
		
	});
	
	Activos_tickets_gtiqx=function(tipo){
		$("#hdd_tipo_solicitud").val(tipo);
		
		$("#div_notas_gtiqx").hide();
		$("#cmb_empresas").val(-1);
		$("#tabla_tickets_gtiqx").html("");
		array_activos_gtiqx=[];
		cmb_empresas(0);
	}
	function tabla_tickets_gtiqx(Empresa){
			$("#div_notas_gtiqx").show();
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					Id_Area:$("#idareasesion").val(),
					Estatus_Reg: '1',
					Empresa: Empresa,
					Id_Usuario:$("#usuariosesion").val(),
					accion: 'selectbusqueda_activos_nota_salida_gtiqx'
				},
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
					$("#gifcargando_tabla_gtiqx").show();
				},
				success: function (datos) {
					console.log(datos);
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var tabla="";
					if (json.totalCount > 0) {	
						tabla+='  <form name="frm-example" id="frm-example">';
						tabla+='  <div class="table-responsive">';
						tabla+='	<table id="display_busqueda_activos_gtiqx" class="table table-bordered table-striped table-chs">';
						tabla+='		<thead>';
						tabla+='		<tr>';
						tabla+='			<th>Seleccionar<br><div align="center" style="display:none"><input name="select_all" value="1" id="busqueda-select-all" type="checkbox" /></div></th>';
						tabla+='			<th>Duplicar</th>';
						if(json.data[0].Gestor_Senior=="1"){
						tabla+='			<th>Cancelar</th>';
						}
						tabla+='			<th>Id Solicitud</th>';
						tabla+='			<th>Nombre Activo</th>';
						tabla+='			<th>Marca</th>';
						tabla+='			<th>Modelo</th>';
						tabla+='			<th>No. Serie</th>';
						//tabla+='			<th>Area</th>';
						tabla+='			<th>Ubicaci&oacute;n Primaria</th>';
						tabla+='			<th>Ubicaci&oacute;n Secundaria</th>';
						tabla+='			<th>Fecha Solicitud</th>';
						tabla+='			<th>Fecha Cierre</th>';
						
						tabla+='		</tr>';
						tabla+='		</thead>';
						tabla+='		<tbody>';	
						
						if (json.totalCount > 0) {
							for (var i = 0; i < json.totalCount; i++) {
								tabla+='		<tr>';
								//tabla+='			<td ><input type="checkbox" id="checkbox'+i+'" value="'+json.data[i].Id_Activo+'" id="'+json.data[i].Id_Activo+'" onchange="pasarcheckactivos('+i+','+json.data[i].Id_Activo+')"></td>';
								tabla+='			<td ><div align="center"><input type="checkbox"  value="'+json.data[i].Id_Solicitud+'" id="'+json.data[i].Id_Solicitud+'" ></div></td>';
								tabla+='			<td ><input type="button" class="btn btn-success btn-xs" value="Duplicar" onclick="duplicar_nota_salidaGTIQX('+json.data[i].Id_Solicitud+')" id="duplicar_nota_salida_GTIQX"></td>';
								if(json.data[i].Gestor_Senior=="1"){
								tabla+='			<td align="center">';
								tabla+='				<a href="#" data-toggle="modal" data-target="#Modal_Cancelacion" onclick="Pasar_val_cancelacion('+json.data[i].Id_Solicitud+')" title="Cancelar Ticket">';
								tabla+='					<span><i class="fa fa-trash" style="font-size:16px;color:red" aria-hidden="true"></i></span>';
								tabla+='				</a>';
								tabla+='			</td>';
								}
								tabla+='			<td >'+json.data[i].Id_Solicitud+'</td>';
								tabla+='			<td >'+json.data[i].Nombre_Act_Ext+'</td>';
								tabla+='			<td >'+json.data[i].Marca_Act_Ext+'</td>';
								tabla+='			<td >'+json.data[i].Modelo_Act_Ext+'</td>';
								tabla+='			<td >'+json.data[i].No_Serie_Act_Ext+'</td>';
								//tabla+='			<td >'+json.data[i].Nom_Area+'</td>';
								tabla+='			<td >';
													if(json.data[i].Desc_Ubic_Prim!=null){
														tabla+=json.data[i].Desc_Ubic_Prim;
													}
								tabla+='			</td>';
								tabla+='			<td>';
													if(json.data[i].Desc_Ubic_Sec!=null){
														tabla+=json.data[i].Desc_Ubic_Sec;
													}
								tabla+='			</td>';
								tabla+='			<td >'+json.data[i].Fech_Solicitud+'</td>';
								tabla+='			<td >'+json.data[i].Fech_Cierre+'</td>';
								tabla+='		</tr>';
								
								
							}
						}else{
							mensajesalerta("Informaci&oacute;n", "No se Encontraron Activos", "info", "dark");
						}
					
						tabla+='		</tbody>';
						tabla+='	</table>';
						tabla+='  </div>';
						tabla+='  </from>';
						
						$("#tabla_tickets_gtiqx").html(tabla);
						$("#gifcargando_tabla_gtiqx").hide();
						
						datatable_activos_gtiqx=$('#display_busqueda_activos_gtiqx').DataTable({
							"paging": true,
							"lengthChange": true,
							"ordering": true,
							"info": true,
							"autoWidth": true, 
							language: {
									"decimal": "",
									"emptyTable": "No hay información",
									"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
									"infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
									"infoFiltered": "(Filtrado de _MAX_ total entradas)",
									"infoPostFix": "",
									"thousands": ",",
									"lengthMenu": "Mostrar _MENU_ Entradas",
									"loadingRecords": "Cargando...",
									"processing": "Procesando...",
									"search": "Buscar:",
									"zeroRecords": "Sin resultados encontrados",
									"paginate": {
											"first": "Primero",
											"last": "Ultimo",
											"next": "Siguiente",
											"previous": "Anterior"
									}
							},
							'columnDefs': [{
							 'targets': 0,
							 'searchable':false,
							 'orderable':false,
							 'className': 'dt-body-center',
							 
							}],
							'order': [2, 'asc']
						});
						
					}
				}
			});
	}
	
	limpiar_campos=function(){
		Img_Activo();
		Contador_Det=0;
		array_accesorios_act_ext=[];
		array_eliminados_act_ext=[]; 
		cont_eliminados_act_ext=0;
		array_activos=[]; 
		array_activos_gtiqx=[];
		array_activos_externos=[];
		$("#hdd_estatus_proceso").val("");
		$("#hdd_id_nota_salida").val("");
		$("#cmbubicacionprim").val(-1);
		$('#cmbubicacionsec').children('option').remove();
		$('#cmbubicacionsec').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
		$("#cmbmotivosalida").val(-1);
		$("#Empresa_que_recibe").val("");
		$("#Nombre_completo_contacto").val("");
		$("#Telefono").val("");
		$("#Correo").val("");
		$("#Observaciones").val("");
		$("#Url_Adjuntos").val(""); $("#Carrusel_Fotos").val("");
		$("#tabla_activos_nota").html("");
		$("#body_accesorios_act_ext").empty(); 
		$("#div_msj_finalizar").html("");
		var Quien_Autoriza=$.trim($("#cmb_autoriza").val());
		if(Quien_Autoriza!=""){			
			if(Quien_Autoriza.length > 0){
				var $select3 = $('#cmb_autoriza').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
				control3.enable();
			}
		}
		//Limpia Firma
		$("#limpiar_firma").click();
		
		$("#btn_guardar_firma").html("Guardar");
	}
	
	Generar_Nota_Activos_GTIQX =function(tipo, Id_Duplicado){
		$("#li_tab_firma").removeClass("active");
		$("#Firma").removeClass("active");
		$("#li_tab_adjuntos").removeClass("active");
		$("#Adjuntos").removeClass("active");
		$("#li_tab_finalizar").removeClass("active");
		$("#Finalizar").removeClass("active");
		$("#li_tab_dat_generales").addClass("active");
		$("#Datos_Generales").addClass("active");
			
		$("#li_tab_firma").hide();
		$("#li_tab_adjuntos").hide();
		$("#li_tab_finalizar").hide();
		$("#descripcion_firma").html("<strong>REALIZA LA NOTA:</strong> "+$("#Usuario_Logueado").val());
		$("#div_canvas").attr("width","456");
		$("#div_canvas").attr("height","219");
		$("#hdd_tipo_solicitud").val(tipo);
		var cadena="";
		var duplicado=0;
		//Limpiamos el array
		array_activos_gtiqx=[];
		var Agregar = true;
		var mensaje_error = "";
		
		if(Id_Duplicado==0){
			var contador=0;
			//Se lee todos los td que contengan un input type checkbox
			datatable_activos_gtiqx.$('input[type="checkbox"]').each(function(){
				if(this.checked){
					 array_activos_gtiqx[contador]=this.value;
					 cadena+=this.value+",";
					 contador=contador+1;
				}
			});
			
			if(contador<1){
				Agregar = false;
				mensaje_error += " -Selecciona un Activo<br />";
			}
		}else{
			duplicado=1;
			cadena=Id_Duplicado+",";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		if(Agregar){
			limpiar_campos();
			$("#tabla_activos_nota").html("");
			$("#body_accesorios_act_ext").empty(); 
			cadena=cadena.substring(0,cadena.length-1);
			$("#cmbubicacionprim").val(-1);
			$("#Modal_Nota_Salida").modal("show");
			$("#hdd_duplicado").val(duplicado);
			//console.log(array_activos_gtiqx);
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					Id_Area:$("#idareasesion").val(),
					Estatus_Reg: '1',
					Cadena: cadena,
					Id_Usuario:$("#usuariosesion").val(),
					accion: 'selectbusqueda_activos_nota_salida_gtiqx'
				},
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
					
				},
				success: function (datos) {
					
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var tabla="";
					
					//tabla+='  <br><br><div class="table-responsive">';
					//tabla+='	<table id="display_busqueda_activos_gtiqx" class="table table-bordered table-striped table-chs" width="100%">';
					//tabla+='		<thead>';
					//tabla+='		<tr>';
					//tabla+='			<th width="5%"><span><font color="red">*</font></span>Cantidad</th>';
					//tabla+='			<th width="5%">Unidad</th>';
					//tabla+='			<th width="20%"><span><font color="red">*</font></span>Marca</th>';
					//tabla+='			<th width="20%"><span><font color="red">*</font></span>Modelo</th>';
					//tabla+='			<th width="30%"><span><font color="red">*</font></span>Descripción</th>';
					//tabla+='			<th width="10%">No. Solicitud</th>';
					//tabla+='			<th width="10%"><span><font color="red">*</font></span>No. Serie</th>';
					//tabla+='		</tr>';
					//tabla+='		</thead>';
					//tabla+='		<tbody>';	
					
					if (json.totalCount > 0) {
						var clonarfila= "";
						mensajesalerta("Informaci&oacute;n", "Favor de Revisar la Información", "info", "dark");
						$("#Empresa_que_recibe").val(json.data[0].Empresa_Ext);
						$("#Nombre_completo_contacto").val(json.data[0].Nombre_Completo_Ext);
						$("#Telefono").val(json.data[0].Telefono_Ext);
						$("#Correo").val(json.data[0].Correo_Ext);
						$("#cmbubicacionprim").val(json.data[0].Id_Ubic_Prim);
						if(json.data[0].Id_Ubic_Prim!=""){
							ubic_sec(json.data[0].Id_Ubic_Prim);
							$("#cmbubicacionsec").val(json.data[0].Id_Ubic_Sec);
						}
						
						for (var i = 0; i < json.totalCount; i++) {
							//tabla+='		<tr>';
							//tabla+='			<td><input type="hidden" id="hdd_id_solicitud_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'">  <input type="text" class="form-control input-number" id="Cantidad_'+Contador_Det+'" value="'+json.data[i].Cantidad_Equ_Ext+'"></td>';
							//tabla+='			<td><input type="text" class="form-control" id="Unidad_'+Contador_Det+'" value="EQU" readonly></td>';
							//tabla+='			<td><input type="text" class="form-control" id="Marca_'+Contador_Det+'" value="'+json.data[i].Marca_Act_Ext+'"></td>';
							//tabla+='			<td><input type="text" class="form-control" id="Modelo_'+Contador_Det+'" value="'+json.data[i].Modelo_Act_Ext+'"></td>';
							//tabla+='			<td><input type="text" class="form-control" id="Nombre_Act_'+Contador_Det+'" value="'+json.data[i].Nombre_Act_Ext+'"></td>';
							//tabla+='			<td><input  class="form-control" id="No_solic_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'" readonly></td>';
							////tabla+='			<td><input type="text" class="form-control" id="No_serie_'+Contador_Det+'" value="'+json.data[i].No_Serie_Act_Ext+'"></td>';
							//tabla+='			<td><input type="text" class="form-control" id="No_serie_'+Contador_Det+'" ></td>';
							//tabla+='		</tr>';
							//Contador_Det=Contador_Det+1;
							
							
							
							clonarfila+='<tr id="tr_acc_act_ext_'+Contador_Det+'">';
							clonarfila+='	<td>';
							clonarfila+='				<input type="hidden" id="hdd_id_solicitud_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'"> <input type="text" class="form-control input-number revision_check_list_act_ext" id="Cantidad_'+Contador_Det+'"  value="'+json.data[i].Cantidad_Equ_Ext+'">';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<select class="form-control revision_check_list_act_ext" id="Unidad_'+Contador_Det+'"><option value="EQU" selected>EQU</option><option value="ACC">ACC</option><option value="CONS">CONS</option><option value="REF">REF</option><option value="PZA">PZA</option><option value="CJA">CJA</option><option value="KIT">KIT</option></select>';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Marca_'+Contador_Det+'" value="'+json.data[i].Marca_Act_Ext+'" placeholder="Marca" >';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Modelo_'+Contador_Det+'" value="'+json.data[i].Modelo_Act_Ext+'" placeholder="Modelo" >';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Nombre_Act_'+Contador_Det+'" value="'+json.data[i].Nombre_Act_Ext+'" placeholder="Nombre" >';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_solic_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'" disabled>';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_serie_'+Contador_Det+'" placeholder="No. Serie" >';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<button type="button" name="eliminarfila[]" id="eliminarfila" class="btn btn-danger eliminalinea" onclick="elimina_acc_ext('+Contador_Det+')">Eliminar</button>';
							clonarfila+='	</td>';
							clonarfila+='</tr>';
							Contador_Det=Contador_Det+1;
							
							if(json.data[i].Count_Acc_D>0){
								for(var k=0; k<json.data[i].Count_Acc_D; k++){
									//tabla+='		<tr>';
									//tabla+='			<td><input type="hidden" id="hdd_id_solicitud_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'"> <input type="text" class="form-control" id="Cantidad_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].Cantidad_Ext+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Unidad_'+Contador_Det+'" value="ACC" readonly></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Marca_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].Marca_Ext+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Modelo_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].Modelo_Ext+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Nombre_Act_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].Nombre_Ext+'"></td>';
									//tabla+='			<td><input  class="form-control" id="No_solic_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'" readonly></td>';
									////tabla+='			<td><input type="text" class="form-control" id="No_serie_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].No_Serie_Ext+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="No_serie_'+Contador_Det+'"></td>';
									//tabla+='		</tr>';
									//Contador_Det=Contador_Det+1;
									
									clonarfila+='<tr id="tr_acc_act_ext_'+Contador_Det+'">';
									clonarfila+='	<td>';
									clonarfila+='				<input type="hidden" id="hdd_id_solicitud_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'"> <input type="text" class="form-control input-number revision_check_list_act_ext" id="Cantidad_'+Contador_Det+'"  value="'+json.data[i].Data_Acc_D[k].Cantidad_Ext+'">';
									clonarfila+='	</td>';
									clonarfila+='	<td width="40px">';
									clonarfila+='				<select class="form-control revision_check_list_act_ext" id="Unidad_'+Contador_Det+'"><option value="EQU" >EQU</option><option value="ACC" selected>ACC</option><option value="CONS">CONS</option><option value="REF">REF</option><option value="PZA">PZA</option><option value="CJA">CJA</option><option value="KIT">KIT</option></select>';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Marca_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].Marca_Ext+'" placeholder="Marca" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Modelo_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].Modelo_Ext+'" placeholder="Modelo" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Nombre_Act_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].Nombre_Ext+'" placeholder="Nombre" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_solic_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'" disabled>';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_serie_'+Contador_Det+'" placeholder="No. Serie" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<button type="button" name="eliminarfila[]" id="eliminarfila" class="btn btn-danger eliminalinea" onclick="elimina_acc_ext('+Contador_Det+')">Eliminar</button>';
									clonarfila+='	</td>';
									clonarfila+='</tr>';
									Contador_Det=Contador_Det+1;
								}
							}
						}
					}else{
						mensajesalerta("Informaci&oacute;n", "No se Encontraron Activos", "info", "dark");
					}
				
					//tabla+='		</tbody>';
					//tabla+='	</table>';
					//tabla+='	</div>';
					//tabla+='	<br><br>';
					//$("#tabla_activos_nota").html(tabla);
					$("#tbl_accesorios_act_ext tbody").append(clonarfila);
					$('.input-number').on('input', function () { 
						this.value = this.value.replace(/[^0-9]/g,'');
					});
				}
			});
		}
	}
	
	Generar_Nota_Activos_Externos =function(tipo, Id_Duplicado){
		$("#li_tab_firma").removeClass("active");
		$("#Firma").removeClass("active");
		$("#li_tab_adjuntos").removeClass("active");
		$("#Adjuntos").removeClass("active");
		$("#li_tab_finalizar").removeClass("active");
		$("#Finalizar").removeClass("active");
		$("#li_tab_dat_generales").addClass("active");
		$("#Datos_Generales").addClass("active");
		$("#li_tab_firma").hide();
		$("#li_tab_adjuntos").hide();
		$("#li_tab_finalizar").hide();
		$("#descripcion_firma").html("<strong>REALIZA LA NOTA:</strong> "+$("#Usuario_Logueado").val());
		$("#div_canvas").attr("width","456");
		$("#div_canvas").attr("height","219");
		$("#hdd_tipo_solicitud").val(tipo);
		var cadena="";
		var duplicado=0;
		//Limpiamos el array
		array_activos_externos=[];
		var Agregar = true;
		var mensaje_error = "";
		
		if(Id_Duplicado==0){
			var contador=0;
			//Se lee todos los td que contengan un input type checkbox
			datatable_activos_externos.$('input[type="checkbox"]').each(function(){
				if(this.checked){
					 array_activos_externos[contador]=this.value;
					 cadena+=this.value+",";
					 contador=contador+1;
				}
			});
			
			if(contador<1){
				Agregar = false;
				mensaje_error += " -Selecciona un Activo<br />";
			}
		}else{
			duplicado=1;
			cadena=Id_Duplicado+",";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		if(Agregar){
			limpiar_campos();
			$("#tabla_activos_nota").html("");
			$("#body_accesorios_act_ext").empty(); 
			cadena=cadena.substring(0,cadena.length-1);
			$("#cmbubicacionprim").val(-1);
			$("#Modal_Nota_Salida").modal("show");
			$("#hdd_duplicado").val(duplicado);
			//console.log(array_activos_gtiqx);
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					Id_Area:$("#idareasesion").val(),
					Estatus_Reg: '1',
					Cadena: cadena,
					Usr_Inser:$("#usuariosesion").val(),
					accion: 'selectbusqueda_activos_externos_nota_salida'
				},
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
					
				},
				success: function (datos) {
					
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var tabla="";
					
					//tabla+='  <br><br><div class="table-responsive">';
					//tabla+='	<table id="display_busqueda_activos_gtiqx" class="table table-bordered table-striped table-chs" width="100%">';
					//tabla+='		<thead>';
					//tabla+='		<tr>';
					//tabla+='			<th width="5%"><span><font color="red">*</font></span>Cantidad</th>';
					//tabla+='			<th width="5%">Unidad</th>';
					//tabla+='			<th width="20%"><span><font color="red">*</font></span>Marca</th>';
					//tabla+='			<th width="20%"><span><font color="red">*</font></span>Modelo</th>';
					//tabla+='			<th width="30%"><span><font color="red">*</font></span>Descripción</th>';
					//tabla+='			<th width="10%">No. Solicitud</th>';
					//tabla+='			<th width="10%"><span><font color="red">*</font></span>No. Serie</th>';
					//tabla+='		</tr>';
					//tabla+='		</thead>';
					//tabla+='		<tbody>';	
					
					if (json.totalCount > 0) {
						var clonarfila= "";
						mensajesalerta("Informaci&oacute;n", "Favor de Revisar la Información", "info", "dark");
						$("#Empresa_que_recibe").val(json.data[0].Empresa_Ext);
						$("#Nombre_completo_contacto").val(json.data[0].Nombre_Completo_Ext);
						$("#Telefono").val(json.data[0].Telefono_Ext);
						$("#Correo").val(json.data[0].Correo_Ext);
						$("#cmbubicacionprim").val(json.data[0].Id_Ubic_Prim);
						if(json.data[0].Id_Ubic_Prim!=""){
							ubic_sec(json.data[0].Id_Ubic_Prim);
							$("#cmbubicacionsec").val(json.data[0].Id_Ubic_Sec);
						}
						
						for (var i = 0; i < json.totalCount; i++) {
							//tabla+='		<tr>';
							//tabla+='			<td><input type="hidden" id="hdd_id_solicitud_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'">  <input type="text" class="form-control input-number" id="Cantidad_'+Contador_Det+'" value="'+json.data[i].Cantidad_Equ_Ext+'"></td>';
							//tabla+='			<td><input type="text" class="form-control" id="Unidad_'+Contador_Det+'" value="EQU" readonly></td>';
							//tabla+='			<td><input type="text" class="form-control" id="Marca_'+Contador_Det+'" value="'+json.data[i].Marca_Act_Ext+'"></td>';
							//tabla+='			<td><input type="text" class="form-control" id="Modelo_'+Contador_Det+'" value="'+json.data[i].Modelo_Act_Ext+'"></td>';
							//tabla+='			<td><input type="text" class="form-control" id="Nombre_Act_'+Contador_Det+'" value="'+json.data[i].Nombre_Act_Ext+'"></td>';
							//tabla+='			<td><input  class="form-control" id="No_solic_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'" readonly></td>';
							////tabla+='			<td><input type="text" class="form-control" id="No_serie_'+Contador_Det+'" value="'+json.data[i].No_Serie_Act_Ext+'"></td>';
							//tabla+='			<td><input type="text" class="form-control" id="No_serie_'+Contador_Det+'" ></td>';
							//tabla+='		</tr>';
							//Contador_Det=Contador_Det+1;
							
							
							
							clonarfila+='<tr id="tr_acc_act_ext_'+Contador_Det+'">';
							clonarfila+='	<td>';
							clonarfila+='				<input type="hidden" id="hdd_id_solicitud_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'"> <input type="text" class="form-control input-number revision_check_list_act_ext" id="Cantidad_'+Contador_Det+'"  value="'+json.data[i].Cantidad_Equ_Ext+'">';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<select class="form-control revision_check_list_act_ext" id="Unidad_'+Contador_Det+'"><option value="EQU" selected>EQU</option><option value="ACC">ACC</option><option value="CONS">CONS</option><option value="REF">REF</option><option value="PZA">PZA</option><option value="CJA">CJA</option><option value="KIT">KIT</option></select>';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Marca_'+Contador_Det+'" value="'+json.data[i].Marca_Act_Ext+'" placeholder="Marca" >';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Modelo_'+Contador_Det+'" value="'+json.data[i].Modelo_Act_Ext+'" placeholder="Modelo" >';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Nombre_Act_'+Contador_Det+'" value="'+json.data[i].Nombre_Act_Ext+'" placeholder="Nombre" >';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_solic_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'" disabled>';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_serie_'+Contador_Det+'" placeholder="No. Serie" >';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<button type="button" name="eliminarfila[]" id="eliminarfila" class="btn btn-danger eliminalinea" onclick="elimina_acc_ext('+Contador_Det+')">Eliminar</button>';
							clonarfila+='	</td>';
							clonarfila+='</tr>';
							Contador_Det=Contador_Det+1;
							
							if(json.data[i].Count_Acc_D>0){
								for(var k=0; k<json.data[i].Count_Acc_D; k++){
									//tabla+='		<tr>';
									//tabla+='			<td><input type="hidden" id="hdd_id_solicitud_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'"> <input type="text" class="form-control" id="Cantidad_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].Cantidad_Ext+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Unidad_'+Contador_Det+'" value="ACC" readonly></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Marca_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].Marca_Ext+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Modelo_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].Modelo_Ext+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Nombre_Act_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].Nombre_Ext+'"></td>';
									//tabla+='			<td><input  class="form-control" id="No_solic_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'" readonly></td>';
									////tabla+='			<td><input type="text" class="form-control" id="No_serie_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].No_Serie_Ext+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="No_serie_'+Contador_Det+'"></td>';
									//tabla+='		</tr>';
									//Contador_Det=Contador_Det+1;
									
									clonarfila+='<tr id="tr_acc_act_ext_'+Contador_Det+'">';
									clonarfila+='	<td>';
									clonarfila+='				<input type="hidden" id="hdd_id_solicitud_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'"> <input type="text" class="form-control input-number revision_check_list_act_ext" id="Cantidad_'+Contador_Det+'"  value="'+json.data[i].Data_Acc_D[k].Cantidad_Ext+'">';
									clonarfila+='	</td>';
									clonarfila+='	<td width="40px">';
									clonarfila+='				<select class="form-control revision_check_list_act_ext" id="Unidad_'+Contador_Det+'"><option value="EQU" >EQU</option><option value="ACC" selected>ACC</option><option value="CONS">CONS</option><option value="REF">REF</option><option value="PZA">PZA</option><option value="CJA">CJA</option><option value="KIT">KIT</option></select>';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Marca_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].Marca_Ext+'" placeholder="Marca" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Modelo_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].Modelo_Ext+'" placeholder="Modelo" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Nombre_Act_'+Contador_Det+'" value="'+json.data[i].Data_Acc_D[k].Nombre_Ext+'" placeholder="Nombre" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_solic_'+Contador_Det+'" value="'+json.data[i].Id_Solicitud+'" disabled>';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_serie_'+Contador_Det+'" placeholder="No. Serie" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<button type="button" name="eliminarfila[]" id="eliminarfila" class="btn btn-danger eliminalinea" onclick="elimina_acc_ext('+Contador_Det+')">Eliminar</button>';
									clonarfila+='	</td>';
									clonarfila+='</tr>';
									Contador_Det=Contador_Det+1;
								}
							}
						}
					}else{
						mensajesalerta("Informaci&oacute;n", "No se Encontraron Activos", "info", "dark");
					}
				
					//tabla+='		</tbody>';
					//tabla+='	</table>';
					//tabla+='	</div>';
					//tabla+='	<br><br>';
					//$("#tabla_activos_nota").html(tabla);
					$("#tbl_accesorios_act_ext tbody").append(clonarfila);
					$('.input-number').on('input', function () { 
						this.value = this.value.replace(/[^0-9]/g,'');
					});
				}
			});
		}
	}
	
	Activos_inventario=function(tipo){
		$("#hdd_tipo_solicitud").val(tipo);
		$("#tabla_activos").html("");
		array_activos=[];
		tabla_activos();
	}
	
	if($("#idareasesion").val()!=1){
		$("#li_Activos_GTIQX").hide();
		$("#a_Activos_Inventario").click();
	}
	
	Activos_tickets_externos=function(tipo){
		$("#hdd_tipo_solicitud").val(tipo);
		$("#tabla_activos_externos").html("");
		array_activos_externos=[];
		tabla_activos_externos();
	}
	
	function tabla_activos(){
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					Id_Area:$("#idareasesion").val(),
					Estatus_Reg: '1',
					accion: 'selectbusqueda_activos_nota_salida'
				},
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
					$("#gifcargando_tabla_inventario").show();
				},
				success: function (datos) {
					
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var tabla="";
					tabla+='  <form name="frm-example" id="frm-example">';
					tabla+='  <div class="table-responsive">';
					tabla+='	<table id="display_busqueda_activos" class="table table-bordered table-striped table-chs">';
					tabla+='		<thead>';
					tabla+='		<tr>';
					tabla+='			<th>Opciones<br><div align="center" style="display:none"><input name="select_all" value="1" id="busqueda-select-all" type="checkbox" /></div></th>';
					tabla+='			<th>AF/BC</th>';
					tabla+='			<th>Nombre Activo</th>';
					tabla+='			<th>Marca</th>';
					tabla+='			<th>Modelo</th>';
					tabla+='			<th>No. Serie</th>';
					//tabla+='			<th>Area</th>';
					tabla+='			<th>Ubicaci&oacute;n Primaria</th>';
					tabla+='			<th>Ubicaci&oacute;n Secundaria</th>';
					
					tabla+='		</tr>';
					tabla+='		</thead>';
					tabla+='		<tbody>';	
					
					if (json.totalCount > 0) {
						for (var i = 0; i < json.totalCount; i++) {
							tabla+='		<tr>';
							//tabla+='			<td ><input type="checkbox" id="checkbox'+i+'" value="'+json.data[i].Id_Activo+'" id="'+json.data[i].Id_Activo+'" onchange="pasarcheckactivos('+i+','+json.data[i].Id_Activo+')"></td>';
							tabla+='			<td ><div align="center"><input type="checkbox" id="checkbox'+i+'" value="'+json.data[i].Id_Activo+'" id="'+json.data[i].Id_Activo+'" ></div></td>';
							tabla+='			<td >'+json.data[i].AF_BC+'</td>';
							tabla+='			<td >'+json.data[i].Nombre_Activo+'</td>';
							tabla+='			<td >'+json.data[i].Marca+'</td>';
							tabla+='			<td >'+json.data[i].Modelo+'</td>';
							tabla+='			<td >'+json.data[i].NumSerie+'</td>';
							//tabla+='			<td >'+json.data[i].Nom_Area+'</td>';
							tabla+='			<td >';
												if(json.data[i].Desc_Ubic_Prim!=null){
													tabla+=json.data[i].Desc_Ubic_Prim;
												}
							tabla+='			</td>';
							tabla+='			<td>';
												if(json.data[i].Desc_Ubic_Sec!=null){
													tabla+=json.data[i].Desc_Ubic_Sec;
												}
							tabla+='			</td>';
							tabla+='		</tr>';
							
						}
					}else{
						mensajesalerta("Informaci&oacute;n", "No se Encontraron Activos", "info", "dark");
					}
				
					tabla+='		</tbody>';
					tabla+='	</table>';
					tabla+='  </div>';
					tabla+='  </from>';
					
					$("#tabla_activos").html(tabla);
					$("#gifcargando_tabla_inventario").hide();
					
					datatable_activos=$('#display_busqueda_activos').DataTable({
					  "paging": true,
					  "lengthChange": true,
					  "ordering": true,
					  "info": true,
					  "autoWidth": true, 
					  language: {
								"decimal": "",
								"emptyTable": "No hay información",
								"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
								"infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
								"infoFiltered": "(Filtrado de _MAX_ total entradas)",
								"infoPostFix": "",
								"thousands": ",",
								"lengthMenu": "Mostrar _MENU_ Entradas",
								"loadingRecords": "Cargando...",
								"processing": "Procesando...",
								"search": "Buscar:",
								"zeroRecords": "Sin resultados encontrados",
								"paginate": {
										"first": "Primero",
										"last": "Ultimo",
										"next": "Siguiente",
										"previous": "Anterior"
								}
						},
					  'columnDefs': [{
						 'targets': 0,
						 'searchable':false,
						 'orderable':false,
						 'className': 'dt-body-center',
						 
					  }],
					  'order': [1, 'asc']
					});
				}
			});
	}
	
	function tabla_activos_externos(){
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					Id_Area:$("#idareasesion").val(),
					Estatus_Reg: '1',
					Usr_Inser:$("#usuariosesion").val(),
					accion: 'selectbusqueda_activos_externos_nota_salida'
				},
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
					$("#gifcargando_tabla_externos").show();
				},
				success: function (datos) {
					
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var tabla="";
					if (json.totalCount > 0) {
						tabla+='  <form name="frm-example" id="frm-example">';
						tabla+='  <div class="table-responsive">';
						tabla+='	<table id="display_busqueda_activos_externos" class="table table-bordered table-striped table-chs">';
						tabla+='		<thead>';
						tabla+='		<tr>';
						tabla+='			<th>Opciones<br><div align="center" style="display:none"><input name="select_all" value="1" id="busqueda-select-all" type="checkbox" /></div></th>';
						tabla+='			<th>Duplicar</th>';
						//if(json.data[0].Gestor_Senior=="1"){
						//Este permiso solo lo tiene Joaquin de Biomédica, asi lo pidio
						if($("#usuariosesion").val()==5){
							tabla+='			<th>Cancelar</th>';
						}
						tabla+='			<th>Nombre Activo</th>';
						tabla+='			<th>Marca</th>';
						tabla+='			<th>Modelo</th>';
						tabla+='			<th>No. Serie</th>';
						//tabla+='			<th>Area</th>';
						tabla+='			<th>Ubicaci&oacute;n Primaria</th>';
						tabla+='			<th>Ubicaci&oacute;n Secundaria</th>';
						
						tabla+='		</tr>';
						tabla+='		</thead>';
						tabla+='		<tbody>';	
						
						if (json.totalCount > 0) {
							for (var i = 0; i < json.totalCount; i++) {
								tabla+='		<tr>';
								//tabla+='			<td ><input type="checkbox" id="checkbox'+i+'" value="'+json.data[i].Id_Activo+'" id="'+json.data[i].Id_Activo+'" onchange="pasarcheckactivos('+i+','+json.data[i].Id_Activo+')"></td>';
								tabla+='			<td ><div align="center"><input type="checkbox" id="checkbox'+i+'" value="'+json.data[i].Id_Solicitud+'" id="'+json.data[i].Id_Solicitud+'" ></div></td>';
								tabla+='			<td ><input type="button" class="btn btn-success btn-xs" value="Duplicar" onclick="duplicar_nota_salidaExternos('+json.data[i].Id_Solicitud+')" id="duplicar_nota_salida_GTIQX"></td>';
								if($("#usuariosesion").val()==5){
								//if(json.data[i].Gestor_Senior=="1"){
									tabla+='			<td align="center">';
									tabla+='				<a href="#" data-toggle="modal" data-target="#Modal_Cancelacion" onclick="Pasar_val_cancelacion('+json.data[i].Id_Solicitud+')" title="Cancelar Ticket">';
									tabla+='					<span><i class="fa fa-trash" style="font-size:16px;color:red" aria-hidden="true"></i></span>';
									tabla+='				</a>';
									tabla+='			</td>';
								}
								tabla+='			<td >'+json.data[i].Nombre_Act_Ext+'</td>';
								tabla+='			<td >'+json.data[i].Marca_Act_Ext+'</td>';
								tabla+='			<td >'+json.data[i].Modelo_Act_Ext+'</td>';
								tabla+='			<td >'+json.data[i].No_Serie_Act_Ext+'</td>';
								//tabla+='			<td >'+json.data[i].Nom_Area+'</td>';
								tabla+='			<td >';
													if(json.data[i].Desc_Ubic_Prim!=null){
														tabla+=json.data[i].Desc_Ubic_Prim;
													}
								tabla+='			</td>';
								tabla+='			<td>';
													if(json.data[i].Desc_Ubic_Sec!=null){
														tabla+=json.data[i].Desc_Ubic_Sec;
													}
								tabla+='			</td>';
								tabla+='		</tr>';
								
							}
						}else{
							mensajesalerta("Informaci&oacute;n", "No se Encontraron Activos", "info", "dark");
						}
					
						tabla+='		</tbody>';
						tabla+='	</table>';
						tabla+='  </div>';
						tabla+='  </from>';
						
						$("#tabla_activos_externos").html(tabla);
						$("#gifcargando_tabla_externos").hide();
						
						datatable_activos_externos=$('#display_busqueda_activos_externos').DataTable({
							"paging": true,
							"lengthChange": true,
							"ordering": true,
							"info": true,
							"autoWidth": true, 
							language: {
									"decimal": "",
									"emptyTable": "No hay información",
									"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
									"infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
									"infoFiltered": "(Filtrado de _MAX_ total entradas)",
									"infoPostFix": "",
									"thousands": ",",
									"lengthMenu": "Mostrar _MENU_ Entradas",
									"loadingRecords": "Cargando...",
									"processing": "Procesando...",
									"search": "Buscar:",
									"zeroRecords": "Sin resultados encontrados",
									"paginate": {
											"first": "Primero",
											"last": "Ultimo",
											"next": "Siguiente",
											"previous": "Anterior"
									}
							},
							'columnDefs': [{
							 'targets': 0,
							 'searchable':false,
							 'orderable':false,
							 'className': 'dt-body-center',
							 
							}],
							'order': [1, 'asc']
						});
					}else{
						$("#gifcargando_tabla_externos").hide();
						$("#tabla_activos_externos").html("No Existe Información");
					}
				}
			});
	}
	
	notas_en_proceso=function(){
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					Id_Area:$("#idareasesion").val(),
					accion: 'proceso_notas_salida'
				},
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
					//$("#gifcargando_tabla_inventario").show();
				},
				success: function (datos) {
					
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var tabla="";
					tabla+='  <form name="frm-example" id="frm-example">';
					tabla+='  <div class="table-responsive">';
					tabla+='	<table id="display_proceso_notas_salida" class="table table-bordered table-striped table-chs">';
					tabla+='		<thead>';
					tabla+='		<tr>';
					tabla+='			<th align="center">Editar</th>';
					tabla+='			<th align="center">Cancelar</th>';
					tabla+='			<th>Empresa</th>';
					tabla+='			<th>Ubicación Primaria</th>';
					tabla+='			<th>Ubicación Secundaria</th>';
					tabla+='			<th>Motivo Salida</th>';
					tabla+='			<th>Quien Realiza la Nota</th>';
					tabla+='			<th>Quien Autoriza</th>';
					tabla+='			<th>Quien Recibe</th>';
					tabla+='			<th>Fecha</th>';
					tabla+='		</tr>';
					tabla+='		</thead>';
					tabla+='		<tbody>';	
					
					if (json.totalCount > 0) {
						var Request_Uri="<?php echo $_SERVER["REQUEST_URI"];?>";
						Request_Uri = Request_Uri.split('/');
							
						
						for (var i = 0; i < json.totalCount; i++) {
							tabla+='		<tr>';
							tabla+='			<td align="center"><a onclick="editar_nota('+json.data[i].Id_Nota_Salida+')" href="#editar" class="fa fa-pencil" style="font-size:17px; color:#333;" aria-hidden="true"></a></td>';
							tabla+='			<td align="center">';
							tabla+='				<a href="#" data-toggle="modal" data-target="#Modal_Cancelacion" onclick="Pasar_val_cancelacion_proceso('+json.data[i].Id_Nota_Salida+')" title="Cancelar Ticket">';
							tabla+='					<span><i class="fa fa-trash" style="font-size:16px;color:red" aria-hidden="true"></i></span>';
							tabla+='				</a>';
							tabla+='			</td>';
							tabla+='			<td >'+json.data[i].Empresa_Recibe+'</td>';
							tabla+='			<td >'+json.data[i].Desc_Ubic_Prim+'</td>';
							tabla+='			<td >'+json.data[i].Desc_Ubic_Sec+'</td>';
							tabla+='			<td >'+json.data[i].Desc_Motivo_Alta+'</td>';
							tabla+='			<td >'+json.data[i].Nombre_Realiza_Nota+'</td>';
							tabla+='			<td >'+json.data[i].Nombre_Quien_Autoriza+'</td>';
							tabla+='			<td >'+json.data[i].Recibe+'</td>';
							tabla+='			<td >'+json.data[i].Fech_Firma_Recibe+'</td>';
							tabla+='		</tr>';
						}
					}else{
						//mensajesalerta("Informaci&oacute;n", "No se Encontró información", "info", "dark");
					}
				
					tabla+='		</tbody>';
					tabla+='	</table>';
					tabla+='  </div>';
					tabla+='  </from>';
					
					$("#tabla_en_proceso").html(tabla);
					
					
					datatable_historial_notas_salida=$('#display_proceso_notas_salida').DataTable({
					  "paging": true,
					  "lengthChange": true,
					  "ordering": true,
					  "info": true,
					  "autoWidth": true, 
					  language: {
								"decimal": "",
								"emptyTable": "No hay información",
								"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
								"infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
								"infoFiltered": "(Filtrado de _MAX_ total entradas)",
								"infoPostFix": "",
								"thousands": ",",
								"lengthMenu": "Mostrar _MENU_ Entradas",
								"loadingRecords": "Cargando...",
								"processing": "Procesando...",
								"search": "Buscar:",
								"zeroRecords": "Sin resultados encontrados",
								"paginate": {
										"first": "Primero",
										"last": "Ultimo",
										"next": "Siguiente",
										"previous": "Anterior"
								}
						},
					  'columnDefs': [{
						 'targets': 0,
						 'searchable':false,
						 'orderable':false,
						 'className': 'dt-body-center',
						 
					  }],
					  'order': [1, 'asc']
					});
				}
			});
	}
	
	historial_notas_salida=function(){
		$("#Historial_realizadas").prop("checked", true);
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
			data: {
				Id_Area:$("#idareasesion").val(),
				accion: 'historial_notas_salida'
			},
			async: true,
			dataType: "html",
			beforeSend: function (objeto) {
				//$("#gifcargando_tabla_inventario").show();
			},
			success: function (datos) {
				
				var json = "";
				json = eval("(" + datos + ")"); //Parsear JSON
				var tabla="";
				tabla+='  <form name="frm-example" id="frm-example">';
				tabla+='  <div class="table-responsive">';
				tabla+='	<table id="display_historial_notas_salida" class="table table-bordered table-striped table-chs">';
				tabla+='		<thead>';
				tabla+='		<tr>';
				tabla+='			<th align="center">Reporte</th>';
				tabla+='			<th>Empresa</th>';
				tabla+='			<th>Ubicación Primaria</th>';
				tabla+='			<th>Ubicación Secundaria</th>';
				tabla+='			<th>Motivo Salida</th>';
				tabla+='			<th>Quien Realiza la Nota</th>';
				tabla+='			<th>Quien Autoriza</th>';
				tabla+='			<th>Quien Recibe</th>';
				tabla+='			<th>Fecha</th>';
				tabla+='		</tr>';
				tabla+='		</thead>';
				tabla+='		<tbody>';	
				
				if (json.totalCount > 0) {
					var Request_Uri="<?php echo $_SERVER["REQUEST_URI"];?>";
					Request_Uri = Request_Uri.split('/');
						
					
					for (var i = 0; i < json.totalCount; i++) {
						tabla+='		<tr>';
						if(Request_Uri[1]=="sigapruebas"||Request_Uri[1]=="SIGAPRUEBAS"){
						tabla+='			<td align="center"><a target="_blank" href="http://siga.hospitalsatelite.com:8080/SIGAPRUEBAS/controladores/activos/siga_activos/Nota_Salida.php?key='+json.data[i].Id_Nota_Salida+'&ver=0" class="fa fa-file-pdf-o" style="font-size:17px; color:#333;" aria-hidden="true"></a></td>';
						}
						
						if(Request_Uri[1]=="siga"||Request_Uri[1]=="SIGA"){
						//tabla+='			<td align="center"><a target="_blank" href="http://siga.hospitalsatelite.com/SIGA/controladores/activos/siga_activos/Nota_Salida.php?key='+json.data[i].Id_Nota_Salida+'&ver=0" class="fa fa-file-pdf-o" style="font-size:17px; color:#333;" aria-hidden="true"></a></td>';
						tabla+='			<td align="center"><a target="_blank" href="https://apps2.hospitalsatelite.com/SIGA/controladores/activos/siga_activos/Nota_Salida.php?key='+json.data[i].Id_Nota_Salida+'&ver=0" class="fa fa-file-pdf-o" style="font-size:17px; color:#333;" aria-hidden="true"></a></td>';
						}
						tabla+='			<td >'+json.data[i].Empresa_Recibe+'</td>';
						tabla+='			<td >'+json.data[i].Desc_Ubic_Prim+'</td>';
						tabla+='			<td >'+json.data[i].Desc_Ubic_Sec+'</td>';
						tabla+='			<td >'+json.data[i].Desc_Motivo_Alta+'</td>';
						tabla+='			<td >'+json.data[i].Nombre_Realiza_Nota+'</td>';
						tabla+='			<td >'+json.data[i].Nombre_Quien_Autoriza+'</td>';
						tabla+='			<td >'+json.data[i].Recibe+'</td>';
						tabla+='			<td >'+json.data[i].Fech_Firma_Recibe+'</td>';
						tabla+='		</tr>';
					}
				}else{
					//mensajesalerta("Informaci&oacute;n", "No se Encontro Historial", "info", "dark");
				}
			
				tabla+='		</tbody>';
				tabla+='	</table>';
				tabla+='  </div>';
				tabla+='  </from>';
				
				$("#tabla_historial_notas_salida").html(tabla);
				
				
				datatable_historial_notas_salida=$('#display_historial_notas_salida').DataTable({
				  "paging": true,
				  "lengthChange": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": true,
				  language: {
							"decimal": "",
							"emptyTable": "No hay información",
							"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
							"infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
							"infoFiltered": "(Filtrado de _MAX_ total entradas)",
							"infoPostFix": "",
							"thousands": ",",
							"lengthMenu": "Mostrar _MENU_ Entradas",
							"loadingRecords": "Cargando...",
							"processing": "Procesando...",
							"search": "Buscar:",
							"zeroRecords": "Sin resultados encontrados",
							"paginate": {
									"first": "Primero",
									"last": "Ultimo",
									"next": "Siguiente",
									"previous": "Anterior"
							}
					},
				  'columnDefs': [{
					 'targets': 0,
					 'searchable':false,
					 'orderable':false,
					 'className': 'dt-body-center',
					 
				  }],
				  'order': [8, 'desc']
				});
			}
		});
	}
	
	historial_cancelacion_notas_salida=function(){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
			data: {
				Id_Area:$("#idareasesion").val(),
				accion: 'historial_cancelacion_notas_salida'
			},
			async: true,
			dataType: "html",
			beforeSend: function (objeto) {
				//$("#gifcargando_tabla_inventario").show();
			},
			success: function (datos) {
				
				var json = "";
				json = eval("(" + datos + ")"); //Parsear JSON
				var tabla="";
				tabla+='  <form name="frm-example" id="frm-example">';
				tabla+='  <div class="table-responsive">';
				tabla+='	<table id="display_historial_cancelacion_notas_salida" class="table table-bordered table-striped table-chs">';
				tabla+='		<thead>';
				tabla+='		<tr>';
				tabla+='			<th>Folio Ticket</th>';
				tabla+='			<th>Empresa</th>';
				tabla+='			<th>Equipo</th>';
				tabla+='			<th>Motivo Cancelación</th>';
				tabla+='			<th>Quien Cancelo</th>';
				tabla+='			<th>Fecha</th>';
				tabla+='		</tr>';
				tabla+='		</thead>';
				tabla+='		<tbody>';	
				
				if (json.totalCount > 0) {
					for (var i = 0; i < json.totalCount; i++) {
						tabla+='		<tr>';
						tabla+='			<td >'+json.data[i].Id_Solicitud+'</td>';
						tabla+='			<td >'+json.data[i].Empresa_Ext+'</td>';
						tabla+='			<td >'+json.data[i].Equipo+'</td>';
						tabla+='			<td >'+json.data[i].Desc_Motivio_Cancelacion+'</td>';
						tabla+='			<td >'+json.data[i].Usuario_Cancelo+'</td>';
						tabla+='			<td >'+json.data[i].Fech_Inser+'</td>';
						tabla+='		</tr>';
					}
				}
			
				tabla+='		</tbody>';
				tabla+='	</table>';
				tabla+='  </div>';
				tabla+='  </from>';
				
				$("#tabla_historial_notas_salida").html(tabla);
				
				
				display_historial_cancelacion_notas_salida=$('#display_historial_cancelacion_notas_salida').DataTable({
				  "paging": true,
				  "lengthChange": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": true,
				  language: {
							"decimal": "",
							"emptyTable": "No hay información",
							"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
							"infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
							"infoFiltered": "(Filtrado de _MAX_ total entradas)",
							"infoPostFix": "",
							"thousands": ",",
							"lengthMenu": "Mostrar _MENU_ Entradas",
							"loadingRecords": "Cargando...",
							"processing": "Procesando...",
							"search": "Buscar:",
							"zeroRecords": "Sin resultados encontrados",
							"paginate": {
									"first": "Primero",
									"last": "Ultimo",
									"next": "Siguiente",
									"previous": "Anterior"
							}
					},
				  'columnDefs': [{
					 'targets': 0,
					 'searchable':false,
					 'orderable':false,
					 'className': 'dt-body-center',
					 
				  }],
				  'order': [5, 'desc']
				});
			}
		});
	}
	
	Cambio_historial=function(tipo){
		if(tipo==1){
			historial_notas_salida();
		}else{
			historial_cancelacion_notas_salida();
		}
	}
	
	editar_nota=function(Id_Nota_Salida){
		$("#Modal_Nota_Salida").modal("show");
		pasar_valores(Id_Nota_Salida);
	}
	
  Generar_Nota_Activos =function(tipo){
		$("#li_tab_firma").removeClass("active");
		$("#Firma").removeClass("active");
		$("#li_tab_adjuntos").removeClass("active");
		$("#Adjuntos").removeClass("active");
		$("#li_tab_finalizar").removeClass("active");
		$("#Finalizar").removeClass("active");
		$("#li_tab_dat_generales").addClass("active");
		$("#Datos_Generales").addClass("active");
		$("#hdd_tipo_solicitud").val(tipo);
		$("#li_tab_firma").hide();
		$("#li_tab_adjuntos").hide();
		$("#li_tab_finalizar").hide();
		var cadena="";
		//Limpiamos el array
		array_activos=[];
		var Agregar = true;
		var mensaje_error = "";
		
		var contador=0;
		//Se lee todos los td que contengan un input type checkbox
		datatable_activos.$('input[type="checkbox"]').each(function(){
			if(this.checked){
			   array_activos[contador]=this.value;
				 cadena+=this.value+",";
			   contador=contador+1;
			}
		});
		
		if(contador<1){
			Agregar = false;
			mensaje_error += " -Selecciona un Activo<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		if(Agregar){
			limpiar_campos();
			$("#tabla_activos_nota").html("");
			$("#body_accesorios_act_ext").empty(); 
			cadena=cadena.substring(0,cadena.length-1);
			$("#cmbubicacionprim").val(-1);
			$("#Modal_Nota_Salida").modal("show");
			//console.log(array_activos);
			var clonarfila= "";
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					Id_Area:$("#idareasesion").val(),
					Estatus_Reg: '1',
					Cadena: cadena,
					accion: 'selectbusqueda_activos_nota_salida'
				},
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
					
				},
				success: function (datos) {
					
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					//var tabla="";
					//
					//tabla+='  <br><br><div class="table-responsive">';
					//tabla+='	<table id="display_busqueda_activos" class="table table-bordered table-striped table-chs" width="100%">';
					//tabla+='		<thead>';
					//tabla+='		<tr>';
					//tabla+='			<th width="10%"><span><font color="red">*</font></span>Cantidad</th>';
					//tabla+='			<th width="10%">Unidad</th>';
					//tabla+='			<th width="20%"><span><font color="red">*</font></span>Marca</th>';
					//tabla+='			<th width="20%"><span><font color="red">*</font></span>Modelo</th>';
					//tabla+='			<th width="20%"><span><font color="red">*</font></span>Descripción</th>';
					//tabla+='			<th width="10%">AF/BC</th>';
					//tabla+='			<th width="10%"><span><font color="red">*</font></span>No. Serie</th>';
					//tabla+='		</tr>';
					//tabla+='		</thead>';
					//tabla+='		<tbody>';	
					
					if (json.totalCount > 0) {
						mensajesalerta("Informaci&oacute;n", "Favor de Revisar la Informaciónss", "info", "dark");
						//$("#Empresa_que_recibe").val(json.data[0].Empresa_Ext);
						//$("#Nombre_completo_contacto").val(json.data[0].Nombre_Completo_Ext);
						//$("#Telefono").val(json.data[0].Telefono_Ext);
						//$("#Correo").val(json.data[0].Correo_Ext);
						$("#cmbubicacionprim").val(json.data[0].Id_Ubic_Prim);
						ubic_sec(json.data[0].Id_Ubic_Prim);
						if(json.data[0].Id_Ubic_Sec!=null){
							$("#cmbubicacionsec").val(json.data[0].Id_Ubic_Sec);
						}
						for (var i = 0; i < json.totalCount; i++) {
							//tabla+='		<tr>';
							//tabla+='			<td><input type="hidden" id="hdd_id_activo_'+i+'" value="'+json.data[i].Id_Activo+'">  <input type="text"  class="form-control input-number" id="Cantidad_'+i+'"></td>';
							//tabla+='			<td><input type="text" class="form-control" id="Unidad_'+i+'" value="EQU" readonly></td>';
							//tabla+='			<td><input type="text" class="form-control" id="Marca_'+i+'" value="'+json.data[i].Marca+'"></td>';
							//tabla+='			<td><input type="text" class="form-control" id="Modelo_'+i+'" value="'+json.data[i].Modelo+'"></td>';
							//tabla+='			<td><input type="text" class="form-control" id="Nombre_Act_'+i+'" value="'+json.data[i].Nombre_Activo+'"></td>';
							//tabla+='			<td><input  class="form-control" id="AF_BC_'+i+'" value="'+json.data[i].AF_BC+'"></td>';
							////tabla+='			<td><input type="text" class="form-control" id="No_serie_'+i+'" value="'+json.data[i].NumSerie+'"></td>';
							//tabla+='			<td><input type="text" class="form-control" id="No_serie_'+i+'" ></td>';
							//tabla+='		</tr>';
							//Contador_Det=Contador_Det+1;
							
							clonarfila+='<tr id="tr_acc_act_ext_'+Contador_Det+'">';
							clonarfila+='	<td>';
							clonarfila+='				<input type="hidden" id="hdd_id_solicitud_'+Contador_Det+'" value="'+json.data[i].Id_Activo+'"> <input type="text" class="form-control input-number revision_check_list_act_ext" id="Cantidad_'+Contador_Det+'"  value="1">';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<select class="form-control revision_check_list_act_ext" id="Unidad_'+Contador_Det+'"><option value="EQU" selected>EQU</option><option value="ACC">ACC</option><option value="CONS">CONS</option><option value="REF">REF</option><option value="PZA">PZA</option><option value="CJA">CJA</option><option value="KIT">KIT</option></select>';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Marca_'+Contador_Det+'" value="'+json.data[i].Marca+'" placeholder="Marca" >';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Modelo_'+Contador_Det+'" value="'+json.data[i].Modelo+'" placeholder="Modelo" >';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Nombre_Act_'+Contador_Det+'" value="'+json.data[i].Nombre_Activo+'" placeholder="Nombre" >';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_solic_'+Contador_Det+'" value="'+json.data[i].AF_BC+'" disabled>';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_serie_'+Contador_Det+'" placeholder="No. Serie" value="'+json.data[i].NumSerie+'">';
							clonarfila+='	</td>';
							clonarfila+='	<td>';
							clonarfila+='				<button type="button" name="eliminarfila[]" id="eliminarfila" class="btn btn-danger eliminalinea" onclick="elimina_acc_ext('+Contador_Det+')">Eliminar</button>';
							clonarfila+='	</td>';
							clonarfila+='</tr>';
							Contador_Det=Contador_Det+1;
						}
					}else{
						mensajesalerta("Informaci&oacute;n", "No se Encontraron Activos", "info", "dark");
					}
				  
					//tabla+='		</tbody>';
					//tabla+='	</table>';
					//tabla+='	</div>';
					//tabla+='	<br><br>';
					//$("#tabla_activos_nota").html(tabla);
						$("#tbl_accesorios_act_ext tbody").append(clonarfila);
						$('.input-number').on('input', function () {
							this.value = this.value.replace(/[^0-9]/g,'');
						});

				}
			});
			
		}
	}
	
	function ubic_prim() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Area:Id_Area, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_prim/Siga_cat_ubic_primFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbubicacionprim').append($('<option>', { value: "-1" }).text("--Ubicación Primaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbubicacionprim').append($('<option>', { value: resultado.data[i].Id_Ubic_Prim }).text(resultado.data[i].Desc_Ubic_Prim));
			}
		}else{
			$('#cmbubicacionprim').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	function motivo_salida() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Area:Id_Area,accion: "selectmotivosalida"};
		resultado=cargo_cmb("../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbmotivosalida').append($('<option>', { value: "-1" }).text("--Motivo de Salida--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbmotivosalida').append($('<option>', { value: resultado.data[i].Id_Motivo_Salida }).text(resultado.data[i].Desc_Motivo_Alta));
			}
		}else{
			$('#cmbmotivosalida').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$( "#cmbubicacionprim" ).change(function() {
		if($(this).val()!="-1"){
			ubic_sec($(this).val());
		}else{
			$('#cmbubicacionsec').children('option').remove();
			$('#cmbubicacionsec').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
		}
	});
	
	function ubic_sec(Id_Ubic_Prim) {
		$('#cmbubicacionsec').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Ubic_Prim:Id_Ubic_Prim, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_sec/Siga_cat_ubic_secFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbubicacionsec').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbubicacionsec').append($('<option>', { value: resultado.data[i].Id_Ubic_Sec }).text(resultado.data[i].Desc_Ubic_Sec));
			}
		}else{
			$('#cmbubicacionsec').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}

	function usuarios_empleados() {
		var jsonParametros = { accion: 'usuarios_delegacion_autoridad', Id_Area:$("#idareasesion").val() };
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
			data: jsonParametros,
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargandoaltausuarios1").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {

						var usuarios='';
						usuarios+='<option></option>';
						usuarios+='<optgroup label="Quien Autoriza">';

						for (var i = 0; i < json.totalCount; i++) {
							usuarios+='<option value="'+json.data[i].Id_Usuario.trim()+'">'+json.data[i].No_Usuario.trim()+'-'+json.data[i].Nombre_Usuario.trim()+'</option>';
						}
						usuarios+='</optgroup>';
						$('#cmb_autoriza').html(usuarios);

						$("#gifcargandoaltausuarios1").hide();
						$("#cmb_autoriza").show();
							
						$('#cmb_autoriza').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargandoaltausuarios1").hide();
						$('#cmb_autoriza').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#cmb_autoriza').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	} 	
	
	siguiente=function(){
		var array_datos="";
		var Agregar = true;
		var mensaje_error = "";
		
		var Id_Nota_Salida=$("#hdd_id_nota_salida").val();
		var Id_Ubic_Prim=$.trim($("#cmbubicacionprim").val());
		var Id_Ubic_Sec=$.trim($("#cmbubicacionsec").val());
		var Id_Motivo_Salida=$.trim($("#cmbmotivosalida").val());
		var Id_Usr_Quien_Autoriza=$.trim($("#cmb_autoriza").val());
		var Empresa_Recibe=$.trim($("#Empresa_que_recibe").val());
		var Nombre_Contacto=$.trim($("#Nombre_completo_contacto").val());
		var Telefono_Contacto=$.trim($("#Telefono").val());
		var Mail_Contacto=$.trim($("#Correo").val());
		var Tipo_Solicitud=$("#hdd_tipo_solicitud").val();
		var Observaciones=$.trim($("#Observaciones").val());
		var Url_Adjuntos=$.trim($("#Url_Adjuntos").val());
		var Nota_Duplicada=$.trim($("#hdd_duplicado").val());
		if(Id_Ubic_Prim=="-1"||Id_Ubic_Prim==""){
			Agregar = false; 
			mensaje_error += " -Selecciona la Ubicación Primaria<br/>";	
		}
		
		if(Id_Ubic_Sec=="-1"||Id_Ubic_Sec==""){
			Agregar = false; 
			mensaje_error += " -Selecciona la Ubicación Secundaria<br/>";	
		}
		
		if(Id_Motivo_Salida=="-1"||Id_Motivo_Salida==""){
			Agregar = false; 
			mensaje_error += " -Selecciona el Motivo de la Salida<br/>";	
		}
		
		if(Id_Usr_Quien_Autoriza==""){
			Agregar = false; 
			mensaje_error += " -Selecciona quien Autoriza la Salida<br/>";	
		}
		
		if(Empresa_Recibe.length <= 0){
			Agregar = false; 
			mensaje_error += " -Agrega la Empresa que Recibe<br />";
		}
		
		if(Nombre_Contacto.length <= 0){
			Agregar = false; 
			mensaje_error += " -Agrega el Contacto que Recibe<br />";
		}
	
		if(Mail_Contacto.length <= 0){
			Agregar = false; 
			mensaje_error += " -Agrega el Mail del Contacto<br />";
		}
		
		if(Observaciones.length <= 0){
			Agregar = false; 
			mensaje_error += " -Agrega las Observaciones<br />";
		}
		
		//if(Url_Adjuntos.length <= 0){
		//	Agregar = false; 
		//	mensaje_error += " -Adjunta por lo menos una Imagen<br />";
		//}
	
		var array_padre=[]; var array_det=[]; var valida_Campos=0;
		if(Tipo_Solicitud==1||Tipo_Solicitud==3){
			for(var i=0; i<Contador_Det; i++){
				if ( $("#hdd_id_solicitud_"+i).length > 0) {
					//if($("#hdd_id_solicitud_"+i).val()!=""){
						array_det=[];
						array_det[0]=$.trim($("#hdd_id_solicitud_"+i).val());
						array_det[1]=$.trim($("#Cantidad_"+i).val());
						array_det[2]=$.trim($("#Unidad_"+i).val());
						array_det[3]=$.trim($("#Marca_"+i).val());
						array_det[4]=$.trim($("#Modelo_"+i).val());
						array_det[5]=$.trim($("#Nombre_Act_"+i).val());
						array_det[6]=$.trim($("#No_solic_"+i).val());
						array_det[7]=$.trim($("#No_serie_"+i).val());
						array_padre[i]=array_det;
						console.log(array_padre);
						if($.trim($("#Cantidad_"+i).val())==""){
							valida_Campos=1;
							Agregar=false;
						}
						
						if($.trim($("#Marca_"+i).val())==""){
							valida_Campos=1;
							Agregar=false;
						}
						
						if($.trim($("#Modelo_"+i).val())==""){
							valida_Campos=1;
							Agregar=false;
						}
						
						if($.trim($("#Nombre_Act_"+i).val())==""){
							valida_Campos=1;
							Agregar=false;
						}
						
						if($.trim($("#No_serie_"+i).val())==""){
							valida_Campos=1;
							Agregar=false;
						}
					//}
				}
		  }
			if(valida_Campos==1){
				mensaje_error += " -Verifica los campos obligatorios de la tabla<br />";
			}
		}
		
		if(Tipo_Solicitud==2){
			for(var i=0; i<Contador_Det; i++){
				if ( $("#hdd_id_solicitud_"+i).length > 0) {
					//if($("#hdd_id_solicitud_"+i).val()!=""){
						array_det=[];
						array_det[0]=$.trim($("#hdd_id_solicitud_"+i).val());
						array_det[1]=$.trim($("#Cantidad_"+i).val());
						array_det[2]=$.trim($("#Unidad_"+i).val());
						array_det[3]=$.trim($("#Marca_"+i).val());
						array_det[4]=$.trim($("#Modelo_"+i).val());
						array_det[5]=$.trim($("#Nombre_Act_"+i).val());
						array_det[6]=$.trim($("#No_solic_"+i).val());
						array_det[7]=$.trim($("#No_serie_"+i).val());
						array_padre[i]=array_det;
						if($.trim($("#Cantidad_"+i).val())==""){
							valida_Campos=1;
							Agregar=false;
						}
						
						if($.trim($("#Marca_"+i).val())==""){
							valida_Campos=1;
							Agregar=false;
						}
						
						if($.trim($("#Modelo_"+i).val())==""){
							valida_Campos=1;
							Agregar=false;
						}
						
						if($.trim($("#Nombre_Act_"+i).val())==""){
							valida_Campos=1;
							Agregar=false;
						}
						
						if($.trim($("#No_serie_"+i).val())==""){
							valida_Campos=1;
							Agregar=false;
						}
					//}
				}
		  }
			
			if(valida_Campos==1){
				mensaje_error += " -Verifica los campos obligatorios de la tabla<br />";
			}
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		
		if(Agregar){					
			if(Id_Nota_Salida==""){
				//Guardar
				var array_datos={
					Id_Ubic_Prim:Id_Ubic_Prim,
					Id_Ubic_Sec:Id_Ubic_Sec,
					Id_Motivo_Salida:Id_Motivo_Salida,
					Id_Usr_Quien_Autoriza:Id_Usr_Quien_Autoriza,
					Empresa_Recibe:Empresa_Recibe,
					Nombre_Contacto:Nombre_Contacto,
					Telefono_Contacto:Telefono_Contacto,
					Mail_Contacto:Mail_Contacto,
					Observaciones:Observaciones,
					Url_Adjuntos:Url_Adjuntos,
					Tipo_Solicitud:Tipo_Solicitud,
					Id_Usuario:$("#usuariosesion").val(),
					Id_Area:$("#idareasesion").val(),
					Nota_Duplicada: Nota_Duplicada,
					Array_Equ_Acc:array_padre,
					//Firma_Digital: dataURL,
					//Estatus_Proceso: 1,
					accion: "guardar_nota_salida"
				};
			}else{
				//Editar
				var array_datos={
					Id_Nota_Salida:Id_Nota_Salida,
					Id_Ubic_Prim:Id_Ubic_Prim,
					Id_Ubic_Sec:Id_Ubic_Sec,
					Id_Motivo_Salida:Id_Motivo_Salida,
					Id_Usr_Quien_Autoriza:Id_Usr_Quien_Autoriza,
					Empresa_Recibe:Empresa_Recibe,
					Nombre_Contacto:Nombre_Contacto,
					Telefono_Contacto:Telefono_Contacto,
					Mail_Contacto:Mail_Contacto,
					Observaciones:Observaciones,
					Url_Adjuntos:Url_Adjuntos,
					Tipo_Solicitud:Tipo_Solicitud,
					Id_Usuario:$("#usuariosesion").val(),
					Id_Area:$("#idareasesion").val(),
					Nota_Duplicada: Nota_Duplicada,
					Array_Equ_Acc:array_padre,
					//Firma_Digital: dataURL,
					//Estatus_Proceso: 1,
					accion: "editar_nota_salida"
				};
			}
					

					
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: array_datos,
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
					jsShowWindowLoad("Guardando, espere porfavor.");
				},
				success: function (datos) {
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						limpiar_campos();
						pasar_valores(json.Id_Nota_Salida);
						mensajesalerta("&Eacute;xito", "Se han guardado los datos correctamente", "success", "dark");
						if(Tipo_Solicitud==1){cmb_empresas("0");$("#tabla_tickets_gtiqx").html("");}
						if(Tipo_Solicitud==2){Activos_inventario(2);}
						if(Tipo_Solicitud==3){Activos_tickets_externos(3);}
					}else{
						mensajesalerta("Oh No!", "Ocurrio un error al guardar " + json.mensaje, "error", "dark");
					}
					jsRemoveWindowLoad();
				}
			});
		}else{
			
		}
	}
	
	function carga_imagenes_multiple(name_upload, div_control, div_lista, url_hidden, url_upload, vista_imagen, Show_upload, tipo_archivo, nombre_label){
		var array_extension= [];
		if(tipo_archivo==""){
			array_extension=["jpg", "jpeg", "png", "gif", "heic", "HEIC" ];
		}else{
			array_extension=[tipo_archivo];
		}
		var Todos="";
		//inicializar el file upload
		$('#'+name_upload).fileinput({
			uploadUrl: "../Archivos/upload.php?carpeta="+url_upload+"",
			uploadAsync: true,
			showUpload: Show_upload,
			showRemove: false,
			showZoom: false,
			showPreview: vista_imagen,
			previewFileType: "text",
			minFileCount: 1,
			maxFileCount: 1,
			allowedFileExtensions: array_extension,
			browseClass: "btn chs",
			//validateInitialCount: true,
			language: 'es',
			initialPreviewAsData: true, // defaults markup
			initialPreviewFileType: 'image' // image is the default and can be overridden in config below
		}).on("filebatchselected", function (event, files) {
			$('.fileinput-upload-button').click();
		});
		//Cargar Archivo
		$('#'+name_upload).on('fileuploaded', function (event, data, previewId, index) {
			//guardar_adjuntos();
			var arch=$('#'+url_hidden).val();
			
			var form = data.form, files = data.files, extra = data.extra,
			response = data.response, reader = data.reader;
			if(arch.length>0){
				Todos="si";
				arch=arch+"---"+response.initialPreviewConfig[0].caption;
				$('#'+url_hidden).val(arch);
				//Muestra en un div el listado de los archivos Adjuntos
				mostrar_archivos_lista(arch, div_lista, url_upload, Todos, url_hidden,"");

				
			}else{
				Todos="no";
				$('#'+url_hidden).val(response.initialPreviewConfig[0].caption);
				mostrar_archivos_lista(response.initialPreviewConfig[0].caption, div_lista, url_upload, Todos, url_hidden,"");
			
			}
			
			//Limpia Control Multiple
			var valor_hidden="";
			var valor_hidden=$("#"+url_hidden).val();
			
			var Adjuntos="";
			Adjuntos='<label for="attach-1" class="control-label"  style="font-size: 11px;">'+nombre_label+'</label>';			  
			Adjuntos+='<input id="'+name_upload+'" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
			Adjuntos+='<input type="hidden" id="'+url_hidden+'" value="'+valor_hidden+'">';
				
			$("#"+div_control).html(Adjuntos);
			carga_arch_multiples(name_upload, div_control, div_lista, url_hidden, url_upload, vista_imagen, Show_upload, tipo_archivo, nombre_label);
			///////////////////////////////////////////
			
			
			var Pre=previewId.split("-");
			
			//Al subir un archivo en automatico se borra su contenedor
			$("#"+Pre[0]+"-"+Pre[1]+"-init_"+Pre[2]).remove();
			$("#"+Pre[0]+"-"+Pre[1]+"-"+Pre[2]).remove();
			$(".form-control file-caption").html("");
			
			
			guardar_adjuntos();
			
		});
		
		
			$('#'+name_upload).on("filepredelete", function(event, data, previewId, index) {
			alert(1);
			var abort = true;
			if (confirm("Esta Seguro de eliminar el archivo")) {
				
				var valor=$('#'+url_hidden).val();
				if(valor.length>0){
					//Partimoa nustra cadena 
					var arreglo = valor.split("---");
					//Recorremos la cadena convertida en array
					
					var resultado_cadena="";
					for(var i=0; i<arreglo.length;i++){
						if(arreglo.length>1){
							if(arreglo[i]!=data){
								resultado_cadena=arreglo[i]+"---"+resultado_cadena;
							}
						}else{
							$('#'+url_hidden).val("");
							$('#'+div_lista).html("");
						}
					}
					
					if(resultado_cadena!=""){
						resultado_cadena=resultado_cadena.substring(0, resultado_cadena.length-3)
						$('#'+url_hidden).val(resultado_cadena);
						//Muestra en un div el listado de los archivos Adjuntos
						//mostrar_archivos_lista(resultado_cadena, div_lista, url_upload, "si", url_hidden);
					}
				}else{
					$('#'+url_hidden).val("");
					$('#'+div_lista).html("");
				}
				abort = false;
			
				if($('#'+url_hidden).val()!=""){
					var encontrado = $('#'+url_hidden).val().indexOf("---");
					if(encontrado!=-1){
						mostrar_archivos_lista($('#'+url_hidden).val(), div_lista, url_upload, "si", url_hidden,"");
					}else{
						mostrar_archivos_lista($('#'+url_hidden).val(), div_lista, url_upload, "no", url_hidden,"");
					}
				}else{
					$('#'+div_lista).html("");
				}
				guardar_adjuntos();
			}
			return abort;
		});
		
	}

	guardar_adjuntos=function(){
		var Agregar = true;
		var mensaje_error = "";
		
		var Id_Nota_Salida=$("#hdd_id_nota_salida").val();
		var Url_Adjuntos=$.trim($("#Url_Adjuntos").val());
	
		if(Url_Adjuntos.length <= 0){
			Agregar = false; 
			mensaje_error += " -Adjunta por lo menos una Imagen<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		if(Agregar){
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					Id_Nota_Salida:Id_Nota_Salida,
					Url_Adjuntos:Url_Adjuntos,
					accion: "guardar_adjuntos"
				},
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
					jsShowWindowLoad("Guardando, espere porfavor.");
				},
				success: function (datos) {
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						//limpiar_campos();
						//pasar_valores(Id_Nota_Salida);
						mensajesalerta("&Eacute;xito", "Se han guardado los adjuntos correctamente", "success", "dark");
					}else{
						mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
					}
					jsRemoveWindowLoad();
				}
			});
		}
	}
	
	//Guardar Informacion	y firma
	savePNGButton.addEventListener("click", function (event) {

		var Agregar = true;
		var mensaje_error = "";
		
		var Id_Nota_Salida=$("#hdd_id_nota_salida").val();
		var Id_Ubic_Prim=$.trim($("#cmbubicacionprim").val());
		var Id_Ubic_Sec=$.trim($("#cmbubicacionsec").val());
		var Id_Motivo_Salida=$.trim($("#cmbmotivosalida").val());
		var Id_Usr_Quien_Autoriza=$.trim($("#cmb_autoriza").val());
		var Empresa_Recibe=$.trim($("#Empresa_que_recibe").val());
		var Nombre_Contacto=$.trim($("#Nombre_completo_contacto").val());
		var Telefono_Contacto=$.trim($("#Telefono").val());
		var Mail_Contacto=$.trim($("#Correo").val());
		var Tipo_Solicitud=$("#hdd_tipo_solicitud").val();
		var Observaciones=$.trim($("#Observaciones").val());
		var Url_Adjuntos=$.trim($("#Url_Adjuntos").val());
		
		if(Id_Ubic_Prim=="-1"||Id_Ubic_Prim==""){
			Agregar = false; 
			mensaje_error += " -Selecciona la Ubicación Primaria<br/>";	
		}
		
		if(Id_Ubic_Sec=="-1"||Id_Ubic_Sec==""){
			Agregar = false; 
			mensaje_error += " -Selecciona la Ubicación Secundaria<br/>";	
		}
		
		if(Id_Motivo_Salida=="-1"||Id_Motivo_Salida==""){
			Agregar = false; 
			mensaje_error += " -Selecciona el Motivo de la Salida<br/>";	
		}
		
		if(Id_Usr_Quien_Autoriza==""){
			Agregar = false; 
			mensaje_error += " -Selecciona quien Autoriza la Salida<br/>";	
		}
		
		if(Empresa_Recibe.length <= 0){
			Agregar = false; 
			mensaje_error += " -Agrega la Empresa que Recibe<br />";
		}
		
		if(Nombre_Contacto.length <= 0){
			Agregar = false; 
			mensaje_error += " -Agrega el Contacto que Recibe<br />";
		}
	
		if(Mail_Contacto.length <= 0){
			Agregar = false; 
			mensaje_error += " -Agrega el Mail del Contacto<br />";
		}
		
		if(Observaciones.length <= 0){
			Agregar = false; 
			mensaje_error += " -Agrega las Observaciones<br />";
		}
		
		//if(Url_Adjuntos.length <= 0){
		//	Agregar = false; 
		//	mensaje_error += " -Adjunta por lo menos una Imagen<br />";
		//}
	
		var array_padre=[]; var array_det=[]; var valida_Campos=0;
		if(Tipo_Solicitud==1||Tipo_Solicitud==3){
			for(var i=0; i<Contador_Det; i++){
				if ( $("#hdd_id_solicitud_"+i).length > 0) {
					array_det=[];
					array_det[0]=$.trim($("#hdd_id_solicitud_"+i).val());
					array_det[1]=$.trim($("#Cantidad_"+i).val());
					array_det[2]=$.trim($("#Unidad_"+i).val());
					array_det[3]=$.trim($("#Marca_"+i).val());
					array_det[4]=$.trim($("#Modelo_"+i).val());
					array_det[5]=$.trim($("#Nombre_Act_"+i).val());
					array_det[6]=$.trim($("#No_solic_"+i).val());
					array_det[7]=$.trim($("#No_serie_"+i).val());
					array_padre[i]=array_det;
					if($.trim($("#Cantidad_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#Marca_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#Modelo_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#Nombre_Act_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#No_serie_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
				}
		  }
			
			if(valida_Campos==1){
				mensaje_error += " -Verifica los campos obligatorios de la tabla<br />";
			}
		}
		
		if(Tipo_Solicitud==2){
			for(var i=0; i<Contador_Det; i++){
				if ( $("#hdd_id_solicitud_"+i).length > 0) {
					array_det=[];
					array_det[0]=$.trim($("#hdd_id_solicitud_"+i).val());
					array_det[1]=$.trim($("#Cantidad_"+i).val());
					array_det[2]=$.trim($("#Unidad_"+i).val());
					array_det[3]=$.trim($("#Marca_"+i).val());
					array_det[4]=$.trim($("#Modelo_"+i).val());
					array_det[5]=$.trim($("#Nombre_Act_"+i).val());
					array_det[6]=$.trim($("#No_solic_"+i).val());
					array_det[7]=$.trim($("#No_serie_"+i).val());
					array_padre[i]=array_det;
					if($.trim($("#Cantidad_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#Marca_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#Modelo_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#Nombre_Act_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#No_serie_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
				}
		  }
			
			if(valida_Campos==1){
				mensaje_error += " -Verifica los campos obligatorios de la tabla<br />";
			}
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		
		if(Agregar){
			if (signaturePad.isEmpty()) {
				mensajesalerta("Informaci&oacute;n", "Agrega la firma", "", "dark");
			} else {
				var dataURL = signaturePad.toDataURL();
				if(dataURL!="data:,"){
					
					if(Id_Nota_Salida==""){
						
						//Guardar
						var array_datos={
							Id_Ubic_Prim:Id_Ubic_Prim,
							Id_Ubic_Sec:Id_Ubic_Sec,
							Id_Motivo_Salida:Id_Motivo_Salida,
							Id_Usr_Quien_Autoriza:Id_Usr_Quien_Autoriza,
							Empresa_Recibe:Empresa_Recibe,
							Nombre_Contacto:Nombre_Contacto,
							Telefono_Contacto:Telefono_Contacto,
							Mail_Contacto:Mail_Contacto,
							Observaciones:Observaciones,
							Url_Adjuntos:Url_Adjuntos,
							Tipo_Solicitud:Tipo_Solicitud,
							Id_Usuario:$("#usuariosesion").val(),
							Id_Area:$("#idareasesion").val(),
							Array_Equ_Acc:array_padre,
							Firma_Digital: dataURL,
							Estatus_Proceso: 1,
							accion: "guardar_nota_salida"
						};
					}else{
						$.ajax({
							type: "POST",
							url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
							data: {
								Id_Nota_Salida:Id_Nota_Salida,
								Estatus_Proceso:$("#hdd_estatus_proceso").val(),
								Firma_Digital: dataURL,
								Tipo_Firma:$("#hdd_tipo_firma").val(),
								accion: "guardar_firma"
							},
							async: true,
							dataType: "html",
							beforeSend: function (objeto) {
								jsShowWindowLoad("Guardando, espere porfavor.");
							},
							success: function (datos) {
								var json = "";
								json = eval("(" + datos + ")"); //Parsear JSON
								if(json.totalCount>0){
									limpiar_campos();
									
									pasar_valores(json.Id_Nota_Salida);
									mensajesalerta("&Eacute;xito", "Se han guardado los datos correctamente", "success", "dark");
								}else{
									mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
								}
								jsRemoveWindowLoad();
							},
							error: function(XMLHttpRequest, textStatus, errorThrown){
								jsRemoveWindowLoad();
								alert('Error intentalo nuevamente.');
							}
						});
					}

				}else{
					mensajesalerta("Informaci&oacute;n", "Agrega la firma", "", "dark");
				}
			}
			
			
		}else{
			$("#li_tab_firma").removeClass("active");
			$("#li_tab_dat_generales").addClass("active");
			
			$("#Datos_Generales").addClass("active");
			$("#Firma").removeClass("active");	
		}
	});
	
	function pasar_valores(Id_Nota_Salida){
		
		if(Id_Nota_Salida!=""){
			limpiar_campos();
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					accion: "select_Nota_Salida",
					Id_Nota_Salida: Id_Nota_Salida 
				},
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
					
				},
				success: function (datos) {
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						descripcion_firma
						var Request_Uri="<?php echo $_SERVER["REQUEST_URI"];?>";
						Request_Uri = Request_Uri.split('/');
						if(Request_Uri[1]=="sigapruebas"||Request_Uri[1]=="SIGAPRUEBAS"){
							$("#vista_preliminar").html('<br><a target="_blank" href="https://apps2.hospitalsatelite.com:8080/SIGAPRUEBAS/controladores/activos/siga_activos/Nota_Salida.php?key='+Id_Nota_Salida+'&ver=1"  class="btn btn-success">Vista Preliminar</a>');
						}
						if(Request_Uri[1]=="siga"||Request_Uri[1]=="SIGA"){
							//$("#vista_preliminar").html('<br><a target="_blank" href="http://siga.hospitalsatelite.com/SIGA/controladores/activos/siga_activos/Nota_Salida.php?key='+Id_Nota_Salida+'&ver=1"  class="btn btn-success">Vista Preliminar</a>');
							$("#vista_preliminar").html('<br><a target="_blank" href="https://apps2.hospitalsatelite.com/SIGA/controladores/activos/siga_activos/Nota_Salida.php?key='+Id_Nota_Salida+'&ver=1"  class="btn btn-success">Vista Preliminar</a>');
						}
						
						$("#li_tab_dat_generales").removeClass("active");
						$("#Datos_Generales").removeClass("active");
						
						$("#li_tab_adjuntos").removeClass("active");
						$("#Adjuntos").removeClass("active");
						
						$("#li_tab_firma").removeClass("active");
						$("#Firma").removeClass("active");
						
						$("#li_tab_finalizar").removeClass("active");
						$("#Finalizar").removeClass("active");
						
						$("#li_tab_firma").show();
						$("#li_tab_adjuntos").show();
						$("#li_tab_finalizar").show();
						
						$("#descripcion_firma").html("");
						$("#btn_guardar_firma").show();
						$("#limpiar_firma").show();

						
						$("#hdd_id_nota_salida").val(json.data[0].Id_Nota_Salida);
						$("#hdd_tipo_solicitud").val(json.data[0].Tipo_Solicitud);
						$("#cmbubicacionprim").val(json.data[0].Id_Ubic_Prim);
						ubic_sec(json.data[0].Id_Ubic_Prim);
						$("#cmbubicacionsec").val(json.data[0].Id_Ubic_Sec);
						$("#cmbmotivosalida").val(json.data[0].Id_Motivo_Salida);
						$("#Empresa_que_recibe").val(json.data[0].Empresa_Recibe);
						$("#Nombre_completo_contacto").val(json.data[0].Nombre_Contacto);
						$("#Telefono").val(json.data[0].Telefono_Contacto);
						$("#Correo").val(json.data[0].Mail_Contacto);
						$("#Observaciones").val(json.data[0].Observaciones);
						$("#hdd_duplicado").val(json.data[0].Nota_Duplicada);
						var $select3 = $('#cmb_autoriza').selectize({});	
						var control3 = $select3[0].selectize;
						control3.addItem(json.data[0].Id_Usr_Quien_Autoriza);
						
						
						
						
						if(json.data[0].Url_Adjuntos!=null){
							if(json.data[0].Url_Adjuntos.length>0){
								$("#Url_Adjuntos").val(json.data[0].Url_Adjuntos);
								if($('#Url_Adjuntos').val()!=""){
									var Foto_Activo = $('#Url_Adjuntos').val().indexOf("---");
									
									if(Foto_Activo!=-1){
										var result=$('#Url_Adjuntos').val().split('---');
										
										mostrar_archivos_lista($('#Url_Adjuntos').val(), "divFoto_lista", "../Archivos/Archivos-Nota-Salida", "si", "Url_Adjuntos", "");
										
									}else{
										mostrar_archivos_lista($('#Url_Adjuntos').val(), "divFoto_lista", "../Archivos/Archivos-Nota-Salida", "no", "Url_Adjuntos", "");
									}
								}
							}
						}
						if(json.data[0].Firma_Quien_Recibe==""){$("#hdd_tipo_firma").val(3); $("#btn_recibe").show(); $("#descripcion_firma").html("<strong>QUIEN RECIBE:</strong> "+json.data[0].Nombre_Contacto);}
						if(json.data[0].Firma_Quien_Autoriza==""){$("#hdd_tipo_firma").val(2); $("#btn_autoriza").show(); $("#descripcion_firma").html("<strong>AUTORIZADO POR:</strong> "+json.data[0].Nombre_Quien_Autoriza);}
						if(json.data[0].Firma_Realiza_Nota==""){$("#hdd_tipo_firma").val(1); $("#btn_realiza").show(); $("#descripcion_firma").html("<strong>REALIZADO POR:</strong> "+json.data[0].Nombre_Realiza_Nota);}
						
						var cont=1;
						if(json.data[0].Firma_Quien_Recibe!=""){ cont=cont+1;$("#btn_recibe").hide(); }
						if(json.data[0].Firma_Quien_Autoriza!=""){cont=cont+1;$("#btn_autoriza").hide(); }
						if(json.data[0].Firma_Realiza_Nota!=""){ cont=cont+1;$("#btn_realiza").hide(); }
						
						$("#hdd_estatus_proceso").val(cont);
						
						
						
						
						//if(json.data[0].Estatus_Proceso==2){
						//	$("#btn_guardar_firma").html("Guardar y Enviar");
						//	$("#descripcion_firma").html("<strong>QUIEN RECIBE:</strong> "+json.data[0].Nombre_Contacto);
						//}
						
						if(json.data[0].Estatus_Proceso==null){
							$("#li_tab_firma").addClass("active");
							$("#Firma").addClass("active");
						}else{
							if(json.data[0].Estatus_Proceso==1){
								$("#li_tab_firma").addClass("active");
								$("#Firma").addClass("active");
								//notas_en_proceso();
							}else{
								if(json.data[0].Estatus_Proceso==2){
									$("#li_tab_firma").addClass("active");
									$("#Firma").addClass("active");
									//notas_en_proceso();
								}else{
									if(json.data[0].Estatus_Proceso==3){
										//notas_en_proceso();
										
										$("#descripcion_firma").html("Ya se encuentra firmado por todos los usuarios.");
										$("#btn_guardar_firma").hide();
										$("#limpiar_firma").hide();
										
										if(json.data[0].Url_Adjuntos!=null && json.data[0].Url_Adjuntos!='' && json.data[0].Estatus_Proceso==3){
											$("#li_tab_finalizar").addClass("active");
											$("#Finalizar").addClass("active");
											mensajesalerta("&Eacute;xito", "Para terminar Presione el botón Finalizar.", "success", "dark");
											$("#div_msj_finalizar").html('<label>Para terminar Presione el botón de arriba "Finalizar".</label>');
										}else{
											if(json.data[0].Url_Adjuntos==''){
												$("#li_tab_adjuntos").addClass("active");
												$("#Adjuntos").addClass("active");
											}
										}						
									}else{
										if(json.data[0].Estatus_Proceso==4){
											$("#cerrar_popup").click();
											notas_en_proceso();
											limpiar_campos();
											mensajesalerta("&Eacute;xito", "Se ha enviado la nota de salida a seguridad", "success", "dark");
											$("#btn_guardar_firma").html("Guardar");
										}else{
											if(json.data[0].Url_Adjuntos==''){
												$("#li_tab_adjuntos").addClass("active");
												$("#Adjuntos").addClass("active");
											}
										}
									}
								}
							}
						}
						
						
						
						
						if(json.data[0].total_accesorios>0){
							var tabla=""; var clonarfila="";
							if(json.data[0].Tipo_Solicitud==1||json.data[0].Tipo_Solicitud==3){
								//tabla+='  <br><br><div class="table-responsive">';
								//tabla+='	<table id="display_busqueda_activos_gtiqx" class="table table-bordered table-striped table-chs" width="100%">';
								//tabla+='		<thead>';
								//tabla+='		<tr>';
								//tabla+='			<th width="5%"><span><font color="red">*</font></span>Cantidad</th>';
								//tabla+='			<th width="5%">Unidad</th>';
								//tabla+='			<th width="20%"><span><font color="red">*</font></span>Marca</th>';
								//tabla+='			<th width="20%"><span><font color="red">*</font></span>Modelo</th>';
								//tabla+='			<th width="30%"><span><font color="red">*</font></span>Descripción</th>';
								//tabla+='			<th width="10%">AF/BC</th>';
								//tabla+='			<th width="10%"><span><font color="red">*</font></span>No. Serie</th>';
								//tabla+='		</tr>';
								//tabla+='		</thead>';
								//tabla+='		<tbody>';	
								
								for(var i=0; i<json.data[0].total_accesorios; i++){
									//tabla+='		<tr>';
									//tabla+='			<td><input type="hidden" id="hdd_id_accesorio_'+Contador_Det+'"  value="'+json.data[0].Det_Accesorios[i].Id_Accesorio_DNS+'"> <input type="hidden" id="hdd_id_solicitud_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Id_Solicitud_DNS+'">  <input type="text" class="form-control input-number" id="Cantidad_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Cantidad_DNS+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Unidad_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Unidad_DNS+'" readonly></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Marca_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Marca_DNS+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Modelo_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Modelo_DNS+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Nombre_Act_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Descripcion_DNS+'"></td>';
									//tabla+='			<td><input  class="form-control" id="No_solic_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Id_Solicitud_DNS+'" readonly></td>';
									//tabla+='			<td><input type="text" class="form-control" id="No_serie_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].No_Serie_DNS+'"></td>';
									//tabla+='		</tr>';
									//Contador_Det=Contador_Det+1;
									
									clonarfila+='<tr id="tr_acc_act_ext_'+Contador_Det+'">';
									clonarfila+='	<td>';
									clonarfila+='				<input type="hidden" id="hdd_id_accesorio_'+Contador_Det+'"  value="'+json.data[0].Det_Accesorios[i].Id_Accesorio_DNS+'">';
									clonarfila+='				<input type="hidden" id="hdd_id_solicitud_'+Contador_Det+'"  value="'+json.data[0].Det_Accesorios[i].Id_Solicitud_DNS+'"> <input type="text" class="form-control input-number revision_check_list_act_ext" id="Cantidad_'+Contador_Det+'"  value="'+json.data[0].Det_Accesorios[i].Cantidad_DNS+'">';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<select class="form-control revision_check_list_act_ext" id="Unidad_'+Contador_Det+'">';
									
									if(json.data[0].Det_Accesorios[i].Unidad_DNS=="EQU"){clonarfila+='<option value="EQU" selected>EQU</option>';}else{clonarfila+='<option value="EQU" >EQU</option>';}
									if(json.data[0].Det_Accesorios[i].Unidad_DNS=="ACC"){clonarfila+='<option value="ACC" selected>ACC</option>';}else{clonarfila+='<option value="ACC" >ACC</option>';}
									if(json.data[0].Det_Accesorios[i].Unidad_DNS=="CONS"){clonarfila+='<option value="CONS" selected>CONS</option>';}else{clonarfila+='<option value="CONS" >CONS</option>';}
									if(json.data[0].Det_Accesorios[i].Unidad_DNS=="REF"){clonarfila+='<option value="REF" selected>REF</option>';}else{clonarfila+='<option value="REF" >REF</option>';}
									if(json.data[0].Det_Accesorios[i].Unidad_DNS=="PZA"){clonarfila+='<option value="PZA" selected>PZA</option>';}else{clonarfila+='<option value="PZA" >PZA</option>';}
									if(json.data[0].Det_Accesorios[i].Unidad_DNS=="CJA"){clonarfila+='<option value="CJA" selected>CJA</option>';}else{clonarfila+='<option value="CJA" >CJA</option>';}
									if(json.data[0].Det_Accesorios[i].Unidad_DNS=="KIT"){clonarfila+='<option value="KIT" selected>KIT</option>';}else{clonarfila+='<option value="KIT" >KIT</option>';}
									clonarfila+='				</select>';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Marca_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Marca_DNS+'" placeholder="Marca" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Modelo_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Modelo_DNS+'" placeholder="Modelo" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Nombre_Act_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Descripcion_DNS+'" placeholder="Nombre" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_solic_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Id_Solicitud_DNS+'" disabled>';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_serie_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].No_Serie_DNS+'" placeholder="No. Serie" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<button type="button" name="eliminarfila[]" id="eliminarfila" class="btn btn-danger eliminalinea" onclick="elimina_acc_ext('+Contador_Det+')">Eliminar</button>';
									clonarfila+='	</td>';
									clonarfila+='</tr>';
									Contador_Det=Contador_Det+1;
								}
								//tabla+='		</tbody>';
								//tabla+='	</table>';
								//tabla+='	</div>';
								//tabla+='	<br><br>';
								//$("#tabla_activos_nota").html(tabla);
								$("#tbl_accesorios_act_ext tbody").append(clonarfila);
								$('.input-number').on('input', function () {
									this.value = this.value.replace(/[^0-9]/g,'');
								});
							}
							
							if(json.data[0].Tipo_Solicitud==2){
								//tabla+='  <br><br><div class="table-responsive">';
								//tabla+='	<table id="display_busqueda_activos" class="table table-bordered table-striped table-chs" width="100%">';
								//tabla+='		<thead>';
								//tabla+='		<tr>';
								//tabla+='			<th width="5%"><span><font color="red">*</font></span>Cantidad</th>';
								//tabla+='			<th width="5%">Unidad</th>';
								//tabla+='			<th width="20%"><span><font color="red">*</font></span>Marca</th>';
								//tabla+='			<th width="20%"><span><font color="red">*</font></span>Modelo</th>';
								//tabla+='			<th width="30%"><span><font color="red">*</font></span>Descripción</th>';
								//tabla+='			<th width="10%">No. Solicitud</th>';
								//tabla+='			<th width="10%"><span><font color="red">*</font></span>No. Serie</th>';
								//tabla+='		</tr>';
								//tabla+='		</thead>';
								//tabla+='		<tbody>';	
								
								for(var i=0; i<json.data[0].total_accesorios; i++){
									//tabla+='		<tr>';
									//tabla+='			<td><input type="hidden" id="hdd_id_accesorio_'+Contador_Det+'"  value="'+json.data[0].Det_Accesorios[i].Id_Accesorio_DNS+'">  <input type="hidden" id="hdd_id_activo_'+Contador_Det+'"  value="'+json.data[0].Det_Accesorios[i].Id_Activo_DNS+'">  <input type="text"  class="form-control input-number" id="Cantidad_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Cantidad_DNS+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Unidad_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Unidad_DNS+'" readonly></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Marca_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Marca_DNS+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Modelo_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Modelo_DNS+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="Nombre_Act_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Descripcion_DNS+'"></td>';
									//tabla+='			<td><input  class="form-control" id="AF_BC_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].AF_BC_DNS+'"></td>';
									//tabla+='			<td><input type="text" class="form-control" id="No_serie_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].No_Serie_DNS+'"></td>';
									//tabla+='		</tr>';
									//Contador_Det=Contador_Det+1;
									
									clonarfila+='<tr id="tr_acc_act_ext_'+Contador_Det+'">';
									clonarfila+='	<td>';
									clonarfila+='				<input type="hidden" id="hdd_id_accesorio_'+Contador_Det+'"  value="'+json.data[0].Det_Accesorios[i].Id_Accesorio_DNS+'">';
									clonarfila+='				<input type="hidden" id="hdd_id_solicitud_'+Contador_Det+'"  value="'+json.data[0].Det_Accesorios[i].Id_Activo_DNS+'"> <input type="text" class="form-control input-number revision_check_list_act_ext" id="Cantidad_'+Contador_Det+'"  value="'+json.data[0].Det_Accesorios[i].Cantidad_DNS+'">';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<select class="form-control revision_check_list_act_ext" id="Unidad_'+Contador_Det+'">';
									if(json.data[0].Det_Accesorios[i].Unidad_DNS=="EQU"){clonarfila+='<option value="EQU" selected>EQU</option>';}else{clonarfila+='<option value="EQU" >EQU</option>';}
									if(json.data[0].Det_Accesorios[i].Unidad_DNS=="ACC"){clonarfila+='<option value="ACC" selected>ACC</option>';}else{clonarfila+='<option value="ACC" >ACC</option>';}
									if(json.data[0].Det_Accesorios[i].Unidad_DNS=="CONS"){clonarfila+='<option value="CONS" selected>CONS</option>';}else{clonarfila+='<option value="CONS" >CONS</option>';}
									if(json.data[0].Det_Accesorios[i].Unidad_DNS=="REF"){clonarfila+='<option value="REF" selected>REF</option>';}else{clonarfila+='<option value="REF" >REF</option>';}
									if(json.data[0].Det_Accesorios[i].Unidad_DNS=="PZA"){clonarfila+='<option value="PZA" selected>PZA</option>';}else{clonarfila+='<option value="PZA" >PZA</option>';}
									if(json.data[0].Det_Accesorios[i].Unidad_DNS=="CJA"){clonarfila+='<option value="CJA" selected>CJA</option>';}else{clonarfila+='<option value="CJA" >CJA</option>';}
									if(json.data[0].Det_Accesorios[i].Unidad_DNS=="KIT"){clonarfila+='<option value="KIT" selected>KIT</option>';}else{clonarfila+='<option value="KIT" >KIT</option>';}
									clonarfila+='				</select>';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Marca_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Marca_DNS+'" placeholder="Marca" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Modelo_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Modelo_DNS+'" placeholder="Modelo" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Nombre_Act_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].Descripcion_DNS+'" placeholder="Nombre" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_solic_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].AF_BC_DNS+'" disabled>';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_serie_'+Contador_Det+'" value="'+json.data[0].Det_Accesorios[i].No_Serie_DNS+'" placeholder="No. Serie" >';
									clonarfila+='	</td>';
									clonarfila+='	<td>';
									clonarfila+='				<button type="button" name="eliminarfila[]" id="eliminarfila" class="btn btn-danger eliminalinea" onclick="elimina_acc_ext('+Contador_Det+')">Eliminar</button>';
									clonarfila+='	</td>';
									clonarfila+='</tr>';
									Contador_Det=Contador_Det+1;
									
								}
								//tabla+='		</tbody>';
								//tabla+='	</table>';
								//tabla+='	</div>';
								//tabla+='	<br><br>';
								//$("#tabla_activos_nota").html(tabla);
								$("#tbl_accesorios_act_ext tbody").append(clonarfila);
								$('.input-number').on('input', function () {
									this.value = this.value.replace(/[^0-9]/g,'');
								});
							}
						}
					}else{
					
					}
				}
			});
		}
	}
	
	firma_digital=function (num){
		var Id_Nota_Salida=$("#hdd_id_nota_salida").val();
		if(Id_Nota_Salida!=""){
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					accion: "select_Nota_Salida",
					Id_Nota_Salida: Id_Nota_Salida 
				},
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
					
				},
				success: function (datos) {
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						if(json.data[0].Firma_Quien_Recibe!="" && num==3){$("#hdd_tipo_firma").val(num);}
						if(json.data[0].Firma_Quien_Autoriza!=""&&num==2){$("#hdd_tipo_firma").val(num);}
						if(json.data[0].Firma_Realiza_Nota!="" && num==1){$("#hdd_tipo_firma").val(num);}
						
						if(json.data[0].Firma_Quien_Recibe=="" && num==3){$("#hdd_tipo_firma").val(num);$("#descripcion_firma").html("<strong>QUIEN RECIBE:</strong> "+json.data[0].Nombre_Contacto);}
						if(json.data[0].Firma_Quien_Autoriza==""&& num==2){$("#hdd_tipo_firma").val(num);$("#descripcion_firma").html("<strong>AUTORIZADO POR:</strong> "+json.data[0].Nombre_Quien_Autoriza);}
						if(json.data[0].Firma_Realiza_Nota=="" && num==1){$("#hdd_tipo_firma").val(num);$("#descripcion_firma").html("<strong>REALIZADO POR:</strong> "+json.data[0].Nombre_Realiza_Nota);}
						
						//Limpia Firma
						$("#limpiar_firma").click();
						//if(json.data[0].Firma_Quien_Recibe==""){$("#div_firma").show();$("#descripcion_firma").html("<strong>QUIEN RECIBE:</strong> "+json.data[0].Nombre_Contacto);}
						//if(json.data[0].Firma_Quien_Autoriza==""){$("#div_firma").show();$("#descripcion_firma").html("<strong>AUTORIZADO POR:</strong> "+json.data[0].Nombre_Quien_Autoriza);}
						//if(json.data[0].Firma_Realiza_Nota==""){$("#div_firma").show();$("#descripcion_firma").html("<strong>REALIZADO POR:</strong> "+json.data[0].Nombre_Realiza_Nota);}
						//
						//if(json.data[0].Firma_Quien_Recibe!=""){$("#btn_recibe").removeAttr("class","btn btn-danger"); $("#btn_recibe").attr("class","btn btn-success");}
						//if(json.data[0].Firma_Quien_Autoriza!=""){$("#btn_autoriza").removeAttr("class","btn btn-danger"); $("#btn_autoriza").attr("class","btn btn-success");}
						//if(json.data[0].Firma_Realiza_Nota!=""){$("#btn_realiza").removeAttr("class","btn btn-danger"); $("#btn_realiza").attr("class","btn btn-success");}
					}else{
					
					}
				}
			});
		}
	}
	
	function Img_Activo(){
		var Adjuntos="";
		Adjuntos='<label for="attach-1" class="control-label" id="documentos_adjuntos_FILELabel" style="font-size: 11px;">Adjuntar Imagenes (.png, .jpg)</label>';			  
        Adjuntos+='<input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
		Adjuntos+='<input type="hidden" id="Url_Adjuntos">';
		
		$("#divFoto").html(Adjuntos);
		$("#divFoto_lista").html("");
		carga_imagenes_multiple("documentos_adjuntos_FILE", "divFoto", "divFoto_lista","Url_Adjuntos","../Archivos/Archivos-Nota-Salida",false,true,"", "Adjuntar Imagenes  (.png, .jpg)");
  }
	
	finalizar_nota=function(){
		var Agregar = true;
		var mensaje_error = "";
		
		var Id_Nota_Salida=$("#hdd_id_nota_salida").val();
		var Id_Ubic_Prim=$.trim($("#cmbubicacionprim").val());
		var Id_Ubic_Sec=$.trim($("#cmbubicacionsec").val());
		var Id_Motivo_Salida=$.trim($("#cmbmotivosalida").val());
		var Id_Usr_Quien_Autoriza=$.trim($("#cmb_autoriza").val());
		var Empresa_Recibe=$.trim($("#Empresa_que_recibe").val());
		var Nombre_Contacto=$.trim($("#Nombre_completo_contacto").val());
		var Telefono_Contacto=$.trim($("#Telefono").val());
		var Mail_Contacto=$.trim($("#Correo").val());
		var Tipo_Solicitud=$("#hdd_tipo_solicitud").val();
		var Observaciones=$.trim($("#Observaciones").val());
		var Url_Adjuntos=$.trim($("#Url_Adjuntos").val());
		var Estatus_proceso=$.trim($("#hdd_estatus_proceso").val());
		if(Id_Ubic_Prim=="-1"||Id_Ubic_Prim==""){
			Agregar = false; 
			mensaje_error += " -Selecciona la Ubicación Primaria<br/>";	
		}
		
		if(Id_Ubic_Sec=="-1"||Id_Ubic_Sec==""){
			Agregar = false; 
			mensaje_error += " -Selecciona la Ubicación Secundaria<br/>";	
		}
		
		if(Id_Motivo_Salida=="-1"||Id_Motivo_Salida==""){
			Agregar = false; 
			mensaje_error += " -Selecciona el Motivo de la Salida<br/>";	
		}
		
		if(Id_Usr_Quien_Autoriza==""){
			Agregar = false; 
			mensaje_error += " -Selecciona quien Autoriza la Salida<br/>";	
		}
		
		if(Empresa_Recibe.length <= 0){
			Agregar = false; 
			mensaje_error += " -Agrega la Empresa que Recibe<br />";
		}
		
		if(Nombre_Contacto.length <= 0){
			Agregar = false; 
			mensaje_error += " -Agrega el Contacto que Recibe<br />";
		}
	
		if(Mail_Contacto.length <= 0){
			Agregar = false; 
			mensaje_error += " -Agrega el Mail del Contacto<br />";
		}
		
		if(Observaciones.length <= 0){
			Agregar = false; 
			mensaje_error += " -Agrega las Observaciones<br />";
		}
		
		if(Url_Adjuntos.length <= 0){
			Agregar = false; 
			mensaje_error += " -Adjunta por lo menos una Imagen<br />";
		}
		
		if(Estatus_proceso!="4"){
			Agregar = false; 
			mensaje_error += " -Verifica las firmas<br />";
		}
	
		var array_padre=[]; var array_det=[]; var valida_Campos=0;
		if(Tipo_Solicitud==1||Tipo_Solicitud==3){
			for(var i=0; i<Contador_Det; i++){
				if ( $("#hdd_id_solicitud_"+i).length > 0) {
					array_det=[];
					array_det[0]=$.trim($("#hdd_id_solicitud_"+i).val());
					array_det[1]=$.trim($("#Cantidad_"+i).val());
					array_det[2]=$.trim($("#Unidad_"+i).val());
					array_det[3]=$.trim($("#Marca_"+i).val());
					array_det[4]=$.trim($("#Modelo_"+i).val());
					array_det[5]=$.trim($("#Nombre_Act_"+i).val());
					array_det[6]=$.trim($("#No_solic_"+i).val());
					array_det[7]=$.trim($("#No_serie_"+i).val());
					array_padre[i]=array_det;
					if($.trim($("#Cantidad_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#Marca_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#Modelo_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#Nombre_Act_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#No_serie_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
				}
		  }
			
			if(valida_Campos==1){
				mensaje_error += " -Verifica los campos obligatorios de la tabla<br />";
			}
		}
		
		if(Tipo_Solicitud==2){
			for(var i=0; i<Contador_Det; i++){
				if ( $("#hdd_id_solicitud_"+i).length > 0) {
					array_det=[];
					array_det[0]=$.trim($("#hdd_id_solicitud_"+i).val());
					array_det[1]=$.trim($("#Cantidad_"+i).val());
					array_det[2]=$.trim($("#Unidad_"+i).val());
					array_det[3]=$.trim($("#Marca_"+i).val());
					array_det[4]=$.trim($("#Modelo_"+i).val());
					array_det[5]=$.trim($("#Nombre_Act_"+i).val());
					array_det[6]=$.trim($("#No_solic_"+i).val());
					array_det[7]=$.trim($("#No_serie_"+i).val());
					array_padre[i]=array_det;
					if($.trim($("#Cantidad_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#Marca_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#Modelo_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#Nombre_Act_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
					
					if($.trim($("#No_serie_"+i).val())==""){
						valida_Campos=1;
						Agregar=false;
					}
				}
		  }
			
			if(valida_Campos==1){
				mensaje_error += " -Verifica los campos obligatorios de la tabla<br />";
			}
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		if(Agregar){
			if($("#hdd_estatus_proceso").val()==4){
				var html_pre_reg="";
				//html_pre_reg+='<!DOCTYPE html>';
				//html_pre_reg+='<html>';
				//html_pre_reg+='<head>';
				//html_pre_reg+='	<meta charset="utf-8">';
				//html_pre_reg+='	<meta http-equiv="X-UA-Compatible" content="IE=edge">';
				//html_pre_reg+='<head>';
				html_pre_reg+='<style type="text/css">';
				html_pre_reg+='	#tbl';
				html_pre_reg+='	{';
				html_pre_reg+='		border-collapse: collapse; ';
				html_pre_reg+='		border-spacing: 0; ';
				html_pre_reg+='		background-color: transparent;'; 
				html_pre_reg+='		margin-bottom: 20px; ';
				html_pre_reg+='		max-width: 100%; ';
				html_pre_reg+='		width: 100%;';
				html_pre_reg+='	}';
				html_pre_reg+='	.text-center';
				html_pre_reg+='	{';
				html_pre_reg+='		text-align: center;';
				html_pre_reg+='	}';
				html_pre_reg+='	body { font-family: Source Sans Pro,Helvetica Neue,Helvetica,Arial,sans-serif; font-weight: 400; overflow-x: hidden; overflow-y: auto; }';
				html_pre_reg+='	#pdf_1 #tbl .thead #tr .td{';
				html_pre_reg+='		text-align:center;';
				html_pre_reg+='		background:#19294a;';
				html_pre_reg+='		color:#fff;';
				html_pre_reg+='		font-family: Arial;';
				html_pre_reg+='	}';
				html_pre_reg+='	#pdf_1 #tbl .tbody #tr .td{';
				html_pre_reg+='		border:1px solid #ccc;';
				html_pre_reg+='		font-size:12px;';
				html_pre_reg+='		background:#848382;';
				html_pre_reg+='		padding: 3px;';
				html_pre_reg+='		color:#fff; font-family: Arial;';
				html_pre_reg+='		font-family: Arial;';
				html_pre_reg+='	}';
				html_pre_reg+='	#pdf_1 #tbl .tbody #tr .td_r{';
				html_pre_reg+='		border:1px solid #ccc;';
				html_pre_reg+='		font-size:12px;';
				html_pre_reg+='		padding: 3px;';
				html_pre_reg+='		font-family: Arial;';
				html_pre_reg+='	}';
				html_pre_reg+='	#pdf_1 #tbl .tbody #tr.photo{';
				html_pre_reg+='		background:#f4f4f4;';
				html_pre_reg+='		color:#666;';
				html_pre_reg+='		text-align:center;';
				html_pre_reg+='	}';
				html_pre_reg+='	#pdf_1 #tbl .tbody tr.adjuntos td{';
				html_pre_reg+='		padding:1em 0;';
				html_pre_reg+='	}';
				html_pre_reg+='	#pdf_1 #tbl .tbody tr td.check img{';
				html_pre_reg+='		width:15px;';
				html_pre_reg+='		height:15px;';
				html_pre_reg+='		margin:0 auto;';
				html_pre_reg+='		display:block;';
				html_pre_reg+='	}';
				html_pre_reg+='	#pdf_1 #tbl .tbody #tr .sign{';
				html_pre_reg+='		vertical-align:top;';
				html_pre_reg+='		height:6em;';
				html_pre_reg+='		text-align:center;';
				html_pre_reg+='	}';
				html_pre_reg+='	#pdf_1 #tbl .tbody #tr .td .sign .comments{';
				html_pre_reg+='		text-align:left;';
				html_pre_reg+='	}';
				html_pre_reg+='	#pdf_1 #tbl .tbody #tr .td .author{';
				html_pre_reg+='		vertical-align:center;';
				html_pre_reg+='		text-align:center;';
				html_pre_reg+='	}';
				html_pre_reg+='	#pdf_1 #tbl .tbody #tr.faces .td{';
				html_pre_reg+='	}';
				html_pre_reg+='	#pdf_1 #tbl .tbody #tr.faces .td img{';
				html_pre_reg+='		margin:0 auto;';
				html_pre_reg+='		display:block;';
				html_pre_reg+='		width:40px;';
				html_pre_reg+='		vertical-align:middle;';
				html_pre_reg+='	}';
				html_pre_reg+=' .verticalText {';
				html_pre_reg+=' -webkit-transform: rotate(-90deg);';
				html_pre_reg+=' -moz-transform: rotate(-90deg);';
				html_pre_reg+=' }';
				html_pre_reg+='	</style>';
				html_pre_reg+='</head>';
				html_pre_reg+='<body><img style="width:155px;height:55px" width="120px" src="http://207.249.133.124/SIGA/dist/img/bannersiga.png"><br><br>';
				html_pre_reg+='	<div  id="pdf_1"> ';
			  html_pre_reg+='	  <table id="tbl">';
				html_pre_reg+='			<thead class="thead">';
				html_pre_reg+='				<tr id="tr">';
				html_pre_reg+='					<td colspan="4" class="td" style="border-top: 1px solid #ddd;padding: 0px;vertical-align: top;">DATOS DE LA SALIDA</td>';
				html_pre_reg+='				</tr>';
				html_pre_reg+='			</thead>';
				html_pre_reg+='			<tbody class="tbody">';
				html_pre_reg+='				<tr id="tr">';
				html_pre_reg+='					<td class="td"><strong>Motivo Salida: </strong></td>';
				html_pre_reg+='					<td class="td_r">||motivo_salida||</td>';
				html_pre_reg+='					<td class="td"><strong>Empresa: </strong></td>';
				html_pre_reg+='					<td class="td_r">||empresa||</td>';
				html_pre_reg+='				</tr>';
				html_pre_reg+='				<tr id="tr">';
				html_pre_reg+='					<td class="td"><strong>Realiza: </strong></td>';
				html_pre_reg+='					<td class="td_r">||realiza||</td>';
				html_pre_reg+='					<td class="td"><strong>Autoriza: </strong></td>';
				html_pre_reg+='					<td class="td_r">||autoriza||</td>';
				html_pre_reg+='				</tr>';
				html_pre_reg+='				<tr id="tr">';
				html_pre_reg+='					<td class="td"><strong>Comentarios: </strong></td>';
				html_pre_reg+='					<td class="td_r" colspan="3">||comentarios||</td>';
				html_pre_reg+='				</tr>';
				html_pre_reg+='			</tbody>';
				html_pre_reg+='		</table>';
				html_pre_reg+='		<br><br>';
				html_pre_reg+='		||tabla_detalle||';
				html_pre_reg+='		<br><br>';
				//html_pre_reg+='  <font face="arial" size="2.5">Hola se ha generado una nota de salida, favor de verificar el siguiente liga:</font><br><br>';
				
				var Request_Uri="<?php echo $_SERVER["REQUEST_URI"];?>";
				Request_Uri = Request_Uri.split('/');
				if(Request_Uri[1]=="sigapruebas"||Request_Uri[1]=="SIGAPRUEBAS"){
					html_pre_reg+='  <font face="arial" size="2.5"><a href="http://siga.hospitalsatelite.com:8080/SIGAPRUEBAS/controladores/activos/siga_activos/Nota_Salida.php?key='+Id_Nota_Salida+'">Click para descargar el archivo</a></font><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
				}
				if(Request_Uri[1]=="siga"||Request_Uri[1]=="SIGA"){
					//html_pre_reg+='  <font face="arial" size="2.5"><a href="http://siga.hospitalsatelite.com/SIGA/controladores/activos/siga_activos/Nota_Salida.php?key='+Id_Nota_Salida+'">Click para descargar el archivo</a></font><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
					html_pre_reg+='  <font face="arial" size="2.5"><a href="https://apps2.hospitalsatelite.com/SIGA/controladores/activos/siga_activos/Nota_Salida.php?key='+Id_Nota_Salida+'">Click para descargar el archivo</a></font><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
				}
				html_pre_reg+='  <font face="arial" size="2">*** Este es un envío automatizado, no es necesario responder este correo. </font><br><br><br>';
				html_pre_reg+='	</div>';
				//html_pre_reg+='</body>';
				//html_pre_reg+='</html>';
				
				$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
					data: {
						Id_Nota_Salida:Id_Nota_Salida,
						Estatus_Proceso:$("#hdd_estatus_proceso").val(),
						Empresa_Recibe:$("#Empresa_que_recibe").val(),
						Url_Adjuntos: Url_Adjuntos,
						Html_body: html_pre_reg,
						accion: "guardar_firma"
					},
					async: true,
					dataType: "html",
					beforeSend: function (objeto) {
						jsShowWindowLoad("Guardando, espere porfavor.");
					},
					success: function (datos) {
						var json = "";
						json = eval("(" + datos + ")"); //Parsear JSON
						if(json.totalCount>0){
							limpiar_campos();
							notas_en_proceso();
							historial_notas_salida();
							$("#Modal_Nota_Salida").modal("hide");
							$("#li_Activos_GTIQX").removeClass("Active");
							$("#li_Activos_Inventario").removeClass("Active");
							$("#li_Activos_EXTERNOS").removeClass("Active");
							$("#li_En_Proceso").removeClass("Active");
							$("#li_Historial_Notas_Salida").addClass("Active");

							$("#Activos_GTIQX").removeClass("Active");
							$("#Activos_Inventario").removeClass("Active");
							$("#Activos_EXTERNOS").removeClass("Active");
							$("#En_Proceso").removeClass("Active");
							$("#Historial_Notas_Salida").addClass("Active");
							
							
							alert("Se ha finalizado la nota de salida y se ha enviado a seguridad.");
						}else{
							mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
						}
						jsRemoveWindowLoad();
					}
				});
			}
		}
	}
	
	///////Agregar Accesorios
	$("#Agregar_Accesorios").click(function(){
		var clonarfila= "";
		clonarfila='<tr id="tr_acc_act_ext_'+Contador_Det+'">';
		clonarfila+='	<td width="40px">';
		clonarfila+='				<input type="hidden" class="form-control revision_check_list_act_ext" id="hdd_id_accesorio_'+Contador_Det+'" placeholder="Nombre" >';
		clonarfila+='				<input type="hidden" id="hdd_id_solicitud_'+Contador_Det+'"><input type="text" class="form-control input-number revision_check_list_act_ext" id="Cantidad_'+Contador_Det+'"  >';
		clonarfila+='	</td>';
		clonarfila+='	<td width="40px">';
		clonarfila+='				<select class="form-control revision_check_list_act_ext" id="Unidad_'+Contador_Det+'"><option value="EQU">EQU</option><option value="ACC">ACC</option><option value="CONS">CONS</option><option value="REF">REF</option><option value="PZA">PZA</option><option value="CJA">CJA</option><option value="KIT">KIT</option></select>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Marca_'+Contador_Det+'" placeholder="Marca" >';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Modelo_'+Contador_Det+'" placeholder="Modelo" >';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Nombre_Act_'+Contador_Det+'" placeholder="Nombre" >';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_solic_'+Contador_Det+'" disabled>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="No_serie_'+Contador_Det+'" placeholder="No. Serie" >';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='				<button type="button" name="eliminarfila[]" id="eliminarfila" class="btn btn-danger eliminalinea" onclick="elimina_acc_ext('+Contador_Det+')">Eliminar</button>';
		clonarfila+='	</td>';
		clonarfila+='</tr>';
		Contador_Det=Contador_Det+1;
		
		//var eliminar = document.getElementsByClassName("revision_check_list_act_ext");

		//if(eliminar.length==0){
			//$("#tbl_accesorios_act_ext tbody").append(copia);
		//}else{
			$("#tbl_accesorios_act_ext tbody").append(clonarfila);
			$('.input-number').on('input', function () {
					this.value = this.value.replace(/[^0-9]/g,'');
			});
		//}
		
		//var mat_utilizar = document.getElementsByClassName("fec_mat_label");
		
		//Limpiamos el campo fecha de inicia
		//mat_utilizar[(mat_utilizar.length-1)].value="";
		
		var revision_check_list_act_ext = document.getElementsByClassName("revision_check_list_act_ext");
		//Limpiamos los campos
		revision_check_list_act_ext[(revision_check_list_act_ext.length-1)].value="";
		
	});

	function elimina_acc_ext(num_fila){
		var id_eliminado=$("#hdd_id_accesorio_"+num_fila).val();
		$("#tr_acc_act_ext_"+num_fila).closest('tr').remove();
		if(id_eliminado!=""){
			array_eliminados_act_ext[cont_eliminados_act_ext]=id_eliminado;
			cont_eliminados_act_ext=cont_eliminados_act_ext+1;
		}
	}

	Pasar_val_cancelacion=function(Id_Solicitud){
		$("#hdd_Id_Solicitud").val(Id_Solicitud);
		$("#cancelacion_folio").html(Id_Solicitud);
	}
	
	duplicar_nota_salidaGTIQX=function(Id_Solicitud){
		var r = confirm("Esta seguro de duplicar esta nota de salida.");
		if (r == true) {
			Generar_Nota_Activos_GTIQX(1, Id_Solicitud);
		} else {
			
		}
	}
	
	duplicar_nota_salidaExternos=function(Id_Solicitud){
		var r = confirm("Esta seguro de duplicar esta nota de salida.");
		if (r == true) {
			Generar_Nota_Activos_Externos(3, Id_Solicitud);
		} else {
			
		}
	}
	
	Pasar_val_cancelacion_proceso=function(Id_Nota_Salida){
		$("#hdd_Id_Nota_Salida_Cancel").val(Id_Nota_Salida);
		$("#cancelacion_folio").html(Id_Nota_Salida);
	}
	
	limpiar_cerrar_cancelacion_nota=function(){
		$("#hdd_Id_Solicitud").val("");
		$("hdd_Id_Nota_Salida_Cancel").val("");
		$("#cancelacion_folio").html("");
		$("#Motivo_Cancelacion").val("");
	}
	
	$("#Url_Adjuntos").change(function(){
     alert(1);
	});
	
	
});

</script>