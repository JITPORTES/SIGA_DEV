<?php
session_start();
$id_usuario=$_SESSION['Id_Usuario'];

include_once(dirname(__FILE__)."/../poo/cx.php");

	$validar_gestor="
		SELECT 	Id_Cargo
		FROM 		siga_usuario_cargos
		WHERE 	Id_Usuario=$id_usuario
";

	$validar_gestor_qry=$pdoConexion->query($validar_gestor);
	$validar_gestor_res=$validar_gestor_qry->fetchall(PDO::FETCH_COLUMN);

$pdoConexionAssit=null;

?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<style>
	#highcharts_Grafica_por_Subcategoria {
	  height: 400px;
	  max-width: 800px;
	  min-width: 320px;
	  margin: 0 auto;
	}
	
	#highcharts_Grafica_por_Categoria {
	  height: 400px;
	  max-width: 800px;
	  min-width: 320px;
	  margin: 0 auto;
	}
	
	#highcharts_Grafica_por_Reparto{
	  height: 400px;
	  max-width: 1000px;
	  min-width: 320px;
	  margin: 0 auto;
	}
	
	#highcharts_Grafica_por_Reparto_Calif{
	  height: 400px;
	  max-width: 1000px;
	  min-width: 320px;
	  margin: 0 auto;
	}
	
	#highcharts_Grafica_por_Reparto_Calif_Area{
	  height: 400px;
	  max-width: 1000px;
	  min-width: 320px;
	  margin: 0 auto;
	}
	
</style>
      
      <!-- Main row -->
      <div class="row">
        <!-- Tab panes -->
            <div class="gray">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
						<span><font color="red">*</font></span>
						<label class="control-label" style="font-size: 11px;">Fecha Inicial</label>
						<input type="text" class="form-control pull-right datepicker" id="Fecha_Inicial">	
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
						<span><font color="red">*</font></span>
						<label class="control-label" style="font-size: 11px;">Fecha Final</label>
						<input type="text" class="form-control pull-right datepicker" id="Fecha_Final">	
                      </div>
                    </div>
					
					<div class="col-md-2 col-sm-12 col-xs-12 form-group">
						<span><font color="red">*</font></span>
						<label  class="control-label"  style="font-size: 11px;">Reporte</label>
						<div class="input-group">
							<select class="form-control" id="cmb_reporte">
								<option value="1">Reporte por Categoría</option>
								<option value="3">Reporte por Categoría (Top 3)</option>
								<option value="2">Reporte por Gestor (Calificación)</option>
								<option value="4">Reporte por Área (Calificación)</option>
							</select>
						</div>
					</div>
					<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="div_seccion">
						<label  class="control-label"  style="font-size: 11px;">Sección</label>
						<div class="input-group">
							<select class="form-control" id="cmb_secciones">
							</select>
							<span class="input-group-addon">
							<input type="checkbox" id="check_seccion">
							</span>
						</div>
					</div>
					
					<div class="col-md-3 col-sm-12 col-xs-12 form-group" id="div_gestores">
						<label  class="control-label"  style="font-size: 11px;">Gestores</label>
						<div class="input-group">
							<select class="form-control" id="cmb_gestores">
								<option value="-1">--Gestores--</option>
							</select>
							<span class="input-group-addon">
							<input type="checkbox" id="check_gestores">
							</span>
						</div>
					</div>
                  </div>
                 <br>
                 <div class="row">
                    <div class="col-md-12">
                      <button type="button" class="btn chs" onclick="Buscar()" id="Buscar">Filtrar</button>
                    </div>
					
				  </div>
                </div>
             
              </div>
            </div>

						<div class="col-md-6" id="div_grafica_por_categoria_Top_3" style="display:none">
              <div class="box">
                <!-- /.box-header -->
								<div align="center" id="btn_graf_top_3"></div>
                <div class="box-body">
                  <div id="highcharts_Grafica_por_Categoria_Top_3" class="highcharts pie"></div>
								</div>
              </div><!-- /.box -->
            </div>
            <div class="col-md-6" id="div_grafica_por_categoria" style="display:none">
              <div class="box">
                <!-- /.box-header -->
								<div align="center" id="div_pdf"></div>
                <div class="box-body">
                  <div id="highcharts_Grafica_por_Categoria" class="highcharts pie"></div>
										<div id="imgContainer"></div>
										<form id="cont" target="_blank" action="../controladores/activos/siga_solicitud_tickets/Grafica-Categoria.php" method="post" style="display: none">
											<textarea name="url_img_cat" id="url_img_cat"></textarea>
											<textarea name="Fech_In" id="Fech_In"></textarea>
											<textarea name="Fech_Fin" id="Fech_Fin"></textarea>
											<textarea name="Seccion" id="Seccion"></textarea>
											<textarea name="Gestor" id="Gestor"></textarea>
										</form>
                </div>
              </div><!-- /.box -->
            </div>
			
						<!--Grafica por Categoria-->
						<div class="col-md-6" id="div_grafica_por_subcategoria" style="display:none">
              <div class="box">
                <!-- /.box-header -->
                <div align="center" id="div_grafica_x_categ"></div>
								<div class="box-body">
                  <div id="highcharts_Grafica_por_Subcategoria" class="highcharts pie"></div>
								</div>
              </div><!-- /.box -->
            </div>
						<div class="col-md-12"><br></div>
			
						<div class="col-md-6" id="div_grafica_por_reparto" style="display:none">
              <div class="box">
                <!-- /.box-header -->
								<div align="center" id="div_grafica_reparto_x_gestor"></div>
								<div class="box-body">
                  <div id="highcharts_Grafica_por_Reparto" class="highcharts pie"></div>
                </div>
              </div><!-- /.box -->
            </div>
			
						<div class="col-md-6" id="div_grafica_por_reparto_calif" style="display:none">
              <div class="box">
                <!-- /.box-header -->
								<div align="center" id="div_grafica_reparto_x_gestor_calif"></div>
								<div class="box-body">
                  <div id="highcharts_Grafica_por_Reparto_Calif" class="highcharts pie"></div>
                </div>
              </div><!-- /.box -->
            </div>
						
							<div class="col-md-6" id="div_grafica_por_area_calif" style="display:none">
              <div class="box">
                <!-- /.box-header -->
								<div align="center" id="div_grafica_reparto_x_area_calif"></div>
								<div class="box-body">
                  <div id="highcharts_Grafica_por_Reparto_Calif_Area" class="highcharts pie"></div>
                </div>
              </div><!-- /.box -->
            </div>			
      </div>
	  
	  
<div class="modal fade modalchs" id="Modal_tabla_por_categoria">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" id="closeModal_tabla_por_categoria" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Tabla por Categoria</h4>
          </div>
		  <div class="modal-body nopsides" id="div_tabla"></div>
		</div>
  </div>
</div>
	

