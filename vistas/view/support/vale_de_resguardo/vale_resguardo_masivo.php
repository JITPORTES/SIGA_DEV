<?php
	$Id_Menu="";
	if (isset($_GET['Id_Menu'])) {
		$Id_Menu = @$_GET['Id_Menu'];
	}
	
	$Id_Submenu="";
	if (isset($_GET['Id_Submenu'])) {
		$Id_Submenu = @$_GET['Id_Submenu'];
	}
?>

<script src="../plugins/docsupport/standalone/selectize.js"></script>
<script src="../plugins/docsupport/index.js"></script>
<link rel="stylesheet" href="../dist/css/jquery-confirm.min.css">
  <script src="../dist/js/jquery-confirm.min.js"></script>
      
	  <!-- Info boxes -->
      <div class="row">
        <div class="col-md-offset-1 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box verde">
          <!-- Button trigger modal -->
            <a href="#" data-toggle="modal" data-target="#verificacionActivo" onclick="limpiarcampos()">
              <span class="info-box-icon bg-green"><i class="fa fa-send-o"></i></span>
              <div class="info-box-content">
                <h3 class="info-box-text">Imprimir vale de resguardo</h3>
              </div>
              <!-- /.info-box-content -->
            </a>
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12" style="display:none">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="AF/BC">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Usuario Responsable">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12" style="display:none">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Descripción corta (200 Caracteres)">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="No. Usuario Responsable">
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <!-- /.row -->
      
      <!-- Main row -->
      <div class="row">
        
		<div class="col-md-12">
         <div class="box">
           <!-- /.box-header -->
           <div class="box-body" id="tabladinamica_valeresguardo">
             
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->
       </div>

      </div>
      <!-- /.row -->


    <!-- modal reubicación de equipo -->
    <div class="modal fade modalchs" id="verificacionActivo">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header verde">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"> Imprimir vale de resguardo</h4>
          </div>
          <div class="modal-body nopsides">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs verde" role="tablist">
              <li role="presentation" class="active"><a href="#seguimiento" aria-controls="seguimiento" role="tab" data-toggle="tab">Resguardo</a></li>
              <li role="presentation" style="display:none"><a href="#resguardo" aria-controls="resguardo" role="tab" data-toggle="tab">Seguimiento</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="seguimiento">
                <form>
                  <div class="row">
					
					<div class="col-md-10 col-md-offset-1">
					  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                          <!--Input Id Vale de Resguardo -->
						  <span><font color="red">*</font></span>
						  <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Tipo Vale</label>	
						  <input type="hidden" id="Id_Vale_Resguardo">
						  <select class="form-control" id="cmbtipovaleresguardo">
                          </select>
                      </div>
					  <div class="col-md-6 col-sm-12 col-xs-12 form-group">
						<span><font color="red">*</font></span>
						<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Usuario Solicitante</label>
						<input type="text" class="form-control"  id="txt_muestro_select" disabled="true" style="display:none">
						<div id="muestro_select">
							
							<select id="select-usuarios" class="demo-default" placeholder="Usuario Solicitante" style="display:none">
							</select>
						</div>
						<div id="gifcargando1" style="display:none" align="center">
						   <img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
						</div>
					  </div>
					  <div class="col-md-2 col-sm-12 col-xs-12 form-group">
						  <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Teléf. (Ext.)</label>		
                          <input type="text" class="form-control" placeholder="Teléf. (Ext.)" id="txt_telefono" disabled="true">
                      </div>
					  
				
					  <div class="col-md-7 col-sm-12 col-xs-12 form-group">
						<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Puesto</label>	
                        <input type="text" class="form-control" placeholder="Puesto" id="txt_puesto" disabled="true">
                      </div>
					  <div class="col-md-5 col-sm-12 col-xs-12 form-group">
						<span><font color="red">*</font></span>
						<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Correo</label>
                        <input type="text" class="form-control" placeholder="Correo" id="txt_correo">
                      </div>
					  
					  
					  <div class="col-md-12 col-sm-12 col-xs-12 form-group">
							<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Observaciones</label>
              <div class="form-group">
                <textarea type="text" class="form-control" placeholder="Observaciones" id="text_Observaciones" rows="5">Esta responsiva de equipo sustituye a las de fecha de emisión anterior a esta.</textarea>
              </div>
            </div>
						
						<div class="col-md-12 col-sm-12 col-xs-12 form-group" id="div_enviar_correo">
							<label class="control-label" id="cmbareasLabel" style="font-size: 12px;">Enviar por Correo:</label>
							<input type="checkbox" id="enviar_correo_empleados"><br>
							<label class="control-label" style="font-size: 11px;">Con copia para:</label>
							<input type="text" class="form-control" placeholder="corre1@hospitalsatelite.com; corre2@hospitalsatelite.com;" id="txt_correo_copia">
							<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Mensaje del correo:</label>
							<div class="form-group">
                <textarea type="text" class="form-control" placeholder="Mensaje del Correo" id="text_mensaje_correo" rows="5"></textarea>
              </div>
            </div>
					  <br><br>
					  <div class="col-md-12" align="center">
						<br>
						<button type="button" class="btn chs" id="btngenerartodos"  style="display:none" onclick="generar_vales()">Generar Vales</button>
						<button type="button" class="btn chs" id="btnactivos" onclick="buscaractivos()">Ver Activos</button>
				      </div>
                    </div>
                  </div>
				  <br>
               </form>
                
              </div><!-- tab#1 -->

              <div role="tabpanel" class="tab-pane" id="resguardo">
                <ul class="steps">
                  <li class="verde"><span></span> Realizado</li>
                  <li class="amarillo"><span></span> En proceso</li>
                  <li class="rojo"><span></span> No realizado</li>
                </ul>

                <div class="process">
                  <div class="process-row nav nav-tabs">
                    <div class="process-step">
                      <button type="button" class="btn btn-info btn-circle" id="generar_vale_resguardo"><i class="fa fa-user fa-3x"></i></button>
                      <p><small>Generar <br />Vale Resguardo</small></p>
                    </div>
                    <div class="process-step">
                      <button type="button" class="btn btn-default btn-circle" id="autorizacion_solicitante"><i class="fa fa-user fa-3x"></i></button>
                      <p><small>Autorizaci&oacute;n <br>Solicitante</small></p>
                    </div>
                    <div class="process-step">
                      <button type="button" class="btn btn-default btn-circle" id="autorizacion_jefe_area"><i class="fa fa-user fa-3x"></i></button>
                      <p><small>Autorizaci&oacute;n <br />Jefe Area</small></p>
                    </div>
                    <div class="process-step">
                      <button type="button" class="btn btn-default btn-circle" id="vale_confirmado"><i class="fa fa-user fa-3x"></i></button>
                      <p><small>Vale <br>Confirmado</small></p>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn chs">Cerrar</button>
                </div>
              </div><!-- tab#2 -->
            </div>
			
			

          </div>
        </div>
      </div>
    </div>
	
	    <!-- modal Activos -->
     <div class="modal fade modalchs" id="modal_activos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" style="overflow-y: scroll; max-height:100%;  margin-top: 50px; margin-bottom:50px;">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Activos</h4>
          </div>
          <div class="modal-body nopsides npt">

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="generales">
				<form>
				  <input type="hidden" id="Estatus_Envio">
				  <input type="hidden" id="Estatus_Correo_Responsable">				  
                  <input type="hidden" id="Estatus_Correo_Solicitante">
				  
				  <div class="row">
				    <br>
                  </div>
				  <br>
				  <div id="detalle_activos" style="display:none">
					<div class="box-body" id="tablabusqueda">
					</div>
					<br>
					<div align="center">
					<button type="button" class="btn chs" id="Generar_Vale">¿Generar Vale de Resguardo?</button>
					</div>
				  </div>	
				  <!--Muestro el formato en pdf listo para imprimir-->
				  <div id="formato_pdf" style="display:block"></div>
                </form>
              </div><!-- tab#1 -->
            </div>
          </div><!-- modal-body -->
          <div class="modal-footer">
            <button type="button" class="btn chs"  data-dismiss="modal">Cerrar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
	





