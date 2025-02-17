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


 $Anual = 0;
 if (isset($_GET["Anual"]))
 $Anual = $_GET["Anual"];	 

 $obj = new SIGA(); 
 
 if (isset($_GET["Anio"]))
 $activos = $obj->obtenActivosContables("",$Anio);

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
			<li class="export"><a href="#" onclick="reporte()">
			<i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar</a>
			
			</li>
			<li>
			Año Fiscal: <select id="cmbAnio">
							  <?php
							  for ($i=2000; $i <= date("Y"); $i++) 
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
			<li>
			Reporte: <select id="cmbAnual">
				<option value="0" <?php if ($Anual==0) echo "selected" ?>>Anual</option>
				<option value="1" <?php if ($Anual==1) echo "selected" ?>>Mensual</option>
  			</select>
			<li>
						<li <?php if ($Anual==0) {?>style="display:none"<?php }?> id="liMes">
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
			<li>
			<button type="button" class="btn chs" id="btnBuscar">Buscar</button>
			</li>
		</ul>
		
	
	                  <table id="example" class="table table-bordered table-striped table-chs" width="100%">
                    <thead>
                      <tr>
					    <th style="<?php echo $style_size_table;?>">AÑO	</th>
                        <th style="<?php echo $style_size_table;?>">CUENTA CONTABLE	</th>
						<th style="<?php echo $style_size_table;?>">TIPO DE ACTIVO	</th>
						<th style="<?php echo $style_size_table;?>">NUM ACTIVO	</th>
						<th style="<?php echo $style_size_table;?>">NOMBRE DEL EQUIPO	</th>
						<th style="<?php echo $style_size_table;?>">FECHA CAPITALIZACION	</th>
						<th style="<?php echo $style_size_table;?>">FECHA DE BAJA	</th>
						<th style="<?php echo $style_size_table;?>">MOI	</th>
						<th style="<?php echo $style_size_table;?>">FECHA DE INCIO <br>DE DEPRECIACION	</th>
						<th style="<?php echo $style_size_table;?>">VIDA UTIL (AÑOS)	</th>
						<th style="<?php echo $style_size_table;?>">MESES VIDA	</th>
						<th style="<?php echo $style_size_table;?>">% DEPRECIACIÓN ANUAL	</th>
						<th style="<?php echo $style_size_table;?>">MESES DE DEPRECIACIÓN <br>ACUM AL INICIO <br>DEL PERIODO	</th>
						<th style="<?php echo $style_size_table;?>">MESES RESTANTES <br>DE VIDA ANTES DEL PERIODO	</th>
						<th style="<?php echo $style_size_table;?>">MESES A DEPRECIAR <br>DEL PERODO	</th>
						<th style="<?php echo $style_size_table;?>">MESES DE DEPRECIACIÓN ACUM <br>AL FINAL DEL PERIODO	</th>
						<th style="<?php echo $style_size_table;?>">MESES PENDIENTES DE DEPRECIAR <br>AL FINAL DEL PERIODO	</th>
						<th style="<?php echo $style_size_table;?>">DEPRECIACION ACUM <br>ANTES PERIODO	</th>
						<th style="<?php echo $style_size_table;?>">SALDO DEL MOI PENDIENTE POR <br> POR DEPRECIAR ANTES DEL PERIODO	</th>
						<th style="<?php echo $style_size_table;?>">DEPRECIACION DEL PERIODO	</th>
						<th style="<?php echo $style_size_table;?>">DEPRECIACION ACUM <br>AL CIERRE DEL PERIODO	</th>
						<th style="<?php echo $style_size_table;?>">MOI PENDIENTE DE DEPRECIAR AL CIERRE DEL PERIODO</th>
						<th style="<?php echo $style_size_table;?>">MES CALCULO</th>
						<th style="<?php echo $style_size_table;?>">VALOR NETO</th>
						

						
                      </tr>
                    </thead>
                    <tbody>
					  <?php 
					  
					 for ($j=0; $j < count($activos); $j++) 
					 { 
 
					  $aniosArr = $obj->obtenFiscalD4($activos[$j]["AF_BC"],$Anio,1,$Anual,$Mes);

					  //for ($i=0; $i < count($anios); $i++) { 
					  if (count($aniosArr) >0) 
					  {
					  ?>
                      <tr>
					    <td style="<?php echo $style_size_table;?>">
						<a href="#" onclick="javascript:abrMesnual('<?php echo $activos[$j]["AF_BC"] ?>',<?php echo $Anio ?>,1,<?php echo $Mes ?>);">
						<?php echo $aniosArr[0]["Anio"] ?>
						</a>
						</td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["cuenta"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["Tipo_Activo"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $activos[$j]["AF_BC"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["Nombre_Activo"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo date_format($aniosArr[0]["FechaAdquisicion"],"d/m/Y") ?></td>
						<td style="<?php echo $style_size_table;?>"></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["MOI"],2) ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo date_format($aniosArr[0]["FechaInicioDepreciacion"],"d/m/Y") ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["VidaUtilAnios"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["MesesVida"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["PorcentajeAnual"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["MesesDepreciarAcumulada"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["MesesRestantes"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["MesesDepreciarPeriodo"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["MesesDepreciacionAcumulada"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["MesesPendienteDepreciarFin"] ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["DepreciacionAcumulada"],2) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["MOIPendienteDepreciar"],2) ?></td>
						<td style="<?php echo $style_size_table;?>">
						<a href="#" onclick="javascript:abreDetalle('<?php echo $activos[$j]["AF_BC"] ?>',<?php echo $Anio ?>,1,<?php echo $Mes ?>);">
						$<?php echo number_format($aniosArr[0]["DepreciacionPeriodo"],2) ?>
						</a>
						
						</td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["DepreciacionAcumuladaFin"],2) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["MOIPendienteDepreciarFin"],2) ?></td>
						
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["mescalculo"] ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["valorneto"],2) ?></td>
					
                      </tr>
					  <?php }
					 }?>
                    </tbody>
                  </table>
	
	
	</div>

	<div id="divFiscalD4">
	</div>
           
<!-- Select2 -->
 <script src="../js/select2.full.min.js"></script>



<script>
  $(function () {
    $('#example').DataTable({
	  "scrollY": 500,
      "scrollX": true,
      "paging": true,
      "lengthChange": false,
      "searching": false,
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
	 if ($("#cmbAnual").val() == 0)
	 loadOptionBandejas('reportecontabilidad1.php?Id_Menu=5&Id_Submenu=7&Anio='+$("#cmbAnio").val()+'&Anual='+$("#cmbAnual").val(),'contenedorprincipalactivofijo','818'); 
	 else
	 loadOptionBandejas('reportecontabilidad1.php?Id_Menu=5&Id_Submenu=7&Anio='+$("#cmbAnio").val()+'&Anual='+$("#cmbAnual").val()+'&Mes='+$("#cmbMes").val(),'contenedorprincipalactivofijo','818'); 
 });
 
 $("#cmbAnual").change(function(e)
 {
	 //alert('Hola '+$("#cmbAnual").val());
	 if ($("#cmbAnual").val() == 0)
		 $("#liMes").hide();
	 else
		 $("#liMes").show();
 });
 
 function abreDetalle(AF_BC,Anio,Formula,Mes)
 {
   
	$.ajax({
		url : 'includedepcontablelinearecta.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: AF_BC,Anio:Anio,Formula:Formula,Mes: Mes},
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
</script>