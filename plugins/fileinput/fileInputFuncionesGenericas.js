// Objeto Json para el paso de parámetros que indican la configuración para la subida de archivos
/*
var parametrosCargaArchivos = {
	nombreInputFile: "",
	div_control: "",
	div_lista: "",
	url_hidden: "",
	url_upload: null,
	vista_imagen: false,
	show_upload: false,
	tipo_archivo: null,
	nombre_label: null,
	accionAgregar: null,
	accionEliminar: null,
	accionListaElementos: null,
	accionDespuesSubida: null,
};
*/

// Funciones genericas para el manejo del componente input
var objetoInputCreadoPreviamente = false;
var objetoInputNombre;
var carpetaRaizArchivosLigados;
// Función que contiene las acciones de carga de archivos ligados
function subirArchivosVsObjeto(parametrosCargaArchivos) {
	$('#' + parametrosCargaArchivos.nombreInputFile).val("");
	$('#' + parametrosCargaArchivos.url_hidden).val("");
	$('#' + parametrosCargaArchivos.div_lista).val("");
	objetoInputNombre = parametrosCargaArchivos.nombreInputFile;

	// Genera la lista de elementos que fueron agregados previamente
	if(parametrosCargaArchivos.accionListaElementos != null) {
		parametrosCargaArchivos.accionListaElementos();
	}

	// Determina las extensiones de archivos soportados en la carga
	var array_extension = ["jpg", "jpeg", "png", "bmp", "gif", "pdf", "docx", "doc", "xls", "xlsx", "ppt","pptx", "heic", "HEIC","txt", "sql"];
	//var array_extension = ["jpg"];
	if(parametrosCargaArchivos.tipo_archivo != null) {
		array_extension = parametrosCargaArchivos.tipo_archivo;
	}

	// Inicialización del componente de subida de Archivos
	var carpetaAlmacenamiento = parametrosCargaArchivos.url_upload + ($.trim($("#" + parametrosCargaArchivos.idInputObjetoPrincipal).val()) != "" ? "\/" + $("#" + parametrosCargaArchivos.idInputObjetoPrincipal).val() : "");
	if($.trim($("#" + parametrosCargaArchivos.idInputObjetoPrincipal).val()) == "") { carpetaRaizArchivosLigados = parametrosCargaArchivos.url_upload; }

	if(!objetoInputCreadoPreviamente) {
		$('#' + parametrosCargaArchivos.nombreInputFile).fileinput({
			uploadUrl: "../Archivos/upload.php?modoNombradoArchivo=nombreoriginal&carpeta=" + carpetaAlmacenamiento,
			uploadAsync: true,
			showUpload: parametrosCargaArchivos.show_upload,
			showRemove: false,
			showZoom: false,
			showPreview: parametrosCargaArchivos.vista_imagen,
			previewFileType: "text",
			minFileCount: 1,
			maxFileCount: 5,
			maxFileSize: 10240,		// Máximo 10MB expresado en KB
			allowedFileExtensions: array_extension,
			browseClass: "btn chs",
			enableResumableUpload: true,
			// Elimina los botones de subida y zoom para las vistas previas de cada archivo a subir
			fileActionSettings: {
				showZoom: false,
				showUpload: false
			},
			//validateInitialCount: true,
			language: 'es',
			showUploadedThumbs: false,
			initialPreviewAsData: true, // defaults markup
			initialPreviewFileType: 'image' // image is the default and can be overridden in config below
		});
	
		// Acción para subir el archivo a la carpeta
		$('#' + parametrosCargaArchivos.nombreInputFile).on('fileuploaded', function (event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra, response = data.response, reader = data.reader;
			// Obtiene el nombre con el cual finalmemnte fue almacenado el archivo en el servidor
			$('#' + parametrosCargaArchivos.url_hidden).val(response.initialPreviewConfig[0].caption);
			
			if(parametrosCargaArchivos.accionAgregar != null) {
				// Almacena la relación entre el archivo subido y el elemento principal al cual se le agregó
				// Ejecuta la función que se encuentra definida dentro de la variable
				parametrosCargaArchivos.accionAgregar();
			}
			else if(parametrosCargaArchivos.accionListaElementos != null) {
				// Solo muestra la lista de elementos
				parametrosCargaArchivos.accionListaElementos();
			}
		});

		// Evento que se dispara una vez que se hayan subido la lista de archivos
		$('#' + parametrosCargaArchivos.nombreInputFile).on('filebatchuploadcomplete', function(event, preview, config, tags, extraData) {
			// Cuando ya se hayan subido todos los archivos que fueron agregados a la pila de archivos, se resetea el control
			// Se le agrega un retraso de limpieza para evitar que trate de leer propiedades del control aunque ya haya subido todos los archivos
			$('#' + parametrosCargaArchivos.nombreInputFile).fileinput('refresh').fileinput('clear').fileinput('enable');
			$('#' + parametrosCargaArchivos.url_hidden).val("");
			//console.log('File batch upload complete', preview, config, tags, extraData);

			// En caso de que se haya definido una función para seguir con otras actividades después de subir archivos
			if(parametrosCargaArchivos.accionDespuesSubida != null) {
				// El nombre de la función viene dentro del valor del parametro
				parametrosCargaArchivos.accionDespuesSubida();
			}
		});

		// En caso de que el objeto sea inicial y se necesite agregar junto con la ficha del objeto, se creará una lista de manera temporal sin que se suban los archivos fisicamente
		$('#' + parametrosCargaArchivos.nombreInputFile).on('filebatchselected', function(event, files) {
			// Indica que es una baka inicial
			if (parametrosCargaArchivos.show_upload == false) {
				var listaElementos = new Array();
				for(var i = 0; i < files.length; i++) {
					//listaElementos.push('<li><span class="span-img-borrar" data-consecutivo="' + i + '" onclick="eliminarListaPrevio(this);" title="Eliminar archivo"><i class="fa fa-trash kv-file-remove" aria-hidden="true"></i></span>&nbsp;|&nbsp;' + obtenerIconoArchivo(files[i].name) + '&nbsp;<a rel="author" href="#!"><span class="fa fa-pdf"></span>' + (i + 1) + '.- ' + files[i].name + '</a></li>');
					listaElementos.push('<li>' + obtenerIconoArchivo(files[i].name) + '<span class="fa fa-pdf"></span>&nbsp;' + (i + 1) + '.- ' + files[i].name + '</li>');
				}
				// Muestra el mensaje correspondiente
				if(listaElementos.length > 0) {
					$("#" + parametrosCargaArchivos.div_lista).html("<ul class='lista_divFoto_lista lista_div_2_cols'>" + listaElementos.join("") + "<li style='cursor: pointer;' onclick='eliminarListaTemporal(" + parametrosCargaArchivos.nombreInputFile + ");'><a href='#!'><span class='span-img-borrar'><i class='fa fa-trash kv-file-remove' aria-hidden='true'></i></span>Eliminar lista</a></li></ul>");
				}
			}
		});

		// El objeto deberá ser creado uan sola vez para evitar problemas con objetos duplicados
		objetoInputCreadoPreviamente = true;
	}
	else {
		// Limpia el objeto y cancela las posibles subidas de archivos previamente
		// Además actualiza si sube un archivo a la vez (en caso de edición de la ficha de baja) o sube un máximo de archivos en caso de ser una baja nueva
		// Para cuando se trate de una nueva baja, se muestra el previo, en otro caso, solo se suben archivos
		$('#' + parametrosCargaArchivos.nombreInputFile).fileinput('refresh', {
			uploadUrl: "../Archivos/upload.php?modoNombradoArchivo=nombreoriginal&carpeta=" + carpetaAlmacenamiento,
			showUpload: parametrosCargaArchivos.show_upload,
		})
		.fileinput('cancel')
		.fileinput('clear');
	}
}