<div class="modal fade modalchs" id="Modal_tabla_reclasificacion_categoria">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
			<div class="modal-header azuldef">
				<button type="button" class="close" id="closeModal_tabla_por_categoria" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">
					<i class="fa fa-check-circle-o" aria-hidden="true"></i>  Reclasificación - Sección - Categoría - SubCategoría / Ticket : <span id="id_ticket"></span>
				</h4>
			</div>


			<div class="modal-content">
				<div class="modal-body">
					
						<section id="datos_material">

								<div class="row">
											<div class="col-md-2">											
						            <div class="form-group">
													<label class="control-label" style="font-size: 12px;">Titulo Reporte:</label>	
						            </div>
						          </div>
						          <div class="col-md-10">
												<div class="form-group">
						              <span id="ticket_reasignacion_titulo"></span>
						            </div>
						          </div>
								</div>

								<div class="row">
											<div class="col-md-2">											
						            <div class="form-group">
													<label class="control-label" style="font-size: 12px;">Descripción Reporte:</label>	
						            </div>
						          </div>
						          <div class="col-md-10">
												<div class="form-group">
						              <span id="ticket_reasignacion_Desc_Motivo_Reporte"></span>
						            </div>
						          </div>
								</div>

								<div class="row">
											<div class="col-md-2">											
						            <div class="form-group">
													<label class="control-label" style="font-size: 12px;">Acciones Realizadas:</label>	
						            </div>
						          </div>
						          <div class="col-md-10">
												<div class="form-group">
						              <span id="ticket_reasignacion_acciones_realizadas"></span>
						            </div>
						          </div>
								</div>


								<div class="row">
											<div class="col-md-8">
						            <div class="form-group">
													<span><font color="red">*</font></span>
													<label class="control-label" style="font-size: 12px;">Nombre Ejecutante</label>	
						            <select class="form-control" name="ticket_reasignacion_Nombre_Ejecutante" id="ticket_reasignacion_Nombre_Ejecutante" required>
					              	<option disabled selected>Ejecutante</option>
					              	<option></option>
					              </select>
						              <span id="error_ticket_reasignacion_Nombre_Ejecutante"></span>
						            </div>
						          </div>
						    </div>
						    <div class="row">

				          <div class="col-md-4">
					            <div class="form-group">
					            	<span><font color="red">*</font></span>
												<label class="control-label" style="font-size: 12px;">Sección</label><br>
					              <select class="form-control" name="ticket_reasignacion_Seccion" id="ticket_reasignacion_Seccion" required>
					              	<option disabled selected>Sección</option>
					              	<option></option>
					              </select>
					              <span id="error_ticket_reasignacion_Seccion"></span>
					            </div>
				          </div>

				          <div class="col-md-4">
					            <div class="form-group">
					            	<span><font color="red">*</font></span>
												<label class="control-label" style="font-size: 12px;">Categoría</label><br>
					              <select class="form-control" name="ticket_reasignacion_Id_Categoria" id="ticket_reasignacion_Id_Categoria" required>
					              	<option disabled selected>Categoría</option>
					              	<option></option>
					              </select>
					              <span id="error_ticket_reasignacion_Id_Categoria"></span>
					            </div>
				          </div>

				          <div class="col-md-4">
					            <div class="form-group">
					            	<span><font color="red">*</font></span>
												<label class="control-label" style="font-size: 12px;">Sub Categoría</label><br>
					              <select class="form-control" name="ticket_reasignacion_Id_Subcategoria" id="ticket_reasignacion_Id_Subcategoria" required>
					              	<option disabled selected>Sub Categoría</option>
					              	<option></option>
					              </select>
					              <span id="error_ticket_reasignacion_Id_Subcategoria"></span>
					            </div>
				          </div>

						    </div>

								<div class="row">
						          
				          <div class="col-md-4">
					            <div class="form-group">
					            	<span><font color="red">*</font></span>
												<label class="control-label" style="font-size: 12px;">Motivo Aparente</label><br>
					              <select class="form-control" name="ticket_reasignacion_Id_Motivo_Aparente" id="ticket_reasignacion_Id_Motivo_Aparente" required>
					              	<option disabled selected>Motivo Real</option>
					              	<option></option>
					              </select>
					              <span id="error_ticket_reasignacion_Id_Motivo_Aparente"></span>
					            </div>
				          </div>

				          <div class="col-md-4">
					            <div class="form-group">
					            	<span><font color="red">*</font></span>
												<label class="control-label" style="font-size: 12px;">Motivo Real</label><br>
					              <select class="form-control" name="ticket_reasignacion_Id_Motivo_Real" id="ticket_reasignacion_Id_Motivo_Real" required>
					              	<option disabled selected>Motivo Aparente</option>
					              	<option></option>
					              </select>
					              <span id="error_ticket_reasignacion_Id_Motivo_Real"></span>
					            </div>
				          </div>

									<div class="col-md-4">
				            <div class="form-group">
											<span><font color="red">*</font></span>
											<label class="control-label" style="font-size: 12px;">Fecha Espera Cierre</label>
											<span id="ticket_reasignacion_Fech_Espera_Cierre"></span>
				              <span id="error_ticket_reasignacion_Fech_Espera_Cierre"></span>
				            </div>
				          </div>

							</div>
								
							<div class="tab-content">
								 <div class="modal-footer">
									<button type="button" id="botonReasignacionUpdate" onclick="botonReasignacionUpdate()" class="btn btn-success">Actualizar Ticket</button>
								 </div>
							</div>	

					</section>

		     </div>
			</div>

		</div>
	</div>
</div>


</div>
          	  
      <!-- /.row -->
