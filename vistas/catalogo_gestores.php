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
                   <h3 class="info-box-text">Alta Gestores</h3>
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
             <table  class="table table-bordered table-striped table-chs" id="displayGestores" width="100%">
               <thead>
                 <tr>
                   <th>No.</th>
				   				 <th>Sección</th>
                   <th>Tipo Gestor</th>
                   <th>Nombre Gestor</th>
                   <th>Edición</th>					
                 </tr>
               </thead>
               <!--
				<tbody>
                 <tr>
                   <td>1</td>
                   <td>Lorem ipsum</td>
                   <td>Lorem ipsum </td>
                   <td><span><i class="fa fa-pencil" aria-hidden="true"></i></span></td>
                 </tr>
               </tbody>
				-->
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
				<button type="button" class="btn chs"  >Solicitar soporte</button>
           </div>
       </div>
   </div>
 </div>
 <!-- /.row -->

      

    
    
    
<div class="modal fade modalchs" id="myModal" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header azul">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> Alta Gestor</h4>
      </div>
      <div class="modal-body">
		<input type="hidden" id="id_formula">	
        <input type="hidden" id="Id_Gestor">
				<form class="form-horizontal">
					<div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Usuarios</label>
            <div class="col-sm-8">
							<select id="numempleadoresguardo1" class="demo-default" placeholder="Usuarios" style="display:none"></select>
							<div id="gifcargandoaltausuarios1" style="display:none" align="center">
								 <img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
							</div>
						</div>
          </div>
					<div class="form-group"><br></div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Sección</label>
            <div class="col-sm-8">
							<select id="cmb_seccion" class="form-control" placeholder="Sección"></select>
            </div>
          </div>
          <div class="form-group"><br></div>
					<div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Tipo Gestor</label>
            <div class="col-sm-8">
							<select id="cmb_tipo_gestor" class="form-control" placeholder="Sección">
								<option value="-1">--Tipo Gestor--</option>
								<option value="1">Senior</option>
								<option value="2">Junior</option>
							</select>
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

<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>

<!-- File Input -->
<link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
<script src="../plugins/docsupport/standalone/selectize.js"></script>
<script src="../plugins/docsupport/index.js"></script>
<!---->

