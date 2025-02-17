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
  <script src="../js/datepicker.css"></script>
  
	<!--Firma Digital-->
	<link rel="stylesheet" href="../Firma_Digital/docs/css/signature-pad.css">

  <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="../Firma_Digital/docs/css/ie9.css">
  <![endif]-->
	<!--Firma Digital-->
			
	<div class="row">
    <div class="col-md-12" align="center">
			<h2>Reclasificación de Ticket</h2>
      <hr class="separation-line">
    </div>
  </div>

  <div class="row">
		<ul class="nav nav-tabs azulf" role="tablist">
      <li role="presentation" id="li_Activos_EXTERNOS">
      	<a onclick="Activos_tickets_externos(3)" href="#Activos_EXTERNOS" aria-controls="Activos_EXTERNOS" role="tab" data-toggle="tab">Categoría - Subcategoría</a>
      </li>
		</ul>
  </div>
	<div class="row">
		<div class="tab-content">
		
			<div role="tabpanel" class="tab-pane" id="Activos_EXTERNOS">
				<!-- table-results -->
				<div class="col-md-12">
					<div class="box">
						<!-- /.box-header -->
						<div class="box-body">
							<div class="col-md-12" align="center">
								
								<div id="tabla_activos_externos" class="box-body"></div>
								<div id="gifcargando_tabla_externos" style="display:none" align="center">
									<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
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


	
	<div class="modal fade modalchs" data-backdrop="false" id="Modal_Edicion_ob">
		<div class="modal-dialog modal-lg">
			<input type="hidden" id="hdd_Id_Solicitud">
			<input type="hidden" id="hdd_Id_Nota_Salida_Cancel">
			<div class="modal-content">
			  <div class="modal-header azuldef">
				<button type="button" class="close"  data-dismiss="modal" aria-label="Close" onclick="limpiar_cerrar_edicion_nota()" id="limpiar_cerrar_edicion_nota">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Edición Nota de Salida con Folio: <label id="folio_a_editar"></label> </h4>
			  </div>

			  <div class="modal-body nopsides">
				<div class="col-md-12">
					<div class="form-group">

					<section id="datos_proveedor">
						<div class="row">
										<div class="col-md-8">            
											<div class="form-group">
												<span><font color="red">*</font></span>
												<label class="control-label" style="font-size: 12px;">Proveedor</label>	
					              <input  class="form-control" id="editar_proveedor" name="editar_proveedor" placeholder="Proveedor" required>
					              <span id="error_editar_proveedor"></span>
					            </div>
					          </div>
					 					<div class="col-md-4">
					            <div class="form-group">
												<span><font color="red">*</font></span>
												<label class="control-label" style="font-size: 12px;">Contacto</label>	
					              <input  class="form-control" id="editar_contacto" name="editar_contacto" placeholder="Contacto" required>
					              <span id="error_editar_contacto"></span>
					            </div>
					          </div>
					  </div> 
					  <div class="row">					         
					 					<div class="col-md-4">
					            <div class="form-group">
												<span><font color="red">*</font></span>
												<label class="control-label" style="font-size: 12px;">Teléfono</label>	
					              <input  class="form-control" id="editar_telefono" name="editar_telefono" placeholder="Teléfono" required>
					              <span id="error_editar_telefono"></span>
					            </div>
					          </div>
					          <div class="col-md-4">
					            <div class="form-group">
												<span><font color="red">*</font></span>
												<label class="control-label" style="font-size: 12px;">e-mail</label>	
					              <input  class="form-control" id="editar_email" name="editar_email" placeholder="e-mail" required>
					              <span id="error_editar_email"></span>
					            </div>
					          </div>
					   </div>
					</section>

					<section id="datos_comentarios" class="mx-auto">
										<div class="col-md-12">
					            <div class="form-group"><hr>
												<span><font color="red">*</font></span>
												<label class="control-label" style="font-size: 12px;">Observaciones Pre-Registro</label>
												<span id="editar_observaciones" name="editar_observaciones"></span>
					            </div>
					          </div>
										
										<div class="col-md-12" >
					            <div class="form-group">
												<span><font color="red">*</font></span>
												<label class="control-label" style="font-size: 12px;">Comentarios de la recepción del Equipo</label>
												<span id="editar_comentarios" name="editar_comentarios"></span>
					            </div>
					          </div>									
					</section>

					<section>
											</div>
										</div>
									<div class="tab-content">
										 <div class="modal-footer">
											<button type="button" id="botonCancelar" onclick="actualizar_la_nota_salida()" class="btn btn-success">Actualizar Nota</button>
										 </div>
									</div>	
					</section>


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


