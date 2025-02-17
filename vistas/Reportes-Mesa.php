      <!-- Main row -->
      <div class="row">
        <!-- Tab panes -->
            <div class="gray">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  
				  <div class="row">
					<div class="col-md-3">
                      
					  <span><font color="red">*</font></span><label  class="control-label" style="font-size: 11px;">Fecha Inicial</label>
                        <input type="text" class="form-control pull-right datepicker" id="FechaInicial" placeholder="Fecha Inicial" autocomplete="off">
                    </div>
					<div class="col-md-3">
                      <span><font color="red">*</font></span><label  class="control-label" style="font-size: 11px;">Fecha Final</label>
                        <input type="text" class="form-control pull-right datepicker" id="FechaFinal" placeholder="Fecha Final" autocomplete="off">
                    </div>
					<div class="col-md-3 col-sm-12 col-xs-12 form-group">
						<label  class="control-label" style="font-size: 11px;">Ubicaci&oacute;n Primaria</label>
						<select class="form-control" id="cmbubicprim">
						</select>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12 form-group">
						<div class="form-group">
						<label  class="control-label" style="font-size: 11px;">Ubicaci&oacute;n Secundaria</label>
							<select class="form-control" id="cmbubicsec">
								<option value="-1">--Ubicación Secundaria--</option>
							</select>
						</div>
                    </div>
				  </div>
				  
				  <div class="row">
                    
					<div class="col-md-3 col-sm-12 col-xs-12 form-group">
						<div class="form-group">
						<label  class="control-label" style="font-size: 11px;">Clase</label>
							<select class="form-control" id="cmbclase">
							</select>
						</div>
                    </div>
					<div class="col-md-3">
						<label class="control-label"  style="font-size: 11px;">Clasificación</label>
						<select class="form-control" id="cmbclasificacion">
							<option value="-1">--Clasificación--</option>
						</select>
                    </div>
					<div class="col-md-3">
						<label  class="control-label" style="font-size: 11px;">Familia</label>
						<select class="form-control" id="cmbfamilia">
					    </select>
                    </div>
                    <div class="col-md-3">
                      <label  class="control-label" style="font-size: 11px;">Subfamilia</label>
						<select class="form-control" id="cmbsubfamilia">
							<option value="-1">--Subfamilia--</option>
						</select>
                    </div>
                  </div>
                  <div class="row">
                    
                 
					<div class="col-md-3">
                      <label  class="control-label" style="font-size: 11px;">Sección</label>
						<select class="form-control" id="cmbseccion">
						</select>
                    </div>
										
										<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label" style="font-size: 11px;">Categoría</label>	
							<select class="form-control" id="cmbcategoria">
								<option value="-1">--Categoría--</option>
							</select>
						</div>	
					</div>
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label" style="font-size: 11px;">Subcategoria</label>	
							<select class="form-control"  id="cmbsubcategoria">
								<option value="-1">--Subcategoría--</option>
							</select>
						</div>	
					</div>
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="form-group">
							<label class="control-label" style="font-size: 11px;">Tipo de Fecha</label>	
							<select class="form-control"  id="cmb_fecha_seguimiento">
								<option value="1">Fecha Solicitud</option>
								<option value="2">Fecha Seguimiento</option>
								<option value="3">Fecha Espera Cierre</option>
								<option value="4" selected>Fecha Cierre</option>
							</select>
						</div>	
					</div>
										
                  </div>
				 
				  
				  <div class="row">
                    <div class="col-md-4">
						<br>
						<button type="button" class="btn chs" onclick="buscar_info()">Buscar</button>
                    </div>
                  </div>
               
                </div>
             
              </div>
            </div>
            
			<div class="col-md-12" style="display:none">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body" align="center">
						<div class="col-md-3 col-sm-12 col-xs-12 form-group"></div>
						<div class="col-md-2 col-sm-12 col-xs-12 form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Fecha Inicial</label>
							<input type="text" class="form-control pull-right datepicker" id="Fecha_Inicial_Serv_Reg">
						</div>
						<div class="col-md-2 col-sm-12 col-xs-12 form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Fecha Final</label>
							<input type="text" class="form-control pull-right datepicker" id="Fecha_Final_Serv_Reg">
						</div>
						<div class="col-md-2 col-sm-12 col-xs-12 form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Filtrar</label>
							<button type="button" class="form-control btn chs" onclick="grafica_servicios_registrados()">Filtrar</button>
						</div>
						<div class="col-md-3 col-sm-12 col-xs-12 form-group"></div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group" align="center">
							<label id="Regresar_Grafica_1"></label>
						</div>
						<div align="center" class="col-md-12 col-sm-12 col-xs-12 form-group" id="Alerta_Graf_y_Tabla_1">
						</div>
						
						<div id="pie-chart-2" class="highcharts pie col-md-12 col-sm-12 col-xs-12 form-group"></div>
						
					</div>
				</div>
			</div>	
		</div>
	  

	<!-- ==== Area del DataTable ==== -->
	<div class="modal-body nopsides">
		<div class="modal-body nopsides" id="div_tabla"></div>
	</div>
	  
	  
	  
	  <!-- /.row -->