<!-- DataTables -->
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

<script>
  
  $(".upload-files").fileinput({
    browseClass: "btn chs",
    language: 'es',
    allowedFileExtensions : ['jpg','png'],
  });

  $(".upload-simple").fileinput({
    browseClass: "btn chs",
    language: 'es',
  });

$(document).ready(function(){
	var array_activos=[];
	var name_table="";
	var pdf_puesto="";
	var pdf_nombre_completo="";
	var pdf_num_empleado="";
	var pdf_departamento="";
	
	tabla_vale_Resguardo();
	//Carga de combobox y funciones
	cargatipovaleresguardo();
	//cargaareas();
	//Departamento();
	usuarios();
	
	//Carga combobox tipo valde de resguardo
	function cargatipovaleresguardo() {
		var resultado=new Array();
		data={Estatus_Reg: "1",accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_tipo_vale_resg/Siga_cat_tipo_vale_resgFacade.Class.php",false, data);

		if(resultado.totalCount>0){
			$('#cmbtipovaleresguardo').append($('<option>', { value: "-1" }).text("--Tipo Vale Resguardo--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbtipovaleresguardo').append($('<option>', { value: resultado.data[i].Id_Tipo_Vale_Resg }).text(resultado.data[i].Desc_Tipo_Vale_Resg));
			}
		}else{
			$('#cmbtipovaleresguardo').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	//Autocomplete Usuarios
	function usuarios(){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoFacade.Class.php",
			data: {
				accion: 'consultar'
			},
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargando1").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {

						var usuarios='';
						usuarios+='<option></option>';
						usuarios+='<option value="Todos">Todos los Usuarios</option>';
						
						usuarios+='<optgroup label="Usuarios">';
						for (var i = 0; i < json.totalCount; i++) {
							usuarios+='<option value="'+json.data[i].num_empleado.trim()+'">'+json.data[i].num_empleado.trim()+' '+json.data[i].nombre_completo.trim()+'</option>';
						}
						usuarios+='</optgroup>';
						$('#select-usuarios').html(usuarios);

						$("#gifcargando1").hide();
						$("#select-usuarios").show();
							
						$('#select-usuarios').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargando1").hide();
						$('#select-usuarios').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#select-usuarios').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	
	//Busca desde la vista de nomina el puesto, telefono y correo, tomando como parametros el numero del empleado seleccionado en el autocomplete
	$( "#select-usuarios").change(function() {
	
		pdf_puesto="";
		pdf_nombre_completo="";
		pdf_num_empleado="";
		pdf_departamento="";
		
		$("#txt_puesto").val("");
		$("#txt_telefono").val("");
		$("#txt_correo").val("");
		
		if(this.value!=""&&this.value!="Todos"){
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoFacade.Class.php",
				data: {
					num_empleado:this.value,
					accion: 'consultar'
				},
				async: false,
				dataType: "html",
				beforeSend: function (objeto) {
				},
				success: function (datos) {
					var json = "";
						json = eval("(" + datos + ")"); //Parsear JSON

						if (json.totalCount > 0) {
							pdf_puesto=json.data[0].puesto;
							pdf_nombre_completo=json.data[0].nombre_completo;
							pdf_num_empleado=json.data[0].num_empleado;
							pdf_departamento=json.data[0].departamento;
							
							
							$("#txt_puesto").val(json.data[0].puesto);
							if(json.data[0].ext_telefonica!=null)
							{
								$("#txt_telefono").val(""+json.data[0].ext_telefonica);
							}
							
							if(json.data[0].email.length>0){
								$("#txt_correo").val(json.data[0].email);
							}else{
								if(json.data[0].EMAIL_CFDI.length>0){
									$("#txt_correo").val(json.data[0].EMAIL_CFDI);
								}
							}
						}else {
							mensajesalerta("", "No se encontraron resultados", "error", "dark");
						}

				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
			$("#btnactivos").show();
			$("#btngenerartodos").hide();
			
			$("#enviar_correo_empleados").prop("checked", true);
		}else{
			if(this.value=="Todos"){
				$("#btngenerartodos").show();
				$("#btnactivos").hide();
				$("#enviar_correo_empleados").prop("checked", true);
				
			}
		}
	});
	
	//Modal Busqueda y Seleccion de Activos
	///////////////////////////////////////////////////////////////
	
	//Al oprimir el boton buscar
	buscaractivos=function(){
		//Limpiamos el array
		name_table="";
		
		//Si el id vale resguardo !="" es edicion
		var Id_Vale_Resguardo=$("#Id_Vale_Resguardo").val();
		
		//Mostramos la tabla en donde se muestran los activos
		$("#detalle_activos").show();
		
		//Ocultamos el formato en pdf
		$("#formato_pdf").hide();
		
		//Limpiamos el array_activos 
		array_activos=[];
		
		//Area de sesion
		var Id_Area_Sesion=$("#idareasesion").val();
		
		var Agregar = true;
		var mensaje_error = "";
		
		var Id_Tipo_Vale_Resg=$("#cmbtipovaleresguardo").val();
		var Num_Empleado=$("#select-usuarios").val();
		
		//Validacion
		if (Id_Tipo_Vale_Resg == "-1") {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Tipo de Vale de Resguardo<br />";
		}		
		
		if (Num_Empleado.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta Agregar el Solicitante<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		//
		
		if(Agregar)
		{
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_vale_resguardo/Siga_vale_resguardoFacade.Class.php",
				data: {
					Id_Vale_Resguardo:Id_Vale_Resguardo,
					Id_Tipo_Vale_Resg_Bus:Id_Tipo_Vale_Resg,
					//Area Sesion
					Id_Area_Sesion_Bus:Id_Area_Sesion,
					Num_Empleado_Bus:Num_Empleado,
					Estatus_Reg_Bus: '1',
					accion: 'tabla_activos_generar'
				},
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
				},
				success: function (datos) {
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					array_activos=[];
					var tabla="";
					tabla+='  <div class="table-responsive">';
					tabla+='	<table id="display_busqueda" class="table table-bordered table-striped table-chs">';
					tabla+='		<thead>';
					tabla+='		<tr>';
					tabla+='			<th>Opciones<br><div align="center"><input name="select_all" value="1" id="busqueda-select-all" type="checkbox" /></div></th>';
					tabla+='			<th>AF/BC</th>';
					tabla+='			<th>Nombre Activo</th>';
					tabla+='			<th>Marca</th>';
					tabla+='			<th>Modelo</th>';
					tabla+='			<th>No. Serie</th>';
					tabla+='			<th>Area</th>';
					tabla+='			<th>Ubicación Primaria:::</th>';
					tabla+='			<th>Ubicación Secundaria</th>';
					tabla+='			<th>Estatus</th>';
					tabla+='		</tr>';
					tabla+='		</thead>';
					tabla+='		<tbody>';
					if(Id_Vale_Resguardo==""){
						if (json.totalCount > 0) {
							for (var i = 0; i < json.totalCount; i++) {
								tabla+='		<tr>';
								//tabla+='			<td align="center"><input type="checkbox" id="checkbox'+i+'" value="'+json.data[i].Id_Activo+'" id="'+json.data[i].Id_Activo+'" name="orderBoxActivos[]" onchange="pasarcheckactivos('+i+','+json.data[i].Id_Activo+')" checked></td>';
								tabla+='			<td ><div align="center"><input type="checkbox" id="checkbox'+i+'" value="'+json.data[i].Id_Activo+'" id="'+json.data[i].Id_Activo+'" ></div></td>';
								tabla+='			<td>'+json.data[i].AF_BC.trim()+'</td>';
								tabla+='			<td>'+json.data[i].Nombre_Activo.trim()+'</td>';
								tabla+='			<td>'+json.data[i].Marca+'</td>';
								tabla+='			<td>'+json.data[i].Modelo+'</td>';
								tabla+='			<td>'+json.data[i].NumSerie+'</td>';
								tabla+='			<td>'+json.data[i].Nom_Area+'</td>';
								tabla+='			<td>';if(json.data[i].Desc_Ubic_Prim!=null){tabla+= json.data[i].Desc_Ubic_Prim;}tabla+='</td>';
								tabla+='			<td>';if(json.data[i].Desc_Ubic_Sec!=null){tabla+= json.data[i].Desc_Ubic_Sec;}tabla+='</td>';
								tabla+='			<td>'+json.data[i].Estatus_Reg+'</td>';
								tabla+='		</tr>';
							}
							
							
							$('#modal_activos').modal('show');
						}else{
							mensajesalerta("Informaci&oacute;n", "El usuario no cuenta con activos", "info", "dark");
						}
					}else{
						var cont=0;
						if (json.totalCount > 0) {
							for (var j = 0; j < json.totalCount; j++) {
								cont=j;
								tabla+='		<tr>';
								//tabla+='			<td align="center"><input type="checkbox" id="checkbox'+cont+'" value="'+json.data[j].Id_Activo+'" id="'+json.data[j].Id_Activo+'" onchange="pasarcheckactivos('+cont+','+json.data[j].Id_Activo+')"></td>';
								tabla+='			<td ><div align="center"><input type="checkbox" id="checkbox'+cont+'" value="'+json.data[j].Id_Activo+'" id="'+json.data[j].Id_Activo+'" ></div></td>';
								tabla+='			<td>'+json.data[j].AF_BC.trim()+'</td>';
								tabla+='			<td>'+json.data[j].Nombre_Activo.trim()+'</td>';
								tabla+='			<td>'+json.data[j].Marca+'</td>';
								tabla+='			<td>'+json.data[j].Modelo+'</td>';
								tabla+='			<td>'+json.data[j].NumSerie+'</td>';
								tabla+='			<td>'+json.data[j].Nom_Area+'</td>';
								tabla+='			<td>';if(json.data[j].Desc_Ubic_Prim!=null){tabla+= json.data[j].Desc_Ubic_Prim;}tabla+='</td>';
								tabla+='			<td>';if(json.data[j].Desc_Ubic_Sec!=null){tabla+= json.data[j].Desc_Ubic_Sec;}tabla+='</td>';
								tabla+='		</tr>';		
							
							}
						}
						
						//Al Editar
						if (json.totalCountDetalle > 0) {
							for (var i = 0; i < json.totalCountDetalle; i++) {
								cont=cont+1;
								tabla+='		<tr>';
								//tabla+='			<td align="center"><input type="checkbox" id="checkbox'+cont+'" value="'+json.data_Detalle[i].Id_Activo+'" id="'+json.data_Detalle[i].Id_Activo+'"  onchange="pasarcheckactivos('+cont+','+json.data_Detalle[i].Id_Activo+')" checked></td>';
								tabla+='			<td ><div align="center"><input type="checkbox" id="checkbox'+cont+'" value="'+json.data_Detalle[i].Id_Activo+'" id="'+json.data_Detalle[i].Id_Activo+'" checked></div></td>';
								tabla+='			<td>'+json.data_Detalle[i].AF_BC.trim()+'</td>';
								tabla+='			<td>'+json.data_Detalle[i].Nombre_Activo.trim()+'</td>';
								tabla+='			<td>'+json.data_Detalle[i].Marca+'</td>';
								tabla+='			<td>'+json.data_Detalle[i].Modelo+'</td>';
								tabla+='			<td>'+json.data_Detalle[i].NumSerie+'</td>';
								tabla+='			<td>'+json.data_Detalle[i].Nom_Area+'</td>';
								tabla+='			<td>';if(json.data_Detalle[i].Desc_Ubic_Prim!=null){tabla+= json.data_Detalle[i].Desc_Ubic_Prim;}tabla+='</td>';
								tabla+='			<td>';if(json.data_Detalle[i].Desc_Ubic_Sec!=null){tabla+= json.data_Detalle[i].Desc_Ubic_Sec;}tabla+='</td>';
								tabla+='		</tr>';	
							}
							$('#modal_activos').modal('show');
						}
					}
					tabla+='		</tbody>';
					tabla+='	</table>';
					tabla+='  </div>';
					
					$("#tablabusqueda").html(tabla);

					name_table=$('#display_busqueda').DataTable({
					  "paging": true,
					  "lengthChange": true,
					  "ordering": true,
					  "info": true,
					  "autoWidth": true, 
					  "language": {
							"lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
							"zeroRecords": "Sin Resultados",
							"info": "Monstrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
							"infoEmpty": "Sin Resultados",
							"infoFiltered": "(Monstrando  _MAX_ del total de registros)",
							"search": "Busqueda: ",
							"paginate": {
								"first": "Primera",
								"last": "Ultima",
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
					
					
					
					
				   // Handle click on "Select all" control
				   $('#busqueda-select-all').on('click', function(){
					  // Check/uncheck all checkboxes in the table
					  var rows = name_table.rows({ 'search': 'applied' }).nodes();
					  $('input[type="checkbox"]', rows).prop('checked', this.checked);
				   });

				   // Handle click on checkbox to set state of "Select all" control
				   $('#example tbody').on('change', 'input[type="checkbox"]', function(){
					  // If checkbox is not checked
					  if(!this.checked){
						 var el = $('#busqueda-select-all').get(0);
						 // If "Select all" control is checked and has 'indeterminate' property
						 if(el && el.checked && ('indeterminate' in el)){
							// Set visual state of "Select all" control 
							// as 'indeterminate'
							el.indeterminate = true;
						 }
					  }
				   });
				   
					//Si el tipo de vale de resguaro es especifico marca todos los checkbox
					if($("#Id_Vale_Resguardo").val()==""){
						if(Id_Tipo_Vale_Resg=="2"){
							$("#busqueda-select-all").click();
						}	
					}
						

				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
		}
	}
	
	
	//Generar Vale de Resguardo
	$("#Generar_Vale").click(function () {
		array_activos=[];
		var Agregar = true;
		var mensaje_error = "";
		//Usuario Logueado
		var usuariosesion=$("#usuariosesion").val();
		//Area
		var idareasesion=$("#idareasesion").val();
		//Obtenemos el Id del Vale Para poder Modificar
		var Id_Vale_Resguardo=$("#Id_Vale_Resguardo").val();
		var con_copia=$.trim($("#txt_correo_copia").val());
		var mensaje_correo=$.trim($("#text_mensaje_correo").val());
		var enviar_correo=0;
		var Id_Tipo_Vale_Resg=$("#cmbtipovaleresguardo").val();
		var Extension_Tel=$.trim($("#txt_telefono").val());
		var Correo=$.trim($("#txt_correo").val());
		var Num_Empleado=$.trim($("#select-usuarios").val());
		var Observaciones=$.trim($("#text_Observaciones").val());
		
		var strDatos=""; 
		
		
		if (Id_Tipo_Vale_Resg=="-1") {
			Id_Tipo_Vale_Resg="";
		}
		
		if (Correo.length<= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el Correo para Enviar el Vale de Resguardo<br />";
		}
		
		if($("#enviar_correo_empleados").prop('checked')){
			enviar_correo=1;
			if(mensaje_correo==""){
				Agregar = false;
				mensaje_error += " -Agrega el mensaje del correo<br />";	
			}
		}
		
		////////////////////////////////////////////////////////////////////////////
		//Validacion checkbox
		var contador=0;
		
		//Se lee todos los td que contengan un input type checkbox
		name_table.$('input[type="checkbox"]').each(function(){
			if(this.checked){
			   array_activos[contador]=this.value;
			   contador=contador+1;
			}
		});
		
		if(contador<1){
			Agregar = false;
			mensaje_error += " -Selecciona una Activo<br />";
		}
		//Fin
		////////////////////////////////////////////////////////////////////////////
		if (Num_Empleado.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta Agregar el Solicitante<br />";
		}
		
		
		if (!Agregar){
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar)
		{
			var mensaje="";
			//Validamos la actualizacion del vale de resguardo
			if(Id_Vale_Resguardo!=""){
				var Estatus_Envio=$("#Estatus_Envio").val();
				var Estatus_Correo_Responsable=$("#Estatus_Correo_Responsable").val();
				var Estatus_Correo_Solicitante=$("#Estatus_Correo_Solicitante").val();
				if((Estatus_Envio==0)){
					mensaje="Advertencia!! <br>El vale no se ha enviado por correo, Estas seguro de generar el vale Nuevamente??";
				}
				
				if((Estatus_Envio==1) && (Estatus_Correo_Solicitante==0)&& (Estatus_Correo_Responsable==0)){
					mensaje="Advertencia!! <br>Se ha enviado el vale pero no se ha autorizado, Estas seguro de generar el vale Nuevamente??";
				}
				
				if((Estatus_Envio==1) && (Estatus_Correo_Solicitante==1)&& (Estatus_Correo_Responsable==0)){
					mensaje="Advertencia!! <br>El vale ha sido autorizado por el Solicitante pero no por el Responsable del area, Estas seguro de cancelarlo y generarlo Nuevamente??";
				}
				
				if((Estatus_Envio==1) && (Estatus_Correo_Solicitante==0)&& (Estatus_Correo_Responsable==1)){
					mensaje="Advertencia!! <br>El vale ha sido autorizado por el Responsable del area pero no por el Solicitante, Estas seguro de cancelarlo y generarlo Nuevamente??";
				}
				
				if((Estatus_Envio==1) && (Estatus_Correo_Solicitante==1)&& (Estatus_Correo_Responsable==1)){
					mensaje="Advertencia!! <br>El vale ha sido autorizado por el Responsable del area y por el Solicitante, Estas seguro de cancelarlo y generarlo Nuevamente??";
				}
	
			}else{
				mensaje="Estas seguro de Generar el Vale???";
			}
			//Validamos la actualizacion del vale de resguardo
			
			bootbox.dialog({
				message: mensaje,
				
				buttons: {
					danger: {
						label: "Aceptar",
						className: "btn-primary",
						callback: function() {
							strDatos ={
								Id_Vale_Resguardo:Id_Vale_Resguardo,
								Id_Tipo_Vale_Resg:Id_Tipo_Vale_Resg,
								Id_Area:idareasesion,
								Num_Empleado:Num_Empleado,
								Extension_Tel:Extension_Tel,
								Correo:Correo,
								con_copia:con_copia,
								enviar_correo:enviar_correo,
								mensaje_correo:mensaje_correo,
								Observaciones:Observaciones,	
								Usr_Inser:usuariosesion,
								Estatus_Reg:"1",
								cadena_id_activos:array_activos,
								accion:"guardar"
							};
							
							$.ajax({
								type: "POST",
								encoding:"UTF-8",
								url: "../fachadas/activos/siga_vale_resguardo/Siga_vale_resguardoFacade.Class.php",        
								async: true,
								data: strDatos,
								dataType: "html",
								beforeSend: function (xhr) {
									jsShowWindowLoad("Generando vale de resguardo, Por favor espere.");
								},
								success: function (datos) {
									var json;
									json = eval("(" + datos + ")"); //Parsear JSON
									
									if(json.totalCount>0){
										
										//Ocultamos la primer pantalla modal
										$('#verificacionActivo').modal('hide');
										
										//Ocultamos el div detalle de activos 
										$("#detalle_activos").hide();
										
										mensajesalerta("&Eacute;xito", json.text, "success", "dark");
										mostrar_vale_resguardo(json.Id_Vale_Resguardo);
										tabla_vale_Resguardo();
										//Limpiamos y ocultamos los div
										limpiarcampos();
										//Mostramos el formato en pdf
										$("#formato_pdf").show();
									}else{
										mensajesalerta("", json.text, "error", "dark");  
									}
									//$('#myModal').modal('hide');
									//limpiarcampos();
									//$('#displayGenerarCat').DataTable().ajax.reload();	
								},
								complete: function (xhr) {
									jsRemoveWindowLoad();
								},
								error: function () {
									mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
									jsRemoveWindowLoad();
								}
							});
							
						}
					
					},
					success: {
						label: "Cancelar!",
						className: "btn-primary",
						callback: function() {
							
						}
					}
					
				}
			});
		}
	});
	
	
	//Pasamos los id de los activos a un hidden como cadena separados por,
	pasarcheckactivos=function(Indice, Id_Activo){   
		if(!$("#checkbox"+Indice).prop('checked')){
			array_activos[Indice]="N";
		}else{
			array_activos[Indice]=""+Id_Activo+"";
		}
		
		//console.log(array_activos);
	}
    
	function mostrar_vale_resguardo(Id_Vale_Resguardo){
		$.ajax({
			type: "POST",
			encoding:"UTF-8",
			url: "../fachadas/activos/siga_vale_resguardo/Siga_vale_resguardoFacade.Class.php",        
			async: false,
			data: {
				Estatus_Reg:"1",
				Id_Vale_Resguardo:Id_Vale_Resguardo,
				accion:"consultarpdf"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				if(json.totalCount>0)
				{
					var contenido="";
					contenido+='<div class="pdf-box">';
					contenido+='	<div class="pdf-box-body">';
							//Encabezado Logos
					contenido+='		<div class="row">';
					contenido+='		  <div class="col-md-3 col-xs-4">';
					contenido+='			<a href="#"><img src="../dist/img/logo.png" alt="" class="logos"></a>';
					contenido+='		  </div>';
					contenido+='		  <div class="col-md-6 col-xs-4">';
					contenido+='			<h3>Vale de<br/>resguardo</h3>';
					contenido+='		  </div>';
					contenido+='		  <div class="col-md-3 col-xs-4">';
					contenido+='			<a href="#"><img src="../dist/img/LOGO-SIGA.PNG" alt="" class="logos"></a>';
					contenido+='		  </div>';
					contenido+='		</div>';
					
					contenido+='		<div class="fluid-container">';
							  //Datos Generales
					contenido+='		  <div class="row">';
					contenido+='			<div class="col-md-12">';
					contenido+='			  <div class="table-responsive">';
					contenido+='				<table class="table table-bordered display">';
					contenido+='				  <thead>';
					contenido+='					<tr>';
					contenido+='					  <td colspan="2">DATOS GENERALES::</td>';
					contenido+='					</tr>';
					contenido+='				  </thead>';
					contenido+='				  <tbody>';
					contenido+='					<tr>';
					contenido+='					  <td>Fecha y Hora de Emisión: '+json.data[0].Fech_Inser.substring(0, 16);+'</td>';
					contenido+='					  <td>Tipo vale resguardo: '+json.data[0].Desc_Tipo_Vale_Resg+'</td>';
					contenido+='					</tr>';
					contenido+='					<tr>';
					contenido+='					  <td>Área: '+json.data[0].Nom_Area+'</td>';
					contenido+='					  <td>Jefe de área: '+json.data[0].Nombre_Jefe_Area+'</td>';
					contenido+='					</tr>';
					contenido+='				  </tbody>';
					contenido+='				</table>';
					contenido+='			  </div>';
					contenido+='			</div>';
					contenido+='		  </div>';
							  
							  //Asignacion Resguardo	
					contenido+='		  <div class="row">';
					contenido+='			<div class="col-md-12">';
					contenido+='			  <div class="table-responsive">';
					contenido+='				<table class="table table-bordered display">';
					contenido+='				  <thead>';
					contenido+='					<tr>';
					contenido+='					  <td colspan="3">ASIGNACIÓN DEL RESGUARDO</td>';
					contenido+='					</tr>';
					contenido+='				  </thead>';
					contenido+='				  <tbody>';
					contenido+='					<tr>';
					contenido+='					  <td colspan="2">Colaborador: '+json.data[0].Nombre_Solicitante+'</td>';
					contenido+='					  <td colspan="1">No. Empleado: '+json.data[0].Num_Empleado+'</td>';
					contenido+='					</tr>';
					contenido+='					<tr>';
					contenido+='					  <td>Departamento: '+json.data[0].Departamento+'</td>';
					contenido+='					  <td>Puesto: '+json.data[0].Puesto+'</td>';
					contenido+='					  <td>Oficina: '+json.data[0].Oficina_Resp+'</td>';
					contenido+='					</tr>';
					contenido+='					<tr>';
					contenido+='					  <td colspan="1">Teléfono (ext): '+json.data[0].Tel_Resp+'</td>';
					contenido+='					  <td colspan="2">Correo: '+json.data[0].Correo_Resp+'</td>';
					contenido+='					</tr>';
					contenido+='				  </tbody>';
					contenido+='				</table>';
					contenido+='			  </div>';
					contenido+='			</div>';
					contenido+='		  </div>';
							  
							  //Detalle Activo Fijo		
					contenido+='		  <div class="row">';
					contenido+='			<div class="col-md-12">';
					contenido+='			  <div class="table-responsive">';
					contenido+='				<table class="table table-bordered display">';
					contenido+='				  <thead>';
					contenido+='					<tr>';
					contenido+='					  <td colspan="9">CONTROL DE ACTIVO FIJO</td>';
					contenido+='					</tr>';
					contenido+='				  </thead>';
					contenido+='				  <tbody>';
					contenido+='					<tr style="background:#bcbbbb;">';
					contenido+='					  <td class="text-center">No</td>';
					contenido+='					  <td class="text-center">AF/BC</td>';
					contenido+='					  <td class="text-center">Activo</td>';
					contenido+='					  <td  class="text-center">Area</td>';
					contenido+='					  <td  class="text-center">Ubicación Primaria</td>';
					contenido+='					  <td  class="text-center">Ubicación Secundaria</td>';
					contenido+='					  <td  class="text-center">No Serie</td>';
					contenido+='					  <td  class="text-center">Fecha alta activo</td>';
					contenido+='					  <td  class="text-center">Estatus Activo</td>';
					
					contenido+='					</tr>';
					if(json.totalCountDetalle>0)
					{
						for(var i = 0; i < json.totalCountDetalle; i++)
						{
							contenido+='					<tr>';
							contenido+='					  <td>'+(i+1)+'</td>';
							contenido+='					  <td>';if(json.data_Detalle[i].AF_BC!=null){contenido+=json.data_Detalle[i].AF_BC;}contenido+='</td>';
							contenido+='					  <td>';if(json.data_Detalle[i].Nombre_Activo!=null){contenido+=json.data_Detalle[i].Nombre_Activo;}contenido+='</td>';
							contenido+='					  <td>';if(json.data_Detalle[i].Nom_Area!=null){contenido+=json.data_Detalle[i].Nom_Area;}contenido+='</td>';
							contenido+='					  <td>';if(json.data_Detalle[i].Desc_Ubic_Prim!=null){contenido+=json.data_Detalle[i].Desc_Ubic_Prim;}contenido+='</td>';
							contenido+='					  <td>';if(json.data_Detalle[i].Desc_Ubic_Sec!=null){contenido+=json.data_Detalle[i].Desc_Ubic_Sec;}contenido+='</td>';
							contenido+='					  <td>';if(json.data_Detalle[i].NumSerie!=null){contenido+=json.data_Detalle[i].NumSerie;}contenido+='</td>';
							contenido+='					  <td>';if(json.data_Detalle[i].Fech_Inser!=null){contenido+=json.data_Detalle[i].Fech_Inser.substring(0, 10);}contenido+='</td>';
							contenido+='					  <td>';
							if(json.data_Detalle[i].Estatus_Activo !='3'){contenido+='Activo';}else{contenido+='Baja';}
							contenido+='					  </td>';
							contenido+='					</tr>';
						}
					}
					contenido+='				  </tbody>';
					contenido+='				</table>';
					contenido+='			  </div>';
					contenido+='			</div>';
					contenido+='		  </div>';
								
							  //Comentarios	
					contenido+='		  <div class="row">';
					contenido+='			<div class="col-md-12">';
					contenido+='			  <div class="table-responsive">';
					contenido+='				<table class="table table-bordered display">';
					contenido+='				  <thead>';
					contenido+='					<tr>';
					contenido+='					  <td>OBSERVACIONES</td>';
					contenido+='					</tr>';
					contenido+='				  </thead>';
					contenido+='				  <tbody>';
					contenido+='					<tr>';
					contenido+='					  <td>Comentario: '+json.data[0].Observaciones+'</td>';
					contenido+='					</tr>';
					contenido+='				  </tbody>';
					contenido+='				</table>';
					contenido+='			  </div>';
					contenido+='			</div>';
					contenido+='		  </div>';
							  
							  //Firmas		
					contenido+='		  <div class="row">';
					contenido+='			<div class="col-md-12">';
					contenido+='			  <div class="table-responsive">';
					contenido+='				<table class="table table-bordered display">';
					contenido+='				  <thead>';
					contenido+='					<tr>';
					contenido+='					  <td colspan="2">NOMBRE Y FIRMA RESPONSABLES</td>';
					contenido+='					</tr>';
					contenido+='				  </thead>';
					contenido+='				  <tbody>';
					contenido+='					<tr>';
					contenido+='					  <td>RESPONSABLE DEL ÁREA</td>';
					contenido+='					  <td>RESPONSABLE AF/BC:</td>';
					contenido+='					</tr>';
					contenido+='					<tr>';
					contenido+='					  <td class="sign">Firma<br><br><strong>';
					if(json.data[0].Estatus_Correo_Responsable==0){
						//contenido+='						No Autorizado';
					}else{
						//contenido+='						Autorizado';
					}
					contenido+='					  </strong></td>';
					contenido+='					  <td class="sign">Firma<br><br><strong>';
					if(json.data[0].Estatus_Correo_Solicitante==0){	
						//contenido+='						No Autorizado';
					}else{
						//contenido+='						Autorizado';
					}
					contenido+='					  </strong></td>';
					contenido+='					</tr>';
					contenido+='					<tr>';
					contenido+='					  <td class="author">'+json.data[0].Nombre_Jefe_Area+'</td>';
					contenido+='					  <td class="author">'+json.data[0].Nombre_Solicitante+'</td>';
					contenido+='					</tr>';
					contenido+='				  </tbody>';
					contenido+='				</table>';
					contenido+='				<br><br>';
					contenido+='				<div align="center">';
					contenido+='					<a href="../controladores/activos/siga_vale_resguardo/reporte.php?Id_Vale_Resguardo='+json.data[0].Id_Vale_Resguardo+'" target="_blank" class="btn chs" id="Imprimir_PDF">Imprimir</a>';
					contenido+='					&nbsp;&nbsp;';
					if(json.data[0].Estatus_Envio==0){
						//contenido+='					<button type="button" class="btn chs" id="Enviar_Correo" onclick="envia_correo(\''+json.data[0].Id_Vale_Resguardo+'\', \''+json.data[0].Nombre_Solicitante+'\',\''+json.data[0].Num_Empleado+'\', \''+json.data[0].Correo+'\', \''+json.data[0].Nombre_Jefe_Area+'\', \''+json.data[0].Correo_Jefe_Area+'\', \''+json.data[0].Num_Empleado_Jefe+'\')">Enviar</button>';
					}
					contenido+='				</div>';
					contenido+='			  </div>';
					contenido+='			</div>';
					contenido+='		  </div>';
					contenido+='		</div>';
					contenido+='	</div>';
					contenido+='</div>';
					
					$("#formato_pdf").html(contenido);
				}else{
					$("#formato_pdf").html("");
				}
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
			}
		});
		
		
	}
	
	limpiarcampos=function(){
		$("#btnactivos").show();
		$("#btngenerartodos").hide();
		pdf_puesto="";
		pdf_nombre_completo="";
		pdf_num_empleado="";
		pdf_departamento="";
		
		$("#Id_Vale_Resguardo").val("");
		
		$("#cmbtipovaleresguardo").val("-1");
		//Habilitamos el selec de tipo de activo
		$('#cmbtipovaleresguardo').attr('disabled', false);
		
		$("#txt_puesto").val("");
		$("#txt_telefono").val("");
		$("#txt_correo").val("");
		$("#text_Observaciones").val("Esta responsiva de equipo sustituye a las de fecha de emisión anterior a esta.");
		//Limpiar Array_Activos
		array_activos=[];
		name_table="";
		
		//Limpiamos el autocomplete
		var Num_Empleado=$.trim($("#select-usuarios").val());
		if(Num_Empleado!=""){			
			if(Num_Empleado.length > 0){
				var $select3 = $('#select-usuarios').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
			}
		}
		//
		
		//Ocultamos el div detalle de activos 
		$("#detalle_activos").hide();
		//Ocultamos el formato en pdf
		$("#formato_pdf").hide();
		
		//Ocultamos el texbox en donde se muestra el numero y nombre del empleado
		$("#txt_muestro_select").hide();
		//Mostramos el autocomplete de empleados
		$("#muestro_select").show();
		
		////Limpiar proceso de envio
		$("#generar_vale_resguardo" ).removeClass("verde");
		//
		$("#autorizacion_solicitante").removeClass("amarillo");
		$("#autorizacion_solicitante" ).removeClass("verde");
		//
		$("#autorizacion_jefe_area").removeClass("amarillo");
		$("#autorizacion_jefe_area" ).removeClass("verde");
		//
		$("#vale_confirmado").removeClass("verde");
		
		///////////////////////////////////////////
		$("#Estatus_Envio").val("");
		$("#Estatus_Correo_Responsable").val("");
		$("#Estatus_Correo_Solicitante").val("");
		
	}
	
	//Generar pdf desde la tabla dinamica
	generapdf=function (Id_Vale_Resguardo){
		$("#modal_activos").modal('show');	
		$("#formato_pdf").show();
		$("#detalle_activos").hide();
		mostrar_vale_resguardo(Id_Vale_Resguardo);
	}
	
	//Edicion
	editar_vale= function(Id_Vale_Resguardo,Id_Tipo_Vale_Resg, Num_Empleado, nombre_completo)
	{
		var $limpia = $('#select-usuarios').selectize({});	
		var control_limpia = $limpia[0].selectize;
		control_limpia.clear();
		control_limpia.enable();
		
		$("#Estatus_Envio").val("");
		$("#Estatus_Correo_Responsable").val("");
		$("#Estatus_Correo_Solicitante").val("");
	
		//Pasamos el Id Vale Resguardo--
		$("#Id_Vale_Resguardo").val(Id_Vale_Resguardo);
		
		$("#verificacionActivo").modal("show");
		$("#cmbtipovaleresguardo").val(Id_Tipo_Vale_Resg);

		$('#cmbtipovaleresguardo').attr('disabled', true);
		
		
		var $select3 = $('#select-usuarios').selectize({});	
		var control3 = $select3[0].selectize;
		control3.addItem(Num_Empleado);
		
		
		//Mostramos el texbox del empleado 
		$("#txt_muestro_select").show();
		$("#txt_muestro_select").val(Num_Empleado+"  "+nombre_completo);
		
		$("#muestro_select").hide();
		
		$.ajax({
			type: "POST",
			encoding:"UTF-8",
			url: "../fachadas/activos/siga_vale_resguardo/Siga_vale_resguardoFacade.Class.php",        
			async: false,
			data: {
				
				Estatus_Reg:"1",
				Id_Vale_Resguardo:Id_Vale_Resguardo,
				accion:"consultar"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				if(json.totalCount>0){
					$("#txt_correo").val(json.data[0].Correo.trim());
					$("#text_Observaciones").val(json.data[0].Observaciones.trim());
					$("#generar_vale_resguardo" ).addClass( "verde" );
					
					$("#Estatus_Envio").val(json.data[0].Estatus_Envio);
					$("#Estatus_Correo_Responsable").val(json.data[0].Estatus_Correo_Responsable);
					$("#Estatus_Correo_Solicitante").val(json.data[0].Estatus_Correo_Solicitante);
					
					
					if(json.data[0].Estatus_Correo_Solicitante==1){
						$("#autorizacion_solicitante" ).removeClass("amarillo");
						$("#autorizacion_solicitante" ).addClass("verde");
					}else{
						$("#autorizacion_solicitante" ).removeClass("verde");
						$("#autorizacion_solicitante" ).addClass("amarillo");
					}
					
					if(json.data[0].Estatus_Correo_Responsable==1){
						$("#autorizacion_jefe_area" ).removeClass("amarillo");
						$("#autorizacion_jefe_area" ).addClass("verde");
					}else{
						$("#autorizacion_jefe_area" ).removeClass("verde");
						$("#autorizacion_jefe_area" ).addClass("amarillo");
					}
					
					if((json.data[0].Estatus_Correo_Solicitante==1) && (json.data[0].Estatus_Correo_Responsable==1)){
						$("#vale_confirmado" ).addClass("verde");
					}else{
						$("#vale_confirmado" ).removeClass("verde");
					}
					
					//if(json.data[0].Estatus_Envio==1){
					//	$("#autorizacion_solicitante" ).addClass("amarillo");
					//	$("#autorizacion_jefe_area" ).addClass("amarillo");
					//
					//	
					//	
					//}else{
					//	$("#autorizacion_solicitante" ).removeClass("amarillo");
					//	$("#autorizacion_solicitante" ).removeClass("verde");
					//
					//	$("#autorizacion_jefe_area").removeClass("amarillo");
					//	$("#autorizacion_jefe_area" ).removeClass("verde");
					//	
					//	$("#vale_confirmado").removeClass("amarillo");
					//	$("#vale_confirmado").removeClass("verde");
					//}
					
					
				}
				
				
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al generar la tabla.", "error", "dark");
			}
		});
		
	}
	
	
	eliminar_vale=function(Id_Vale_Resguardo){
		//Area
		var idareasesion=$("#idareasesion").val();
		if(Id_Vale_Resguardo!=""){
			$.confirm({
			title: 'Confirm!',
			content: 'Deseas eliminar el vale de resguardo!',
			buttons: {
				confirm: function () {
					strDatos ={
						Usr_Mod:idareasesion,
						Id_Vale_Resguardo:Id_Vale_Resguardo,
						accion:"delete_logic"
					};
					
					$.ajax({
						type: "POST",
						encoding:"UTF-8",
						url: "../fachadas/activos/siga_vale_resguardo/Siga_vale_resguardoFacade.Class.php",        
						async: false,
						data: strDatos,
						dataType: "html",
						beforeSend: function (xhr) {
					
						},
						success: function (datos) {
							var json;
							json = eval("(" + datos + ")"); //Parsear JSON
							
							if(json.totalCount>0){
								mensajesalerta("&Eacute;xito", json.text, "success", "dark");
								tabla_vale_Resguardo();
							}else{
								mensajesalerta("", json.text, "error", "dark");  
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
	
	//Llenar Tabla Dinamicamente

	function tabla_vale_Resguardo()
	{
		$.ajax({
			type: "POST",
			encoding:"UTF-8",
			url: "../fachadas/activos/siga_vale_resguardo/Siga_vale_resguardoFacade.Class.php",        
			async: false,
			data: {
				Id_Area:$("#idareasesion").val(),
				Estatus_Reg:"1",
				Historico:0,
				accion:"consultartabladinamica"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				var contenido="";
				contenido+='<div>';
				contenido+=' <table  class="table table-bordered table-striped table-chs" id="display_solicitantes" width="100%">';
				contenido+='   <thead>';
				contenido+='	 <tr>';
				contenido+='	   <th>Eliminar</th>';
				contenido+='	   <th>PDF</th>';
				contenido+='	   <th>Estatus</th>';
				contenido+='	   <th>No.&nbsp;Empleado</th>';
				contenido+='	   <th>Usuario&nbsp;Solicitante</th>';
				contenido+='	   <th>Puesto</th>';
				//contenido+='	   <th>Correo</th>';
				contenido+='	   <th>Tipo&nbsp;Vale</th>';
				contenido+='	   <th>Area</th>';
				contenido+='	   <th>Observaciones</th>';
								
				contenido+='	 </tr>';
				contenido+='   </thead>';
				contenido+='		<tbody>';
				
				if(json.totalCount>0)
				{
					for (var i = 0; i < json.totalCount; i++) {
						contenido+='		<tr>';
						contenido+='			<td><span onclick="eliminar_vale('+json.data[i].Id_Vale_Resguardo+')"><i class="fa fa-trash" aria-hidden="true"></i></span></td>';
						contenido+='			<td><i class="fa fa-paperclip" aria-hidden="true" onclick="generapdf(\''+json.data[i].Id_Vale_Resguardo+'\')"></i></td>';
						if(json.data[i].Estatus_Envio=='1'){
							contenido+='			<td><font color="green">Enviado</font></td>';
						}else{
							contenido+='			<td><font color="red">No Enviado</font></td>';
						}
						contenido+='			<td>'+json.data[i].Num_Empleado+'</td>';
						contenido+='			<td>'+json.data[i].nombre_completo+'</td>';
						contenido+='			<td>'+json.data[i].puesto+'</td>';
						//contenido+='			<td>'+json.data[i].Correo+'</td>';
						contenido+='			<td>'+json.data[i].Desc_Tipo_Vale_Resg+'</td>';
						contenido+='			<td>'+json.data[i].Nom_Area+'</td>';
						contenido+='			<td>'+json.data[i].Observaciones.trim()+'</td>';
						contenido+='		</tr>';
					}
					
				}
				
				contenido+='		</tbody>';
				contenido+=' </table>';
				contenido+=' </div>';
				
				
				$("#tabladinamica_valeresguardo").html(contenido);
				
				$('#display_solicitantes').DataTable({
					"scrollY": 500,
					"scrollX": true,
					"paging": true,
					"autoWidth": false,
					"processing": true,
					 
						language: {
					        "sProcessing": "Procesando...",
					        "sLengthMenu": "Mostrar _MENU_ registros",
					        "sZeroRecords": "No se encontraron resultados",
					        "sEmptyTable": "Ningún dato disponible en esta tabla",
					        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
					        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
					        "sInfoPostFix": "",
					        "sSearch": "Buscar:",
					        "sUrl": "",
					        "sInfoThousands": ",",
					        "sLoadingRecords": "Cargando...",
					        "oPaginate": {
					        "sFirst": "Primero",
					        "sLast": "Último",
					        "sNext": "Siguiente",
					        "sPrevious": "Anterior"
					        },
					        "oAria": {
					        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
					        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
					        }

					}
				});
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al generar la tabla.", "error", "dark");
			}
		});
		
	}
	
	//Enviar Correo
	envia_correo= function(Id_Vale_Resguardo, Nombre_Solicitante, Num_Empleado, Correo, Nombre_Jefe_Area, Correo_Jefe_Area, Num_Empleado_Jefe){
		var array_notificacion=new Array();
		array_notificacion=enviar_notificacion(Id_Vale_Resguardo, Nombre_Solicitante, Num_Empleado, Nombre_Jefe_Area, Num_Empleado_Jefe);
		
		if(array_notificacion.estatus=="ok"){
			var Id_Notificacion="";
			if(array_notificacion.Id_Notificacion==""){
				Id_Notificacion="0";
			}else{
				Id_Notificacion=array_notificacion.Id_Notificacion;
			}
			mensajesalerta("&Eacute;xito", "La notificaci&oacute;n se ha generado correctamente", "success", "dark");
			//Id_Usuario_Envia
			var Id_Usuario_Envia=$("#usuariosesion").val();
			//Area
			var Id_Area=$("#idareasesion").val();
			//Aplicacion
			var Id_Aplicacion=$("#idmenusesion").val();
			//Id_Menu
			var Id_Menu=<?php echo $Id_Menu;?>
			//Id_Submenu
			var Id_Submenu=<?php echo $Id_Submenu;?>
			
			var url_solicitante='&Usr_Envia='+Id_Usuario_Envia+'&Aplicacion='+Id_Aplicacion+'&Area='+Id_Area+'&Menu='+Id_Menu+'&Submenu='+Id_Submenu;
			//Ocultar ventana modal
			$("#verificacionActivo").modal('hide');
			$("#modal_activos").modal('hide');
			
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_correos/Siga_correosFacade.Class.php",        
				async: true,
				data: {
					Id_Vale_Resguardo:Id_Vale_Resguardo,
					Nombre_Solicitante:Nombre_Solicitante,
					Num_Empleado:Num_Empleado,
					Cadena_Mail:Correo,
					Nombre_Jefe_Area:Nombre_Jefe_Area,
					Correo_Jefe_Area:Correo_Jefe_Area,
					Num_Empleado_Jefe:Num_Empleado_Jefe,
					Autorizado_por:"1",
					Id_Notificacion:Id_Notificacion,
					///////////
					Id_Usuario_Envia:Id_Usuario_Envia,
					Id_Area:Id_Area,
					Id_Aplicacion:Id_Aplicacion,
					Id_Menu:Id_Menu,
					Id_Submenu:Id_Submenu,
					url_solicitante:url_solicitante,
					accion:"envia_correo"
				},
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					
					if(json.totalCount>0){
						mensajesalerta("&Eacute;xito", json.mensaje, "success", "dark");
						
						
						//Modificar el estatus 0 Estatus_Enviar: 1
						$.ajax({
							type: "POST",
							url: "../fachadas/activos/siga_vale_resguardo/Siga_vale_resguardoFacade.Class.php",
							data: {
								Id_Vale_Resguardo:Id_Vale_Resguardo,
								Estatus_Envio:"1",
								accion: 'cambia_estatus_envio'
							},
							async: true,
							dataType: "html",
							beforeSend: function (objeto) {
							},
							success: function (datos) {
								json = "";
								json = eval("(" + datos + ")"); //Parsear JSON
								if (json.totalCount > 0) {
								}
							},
							error: function (objeto, quepaso, otroobj) {
								alert("Ocurrio un error al modificar");
							}
						});
						///////////////////////////////////////////////////////
						
					}else{
						mensajesalerta("Oh No!", "No se Pudo enviar el correo", "error", "dark");
					}
					
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al generar la tabla.", "error", "dark");
				}
			});
		
			
		}else{
			mensajesalerta("Oh No!", "Ocurrio un error al generar la notificaci&oacute;n, comunicate con el adminsitrador de Sistemas.", "error", "dark");
		}
		
	}
	
	//Envia Notificaciones
	enviar_notificacion=function(Id_Vale_Resguardo, Nombre_Solicitante, Num_Empl_Solicitante, Nombre_Jefe_Area, Num_Empl_Resp_Area){
		//Id_Usuario_Envia
		var Id_Usuario_Envia=$("#usuariosesion").val();
		//Area
		var Id_Area=$("#idareasesion").val();
		//Aplicacion
		var Id_Aplicacion=$("#idmenusesion").val();
		//Id_Menu
		var Id_Menu=<?php echo $Id_Menu;?>
		//Id_Submenu
		var Id_Submenu=<?php echo $Id_Submenu;?>
		
		var json="";
		$.ajax({
			type: "POST",
			encoding:"UTF-8",
			url: "../fachadas/activos/siga_notificaciones/Siga_notificacionesFacade.Class.php",        
			async: false,
			data: {
				//Datos Notificacion
				Id_Usuario_Envia:Id_Usuario_Envia,
				Id_Area:Id_Area,
				Id_Aplicacion:Id_Aplicacion,
				Id_Menu:Id_Menu,
				Id_Submenu:Id_Submenu,
				//
				Id_Vale_Resguardo:Id_Vale_Resguardo,
				Num_Empl_Solicitante:Num_Empl_Solicitante,
				Num_Empl_Resp_Area:Num_Empl_Resp_Area,
				Nombre_Solicitante:Nombre_Solicitante,
				Nombre_Jefe_Area:Nombre_Jefe_Area,
				Autorizado_por:"1",
				accion:"notificacion_vale_resguardo"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (datos) {
				json = eval("(" + datos + ")"); //Parsear JSON
				carga_notificaciones();
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al enviar la Notificacion.", "error", "dark");
			}
		});
		return json;
	}
	
	generar_vales=function(){
		var Agregar = true;
		var mensaje_error = "";
		//Usuario Logueado
		var usuariosesion=$("#usuariosesion").val();
		//Area
		var idareasesion=$("#idareasesion").val();
		var con_copia=$.trim($("#txt_correo_copia").val());
		var mensaje_correo=$.trim($("#text_mensaje_correo").val());
		var enviar_correo=0;
		var Id_Tipo_Vale_Resg=$("#cmbtipovaleresguardo").val();
		var Observaciones=$.trim($("#text_Observaciones").val());
		
		if (Id_Tipo_Vale_Resg=="-1") {
			Agregar = false; 
			mensaje_error += " -Agrega el tipo de vale<br />";
		}
		
		if($("#enviar_correo_empleados").prop('checked')){
			enviar_correo=1;
			if(mensaje_correo==""){
				Agregar = false;
				mensaje_error += " -Agrega el mensaje del correo<br />";	
			}
		}
		
		
		
		
		
		if (!Agregar){
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar){
			bootbox.dialog({
				message: "Esta seguro de generar los vales.",
				
				buttons: {
					danger: {
						label: "Aceptar",
						className: "btn-primary",
						callback: function() {
							strDatos ={
								Id_Tipo_Vale_Resg:Id_Tipo_Vale_Resg,
								Id_Area:idareasesion,
								Observaciones:Observaciones,	
								Usr_Inser:usuariosesion,
								Estatus_Reg:"1",
								enviar_correo:enviar_correo,
								mensaje_correo:mensaje_correo,
								con_copia: con_copia,
								accion:"guardar_vales_todos"
							};
							
							$.ajax({
								type: "POST",
								encoding:"UTF-8",
								url: "../fachadas/activos/siga_vale_resguardo/Siga_vale_resguardoFacade.Class.php",        
								async: true,
								data: strDatos,
								dataType: "html",
								beforeSend: function (xhr) {
									jsShowWindowLoad("Generando vales de resguardo, Por favor espere.");
								},
								success: function (datos) {
									var json;
									json = eval("(" + datos + ")"); //Parsear JSON
									
									if(json.totalCount>0){
										//Ocultamos la primer pantalla modal
										$('#verificacionActivo').modal('hide');
										mensajesalerta("&Eacute;xito", json.text, "success", "dark");
										tabla_vale_Resguardo();
										//Limpiamos y ocultamos los div
										limpiarcampos();
									}else{
										mensajesalerta("", json.text, "error", "dark");  
									}
									
								},
								complete: function (xhr) {
									jsRemoveWindowLoad();
								},
								error: function () {
									mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
									jsRemoveWindowLoad();
								}
							});
							
						}
					
					},
					success: {
						label: "Cancelar!",
						className: "btn-primary",
						callback: function() {
							
						}
					}
					
				}
			});
		}
		
	}
});
</script>