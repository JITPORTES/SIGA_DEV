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
                   <h3 class="info-box-text">Alta Centro de Costos</h3>
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
             <table  class="table table-bordered table-striped table-chs" id="displayFormulas" width="100%">
               <thead>
                 <tr>
                   <th>Id Centro Costos</th>
									 <th>Descripción Centro de Costos</th>
									 <th>No. Centro Costos</th>
									 <th>Nombre Reporte</th>
                   <th>Clave</th>
									 <th>Nomenclatura</th>
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
        <h4 class="modal-title"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> alta Formula</h4>
      </div>
      <div class="modal-body">
		<input type="hidden" id="Id_Centros_de_costos">	
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Nombre Centro de Costos</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Desc_Centro_de_costos" maxlength="50">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">No. Centro de Costos</label>
            <div class="col-sm-8">
              <input type="text" class="form-control"  id="NoCentroCostos" maxlength="10" onKeyPress="return soloNumeros(event)">
            </div>
          </div>
					<div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Nombre Reporte</label>
            <div class="col-sm-8">
              <input type="text" class="form-control"  id="NombreReporte" maxlength="250">
            </div>
          </div>
					<div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Clave</label>
            <div class="col-sm-8">
              <input type="text" class="form-control"  id="Clave" maxlength="50">
            </div>
          </div>
					<div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Nomenclatura</label>
            <div class="col-sm-8">
              <input type="text" class="form-control"  id="Nomenclatura" maxlength="50">
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



  $(document).ready(function(){
	//Guardar Registros
	$("#guardar").click(function () {
			
		var Agregar = true;
		var mensaje_error = "";
		var Id_Usuario=$("#usuariosesion").val();
		var Id_Centros_de_costos=$("#Id_Centros_de_costos").val();
		var Desc_Centro_de_costos=$.trim($("#Desc_Centro_de_costos").val());
		var NoCentroCostos=$.trim($("#NoCentroCostos").val());
		var NombreReporte=$.trim($("#NombreReporte").val());
		var Clave=$.trim($("#Clave").val());
		var Nomenclatura=$.trim($("#Nomenclatura").val());
		var strDatos=""; 
		
		if (Desc_Centro_de_costos.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Nombre<br />";
		}
		
		if (NoCentroCostos.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el No., del centro de costos<br />";
		}
		
		if (NombreReporte.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el nombre del reporte<br />";
		}
		
		if (Clave.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la clave<br />";
		}
		
		if (Nomenclatura.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la nomenclatura<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar)
		{
			strDatos = "Desc_Centro_de_costos="+Desc_Centro_de_costos; 
			strDatos += "&NoCentroCostos="+NoCentroCostos;
			strDatos += "&NombreReporte="+NombreReporte;
			strDatos += "&Clave="+Clave;
			strDatos += "&Nomenclatura="+Nomenclatura;	
			strDatos += "&Id_Area=5";	

			
			if(Id_Centros_de_costos.length <= 0)
			{
				strDatos += "&Usr_Inser="+Id_Usuario;
				strDatos += "&Estatus_Reg=1";				
				strDatos += "&accion=guardar";
			}
			else
			{
				strDatos += "&Id_Centros_de_costos="+Id_Centros_de_costos;
				strDatos += "&Usr_Mod="+Id_Usuario;
				strDatos += "&Estatus_Reg=2";				
				strDatos += "&accion=guardar";
			}
		
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_cat_centro_de_costos/Siga_cat_centro_de_costosFacade.Class.php",        
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
					$('#displayFormulas').DataTable().ajax.reload();
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
	
	
	//Llenar Tabla Dinamicamente
	$('#displayFormulas').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../fachadas/activos/siga_cat_centro_de_costos/Siga_cat_centro_de_costosFacade.Class.php",
            "type": "POST"
        },
        "columns": [
			{ "data": "Id_Centros_de_costos", "visible": false},
			{ "data": "Desc_Centro_de_costos"},
			{ "data": "NoCentroCostos"},
			{ "data": "NombreReporte"},
			{ "data": "Clave"},
			{ "data": "Nomenclatura"},
			{
			    "data": function (obj) {
			        var edicion = '';
			        edicion += '<span onclick="pasarvalores(' + obj.Id_Centros_de_costos + ')"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
                    edicion += '<span onclick="pasarelimina(' + obj.Id_Centros_de_costos + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
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
		$("#Id_Centros_de_costos").val("");
		$("#Desc_Centro_de_costos").val("");
		$("#NoCentroCostos").val("");
		$("#NombreReporte").val("");
		$("#Clave").val("");
		$("#Nomenclatura").val("");
	}	
	
	//Pasar Valores al Editar
	pasarvalores=function(id) {
		limpiarcampos();
        if (id != "") {
            $.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_cat_centro_de_costos/Siga_cat_centro_de_costosFacade.Class.php",
                async: false,
                data: {
                    Id_Centros_de_costos: id,
                    accion: "consultar"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
                        $("#Id_Centros_de_costos").val(data.data[0].Id_Centros_de_costos);
												$("#Desc_Centro_de_costos").val(data.data[0].Desc_Centro_de_costos);
												$("#NoCentroCostos").val(data.data[0].NoCentroCostos);
												$("#NombreReporte").val(data.data[0].NombreReporte);
												$("#Clave").val(data.data[0].Clave);
												$("#Nomenclatura").val(data.data[0].Nomenclatura);
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
						var Id_Usuario=$("#usuariosesion").val();
						$.ajax({
							type: "POST",
							url: "../fachadas/activos/siga_cat_centro_de_costos/Siga_cat_centro_de_costosFacade.Class.php",        
							async: false,
							data: {
								Id_Centros_de_costos: id,
								Estatus_Reg: '3',
								Usr_Mod: Id_Usuario,
								accion: "guardar"
							},
							dataType: "html",
							beforeSend: function (xhr) {

							},
							success: function (datos) {
								var json;
								json = eval("(" + datos + ")"); //Parsear JSON
								mensajesalerta("&Eacute;xito", "Eliminado Correctamente.", "success", "dark");	
								$('#displayFormulas').DataTable().ajax.reload();
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
