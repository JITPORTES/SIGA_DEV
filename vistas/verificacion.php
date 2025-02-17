<!--[if IE 8]><script src="js/es5.js"></script><![endif]-->
<script src="../plugins/docsupport/standalone/selectize.js"></script>
<script src="../plugins/docsupport/index.js"></script>  
	  <!-- Info boxes -->
      <div class="row">
        <div class="col-md-offset-1 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box rojo">
          <!-- Button trigger modal -->
            <a href="#" data-toggle="modal" data-target="#verificacionActivo" onclick="limpiarcampos()">
              <span class="info-box-icon bg-red"><i class="fa fa-check-circle-o"></i></span>
              <div class="info-box-content">
                <h3 class="info-box-text">verificación de activos</h3>
              </div>
              <!-- /.info-box-content -->
            </a>
          </div>
          <!-- /.info-box -->
        </div>
        
      </div>
      <!-- /.row -->
      
      <!-- Main row -->
      <div class="row">
        <!-- table-results -->
            <div class="col-md-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                  <table id="tableverificacion" class="table table-bordered table-striped table-chs" width="100%">
                    <thead>
                      <tr>
                        <th>Lote</th>
                        <th>Fecha</th>
						<th>Comentarios</th>
						<th>Edici&oacute;n</th>
                      </tr>
                    </thead>
                  </table>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
      </div>
      <!-- /.row -->


    <!-- modal reubicación de equipo -->
    <div class="modal fade modalchs" id="verificacionActivo">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header rojo">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Verificación Activo</h4>
          </div>
          <div class="modal-body nopsides">
           <form>
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
				<input type="hidden" id="Id_Verificacion">
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_activos">
					<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Activos</label>
					<select id="select-activos" class="demo-default" placeholder="Activos" style="display:none">
					</select>
					<div id="gifcargando1" style="display:none" align="center">
						<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_area" style="display:none">
					<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Áreas</label>
					<div class="input-group">
                      <select class="form-control" id="cmbareas">
                      </select>
                      <span class="input-group-addon">
                        <input type="checkbox" id="check_areas">
                      </span>
                    </div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_ubicprimaria">
					<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Ubicaci&oacute;n Primaria</label>
					<div class="input-group">
                        <select class="form-control" id="cmbubicprim">
						</select>
                        <span class="input-group-addon">
                            <input type="checkbox" id="check_ubic_prim">
                        </span>
                    </div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_ubic_sec">
					<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Ubicaci&oacute;n Secundaria</label>
					<div class="input-group">
                        <select class="form-control" id="cmbubicsec">
							<option value="-1">--Ubicación Secundaria--</option>
						</select>
                        <span class="input-group-addon">
                            <input type="checkbox" id="check_ubic_sec">
                        </span>
                    </div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_familia">
					<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Familia</label>
					<div class="input-group">
                      <select class="form-control" id="cmbfamilia">
                      </select>
                      <span class="input-group-addon">
                        <input type="checkbox" id="check_familia">
                      </span>
                    </div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_subfamilia">
					<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Subfamilia</label>
					<div class="input-group">
                      <select class="form-control" id="cmbsubfamilia">
                      </select>
                      <span class="input-group-addon">
                        <input type="checkbox" id="check_subfamilia">
                      </span>
                    </div>
				</div>
				
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_propiedad">
					<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Propiedad</label>
					<div class="input-group">
                      <select class="form-control" id="cmbprpiedad">
                      </select>
                      <span class="input-group-addon">
                        <input type="checkbox" id="check_propedad">
                      </span>
                    </div>
				</div>
				
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_departamento">
					<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Departamento</label>
                    <div class="input-group">
                      <select class="form-control" id="cmbdepartamento">
                      </select>
                      <span class="input-group-addon">
                        <input type="checkbox" id="check_departamento">
                      </span>
                    </div>
                </div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group" id="div_usuarios">
					<div id="muestro_select">
						<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Usuario Responsable</label>
						<select id="select-usuarios" class="demo-default" placeholder="Usuario Responsable" style="display:none">
						</select>
					</div>
					<div id="gifcargando_usuarios" style="display:none" align="center">
					   <img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
					</div>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 form-group">
					<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Fecha</label>
                    <div class="input-group">
                      <div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control pull-right datepicker"  id="Fecha">
					  </div>
                    </div>
                </div>
				

                <div class="col-md-12">
					<div class="form-group">
                      <textarea rows="3" class="form-control" placeholder="Comentarios (150 caracteres)" id="Comentarios"></textarea>
                    </div>
                </div>
				<div class="col-md-12" align="center">
					<button type="button" class="btn chs" onclick="buscar_activos()" id="Buscar_Activos">Buscar Activos</button>
					<div id="tablabusqueda" class="box-body"></div>
					<div id="gifcargando_tabla" style="display:none" align="center">
						<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
					</div>
		     	</div>	
              </div>
			  
			</div>
           </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn chs" id="guardar">Verificar</button>
          </div>
        </div>
      </div>
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
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../js/Funciones.js"></script>
<script>


