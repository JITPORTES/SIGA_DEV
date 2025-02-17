<script>

var contador_entr_menu=0;

//Funciones Para  Cargar Multiples archivos
function carga_arch_multiples(name_upload, div_control, div_lista, url_hidden, url_upload, vista_imagen, Show_upload, tipo_archivo, nombre_label){
	
	var array_extension= [];
	if(tipo_archivo==""){
		array_extension=["jpg", "jpeg", "png", "bmp", "gif", "pdf", "docx", "doc", "xls", "xlsx", "ppt","pptx", "heic", "HEIC" ];
	}else{
		array_extension=[tipo_archivo];
	}
	var Todos="";
	//inicializar el file upload
	$('#'+name_upload).fileinput({
		uploadUrl: "../Archivos/upload.php?carpeta="+url_upload+"",
		uploadAsync: true,
		showUpload: Show_upload,
		showRemove: false,
		showZoom: false,
		showPreview: vista_imagen,
		previewFileType: "text",
		minFileCount: 1,
		maxFileCount: 1,
		allowedFileExtensions: array_extension,
		browseClass: "btn chs",
		//validateInitialCount: true,
		language: 'es',
		initialPreviewAsData: true, // defaults markup
		initialPreviewFileType: 'image' // image is the default and can be overridden in config below
	}).on("filebatchselected", function (event, files) {
		$('.kv-file-upload').click();
		mensajesalerta("&Eacute;xito", "Se ha cargado el Archivo con Éxito, se muestra enseguida en la lista de abajo.", "success", "dark");	
	});

	//Cargar Archivo
	$('#'+name_upload).on('fileuploaded', function (event, data, previewId, index) {
		var arch=$('#'+url_hidden).val();
		var form = data.form, files = data.files, extra = data.extra,
		response = data.response, reader = data.reader;
		if(arch.length > 0) {
			Todos = "si";
			arch = arch + "---" + response.initialPreviewConfig[0].caption;
			$('#'+url_hidden).val(arch);
			//Muestra en un div el listado de los archivos Adjuntos
			mostrar_archivos_lista(arch, div_lista, url_upload, Todos, url_hidden,"");
		}
		else {
			Todos = "no";
			$('#'+url_hidden).val(response.initialPreviewConfig[0].caption);
			mostrar_archivos_lista(response.initialPreviewConfig[0].caption, div_lista, url_upload, Todos, url_hidden,"");
		}
		
		//Limpia Control Multiple
		var valor_hidden="";
		var valor_hidden=$("#"+url_hidden).val();
		
		var Adjuntos="";
		Adjuntos='<label for="attach-1" class="control-label"  style="font-size: 11px;">'+nombre_label+'</label>';			  
		Adjuntos+='<input id="'+name_upload+'" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
		Adjuntos+='<input type="hidden" id="'+url_hidden+'" value="'+valor_hidden+'">';
			
		$("#"+div_control).html(Adjuntos);
		carga_arch_multiples(name_upload, div_control, div_lista, url_hidden, url_upload, vista_imagen, Show_upload, tipo_archivo, nombre_label);
		///////////////////////////////////////////
		
		
		var Pre=previewId.split("-");
		
		//Al subir un archivo en automatico se borra su contenedor
		$("#"+Pre[0]+"-"+Pre[1]+"-init_"+Pre[2]).remove();
		$("#"+Pre[0]+"-"+Pre[1]+"-"+Pre[2]).remove();
		$(".form-control file-caption").html("");
		
	});
	
	
    $('#'+name_upload).on("filepredelete", function(event, data, previewId, index) {
		var abort = true;
		if (confirm("Esta Seguro de eliminar el archivo")) {
			
			var valor=$('#'+url_hidden).val();
			if(valor.length>0){
				//Partimoa nustra cadena 
				var arreglo = valor.split("---");
				//Recorremos la cadena convertida en array
				
				var resultado_cadena="";
				for(var i=0; i<arreglo.length;i++){
					if(arreglo.length>1){
						if(arreglo[i]!=data){
							resultado_cadena=arreglo[i]+"---"+resultado_cadena;
						}
					}else{
						$('#'+url_hidden).val("");
						$('#'+div_lista).html("");
					}
				}
				
				if(resultado_cadena!=""){
					resultado_cadena=resultado_cadena.substring(0, resultado_cadena.length-3)
					$('#'+url_hidden).val(resultado_cadena);
					//Muestra en un div el listado de los archivos Adjuntos
					//mostrar_archivos_lista(resultado_cadena, div_lista, url_upload, "si", url_hidden);
				}
			}else{
				$('#'+url_hidden).val("");
				$('#'+div_lista).html("");
			}
			abort = false;
		
			if($('#'+url_hidden).val()!=""){
				var encontrado = $('#'+url_hidden).val().indexOf("---");
				if(encontrado!=-1){
					mostrar_archivos_lista($('#'+url_hidden).val(), div_lista, url_upload, "si", url_hidden,"");
				}else{
					mostrar_archivos_lista($('#'+url_hidden).val(), div_lista, url_upload, "no", url_hidden,"");
				}
			}else{
				$('#'+div_lista).html("");
			}
		}
		return abort;
	});
	
}

//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/

