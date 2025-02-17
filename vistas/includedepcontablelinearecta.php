<!-- modal contabilidad / contable -->
<?php 
 error_reporting(0); 
 require_once("class/SIGA.php");
 $AFBCPOST = $_POST["AF_BC"];
 $Id_Activo = $_POST["Id_Activo"];
 $Anio = date("Y");
 if (isset($_POST["Anio"]))
 {
 if ($_POST["Anio"] != "")	 
 $Anio = $_POST["Anio"];	 
 }

 $Mes = date("m");
 if (isset($_POST["Mes"]))
 $Mes = $_POST["Mes"];	 

 $Formula = 1;
 if (isset($_POST["Formula"]))
 $Formula = $_POST["Formula"];

 $TipoFormula = "Contable";
 if ($Formula == 2)
 $TipoFormula = "Decreciente";	 


 
 $inpcperiodo = 2018;
 if ($Anio < 2018)
 $inpcperiodo = 2017;	 
 /*if (isset($_POST["INPC"]))
 $inpcperiodo = $_POST["INPC"];
*/

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


 $Calculo = "(MOI / Meses de vida) * Meses a depreciar del periodo";
 if ($Formula == 2)
 $Calculo = "(Indice de aplicación/años de vida) * MOI";	 

 $Anual = 1;
 if (isset($_POST["Anual"]))
 $Anual = $_POST["Anual"];
	
 $obj = new SIGA(); 
 $anios = $obj->obtenFiscalD4($AFBCPOST,"",$Formula,1,"",$Fiscal,$inpcperiodo);
 //print_r($anios);
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
 $resultado = $obj->obtenFiscalD4($AFBCPOST,$Anio,$Formula,1,$Mes,$Fiscal,$inpcperiodo); 
 
 $cuentas = $obj->obtenCuentas($Id_Activo); 
 
 $porcentajes = $obj->obtenPorcentajes();
// print_r($porcentajes);
 
 $Tipo = "Contable";
 $Formulatxt = "(MOI / Meses de vida) * Meses a depreciar del periodo";
 if ($Fiscal == 1)
 {
 $Tipo = "Fiscal";	 
 $Formulatxt = "(MOI / Meses de vida) * Meses a depreciar del periodo * Factor de actualización";
 }
 if ($D4 == 1)
 {
 $Tipo = "D4";	 
 $Formulatxt = "(MOI / Meses de vida) * Meses a depreciar del periodo * Factor de actualización";
 }
 if ($B10 == 1)
 {
 $Tipo = "B10";	 
 $Formulatxt = "(MOI / Meses de vida) * Meses a depreciar del periodo * Factor de actualización";
 }
 
 
 function truncate($val, $f="0")
{
    if(($p = strpos($val, '.')) !== false) {
        $val = floatval(substr($val, 0, $p + 1 + $f));
    }
    return $val;
}

function formato_numero($valor,$decimales)
{
	$val = number_format($valor,$decimales);
	$classname = $valor < 0 ? 'negative' : 'positive';
	$cadena =  "<span class='value-$classname'>$".$val."</span>";
    return $cadena;
}
?>
<style>
@media print {
    .modal {
        position: absolute;
        left: 0;
        top: 0;
        margin: 0;
        padding: 0;
        overflow: visible!important;
    }
}


.value-positive {
  color: #000;
}

.value-negative {
color: #fe0000;
}

