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

 $obj = new SIGA(); 
 $anios = $obj->obtenLineaRecta($AFBCPOST,"");
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
						<th>MOI PENDIENTE DE DEPRECIAR <br>AL CIERRE DEL PERIODO</th>
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
						<td><?php echo $anios[$i]["MesesVida"] ?></td>
						<td><?php echo $anios[$i]["PorcentajeAnual"] ?></td>
						<td><?php echo $anios[$i]["MesesDepreciarAcumulada"] ?></td>
						<td><?php echo $anios[$i]["MesesRestantes"] ?></td>
						<td><?php echo $anios[$i]["MesesDepreciarPeriodo"] ?></td>
						<td><?php echo $anios[$i]["MesesDepreciacionAcumulada"] ?></td>
						<td><?php echo $anios[$i]["MesesPendienteDepreciarFin"] ?></td>
						<td>$<?php echo number_format($anios[$i]["DepreciacionAcumulada"],2) ?></td>
						<td>$<?php echo number_format($anios[$i]["MOIPendienteDepreciar"],2) ?></td>
						<td>$<?php echo number_format($anios[$i]["DepreciacionPeriodo"],2) ?></td>
						<td>$<?php echo number_format($anios[$i]["DepreciacionAcumuladaFin"],2) ?></td>
						<td>$<?php echo number_format($anios[$i]["MOIPendienteDepreciarFin"],2) ?></td>

						
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
	</script>