actualizar_la_nota_salida_material=function(){
	$("#error_editar_nombre_material").html('');
	$("#error_editar_marca_material").html('');
	$("#error_editar_serie_material").html('');
	$("#error_editar_cantidad_material").html('');
	$("#error_editar_modelo_del_material").html('');

	var editar_Id_Accesorio_Ext_material= $("#editar_Id_Accesorio_Ext_material").val();
	var editar_Id_Solicitud_Ext_material= $("#editar_Id_Solicitud_Ext_material").val();

	var editar_nombre_material	= $("#editar_nombre_material").val();
	var editar_marca_material		= $("#editar_marca_material").val();
	var editar_serie_material 	= $("#editar_serie_material").val();
	var editar_cantidad_material= $("#editar_cantidad_material").val();
	var editar_modelo_del_material= $("#editar_modelo_del_material").val();
	var validado=true;

	if(editar_nombre_material =="" ){
		$("#editar_nombre_material").focus();
		$("#error_editar_nombre_material").html('Campo Requerido');
		$("#error_editar_nombre_material").css({color:"red", fontSize: "12px"});
		validado=false;
	}

	else if(editar_marca_material ==""){
		$("#editar_marca_material").focus();
		$("#error_editar_marca_material").html('Marca: Campo Requerido');
		$("#error_editar_marca_material").css({color:"red", fontSize: "12px"});
		validado=false;
	}

	else if(editar_serie_material ==""){
		$("#editar_serie_material").focus();
		$("#error_editar_serie_material").html('Serie: Campo Requerido');
		$("#error_editar_serie_material").css({color:"red", fontSize: "12px"});
		validado=false;
	}

	else if(editar_modelo_del_material ==""){		
		$("#editar_modelo_del_material").focus();
		$("#error_editar_modelo_del_material").html('Modelo: Campo Requerido');
		$("#error_editar_modelo_del_material").css({color:"red", fontSize: "12px"});
		validado=false;
	}

	else if(editar_cantidad_material == "" || editar_cantidad_material <= 0){
		$("#editar_cantidad_material").focus();
		$("#error_editar_cantidad_material").html('Cantidad Requerida');
		$("#error_editar_cantidad_material").css({color:"red", fontSize: "12px"});
		validado=false;
	}

		if(validado){
			$.ajax({
				url: '../poo/nota_salida/ajax_datos_de_material_por_id_update.php',
				type: 'POST',
				dataType: 'JSON',
				data: {editar_Id_Accesorio_Ext_material: editar_Id_Accesorio_Ext_material,
							editar_nombre_material:editar_nombre_material,
							editar_marca_material:editar_marca_material,
							editar_serie_material:editar_serie_material,
							editar_modelo_del_material:editar_modelo_del_material,
							editar_cantidad_material:editar_cantidad_material
							},
				success: function(data){
					modal_datos_del_material(editar_Id_Accesorio_Ext_material);
					Pasar_val_edicion(editar_Id_Solicitud_Ext_material);
					$("#Modal_Edicion_ob").modal("show");
					$("#modal_datos_del_material").modal("hide");
				}
			});
		}

}

	//Array Activos
	var Contador_Det=0; var numfila=0;
	var array_accesorios_act_ext=[];
	var array_eliminados_act_ext=[]; var cont_eliminados_act_ext=0;
	var array_activos=[]; array_activos_gtiqx=[]; var array_activos_externos=[];
	var datatable_activos=""; var datatable_activos_gtiqx=""; var datatable_activos_externos="";


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
						//Este permiso solo lo tiene Joaquin de Biomédica, objetivo siga
						if($("#usuariosesion").val()==5){
							tabla+='			<th>Editar</th>';
						}
						//if(json.data[0].Gestor_Senior=="1"){
						//Este permiso solo lo tiene Joaquin de Biomédica, asi lo pidio

						if($("#usuariosesion").val()==5){
							tabla+='			<th>Cancelar</th>';
						}
						tabla+='			<th>Proveedor:::</th>';
						tabla+='			<th>Nombre Activo</th>';						
						tabla+='			<th>Marca</th>';
						tabla+='			<th>Modelo</th>';
						tabla+='			<th>No. Serie</th>';
						tabla+='			<th>Ubicaci&oacute;n Primaria</th>';
						tabla+='			<th>Ubicaci&oacute;n Secundaria</th>';
						tabla+='			<th>No. Ticket</th>';
						tabla+='			<th>Fch. Entrada</th>';
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
								// Objetivo Siga 
									tabla+='			<td align="center">';
									tabla+='				<a href="#" data-toggle="modal" data-target="#Modal_Edicion" onclick="Pasar_val_edicion('+json.data[i].Id_Solicitud+')">';
									tabla+='					<span><i class="fa fa-pencil" style="font-size:16px;color:blue" aria-hidden="true"></i></span>';
									tabla+='				</a>';
									tabla+='			</td>';
								}

								if($("#usuariosesion").val()==5){
								//if(json.data[i].Gestor_Senior=="1"){
									tabla+='			<td align="center">';
									tabla+='				<a href="#" data-toggle="modal" data-target="#Modal_Cancelacion" onclick="Pasar_val_cancelacion('+json.data[i].Id_Solicitud+')" title="Cancelar Ticket">';
									tabla+='					<span><i class="fa fa-trash" style="font-size:16px;color:red" aria-hidden="true"></i></span>';
									tabla+='				</a>';
									tabla+='			</td>';
								}
								tabla+='			<td >'+json.data[i].Empresa_Ext+'</td>';
								tabla+='			<td >'+json.data[i].Nombre_Act_Ext+'</td>';
								tabla+='			<td >'+json.data[i].Marca_Act_Ext+'</td>';
								tabla+='			<td >'+json.data[i].Modelo_Act_Ext+'</td>';
								tabla+='			<td >'+json.data[i].No_Serie_Act_Ext+'</td>';
								//tabla+='			<td >'+json.data[i].fechaCierre+'</td>';
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
								tabla+='			<td >'+json.data[i].Id_Solicitud+'</td>';
								tabla+='			<td >'+json.data[i].fechaCierre+'</td>';

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
	

