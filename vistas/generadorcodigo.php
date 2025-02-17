<!-- Main row -->
<div class="row">
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- nuevo -->
    <div role="tabpanel" class="tab-pane active" id="nuevo">

      
      <div class="col-md-12">
		<div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
				<input type="hidden" id="Cadenatablas">
				<div align="center"><strong>Tablas de la base de datos</strong></div><br>
				<div id="tablasbasededatos"></div>
				<button type="button" class="btn chs" id="generar">Generar Clases</button>
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



<script>
  
  //Highcharts
  $(document).ready(function(){
	mostrar_tablasbd();
	
	function mostrar_tablasbd()
	{
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/generador_codigo/Generador_codigoFacade.Class.php",        
			async: false,
			data: {
				accion: "consultar"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (data) {
				var data;
				var tabla="";
				data = eval("(" + data + ")"); //Parsear JSON
				
				if(data.totalCount>0)
				{
					tabla='<table class="table table-striped">';
					tabla+='<thead>';
					tabla+='    <tr>';
					tabla+='      <th>#</th>';
					tabla+='      <th>Nombre Tabla</th>';
					tabla+='      <th>Opci&oacute;n</th>';
					tabla+='    </tr>';
					tabla+='  </thead>';
					tabla+='  <tbody>';
					for(var i = 0; i < data.totalCount; i++){
						tabla+='	<tr>';
						tabla+='      <th scope="row">'+(i+1)+'</th>';
						tabla+='      <td>'+data.data[i].nombre_tabla+'</td>';
						tabla+='      <td><input type="checkbox" value="'+data.data[i].nombre_tabla+'" name="orderBoxTablas[]" onchange="pasarchecktablas()"></td>';
						tabla+='    </tr>';
					}
					tabla+=' </tbody>';
					tabla+='</table>';				
					
					mensajesalerta("&Eacute;xito", data.mensaje, "success", "dark");	
				}
				else{
					tabla+='<div class="alert alert-success alert-dismissible fade in" role="alert">';
					tabla+='	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>';
					tabla+='	</button>';
					tabla+='	<strong>'+data.mensaje+'</strong>';
					tabla+='</div>';
					//mensajesalerta("", data.mensaje, "error", "dark");
				}
				
				$("#Cadenatablas").val("");
				$("#tablasbasededatos").html(tabla);
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
			}
		});
		
	}
	
	pasarchecktablas=function()
    {   
        var checkboxValues = "";
        $('input[name="orderBoxTablas[]"]:checked').each(function() { checkboxValues += $(this).val() + ","; });
        checkboxValues = checkboxValues.substring(0, checkboxValues.length-1);
        $("#Cadenatablas").val(checkboxValues);
    }
	/////////////////////////////////////////////////////////////////////////////////
	
	//Guardar Registros
	$("#generar").click(function () {
			
		var Agregar = true;
		var mensaje_error = "";
		var Cadenatablas=$("#Cadenatablas").val();
		var strDatos=""; 
		
		if (Cadenatablas.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Selecciona por lo menos una tabla<br />";
		}
		
				
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		if(Agregar)
		{
			$.ajax({
				type: "POST",
				url: "../index.php",        
				async: false,
				data: {
					accion:"generarclases",
					tablas: Cadenatablas
				},
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					
					if(json.totalCount>0){
						mensajesalerta("&Eacute;xito", json.text, "success", "dark");	
						mostrar_tablasbd();
					}
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al generar los archivos.", "error", "dark");
				}
			});
		}
	});
	
	
    
  });//ND

</script>

