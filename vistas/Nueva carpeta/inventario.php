    <!-- File Input -->
  <link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
  <script src="../plugins/docsupport/standalone/selectize.js"></script>
  <script src="../plugins/docsupport/index.js"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
  
 <!-- File Input -->
  <link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-offset-1 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box azul">
          <!-- Button trigger modal -->
            <a href="#" data-toggle="modal" data-target="#altaEquipo" onclick="limpiarcampos();limpiarcamposproveedor();limpiarcamposcontabilidad()">
              <span class="info-box-icon bg-aqua"><i class="fa fa-arrow-circle-o-up"></i></span>
              <div class="info-box-content">
                <h3 class="info-box-text">alta equipo</h3>
              </div>
              <!-- /.info-box-content -->
            </a>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box verde">
            <a href="#" data-toggle="modal" data-target="#bajaEquipo" onclick="limpiarcamposbaja()">
              <span class="info-box-icon bg-green"><i class="fa fa-arrow-circle-o-down"></i></span>
              <div class="info-box-content">
                <h3 class="info-box-text">baja equipo</h3>
              </div>
              <!-- /.info-box-content -->
            </a>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box amarillo">
            <a href="#" data-toggle="modal" data-target="#reubicacionEquipo" onclick="limpiarcamposreubicacion()">
              <span class="info-box-icon bg-yellow"><i class="fa fa-map-marker"></i></span>
              <div class="info-box-content">
                <h3 class="info-box-text two-lines">reubicación de<br> equipo</h3>
              </div>
              <!-- /.info-box-content -->
            </a>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
      <div class="row">
        <div class="col-md-12">
          <hr class="separation-line">
        </div>
      </div>

      <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs azulf" role="tablist">
          <li role="presentation" class="active"><a href="#inventario" aria-controls="inventario" role="tab" data-toggle="tab">Inventario</a></li>
         
          <li role="presentation"><a href="#bajas" aria-controls="bajas" role="tab" data-toggle="tab" onclick="tablabaja()">Bajas</a></li>
          <li role="presentation"><a href="#reubicacion" aria-controls="reubicacion" role="tab" data-toggle="tab" onclick="tablareubicacion()">Reubicación</a></li>
          <li class="export"><a href="#"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar</a></li>
        </ul>
      </div>

      <!-- Main row -->
      <div class="row">

        <!-- Tab panes -->
        <div class="tab-content">
          <!-- inventario -->
          <div role="tabpanel" class="tab-pane active" id="inventario">
            <!-- table-results -->
            <div class="col-md-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div>
                      
                  <table id="tablaactivos" class="table table-bordered table-striped table-chs" style="width:100%" width="100%">
                    <thead>
                      <tr>
                        <th>No.</th>
						<th>Editar</th>
						<th>Pdf</th>
						<th>AF/BC</th>
                        <th width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Foto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
                        <th>Área</th>
                        <th>Clasificación</th>
                        <th>Propiedad</th>
                        <th>Tipo de activo</th>
                        <th>Descripción</th>
                        <th>Ubicación<br> Primaria</th>
                        <th>Ubicación<br> Secundaria</th>
                      </tr>
                    </thead>
                    <!--<tbody>
                      <tr>
                        <td>1</td>
                        <td>567</td>
                        <td><img src="http://placehold.it/40x30/ccc" alt="" class="img-responsive"></td>
                        <td><i class="fa fa-paperclip" aria-hidden="true"></i></td>
                        <td>Lorem ipsum</td>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum</td>
                        <td>35956787</td>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum</td>
                        <td>Lorem ipsum</td>
                        <td><span><i class="fa fa-pencil" aria-hidden="true"></i></span></td>
                      </tr>
                    </tbody>-->
                  </table>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>

          
		  <div role="tabpanel" class="tab-pane" id="bajas">
              <!-- table-results -->
            <div class="col-md-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div>
                      
                  <table id="tablebajas" class="table table-bordered table-striped table-chs" width="100%">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Editar</th>
						<th>PDF</th>
						<th>AF/BC</th>
                        <th width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Foto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
                        <th>Área</th>
                        <th>Clasificación</th>
                        <th>Marca</th>
                        <th>Clase</th>
                        <th>Descripción</th>
                        <th>Ubicación<br> Primaria</th>
                        <th>Ubicación<br> Secundaria</th>
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
          <div role="tabpanel" class="tab-pane" id="reubicacion">
              <!-- table-results -->
            <div class="col-md-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div>
                      
                  <table id="tablereubicacion" class="table table-bordered table-striped table-chs" width="100%">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Editar</th>
						<th>PDF</th>
						<th>AF/BC</th>
                        <th width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Foto&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
                        <th>Área</th>
                        <th>Clasificación</th>
                        <th>Marca</th>
                        <th>Clase</th>
                        <th>Descripción</th>
                        <th>Ubicación<br> Primaria</th>
                        <th>Ubicación<br> Secundaria</th>
                        
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
          
        </div>
        

      </div>
      <!-- /.row -->
    
  <!-- /.content-wrapper -->


   <?php include("include_alta_activo.php") ?>
   
   <?php include("include_reubicacion_activo.php") ?>
    

    <!-- baja equipo -->
    <?php include("include_baja_activo.php") ?>
    
    <div id="divLineaRecta">
	</div>
    
    <div id="divReporteLineaRecta">
    </div>
    
	<!-- Fiscal -->
  	<div id="divFiscal">
	</div>    
    <div id="divReporteFiscal">
    </div>
    <!-- Fin Fiscal -->
	
	<div id="divFiscalD4">
	</div>    
    <div id="divReporteFiscalD4">
    </div>
    
    
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
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
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
  

   //Subir Imagenes al servidor 
  fileuploaded("documentos_adjuntos_FILE", "Url_Foto_Activo","../Archivos/Archivos-Activos",true,false);
  fileuploaded("documentos_adjuntos_FILE2", "Url_Foto_Activo2","../Archivos/Archivos-Activos",true,false);
  fileuploaded("documentos_adjuntos_FILE3", "Url_Foto_Activo3","../Archivos/Archivos-Activos",true,false); 
  //Proveedor
  fileuploaded("documentos_adjuntos_contrato", "url_contrato","../Archivos/Archivos-Activos-Proveedores",true,false);
  fileuploaded("documentos_adjuntos_corto", "url_corto","../Archivos/Archivos-Activos-Proveedores",true,false); 
  fileuploaded("documentos_adjuntos_factura0", "url_factura0","../Archivos/Archivos-Activos-Proveedores",true,false);
  fileuploaded("documentos_adjuntos_xml", "url_xml","../Archivos/Archivos-Activos-Proveedores",true,false);
  //Contabilidad
  fileuploaded("documentos_adjuntos_factura", "url_factura","../Archivos/Archivos-Activos-Contabilidad",true,true); 
  fileuploaded("xml_contabilidad", "url_xml_contabilidad","../Archivos/Archivos-Activos-Contabilidad",true,true); 
  
  
  //Date picker
  $('#fecha_inicio_depr').datepicker({ 
    format: 'dd/mm/yyyy',
  }).datepicker();
  
  $('#FechaFactura').datepicker({ 
    format: 'dd/mm/yyyy',
  }).datepicker();
  
  $('#Fecha_Vencimiento').datepicker({ 
    format: 'dd/mm/yyyy',
  }).datepicker();
  
  $('#Fecha_baja').datepicker({ 
    format: 'dd/mm/yyyy',
  }).datepicker();
  
  
  
  
  
  
  $(document).ready(function(){
	ubic_prim(); 
	familia();
	clase();
	centro_costos_contabilidad();
	centro_costos_reubicacion();
	function obtenerfechaactual(){
		var hoy = new Date();
		var dd = hoy.getDate();
		var mm = hoy.getMonth()+1; //hoy es 0!
		var yyyy = hoy.getFullYear();

		if(dd<10) {
			dd='0'+dd
		} 

		if(mm<10) {
			mm='0'+mm
		} 

		hoy = yyyy+''+mm+''+dd;
		var Fech_Actual=""; 
		Fech_Actual=dd+'/'+mm+'/'+yyyy;
		
		return Fech_Actual;
	}
	
	
    $('input').each(function (i, e) {
    var label;
    switch ($(e).attr('id')) {
        case 'AF_BC':
            label = 'AF/BC';
            break;
        case 'Nombre':
            label = 'Nombre del Activo';
            break;
		case 'DescCorta':
            label = 'Descripción Corta';
            break;	
			case 'DescLarga':
            label = 'Descripción Larga';
            break;
			case 'Marca':
            label = 'Marca';
            break;
			case 'modelo':
            label = 'Modelo';
            break;
			case 'numserie':
            label = 'Número de Serie';
            break;
			case 'numactivoanterior':
            label = 'Número de activo anterior';
            break;
			case 'importeseguros':
            label = 'Importe Seguros';
            break;		
			case 'numempleadoresguardo':
            label = 'Número de Empleado Resguardo';
            break;			

			case 'nombreempleadoresguardo':
            label = 'Nombre de empleado resguardo';
            break;			
			
			case 'garantia':
            label = 'Garantía';
            break;	
			case 'extension':
            label = 'Extensión de garantía';
            break;	
			case 'especifica':
            label = 'Ubicacion Especifica';
            break;
			case 'activopadre':
            label = 'Activo Padre';
            break;		
			case 'numusuarioalta':
            label = 'Usuario solicitante';
            break;
			case 'nombreusuarioalta':
            label = 'Nombre usuario alta';
            break;				

			
			
    }
	var fieldname = $(e).attr('id')+'Label';
	$("#"+fieldname).text(label);
    //$(e).tooltip({ 'trigger': 'hover', 'title': label });
	});
	
	$('select').each(function (i, e) {
    var label;
    switch ($(e).attr('id')) {
        case 'cmbubicacionprim':
            label = 'Ubicación Primaria';
            break;
		case 'cmbubicacionsec':
            label = 'Ubicación Secundaria';
            break;
		case 'cmbestatus':
            label = 'Estatus';
            break;
		case 'cmbareas':
            label = 'Área Gestora';
            break;		
		case 'cmbclasificacion':
            label = 'Clase / Clasificación';
            break;
		case 'cmbpropiedad':
            label = 'Propiedad';
            break;		
case 'cmbmotivo':
            label = 'Motivo Alta';
            break;
case 'cmbfamilia':
            label = 'Familia';
            break;
case 'cmbsubfamilia':
            label = 'Subfamilia';
            break;		
case 'cmbtipoactivo':
            label = 'Tipo de Activo';
            break;			
	case 'cmbPRE':
            label = 'Participa en PRE';
            break;			
case 'cmbcertificacion':
            label = 'Participa en Certificacion';
            break;			
			case 'cmbseguros':
            label = 'Participa en Seguros';
            break;			
			case 'cmbtipovaleresguardo':
            label = 'Tipo de vale de resguardo';
            break;			

 			
    }
	var fieldname = $(e).attr('id')+'Label';
	$("#"+fieldname).text(label);
    //$(e).tooltip({ 'trigger': 'hover', 'title': label });
	});
	
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
		if($(this).val()!="-1"){
			subfamilia($(this).val());
		}else{
			$('#cmbsubfamilia').children('option').remove();
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("--Subfamilia--"));
		}
	});
	
	function subfamilia(Id_Familia) {
		$('#cmbsubfamilia').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Familia:Id_Familia, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_subfamilia/Siga_cat_subfamiliaFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("--Subfamilia--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbsubfamilia').append($('<option>', { value: resultado.data[i].Id_Subfamilia }).text(resultado.data[i].Desc_Subfamilia));
			}
		}else{
			$('#cmbsubfamilia').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	
	function clase() {
		var Id_Area=$("#idareasesion").val();
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
	
	$( "#cmbclase" ).change(function() {
		if($(this).val()!="-1"){
			clasificacion($(this).val());
		}else{
			$('#cmbclasificacion').children('option').remove();
			$('#cmbclasificacion').append($('<option>', { value: "-1" }).text("--Clasificación--"));
		}
	});
	
	function clasificacion(Id_Clase) {
		$('#cmbclasificacion').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Clase:Id_Clase, accion: "consultar"};
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
	
	
	function centro_costos_contabilidad() {
		var resultado=new Array();
		data={Estatus_Reg: "1", accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_centro_de_costos/Siga_cat_centro_de_costosFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#centro_costos').append($('<option>', { value: "-1" }).text("--Centro de Costos--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#centro_costos').append($('<option>', { value: resultado.data[i].Id_Centros_de_costos }).text(resultado.data[i].Desc_Centro_de_costos));
			}
		}else{
			$('#centro_costos').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	//Reubicacion
	areas_reubicacion();
	function areas_reubicacion() {
		var resultado=new Array();
		data={Estatus_Reg: "1", accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_catareas/Siga_catareasFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmb_area_guardar').append($('<option>', { value: "-1" }).text("--Area--"));
			for(var i = 0; i < resultado.totalCount; i++){
				if(resultado.data[i].Id_Area!='5'){
					$('#cmb_area_guardar').append($('<option>', { value: resultado.data[i].Id_Area }).text(resultado.data[i].Nom_Area));
				}
			}
		}else{
			$('#cmb_area_guardar').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$( "#cmb_area_guardar" ).change(function() {
		if($(this).val()!="-1"){
			ubic_prim_reubicacion($(this).val());
		}else{
			$('#cmb_ubic_prim_reub_guar').children('option').remove();
			$('#cmb_ubic_prim_reub_guar').append($('<option>', { value: "-1" }).text("--Ubicación Primaria--"));
		}
	});
	
	function ubic_prim_reubicacion(Id_Area) {
		$('#cmb_ubic_prim_reub_guar').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Area:Id_Area,accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_prim/Siga_cat_ubic_primFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmb_ubic_prim_reub_guar').append($('<option>', { value: "-1" }).text("--Ubicación Primaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmb_ubic_prim_reub_guar').append($('<option>', { value: resultado.data[i].Id_Ubic_Prim }).text(resultado.data[i].Desc_Ubic_Prim));
			}
		}else{
			$('#cmb_ubic_prim_reub_guar').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$( "#cmb_ubic_prim_reub_guar" ).change(function() {
		if($(this).val()!="-1"){
			ubic_sec_reubicacion($(this).val());
		}else{
			$('#cmb_ubic_sec_reub_guar').children('option').remove();
			$('#cmb_ubic_sec_reub_guar').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
		}
	});
	
	function ubic_sec_reubicacion(Id_Ubic_Prim) {
		$('#cmb_ubic_sec_reub_guar').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Ubic_Prim:Id_Ubic_Prim, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_sec/siga_cat_ubic_secFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmb_ubic_sec_reub_guar').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmb_ubic_sec_reub_guar').append($('<option>', { value: resultado.data[i].Id_Ubic_Sec }).text(resultado.data[i].Desc_Ubic_Sec));
			}
		}else{
			$('#cmb_ubic_sec_reub_guar').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	function centro_costos_reubicacion() {
		var resultado=new Array();
		data={Estatus_Reg: "1", accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_centro_de_costos/Siga_cat_centro_de_costosFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#centro_costos_guardar').append($('<option>', { value: "-1" }).text("--Centro de Costos--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#centro_costos_guardar').append($('<option>', { value: resultado.data[i].Id_Centros_de_costos }).text(resultado.data[i].Desc_Centro_de_costos));
			}
		}else{
			$('#centro_costos_guardar').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	
	
	//Autocomplete Usuarios Resguardo
	usuarios_empleados_reubicacion();
	function usuarios_empleados_reubicacion(){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoFacade.Class.php",
			data: {
				accion: 'consultar'
			},
			async: true,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargandoreubicacion").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {

						var usuarios='';
						usuarios+='<option></option>';
						usuarios+='<optgroup label="Usuario Responsable">';

						for (var i = 0; i < json.totalCount; i++) {
							usuarios+='<option value="'+json.data[i].num_empleado.trim()+'">'+json.data[i].num_empleado.trim()+'-'+json.data[i].nombre_completo.trim()+'</option>';
						}
						usuarios+='</optgroup>';
						$('#numempleadoreubicacion').html(usuarios);

						$("#gifcargandoreubicacion").hide();
						$("#numempleadoreubicacion").show();
							
						$('#numempleadoreubicacion').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargandoreubicacion").hide();
						$('#numempleadoreubicacion').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#numempleadoreubicacion').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	$("#numempleadoreubicacion").change(function() {
		$("#usuario_resp_guardar").val("");
		if(this.value!=""){
			var valor = $("#numempleadoreubicacion option:selected").html();
			var res = valor.split("-");
			
			$("#usuario_resp_guardar").val(res[1]);
		}
	});
	
	/////////
	
	<?php
      //$nombrefuncion = "ubicacionprim";	
	  //$tabla = "Siga_cat_ubic_prim";
	  //$id = "Id_Ubic_Prim";
	  //$desc = "Desc_Ubic_Prim";
	  //$nombre = "Ubicación Primaria";
	  //$excepto = "";
      //include ("includecombo.php"); 
	  
      //$nombrefuncion = "ubicacionsec";	
	  //$tabla = "Siga_cat_ubic_sec";
	  //$id = "Id_Ubic_Sec";
	  //$desc = "Desc_Ubic_Sec";
	  //$nombre = "Ubicación Secundaria";
	  //$excepto = "";
      //include ("includecombo.php"); 

      $nombrefuncion = "areas";	
	  $tabla = "Siga_catareas";
	  $id = "Id_Area";
	  $desc = "Nom_Area";
	  $nombre = "Áreas";
	  $excepto = "5";
      include ("includecombo.php");

      $nombrefuncion = "motivo";
	  $tabla = "Siga_cat_motivo_alta";
	  $id = "Id_Motivo_Alta";
	  $desc = "Desc_Motivo_Alta";
	  $nombre = "Motivo Alta";
	  $excepto = "";
      include ("includecombo.php");

      //$nombrefuncion = "clasificacion";
	  //$tabla = "Siga_cat_clasificacion";
	  //$id = "Id_Clasificacion";
	  //$desc = "Desc_Clasificacion";
	  //$nombre = "Clasificación";
	  //$excepto = "";
      //include ("includecombo.php");
	  
	  $nombrefuncion = "propiedad";	
	  $tabla = "Siga_cat_propiedad";
	  $id = "Id_Propiedad";
	  $desc = "Desc_Propiedad";
	  $nombre = "Propiedad";
	  $excepto = "";
      include ("includecombo.php");	 

	  //$nombrefuncion = "familia";	
	  //$tabla = "Siga_cat_familia";
	  //$id = "Id_Familia";
	  //$desc = "Desc_Familia";
	  //$nombre = "Familia";
	  //$excepto = "";
      //include ("includecombo.php");	 	  
	  //
	  //$nombrefuncion = "subfamilia";	
	  //$tabla = "Siga_cat_subfamilia";
	  //$id = "Id_Subfamilia";
	  //$desc = "Desc_Subfamilia";
	  //$nombre = "Subfamilia";
	  //$excepto = "";
      //include ("includecombo.php");	 
	  
	  $nombrefuncion = "tipoactivo";	
	  $tabla = "Siga_cat_tipo_activo";
	  $id = "Id_Tipo_Activo";
	  $desc = "Desc_Tipo_Activo";
	  $nombre = "Tipo Activo";
	  $excepto = "";
      include ("includecombo.php");	 
	  
	  $nombrefuncion = "tipovaleresguardo";	
	  $tabla = "Siga_cat_tipo_vale_resg";
	  $id = "Id_Tipo_Vale_Resg";
	  $desc = "Desc_Tipo_Vale_Resg";
	  $nombre = "Tipo Vale Resguardo";
	  $excepto = "";
      include ("includecombo.php");	
	  
	  $nombrefuncion = "estatus";	
	  $tabla = "Siga_cat_estatus";
	  $id = "Id_Estatus";
	  $desc = "Desc_Estatus";
	  $nombre = "Estatus";
	  $excepto = "";
      include ("includecombo.php");	
	  
	  $nombrefuncion = "ubicacionprim2";	
	  $tabla = "Siga_cat_ubic_prim";
	  $id = "Id_Ubic_Prim";
	  $desc = "Desc_Ubic_Prim";
	  $nombre = "Ubicación Primaria";
	  $excepto = "";
      include ("includecombo.php");
	  
      $nombrefuncion = "ubicacionsec2";	
	  $tabla = "Siga_cat_ubic_sec";
	  $id = "Id_Ubic_Sec";
	  $desc = "Desc_Ubic_Sec";
	  $nombre = "Ubicación Secundaria";
	  $excepto = "";
      include ("includecombo.php");	  

	  $nombrefuncion = "estatus2";	
	  $tabla = "Siga_cat_estatus";
	  $id = "Id_Estatus";
	  $desc = "Desc_Estatus";
	  $nombre = "Estatus";
	  $excepto = "";
      include ("includecombo.php");	
	  
	  $nombrefuncion = "area_baja";	
	  $tabla = "Siga_catareas";
	  $id = "Id_Area";
	  $desc = "Nom_Area";
	  $nombre = "Áreas";
	  $excepto = "5";
      include ("includecombo.php");
	  
	  $nombrefuncion = "area_reubicacion";	
	  $tabla = "Siga_catareas";
	  $id = "Id_Area";
	  $desc = "Nom_Area";
	  $nombre = "Áreas";
	  $excepto = "5";
      include ("includecombo.php");
	  
	  //$nombrefuncion = "_area_guardar";	
	  //$tabla = "Siga_catareas";
	  //$id = "Id_Area";
	  //$desc = "Nom_Area";
	  //$nombre = "Áreas";
	  //$excepto = "";
      //include ("includecombo.php");
	  
	  $nombrefuncion = "estatus_baja";	
	  $tabla = "Siga_cat_estatus";
	  $id = "Id_Estatus";
	  $desc = "Desc_Estatus";
	  $nombre = "Estatus";
	  $excepto = "";
      include ("includecombo.php");
	  
	  $nombrefuncion = "estatus_reubicacion";	
	  $tabla = "Siga_cat_estatus";
	  $id = "Id_Estatus";
	  $desc = "Desc_Estatus";
	  $nombre = "Estatus";
	  $excepto = "";
      include ("includecombo.php");
	  
	  $nombrefuncion = "ubicacionprimaria_baja";	
	  $tabla = "Siga_cat_ubic_prim";
	  $id = "Id_Ubic_Prim";
	  $desc = "Desc_Ubic_Prim";
	  $nombre = "Ubicación Primaria";
	  $excepto = "";
      include ("includecombo.php");
	  
	  //$nombrefuncion = "_ubic_prim_reub_guar";	
	  //$tabla = "Siga_cat_ubic_prim";
	  //$id = "Id_Ubic_Prim";
	  //$desc = "Desc_Ubic_Prim";
	  //$nombre = "Ubicación Primaria";
	  //$excepto = "";
      //include ("includecombo.php");
	  
	  $nombrefuncion = "ubicacionprimaria_reubicacion";
	  $tabla = "Siga_cat_ubic_prim";
	  $id = "Id_Ubic_Prim";
	  $desc = "Desc_Ubic_Prim";
	  $nombre = "Ubicación Primaria";
	  $excepto = "";
      include ("includecombo.php");

     
	  
      $nombrefuncion = "ubicacionsecundaria_baja";	
	  $tabla = "Siga_cat_ubic_sec";
	  $id = "Id_Ubic_Sec";
	  $desc = "Desc_Ubic_Sec";
	  $nombre = "Ubicación Secundaria";
	  $excepto = "";
      include ("includecombo.php");	

      //$nombrefuncion = "_ubic_sec_reub_guar";	
	  //$tabla = "Siga_cat_ubic_sec";
	  //$id = "Id_Ubic_Sec";
	  //$desc = "Desc_Ubic_Sec";
	  //$nombre = "Ubicación Secundaria";
	  //$excepto = "";
      //include ("includecombo.php");		  
      
      $nombrefuncion = "ubicacionsecundaria_reubicacion";	
	  $tabla = "Siga_cat_ubic_sec";
	  $id = "Id_Ubic_Sec";
	  $desc = "Desc_Ubic_Sec";
	  $nombre = "Ubicación Secundaria";
	  $excepto = "";
      include ("includecombo.php");	 	  
	  /////////////////////////////////////////////
	  $nombrefuncion = "ubicacionprim3";	
	  $tabla = "Siga_cat_ubic_prim";
	  $id = "Id_Ubic_Prim";
	  $desc = "Desc_Ubic_Prim";
	  $nombre = "Ubicación Primaria";
	  $excepto = "";
      include ("includecombo.php");	
	  
	  $nombrefuncion = "ubicacionsec3";	
	  $tabla = "Siga_cat_ubic_sec";
	  $id = "Id_Ubic_Sec";
	  $desc = "Desc_Ubic_Sec";
	  $nombre = "Ubicación Secundaria";
	  $excepto = "";
      include ("includecombo.php");	
	  
	  
	  $nombrefuncion = "estatus3";	
	  $tabla = "Siga_cat_estatus";
	  $id = "Id_Estatus";
	  $desc = "Desc_Estatus";
	  $nombre = "Estatus";
	  $excepto = "";
      include ("includecombo.php");	

	?>

		//Guardar Registros
	$("#guardar").click(function () {
		//Usuario Logueado
		var usuariosesion=$("#usuariosesion").val();
		//	
		var Agregar = true;
		var mensaje_error = "";
		var Id_Activo=$("#Id_Activo").val();
		var Mant_Prevent=$("#cmb_mant_prevent").val();
		var AFBC=$.trim($("#AF_BC").val());
		var Nombre=$.trim($("#Nombre").val());
		var DescCorta=$.trim($("#DescCorta").val());
		var UbicacionPrimaria=$.trim($("#cmbubicacionprim").val());
		var UbicacionSecundaria=$.trim($("#cmbubicacionsec").val());
		var Estatus=$.trim($("#cmbestatus").val());
		var Area=$.trim($("#cmbareas").val());
		var Clase=$.trim($("#cmbclase").val());
		var Clasificacion=$.trim($("#cmbclasificacion").val());
		var Propiedad=$.trim($("#cmbpropiedad").val());
		var MotivoAlta=$.trim($("#cmbmotivo").val());
		var Familia=$.trim($("#cmbfamilia").val());
		var TipoActivo=$.trim($("#cmbtipoactivo").val());
		var DescLarga=$.trim($("#DescLarga").val());
		var Especifica=$.trim($("#especifica").val());
		var Foto=$.trim($("#Url_Foto_Activo").val());
		var strDatos=""; 
		
		if (AFBC.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el AFBC del activo<br />";
		}
		
		if (Nombre.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Nombre del activo<br />";
		}
		
		if (UbicacionPrimaria == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Ubicación primaria del activo<br />";
		}
		
		if (UbicacionSecundaria == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Ubicación secundaria del activo<br />";
		}
		
		if (Mant_Prevent == -1) {
			Agregar = false; 
			mensaje_error += " -Falta seleccionar si Participa en Mantenimiento Preventivo<br />";
		}
		
		if (Estatus == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el estatus del activo<br />";
		}
		
		if (DescCorta.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Descripción corta del activo<br />";
		}
		
		if (Area == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Área del activo<br />";
		}
		
		if (Clase == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Clase<br />";
		}
		if (Clasificacion == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Clasificacion del activo<br />";
		}
		
		if (Propiedad == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Propiedad del activo<br />";
		}
		
		if (MotivoAlta == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Motivo de alta del activo<br />";
		}
		
		if (Familia == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Familia del activo<br />";
		}
		
		if (TipoActivo == -1) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Tipo de activo<br />";
		}
		
		if (DescLarga.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Descripción larga del activo<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar)
		{	
	        /* Obligatorios */
			strDatos = "AF_BC="+AFBC; 
			strDatos += "&Nombre_Activo="+Nombre;
			strDatos += "&DescCorta="+DescCorta;
			strDatos += "&Id_Ubic_Prim="+UbicacionPrimaria;
			strDatos += "&Id_Ubic_Sec="+UbicacionSecundaria;
			strDatos += "&Id_Situacion_Activo="+Estatus;
			strDatos += "&Estatus_Reg=1";
			strDatos += "&Id_Area="+Area;
			strDatos += "&Id_Clase="+Clase;
			strDatos += "&Id_Clasificacion="+Clasificacion;
			strDatos += "&Id_Propiedad="+Propiedad;
			strDatos += "&Id_Motivo_Alta="+MotivoAlta;
			strDatos += "&Id_Familia="+Familia;
			strDatos += "&Id_Tipo_Activo="+TipoActivo;
			strDatos += "&DescLarga="+DescLarga;
			strDatos += "&Foto="+Foto;
			strDatos += "&Mant_Prevent="+Mant_Prevent;
			/* Opcionales */
			// Combos
			var Id_Tipo_Vale_Resg=$.trim($("#cmbtipovaleresguardo").val());
			if (Id_Tipo_Vale_Resg != -1)
			strDatos += "&Id_Tipo_Vale_Resg="+Id_Tipo_Vale_Resg;	
			var Id_Subfamilia=$.trim($("#cmbsubfamilia").val());
			if (Id_Subfamilia != -1)
			strDatos += "&Id_Subfamilia="+Id_Subfamilia;
			var ParticipaPre=$.trim($("#cmbPRE").val());
			if (ParticipaPre != -1)
			strDatos += "&ParticipaPre="+ParticipaPre;
			var ParticipaSeguros=$.trim($("#cmbseguros").val());
			if (ParticipaSeguros != -1)
			strDatos += "&ParticipaSeguros="+ParticipaSeguros;
			var ParticipaCertificacion=$.trim($("#cmbcertificacion").val());
			if (ParticipaCertificacion != -1)
			strDatos += "&ParticipaCertificacion="+ParticipaCertificacion;		
			var Id_Tipo_Vale_Resg=$.trim($("#cmbtipovaleresguardo").val());
			if (Id_Tipo_Vale_Resg != -1)
			strDatos += "&Id_Tipo_Vale_Resg="+Id_Tipo_Vale_Resg;		
		
		
            // Campos
			var Marca=$.trim($("#Marca").val());
			if (Marca != "")
			strDatos += "&Marca="+Marca;
			var Modelo=$.trim($("#modelo").val());
			if (Modelo != "")
			strDatos += "&Modelo="+Modelo;
			var NumSerie=$.trim($("#numserie").val());
			if (NumSerie != "")
			strDatos += "&NumSerie="+NumSerie;
			var NumActivoAnterior=$.trim($("#numactivoanterior").val());
			if (NumActivoAnterior != "")
			strDatos += "&NumActivoAnterior="+NumActivoAnterior;		
			var ImporteSeguros=$.trim($("#importeseguros").val());
			if (ImporteSeguros != "")
			strDatos += "&ImporteSeguros="+ImporteSeguros;
		    var Num_Empleado=$.trim($("#numempleadoresguardo").val());
			if (Num_Empleado != "")
			strDatos += "&Num_Empleado="+Num_Empleado;
			var Nombre_Completo=$.trim($("#nombreempleadoresguardo").val());
			if (Nombre_Completo != "")
			strDatos += "&Nombre_Completo="+Nombre_Completo;
			//var Garantia=$.trim($("#garantia").val());
			//if (Garantia != "")
			//strDatos += "&Garantia="+Garantia;		
			//var ExtGarantia=$.trim($("#extension").val());
			//if (ExtGarantia != "")
			//strDatos += "&ExtGarantia="+ExtGarantia;
			var Especifica=$.trim($("#especifica").val());
			if (Especifica != "")
			strDatos += "&Especifica="+Especifica;
		
			if(Id_Activo.length <= 0){
				strDatos += "&Usr_Inser="+usuariosesion;
				//strDatos += "&Estatus_Reg=1";				
				strDatos += "&accion=guardar";
			}else{
				strDatos += "&Id_Activo="+Id_Activo;
				strDatos += "&Usr_Mod="+usuariosesion;
				//strDatos += "&Estatus_Reg=2";				
				strDatos += "&accion=guardar";
			}

			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					limpiarcampos();
					limpiarcamposproveedor();
					limpiarcamposbaja();
					mensajesalerta("&Eacute;xito", "Guardado Correctamente.", "success", "dark");	
					$('#altaEquipo').modal('hide');
					$('#tablaactivos').DataTable().ajax.reload();
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
	
	$("#guardar2").click(function () {
		var Agregar = true;
		var mensaje_error = "";
		
		//Usuario Logueado
		var Id_Usuario_Sesion=$("#usuariosesion").val();
		
		var Id_Activo=$("#Id_Activo").val();
		var Folio_Fiscal=$("#Folio_Fiscal").val();
		var Monto_F=$("#Monto_Factura").val();
		var Id_activo_proveedor=$("#Id_activo_proveedor").val();
		var NumOrdenCompra=$.trim($("#NumOrdenCompra").val());
		var NumFactura=$.trim($("#NumFactura").val());
		var FechaFactura=$.trim($("#FechaFactura").val());
		var UUID=$.trim($("#UUID").val());
		var MontoFactura_s_iva=$.trim($("#MontoFactura_s_iva").val());
		var NumContrato=$.trim($("#NumContrato").val());
		var VidaUtilFabricante=$.trim($("#VidaUtilFabricante").val());
		var NombreProveedor=$.trim($("#NombreProveedor").val());
		var Id_Proveedor=$.trim($("#Id_Proveedor").val());
		var Contacto=$.trim($("#Contacto").val());
		var Telefono=$.trim($("#Telefono").val());
		var Correo=$.trim($("#Correo").val());
		var DocRecibida=$.trim($("#DocRecibida").val());
		var Accesorios=$.trim($("#Accesorios").val());
		var Consumibles=$.trim($("#Consumibles").val());
		var Url_Contrato=$.trim($("#url_contrato").val());
		var Url_Otro_Doc=$.trim($("#url_corto").val());
		var Url_Factura=$.trim($("#url_factura0").val());
		var Url_Xml=$.trim($("#url_xml").val());
		//var Foto=$.trim($("#Url_Foto_Activo").val());
		var strDatos="";
		
		
		
		//if (MontoFactura_s_iva.length <= 0) {
		//	Agregar = false; 
		//	mensaje_error += " -Falta agregar el Monto de la factura del activo<br />";
		//}
		
		//if (Id_Proveedor <= 0) {
		//	Agregar = false; 
		//	mensaje_error += " -Falta agregar el Número de proveedor del activo<br />";
		//}
		
		//if (NombreProveedor.length <= 0) {
		//	Agregar = false; 
		//	mensaje_error += " -Falta agregar el Nombre del proveedor del activo<br />";
		//}
		
		//if (Contacto <= 0) {
		//	Agregar = false; 
		//	mensaje_error += " -Falta agregar el Contacto del proveedor activo<br />";
		//}
				
		
		if (Id_Activo.length <= 0) {
			Agregar = false; 
			mensaje_error = " -Debe capturarse primero el activo en Datos Generales<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		
		if(Agregar)
		{
	        /* Obligatorios */
			strDatos = "Id_activo_proveedor="+Id_activo_proveedor;
			strDatos += "&id_Activo="+Id_Activo; 
			strDatos += "&Folio_Fiscal="+Folio_Fiscal; 
			strDatos += "&Monto_F="+Monto_F; 
			strDatos += "&MontoFactura="+MontoFactura_s_iva; 
			strDatos += "&NombreProveedor="+NombreProveedor;
			strDatos += "&Id_Proveedor="+Id_Proveedor;
			strDatos += "&Contacto="+Contacto;

			/* Opcionales */
		
            // Campos
			var NumOrdenCompra=$.trim($("#NumOrdenCompra").val());
			if (NumOrdenCompra != "")
			strDatos += "&NumOrdenCompra="+NumOrdenCompra;
			var NumFactura=$.trim($("#NumFactura").val());
			if (NumFactura != "")
			strDatos += "&NumFactura="+NumFactura;
			var FechaFactura=$.trim($("#FechaFactura").val());
			if (FechaFactura != "")
			strDatos += "&FechaFactura="+FechaFactura.substring(6, 10)+"-"+FechaFactura.substring(3, 5)+"-"+FechaFactura.substring(0, 2);
			
			
		
			
			var UUID=$.trim($("#UUID").val());
			if (UUID != "")
			strDatos += "&UUID="+UUID;		
		    var NumContrato=$.trim($("#NumContrato").val());
			if (NumContrato != "")
			strDatos += "&NumContrato="+NumContrato;
		    var VidaUtilFabricante=$.trim($("#VidaUtilFabricante").val());
			if (VidaUtilFabricante != "")
			strDatos += "&VidaUtilFabricante="+VidaUtilFabricante;
		    var VidaUtilCHS=$.trim($("#VidaUtilCHS").val());
			if (VidaUtilCHS != "")
			strDatos += "&VidaUtilCHS="+VidaUtilCHS;
			var Garantia=$.trim($("#garantia").val());
			if (Garantia != "")
			strDatos += "&Garantia="+Garantia;		
			var ExtGarantia=$.trim($("#extension").val());
			if (ExtGarantia != "")
			strDatos += "&ExtGarantia="+ExtGarantia;
			var Fecha_Vencimiento=$.trim($("#Fecha_Vencimiento").val());
			if (Fecha_Vencimiento != "")
			strDatos += "&Fecha_Vencimiento="+Fecha_Vencimiento;
			var Telefono=$.trim($("#Telefono").val());
			if (Telefono != "")
			strDatos += "&Telefono="+Telefono;
			var Correo=$.trim($("#Correo").val());
			if (Correo != "")
			strDatos += "&Correo="+Correo;		
			var DocRecibida=$.trim($("#DocRecibida").val());
			if (DocRecibida != "")
			strDatos += "&DocRecibida="+DocRecibida;
			var Accesorios=$.trim($("#Accesorios").val());
			if (Accesorios != "")
			strDatos += "&Accesorios="+Accesorios;
			var Consumibles=$.trim($("#Consumibles").val());
			if (Consumibles != "")
			strDatos += "&Consumibles="+Consumibles;
			
			if (Url_Contrato != "")
			strDatos += "&Url_Contrato="+Url_Contrato;
			if (Url_Otro_Doc != "")
			strDatos += "&Url_Otro_Doc="+Url_Otro_Doc;
			if (Url_Factura != "")
			strDatos += "&Url_Factura="+Url_Factura;
			if (Url_Xml != "")
			strDatos += "&Url_Xml="+Url_Xml;
			
			if(Id_activo_proveedor.length <= 0)
			{
				strDatos += "&Usr_Inser="+Id_Usuario_Sesion;
				strDatos += "&Estatus_Reg=1";	
				strDatos += "&accion=guardar";
			}
			else
			{
				//strDatos += "&Id_activo_proveedor="+Id_activo_proveedor;
				strDatos += "&Usr_Mod="+Id_Usuario_Sesion;
				strDatos += "&Estatus_Reg=2";				
				strDatos += "&accion=guardar";
			}
		
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_activo_proveedor/Siga_activo_proveedorFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					limpiarcamposproveedor();
					mensajesalerta("&Eacute;xito", "Guardado Correctamente.", "success", "dark");	
					$('#altaEquipo').modal('hide');
					$('#tablaactivos').DataTable().ajax.reload();
				
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
	
	$("#guardar3").click(function () {
		var Agregar = true;
		var mensaje_error = "";
		//Usuario Logueado
		var Id_Usuario=$("#usuariosesion").val();
		var Id_Activo=$("#Id_Activo").val();
		var Id_Activo_Contabilidad=$("#Id_Activo_Contabilidad").val();
		var centro_costos=$("#centro_costos").val();
		var no_capex=$.trim($("#no_capex").val());
		var Prorrateo=$.trim($("#Prorratear").val());
		var cmbparticipaendepresiacion=$.trim($("#cmbparticipaendepresiacion").val());
		var fecha_inicio_depr=$.trim($("#fecha_inicio_depr").val());
		var url_factura=$.trim($("#url_factura").val());
		
		var strDatos="";
		
		
		if (centro_costos.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el centro de costos<br />";
		}
		
		if (no_capex <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Número de Capex<br />";
		}
		
		if (cmbparticipaendepresiacion== -1) {
			Agregar = false; 
			mensaje_error += " -Selecciona la opción de participa en depreciación<br />";
		}
		
		if (fecha_inicio_depr <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la fecha de inicio de depreciación<br />";
		}else{
			fecha_inicio_depr=fecha_inicio_depr.substring(6, 10)+"-"+fecha_inicio_depr.substring(3, 5)+"-"+fecha_inicio_depr.substring(0, 2);
		}
				
		
		if (Id_Activo.length <= 0) {
			Agregar = false; 
			mensaje_error = " -Debe capturarse primero el activo en Datos Generales<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		
		if(Agregar)
		{
	        /* Obligatorios */
			strDatos += "Id_Activo="+Id_Activo;
			strDatos += "&Id_Activo_Contabilidad="+Id_Activo_Contabilidad;
			strDatos += "&Centro_Costos="+centro_costos; 
			strDatos += "&No_Capex="+no_capex; 
			strDatos += "&Prorrateo="+Prorrateo,
			strDatos += "&Participa_Depreciacion="+cmbparticipaendepresiacion;
			strDatos += "&Fecha_Inicio_Depr="+fecha_inicio_depr;
			strDatos += "&Url_Factura="+url_factura;

			/* Opcionales */
		
		
			if(Id_Activo_Contabilidad.length <= 0)
			{
				strDatos += "&Usr_Inser="+Id_Usuario;
				strDatos += "&Estatus_Reg=1";				
				strDatos += "&accion=guardar";
			}
			else
			{
				//strDatos += "&Id_activo_proveedor="+Id_activo_proveedor;
				strDatos += "&Usr_Mod="+Id_Usuario;
				strDatos += "&Estatus_Reg=2";				
				strDatos += "&accion=guardar";
			}
		
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_activos_contabilidad/Siga_activos_contabilidadFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					limpiarcamposcontabilidad();
					mensajesalerta("&Eacute;xito", "Guardado Correctamente.", "success", "dark");	
					$('#altaEquipo').modal('hide');
					$('#tablaactivos').DataTable().ajax.reload();
				
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
	
	
	//Autocomplete activos BAJA	
	autocomplete_baja();
	function autocomplete_baja(){
		//Area
		var Id_Area=$("#idareasesion").val();
		var strdatos="";
		
		if(Id_Area!="5"){
			strdatos={
				Id_Area:Id_Area,
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}else{
			strdatos={
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
					var activos='';
					if (json.totalCount > 0) {

						
						activos+='<option></option>';
						activos+='<optgroup label="Activos">';
						
						for (var i = 0; i < json.totalCount; i++) {
							activos+='<option value="'+json.data[i].Id_Activo+'">'+json.data[i].AF_BC+' '+json.data[i].Nombre_Activo+'</option>';
						}
						activos+='</optgroup>';
						$('#AF_BC_baja').html(activos);

						$("#gifcargando1").hide();
						$("#AF_BC_baja").show();
							
						$('#AF_BC_baja').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargando1").hide();
						activos+='<option>--Sin Resultados--</option>';
						activos+='<optgroup label="Activos">';
						activos+='</optgroup>';
						$('#AF_BC_baja').html(activos);
						$("#AF_BC_baja").show();
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#AF_BC_baja').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	$("#AF_BC_baja").change(function() {
		$("#Id_Activo_Baja_Form").val("");
		$("#Serie_baja").val("");
		$("#marca_baja").val("");
		$("#modelo_baja").val("");
		$("#cmbestatus_baja").val("");
		$("#cmbarea_baja").val("");
		$("#cmbubicacionprimaria_baja").val("");
		$("#cmbubicacionsecundaria_baja").val("");
		$("#desccorta_baja").val("");
		$("#jefearea_baja").val("");
		
		if(this.value!=""){
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					Id_Activo:this.value,
					accion: 'activos'
				},
				async: false,
				dataType: "html",
				beforeSend: function (objeto) {
				},
				success: function (datos) {
					var data = "";
						data = eval("(" + datos + ")"); //Parsear JSON

						if (data.totalCount > 0) {
							$("#Id_Activo_Baja_Form").val(data.data[0].Id_Activo);
							$("#Serie_baja").val(data.data[0].NumSerie);
							$("#marca_baja").val(data.data[0].Marca);
							$("#modelo_baja").val(data.data[0].Modelo);
							$("#cmbestatus_baja").val(data.data[0].Estatus_Reg);
							$("#cmbarea_baja").val(data.data[0].Id_Area);
							$("#cmbubicacionprimaria_baja").val(data.data[0].Id_Ubic_Prim);
							$("#cmbubicacionsecundaria_baja").val(data.data[0].Id_Ubic_Sec);
							$("#desccorta_baja").val(data.data[0].DescCorta);
							$("#jefearea_baja").val(data.data[0].Jefe_Area);	
							
						}else {
							mensajesalerta("", "No se encontraron resultados", "error", "dark");
						}

				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
		}
	});
	
	
	autocomplete_reubicacion();
	
	//Autocomplete usuarios BAJA	
	autocomplete_usuarios_baja();
	function autocomplete_usuarios_baja(){
		var strdatos="";
		
		strdatos={
			Estatus_Reg:"1",
			accion: 'consultar'
		}
		
			
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",
			data: strdatos,
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gif_usuario_baja").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var usr_baja='';
					if (json.totalCount > 0) {

						
						usr_baja+='<option></option>';
						usr_baja+='<optgroup label="Usuarios Baja">';
						
						for (var i = 0; i < json.totalCount; i++) {
							usr_baja+='<option value="'+json.data[i].Id_Usuario+'">'+json.data[i].No_Usuario+'-'+json.data[i].Nombre_Usuario+'</option>';
						}
						usr_baja+='</optgroup>';
						$('#Usuario_soli_baja').html(usr_baja);

						$("#gif_usuario_baja").hide();
						$("#Usuario_soli_baja").show();
							
						$('#Usuario_soli_baja').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gif_usuario_baja").hide();
						usr_baja+='<option>--Sin Resultados--</option>';
						usr_baja+='<optgroup label="Usuario Baja">';
						usr_baja+='</optgroup>';
						$('#Usuario_soli_baja').html(usr_baja);
						$("#Usuario_soli_baja").show();
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#Usuario_soli_baja').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	
	
	function autocomplete_reubicacion(){
		//Area
		var Id_Area=$("#idareasesion").val();
		var strdatos="";
		
		if(Id_Area!="5"){
			strdatos={
				Id_Area:Id_Area,
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}else{
			strdatos={
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
				$("#gifcargando2").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var activos='';
					if(json.totalCount > 0){
						activos+='<option></option>';
						activos+='<optgroup label="Activos">';
						
						for (var i = 0; i < json.totalCount; i++) {
							activos+='<option value="'+json.data[i].Id_Activo+'">'+json.data[i].AF_BC+' '+json.data[i].Nombre_Activo+'</option>';
						}
						activos+='</optgroup>';
						$('#AF_BC_reubicacion').html(activos);

						$("#gifcargando2").hide();
						$("#AF_BC_reubicacion").show();
							
						$('#AF_BC_reubicacion').selectize({
							//sortField: 'text'
						});
					}else {
						$("#gifcargando2").hide();
						activos+='<option>--Sin Resultados--</option>';
						activos+='<optgroup label="Activos">';
						activos+='</optgroup>';
						$('#AF_BC_reubicacion').html(activos);
						$("#AF_BC_reubicacion").show();
					}
					
					
					//

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#AF_BC_reubicacion').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	$("#AF_BC_reubicacion").change(function() {
		$("#Id_Activo_reubicacion_Form").val("");
		$("#Serie_reubicacion").val("");
		$("#marca_reubicacion").val("");
		$("#modelo_reubicacion").val("");
		$("#cmbestatus_reubicacion").val("");
		$("#cmbarea_reubicacion").val("");
		$("#cmbubicacionprimaria_reubicacion").val("");
		$("#cmbubicacionsecundaria_reubicacion").val("");
		$("#desccorta_reubicacion").val("");
		$("#jefearea_reubicacion").val("");
		if(this.value!=""){
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					Id_Activo:this.value,
					accion: 'activos'
				},
				async: false,
				dataType: "html",
				beforeSend: function (objeto) {
				},
				success: function (datos) {
					var data = "";
						data = eval("(" + datos + ")"); //Parsear JSON

						if (data.totalCount > 0) {
							$("#Id_Activo_reubicacion_Form").val(data.data[0].Id_Activo);
							$("#Serie_reubicacion").val(data.data[0].NumSerie);
							$("#marca_reubicacion").val(data.data[0].Marca);
							$("#modelo_reubicacion").val(data.data[0].Modelo);
							$("#cmbestatus_reubicacion").val(data.data[0].Estatus_Reg);
							$("#cmbarea_reubicacion").val(data.data[0].Id_Area);
							$("#cmbubicacionprimaria_reubicacion").val(data.data[0].Id_Ubic_Prim);
							$("#cmbubicacionsecundaria_reubicacion").val(data.data[0].Id_Ubic_Sec);
							$("#desccorta_reubicacion").val(data.data[0].DescCorta);
							$("#jefearea_reubicacion").val(data.data[0].Jefe_Area);
							
						}else {
							mensajesalerta("", "No se encontraron resultados", "error", "dark");
						}

				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
		}
	});
	
	//Autocomplete Usuarios Resguardo
	usuarios_empleados();
	function usuarios_empleados(){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoFacade.Class.php",
			data: {
				accion: 'consultar'
			},
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargandoaltausuarios").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {

						var usuarios='';
						usuarios+='<option></option>';
						usuarios+='<optgroup label="Empleado Resguardo">';

						for (var i = 0; i < json.totalCount; i++) {
							usuarios+='<option value="'+json.data[i].num_empleado.trim()+'">'+json.data[i].num_empleado.trim()+'-'+json.data[i].nombre_completo.trim()+'</option>';
						}
						usuarios+='</optgroup>';
						$('#numempleadoresguardo').html(usuarios);

						$("#gifcargandoaltausuarios").hide();
						$("#numempleadoresguardo").show();
							
						$('#numempleadoresguardo').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargandoaltausuarios").hide();
						$('#numempleadoresguardo').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#numempleadoresguardo').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	$("#numempleadoresguardo").change(function() {
		$("#nombreempleadoresguardo").val("");
		if(this.value!=""){
			var valor = $("#numempleadoresguardo option:selected").html();
			var res = valor.split("-");
			
			$("#nombreempleadoresguardo").val(res[1]);
		}
	});
	
	
	$("#generarbaja").click(function () {
			
		var Agregar = true;
		var mensaje_error = "";
		var Id_Activo=$("#Id_Activo_Baja_Form").val();
		var Id_baja=$("#Id_baja_activo").val();
		var Motivo_Baja=$.trim($("#Motivo_Baja").val());
		var Comentarios=$.trim($("#Comentarios_baja").val());
		var Destino=$.trim($("#Destinofinal_baja").val());
		var Fecha_Baja=$.trim($("#Fecha_baja").val());
		var Usuario=$.trim($("#Usuario_soli_baja").val());
		
		var strDatos=""; 
		
		if (Id_Activo.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Selecciona un activo<br />";
		}
		
		if (Motivo_Baja.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Motivo de la baja del activo<br />";
		}
		
		if (Comentarios <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Comentario<br />";
		}
		
		if (Destino.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Destino<br />";
		}
		
		if (Fecha_Baja <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Fecha de baja<br />";
		}
		
		if (Usuario <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Usuario<br />";
		}
				
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar)
		{
	        /* Obligatorios */
			strDatos = "Id_baja="+Id_baja;
			strDatos += "&Id_Activo="+Id_Activo; 
			strDatos += "&Motivo_Baja="+Motivo_Baja; 
			strDatos += "&Comentarios="+Comentarios;
			strDatos += "&Destino="+Destino;
			strDatos += "&Fecha_Baja="+Fecha_Baja;
			strDatos += "&Usuario="+Usuario;
		
			if(Id_baja.length <= 0){
				strDatos += "&Usr_Inser=pruinser";
				strDatos += "&Estatus_Reg=1";				
				strDatos += "&accion=guardar";
			}
			else{
				//strDatos += "&Id_baja="+Id_baja;
				strDatos += "&Usr_Mod=prumod";
				strDatos += "&Estatus_Reg=2";				
				strDatos += "&accion=guardar";
			}
		
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_baja_activo/Siga_baja_activoFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					limpiarcamposbaja();
					$('#bajaEquipo').modal("hide");
				
					mensajesalerta("&Eacute;xito", "Guardado Correctamente.", "success", "dark");	
					
					tablabaja();
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
  
    $("#generarreubicacion").click(function () {
			
		var Agregar = true;
		var mensaje_error = "";
		var Id_Activo=$("#Id_Activo_reubicacion_Form").val();
		var Id_Activo_Reubicacion=$("#Id_reubicacion_activo").val();
		//Usuario Logueado
		var Id_Usuario_Sesion=$("#usuariosesion").val();
		
		var Id_Area=$.trim($("#cmb_area_guardar").val());
		var Id_Ubic_Prim=$.trim($("#cmb_ubic_prim_reub_guar").val());
		var Id_Ubic_Sec=$.trim($("#cmb_ubic_sec_reub_guar").val());
		var Id_Usuario_Responsable=$.trim($("#numempleadoreubicacion").val());
		var Nom_Usuario_Reponsable=$.trim($("#usuario_resp_guardar").val());
		var Centro_Costos=$.trim($("#centro_costos_guardar").val());
		var Jefe_Area=$.trim($("#jefearea_reubicacion").val());
		var Motivo_Reubicacion=$.trim($("#Motivo_Reubicacion").val());
		var Comentarios_Reubicacion=$.trim($("#comentarios_reubicacion").val());
	
		//var Foto=$.trim($("#Url_Foto_Activo").val());
		var strDatos=""; 
		
		if (Id_Activo.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Selecciona un activo<br />";
		}
		
		if (Id_Area == "-1") {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Area<br />";
		}
		
		if (Id_Ubic_Prim == "-1") {
			Agregar = false; 
			mensaje_error += " -Falta agregar la ubicaci&oacute;n primaria<br />";
		}
		
		if (Id_Ubic_Sec == "-1") {
			Agregar = false; 
			mensaje_error += " -Falta agregar la ubicaci&oacute;n secundaria<br />";
		}
		
		if (Nom_Usuario_Reponsable <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el usuario responsable<br />";
		}
		
		
		if (Centro_Costos == "-1") {
			Agregar = false; 
			mensaje_error += " -Falta agregar el centro de costos<br />";
		}
		/*
		if (Jefe_Area <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Jefe de área<br />";
		}*/
		
		if (Motivo_Reubicacion <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el motivo de la reubicaci&oacute;n<br />";
		}
		
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar)
		{
	        /* Obligatorios */
			strDatos = "Id_Activo_Reubicacion="+Id_Activo_Reubicacion;
			strDatos += "&Id_Activo="+Id_Activo;
			
			strDatos += "&Id_Area="+Id_Area; 
			strDatos += "&Id_Ubic_Prim="+Id_Ubic_Prim;
			strDatos += "&Id_Ubic_Sec="+Id_Ubic_Sec;
			strDatos += "&Id_Usuario_Responsable="+Id_Usuario_Responsable;
			strDatos += "&Nom_Usuario_Reponsable="+Nom_Usuario_Reponsable;
			strDatos += "&Centro_Costos="+Centro_Costos;
			strDatos += "&Jefe_Area="+Jefe_Area;
			strDatos += "&Motivo_Reubicacion="+Motivo_Reubicacion;
			strDatos += "&Comentarios_Reubicacion="+Comentarios_Reubicacion;
	
			if(Id_Activo_Reubicacion.length <= 0){
				strDatos += "&Usr_Inser="+Id_Usuario_Sesion;
				strDatos += "&Estatus_Reg=1";				
				strDatos += "&accion=guardar";
			}
			else{
				strDatos += "&Usr_Mod="+Id_Usuario_Sesion;
				strDatos += "&Estatus_Reg=2";				
				strDatos += "&accion=guardar";
			}
		
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_reubicacion_activo/Siga_reubicacion_activoFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					limpiarcamposreubicacion();
					$('#reubicacionEquipo').modal("hide");
				
					mensajesalerta("&Eacute;xito", "Guardado Correctamente.", "success", "dark");	
					
					tablareubicacion();
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
  
  
  //Tabla dinamica donde se muestran los usuarios
	$('#tablaactivos').DataTable({
	    "scrollY": 500,
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "ajax": { 
            "url": "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
            "type": "POST",
			"data": {
				Id_Area:$("#idareasesion").val(),
				orden:'AF_BC',
			}
        },
        "columns": [
			{ "data": "AF_BC", "visible": false},
			{
			    "data": function (obj) {
			        var edicion = '';
			        edicion += '<span onclick="pasarvalores(' + obj.Id_Activo + ')"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
                    edicion += '<span onclick="pasarelimina(' + obj.Id_Activo + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
					return edicion;
			    }
			},
			{
					"data": function (obj) {
						var Pdf = '';
						Pdf = '<a target="_blank" href="../controladores/activos/siga_activos/Reporte-Alta.php?Id_Activo='+obj.Id_Activo+'" class="fa fa-paperclip" aria-hidden="true"></a>';
						return Pdf;
					}
				},
			{ "data": "AF_BC"},
			//{ "data": "Foto"},
			{ "data": function (obj) {
				var Foto="";
				if(obj.Foto!=null){
					Foto = '<img src="../Archivos/Archivos-Activos/' + obj.Foto + '"  class="img-responsive img-rounded" style="width:200px;height:auto;">';
			    }
				return Foto;
				}
			},
			{ "data": "Nombre_Activo"},
			{ "data": "Area"},
			{ "data": "Clasificacion"},
		    { "data": "Propiedad"},
			{ "data": "TipoActivo"},
			{ "data": "DescCorta"},
			{ "data": "UbicacionPrimaria"},
			{ "data": "UbicacionSecundaria"},
			
			
        ], "language": {
            "lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
            "zeroRecords": "Sin Resultados",
            "info": "Monstrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
            "infoEmpty": "Sin Resultados",
            "infoFiltered": "(Mostrando  _MAX_ del total de registros)",
            "search": "Busqueda: ",
            "paginate": {
                "first": "Primera",
                "last": "Ultima",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
	
	tablabaja=function(){
		$('#tablebajas').DataTable().clear().destroy(); 
		 
		$('#tablebajas').DataTable({
			"scrollY": 500,
			"scrollX": true,
			"paging": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"ajax": { 
				"url": "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				"type": "POST",
				"data": {
				Id_Area:$("#idareasesion").val(),
				orden:'AF_BC',
				estatus:'baja'}
			},
			"columns": [
				{ "data": "AF_BC", "visible": false},
				{
					"data": function (obj) {
						var edicion = '';
						edicion += '<span onclick="pasarvalores_baja(' + obj.Id_Activo + ')"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
						//edicion += '<span onclick="pasarelimina(' + obj.Id_Activo + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
						return edicion;
					}
				},
				{
					"data": function (obj) {
						var Pdf = '';
						Pdf = '<a target="_blank" href="../controladores/activos/siga_activos/Reporte-Baja.php?Id_baja='+obj.Id_Baja_Reubicacion+'&Id_Activo='+obj.Id_Activo+'" class="fa fa-paperclip" aria-hidden="true"></a>';
						return Pdf;
					}
				},
				{ "data": "AF_BC"},
				//{ "data": "Foto"},
				{ "data": function (obj) {
					var Foto="";
					if(obj.Foto!=null){
						Foto = '<img src="../Archivos/Archivos-Activos/' + obj.Foto + '"  class="img-responsive img-rounded" style="width:200px;height:auto;">';
					}
					return Foto;
					}
				},
				{ "data": "Nombre_Activo"},
				{ "data": "Area"},
				{ "data": "Clasificacion"},
				{ "data": "Propiedad"},
				{ "data": "TipoActivo"},
				{ "data": "DescCorta"},
				{ "data": "UbicacionPrimaria"},
				{ "data": "UbicacionSecundaria"}
				
				
			], "language": {
				"lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
				"zeroRecords": "Sin Resultados",
				"info": "Monstrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
				"infoEmpty": "Sin Resultados",
				"infoFiltered": "(Mostrando  _MAX_ del total de registros)",
				"search": "Busqueda: ",
				"paginate": {
					"first": "Primera",
					"last": "Ultima",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			}
		});
	}
	
	tablareubicacion=function(){
		$('#tablereubicacion').DataTable().clear().destroy(); 
		 
		$('#tablereubicacion').DataTable({
			"scrollY": 500,
			"scrollX": true,
			"paging": true,
			"autoWidth": false,
			"processing": true,
			"serverSide": true,
			"ajax": { 
				"url": "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				"type": "POST",
				"data": {
				Id_Area:$("#idareasesion").val(),
				orden:'AF_BC',
				estatus:'reubicacion'}
			},
			"columns": [
				{ "data": "AF_BC", "visible": false},
				{
					"data": function (obj) {
						var edicion = '';
						edicion += '<span onclick="pasarvalores_reubicacion(' + obj.Id_Activo + ')"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
						//edicion += '<span onclick="pasarelimina(' + obj.Id_Activo + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
						return edicion;
					}
				},
				{
					"data": function (obj) {
						var Pdf = '';
						Pdf = '<a target="_blank" href="../controladores/activos/siga_activos/Reporte-Reubicacion.php?Id_Activo_Reubicacion='+obj.Id_Baja_Reubicacion+'&Id_Activo='+obj.Id_Activo+'" class="fa fa-paperclip" aria-hidden="true"></a>';
						return Pdf;
					}
				},
				{ "data": "AF_BC"},
				//{ "data": "Foto"},
				{ "data": function (obj) {
					var Foto="";
					if(obj.Foto!=null){
						Foto = '<img src="../Archivos/Archivos-Activos/' + obj.Foto + '"  class="img-responsive img-rounded" style="width:200px;height:auto;">';
					}
					return Foto;
					}
				},
				{ "data": "Nombre_Activo"},
				{ "data": "Area"},
				{ "data": "Clasificacion"},
				{ "data": "Propiedad"},
				{ "data": "TipoActivo"},
				{ "data": "DescCorta"},
				{ "data": "UbicacionPrimaria"},
				{ "data": "UbicacionSecundaria"}
				
				
			], "language": {
				"lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
				"zeroRecords": "Sin Resultados",
				"info": "Monstrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
				"infoEmpty": "Sin Resultados",
				"infoFiltered": "(Mostrando  _MAX_ del total de registros)",
				"search": "Busqueda: ",
				"paginate": {
					"first": "Primera",
					"last": "Ultima",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			}
		});
	}
	
	
	limpiarcampos=function()
	{
		//$(".fileinput-remove").click();
	
		$("#numusuarioalta").prop("disabled", true);
		$("#numusuarioalta").val("");
		
		$("#Id_Activo").val("");
		$("#AF_BC").val("");
		$("#Nombre").val("");
		$("#DescCorta").val("");
		$("#cmbubicacionprim").val(-1);
		$("#cmbubicacionsec").val(-1);
		$("#cmbestatus").val(-1);
		$("#cmbareas").val(-1);
		$("#cmbclase").val(-1);
		$("#cmbclasificacion").val(-1);
		$("#cmbpropiedad").val(-1);
		$("#cmbmotivo").val(-1);
		$("#cmbfamilia").val(-1);
		$("#cmbsubfamilia").val(-1);
		$("#cmbtipoactivo").val(-1);
		$("#DescLarga").val("");
		$("#Marca").val("");
		$("#modelo").val("");
		$("#numserie").val("");
		$("#numactivoanterior").val("");
		$("#cmbPRE").val(-1);
		$("#cmbseguros").val(-1);
		$("#cmbcertificacion").val(-1);
		$("#importeseguros").val("");
		
		var Num_Empleado=$.trim($("#numempleadoresguardo").val());
		if(Num_Empleado!=""){			
			if(Num_Empleado.length > 0){
				var $select3 = $('#numempleadoresguardo').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
			}
		}
		$("#nombreempleadoresguardo").val("");
		
		$("#cmb_mant_prevent").val(-1);
		$("#cmbtipovaleresguardo").val(-1);
		$("#garantia").val("");
		$("#extension").val("");
		$("#especifica").val("");
		$("#Url_Foto_Activo").val("");
		
		$("#AF_BC2").val("");
		$("#Nombre2").val("");
		$("#DescCorta2").val("");
		$("#cmbubicacionprim2").val(-1);
		$("#cmbubicacionsec2").val(-1);
		$("#cmbestatus2").val(-1);
		
		$("#AF_BC3").val("");
		$("#Nombre3").val("");
		$("#DescCorta3").val("");
		$("#cmbubicacionprim3").val(-1);
		$("#cmbubicacionsec3").val(-1);
		$("#cmbestatus3").val(-1);

	}
	
	limpiarcamposproveedor=function()
	{
		$("#Id_activo_proveedor").val("");
		
		$("#Folio_Fiscal").val("");
		$("#Monto_Factura").val("");
		$("#NumOrdenCompra").val("");
		$("#NumFactura").val("");
		$("#FechaFactura").val("");
		$("#UUID").val("");
		$("#MontoFactura_s_iva").val("");
		$("#VidaUtilFabricante").val("");
		$("#VidaUtilCHS").val("");
		$("#garantia").val("");
		$("#extension").val("");
		$("#Fecha_Vencimiento").val("");
		$("#NombreProveedor").val("");
		$("#Id_Proveedor").val("");
		$("#Contacto").val("");
		$("#Telefono").val("");
		$("#Correo").val("");
		$("#DocRecibida").val("");
		$("#Accesorios").val("");
		$("#Consumibles").val("");
		$("#NumContrato").val("");
		
		$("#url_contrato").val("");
		$("#url_corto").val("");
		$("#url_factura0").val("");
		$("#url_xml").val("");
	}
	
	limpiarcamposcontabilidad=function(){
		$("#Id_Activo_Contabilidad").val("");
		$("#centro_costos").val("-1");
		$("#cmbparticipaendepresiacion").val(-1);
		$("#no_capex").val("");
		$("#Prorratear").val("");
		$("#fecha_inicio_depr").val("");
		$("#url_factura").val("");
		$("#url_xml_contabilidad").val("");
	}

	limpiarcamposbaja=function(){
		var Nom_Activo=$.trim($("#AF_BC_baja").val());
		if(Nom_Activo!=""){			
			if(Nom_Activo.length > 0){
				var $select3 = $('#AF_BC_baja').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
				control3.enable();
			}
		}
		
		$("#Id_Activo_Baja_Form").val("");
		$("#Serie_baja").val("");
		$("#marca_baja").val("");
		$("#modelo_baja").val("");
		$("#cmbestatus_baja").val("");
		$("#cmbarea_baja").val("");
		$("#cmbubicacionprimaria_baja").val("");
		$("#cmbubicacionsecundaria_baja").val("");
		$("#desccorta_baja").val("");
		$("#jefearea_baja").val("");
		
		$("#jefearea_baja").val("");
		$("#Id_baja_activo").val("");
		$("#Motivo_Baja").val("");
		$("#Comentarios_baja").val("");
		$("#Destinofinal_baja").val("");
		$("#Fecha_baja").val(obtenerfechaactual());
		var Usuario_Baja=$.trim($("#Usuario_soli_baja").val());
		if(Usuario_Baja!=""){			
			if(Usuario_Baja.length > 0){
				var $usr_baja = $('#Usuario_soli_baja').selectize({});	
				var usr_baja2 = $usr_baja[0].selectize;
				usr_baja2.clear();
				usr_baja2.enable();
			}
		}
		
		
		$("#Jefe_Area").val("");
	}

	limpiarcamposreubicacion=function(){
		var Nom_Activo=$.trim($("#AF_BC_reubicacion").val());
		if(Nom_Activo!=""){			
			if(Nom_Activo.length > 0){
				var $select3 = $('#AF_BC_reubicacion').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
				control3.enable();
			}
		}
		
		
		var Num_Empleado=$.trim($("#numempleadoreubicacion").val());
		if(Num_Empleado!=""){			
			if(Num_Empleado.length > 0){
				var $select3 = $('#numempleadoreubicacion').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
			}
		}
		$("#usuario_resp_guardar").val("");
		
		
		$("#Id_Activo_reubicacion_Form").val("");
		$("#Serie_reubicacion").val("");
		$("#marca_reubicacion").val("");
		$("#modelo_reubicacion").val("");
		$("#cmbestatus_reubicacion").val("");
		$("#cmbarea_reubicacion").val("");
		$("#cmbubicacionprimaria_reubicacion").val("");
		$("#cmbubicacionsecundaria_reubicacion").val("");
		$("#desccorta_reubicacion").val("");
		
		$("#jefearea_reubicacion").val("");
		$("#Id_reubicacion_activo").val("");
		$("#cmb_area_guardar").val("-1");
		$("#cmb_ubic_prim_reub_guar").val("-1");
		$("#cmb_ubic_sec_reub_guar").val("-1");
		$("#Usuario_soli_baja").val("");
		$("#centro_costos_guardar").val("-1");
		
		$("#Motivo_Reubicacion").val("");
		$("#comentarios_reubicacion").val("");
	}

	
		//Pasar Valores al Editar
	pasarvalores=function(id) {
		
		limpiarcampos();
		limpiarcamposproveedor();
		limpiarcamposcontabilidad();
		limpiarcamposbaja();
		
        if (id != "") {
            $.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
                async: false,
                data: {
                    Id_Activo: id,
                    accion: "consultar"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
				
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
                        $("#Id_Activo").val(data.data[0].Id_Activo);
						$("#AF_BC").val(data.data[0].AF_BC);
						$("#Nombre").val(data.data[0].Nombre_Activo);
						$("#DescCorta").val(data.data[0].DescCorta);
						$("#cmbubicacionprim").val(data.data[0].Id_Ubic_Prim);
						if(data.data[0].Id_Ubic_Prim!=""){
							ubic_sec(data.data[0].Id_Ubic_Prim);
						}
						$("#cmbubicacionsec").val(data.data[0].Id_Ubic_Sec);
						$("#cmbestatus").val(data.data[0].Id_Situacion_Activo);
						$("#cmbareas").val(data.data[0].Id_Area);
						$("#cmbclase").val(data.data[0].Id_Clase);
						if(data.data[0].Id_Clase!=""){
							clasificacion(data.data[0].Id_Clase);
						}
						$("#cmbclasificacion").val(data.data[0].Id_Clasificacion);
						$("#cmbpropiedad").val(data.data[0].Id_Propiedad);
						$("#cmbmotivo").val(data.data[0].Id_Motivo_Alta);
						$("#cmbfamilia").val(data.data[0].Id_Familia);
						$("#cmbtipoactivo").val(data.data[0].Id_Tipo_Activo);
						$("#DescLarga").val(data.data[0].DescLarga);
						/* Opcionales*/
						if(data.data[0].Id_Familia!=""){
							subfamilia(data.data[0].Id_Familia);
						}
						$("#cmbsubfamilia").val(data.data[0].Id_Subfamilia);
						$("#Marca").val(data.data[0].Marca);
						$("#modelo").val(data.data[0].Modelo);
						$("#numserie").val(data.data[0].NumSerie);
						$("#numactivoanterior").val(data.data[0].NumActivoAnterior);
						$("#cmbPRE").val(data.data[0].ParticipaPre);
						$("#cmbseguros").val(data.data[0].ParticipaSeguros);
						
						$("#MontoDepPeriodo").val(Math.round(data.data[0].Depreciacion*100)/100);
						$("#DepreciacionAcumulada").val(Math.round(data.data[0].DepreciacionAcumulada*100)/100);
						
						$("#MontoDepPeriodoMixta").val(Math.round(data.data[0].DepreciacionMixta*100)/100);
						$("#DepreciacionAcumuladaMixta").val(Math.round(data.data[0].DepreciacionAcumuladaMixta*100)/100);
						
						$("#MontoDepPeriodoFiscal").val(Math.round(data.data[0].DepreciacionPeriodoFiscal*100)/100);
						$("#DepreciacionFiscal").val(Math.round(data.data[0].DepreciacionFiscal*100)/100);
						
						$("#MontoDepPeriodoFiscalD4").val(Math.round(data.data[0].DepreciacionPeriodoFiscalD4*100)/100);
						$("#DepreciacionFiscalD4").val(Math.round(data.data[0].DepreciacionFiscalD4*100)/100);

						$("#MontoDepPeriodoFiscalB10").val(Math.round(data.data[0].DepreciacionPeriodoFiscalB10*100)/100);
						$("#DepreciacionFiscalB10").val(Math.round(data.data[0].DepreciacionFiscalB10*100)/100);


						
						if(data.data[0].Mant_Prevent!=null&&data.data[0].Mant_Prevent!=""){
							$("#cmb_mant_prevent").val(data.data[0].Mant_Prevent);
						}else{
							$("#cmb_mant_prevent").val(-1);	
						}
						$("#cmbcertificacion").val(data.data[0].ParticipaCertificacion);
						$("#importeseguros").val(data.data[0].ImporteSeguros);
						
						var $select3 = $('#numempleadoresguardo').selectize({});	
						var control3 = $select3[0].selectize;
						control3.addItem(data.data[0].Num_Empleado);
						//$("#numempleadoresguardo").val(data.data[0].Num_Empleado);
						$("#nombreempleadoresguardo").val(data.data[0].Nombre_Completo);
						$("#cmbtipovaleresguardo").val(data.data[0].Id_Tipo_Vale_Resg);
						$("#garantia").val(data.data[0].Garantia);
						$("#extension").val(data.data[0].ExtGarantia);
						
						
						$("#cmbubicacionprim3").val(data.data[0].Id_Ubic_Prim);
						$("#cmbubicacionsec3").val(data.data[0].Id_Ubic_Sec);
						$("#AF_BC3").val(data.data[0].AF_BC);
						$("#Nombre3").val(data.data[0].Nombre_Activo);
						$("#DescCorta3").val(data.data[0].DescCorta);
						$("#cmbestatus3").val(data.data[0].Estatus_Reg);
						$("#Url_Foto_Activo3").val(data.data[0].Foto);
						$("#Url_Foto_Activo3").val(data.data[0].Foto);
						
						$("#cmbubicacionprim2").val(data.data[0].Id_Ubic_Prim);
						$("#cmbubicacionsec2").val(data.data[0].Id_Ubic_Sec);
						$("#AF_BC2").val(data.data[0].AF_BC);
						$("#Nombre2").val(data.data[0].Nombre_Activo);
						$("#DescCorta2").val(data.data[0].DescCorta);
						$("#cmbestatus2").val(data.data[0].Estatus_Reg);
						$("#especifica").val(data.data[0].Especifica);
						$("#especifica2").val(data.data[0].Especifica);
						$("#Url_Foto_Activo").val(data.data[0].Foto);
						$("#Url_Foto_Activo2").val(data.data[0].Foto);
						
						//$("#AF_BC_baja").val(data.data[0].AF_BC);
						//$("#Serie_baja").val(data.data[0].NumSerie);
						//$("#marca_baja").val(data.data[0].Marca);
						//$("#modelo_baja").val(data.data[0].Modelo);
						//$("#cmbestatus_baja").val(data.data[0].Estatus_Reg);
						//$("#cmbarea_baja").val(data.data[0].Id_Area);
						//$("#cmbubicacionprimaria_baja").val(data.data[0].Id_Ubic_Prim);
						//$("#cmbubicacionsecundaria_baja").val(data.data[0].Id_Ubic_Sec);
						//$("#desccorta_baja").val(data.data[0].DescCorta);
						
						$('#altaEquipo').modal('show');
						
						if(data.data[0].Foto!=null && data.data[0].Foto.length>0){
							cargar_archivos("Url_Foto_Activo", "documentos_adjuntos_FILE", data.data[0].Foto,"../Archivos/Archivos-Activos",true,false);
							cargar_archivos("Url_Foto_Activo2", "documentos_adjuntos_FILE2", data.data[0].Foto,"../Archivos/Archivos-Activos",true,false);
							cargar_archivos("Url_Foto_Activo3", "documentos_adjuntos_FILE3", data.data[0].Foto,"../Archivos/Archivos-Activos",true,false);
						}
						
						if(data.data[0].Usr_Inser!=""){
							usuario_insert(data.data[0].Usr_Inser);
						}
						
                    }
                },
                error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
			
			
			$.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_activo_proveedor/Siga_activo_proveedorFacade.Class.php",
                async: false,
                data: {
                    id_Activo: id,
					Estatus_Reg:"1",
                    accion: "consultar"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
				
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
                        $("#Id_activo_proveedor").val(data.data[0].Id_activo_proveedor);
						$("#NumOrdenCompra").val(data.data[0].NumOrdenCompra);
						$("#Folio_Fiscal").val(data.data[0].Folio_Fiscal);
						$("#Monto_Factura").val(data.data[0].Monto_F);
						$("#NumFactura").val(data.data[0].NumFactura);
						
						var fecha_fac="";
						if(data.data[0].FechaFactura!=""){
							fecha_fac=data.data[0].FechaFactura[8]+""+data.data[0].FechaFactura[9]+"/"+data.data[0].FechaFactura[5]+""+data.data[0].FechaFactura[6]+"/"+data.data[0].FechaFactura[0]+""+data.data[0].FechaFactura[1]+""+data.data[0].FechaFactura[2]+""+data.data[0].FechaFactura[3];
						}
						$("#FechaFactura").val(fecha_fac);
						$("#UUID").val(data.data[0].UUID);
						$("#MontoFactura_s_iva").val(data.data[0].MontoFactura);
						$("#NumContrato").val(data.data[0].NumContrato);
						$("#VidaUtilFabricante").val(data.data[0].VidaUtilFabricante);
						$("#VidaUtilCHS").val(data.data[0].VidaUtilCHS);
						$("#extension").val(data.data[0].ExtGarantia);
						$("#garantia").val(data.data[0].Garantia);
						$("#Fecha_Vencimiento").val(data.data[0].Fecha_Vencimiento);
						$("#Id_Proveedor").val(data.data[0].Id_Proveedor);
						$("#NombreProveedor").val(data.data[0].NombreProveedor);
						$("#Contacto").val(data.data[0].Contacto);
						$("#Telefono").val(data.data[0].Telefono);
						$("#Correo").val(data.data[0].Correo);
						/* Opcionales*/
						$("#DocRecibida").val(data.data[0].DocRecibida);
						$("#Accesorios").val(data.data[0].Accesorios);
						$("#Consumibles").val(data.data[0].Consumibles);
						//header contabilidad
						$("#NumFactura3").val(data.data[0].NumFactura);
						$("#FechaFactura3").val(data.data[0].FechaFactura);
						$("#VidaUtilFabricante3").val(data.data[0].VidaUtilFabricante);
						$("#VidaUtilCHS3").val(data.data[0].VidaUtilCHS);
						$("#MontoFactura3").val(data.data[0].MontoFactura);
						
						if(data.data[0].Url_Factura!=null && data.data[0].Url_Factura.length>0){
							$("#url_factura0").val(data.data[0].Url_Factura);
							cargar_archivos("url_factura0", "documentos_adjuntos_factura0", data.data[0].Url_Factura,"../Archivos/Archivos-Activos-Proveedores",true,false);
						}
						if(data.data[0].Url_Contrato!=null && data.data[0].Url_Contrato.length>0){
							$("#url_contrato").val(data.data[0].Url_Contrato);
							cargar_archivos("url_contrato", "documentos_adjuntos_contrato", data.data[0].Url_Contrato,"../Archivos/Archivos-Activos-Proveedores",true,false);
						}
						if(data.data[0].Url_Otro_Doc!=null && data.data[0].Url_Otro_Doc.length>0){
							$("#url_corto").val(data.data[0].Url_Otro_Doc);
							cargar_archivos("url_corto", "documentos_adjuntos_corto", data.data[0].Url_Otro_Doc,"../Archivos/Archivos-Activos-Proveedores",true,false);
						}
						
						if(data.data[0].Url_Xml!=null && data.data[0].Url_Xml.length>0){
							$("#url_xml").val(data.data[0].Url_Xml);
							cargar_archivos("url_xml", "documentos_adjuntos_xml", data.data[0].Url_Xml,"../Archivos/Archivos-Activos-Proveedores",true,false);
						}
						
						
						//$('#altaEquipo').modal('show');
						/*
						if(data.data[0].Foto!=null && data.data[0].Foto.length>0){
							cargar_archivos("Url_Foto_Activo", "documentos_adjuntos_FILE", data.data[0].Foto,"../Archivos/Archivos-Actividades/Mantenimiento-Predictivo");
						}*/
						
                    }
                },
                error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
			
			$.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_activos_contabilidad/Siga_activos_contabilidadFacade.Class.php",
                async: false,
                data: {
                    Id_Activo: id,
					Estatus_Reg:"1",
                    accion: "consultar"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
				
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
                        $("#Id_Activo_Contabilidad").val(data.data[0].Id_Activo_Contabilidad);
						$("#centro_costos").val(data.data[0].Centro_Costos);
						$("#cmbparticipaendepresiacion").val(data.data[0].Participa_Depreciacion);
						$("#no_capex").val(data.data[0].No_Capex);
						$("#Prorratear").val(data.data[0].Prorrateo);
						var fecha_dep="";
						if(data.data[0].Fecha_Inicio_Depr!=""){
							fecha_dep=data.data[0].Fecha_Inicio_Depr[8]+""+data.data[0].Fecha_Inicio_Depr[9]+"/"+data.data[0].Fecha_Inicio_Depr[5]+""+data.data[0].Fecha_Inicio_Depr[6]+"/"+data.data[0].Fecha_Inicio_Depr[0]+""+data.data[0].Fecha_Inicio_Depr[1]+""+data.data[0].Fecha_Inicio_Depr[2]+""+data.data[0].Fecha_Inicio_Depr[3];
						}
						$("#fecha_inicio_depr").val(fecha_dep);
						
						if(data.data[0].Url_Factura!=null && data.data[0].Url_Factura.length>0){
							$("#url_factura").val(data.data[0].Url_Factura);
							cargar_archivos("url_factura", "documentos_adjuntos_factura", data.data[0].Url_Factura,"../Archivos/Archivos-Activos-Contabilidad",true,false);
						}
                    }
                },
                error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
			
		
		}
    }
	
	usuario_insert=function(Id_Usuario){
		$.ajax({
            type: "POST",
            url: "../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",
            async: false,
            data: {
				Estatus_Reg:"1",
                Id_Usuario: Id_Usuario,
                accion: "consultar"
            },
            dataType: "html",
            beforeSend: function (xhr) {

            },
			
            success: function (data) {
                data = eval("(" + data + ")");
                if (data.totalCount > 0) {
					$("#numusuarioalta").val(data.data[0].No_Usuario+"-"+data.data[0].Nombre_Usuario);
                }
            },
            error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
            }
        });
		
	}
	
	pasarvalores_baja=function(id){
		limpiarcamposbaja();
		$.ajax({
            type: "POST",
            url: "../fachadas/activos/siga_baja_activo/Siga_baja_activoFacade.Class.php",
            async: false,
            data: {
                Id_Activo: id,
                accion: "consultar"
            },
            dataType: "html",
            beforeSend: function (xhr) {

            },
			
            success: function (data) {
                data = eval("(" + data + ")");
                if (data.totalCount > 0) {
					
					$("#bajaEquipo").modal("show");
					
					var $select3 = $('#AF_BC_baja').selectize({});	
					var control3 = $select3[0].selectize;
					control3.addItem(data.data[0].Id_Activo);
                    
					$("#Id_baja_activo").val(data.data[0].Id_baja);
					$("#Motivo_Baja").val(data.data[0].Motivo_Baja);
					$("#Comentarios_baja").val(data.data[0].Comentarios);
					$("#Destinofinal_baja").val(data.data[0].Destino);
					$("#Fecha_baja").val(data.data[0].Fecha_Baja);
					
					var $Usuario_Baja = $('#Usuario_soli_baja').selectize({});	
					var Usr_Baja = $Usuario_Baja[0].selectize;
					Usr_Baja.addItem(data.data[0].Usuario);
					
					
                }
            },
            error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
            }
        });
	
	}
	
	pasarvalores_reubicacion=function(id){
		limpiarcamposreubicacion();
		$.ajax({
            type: "POST",
            url: "../fachadas/activos/siga_reubicacion_activo/Siga_reubicacion_activoFacade.Class.php",
            async: false,
            data: {
                Id_Activo: id,
				Estatus_Reg: "1",
                accion: "consultar"
            },
            dataType: "html",
            beforeSend: function (xhr) {

            },
			
            success: function (data) {
                data = eval("(" + data + ")");
                if (data.totalCount > 0) {
					
					$("#reubicacionEquipo").modal("show");
					
					var $select3 = $('#AF_BC_reubicacion').selectize({});	
					var control3 = $select3[0].selectize;
					control3.addItem(data.data[0].Id_Activo);
					
					var $select_numempleadoreubicacion = $('#numempleadoreubicacion').selectize({});	
					var control_numempleadoreubicacion = $select_numempleadoreubicacion[0].selectize;
					control_numempleadoreubicacion.addItem(data.data[0].Id_Usuario_Responsable);
                    
					
					
					$("#Id_reubicacion_activo").val(data.data[0].Id_Activo_Reubicacion);
					$("#cmb_area_guardar").val(data.data[0].Id_Area);
					$("#cmb_ubic_prim_reub_guar").val(data.data[0].Id_Ubic_Prim);
					if(data.data[0].Id_Ubic_Prim!=""){
						ubic_sec_reubicacion(data.data[0].Id_Ubic_Prim);
					}
					$("#cmb_ubic_sec_reub_guar").val(data.data[0].Id_Ubic_Sec);
					$("#usuario_resp_guardar").val(data.data[0].Nom_Usuario_Reponsable);
					$("#centro_costos_guardar").val(data.data[0].Centro_Costos);
					$("#jefearea_reubicacion").val(data.data[0].Jefe_Area);
					
					$("#Motivo_Reubicacion").val(data.data[0].Motivo_Reubicacion);
					$("#comentarios_reubicacion").val(data.data[0].Comentarios_Reubicacion);
					
                }
            },
            error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
            }
        });
	}
	
	//Funcion Para Eliminar Logicamente
	pasarelimina= function(id) {
      bootbox.dialog({
			message: "Advertencia!! <br><br> Esta Seguro de Eliminar el Registro??",
			
			buttons: {
				danger: {
					label: "Aceptar",
					className: "btn-primary",
					callback: function() {
						
						$.ajax({
							type: "POST",
							url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",        
							async: false,
							data: {
								Id_Activo: id,
								Estatus_Reg: '3',
								Usr_Mod: 'Pruelimina',
								accion: "guardar"
							},
							dataType: "html",
							beforeSend: function (xhr) {

							},
							success: function (datos) {
								var json;
								json = eval("(" + datos + ")"); //Parsear JSON
								mensajesalerta("&Eacute;xito", "Eliminado Correctamente.", "success", "dark");	
								$('#tablaactivos').DataTable().ajax.reload();
							},
							error: function (objeto, quepaso, otroobj) {
								mensajesalerta("Oh No!", "Ocurrio un error al eliminar.", "error", "dark");
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
	$(".selectize-control").css("height", "34px");

	confirmacion_cerrar=function(id_button){
		$.confirm({
			title: 'Confirm!',
			content: 'Deseas salir sin guardar la información!',
			buttons: {
				confirm: function () {
					$('.modal-backdrop').remove();//eliminamos el backdrop del modal
					$('#'+id_button+'').modal('hide');
				},
				cancel: function () {
				}
			}
		});
	}	

});

function activaBoton(tab)
{
 if (tab==1)
 {
  $("#guardar").show();
  $("#guardar2").hide();
  $("#guardar3").hide();
 }
 if (tab==2)
 {
  $("#guardar").hide();
  $("#guardar2").show();
  $("#guardar3").hide();
 }
  if (tab==3)
 {
  $("#guardar").hide();
  $("#guardar2").hide();
  $("#guardar3").show();
 }
}

$("#popupContable").click(function(e){
   
	$.ajax({
		url : 'includedepcontablelinearecta.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Formula:1},
			success : function(response) 
			    {
				  //$("#periodo-contable").modal('hide');	
				  $("#divLineaRecta").html(response);
                  $("#periodo-contable").modal('show');				  
				},
				error: function(jqXHR, exception) 
				{
					muestraErrorAjax(jqXHR, exception);
				}
			});	

   
});

$("#popupReporteContable").click(function(e){

	$.ajax({
		url : 'includereportecontablelinearecta.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Formula:1},
			success : function(response) 
			    {	
				  $("#divReporteLineaRecta").html(response);
                  $("#acumulada-contable").modal('show');				  
				},
				error: function(jqXHR, exception) 
				{
					muestraErrorAjax(jqXHR, exception);
				}
			});	

   
});

$("#popupContableMixta").click(function(e){
   
	$.ajax({
		url : 'includedepcontablelinearecta.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Formula:2},
			success : function(response) 
			    {
				  //$("#periodo-contable").modal('hide');	
				  $("#divLineaRecta").html(response);
                  $("#periodo-contable").modal('show');				  
				},
				error: function(jqXHR, exception) 
				{
					muestraErrorAjax(jqXHR, exception);
				}
			});	

   
});

$("#popupReporteContableMixta").click(function(e){

	$.ajax({
		url : 'includereportecontablelinearecta.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Formula:2},
			success : function(response) 
			    {	
				  $("#divReporteLineaRecta").html(response);
                  $("#acumulada-contable").modal();				  
				},
				error: function(jqXHR, exception) 
				{
					muestraErrorAjax(jqXHR, exception);
				}
			});	

   
});

$("#popupFiscal").click(function(e){
   
	$.ajax({
		url : 'includedepfiscal.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val()},
			success : function(response) 
			    {
				  //$("#periodo-contable").modal('hide');	
				  $("#divFiscal").html(response);
                  $("#periodo-fiscal").modal('show');				  
				},
				error: function(jqXHR, exception) 
				{
					muestraErrorAjax(jqXHR, exception);
				}
			});	

   
});

$("#popupReporteFiscal").click(function(e){

	$.ajax({
		url : 'includereportefiscal.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val()},
			success : function(response) 
			    {	
				  $("#divReporteFiscal").html(response);
                  $("#acumulada-fiscal").modal();				  
				},
				error: function(jqXHR, exception) 
				{
					muestraErrorAjax(jqXHR, exception);
				}
			});	

   
});

$("#popupFiscalD4").click(function(e){
   
	$.ajax({
		url : 'includedepfiscalD4.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val()},
			success : function(response) 
			    {
				  //$("#periodo-contable").modal('hide');	
				  $("#divFiscalD4").html(response);
                  $("#periodo-fiscalD4").modal('show');				  
				},
				error: function(jqXHR, exception) 
				{
					muestraErrorAjax(jqXHR, exception);
				}
			});	

   
});

$("#popupReporteFiscalD4").click(function(e){

	$.ajax({
		url : 'includereportefiscalD4.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val()},
			success : function(response) 
			    {	
				  $("#divReporteFiscalD4").html(response);
                  $("#acumulada-fiscalD4").modal();				  
				},
				error: function(jqXHR, exception) 
				{
					muestraErrorAjax(jqXHR, exception);
				}
			});	

   
});

$("#popupFiscalB10").click(function(e){
   
	$.ajax({
		url : 'includedepfiscalD4.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Tipo:'B10'},
			success : function(response) 
			    {
				  //$("#periodo-contable").modal('hide');	
				  $("#divFiscalD4").html(response);
                  $("#periodo-fiscalD4").modal('show');				  
				},
				error: function(jqXHR, exception) 
				{
					muestraErrorAjax(jqXHR, exception);
				}
			});	

   
});

$("#popupReporteFiscalB10").click(function(e){

	$.ajax({
		url : 'includereportefiscalD4.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: $("#AF_BC").val(),Anio:$("#AnioDepreciacion").val(),Tipo:'B10'},
			success : function(response) 
			    {	
				  $("#divReporteFiscalD4").html(response);
                  $("#acumulada-fiscalD4").modal();				  
				},
				error: function(jqXHR, exception) 
				{
					muestraErrorAjax(jqXHR, exception);
				}
			});	

   
});

function muestraErrorAjax(jqXHR,exception)
			{
			
			   if (jqXHR.status === 0) {
						alert('Not connect.\n Verify Network.');
					} else if (jqXHR.status == 404) {
						alert('Requested page not found. [404]');
					} else if (jqXHR.status == 500) {
						alert('Internal Server Error [500].');
					} else if (exception === 'parsererror') {
						alert('Requested JSON parse failed.');
					} else if (exception === 'timeout') {
						alert('Time out error.');
					} else if (exception === 'abort') {
						alert('Ajax request aborted.');
					} else {
						alert('Uncaught Error.\n' + jqXHR.responseText);
					}
			}
  
</script>