modal_datos_del_material=function(Id_material){
		$("#modal_datos_del_material").modal("show");
		$("#Modal_Edicion_ob").modal("hide");

		$.ajax({
			url: '../poo/nota_salida/ajax_datos_de_material_por_id.php',
			type: 'POST',
			dataType: 'JSON',
			data: {Id_material:Id_material},
			success: function(data){
				$('#editar_nombre_material').val(data[0].Nombre_Ext);
				$('#editar_marca_material').val(data[0].Marca_Ext);
				$('#editar_serie_material').val(data[0].No_Serie_Ext);
				$('#editar_cantidad_material').val(data[0].Cantidad_Ext);
				$('#editar_modelo_del_material').val(data[0].Modelo_Ext);
				$('#editar_Id_Accesorio_Ext_material').val(data[0].Id_Accesorio_Ext);
				$('#editar_Id_Solicitud_Ext_material').val(data[0].Id_Solicitud_Ext);
				$("#editar_Id_Solicitud_Ext_material_tag").html(data[0].Id_Solicitud_Ext);
			}			
		});
}

Pasar_val_edicion=function(Id_Solicitud){
	$('#error_editar_proveedor').html('');
	$('#error_editar_contacto').html('');
	$('#error_editar_telefono').html('');
	$('#error_editar_email').html('');
	$('#error_editar_nombre_activo').html('');
	$('#error_editar_marca_activo').html('');
	$('#error_editar_modelo_activo').html('');
	$('#error_editar_serie_activo').html('');
	$('#error_editar_ubicacion_primaria').html('');
	$('#error_editar_ubicacion_secundaria').html('');

		$("#Modal_Edicion_ob").modal("show");
		$("#folio_a_editar").html(Id_Solicitud);

		$.ajax({ //ajax-01
			url: '../poo/nota_salida/ajax_datos_de_nota.php',
			type: 'POST',
			dataType: 'JSON',
			data: {Id_Solicitud:Id_Solicitud},
			success: function(data){ //ajax-01-success
				$('#editar_proveedor').val(data[0].Empresa_Ext);
				$('#editar_contacto').val(data[0].Nombre_Completo_Ext);
				$('#editar_telefono').val(data[0].Telefono_Ext);
				$('#editar_email').val(data[0].Correo_Ext);
				$('#editar_nombre_activo').val(data[0].Nombre_Act_Ext);
				$('#editar_marca_activo').val(data[0].Marca_Act_Ext);
				$('#editar_modelo_activo').val(data[0].Modelo_Act_Ext);
				$('#editar_serie_activo').val(data[0].No_Serie_Act_Ext);
				$('#editar_observaciones').val(data[0].Observ_Pre_Reg_Ext);
				$('#editar_comentarios').val(data[0].Comentarios_Recepcion);				

					$.ajax({
						url: '../poo/compartidos/ajax/ajax_ubicacion_primaria_id.php',
						type: 'POST',
						dataType: 'JSON',
						data: {Id_Ubic_Prim: data[0].Id_Ubic_Prim},
						success:function(data){
							$("#editar_ubicacion_primaria").html(data);

						}
					});

					$.ajax({
						url: '../poo/compartidos/ajax/ajax_ubicacion_secundaria_id.php',
						type: 'POST',
						dataType: 'JSON',
						data: {
										Id_Ubic_Prim: data[0].Id_Ubic_Prim,
										Id_Ubic_Sec: data[0].Id_Ubic_Sec
								},
						success:function(data){
							$("#editar_ubicacion_secundaria").html(data);
						}
					});


			}	//ajax-01-success
		}); // ajax-01

		$.ajax({
			url: '../poo/nota_salida/ajax_datos_de_material.php',
			type: 'POST',
			dataType: 'JSON',
			data: {Id_Solicitud:Id_Solicitud},
			success: function(data){
				
				$('#body_material_nota_salida').html('');
				var tabla_accesorios='';
				for (var i=0; i<data.length; i++) {
    				tabla_accesorios+="<tr>";
    					tabla_accesorios+="<td>";
    					tabla_accesorios+="<a href=\"#\" data-toggle=\"modal\" data-target=\"#mi_Modal_Edicion\" onclick=\"modal_datos_del_material("+data[i]['Id_Accesorio_ext']+")\" >";
    					tabla_accesorios+="<span><i class=\"fa fa-pencil\" style=\"font-size:16px;color:blue\" aria-hidden=\"true\"></i></span></td>";
    					tabla_accesorios+="</a>";    					
	    				tabla_accesorios+="<td>"+data[i]['Nombre_Ext']+"</td>";
	    				tabla_accesorios+="<td>"+data[i]['Marca_Ext']+"</td>";
	    				tabla_accesorios+="<td>"+data[i]['Modelo_Ext']+"</td>";
	    				tabla_accesorios+="<td>"+data[i]['No_Serie_Ext']+"</td>";
	    				tabla_accesorios+="<td>"+data[i]['Cantidad_Ext']+"</td>";
    				tabla_accesorios+="</tr>";
			}
			$('#body_material_nota_salida').html(tabla_accesorios);
				}
		});

} //Llave de cierre

