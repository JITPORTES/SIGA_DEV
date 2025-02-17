<!-- modal contabilidad / contable -->
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

 $Formula = 1;
 if (isset($_POST["Formula"]))
 $Formula = $_POST["Formula"];

 $TipoFormula = "Contable";
 if ($Formula == 2)
 $TipoFormula = "Decreciente";	 

 $Calculo = "(MOI / Meses de vida) * Meses a depreciar del periodo";
 if ($Formula == 2)
 $Calculo = "(Indice de aplicación/años de vida) * MOI";	 
	
 $obj = new SIGA(); 
 $anios = $obj->obtenLineaRecta($AFBCPOST,"",$Formula,-1);
 $existe = false;
 for ($i=0; $i < count($anios); $i++)
 {
	 if ($anios[$i]["Anio"] == $Anio)
	 {
		 $existe = true;
		 break;
	 }
 }
 if (!$existe)
 {
 $Anio = $anios[count($anios)-1]["Anio"]; 
 //echo "Anios=".count($anios);
 }
 $resultado = $obj->obtenLineaRecta($AFBCPOST,$Anio,$Formula,$Mes); 
 
 //print_r($resultado);
?>
     <div class="modal fade modalchs" data-backdrop="false" id="periodo-contable">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close"  aria-label="Close" id="botonClosePopup">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Depreciación periodo / <?php echo $TipoFormula?></h4>
          </div>
          <div class="modal-body nopsides npt">

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="generales">
                 <form class="form-horizontal" method="POST" id="formaConta">
                  <div class="gray nm">
                    <div class="row">
                      <div class="col-md-12">


                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Fórmula</label>
                            <div class="col-sm-8">
                               <textarea rows="2" style="width:300px" class="form-control" placeholder="<?php echo $Calculo ?>"></textarea>
                            </div>
                         </div>
                        </div><!-- columna#2 -->

                        <div class="col-md-4">
                          <ul class="nav-time">
						  <!--
                            <li>
                              <a href="#"><span><i class="fa fa-chevron-left" aria-hidden="true"></i></span></a>
                            </li>
                            <li>
                              Mayo
                            </li>
                            <li>
                              <a href="#"><span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                            </li>-->
                            <!--<li>
                              <a href="#"><span><i class="fa fa-chevron-left" aria-hidden="true"></i></span></a>
                            </li>
							
                            <li>
                              <?php echo $Anio ?>
                            </li>
							
                            <li>
                              <a href="#"><span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                            </li>-->
							<li>
							Cambiar Año Fiscal: 
							<select id="cmbAnio">
							  <?php
							  for ($i=$anios[0]["Anio"]; $i <= $anios[count($anios)-1]["Anio"]; $i++) 
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
                          </ul>
                        </div>


                      </div><!-- columna-container -->
                    </div><!-- row -->
                  </div><!-- gray -->
             
                 
                  <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                      
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">No. de Activo</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control" id="inputEmail3" value="<?php echo $AFBCPOST ?>">
                            </div>
                         </div>

                         <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Descripción cta</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control" value="<?php echo $resultado[0]["Nombre_Activo"] ?>" id="Nombre_Activo">
                            </div>
                         </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Clase</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control" value="<?php echo $resultado[0]["Tipo_Activo"] ?>" id="Tipo_Activo">
                            </div>
                        </div>
                            
                            <br/>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Tipo depreciación</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" id="LineaRecta" value="" placeholder="Tipo de Depreciación">
                            </div>
                        </div>
						<?php
							$MOI = number_format($resultado[0]["MOI"],2);
						?>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Monto original de la inversión (MOI)</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" value="$<?php echo $MOI ?>" id="MOI" placeholder="Monto original de la inversión (MOI)">
                            </div>
                        </div>
                         
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">MOI a depreciar</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" value="$<?php echo $MOI ?>" id="MOIDepreciar" placeholder="MOI a depreciar">
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Fecha adquisición</label>
                            <div class="col-sm-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" value="<?php echo date_format($resultado[0]["FechaAdquisicion"],"d/m/Y") ?>" placeholder="Fecha Adquisicion">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Cuenta Contable Activo
