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
                   <h3 class="info-box-text">Alta Cat&aacute;logos</h3>
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
				   <th>Edici&oacute;n</th> 				   
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
        <h4 class="modal-title"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i>Alta Cat&aacute;logos</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
			<input type="hidden" id="Id_Campoedit">
            <label for="inputEmail3" class="col-sm-4 control-label">Areas</label>
            <div class="col-sm-7">
              <select class="form-control"  id="cmbareas">
                <option value="-1">--Selecciona un area--</option>
              </select>
            </div>
          </div>
          <div class="form-group" id="idmuestrocmbtabla" style="display:none">
            <label for="inputEmail3" class="col-sm-4 control-label">Tablas</label>
            <div class="col-sm-7">
              <select class="form-control"  id="cmbtablas">
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">Nombre (Desc Campo):</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="Nom_Desc_Campo">
            </div>
          </div>
          <div align="center">
			<button type="button" class="btn chs" id="guardar">Guardar</button>
			<button type="button" class="btn chs" onclick="limpiarcampos()">Limpiar</button>
		  </div>
		  <div class="form-group">
			<div class="col-sm-10 col-sm-offset-1" id="muestrotabla"></div>
          </div>  
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>



<script>



  $(document).ready(function(){
    cargaareas();	
	
	//Funcion change combobox areas
    $("#cmbareas").change(function() {
	  $("#muestrotabla").html("");	
      var Id_Area=$("#cmbareas").val();
      //Si el valor del combobox areas es -1 oculta la tabla dinamica de catalogos
	  if(Id_Area!="-1")
      {
        $("#idmuestrocmbtabla").show();
        $("#cmbtablas").html("");
		//Dependiendo del area que se selecciona cargara automaticamente el combobox tablas
        cargatablas(Id_Area,"");
      }else{
        $("#idmuestrocmbtabla").hide();
      }
    
    });

	//Funcion change combobox tablas
    $("#cmbtablas").change(function() {
	  //Obtenemos el id del combobox seleccionado	
      var Id_tabla=$("#cmbtablas").val();
	  //Obtenemos el texto del combobox seleccionado
      Nom_Tabla = $('#cmbtablas option:selected').text();  

	  
      if(Id_tabla!="-1"){
        //Dependiendo de la tabla que selecionamos del combobox tablas, mostrara los registros con estatus 1 y 2 
		muestrotablacattablas(Id_tabla, Nom_Tabla);        
      }else{
		//Si no limpia el div en donde se muestra la tabla dinamica y limpia el campo descripcion
        $("#muestrotabla").html("");
		$("#Nom_Desc_Campo").html("");
      }  
    });
	
	//Funcion para cargar el combobox areas
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
    }
	
	//Funcion para cargar el combobox tablas en donde pasamos como parametros el id del area y el id de la tabla de catalogo siga_cat_catalogos
    function cargatablas(Id_Area, Id_Catalogo) {
        $("cmbtablas").html("");
		$("#Nom_Desc_Campo").val("");
        $.post('../fachadas/activos/siga_cat_catalogos/Siga_cat_catalogosFacade.Class.php', {
            Id_Area:Id_Area,
            accion: "consultar"
        }, function (data) {
            if (data != "") {
                data = eval("(" + data + ")");
                var totalCount = data.totalCount;
                if (totalCount > 0) {
                    $('#cmbtablas').append($('<option>', { value: "-1" }).text("--Selecciona una tabla--"));
                    for (var i = 0; i < totalCount; i++) {
                        $('#cmbtablas').append($('<option>', { value: data.data[i].Id_Catalogo }).text(data.data[i].Nom_Tabla));
                    }
					if(Id_Catalogo!=""){
						$("#cmbtablas").val(Id_Catalogo);
					}
				} else {
                    $('#cmbtablas').append($('<option>', { value: "-1" }).text("Sin Tablas"));
                    $("#Nom_Desc_Campo").val("");
                }
            } else {
                $('#cmbtablas').append($('<option>', { value: "-1" }).text("Sin Tablas"));
            }
        });
    } 
	
	//Funcion para mostrar la tabla dinamica en donde recibe como parametros el Id de la tabla catalogos y el nombbre de la tabla, elegidos por el combobox
	function muestrotablacattablas(Id_Catalogo, Nom_Tabla)
	{
	  $.ajax({
        type: "POST",
        encoding:"UTF-8",
        url: "../fachadas/activos/siga_cat_catalogos/Siga_cat_catalogosFacade.Class.php",        
        async: false,
        data: {
          Id_Catalogo:Id_Catalogo,
          accion:"consultartablas"
        },
        dataType: "html",
        beforeSend: function (xhr) {
      
        },
        success: function (datos) {
          var json;
		  var tabla="";
          json = eval("(" + datos + ")"); //Parsear JSON
          
          if(json.totalCount>0){
			tabla+='<div align="center"><strong>'+Nom_Tabla+'</strong></div>';
			tabla+='<table width="100%">';
			tabla+='	<thead>';
			tabla+='		<tr>';
			tabla+='			<th width="10"><strong>Id</strong></th>';
			tabla+='			<th width="60"><strong>Campo</strong></th>';
			tabla+='			<th width="40"><div align="center"><strong>Edici&oacute;n</strong></div></th>';
			tabla+='		</tr>';
			tabla+='	</thead>';
			tabla+='	<tbody>';
			for(var i = 0; i < json.totalCount; i++){
				tabla+='<tr style="border-bottom: #1B3F90 1px solid; ">';
				tabla+='	<td>'+json.data[i].Id_Campo+'</td>';
				tabla+='	<td>'+json.data[i].DescCampo+'</td>';
				tabla+='	<td align="center"><span onclick="pasarvalores(\''+json.data[i].Id_Campo+'\', \''+json.data[i].DescCampo+'\', \''+json.data[i].Id_Catalogo+'\', \''+json.data[i].Id_Area+'\')"><i class="fa fa-pencil" aria-hidden="true"></i></span>';
				tabla+='	<span onclick="pasarelimina(\''+json.data[i].Id_Campo+'\', \''+json.data[i].Id_Catalogo+'\')"><i class="fa fa-trash" aria-hidden="true"></i></span></td>';
				tabla+='</tr>';
			}
			tabla+='	</tbody>';	
			tabla+='</table>';
          }else{
			mensajesalerta("", json.mensaje, "error", "dark"); 
		  }
		  
		  $("#muestrotabla").html(tabla);
        },
        error: function () {
          mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
        }
      });
	}  
	//Guardar y Modificar Registros
	$("#guardar").click(function () {
		var Agregar = true;
		var mensaje_error = "";
		var Id_Campoedit=$("#Id_Campoedit").val();
		var usuariosesion=$("#usuariosesion").val();
		var cmbareas=$("#cmbareas").val();
		var cmbtablas=$("#cmbtablas").val();
		var Nom_Tabla="";
		var Nom_Desc_Campo=$.trim($("#Nom_Desc_Campo").val());
		var strDatos=""; 
			
	
		if (cmbareas=="-1") {
			Agregar = false; 
			mensaje_error += " -Selecciona un area<br />";
		}
	
		if (cmbtablas=="-1") {
			Agregar = false; 
			mensaje_error += " -Seleccione una tabla<br />";
			
		}else{
			Nom_Tabla = $('#cmbtablas option:selected').text();
		}

		if (Nom_Desc_Campo.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Nombre de la Descripción de la Tabla<br />";
		}

		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar){	
		
			if(Id_Campoedit.length>0){
				strDatos += "&Id_Campoedit="+Id_Campoedit;	
			}
			
			strDatos += "&Id_Area="+cmbareas;
			strDatos += "&Id_Catalogo="+cmbtablas;
			strDatos += "&Desc_Campo="+Nom_Desc_Campo;
			strDatos += "&Usr_Inser="+usuariosesion;
			strDatos += "&accion=guardarcatalogos";
			
			
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
						muestrotablacattablas(cmbtablas, Nom_Tabla);
						$("#Nom_Desc_Campo").val("");
						$("#cmbareas").prop( "disabled", false );
						$("#cmbtablas").prop( "disabled", false );
						$("#Id_Campoedit").val("");
						
					}else{
						mensajesalerta("", json.mensaje, "error", "dark");  
					}
					//$('#displayGenerarCat').DataTable().ajax.reload();	
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
	
	limpiarcampos=function()
	{
		$("#cmbareas").prop( "disabled", false );
		$("#cmbtablas").prop( "disabled", false );
			
		$("#Id_Campoedit").val("");
		$("#cmbareas").val("-1");
		$("#cmbtablas").val("-1");
		$("#idmuestrocmbtabla").hide();
		$("#Nom_Desc_Campo").val("");
		$("#muestrotabla").html("");
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
			{ "data": "Nom_Area"},
			{
			    "data": function (obj) {
			        var edicion = '';
			        edicion += '<span onclick="pasarvaloresdatatable(\''+obj.Id_Catalogo+'\', \''+obj.Id_Area+'\', \''+obj.Nom_Tabla+'\')"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
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
	pasarvalores=function(Id_Campo, Desc_Campo, Id_Tabla, Id_Area) {
		$('#myModal').modal('show');
		$("#cmbareas").prop( "disabled", true );
		$("#cmbtablas").prop( "disabled", true );
		
		$("#cmbareas").val(Id_Area);
		$("#cmbtablas").val(Id_Tabla);
		$("#Nom_Desc_Campo").val(Desc_Campo);
		$("#Id_Campoedit").val(Id_Campo);
	}
	
	pasarvaloresdatatable=function(Id_Catalogo, Id_Area, Nom_Tabla) {
		$('#myModal').modal('show');
		$("#cmbareas").val(Id_Area);
		$("#idmuestrocmbtabla").show();
		cargatablas(Id_Area, Id_Catalogo);
		muestrotablacattablas(Id_Catalogo, Nom_Tabla)
		
	}

	//Funcion Para Eliminar Logicamente
	pasarelimina= function(Id_Registro, Id_Catalogo) {
	  var usuariosesion=$("#usuariosesion").val();	
      bootbox.dialog({
			message: "Advertencia!! <br><br> Esta Seguro de Eliminar el Registro??",
			
			buttons: {
				danger: {
					label: "Aceptar",
					className: "btn-primary",
					callback: function() {
						
						$.ajax({
							type: "POST",
							encoding:"UTF-8",
							url: "../fachadas/activos/siga_cat_catalogos/Siga_cat_catalogosFacade.Class.php",        
							async: false,
							data: {
								Id_Campoedit:Id_Registro,
								Id_Catalogo:Id_Catalogo,
								Usr_Mod:usuariosesion,
								accion:"eliminacionlogica"
							},
							dataType: "html",
							beforeSend: function (xhr) {

							},
							success: function (datos) {
								var json;
								json = eval("(" + datos + ")"); //Parsear JSON
								
								if(json.totalCount>0){
									mensajesalerta("&Eacute;xito", json.mensaje, "success", "dark");
									muestrotablacattablas(Id_Catalogo, Nom_Tabla);
								}else{
									mensajesalerta("", json.mensaje, "error", "dark");  
								}
							
							},
							error: function () {
								mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
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
