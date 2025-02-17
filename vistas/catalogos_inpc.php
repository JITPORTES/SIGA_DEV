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
                  <h3 class="info-box-text">Alta INPC</h3>
                </div>
                <!-- /.info-box-content -->
              </a>
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box verde">
              <a href="mistickets-tic.html">
                <span class="info-box-icon bg-green"><i class="fa fa-arrow-circle-o-down"></i></span>
                <div class="info-box-content">
                  <h3 class="info-box-text">Baja INPC</h3>
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
                  <th>No.</th>
                  <th>Año</th>
                  <th>Mes</th>
                  <th>Valor</th>
                  <th>Edición</th>
                </tr>
              </thead>
              
            </table>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div><!-- tab-panel -->
            
    <div class="row">
      <div class="col-md-7 text-right" style="margin-top:15px;">
        <button type="button" class="btn chs">Solicitar soporte</button>
      </div>
    </div>
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
        <h4 class="modal-title"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> alta INPC</h4>
      </div>
      <div class="modal-body">
		<input type="hidden" id="Id_INPC">
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Año</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Intanio" onKeyPress="return soloNumeros(event)">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Mes</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Intmes" onKeyPress="return soloNumeros(event)">
            </div>
          </div>
            
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Valor</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Intvalor" >
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


<script>
  
  //Highcharts
  $(document).ready(function(){
	$("#M_Inpc").addClass("active");
	
	//Guardar Registros
	$("#guardar").click(function () {
			
		var Agregar = true;
		var mensaje_error = "";
		var Id_inpc=$("#Id_INPC").val();
		var Anio=$.trim($("#Intanio").val());
		var Mes=$.trim($("#Intmes").val());
		var Valor=$.trim($("#Intvalor").val());
		var strDatos=""; 
		
		if (Anio.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el A&ntilde;o<br />";
		}
		
		if (Mes.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Mes<br />";
		}
		
		if (Valor.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Valor<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		if(Agregar)
		{
			strDatos = "Anio="+Anio; 
			strDatos += "&Mes="+Mes;
			strDatos += "&Valor="+Valor;
				
			if(Id_inpc.length <= 0)
			{
				strDatos += "&Usr_Inser=pruinser";
				strDatos += "&Estatus_Reg=1";				
				strDatos += "&accion=guardar";
			}
			else
			{
				strDatos += "&Id_INPC="+Id_inpc;
				strDatos += "&Usr_Mod=prumod";
				strDatos += "&Estatus_Reg=2";				
				strDatos += "&accion=guardar";
			}
		
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/inpc/InpcFacade.Class.php",        
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
					$('#displayINPC').DataTable().ajax.reload();
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
	
	//Llenar Tabla Dinamicamente
	$('#displayINPC').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../fachadas/activos/inpc/InpcFacade.Class.php",
            "type": "POST"
        },
        "columns": [
			{ "data": "Id_INPC", "visible": false},
			{ "data": "Anio"},
			{ "data": "Mes"},
			{ "data": "Valor"},
			{
			    "data": function (obj) {
			        var edicion = '';
			        edicion += '<span onclick="pasarvalores(' + obj.Id_INPC + ')"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
                    edicion += '<span onclick="pasarelimina(' + obj.Id_INPC + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
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
	
	limpiarcampos=function()
	{
		$("#Id_INPC").val("");
		$("#Intanio").val("");
		$("#Intmes").val("");
		$("#Intvalor").val("");
	}	
	
	//Pasar Valores al Editar
	pasarvalores=function(id) {
		limpiarcampos();
        if (id != "") {
            $.ajax({
                type: "POST",
                url: "../fachadas/activos/inpc/InpcFacade.Class.php",
                async: false,
                data: {
                    Id_INPC: id,
                    accion: "consultar"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
                        $("#Id_INPC").val(data.data[0].Id_INPC);
						$("#Intanio").val(data.data[0].Anio);
						$("#Intmes").val(data.data[0].Mes);
						$("#Intvalor").val(data.data[0].Valor);
						$('#myModal').modal('show');
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
	
    
  });//ND

</script>

