  <link rel="stylesheet" href="../dist/css/jquery-confirm.min.css">
  <script src="../dist/js/jquery-confirm.min.js"></script> 
<div class="gray">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
					<span><font color="red">*</font></span>
					<label class="control-label" style="font-size: 11px;">Área:</label>
          <select class="form-control" id="cmb_area">
          </select>
        </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
						<span><font color="red">*</font></span>
						<label class="control-label" style="font-size: 11px;">Sección:</label>
						<select class="form-control" id="cmbseccion">
						</select>
					</div>
        </div> 
        <div class="col-md-3">
          <div class="form-group">
						<span><font color="red">*</font></span>
						<label class="control-label" style="font-size: 11px;">Proceso del Ticket:</label>
						<select class="form-control" id="cmb_proceso_ticket">
							<option value="1">Ticket Nuevo</option>
							<option value="2">Ticket en Seguimiento</option>
						</select>
					</div>
        </div>
				<div class="col-md-3">
          <div class="form-group">
						<span><font color="red">*</font></span>
						<label class="control-label" style="font-size: 11px;">Escalamiento:</label>
						<select class="form-control" id="cmb_escala_ticket">
							<option value="I 1">Escalamiento 1</option>
							<option value="I 2">Escalamiento 2</option>
							<option value="I 3">Escalamiento 3</option>
							<option value="I 4">Escalamiento 4</option>
							<option value="I 5">Escalamiento 5</option>
							<option value="I 6">Escalamiento 6</option>
							<option value="E 1">Externos 1</option>
							<!--<option value="E 2">Externos 2</option>-->
							<!--<option value="E 3">Externos 3</option>-->
							<!--<option value="E 4">Externos 4</option>-->
						</select>
					</div>
        </div>
				
      </div>
			<div class="row" style="display:none">
        <div class="col-md-12">
          <button type="button" class="btn chs">Filtrar</button>
        </div>
      </div>
			<div class="row" style="display:inline">
        <div class="col-md-12" align="center">
          
					<ul class="nav nav-tabs azulf" role="tablist">
						<!--<button type="button" class="btn chs" id="guardar">Guardar</button>-->
						<li role="presentation" class="active"><a href="#guardar" aria-controls="guardar" role="tab" data-toggle="tab" id="guardar">Guardar</a></li>
						<li class="export"><a href="#" download="Reporte_SLA.xls" onclick="return ExcellentExport.excel(this, 'tabla_sla_excel', 'SLA');"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar</a></li>
					</ul>
				</div>
      </div>
		</div>
 
  </div>
</div>

 <div class="row">
	<div class="col-md-10 col-md-offset-1" id="tabla_sub">
	</div>
	<div class="col-md-10 col-md-offset-1" id="tabla_sub_excel" style="display:none">
	</div>
 </div>

<div class="x_content col-md-12 col-sm-12 col-xs-12" id="">
</div>

<div class="modal fade modalchs" data-backdrop="false" id="Modal_Urgencia_Recurrencia">
	<div class="modal-dialog modal-lg">
		
		<div class="modal-content">
		  <div class="modal-header azuldef">
			<button type="button" class="close"  data-dismiss="modal" aria-label="Close"  id="btn_cerrar_cancelacion">
			  <span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title" id="Titulo_Urgencia_Recurrencia"></h4>
		  </div>

		  <div class="modal-body nopsides">
			<input type="hidden" id="Es_Urgencia_Recurrencia">
			<input type="hidden" id="Id_Subcategoria_Seguimiento">
			<div class="col-md-12" id="div_desc_urgencia">
				<div class="form-group">
				  <span><font color="red">*</font></span>
				  <label class="control-label" style="font-size: 11px;">Desccripción Urgencia</label>
				  <textarea rows="10" class="form-control" id="Desc_Urgencia" placeholder="Desccripción Urgencia"></textarea>
				</div>
			</div>
			<div class="col-md-12" id="div_desc_recurrencia">
				<div class="form-group">
				  <span><font color="red">*</font></span>
				  <label class="control-label" style="font-size: 11px;">Desccripción Recurrencia</label>
				  <textarea rows="10" class="form-control" id="Desc_Recurrencia" placeholder="Desccripción Recurrencia"></textarea>
				</div>
			</div>
			<div class="tab-content">
				 <div class="modal-footer">
					<button type="button" id="Guardar_Urgencia_Recurrencia" onclick="Guardar_Urgencia_Recurrencia()" class="btn btn-success">Guardar</button>
				 </div>
			</div>
		</div>
	  </div>
	</div>
</div>


		
	

    

