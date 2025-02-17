<!-- Main row -->
<div class="row">
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- nuevo -->
    <div role="tabpanel" class="tab-pane active" id="nuevo">
    
      <div class="row">
        <div class="col-md-12">
         
          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>


        </div>
      </div>
      <!-- /.row -->
      
      <div class="col-md-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
            <table class="table table-bordered table-striped" id="displayINPC" width="100%">
              <thead >
                <tr>
                  <th>Categoria</th>
                  <th>Subcategoria</th>
                </tr>
              </thead>
              <tbody>
				<tr>
					<td><a href="#" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_ubic_prim','Id_Ubic_Prim', 'Desc_Ubic_Prim', 'Ubicación Primaria')"><strong>Ubicación Primaria</strong></a></td>
					<td><a href="#" data-toggle="modal" data-target="#myModal_arbol" onclick="Mostrar_Modal_Arbol('siga_cat_ubic_sec','Id_Ubic_Sec', 'Desc_Ubic_Sec', 'Ubicación Secundaria'); Carga_Area_Arbol('siga_cat_ubic_prim','Id_Ubic_Prim', 'Desc_Ubic_Prim','Ubicación Secundaria')"><strong>Ubicación Secundaria</strong></a></td>
				</tr>
				<tr>
					<td><a href="#" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_motivo_salida','Id_Motivo_Salida', 'Desc_Motivo_Alta', 'Motivo Salida')"><strong>Motivo de Salida</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_familia','Id_Familia', 'Desc_Familia', 'Familia')"><a href="#"><strong>Familia</strong></a></td>
					<td align="left" data-toggle="modal" data-target="#myModal_arbol" onclick="Mostrar_Modal_Arbol('siga_cat_subfamilia','Id_Subfamilia', 'Desc_Subfamilia', 'Subfamilia'); Carga_Area_Arbol('siga_cat_familia','Id_Familia', 'Desc_Familia', 'Familia')"><a href="#"><strong>Subfamilia</strong></a></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_clase','Id_Clase', 'Desc_Clase', 'Clase')"><a href="#"><strong>Clase</strong></a></td>
					<td align="left" data-toggle="modal" data-target="#myModal_arbol" onclick="Mostrar_Modal_Arbol('siga_cat_clasificacion','Id_Clasificacion', 'Desc_Clasificacion', 'Clasificación'); Carga_Area_Arbol('siga_cat_clase','Id_Clase', 'Desc_Clase', 'Clase')"><a href="#"><strong>Clasificación</strong></a></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_propiedad','Id_Propiedad', 'Desc_Propiedad', 'Propiedad')"><a href="#"><strong>Propiedad</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_motivo_cance','Id_Mot_Cancelacion', 'Desc_Motivo_Cancel', 'Motivo Cancelacion')"><a href="#"><strong>Motivo Cancelacion</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_departamento','Id_Departamento', 'Des_Departamento', 'Departamento')"><a href="#"><strong>Departamento</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_usuario_resp','Id_Usuario_Resp', 'Desc_Usuario_Resp', 'Usuario Responsable')"><a href="#"><strong>Usuario Responsable</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_motivo_alta','Id_Motivo_Alta', 'Desc_Motivo_Alta', 'Motivo Alta')"><a href="#"><strong>Motivo Alta</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_tipo_vale_resg','Id_Tipo_Vale_Resg', 'Desc_Tipo_Vale_Resg', 'Tipo Vale Resguardo')"><a href="#"><strong>Tipo Vale Resguardo</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_formulas_dep','Id_Formulas_Dep', 'Desc_Formulas_Dep', 'Formulas Depreciacion')"><a href="#"><strong>Formulas Depreciacion</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_depreciacion','Id_Depreciacion', 'Desc_Depreciacion', 'Tipo Depreciacion')"><a href="#"><strong>Tipo Depreciacion</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_tipo_actividad','Id_Tipo_Actividad', 'Desc_Tipo_Actividad', 'Tipo Actividad')"><a href="#"><strong>Tipo Actividad</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_estatus','Id_Estatus', 'Desc_Estatus', 'Estatus Equipo')"><a href="#"><strong>Estatus  Equipo</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_doc_recibida','Id_Doc_Recibida', 'Desc_Doc_Recibida', 'Documentación Recibida')"><a href="#"><strong>Documentación Recibida</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_meses','Id_Meses', 'Desc_Meses', 'Meses')"><a href="#"><strong>Meses</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_anios','Id_Anios', 'Desc_Anios', 'Años')"><a href="#"><strong>Años</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_puesto','Id_Puesto', 'Desc_Puesto', 'Puesto')"><a href="#"><strong>Puesto</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_centro_de_costos','Id_Centros_de_costos', 'Desc_Centro_de_costos', 'Centro de Costos')"><a href="#"><strong>Centro de Costos</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cast_motivo_reubicacion','Id_Motivo_reubicacion', 'Desc_Motivo_reubicacion', 'Motivo Reubicación')"><a href="#"><strong>Motivo Reubicación</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cast_motivo_baja','Id_Motivo_baja', 'Desc_Motivo_baja', 'Motivo Baja')"><a href="#"><strong>Motivo Baja</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cast_destino_final','Id_Destino_final', 'Desc_Destino_final', 'Destino Final')"><a href="#"><strong>Destino Final</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_motivo_servicio','Id_Motivo_Servicio', 'Desc_Motivo_Servicio', 'Motivo del Servicio')"><a href="#"><strong>Motivo del Servicio</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_area_de_poliza','Id_Area_de_poliza', 'Desc_Area_de_poliza', 'Área de Poliza')"><a href="#"><strong>Área de Poliza</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_motivo_reporte','Id_Motivo', 'Desc_Motivo', 'Motivo Reporte')"><a href="#"><strong>Motivo Reporte</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_frecuencia','Id_Frecuencia', 'Desc_Frecuencia', 'Frecuencia')"><a href="#"><strong>Frecuencia</strong></a></td>
					<td align="left"></td>
				</tr>
				
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_motivo_aparente','Id_Motivo_Aparente', 'Desc_Motivo_Aparente', 'Motivo Aparente')"><a href="#"><strong>Motivo Aparente</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_motivo_real','Id_Motivo_Real', 'Desc_Motivo_Real', 'Motivo Real')"><a href="#"><strong>Motivo Real</strong></a></td>
					<td align="left"></td>
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_condicion_de_recepcion','siga_condicion_de_recepcion_id', 'siga_condicion_de_recepcion_descripcion', 'Condición del Equipo')"><a href="#"><strong>Condición del Equipo</strong></a></td>
					<td align="left"></td>
				</tr>
				<!--
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_estatus_equipo','Id_Est_Equipo', 'Desc_Est_Equipo', 'Estatus Equipo')"><a href="#"><strong>Estatus Equipo</strong></a></td>
					<td align="left"></td>
				</tr>
				-->
				
				
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_ticket_categoria','Id_Categoria', 'Desc_Categoria', 'Ticket Categoria')"><a href="#"><strong>Ticket Categoria</strong></a></td>
					<td><a href="#" data-toggle="modal" data-target="#myModal_arbol" onclick="Mostrar_Modal_Arbol('siga_cat_ticket_subcategoria','Id_Subcategoria', 'Desc_Subcategoria', 'Ticket Subcategoria'); Carga_Area_Arbol('siga_cat_ticket_categoria','Id_Categoria', 'Desc_Categoria','Ticket Categoria')"><strong>Ticket Subcategoria</strong></a></td>				
				</tr>
				<tr>
					<td align="left" data-toggle="modal" data-target="#myModal" onclick="Mostrar_Modal('siga_cat_ticket_seccion','Id_Seccion', 'Desc_Seccion', 'Ticket Sección')"><a href="#"><strong>Ticket Sección</strong></a></td>
					<td><a href="#" data-toggle="modal" data-target="#myModal_arbol" onclick="Mostrar_Modal_Arbol('siga_cat_ticket_subseccion','Id_Subseccion', 'Desc_Subseccion', 'Ticket Subsección'); Carga_Area_Arbol('siga_cat_ticket_seccion','Id_Seccion', 'Desc_Seccion','Ticket Subsección')"><strong>Ticket Subsección</strong></a></td>
				</tr>
			  </tbody>
            </table>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div><!-- tab-panel -->
  </div>
