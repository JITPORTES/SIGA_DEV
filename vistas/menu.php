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
              <a href="#" data-toggle="modal" data-target="#myModalMenu" onclick="limpiarcamposmenu()">
                <span class="info-box-icon bg-aqua"><i class="fa fa-arrow-circle-o-up"></i></span>
                <div class="info-box-content">
                  <h3 class="info-box-text">Alta Menu</h3>
                </div>
                <!-- /.info-box-content -->
              </a>
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box azul">
            <!-- Button trigger modal -->
              <a href="#" data-toggle="modal" data-target="#myModalSubmenu">
                <span class="info-box-icon bg-aqua"><i class="fa fa-arrow-circle-o-up"></i></span>
                <div class="info-box-content">
                  <h3 class="info-box-text">Alta Submenu</h3>
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

<!--Alta de Menu-->    
<div class="modal fade modalchs" id="myModalMenu">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header azul">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> alta menu</h4>
      </div>
      <div class="modal-body">
		<input type="hidden" id="Id_INPC">
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Aplicaci&oacute;n</label>
            <div class="col-sm-8">
              <select class="form-control" id="Cmb_ActF_MesA">
					<option>Activo Fijo</option>
					<option>Mesa de Ayuda</option>
				</select>
            </div>
          </div>
		  <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Con Submenu</label>
            <div class="col-sm-2">
              <select class="form-control" id="Cmb_Menu_Submenu">
				<option value="si">Si</option>
				<option value="no" selected>No</option>
			  </select>
            </div>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="Nombre_Menu" placeholder="Nombre Men&uacute;">
            </div>
          </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Icono</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Icono">
            </div>
        </div>
		<div class="form-group" id="url_archivo">
            <label for="inputEmail3" class="col-sm-3 control-label">Url Archivo</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="url_menu" >
            </div>
        </div>
		<div id="controlessubmenu" style="display:none">
			<div class="form-group" align="center">
				<label for="inputEmail3" class="col-sm-2 control-label"></label>
				<label>Submenus</label>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">Nom. Submenu-1</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="Nom_Submenu1">
				</div>
			</div>
			<div class="form-group" id="url_archivo">
				<label for="inputEmail3" class="col-sm-3 control-label">Url-1</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="Url_Submenu1" >
				</div>
			</div>
			<div class="form-group" align="center">
				<div class="col-sm-12">
					<hr style="display: block;margin-top: 0.5em; margin-bottom: 0.5em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;"></hr>
				</div>
			</div>
			<div id="Muestro_Agregados"></div>
			<div class="form-group" align="center">
				<div class="col-sm-12">
					<a href="#noir" onclick="Agregar_Mas()">Agregar mas</a>
				</div>
			</div>
        </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn chs" id="guardarmenu">Guardar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--Fin Alta Menu-->


<!--Alta de Submenu-->    
<div class="modal fade modalchs" id="myModalSubmenu">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header azul">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> alta submenu</h4>
      </div>
      <div class="modal-body">
		
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn chs" id="guardarsubmenu">Guardar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--Fin Alta Menu-->

<script>
  
  //Highcharts