function carga_arch_multiples_solo_imagenes(name_upload, div_control, div_lista, url_hidden, url_upload, vista_imagen, Show_upload, tipo_archivo, nombre_label){
	
	var array_extension= [];
	if(tipo_archivo==""){
		array_extension=["jpg", "jpeg", "png", "gif", "heic", "HEIC"];
	}else{
		array_extension=[tipo_archivo];
	}
	var Todos="";
	//inicializar el file upload
	$('#'+name_upload).fileinput({
		uploadUrl: "../Archivos/upload.php?carpeta="+url_upload+"",
		uploadAsync: true,
		showUpload: Show_upload,
		showRemove: false,
		showZoom: false,
		showPreview: vista_imagen,
		previewFileType: "text",
		minFileCount: 1,
		maxFileCount: 1,
		allowedFileExtensions: array_extension,
		browseClass: "btn chs",
		//validateInitialCount: true,
		language: 'es',
		initialPreviewAsData: true, // defaults markup
		initialPreviewFileType: 'image' // image is the default and can be overridden in config below
	}).on("filebatchselected", function (event, files) {
		$('.kv-file-upload').click();
		mensajesalerta("&Eacute;xito", "Se ha cargado el Archivo con Éxito.", "success", "dark");	
	});

	//Cargar Archivo
	$('#'+name_upload).on('fileuploaded', function (event, data, previewId, index) {	
		var arch=$('#'+url_hidden).val();
		
		var form = data.form, files = data.files, extra = data.extra,
		response = data.response, reader = data.reader;
		if(arch.length>0){
			Todos="si";
			arch=arch+"---"+response.initialPreviewConfig[0].caption;
			$('#'+url_hidden).val(arch);
			//Muestra en un div el listado de los archivos Adjuntos
			mostrar_archivos_lista(arch, div_lista, url_upload, Todos, url_hidden,"");
		}
		else{
			Todos="no";
			$('#'+url_hidden).val(response.initialPreviewConfig[0].caption);
			mostrar_archivos_lista(response.initialPreviewConfig[0].caption, div_lista, url_upload, Todos, url_hidden,"");
		}
		
		//Limpia Control Multiple
		var valor_hidden="";
		var valor_hidden=$("#"+url_hidden).val();
		
		var Adjuntos="";
		Adjuntos='<label for="attach-1" class="control-label"  style="font-size: 11px;">'+nombre_label+'</label>';			  
		Adjuntos+='<input id="'+name_upload+'" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
		Adjuntos+='<input type="hidden" id="'+url_hidden+'" value="'+valor_hidden+'">';
			
		$("#"+div_control).html(Adjuntos);
		carga_arch_multiples(name_upload, div_control, div_lista, url_hidden, url_upload, vista_imagen, Show_upload, tipo_archivo, nombre_label);
		///////////////////////////////////////////
		
		
		var Pre=previewId.split("-");
		
		//Al subir un archivo en automatico se borra su contenedor
		$("#"+Pre[0]+"-"+Pre[1]+"-init_"+Pre[2]).remove();
		$("#"+Pre[0]+"-"+Pre[1]+"-"+Pre[2]).remove();
		$(".form-control file-caption").html("");
		
	});
	
	
    $('#'+name_upload).on("filepredelete", function(event, data, previewId, index) {
		var abort = true;
		if (confirm("Esta Seguro de eliminar el archivo")) {
			
			var valor=$('#'+url_hidden).val();
			if(valor.length>0){
				//Partimoa nustra cadena 
				var arreglo = valor.split("---");
				//Recorremos la cadena convertida en array
				
				var resultado_cadena="";
				for(var i=0; i<arreglo.length;i++){
					if(arreglo.length>1){
						if(arreglo[i]!=data){
							resultado_cadena=arreglo[i]+"---"+resultado_cadena;
						}
					}else{
						$('#'+url_hidden).val("");
						$('#'+div_lista).html("");
					}
				}
				
				if(resultado_cadena!=""){
					resultado_cadena=resultado_cadena.substring(0, resultado_cadena.length-3)
					$('#'+url_hidden).val(resultado_cadena);
					//Muestra en un div el listado de los archivos Adjuntos
					//mostrar_archivos_lista(resultado_cadena, div_lista, url_upload, "si", url_hidden);
				}
			}else{
				$('#'+url_hidden).val("");
				$('#'+div_lista).html("");
			}
			abort = false;
		
			if($('#'+url_hidden).val()!=""){
				var encontrado = $('#'+url_hidden).val().indexOf("---");
				if(encontrado!=-1){
					mostrar_archivos_lista($('#'+url_hidden).val(), div_lista, url_upload, "si", url_hidden,"");
				}else{
					mostrar_archivos_lista($('#'+url_hidden).val(), div_lista, url_upload, "no", url_hidden,"");
				}
			}else{
				$('#'+div_lista).html("");
			}
		}
		return abort;
	});
	
}


//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/

	// Esta funcion estaba antes, se cambio debido a que no funcionaba en internet explorer
	// function mostrar_archivos_lista(Url_Concatenada, div_lista, Ruta_Archivo, Todos, url_hidden, elimina_archivos=""){
	// Función que carga la lista de imagenes (Modificación del Activo por ejemplo)
	function mostrar_archivos_lista(Url_Concatenada, div_lista, Ruta_Archivo, Todos, url_hidden, elimina_archivos){
		var elimina_archivos_ = "";
		if(elimina_archivos.length > 0) { elimina_archivos_ = elimina_archivos; }
		var ul = new Array();

		if(Todos == "si") {
			//Partimos nustra cadena 
			var array_arch = Url_Concatenada.split("---");
			//Recorremos la cadena convertida en array
			var Cadena_Arch = "";
			ul.push("<ul class='lista_" + div_lista + "'>");
			if(array_arch.length > 0) {
				for(var i = 0; i < array_arch.length; i++) {
					if (array_arch.length > 1) {
						if (array_arch[i]!=data) {
							var id_ul = array_arch[i].split(".");
							ul.push('<li id="'+id_ul[0]+'"><a rel="author" href="' + Ruta_Archivo + "/" + array_arch[i] + '" target="_blank">Ver Archivo ' + (i + 1) + '</a>&nbsp;<span class="span-img-borrar" onclick="eliminar_archivo(\''+Ruta_Archivo+"/"+array_arch[i]+'\',\''+url_hidden+'\',\''+array_arch[i]+'\',\''+elimina_archivos_+'\')")"><i class="fa fa-trash" aria-hidden="true"></i></span>');
						}
						// Muestra la primera imagen de la lista
						if (div_lista == "divFoto_lista") {
							if(i == 0) {
								$("#Carrusel_Fotos").html('<img src="' + Ruta_Archivo + "/" + array_arch[i] + '" class="img-inventario-tabla">');
							}
						}
					}
				}
			}
			ul.push("</ul>");
		}
		else {
			var id_ul = Url_Concatenada.split(".");
			ul.push("<ul class='lista_" + div_lista + "'>");
			ul.push('<li id="' + id_ul[0] + '"><a rel="author" href="'+Ruta_Archivo+"/"+Url_Concatenada+'" target="_blank">Ver Archivo '+(1)+'</a>&nbsp;<span class="span-img-borrar" onclick="eliminar_archivo(\''+Ruta_Archivo+"/"+Url_Concatenada+'\',\''+url_hidden+'\',\''+Url_Concatenada+'\',\''+elimina_archivos_+'\')"><i class="fa fa-trash" aria-hidden="true"></i></span>');
			ul.push("</ul>");
			if(div_lista == "divFoto_lista") {
				// Muesta la única imagen
				$("#Carrusel_Fotos").html('<img src="'+Ruta_Archivo+"/"+Url_Concatenada+'" class="img-inventario-tabla">');
			}
		}
		$('#' + div_lista).html(ul.join(""));
	}

