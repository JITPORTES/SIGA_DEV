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
                   <h3 class="info-box-text">Alta Fórmulas</h3>
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
                   <th>No.</th>
					<th>Nombre</th>
                   <th>Formula</th>
                   <th>Descripción</th>
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
		<input type="hidden" id="id_formula">	
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Nombre</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="StrNombre">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Fórmula</label>
            <div class="col-sm-8">
              <textarea rows="6" class="form-control" placeholder="" id="str_Formula"></textarea>
            </div>
          </div>
            
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Descripción</label>
            <div class="col-sm-8">
              <textarea rows="4" class="form-control" placeholder=" (150 Caracteres)" id="str_Desc"></textarea>
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
		var id_formula=$("#id_formula").val();
		var Nombre=$.trim($("#StrNombre").val());
		var Formula=$.trim($("#str_Formula").val());
		var Descripcion=$.trim($("#str_Desc").val());
		var strDatos=""; 
		
		if (Nombre.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Nombre de la F&oacute;rmula<br />";
		}
		
		if (Formula.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la F&oacute;rmula<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar)
		{
			strDatos = "Nombre="+Nombre; 
			strDatos += "&Formula="+Formula;
			strDatos += "&Descripcion="+Descripcion;
				
			if(id_formula.length <= 0)
			{
				strDatos += "&Usr_Inser=pruinser";
				strDatos += "&Estatus_Reg=1";				
				strDatos += "&accion=guardar";
			}
			else
			{
				strDatos += "&id_formula="+id_formula;
				strDatos += "&Usr_Mod=prumod";
				strDatos += "&Estatus_Reg=2";				
				strDatos += "&accion=guardar";
			}
		
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/formulas/FormulasFacade.Class.php",        
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
            "url": "../fachadas/activos/formulas/FormulasFacade.Class.php",
            "type": "POST"
        },
        "columns": [
			{ "data": "id_formula", "visible": false},
			{ "data": "Nombre"},
			{ "data": "Formula"},
			{ "data": "Descripcion"},
			{
			    "data": function (obj) {
			        var edicion = '';
			        edicion += '<span onclick="pasarvalores(' + obj.id_formula + ')"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
                    edicion += '<span onclick="pasarelimina(' + obj.id_formula + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
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
		$("#id_formula").val("");
		$("#StrNombre").val("");
		$("#str_Formula").val("");
		$("#str_Desc").val("");
	}	
	
	//Pasar Valores al Editar
	pasarvalores=function(id) {
		limpiarcampos();
        if (id != "") {
            $.ajax({
                type: "POST",
                url: "../fachadas/activos/formulas/FormulasFacade.Class.php",
                async: false,
                data: {
                    id_formula: id,
                    accion: "consultar"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
                        $("#id_formula").val(data.data[0].id_formula);
						$("#StrNombre").val(data.data[0].Nombre);
						$("#str_Formula").val(data.data[0].Formula);
						$("#str_Desc").val(data.data[0].Descripcion);
						
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
							url: "../fachadas/activos/formulas/FormulasFacade.Class.php",        
							async: false,
							data: {
								id_formula: id,
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
