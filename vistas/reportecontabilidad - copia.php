<?php 
 error_reporting(0);
 require_once("class/SIGA.php");
 $AFBCPOST = $_POST["AF_BC"];
 $Anio = date("Y");
 if (isset($_GET["Anio"]))
 $Anio = $_GET["Anio"];	 

 $obj = new SIGA(); 
 $activos = $obj->obtenActivosContables();

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
  
    <div class="table-responsive" id="tabla_dinamica_reporte">
		<button type="button" class="btn chs" onclick="limpiar_campos()"><--Regresar</button>
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
		</ul>
		
	
	                  <table id="example1" class="table table-bordered table-striped table-chs" width="100%">
                    <thead>
                      <tr>
					    <th>AÑO	</th>
                        <th>CUENTA CONTABLE	</th>
						<th>TIPO DE ACTIVO	</th>
						<th>NUM ACTIVO	</th>
						<th>NOMBRE DEL EQUIPO	</th>
						<th>FECHA CAPITALIZACION	</th>
						<th>FECHA DE BAJA	</th>
						<th>MOI	</th>
						<th>FECHA DE INCIO <br>DE DEPRECIACION	</th>
						<th>VIDA UTIL (AÑOS)	</th>
						<th>MESES VIDA	</th>
						<th>% DEPRECIACIÓN ANUAL	</th>
						<th>MESES DE DEPRECIACIÓN <br>ACUM AL INICIO <br>DEL PERIODO	</th>
						<th>MESES RESTANTES <br>DE VIDA ANTES DEL PERIODO	</th>
						<th>MESES A DEPRECIAR <br>DEL PERODO	</th>
						<th>MESES DE DEPRECIACIÓN ACUM <br>AL FINAL DEL PERIODO	</th>
						<th>MESES PENDIENTES DE DEPRECIAR <br>AL FINAL DEL PERIODO	</th>
						<th>DEPRECIACION ACUM <br>ANTES PERIODO	</th>
						<th>SALDO DEL MOI PENDIENTE POR <br> POR DEPRECIAR ANTES DEL PERIODO	</th>
						<th>DEPRECIACION DEL PERIODO	</th>
						<th>DEPRECIACION ACUM <br>AL CIERRE DEL PERIODO	</th>
						<th>MOI PENDIENTE DE DEPRECIAR AL CIERRE DEL PERIODO</th>
						<th>INPC mes de adquisición</th>
						<th>INPC del último mes de la primera mitad del ejercicio</th>
						<th>Factor de actualización</th>
						<th>Depreciación fiscal</th>
						<th>Factor de Ajuste</th>
						
						<th>MOI a depreciar (Actualizado)</th>
						<th>Depreciación del periodo (Actualizado)</th>
						<th>Depreciación acumulada (fin de periodo)  (Actualizado)</th>
						<th>MOI pendiente de depreciar (Fin del periodo) (Actualizado)</th>

						
                      </tr>
                    </thead>
                    <tbody>
					  <?php 
					  
					 for ($j=0; $j < count($activos); $j++) 
					 { 
 
					  $aniosArr = $obj->obtenFiscalD4($activos[$j]["AF_BC"],$Anio);

					  //for ($i=0; $i < count($anios); $i++) { 
					  if (count($aniosArr) >0) 
					  {
					  ?>
                      <tr>
					    <td><?php echo $aniosArr[0]["Anio"] ?></td>
						<td><?php echo $aniosArr[0]["cuenta"] ?></td>
						<td><?php echo $aniosArr[0]["Tipo_Activo"] ?></td>
						<td><?php echo $activos[$j]["AF_BC"] ?></td>
						<td><?php echo $aniosArr[0]["Nombre_Activo"] ?></td>
						<td><?php echo date_format($aniosArr[0]["FechaAdquisicion"],"d/m/Y") ?></td>
						<td></td>
						<td>$<?php echo number_format($aniosArr[0]["MOI"],2) ?></td>
						<td><?php echo date_format($aniosArr[0]["FechaInicioDepreciacion"],"d/m/Y") ?></td>
						<td><?php echo $aniosArr[0]["VidaUtilAnios"] ?></td>
						<td><?php echo $aniosArr[0]["MesesVida"] ?></td>
						<td><?php echo $aniosArr[0]["PorcentajeAnual"] ?></td>
						<td><?php echo $aniosArr[0]["MesesDepreciarAcumulada"] ?></td>
						<td><?php echo $aniosArr[0]["MesesRestantes"] ?></td>
						<td><?php echo $aniosArr[0]["MesesDepreciarPeriodo"] ?></td>
						<td><?php echo $aniosArr[0]["MesesDepreciacionAcumulada"] ?></td>
						<td><?php echo $aniosArr[0]["MesesPendienteDepreciarFin"] ?></td>
						<td>$<?php echo number_format($aniosArr[0]["DepreciacionAcumulada"],2) ?></td>
						<td>$<?php echo number_format($aniosArr[0]["MOIPendienteDepreciar"],2) ?></td>
						<td>
						$<?php echo number_format($aniosArr[0]["DepreciacionPeriodo"],2) ?>
						<br>
						<table>
						<tr>
						
						<td><a href="#" onclick="javascript:abreDetalle('<?php echo $activos[$j]["AF_BC"] ?>',<?php echo $Anio ?>,1);">
						Contable
						</a></td>
						<td>&nbsp;/</td>
						<td>
						<a href="#" onclick="javascript:abreDetalle('<?php echo $activos[$j]["AF_BC"] ?>',<?php echo $Anio ?>,2);">
						Decreciente
						</a>
						</td>
						
						<td>&nbsp;/</td>
						<td>
						<a href="#" onclick="javascript:abreDetalleD4('<?php echo $activos[$j]["AF_BC"] ?>',<?php echo $Anio ?>);">
						Fiscal
						</a>
						</td>
						</tr>
						</table>
						
						
						</td>
						<td>$<?php echo number_format($aniosArr[0]["DepreciacionAcumuladaFin"],2) ?></td>
						<td>$<?php echo number_format($aniosArr[0]["MOIPendienteDepreciarFin"],2) ?></td>
						
						<td><?php echo number_format($aniosArr[0]["INPCMesAdquisicion"],2) ?></td>
						<td><?php echo number_format($aniosArr[0]["INPCUltimoMesPrimMitad"],2) ?></td>
						<td><?php echo number_format($aniosArr[0]["Factor"],6) ?></td>
						<td>$<?php echo number_format($aniosArr[0]["DepreciacionFiscal"],2) ?></td>
						<td><?php echo number_format($aniosArr[0]["FactorAjuste"],6) ?></td>

						<td>$<?php echo number_format($aniosArr[0]["ActualizadoR1"],2) ?></td>
						<td>$<?php echo number_format($aniosArr[0]["ActualizadoR2"],2) ?></td>
						<td>$<?php echo number_format($aniosArr[0]["ActualizadoR3"],2) ?></td>
						<td>$<?php echo number_format($aniosArr[0]["ActualizadoR4"],2) ?></td>
						
						
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
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

 $("#cmbAnio").change(function(e){
	  loadOptionBandejas('reportecontabilidad.php?Id_Menu=5&Id_Submenu=7&Anio='+$("#cmbAnio").val(),'contenedorprincipalactivofijo','818'); 
 });
 
 function abreDetalle(AF_BC,Anio,Formula)
 {
   
	$.ajax({
		url : 'includedepcontablelinearecta.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: AF_BC,Anio:Anio,Formula:Formula},
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