<!-- DataTables 
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
File Input -->
<script src="../plugins/fileinput/fileinput.js"></script>
<script src="../plugins/fileinput/fileinput_locale_es.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App   Se comento esta linea ya que no deja desplegar el menu-->
<!--<script src="../dist/js/app.min.js"></script>-->
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!--<script src="../plugins/fullcalendaryear/fullcalendar.js"></script>-->

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
 

  //Highcharts
  $(document).ready(function(){
	var F_I="";
	var F_F="";
	var Seccion="";
	var Gestor="";
	
	//Date picker
	$('#Fecha_Inicial').datepicker({ 
		format: 'dd/mm/yyyy',
	}).datepicker();
	
	$('#Fecha_Final').datepicker({ 
		format: 'dd/mm/yyyy',
	}).datepicker();
	
	secciones();
	function secciones() {
		var Id_Area=$("#idareasesion").val();
		if(Id_Area=="5"){
			$("#div_seccion").hide();
			$("#div_gestores").hide();
		}
		
		var resultado=new Array();
		data={Estatus_Reg: "1",Id_Area:Id_Area, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ticket_seccion/Siga_cat_ticket_seccionFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmb_secciones').append($('<option>', { value: "-1" }).text("--Secciones--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmb_secciones').append($('<option>', { value: resultado.data[i].Id_Seccion }).text(resultado.data[i].Desc_Seccion));
			}
		}else{
			$('#cmb_secciones').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$("#cmb_secciones").change(function (event){
		$("#cmb_gestores").empty();
		
		if ($("#cmb_secciones").val() != -1)
			carga_gestores($("#cmb_secciones").val());
	    else
		{
			$('#cmb_gestores').append($('<option>', { value: "-1" }).text("--Gestores--"));
		}
	});
	
	function carga_gestores(Id_Seccion) {
		var Id_Area=$("#idareasesion").val();
		if(Id_Area=="5"){
			$("#div_gestores").hide();
		}
		
		var resultado=new Array();
		data={Estatus_Reg: "1",Id_Area:Id_Area, Id_Seccion:Id_Seccion, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_gestores/Siga_cat_gestoresFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmb_gestores').append($('<option>', { value: "-1" }).text("--Gestores--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmb_gestores').append($('<option>', { value: resultado.data[i].Id_Usuario }).text(resultado.data[i].Nombre_Empleado));
			}
		}else{
			$('#cmb_gestores').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	
	Buscar=function(){
		//Limpia campos que envia a las graficas (pdf)
		//$("#url_img_cat").val("");
		$("#Fech_In").val("");
		$("#Fech_Fin").val("");
		$("#Seccion").val("");
		$("#Gestor").val("");
		$("#div_grafica_por_subcategoria").hide();
	
		var Agregar = true;
		var mensaje_error = "";
		F_I="";
		F_F="";
		Seccion="";
		Gestor="";
		var Fecha_Inicial=$("#Fecha_Inicial").val();
		var Fecha_Final=$("#Fecha_Final").val();
		var Id_Seccion=$("#cmb_secciones").val();
		var Nombre_seccion="";
		var Id_Gestor=$("#cmb_gestores").val();
		var Nombre_gestor="";
		
		if(Fecha_Inicial!=""||Fecha_Final!=""){
			if(Fecha_Inicial==""){
				Agregar = false; 
				mensaje_error += " -Falta agregar la Fecha Inicial.<br />";
			}
			if(Fecha_Final==""){
				Agregar = false; 
				mensaje_error += " -Falta agregar la Fecha Final.<br />";
			}
			
			
		}else{
			Agregar = false; 
			mensaje_error += " -Falta agregar la Fecha Inicial y Fecha Final.<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar){
			var Id_Area=$("#idareasesion").val();
			var strDatos="";
			
			var FI_D="", FF_D="";
			var FI_M="", FF_M="";
			var FI_A="", FF_A="";
			
			//Fecha Inicial
			FI_D=Fecha_Inicial[0]+""+Fecha_Inicial[1];
			FI_M=Fecha_Inicial[3]+""+Fecha_Inicial[4];
			FI_A=Fecha_Inicial[6]+""+Fecha_Inicial[7]+""+Fecha_Inicial[8]+""+Fecha_Inicial[9];
			Fecha_Inicial=FI_A+"-"+FI_M+"-"+FI_D;
			F_I=FI_A+"-"+FI_M+"-"+FI_D;
			//Fecha Final
			FF_D=Fecha_Final[0]+""+Fecha_Final[1];
			FF_M=Fecha_Final[3]+""+Fecha_Final[4];
			FF_A=Fecha_Final[6]+""+Fecha_Final[7]+""+Fecha_Final[8]+""+Fecha_Final[9];
			Fecha_Final=FF_A+"-"+FF_M+"-"+FF_D;
			F_F=FF_A+"-"+FF_M+"-"+FF_D;
			
			strDatos = "Id_Area="+Id_Area;
			
			if($("#check_seccion").prop('checked')==true){
				if(Id_Seccion!="-1"){
					strDatos += "&Seccion="+Id_Seccion;
					Seccion=Id_Seccion;
					Nombre_seccion=$("#cmb_secciones option:selected").html();				
				}
			}else{
				Id_Seccion="-1";
			}
			
			if($("#check_gestores").prop('checked')==true){
				if(Id_Gestor!="-1"){
					strDatos += "&Id_Gestor="+Id_Gestor;
					Gestor=Id_Gestor;
					Nombre_gestor=$("#cmb_gestores option:selected").html();	
				}
			}else{
				Id_Gestor="-1";
			}	
			strDatos += "&Fecha_Inicial="+F_I;
			strDatos += "&Fecha_Final="+F_F;
			strDatos += "&Estatus_Reg=1";
			
			var tipo_reporte=$("#cmb_reporte").val();
			if(tipo_reporte=="1"){
				
				grafica_x_categoria(strDatos, Nombre_seccion, Nombre_gestor, Id_Area, Id_Seccion, Id_Gestor, Fecha_Inicial, Fecha_Final);
				$("#div_grafica_por_categoria").show();
				$("#div_grafica_por_subcategoria").hide();
				$("#div_grafica_por_categoria_Top_3").hide();
				$("#div_grafica_por_reparto").hide();
				$("#div_grafica_reparto_x_gestor_calif").hide();
				$("#div_grafica_reparto_x_area_calif").hide();
				$("#highcharts_Grafica_por_Reparto_Calif").html("");
				$("#highcharts_Grafica_por_Reparto_Calif_Area").html("");
			}
			if(tipo_reporte=="2"){
				
				grafica_x_reparto(strDatos, Nombre_seccion, Nombre_gestor, Id_Area, Id_Seccion, Id_Gestor, Fecha_Inicial, Fecha_Final);
				$("#div_grafica_por_categoria").hide();
				$("#div_grafica_por_subcategoria").hide();
				$("#div_grafica_por_categoria_Top_3").hide();
				$("#div_grafica_por_reparto").show();
				$("#div_grafica_reparto_x_gestor_calif").hide();
				$("#div_grafica_reparto_x_area_calif").hide();
				$("#highcharts_Grafica_por_Reparto_Calif_Area").html("");
			}
			
			if(tipo_reporte=="3"){
				grafica_x_categoria_Top_3(strDatos, Nombre_seccion, Nombre_gestor, Id_Area, Id_Seccion, Id_Gestor, Fecha_Inicial, Fecha_Final);
				$("#div_grafica_por_categoria").hide();
				$("#div_grafica_por_subcategoria").hide();
				$("#div_grafica_por_categoria_Top_3").show();
				$("#div_grafica_por_reparto").hide();
				$("#div_grafica_reparto_x_gestor_calif").hide();
				$("#div_grafica_reparto_x_area_calif").hide();
				$("#highcharts_Grafica_por_Reparto_Calif").html("");
				$("#highcharts_Grafica_por_Reparto_Calif_Area").html("");
			}
			
			if(tipo_reporte=="4"){
				Grafica_Area_Calificacion(strDatos, Nombre_seccion, Nombre_gestor, Id_Area, Id_Seccion, Id_Gestor, Fecha_Inicial, Fecha_Final);
				$("#div_grafica_por_categoria").hide();
				$("#div_grafica_por_subcategoria").hide();
				$("#div_grafica_por_categoria_Top_3").hide();
				$("#div_grafica_por_reparto").hide();
				$("#div_grafica_reparto_x_gestor_calif").hide();
				$("#div_grafica_reparto_x_area_calif").show();
				$("#highcharts_Grafica_por_Reparto_Calif").html("");
			}
		}
		
	}
	
	grafica_x_categoria=function(strDatos, Nombre_seccion, Nombre_gestor, Id_Area, Id_Seccion, Id_Gestor, Fecha_Inicial, Fecha_Final){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
			async: false,
			data: strDatos+"&accion=consul_report_ges_categ",
			dataType: "html",
			beforeSend: function (xhr) {
		
			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				if(json.Total_Cantidad>0){
					$("#div_grafica_por_reparto").show();
					$("#highcharts_Grafica_por_Categoria").show();
					
					$("#div_pdf").html('');
					var Total_Cantidad=0;
					var grafica=[];
					for(var i=0;i < json.totalCount; i++){
						var valor_y=0;
						var Desc_Categoria="";
						var Id_Categoria="";
						Total_Cantidad=parseInt(json.Total_Cantidad);
						valor_y=(parseInt(json.data[i].Cantidad)/Total_Cantidad)*100;
						//alert("("+parseInt(json.data[i].Cantidad)+"/"+Total_Cantidad+")*100");
						if(json.data[i].Id_Categoria!="0"){
							Desc_Categoria=json.data[i].Desc_Categoria;
						}else{
							Desc_Categoria="SIN CATEGORIA (Nuevos tickets)";
						}
						
						//Redondear a un decimal
						var flotante = parseFloat(valor_y);
						var resultado = Math.round(flotante*Math.pow(10,1))/Math.pow(10,1);
						
						Desc_Categoria='('+resultado+'% Tot. '+json.data[i].Cantidad+') '+Desc_Categoria;
						grafica[i]={
							name: Desc_Categoria,
							y: valor_y,
							key:json.data[i].Id_Categoria
							//color:'#05cc50',
						};
					}
						Highcharts.chart('highcharts_Grafica_por_Categoria', {
							chart: {
								plotBackgroundColor: null,
								plotBorderWidth: null,
								plotShadow: false,
								type: 'pie',
								options3d: {
									enabled: true,
									alpha: 45,
									beta: 0
								}
							},
							title: {
								text: 'Reparto de Categorías'
							},
							tooltip: {
								pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
							},
							plotOptions: {
								pie: {
									allowPointSelect: true,
									cursor: 'pointer',
									depth: 35,
									dataLabels: {
										enabled: false,
										format: '{point.name}'
									},
									showInLegend: true,
									point: {
										events: {
											click: function () {
												
												if(this.options.key!=0){
													grafica_x_subcategoria(this.options.key,this.options.name, Nombre_seccion, Nombre_gestor);
												}else{
													$("#div_grafica_por_subcategoria").hide();
													tabla_tickets_subcategoria("", "", "", "", "", "Por_Categoria_y_Subcategoria");
												}
											}
										}
									}
								}
							},
							series: [{
								name: 'Brands',
								colorByPoint: true,
								data: grafica
							}]
						});
						
				
						$("#div_pdf").html('<div><a class="btn chs" style="background-color: #E3210D; border-color: #E3210D;" target="_blank" href="../controladores/activos/siga_solicitud_tickets/Reporte-Categoria.php?Fecha_Inicial='+Fecha_Inicial+'&Fecha_Final='+Fecha_Final+'&Id_Area='+Id_Area+'&Id_Seccion='+Id_Seccion+'&Id_Gestor='+Id_Gestor+'" >Reporte PDF</a> <button type="button" class="btn chs" style="background-color: #00a65a; border-color: #008d4c;" id="genera_grafica" onclick="generar_pdf_graf(\'highcharts_Grafica_por_Categoria\',\''+Nombre_seccion+'\',\''+Nombre_gestor+'\')">Grafica</a></div>');
					
						$(".highcharts-credits").hide();
					
				}else{
					mensajesalerta("Informaci&oacute;n", "No se encontraron Resultados", "info", "dark");
					$("#div_grafica_por_reparto").hide();
					$("#highcharts_Grafica_por_Categoria").hide();
					$("#div_pdf").html("")
				}
				
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
			}
		});
	}
	
	grafica_x_subcategoria=function(Id_Categoria, Desc_Categoria, Nombre_seccion, Nombre_gestor){
		var strDatos="";
		var Id_Area=$("#idareasesion").val();
		
		strDatos = "Id_Area="+Id_Area;
		strDatos += "&Seccion="+Seccion;
		strDatos += "&Id_Gestor="+Gestor;
		strDatos += "&Id_Categoria="+Id_Categoria;
		strDatos += "&Fecha_Inicial="+F_I;
		strDatos += "&Fecha_Final="+F_F;
		strDatos += "&Estatus_Reg=1";
		strDatos += "&accion=consul_report_x_categ";
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
			async: false,
			data: strDatos,
			dataType: "html",
			beforeSend: function (xhr) {
		
			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				$("#div_grafica_por_subcategoria").hide();
				if(json.Total_Cantidad>0){
						$("#div_grafica_por_subcategoria").show();
						$("#div_grafica_x_categ").html('<div align="center"><button type="button" class="btn chs"  id="genera_grafica" style="background-color: #00a65a; border-color: #008d4c;" onclick="generar_pdf_graf(\'highcharts_Grafica_por_Subcategoria\',\''+Nombre_seccion+'\',\''+Nombre_gestor+'\')">Grafica</a></div>');
						
						var Total_Cantidad=0;
						var grafica=[];
						for(var i=0;i < json.totalCount; i++){
							var valor_y=0;
							var Desc_Subcategoria="";
							
							Total_Cantidad=parseInt(json.Total_Cantidad);
							valor_y=(parseInt(json.data[i].Cantidad)/Total_Cantidad)*100;
						
							Desc_Subcategoria=json.data[i].Desc_Subcategoria;
								
							//Redondear a un decimal
							var flotante = parseFloat(valor_y);
							var resultado = Math.round(flotante*Math.pow(10,1))/Math.pow(10,1);
							
							Desc_Subcategoria='('+resultado+'% Tot. '+json.data[i].Cantidad+') '+Desc_Subcategoria;
							
							grafica[i]={
								name: Desc_Subcategoria,
								y: valor_y,
								key:json.data[i].Id_Subcategoria
								//color:'#05cc50',
							};
						}
						
						Highcharts.chart('highcharts_Grafica_por_Subcategoria', {
							chart: {
								plotBackgroundColor: null,
								plotBorderWidth: null,
								plotShadow: false,
								type: 'pie',
								options3d: {
									enabled: true,
									alpha: 45,
									beta: 0
								}
							},
							title: {
								text: 'Reparto por Subcategoria ('+Desc_Categoria+')'
							},
							tooltip: {
								pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
							},
							plotOptions: {
								pie: {
									allowPointSelect: true,
									cursor: 'pointer',
									depth: 35,
									dataLabels: {
										enabled: false,
										format: '{point.name}'
									},
									showInLegend: true,
									point: {
										events: {
											click: function () {
												tabla_tickets_subcategoria("", "", "", Id_Categoria, this.options.key, "Por_Categoria_y_Subcategoria");
											}
										}
									}
								}
							},
							
							series: [{
								name: 'Brands',
								colorByPoint: true,
								data: grafica
							}]
						});
						
						$(".highcharts-credits").hide();
						
					}else{
						mensajesalerta("Informaci&oacute;n", "No se encontraron Resultados", "info", "dark");
						
					}
					
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});	
	}
	
	generar_pdf_graf=function(nombre_grafica, nombre_seccion, nombre_gestor){
		var obj = {},
			chart;
		
		chart = $('#'+nombre_grafica).highcharts();
		obj.svg = chart.getSVG();
		obj.type = 'image/png';
		obj.width = 700; 
		obj.async = true;
		
		
		$.ajax({
			type: 'post',
			url: chart.options.exporting.url,   
			data: obj, 
			success: function (data) {
				var exportUrl = this.url,
				imgContainer = $("#imgContainer");
				//$('<img>').attr('src', exportUrl + data).attr('width','400px').appendTo(imgContainer);
				//$('img').fadeIn();
				
				
				$('#url_img_cat').text(exportUrl + data);
				$("#Fech_In").val(F_I);
				$("#Fech_Fin").val(F_F);
				$("#Seccion").val(nombre_seccion);
				$("#Gestor").val(nombre_gestor);
                $('#cont').submit();
			}        
		});
	};
	
	
	grafica_x_categoria_Top_3=function(strDatos, Nombre_seccion, Nombre_gestor, Id_Area, Id_Seccion, Id_Gestor, Fecha_Inicial, Fecha_Final){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
			async: false,
			data: strDatos+"&accion=consul_report_ges_categ_Top_3",
			dataType: "html",
			beforeSend: function (xhr) {
		
			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				if(json.Total_Cantidad>0){
					$("#highcharts_Grafica_por_Categoria_Top_3").show();
					
					var Total_Cantidad=0;
					var grafica=[];
					for(var i=0;i < json.totalCount; i++){
						var valor_y=0;
						var Desc_Categoria="";
						var Id_Categoria="";
						Total_Cantidad=parseInt(json.Total_Cantidad);
						valor_y=(parseInt(json.data[i].Cantidad)/Total_Cantidad)*100;
						//alert("("+parseInt(json.data[i].Cantidad)+"/"+Total_Cantidad+")*100");
						if(json.data[i].Id_Categoria!="0"){
							Desc_Categoria=json.data[i].Desc_Categoria;
						}else{
							Desc_Categoria="SIN CATEGORIA (Nuevos tickets)";
						}
						
						//Redondear a un decimal
						var flotante = parseFloat(valor_y);
						var resultado = Math.round(flotante*Math.pow(10,1))/Math.pow(10,1);
						
						Desc_Categoria='('+resultado+'% Tot. '+json.data[i].Cantidad+') '+Desc_Categoria;
						grafica[i]={
							name: Desc_Categoria,
							y: valor_y,
							key:json.data[i].Id_Categoria
							//color:'#05cc50',
						};
					}
						Highcharts.chart('highcharts_Grafica_por_Categoria_Top_3', {
							chart: {
								plotBackgroundColor: null,
								plotBorderWidth: null,
								plotShadow: false,
								type: 'pie',
								options3d: {
									enabled: true,
									alpha: 45,
									beta: 0
								}
							},
							title: {
								text: 'Reparto de Categorías (Top 3)'
							},
							tooltip: {
								pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
							},
							plotOptions: {
								pie: {
									allowPointSelect: true,
									cursor: 'pointer',
									depth: 35,
									dataLabels: {
										enabled: false,
										format: '{point.name}'
									},
									showInLegend: true,
									point: {
										events: {
											click: function () {
												
												if(this.options.key!=0){
													grafica_x_subcategoria(this.options.key,this.options.name, Nombre_seccion, Nombre_gestor);
												}else{
													$("#div_grafica_por_subcategoria").hide();
													tabla_tickets_subcategoria("", "", "", "", "","Por_Categoria_y_Subcategoria");
												}
											}
										}
									}
								}
							},
							series: [{
								name: 'Brands',
								colorByPoint: true,
								data: grafica
							}]
						});
					
						$(".highcharts-credits").hide();
						$("#btn_graf_top_3").html();
						
						$("#btn_graf_top_3").html('<div><button type="button" class="btn chs" style="background-color: #00a65a; border-color: #008d4c;" id="genera_grafica" onclick="generar_pdf_graf(\'highcharts_Grafica_por_Categoria_Top_3\',\''+Nombre_seccion+'\',\''+Nombre_gestor+'\')">Grafica</a></div>');
					
				}else{
					mensajesalerta("Informaci&oacute;n", "No se encontraron Resultados", "info", "dark");
					$("#highcharts_Grafica_por_Categoria_Top_3").hide();
				}
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}
	
	
	tabla_tickets_subcategoria=function(Id_Gestor, Tipo_Calificacion, Calificacion, Id_Categoria, Id_Subcategoria, Nombre_Grafica){
		
		var strDatos="";
		var Id_Area=$("#idareasesion").val();
		
		strDatos = "Id_Area="+Id_Area;
		strDatos += "&Seccion="+Seccion;
		if(Id_Gestor!=""){
			strDatos += "&Id_Gestor="+Id_Gestor;
		}else{
			strDatos += "&Id_Gestor="+Gestor;
		}
		strDatos += "&Tipo_Calificacion="+Tipo_Calificacion;
		strDatos += "&Calificacion="+Calificacion;
		strDatos += "&Id_Categoria="+Id_Categoria;
		strDatos += "&Id_Subcategoria="+Id_Subcategoria;
		strDatos += "&Fecha_Inicial="+F_I;
		strDatos += "&Fecha_Final="+F_F;
		strDatos += "&Nombre_Grafica="+Nombre_Grafica;
		strDatos += "&accion=consul_tabla_x_categ";
		
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
			async: false,
			data: strDatos,
			dataType: "html",
			beforeSend: function (xhr) {
		
			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				var tabla="";
				
				if(json.totalCount>0){
				
					tabla+='<div class="box-body"><div class="table-responsive">';
					tabla+='  <table id="tabla_categorias" class="display nowrap">';
					tabla+='	<thead>';
					tabla+='	  <tr>';
					tabla+='	  <th></th>';

					tabla+='		<th>Ticket</th>';
					tabla+='		<th>Estatus</th>';
					tabla+='		<th>F. Solicitud</th>';
					if(Tipo_Calificacion==0&&Nombre_Grafica=="grafica_por_gestor"){
						tabla+='		<th>Solución Ofrecida</th>';
					}
					if(Tipo_Calificacion==1&&Nombre_Grafica=="grafica_por_gestor"){
						tabla+='		<th>Actitud de Solución</th>';
					}
					if(Tipo_Calificacion==2&&Nombre_Grafica=="grafica_por_gestor"){
						tabla+='		<th>Tiempo de Respuesta</th>';
					}

					//tabla+='		<th>F. Reporte</th>';
					tabla+='		<th>F. Seguim.</th>';
					tabla+='		<th>F. Espera cierre</th>';					
					tabla+='		<th>F. Cierre</th>';
					tabla+='		<th>Prioridad</th>';
					
					tabla+='		<th>Sección</th>';
					tabla+='		<th>Categoría</th>';
					tabla+='		<th>Subcategoria</th>';

					tabla+='		<th>Descripción</th>';
					tabla+='		<th>Descripción Detalle</th>';

					tabla+='		<th>Acciones realizadas</th>';
					tabla+='		<th>Motivo Aparente</th>';
					tabla+='		<th>Motivo real</th>';					

					tabla+='		<th>Usr. Inicial</th>';
					tabla+='		<th>Usuario Final</th>';
					tabla+='		<th>U. Primaria</th>';
					tabla+='		<th>U. Secundaria</th>';

					tabla+='		<th>No. Activo</th>';
					tabla+='		<th>Nombre activo</th>';
					tabla+='		<th>Marca</th>';
					tabla+='		<th>Modelo</th>';
					tabla+='		<th>Serie</th>';

					tabla+='		<th>Usuario Solicitante</th>';						
					tabla+='		<th>Est. equipo</th>';
					tabla+='		<th>Área</th>';

					tabla+='		<th>Gestor Asignado</th>';
					tabla+='		<th>Gestor Final</th>';

					tabla+='		<th>Realiza</th>';
					tabla+='		<th>Empresa ejecutante</th>';

					tabla+='	  </tr>';
					tabla+='	</thead>';
					tabla+='	<tbody>';

					for(var i=0;i < json.totalCount; i++){
						
						tabla+='	 <?php if(in_array(59,$validar_gestor_res)){ ?> <td>';
						tabla+='				<a href="#" data-toggle="modal" data-target="#Modal_Edicion" onclick="reclasificacion_ticket('+json.data[i].Id_Solicitud+')">';
						tabla+='					<span><i class="fa fa-pencil" style="font-size:16px;color:blue" aria-hidden="true"></i></span>';
						tabla+='				</a>';
						tabla+='	  </td> <?php } else { echo "<td></td>"; } ?>';
						tabla+='		<td>'+json.data[i].Id_Solicitud+'</td>';						
						tabla+='<td>';
						if(json.data[i].Id_Estatus_Proceso=="Cerrado"){
							tabla+='<a target="_blank" title="Click Aquí" href="../controladores/activos/siga_solicitud_tickets/Reporte-Ticket.php?Id_Solicitud='+json.data[i].Id_Solicitud+'" >'+json.data[i].Id_Estatus_Proceso+'</a>';
						}else{
							tabla+=json.data[i].Id_Estatus_Proceso;	
						}
						tabla+='</td>';


						tabla+='		<td>'+json.data[i].Fecha_Solicitud+'</td>';
						if(Tipo_Calificacion==0&&Nombre_Grafica=="grafica_por_gestor"){
							tabla+='		<td>';
							if(json.data[i].Solucion_Ofrecida==1){tabla+='<font color="blue">Excelente</font>';}
							if(json.data[i].Solucion_Ofrecida==2){tabla+='<font color="blue">Muy Bien</font>';}	
							if(json.data[i].Solucion_Ofrecida==3){tabla+='<font color="blue">Bien</font>';}
							if(json.data[i].Solucion_Ofrecida==4){tabla+='<font color="blue">Malo</font>';}
							if(json.data[i].Solucion_Ofrecida==5){tabla+='<font color="blue">Muy Malo</font>';}						
							tabla+='		</td>';
						}
						
						if(Tipo_Calificacion==1&&Nombre_Grafica=="grafica_por_gestor"){
							tabla+='		<td>';
							if(json.data[i].Actitud_Solucion==1){tabla+='<font color="blue">Excelente</font>';}
							if(json.data[i].Actitud_Solucion==2){tabla+='<font color="blue">Muy Bien</font>';}	
							if(json.data[i].Actitud_Solucion==3){tabla+='<font color="blue">Bien</font>';}
							if(json.data[i].Actitud_Solucion==4){tabla+='<font color="blue">Malo</font>';}
							if(json.data[i].Actitud_Solucion==5){tabla+='<font color="blue">Muy Malo</font>';}						
							tabla+='		</td>';
						}
						
						if(Tipo_Calificacion==2&&Nombre_Grafica=="grafica_por_gestor"){
							tabla+='		<td>';
							if(json.data[i].Tiempo_Respuesta==1){tabla+='<font color="blue">Excelente</font>';}
							if(json.data[i].Tiempo_Respuesta==2){tabla+='<font color="blue">Muy Bien</font>';}	
							if(json.data[i].Tiempo_Respuesta==3){tabla+='<font color="blue">Bien</font>';}
							if(json.data[i].Tiempo_Respuesta==4){tabla+='<font color="blue">Malo</font>';}
							if(json.data[i].Tiempo_Respuesta==5){tabla+='<font color="blue">Muy Malo</font>';}						
							tabla+='		</td>';
						}


					//tabla+='		<td>'+json.data[i].Fech_Solicitud+'</td>';
					tabla+='		<td>'+json.data[i].Fecha_Seguimiento+'</td>';
					tabla+='		<td>'+json.data[i].Fech_Espera_Cierre+'</td>';
					tabla+='		<td>'+json.data[i].Fecha_Cierre+'</td>';
					tabla+='		<td>'+json.data[i].Desc_Prioridad+'</td>';
					tabla+='		<td>'+json.data[i].Nombre_Seccion+'</td>';
					tabla+='		<td>'; if(json.data[i].Desc_Categoria!=null){tabla+=json.data[i].Desc_Categoria;} tabla+='</td>';
					tabla+='		<td>'; if(json.data[i].Desc_Subcategoria!=null){tabla+=json.data[i].Desc_Subcategoria;} tabla+='</td>';

					tabla+='		<td>'+json.data[i].Titulo+'</td>';
					tabla+='		<td>';
						var Desc = '';
						if(json.data[i].Id_Actividad!=""){
							Desc='<a href="#noir" id="Ver_Act'+json.data[i].Id_Solicitud+'" onclick="ver_actividades('+json.data[i].Id_Solicitud+')">Ver Actividades</a><a href="#noir" id="Ocult_Act'+json.data[i].Id_Solicitud+'" onclick="ocult_actividades('+json.data[i].Id_Solicitud+')" style="display:none">Ocultar Actividades</a><div id="Desc_Motiv_Repor'+json.data[i].Id_Solicitud+'" style="display:none">'+json.data[i].Desc_Motivo_Reporte+"</div>";
						}else{
							Desc=json.data[i].Desc_Motivo_Reporte;
						}
					tabla+= 		Desc;
					tabla+='		</td>';

					tabla+='		<td>'+json.data[i].ComentarioCierre+'</td>';					
					tabla+='		<td>'+json.data[i].Id_Motivo_Aparente+'</td>';
					tabla+='		<td>'+json.data[i].Id_Motivo_Real+'</td>';



					tabla+='		<td>'+json.data[i].Id_Usuario_Inicial+'</td>';
					tabla+='		<td>'+json.data[i].usuario_final+'</td>';
					tabla+='		<td>'+json.data[i].Desc_Ubic_Prim+'</td>';
					tabla+='		<td>'+json.data[i].Desc_Ubic_Sec+'</td>';



					tabla+='		<td>'+json.data[i].AF_BC_Ext+'</td>';
					tabla+='		<td>'+json.data[i].Nombre_Act_Ext+'</td>';
					tabla+='		<td>'+json.data[i].Marca_Act_Ext+'</td>';
					tabla+='		<td>'+json.data[i].Modelo_Act_Ext+'</td>';
					tabla+='		<td>'+json.data[i].No_Serie_Act_Ext+'</td>';



					tabla+='		<td>'+json.data[i].Nombre_Usuario+'</td>';
					tabla+='		<td>'+json.data[i].Desc_Estatus+'</td>';
					tabla+='		<td>'+json.data[i].Nom_Area+'</td>';

					tabla+='		<td>'; if(json.data[i].Gestor!=null){tabla+=json.data[i].Gestor;} 
					tabla+='		</td>';
					tabla+='		<td>'+json.data[i].Gestor_Final_Cierre+'</td>';

					tabla+='		<td>'+json.data[i].Lo_Realiza+'</td>';
					tabla+='		<td>'+json.data[i].Nombre_Ejecutante+'</td>';


						tabla+='	  </tr>';	
					}
					tabla+='	</tbody>';
					tabla+='  </table>';
					tabla+='</div></div><br>';

					$("#div_tabla").html(tabla);
					$('#tabla_categorias').DataTable({
						"dom": 'Bfrtip',
						"buttons": [
									'copy', 'csv', 'excel'//, 'pdf', 'print'
						],
					  "processing": true,
					  "paging": true,
					  "lengthChange": true,
					  "searching": true,
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
						}
					});
					
				}else{
					$("#div_tabla").html("");
					mensajesalerta("Informaci&oacute;n", "No se encontraron Resultados", "info", "dark");
				}
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
			}
		});
		
	
		$("#Modal_tabla_por_categoria").modal("show");
	}
	
	grafica_x_reparto=function(strDatos, Nombre_seccion, Nombre_gestor, Id_Area, Id_Seccion, Id_Gestor, Fecha_Inicial, Fecha_Final){
		var Nom_Seccion=Nombre_seccion;
		var Nom_Gestor=Nombre_gestor;
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
			async: false,
			data: strDatos+"&accion=consul_grafica_por_reparto",
			dataType: "html",
			beforeSend: function (xhr) {
		
			},
			success: function (datos) {
				
				
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				$("#div_grafica_por_reparto_calif").hide();
				if(json.totalCount>0){
					$("#highcharts_Grafica_por_Reparto").show();
					$("#div_grafica_reparto_x_gestor").html('<div align="center"><a class="btn chs" style="background-color: #E3210D; border-color: #E3210D;" target="_blank" href="../controladores/activos/siga_solicitud_tickets/Reporte-Reparto-Gestor.php?Fecha_Inicial='+Fecha_Inicial+'&Fecha_Final='+Fecha_Final+'&Id_Area='+Id_Area+'&Id_Seccion='+Id_Seccion+'&Id_Gestor='+Id_Gestor+'" >Reporte PDF</a> <button type="button" class="btn chs"  id="genera_grafica_reparto_gestor" style="background-color: #00a65a; border-color: #008d4c;" onclick="generar_pdf_graf(\'highcharts_Grafica_por_Reparto\',\''+Nombre_seccion+'\',\''+Nombre_gestor+'\')">Grafica</a></div>');
					var grafica=[];
					for(var i=0;i < json.totalCount; i++){
						
						var valor_y=0;
						var Nombre_Gestor="";
						var Id_Categoria="";
						valor_y=(parseInt(json.data[i].Total)/json.Total)*100;
						Nombre_Gestor=json.data[i].Nombre_Usuario;
						
						//Redondear a un decimal
						var flotante = parseFloat(valor_y);
						var resultado = Math.round(flotante*Math.pow(10,1))/Math.pow(10,1);
						
						Nombre_Gestor='('+resultado+'% Tot. '+json.data[i].Total+') '+Nombre_Gestor;
						grafica[i]={
							name: Nombre_Gestor,
							y: valor_y,
							key:json.data[i].Id_Gestor
							//color:'#05cc50',
						};
					}
					
					Highcharts.chart('highcharts_Grafica_por_Reparto', {
						chart: {
							plotBackgroundColor: null,
							plotBorderWidth: null,
							plotShadow: false,
							type: 'pie',
							options3d: {
								enabled: true,
								alpha: 45,
								beta: 0
							}
						},
						title: {
							text: 'Reparto por Gestor'
						},
						tooltip: {
							pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
						},
						plotOptions: {
							pie: {
								allowPointSelect: true,
								cursor: 'pointer',
								depth: 35,
								dataLabels: {
									enabled: false,
									format: '{point.name}'
								},
								showInLegend: true,
								point: {
									events: {
										click: function () {
											Grafica_Gestor_Calificacion(this.options.key, this.options.name, Nom_Seccion, Nom_Gestor, Id_Area, Id_Seccion, Fecha_Inicial, Fecha_Final);
										}
									}
								}
							}
						},
						series: [{
							name: 'Brands',
							colorByPoint: true,
							data: grafica
						}]
					});
					$(".highcharts-credits").hide();
					
				}else{
					$("#highcharts_Grafica_por_Reparto").hide();
				}
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}
	
	Grafica_Gestor_Calificacion=function(Id_Gestor, Descripcion, Nombre_seccion, Nombre_gestor, Id_Area, Id_Seccion, Fecha_Inicial, Fecha_Final){
		var strDatos="";
		var Id_Area=$("#idareasesion").val();
		
		strDatos = "Id_Area="+Id_Area;
		strDatos += "&Seccion="+Seccion;
		strDatos += "&Id_Gestor="+Id_Gestor;
		strDatos += "&Fecha_Inicial="+F_I;
		strDatos += "&Fecha_Final="+F_F;
		strDatos += "&Estatus_Reg=1";
		strDatos += "&accion=consul_grafica_calif_gestor";
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
			async: false,
			data: strDatos,
			dataType: "html",
			beforeSend: function (xhr) {
		
			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				if(json.totalCount>0){
					
					$("#div_grafica_por_reparto_calif").show();
					$("#highcharts_Grafica_por_Reparto_Calif").show();
					var chart = Highcharts.chart('highcharts_Grafica_por_Reparto_Calif', {
							chart: {
									type: 'column'
							},

							title: {
									text: 'Calificación Por Gestor'
							},

							subtitle: {
									text: Descripcion
							},

							legend: {
									align: 'right',
									verticalAlign: 'middle',
									layout: 'vertical'
							},
							
							
			

							xAxis: {
									categories: ['Solución Ofrecida', 'Actitud de Solución', 'Tiempo de Respuesta'],
									labels: {
											x: -10
									}
							},

							yAxis: {
									allowDecimals: false,
									title: {
											text: 'Num. Tickets'
									}
							},

							series: [{
									name: 'Muy Malo',
									data: [json.data[0]["Solucion_Ofrecida_Muy_Malo"], json.data[0]["Actitud_Solucion_Muy_Malo"], json.data[0]["Tiempo_Respuesta_Muy_Malo"]],
									color: '#F41608',
									point: {
										events: {
											click: function () {
												tabla_tickets_subcategoria(Id_Gestor, this.x, 5, "", "", "grafica_por_gestor");
											}
										}
									}
							}, {
									name: 'Malo',
									data: [json.data[0]["Solucion_Ofrecida_Malo"], json.data[0]["Actitud_Solucion_Malo"], json.data[0]["Tiempo_Respuesta_Malo"]],
									color: '#F57947',
									point: {
										events: {
											click: function () {
												tabla_tickets_subcategoria(Id_Gestor, this.x, 4, "", "", "grafica_por_gestor");
											}
										}
									}
							}, {
									name: 'Bien',
									data: [json.data[0]["Solucion_Ofrecida_Bien"], json.data[0]["Actitud_Solucion_Bien"], json.data[0]["Tiempo_Respuesta_Bien"]],
									color: '#F7F131',
									point: {
										events: {
											click: function () {
												tabla_tickets_subcategoria(Id_Gestor, this.x, 3, "", "", "grafica_por_gestor");
											}
										}
									}
							}, {
									name: 'Muy Bien',
									data: [json.data[0]["Solucion_Ofrecida_Muy_Bien"], json.data[0]["Actitud_Solucion_Muy_Bien"], json.data[0]["Tiempo_Respuesta_Muy_Bien"]],
									color: '#B2EA31',
									point: {
										events: {
											click: function () {
												tabla_tickets_subcategoria(Id_Gestor, this.x, 2, "", "", "grafica_por_gestor");
											}
										}
									}
							}, {
									name: 'Excelente',
									data: [json.data[0]["Solucion_Ofrecida_Excelente"], json.data[0]["Actitud_Solucion_Excelente"], json.data[0]["Tiempo_Respuesta_Excelente"]],
									color: '#31D813',
									point: {
										events: {
											click: function () {
												tabla_tickets_subcategoria(Id_Gestor, this.x, 1, "", "", "grafica_por_gestor");
											}
										}
									}
							}],

							responsive: {
									rules: [{
											condition: {
													maxWidth: 500
											},
											chartOptions: {
													legend: {
															align: 'center',
															verticalAlign: 'bottom',
															layout: 'horizontal'
													},
													yAxis: {
															labels: {
																	align: 'left',
																	x: 0,
																	y: -5
															},
															title: {
																	text: null
															}
													},
													subtitle: {
															text: null
													},
													credits: {
															enabled: false
													}
											}
									}]
							}
					});
										
				}else{
					$("#div_grafica_por_reparto_calif").hide();
					$("#highcharts_Grafica_por_Reparto_Calif").hide();
					mensajesalerta("Informaci&oacute;n", "No se encontraron Resultados", "info", "dark");
				}
					
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	
	}
	
	Grafica_Area_Calificacion=function(strDatos, Nombre_seccion, Nombre_gestor, Id_Area, Id_Seccion, Id_Gestor, Fecha_Inicial, Fecha_Final){
		var Id_Area=$("#idareasesion").val();
		var Descripcion="";
		
		Descripcion= Fecha_Inicial +"-"+ Fecha_Final;
		if(Nombre_seccion!=""){Descripcion+= ", "+ Nombre_seccion;}
		if(Nombre_gestor!=""){Descripcion+= ", "+ Nombre_gestor;}
		
		
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
			async: false,
			data: strDatos+"&accion=consul_grafica_calif_gestor",
			dataType: "html",
			beforeSend: function (xhr) {
		
			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				if(json.totalCount>0){
					
					$("#div_grafica_por_area_calif").show();
					$("#highcharts_Grafica_por_Reparto_Calif_Area").show();
					var chart = Highcharts.chart('highcharts_Grafica_por_Reparto_Calif_Area', {
							chart: {
									type: 'column'
							},

							title: {
									text: 'Calificación Por Área'
							},

							subtitle: {
									text: Descripcion
							},

							legend: {
									align: 'right',
									verticalAlign: 'middle',
									layout: 'vertical'
							},
							
							xAxis: {
									categories: ['Solución Ofrecida', 'Actitud de Solución', 'Tiempo de Respuesta'],
									labels: {
											x: -10
									}
							},

							yAxis: {
									allowDecimals: false,
									title: {
											text: 'Num. Tickets'
									}
							},

							series: [{
									name: 'Muy Malo',
									data: [json.data[0]["Solucion_Ofrecida_Muy_Malo"], json.data[0]["Actitud_Solucion_Muy_Malo"], json.data[0]["Tiempo_Respuesta_Muy_Malo"]],
									color: '#F41608',
									point: {
										events: {
											click: function () {
												tabla_tickets_subcategoria(Id_Gestor, this.x, 5, "", "", "grafica_por_gestor");
											}
										}
									}
							}, {
									name: 'Malo',
									data: [json.data[0]["Solucion_Ofrecida_Malo"], json.data[0]["Actitud_Solucion_Malo"], json.data[0]["Tiempo_Respuesta_Malo"]],
									color: '#F57947',
									point: {
										events: {
											click: function () {
												tabla_tickets_subcategoria(Id_Gestor, this.x, 4, "", "", "grafica_por_gestor");
											}
										}
									}
							}, {
									name: 'Bien',
									data: [json.data[0]["Solucion_Ofrecida_Bien"], json.data[0]["Actitud_Solucion_Bien"], json.data[0]["Tiempo_Respuesta_Bien"]],
									color: '#F7F131',
									point: {
										events: {
											click: function () {
												tabla_tickets_subcategoria(Id_Gestor, this.x, 3, "", "", "grafica_por_gestor");
											}
										}
									}
							}, {
									name: 'Muy Bien',
									data: [json.data[0]["Solucion_Ofrecida_Muy_Bien"], json.data[0]["Actitud_Solucion_Muy_Bien"], json.data[0]["Tiempo_Respuesta_Muy_Bien"]],
									color: '#B2EA31',
									point: {
										events: {
											click: function () {
												tabla_tickets_subcategoria(Id_Gestor, this.x, 2, "", "", "grafica_por_gestor");
											}
										}
									}
							}, {
									name: 'Excelente',
									data: [json.data[0]["Solucion_Ofrecida_Excelente"], json.data[0]["Actitud_Solucion_Excelente"], json.data[0]["Tiempo_Respuesta_Excelente"]],
									color: '#31D813',
									point: {
										events: {
											click: function () {
												tabla_tickets_subcategoria(Id_Gestor, this.x, 1, "", "", "grafica_por_gestor");
											}
										}
									}
							}],

							responsive: {
									rules: [{
											condition: {
													maxWidth: 500
											},
											chartOptions: {
													legend: {
															align: 'center',
															verticalAlign: 'bottom',
															layout: 'horizontal'
													},
													yAxis: {
															labels: {
																	align: 'left',
																	x: 0,
																	y: -5
															},
															title: {
																	text: null
															}
													},
													subtitle: {
															text: null
													},
													credits: {
															enabled: false
													}
											}
									}]
							}
					});
				}else{
					$("#div_grafica_por_area_calif").hide();
					$("#highcharts_Grafica_por_Reparto_Calif_Area").hide();
					mensajesalerta("Informaci&oacute;n", "No se encontraron Resultados", "info", "dark");
				}
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	
	}
	
	reclasificacion_ticket=function(ticket){

			$('#id_ticket').html(ticket);
			$("#error_ticket_reasignacion_Nombre_Ejecutante").html('');
			$("#error_ticket_reasignacion_Seccion").html('');
			$("#error_ticket_reasignacion_Id_Categoria").html('');
			$("#error_ticket_reasignacion_Id_Subcategoria").html('');
			$("#error_ticket_reasignacion_Id_Motivo_Aparente").html('');
			$("#error_ticket_reasignacion_Id_Motivo_Real").html('');

			$.ajax({
				url: '../poo/compartidos/ajax/datos_ticket_id.php',
				type: 'POST',
				dataType: 'JSON',
				cahce: false,
				data: {ticket: ticket},
				success:function(data){
						
					if(data[0].Estatus_Proceso == 4){
						$("#ticket_reasignacion_titulo").html(data[0].Titulo);
						$("#ticket_reasignacion_Desc_Motivo_Reporte").html(data[0].Desc_Motivo_Reporte);
						$("#ticket_reasignacion_acciones_realizadas").html(data[0].ComentarioCierre);

						$("#ticket_reasignacion_Nombre_Ejecutante").val(data[0].Nombre_Ejecutante);
						$("#ticket_reasignacion_titulo").prop( "enable", true );
						$("#ticket_reasignacion_Desc_Motivo_Reporte").prop( "enable", true );
						$("#ticket_reasignacion_Nombre_Ejecutante").prop( "disabled", false );
						$("#ticket_reasignacion_Seccion").prop( "disabled", false );
						$("#ticket_reasignacion_Id_Categoria").prop( "disabled", false );
						$("#ticket_reasignacion_Id_Subcategoria").prop( "disabled", false );
						$("#ticket_reasignacion_Id_Motivo_Aparente").prop( "disabled", false );
						$("#ticket_reasignacion_Id_Motivo_Real").prop( "disabled", false );
						$("#botonReasignacionUpdate").prop( "disabled", false );						

						var Seccion 						=data[0].Seccion;
						var Id_Categoria 				=data[0].Id_Categoria;
						var Id_Subcategoria			=data[0].Id_Subcategoria;
						var Id_Motivo_Aparente	=data[0].Id_Motivo_Aparente;
						var Id_Motivo_Real			=data[0].Id_Motivo_Real;
						var Id_Area 						=$("#idareasesion").val();
						var Fech_Espera_Cierre	=data[0].Fech_Espera_Cierre;
						var Fech_Cierre					=data[0].Fech_Cierre;
						var Fech_Seguimiento		=data[0].Fech_Seguimiento;

						$("#ticket_reasignacion_Fech_Espera_Cierre").html('<input type="date" class="form-control" id="ticket_reasignacion_Fech_Espera_Cierre" name="ticket_reasignacion_Fech_Espera_Cierre" min="'+Fech_Seguimiento+'" max="'+Fech_Cierre+'" value="'+Fech_Espera_Cierre+'">');

						$.ajax({
							url: '../poo/reporte_categoria_gestor/ajax/ajax_ejecutante_valor_original.php',
							type: 'POST',
							dataType: 'JSON',
							data: {Id_Area: Id_Area},
							success:function(data){
								$("#ticket_reasignacion_Nombre_Ejecutante").html(data);
							}
						});
						

						$.ajax({
							url: '../poo/reporte_categoria_gestor/ajax/ajax_seccion_valor_original.php',
							type: 'POST',
							dataType: 'JSON',
							data: {
											Id_Area:Id_Area,
											Seccion:Seccion
									},
							success:function(data){
								$("#ticket_reasignacion_Seccion").html(data);
							}
						});

						$.ajax({
							url: '../poo/reporte_categoria_gestor/ajax/ajax_categoria_valor_original.php',
							type: 'POST',
							dataType: 'JSON',
							data: {
											Seccion:Seccion,
											Id_Categoria:Id_Categoria
									},
							success:function(data){
								$("#ticket_reasignacion_Id_Categoria").html(data);
							}
						});

						$.ajax({
							url: '../poo/reporte_categoria_gestor/ajax/ajax_sub_categoria_valor_original.php',
							type: 'POST',
							dataType: 'JSON',
							data: {
											Id_Categoria:Id_Categoria,
											Id_Subcategoria:Id_Subcategoria
									},
							success:function(data){
								$("#ticket_reasignacion_Id_Subcategoria").html(data);
							}
						});

						$.ajax({
							url: '../poo/reporte_categoria_gestor/ajax/ajax_motivo_aparente_valor_original.php',
							type: 'POST',
							dataType: 'JSON',
							data: {
											Id_Area:Id_Area,
											Id_Motivo_Aparente:Id_Motivo_Aparente
									},
							success:function(data){
								$("#ticket_reasignacion_Id_Motivo_Aparente").html(data);
							}
						});

						$.ajax({
							url: '../poo/reporte_categoria_gestor/ajax/ajax_motivo_real_valor_original.php',
							type: 'POST',
							dataType: 'JSON',
							data: {
											Id_Area:Id_Area,
											Id_Motivo_Real:Id_Motivo_Real
									},
							success:function(data){
								$("#ticket_reasignacion_Id_Motivo_Real").html(data);
							}
						});

						}else{
							$("#ticket_reasignacion_Nombre_Ejecutante").val('');
							$("#ticket_reasignacion_titulo").prop( "enable", false );
							$("#ticket_reasignacion_Desc_Motivo_Reporte").prop( "enable", false );
							$("#ticket_reasignacion_Nombre_Ejecutante").prop( "disabled", true );
							$("#ticket_reasignacion_Seccion").prop( "disabled", true );
							$("#ticket_reasignacion_Id_Categoria").prop( "disabled", true );
							$("#ticket_reasignacion_Id_Subcategoria").prop( "disabled", true );
							$("#ticket_reasignacion_Id_Motivo_Aparente").prop( "disabled", true );
							$("#ticket_reasignacion_Id_Motivo_Real").prop( "disabled", true );
							$("#ticket_reasignacion_Fech_Espera_Cierre").html('');
							$("#botonReasignacionUpdate").prop( "disabled", true );
							
					}
				}
			});
		
		$("#Modal_tabla_reclasificacion_categoria").modal("show");
	}


$("#ticket_reasignacion_Seccion").change(function(){ 

		var Seccion=$(this).val(); 
		$("#ticket_reasignacion_Id_Subcategoria").html('');

		$.ajax({
				url: '../poo/reporte_categoria_gestor/ajax/ajax_categoria_id.php',
				type: 'POST',
				dataType: 'JSON',
				data: {
								Seccion:Seccion
						},
				success:function(data){
					$("#ticket_reasignacion_Id_Categoria").html(data);
				}
			});

});

$('#ticket_reasignacion_Id_Categoria').change(function(){
		var Id_Categoria=$(this).val();

				$.ajax({
				url: '../poo/reporte_categoria_gestor/ajax/ajax_sub_categoria_id.php',
				type: 'POST',
				dataType: 'JSON',
				data: {
								Id_Categoria:Id_Categoria
						},
				success:function(data){
					$("#ticket_reasignacion_Id_Subcategoria").html(data);
				}
			});

});

	botonReasignacionUpdate = function(){

		$("#error_ticket_reasignacion_Nombre_Ejecutante").html('');
		$("#error_ticket_reasignacion_Seccion").html('');
		$("#error_ticket_reasignacion_Id_Categoria").html('');
		$("#error_ticket_reasignacion_Id_Subcategoria").html('');
		$("#error_ticket_reasignacion_Id_Motivo_Aparente").html('');
		$("#error_ticket_reasignacion_Id_Motivo_Real").html('');

		var validado=true;
		var id_ticket 															= $('#id_ticket').text()
		var ticket_reasignacion_Nombre_Ejecutante   = $("#ticket_reasignacion_Nombre_Ejecutante").val();
		var ticket_reasignacion_Seccion 						=	$("#ticket_reasignacion_Seccion").val();
		var ticket_reasignacion_Id_Categoria				=	$("#ticket_reasignacion_Id_Categoria").val();
		var ticket_reasignacion_Id_Subcategoria 		= $("#ticket_reasignacion_Id_Subcategoria").val();
		var ticket_reasignacion_Id_Motivo_Aparente  =	$("#ticket_reasignacion_Id_Motivo_Aparente").val();
		var ticket_reasignacion_Id_Motivo_Real 			=	$("#ticket_reasignacion_Id_Motivo_Real").val();
		var ticket_reasignacion_Fech_Espera_Cierre  = $("#ticket_reasignacion_Fech_Espera_Cierre [type=date]").val();

		if(ticket_reasignacion_Seccion == null ){
		$("#ticket_reasignacion_Seccion").focus();
		$("#error_ticket_reasignacion_Seccion").html('Nombre Ejecutante: Campo Requerido');
		$("#error_ticket_reasignacion_Seccion").css({color:"red", fontSize: "12px"});
		validado=false;
		} else if(ticket_reasignacion_Id_Categoria == null ){
		$("#ticket_reasignacion_Id_Categoria").focus();
		$("#error_ticket_reasignacion_Id_Categoria").html('Categoría: Campo Requerido');
		$("#error_ticket_reasignacion_Id_Categoria").css({color:"red", fontSize: "12px"});
		validado=false;
		} else if(ticket_reasignacion_Id_Subcategoria == null ){
		$("#ticket_reasignacion_Id_Subcategoria").focus();
		$("#error_ticket_reasignacion_Id_Subcategoria").html('Sub Categoría: Campo Requerido');
		$("#error_ticket_reasignacion_Id_Subcategoria").css({color:"red", fontSize: "12px"});
		validado=false;
		} else if(ticket_reasignacion_Id_Motivo_Aparente == null ){
		$("#ticket_reasignacion_Id_Motivo_Aparente").focus();
		$("#error_ticket_reasignacion_Id_Motivo_Aparente").html('Motivo Aparente: Campo Requerido');
		$("#error_ticket_reasignacion_Id_Motivo_Aparente").css({color:"red", fontSize: "12px"});
		validado=false;
		} else if(ticket_reasignacion_Id_Motivo_Real == null ){
		$("#ticket_reasignacion_Id_Motivo_Real").focus();
		$("#error_ticket_reasignacion_Id_Motivo_Real").html('Motivo Real: Campo Requerido');
		$("#error_ticket_reasignacion_Id_Motivo_Real").css({color:"red", fontSize: "12px"});
		validado=false;
		} else if(ticket_reasignacion_Fech_Espera_Cierre == null ){
		$("#ticket_reasignacion_Fech_Espera_Cierre").focus();
		$("#error_ticket_reasignacion_Fech_Espera_Cierre").html('Fecha espera cierre: Campo Requerido');
		$("#error_ticket_reasignacion_Fech_Espera_Cierre").css({color:"red", fontSize: "12px"});
		validado=false;
		}

if(validado){

		$.ajax({
			url: '../poo/reporte_categoria_gestor/ajax/ajax_update_reasignacion.php',
			type: 'POST',
			dataType: 'JSON',
			cache: false,
			data: {
							id_ticket 															:id_ticket,
							ticket_reasignacion_Nombre_Ejecutante   :ticket_reasignacion_Nombre_Ejecutante,
							ticket_reasignacion_Seccion 						:ticket_reasignacion_Seccion,
							ticket_reasignacion_Id_Categoria				:ticket_reasignacion_Id_Categoria,
							ticket_reasignacion_Id_Subcategoria 		:ticket_reasignacion_Id_Subcategoria,
							ticket_reasignacion_Id_Motivo_Aparente 	:ticket_reasignacion_Id_Motivo_Aparente,
							ticket_reasignacion_Id_Motivo_Real 			:ticket_reasignacion_Id_Motivo_Real,
							ticket_reasignacion_Fech_Espera_Cierre	:ticket_reasignacion_Fech_Espera_Cierre,
				},
				success:function(data){
					console.log(data);
					$("#Modal_tabla_reclasificacion_categoria").modal("hide");
					$("#Modal_tabla_por_categoria").modal("hide");					
				},error: function(data){
					console.log(data);
					$("#Modal_tabla_reclasificacion_categoria").modal("hide");
					$("#Modal_tabla_por_categoria").modal("hide");	
				}
			});
		}
		
}

	ver_actividades=function(Id_Solicitud){
		$("#Desc_Motiv_Repor"+Id_Solicitud).show();
		$("#Ver_Act"+Id_Solicitud).hide();
		$("#Ocult_Act"+Id_Solicitud).show();
	}
	
	ocult_actividades=function(Id_Solicitud){
		$("#Desc_Motiv_Repor"+Id_Solicitud).hide();
		$("#Ver_Act"+Id_Solicitud).show();
		$("#Ocult_Act"+Id_Solicitud).hide();
	}
  });//ND

</script>
</body>
</html>