$(document).ready(function(){
	var contadorsubmenu=1;
	$("#Cmb_Menu_Submenu").change(function() {
		var valor="";
		valor=$(this).val();
		if(valor=="no"){
			$("#url_archivo").show();
			//Limpiamos los div
			$("#controlessubmenu").hide();
			$("#Muestro_Agregados").html("");
			$("#url_menu").val("");
			//Iniciamos el contador
			contadorsubmenu=1;
			$("#Nom_Submenu1").val("");
			$("#Url_Submenu1").val("");
		}
		else{
			$("#url_archivo").hide();
			$("#controlessubmenu").show();
		}
	});
	
	
	Agregar_Mas=function(){
		$("#quitarmas"+(contadorsubmenu)+"").html("");
		contadorsubmenu=contadorsubmenu+1;
		
		var contenido="";
		contenido+='<div id="Contenido_Submenu'+contadorsubmenu+'">'
		contenido+='	<div class="form-group">';
        contenido+='	    <label for="inputEmail3" class="col-sm-3 control-label" id="lblnomsubmenu'+contadorsubmenu+'">Nom. Submenu-'+contadorsubmenu+'</label>';
        contenido+='	    <div class="col-sm-8">';
        contenido+='	      <input type="text" class="form-control" id="Nom_Submenu'+contadorsubmenu+'">';
        contenido+='	    </div>';
		contenido+='		<div class="col-sm-0" id="quitarmas'+contadorsubmenu+'"><a href="#" onclick="quitarmas(\''+contadorsubmenu+'\')">Quitar</a></div>';
		contenido+='	</div>';
		contenido+='	<div class="form-group" id="url_archivo">';
        contenido+='	    <label for="inputEmail3" class="col-sm-3 control-label" id="lblurlsubmenu'+contadorsubmenu+'">Url-'+contadorsubmenu+'</label>';
        contenido+='	    <div class="col-sm-8">';
        contenido+='	      <input type="text" class="form-control" id="Url_Submenu'+contadorsubmenu+'" >';
        contenido+='	    </div>';
        contenido+='	</div>';
		contenido+='	<div class="form-group" align="center">';
        contenido+='	    <div class="col-sm-12">';
		contenido+='			<hr style="display: block;margin-top: 0.5em; margin-bottom: 0.5em; margin-left: auto; margin-right: auto; border-style: inset; border-width: 1px;"></hr>';
		contenido+='		</div>';
        contenido+='	</div>';
		contenido+='</div>';
		jQuery("#Muestro_Agregados").append(contenido);
		//$("#Muestro_Agregados").html();
	}
	
	
	quitarmas=function(contador)
	{
		contadorsubmenu=contadorsubmenu-1;
		$("#Contenido_Submenu"+contador+"").remove();
		$("#quitarmas"+(contadorsubmenu)+"").html('<a href="#" onclick="quitarmas(\''+contadorsubmenu+'\')">Quitar</a>');
	}
	
	limpiarcamposmenu=function()
	{
		$("#url_archivo").show();
		$("#controlessubmenu").hide();
		$("#Muestro_Agregados").html("");
		$("#url_menu").val("");
		$("#Nombre_Menu").val("");
		$("#Intvalor").val("");
		/////////////////////////////
		$("#Nom_Submenu1").val("");
		$("#Url_Submenu1").val("");
		$("#Cmb_Menu_Submenu").val("no");
		contadorsubmenu=1;
	}	
	
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//Guardar Registros
	$("#guardarmenu").click(function () {
			
		var Agregar = true;
		var mensaje_error = "";
		
		var Cmb_ActF_MesA=$("#Cmb_ActF_MesA").val();
		var Cmb_Menu_Submenu=$("#Cmb_Menu_Submenu").val();
		var Nombre_Menu=$.trim($("#Nombre_Menu").val());
		var Icono=$.trim($("#Icono").val());
		
		if(Nombre_Menu.length<=0){
			Agregar = false; 
			mensaje_error += " -Agrega el Nombre del Menu<br />";
		}
		
		if(Icono.length<=0){
			Agregar = false; 
			mensaje_error += " -Agrega el Icono del Menu<br />";
		}
		
		
		if(Cmb_Menu_Submenu=="no"){
			
		}else{
		}
		
		//var Anio=$.trim($("#Intanio").val());
		//var Mes=$.trim($("#Intmes").val());
		//var Valor=$.trim($("#Intvalor").val());
		//var strDatos=""; 
		
		//if (Anio.length <= 0) {
		//	Agregar = false; 
		//	mensaje_error += " -Falta agregar el A&ntilde;o<br />";
		//}
		//
		//if (Mes.length <= 0) {
		//	Agregar = false; 
		//	mensaje_error += " -Falta agregar el Mes<br />";
		//}
		//
		//if (Valor.length <= 0) {
		//	Agregar = false; 
		//	mensaje_error += " -Falta agregar el Valor<br />";
		//}
		//
		//if (!Agregar) {
		//	mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		//}
		//
		//if(Agregar)
		//{
		//	strDatos = "Anio="+Anio; 
		//	strDatos += "&Mes="+Mes;
		//	strDatos += "&Valor="+Valor;
		//		
		//	if(Id_inpc.length <= 0)
		//	{
		//		strDatos += "&Usr_Inser=pruinser";
		//		strDatos += "&Estatus_Reg=1";				
		//		strDatos += "&accion=guardar";
		//	}
		//	else
		//	{
		//		strDatos += "&Id_INPC="+Id_inpc;
		//		strDatos += "&Usr_Mod=prumod";
		//		strDatos += "&Estatus_Reg=2";				
		//		strDatos += "&accion=guardar";
		//	}
		//
		//	$.ajax({
		//		type: "POST",
		//		url: "../fachadas/activos/inpc/InpcFacade.Class.php",        
		//		async: false,
		//		data: strDatos,
		//		dataType: "html",
		//		beforeSend: function (xhr) {
        //
		//		},
		//		success: function (datos) {
		//			var json;
		//			json = eval("(" + datos + ")"); //Parsear JSON
		//			limpiarcampos();
		//			mensajesalerta("&Eacute;xito", "Guardado Correctamente.", "success", "dark");	
		//			$('#myModalMenu').modal('hide');
		//			$('#displayINPC').DataTable().ajax.reload();
		//			
		//		},
		//		error: function () {
		//			mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
		//		}
		//	});
		//}
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
						$('#myModalMenu').modal('show');
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

