var valor_anterior_contador=0;
valor_anterior_li="";
//Alertas
mensajesalerta=function(titulo, mensaje, tipo, clase)
{
	new PNotify({
		title: titulo,
		text: mensaje,
		type: tipo,
		hide: true,
		styling: 'bootstrap3',
		addclass: clase,
		delay: 3000
	});
}

function validarEmail(elemento, div){

  var texto = document.getElementById(elemento.id).value;
  var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  
  if (!regex.test(texto)) {
      document.getElementById(div).innerHTML = "Correo invalido";
  } else {
    document.getElementById(div).innerHTML = "";
  }

}


//Valida Solo Numeros Enteros	
function soloNumeros(e) {
	var key = window.Event ? e.which : e.keyCode 
	return ((key >= 48 && key <= 57) || (key==8)) 
}

$(".solotextoynumeros").keypress(function(event) {
	var character = String.fromCharCode(event.keyCode);
	return isValid(character);     
});

function isValid(str) {
	return !/[~`!#%\^&[\]\\';/{}|\\"<>]/g.test(str);
}

function loadOptionBandejas(url, div, valor) {
    if (url != "") {
        var valores='';
		var Id_Area=$("#idareasesion").val();
		valores={formulario: valor};
        $.ajax({
            type: 'POST',
            url: url,
            data: valores,
            async: true,
            dataType: "html",
            beforeSend: function (objeto) {
				if(valor=="812"||valor=="813"||valor=="814"||valor=="815"){
					if(Id_Area!="5"){
						jsShowWindowLoad();
					}		
				}else{
					jsShowWindowLoad();
				}	
            },
            success: function (datos) {
				if(valor=="812"||valor=="813"||valor=="814"||valor=="815"){
					if(Id_Area!="5"){
						$("#"+div+"").html(datos);
						jsRemoveWindowLoad();
					}else{
						alert("Por favor selecciona un Area");	
					}		
				}else{
					
					$("#"+div+"").html(datos);
					jsRemoveWindowLoad();
				}			
				
				
			},
            error: function (objeto, quepaso, otroobj) {
				jsShowWindowLoad("Ocurrio un error<br>Comuniquese con Sistemas");
            }
        });
    } else {
        alert("No se mando la url");
    }
}		
	
function cargo_cmb(url,async,data) {
	var json = "";
	$.ajax({
	    type: "POST",
	    url: url,
	    data: data,
	    async: async,
	    dataType: "html",
	    beforeSend: function(objeto) {},
	    success: function(datos) {
	        var tabla = '';
	        var acordion = "";
	        json = eval("(" + datos + ")"); //Parsear JSON
	    },
	    error: function(objeto, quepaso, otroobj) {
	        alert("Error en la peticion:\n\n");
	    }
	});
	return json;
}
		
//Div cargando
jsShowWindowLoad=function(mensaje) {
	//eliminamos si existe un div ya bloqueando
	jsRemoveWindowLoad();
 
	//si no enviamos mensaje se pondra este por defecto
	if (mensaje === undefined) mensaje = "Procesando información<br>Espere por favor...";
 
	//centrar imagen gif
	height = 20;//El div del titulo, para que se vea mas arriba (H)
	var ancho = 0;
	var alto = 0;
 
	//obtenemos el ancho y alto de la ventana de nuestro navegador, compatible con todos los navegadores
	if (window.innerWidth == undefined) ancho = window.screen.width;
	else ancho = window.innerWidth;
	if (window.innerHeight == undefined) alto = window.screen.height;
	else alto = window.innerHeight;
 
	//operación necesaria para centrar el div que muestra el mensaje
	var heightdivsito = alto/2 - parseInt(height)/2;//Se utiliza en el margen superior, para centrar
 
   //imagen que aparece mientras nuestro div es mostrado y da apariencia de cargando
	imgCentro = "<div style='text-align:center;height:" + alto + "px;'><div  style='color:#FFFFE0;margin-top:" + heightdivsito + "px; font-size:20px;font-weight:bold'>" + mensaje + "</div></div>";
 
		//creamos el div que bloquea grande------------------------------------------
		div = document.createElement("div");
		div.id = "WindowLoad"
		div.style.width = ancho + "px";
		div.style.height = alto + "px";
		$("body").append(div);
 
		//creamos un input text para que el foco se plasme en este y el usuario no pueda escribir en nada de atras
		input = document.createElement("input");
		input.id = "focusInput";
		input.type = "text"
 
		//asignamos el div que bloquea
		$("#WindowLoad").append(input);
 
		//asignamos el foco y ocultamos el input text
		$("#focusInput").focus();
		$("#focusInput").hide();
 
		//centramos el div del texto
		$("#WindowLoad").html(imgCentro);
 
}

//Div Cerrar
jsRemoveWindowLoad=function() {
    // eliminamos el div que bloquea pantalla
    $("#WindowLoad").remove();
}

Activa_btn_menu=function(Nombre_li, Men_o_Sub){
	valor_anterior_contador=valor_anterior_contador+1;
	
	
	
	if(valor_anterior_contador==1){
		$("#"+valor_anterior_li).removeClass("active");
		valor_anterior_li="";
		valor_anterior_contador=0;
		
		$("#"+Nombre_li).addClass("active");
		valor_anterior_li=Nombre_li;
	}
	
	if(valor_anterior_contador==2){
		$("#"+valor_anterior_li).removeClass("active");
		valor_anterior_li="";
		valor_anterior_contador=0;
		
		$("#"+Nombre_li).addClass("active");
		valor_anterior_li=Nombre_li;
	}
}


// Crea una ventana de dialogo del tipo confirm
	function mostrarAlertConfirm(funcionAccion, textoAlerta = null) {
		$.confirm({
			title: "<span class='text-danger'><i class='fa fa-exclamation-triangle'></i>&nbsp;<b>Atención</b></span>",
			content: (textoAlerta != null ? textoAlerta : "Está seguro que desea eliminar este elemento?"),
			theme: 'light',
			columnClass: 'medium', animation: 'top', closeAnimation: 'opacity',
			animateFromElement: false,
			draggable: true,
			icon: '',
			buttons: {
				botonAceptar: {
					text: "Continuar",
					btnClass: 'btn btn-danger',
					action: function () {
						funcionAccion();
					}
				},
				botonCancelar: {
					text: "Cancelar",
					btnClass: 'btn btn-light'
				}
			}
		});
	}


// Muestra una ventana para mostrar información de la misma manera como si se tratara de un Alert en javascript
	function mostrarAlertInfo(contenidoAlerta, tituloAlert = null) {
		if (typeof (contenidoAlerta) != "undefined") {
			$.confirm({
				content: contenidoAlerta,
				theme: 'light',
				columnClass: 'medium', animation: 'top', closeAnimation: 'opacity',
				animateFromElement: false,
				draggable: true,
				icon: '',
				title: tituloAlert != null ? tituloAlert : "<span class='text-danger'><i class='fa fa-exclamation-triangle'></i>&nbsp;<b>Atención</b></span>",
				buttons: {
					botonCerrar: {
						text: "Cerrar",
						btnClass: 'btn btn-light'
					}
				}
			});
		}
	}


// Función para mostrar un video en una ventana confirm a manera de ayuda
	function mostrarVideoAyuda(formato = 'video/mp4', urlVideo = null, tituloAyuda = null) {
		// Genera la cadena html que se mostrará en la ventana tipo alert
		var arrayHmtl = new Array();
		arrayHmtl.push('<div>');
		arrayHmtl.push('<div class="panel panel-default">');
		arrayHmtl.push('<div class="panel-body text-center">');
		arrayHmtl.push('<video type="' + formato + '" controls>');
		arrayHmtl.push('<source src="' + urlVideo + '" type="' + formato + '" />');
		arrayHmtl.push('</video>');
		arrayHmtl.push('</div>');
		arrayHmtl.push('</div>');

		// Muestra la ventana tipo alert con el video
		mostrarAlertInfo(arrayHmtl.join(""), tituloAyuda);
	}

	function siga(){
		alert();
	}