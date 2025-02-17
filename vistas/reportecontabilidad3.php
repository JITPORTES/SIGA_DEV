<?php 
 $style_size_table="font-size:10px";	
 $style_size_table2="font-size:9px";
 error_reporting(0);
 require_once("class/SIGA.php");
 $AFBCPOST = $_POST["AF_BC"];
 $Anio = date("Y");
 if (isset($_GET["Anio"]))
 $Anio = $_GET["Anio"];	

 $Mes = date("m");
 if (isset($_GET["Mes"]))
 $Mes = $_GET["Mes"];


 $Anual = 1;
 if (isset($_GET["Anual"]))
 $Anual = $_GET["Anual"];	 


 $Bajas = 1;
 if (isset($_GET["Bajas"]))
 $Bajas = $_GET["Bajas"];	 

  $inpcperiodo = $Anio;
 /*if (isset($_GET["INPCPeriodo"]))
 $inpcperiodo = $_GET["INPCPeriodo"];*/


 $obj = new SIGA(); 
 
 if (isset($_GET["Anio"]))
 $activos = $obj->obtenActivosContables("",$Anio,$Bajas);

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
			<li class="export"><!--<a href="#" onclick="reporte()">
			<i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar</a>-->
			
			</li>
			<li>
			Año Fiscal: <select id="cmbAnioFiltro">
							  <?php
							  for ($i=2000; $i <= (date("Y")+10); $i++) 
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
				<!--<option value="0" <?php if ($Anual==0) echo "selected" ?>>Anual</option>-->
				<option value="1" <?php if ($Anual==1) echo "selected" ?>>Mensual</option>
  			</select>
			<li>
						<li <?php if ($Anual==0) {?>style="display:none"<?php }?> id="liMes">
			Mes: <select id="cmbMesFiltro">
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
			Mostrar bajas: <select id="cmbBajas">
				<option value="0" <?php if ($Bajas==0) echo "selected" ?>>No</option>
				<option value="1" <?php if ($Bajas==1) echo "selected" ?>>Si</option>
  			</select>
			<li>
			
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
		</ul>
		
	
	                  <table id="example" class="table table-bordered table-striped table-chs">
                    <thead>
                      <tr>
					    <th style="<?php echo $style_size_table;?>">Hijos</th>
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
						<th style="<?php echo $style_size_table;?>">Meses restantes de vida <br>(Inicio del periodo)	</th>
						<th style="<?php echo $style_size_table;?>">MESES A DEPRECIAR <br>DEL PERIODO	</th>
						<th style="<?php echo $style_size_table;?>">Meses de depreciación acumulada <br>(fin de periodo)	</th>
						<th style="<?php echo $style_size_table;?>">MESES PENDIENTES DE DEPRECIAR <br>AL FINAL DEL PERIODO	</th>
						<th style="<?php echo $style_size_table;?>">DEPRECIACION ACUM <br>INICIO DEL PERIODO	</th>
						<th style="<?php echo $style_size_table;?>">MOI pendiente de depreciar<br> (Inicio del periodo)</th>
						<th style="<?php echo $style_size_table;?>">DEPRECIACION DEL PERIODO	</th>
						<th style="<?php echo $style_size_table;?>">DEPRECIACION ACUM <br>AL CIERRE DEL PERIODO	</th>
						<th style="<?php echo $style_size_table;?>">MOI pendiente de depreciar (Fin del periodo)</th>
						<th style="<?php echo $style_size_table;?>">MES CALCULO</th>
						
						<th style="<?php echo $style_size_table;?>">INPC mes de adquisición</th>
						<th style="<?php echo $style_size_table;?>">INPC del último mes de la primera mitad del ejercicio</th>
						<th style="<?php echo $style_size_table;?>">Factor de actualización</th>
						<th style="<?php echo $style_size_table;?>">Depreciación fiscal</th>
						<th style="<?php echo $style_size_table;?>">INPC D4</th>
						
						<th style="<?php echo $style_size_table;?>">MOI Actualizado D4</th>
						<th style="<?php echo $style_size_table;?>">Depreciación del periodo D4</th>
						<th style="<?php echo $style_size_table;?>">Dep acumulada (fin periodo) D4</th>
						<th style="<?php echo $style_size_table;?>">MOI pendiente de dep (Fin periodo) D4</th>
						
						
                      </tr>
                    </thead>
                    <tbody>
					  <?php 
					  
					 for ($j=0; $j < count($activos); $j++) 
					 { 
 
					  $aniosArr = $obj->obtenFiscalD4($activos[$j]["AF_BC"],$Anio,1,$Anual,$Mes,1,$inpcperiodo);

					  //for ($i=0; $i < count($anios); $i++) { 
					  if (count($aniosArr) >0) 
					  {
					  ?>
                      <tr>
					    <td style="<?php echo $style_size_table;?>">
						<?php 
						if ($aniosArr[0]["TieneHijos"] > 0 )
						{
							$aniosArr2 = $obj->obtenHijosActivo($activos[$j]["Id_Activo"]);
							
							for ($k=0; $k < count($aniosArr2); $k++)
							$hijos .= $aniosArr2[$k]["AF_BC"].",";
						
						if (strlen($hijos) >0)
						$hijos = substr($hijos,0,strlen($hijos)-1);	
							?>
							<!--<i class="fa fa-file-excel-o" aria-hidden="true"></i>-->
							
							<?php
							echo $hijos;
						}
					    ?>
						</td>
					    <td style="<?php echo $style_size_table;?>">
						<a href="#" onclick="javascript:abreMensual('<?php echo $activos[$j]["AF_BC"] ?>',<?php echo $Anio ?>,1,<?php echo $Mes ?>);">
						<?php echo $aniosArr[0]["Anio"] ?>
						</a>
						</td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["cuenta"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["Tipo_Activo"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $activos[$j]["AF_BC"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["Nombre_Activo"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo date_format($aniosArr[0]["FechaAdquisicion"],"d/m/Y") ?></td>
						<td style="<?php echo $style_size_table;?>"><?php if ($aniosArr[0]["FechaBaja"] != "") { ?><font color="red">*<?php echo date_format($aniosArr[0]["FechaBaja"],"d/m/Y") ?></font><?php }?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["MOI"],2) ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo date_format($aniosArr[0]["FechaInicioDepreciacion"],"d/m/Y") ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["VidaUtilAnios"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["MesesDepreciarAcumulada"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["PorcentajeAnual"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["mesesdepreciacionacumuladainicioperiodo"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["mesesrestantesvidainicioperiodo"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo 1 ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["mesesdepreciacionacumuladafinperiodo"] ?></td>
						<?php
						$mespendep = 0;
						if ($aniosArr[0]["mesespendientedepreciarfinperiodo"] >0)  
						$mespendep =$aniosArr[0]["mesespendientedepreciarfinperiodo"];
						?>
						<td style="<?php echo $style_size_table;?>"><?php echo $mespendep ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["depreciacionacumuladainicioperiodo"],2) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["moipendientedepreciarinicioperidodo"],2) ?></td>
						<td style="<?php echo $style_size_table;?>">
						<a href="#" onclick="javascript:abreDetalle('<?php echo $activos[$j]["AF_BC"] ?>',<?php echo $Anio ?>,1,<?php echo $Mes ?>,'<?php echo $activos[$j]["Id_Activo"] ?>',<?php echo $inpcperiodo ?>);">
						$<?php echo number_format($aniosArr[0]["depreciacionmensual"],2) ?>
						</a>
						
						</td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["depreciacionacumuladafinperiodo"],2) ?></td>
						<?php
						$moipendep = 0;
						if ($aniosArr[0]["moipendientedepreciarfinperiodo"] >=0)  
						$moipendep =$aniosArr[0]["moipendientedepreciarfinperiodo"];						
						?>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($moipendep,2) ?></td>
						
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr[0]["mescalculo"] ?></td>
						
												<td style="<?php echo $style_size_table;?>"><?php echo number_format($aniosArr[0]["INPCMesAdquisicion"],4) ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo number_format($aniosArr[0]["INPCUltimoMesPrimMitad"],4) ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo number_format($aniosArr[0]["Factor"],4) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["DepreciacionFiscal"],2) ?></td>
					    <td style="<?php echo $style_size_table;?>"><?php echo number_format($aniosArr[0]["Variable"],4) ?></td>
						
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["ActualizadoR1"],4) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["ActualizadoR2"],4) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["ActualizadoR3"],4) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($aniosArr[0]["ActualizadoR4"],4) ?></td>
						
                      </tr>
					  
					  
					  <?php 
					  if ($aniosArr[0]["TieneHijos"] > 0 )
					  {
					    $aniosArr2 = $obj->obtenHijosActivo($activos[$j]["Id_Activo"]);		
						for ($k=0; $k < count($aniosArr2); $k++)
						{
							$hijosArr = $obj->obtenFiscalD4($aniosArr2[$k]["AF_BC"],$Anio,1,$Anual,$Mes,0,$inpcperiodo);
						
					  ?>
					  <tr>
					  
					    <td style="<?php echo $style_size_table;?>">
						+
						</td>
					  
					    <td style="<?php echo $style_size_table;?>">
						<a href="#" onclick="javascript:abreMensual('<?php echo $aniosArr2[$k]["AF_BC"] ?>',<?php echo $Anio ?>,1,<?php echo $Mes ?>);">
						<?php echo $hijosArr[0]["Anio"] ?>
						</a>
						</td>
						<td style="<?php echo $style_size_table;?>"><?php echo $hijosArr[0]["cuenta"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $hijosArr[0]["Tipo_Activo"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $aniosArr2[$k]["AF_BC"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $hijosArr[0]["Nombre_Activo"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo date_format($hijosArr[0]["FechaAdquisicion"],"d/m/Y") ?></td>
						<td style="<?php echo $style_size_table;?>"></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($hijosArr[0]["MOI"],2) ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo date_format($hijosArr[0]["FechaInicioDepreciacion"],"d/m/Y") ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $hijosArr[0]["VidaUtilAnios"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $hijosArr[0]["MesesDepreciarAcumulada"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $hijosArr[0]["PorcentajeAnual"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $hijosArr[0]["mesesdepreciacionacumuladainicioperiodo"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $hijosArr[0]["mesesrestantesvidainicioperiodo"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo 1 ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $hijosArr[0]["mesesdepreciacionacumuladafinperiodo"] ?></td>
						<?php
						$mespendep = 0;
						if ($hijosArr[0]["mesespendientedepreciarfinperiodo"] >0)  
						$mespendep =$hijosArr[0]["mesespendientedepreciarfinperiodo"];
						?>
						<td style="<?php echo $style_size_table;?>"><?php echo $mespendep ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($hijosArr[0]["depreciacionacumuladainicioperiodo"],2) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($hijosArr[0]["moipendientedepreciarinicioperidodo"],2) ?></td>
						<td style="<?php echo $style_size_table;?>">
						<a href="#" onclick="javascript:abreDetalle('<?php echo $activos[$j]["AF_BC"] ?>',<?php echo $Anio ?>,1,<?php echo $Mes ?>,'<?php echo $activos[$j]["Id_Activo"] ?>',<?php echo $inpcperiodo ?>);">
						$<?php echo number_format($hijosArr[0]["depreciacionmensual"],2) ?>
						</a>
						
						</td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($hijosArr[0]["depreciacionacumuladafinperiodo"],2) ?></td>
						<?php
						$moipendep = 0;
						if ($hijosArr[0]["moipendientedepreciarfinperiodo"] >=0)  
						$moipendep =$hijosArr[0]["moipendientedepreciarfinperiodo"];						
						?>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($moipendep,2) ?></td>
						
						<td style="<?php echo $style_size_table;?>"><?php echo $hijosArr[0]["mescalculo"] ?></td>
						
						
												
						<td style="<?php echo $style_size_table;?>"><?php echo number_format($hijosArr[0]["INPCMesAdquisicion"],4) ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo number_format($hijosArr[0]["INPCUltimoMesPrimMitad"],4) ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo number_format($hijosArr[0]["Factor"],4) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($hijosArr[0]["DepreciacionFiscal"],2) ?></td>
						
						 <td style="<?php echo $style_size_table;?>"><?php echo number_format($hijosArr[0]["Variable"],4) ?></td>
						
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($hijosArr[0]["ActualizadoR1"],4) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($hijosArr[0]["ActualizadoR2"],4) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($hijosArr[0]["ActualizadoR3"],4) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($hijosArr[0]["ActualizadoR4"],4) ?></td>

						
                      </tr>
					  
					  <?php
						}					  
					  }
					  
					   }
					 }?>
                    </tbody>
					
					
					<tfoot>
							<tr>
								<th style="<?php echo $style_size_table2;?>">Total:</th>
								<th colspan="7" style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
								<th style="<?php echo $style_size_table2;?>"></th>
							</tr>
						  </tfoot>
					
                  </table>
	
	
	</div>

	<div id="divFiscalD4">
	</div>
           
<!-- Select2 -->
 <script src="../js/select2.full.min.js"></script>

		<!--<script src="DataTables1.10.0/media/js/jquery.dataTables.min.js"></script>-->
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
                /*
				{
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
	  "order": [[ 4, 'asc' ],[ 0, 'desc' ]],
	   "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) 
			{
				
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '').replace(/(<([^>]+)>)/ig,'')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
			
			var currencyFormat = function(num) 
			{
			  return '$' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
			};
 
            // Total over all pages
            total = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
			 total2 = api
                .column( 18 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );	
				
			pageTotal2 = api
                .column( 18, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );	
				
				
			 total3 = api
                .column( 19 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );	
				
			pageTotal3 = api
                .column( 19, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );	


 total4 = api
                .column( 20 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );	
				
			pageTotal4 = api
                .column( 20, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );	


 total5 = api
                .column( 21 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );	
				
			pageTotal5 = api
                .column( 21, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );	


 total6 = api
                .column( 22 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );	
				
			pageTotal6 = api
                .column( 22, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

 total7 = api
                .column( 27 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );	
				
			pageTotal7 = api
                .column( 27, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );				
 
            // Update footer
            $( api.column( 8 ).footer() ).html(
                currencyFormat(pageTotal) +'<br>de Gran total: '+currencyFormat(total) 
            );
			
			$( api.column( 18 ).footer() ).html(
                currencyFormat(pageTotal2) +'<br>de Gran total: '+currencyFormat(total2) 
            );
			
			$( api.column( 19 ).footer() ).html(
               currencyFormat(pageTotal3) +'<br>de Gran total: '+currencyFormat(total3) 
            );
			
			$( api.column( 20 ).footer() ).html(
               currencyFormat(pageTotal4) +'<br>de Gran total: '+currencyFormat(total4)  
            );
			
			$( api.column( 21 ).footer() ).html(
               currencyFormat(pageTotal5) +'<br>de Gran total: '+currencyFormat(total5) 
            );
			
			$( api.column( 22 ).footer() ).html(
               currencyFormat(pageTotal6) +'<br>de Gran total: '+currencyFormat(total6) 
            );
			
			$( api.column( 27 ).footer() ).html(
                currencyFormat(pageTotal7) +'<br>de Gran total: '+currencyFormat(total7) 
            );
        },	  
	  
	  
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
	 //e.preventDefault();
	 if ($("#cmbAnual").val() == 0)
	 loadOptionBandejas('reportecontabilidad3.php?Id_Menu=5&Id_Submenu=7&Anio='+$("#cmbAnioFiltro").val()+'&Anual='+$("#cmbAnual").val()+'&INPCPeriodo='+$("#cmbINPC").val(),'contenedorprincipalactivofijo','3016'); 
	 else
	 loadOptionBandejas('reportecontabilidad3.php?Id_Menu=5&Id_Submenu=7&Anio='+$("#cmbAnioFiltro").val()+'&Anual='+$("#cmbAnual").val()+'&Mes='+$("#cmbMesFiltro").val()+'&INPCPeriodo='+$("#cmbINPC").val(),'contenedorprincipalactivofijo','3016'); 
 
     Activa_btn_menu('li_sub_15', 'S');
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
			data : { AF_BC: AF_BC,Anio:Anio,Formula:Formula,Mes: Mes, Reporte:1,Id_Activo:Id_Activo,Fiscal:1,D4:1,INPC:INPC},
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

function abreMensual(AF_BC,Anio,Formula,Mes)
 {
   
	$.ajax({
		url : 'detallemensual.php',
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