</style>
   
     <div class="modal fade modalchs" data-backdrop="false" id="periodo-contable">
      <div class="modal-dialog modal-lg" id="cinter">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close"  aria-label="Close" id="botonClosePopup">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Depreciación periodo / <?php echo $Tipo?></h4>
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
                               <textarea rows="2" style="width:300px" class="form-control" placeholder="<?php echo $Formulatxt ?>"></textarea>
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
							
							
							<li>
							
							Tabla INPC: 
							<select id="cmbINPC" disabled>
							  <option <?php if ($inpcperiodo == 2017) echo "selected" ?> value="2017">2017</option>
							  <option <?php if ($inpcperiodo == 2018) echo "selected" ?> value="2018">2018</option>
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
                            <input type="text" value="Línea Recta" readonly class="form-control text-right" id="LineaRecta" value="" placeholder="Tipo de Depreciación">
                            </div>
                        </div>
						<?php
							$MOI = number_format($resultado[0]["MOI"],2);
							$MOIFactura = number_format($resultado[0]["MOIFactura"],2);
						?>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Monto original de la inversión (MOI)</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" value="<?php echo $MOIFactura ?>" id="MOI" placeholder="Monto original de la inversión (MOI)">
                            </div>
                        </div>
                         
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">MOI a depreciar</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" value="<?php echo $MOI ?>" id="MOIDepreciar" placeholder="MOI a depreciar">
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Fecha adquisición</label>
                            <div class="col-sm-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input id="FechaAdquisicion" type="text" class="form-control pull-right datepicker" value="<?php echo date_format($resultado[0]["FechaAdquisicion"],"d/m/Y") ?>" placeholder="Fecha Adquisicion">
                                </div>
                            </div>
                        </div>
						
						
						 <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Fecha de inicio de depreciación</label>
                            <div class="col-sm-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" readonly class="form-control gris pull-right datepicker" value="<?php echo date_format($resultado[0]["FechaInicioDepreciacion"],"d/m/Y") ?>" placeholder="Fecha de inicio de depreciación">
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
                                    <input type="text" readonly class="form-control gris pull-right datepicker" value="<?php echo date_format($resultado[0]["FechaFinalizacion"],"d/m/Y") ?>" placeholder="Fecha de inicio de depreciación">
                                </div>
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">CTA ACTIVO NORMAL</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" value="<?php echo $cuentas[0]["Cuent_Cont_Act"]?>" id="CuentaActivo" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3"  class="col-sm-6 control-label">CTA ACTIVO REEXP</label>
                            <div class="col-sm-6">
                            <input type="email" value="<?php echo $cuentas[0]["Cuent_Cont_Act_B10"]?>" class="form-control text-right" id="CuentaActivoB10" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3"  class="col-sm-6 control-label">CTA DEP NORMAL RESULTADOS</label>
                            <div class="col-sm-6">
                            <input type="email" value="<?php echo $cuentas[0]["Cuent_Cont_Result"]?>" class="form-control text-right" id="CuentaResultados" placeholder="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">CTA DEP REEXP RESULTADOS</label>
                            <div class="col-sm-5">
                            <input type="email" value="<?php echo $cuentas[0]["Cuent_Cont_Result_B10"]?>" class="form-control text-right" id="CuentaResultadosB10" placeholder="">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Vida Útil Contable (Años)</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="VidaUtil" value="<?php echo number_format($resultado[0]["VidaUtil"],6) ?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Meses de depreciación acumulada (inicio de periodo)</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" id="MesesDepreciarAcumulada" value="<?php echo $resultado[0]["mesesdepreciacionacumuladainicioperiodo"] ?>" placeholder="">
                            </div>
                        </div>
						<?php 
						
						if ($Fiscal ==1)
						{
						/*$MesesADepreciar = $resultado[0]["MesActual"];
						if ($Anio == date_format($resultado[0]["FechaInicioDepreciacion"],'Y') )
						$MesesADepreciar = 	$resultado[0]["mesesuso"];
					    if ($Anio >= date_format($resultado[0]["FechaFinalizacion"],"Y") and $Mes >= date_format($resultado[0]["FechaFinalizacion"],"m") )
						$MesesADepreciar = 0;	*/
					    $MesesADepreciar = 	$resultado[0]["MesesDepreciarVariable"];
						}
						else
						{
							$MesesADepreciar = 1;
							if ($Anio >= date_format($resultado[0]["FechaFinalizacion"],"Y") and $Mes >= date_format($resultado[0]["FechaFinalizacion"],"m") )
						    $MesesADepreciar = 0;	
							if ($Anio <= date_format($resultado[0]["FechaInicioDepreciacion"],"Y") and $Mes < date_format($resultado[0]["FechaInicioDepreciacion"],"m") )
						    $MesesADepreciar = 0;
						}
						?>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Meses a depreciar en el periodo</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="MesesDepreciarPeriodo" value="<?php echo $MesesADepreciar ?>" placeholder="Meses a depreciar en el periodo">
                            </div>
                        </div>
						<?php 
						$mespendep = 0;
						if ($resultado[0]["mesespendientedepreciarfinperiodo"] >0)  
						$mespendep =$resultado[0]["mesespendientedepreciarfinperiodo"];
						?>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Meses pendientes de depreciar (fin de periodo)</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="MesesDepreciarPeriodo" value="<?php echo $mespendep ?>" placeholder="Meses a depreciar en el periodo">
                            </div>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Depreciación acumulada (inicio de periodo)</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="DepreciacionAcumulada" value="<?php echo number_format($resultado[0]["depreciacionacumuladainicioperiodo"],2) ?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label for="inputEmail3" class="col-sm-6 control-label">Depreciación del periodo</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" id="DepreciacionPeriodo" value="<?php echo number_format($resultado[0]["depreciacionmensual"],2) ?>" placeholder="">
                            </div>
                        </div>
						<?php 
						$moipendep = 0;
						if ($resultado[0]["moipendientedepreciarfinperiodo"] >=0)  
						$moipendep =$resultado[0]["moipendientedepreciarfinperiodo"];
						?>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">MOI pendiente de depreciar (Fin del periodo)</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="MOIPendienteDepreciarFin" value="<?php echo number_format($moipendep,2) ?>" placeholder="">
                            </div>
                        </div>
						
						
						 <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Depreciacion antes de cambio contable</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" name="MOIAntesCambio" id="MOIAntesCambio" value="<?php echo number_format($resultado[0]["MOIAntes"],2) ?>" placeholder="">
                            </div>
                        </div>
						
						
						<?php if ($Fiscal ==1) { ?>
						<!-- Fiscal -->
						
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">INPC mes de adquisición</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="INPCMesAdquisicion" value="<?php echo number_format($resultado[0]["INPCMesAdquisicion"],4) ?>" placeholder="">
                            </div>
                        </div>

						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">INPC del último mes de la primera mitad del ejercicio</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="INPCUltimoMesPrimMitad" value="<?php echo number_format($resultado[0]["INPCUltimoMesPrimMitad"],4) ?>" placeholder="">
                            </div>
                        </div>

						
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Factor de actualización
</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="Factor" value="<?php echo number_format($resultado[0]["Factor"],4) ?>" placeholder="">
                            </div>
                        </div>
						
						<!-- Fiscal-->
						<?php }?>
						
						<?php if ($D4 ==1) { ?>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Factor D4</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="FactorAjuste" value="<?php echo number_format($resultado[0]["FactorAjuste"]+1,4) ?>" placeholder="">
                            </div>
                        </div>
						<?php }?>

                        </div><!-- columna#1 -->

                    <div class="col-md-6">
                        
						
						<?php 
						$FechaInicioFiscal = $cuentas[0]["FechaInicioFiscal"];
						$DiaInicioFiscal = date_format($FechaInicioFiscal,"d");
						$MesInicioFiscal = date_format($FechaInicioFiscal,"m");						
						$AnioInicioFiscal = date_format($FechaInicioFiscal,"Y");
						?>
						 <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Fecha Adq. Fiscal</label>
                            <div class="col-sm-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" id="FechaInicioFiscal" value="<?php echo str_pad($DiaInicioFiscal, 2, "0", STR_PAD_LEFT)."/".str_pad($MesInicioFiscal, 2, "0", STR_PAD_LEFT)."/".$AnioInicioFiscal ?>" placeholder="">
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Monto Fiscal (MOI FISCAL)</label>
                            <div class="col-sm-6">
                            <input type="email"class="form-control text-right" value="<?php echo number_format($cuentas[0]["MontoFiscal"],2) ?>" id="MontoFiscal" placeholder="">
                            </div>
                        </div>
						
						<?php 
						$FechaFiscal = $cuentas[0]["FechaFiscal"];
						$DiaFiscal = date_format($FechaFiscal,"d");
						$MesFiscal = date_format($FechaFiscal,"m");						
						$AnioFiscal = date_format($FechaFiscal,"Y");
						?>
						 <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Fecha inicio Fiscal</label>
                            <div class="col-sm-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right datepicker" id="FechaFiscal" value="<?php echo str_pad($DiaFiscal, 2, "0", STR_PAD_LEFT)."/".str_pad($MesFiscal, 2, "0", STR_PAD_LEFT)."/".$AnioFiscal ?>" placeholder="">
                                </div>
                            </div>
                        </div>
						<?php 
						$FechaFiscalFin = $cuentas[0]["FechaFiscalFinal"];
						$DiaFiscalFin = date_format($FechaFiscalFin,"d");
						$MesFiscalFin = date_format($FechaFiscalFin,"m");						
						$AnioFiscalFin = date_format($FechaFiscalFin,"Y");
						//$Final = strtotime(date_format($FechaFiscalFin,"Y-m-d"),'+2 year');
						?>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Fecha finalización Fiscal</label>
                            <div class="col-sm-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" readonly class="form-control pull-right datepicker" id="FechaFiscalFin" value="<?php echo str_pad($DiaFiscalFin, 2, "0", STR_PAD_LEFT)."/".str_pad($MesFiscalFin, 2, "0", STR_PAD_LEFT)."/".$AnioFiscalFin ?>"  placeholder="">
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">% Depreciación Fiscal</label>
                            <div class="col-sm-6">
                            
							<select id="cmbPorcentaje" class="form-control text-right">
							  <option value="">-- No Seleccionado</option>
							  <?php
							  for ($i=0; $i < count($porcentajes); $i++) 
							  { 
						      $selected = "";
						      if ($porcentajes[$i]["Id_Cuentas"] == $cuentas[0]["Id_Cuentas"])
							  $selected = "selected";	  
						      ?>
							  <option clave="<?php echo $porcentajes[$i]["PorcentajeFiscal"] ?>" <?php echo $selected ?> value="<?php echo $porcentajes[$i]["Id_Cuentas"] ?>"><?php echo $porcentajes[$i]["PorcentajeFiscal"] ?>% <?php echo $porcentajes[$i]["Descripcion"] ?></option>
							  <?php 
							  }
							  ?>
							</select>
						
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Vida útil Fiscal (Años)</label>
                            <div class="col-sm-6">
                            <input type="email"class="form-control text-right" disabled value="<?php echo $cuentas[0]["VidaUtilFiscal"] ?>" id="VidaUtilFiscal" placeholder="">
                            </div>
                        </div>
						
						<hr>
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
                                    <input type="text" class="form-control pull-right datepicker" value="<?php echo "01/".str_pad($Mes, 2, "0", STR_PAD_LEFT)."/".$Anio ?>" " placeholder="">
                                </div>
                            </div>
                        </div>

                            
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">% Depreciación Contable</label>
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
                            <label for="inputEmail3" class="col-sm-6 control-label">CTA DEP NORMAL BALANCE</label>
                            <div class="col-sm-6">
                            <input type="email" value="<?php echo $cuentas[0]["Cuent_Cont_Dep"]?>" class="form-control text-right" id="CuentaDepreciacion" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">CTA DEP REXP BALANCE</label>
                            <div class="col-sm-5">
                            <input type="email" value="<?php echo $cuentas[0]["Cuent_Cont_Dep_B10"]?>" class="form-control text-right" id="CuentaDepreciacionB10" placeholder="">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">CTA NORMAL DE BAJA</label>
                            <div class="col-sm-5">
                            <input type="email" value="<?php echo $cuentas[0]["Cuent_Cont_Baja"]?>" class="form-control text-right" id="CuentaBaja" placeholder="">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">CTA REEXP DE BAJA</label>
                            <div class="col-sm-5">
                            <input type="email" value="<?php echo $cuentas[0]["CuentaRexBaja"]?>" class="form-control text-right" id="CuentaRexBaja" placeholder="">
                            </div>
                        </div>
						
						
						
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-6 control-label">Meses de vida</label>
                            <div class="col-sm-6">
                            <input type="email" class="form-control text-right" id="MesesVida" value="<?php echo $resultado[0]["MesesDepreciarAcumulada"] ?>" placeholder="">
                            </div>
                        </div>
                        <br>
						
						
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-7 control-label">Meses restantes de vida (Inicio del periodo)</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="MesesRestantes" value="<?php echo $resultado[0]["mesesrestantesvidainicioperiodo"] ?>" placeholder="Meses restantes de vida (Inicio del periodo)">
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
                            <input type="email" class="form-control text-right" id="MOIPendienteDepreciar" value="<?php echo number_format($resultado[0]["moipendientedepreciarinicioperidodo"],2) ?>" placeholder="">
                            </div>
                        </div>
                        <div class="form-group has-error">
                            <label for="inputEmail3" class="col-sm-7 control-label">Depreciación acumulada (fin de periodo)</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="DepreciacionAcumuladaFin" value="<?php echo number_format($resultado[0]["depreciacionacumuladafinperiodo"],2) ?>" placeholder="">
                            </div>
                        </div>
						<?php if ($Fiscal ==1) { ?>
						<div class="form-group has-error">
                            <label for="inputEmail3" class="col-sm-7 control-label">Depreciación Fiscal</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="DepreciacionFiscal" value="<?php echo number_format($resultado[0]["DepreciacionFiscal"],2) ?>" placeholder="">
                            </div>
                        </div>
						<?php 
						$MesesUso = $resultado[0]["mesesdepreciacionacumuladafinperiodo"];
						if ($MesesUso > 12)
							$MesesUso = $Mes;
						?>
						<div class="form-group has-error">
                            <label for="inputEmail3" class="col-sm-7 control-label">Depreciación Fiscal Historica</label>
                            <div class="col-sm-5">
                            <input type="email" class="form-control text-right" id="DepreciacionFiscal" value="<?php echo number_format($resultado[0]["depreciacionmensual"],2) ?>" placeholder="">
                            </div>
                        </div>
						<?php }?>

                        </div><!-- columna#2 -->
                    </div>
					
					
					<?php if ($D4 ==1) { ?>
					 <div class="col-md-10 col-md-push-1" style="margin-top:25px;"> 
                      <div class="row">
                        <div class="col-md-12">
                          <div class="table-responsive">
                            <table class="table table-bordered display" width="100%">
                              <thead>
                                <tr>
                                  <td><h4>DEPRECIACIÓN FISCAL</h4></td>
                                  <td></td>
                                </tr>
                              </thead>
                              <tbody>
							    
                                <tr>
                                  <td>Depreciación del periodo</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["depreciacionmensual"],2) ?></td>
                                </tr>
                                <tr>
                                  <td>Depreciación fiscal</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["DepreciacionFiscal"],2) ?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                  </div>

                    <div class="col-md-10 col-md-push-1"> 
                      <div class="row">
                        <div class="col-md-12">
                          <div class="table-responsive">
                            <table class="table table-bordered display" width="100%">
                              <thead>
                                <tr>
                                  <td><h4>ACTUALIZACIÓN <?php echo $Tipo ?>, INPC D4 <?php echo strip_tags(formato_numero($resultado[0]["Variable"],4)) ?></h4></td>
                                  <td>Histórico</td>
                                  <td>Ajuste <?php echo $Tipo ?></td>
                                  <td>Actualizado</td>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>MOI a depreciar</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["moipendientedepreciarinicioperidodo"],2) ?></td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["AjusteR1"],2) ?></td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["ActualizadoR1"],2) ?></td>
                                </tr>
                                <tr>
                                  <td>Depreciación del periodo</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["depreciacionmensual"],2) ?></td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["AjusteR2"],2) ?></td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["ActualizadoR2"],2) ?></td>
                                </tr>
                                <tr>
                                  <td>Dep acumulada (fin periodo)</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["depreciacionacumuladafinperiodo"],2) ?></td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["AjusteR3"],2) ?></td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["ActualizadoR3"],2) ?></td>
                                </tr>
                                <tr>
                                  <td>MOI pendiente de dep (Fin periodo)</td>
                                  <td class="text-right"><?php echo formato_numero($moipendep,2) ?></td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["AjusteR4"],2) ?></td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["ActualizadoR4"],2) ?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                  </div>
					<?php }?>	
					
					
					<?php if ($B10 ==1) { ?>
					 <div class="col-md-10 col-md-push-1" style="margin-top:25px;"> 
                      <div class="row">
                        <div class="col-md-12">
                          <div class="table-responsive">
                            <table class="table table-bordered display" width="100%">
                              <thead>
                                <tr>
                                  <td><h4>DEPRECIACIÓN B10</h4></td>
                                  <td></td>
                                </tr>
                              </thead>
                              <tbody>
							    
								<tr>
                                  <td>FACTOR B-10</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["FactorAjuste"]+1,4) ?></td>
                                </tr>
                                <tr>
                                  <td>MOI ACTUALIZADO B-10</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["MOIActualizadoB10"],2) ?></td>
                                </tr>
                                <tr>
                                  <td>ACTUALIZACIÓN MOI DEL PERIODO</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["ActMOIPeriodoB10"],2) ?></td>
                                </tr>
								<tr>
                                  <td>EFECTO B-10 MOI DEL MES (A LA PÓLIZA)</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["EfectoB10"],2) ?></td>
                                </tr>
								
								
								 <tr>
                                  <td>TASA CONTABLE</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["PorcentajeContable"],2) ?>%</td>
                                </tr>
                                <tr>
                                  <td>DEPRECIACIÓN ANUAL ACTUALIZADA</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["DepAnualActB10"],2) ?></td>
                                </tr>
								<tr>
                                  <td>DEPRECIACIÓN MENSUAL ACTUALIZADA</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["DepMenActB10"],2) ?></td>
                                </tr>
								
								
								<tr>
                                  <td>MESES DE DEPRECIACIÓN</td>
                                  <td class="text-right"><?php echo $resultado[0]["mescalculo"] ?></td>
                                </tr>
                                <tr>
                                  <td>DEPRECIACIÓN DEL PERIODO ACTUALIZADA</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["DepPerActB10"],2) ?></td>
                                </tr>
								<tr>
                                  <td>DEPRECIACIÓN DEL PERIODO HISTÓRICA</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["DepPeriodoAct"],2) ?></td>
                                </tr>


								<tr>
                                  <td>EFECTO B-10 DEPRECIACIÓN DEL PERIODO</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["EfectoB10Dep"],2) ?></td>
                                </tr>
                                <tr>
                                  <td>EFECTO B-10 DEPRECIACIÓN  DEL MES (A LA PÓLIZA)</td>
                                  <td class="text-right"><?php echo formato_numero($resultado[0]["EfectoB10Mes"],2) ?></td>
                                </tr>
								
								


								




                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                  </div>
					<?php }?>
					
                  </div><!-- row -->

                </form>
              </div><!-- tab#1 -->
            </div>
          </div><!-- modal-body -->
          <div class="modal-footer">
		    <button type="button" class="btn chs"   onclick="javascript:imprimir()" id="botonCerrarConta">Imprimir cuentas</button>
		    <button type="button" class="btn chs"   onclick="javascript:guardarCuentas();" id="botonCerrarConta">Guardar Cuentas</button>
            <button type="button" class="btn chs"   onclick="javascript:cerrarPop();" id="botonCerrarConta">Cerrar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
	</div>
	</div>
	
	<script src="../plugins/imprimir_div/RitsC-PrintArea-2cc7234/demo/PrintArea.js"></script>
	<script>
	function cerrarPop()
	{
		$("#periodo-contable").remove();
		//$("#botonClosePopup").click();
	}
	function imprimir(){
		//printElement(document.getElementById('divLineaRecta'));
		//var $printSection = $(".modal-content");
		//window.print();
		var mode = 'popup'; //popup
        var close = mode == "popup";
        var options = { mode : mode, popClose : close};
        $("div#cinter").printArea();
	
	}
	$("#cmbAnio").change(function(e)
	{
		//alert('Hola');
		<?php if (!isset($_POST["Reporte"])) {?>
		$("#botonClosePopup").click();
		$("#AnioDepreciacion").val($(this).val());
		<?php 
		if ($Fiscal==0) 
		echo "$('#popupContable').click();";
	    else
		{
			if ($Fiscal==1 and $D4 == 0)
				echo "$('#popupFiscal').click();";
			if ($Fiscal==1 and $D4 == 1)
				echo "$('#popupFiscalD4').click();";
			if ($Fiscal==1 and $B10 == 1)
				echo "$('#popupFiscalB10').click();";
		}
		?>
		<?php } else { ?>
		abreDetalle('<?php echo $AFBCPOST?>',$(this).val(),<?php echo $Formula?>,$("#cmbMes").val(),<?php echo $Id_Activo?>,$("#INPCPeriodo").val());
		<?php }?>
	}
	);
	
	$("#cmbMes").change(function(e)
	{
		$("#MesDepreciacion").val($(this).val());
		$("#cmbAnio").change();		
	}
	);
	
	$("#cmbINPC").change(function(e)
	{
		$("#MesDepreciacion").val($("#cmbMes").val());
		$("#INPCPeriodo").val($(this).val());
		$("#cmbAnio").change();		
	}
	);
	
	$("#botonClosePopup").click(function(e){
		$("#periodo-contable").remove();
	});
	
	function guardarCuentas()
	{
		var valida = true;
		$.ajax({
		url : 'verificacuentacontable.php',
			type : "post",
			dataType: 'json',
			data : { Id_Activo: <?php echo $Id_Activo?>},
			success : function(response) 
			    {
			     		
			     if (response == 1)
				 {				 
                   
				   if ( $("#MontoFiscal").val() == '') 
				   {
					   alert('El monto fiscal no puede ser vacio');
					   valida = false;
				   }
				   if (valida)
				   if ( $("#FechaFiscal").val() == '')
				   {
					   alert('La Fecha fiscal no puede ser vacio');
					   valida = false;
				   }
				   if (valida)
				   if ( $("#FechaInicioFiscal").val() == '')
				   {
					   alert('La Fecha de adquisición fiscal no puede ser vacio');
					   valida = false;
				   }
				   if (valida)
				   if ($("#VidaUtilFiscal").val() == '')
				   {
					   alert('La vida útil fiscal no puede ser vacio');
					   valida = false;
				   }
				   if($("#cmbPorcentaje").val() == '')
				   {
					   alert('Debe elegir un porcentaje de depreciación fiscal');
					   valida = false;
				   }
				 	
					if (valida)
					$.ajax({
					url : 'guardacuentas.php',
						type : "post",
						dataType: 'html',
						data : { Id_Cuentas: $("#cmbPorcentaje").val(), Id_Activo: <?php echo $Id_Activo?>,CuentaActivo: $("#CuentaActivo").val(),CuentaActivoB10: $("#CuentaActivoB10").val(),CuentaDepreciacion: $("#CuentaDepreciacion").val(),CuentaDepreciacionB10: $("#CuentaDepreciacionB10").val(),CuentaResultados: $("#CuentaResultados").val(),CuentaResultadosB10: $("#CuentaResultadosB10").val(),CuentaBaja: $("#CuentaBaja").val(),CuentaRexBaja: $("#CuentaRexBaja").val(),MontoFiscal: $("#MontoFiscal").val(),FechaInicioFiscal: $("#FechaInicioFiscal").val(),FechaFiscal: $("#FechaFiscal").val(),VidaUtilFiscal: $("#VidaUtilFiscal").val(),MOIAntesCambio: $("#MOIAntesCambio").val()},
						success : function(response) 
							{
							 $("#botonClosePopup").click();
							 //$('#popupContable').click();
							 <?php 
								if ($Fiscal==0) 
								echo "$('#popupContable').click();";
								else
								{
									if ($Fiscal==1 and $D4 == 0)
										echo "$('#popupFiscal').click();";
									if ($Fiscal==1 and $D4 == 1)
										echo "$('#popupFiscalD4').click();";
								}
							?>	
							},
							error: function(jqXHR, exception) 
							{
								muestraErrorAjax(jqXHR, exception);
							}
						});
				 
				 
				 
				 //$("#botonClosePopup").click();
				 //$('#popupContable').click();
				 }
				 else
				 alert('No exiten los datos contables');	 
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
			
			
			function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("divPrintContent");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "divPrintContent";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    
    $printSection.appendChild(domClone);
}

    $("#cmbPorcentaje").change(function(e){
		 var porcentaje = $('option:selected', $("#cmbPorcentaje")).attr('clave');
         var vida = 1 / ((porcentaje/100));
		 $("#VidaUtilFiscal").val(vida);
	});
	
	$('#FechaFiscal').datepicker({ 
    format: 'dd/mm/yyyy',
	autoclose: true,
  }).datepicker();  
  
  
  $('#FechaInicioFiscal').datepicker({ 
    format: 'dd/mm/yyyy',
	autoclose: true,
  }).datepicker();  

    $('#FechaAdquisicion').datepicker({ 
    format: 'dd/mm/yyyy',
	autoclose: true,
  }).datepicker();  

  
	
	</script>