//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/

function eliminar_archivo(url_archivo, url_hidden, solo_archivo, elimina_archivos){
	if (confirm("Esta Seguro de eliminar el archivo")) {
		
		if(elimina_archivos!="no")
		{
			$.ajax({
				type: "POST",
				url: "../Archivos/borrar_archivo.php",        
				async: false,
				data: {
					url:url_archivo,
					accion:"borrar_archivo"
				},
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (data) {
					var json;
					json = eval("(" + data + ")"); //Parsear JSON
					
					if(json.totalCount > 0){
						mensajesalerta("&Eacute;xito", json.text, "success", "dark");	
					}else{
						mensajesalerta("Oh No!", json.text, "error", "dark");
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
		}
		//Elimina la url del textbox
		var valor=$('#'+url_hidden).val();
		if(valor.length>0){
			//Partimoa nustra cadena 
			var arreglo = valor.split("---");
			//Recorremos la cadena convertida en array
			var resultado_cadena="";
			for(var i=0; i<arreglo.length;i++){
				if(arreglo.length>1){
					if(arreglo[i]!=solo_archivo){
						resultado_cadena=arreglo[i]+"---"+resultado_cadena;
					}
				}else{
					$('#'+url_hidden).val("");
				}
			}
			
			
			if(resultado_cadena!=""){
				resultado_cadena=resultado_cadena.substring(0, resultado_cadena.length-3)
				$('#'+url_hidden).val(resultado_cadena);
				//Muestra en un div el listado de los archivos Adjuntos
				//mostrar_archivos_lista(resultado_cadena, div_lista, url_upload, "si", url_hidden);
			}
		}else{
			$('#'+url_hidden).val("");
		}
		
		//Se borra el ul del div lista
		var id_ul=solo_archivo.split(".");
		$("#"+id_ul[0]).remove();
	}
}

//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/

function carga_arch_mesa(name_upload, url_hidden, url_upload,vista_imagen,Show_upload){
	//inicializar el file upload
	$('#'+name_upload).fileinput({
		uploadUrl: "../Archivos/upload.php?carpeta="+url_upload+"",
		uploadAsync: true,
		showUpload: Show_upload,
		showRemove: false,
		showZoom: false,
		showPreview: vista_imagen,
		previewFileType: "text",
		allowedFileExtensions: ["jpg", "png", "bmp", "gif", "pdf", "PDF", "docx", "doc", "xls", "xlsx", "ppt","pptx", "heic", "HEIC", "txt", "TXT", "sql", "SQL"],
    //allowedFileExtensions: ["jpg", "png", "bmp", "gif", "pdf", "docx", "doc", "xls", "xlsx", "ppt","pptx", "heic", "HEIC"],
		browseClass: "btn chs",
		//validateInitialCount: true,
		language: 'es',
		initialPreviewAsData: true, // defaults markup
		initialPreviewFileType: 'image' // image is the default and can be overridden in config below
	
	}).on("filebatchselected", function (event, files) {
		$('.kv-file-upload').click();
		mensajesalerta("&Eacute;xito", "Se ha cargado el Archivo con Éxito.", "success", "dark");	
		//$('.fileinput-upload-button').click();
  });
	//Cargar Archivo
	$('#'+name_upload).on('fileuploaded', function (event, data, previewId, index) {
		var arch=$('#'+url_hidden).val();
		
		var form = data.form, files = data.files, extra = data.extra,
		response = data.response, reader = data.reader;
		if(arch.length>0){
			arch=arch+"---"+response.initialPreviewConfig[0].caption;
			$('#'+url_hidden).val(arch);
		}else{
			$('#'+url_hidden).val(response.initialPreviewConfig[0].caption);
		}
		$("#botonEnviar").html("Enviar Archivo");
	});
	   
    $('#'+name_upload).on("filepredelete", function(event, data, previewId, index) {
		
		var abort = true;
		if (confirm("Esta Seguro de eliminar el archivo")) {
			
			var valor=$('#'+url_hidden).val();
			if(valor.length>0){
				
				//Partimoa nustra cadena 
				var arreglo = valor.split("---");
				//Recorremos la cadena convertida en array
				
				var resultado_cadena="";
				for(var i=0; i<arreglo.length;i++){
					if(arreglo.length>1){
						if(arreglo[i]!=data){
							resultado_cadena=arreglo[i]+"---"+resultado_cadena;
						}
					}else{
						$('#'+url_hidden).val("");
					}
				}
				
				if(resultado_cadena!=""){
					resultado_cadena=resultado_cadena.substring(0, resultado_cadena.length-3)
					$('#'+url_hidden).val(resultado_cadena);
				}
				
			}else{
				$('#'+url_hidden).val("");
			}
			abort = false;
		}
		return abort;
	});
   
	
}
	
//Codigo Javascript
$(document).ready(function(){

	//Agregamos la clase al menu para que se haga responsivo
	$("#Mi_Body").addClass("sidebar-collapse");

	nombre_usuario();
	function nombre_usuario(){
		var Id_Usuario=$("#usuariosesion").val();
		if(Id_Usuario!=""){
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",
				async: false,
				data: {
					Estatus_Reg:"1",
					Id_Usuario: Id_Usuario,
					accion: "consultar"
				},
				dataType: "html",
				beforeSend: function (xhr) {

				},
				
				success: function (data) {
					data = eval("(" + data + ")");
					if (data.totalCount > 0) {
						$("#Inicio_Nom_Usr").html(data.data[0].Nombre_Usuario);
						$("#Usuario_Logueado").val(data.data[0].Nombre_Usuario);
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
		}
		
	}
	
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/

	//Cargamos las areas y cargos desde Inicio
	cargartablaareas();	
	cargartablaperfiles();
	notificaciones_menu();
	
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/

	function cargartablaareas(){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_usuario_areas/Siga_usuario_areasFacade.Class.php",        
			async: false,
			data: {
				Id_Usuario:<?php echo $Id_Usuario;?>,
				accion:"consultarareas"
			},
			dataType: "html",
			beforeSend: function (xhr) {
		
			},
			success: function (data) {
				var li="";
				var data;
				data = eval("(" + data + ")");
				
				if (data.totalCount > 0){
					contadorareas=data.totalCount;
					li='';
					$("#areaactivo").html(data.data[0].Nom_Area);
					$("#idareasesion").val(data.data[0].Id_Area);
					var Nombre_Area="";
					
					for(var i = 0; i < data.totalCount; i++){
						li+='<li><a href="#" onclick="cambiodearea(\''+data.data[i].Id_Area+'\',\''+data.data[i].Nom_Area+'\')">'+data.data[i].Nom_Area+'</a></li>';
						if("<?php echo $variable_ir_inventario_area;?>"!=""){
							if("<?php echo $variable_ir_inventario_area;?>"==data.data[i].Id_Area){
								Nombre_Area=data.data[i].Nom_Area;
							}
						}
					}
					li+='';	
				
				}
				$("#areasli").html(li);
				
				if("<?php echo $variable_ir_inventario_area;?>"!=""){
					if(Nombre_Area!=""){
						//No se llama la funcion cambiodearea porque lo que se hace aqui es lo mismo que hace la funcion
						$("#areaactivo").html(Nombre_Area);
						$("#contenedorprincipalactivofijo").html("");
						$("#idareasesion").val("<?php echo $variable_ir_inventario_area;?>");
					}
				}
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}
	
	cambiodearea=function(Id_Area, Nom_Area){
		$("#areaactivo").html(Nom_Area);
		$("#contenedorprincipalactivofijo").html("");
		$("#idareasesion").val(Id_Area);
		cargartablaperfiles();
	}

//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
	
	function cargartablaperfiles(){
	    var url_sistema=$("#url_sistema").val();
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_usuario_cargos/Siga_usuario_cargosFacade.Class.php",        
			async: false,
			data: {
				Id_Usuario:<?php echo $Id_Usuario;?>,
				accion:"consultarcargos"
			},
			dataType: "html",
			beforeSend: function (xhr) {
		
			},
			success: function (data) {
				var li="";
				var data;
				data = eval("(" + data + ")");
				
				if (data.totalCount > 0){
					contadorareas=data.totalCount;
					li='';
					li+='<a href="#"><i class="fa fa-users" aria-hidden="true"></i><strong>Cambiar Cargo</strong></a>';
					
					$("#men_cargos_header").html(data.data[0].Nom_Cargo);
						//Solo se ejecuta cuando el cargo no viene de otra seccion mediante post
						if("<?php echo $variable_ir_inventario_perfil;?>"==""){
							if(data.data[0].Usr_Mod!="3"){
								clickmenucargos(data.data[0].Id_Cargo, data.data[0].Usr_Mod);	
							}else{
								clickmenucargos(data.data[0].Id_Cargo, 1);
							}
						}
					for(var i = 0; i < data.totalCount; i++){
						li+='<a href="#" onclick="cambiodecargo(\''+data.data[i].Id_Cargo+'\', \''+data.data[i].Nom_Cargo+'\');llamarmenucargos(\''+data.data[i].Id_Cargo+'\', \''+data.data[i].Usr_Mod+'\')"><i class="fa" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+data.data[i].Nom_Cargo+'</a>';
						
						//La variable que recibe puede variar si modifican el perfil Id_Cargo=62 (MESA DE AYUDA SOLICITANTE)
				    if(url_sistema=="1"){
						  if(data.data[i].Id_Cargo=="62"){
							  //cambiodecargo
							  $("#men_cargos_header").html(data.data[i].Nom_Cargo);
							  clickmenucargos(data.data[i].Id_Cargo, data.data[i].Usr_Mod);
						  }
				    }else{
							//Mesa de ayuda gestor
							if(url_sistema=="2"){
								//La variable que recibe puede variar si modifican el perfil Id_Cargo=62 (MESA DE AYUDA GESTOR)
								if(data.data[i].Id_Cargo=="63"){
									//cambiodecargo
									$("#men_cargos_header").html(data.data[i].Nom_Cargo);
									clickmenucargos(data.data[i].Id_Cargo, data.data[i].Usr_Mod);
								}
							}	
						}
						//Se ejecuta cuando el cargo viene de otra seccion
						if("<?php echo $variable_ir_inventario_perfil;?>"==data.data[i].Id_Cargo){
							$("#men_cargos_header").html(data.data[i].Nom_Cargo);
							clickmenucargos(data.data[i].Id_Cargo, data.data[i].Usr_Mod);
						}
				
				        // Si el perfil es Administardor de Activos / Super Usuario o Contadores habilita el tab de Contabilidad
						if (/*data.data[i].Id_Cargo=="59" ||*/ data.data[i].Id_Cargo=="64" || data.data[i].Id_Cargo=="65")
						{
							$.ajax({
							type: "POST",
							url: "../vistas/asignacargo.php",        
							async: false,
							data: {
								Id_Cargo: data.data[i].Id_Cargo,
							},
							dataType: "html",
							beforeSend: function (xhr) {
						
							},
							success: function (data) 
							{	
							}
							});
						}
						
					}
					
					<?php 
					echo $variable_ir_inventario_perfil="";
					echo $variable_ir_inventario_area="";					
					?>
				
				}
				$("#id_li_cargos").html(li);
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}

//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/	

	cambiodecargo=function(Id_Cargo, Nom_Cargo){
		$("#men_cargos_header").html(Nom_Cargo);
		$("#hddperfil").val(Id_Cargo);
	}

//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/

	llamarmenucargos=function(Id_Cargo, tipomenu){
		if(tipomenu!="3"){
			clickmenucargos(Id_Cargo, tipomenu);
		}else{
			clickmenucargos(Id_Cargo, "1");
		}
		$("#hddperfil").val(Id_Cargo);
	}

//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/

	function clickmenucargos(Id_Cargo, tipomenu){
	  
		var url_sistema=$("#url_sistema").val();
		
		if(url_sistema!="1"){
			contador_entr_menu=0;
		}
		$("#btnactivofijo").html("");
		$("#btnmesadeayuda").html("");
		$("#idmenusesion").val(tipomenu);
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
				var btnactivofijo="";
				var btnmesadeayuda="";
				var llenasubmenu="";
				var est_active_tick_solic_gest=0;
				if (data.totalCount > 0) {
					
					var contadorsubmenu=0;
					var contcerrarsubmenu=0;
					for(var i = 0; i < data.totalCount; i++){
						if(data.data[i].Id_Aplicacion=="1"){
							contadoractivofijo=contadoractivofijo+1;
						}
						
						if(data.data[i].Id_Aplicacion=="2"){
							contadormesadeayuda=contadormesadeayuda+1;
						}
						if(data.data[i].Padre=="N"){
							//Si el contador "contcerrarsubmenu" se encuentra con estatus 1, entonces existe un submenu y lo cerramos de igual manera se cambia el estatus del contador "contcerrarsubmenu" a 0
							if(contcerrarsubmenu==1){
								tabla+='  </ul>';
								tabla+='  </li>';
								contcerrarsubmenu=0;
							}
							//Menu Padre
							tabla+='<li id="li_men_'+data.data[i].Id_Menu+'"><a href="#noir" onclick="loadOptionBandejas(\''+data.data[i].Url_Menu+'?Id_Menu='+data.data[i].Id_Menu+'&Id_Submenu='+data.data[i].Id_Submenu+'\',\'contenedorprincipalactivofijo\',\''+data.data[i].Id_Det_Cargo+'\'),Activa_btn_menu(\'li_men_'+data.data[i].Id_Menu+'\', \'M\')"><i class="'+data.data[i].Icono+'"></i> <span>'+data.data[i].Nom_Menu+'</span></a></li>';
							if(data.data[i].Url_Menu=="inventario.php"){
								var variable_ir_inventario="<?php echo $variable_ir_inventario;?>";
								if(variable_ir_inventario!=""){
									loadOptionBandejas(data.data[i].Url_Menu+'?Id_Menu='+data.data[i].Id_Menu+'&Id_Submenu='+data.data[i].Id_Submenu+'&variable_ir_inventario='+variable_ir_inventario,'contenedorprincipalactivofijo',data.data[i].Id_Det_Cargo);
									Activa_btn_menu('li_men_'+data.data[i].Id_Menu, 'M');
								}
							}
							
							//Esto se ejecuta cuando a la solicitud se le envian parametros mediante post
							if(url_sistema=="1"){//Mesa de Ayuda Solicitante
								if(data.data[i].Id_Menu=="11"){
									if(contador_entr_menu==0){
										//alert(contador_entr_menu);
										loadOptionBandejas(data.data[i].Url_Menu+'?Id_Menu='+data.data[i].Id_Menu+'&Id_Submenu='+data.data[i].Id_Submenu+'&Id_Solicitud=<?php echo $url_id_solicitud;?>'+'&Est_Proceso=<?php echo $url_est_proceso;?>','contenedorprincipalactivofijo',data.data[i].Id_Det_Cargo);									
									}
									contador_entr_menu=contador_entr_menu+1;
								}
							}
							////////////////////////////////////////
							//
							if(data.data[i].Id_Menu=="11"||data.data[i].Id_Menu=="19"){
								if(data.data[i].Id_Menu=="19"){
									loadOptionBandejas(data.data[i].Url_Menu+'?Id_Menu='+data.data[i].Id_Menu+'&Id_Submenu='+data.data[i].Id_Submenu,'contenedorprincipalactivofijo',data.data[i].Id_Det_Cargo);
									est_active_tick_solic_gest=data.data[i].Id_Menu;
									//Activa_btn_menu('li_men_'+data.data[i].Id_Menu, 'M');
									$("#hddperfil").val(data.data[i].Id_Cargo);
								}
								
								if(data.data[i].Id_Menu=="11"&&contador_entr_menu==0){
									loadOptionBandejas(data.data[i].Url_Menu+'?Id_Menu='+data.data[i].Id_Menu+'&Id_Submenu='+data.data[i].Id_Submenu,'contenedorprincipalactivofijo',data.data[i].Id_Det_Cargo);
									est_active_tick_solic_gest=data.data[i].Id_Menu;
									//Activa_btn_menu('li_men_'+data.data[i].Id_Menu, 'M');
									$("#hddperfil").val(data.data[i].Id_Cargo);
									contador_entr_menu=0;
								}
							}
							
							if(data.data[i].Id_Menu=="25"){
								loadOptionBandejas(data.data[i].Url_Menu+'?Id_Menu='+data.data[i].Id_Menu+'&Id_Submenu='+data.data[i].Id_Submenu,'contenedorprincipalactivofijo',data.data[i].Id_Det_Cargo);
								est_active_tick_solic_gest=data.data[i].Id_Menu;
								//Activa_btn_menu('li_men_'+data.data[i].Id_Menu, 'M');
								$("#hddperfil").val(data.data[i].Id_Cargo);
							}
							/////////////////////////////////////////
						}
						else{
							//si el orden de submenu es igualigual a cero entra forma al submenu de igual manera cierra el submenu anterior
							if(data.data[i].Padre=="S"&&data.data[i].OrdenSubmenu==1){
								//Si contador menu y el contador que cierra el submenu son mayor a cero cierra el submenu
								if(contadorsubmenu>0&&contcerrarsubmenu>0)
								{
									tabla+='  </ul>';
									tabla+='  </li>';
								}
								contcerrarsubmenu=1;
								contadorsubmenu=0;
								//Forma el submenu desde inicio
								tabla+='<li class="treeview">';
								tabla+='  <a href="#">';
								tabla+='	<i class="'+data.data[i].Icono+'"></i> <span>'+data.data[i].Nom_Menu+'</span>';
								tabla+='	<span class="pull-right-container">';
								tabla+='	  <i class="fa fa-angle-left pull-right"></i>';
								tabla+='	</span>';
								tabla+='  </a>';
								tabla+='  <ul class="treeview-menu">';
							}
							
							if(data.data[i].Padre=="S"&&data.data[i].OrdenSubmenu>=1){
								//Forma el contenido del submenu
								// Excepción aplicada para el Area de Biomedica
								if(data.data[i].Url_Submenu != 'equipos_biomedicos.php' || (data.data[i].Url_Submenu == 'equipos_biomedicos.php' && $("#idareasesion").val() == 1)) {
									tabla+='	<li id="li_sub_'+data.data[i].Id_Submenu+'"><a href="#noir" onclick="loadOptionBandejas(\''+data.data[i].Url_Submenu+'?Id_Menu='+data.data[i].Id_Menu+'&Id_Submenu='+data.data[i].Id_Submenu+'\',\'contenedorprincipalactivofijo\',\''+data.data[i].Id_Det_Cargo+'\');Activa_btn_menu(\'li_sub_'+data.data[i].Id_Submenu+'\', \'S\')"><i class="fa fa-circle-o"></i>'+data.data[i].Submenu+'</a></li>';
								}
								contadorsubmenu=contadorsubmenu+1;
							}
						}
						
						if(i<contadoractivofijo){
							//muestra solo el menu de activo fijo
							bodyactivofijo+=tabla;
							tabla="";
							contadorambos=0;
						}else{
							//muestra solo el menu de mesa de ayuda
							bodymesadeayuda+=tabla;
							tabla="";
						}
						
					}
					//Tabla de activos fijos
					
					if(tipomenu=="1"){tabla+=bodyactivofijo;}
					if(tipomenu=="2"){tabla+=bodymesadeayuda;}
					
					
					if(contadoractivofijo>0&&contadormesadeayuda<1){
						btnactivofijo='<a href="#" class="active" onclick="llamarmenucargos(\''+Id_Cargo+'\', 1)">activo fijo</a>';
					}else{
						if(contadormesadeayuda>0&&contadoractivofijo<1){
							btnmesadeayuda='<a href="#" class="active" onclick="llamarmenucargos(\''+Id_Cargo+'\', 2)">mesa de ayuda</a>';
						}else{
							if(contadormesadeayuda>0&&contadoractivofijo>0&&tipomenu==1){
								btnactivofijo='<a href="#" class="active" onclick="llamarmenucargos(\''+Id_Cargo+'\', 1)">activo fijo</a>';
								btnmesadeayuda='<a href="#" onclick="llamarmenucargos(\''+Id_Cargo+'\', 2)">mesa de ayuda</a>';
							}else{
								if(contadormesadeayuda>0&&contadoractivofijo>0&&tipomenu==2){
									btnactivofijo='<a href="#" onclick="llamarmenucargos(\''+Id_Cargo+'\', 1)">activo fijo</a>';
									btnmesadeayuda='<a href="#" class="active" onclick="llamarmenucargos(\''+Id_Cargo+'\', 2)">mesa de ayuda</a>';
								}
							}
						}	
					}
				}
				else
				{
					alert("Ocurrio un error al consultar");
				}
				//Muestro botones con valores
				$("#btnactivofijo").html(btnactivofijo);
				$("#btnmesadeayuda").html(btnmesadeayuda);
				//Muestro el menu dependiendo de si es Activo Fijo o Mesa de Ayuda
				$("#menudinamico").html(tabla);
				$("#contenedorprincipalactivofijo").html("");
				if(est_active_tick_solic_gest>0){
					$('#li_men_'+est_active_tick_solic_gest).addClass("active");
				}
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}
	

//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/

	carga_notificaciones=function(){
		notificaciones_menu();
	}

	//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/

	function notificaciones_menu(){
		//Id_Usuario Logueado
		var Id_Usuario_Recibe=$("#usuariosesion").val();
		//Aplicacion
		var Id_Aplicacion=$("#idmenusesion").val();
		//Id_Area
		var Id_Area=$("#idareasesion").val();
		$.ajax({
			type: "POST",
			encoding:"UTF-8",
			url: "../fachadas/activos/siga_notificaciones/Siga_notificacionesFacade.Class.php",        
			async: true,
			data: {
				//Datos Notificacion
				Id_Usuario_Recibe:Id_Usuario_Recibe,
				Id_Aplicacion:Id_Aplicacion,
				//Id_Area:Id_Area,
				accion:"notificaciones_usuario"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				tabla="";
				contador_msj_no_leidos=0;
				if(json.totalCount>0){
					for (var i = 0; i < json.totalCount; i++){
						if(json.data[i].Estatus_Leido==0){
							contador_msj_no_leidos=contador_msj_no_leidos+1;
						}
						
						tabla+='<li>';
						tabla+='	<a href="#" onclick="Estatus_Leido(\''+json.data[i].Id_Notificacion+'\', \''+json.data[i].Nombre_Usuario+'\', \''+json.data[i].Fecha_Envio+'\')">';
						tabla+='	  <i class="text-aqua"></i><label>'+json.data[i].Fecha_Envio+'</label><br>'+json.data[i].Mensaje_Corto;
						tabla+='	</a>';
						tabla+='</li>';
									
					}
				}else{
						//tabla+='<tr><td colspan="6" align="center">Por el momento no tienes Notificaciones</td></tr>';
						tabla+='<li>';
						tabla+='	<a href="#">';
						tabla+='	  <i class="text-aqua"></i><label>Sin Notificaciones</label>';
						tabla+='	</a>';
						tabla+='</li>';
				}
				
				if(json.estatus!="ok"){
					mensajesalerta("Error", json.mensaje, "error", "dark"); 
				}
				
				$("#notificaciones_menu").html(tabla);
				$("#cantidad_notificaciones").html(contador_msj_no_leidos);
				$("#cantidad_notificaciones_header").html("Usted tiene "+contador_msj_no_leidos+" Notificaciones");
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}
	
	Estatus_Leido=function(Id_Notificacion, Nombre_Usuario, Fecha_Envio){
		$.ajax({
			type: "POST",
			encoding:"UTF-8",
			url: "../fachadas/activos/siga_notificaciones/Siga_notificacionesFacade.Class.php",        
			async: true,
			data: {
				//Datos Notificacion
				Id_Notificacion:Id_Notificacion,
				Estatus_Leido:"1",
				accion:"guardar"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				tabla="";
				contador_msj_no_leidos=0;
				if(json.totalCount>0){
					modal_notificaciones(Id_Notificacion, Nombre_Usuario, Fecha_Envio);
					notificaciones_menu();
					
				}else{
					mensajesalerta("Error", json.text, "error", "dark"); 
				}	
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}
	
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/

	modal_notificaciones=function(Id_Notificacion, Nombre_Usuario, Fecha_Envio){
		$.ajax({
			type: "POST",
			encoding:"UTF-8",
			url: "../fachadas/activos/siga_notificaciones/Siga_notificacionesFacade.Class.php",        
			async: true,
			data: {
				Estatus_Eliminado:"0",
				Id_Notificacion:Id_Notificacion,
				accion:"consultar"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				tabla="";
				contador_msj_no_leidos=0;
				if(json.totalCount>0){
					var Html='<div width="100%"><strong>Envi&oacute;</strong>: '+Nombre_Usuario+'  <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha y Hora:</strong> '+Fecha_Envio+'</div><br><br>';
					Html+=json.data[0].Mensaje_Largo;
					$("#Mensaje_Notificacion_Largo").html(Html);
					$("#Modal_Notificaciones").modal("show");
				
				}else{
					mensajesalerta("Error", json.text, "error", "dark"); 
				}
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}
	
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
	
	fileuploaded =function(name_upload, url_hidden, url_upload,vista_imagen,Show_upload){
		//inicializar el file upload
		$('#'+name_upload).fileinput({
			uploadUrl: "../Archivos/upload.php?carpeta="+url_upload+"",
			uploadAsync: true,
			showUpload: Show_upload,
			showRemove: false,
			showZoom: false,
			showPreview: vista_imagen,
			maxFileCount: 0,
			minFileCount: 0,
			browseClass: "btn chs",
			//validateInitialCount: true,
			language: 'es',
			initialPreviewAsData: true, // defaults markup
			initialPreviewFileType: 'image' // image is the default and can be overridden in config below
		
		});
		//Cargar Archivo
		$('#'+name_upload).on('fileuploaded', function (event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
			response = data.response, reader = data.reader;
			$('#'+url_hidden).val(response.initialPreviewConfig[0].caption);
		});
		
		//Eliminar Archivo
		$('#'+name_upload).on('filereset', function (event) {
			$('#'+url_hidden).val("");
		});
	}

//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/

	cargar_archivos = function(url_hidden, file_adjuntos, nombre_url, url_upload, vista_imagen, Show_upload){
		var extension_arch=obtengo_extension_arch(nombre_url);
		var initialPreviewConfigData=[];
		//Pasamos el nombre del archivo al hidden
		$("#" + url_hidden).val(nombre_url);
		
		if(extension_arch == "PDF"){
			initialPreviewConfigData={
				type: "pdf",
				filename:nombre_url,
				size: 8000,
				caption: nombre_url,
				url: '../Archivos/borrar.php?carpeta='+url_upload+'', 
				key: 1
			};
		}
		
		if(extension_arch=="JPG"||extension_arch=="PNG"||extension_arch=="XML"){
			initialPreviewConfigData={
				caption: nombre_url,
				filename:nombre_url,
				url: '../Archivos/borrar.php?carpeta='+url_upload+'', 
				key: nombre_url,
				downloadUrl: true
			};
		}
		
		$('#' + file_adjuntos).fileinput('refresh', {
			uploadAsync: true,
			showUpload: "Show_upload",
			showRemove: false,
			showZoom: false,
			showPreview: vista_imagen,
			overwriteInitial: false,
			initialPreview: [
				//NOMBRE IMAGEN CARGADA OBTENER EL NOMBRE DE LA CAJA DE TEXTO
				'' + url_upload + "/" + nombre_url + ''
				//"<img src='"+url_upload+"/" + nombre_url + "' class='kv-preview-data file-preview-image' style='width: 100%; height: 160px;' alt='Imagen Cargada' title='Imagen Cargada'>"
			],
			initialPreviewAsData: true, 
			initialPreviewFileType: 'image',
			initialPreviewConfig: [
				initialPreviewConfigData
    	    ],
			uploadExtraData: {
				img_key: "1000",
				img_keywords: "happy, nature",
			},
			preferIconicPreview: true, // this will force thumbnails to display icons for following file extensions
			previewFileIconSettings: { // configure your icon file extensions
				'doc': '<i class="fa fa-file-word-o text-primary"></i>',
				'xls': '<i class="fa fa-file-excel-o text-success"></i>',
				'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
				'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
				'zip': '<i class="fa fa-file-archive-o text-muted"></i>',
				'htm': '<i class="fa fa-file-code-o text-info"></i>',
				'txt': '<i class="fa fa-file-text-o text-info"></i>',
				'mov': '<i class="fa fa-file-movie-o text-warning"></i>',
				'mp3': '<i class="fa fa-file-audio-o text-warning"></i>',
				// note for these file types below no extension determination logic 
				// has been configured (the keys itself will be used as extensions)
				'jpg': '<i class="fa fa-file-photo-o text-danger"></i>', 
				'heic': '<i class="fa fa-file-photo-o text-danger"></i>', 
				'HEIC': '<i class="fa fa-file-photo-o text-danger"></i>', 
				'gif': '<i class="fa fa-file-photo-o text-muted"></i>', 
				'png': '<i class="fa fa-file-photo-o text-primary"></i>'
			},
			previewFileExtSettings: { // configure the logic for determining icon file extensions
				'pdf': function(ext) {
					return ext.match(/(doc|docx)$/i);
				},
				'xls': function(ext) {
					return ext.match(/(xls|xlsx)$/i);
				},
				'ppt': function(ext) {
					return ext.match(/(ppt|pptx)$/i);
				},
				'zip': function(ext) {
					return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
				},
				'htm': function(ext) {
					return ext.match(/(htm|html)$/i);
				},
				'txt': function(ext) {
					return ext.match(/(txt|ini|csv|java|php|js|css)$/i);
				},
				'mov': function(ext) {
					return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
				},
				'mp3': function(ext) {
					return ext.match(/(mp3|wav)$/i);
				}
			}
		})
		.on('filesorted', function(e, params) {
			console.log('File sorted params', params);
		})
		.on('fileuploaded', function(e, params) {
			console.log('File uploaded params', params);
		});
		
				
		//Cargar Archivo
		$('#'+file_adjuntos).on('fileuploaded', function (event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			$('#'+hidden_url).val(response.initialPreviewConfig[0].caption);
		});
		
		$('#'+file_adjuntos).on('filereset', function (event) {
			$('#'+hidden_url).val("");
		});
		
	}
	
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/
//*****************************************************************************************************************************************************************************/

	obtengo_extension_arch=function(archivo){
		var ext_archivo="";
		if(archivo!=""){
			ext_archivo = archivo.split('.');
			ext_archivo=ext_archivo[1].toUpperCase();
		}	
		return ext_archivo;
	}
	
	
	$(function () {
		loaded();
		//setInterval("validarConn()", 1000000);
	});
	
	function loaded() {
		updateOnlineStatus("load");
		document.body.addEventListener("offline", function () {
			updateOnlineStatus("offline")
		}, false);
		document.body.addEventListener("online", function () {
			updateOnlineStatus("online")
		}, false);
	};
	
	function updateOnlineStatus(msg) {
		var condition = navigator.onLine ? "ONLINE" : "OFFLINE";
		if (condition == "ONLINE") {
			//validarConn();
			$("#bloquear-internet").hide();
		} else if (condition == "OFFLINE") {
			$("#bloquear-internet").show();
		}
	};
	
	validarConn = function () {
		var f = Date();
		console.log(f);
		try {
			$.ajax({
				type: "GET",
				url: "../fachadas/activos/internet/internet.php",
				cache: false,
				async: false,
				global: false,
				dataType: "json",
				timeout: 3000,
				data: {
				},
				beforeSend: function (datos) {
				},
				success: function (datos) {
				console.log(datos);
				if (datos.status == "ok") {
					$("#bloquear-internet").hide();
				} else {
					$("#bloquear-internet").show();
				}
				},
				error: function (objeto, quepaso, otroobj) {
				//console.log(otroobj);
				}
			});
		} catch (e) {
			console.log(e);
		}
	};

	cerrar_ventana_archivos=function(){
		//$("#kvFileinputModal").remove();
		
		$("#kvFileinputModal").remove();//ocultamos el modal
		//$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
		$('.modal-backdrop').remove();//eliminamos el backdrop del modal
	}


	// Función para restablecer el control del subida de archivos
	// No hay imagenes para mostrar, por lo tanto, deberá eliminar la imagen previamente cargada de otra consulta
	function restablecerControlFileInput(IdFileInput) {
		$("#" + IdAreaArchivosPreview).html("");
		$("#" + IdFileInput).fileinput('refresh', { initialPreview: "", initialPreviewAsData: false });
	}
////////////////////////////////////////////////////

});

</script>