</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Cuenta Contable Activo B-10</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Cuenta contable Resultados</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Cuenta contable Resultados</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="inputEmail3" placeholder="">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Vida Útil Años</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="VidaUtil" value="<?php echo $resultado[0]["VidaUtilAnios"] ?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Meses de depreciación acumulada (inicio de periodo)</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" id="MesesDepreciarAcumulada" value="<?php echo $resultado[0]["MesesVida"] ?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Meses a depreciar en el periodo</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="MesesDepreciarPeriodo" value="<?php echo $resultado[0]["mescalculo"] ?>" placeholder="Meses a depreciar en el periodo">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Meses pendientes de depreciar (fin de periodo)</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="MesesDepreciarPeriodo" value="<?php echo $resultado[0]["mesespendientesdepreciarmesfin"] ?>" placeholder="Meses a depreciar en el periodo">
                            </div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Depreciación acumulada (inicio de periodo)</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="DepreciacionAcumulada" value="$<?php echo number_format($resultado[0]["DepreciacionAcumulada"],2) ?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label for="inputEmail3" class="col-sm-6 control-label">Depreciación del periodo</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" id="DepreciacionPeriodo" value="$<?php echo number_format($resultado[0]["depreciacionperiodomes"],2) ?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">MOI pendiente de depreciar (Fin del periodo)</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="MOIPendienteDepreciarFin" value="$<?php echo number_format($resultado[0]["valorneto"],2) ?>" placeholder="">
                            </div>
                        </div>

                        </div><!-- columna#1 -->

                    <div class="col-md-6">
                        <br/><br/>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Fórmula depreciación</label>
                            <div class="col-sm-6">
                            <input type="email"class="form-control text-right" value="<?php echo $TipoFormula ?>" id="FechaConsultar" placeholder="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Fecha a consultar</label>
                            <div class="col-sm-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" value="<?php echo date_format($resultado[0]["FechaConsultar"],"d/m/Y") ?>" " placeholder="">
                                </div>
                            </div>
                        </div>

                        <br/><br/><br/>
                            
                            
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">% Depreciación</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" id="PorcentajeAnual" value="<?php echo number_format($resultado[0]["PorcentajeAnual"],2) ?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">MOI no deducible</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right green" value="N/A" id="MOINODeducible" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Fecha de inicio de depreciación</label>
                            <div class="col-sm-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control gris pull-right datepicker" value="<?php echo date_format($resultado[0]["FechaInicioDepreciacion"],"d/m/Y") ?>" placeholder="Fecha de inicio de depreciación">
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Fecha de finalización depreciación</label>
                            <div class="col-sm-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control gris pull-right datepicker" value="<?php echo date_format($resultado[0]["FechaFinalizacion"],"d/m/Y") ?>" placeholder="Fecha de inicio de depreciación">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Cuenta Contable Deprec</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Cuenta Contable Deprec B-10</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="inputEmail3" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Mesas de vida</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" id="MesesVida" value="<?php echo $resultado[0]["MesesVida"]+$resultado[0]["MesesRestantes"] ?>" placeholder="  $34.375,00">
                            </div>
                        </div>
                        <br/><br>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Meses restantes de vida (Inicio del periodo)</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="MesesRestantes" value="<?php echo $resultado[0]["MesesRestantes"] ?>" placeholder="Meses restantes de vida (Inicio del periodo)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Meses de depreciación acumulada (fin de periodo)</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="MesesDepreciacionAcumulada" value="<?php echo $resultado[0]["mesesuso"] ?>" placeholder="Meses de depreciación acumulada (fin de periodo)">
                            </div>
                        </div>
                        <br/><br/>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">MOI pendiente de depreciar (Inicio del periodo)</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="MOIPendienteDepreciar" value="<?php echo number_format($resultado[0]["MOIPendienteDepreciar"],2) ?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label for="inputEmail3" class="col-sm-7 control-label">Depreciación acumulada (fin de periodo)</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="DepreciacionAcumuladaFin" value="<?php echo number_format($resultado[0]["depreciacionacumuladamesfin"],2) ?>" placeholder="">
                            </div>
                        </div>

                        </div><!-- columna#2 -->
                    </div>
                  </div><!-- row -->

                </form>
              </div><!-- tab#1 -->
            </div>
          </div><!-- modal-body -->
          <div class="modal-footer">
            <button type="button" class="btn chs"   onclick="javascript:cerrarPop();" id="botonCerrarConta">Cerrar</button>
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
	$("#cmbAnio").change(function(e)
	{
		//alert('Hola');
		//console.log("año="+$(this).val());
		//$("#periodo-contable").modal('hide');
		$("#botonClosePopup").click();
		$("#AnioDepreciacion").val($(this).val());
		$('#popupContable').click();
		
	}
	);
	
	$("#cmbMes").change(function(e)
	{
		//alert('Hola');
		//$("#periodo-contable").modal('hide');
		$("#botonClosePopup").click();
		$("#AnioDepreciacion").val($("#AnioDepreciacion").val());
		$("#MesDepreciacion").val($(this).val());
		$('#popupContable').click();
		
	}
	);
	
	$("#botonClosePopup").click(function(e){
		$("#periodo-contable").remove();
	});
	</script>