<script>



  $(document).ready(function(){
	
	cmb_secciones();
	function cmb_secciones() {
		var resultado=new Array();
		data={Id_Area:$("#idareasesion").val(),accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ticket_seccion/Siga_cat_ticket_seccionFacade.Class.php",false, data);
        $('#cmb_seccion').empty();
		if(resultado.totalCount>0){
			$('#cmb_seccion').append($('<option selected value="-1">', { value: "-1" }).text("--Sección--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{
				if (resultado.data[i].Id_Categoria != '') 			
				$('#cmb_seccion').append($('<option>', { value: resultado.data[i].Id_Seccion }).text(resultado.data[i].Desc_Seccion));
			}
		}else{
			$('#cmb_seccion').append($('<option selected value="-1">', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	usuarios_empleados_Asis_Esp();
	function usuarios_empleados_Asis_Esp(){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",
			data: {
				Estatus_Reg: '1',
				accion: 'consultar'
			},
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargandoaltausuarios1").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {

						var usuarios='';
						usuarios+='<option></option>';
						usuarios+='<optgroup label="Usuarios">';

						for (var i = 0; i < json.totalCount; i++) {
							usuarios+='<option value="'+json.data[i].Id_Usuario.trim()+'">'+json.data[i].No_Usuario.trim()+'-'+json.data[i].Nombre_Usuario.trim()+'</option>';
						}
						usuarios+='</optgroup>';
						$('#numempleadoresguardo1').html(usuarios);

						$("#gifcargandoaltausuarios1").hide();
						$("#numempleadoresguardo1").show();
							
						$('#numempleadoresguardo1').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargandoaltausuarios1").hide();
						$('#numempleadoresguardo1').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#numempleadoresguardo1').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}	
		
		
	//Guardar Registros
	$("#guardar").click(function () {
		var Agregar = true;
		var num_empleado="";
		var mensaje_error = "";
		var Id_Gestor=$("#Id_Gestor").val();
		var Id_Usuario=$("#usuariosesion").val();
		var Id_Area=$("#idareasesion").val();
		var nombre_empleado=$.trim($("#numempleadoresguardo1 option:selected" ).text());
		var num_emp=$("#numempleadoresguardo1").val();
		if(nombre_empleado!=""){
			nombre_empleado=nombre_empleado.split("-");
			if(nombre_empleado[0]!=""){
				num_empleado=nombre_empleado[0];
			}
		}
		var cmb_seccion=$.trim($("#cmb_seccion").val());
		var cmb_tipo_gestor=$.trim($("#cmb_tipo_gestor").val());
		
		var strDatos=""; 
		
		if (nombre_empleado.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar al gestor<br />";
		}
		
		if (cmb_seccion=="-1") {
			Agregar = false; 
			mensaje_error += " -Selecciona la Sección<br />";
		}
		
		if (cmb_tipo_gestor=="-1") {
			Agregar = false; 
			mensaje_error += " -Selecciona el tipo de gestor<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		
		if(Agregar)
		{
			strDatos = "Id_Area="+Id_Area; 
			strDatos += "&Id_Seccion="+cmb_seccion;
			strDatos += "&Tipo_Gestor="+cmb_tipo_gestor;
			strDatos += "&Id_Usuario="+num_emp;
			strDatos += "&Nombre_Empleado="+nombre_empleado[1];
				
			if(Id_Gestor.length <= 0){
				strDatos += "&Usr_Inser="+Id_Usuario;
				strDatos += "&Estatus_Reg=1";				
				strDatos += "&accion=guardar";
			}else{
				strDatos += "&Id_Gestor="+Id_Gestor;
				strDatos += "&Usr_Mod="+Id_Usuario;
				strDatos += "&Estatus_Reg=2";	
				strDatos += "&accion=guardar";
			}
			
		
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_cat_gestores/Siga_cat_gestoresFacade.Class.php",        
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
					$('#displayGestores').DataTable().ajax.reload();
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
			
		}
	});
	
	
	//Llenar Tabla Dinamicamente
	$('#displayGestores').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../fachadas/activos/siga_cat_gestores/Siga_cat_gestoresFacade.Class.php",
            "type": "POST",
						"data": {
							Id_Area:$("#idareasesion").val()
						}
        },
        "columns": [
			{ "data": "Id_Gestor", "visible": false},
			{ "data": "Desc_Seccion"},
			{ "data": "Tipo_Gestor"},
			{ "data": "Nombre_Empleado"},
			{
			    "data": function (obj) {
			        var edicion = '';
			        edicion += '<span onclick="pasarvalores(' + obj.Id_Gestor + ')"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
                    edicion += '<span onclick="pasarelimina(' + obj.Id_Gestor + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
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
		$("#Id_Gestor").val("");
		$("#cmb_seccion").val("-1");
		$("#cmb_tipo_gestor").val("-1");
		
		var Id_Empleado_Seguimiento=$.trim($("#numempleadoresguardo1").val());
		if(Id_Empleado_Seguimiento!=""){			
			if(Id_Empleado_Seguimiento.length > 0){
				var $select3 = $('#numempleadoresguardo1').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
				control3.enable();
			}
		}
	}	
	
	//Pasar Valores al Editar
	pasarvalores=function(id) {
		limpiarcampos();
        if (id != "") {
            $.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_cat_gestores/Siga_cat_gestoresFacade.Class.php",
                async: false,
                data: {
                    Id_Gestor: id,
                    accion: "consultar"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
                        $("#Id_Gestor").val(data.data[0].Id_Gestor);
												$("#cmb_seccion").val(data.data[0].Id_Seccion);
												$("#cmb_tipo_gestor").val(data.data[0].Tipo_Gestor);
												
												var $select3 = $('#numempleadoresguardo1').selectize({});	
												var control3 = $select3[0].selectize;
												control3.addItem(data.data[0].Id_Usuario);
												
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
							url: "../fachadas/activos/siga_cat_gestores/Siga_cat_gestoresFacade.Class.php",        
							async: false,
							data: {
								Id_Gestor: id,
								Estatus_Reg: '3',
								Usr_Mod: $("#usuariosesion").val(),
								accion: "guardar"
							},
							dataType: "html",
							beforeSend: function (xhr) {

							},
							success: function (datos) {
								var json;
								json = eval("(" + datos + ")"); //Parsear JSON
								mensajesalerta("&Eacute;xito", "Eliminado Correctamente.", "success", "dark");	
								$('#displayGestores').DataTable().ajax.reload();
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
	
  });

</script>
</body>
</html>