// Función que elimina la lista temporal, cuando se trata de un objeto cuyos archvivos deban subirse junto con el registro del mismo objeto
function eliminarListaTemporal(inputFile) {
	$(inputFile).fileinput('clear');
	$("#ArchivosBajaAreaLista").html("");


	/*
	var fileInput = document.getElementById("ArchivosBajaAreaInputFile");
	// files is a FileList object (similar to NodeList)
	var files = fileInput.files;
	var file;

	// loop through files

	for (var i = 0; i < files.length; i++) {
		console.log(i + " vs " + $(elemento).data("consecutivo"));
		if(i != $(elemento).data("consecutivo")) {
			const blob = new Blob([files[i]], {type: files[i].type});
			$('#ArchivosBajaAreaInputFile').fileinput('readFiles', blob);
		}
		//console.log(files[i]);
		/*
		// get item
		file = files.item(i);
		//or
		file = files[i];
		//alert(file.name);
	}
			var reader = new FileReader();
		reader.onload = function() {
			console.log(reader.result);
			document.getElementById("display").src = reader.result;
			// image editing
			// ...
			var blob = window.dataURLtoBlob(reader.result);
			console.log(blob, new File([blob], "image.png", {
			type: "image/png"
			}));
		};
		reader.readAsDataURL(file);
	*/

	/*
	var filestack = $('#ArchivosBajaAreaInputFile').fileinput('getFileStack'), fstack = [];
	for(i=0; i<filestack.length; i++) {
		console.log(filestack[i].name);
		if(i == $(elemento).data("consecutivo")) {
			filestack.splice(i, 1);
		}
	}
	/*
	$.each(filestack, function(fileId, fileObj) {
		if (fileObj !== undefined) {
			fstack.push(fileObj);
		}
	});
	*/
	//console.log(filestack);
	//$('#ArchivosBajaAreaInputFile').fileinput('clear');
	//console.log($('#ArchivosBajaAreaInputFile').fileinput('getFileStack'));
	//console.log('Files selected - ' + fstack.length);
}


