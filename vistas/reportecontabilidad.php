<?php 
 $style_size_table="font-size:10px";
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
    <div id="tabla_dinamica_reporte">
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
						<th style="<?php echo $style_size_table;?>">INPC mes de adquisición</th>
						<th style="<?php echo $style_size_table;?>">INPC del último mes de la primera mitad del ejercicio</th>
						<th style="<?php echo $style_size_table;?>">Factor de actualización</th>
						<th style="<?php echo $style_size_table;?>">Depreciación fiscal</th>
						<th style="<?php echo $style_size_table;?>">Factor de Ajuste</th>
	
						<th style="<?php echo $style_size_table;?>">MOI a depreciar (Actualizado)</th>
						<th style="<?php echo $style_size_table;?>">Depreciación del periodo (Actualizado)</th>
						<th style="<?php echo $style_size_table;?>">Depreciación acumulada (fin de periodo)  (Actualizado)</th>
						<th style="<?php echo $style_size_table;?>">MOI pendiente de depreciar (Fin del periodo) (Actualizado)</th>
                        <th style="<?php echo $style_size_table;?>">Formula<br>Contable</th>
						<th style="<?php echo $style_size_table;?>">Formula<br>Contable<br>Decreciente</th>
						<th style="<?php echo $style_size_table;?>">Formula<br>Fiscal</th>
						<th style="<?php echo $style_size_table;?>">Formula<br>D4</th>
						<th style="<?php echo $style_size_table;?>">Formula<br>B10</th>
						
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
					    
					    <td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["Anio"] ?></td>
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
						$<?php echo number_format($aniosArr[0]["DepreciacionPeriodo"],2) ?>
						<!--<br>
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
						
						<td>&nbsp;</td>
						<td>
						<a href="#" onclick="javascript:abreDetalleD4('<?php echo $activos[$j]["AF_BC"] ?>',<?php echo $Anio ?>);">
						Fiscal
						</a>
						</td>
						</tr>
						</table>-->
						
						
						</td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["DepreciacionAcumuladaFin"],2) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["MOIPendienteDepreciarFin"],2) ?></td>
						
						<td style="<?php echo $style_size_table;?>"><?php echo number_format($aniosArr[0]["INPCMesAdquisicion"],2) ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo number_format($aniosArr[0]["INPCUltimoMesPrimMitad"],2) ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo number_format($aniosArr[0]["Factor"],6) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["DepreciacionFiscal"],2) ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo number_format($aniosArr[0]["FactorAjuste"],6) ?></td>

						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["ActualizadoR1"],2) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["ActualizadoR2"],2) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["ActualizadoR3"],2) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["ActualizadoR4"],2) ?></td>
						<td><a href="#" onclick="javascript:abreDetalle('<?php echo $activos[$j]["AF_BC"] ?>',<?php echo $Anio ?>,1);">
						<i class="fa fa-table" aria-hidden="true"></i>
						</td>
						<td><a href="#" onclick="javascript:abreDetalle('<?php echo $activos[$j]["AF_BC"] ?>',<?php echo $Anio ?>,2);">
						<i class="fa fa-table" aria-hidden="true"></i>
						</td>
						<td><a href="#" onclick="javascript:abreDetalleFiscal('<?php echo $activos[$j]["AF_BC"] ?>',<?php echo $Anio ?>);">
						<i class="fa fa-table" aria-hidden="true"></i>
						</td>
						<td><a href="#" onclick="javascript:abreDetalleD4	('<?php echo $activos[$j]["AF_BC"] ?>',<?php echo $Anio ?>);">
						<i class="fa fa-table" aria-hidden="true"></i>
						</td>
						<td><a href="#" onclick="javascript:abreDetalleB10('<?php echo $activos[$j]["AF_BC"] ?>',<?php echo $Anio ?>	);">
						<i class="fa fa-table" aria-hidden="true"></i>
						</td>
						
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

function abreDetalleFiscal(AF_BC,Anio)
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

function abreDetalleD4(AF_BC,Anio)
 {
   
	$.ajax({
		url : 'includedepfiscalD4.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: AF_BC,Anio:Anio},
			success : function(response) 
			    {
				  //$("#periodo-contable").modal('hide');	
				  $("#divFiscalD4").html(response);
                  $("#periodo-fiscalD4").modal('show');				  
				},
				error: function(jqXHR, exception) 
				{
					muestraErrorAjax(jqXHR, exception);
				}
			});	

   
}

function abreDetalleB10(AF_BC,Anio)
 {
   
	$.ajax({
		url : 'includedepfiscalD4.php',
			type : "post",
			dataType: 'html',
			data : { AF_BC: AF_BC,Anio:Anio,Tipo:'B10'},
			success : function(response) 
			    {
				  //$("#periodo-contable").modal('hide');	
				  $("#divFiscalD4").html(response);
                  $("#periodo-fiscalD4").modal('show');				  
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