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
                   <h3 class="info-box-text">Generar Cat&aacute;logos</h3>
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
             <table  class="table table-bordered table-striped table-chs" id="displayGenerarCat" width="100%">
               <thead>
                 <tr>
                   <th>No.</th>
					         <th>Tabla</th>
                   <th>Id Campo</th>
                   <th>Nombre Campo</th>
                   <th>Descripci&oacute;n</th>					
                   <th>Area</th>  
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
 </div>
 <!-- /.row -->

      

<div class="modal fade modalchs" id="myModal" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header azul">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i>Generar Cat&aacute;logos</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Areas</label>
            <div class="col-sm-7">
              <select class="form-control"  id="cmbareas">
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Nombre tabla</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="Nom_Tabla" placeholder="siga_(Nombre Tabla)">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Nombre (Id Campo)</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="Nom_Id_Campo">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Nombre (Desc Campo):</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="Nom_Desc_Campo">
            </div>
          </div>
            
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Descripción:</label>
            <div class="col-sm-7">
              <textarea rows="4" class="form-control" placeholder=" (150 Caracteres)" id="Descripcion"></textarea>
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
    cargaareas();	

    function cargaareas() {
        $.post('../fachadas/activos/siga_catareas/Siga_catareasFacade.Class.php', {
            accion: "consultar"
        }, function (data) {
            if (data != "") {
                data = eval("(" + data + ")");
                var totalCount = data.totalCount;
                if (totalCount > 0) {
                    for (var i = 0; i < totalCount; i++) {
                        $('#cmbareas').append($('<option>', { value: data.data[i].Id_Area }).text(data.data[i].Nom_Area));
                    }
                } else {
                    $('#cmbareas').append($('<option>', { value: "" }).text("Sin resultados"));
                }
            } else {
                $('#cmbareas').append($('<option>', { value: "" }).text("Sin resultados"));
            }
        });
    }; 

	//Guardar Registros
	$("#guardar").click(function () {
			
		var Agregar = true;
		var mensaje_error = "";
		var usuariosesion=$("#usuariosesion").val();
		var cmbareas=$("#cmbareas").val();
		var Nom_Tabla=$.trim($("#Nom_Tabla").val());
		var Nom_Id_Campo=$.trim($("#Nom_Id_Campo").val());
		var Nom_Desc_Campo=$.trim($("#Nom_Desc_Campo").val());
		var Descripcion=$.trim($("#Descripcion").val());
		var strDatos=""; 
		

		if (cmbareas < 0) {
			Agregar = false; 
			mensaje_error += " -Selecciona un area<br />";
		}

		if (Nom_Tabla.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Nombre de la Tabla<br />";
		}
		
		if (Nom_Id_Campo.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Nombre del Id de la Tabla<br />";
		}

    if (Nom_Desc_Campo.length <= 0) {
      Agregar = false; 
      mensaje_error += " -Falta agregar el Nombre de la Descripción de la Tabla<br />";
    }

    if ((Nom_Id_Campo.length > 0) && (Nom_Desc_Campo.length > 0)){
      if (Nom_Desc_Campo==Nom_Id_Campo) {
        Agregar = false;
        mensaje_error += " -El id del campo no se debe de llamar igual que el nombre del campo<br />";
      }
		}
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar)
		{
			strDatos += "&Id_Area="+cmbareas;
			strDatos += "&Nom_Tabla="+Nom_Tabla;
			strDatos += "&Nom_Id_Campo="+Nom_Id_Campo;
			strDatos += "&Nom_Desc_Campo="+Nom_Desc_Campo;
			strDatos += "&Descripcion="+Descripcion;				
			strDatos += "&Usr_Inser="+usuariosesion;
			strDatos += "&accion=guardar";
		
		
			$.ajax({
				type: "POST",
				encoding:"UTF-8",
				url: "../fachadas/activos/siga_cat_catalogos/Siga_cat_catalogosFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					
					if(json.totalCount>0){
						mensajesalerta("&Eacute;xito", json.mensaje, "success", "dark");
					}else{
						mensajesalerta("", json.mensaje, "error", "dark");  
					}
					$('#myModal').modal('hide');
					limpiarcampos();
					$('#displayGenerarCat').DataTable().ajax.reload();	
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
	
	
  limpiarcampos=function()
  {
    $("#Nom_Tabla").val("");
    $("#Nom_Id_Campo").val("");
    $("#Nom_Desc_Campo").val("");
    $("#Descripcion").val("");
  }

  //Llenar Tabla Dinamicamente
	$('#displayGenerarCat').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../fachadas/activos/siga_cat_catalogos/Siga_cat_catalogosFacade.Class.php",
            "type": "POST"
        },
        "columns": [
			{ "data": "Id_Catalogo", "visible": false},
			{ "data": "Nom_Tabla"},
			{ "data": "Nom_Id_Campo"},
			{ "data": "Nom_Desc_Campo"},
      { "data": "Descripcion"},
		  { "data": "Nom_Area"}
    	
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
                url: "../../fachadas/activos/formulas/FormulasFacade.Class.php",
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
							url: "../../fachadas/activos/formulas/FormulasFacade.Class.php",        
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
								$('#displayGenerarCat').DataTable().ajax.reload();
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
