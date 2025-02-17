<?php
 $style_size_table="font-size:10px";
?>

<!--Librerias Autocomplete-->
<script src="../plugins/docsupport/standalone/selectize.js"></script>
<script src="../plugins/docsupport/index.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!---->

<!-- Info boxes -->
<div class="row">
  <div class="col-md-3 col-md-offset-2 col-sm-6 col-xs-12">
    <div class="info-box azul">
    <!-- Button trigger modal -->
      <a href="#" data-toggle="modal" data-target="#myModal" onclick="limpiarcampos()">
        <span class="info-box-icon bg-aqua"><i class="fa fa-arrow-circle-o-up"></i></span>
        <div class="info-box-content">
          <h3 class="info-box-text">Alta Usuario</h3>
        </div>
        <!-- /.info-box-content -->
      </a>
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- /.col -->



  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>
  <!-- /.col -->
</div>
<!-- /.row -->


<!-- Main row -->
<div class="row">
  <!-- table-results -->
  <div class="col-md-12">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
        <table id="displayUSUARIOS" class="table table-bordered table-striped table-chs" width="100%">
          <thead>
            <tr>
			  <th style="<?php echo $style_size_table;?>">Edici&oacute;n</th>	
              <th style="<?php echo $style_size_table;?>">Id</th>
              <th style="<?php echo $style_size_table;?>">Nom. Corto</th>
              <th style="<?php echo $style_size_table;?>">Nombre Usuario</th>
              <th style="<?php echo $style_size_table;?>">Puesto</th>
			  <th style="<?php echo $style_size_table;?>">Usuario</th>
              <th style="<?php echo $style_size_table;?>">Aplicaci&oacute;n</th>
            </tr>
          </thead>
        </table>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
<!-- /.row -->
    
<div class="modal fade modalchs" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header azul">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i> alta usuario </h4>
      </div>
	  
      <div class="modal-body">
	            <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      
                        <div class="col-md-6">
						  <div class="form-group">	
							  <input type="hidden" id="Id_Usuario">	
							  <span><font color="red">*</font></span>
							  <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Número de Empleado</label>
							  <input type="text" class="form-control" id="NoUsuario" placeholder="No. Empleado">
						  </div>
						  <div class="form-group">
							<span><font color="red">*</font></span>
							<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Usuario</label>
							<input type="text" class="form-control" id="Usuario" placeholder="Usuario">
						  </div>
						  <div class="form-group">
							<span><font color="red">*</font></span>
							<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Correo</label>
							<input type="text" class="form-control" id="Correo" placeholder="Correo">
						  </div>
						  <div class="form-group">
							<label class="control-label"  style="font-size: 11px;">Gerencia</label>
							<input type="text" class="form-control" id="Gerencia" placeholder="Gerencia" disabled>
						  </div>
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-12 control-label">
								<strong>Activo Fijo: </strong><input type="checkbox" id="ActivoFijo" onchange="OnchActivoMesa()">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Mesa de Ayuda: </strong><input type="checkbox" id="MesadeAyuda" onchange="OnchActivoMesa()">
						    </label>
						  </div>
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-12 control-label">Areas:
								<input type="hidden" id="CadenaAreas">
								<div id="cargaareas">
								</div>
							</label>	
						  </div>	
						</div><!-- columna#1 -->
				
            <div class="col-md-6">
						  <div class="form-group">
							<span><font color="red">*</font></span>
							<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Usuario Solicitante</label>
							<input type="text" class="form-control"  id="txt_nombre_usuario" disabled="true" style="display:none">
							<div id="muestro_select">
								<select id="select-usuarios" class="demo-default" placeholder="Usuario Solicitante" style="display:none">
								</select>
							</div>
							<div id="gifcargando1" style="display:none" align="center">
							   <img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
							</div>	
						  </div>
						  <div class="form-group">
							<span><font color="red">*</font></span>
							<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Password</label>
							<input type="text" class="form-control" id="Password" placeholder="Password">
						  </div>
						  <div class="form-group">
							<label class="control-label"  style="font-size: 11px;">Puesto</label>
							<input type="text" class="form-control" id="Puesto" placeholder="Puesto" disabled>
						  </div>
						  <div class="form-group">
							<label class="control-label"  style="font-size: 11px;">Ext. Telefonica</label>
							<input type="text" class="form-control" id="Ext_Telefonica" placeholder="Ext." disabled>
						  </div>
						  <div class="form-group" >
							<label for="inputEmail3" class="col-sm-12 control-label" style="display:none" id="groupcargos">Cargos Usuario</label>
							<input type="hidden" id="CadenaCargos">
							<div id="cargcargos">
							</div>
						  </div>
						  <div class="form-group">
							<!--Se muestra la tabla del menu-->
							<div class="col-sm-offset-3" id="muestrotablamenu">
							</div>
						  </div>		
                        </div><!-- columna#2 -->
                    </div>
                  </div><!-- row -->



	  
		<form class="form-horizontal">
		  
		  <br>
		  
		  
          	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn chs" data-dismiss="modal">Imprimir Formato</button>
        <button type="button" class="btn chs" id="guardar">Guardar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  
</div>

