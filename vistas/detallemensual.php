 <!-- modal contabilidad contable / Acumulada -->
 <?php 
 error_reporting(0);
 require_once("class/SIGA.php");

 $AFBCPOST = $_POST["AF_BC"];
 $Anio = date("Y");
 if (isset($_POST["Anio"]))
 $Anio = $_POST["Anio"];	 

$Mes = date("m");
 if (isset($_POST["Mes"]))
 $Mes = $_POST["Mes"];	

 $obj = new SIGA(); 
 //$anios = $obj->obtenLineaRecta($AFBCPOST,"");
 //print_r($resultado);
 $anios = $obj->obtenFiscalD4($AFBCPOST,$Anio,1,2,"");
?>
     <div class="modal fade modalchs" data-backdrop="false" id="periodo-contable">
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
                      <div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div>
                      </div>
                      <div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label></div>
                      </div>
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
						<th>MESES DE USO</th>
						<th>% DEPRECIACIÒN ANUAL</th>
						<th>DEPRECIACIÒN MENSUAL</th>
						<th>DEPRECIACIÒN ANUAL</th>
						<th>DEPRECIACIÒN ACUMULADO</th>
						<th>VALOR NETO</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php for ($i=0; $i < count($anios); $i++) { ?>
                      <tr>
					    <td><?php echo $anios[$i]["Anio"] ?></td>
						<td></td>
						<td><?php echo $anios[$i]["Tipo_Activo"] ?></td>
						<td><?php echo $AFBCPOST ?></td>
						<td><?php echo $anios[$i]["Nombre_Activo"] ?></td>
						<td><?php echo date_format($anios[$i]["FechaAdquisicion"],"d/m/Y") ?></td>
						<td></td>
						<td>$<?php echo number_format($anios[$i]["MOI"],2) ?></td>
						<td><?php echo date_format($anios[$i]["FechaAdquisicion"],"d/m/Y") ?></td>
						<td><?php echo $anios[$i]["VidaUtilAnios"] ?></td>
						<td><?php echo $anios[$i]["mesesuso"] ?></td>
						<td><?php echo $anios[$i]["PorcentajeAnual"] ?></td>
						<td><?php echo $anios[$i]["depreciacionmensual"] ?></td>
						<td><?php echo ($anios[$i]["PorcentajeAnual"]*$anios[$i]["MOI"]/100) ?></td>
						<td><?php echo $anios[$i]["depreciacionacumuladamensual"] ?></td>
						<td><?php echo $anios[$i]["valorneto"] ?></td>
						

						
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
		$("#periodo-contable").remove();
		//$("#botonClosePopup").click();
	}
	$("#botonAcumuladaClosePopup").click(function(e){
		$("#periodo-contable").remove();
	});
	</script>