$(document).ready(function(){
	$('.datepicker').datepicker({
		format: 'yyyy/mm/dd'
	});
	//Array Activos
	var array_activos=[];
	var cont_num_activos=0;
	var name_table="";
	
	//Carga de Combobox
	activos();
	usuarios();
	cargaareas();	
	ubic_prim();
	propiedad();
	familia();
	Departamento();
	////////////////////////
	
	//Autocomplete Activos
	function activos(){
		//Area
		var Id_Area=$("#idareasesion").val();
		var strdatos="";
		
		if(Id_Area!="5"){
			strdatos={
				soloactivos:'1',
				Id_Area:Id_Area,
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}else{
			strdatos={
				soloactivos:'1',
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}
	
	
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
			data: strdatos,
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargando1").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {

						var activos='';
						activos+='<option></option>';
						activos+='<optgroup label="Activos">';

						for (var i = 0; i < json.totalCount; i++) {
							activos+='<option value="'+json.data[i].Id_Activo.trim()+'">'+json.data[i].AF_BC.trim()+' '+json.data[i].Nombre_Activo.trim()+'</option>';
						}
						activos+='</optgroup>';
						$('#select-activos').html(activos);

						$("#gifcargando1").hide();
						$("#select-activos").show();
							
						$('#select-activos').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargando1").hide();
						$('#select-activos').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#select-activos').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
		
		$(".selectize-control").css("height", "34px");
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
				$("#gifcargando_usuarios").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {

						var usuarios='';
						usuarios+='<option></option>';
						usuarios+='<optgroup label="Usuarios">';

						for (var i = 0; i < json.totalCount; i++) {
							usuarios+='<option value="'+json.data[i].num_empleado.trim()+'">'+json.data[i].num_empleado.trim()+' '+json.data[i].nombre_completo.trim()+'</option>';
						}
						usuarios+='</optgroup>';
						$('#select-usuarios').html(usuarios);

						$("#gifcargando_usuarios").hide();
						$("#select-usuarios").show();
							
						$('#select-usuarios').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargando_usuarios").hide();
						$('#select-usuarios').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#select-usuarios').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	function cargaareas() {
		var resultado=new Array();
		data={Estatus_Reg: "1",accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_catareas/Siga_catareasFacade.Class.php",false, data);

		if(resultado.totalCount>0){
			$('#cmbareas').append($('<option>', { value: "-1" }).text("--Areas--"));
			for(var i = 0; i < resultado.totalCount; i++){
				if(resultado.data[i].Id_Area!="5"){
					$('#cmbareas').append($('<option>', { value: resultado.data[i].Id_Area }).text(resultado.data[i].Nom_Area));
				}
			}
		}else{
			$('#cmbareas').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	function ubic_prim() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Area:Id_Area,accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_prim/Siga_cat_ubic_primFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbubicprim').append($('<option>', { value: "-1" }).text("--Ubicación Primaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbubicprim').append($('<option>', { value: resultado.data[i].Id_Ubic_Prim }).text(resultado.data[i].Desc_Ubic_Prim));
			}
		}else{
			$('#cmbubicprim').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$( "#cmbubicprim" ).change(function() {
		$("#Val2").val($(this).val());
		if($(this).val()!="-1"){
			ubic_sec($(this).val());
		}else{
			$('#cmbubicsec').children('option').remove();
			$('#cmbubicsec').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
		}
	});
	function ubic_sec(Id_Ubic_Prim) {
		$('#cmbubicsec').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Ubic_Prim:Id_Ubic_Prim, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_sec/Siga_cat_ubic_secFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbubicsec').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbubicsec').append($('<option>', { value: resultado.data[i].Id_Ubic_Sec }).text(resultado.data[i].Desc_Ubic_Sec));
			}
		}else{
			$('#cmbubicsec').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	function propiedad() {
		var resultado=new Array();
		data={Estatus_Reg: "1", accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_propiedad/Siga_cat_propiedadFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbprpiedad').append($('<option>', { value: "-1" }).text("--Propiedad--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbprpiedad').append($('<option>', { value: resultado.data[i].Id_Propiedad }).text(resultado.data[i].Desc_Propiedad));
			}
		}else{
			$('#cmbprpiedad').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	function familia() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Area:Id_Area, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_familia/Siga_cat_familiaFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbfamilia').append($('<option>', { value: "-1" }).text("--Familia--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbfamilia').append($('<option>', { value: resultado.data[i].Id_Familia }).text(resultado.data[i].Desc_Familia));
			}
		}else{
			$('#cmbfamilia').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$( "#cmbfamilia" ).change(function() {
		$("#Val6").val($(this).val());
		if($(this).val()!="-1"){
			Subfamilia($(this).val());
		}else{
			$('#cmbsubfamilia').children('option').remove();
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("--Subfamilia--"));
		}
	});
	
	function Subfamilia(Id_Familia) {
		$('#cmbsubfamilia').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Familia: Id_Familia, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_subfamilia/Siga_cat_subfamiliaFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("--Subfamilia--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbsubfamilia').append($('<option>', { value: resultado.data[i].Id_Subfamilia }).text(resultado.data[i].Desc_Subfamilia));
			}
			
		}else{
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("Selecciona una familia"));
			
		}
	}
	
	
	function Departamento() {
		var resultado=new Array();
		data={Estatus_Reg: "1", accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_departamento/Siga_cat_departamentoFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbdepartamento').append($('<option>', { value: "-1" }).text("--Departamento--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbdepartamento').append($('<option>', { value: resultado.data[i].Id_Departamento }).text(resultado.data[i].Des_Departamento));
			}
		}else{
			$('#cmbdepartamento').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	buscar_activos=function(){
		cont_num_activos=0;
		var Agregar = true;
		var mensaje_error = "";
		
		var contador_validacion=0;
		//Area
		var Id_Area_Sesion=$("#idareasesion").val();
		///////////////////
		var Id_Activo=$("#select-activos").val();
		var cmbubicprim=$("#cmbubicprim").val();
		var cmbubicsec=$("#cmbubicsec").val();
		var cmbareas=$("#cmbareas").val();
		var cmbprpiedad=$("#cmbprpiedad").val();
		var cmbfamilia=$("#cmbfamilia").val();
		var cmbsubfamilia=$("#cmbsubfamilia").val();
		var cmbdepartamento=$("#cmbdepartamento").val();
		var Num_Empleado=$("#select-usuarios").val();
		
		if(Id_Activo.length > 0){
			contador_validacion=1;
		}
		//if($("#check_AF_BC").prop('checked')==true){
		//	contador_validacion=1;
		//	if (af_bc.length <= 0) {
		//		Agregar = false; 
		//		mensaje_error += " -Agrega el AF_BC<br />";
		//	}
		//}else{
		//	af_bc="";
		//}
		
		if($("#check_ubic_prim").prop('checked')==true){
			contador_validacion=1;
			if (cmbubicprim == "-1") {
				Agregar = false; 
				mensaje_error += " -Selecciona la Ubicacion Primaria<br />";
			}
		}else{
			cmbubicprim="";
		}
		
		if($("#check_ubic_sec").prop('checked')==true){
			contador_validacion=1;
			if (cmbubicsec == "-1") {
				Agregar = false; 
				mensaje_error += " -Selecciona la Ubicacion Secundaria<br />";
			}
		}else{
			cmbubicsec="";
		}
		
		if($("#check_areas").prop('checked')==true){
			contador_validacion=1;
			if (cmbareas == "-1") {
				Agregar = false; 
				mensaje_error += " -Selecciona el Area<br />";
			}
		}else{
			cmbareas="";
		}
		
		if(Id_Area_Sesion!="5"){
			contador_validacion=1;
			cmbareas=Id_Area_Sesion;
		}
		
		if($("#check_propedad").prop('checked')==true){
			contador_validacion=1;
			if (cmbprpiedad == "-1") {
				Agregar = false; 
				mensaje_error += " -Selecciona la Propiedad<br />";
			}
		}else{
			cmbprpiedad="";
		}
		
		if($("#check_familia").prop('checked')==true){
			contador_validacion=1;
			if (cmbfamilia == "-1") {
				Agregar = false; 
				mensaje_error += " -Selecciona la Familia<br />";
			}
		}else{
			cmbfamilia="";
		}
		
		if($("#check_subfamilia").prop('checked')==true){
			contador_validacion=1;
			if (cmbsubfamilia == "-1") {
				Agregar = false; 
				mensaje_error += " -Selecciona la Subfamilia<br />";
			}
		}else{
			cmbsubfamilia="";
		}
	
		if($("#check_departamento").prop('checked')==true){
			contador_validacion=1;
			if (cmbdepartamento == "-1") {
				Agregar = false; 
				mensaje_error += " -Selecciona el Departamento<br />";
			}
		}else{
			cmbdepartamento="";
		}
		
		
		if(Num_Empleado.length > 0){
			contador_validacion=1;
		}
		
		if(contador_validacion==0){
			Agregar = false; 
			mensaje_error += " -Selecciona un Filtro para la Busqueda<br />";
		}
		
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar)
		{
			$("#tablabusqueda").html("");
			//Limpiamos el array
			array_activos=[];
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					Id_Activo:Id_Activo,
					Id_Ubic_Prim:cmbubicprim,
					Id_Ubic_Sec:cmbubicsec,
					Id_Area:cmbareas,
					Id_Propiedad:cmbprpiedad,
					Id_Familia:cmbfamilia,
					Id_Subfamilia:cmbsubfamilia,
					Id_Departamento:cmbdepartamento,
					Num_Empleado:Num_Empleado,
					Estatus_Reg: '1',
					accion: 'busqueda_activos'
				},
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
					$("#gifcargando_tabla").show();
				},
				success: function (datos) {
					
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var tabla="";
					tabla+='  <form name="frm-example" id="frm-example">';
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
					tabla+='			<th>Ubicaci&oacute;n Primaria</th>';
					tabla+='			<th>Ubicaci&oacute;n Secundaria</th>';
					tabla+='			<th>Verificado Anteriormente</th>';
					tabla+='		</tr>';
					tabla+='		</thead>';
					tabla+='		<tbody>';	
					
					if (json.totalCount > 0) {
						cont_num_activos=parseInt(json.totalCount);
						for (var i = 0; i < json.totalCount; i++) {
							tabla+='		<tr>';
							//tabla+='			<td ><input type="checkbox" id="checkbox'+i+'" value="'+json.data[i].Id_Activo+'" id="'+json.data[i].Id_Activo+'" onchange="pasarcheckactivos('+i+','+json.data[i].Id_Activo+')"></td>';
							tabla+='			<td ><div align="center"><input type="checkbox" id="checkbox'+i+'" value="'+json.data[i].Id_Activo+'" id="'+json.data[i].Id_Activo+'" ></div></td>';
							tabla+='			<td >'+json.data[i].AF_BC+'</td>';
							tabla+='			<td >'+json.data[i].Nombre_Activo+'</td>';
							tabla+='			<td >'+json.data[i].Marca+'</td>';
							tabla+='			<td >'+json.data[i].Modelo+'</td>';
							tabla+='			<td >'+json.data[i].NumSerie+'</td>';
							tabla+='			<td >'+json.data[i].Nom_Area+'</td>';
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
							tabla+='			<td>'+json.data[i].Lote+'</td>';
							tabla+='		</tr>';
							
						}
					}else{
						mensajesalerta("Informaci&oacute;n", "No se Encontraron Activos", "info", "dark");
					}
				
					tabla+='		</tbody>';
					tabla+='	</table>';
					tabla+='  </div>';
					tabla+='  </from>';
					
					$("#tablabusqueda").html(tabla);
					$("#gifcargando_tabla").hide();
					
					name_table=$('#display_busqueda').DataTable({
					  "paging": true,
					  "lengthChange": true,
					  "ordering": true,
					  "info": true,
					  "autoWidth": true, 
					  "language": {
							//"lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
							//"zeroRecords": "Sin Resultados",
							//"info": "Monstrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
							//"infoEmpty": "Sin Resultados",
							//"infoFiltered": "(Monstrando  _MAX_ del total de registros)",
							//"search": "Busqueda: ",
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
					
				}
			});
		}
	}
	
	//Pasamos los id de los activos a un array como cadena separados por,
	pasarcheckactivos=function(Indice, Id_Activo){
		if(!$("#checkbox"+Indice).prop('checked')){
			array_activos[Indice]="N";
		}else{
			array_activos[Indice]=""+Id_Activo+"";
		}
		console.log(array_activos);
	}
	
	//Llenar Tabla Dinamicamente
	$('#tableverificacion').DataTable({
		"scrollY": 500,
        "scrollX": true,
        "paging": true,
		"autoWidth": false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../fachadas/activos/siga_verificacion_activos/Siga_verificacion_activosFacade.Class.php",
            "type": "POST",
			"data":{
				"Id_Area": $("#idareasesion").val()
			},
        },
        "columns": [
			{ "data": "Id_Verificacion", 
			"visible": true},
			{
			    "data": function (obj) {
			        var edicion = obj.Fecha[0]+""+obj.Fecha[1]+""+obj.Fecha[2]+""+obj.Fecha[3]+"/"+obj.Fecha[4]+""+obj.Fecha[5]+"/"+obj.Fecha[6]+""+obj.Fecha[7];
			    	return edicion;
			    }
			},
			
			{ "data": "Comentarios"},
			{
			    "data": function (obj) {
			        var edicion = '';
			        edicion += '<span onclick="pasarvalores(' + obj.Id_Verificacion + ')"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
                    //edicion += '<span onclick="pasarelimina(' + obj.Id_Verificacion + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
					return edicion;
			    }
			}
			
        ], "language": {
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
        }
    });
	
	limpiarcampos=function(){
		name_table="";
		$('#cmbubicsec').children('option').remove();
		$('#cmbubicsec').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
		
		$('#cmbsubfamilia').children('option').remove();
		$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("--Subfamilia--"));
		
		var Id_Area=$("#idareasesion").val();
		
		if(Id_Area!="5"){
			$("#div_area").hide();
		}else{
			$("#div_area").show();
		}
	
	
		$("#Id_Verificacion").val("");
		
		//Limpiamos el autocomplete Activos
		var Num_Activo=$.trim($("#select-activos").val());
		if(Num_Activo!=""){			
			if(Num_Activo.length > 0){
				var $select3 = $('#select-activos').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
			}
		}
		//
		$("#cmbubicprim").val("-1");
		$("#cmbubicsec").val("-1");
		$("#cmbareas").val("-1");
		$("#cmbprpiedad").val("-1");
		$("#cmbfamilia").val("-1");
		$("#cmbsubfamilia").val("-1");
		$("#cmbdepartamento").val("-1");
		var dt = new Date();

		// Display the month, day, and year. getMonth() returns a 0-based number.
		var month = dt.getMonth()+1;
		var day = dt.getDate();
		var year = dt.getFullYear();
		if(day<10){
			day=0+""+day;
		}
		
		if(month<10){
			month=0+""+month;
		}
		$("#Fecha").val(year + '/' + month + '/' + day);

		$("#Comentarios").val("");
		
		
		//Limpiar checkbox
		$("#check_AF_BC").prop( "checked",false);
		$("#check_areas").prop( "checked",false);
		$("#check_subfamilia").prop( "checked",false);
		$("#check_ubic_prim").prop( "checked",false);
		$("#check_propedad").prop( "checked",false);
		$("#check_departamento").prop( "checked",false);
		$("#check_familia").prop( "checked",false);
		$("#check_usuario_resp").prop( "checked",false);
		$("#check_unic_sec").prop( "checked",false);
		
		//Limpiamos el array
		array_activos=[];
		
		//Limpiamos contenido de la tabla dinamica activos
		$("#tablabusqueda").html("");
		
		
		////////////////////////////////
		//Mostramos los controles
		$("#div_activos").show();
		$("#div_ubicprimaria").show();
		$("#div_ubic_sec").show();
		$("#div_propiedad").show();
		$("#div_familia").show();
		$("#div_subfamilia").show();
		$("#div_departamento").show();
		$("#div_usuarios").show();
		$("#Buscar_Activos").show();
		
		//Reiniciar Contador a cero
		cont_num_activos=0;
		
		//Limpiar variable del datatable
		name_table="";
		
		
	}
	
	//Guardar Registros
	$("#guardar").click(function () {
		//Limpiamos el array
		array_activos=[];
		var Agregar = true;
		var mensaje_error = "";
		//Area
		var Id_Area_Sesion=$("#idareasesion").val();
		
		var Id_Verificacion=$("#Id_Verificacion").val();
		var Fecha=$("#Fecha").val();
		var Comentarios=$.trim($("#Comentarios").val());
		
		var strDatos=""; 
		
		
		if (Fecha.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Fecha<br />";
		}else{
			Fecha=Fecha[0]+""+Fecha[1]+""+Fecha[2]+""+Fecha[3]+""+Fecha[5]+""+Fecha[6]+""+Fecha[8]+""+Fecha[9];
		}
		
		if (Comentarios.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar los Comentarios<br />";
		}
		
		//Validacion checkbox
		var contador=0;
		if(cont_num_activos > 0){
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
		
		}else{
			Agregar = false; 
			mensaje_error += " -Por favor realiza la busqueda.<br />";
		}
		//Fin
		
		console.log(array_activos);
		
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		if(Agregar){
			var usuariosesion=$("#usuariosesion").val();
			
				
			if(Id_Verificacion.length <= 0){
				strDatos ={
					Id_Area:Id_Area_Sesion,
					Fecha:Fecha,
					Comentarios:Comentarios,
					Usr_Inser:usuariosesion,
					array_activos:array_activos,
					Estatus_Reg:"1",				
					accion:"guardar"
				};
			}else{
				strDatos ={
					Id_Verificacion:Id_Verificacion,
					Id_Area:Id_Area_Sesion,
					Fecha:Fecha,
					Comentarios:Comentarios,
					Usr_Mod:usuariosesion,
					array_activos:array_activos,
					Estatus_Reg:"2",				
					accion:"guardar"
				};
			}
		
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_verificacion_activos/Siga_verificacion_activosFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {
            
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					limpiarcampos();
						
					$('#verificacionActivo').modal('hide');
					$('#tableverificacion').DataTable().ajax.reload();
					if(json.totalCount>0){
						mensajesalerta("&Eacute;xito", "Guardado Correctamente.", "success", "dark");
					}else{
						mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//Pasar Valores al Editar
	pasarvalores=function(id) {
		limpiarcampos();
        if (id != "") {
            $.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_verificacion_activos/Siga_verificacion_activosFacade.Class.php",
                async: false,
                data: {
                    Id_Verificacion: id,
                    accion: "consultar_verificacion"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
                success: function (datos) {
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var tabla="";	
					
					$("#div_activos").hide();
					$("#div_ubicprimaria").hide();
					$("#div_ubic_sec").hide();
					$("#div_area").hide();
					$("#div_propiedad").hide();
					$("#div_familia").hide();
					$("#div_subfamilia").hide();
					$("#div_departamento").hide();
					$("#div_usuarios").hide();
					$("#Buscar_Activos").hide();
					
					if (json.totalCount > 0) {
						if(json.data[0].Fecha.trim()!=""){
							var Fecha=json.data[0].Fecha[0]+""+json.data[0].Fecha[1]+""+json.data[0].Fecha[2]+""+json.data[0].Fecha[3]+"/"+json.data[0].Fecha[4]+""+json.data[0].Fecha[5]+"/"+json.data[0].Fecha[6]+""+json.data[0].Fecha[7];	
							$("#Fecha").val(Fecha);
						}
						$("#Id_Verificacion").val(json.data[0].Id_Verificacion);
						$("#Comentarios").val(json.data[0].Comentarios.trim());
					}
					
					//Llenamos la tabla dinamica dentro de la ventana modal
					//Mostramos la ventana Modal
					$('#verificacionActivo').modal('show');
					tabla+='  <form name="frm-example" id="frm-example">';
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
					tabla+='			<th>Ubicaci&oacute;n Primaria</th>';
					tabla+='			<th>Ubicaci&oacute;n Secundaria</th>';
					tabla+='			<th>Verificado Anteriormente</th>';
					tabla+='		</tr>';
					tabla+='		</thead>';
					tabla+='		<tbody>';	
					
					if (json.totalCountDetalle > 0) {
						cont_num_activos=parseInt(json.totalCountDetalle);
						for (var i = 0; i < json.totalCountDetalle; i++) {
							tabla+='		<tr>';
							//tabla+='			<td align="center"><input type="checkbox" id="checkbox'+i+'" value="'+json.data_Detalle[i].Id_Activo+'" id="'+json.data_Detalle[i].Id_Activo+'" onchange="pasarcheckactivos('+i+','+json.data_Detalle[i].Id_Activo+')" checked></td>';
							tabla+='			<td ><div align="center"><input type="checkbox" id="checkbox'+i+'" value="'+json.data_Detalle[i].Id_Activo+'" id="'+json.data_Detalle[i].Id_Activo+'" checked></div></td>';
							tabla+='			<td >'+json.data_Detalle[i].AF_BC+'</td>';
							tabla+='			<td >'+json.data_Detalle[i].Nombre_Activo+'</td>';
							tabla+='			<td >'+json.data_Detalle[i].Marca+'</td>';
							tabla+='			<td >'+json.data_Detalle[i].Modelo+'</td>';
							tabla+='			<td >'+json.data_Detalle[i].NumSerie+'</td>';
							tabla+='			<td>'+json.data_Detalle[i].Nom_Area+'</td>';
							tabla+='			<td>';
							if(json.data_Detalle[i].Desc_Ubic_Prim!=null){
								tabla+=				json.data_Detalle[i].Desc_Ubic_Prim;
							}
							tabla+='			</td>';
							
							tabla+='			<td>';
							if(json.data_Detalle[i].Desc_Ubic_Sec!=null){
								tabla+=				json.data_Detalle[i].Desc_Ubic_Sec;
							}
							tabla+='			</td>';
							
							tabla+='			<td>'+json.data_Detalle[i].Lote+'</td>';
							tabla+='		</tr>';
							//Llenamos el array vacio
							array_activos[i]=json.data_Detalle[i].Id_Activo;
						}
						
					}else{
						mensajesalerta("Informaci&oacute;n", "No se Encontraron Activos", "info", "dark");
					}
					
					tabla+='		</tbody>';
					tabla+='	</table>';
					tabla+='  </div>';
					tabla+='  </form>';
					
					$("#tablabusqueda").html(tabla);
					
					
					name_table=$('#display_busqueda').DataTable({
					  "paging": true,
					  "lengthChange": true,
					  "ordering": true,
					  "info": true,
					  "autoWidth": true, 
					  "language": {
							//"lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
							//"zeroRecords": "Sin Resultados",
							//"info": "Monstrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
							//"infoEmpty": "Sin Resultados",
							//"infoFiltered": "(Monstrando  _MAX_ del total de registros)",
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

                    ////////////////////////////////////////////////////////////////
                },
                error: function () {
                    mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
        }
    }
		
});

</script>