actualizar_la_nota_salida=function(){

	$('#error_editar_proveedor').html('');
	$('#error_editar_contacto').html('');
	$('#error_editar_telefono').html('');
	$('#error_editar_email').html('');
	$('#error_editar_nombre_activo').html('');
	$('#error_editar_marca_activo').html('');
	$('#error_editar_modelo_activo').html('');
	$('#error_editar_serie_activo').html('');
	$('#error_editar_ubicacion_primaria').html('');
	$('#error_editar_ubicacion_secundaria').html('');

  	var editar_proveedor			=$.trim($('#editar_proveedor').val());
  	var editar_contacto				=$.trim($('#editar_contacto').val());
  	var editar_telefono				=$('#editar_telefono').val();
  	var editar_email					=$.trim($('#editar_email').val());
  	var editar_nombre_activo	=$.trim($('#editar_nombre_activo').val());
  	var editar_marca_activo		=$.trim($('#editar_marca_activo').val());
  	var editar_modelo_activo	=$.trim($('#editar_modelo_activo').val());
  	var editar_serie_activo		=$.trim($('#editar_serie_activo').val());
  	var editar_ubicacion_primaria		=$('#editar_ubicacion_primaria').val();
  	var editar_ubicacion_secundaria	=$('#editar_ubicacion_secundaria').val();
  	var id_folio_a_editar			=parseInt($('#folio_a_editar').text());
  	var validacion=true;

  	if(editar_proveedor==""){
	  	$("#editar_proveedor").focus();
			$("#error_editar_proveedor").html('Proveedor: Campo Requerido');
			$("#error_editar_proveedor").css({color:"red", fontSize: "12px"});
			validacion=false;
  	}

  	else if(editar_contacto==""){
	  	$("#editar_contacto").focus();
			$("#error_editar_contacto").html('Contacto: Campo Requerido');
			$("#error_editar_contacto").css({color:"red", fontSize: "12px"});
			validacion=false;
  	}

  	else if(editar_telefono==""){
	  	$("#editar_telefono").focus();
			$("#error_editar_telefono").html('Teléfono: Campo Requerido');
			$("#error_editar_telefono").css({color:"red", fontSize: "12px"});
			validacion=false;
  	}	

  	else if(editar_email==""){
	  	$("#editar_email").focus();
			$("#error_editar_email").html('E-mail: Campo Requerido');
			$("#error_editar_email").css({color:"red", fontSize: "12px"});
			validacion=false;
  	}

  	else if(editar_nombre_activo==""){
	  	$("#editar_nombre_activo").focus();
			$("#error_editar_nombre_activo").html('Nombre Activo: Campo Requerido');
			$("#error_editar_nombre_activo").css({color:"red", fontSize: "12px"});
			validacion=false;
  	}

  	else if(editar_marca_activo==""){
	  	$("#editar_marca_activo").focus();
			$("#error_editar_marca_activo").html('Marca Activo: Campo Requerido');
			$("#error_editar_marca_activo").css({color:"red", fontSize: "12px"});
			validacion=false;
  	}

  	else if(editar_modelo_activo==""){
	  	$("#editar_modelo_activo").focus();
			$("#error_editar_modelo_activo").html('Modelo Activo: Campo Requerido');
			$("#error_editar_modelo_activo").css({color:"red", fontSize: "12px"});
			validacion=false;
  	}

  	else if(editar_serie_activo==""){
	  	$("#editar_serie_activo").focus();
			$("#error_editar_serie_activo").html('Serie Activo: Campo Requerido');
			$("#error_editar_serie_activo").css({color:"red", fontSize: "12px"});
			validacion=false;
  	}

  	else if(editar_ubicacion_primaria==null){
	  	$("#editar_ubicacion_primaria").focus();
			$("#error_editar_ubicacion_primaria").html('Ubicación Primaria: Campo Requerido');
			$("#error_editar_ubicacion_primaria").css({color:"red", fontSize: "12px"});
			validacion=false;
  	}

  	else if(editar_ubicacion_secundaria==null){
	  	$("#editar_ubicacion_secundaria").focus();
			$("#error_editar_ubicacion_secundaria").html('Ubicación Secundaria: Campo Requerido');
			$("#error_editar_ubicacion_secundaria").css({color:"red", fontSize: "12px"});
			validacion=false;
  	}

	if(validacion){

				$.confirm({
				    title: 'Nota de Salida.',
				    content: '¿Desea Actualizar los datos?',
				    icon: 'fa fa-pencil',
				    type: 'green',
				    buttons: {
				        confirm: function () {

											$.ajax({
												url: '../poo/nota_salida/ajax_datos_de_nota_update.php',
												type: 'POST',
												dataType: 'JSON',
												data: {
														editar_proveedor					:editar_proveedor,
														editar_contacto						:editar_contacto,
														editar_telefono						:editar_telefono,
														editar_email							:editar_email,
														editar_nombre_activo			:editar_nombre_activo,
														editar_marca_activo				:editar_marca_activo,
														editar_modelo_activo			:editar_modelo_activo,
														editar_serie_activo				:editar_serie_activo,
														editar_ubicacion_primaria	:editar_ubicacion_primaria,
														editar_ubicacion_secundaria	:editar_ubicacion_secundaria,
														id_folio_a_editar					:id_folio_a_editar},
														success: function(data){
															$.alert('Operación exitosa');
															$("#Modal_Edicion_ob").modal("hide");
															Activos_tickets_externos(3)
														},
														error: function(){
															$.alert('Error en la operación');
														}
											});        	

				        },
				        cancel: function () {
				            $.alert('Operación Cancelada!');
				        },
				    }
				});
		}


}

	
	$("#Url_Adjuntos").change(function(){
     alert(1);
	});
	
	
});

</script>