<!------------------>
<!-- modal contabilidad / periodo fiscal -->
     <div class="modal fade modalchs" id="modalmenu">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">MEN&Uacute;</h4>
          </div>
          <div class="modal-body nopsides npt">
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="generales">
                 <form class="form-horizontal"> 
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="col-md-12"><br><br></div>
						<div class="form-group">
						  <!--Se muestra la tabla del menu-->
						  <div class="col-sm-11 col-sm-offset-1" id="clickmenucargos">
						  </div>
						</div>
                    </div>
                  </div><!-- row -->
                </form>
              </div><!-- tab#1 -->
            </div>
          </div><!-- modal-body -->
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    
<style type="text/css">
.autocomplete-suggestions { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; border: 1px solid #999; background: #FFF; cursor: default; overflow: auto; -webkit-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); -moz-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-no-suggestion { padding: 2px 5px;}
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: bold; color: #000; }
.autocomplete-group { padding: 2px 5px; font-weight: bold; font-size: 16px; color: #000; display: block; border-bottom: 1px solid #000; }
</style>

<!-- jQuery autocomplete -->
    
<script>



$(document).ready(function(){
	//Variables
	//En este arreglo padre se estaran guardando las posiciones de los cargos seleccionados 
	var arrayposicion=[];
	//Dentro del arreglo padre arrayposicion se estara guardando este arreglo
	var array=[];
	var cont_men_sub=0;
	var contadorareas=0;
	//Cargar funciones
	cargartablaareas();
	usuarios();
	//Carga tabla con areas
	function cargartablaareas()
	{
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_catareas/Siga_catareasFacade.Class.php",        
			async: false,
			data: {
				accion:"consultar"
			},
			dataType: "html",
			beforeSend: function (xhr) {
        
			},
			success: function (data) {
				var tabla="";
				var data;
				data = eval("(" + data + ")");
				
				if (data.totalCount > 0){
					contadorareas=data.totalCount;
					tabla='<table width="100%">';
					tabla+='	<tbody>';
					
					for(var i = 0; i < data.totalCount; i++)
					{
						tabla+='<tr style="border-bottom: #1B3F90 1px solid; ">';
						tabla+='	<td><strong>'+data.data[i].Nom_Area+'</strong></td>';
						tabla+='	<td><div align="right"><input type="checkbox" class="classareas'+i+'" id="checkareas'+data.data[i].Id_Area+'" " name="orderBoxArea[]" value='+ data.data[i].Id_Area +' onchange="pasarcheckarea()"></div></td>';
						tabla+='</tr>';
					}
					tabla+='	</tbody>';	
					tabla+='	</table>';
				}
				
				$("#cargaareas").html(tabla);
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}
	
	
	//Autocomplete Usuarios
	function usuarios(){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoFacade.Class.php",
			data: {
				accion: 'consultar'
			},
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargando1").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {

						var usuarios='';
						usuarios+='<option></option>';
						usuarios+='<optgroup label="Usuarios">';

						for (var i = 0; i < json.totalCount; i++) {
							usuarios+='<option value="'+json.data[i].num_empleado.trim()+'">'+json.data[i].num_empleado.trim()+' '+json.data[i].nombre_completo.trim()+'</option>';
						}
						usuarios+='</optgroup>';
						$('#select-usuarios').html(usuarios);

						$("#gifcargando1").hide();
						$("#select-usuarios").show();
							
						$('#select-usuarios').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargando1").hide();
						$('#select-usuarios').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#select-usuarios').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	$(".selectize-control").css("height", "34px");
	
	$( "#select-usuarios").change(function() {
		$("#NoUsuario").val("");
		$("#txt_nombre_usuario").val("");
		$("#Usuario").val("");
		$("#Password").val("");
		$("#Correo").val("");
		$("#Puesto").val("");
		$("#Gerencia").val("");
		$("#Ext_Telefonica").val("");
		if(this.value!=""){
			$("#NoUsuario").val(this.value);
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoFacade.Class.php",
				data: {
					num_empleado:this.value,
					accion: 'consultar'
				},
				async: false,
				dataType: "html",
				beforeSend: function (objeto) {
				},
				success: function (datos) {
					var json = "";
						json = eval("(" + datos + ")"); //Parsear JSON

						if (json.totalCount > 0) {
							$("#txt_nombre_usuario").val(json.data[0].nombre_completo);
							$("#Gerencia").val(json.data[0].gerencia);
							$("#Puesto").val(json.data[0].puesto);
							if(json.data[0].ext_telefonica!=null){
								$("#Ext_Telefonica").val(""+json.data[0].ext_telefonica);
							}
							
							if(json.data[0].email.length>0){
								
								var correo="";
								correo=json.data[0].email.indexOf("@");
								if(correo!="-1"){
									$("#Correo").val(json.data[0].email);
								}else{
									$("#Correo").val("");
									mensajesalerta("Informaci&oacute;n", " -Ingrese el correo electr&oacute;nico", "notice", "dark");
								}
								
							}else{
								if(json.data[0].EMAIL_CFDI.length>0){
									var correo="";
									correo=json.data[0].email.indexOf("@");
									if(correo!="-1"){
										$("#Correo").val(json.data[0].EMAIL_CFDI);
									}else{
										$("#Correo").val("");
										mensajesalerta("Informaci&oacute;n", " -Ingrese el correo electr&oacute;nico", "notice", "dark");
									}
								}else{
									mensajesalerta("Informaci&oacute;n", " -Ingrese el correo electr&oacute;nico", "notice", "dark");
								}
							}
						}else {
							mensajesalerta("Informaci&oacute;n", "No se encontraron resultados", "notice", "dark");
						}

				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
			
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/tcausr/TcausrFacade.Class.php",
				data: {
					numero_empleado:this.value,
					accion: 'consultar'
				},
				async: false,
				dataType: "html",
				beforeSend: function (objeto) {
				},
				success: function (datos) {
					var json = "";
						json = eval("(" + datos + ")"); //Parsear JSON

						if (json.totalCount > 0) {
							$("#Usuario").val(json.data[0].nombre);
							$("#Password").val(json.data[0].pwd);
		
						}else {
							mensajesalerta("Informaci&oacute;n", "No se encontraron datos en el sistema Assist. <br> -Ingrese manualmente el Usuario y el Password.", "notice", "dark");
						}
				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
			
		}
	});
	
	
	
	//Pasamos los id de las areas a un hidden como cadena separados por,
	pasarcheckarea=function()
    {   
        var checkboxValues = "";
        $('input[name="orderBoxArea[]"]:checked').each(function() { checkboxValues += $(this).val() + ","; });
        checkboxValues = checkboxValues.substring(0, checkboxValues.length-1);
        $("#CadenaAreas").val(checkboxValues);
    }
	
	//Tabla dinamica donde se muestran los usuarios
	$('#displayUSUARIOS').DataTable({
		"scrollY": 500,
		"scrollX": true,
		"paging": true,
		"autoWidth": false,
        "processing": true,
        "serverSide": true,
        "ajax": { 
            "url": "../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",
            "type": "POST"
        },
        "columns": [
			{ "data": "Id_Usuario", "visible": false},
			{
			    "data": function (obj) {
			        var edicion = '';
			        edicion += '<span onclick="pasarvalores(' + obj.Id_Usuario + ')"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
              edicion += '<span onclick="pasarelimina(' + obj.Id_Usuario + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
					return edicion;
			    }
			},
			{ "data": "No_Usuario"},
			{ "data": "Nombre_Usuario"},
			{ "data": "Puesto"},
			{ "data": "Usuario"},
			{
			    "data": function (obj) {
			        var aplicacion="";
					if(obj.Activo_Fijo=="S"&&obj.Mesa_Ayuda=="N"){
						aplicacion="Activo Fijo";
					}else{
						if(obj.Mesa_Ayuda=="S"&&obj.Activo_Fijo=="N"){
							aplicacion="Mesa de Ayuda";
						}else{
							if(obj.Mesa_Ayuda=="S"&&obj.Activo_Fijo=="S")
							{
								aplicacion="Activo Fijo, Mesa de Ayuda";
							}
						}
					}
					
					return aplicacion;
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
	
	pasarelimina=function(id_usuario) {

		$.confirm({
		    title: 'Baja Usuario',
		    content: '¿Desea eliminar al usuario?',
		    icon: 'fa fa-user-times',
		    type: 'red',
		    buttons: {
		        confirm: function () { 

								$.ajax({
									url: '../poo/usuarios/ajax_update_estatus_baja.php',
									type: 'POST',
									dataType: 'JSON',
									data: {id_usuario: id_usuario},
									success:function(data){

											if(data==true){
												$('#displayUSUARIOS').DataTable().ajax.reload();
												$.alert('Baja éxitosa!');
											}else{
												$.alert('Error en la Operación');											
											}
										}
								});

		        								        	
		        },
		        cancel: function () {
		            $.alert('Baja Cancelada!');
		        },
		    }
		});

	}

	arraychek=function(tipo,idcheckbox, total, id_menu, id_submenu)
	{
		array[idcheckbox] = new Array(6);
		
		array[idcheckbox][0]=idcheckbox;
		array[idcheckbox][1]=id_menu;
		array[idcheckbox][2]=id_submenu;
		
		if($("#checkidL"+idcheckbox).prop('checked')){array[idcheckbox][3]="S";
			if($("#checkidA"+idcheckbox).prop('checked')){array[idcheckbox][4]="S";
				if($("#checkidB"+idcheckbox).prop('checked')){array[idcheckbox][5]="S";
					if($("#checkidC"+idcheckbox).prop('checked')){array[idcheckbox][6]="S";}else{array[idcheckbox][6]="N";}
				}else{array[idcheckbox][5]="N";
					if($("#checkidC"+idcheckbox).prop('checked')){array[idcheckbox][6]="S";}else{array[idcheckbox][6]="N";}
				}
			}else{array[idcheckbox][4]="N";
				if($("#checkidB"+idcheckbox).prop('checked')){array[idcheckbox][5]="S";
					if($("#checkidC"+idcheckbox).prop('checked')){array[idcheckbox][6]="S";}else{array[idcheckbox][6]="N";}
				}else{array[idcheckbox][5]="N";
					if($("#checkidC"+idcheckbox).prop('checked')){array[idcheckbox][6]="S";}else{array[idcheckbox][6]="N";}
				}
			}	
		}else{array[idcheckbox][3]="N";
			if($("#checkidA"+idcheckbox).prop('checked')){array[idcheckbox][4]="S";
				if($("#checkidB"+idcheckbox).prop('checked')){array[idcheckbox][5]="S";
					if($("#checkidC"+idcheckbox).prop('checked')){array[idcheckbox][6]="S";}else{array[idcheckbox][6]="N";}
				}else{array[idcheckbox][5]="N";
					if($("#checkidC"+idcheckbox).prop('checked')){array[idcheckbox][6]="S";}else{array[idcheckbox][6]="N";}
				}
			}else{array[idcheckbox][4]="N";
				if($("#checkidB"+idcheckbox).prop('checked')){array[idcheckbox][5]="S";
					if($("#checkidC"+idcheckbox).prop('checked')){array[idcheckbox][6]="S";}else{array[idcheckbox][6]="N";}
				}else{array[idcheckbox][5]="N";
					if($("#checkidC"+idcheckbox).prop('checked')){array[idcheckbox][6]="S";}else{array[idcheckbox][6]="N";}
				}
			}	
		}
		console.log(array);
	}	

	OnchActivoMesa=function()
	{
		var contadorA=0;
		var contadorM=0;
		if($("#ActivoFijo").prop('checked')){contadorA=1;}
		if($("#MesadeAyuda").prop('checked')){contadorM=1;}
		
		if(contadorA==1&&contadorM==0){
			carga_perfiles(1);
			arrayposicion=[];
		}else{
			if(contadorA==0&&contadorM==1){
				carga_perfiles(2);
				arrayposicion=[];	
			}else{
				if(contadorA==1&&contadorM==1){
					carga_perfiles(3);
					arrayposicion=[];
				}else{
					$("#groupcargos").hide();
					$("#cargcargos").html("");
					$("#CadenaCargos").val("");
					arrayposicion=[];
				}
			}
			$("#CadenaCargos").val("");
		}
	}

	carga_perfiles=function(Tipo) {
		$("#groupcargos").show();
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_cargos/Siga_cargosFacade.Class.php",        
			async: false,
			data: {
				Tipo:Tipo,
				accion:"consultargrupos"
			},
			dataType: "html",
			beforeSend: function (xhr) {
        
			},
			success: function (data) {
				var tabla="";
				var data;
				data = eval("(" + data + ")");
				
				if (data.totalCount > 0){
					tabla='<table width="100%">';
					tabla+='	<tbody>';
					
					for(var i = 0; i < data.totalCount; i++)
					{
						tabla+='<tr style="border-bottom: #1B3F90 1px solid; ">';
						tabla+='	<td><strong>'+data.data[i].Nom_Cargo+'</strong></td>';
						tabla+='	<td><div align="right"><a href="#noir" style="display:none" id="hrefcargos'+data.data[i].Id_Cargo+'" data-toggle="modal" data-target="#modalmenu" onclick="clickmenucargos(\''+data.data[i].Id_Cargo+'\')">Click Aqu&iacute;</a>&nbsp;&nbsp;&nbsp<input type="checkbox" name="orderBoxCargos[]" value='+ data.data[i].Id_Cargo +' onchange="pasarcheckcargos(\''+data.data[i].Id_Cargo+'\')" id="checkcargos'+data.data[i].Id_Cargo+'" onclick="mostrarhref(\''+data.data[i].Id_Cargo+'\',\''+i+'\')"></div></td>';
						tabla+='</tr>';
					}
					tabla+='	</tbody>';	
					tabla+='	</table>';
				}
				
				$("#cargcargos").html(tabla);
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}
	
	
	clickmenucargos=function(Id_Cargo)
	{
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_cargos/Siga_cargosFacade.Class.php",        
			async: false,
			data: {
				Id_Cargo:Id_Cargo,
				accion:"consultarmencargos"
			},
			dataType: "html",
			beforeSend: function (xhr) {
        
			},
			success: function (data) {
				var tabla=""; var divtabla=""; var tablaactivofijo=""; var tablamesadeayuda="";
				var data;
				data = eval("(" + data + ")");
				var bodyactivofijo="";
				var bodymesadeayuda="";
				var espacios="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                var contadoractivofijo=0;
				var contadormesadeayuda=0;
				
				if (data.totalCount > 0) {
					array=[];
					cont_men_sub=data.totalCount;
					
					for(var i = 0; i < data.totalCount; i++){
						
						if(data.data[i].Id_Aplicacion=="1"){
							contadoractivofijo=contadoractivofijo+1;
						}
						
						if(data.data[i].Id_Aplicacion=="2"){
							contadormesadeayuda=contadormesadeayuda+1;
						}
						if(data.data[i].Padre=="N"){
							var checkedL="", checkedA="", checkedB="", checkedC="";
							
							if(data.data[i].Lectura=="S"){checkedL="checked";}else{checkedL="";}
							if(data.data[i].Alta=="S"){checkedA="checked";}else{checkedA="";}
							if(data.data[i].Baja=="S"){checkedB="checked";}else{checkedB="";}
							if(data.data[i].Cambio=="S"){checkedC="checked";}else{checkedC="";}
							
							tabla+='<tr style="border-bottom: #1B3F90 1px solid; ">';
							tabla+='	<td>'+data.data[i].Nom_Menu+'</td>';
							tabla+='	<td><input type="checkbox" class="menuL'+data.data[i].Id_Menu+'" id="checkidL'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" '+checkedL+'></td>';
							tabla+='	<td><input type="checkbox" class="menuA'+data.data[i].Id_Menu+'" id="checkidA'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" '+checkedA+'></td>';
							tabla+='	<td><input type="checkbox" class="menuB'+data.data[i].Id_Menu+'" id="checkidB'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" '+checkedB+'></td>';
							tabla+='	<td><input type="checkbox" class="menuC'+data.data[i].Id_Menu+'" id="checkidC'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" '+checkedC+'></td>';
							tabla+='</tr>';
							
						}
						else{
							var checkedL="", checkedA="", checkedB="", checkedC="";
							var hijo=data.data[i].Id_Menu;
							if(data.data[i].Padre=="S"){
								if(data.data[i].OrdenSubmenu==1)
								{	
									tabla+='<tr style="border-bottom: #1B3F90 1px solid; ">';
									tabla+='	<td colspan="5">'+data.data[i].Nom_Menu+'</td>';
									tabla+='</tr>';	
								}
								tabla+='<tr style="border-bottom: #1B3F90 1px solid; ">';
								tabla+='	<td>'+espacios+''+data.data[i].Submenu+'</td>';
								
								if(data.data[i].Lectura=="S"){checkedL="checked";}else{checkedL="";}
								if(data.data[i].Alta=="S"){checkedA="checked";}else{checkedA="";}
								if(data.data[i].Baja=="S"){checkedB="checked";}else{checkedB="";}
								if(data.data[i].Cambio=="S"){checkedC="checked";}else{checkedC="";}
								
								tabla+='	<td><input type="checkbox" class="submenuL'+data.data[i].Id_Submenu+'" id="checkidL'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" '+checkedL+'></td>';
								tabla+='	<td><input type="checkbox" class="submenuA'+data.data[i].Id_Submenu+'" id="checkidA'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" '+checkedA+'></td>';
								tabla+='	<td><input type="checkbox" class="submenuB'+data.data[i].Id_Submenu+'" id="checkidB'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" '+checkedB+'></td>';
								tabla+='	<td><input type="checkbox" class="submenuC'+data.data[i].Id_Submenu+'" id="checkidC'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" '+checkedC+'></td>';
								tabla+='</tr>';	
							}
						}	
						
						if(i<contadoractivofijo){
							bodyactivofijo+=tabla;
							tabla="";
							contadorambos=0;
						}else{
							bodymesadeayuda+=tabla;
							tabla="";
						}
						
					}
					//Tabla de activos fijos
					//tablaactivofijo+='<div class="col-md-6"><br><br>';
					//tablaactivofijo+='<div align="center"><button type="button" class="btn chs" id="llenaractivofijo">Llenar</button></div>';
					tablaactivofijo+='<div align="center"><strong>ACTIVO FIJO</strong></div>';
					tablaactivofijo+='<table width="100%">';
					tablaactivofijo+='	<thead>';
					tablaactivofijo+='		<tr>';
					tablaactivofijo+='			<th width="40"><strong>Men&uacute;</strong></th>';
					tablaactivofijo+='			<th width="15"><strong>L</strong></th>';
					tablaactivofijo+='			<th width="15"><strong>A</strong></th>';
					tablaactivofijo+='			<th width="15"><strong>B</strong></th>';
					tablaactivofijo+='			<th width="15"><strong>C</strong></th>';
					tablaactivofijo+='		</tr>';
					tablaactivofijo+='	</thead>';
					tablaactivofijo+='	<tbody>';
					tablaactivofijo+=			bodyactivofijo;
					tablaactivofijo+='	</tbody>';	
					tablaactivofijo+='</table>';
					//tablaactivofijo+='</div>';
					//tabla+='<br>';
					//tabla+='<br>';
					//Tabla de mesa de ayuda
					//tablamesadeayuda+='<div class="col-md-6"><br><br>';
					//tablamesadeayuda+='<div align="center"><button type="button" class="btn chs" id="llenarmesaayuda">Llenar</button></div>';
					tablamesadeayuda+='<div align="center"><strong>MESA DE AYUDA</strong></div>';
					tablamesadeayuda+='<table width="100%">';
					tablamesadeayuda+='	<thead>';
					tablamesadeayuda+='		<tr>';
					tablamesadeayuda+='			<th width="40"><strong>Men&uacute;</strong></th>';
					tablamesadeayuda+='			<th width="15"><strong>L</strong></th>';
					tablamesadeayuda+='			<th width="15"><strong>A</strong></th>';
					tablamesadeayuda+='			<th width="15"><strong>B</strong></th>';
					tablamesadeayuda+='			<th width="15"><strong>C</strong></th>';
					tablamesadeayuda+='		</tr>';
					tablamesadeayuda+='	</thead>';
					tablamesadeayuda+='	<tbody>';
					tablamesadeayuda+=			bodymesadeayuda;
					tablamesadeayuda+='	</tbody>';	
					tablamesadeayuda+='	</table>';
					//tablamesadeayuda+='</div>';	
					
					if(contadoractivofijo>0&&contadormesadeayuda<1){
						divtabla+='<div class="col-md-12">';
						divtabla+=tablaactivofijo;
						divtabla+='</div>';
					}else{
						if(contadormesadeayuda>0&&contadoractivofijo<1){
							divtabla+='<div class="col-md-12">';
							divtabla+=tablamesadeayuda;
							divtabla+='</div>';
						}else{
							if(contadormesadeayuda>0&&contadoractivofijo>0)
							{
								divtabla+='<div class="col-md-6">';
								divtabla+=tablaactivofijo;
								divtabla+='</div>';
								divtabla+='<div class="col-md-6">';
								divtabla+=tablamesadeayuda;
								divtabla+='</div>';
							}
						}
						
					}		
				}
				else
				{
					divtabla='<div class="alert alert-warning alert-dismissible fade in" role="alert">';
					divtabla+='	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>';
					divtabla+='	</button>';
					divtabla+='	<strong>No se encontraron resultados.</strong>';
					divtabla+='</div>';
				}
				
				
				$("#clickmenucargos").html(divtabla);
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}
	
	clickmenuarray=function(Id_Cargo, posicion)
	{
		
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_cargos/Siga_cargosFacade.Class.php",        
			async: false,
			data: {
				Id_Cargo:Id_Cargo,
				accion:"consultarmencargos"
			},
			dataType: "html",
			beforeSend: function (xhr) {
        
			},
			success: function (data) {
				var data;
				data = eval("(" + data + ")");
				if (data.totalCount > 0) {
					for(var i = 0; i < data.totalCount; i++){
						var idcheckbox=posicion;
						var nomccheck=data.data[i].Id_Menu+"MS"+data.data[i].Id_Submenu;
						
						array[i] = new Array(7);		
						array[i][0]=data.data[i].Id_Menu+"MS"+data.data[i].Id_Submenu;
						array[i][1]=data.data[i].Id_Menu;
						array[i][2]=data.data[i].Id_Submenu;
						array[i][3]=data.data[i].Id_Aplicacion;
						array[i][4]=data.data[i].Lectura;
						array[i][5]=data.data[i].Alta;
						array[i][6]=data.data[i].Baja;
						array[i][7]=data.data[i].Cambio;
						
						
					}
					arrayposicion[posicion]=array;
					console.log(arrayposicion);
				}
				else
				{
					divtabla='<div class="alert alert-warning alert-dismissible fade in" role="alert">';
					divtabla+='	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>';
					divtabla+='	</button>';
					divtabla+='	<strong>No se encontraron resultados.</strong>';
					divtabla+='</div>';
				}
				
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}
	
	
	
	//Pasamos los id de las areas a un hidden como cadena separados por,
	pasarcheckcargos=function()
    {   
        var checkboxValues = "";
        $('input[name="orderBoxCargos[]"]:checked').each(function() { checkboxValues += $(this).val() + ","; });
        checkboxValues = checkboxValues.substring(0, checkboxValues.length-1);
        $("#CadenaCargos").val(checkboxValues);
    }
	
	mostrarhref=function(Id_Cargo, posicion)
	{
		if($("#checkcargos"+Id_Cargo).prop('checked')){
			$("#hrefcargos"+Id_Cargo).show();
			clickmenuarray(Id_Cargo, posicion);
		}else{
			$("#hrefcargos"+Id_Cargo).hide();	
		}
	}
	
	$("#guardar").click(function () {
		var Agregar = true;
		var mensaje_error = "";
		var Id_Usuario=$("#Id_Usuario").val();
		var NoUsuario=$.trim($("#NoUsuario").val());
		var NombreUsuario=$.trim($("#txt_nombre_usuario").val());
		var Correo=$.trim($("#Correo").val());
		var Usuario=$.trim($("#Usuario").val());
		var Password=$.trim($("#Password").val());
		var CadenaAreas=$("#CadenaAreas").val();
		var CadenaCargos=$("#CadenaCargos").val();
		var ActivoFijo="";
		var MesaAyuda="";
		var strDatos=""; 
		
		if (NoUsuario.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el N&uacute;mero de Empleado<br />";
		}
		
		if (NombreUsuario.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar Nombre de Usuario<br />";
		}
		
		if (Correo.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Es necesario el correo para las notificaciones<br />";
		}
		
		if (Usuario.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Usuario<br />";
		}
		
		if (Password.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Contrase&ntilde;a<br />";
		}
		
		if(!$("#ActivoFijo").prop('checked')&&!$("#MesadeAyuda").prop('checked')){
			Agregar = false; 
			mensaje_error += " -Selecciona Mesa de Ayuda o Activo Fijo<br />";
		}
		
		if (CadenaAreas.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Selecciona por lo menos un Area<br />";
		}
		
		if (CadenaCargos.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Selecciona por lo menos un Cargo<br />";
		}
		
		
		if($("#ActivoFijo").prop('checked')){ActivoFijo="S";}else{ActivoFijo="N";}
		
		if($("#MesadeAyuda").prop('checked')){MesaAyuda="S";}else{MesaAyuda="N";}
		
		
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar)
		{		
			if(Id_Usuario.length < 1)
			{
				strDatos={
					No_Usuario:NoUsuario,
					Nombre_Usuario:NombreUsuario,
					Correo:Correo,
					Usuario:Usuario,
					Password:Password,
					Puesto:$("#Puesto").val(),
					Activo_Fijo:ActivoFijo,
					Mesa_Ayuda:MesaAyuda,
					Usr_Inser:"pruebas",
					Estatus_Reg:1,
					Arraymenu:array,
					CadenaAreas:CadenaAreas,
					CadenaCargos:CadenaCargos,			
					accion:"guardardetalle"
				};
			}else{
				strDatos={
					Id_Usuario:Id_Usuario,
					No_Usuario:NoUsuario,
					Nombre_Usuario:NombreUsuario,
					Correo:Correo,
					Usuario:Usuario,
					Password:Password,
					Puesto:$("#Puesto").val(),
					Activo_Fijo:ActivoFijo,
					Mesa_Ayuda:MesaAyuda,
					Usr_Mod:"pruebas",
					Estatus_Reg:2,
					Arraymenu:array,
					CadenaAreas:CadenaAreas,
					CadenaCargos:CadenaCargos,			
					accion:"modificardetalle"
				};
			}
			
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {
            
				},
				success: function (data) {
					var data;
					data = eval("(" + data + ")");
					
					if(data.totalCount>0)
					{
						mensajesalerta("&Eacute;xito", "Guardado Correctamente.", "success", "dark");	
						$('#myModal').modal('hide');
						$('#displayUSUARIOS').DataTable().ajax.reload();
						
					}else{
						mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
						$('#myModal').modal('hide');
					}
					
					//Limpiamos los campos y el array
					limpiarcampos();
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
	
	limpiarcampos=function()
	{	
		//Limpiamos el autocomplete
		var Num_Empleado=$.trim($("#select-usuarios").val());
		if(Num_Empleado!=""){			
			if(Num_Empleado.length > 0){
				var $select3 = $('#select-usuarios').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
			}
		}
		//
		
		$("#muestrotablamenu").html("");
		$("#Id_Usuario").val("");
		$("#NoUsuario").val("");
		$("#txt_nombre_usuario").val("");
		$("#Correo").val("");
		$("#NombreUsuario").val("");
		$("#Usuario").val("");
		$("#Password").val("");
		$("#Correo").val("");
		$("#Puesto").val("");
		$("#Gerencia").val("");
		$("#Ext_Telefonica").val("");
		
		//Limpiar checkbox area y mesa de ayuda
		$("#ActivoFijo").prop("checked",false);
		$("#MesadeAyuda").prop( "checked",false);
		//Limpiamos el div cargos
		$("#cargcargos").html("");
		//Limpiar texbox de cadenas checkbox
		$("#CadenaAreas").val("");
		$("#CadenaCargos").val("");
		//Limpiar checkbox areas areas 
		if(contadorareas>0){
			for(var i=0; i< contadorareas;i++){
				$(".classareas"+i).prop("checked",false);
			}
		}
		//Limpiar arrays
		array=[];
		arrayposicion=[];
		cont_men_sub=0;
	}

	//Pasar Valores al Editar
	pasarvalores=function(id) {
		limpiarcampos();
        if (id != "") {
            $.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",
                async: false,
                data: {
                    Id_Usuario: id,
                    accion: "consultarusuariosareas"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
                        $("#Id_Usuario").val(data.data[0].Id_Usuario);
						$("#NoUsuario").val(data.data[0].No_Usuario);
						var $select3 = $('#select-usuarios').selectize({});	
						var control3 = $select3[0].selectize;
						control3.addItem(data.data[0].No_Usuario);
						$("#txt_nombre_usuario").val(data.data[0].Nombre_Usuario);
						$("#Correo").val(data.data[0].Correo);
						$("#Usuario").val(data.data[0].Usuario);
						$("#Password").val(data.data[0].Password);
						if(data.data[0].Activo_Fijo=="S"){$("#ActivoFijo").prop("checked",true);}
						if(data.data[0].Mesa_Ayuda=="S"){$("#MesadeAyuda").prop("checked",true);}
						//$("#cmbareas").val(data.data[0].Id_Area);
						//$("#cmbperfiles").val(data.data[0].Id_Perfil);
						//Cargamos el menu dependiendo del perfil
						//formarmenu(data.data[0].Id_Perfil);
						//pasarvalmenuperfil(data.data[0].Id_Usuario);
						$('#myModal').modal('show');
                    }
					//Cargar Areas
					if (data.totalCountAreasEnvia > 0) {
                        var CadenaAreas="";
						for(var i = 0; i < data.totalCountAreasEnvia; i++){
							$("#checkareas"+data.dataareas[i].Id_Area).prop("checked",true);
							CadenaAreas+=data.dataareas[i].Id_Area+",";
						}
						CadenaAreas = CadenaAreas.substring(0, CadenaAreas.length-1);
						$("#CadenaAreas").val(CadenaAreas);
                    }
					OnchActivoMesa();
					//Cargar Cargos
					if (data.totalCountCargosEnvia > 0) {
                        var CadenaCargos="";
						for(var j = 0; j < data.totalCountCargosEnvia; j++){
							$("#checkcargos"+data.datacargos[j].Id_Cargo).prop("checked",true);
							CadenaCargos+=data.datacargos[j].Id_Cargo+",";
						}
						CadenaCargos = CadenaCargos.substring(0, CadenaCargos.length-1);
						$("#CadenaCargos").val(CadenaCargos);
                    }
					
				},
                error: function () {
                    mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
			//Buscar areas
			
			
        }
    }
	
	
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	formarmenu=function(Id_Perfil)
	{
		$.ajax({
            type: "POST",
            url: "../fachadas/activos/siga_perfiles/Siga_perfilesFacade.Class.php",
            async: false,
            data: {
				Id_Perfil:Id_Perfil,
                accion: "consultarmenu"
            },
            dataType: "html",
            beforeSend: function (xhr) {

            },
            success: function (data) {
                data = eval("(" + data + ")");
				var tabla="";
				var espacios="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                if (data.totalCount > 0) {
					array=[];
					cont_men_sub=data.totalCount;
					tabla='<table width="100%">';
					tabla+='	<thead>';
					tabla+='		<tr>';
					tabla+='			<th width="40"><strong>Men&uacute;</strong></th>';
					tabla+='			<th width="15"><strong>L</strong></th>';
					tabla+='			<th width="15"><strong>A</strong></th>';
					tabla+='			<th width="15"><strong>B</strong></th>';
					tabla+='			<th width="15"><strong>C</strong></th>';
					tabla+='		</tr>';
					tabla+='	</thead>';
					tabla+='	<tbody>';
					for(var i = 0; i < data.totalCount; i++)
					{
						if(data.data[i].Padre=="N")
						{
							tabla+='<tr style="border-bottom: #1B3F90 1px solid; ">';
							tabla+='	<td>'+data.data[i].Nom_Menu+'</td>';
							tabla+='	<td><input type="checkbox" id="checkidL'+i+'" onclick="arraychek(\'L\',\''+i+'\',\''+data.totalCount+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\')"></td>';
							tabla+='	<td><input type="checkbox" id="checkidA'+i+'" onclick="arraychek(\'A\',\''+i+'\',\''+data.totalCount+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\')"></td>';
							tabla+='	<td><input type="checkbox" id="checkidB'+i+'" onclick="arraychek(\'B\',\''+i+'\',\''+data.totalCount+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\')"></td>';
							tabla+='	<td><input type="checkbox" id="checkidC'+i+'" onclick="arraychek(\'C\',\''+i+'\',\''+data.totalCount+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\')"></td>';
							tabla+='</tr>';	
						}
						else
						{
							var hijo=data.data[i].Id_Menu;
							if(data.data[i].Padre=="S")
							{
								if(data.data[i].OrdenSubmenu==1)
								{	
									tabla+='<tr style="border-bottom: #1B3F90 1px solid; ">';
									tabla+='	<td colspan="5">'+data.data[i].Nom_Menu+'</td>';
									tabla+='</tr>';	
								}
								tabla+='<tr style="border-bottom: #1B3F90 1px solid; ">';
								tabla+='	<td>'+espacios+''+data.data[i].Submenu+'</td>';
								tabla+='	<td><input type="checkbox" id="checkidL'+i+'" onclick="arraychek(\'L\',\''+i+'\',\''+data.totalCount+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\')"></td>';
								tabla+='	<td><input type="checkbox" id="checkidA'+i+'" onclick="arraychek(\'A\',\''+i+'\',\''+data.totalCount+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\')"></td>';
								tabla+='	<td><input type="checkbox" id="checkidB'+i+'" onclick="arraychek(\'B\',\''+i+'\',\''+data.totalCount+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\')"></td>';
								tabla+='	<td><input type="checkbox" id="checkidC'+i+'" onclick="arraychek(\'C\',\''+i+'\',\''+data.totalCount+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\')"></td>';
								tabla+='</tr>';	
							}
						}	
					}
					tabla+='	</tbody>';	
					tabla+='	</table>';	
				}
				else
				{
					tabla='<div class="alert alert-warning alert-dismissible fade in" role="alert">';
					tabla+='	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>';
					tabla+='	</button>';
					tabla+='	<strong>No se encontraron resultados.</strong>';
					tabla+='</div>';
				}
				
				$("#muestrotablamenu").html(tabla);
            },
            error: function () {
                mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
            }
        });
	
	}
	
	
	pasarvalmenuperfil=function(Id_Usuario){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_det_menu/Siga_det_menuFacade.Class.php",        
			async: false,
			data: {
				Estatus_Reg:"1",
				Id_Usuario:Id_Usuario,
				accion:"consultar"
			},
			dataType: "html",
			beforeSend: function (xhr) {
        
			},
			success: function (data) {
				var data;
				data = eval("(" + data + ")");
				
				if (data.totalCount > 0) {
					for(var i=0; i < cont_men_sub; i++)
					{
					}
				}
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}	
});	

</script>