<script>
  
  //Highcharts
$(document).ready(function(){
	var Total_Registros_Tabla=0;
	
	areas();
	function areas() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Estatus_Reg: "1", accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_catareas/Siga_catareasFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			for(var i = 0; i < resultado.totalCount; i++){
				if(resultado.data[i].Id_Area!=5){
					if(Id_Area==resultado.data[i].Id_Area){
						$('#cmb_area').append($('<option>', { value: resultado.data[i].Id_Area }).text(resultado.data[i].Nom_Area));
					}
				}
			}
		}else{
			$('#cmb_area').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	Seccion($("#cmb_area").val());
	
	$("#cmb_area").change(function() {
		if($(this).val()!="-1"){
			Seccion($(this).val());
			tabla_subcategorias();
		}else{
			$('#cmbseccion').children('option').remove();
		}
	});
	
	$("#cmbseccion").change(function() {
		if($(this).val()!="-1"){
			$("#cmb_escala_ticket").val("I 1");
			tabla_subcategorias();
		}
	});
	
	$("#cmb_proceso_ticket").change(function() {
		if($(this).val()!="-1"){
			$("#cmb_escala_ticket").val("I 1");
			tabla_subcategorias();
		}
	});
	
	
	function Seccion(Id_Area) {
		
		if(Id_Area!=""){
			$('#cmbseccion').children('option').remove();
			var resultado=new Array();
			data={Estatus_Reg: "1",Id_Area:Id_Area, accion: "consultar"};
			resultado=cargo_cmb("../fachadas/activos/siga_cat_ticket_seccion/Siga_cat_ticket_seccionFacade.Class.php",false, data);
			if(resultado.totalCount>0){
				//$('#cmbseccion').append($('<option>', { value: "-1" }).text("--Sección--"));
				for(var i = 0; i < resultado.totalCount; i++){
					$('#cmbseccion').append($('<option>', { value: resultado.data[i].Id_Seccion }).text(resultado.data[i].Desc_Seccion));
				}
			}else{
				$('#cmbseccion').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
			}
		}
	}
	
	tabla_subcategorias();
	function tabla_subcategorias(){
		var Id_Area=$("#cmb_area").val();
		var Id_Seccion=$("#cmbseccion").val();
		var Proceso_Ticket=$("#cmb_proceso_ticket").val();
		var Escala=$("#cmb_escala_ticket").val();
		var strArray = Escala.split(" ");
		var Interno_Externo=strArray[0];
		Escala=strArray[1];
		
		$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_sla_p/Siga_sla_pFacade.Class.php",
				async: false,
				data: {
					Id_Area:Id_Area,
					Id_Seccion: Id_Seccion,
					Interno_Externo:Interno_Externo,
					Proceso_Ticket:Proceso_Ticket,
					Escala:Escala,
					accion: "consultar_tabla"
				},
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (data) {
					data = eval("(" + data + ")");
					
						if(Proceso_Ticket==1){
							var tabla=""; 
							tabla='<table class="table table-bordered" id="tabla_sla">';
							tabla+='	<thead>';
							tabla+='		<tr style="display:none" colspan="2">';
							tabla+='			<th width="100%">';
							tabla+='				Área: '+$('select[id="cmb_area"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
							tabla+='				Sección: '+$('select[id="cmbseccion"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
							tabla+='				Proceso: '+$('select[id="cmb_proceso_ticket"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
							tabla+='				Escalamiento: '+$('select[id="cmb_escala_ticket"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
							tabla+='			</th>';
							tabla+='		</tr>';
							tabla+='		<tr>';
							tabla+='			<th width="15%">Horas</th>';
							tabla+='			<th width="85%">Correo</th>';
							tabla+='		</tr>';
							tabla+='	</thead>';
							tabla+='	<tbody>';
							
							
							var par=parImpar(cont);
							if(par==1){color='#EAF3F2';}else{color="#CCCFD5"}
							if (data.totalCount > 0) {
								tabla+='		<tr>';
								tabla+='			<td width="15%" bgcolor="'+color+'"><input type="hidden" id="hidden_Id_Sla_P_'+0+'" value="'+data.data[0].Id_Sla_P+'"><div class="input-group"><input type="text" class="form-control Horas_Class_'+0+'" id="Horas_'+0+'" value="'+data.data[0].Horas+'"></div><div style="display:none">'+data.data[0].Horas+'</div></td>';
								tabla+='			<td width="85%" bgcolor="'+color+'"><div class="input-group col-md-12"><input type="text" class="form-control" id="Correos_'+0+'" placeholder="Ejemp: correo1@hospitalsatelite.com; correo2@hospitalsatelite.com;" value="'+data.data[0].Correos+'"></div><div style="display:none">'+data.data[0].Correos+'</div></td>';
								tabla+='		</tr>';
							}else{
								tabla+='		<tr>';
								tabla+='			<td width="15%" bgcolor="'+color+'"><div class="input-group"><input type="text" class="form-control" id="Horas_'+0+'" ></div></td>';
								tabla+='			<td width="85%" bgcolor="'+color+'"><div class="input-group col-md-12"><input type="text" class="form-control" id="Correos_'+0+'" placeholder="Ejemp: correo1@hospitalsatelite.com; correo2@hospitalsatelite.com;" ></div></td>';
								tabla+='		</tr>';
							}
							
							tabla+='	</tbody>';
							tabla+='</table>';
							Total_Registros_Tabla=data.totalCount;
							$("#tabla_sub").html(tabla);
							
							
							
							///////////////////////////////////////
							tabla='<table class="table table-bordered" id="tabla_sla_excel">';
							tabla+='	<thead>';
							tabla+='		<tr>';
							tabla+='			<th width="100%" colspan="2">';
							tabla+='				Área: '+$('select[id="cmb_area"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
							tabla+='				Sección: '+$('select[id="cmbseccion"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
							tabla+='				Proceso: '+$('select[id="cmb_proceso_ticket"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
							tabla+='				Escalamiento: '+$('select[id="cmb_escala_ticket"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
							tabla+='			</th>';
							tabla+='		</tr>';
							tabla+='		<tr>';
							tabla+='			<th width="15%">Horas</th>';
							tabla+='			<th width="85%">Correo</th>';
							tabla+='		</tr>';
							tabla+='	</thead>';
							tabla+='	<tbody>';
							
							
							if (data.totalCount > 0) {
								tabla+='		<tr>';
								tabla+='			<td width="15%" bgcolor="'+color+'">'+data.data[0].Horas+'</td>';
								tabla+='			<td width="85%" bgcolor="'+color+'">'+data.data[0].Correos+'</td>';
								tabla+='		</tr>';
							}else{
								tabla+='		<tr>';
								tabla+='			<td width="15%" bgcolor="'+color+'"></td>';
								tabla+='			<td width="85%" bgcolor="'+color+'"></td>';
								tabla+='		</tr>';
							}
							
							tabla+='	</tbody>';
							tabla+='</table>';
							$("#tabla_sub_excel").html(tabla);
							
							
							
							
						}else
						{
							if (data.totalCount > 0) {
								var tabla=""; var cont=1; var encontrado=0; 
								tabla='<table class="table table-bordered" id="tabla_sla">';
								tabla+='	<thead>';
								tabla+='		<tr style="display:none">';
								tabla+='			<th width="100%" colspan="7">';
								tabla+='				Área: '+$('select[id="cmb_area"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								tabla+='				Sección: '+$('select[id="cmbseccion"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								tabla+='				Proceso: '+$('select[id="cmb_proceso_ticket"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								tabla+='				Escalamiento: '+$('select[id="cmb_escala_ticket"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								tabla+='			</th>';
								tabla+='		</tr>';
								tabla+='		<tr>';
								//tabla+='			<th >Contador</th>';
								tabla+='			<th width="15%">Categoria</th>';
								tabla+='			<th width="15%">Subcategoria</th>';
								tabla+='			<th width="5%">I/E</th>';
								tabla+='			<th width="5%">Urgencia</th>';
								tabla+='			<th width="5%">Recurrencia</th>';
								tabla+='			<th width="15%">Horas</th>';
								tabla+='			<th width="40%">Correo</th>';
								tabla+='		</tr>';
								tabla+='	</thead>';
								tabla+='	<tbody>';
								
								
								for(var i = 0; i < data.totalCount; i++){
									var color="";
									//Permite sombrear los saltos de linea
										if(encontrado==2){
											cont=cont+1;
										}
										
										var id_cat=data.data[i].Id_Categoria;
										var id_cat_siguiente="";
										
										if((data.totalCount-1)<(i+1)){
										}else{
											id_cat_siguiente=data.data[i+1].Id_Categoria;
										}
										
										//Se igualan los ids
										if(id_cat==id_cat_siguiente){
											encontrado=1;
										}else{
											encontrado=2;	
										}
									//Fin 
									
									var Checked_I="";var Checked_E="";
									if(data.data[i].Interno_Externo=="I"){Checked_I=" checked";}
									if(data.data[i].Interno_Externo=="E"){Checked_E=" checked";}
									
									var Checked_Urgencia="";
									if(data.data[i].Urgencia=="1"){Checked_Urgencia=" checked";}
									
									var Checked_Recurrencia="";
									if(data.data[i].Recurrencia=="1"){Checked_Recurrencia=" checked";}
									
									var par=parImpar(cont);
									if(par==1){color='#EAF3F2';}else{color="#CCCFD5"}
									
									tabla+='		<tr>';
									//tabla+='			<th  bgcolor="">'+cont+'</th>';
									tabla+='			<th width="15%" bgcolor="'+color+'"><input type="hidden" id="hidden_Id_Sla_P_'+i+'" value="'+data.data[i].Id_Sla_P+'"><input type="hidden" id="hidden_Id_Categoria_'+i+'" value="'+data.data[i].Id_Categoria+'"><input type="hidden" id="hidden_Id_Subcategoria_'+i+'" value="'+data.data[i].Id_Subcategoria+'">'+data.data[i].Desc_Categoria+'</th>';
									tabla+='			<td width="15%" bgcolor="'+color+'">'+data.data[i].Desc_Subcategoria+'</td>';
									tabla+='			<td width="5%" bgcolor="'+color+'">I<input type="radio" onclick="Check_Seg_Interno_Externo(1, '+data.data[i].Id_Subcategoria+')" id="Seg_Interno'+data.data[i].Id_Subcategoria+'" name="Seg_Interno_Externo'+data.data[i].Id_Subcategoria+'" value="I" '+Checked_I+'><br>E<input type="radio" onclick="Check_Seg_Interno_Externo(2, '+data.data[i].Id_Subcategoria+')"  id="Seg_Externo'+data.data[i].Id_Subcategoria+'" name="Seg_Interno_Externo'+data.data[i].Id_Subcategoria+'" value="E" '+Checked_E+'></td>';
									tabla+='			<td width="5%" bgcolor="'+color+'" align="center"><input type="checkbox" onclick="Check_Urgencia(2, '+data.data[i].Id_Subcategoria+')" id="Seg_Urgencia'+data.data[i].Id_Subcategoria+'"  '+Checked_Urgencia+'></td>';
									tabla+='			<td width="5%" bgcolor="'+color+'" align="center"><input type="checkbox" onclick="Check_Recurrencia(3, '+data.data[i].Id_Subcategoria+')" id="Seg_Recurrencia'+data.data[i].Id_Subcategoria+'" '+Checked_Recurrencia+'></td>';
									tabla+='			<td width="15%" bgcolor="'+color+'"><div class="input-group"><input type="text" class="form-control Horas_Class_'+i+'" id="Horas_'+i+'_'+data.data[i].Id_Categoria+'" value="'+data.data[i].Horas+'"><span class="input-group-btn"><button type="button" class="btn btn-primary" style="font-size:13px" title="Aplicar de aquí en adelante" onclick="horas('+i+','+data.data[i].Id_Categoria+', '+data.totalCount+')"><i class="fa fa-sort-desc"></i></button></span></div><div style="display:none">'+data.data[i].Horas+'</div></td>';
									tabla+='			<td width="40%" bgcolor="'+color+'"><div class="input-group"><input type="text" class="form-control Correos_Class_'+i+'" id="Correos_'+i+'_'+data.data[i].Id_Categoria+'" placeholder="Ejemp: correo1@hospitalsatelite.com; correo2@hospitalsatelite.com;" value="'+data.data[i].Correos+'"><span class="input-group-btn"><button type="button" class="btn btn-primary" style="font-size:13px" title="Aplicar de aquí en adelante" onclick="correos('+i+','+data.data[i].Id_Categoria+','+data.totalCount+')"><i class="fa fa-sort-desc"></i></button></div><div style="display:none">'+data.data[i].Correos+'</div></td>';
									tabla+='		</tr>';
								}
								
								tabla+='	</tbody>';
								tabla+='</table>';
								Total_Registros_Tabla=data.totalCount;
								$("#tabla_sub").html(tabla);
								
								
								///////////////////////////////////////////////////////
								tabla='<table class="table table-bordered" id="tabla_sla_excel">';
								tabla+='	<thead>';
								tabla+='		<tr>';
								tabla+='			<th width="100%" colspan="4">';
								tabla+='				Área: '+$('select[id="cmb_area"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								tabla+='				Sección: '+$('select[id="cmbseccion"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								tabla+='				Proceso: '+$('select[id="cmb_proceso_ticket"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								tabla+='				Escalamiento: '+$('select[id="cmb_escala_ticket"] option:selected').text()+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								tabla+='			</th>';
								tabla+='		</tr>';
								tabla+='		<tr>';
								//tabla+='			<th >Contador</th>';
								tabla+='			<th width="20%">Categoria</th>';
								tabla+='			<th width="25%">Subcategoria</th>';
								tabla+='			<th width="15%">Horas</th>';
								tabla+='			<th width="40%">Correo</th>';
								tabla+='		</tr>';
								tabla+='	</thead>';
								tabla+='	<tbody>';
								
								
								for(var i = 0; i < data.totalCount; i++){
									var color="";
									//Permite sombrear los saltos de linea
										if(encontrado==2){
											cont=cont+1;
										}
										
										var id_cat=data.data[i].Id_Categoria;
										var id_cat_siguiente="";
										
										if((data.totalCount-1)<(i+1)){
										}else{
											id_cat_siguiente=data.data[i+1].Id_Categoria;
										}
										
										//Se igualan los ids
										if(id_cat==id_cat_siguiente){
											encontrado=1;
										}else{
											encontrado=2;	
										}
									//Fin 
									
									
									var par=parImpar(cont);
									if(par==1){color='#EAF3F2';}else{color="#CCCFD5"}
									
									tabla+='		<tr>';
									//tabla+='			<th  bgcolor="">'+cont+'</th>';
									tabla+='			<th width="20%" bgcolor="'+color+'">'+data.data[i].Desc_Categoria+'</th>';
									tabla+='			<td width="25%" bgcolor="'+color+'">'+data.data[i].Desc_Subcategoria+'</td>';
									tabla+='			<td width="15%" bgcolor="'+color+'">'+data.data[i].Horas+'</td>';
									tabla+='			<td width="40%" bgcolor="'+color+'">'+data.data[i].Correos+'</td>';
									tabla+='		</tr>';
								}
								
								
								
								tabla+='	</tbody>';
								tabla+='</table>';
								$("#tabla_sub_excel").html(tabla);
								
								
							}
						}
							
					
				},
				error: function () {
					Total_Registros_Tabla=0;	
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
		
	}
	
	
	Urgencia_Recurrencia=function(tipo, Id_Subcategoria, categoria, subcategoria){
		$("#Titulo_Urgencia_Recurrencia").html(categoria+" / "+subcategoria);
		
		$("#Modal_Urgencia_Recurrencia").modal("show");
		$("#Es_Urgencia_Recurrencia").val(tipo);
		$("#Id_Subcategoria_Seguimiento").val(Id_Subcategoria);
		
		if(tipo==2){
			$("#div_desc_recurrencia").hide();
			$("#div_desc_urgencia").show();
		}
		
		if(tipo==3){
			$("#div_desc_recurrencia").show();
			$("#div_desc_urgencia").hide();
		}
		
		$.ajax({
            type: "POST",
            url: "../fachadas/activos/siga_sla_p/Siga_sla_pFacade.Class.php",
            async: false,
            data: {
                Id_Subcategoria: Id_Subcategoria,
                accion: "siga_sla_seguimiento"
            },
            dataType: "html",
            beforeSend: function (xhr) {

            },
            success: function (data) {
                data = eval("(" + data + ")");
                if (data.totalCount > 0) {
                    $("#Desc_Recurrencia").val(data.data[0].Recurrencia);
					$("#Desc_Urgencia").val(data.data[0].Urgencia);
                }
            },
            error: function () {
                mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
            }
        });
		
		
	}
	
	Guardar_Urgencia_Recurrencia=function(){
		var Es_Urgencia_Recurrencia=$("#Es_Urgencia_Recurrencia").val();
		var Desc_Urgencia=$.trim($("#Desc_Urgencia").val());
		var Desc_Recurrencia=$.trim($("#Desc_Recurrencia").val());
		var error=false;
		var mensaje="";
		
	
		if(Es_Urgencia_Recurrencia=="2"){
			
			if(Desc_Urgencia==""){
				mensaje="-Agrega la Urgencia";
				error=true;
			}
		}
		if(Es_Urgencia_Recurrencia=="3"){
			if(Desc_Recurrencia==""){
				mensaje="-Agrega la Recurrencia";
				error=true;
			}
		}
		
		
		if(error==false){
			var resultado=new Array();
			data={Es_Urgencia_Recurrencia: Es_Urgencia_Recurrencia,Desc_Urgencia:Desc_Urgencia, Desc_Recurrencia:Desc_Recurrencia, Id_Subcategoria: $("#Id_Subcategoria_Seguimiento").val(), Usr_Mod:$("#usuariosesion").val(), accion: "Guardar_Seguimiento_SLA"};
			resultado=cargo_cmb("../fachadas/activos/siga_sla_p/Siga_sla_pFacade.Class.php",false, data);
			if(resultado.totalCount>0){
				alert("Guardado correctamente.");
			}
		}else{
			alert(mensaje);
		}
	}
	
	Check_Seg_Interno_Externo=function(Val, Id_Subcategoria){
		var Interno_Externo="";
		var nombre_control="";
		if(Val==1){
			Interno_Externo="Interno";
			nombre_control="Seg_Interno"+Id_Subcategoria;
		}
		
		if(Val==2){
			Interno_Externo="Externo";
			nombre_control="Seg_Externo"+Id_Subcategoria;
		}
		
		var bool=confirm("Esta usted seguro de clasificarlo como "+Interno_Externo+"?");
		if(bool){
			var resultado=new Array();
			data={Es_Urgencia_Recurrencia: 1, Interno_Externo: Interno_Externo[0], Id_Subcategoria: Id_Subcategoria, Usr_Mod:$("#usuariosesion").val(), accion: "Guardar_Seguimiento_SLA"};
			resultado=cargo_cmb("../fachadas/activos/siga_sla_p/Siga_sla_pFacade.Class.php",false, data);
			if(resultado.totalCount>0){
				tabla_subcategorias();
				alert("Guardado correctamente.");
			}
		}else{
			tabla_subcategorias();
		}
	}
	
	
	Check_Urgencia=function(Val, Id_Subcategoria){
		var Interno_Externo="";
		var nombre_control="Seg_Urgencia"+Id_Subcategoria;
		var Desc_Urgencia="";
		var Activado_Desactivado="";
		
		if( $('#'+nombre_control).prop('checked') ) {
			Activado_Desactivado="Activar";
			Desc_Urgencia="1";
		}else{
			Activado_Desactivado="Desactivar";
			Desc_Urgencia="0";
		}
		
		
		//var bool=confirm("Esta usted seguro de "+Activado_Desactivado+" esta opción?");
		//if(bool){
			var resultado=new Array();
			data={Es_Urgencia_Recurrencia: Val, Desc_Urgencia: Desc_Urgencia, Id_Subcategoria: Id_Subcategoria, Usr_Mod:$("#usuariosesion").val(), accion: "Guardar_Seguimiento_SLA"};
			resultado=cargo_cmb("../fachadas/activos/siga_sla_p/Siga_sla_pFacade.Class.php",false, data);
			if(resultado.totalCount>0){
				tabla_subcategorias();
				//alert("Guardado correctamente.");
			}
		//}else{
		//	tabla_subcategorias();
		//}
	}
	
	Check_Recurrencia=function(Val, Id_Subcategoria){
		var Interno_Externo="";
		var nombre_control="Seg_Recurrencia"+Id_Subcategoria;
		var Desc_Recurrencia="";
		var Activado_Desactivado="";
		
		if( $('#'+nombre_control).prop('checked') ) {
			Activado_Desactivado="Activar";
			Desc_Recurrencia="1";
		}else{
			Activado_Desactivado="Desactivar";
			Desc_Recurrencia="0";
		}
		
		
		//var bool=confirm("Esta usted seguro de "+Activado_Desactivado+" esta opción?");
		//if(bool){
			var resultado=new Array();
			data={Es_Urgencia_Recurrencia: Val, Desc_Recurrencia: Desc_Recurrencia, Id_Subcategoria: Id_Subcategoria, Usr_Mod:$("#usuariosesion").val(), accion: "Guardar_Seguimiento_SLA"};
			resultado=cargo_cmb("../fachadas/activos/siga_sla_p/Siga_sla_pFacade.Class.php",false, data);
			if(resultado.totalCount>0){
				tabla_subcategorias();
				alert("Guardado correctamente.");
			}
		//}else{
		//	tabla_subcategorias();
		//}
	}
	
	
	horas=function(indice, id_categoria, total){
		
		//alert(indice+"-"+total);
		var horas=$.trim($("#Horas_"+indice+"_"+id_categoria).val());
		
		if(indice!=(total-1)){
			if(horas!=""){
				$.confirm({
					title: 'Confirm!',
					content: 'Deseas copiar las horas de aqui en adelante.',
					buttons: {
						Esta_Categoría: function () {
							for(var i = 0; i < total; i++){
								if(indice<=i){
									$("#Horas_"+i+"_"+id_categoria).val(horas);
								}
							}
						},
						Todo: function () {
							for(var i = 0; i < total; i++){
								if(indice<=i){
									$(".Horas_Class_"+i).val(horas);
								}
							}
						},
						cancelar: function () {
							
						}
					}
				});
			}
		}
		
	}
	
	correos=function(indice, id_categoria, total){
		var correos=$.trim($("#Correos_"+indice+"_"+id_categoria).val());
		
		if(indice!=(total-1)){
			if(correos!=""){
				$.confirm({
					title: 'Confirm!',
					content: 'Deseas copiar los correos de aqui en adelante.',
					buttons: {
						Esta_Categoría: function () {
							for(var i = 0; i < total; i++){
								if(indice<=i){
									$("#Correos_"+i+"_"+id_categoria).val(correos);
								}
							}
						},
						Todo: function () {
							for(var i = 0; i < total; i++){
								if(indice<=i){
									$(".Correos_Class_"+i).val(correos);
								}
							}
						},
						cancelar: function () {
							
						}
					}
				});
			}
		}
	}
	function parImpar(numero) {
		var par=1;
		if(numero % 2 == 0) {
			par=2;
		}
		return par;
	}
	
	
	//Guardar Registros
	$("#guardar").click(function () {
		var Id_Area=$("#cmb_area").val();
		var Id_Seccion=$("#cmbseccion").val();
		var Proceso_Ticket=$("#cmb_proceso_ticket").val();
		var Escala=$("#cmb_escala_ticket").val();
		var strArray = Escala.split(" ");
		var Interno_Externo=strArray[0];
		Escala=strArray[1];
		var Agregar = true;
		var mensaje_error = "";
		
		
		
		if(Proceso_Ticket==1){
			
			var Id_Sla_P=$.trim($("#hidden_Id_Sla_P_0").val());
			var Horas=$.trim($("#Horas_0").val());
			var Correos=$.trim($("#Correos_0").val());
			var Array_valores=[];
			
			if(Horas!=""&&Correos==""){
				Agregar=false;
				mensaje_error+="-Agrega el correo<br>";
			}
			
			if(Horas==""&&Correos!=""){
				Agregar=false;
				mensaje_error+="-Agrega las horas<br>";
			}
			
			
			if(Horas==""&&Correos==""){
				Agregar=false;
				mensaje_error+="-Agrega las Horas<br>";
				mensaje_error+="-Agrega el correo<br>";
			}
			
			
			if (!Agregar) {
				mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
			}
			
			if(Id_Sla_P!=""){
				Array_valores={
					Id_Sla_P:Id_Sla_P,
					Id_Area:Id_Area,
					Id_Seccion:Id_Seccion,
					Interno_Externo:Interno_Externo,
					Proceso_Ticket:Proceso_Ticket,
					Escala:Escala,
					Horas:Horas,
					Correos:Correos,
					Estatus_Reg:2,
					Usr_Mod:$("#usuariosesion").val(),
					accion:"editar_escala_1"
				};
			}else{
				Array_valores={
					Id_Area:Id_Area,
					Id_Seccion:Id_Seccion,
					Interno_Externo:Interno_Externo,
					Proceso_Ticket:Proceso_Ticket,
					Escala:Escala,
					Horas:Horas,
					Correos:Correos,
					Estatus_Reg:1,
					Usr_Inser:$("#usuariosesion").val(),
					accion:"guardar_escala_1"
				};
				
			}
			
			if(Agregar==true){
				$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_sla_p/Siga_sla_pFacade.Class.php",        
					async: false,
					data: Array_valores,
					dataType: "html",
					beforeSend: function (xhr) {
						$("#guardar").hide();
					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						//limpiarcampos();
						if(json.totalCount=="1"){
							mensajesalerta("&Eacute;xito", json.mensaje, "success", "dark");	
						}else{
							mensajesalerta("Oh No!", json.mensaje, "error", "dark");	
						}
						$("#guardar").show();
						tabla_subcategorias();
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
						$("#guardar").show();
					}
				});
			}
		}else{
			var Array_Padre=[];
			var contador=0
			for(var i = 0; i < Total_Registros_Tabla; i++){
				
				if($("#Horas_"+i+"_"+$("#hidden_Id_Categoria_"+i).val()).val()!=""&&$("#Correos_"+i+"_"+$("#hidden_Id_Categoria_"+i).val()).val()!=""){
					var Array=[];
					Array[0]=$("#hidden_Id_Sla_P_"+i).val();
					Array[1]=$("#hidden_Id_Categoria_"+i).val();
					Array[2]=$("#hidden_Id_Subcategoria_"+i).val();
					Array[3]=$("#Horas_"+i+"_"+$("#hidden_Id_Categoria_"+i).val()).val();
					Array[4]=$("#Correos_"+i+"_"+$("#hidden_Id_Categoria_"+i).val()).val();
					Array_Padre[contador]=Array;
					contador=contador+1;
				}
				
			}
			
			console.log(Array_Padre);
			
			if (!Agregar) {
				mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
			}
			
			if(Agregar)
			{
				$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_sla_p/Siga_sla_pFacade.Class.php",        
					async: false,
					data: {
						Id_Area:Id_Area,
						Id_Seccion:Id_Seccion,
						Interno_Externo:Interno_Externo,
						Proceso_Ticket:Proceso_Ticket,
						Escala:Escala,
						Array_Padre:Array_Padre,
						Usr_Inser:$("#usuariosesion").val(),
						accion:"guardar_detalle"
					},
					dataType: "html",
					beforeSend: function (xhr) {
						$("#guardar").hide();
					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						//limpiarcampos();
						if(json.totalCount=="1"){
							mensajesalerta("&Eacute;xito", json.mensaje, "success", "dark");	
						}else{
							mensajesalerta("Oh No!", json.mensaje, "error", "dark");	
						}
						$("#guardar").show();
						tabla_subcategorias();
						
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
						$("#guardar").show();
					}
				});
			}
		}
	});
	
	//Llenar Tabla Dinamicamente
	$('#displayINPC').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../fachadas/activos/inpc/InpcFacade.Class.php",
            "type": "POST"
        },
        "columns": [
			{ "data": "Id_INPC", "visible": false},
			{ "data": "Anio"},
			{ "data": "Mes"},
			{ "data": "Valor"},
			{
			    "data": function (obj) {
			        var edicion = '';
			        edicion += '<span onclick="pasarvalores(' + obj.Id_INPC + ')"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
                    edicion += '<span onclick="pasarelimina(' + obj.Id_INPC + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
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
		$("#Id_INPC").val("");
		$("#Intanio").val("");
		$("#Intmes").val("");
		$("#Intvalor").val("");
	}	
	
	//Pasar Valores al Editar
	pasarvalores=function(id) {
		limpiarcampos();
        if (id != "") {
            $.ajax({
                type: "POST",
                url: "../fachadas/activos/inpc/InpcFacade.Class.php",
                async: false,
                data: {
                    Id_INPC: id,
                    accion: "consultar"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
                        $("#Id_INPC").val(data.data[0].Id_INPC);
						$("#Intanio").val(data.data[0].Anio);
						$("#Intmes").val(data.data[0].Mes);
						$("#Intvalor").val(data.data[0].Valor);
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
							url: "../fachadas/activos/inpc/InpcFacade.Class.php",        
							async: false,
							data: {
								Id_INPC: id,
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
								$('#displayINPC').DataTable().ajax.reload();
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
	

	 
	 
	$("#cmb_escala_ticket").data('lastValue', $("#cmb_escala_ticket").val() ).change(function(){
      var Id_Area=$("#cmb_area").val();
			var Id_Seccion=$("#cmbseccion").val();
			var Proceso_Ticket=$("#cmb_proceso_ticket").val();
			var strArray = $(this).val().split(" ");
			var Interno_Externo=strArray[0];
			var Escala=strArray[1];
			//var valor_anterior=$(this).data('lastValue');
			
			
			if(Escala>1){
				$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_sla_p/Siga_sla_pFacade.Class.php",
					async: false,
					data: {
						Id_Area:Id_Area,
						Id_Seccion: Id_Seccion,
						Interno_Externo:Interno_Externo,
						Proceso_Ticket:Proceso_Ticket,
						Escala:Escala,
						accion: "valida_sla_cmb"
					},
					dataType: "html",
					beforeSend: function (xhr) {

					},
					success: function (data) {
						data = eval("(" + data + ")");
							if (data.totalCount > 0) {
								
								if(data.data[0].total>0){
									if(Interno_Externo=="I"){
										tabla_subcategorias();	
									}
									
									if(Interno_Externo=="E"){
										tabla_subcategorias();	
									}
									
								}else{
									mensajesalerta("Alerta", "Para llenar este escalamiento es necesario llenar los anteriores.", "error", "dark");
									$("#cmb_escala_ticket").val("I 1");
									tabla_subcategorias();
								}
							}
					},
					error: function () {
						Total_Registros_Tabla=0;	
						mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
					}
				});
				
			}else{
				tabla_subcategorias();	
			}
			
   });
	 
	 

	 
});//ND

</script>

