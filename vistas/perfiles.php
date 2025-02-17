<!-- Info boxes -->
<div class="row">
  <div class="col-md-3 col-md-offset-2 col-sm-6 col-xs-12">
    <div class="info-box azul">
    <!-- Button trigger modal -->
      <a href="#" data-toggle="modal" data-target="#myModal" onclick="limpiarcampos()">
        <span class="info-box-icon bg-aqua"><i class="fa fa-arrow-circle-o-up"></i></span>
        <div class="info-box-content">
          <h3 class="info-box-text">alta perfiles</h3>
        </div>
        <!-- /.info-box-content -->
      </a>
    </div>
    <!-- /.info-box -->
  </div>
  
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
        <div>
        <table id="displayCARGOS" class="table table-bordered table-striped table-chs" width="100%">
          <thead>
            <tr>
              <th>Id</th>
              <th>Edici&oacute;n</th>
			  <th>Nombre Cargo</th>
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
        <h4 class="modal-title"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i>ALTA PERFILES</h4>
      </div>
      <div class="modal-body">
		<form class="form-horizontal">
		  <div class="form-group">
            <div class="col-sm-8 col-sm-offset-2">
			  <input type="hidden" id="Id_Cargo">	
			  <input type="text" class="form-control" id="Nom_Cargo" placeholder="Nombre del Cargo">
            </div>
          </div>	
          <div class="form-group">
			<!--Se muestra la tabla del menu-->
			<div class="col-sm-11" id="muestrotablamenu">
			</div>
		  </div>	
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
	//Array para llenar las posiciones seleccionadas de la mesa de ayuda y activo fijo
	var array=[];
	//Array para llenar manualmente (btn llenear activo fijo, btn llenar mesa de ayuda)
	var arrayllenacheck=[];
	var cont_men_sub=0;
	
	formarmenu();
	
	//Forma tabla
	$('#displayCARGOS').DataTable({
		"scrollY": 500,
		"scrollX": true,
		"paging": true,
		"autoWidth": false,
        "processing": true,
        "serverSide": true,
        "ajax": { 
            "url": "../fachadas/activos/siga_cargos/Siga_cargosFacade.Class.php",
            "type": "POST"
        },
        "columns": [
			{ "data": "Id_Cargo", "visible": false},
			{
			    "data": function (obj) {
			        var edicion = '';
			        edicion += '<span onclick="pasarvalores(' + obj.Id_Cargo + ')"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
                    edicion += '<span onclick="pasarelimina(' + obj.Id_Cargo + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
					return edicion;
			    }
			},
			{ "data": "Nom_Cargo"},
			
			
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
	
	//Forma menu de Activo Fijo y Mesa de Ayuda
	function formarmenu()
	{
		$.ajax({
            type: "POST",
            url: "../fachadas/activos/siga_cataplicaciones/Siga_cataplicacionesFacade.Class.php",
            async: false,
            data: {
				//Id_Aplicacion:Id_Aplicacion,
                accion: "consultarmenuaplicaciones"
            },
            dataType: "html",
            beforeSend: function (xhr) {

            },
            success: function (data) {
                data = eval("(" + data + ")");
				var tabla="";
				var bodyactivofijo="";
				var bodymesadeayuda="";
				var espacios="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                var contadoractivofijo=0;
				
				if (data.totalCount > 0) {
					array=[];
					cont_men_sub=data.totalCount;
					
					for(var i = 0; i < data.totalCount; i++){
						//Carga array para poder llenar los checks de manera automatica
						arrayllenacheck[i] = new Array(4);
						arrayllenacheck[i][0]=data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu;
						arrayllenacheck[i][1]=data.data[i].Id_Menu;
						arrayllenacheck[i][2]=data.data[i].Id_Submenu;
						arrayllenacheck[i][3]=data.data[i].Id_Aplicacion;
						
						if(data.data[i].Id_Aplicacion=="1"){
							contadoractivofijo=contadoractivofijo+1;
						}
						if(data.data[i].Padre=="N"){
							tabla+='<tr style="border-bottom: #1B3F90 1px solid; ">';
							tabla+='	<td>'+data.data[i].Nom_Menu+'</td>';
							tabla+='	<td><input type="checkbox" class="menuL'+data.data[i].Id_Menu+'" value="'+i+'" id="checkidL'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" onclick="arraychek(\''+i+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\',\''+data.data[i].Id_Aplicacion+'\')"></td>';
							tabla+='	<td><input type="checkbox" class="menuA'+data.data[i].Id_Menu+'" value="'+i+'" id="checkidA'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" onclick="arraychek(\''+i+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\',\''+data.data[i].Id_Aplicacion+'\')"></td>';
							tabla+='	<td><input type="checkbox" class="menuB'+data.data[i].Id_Menu+'" value="'+i+'" id="checkidB'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" onclick="arraychek(\''+i+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\',\''+data.data[i].Id_Aplicacion+'\')"></td>';
							tabla+='	<td><input type="checkbox" class="menuC'+data.data[i].Id_Menu+'" value="'+i+'" id="checkidC'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" onclick="arraychek(\''+i+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\',\''+data.data[i].Id_Aplicacion+'\')"></td>';
							tabla+='</tr>';	
							
						}
						else{
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
								tabla+='	<td><input type="checkbox" class="submenuL'+data.data[i].Id_Submenu+'" value="'+i+'" id="checkidL'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" onclick="arraychek(\''+i+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\',\''+data.data[i].Id_Aplicacion+'\')"></td>';
								tabla+='	<td><input type="checkbox" class="submenuA'+data.data[i].Id_Submenu+'" value="'+i+'" id="checkidA'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" onclick="arraychek(\''+i+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\',\''+data.data[i].Id_Aplicacion+'\')"></td>';
								tabla+='	<td><input type="checkbox" class="submenuB'+data.data[i].Id_Submenu+'" value="'+i+'" id="checkidB'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" onclick="arraychek(\''+i+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\',\''+data.data[i].Id_Aplicacion+'\')"></td>';
								tabla+='	<td><input type="checkbox" class="submenuC'+data.data[i].Id_Submenu+'" value="'+i+'" id="checkidC'+data.data[i].Id_Menu+'MS'+data.data[i].Id_Submenu+'" onclick="arraychek(\''+i+'\',\''+data.data[i].Id_Menu+'\',\''+data.data[i].Id_Submenu+'\',\''+data.data[i].Id_Aplicacion+'\')"></td>';
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
					tabla+='<div class="col-md-6"><br><br>';
					tabla+='<div align="center"><button type="button" class="btn chs" id="llenaractivofijo">Llenar</button></div>';
					tabla+='<div align="center"><strong>ACTIVO FIJO</strong></div>';
					tabla+='<table width="100%">';
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
					tabla+=			bodyactivofijo;
					tabla+='	</tbody>';	
					tabla+='</table>';
					tabla+='</div>';
					//tabla+='<br>';
					//tabla+='<br>';
					//tabla de mesa de ayuda
					tabla+='<div class="col-md-6"><br><br>';
					tabla+='<div align="center"><button type="button" class="btn chs" id="llenarmesaayuda">Llenar</button></div>';
					tabla+='<div align="center"><strong>MESA DE AYUDA</strong></div>';
					tabla+='<table width="100%">';
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
					tabla+=			bodymesadeayuda;
					tabla+='	</tbody>';	
					tabla+='	</table></div>';	
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
		
	//Llena el arreglo 	idcheckbox con los valores seleccionados manualmente o automaticamente
	arraychek=function(contador, id_menu, id_submenu, Id_Aplicacion)
	{	
		var idcheckbox=contador;
		var nomccheck=id_menu+"MS"+id_submenu;
		array[idcheckbox] = new Array(7);
		
		array[idcheckbox][0]=id_menu+"MS"+id_submenu;
		array[idcheckbox][1]=id_menu;
		array[idcheckbox][2]=id_submenu;
		array[idcheckbox][3]=Id_Aplicacion;
		
		if($("#checkidL"+nomccheck).prop('checked')){array[idcheckbox][4]="S";
			if($("#checkidA"+nomccheck).prop('checked')){array[idcheckbox][5]="S";
				if($("#checkidB"+nomccheck).prop('checked')){array[idcheckbox][6]="S";
					if($("#checkidC"+nomccheck).prop('checked')){array[idcheckbox][7]="S";}else{array[idcheckbox][7]="N";}
				}else{array[idcheckbox][6]="N";
					if($("#checkidC"+nomccheck).prop('checked')){array[idcheckbox][7]="S";}else{array[idcheckbox][7]="N";}
				}
			}else{array[idcheckbox][5]="N";
				if($("#checkidB"+nomccheck).prop('checked')){array[idcheckbox][6]="S";
					if($("#checkidC"+nomccheck).prop('checked')){array[idcheckbox][7]="S";}else{array[idcheckbox][7]="N";}
				}else{array[idcheckbox][6]="N";
					if($("#checkidC"+nomccheck).prop('checked')){array[idcheckbox][7]="S";}else{array[idcheckbox][7]="N";}
				}
			}	
		}else{array[idcheckbox][4]="N";
			if($("#checkidA"+nomccheck).prop('checked')){array[idcheckbox][5]="S";
				if($("#checkidB"+nomccheck).prop('checked')){array[idcheckbox][6]="S";
					if($("#checkidC"+nomccheck).prop('checked')){array[idcheckbox][7]="S";}else{array[idcheckbox][7]="N";}
				}else{array[idcheckbox][6]="N";
					if($("#checkidC"+nomccheck).prop('checked')){array[idcheckbox][7]="S";}else{array[idcheckbox][7]="N";}
				}
			}else{array[idcheckbox][5]="N";
				if($("#checkidB"+nomccheck).prop('checked')){array[idcheckbox][6]="S";
					if($("#checkidC"+nomccheck).prop('checked')){array[idcheckbox][7]="S";}else{array[idcheckbox][7]="N";}
				}else{array[idcheckbox][6]="N";
					if($("#checkidC"+nomccheck).prop('checked')){array[idcheckbox][7]="S";}else{array[idcheckbox][7]="N";}
				}
			}	
		}
		console.log(array);
	}	

		
	$("#guardar").click(function () {
		var Agregar = true;
		var mensaje_error = "";
		var Id_Cargo=$("#Id_Cargo").val();
		var Nom_Cargo=$.trim($("#Nom_Cargo").val());
		var Tipo=0;
		var strDatos=""; 
		
		if (Nom_Cargo.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Nombre del Cargo<br />";
		}
		
		
		if (array.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Selecciona una Opci&oacute;n del Menu<br />";
		}
		
		
		if(array.length>0){
			var contadorN=0;
			var contadorS=0;
			var contadorA=0;
			var contadorM=0;
			for(var i=0; i< array.length; i++){
				if(array[i]!=undefined){
					//Se incrementa el contador cada vez que se encuentra el array solo con el estatus N(L,A,B,C) 
					if(array[i][4]=="N"&&array[i][5]=="N"&&array[i][6]=="N"&&array[i][7]=="N"){
						contadorN=contadorN+1;	
					}
					
					//Se incrementa el contador siempre y cuando exista el estatus S en el array
					if(array[i][4]=="S"||array[i][5]=="S"||array[i][6]=="S"||array[i][7]=="S"){
						contadorS=contadorS+1;	
						
						if(array[i][3]==1){
							contadorA=contadorA+1;
						}

						if(array[i][3]==2){
							contadorM=contadorM+1;
						}	
					}
				}	
			}
			
			if(contadorA>0 && contadorM >0){
				Tipo=3;
			}else{
				if(contadorA>0){
					Tipo=1;
				}
				if(contadorM>0){
					Tipo=2;
				}	
			}
			
			if(contadorS<=0&&(contadorN > contadorS)){
				Agregar = false; 
				mensaje_error += " -Selecciona una Opci&oacute;n del Menu<br />";
			}
			
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		if(Agregar)
		{		
			
			if(Id_Cargo.length <= 0)
			{
				strDatos={
					Nom_Cargo:Nom_Cargo,
					Usr_Inser:"pruebas",
					Tipo:Tipo,
					Estatus_Reg:1,
					Arraymenu:array,//Envia el array hacia la fachada con los las posiciones de los checks seleccionados	
					accion:"guardardetalle"
				};	
			}
			else
			{
				strDatos={
					Id_Cargo:Id_Cargo,
					Nom_Cargo:Nom_Cargo,
					Tipo:Tipo,
					Usr_Mod:"pruebasmod",
					Estatus_Reg:2,
					Arraymenu:array,//Envia el array hacia la fachada con los las posiciones de los checks seleccionados	
					accion:"modificardetalle"
				};
			}	
			
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_cargos/Siga_cargosFacade.Class.php",        
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
						//Si se agrego el registro bien, oculta el popup(miModal)
						$('#myModal').modal('hide');
						//Recarga la tabla
						$('#displayCARGOS').DataTable().ajax.reload();
						
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
		//$("#muestrotablamenu").html("");
		$("#Id_Cargo").val("");
		$("#Nom_Cargo").val("");
		array=[];
		//arrayllenacheck=[];
		cont_men_sub=0;
		//formarmenu();
		//alert("2");
		//desmarcaractivofijo();
		$("input:checkbox").prop('checked', false);
	}

	//Pasar Valores al Editar
	pasarvalores=function(id) {
		limpiarcampos();
        if (id != "") {
            $.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_cargos/Siga_cargosFacade.Class.php",
                async: false,
                data: {
                    Id_Cargo: id,
                    accion: "consultar"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
                        $("#Id_Cargo").val(data.data[0].Id_Cargo);
						$("#Nom_Cargo").val(data.data[0].Nom_Cargo);
						//Cargamos el menu dependiendo del perfil
						//formarmenu(data.data[0].Id_Cargo);
						pasarvalmenuperfil(data.data[0].Id_Cargo);
						$('#myModal').modal('show');
                    }
                },
                error: function () {
                    mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
        }
    }
	
	pasarvalmenuperfil=function(Id_Cargo){
		//$("input:checkbox").prop('checked', false);
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_det_cargos/Siga_det_cargosFacade.Class.php",        
			async: false,
			data: {
				Estatus_Reg:"1",
				Id_Cargo:Id_Cargo,
				accion:"consultar"
			},
			dataType: "html",
			beforeSend: function (xhr) {
        
			},
			success: function (data) {
				var data;
				data = eval("(" + data + ")");
				
				if (data.totalCount > 0) {
					//Recargamos los checkbox mediante el arreglo y su posicion
					for(var i=0; i < data.totalCount; i++){
						//Cargar Menu
						if(data.data[i].Id_Menu!="0" && data.data[i].Id_Submenu=="0"){
							if(data.data[i].Lectura=="S"){
								$(".menuL"+data.data[i].Id_Menu).prop( "checked",true);
								//Mandamos el value del check para poder pasar la posicion
								arraychek($(".menuL"+data.data[i].Id_Menu).val(),data.data[i].Id_Menu,data.data[i].Id_Submenu,data.data[i].Id_Aplicacion);
							}
							
							if(data.data[i].Alta=="S"){
								$(".menuA"+data.data[i].Id_Menu).prop( "checked",true);
								arraychek($(".menuA"+data.data[i].Id_Menu).val(),data.data[i].Id_Menu,data.data[i].Id_Submenu,data.data[i].Id_Aplicacion);	
							}
							
							if(data.data[i].Baja=="S"){
								$(".menuB"+data.data[i].Id_Menu).prop( "checked",true);
								arraychek($(".menuB"+data.data[i].Id_Menu).val(),data.data[i].Id_Menu,data.data[i].Id_Submenu,data.data[i].Id_Aplicacion);
							}
							
							if(data.data[i].Cambio=="S"){
								$(".menuC"+data.data[i].Id_Menu).prop( "checked",true);
								arraychek($(".menuC"+data.data[i].Id_Menu).val(),data.data[i].Id_Menu,data.data[i].Id_Submenu,data.data[i].Id_Aplicacion);
							}
						}
						//Cargar Submenu
						if(data.data[i].Id_Menu!="0" && data.data[i].Id_Submenu!="0"){
							if(data.data[i].Lectura=="S"){
								$(".submenuL"+data.data[i].Id_Submenu).prop( "checked",true);
								arraychek($(".submenuL"+data.data[i].Id_Submenu).val(),data.data[i].Id_Menu,data.data[i].Id_Submenu,data.data[i].Id_Aplicacion);
							}
							
							if(data.data[i].Alta=="S"){
								$(".submenuA"+data.data[i].Id_Submenu).prop( "checked",true);
								arraychek($(".submenuA"+data.data[i].Id_Submenu).val(),data.data[i].Id_Menu,data.data[i].Id_Submenu,data.data[i].Id_Aplicacion);
							}
							
							if(data.data[i].Baja=="S"){
								$(".submenuB"+data.data[i].Id_Submenu).prop( "checked",true);
								arraychek($(".submenuB"+data.data[i].Id_Submenu).val(),data.data[i].Id_Menu,data.data[i].Id_Submenu,data.data[i].Id_Aplicacion);
							}
							
							if(data.data[i].Cambio=="S"){
								$(".submenuC"+data.data[i].Id_Submenu).prop( "checked",true);
								arraychek($(".submenuC"+data.data[i].Id_Submenu).val(),data.data[i].Id_Menu,data.data[i].Id_Submenu,data.data[i].Id_Aplicacion);
							}
						}
					}
				}
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}	
	
	
	////////////////////////////////////llenar checks
	$("#llenaractivofijo").click(function () {
		
		if(arrayllenacheck.length>0){			
			for(var i=0; i<(arrayllenacheck.length);i++){
				if(arrayllenacheck[i][3]=="1"){
					//Llenar Menu automaticamente
					if(arrayllenacheck[i][1]!="0" && arrayllenacheck[i][2]=="0"){
						$(".menuL"+arrayllenacheck[i][1]).prop( "checked",true);
						//						Id_Menu						Id_Menu					Id_Submenu			Id_Aplicacion
						arraychek($(".menuL"+arrayllenacheck[i][1]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
						$(".menuA"+arrayllenacheck[i][1]).prop( "checked",true);
						arraychek($(".menuA"+arrayllenacheck[i][1]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
						$(".menuB"+arrayllenacheck[i][1]).prop( "checked",true);
						arraychek($(".menuB"+arrayllenacheck[i][1]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
						$(".menuC"+arrayllenacheck[i][1]).prop( "checked",true);
						arraychek($(".menuC"+arrayllenacheck[i][1]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
					}
					
					//Llenar Submenu automaticamente
					if(arrayllenacheck[i][1]!="0" && arrayllenacheck[i][2]!="0"){
						$(".submenuL"+arrayllenacheck[i][2]).prop( "checked",true);
						//						Id_Submenu						Id_Menu					Id_Submenu			Id_Aplicacion
						arraychek($(".submenuL"+arrayllenacheck[i][2]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
						$(".submenuA"+arrayllenacheck[i][2]).prop( "checked",true);
						arraychek($(".submenuA"+arrayllenacheck[i][2]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
						$(".submenuB"+arrayllenacheck[i][2]).prop( "checked",true);
						arraychek($(".submenuC"+arrayllenacheck[i][2]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
						$(".submenuC"+arrayllenacheck[i][2]).prop( "checked",true);
						arraychek($(".submenuC"+arrayllenacheck[i][2]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
					}	
				}	
			}
		}
		
	});
	
	
	$("#llenarmesaayuda").click(function () {		
		if(arrayllenacheck.length>0){			
			for(var i=0; i<(arrayllenacheck.length);i++){
				if(arrayllenacheck[i][3]=="2"){
					//Llenar Menu automaticamente
					if(arrayllenacheck[i][1]!="0" && arrayllenacheck[i][2]=="0"){
						$(".menuL"+arrayllenacheck[i][1]).prop( "checked",true);
						//						Id_Menu						Id_Menu					Id_Submenu			Id_Aplicacion
						arraychek($(".menuL"+arrayllenacheck[i][1]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
						$(".menuA"+arrayllenacheck[i][1]).prop( "checked",true);
						arraychek($(".menuA"+arrayllenacheck[i][1]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
						$(".menuB"+arrayllenacheck[i][1]).prop( "checked",true);
						arraychek($(".menuB"+arrayllenacheck[i][1]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
						$(".menuC"+arrayllenacheck[i][1]).prop( "checked",true);
						arraychek($(".menuC"+arrayllenacheck[i][1]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
					}
					
					//Llenar Submenu automaticamente
					if(arrayllenacheck[i][1]!="0" && arrayllenacheck[i][2]!="0"){
						$(".submenuL"+arrayllenacheck[i][2]).prop( "checked",true);
						//						Id_Submenu						Id_Menu					Id_Submenu			Id_Aplicacion
						arraychek($(".submenuL"+arrayllenacheck[i][2]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
						$(".submenuA"+arrayllenacheck[i][2]).prop( "checked",true);
						arraychek($(".submenuA"+arrayllenacheck[i][2]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
						$(".submenuB"+arrayllenacheck[i][2]).prop( "checked",true);
						arraychek($(".submenuC"+arrayllenacheck[i][2]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
						$(".submenuC"+arrayllenacheck[i][2]).prop( "checked",true);
						arraychek($(".submenuC"+arrayllenacheck[i][2]).val(),arrayllenacheck[i][1],arrayllenacheck[i][2],arrayllenacheck[i][3]);
					}	
				}	
			}
		}
	});

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
							url: "../fachadas/activos/siga_cargos/Siga_cargosFacade.Class.php",        
							async: false,
							data: {
								Id_Cargo: id,
								Estatus_Reg: '3',
								Usr_Mod: 'Pruelimina',
								accion: "eliminacionlogica"
							},
							dataType: "html",
							beforeSend: function (xhr) {

							},
							success: function (datos) {
								var json;
								json = eval("(" + datos + ")"); //Parsear JSON
								
								if(json.totalCount>0){
									mensajesalerta("&Eacute;xito", "Eliminado Correctamente.", "success", "dark");		
								}	
								else{
									mensajesalerta("Oh No!", "Ocurrio un error al eliminar.", "error", "dark");
								}
								$('#displayCARGOS').DataTable().ajax.reload();
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
		
});	

</script>
