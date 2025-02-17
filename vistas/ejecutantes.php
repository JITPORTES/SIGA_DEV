<!-- Main row -->
<div class="row">
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- nuevo -->
    <div role="tabpanel" class="tab-pane active" id="nuevo">
    
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box azul">
            <!-- Button trigger modal -->
              <a href="#" data-toggle="modal" data-target="#myModal" onclick="limpiarcampos()">
                <span class="info-box-icon bg-aqua"><i class="fa fa-arrow-circle-o-up"></i></span>
                <div class="info-box-content">
                  <h3 class="info-box-text">Alta Ejecutantes</h3>
                </div>
                <!-- /.info-box-content -->
              </a>
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>


        </div>
      </div>
      <!-- /.row -->
      
      <div class="col-md-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive" id="tabla_ejecutantes">
            
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
        <h4 class="modal-title"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> Alta Ejecutantes</h4>
      </div>
      <div class="modal-body">
			<input type="hidden" id="Id_Ejecutante">
        <form class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3 control-label">Nombre Completo</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Nombre_Completo" placeholder="Nombre Completo">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn chs" id="guardar">Guardar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script src="../js/Funciones.js"></script>
<script>
  

  $(document).ready(function(){
		limpiarcampos=function(){
			$("#Id_Ejecutante").val("");
			$("#Nombre_Completo").val("");
			$("#guardar").html("Guardar");
		}
     
    $("#guardar").click(function () {
				var Id_Ejecutante=$("#Id_Ejecutante").val();
				var Id_Usuario=$("#usuariosesion").val();
        var Id_Area=$("#idareasesion").val();
        var Nombre_Completo=$.trim($("#Nombre_Completo").val());
        var Agregar = true;
				var mensaje_error = "";
        var strDatos={};
        if (Nombre_Completo.length<=0) {    
					Agregar = false; 
					mensaje_error += " -Agrega el Nombre<br/>";
				}
       
        if (!Agregar) {
					mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
				}
        
				if(Agregar){
					if(Id_Ejecutante==""){
						strDatos.Id_Area=Id_Area;
						strDatos.Nombre_Completo=Nombre_Completo;
						strDatos.Usr_Inser=Id_Usuario;
						strDatos.Estatus_Reg="1";
						strDatos.accion="guardar";
					}else{
						strDatos.Id_Ejecutante=Id_Ejecutante;
						strDatos.Id_Area=Id_Area;
						strDatos.Nombre_Completo=Nombre_Completo;
						strDatos.Usr_Mod=Id_Usuario;
						strDatos.Estatus_Reg="2";
						strDatos.accion="guardar";
					}
					
					
					$.ajax({
						type: "POST",
						encoding:"UTF-8",
						url: "../fachadas/activos/siga_cat_ejecutantes/Siga_cat_ejecutantesFacade.Class.php",        
						async: false,
						data: strDatos,
						dataType: "html",
						beforeSend: function (xhr) {

						},
						success: function (datos) {
							var json;
							json = eval("(" + datos + ")"); //Parsear JSON
							limpiarcampos();
							mensajesalerta("&Eacute;xito", "Guardado Correctamente.", "success", "dark");	
							$('#myModal').modal('hide');
							tabla_ejecutantes();
							
						},
						error: function () {
							mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
						}
					});
				}
        
    });
  
		tabla_ejecutantes();
		function tabla_ejecutantes(){
			var tabla="";
			tabla+="	<table class='table table-bordered' id='dataTable'>";
			tabla+="		<thead>";
			tabla+="			<tr>";
			tabla+="				<th>Opciones</th>";
			tabla+="				<th>Nombre Completo</th>";
			tabla+="			</tr>";
			tabla+="		</thead>";
			var resultado=new Array();
			data={
				Id_Area: $("#idareasesion").val(),
				accion: "consultar"
			};
			resultado=cargo_cmb("../fachadas/activos/siga_cat_ejecutantes/Siga_cat_ejecutantesFacade.Class.php",false, data);
			if(resultado.totalCount>0){
			tabla+="		<tbody>";
				for(var i = 0; i < resultado.totalCount; i++){
					tabla+="			<tr>";
					tabla+='				<td>';					
					tabla+='						<a class="green" onclick="pasarvalores('+resultado.data[i].Id_Ejecutante+')"  title="Editar" href="#noir">';
					tabla+='							<i class="ace-icon fa fa-pencil bigger-130"></i>';
					tabla+='						</a>';
          tabla+='						<a class="red" onclick="eliminar('+resultado.data[i].Id_Ejecutante+')" title="Eliminar" href="#noir">';
					tabla+='							<i class="ace-icon fa fa-trash-o bigger-130"></i>';
					tabla+='						</a>';
					tabla+="				<td>"+resultado.data[i].Nombre_Completo+"</td>";
					tabla+="			</tr>";
					
				}
			tabla+="		</tbody>";	
			}else{
				
			}
			tabla+="	</table>";
		
			
			$("#tabla_ejecutantes").html(tabla);
		
		}
	
		pasarvalores=function(id) {
			limpiarcampos();
			if (id != "") {
				$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_cat_ejecutantes/Siga_cat_ejecutantesFacade.Class.php", 
					async: false,
					data: {
						Id_Ejecutante: id,
						accion: "consultar"
					},
					dataType: "html",
					beforeSend: function (xhr) {

					},
					success: function (data) {
						data = eval("(" + data + ")");
						if (data.totalCount > 0) {			
							$("#Id_Ejecutante").val(data.data[0].Id_Ejecutante);
							$("#Nombre_Completo").val(data.data[0].Nombre_Completo);
							$("#Nombre_Completo").focus();
							$("#guardar").html("Editar");
							$('#myModal').modal('show');
						}
					},
					error: function () {
						alert("Ocurrio un error al consultar.");
					}
				});
			}
		}
		
		eliminar=function(Id_Ejecutante){
			if(Id_Ejecutante!=""){
				var strDatos={};
				var Id_Usuario=$("#usuariosesion").val();
				
				strDatos.Id_Ejecutante=Id_Ejecutante;
				strDatos.Usr_Mod=Id_Usuario;
				strDatos.Estatus_Reg="3";
				strDatos.accion="baja";			

				var bool=confirm("Esta seguro de eliminar el Registro.");
				if(bool){
					$.ajax({
						type: "POST",
						url: "../fachadas/activos/siga_cat_ejecutantes/Siga_cat_ejecutantesFacade.Class.php",        
						async: false,
						data: strDatos,
						dataType: "html",
						beforeSend: function (xhr) {

						},
						success: function (datos) {
							var json;
							json = eval("(" + datos + ")"); //Parsear JSON
							if(json.totalCount==0){
								limpiarcampos();
								alert("Eliminado Correctamente.");	
								tabla_ejecutantes();
							}else{
								alert(json.text);
							}
							
							
						},
						error: function () {
							alert("currio un error al guardar.");
						}
					});
				}
			}
			
		}
	});

</script>