<!-- File Input -->
<script src="../plugins/fileinput/fileinput.js"></script>
<script src="../plugins/fileinput/fileinput_locale_es.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!--<script src="../plugins/fullcalendaryear/fullcalendar.js"></script>-->

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>



  <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
  <script src="../plugins/datatables/buttons.flash.min.js"></script>
  <script src="../plugins/datatables/jszip.min.js"></script>
  <script src="../plugins/datatables/pdfmake.min.js"></script>
  <script src="../plugins/datatables/vfs_fonts.js"></script>
  <script src="../plugins/datatables/buttons.html5.min.js"></script>
  <script src="../plugins/datatables/buttons.print.min.js"></script>


<script>
	$('#FechaInicial').datepicker({ 
		format: 'dd/mm/yyyy',
		autoclose: true,
	}).datepicker();
	
	$('#FechaFinal').datepicker({ 
		format: 'dd/mm/yyyy',
		autoclose: true,
	}).datepicker();

	var carga_mes_actual = moment().format("MM");
	$("#cmbmeses_barra").val(carga_mes_actual);
	$("#cmbmeses_pie").val(carga_mes_actual);
	
	var Id_Area_Login=$("#idareasesion").val();
	if(Id_Area_Login!="5"){
		ubic_prim(Id_Area_Login);
		familia(Id_Area_Login) 
		Clase(Id_Area_Login);
		Seccion(Id_Area_Login);
	}else{
		$('#cmbubicprim').append($('<option>', { value: "-1" }).text("--Ubicación Primaria (Selecciona un Área)--"));
		$('#cmbclase').append($('<option>', { value: "-1" }).text("--Clase (Selecciona un Área)--"));
		$('#cmbfamilia').append($('<option>', { value: "-1" }).text("--Familia (Selecciona un Área)--"));
	}


	function ubic_prim(Id_Area) {		
		var resultado=new Array();
		data={Estatus_Reg: "1",Id_Area:Id_Area, accion: "consultar"};
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
	
	$("#cmbubicprim").change(function() {
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
	
	function Clase(Id_Area) {
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Area:Id_Area, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_clase/Siga_cat_claseFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbclase').append($('<option>', { value: "-1" }).text("--Clase--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbclase').append($('<option>', { value: resultado.data[i].Id_Clase }).text(resultado.data[i].Desc_Clase));
			}
		}else{
			$('#cmbclase').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$("#cmbclase").change(function() {
		if($(this).val()!="-1"){
			Clasificacion($(this).val());
		}else{
			$('#cmbclasificacion').children('option').remove();
			$('#cmbclasificacion').append($('<option>', { value: "-1" }).text("--Clasificación--"));
		}
	});
	
	function Clasificacion(Id_Clase) {
		$('#cmbclasificacion').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1",Id_Clase:Id_Clase, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_clasificacion/Siga_cat_clasificacionFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbclasificacion').append($('<option>', { value: "-1" }).text("--Clasificación--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbclasificacion').append($('<option>', { value: resultado.data[i].Id_Clasificacion }).text(resultado.data[i].Desc_Clasificacion));
			}
		}else{
			$('#cmbclasificacion').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	function familia(Id_Area) {
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
	
	$("#cmbfamilia").change(function() {
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

	function Seccion(Id_Area) {		
		var resultado=new Array();
		data={Estatus_Reg: "1",Id_Area:Id_Area, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ticket_seccion/Siga_cat_ticket_seccionFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbseccion').append($('<option>', { value: "-1" }).text("--Sección--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbseccion').append($('<option>', { value: resultado.data[i].Id_Seccion }).text(resultado.data[i].Desc_Seccion));
			}
		}else{
			$('#cmbseccion').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
  
	$( "#cmbseccion" ).change(function() {
		var Val=$(this).val();
		if(Val!="-1"){
			cargacategoria(Val);
			//gestores(Val);
		}else{
			$('#cmbcategoria').children('option').remove();
			$('#cmbcategoria').append($('<option>', { value: "-1" }).text("--Categoría--"));
		
			$("#cmbsubcategoria").empty();
			$('#cmbsubcategoria').append($('<option>', { value: "-1" }).text("--Subcategoría--"));
			
			//$("#cmbgestores").empty();
			//$('#cmbgestores').append($('<option>', { value: "-1" }).text("--Gestores--"));
		}
	});
 
  cargacategoria=function(Id_Seccion) {
		var resultado=new Array();
		data={orden:'Desc_Categoria',accion: "consultar",Id_Seccion:Id_Seccion};
		resultado=cargo_cmb("../fachadas/activos/Siga_cat_ticket_categoria/Siga_cat_ticket_categoriaFacade.Class.php",false, data);
        $('#cmbcategoria').empty();
		if(resultado.totalCount>0){
			$('#cmbcategoria').append($('<option selected value="-1">', { value: "-1" }).text("--Categoría--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{
				if (resultado.data[i].Id_Categoria != '') 			
				$('#cmbcategoria').append($('<option>', { value: resultado.data[i].Id_Categoria }).text(resultado.data[i].Desc_Categoria));
			}
		}else{
			$('#cmbcategoria').append($('<option selected value="-1">', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$("#cmbcategoria").change(function (event){
		if ($("#cmbcategoria").val() != -1)
			cargasubcategoria($("#cmbcategoria").val());
	    else
		{
			$("#cmbsubcategoria").empty();
			$('#cmbsubcategoria').append($('<option>', { value: "-1" }).text("--Subcategoría--"));
		}
	});
	
	function cargasubcategoria(idcategoria){
		var resultado=new Array();
		data={orden:'Desc_Subcategoria',accion: "consultar",Id_Categoria:idcategoria};
		resultado=cargo_cmb("../fachadas/activos/Siga_cat_ticket_subcategoria/Siga_cat_ticket_subcategoriaFacade.Class.php",false, data);
        $('#cmbsubcategoria').empty();
		if(resultado.totalCount>0){
			$('#cmbsubcategoria').append($('<option>', { value: "-1" }).text("--Subcategoría--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{
				if (resultado.data[i].Id_Subcategoria != '') 			
				$('#cmbsubcategoria').append($('<option>', { value: resultado.data[i].Id_Subcategoria }).text(resultado.data[i].Desc_Subcategoria));
			}
		}else{
			$('#cmbsubcategoria').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
 
 
	Fecha_Format=function(Fecha, Formato){
		var Fech_Result="";
		
		if(Fecha!=""){
			if(Formato=="aaaammdd"){
				Fech_Result=Fecha[6]+""+Fecha[7]+""+Fecha[8]+""+Fecha[9]+""+Fecha[3]+""+Fecha[4]+""+Fecha[0]+""+Fecha[1];
			}
			
			if(Formato=="aaaa-mm-dd"){
				Fech_Result=Fecha.substring(6, 10)+"-"+Fecha.substring(3, 5)+"-"+Fecha.substring(0, 2);
			}
		}else{
			Fech_Result=Fecha;
		}
		
		return Fech_Result;
	}	
	
	
	function buscar_info(){
		tabla_popup_tickets();
	}
	
	function tabla_popup_tickets(){
		var Id_Area=$("#idareasesion").val();
		
		var Ubic_Prim=$("#cmbubicprim").val();
		var Ubic_Sec=$("#cmbubicsec").val();
		var Clase=$("#cmbclase").val();
		var Clasificacion=$("#cmbclasificacion").val();
		var Familia=$("#cmbfamilia").val();
		var Subfamilia=$("#cmbsubfamilia").val();
		var Seccion=$("#cmbseccion").val();
		var Id_Categoria=$("#cmbcategoria").val();
		var Id_Subcategoria=$("#cmbsubcategoria").val();
		var FechaInicial=$("#FechaInicial").val();
		var FechaFinal=$("#FechaFinal").val();
		var Tipo_Seg_Fecha=$("#cmb_fecha_seguimiento").val();
		
		var Anio=$("#cmbanios").val();
		var Meses="";
		var Tipo_Mantenimiento="";
		
		var Estatus_Proceso="";
		
		if(FechaInicial.length>0 && FechaFinal.length>0){
			if(Id_Area!="" && Anio!=""){
				$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
					async: true,
					data: {
						Id_Area:Id_Area,
						Anio:Anio,
						Ubic_Prim:Ubic_Prim,
						Ubic_Sec:Ubic_Sec,
						Clase:Clase,
						Clasificacion:Clasificacion,
						Familia:Familia,
						Subfamilia:Subfamilia,
						Seccion:Seccion,
						Id_Categoria:Id_Categoria,
						Id_Subcategoria:Id_Subcategoria,
						Tipo_Mantenimiento:Tipo_Mantenimiento,
						Estatus_Proceso:Estatus_Proceso,
						Fecha_Inicial:FechaInicial,
						Fecha_Final:FechaFinal,
						Tipo_Seg_Fecha:Tipo_Seg_Fecha,
						accion: "Reporte_Mesa_de_Ayuda"
					},
					dataType: "html",
					beforeSend: function (xhr) {
						jsShowWindowLoad("Se esta realizando la busqueda...");
					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						var tabla="";
						var array_tabla=[];
					
					if(json.totalCount>0){
						
						tabla+='<div class="box-body"><div class="table-responsive">';
						tabla+='  <table id="tabla_solicitudes" class="table table-bordered table-striped table-chs" width="100%">';
						tabla+='	<thead>';
						tabla+='	  <tr>';
						tabla+='		<th>AF_BC</th>';
						tabla+='		<th>Ubic. Prim.</th>';
						tabla+='		<th>Ubic. Sec.</th>';
						tabla+='		<th>Clase</th>';
						tabla+='		<th>Clasificación</th>';
						tabla+='		<th>Marca</th>';
						tabla+='		<th>Modelo</th>';
						tabla+='		<th>Num. Serie</th>';
						tabla+='		<th>Nombre Activo</th>';
						tabla+='		<th>Propiedad</th>';
						tabla+='		<th>Categoria</th>';
						tabla+='		<th>Subcategoria</th>';
						tabla+='		<th>Motiv. Aparente</th>';
						tabla+='		<th>Motiv. Real</th>';
						tabla+='		<th>Desc. Motivo Reporte</th>';
						tabla+='		<th>Desc. Acci. Realizadas</th>';
						tabla+='		<th>No. Empleado Gestor</th>';
						tabla+='		<th>Nombre Gestor</th>';
						tabla+='		<th>Cal. Solución Ofrecida</th>';
						tabla+='		<th>Cal. Actitud del servicio</th>';
						tabla+='		<th>Cal. Tiempo de Respuesta</th>';
						
						tabla+='		<th>Comentarios Cierre de Solicitud</th>';
						tabla+='		<th>No. Empleado Solicitante</th>';
						tabla+='		<th>Nombre Solicitante</th>';
						tabla+='		<th>Fecha Solicitud</th>';
						tabla+='		<th>Fecha Seguimiento</th>';
						tabla+='		<th>Fecha por Cerrar</th>';
						tabla+='		<th>Fecha Cierre</th>';
						tabla+='		<th>Folio Reporte</th>';
						tabla+='		<th>Horas Empleadas</th>';
						tabla+='		<th>Costo Total Externo</th>';
						tabla+='		<th>Costo Total Interno</th>';
						tabla+='	  </tr>';
						tabla+='	</thead>';
						tabla+='	<tbody>';
						for(var i=0;i < json.totalCount; i++){
							tabla+='	  <tr>';
							tabla+='		<td>'; if(json.data[i].AF_BC!=null){tabla+=json.data[i].AF_BC;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Desc_Ubic_Prim!=null){tabla+=json.data[i].Desc_Ubic_Prim;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Desc_Ubic_Sec!=null){tabla+=json.data[i].Desc_Ubic_Sec;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Desc_Clase!=null){tabla+=json.data[i].Desc_Clase;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Desc_Clasificacion!=null){tabla+=json.data[i].Desc_Clasificacion;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Marca!=null){tabla+=json.data[i].Marca;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Modelo!=null){tabla+=json.data[i].Modelo;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].NumSerie!=null){tabla+=json.data[i].NumSerie;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Nombre_Activo!=null){tabla+=json.data[i].Nombre_Activo;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Desc_Propiedad!=null){tabla+=json.data[i].Desc_Propiedad;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].desc_categoria!=null){tabla+=json.data[i].desc_categoria;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].desc_subcategoria!=null){tabla+=json.data[i].desc_subcategoria;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Desc_Motivo_Aparente!=null){tabla+=json.data[i].Desc_Motivo_Aparente;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Desc_Motivo_Real!=null){tabla+=json.data[i].Desc_Motivo_Real;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Desc_Motivo_Reporte!=null){tabla+=json.data[i].Desc_Motivo_Reporte;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Desc_Acci_Realiz!=null){tabla+=json.data[i].Desc_Acci_Realiz;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Gestor_Nomina!=null){tabla+=json.data[i].Gestor_Nomina;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Gestor!=null){tabla+=json.data[i].Gestor;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Id_Respuesta1!=null){tabla+=calificacion(json.data[i].Id_Respuesta1);} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Id_Respuesta2!=null){tabla+=calificacion(json.data[i].Id_Respuesta2);} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Id_Respuesta3!=null){tabla+=calificacion(json.data[i].Id_Respuesta3);} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Comentarios_Cierre!=null){tabla+=json.data[i].Comentarios_Cierre;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Solicitante_Nomina!=null){tabla+=json.data[i].Solicitante_Nomina;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Solicitante!=null){tabla+=json.data[i].Solicitante;} tabla+='</td>';
							tabla+='		<td data-sort="' + (json.data[i].Fecha_Cierre !=null ? moment(moment(json.data[i].Fecha_Solicitud, 'DD/MM/YYYY')).format('YYYYMMDD') : "") + '">' + (json.data[i].Fecha_Solicitud != null ? json.data[i].Fecha_Solicitud : "") + '</td>';
							tabla+='		<td data-sort="' + (json.data[i].Fecha_Cierre !=null ? moment(moment(json.data[i].Fecha_Seguimiento, 'DD/MM/YYYY')).format('YYYYMMDD') : "") + '">' + (json.data[i].Fecha_Seguimiento != null ? json.data[i].Fecha_Seguimiento : "") + '</td>';
							tabla+='		<td data-sort="' + (json.data[i].Fecha_Cierre !=null ? moment(moment(json.data[i].Fecha_Esp_Cierre, 'DD/MM/YYYY')).format('YYYYMMDD') : "") + '">' + (json.data[i].Fecha_Esp_Cierre != null ? json.data[i].Fecha_Esp_Cierre : "") + '</td>';
							tabla+='		<td data-sort="' + (json.data[i].Fecha_Cierre !=null ? moment(moment(json.data[i].Fecha_Cierre, 'DD/MM/YYYY')).format('YYYYMMDD') : "") + '">' + (json.data[i].Fecha_Cierre != null ? json.data[i].Fecha_Cierre : "") + '</td>';
							tabla+='		<td>'; if(json.data[i].Folio_Reporte!=null){tabla+=json.data[i].Folio_Reporte;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Horas_Empleadas!=null){tabla+=json.data[i].Horas_Empleadas;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Cost_Tot_Exter!=null){tabla+=json.data[i].Cost_Tot_Exter;} tabla+='</td>';
							tabla+='		<td>'; if(json.data[i].Cost_Tot_Inter!=null){tabla+=json.data[i].Cost_Tot_Inter;} tabla+='</td>';
							tabla+='	  </tr>';	
						}
						tabla+='	</tbody>';
						tabla+='  </table>';
						tabla+='</div></div><br>';
						$("#div_tabla").html(tabla);
						
						$('#tabla_solicitudes').DataTable({
						  "dom": 'Bfrtip',
						   "lengthMenu": [
						   	[ 10, 25, 50, 100000 ],
						   	[ '10 Filas', '25 Filas', '50 Filas', 'Todos' ]
						   ],
						   "buttons": [
						   	
						   	'copy',  'excel', 'pageLength'
						   ],
							 "order": [[ 1, "desc" ]],
						   "scrollY": 500,
						   "scrollX": true,
						   "processing": true,
						   //"serverSide": true,
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
							}
						});
						
					}else{
						$("#div_tabla").html("");
						mensajesalerta("Informaci&oacute;n", "No se encontraron Resultados", "info", "dark");
					}
					
					},
					complete: function (xhr) {
						jsRemoveWindowLoad();
					},
					error: function () {
						$("#div_tabla").html("");
						mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
					}
					
					
				});
				
			}
		}else{
			$("#div_tabla").html("");
			mensajesalerta("Informaci&oacute;n", "Es necesario agregar la Fecha Inicial y Fecha Final", "info", "dark");
		}	
		
	}
   
  function calificacion(cal){
		calif=0;
		if(cal==1){
			calif=5;	
		}
		
		if(cal==2){
			calif=4;	
		}
		
		if(cal==3){
			calif=3;	
		}
		
		if(cal==4){
			calif=2;	
		}
		
		if(cal==5){
			calif=1;	
		}
		
		return calif;
		
	} 

  $(document).ready(function(){
  
	});//ND

</script>
</body>
</html>
