 <!-- modal contabilidad contable / Acumulada -->
 <?php 
 error_reporting(0);
 require_once("class/SIGA.php");
 $AFBCPOST = $_POST["AF_BC"];
 $Anio = date("Y");
 if (isset($_POST["Anio"]))
 $Anio = $_POST["Anio"];	 

$Mes = date("m");
 if (isset($_GET["Mes"]))
 $Mes = $_GET["Mes"];	

$Formula = 1;
 if (isset($_POST["Formula"]))
 $Formula = $_POST["Formula"];

 $TipoFormula = "Contable";
 if ($Formula == 2)
 $TipoFormula = "Decreciente";	 


 
 $inpcperiodo = 2018;
 if ($Anio < 2018)
 $inpcperiodo = 2017;	


 $Fiscal = 0;
 if (isset($_POST["Fiscal"]))
 $Fiscal = $_POST["Fiscal"];

//echo "Fiscal=".$Fiscal;
  $D4 = 0;
 if (isset($_POST["D4"]))
 $D4 = $_POST["D4"];


 $B10 = 0;
 if (isset($_POST["B10"]))
 $B10 = $_POST["B10"];

 $obj = new SIGA(); 
 $anios = $obj->obtenFiscalD4($AFBCPOST,"",$Formula,1,"",$Fiscal,$inpcperiodo);
 
 //print_r($resultado);
?>
     <div class="modal fade modalchs" id="acumulada-contable">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close"  aria-label="Close" id="botonAcumuladaClosePopup">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Depreciación Acumulada / Contable</h4>
          </div>
          <div class="modal-body nopsides npt">

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="generales">
                 <div class="col-md-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                      
                  <table id="example1" class="table table-bordered table-striped table-chs" width="100%">
                    <thead>
                      <tr>
					    <th>AÑO	</th>
						<th>MES	</th>
                        <th>CUENTA CONTABLE	</th>
						<th>TIPO DE ACTIVO	</th>
						<th>NUM ACTIVO	</th>
						<th>NOMBRE DEL EQUIPO	</th>
						<th>FECHA CAPITALIZACION	</th>
						<th>FECHA DE BAJA	</th>
						<th>MOI	</th>
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
                      </tr>
                    </thead>
                    <tbody>
					  <?php for ($i=0; $i < count($anios); $i++) {


						if ($Fiscal ==1)
						{
					    $MesesADepreciar = 	$anios[$i]["MesesDepreciarVariable"];
						}
						else
						{
							$MesesADepreciar = 1;
							if ($Anio >= date_format($anios[$i]["FechaFinalizacion"],"Y") and $Mes >= date_format($anios[$i]["FechaFinalizacion"],"m") )
						    $MesesADepreciar = 0;	
						}
						
						$mespendep = 0;
						if ($anios[$i]["mesespendientedepreciarfinperiodo"] >0)  
						$mespendep =$anios[$i]["mesespendientedepreciarfinperiodo"];
					
						$moipendep = 0;
						if ($anios[$i]["moipendientedepreciarfinperiodo"] >=0)  
						$moipendep =$anios[$i]["moipendientedepreciarfinperiodo"];
					  
					  ?>
                      <tr>
					    <td><?php echo $anios[$i]["Anio"] ?></td>
						<td><?php echo $anios[$i]["MesActual"] ?></td>
						<td></td>
						<td><?php echo $anios[$i]["Tipo_Activo"] ?></td>
						<td><?php echo $AFBCPOST ?></td>
						<td><?php echo $anios[$i]["Nombre_Activo"] ?></td>
						<td><?php echo date_format($anios[$i]["FechaAdquisicion"],"d/m/Y") ?></td>
						<td></td>
						<td>$<?php echo number_format($anios[$i]["MOI"],2) ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo date_format($anios[$i]["FechaInicioDepreciacion"],"d/m/Y") ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $anios[$i]["VidaUtilAnios"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $anios[$i]["MesesDepreciarAcumulada"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $anios[$i]["PorcentajeAnual"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $anios[$i]["mesesdepreciacionacumuladainicioperiodo"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $anios[$i]["mesesrestantesvidainicioperiodo"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $MesesADepreciar ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $anios[$i]["mesesuso"] ?></td>
						<td style="<?php echo $style_size_table;?>"><?php echo $mespendep ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($anios[$i]["depreciacionacumuladainicioperiodo"],2) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($anios[$i]["moipendientedepreciarinicioperidodo"],2) ?></td>
						<td style="<?php echo $style_size_table;?>">
						$<?php echo number_format($anios[$i]["depreciacionmensual"],2) ?>
						
						</td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($anios[$i]["depreciacionacumuladafinperiodo"],2) ?></td>
						<td style="<?php echo $style_size_table;?>">$<?php echo number_format($moipendep,2) ?></td>

						
                      </tr>
					  <?php }?>
                    </tbody>
                  </table>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
              </div><!-- tab#1 -->
            </div>
          </div><!-- modal-body -->
          <div class="modal-footer">
            <button type="button" class="btn chs"  onclick="javascript:cerrarPop();">Cerrar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
	
	<script>
	function cerrarPop()
	{
		$("#acumulada-contable").remove();
		//$("#botonClosePopup").click();
	}
	$("#botonAcumuladaClosePopup").click(function(e){
		$("#acumulada-contable").remove();
	});
	
	
	
	$('#example1').DataTable({
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
	  "order": [[ 0, 'asc' ],[ 1, 'asc' ]],
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
 

	</script>