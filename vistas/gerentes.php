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
              <a href="#" data-toggle="modal" data-target="#myModal">
                <span class="info-box-icon bg-aqua"><i class="fa fa-arrow-circle-o-up"></i></span>
                <div class="info-box-content">
                  <h3 class="info-box-text">Alta Gerentes1</h3>
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
            <div class="table-responsive">
            <table class="table table-bordered table-striped table-chs" id="displayINPC" width="100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Area</th>
                  <th>Nombre Gerente</th>
                  <th>Edición</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Id</td>
                  <td>TIC</td>
                  <td>Lic. Jaime Lezama Zavala</td>
                  <td>Botones</td>
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
        <h4 class="modal-title"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> alta gerentes</h4>
      </div>
      <div class="modal-body">
		<input type="hidden" id="Id_INPC">
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Area</label>
            <div class="col-sm-8">
                <select class="form-control" id="cmbareas">
                </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Nombre Geente</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Nom_Gerente">
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
  
  //Highcharts
  $(document).ready(function(){
	cargaareas();
    
    function cargaareas() {
		var resultado=new Array();
		data={Estatus_Reg: "1",accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_catareas/Siga_catareasFacade.Class.php",false, data);

		if(resultado.totalCount>0){
			$('#cmbareas').append($('<option>', { value: "-1" }).text("--Areas--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbareas').append($('<option>', { value: resultado.data[i].Id_Area }).text(resultado.data[i].Nom_Area));
			}
		}else{
			$('#cmbareas').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
      
    $("#guardar").click(function () {
        var areas=$("#cmbareas").val();
        var nom_gerente=$("#Nom_Gerente").val().trim();
        var Agregar = true;
		var mensaje_error = "";
        
        if (areas=="-1") {    
			Agregar = false; 
			mensaje_error += " -Falta el area<br/>";
		}
        
        if (nom_gerente.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Nombre del gerente<br />";
		}
        
        if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
        
        $.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_jefe_area/Siga_encargado_areaFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					//limpiarcampos();
					mensajesalerta("&Eacute;xito", "Guardado Correctamente.", "success", "dark");	
					//$('#myModal').modal('hide');
					//$('#displayFormulas').DataTable().ajax.reload();
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
        
    });
  });//ND

</script>