// Genera un icono para determinar el tipo de archivo
function obtenerIconoArchivo(nombreArchivo) {
	var ext = nombreArchivo.split('.').pop();
	if(ext.match(/(doc|docx)$/i)) ext = 'doc';
	if(ext.match(/(xls|xlsx)$/i)) ext = 'xls';
	if(ext.match(/(ppt|pptx)$/i)) ext = 'ppt';
	if(ext.match(/(zip|rar|tar|gzip|gz|7z)$/i)) ext = 'zip';
	if(ext.match(/(htm|html)$/i)) ext = 'htm';
	if(ext.match(/(txt|ini|csv|java|php|js|css)$/i)) ext = 'txt';
	if(ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i)) ext = 'mov';
	if(ext.match(/(mp3|wav)$/i)) ext = 'mp3';
	if(ext.match(/(png|jpg|jpge|bmp|gif)$/i)) ext = 'jpg';

	switch (ext) {
		case 'doc': return '<i class="fa fa-file-word-o text-primary"></i>'; break;
		case 'xls': return '<i class="fa fa-file-excel-o text-success"></i>'; break;
		case 'ppt': return '<i class="fa fa-file-powerpoint-o text-danger"></i>'; break;
		case 'pdf': return '<i class="fa fa-file-pdf-o text-danger"></i>'; break;
		case 'zip': return '<i class="fa fa-file-archive-o text-muted"></i>'; break;
		case 'htm': return '<i class="fa fa-file-code-o text-info"></i>'; break;
		case 'txt': return '<i class="fa fa-file-text-o text-info"></i>'; break;
		case 'mov': return '<i class="fa fa-file-movie-o text-warning"></i>'; break;
		case 'mp3': return '<i class="fa fa-file-audio-o text-warning"></i>'; break;
		// note for these file types below no extension determination logic 
		// has been configured (the keys itself will be used as extensions)
		case 'jpg': return '<i class="fa fa-file-photo-o text-light"></i>'; break;
		case 'heic': return '<i class="fa fa-file-photo-o text-primary"></i>'; break;
		case 'HEIC': return '<i class="fa fa-file-photo-o text-danger"></i>'; break; 
		default: return '<i class="fa fa-file-code-o text-light"></i>'; break; 
	}
}