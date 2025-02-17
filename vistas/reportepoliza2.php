<?php 
 $style_size_table="font-size:10px";	
 error_reporting(0);
 require_once("class/SIGA.php");
 $AFBCPOST = $_POST["AF_BC"];
 $Anio = date("Y");
 if (isset($_GET["Anio"]))
 $Anio = $_GET["Anio"];	

 $Mes = date("m");
 if (isset($_GET["Mes"]))
 $Mes = $_GET["Mes"];

 $Agrupar = 2;
 if (isset($_GET["Agrupar"]))
 $Agrupar = $_GET["Agrupar"];

 $inpcperiodo = $Anio;
 /*if (isset($_GET["INPCPeriodo"]))
 $inpcperiodo = $_GET["INPCPeriodo"];*/

 $obj = new SIGA(); 
 
?>
<!-- Select2 -->
    <link href="../js/select2.min.css" rel="stylesheet">
 <!-- File Input -->
  <link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
  <script src="../plugins/docsupport/standalone/selectize.js"></script>
  <script src="../plugins/docsupport/index.js"></script>
  <style>
 .modal-open {
    overflow: auto;
}
  </style>
  
    <div id="tabla_dinamica_reporte">
		
		<ul class="nav nav-tabs azulf" role="tablist">
			
			<li>
			Año Fiscal: <select id="cmbAnio">
							  <?php
							  for ($i=2000; $i <= date("Y")+3; $i++) 
							  { 
						      $selected = "";
						      if ($Anio == $i)
							  $selected = "selected";	  
						      ?>
							  <option <?php echo $selected ?> value="<?php echo $i ?>"><?php echo $i ?></option>
							  <?php 
							  }
							  ?>
							</select>
			</li>
			<li id="liMes">
			Mes: <select id="cmbMes">
							  <?php
							  for ($i=1; $i <= 12; $i++) 
							  { 
						      $selected = "";
						      if ($Mes == $i)
							  $selected = "selected";	  
						      ?>
							  <option <?php echo $selected ?> value="<?php echo $i ?>"><?php echo $i ?></option>
							  <?php 
							  }
							  ?>
							</select>
			</li>
			<li id="liAgrupar">
			Agrupar por: <select id="cmbAgrupar">
							  <?php
							  $selected1 = "";
						      if ($Agrupar == 1)
							  $selected1 = "selected";
						  
							  $selected2 = "";
						      if ($Agrupar == 2)
							  $selected2 = "selected";
							  ?>
							  <option <?php echo $selected1 ?> value="1">Cuenta contable</option>
							  <option <?php echo $selected2 ?> value="2">Activo</option>
							</select>
			</li>
			
			
			<li>
			Tabla INPC: 
							<select id="cmbINPC" disabled>
							  <option <?php if ($inpcperiodo == 2017) echo "selected" ?> value="2017">2017</option>
							  <option <?php if ($inpcperiodo == 2018) echo "selected" ?> value="2018">2018</option>
							</select>
			</li>
			
			<li>
			<button type="button" class="btn chs" id="btnBuscar">Buscar</button>
			</li>
			
			<li>
			<button type="button" class="btn chs" id="btnCerrar">Cerrar mes</button>
			</li>
			
			
			<li class="export">
			<select id="cmbTipoPoliza">
				<option selected value="03">Diario</option>
				<option value="13">Cierre</option>
			</select>
			</li>
			<li>
			<a href="#" onclick="reporte()">
			<i class="fa fa-file-excel-o" aria-hidden="true"></i> Generar Layout
			</a>
			</li>
			
		</ul>
		
	
	                  <table id="example" class="table table-bordered table-striped table-chs">
                    <thead>
                      <tr>
					    <th style="<?php echo $style_size_table;?>">Cuenta	</th>
                        <th style="<?php echo $style_size_table;?>">Centro de costos	</th>
						<th style="<?php echo $style_size_table;?>">Referencia	</th>
						<th style="<?php echo $style_size_table;?>">Ref Formula	</th>
						<th style="<?php echo $style_size_table;?>">Descripcion	</th>
						<th style="<?php echo $style_size_table;?>">Descripcion Formula	</th>
						<th style="<?php echo $style_size_table;?>">Cargo	</th>
						<th style="<?php echo $style_size_table;?>">Abono	</th>
						
						
                      </tr>
                    </thead>
                    <tbody>
					  <?php 
					  
                     if (isset($_GET["Anio"]))
					  $activos = $obj->obtenPolizaMensualBaja("",$Anio,$Mes,$Agrupar,$inpcperiodo);

					 for ($i=0; $i < count($activos); $i++) 
					 { 
 					  ?>
                      <tr>
					    
						<td style="<?php echo $style_size_table;?>"><?php echo $activos[$i]["Cuenta"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $activos[$i]["CC"] ?></td>
						<td style="<?php echo $style_size_table;?>">HTDEP</td>
						<td style="<?php echo $style_size_table;?>">HTDEP</td>
						<td style="<?php echo $style_size_table;?>">
						<a href="#" onclick="javascript:abreDetalle('<?php echo $activos[$i]["AF_BC"] ?>',<?php echo $Anio ?>,1,<?php echo $Mes ?>,'<?php echo $activos[$i]["Id_Activo"] ?>',<?php echo $inpcperiodo ?>);">
						<?php echo $activos[$i]["AF_BC"] ?>
						</a>
						</td>
						<td style="<?php echo $style_size_table;?>">Contable / Línea Recta</td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($activos[$i]["cargo"],2) ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo  number_format($activos[$i]["abono"],2) ?></td>
							
                      </tr>
					  <?php 
					 }?>
                    </tbody>
                  </table>
	
	
	</div>

	<div id="divFiscalD4">
	</div>
           
<!-- Select2 -->
 <script src="../js/select2.full.min.js"></script>

 		<script src="DataTables1.10.0/media/js/jquery.dataTables.min.js"></script>
		<script src="DataTables1.10.0/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
		<link href="DataTables1.10.0/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" />


<script>
  $(function () {
    $('#example').DataTable({
			"lengthMenu": [ [10, 25, 50, 100, 100000], [10, 25, 50,100,"Todos"] ] ,
		"sDom": 'T<"clear">lfrtip',
		"oTableTools": {
			"sSwfPath": "../plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
			"aButtons": []
			,
            "aButtons": [
                "copy",
                
				/*{
                "sExtends": "csv",
               
				},*/
				{
                "sExtends": "xls",
                
				}
            ]
        },		
	  "scrollY": 500,
      "scrollX": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
	  "language": {
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
  });

 /*$("#cmbAnio").change(function(e){
	  loadOptionBandejas('reportecontabilidad1.php?Id_Menu=5&Id_Submenu=7&Anio='+$("#cmbAnio").val(),'contenedorprincipalactivofijo','818'); 
 });

  $("#cmbMes").change(function(e){
	  loadOptionBandejas('reportecontabilidad1.php?Id_Menu=5&Id_Submenu=7&Anio='+$("#cmbAnio").val()+'&Mes='+$("#cmbMes").val(),'contenedorprincipalactivofijo','818'); 
 });*/
 
 $("#btnBuscar").click(function(e){
	 e.preventDefault();
	 loadOptionBandejas('reportepoliza2.php?Id_Menu=5&Id_Submenu=1035&Anio='+$("#cmbAnio").val()+'&Mes='+$("#cmbMes").val()+'&Agrupar='+$('#cmbAgrupar').val()+'&INPCPeriodo='+$("#cmbINPC").val(),'contenedorprincipalactivofijo','818'); 
 });
 
 $("#cmbAnual").change(function(e)
 {
	 //alert('Hola '+$("#cmbAnual").val());
	 if ($("#cmbAnual").val() == 0)
		 $("#liMes").hide();
	 else
		 $("#liMes").show();
 });
 
 
 
 function abreDetalle(AF_BC,Anio,Formula,Mes,Id_Activo,INPC)
 {
   
	$.ajax({
		url : 'includedepcontablelinearecta.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: AF_BC,Anio:Anio,Formula:Formula,Mes: Mes, Reporte:1,Id_Activo:Id_Activo,INPC:INPC},
			success : function(response) 
			    {
				  //$("#periodo-contable").modal('hide');	
				  $("#divFiscalD4").html(response);
                  $("#periodo-contable").modal('show');				  
				},
				error: function(jqXHR, exception) 
				{
					muestraErrorAjax(jqXHR, exception);
				}
			});	

   
}

function abreDetalleD4(AF_BC,Anio)
 {
   
	$.ajax({
		url : 'includedepfiscal.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: AF_BC,Anio:Anio},
			success : function(response) 
			    {
				  //$("#periodo-contable").modal('hide');	
				  $("#divFiscalD4").html(response);
                  $("#periodo-fiscal").modal('show');				  
				},
				error: function(jqXHR, exception) 
				{
					muestraErrorAjax(jqXHR, exception);
				}
			});	

   
}

function muestraErrorAjax(jqXHR,exception)
			{
			
			   if (jqXHR.status === 0) {
						alert('Not connect.\n Verify Network.');
					} else if (jqXHR.status == 404) {
						alert('Requested page not found. [404]');
					} else if (jqXHR.status == 500) {
						alert('Internal Server Error [500].');
					} else if (exception === 'parsererror') {
						alert('Requested JSON parse failed.');
					} else if (exception === 'timeout') {
						alert('Time out error.');
					} else if (exception === 'abort') {
						alert('Ajax request aborted.');
					} else {
						alert('Uncaught Error.\n' + jqXHR.responseText);
					}
			}
			
			function reporte()
		 {
			document.location = 'layout.php?Anio='+$("#cmbAnio").val()+'&Mes='+$("#cmbMes").val()+'&Agrupar='+$('#cmbAgrupar').val()+'&INPCPeriodo='+$("#cmbINPC").val()+'&TipoPoliza='+$("#cmbTipoPoliza").val();
		 }
		 
		 $("#btnCerrar").click(function(e){
			 
			 if (confirm('Esta seguro de realizar el cierre del mes elegido?, esta opción no podrá ser revertida?'))
			 {
				 document.location = 'cierremes.php?Anio='+$("#cmbAnio").val()+'&Mes='+$("#cmbMes").val()+'&Agrupar='+$('#cmbAgrupar').val()+'&INPCPeriodo='+$("#cmbINPC").val()+'&TipoPoliza='+$("#cmbTipoPoliza").val();
			 }
		 });
</script>