</div>
      <!-- /.row -->

    
<div class="modal fade modalchs" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header azul">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="Titulo"></h4>
      </div>
      <div class="modal-body">
		<input type="hidden" id="Txt_Fachada">
		<input type="hidden" id="Txt_Id_Catalogo">
		<input type="hidden" id="Txt_Desc_Catalogo">
		<input type="hidden" id="Id_Catalogo">
		<input type="hidden" id="Estatus_Editar">
        <form class="form-horizontal">
          <div class="form-group" id="div_areas">
			<label class="col-sm-3 control-label" >Áreas</label>
            <div class="col-sm-8">
				<select class="form-control" id="cmbareas">
				</select>
			</div>	
          </div>
		  
		  <div class="form-group" style="display:none" id="div_seccion">
			<label class="col-sm-3 control-label" >Sección</label>
            <div class="col-sm-8">
				<select class="form-control" id="cmb_seccion">
				</select>
			</div>	
          </div>
		  
		  <div class="form-group">
            <label class="col-sm-3 control-label" id="Desc_Catalogo"></label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Txt_Descripcion">
            </div>
		  </div>
		  <div align="center">
			<button type="button" class="btn chs" id="guardar">Guardar</button>
			<button type="button" class="btn chs" onclick="limpiarcamposcat()">Limpiar</button>
		  </div>
		  <br>
		  <br>
		  <div class="table-responsive" id="div_tabla_categorias" align="center">
          </div>
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade modalchs" id="myModal_arbol">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header azul">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="Titulo2"></h4>
      </div>
      <div class="modal-body">
		<input type="hidden" id="Txt_Id_Activo_Padre">
		<input type="hidden" id="Txt_Arbol_Fachada">
		<input type="hidden" id="Txt_Arbol_Fachada_Subclase">
		<input type="hidden" id="Txt_Arbol_Id_Catalogo">
		<input type="hidden" id="Txt_Arbol_Desc_Catalogo">
		<input type="hidden" id="Txt_Arbol_Desc_Subclase">
		<input type="hidden" id="Id_Catalogo2">
		
        <form class="form-horizontal">
          <div class="form-group">
			<label class="col-sm-3 control-label" >Áreas</label>
            <div class="col-sm-8">
				<select class="form-control" id="cmbareasarbol">
				</select>
			</div>
          </div>
		  <div class="form-group" style="display:none" id="div_seccion2">
			<label class="col-sm-3 control-label" >Sección</label>
            <div class="col-sm-8">
				<select class="form-control" id="cmb_seccion2">
					<option value="-1">--Selecciona una Sección--</option>
				</select>
			</div>	
          </div>
		  
		  <div class="form-group">
			<label class="col-sm-3 control-label" id="lbl_arbol"></label>
            <div class="col-sm-8">
				<select class="form-control" id="cmb_arbol">
					<option value="-1">--Selecciona una Opción--</option>
				</select>
			</div>	
          </div>
		  <div class="form-group">
            <label class="col-sm-3 control-label" id="Desc_Catalogo2"></label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Txt_Descripcion2">
            </div>
		  </div>
		  <div align="center">
			<button type="button" class="btn chs" id="guardar_arbol">Guardar</button>
			<button type="button" class="btn chs" onclick="limpiarcamposarbol()">Limpiar</button>
		  </div>
		  <br>
		  <br>
		  <div class="table-responsive" id="div_tabla_arbol" align="center">
          </div>
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script src="../js/Funciones.js"></script>
<script>
  
  $(document).ready(function(){
	cargaareas();
	function cargaareas() {
		var resultado=new Array();
		data={Estatus_Reg: "1",accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_catareas/Siga_catareasFacade.Class.php",false, data);

		if(resultado.totalCount>0){
			$('#cmbareas').append($('<option>', { value: "-1" }).text("--Áreas--"));
			for(var i = 0; i < resultado.totalCount; i++){
				//if(resultado.data[i].Id_Area!="5"){
					$('#cmbareas').append($('<option>', { value: resultado.data[i].Id_Area }).text(resultado.data[i].Nom_Area));
				//}
			}
		}else{
			$('#cmbareas').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$("#cmbareas").change(function() {
		if($(this).val()=="-1"){
			$("#div_tabla_categorias").html("");
		}else{
			if($.trim($("#Titulo").text())=="Alta Ticket Categoria"){
				$('#cmb_seccion').children('option').remove();
				carga_secciones($(this).val());
			}else{			
				var Estatus_Editar=$.trim($("#Estatus_Editar").val());
				if(Estatus_Editar!="1"){
					Carga_Tabla($(this).val());
				}
			}
		}
	});
	
	
	function carga_secciones(Id_Area){
		var resultado=new Array();
		data={Estatus_Reg: "1",Id_Area:Id_Area,accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ticket_seccion/Siga_cat_ticket_seccionFacade.Class.php",false, data);

		if(resultado.totalCount>0){
			$('#cmb_seccion').append($('<option>', { value: "-1" }).text("--Secciones--"));
			for(var i = 0; i < resultado.totalCount; i++){
				//if(resultado.data[i].Id_Area!="5"){
					$('#cmb_seccion').append($('<option>', { value: resultado.data[i].Id_Seccion }).text(resultado.data[i].Desc_Seccion));
				//}
			}
		}else{
			$('#cmb_seccion').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$("#cmb_seccion").change(function() {
		if($(this).val()=="-1"){
			$("#div_tabla_categorias").html("");
		}else{
			Carga_Tabla($(this).val());
		}
	});
	
	
	Carga_Tabla=function(Id_Cmb){
		var Id_Activo_Padre=$("#Txt_Id_Activo_Padre").val();
		var Fachada=$("#Txt_Fachada").val();
		var Id_Catalogo=$("#Txt_Id_Catalogo").val();
		var Desc_Catalogo=$("#Txt_Desc_Catalogo").val();
		
		var Facade_Mayus=Fachada.charAt(0).toUpperCase() + Fachada.slice(1);
		
		var str_Datos="";
		
		
		if($.trim($("#Titulo").text())=="Alta Ticket Categoria"){
			str_Datos={
				Id_Seccion:Id_Cmb,
				Estatus_Reg:"1",
				accion: "consultar"
			}
		}else{
			str_Datos={
				Id_Area:Id_Cmb,
				Estatus_Reg:"1",
				accion: "consultar"
			}
				
		}
		$.ajax({
            type: "POST",
            url: "../fachadas/activos/"+Fachada+"/"+Facade_Mayus+"Facade.Class.php",
            async: true,
            data: str_Datos,
            dataType: "html",
            beforeSend: function (xhr) {

            },
            success: function (data) {
                json = eval("(" + data + ")");
                if (json.totalCount > 0) {
					mensajesalerta("&Eacute;xito", "Registros Encontrados", "success", "dark");
					var tabla="";
					
					tabla+='<table class="table table-bordered table-striped table-chs" id="display_categoria" width="100%">';
					tabla+='	<thead >';
					tabla+='		<tr>';
					tabla+='		<th width="90%">Descripci&oacute;n</th>';
					tabla+='		<th width="10%">Edici&oacute;n</th>';
					tabla+='		</tr>';
					tabla+='	</thead>';
					tabla+='	<tbody>';
					for(var i=0;i < json.totalCount; i++){
						tabla+='		<tr>';
						tabla+='			<td width="90%">'+json.data[i][Desc_Catalogo]+'</td>';
						tabla+='			<td width="10%"><span><i class="fa fa-pencil" aria-hidden="true" onclick="pasarvalorescat(\''+Fachada+'\',\''+Id_Catalogo+'\', \''+Desc_Catalogo+'\', \''+json.data[i][Id_Catalogo]+'\')"></i></span></td>';
						tabla+='		</tr>';
					}
					tabla+='	</tbody>';
					tabla+='</table>';
					
					$("#div_tabla_categorias").html(tabla);
		
					$('#display_categoria').DataTable({
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
					$("#div_tabla_categorias").html("");
					mensajesalerta("Informaci&oacute;n", "No se encontraron registros.", "info", "dark");
				}
            },
            error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
            }
        });
	}
	
	
	//Llenar Tabla Dinamicamente
	$('#displayINPC').DataTable({
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
	
	//Guardar Registros
	$("#guardar").click(function () {
		var Txt_Fachada=$.trim($("#Txt_Fachada").val());
		var Facade_Mayus=Txt_Fachada.charAt(0).toUpperCase() + Txt_Fachada.slice(1);
		var Txt_Bd_Id_Catalogo=$.trim($("#Txt_Id_Catalogo").val());
		var Txt_Bd_Desc_Catalogo=$.trim($("#Txt_Desc_Catalogo").val());
		
		
		var Agregar = true;
		var mensaje_error = "";
		var Id_Catalogo=$("#Id_Catalogo").val();
		var Id_Area=$("#cmbareas").val();
		var Seccion=$("#cmb_seccion").val();
		
		var Txt_Descripcion=$.trim($("#Txt_Descripcion").val());
		var strDatos=""; 
		
		if (Id_Area=="-1") {
			Agregar = false; 
			mensaje_error += " -Selecciona un Área<br />";
		}
		
		if($.trim($("#Titulo").text())=="Alta Ticket Categoria"){
		
			if (Seccion=="-1"||Seccion==null) {
				Agregar = false; 
				mensaje_error += " -Selecciona una Seccion<br />";
			}	
		}
		
		if (Txt_Descripcion.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Descripci&oacute;n<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		if(Agregar){
			var Id_Usuario_Sesion=$("#usuariosesion").val();
			
			if($.trim($("#Titulo").text())=="Alta Ticket Categoria"){
				if(Id_Catalogo.length <= 0){
					strDatos = "Desc_Categoria="+Txt_Descripcion;
					strDatos += "&Id_Seccion="+Seccion;				
					strDatos += "&accion=guardar";
				}else{
					strDatos += ""+Txt_Bd_Id_Catalogo+"="+Id_Catalogo;
					strDatos += "&Desc_Categoria="+Txt_Descripcion;
					strDatos += "&Id_Seccion="+Seccion;				
					strDatos += "&accion=guardar";
					
				}
			}else{
				strDatos = ""+Txt_Bd_Desc_Catalogo+"="+Txt_Descripcion; 
				strDatos += "&Id_Area="+Id_Area;
				if(Id_Catalogo.length <= 0){
					strDatos += "&Usr_Inser="+Id_Usuario_Sesion+"";
					strDatos += "&Estatus_Reg=1";				
					strDatos += "&accion=guardar";
				}else{
					strDatos += "&"+Txt_Bd_Id_Catalogo+"="+Id_Catalogo;
					strDatos += "&Usr_Mod="+Id_Usuario_Sesion+"";
					strDatos += "&Estatus_Reg=2";				
					strDatos += "&accion=guardar";
				}
			}
			
		
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/"+Txt_Fachada+"/"+Facade_Mayus+"Facade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					mensajesalerta("&Eacute;xito", "Guardado Correctamente.", "success", "dark");
					$("#cmbareas").prop( "disabled", false);
					$("#Id_Catalogo").val("");
					$("#Txt_Descripcion").val("");
					$("#Estatus_Editar").val("");
					if($.trim($("#Titulo").text())=="Alta Ticket Categoria"){
						Carga_Tabla(Seccion);	
					}else{
						Carga_Tabla(Id_Area);
					}
					$("#guardar").html("Guardar");
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
	
	Mostrar_Modal=function(Fachada, Id_Catalogo, Desc_Catalogo, Titulo_Modal=null){
		limpiarcamposcat();
		//Limpiar Tabla
		$("#div_tabla_categorias").html("");
		
		$("#guardar").html("Guardar");
		$("#Txt_Fachada").val(Fachada);
		$("#Txt_Id_Catalogo").val(Id_Catalogo);
		$("#Txt_Desc_Catalogo").val(Desc_Catalogo);
		
		
		$("#Desc_Catalogo").html(Titulo_Modal);
		if(Titulo_Modal!=null){
			$("#Titulo").html('<i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> Alta '+Titulo_Modal);
		}
		
		
		//////////////////////////////////
		if(Fachada=="siga_cat_ticket_categoria"){
			$("#div_seccion").show();
		}else{
			if(Fachada=="siga_cat_estatus"){
				$("#cmbareas").val(5);
				$("#div_areas").hide();
				Carga_Tabla(5);
			}
		}
		
		
	}
	
	limpiarcamposcat=function(){
		//Limpiar Tabla
		$("#div_tabla_categorias").html("");
		$("#cmb_seccion").val("-1");
		$("#div_areas").show();
		
		$("#cmbareas").prop( "disabled", false);
		$("#cmbareas").val(-1);
		$("#guardar").html("Guardar");
		$("#Id_Catalogo").val("");
		$("#Txt_Descripcion").val("");
		$("#Estatus_Editar").val("");
		
		///////////////////////////////
		$('#cmb_seccion').children('option').remove();
		if($.trim($("#Titulo").text())=="Alta Ticket Categoria"){	
			$("#div_seccion").show();
		}else{
			$("#div_seccion").hide();
		}
	}
	
	//Pasar Valores al Editar
	pasarvalorescat=function(Fachada, Id_Catalogo, Desc_Catalogo, Id) {
		$("#guardar").html("Editar");
        if (Id != "") {
            var Facade_Mayus=Fachada.charAt(0).toUpperCase() + Fachada.slice(1);
			$.ajax({
                type: "POST",
                url: "../fachadas/activos/"+Fachada+"/"+Facade_Mayus+"Facade.Class.php",
                async: false,
                data: {
                    [Id_Catalogo]: Id,
                    accion: "consultar"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
                        // Enable
						//$("#cmbareas").prop( "disabled", true );
						$("#Id_Catalogo").val(data.data[0][Id_Catalogo]);
						$("#Txt_Descripcion").val(data.data[0][Desc_Catalogo]);
						if($.trim($("#Titulo").text())=="Alta Ticket Categoria"){	
							$("#cmb_seccion").val(data.data[0].Id_Seccion);
						}else{
							$("#cmbareas").val(data.data[0].Id_Area);
						}
						//Pasar Estatus
						$("#Estatus_Editar").val("1");
						
						$("#guardar").html("Editar");
                    }
                },
                error: function () {
                    mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
        }
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
							url: "../fachadas/activos/inpc/InpcFacade.Class.php",        
							async: false,
							data: {
								Id_INPC: id,
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
								$('#displayINPC').DataTable().ajax.reload();
							},
							error: function () {
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
	/////////////////////////////////////////////////////////////////////////////////////////////////
	Mostrar_Modal_Arbol=function(Fachada, Id_Catalogo, Desc_Catalogo, Titulo_Modal=null){	
		limpiarcamposarbol();
		//Limpiar Tabla
		$("#div_tabla_arbol").html("");
		
		$("#guardar_arbol").html("Guardar");
		
		$("#Txt_Arbol_Fachada").val(Fachada);
		$("#Txt_Arbol_Id_Catalogo").val(Id_Catalogo);
		$("#Txt_Arbol_Desc_Catalogo").val(Desc_Catalogo);
		
		$("#Desc_Catalogo2").html(Desc_Catalogo);
		if(Titulo_Modal!=null){
			$("#Titulo2").html('<i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> Alta '+Titulo_Modal);
		}
		
		if(Fachada=="siga_cat_ticket_subcategoria"){
			$("#div_seccion2").show();
		}else{
			$("#div_seccion2").hide();
		}
		
		
	}
	
	
	Carga_Area_Arbol=function(Fachada_Subclase,Id_Catalogo, Desc_Subclase,Titulo_lbl=null) {
		$("#lbl_arbol").html(Titulo_lbl);
		$("#Txt_Id_Activo_Padre").val(Id_Catalogo);
		$("#Txt_Arbol_Fachada_Subclase").val(Fachada_Subclase);
		$("#Txt_Arbol_Desc_Subclase").val(Desc_Subclase);
		var resultado=new Array();
		data={Estatus_Reg: "1",accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_catareas/Siga_catareasFacade.Class.php",false, data);
		$('#cmbareasarbol').children('option').remove();
		$('#cmb_arbol').children('option').remove();
		$('#cmb_arbol').append($('<option>', { value: "-1" }).text("--Selecciona una Opción--"));
		if(resultado.totalCount>0){
			$('#cmbareasarbol').append($('<option>', { value: "-1" }).text("--Áreas--"));
			for(var i = 0; i < resultado.totalCount; i++){
				//if(resultado.data[i].Id_Area!="5"){
					$('#cmbareasarbol').append($('<option>', { value: resultado.data[i].Id_Area }).text(resultado.data[i].Nom_Area));
				//}
			}
		}else{
			$('#cmbareasarbol').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$("#cmbareasarbol").change(function() {
		$("#div_tabla_arbol").html("");
		if($(this).val()=="-1"){
			
		}else{
			if($.trim($("#Titulo2").text())=="Alta Ticket Subcategoria"){
				$('#cmb_seccion2').children('option').remove();	
				carga_secciones2($(this).val());
				
			}else{
				Carga_Combo($(this).val());
			}
		}
		
		if($.trim($("#Titulo2").text())=="Alta Ticket Subcategoria"){
				$('#cmb_arbol').children('option').remove();
				$('#cmb_arbol').append($('<option>', { value: "-1" }).text("--Selecciona una Categoria--"));
		}		
	});
	
	function carga_secciones2(Id_Area){
		var resultado=new Array();
		data={Estatus_Reg: "1",Id_Area:Id_Area,accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ticket_seccion/Siga_cat_ticket_seccionFacade.Class.php",false, data);

		if(resultado.totalCount>0){
			$('#cmb_seccion2').append($('<option>', { value: "-1" }).text("--Secciones--"));
			for(var i = 0; i < resultado.totalCount; i++){
				//if(resultado.data[i].Id_Area!="5"){
					$('#cmb_seccion2').append($('<option>', { value: resultado.data[i].Id_Seccion }).text(resultado.data[i].Desc_Seccion));
				//}
			}
		}else{
			$('#cmb_seccion2').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$("#cmb_seccion2").change(function() {
		$("#div_tabla_arbol").html("");
		if($(this).val()=="-1"){
			
		}else{
			Carga_Combo($(this).val());
		}
	});
	
	Carga_Combo=function(Id_Area){
		var Desc_Catalogo=$("#Txt_Arbol_Desc_Subclase").val();
		var Fachada=$("#Txt_Arbol_Fachada_Subclase").val();
		var Id_Catalogo=$("#Txt_Id_Activo_Padre").val();
		var Titulo_lbl=$("#lbl_arbol").text();
		var Facade_Mayus=Fachada.charAt(0).toUpperCase() + Fachada.slice(1);
		
		
		$('#cmb_arbol').children('option').remove();
		var resultado=new Array();
		if($.trim($("#Titulo2").text())=="Alta Ticket Subcategoria"){
			data={Estatus_Reg: "1", Id_Seccion:Id_Area,accion: "consultar"};
		}else{	
			data={Estatus_Reg: "1", Id_Area:Id_Area,accion: "consultar"};
		}
		resultado=cargo_cmb("../fachadas/activos/"+Fachada+"/"+Facade_Mayus+"Facade.Class.php",false, data);
		if(resultado.totalCount>0){
				
			$('#cmb_arbol').append($('<option>', { value: "-1" }).text("--"+Titulo_lbl+"--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmb_arbol').append($('<option>', { value: resultado.data[i][Id_Catalogo] }).text(resultado.data[i][Desc_Catalogo]));
			}
		}else{
			$("#div_tabla_arbol").html("");
			$('#cmb_arbol').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
				
	}
	$( "#cmb_arbol" ).change(function() {
		if($(this).val()=="-1"){
			$("#div_tabla_arbol").html("");
		}else{
			Carga_Tabla_Arbol($(this).val());
		}
	});
	Carga_Tabla_Arbol=function(Id_Cmb){
		var Id_Activo_Padre=$("#Txt_Id_Activo_Padre").val();
		var Fachada_Arbol=$("#Txt_Arbol_Fachada").val();
		var Id_Catalogo_Arbol=$("#Txt_Arbol_Id_Catalogo").val();
		var Desc_Catalogo_Arbol=$("#Txt_Arbol_Desc_Catalogo").val();
		
		var Facade_Mayus=Fachada_Arbol.charAt(0).toUpperCase() + Fachada_Arbol.slice(1);
		$.ajax({
            type: "POST",
            url: "../fachadas/activos/"+Fachada_Arbol+"/"+Facade_Mayus+"Facade.Class.php",
            async: true,
            data: {
				[Id_Activo_Padre]:Id_Cmb,
				Estatus_Reg:"1",
                accion: "consultar"
            },
            dataType: "html",
            beforeSend: function (xhr) {

            },
            success: function (data) {
                json = eval("(" + data + ")");
                if (json.totalCount > 0) {
					mensajesalerta("&Eacute;xito", "Registros Encontrados", "success", "dark");
					var tabla="";
					
					tabla+='<table class="table table-bordered table-striped table-chs" id="display_tabla_arbol" width="100%">';
					tabla+='	<thead >';
					tabla+='		<tr>';
					tabla+='		<th width="90%">Descripci&oacute;n</th>';
					tabla+='		<th width="10%">Edici&oacute;n</th>';
					tabla+='		</tr>';
					tabla+='	</thead>';
					tabla+='	<tbody>';
					for(var i=0;i < json.totalCount; i++){
						tabla+='		<tr>';
						tabla+='			<td width="90%">'+json.data[i][Desc_Catalogo_Arbol]+'</td>';
						tabla+='			<td width="10%"><span><i class="fa fa-pencil" aria-hidden="true" onclick="pasarvaloresarbol(\''+Fachada_Arbol+'\',\''+Id_Catalogo_Arbol+'\', \''+Desc_Catalogo_Arbol+'\', \''+Id_Activo_Padre+'\',\''+json.data[i][Id_Catalogo_Arbol]+'\')"></i></span></td>';
						tabla+='		</tr>';
					}
					tabla+='	</tbody>';
					tabla+='</table>';
					
					$("#div_tabla_arbol").html(tabla);
		
					$('#display_tabla_arbol').DataTable({
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
					$("#div_tabla_arbol").html("");
					mensajesalerta("Informaci&oacute;n", "No se encontraron registros.", "info", "dark");
				}
            },
            error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
            }
        });
	}
	
	//Pasar Valores al Editar
	pasarvaloresarbol=function(Fachada, Id_Catalogo, Desc_Catalogo,Id_Activo_Padre,Id) {
		//limpiarcamposcat();
		$("#guardar_arbol").html("Editar");
        if (Id != "") {
			var Facade_Mayus=Fachada.charAt(0).toUpperCase() + Fachada.slice(1);
			$.ajax({
                type: "POST",
                url: "../fachadas/activos/"+Fachada+"/"+Facade_Mayus+"Facade.Class.php",
                async: false,
                data: {
                    [Id_Catalogo]: Id,
                    accion: "consultar"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
						// Enable
						$("#cmb_arbol").prop( "disabled", true );
						$("#cmbareasarbol").prop( "disabled", true );
						$("#cmb_seccion2").prop( "disabled", true );
						
                        $("#Id_Catalogo2").val(data.data[0][Id_Catalogo]);
						$("#Txt_Descripcion2").val(data.data[0][Desc_Catalogo]);
						$("#cmb_arbol").val(data.data[0][Id_Activo_Padre]);
                    }
                },
                error: function () {
                    mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
        }
    }
	
	limpiarcamposarbol=function(){
		//Limpiar Tabla
		$("#div_tabla_arbol").html("");
		
		$("#guardar_arbol").html("Guardar");
		$("#cmb_arbol").prop( "disabled", false);
		$("#cmb_arbol").val(-1);
		$("#cmbareasarbol").prop( "disabled", false);
		$("#cmbareasarbol").val(-1);
		$("#Id_Catalogo2").val("");
		$("#Txt_Descripcion2").val("");
		
		///////////////////////////////
		$('#cmb_seccion2').children('option').remove();
		$('#cmb_seccion2').append($('<option>', { value: "-1" }).text("--Selecciona una Sección--"));
		if($.trim($("#Titulo2").text())=="Alta Ticket Subcategoria"){
			$("#cmb_seccion2").prop( "disabled", false );
			$('#cmb_arbol').children('option').remove();
			$('#cmb_arbol').append($('<option>', { value: "-1" }).text("--Selecciona una Categoria--"));
			
			$("#div_seccion2").show();
		}else{
			$("#div_seccion2").hide();
		}
	}
	
	//Guardar Registros
	$("#guardar_arbol").click(function () {
		var Txt_Id_Activo_Padre=$.trim($("#Txt_Id_Activo_Padre").val());
		var Txt_Fachada=$.trim($("#Txt_Arbol_Fachada").val());
		var Facade_Mayus=Txt_Fachada.charAt(0).toUpperCase() + Txt_Fachada.slice(1);
		var Txt_Bd_Id_Catalogo=$.trim($("#Txt_Arbol_Id_Catalogo").val());
		var Txt_Bd_Desc_Catalogo=$.trim($("#Txt_Arbol_Desc_Catalogo").val());
		var Seccion=$("#cmb_seccion2").val();
		
		
		var Agregar = true;
		var mensaje_error = "";
		var Id_Catalogo=$("#Id_Catalogo2").val();
		var Cmb_Id_Padre=$("#cmb_arbol").val();
		var Txt_Descripcion=$.trim($("#Txt_Descripcion2").val());
		var strDatos=""; 
		
		if($.trim($("#Titulo2").text())=="Alta Ticket Subcategoria"){
			if (Seccion=="-1") {
				Agregar = false; 
				mensaje_error += " -Selecciona una Sección<br />";
			}
			
			if (Cmb_Id_Padre=="-1") {
				Agregar = false; 
				mensaje_error += " -Selecciona una Categoria<br />";
			}
		}else{
			if (Cmb_Id_Padre=="-1") {
				Agregar = false; 
				mensaje_error += " -Selecciona una opcion<br />";
			}	
		}
		
		
		if (Txt_Descripcion.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Descripci&oacute;n<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		if(Agregar)
		{
			var Id_Usuario_Sesion=$("#usuariosesion").val();
			strDatos = ""+Txt_Bd_Desc_Catalogo+"="+Txt_Descripcion; 
			strDatos += "&"+Txt_Id_Activo_Padre+"="+Cmb_Id_Padre;
			
			if(Id_Catalogo.length <= 0){
				strDatos += "&Usr_Inser="+Id_Usuario_Sesion+"";
				strDatos += "&Estatus_Reg=1";				
				strDatos += "&accion=guardar";
			}
			else{
				strDatos += "&"+Txt_Bd_Id_Catalogo+"="+Id_Catalogo;
				strDatos += "&Usr_Mod="+Id_Usuario_Sesion+"";
				strDatos += "&Estatus_Reg=2";				
				strDatos += "&accion=guardar";
			}
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/"+Txt_Fachada+"/"+Facade_Mayus+"Facade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					mensajesalerta("&Eacute;xito", "Guardado Correctamente.", "success", "dark");
					$("#cmb_arbol").prop( "disabled", false);
					$("#cmbareasarbol").prop( "disabled", false);
					$("#cmb_seccion2").prop( "disabled", false );
					$("#Id_Catalogo2").val("");
					$("#Txt_Descripcion2").val("");
					Carga_Tabla_Arbol(Cmb_Id_Padre);
					
					$("#guardar_arbol").html("Guardar");
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
	
	
	
    
  });//ND

</script>

