<?php
session_start();
$id=$_SESSION["Id_Usuario"];
?>

<style>
  .datepicker{z-index:1151 !important;}
</style>

<link rel="stylesheet" href="../dist/css/jquery-confirm.min.css">
  <script src="../dist/js/jquery-confirm.min.js"></script>
    <!-- File Input -->
  <link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
  <script src="../plugins/docsupport/standalone/selectize.js"></script>
  <script src="../plugins/docsupport/index.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/prettify.js"></script>
  <script src="../js/datepicker.css"></script>  
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  
<!-- 
  <link rel="stylesheet" href="/resources/demos/style.css">
-->
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
          <ul class="nav nav-tabs azulf" role="tablist">
            <li role="presentation" class="active"><a href="#calendario" aria-controls="calendario" role="tab" data-toggle="tab">Calendario</a></li>
            <li role="presentation"><a href="#indicadores" aria-controls="indicadores" role="tab" data-toggle="tab">Indicadores</a></li>
            <li role="presentation"><a href="#reportes" aria-controls="reportes" role="tab" data-toggle="tab">Reportes</a></li>
            <li role="presentation"><a href="#lista" aria-controls="lista" role="tab" data-toggle="tab">Lista</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box amarillo">
          <!-- Button trigger modal -->
            <a href="#" data-toggle="modal" data-target="#Actividades_Activo_Fijo" onclick="limpiar()" id="abrir_popup">
              <span class="info-box-icon bg-yellow"><i class="fa fa-check-circle-o"></i></span>
              <div class="info-box-content">
                <h3 class="info-box-text">Nuevo Mant. Externo</h3>
              </div>
              <!-- /.info-box-content -->
            </a>
          </div>
          <!-- /.info-box -->
        </div>
        
      </div>
      <!-- /.row -->
      
      <!-- Main row -->
      <div class="row">
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane" id="indicadores">
            
            <div class="gray">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="AF/BC">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ubicación Primaria">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Ubicación Secundaria">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea rows="2" class="form-control" placeholder="Descripción corta (200 caracteres)"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-6">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div id="pie-chart-1" class="highcharts pie"></div>
                </div>
              </div><!-- /.box -->
            </div>

            <div class="col-md-6">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div id="pie-chart-2" class="highcharts pie"></div>
                </div>
              </div><!-- /.box -->
            </div>

            <div class="col-md-6">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div id="bar-chart-1" class="highcharts bar"></div>
                </div>
              </div><!-- /.box -->
            </div>

            <div class="col-md-6">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div id="bar-chart-2" class="highcharts bar"></div>
                </div>
              </div><!-- /.box -->
            </div>

          </div><!-- tab#1 -->


<div role="tabpanel" class="tab-pane active" id="calendario">

    <div class="gray">
      <div class="row">
        
        <div class="col-md-10 col-md-offset-1">
            <div class="row">

              <div class="col-md-7">
                <div class="form-group">
                <label  class="control-label" style="font-size: 11px;">AF/BC</label>
                  <div id="muestro_select">
                    <select id="select-activos-search" class="demo-default" placeholder="AF/BC" style="display:none">
                    </select>
                  </div>
                  <div id="gifcargando-search" style="display:none" align="center">
                    <img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
                  </div>
                </div>
              </div>

              <div class="col-md-5">
                <div class="form-group">
                <label  class="control-label" style="font-size: 11px;">Motivo Real</label>
                <select class="form-control" id="cmb_motivo_real_search">
                </select>
                </div>
              </div>

              <div class="col-md-12"></div>

              <div class="col-md-8">
                <div class="form-group">
                <label  class="control-label" style="font-size: 11px;">Descripción de Acciones Realizadas</label>
                <input class="form-control" placeholder="Descripción de Acciones Realizadas" id="txt_Desc_Corta_Search">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label  class="control-label" style="font-size: 11px;">A&ntilde;o</label>
                  <select class="form-control" id="Cmb_Anios_Search">
                  </select>
                </div>
              </div>

            </div>
            <div class="row" align="center">
            <button type="button" class="btn chs" id="btn_buscar_full_calendar" onclick="busqueda_full_calendar(3)">Buscar</button>
            <button type="button" class="btn chs" id="btn_mostrar_full_calendar" onclick="mostrar_full_calendar()" style="display:none">Mostrar Calendario</button>
            </div>
          </div>
        </div>
      </div>

        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="box">
              <div class="box-body">
                <ul class="acoat">
                <li>¿Quién lo realiza?</li>
                <li>Interno<span class="interno"></span></li>
                <li>Externo<span class="externo"></span></li>
                </ul>
                  <div width="100%" align="right">
                    <input type="hidden" id="btn_anio">
                    <input type="hidden" id="btn_mes">
                    <input type="hidden" id="btn_semana">
                    <input type="hidden" id="btn_dia">
                    <div id="calendario-shit"></div>
                  </div>
              </div>
            </div>
          </div>
        </div>



             <br>
            <div class="row">            
            <div class="col-md-10 col-md-offset-1" id="respuesta_busqueda">
      </div>
    </div>

</div><!-- tab#2 -->

    
          <div role="tabpanel" class="tab-pane" id="reportes">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <ul class="nav-time">
                    <li>
                      <a href="#"><span><i class="fa fa-chevron-left" aria-hidden="true"></i></span></a>
                    </li>
                    <li>
                      Mayo
                    </li>
                    <li>
                      <a href="#"><span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                    </li>
                    <li>
                      <a href="#"><span><i class="fa fa-chevron-left" aria-hidden="true"></i></span></a>
                    </li>
                    <li>
                      2017
                    </li>
                    <li>
                      <a href="#"><span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                    </li>
                    <li class="export">
                      <a href="#"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                    </li>
                  </ul>
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped table-chs" width="100%">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Área</th>
                        <th>Manto. Programa</th>
                        <th>Manto. Real</th>
                        <th>Cumplimiento Mayo</th>
                        <th>Clasificación</th>
                        <th>Total Programación</th>
                        <th>Total Real</th>
                        <th>Cumplimiento</th>
                        <th>Descripción</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Recuperación</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1%</td>
                        <td>1%</td>
                        <td>1%</td>
                        <td>1%</td>
                        <td>1%</td>
                        <td>Lorem ipsum sit amet</td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- tab#3 -->
            
          <div role="tabpanel" class="tab-pane" id="lista">
             <div class="col-md-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                  <table id="displayListaActividades" class="table table-bordered table-striped table-chs" width="100%">
                    <thead>
                      <tr>
                        <th>Editar</th>
                        <th>Editar</th>
                        <th>AF/BC</th>
                        <th>Activo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>N/S</th>
                        <th>Motivo_Real</th>
                        <th>Frecuencia</th>
                        <th>Descripción Larga</th>
                        <th>Estatus Activo</th>                        
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
         </div><!-- tab#4 -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



    <!-- modal mantenimiento correctivo -->

    <!-- 
      |--------------------------------------------------------------------------
      | 22 febrero, 2023, 23Feb,23
      | Developer: Alejandro Arias
      |--------------------------------------------------------------------------
      | 
     -->
    <div class="modal fade modalchs" id="Actividades_Activo_Fijo" data-backdrop="false">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">

          <div class="modal-header amarillo">
            <button type="button" class="close" onclick="confirmacion_cerrar('Actividades_Activo_Fijo')">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Mantenimiento Externo</h4>
          </div>

<div class="modal-body nopsides npt">
<form autocomplete="off">
            <div class="gray nm">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  
                  <div class="col-md-4">          
                    
                    <input type="hidden" id="Estatus_Realizado"> 
                    <div class="form-group">
                      <div id="muestro_select">
                        <span><font color="red">*</font></span>
                        <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">AF/BC</label> 
                        <select id="select-activos" class="demo-default" placeholder="AF/BC" style="display:none">
                        </select>
                      </div>
                      <div id="gifcargando1" style="display:none" align="center">
                         <img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
                      </div>
                    </div>
          
                      <div class="form-group">
                        <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Ubicación primaria</label>
                        <input type="text" class="form-control" placeholder="Ubicación primaria" id="txt_ubic_primaria" readonly="readonly">
                      </div>

                      <div class="form-group">
                        <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Ubicación secundaria</label>
                        <input type="text" class="form-control" placeholder="Ubicación secundaria" id="txt_ubic_secundaria" readonly="readonly">
                      </div>

                      <div class="form-group">
                        <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Marca</label>
                        <input type="text" class="form-control" placeholder="Marca" id="txt_marca" readonly="readonly">
                      </div>

                  </div><!-- columna#1 -->

                  <input type="hidden" class="form-control" id="Id_Actividad" readonly="readonly">
                  <input type="hidden" class="form-control" id="txt_Id_Activo" readonly="readonly">

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Nombre Activo</label>
                      <input type="text" class="form-control" placeholder="Nombre" id="txt_Nom_Activo" readonly="readonly">
                    </div>
                      
                    <div class="form-group">
                      <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">No. Serie</label>
                      <input type="text" class="form-control" placeholder="No. de serie" id="text_No_Serie" readonly="readonly">
                    </div>

                    <div class="form-group">
                      <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Descripción corta</label>
                      <textarea rows="1" class="form-control" placeholder="Descripción Corta" id="text_Desc_Corta" readonly="readonly"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Modelo</label>
                      <input type="text" class="form-control" placeholder="Modelo" id="text_Modelo" readonly="readonly">
                    </div>

                    <div class="form-group" style="display:none">
                      <label class="control-label" id="cmbareasLabel" style="font-size: 11px;">AF/BC</label>
                      <input type="text" class="form-control" placeholder="AF/BC" id="text_AFBC" readonly="readonly">
                    </div>

                    <div class="form-group" style="display:none">
                      <label class="control-label" id="cmbareasLabel" style="font-size: 11px;">Usuario Responsable</label>
                      <input type="text" class="form-control" placeholder="Usuario Resp." id="text_Usr_Resp" readonly="readonly">
                    </div>

                    <div class="form-group" style="display:none">
                      <label class="control-label" id="cmbareasLabel" style="font-size: 11px;">Id Usuario</label>
                      <input type="text" class="form-control" placeholder="Id Usuario" id="text_Id_Usuario" readonly="readonly">
                    </div>

                    </div><!-- columna#2 -->

                  <div class="col-md-4">
                    <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Foto</label>
                    <div class="form-group" id="Imagen_Activo">
                    <img src="" style="width:150px;height:150px;">
                    </div>
                  </div><!-- columna#2 -->
          
                </div>
              </div>
            </div>
               
            <div class="row">
              <div class="col-md-10 col-md-offset-1">

                  <div class="col-md-4">
                      <div class="form-group">
                        <span><font color="red">*</font></span>
                        <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Gestor</label>
                        <input type="text" class="form-control" placeholder="Gestor" id="Usuario_Responsable" readonly="readonly">
                      </div><!-- # 1 -->
                  </div>
                  <!-- columna#1 -->

                  <div class="col-md-8">
                    <div class="form-group">
                      <ul class="inline">
                      <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">¿Quién lo realiza?</label>
                      <!-- #3 -->
                      <input type="hidden" class="form-control" placeholder="Folio Documento" value="radio_externo" id="" name="" readonly>
                      <input type="text" class="form-control" placeholder="Folio Documento" value="Externo" id="" name="" readonly>
                      </ul>
                    </div>
                  </div>

              </div>
            </div>

          <div class="row">
            <div class="col-md-10 col-md-offset-1">
            <!-- columna#2 -->


              <div class="col-md-4">
                  <label for="Fecha_solicitud" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Fecha Reporte Levantado</label> 
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input class="form-control" type="date" id="Fecha_solicitud" name="Fecha_solicitud">
                  </div>
              </div>

            <div class="col-md-8">
              <div class="form-group">
              <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Folio Reporte Externo</label>
              <input type="text" class="form-control" placeholder="Folio Documento" id="folio_reporte_externo" name="folio_reporte_externo" required>
              </div>
            </div>

            </div>
          </div>
<!-- columna#3 #2 -->

          <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="col-md-4">
                  <label for="Fecha_Realizada" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Fecha Servicio Realizado</label> 
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input class="form-control" type="date" id="Fecha_Realizada" name="Fecha_Realizada">
                  </div>
                </div>

              <div class="col-md-8">
                <div class="form-group">
                  <span><font color="red">*</font></span>
                  <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Sección</label>
                  <select class="form-control" id="select_seccion" name="select_seccion">
                  </select>
                </div>
              </div>

            </div>  
          </div>


        <div class="row">
          <div class="col-md-10 col-md-offset-1">

            <div class="col-md-4">
              <div class="form-group">
                <span><font color="red">*</font></span>
                <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Categoria</label>
                <select class="form-control" id="select_categoria" name="select_categoria">
                </select>
              </div>
            </div>

            <div class="col-md-8">
              <div class="form-group">
                <span><font color="red">*</font></span>
                <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Sub Categoria</label>
                <select class="form-control" id="select_categoria_sub" name="select_categoria_sub">
                </select>
              </div>
            </div>

          </div>  
        </div>

        <div class="row">
          <div class="col-md-10 col-md-offset-1">

            <div class="col-md-4">
              <div class="form-group">
                <span><font color="red">*</font></span>
                <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Nombre Empresa:</label>
                <select class="form-control" id="select_ejecutantes" name="select_ejecutantes">
                </select>
              </div>
            </div>

                <div class="col-md-8">
                  <div class="form-group">
                    <span><font color="red">*</font></span>
                    <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Motivo Real</label>
                    <select class="form-control" id="cmb_motivo_real">
                    </select>
                  </div>
                </div>

          </div>  
        </div>


        <div class="row">
          <div class="col-md-10 col-md-offset-1">

            <div class="col-md-12">
              <div class="form-group">
              <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Descripción de lo reportado</label>
              <textarea rows="1" class="form-control" placeholder="Descripción de lo reportado" id="descripcion_de_lo_reportado" name="descripcion_de_lo_reportado" rows="4"></textarea>
              </div>
            </div>

          </div>
        </div>
      

      <div class="row">
        <div class="col-md-10 col-md-offset-1">

          <div class="col-md-12">
            <div class="form-group">
            <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Descripción de Acciones Realizadas</label>
            <textarea rows="1" class="form-control" placeholder="Descripción de Acciones Realizadas" id="txt_Desc_Corta" rows="4"></textarea>
            </div>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          
          <div class="col-md-4">
            <div class="form-group">
              <span><font color="red">*</font></span>
              <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Estatus final del Equipo</label>
              <select class="form-control" id="estatus_final_del_equipo" name="estatus_final_del_equipo">
                <option></option>
              </select>
            </div>
          </div>

          <div class="col-md-8">
            <div class="form-group">
            <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Nombre Ingeniero Externo</label>
            <input type="text" class="form-control" placeholder="Nombre Ingeniero Externo" id="nombre_ingeniero_externo" name="nombre_ingeniero_externo" required>
            </div>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          
          <div class="col-md-4">
            <div class="form-group">
              <span><font color="red">*</font></span>
              <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Gestor que levanta reporte</label>
              <select class="form-control" id="select_gestor_levanta_reporte" name="select_gestor_levanta_reporte">
                <option></option>
              </select>
            </div>
          </div>

          <div class="col-md-8">
            <div class="form-group">
              <span><font color="red">*</font></span>
              <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Gestor que recibe reporte</label>
              <select class="form-control" id="select_gestor_recibe_reporte" name="select_gestor_recibe_reporte">
                <option></option>
              </select>
            </div>
          </div>

        </div>
      </div>

<br/>
<!-- row -->


<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div id="div_de_materiales" >
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      <span class="control-label" style="font-size: 14px;">Agregar Materiales</span>
    </div>   
  </div>
</div>

<div id="tabla_de_materiales" style="display:none;"> 

  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="col-md-12">      
        <div class="table-responsive">

        <table class="table table-striped table-bordered" width="100%">
          <thead>
              <tr>
                <td style="width: 30%;">Materiales Almacén</td>
                <td style="width: 8%;">Folio Alm.</td>
                <td>Sku</td>
                <td>Refer.</td>
                <td>Clase</td>
                <td>Ubic</td>
                <td>Unid</td>
                <td>Costo</td>
                <td>Exis</td>
                <td style="width: 4%;">Cantidad</td>
                <td>Importe</td>
              </tr>
          </thead>

          <tbody>

          <?php for ($i = 1; $i <= 5; $i++) { ?>

           <tr>
              <td style="width: 30%;">
                <select class="form-group" id="combo_accesorios_<?php echo $i;?>" name="combo_accesorios_<?php echo $i;?>" >
                </select>
                <input type="hidden" name="descripcion_accesorios_<?php echo $i;?>" id="descripcion_accesorios_<?php echo $i;?>">
              </td>
              <td>
                <div>
                <input type="text" class="form-control" id="Folio_Almacen_<?php echo $i;?>" name="Folio_Almacen_<?php echo $i;?>" maxlength="6">
                </div>
              </td>
              <td>
                <div>
                  <span id="sku_vista_<?php echo $i;?>" name="sku_vista_<?php echo $i;?>"></span>
                  <span id="sku_<?php echo $i;?>" name="sku_<?php echo $i;?>" hidden></span>
                </div>
              </td>
              <td>
                <div>
                  <span id="referencia_<?php echo $i;?>" name="referencia_<?php echo $i;?>"></span>
                </div>
              </td>
              <td>
                <div>
                  <span id="clase_<?php echo $i;?>" name="clase_<?php echo $i;?>"></span>
                </div>
              </td>
              <td>
                <div>
                  <span id="localizacion_<?php echo $i;?>" name="localizacion_<?php echo $i;?>"></span>
                </div>
              </td>
              <td>
                <div>
                  <span id="unidad_<?php echo $i;?>" name="unidad_<?php echo $i;?>"></span>
                </div>
              </td>
              <td>
                <div class="text-right">
                  <span id="costo_<?php echo $i;?>" name="costo_<?php echo $i;?>"></span>
                  <input type="hidden" name="costo_valor_<?php echo $i;?>" id="costo_valor_<?php echo $i;?>">
                </div>
              </td>
              <td>
                <div class="text-right">
                  <span id="existencia_<?php echo $i;?>" name="existencia_<?php echo $i;?>"></span>
                </div>
              </td>
              <td style="width: 4%;">
                <div>
                <input type="text" class="form-control" id="cantidad_<?php echo $i;?>" name="cantidad_<?php echo $i;?>" disabled maxlength="3">
                </div>
              </td>
              <td width="8%" class="text-right">
                <div class="text-right">
                  <span id="importe_<?php echo $i;?>" name="importe_<?php echo $i;?>">0.00</span>
                </div>
              </td>
            </tr>
        <?php }?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="col-md-12">      
      <div class="table-responsive">

        <table class="table table-striped table-bordered" width="100%">

          <thead>
            <tr>
              <td width="35%">Materiales Externos</td>
              <td>Refer.</td>
              <td>Costo</td>
              <td>Cantidad</td>
              <td>Importe</td>
            </tr>
          </thead>

        <?php for ($i = 1; $i <= 5; $i++) { ?>

            <tr>
              <td width="35%">
                <div>
                  <input type="text" class="form-control" id="manual_descripcion_<?php echo $i;?>" name="manual_descripcion_<?php echo $i;?>" maxlength="255" placeholder="Descripción Material">
                </div>
              </td>
              <td>
                <div>
                  <input type="text" class="form-control" id="manual_codigo_de_barras_<?php echo $i;?>" name="manual_codigo_de_barras_<?php echo $i;?>" maxlength="30" placeholder="No. Parte">
                </div>
              </td>
              <td>
                <div>
                  <input type="text" class="form-control" id="manual_costo_<?php echo $i;?>" name="manual_costo_<?php echo $i;?>" maxlength="6" placeholder="Costo">
                </div>
              </td>
              <td>
                <div>
                  <input type="text" min="0" class="form-control" id="manual_cantidad_<?php echo $i;?>" name="manual_cantidad_<?php echo $i;?>" maxlength="6" placeholder="Cantidad">
                </div>
              </td>
              <td width="8%" class="text-right">
                <div>
                  <span id="manual_total_<?php echo $i;?>" name="manual_total_<?php echo $i;?>">0.00</span>
                </div>
              </td>
            </tr>
        <?php }?>
            <tfoot>
              <tr>
                <td colspan="3"></td>
                <td>Total</td>
                <td class="text-right"><span id="Total_Costos" name="Total_Costos">0.00</span></td>
              </tr>
            </tfoot>

        </table>

      </div>
    </div>
  </div>
</div>


</div>
<br>      

      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="admin-content">
            <div class="col-md-12">
              <div class="form-group" id="Cadena_doc_adjuntos">
              <!--
              <input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading" />
              <input type="text" id="url_documentos_adjuntos">  
              -->
              </div>
              <div id="div_archivos_multiples_lista"></div>
            </div>
          </div>  
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="col-md-12">
            <div class="form-group">
              <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Comentarios</label>
              <textarea rows="4" class="form-control" placeholder="Comentarios" id="txt_comentarios"></textarea>
            </div>
          </div>
        </div>
      </div>

      <br>
      <br>

<!-- #04 -->

</form>
</div>

<div class="modal-footer">

  <table border="0" align="center">
    <tr>
      <td>
      <button type="button" class="btn chs" onclick="guardar()" id="btn_guardar">Guardar</button>
      </td>
    </tr>
  </table>

</div>

<!-- #05 -->

<!-- termina modal mantenimiento correctivo -->

<div class="control-sidebar-bg"></div>


<!-- ./wrapper -->

<!-- File Input -->
<script src="../plugins/fileinput/fileinput.js"></script>
<script src="../plugins/fileinput/fileinput_locale_es.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!--<script src="../plugins/fullcalendaryear/fullcalendar.js"></script>-->

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="funciones_actividades.js"></script>


<!-- Open
JS donde se llena los datos de la tabla de materiales,
los select se extraer de assit.
-->

<script src="../poo/compartidos/ajax/tabla_accesorios.js"></script>

<!-- Closed -->

<script>
  
  if (top.location != location) {
    top.location.href = document.location.href ;
  }
  
// #07
</script>

<script>
// #10

    $('#upload-1').fileinput({
    uploadAsync: true,
    showUpload: false,
    showRemove: false,
    maxFileCount: 1,
    minFileCount: 0,
    browseClass: "btn chs",
    validateInitialCount: true,
    language: 'es'
  }); 
   
  //ver actividades por fecha
  function muestro_actividades_por_fecha(Id_dia_calendar){
    var val=Id_dia_calendar.split("-");
    var Id_Actividad=val[0];
    var Fecha=val[1];
    
    pasarvalores(Id_Actividad, 3, Fecha);
  }


$(document).ready(function(){

// Inicio.- Está función se encuentra en ../poo/compartidos/ajax/tabla_accesorios.js

$("#div_de_materiales").click(function(){
  $('#tabla_de_materiales').toggle(1500);
 });
accesorios();

// Fin. 
  catalogos_carga_inicio=function(){

      $.ajax({ 
          url: '../poo/mantenimiento_correctivo/ajax/cat_ejecutantes.php',
          type: 'POST',
          dataType: 'json',
          data: {Id_Area: 1},
            success:function(data) {
              $("#select_ejecutantes").html(data);
            } 
        });

      $.ajax({ 
          url: '../poo/mantenimiento_correctivo/ajax/cat_seccion.php',
          type: 'POST',
          dataType: 'json',
          data: {Id_Area: 1},
            success:function(data) {
              $("#select_seccion").html(data);
            } 
        });

      $.ajax({
        url: '../poo/mantenimiento_correctivo/ajax/cat_gestores.php',
        type: 'POST',
        dataType: 'json',
        data: {Id_Area:1},
          success: function(data){
          $('#select_gestor_levanta_reporte').html(data);
          $('#select_gestor_recibe_reporte').html(data);
            }
      });

      $.ajax({ 
          url: '../poo/mantenimiento_correctivo/ajax/cat_estatus_equipo.php',
          type: 'POST',
          dataType: 'json',
          data: {},
            success:function(data) {
              $("#estatus_final_del_equipo").html(data);
            } 
        });

  }
      
  $('#select_seccion').change(function(){
      var Id_Seccion = $(this).val();
      $('#select_categoria_sub').html('');
      $.ajax({
          url: '../poo/mantenimiento_correctivo/ajax/cat_categoria.php',
          type: 'POST',
          dataType: 'json',
          data: {Id_Seccion: Id_Seccion},
            success: function(data){
              $('#select_categoria').html(data);
            }
      });
  });

  $('#select_categoria').change(function(){
      var Id_Categoria = $(this).val();

      $.ajax({
          url: '../poo/mantenimiento_correctivo/ajax/cat_categoria_sub.php',
          type: 'POST',
          dataType: 'json',
          data: {Id_Categoria: Id_Categoria},
          success: function(data){
              $('#select_categoria_sub').html(data);
          }
      });

  });

  $('#select_categoria').change(function(){
      var Id_Categoria = $(this).val();
      $.ajax({
          url: '../poo/mantenimiento_correctivo/ajax/cat_categoria_sub.php',
          type: 'POST',
          dataType: 'json',
          data: {Id_Categoria: Id_Categoria},
          success: function(data){
              $('#select_categoria_sub').html(data);
          }
      });
  });

  combo_motivo_real();
  
  //url_direccion="../Archivos/Archivos-Actividades/Mantenimiento-Correctivo";
  url_direccion="../Archivos/Archivos-Mesa/";
  Estatus_Tipo_Actividad=3;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /////
  //llenar_calendario(3);
  autocomplete_activos();
  /*Inicia Controles Busqueda*/
  //autocomplete_activos_search();
  /*Fin*/
  //cmb_frecuencia();
  
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  guardar=function(){

        var Agregar = true; 
        var mensaje_error="";
        var Id_Actividad=$("#Id_Actividad").val();
        
        //Usuario Logueado
        var Id_Usuario=$("#usuariosesion").val();
        //Area
        var Id_Area=$("#idareasesion").val();
        //Mant. Predictivo=1, Mant. Preventivo=2, Mant. Correctivo=3, Capacitacion=4 
        var Tipo_Actividad=3;
        var vincular_mesa_ayuda=0;
        
        var Id_Activo=$.trim($("#txt_Id_Activo").val());
        //
        var Usuario_Responsable=$.trim($("#text_Usr_Resp").val());
        var Usuario_Responsable_num_empleado=$.trim($("#text_Usr_Resp").val());

        var cmb_motivo_real=$.trim($("#cmb_motivo_real").val());
        //var Fecha_Programada=$.trim($("#Fecha_Programada").val());
        var Fecha_Realizada=$.trim($("#Fecha_Realizada").val());
        //var Id_Frecuencia=$("#cmb_frecuencia").val();
        var Descripcion=$.trim($("#txt_Desc_Corta").val());
        var url_documentos_adjuntos=$.trim($("#url_documentos_adjuntos").val());
        var Comentarios=$.trim($("#txt_comentarios").val());

// #

/*
|--------------------------------------------------------------------------
| 15 de febrero, 2023
| Developer: Alejandro Arias
| Se agregan estos campos.
|--------------------------------------------------------------------------
| 
*/
        var quien_realiza               =1; 
        var select_seccion              =$("#select_seccion").val();
        var select_categoria            =$("#select_categoria").val();
        var select_categoria_sub        =$("#select_categoria_sub").val();
        var folio_reporte_externo       =$("#folio_reporte_externo").val();
        var Fecha_solicitud             =$.trim($("#Fecha_solicitud").val());
        var select_ejecutantes          =$("#select_ejecutantes").val();
        var descripcion_de_lo_reportado =$("#descripcion_de_lo_reportado").val();
        var estatus_final_del_equipo    =$("#estatus_final_del_equipo").val();
        var nombre_ingeniero_externo    =$("#nombre_ingeniero_externo").val();     
        var select_gestor_levanta_reporte=$("#select_gestor_levanta_reporte").val();
        var select_gestor_recibe_reporte=$("#select_gestor_recibe_reporte").val();

/*
|--------------------------------------------------------------------------
| 20 de abril, 2023
| Developer: Alejandro Arias
| Se agregan estos campos.
|--------------------------------------------------------------------------
| 
*/
        var descripcion_1     =$("#descripcion_accesorios_1").val();
        var descripcion_2     =$("#descripcion_accesorios_2").val();
        var descripcion_3     =$("#descripcion_accesorios_3").val();
        var descripcion_4     =$("#descripcion_accesorios_4").val();
        var descripcion_5     =$("#descripcion_accesorios_5").val();
        var combo_accesorios_1= $("#combo_accesorios_1").val();
        var combo_accesorios_2= $("#combo_accesorios_2").val();
        var combo_accesorios_3= $("#combo_accesorios_3").val();
        var combo_accesorios_4= $("#combo_accesorios_4").val();
        var combo_accesorios_5= $("#combo_accesorios_5").val();
        var Folio_Almacen_1   = $("#Folio_Almacen_1").val();
        var Folio_Almacen_2   = $("#Folio_Almacen_2").val();
        var Folio_Almacen_3   = $("#Folio_Almacen_3").val();
        var Folio_Almacen_4   = $("#Folio_Almacen_4").val();
        var Folio_Almacen_5   = $("#Folio_Almacen_5").val();
        var clase_1   = $("#clase_1").html();
        var clase_2   = $("#clase_2").text();
        var clase_3   = $("#clase_3").text();
        var clase_4   = $("#clase_4").text();
        var clase_5   = $("#clase_5").text();
        var unidad_1   = $("#unidad_1").html();
        var unidad_2   = $("#unidad_2").text();
        var unidad_3   = $("#unidad_3").text();
        var unidad_4   = $("#unidad_4").text();
        var unidad_5   = $("#unidad_5").text();
        var costo_valor_1     = $("#costo_valor_1").val();
        var costo_valor_2     = $("#costo_valor_2").val();
        var costo_valor_3     = $("#costo_valor_3").val();
        var costo_valor_4     = $("#costo_valor_4").val();
        var costo_valor_5     = $("#costo_valor_5").val();
        var cantidad_1        = $("#cantidad_1").val();
        var cantidad_2        = $("#cantidad_2").val();
        var cantidad_3        = $("#cantidad_3").val();
        var cantidad_4        = $("#cantidad_4").val();
        var cantidad_5        = $("#cantidad_5").val();

        var manual_descripcion_1    = $("#manual_descripcion_1").val();
        var manual_descripcion_2    = $("#manual_descripcion_2").val();
        var manual_descripcion_3    = $("#manual_descripcion_3").val();
        var manual_descripcion_4    = $("#manual_descripcion_4").val();
        var manual_descripcion_5    = $("#manual_descripcion_5").val();
        var manual_codigo_de_barras_1= $("#manual_codigo_de_barras_1").val();
        var manual_codigo_de_barras_2= $("#manual_codigo_de_barras_2").val();
        var manual_codigo_de_barras_3= $("#manual_codigo_de_barras_3").val();
        var manual_codigo_de_barras_4= $("#manual_codigo_de_barras_4").val();
        var manual_codigo_de_barras_5= $("#manual_codigo_de_barras_5").val();
        var manual_costo_1          = $("#manual_costo_1").val();
        var manual_costo_2          = $("#manual_costo_2").val();
        var manual_costo_3          = $("#manual_costo_3").val();
        var manual_costo_4          = $("#manual_costo_4").val();
        var manual_costo_5          = $("#manual_costo_5").val();
        var manual_cantidad_1       = $("#manual_cantidad_1").val();
        var manual_cantidad_2       = $("#manual_cantidad_2").val();
        var manual_cantidad_3       = $("#manual_cantidad_3").val();
        var manual_cantidad_4       = $("#manual_cantidad_4").val();
        var manual_cantidad_5       = $("#manual_cantidad_5").val();

/* 
|--------------------------------------------------------------------------
| 13 de febrero, 2023
| Developer: Alejandro Arias
| Se agregan estos campos, se comentan estos if ya que solo será externo(valor 1)
|--------------------------------------------------------------------------
| 
*/

/*
if($("#radio_interno").prop('checked')){
quien_realiza=0;
}

if($("#radio_externo").prop('checked')){
quien_realiza=1;
}
*/    

//console.log(descripcion_2);

          if (manual_descripcion_1.length != 0) {
            if(manual_codigo_de_barras_1.length ==0){
                Agregar = false; 
                  mensaje_error += " -Falta Código de Barras <br />";
                    $("#manual_codigo_de_barras_1").focus();
            }else if(manual_costo_1.length ==0){
                Agregar = false; 
                  mensaje_error += " -Falta Costo <br />";
                    $("#manual_costo_1").focus();
            }else if(manual_cantidad_1.length==0){
                Agregar = false; 
                  mensaje_error += " -Falta Cantidad <br />";
                    $("#manual_cantidad_1").focus();
            }
          } 

          if (manual_descripcion_2.length != 0) {
            if(manual_codigo_de_barras_2.length ==0){
                Agregar = false; 
                  mensaje_error += " -Falta Código de Barras <br />";
                    $("#manual_codigo_de_barras_2").focus();
            }else if(manual_costo_2.length ==0){
                Agregar = false; 
                  mensaje_error += " -Falta Costo <br />";
                    $("#manual_costo_2").focus();
            }else if(manual_cantidad_2.length==0){
                Agregar = false; 
                  mensaje_error += " -Falta Cantidad <br />";
                    $("#manual_cantidad_2").focus();
            }
          } 

          if (manual_descripcion_3.length != 0) {
            if(manual_codigo_de_barras_3.length ==0){
                Agregar = false; 
                  mensaje_error += " -Falta Código de Barras <br />";
                    $("#manual_codigo_de_barras_3").focus();
            }else if(manual_costo_3.length ==0){
                Agregar = false; 
                  mensaje_error += " -Falta Costo <br />";
                    $("#manual_costo_3").focus();
            }else if(manual_cantidad_3.length==0){
                Agregar = false; 
                  mensaje_error += " -Falta Cantidad <br />";
                    $("#manual_cantidad_3").focus();
            }
          } 

          if (manual_descripcion_4.length != 0) {
            if(manual_codigo_de_barras_4.length ==0){
                Agregar = false; 
                  mensaje_error += " -Falta Código de Barras <br />";
                    $("#manual_codigo_de_barras_4").focus();
            }else if(manual_costo_4.length ==0){
                Agregar = false; 
                  mensaje_error += " -Falta Costo <br />";
                    $("#manual_costo_4").focus();
            }else if(manual_cantidad_4.length==0){
                Agregar = false; 
                  mensaje_error += " -Falta Cantidad <br />";
                    $("#manual_cantidad_4").focus();
            }
          } 

          if (manual_descripcion_5.length != 0) {
            if(manual_codigo_de_barras_5.length ==0){
                Agregar = false; 
                  mensaje_error += " -Falta Código de Barras <br />";
                    $("#manual_codigo_de_barras_5").focus();
            }else if(manual_costo_5.length ==0){
                Agregar = false; 
                  mensaje_error += " -Falta Costo <br />";
                    $("#manual_costo_5").focus();
            }else if(manual_cantidad_5.length==0){
                Agregar = false; 
                  mensaje_error += " -Falta Cantidad <br />";
                    $("#manual_cantidad_5").focus();
            }
          } 


          if (combo_accesorios_1 != 'default' && combo_accesorios_1.length != 0) {
            if(Folio_Almacen_1.length == 0){
            Agregar = false; 
              mensaje_error += " -Faltan Folio del Almacen<br />";
                $("#Folio_Almacen_1").focus();
              } else if (cantidad_1.length==0){
                  Agregar = false; 
                    mensaje_error += " -Faltan Cantidad<br />";
                      $("#cantidad_1").focus();
              }
          }

          if (combo_accesorios_2 != 'default' && combo_accesorios_2.length != 0) {
            if(Folio_Almacen_2.length == 0){
            Agregar = false; 
              mensaje_error += " -Faltan Folio del Almacen<br />";
                $("#Folio_Almacen_2").focus();
              } else if (cantidad_2.length==0){
                  Agregar = false; 
                    mensaje_error += " -Faltan Cantidad<br />";
                      $("#cantidad_2").focus();
              }
          }        

          if (combo_accesorios_3 != 'default' && combo_accesorios_3.length != 0) {
            if(Folio_Almacen_3.length == 0){
            Agregar = false; 
              mensaje_error += " -Faltan Folio del Almacen<br />";
                $("#Folio_Almacen_3").focus();
              } else if (cantidad_3.length==0){
                  Agregar = false; 
                    mensaje_error += " -Faltan Cantidad<br />";
                      $("#cantidad_3").focus();
              }
          }

          if (combo_accesorios_4 != 'default' && combo_accesorios_4.length != 0) {
            if(Folio_Almacen_4.length == 0){
            Agregar = false; 
              mensaje_error += " -Faltan Folio del Almacen<br />";
                $("#Folio_Almacen_4").focus();
              } else if (cantidad_4.length==0){
                  Agregar = false; 
                    mensaje_error += " -Faltan Cantidad<br />";
                      $("#cantidad_4").focus();
              }
          }

          if (combo_accesorios_5 != 'default' && combo_accesorios_5.length != 0) {
            if(Folio_Almacen_5.length == 0){
            Agregar = false; 
              mensaje_error += " -Faltan Folio del Almacen<br />";
                $("#Folio_Almacen_5").focus();
              } else if (cantidad_5.length==0){
                  Agregar = false; 
                    mensaje_error += " -Faltan Cantidad<br />";
                      $("#cantidad_5").focus();
              }
          }

          if (Id_Activo.length<= 0) {
            Agregar = false; 
            mensaje_error += " -Falta agregar el Activo<br />";
          }
          
          if (Usuario_Responsable.length<= 0) {
            Agregar = false; 
            mensaje_error += " -Falta agregar el usuario responsable<br />";
          }
          
          if (cmb_motivo_real== -1) {
            Agregar = false; 
            mensaje_error += " -Falta agregar el Motivo Real<br />";
          }
          
          if (Fecha_Realizada.length<= 0) {
            Agregar = false; 
            mensaje_error += " -Falta seleccionar la Fecha Relizada<br />";
          }
          //else{
            //Fecha_Realizada=Fecha_Realizada[6]+''+Fecha_Realizada[7]+''+Fecha_Realizada[8]+''+Fecha_Realizada[9]+''+Fecha_Realizada[3]+''+Fecha_Realizada[4]+''+Fecha_Realizada[0]+''+Fecha_Realizada[1];
          //}

          if (Fecha_solicitud.length<= 0) {
            Agregar = false; 
            mensaje_error += " -Falta seleccionar la Fecha Solicitud<br />";
          }

          //else{
            //Fecha_solicitud=Fecha_solicitud[6]+''+Fecha_solicitud[7]+''+Fecha_solicitud[8]+''+Fecha_solicitud[9]+''+Fecha_solicitud[0]+''+Fecha_solicitud[1]+''+Fecha_solicitud[3]+''+Fecha_solicitud[4];
          //}

          if (select_seccion== null) {
            Agregar = false; 
            mensaje_error += " -Falta seleccionar Sección<br />";
          }

          if (select_categoria== null) {
            Agregar = false; 
            mensaje_error += " -Falta seleccionar Categoria<br />";
          }

          if (select_categoria_sub== null) {
            Agregar = false; 
            mensaje_error += " -Falta seleccionar Sub Categoria<br />";
          }

          if (select_categoria_sub== null) {
            Agregar = false; 
            mensaje_error += " -Falta seleccionar Sub Categoria<br />";
          }

          if (select_ejecutantes== null) {
            Agregar = false; 
            mensaje_error += " -Falta seleccionar Ejecutante<br />";
          }

          if (folio_reporte_externo== '') {
            Agregar = false; 
            mensaje_error += " -Falta agregar Folio Externo<br />";
          }

          if (descripcion_de_lo_reportado== '') {
            Agregar = false; 
            mensaje_error += " -Falta agregar Descripción de lo Reportado<br />";
          }

          if (Descripcion== '') {
            Agregar = false; 
            mensaje_error += " -Falta agregar Descripción de Acciones Realizadas<br />";
          }

          if (estatus_final_del_equipo== null) {
            Agregar = false; 
            mensaje_error += " -Falta seleccionar Estatus Final del Equipo<br />";
          }

          if (nombre_ingeniero_externo== '') {
            Agregar = false; 
            mensaje_error += " -Falta agregar Nombre del Ingeniero Externo<br />";
          } 

          if (select_gestor_levanta_reporte== '') {
            Agregar = false; 
            mensaje_error += " -Falta seleccionar Gestor Levanta Reporte<br />";
          }  

          if (select_gestor_recibe_reporte== null) {
            Agregar = false; 
            mensaje_error += " -Falta seleccionar Gestor Recibe Reporte<br />";
          }          

          if(quien_realiza==1){
            if($("#url_documentos_adjuntos").val()==""){
              Agregar = false;
              mensaje_error += " -Adjunta algún documento<br />";
            }
          }

          if (Comentarios== '') {
            Agregar = false; 
            mensaje_error += " -Faltan agregar Comentarios<br />";
          } 


          /*
          if($("#vincular_mesa_ayuda_si").prop('checked')){
            vincular_mesa_ayuda=1;
          }
          
          if($("#vincular_mesa_ayuda_no").prop('checked')){
            vincular_mesa_ayuda=2;
          }*/
    
    
    if (!Agregar){
      mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");      
    }
    if(Agregar){
      var strDatos="";  
      if(Id_Actividad.length <= 0){

        strDatos={
          Id_Area:Id_Area,
          Tipo_Actividad:Tipo_Actividad,
          Id_Activo:Id_Activo,
          Usuario_Responsable:Usuario_Responsable,
          Id_Motivo_Real:cmb_motivo_real,
          Fecha_Realizada:Fecha_Realizada,
          Descripcion:Descripcion,
          Realiza:quien_realiza,
          url_documentos_adjuntos:url_documentos_adjuntos,
          Comentarios:Comentarios,
          vincular_mesa_ayuda:1,
          descripcion_1     : descripcion_1,
          descripcion_2     : descripcion_2,
          descripcion_3     : descripcion_3,
          descripcion_4     : descripcion_4,
          descripcion_5     : descripcion_5,
          combo_accesorios_1: combo_accesorios_1,
          combo_accesorios_2: combo_accesorios_2,
          combo_accesorios_3: combo_accesorios_3,
          combo_accesorios_4: combo_accesorios_4,
          combo_accesorios_5: combo_accesorios_5,
          Folio_Almacen_1   : Folio_Almacen_1,
          Folio_Almacen_2   : Folio_Almacen_2,
          Folio_Almacen_3   : Folio_Almacen_3,
          Folio_Almacen_4   : Folio_Almacen_4,
          Folio_Almacen_5   : Folio_Almacen_5,
          clase_1           : clase_1,
          clase_2           : clase_2,
          clase_3           : clase_3,
          clase_4           : clase_4,
          clase_5           : clase_5,
          unidad_1          : unidad_1,
          unidad_2          : unidad_2,
          unidad_3          : unidad_3,
          unidad_4          : unidad_4,
          unidad_5          : unidad_5,
          costo_valor_1     : costo_valor_1,
          costo_valor_2     : costo_valor_2,
          costo_valor_3     : costo_valor_3,
          costo_valor_4     : costo_valor_4,
          costo_valor_5     : costo_valor_5,
          cantidad_1        : cantidad_1,
          cantidad_2        : cantidad_2,
          cantidad_3        : cantidad_3,
          cantidad_4        : cantidad_4,
          cantidad_5        : cantidad_5,

          manual_descripcion_1    : manual_descripcion_1,
          manual_descripcion_2    : manual_descripcion_2,
          manual_descripcion_3    : manual_descripcion_3,
          manual_descripcion_4    : manual_descripcion_4,
          manual_descripcion_5    : manual_descripcion_5,
          manual_codigo_de_barras_1: manual_codigo_de_barras_1,
          manual_codigo_de_barras_2: manual_codigo_de_barras_2,
          manual_codigo_de_barras_3: manual_codigo_de_barras_3,
          manual_codigo_de_barras_4: manual_codigo_de_barras_4,
          manual_codigo_de_barras_5: manual_codigo_de_barras_5,
          manual_costo_1          : manual_costo_1,
          manual_costo_2          : manual_costo_2,
          manual_costo_3          : manual_costo_3,
          manual_costo_4          : manual_costo_4,
          manual_costo_5          : manual_costo_5,
          manual_cantidad_1       : manual_cantidad_1,
          manual_cantidad_2       : manual_cantidad_2,
          manual_cantidad_3       : manual_cantidad_3,
          manual_cantidad_4       : manual_cantidad_4,
          manual_cantidad_5       : manual_cantidad_5,

          quien_realiza               : quien_realiza,
          select_seccion              : select_seccion,
          select_categoria            : select_categoria,
          select_categoria_sub        : select_categoria_sub,
          folio_reporte_externo       : folio_reporte_externo ,
          Fecha_solicitud             : Fecha_solicitud,
          select_ejecutantes          : select_ejecutantes,
          descripcion_de_lo_reportado : descripcion_de_lo_reportado,
          estatus_final_del_equipo    : estatus_final_del_equipo,
          nombre_ingeniero_externo    : nombre_ingeniero_externo,
          select_gestor_levanta_reporte: select_gestor_levanta_reporte,
          select_gestor_recibe_reporte: select_gestor_recibe_reporte,

          //
          Usr_Inser:Id_Usuario,
          Estatus_Reg:"1" 
          //accion:"guardar_man_correctivo"
          };
      }
      else
      {
        strDatos={
          Id_Actividad:Id_Actividad,
          Id_Area:Id_Area,
          Tipo_Actividad:Tipo_Actividad,
          Id_Activo:Id_Activo,
          Usuario_Responsable:Usuario_Responsable,
          Id_Motivo_Real:cmb_motivo_real,
          //Fecha_Programada:Fecha_Programada,
          Fecha_Realizada:Fecha_Realizada,
          //Id_Frecuencia:Id_Frecuencia,
          Descripcion:Descripcion,
          Realiza:quien_realiza,
          url_documentos_adjuntos:url_documentos_adjuntos,
          Comentarios:Comentarios,
          vincular_mesa_ayuda:vincular_mesa_ayuda,
          
          //
          /*
          Mant_RAC1:Mant_RAC1,
          Mant_RAC2:Mant_RAC2,
          Mant_RAC3:Mant_RAC3,
          Mant_RAC4:Mant_RAC4,
          Cantidad_1:Cantidad_1,
          Cantidad_2:Cantidad_2,
          Cantidad_3:Cantidad_3,
          Cantidad_4:Cantidad_4,
          Costo_1:Costo_1,
          Costo_2:Costo_2,
          Costo_3:Costo_3,
          Costo_4:Costo_4,
          Horas:Horas,
          Costos_Materiales_CE:Costos_Materiales_CE,
          Mano_Obra_CE:Mano_Obra_CE,
          Total_CE:Total_CE,
          Costos_Materiales_CI:Costos_Materiales_CI,
          Mano_Obra_CI:Mano_Obra_CI,
          Total_CI:Total_CI,
          Ahorro:Ahorro,
          */
          //
          Usr_Mod:Id_Usuario,
          Estatus_Reg:"2",      
          accion:"modificar_man_correctivo"
          };
      }

      $("#btn_guardar").prop('disabled', true);

      $.ajax({
        type: "POST",
        encoding:"UTF-8",
        url: "../poo/mantenimiento_correctivo/ajax/insert_actividad_ticket.php",        
        data: strDatos,
        dataType: "JSON",
        beforeSend: function (xhr) {

        },
        success: function (data) {
        
            limpiar();
            //Mostramos el mensaje de exito
            mensajesalerta("&Eacute;xito", data, "success", "dark"); 
            //Ocultamos la ventana modal
            $('#Actividades_Activo_Fijo').modal('hide');
            //Cargamos la tabla dinamica
            $('#displayListaActividades').DataTable().ajax.reload();
            Archivos_Multiples_Adjuntar();
            
        },
        error: function (data) {
          mensajesalerta("Oh No!", "Ocurrio un error al guardar","error", "dark");
          }
      });


}

/*
      $.ajax({
        type: "POST",
        encoding:"UTF-8",
        url: "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",        
        async: false,
        data: strDatos,
        dataType: "html",
        beforeSend: function (xhr) {

        },
        success: function (data) {
            limpiar();
            //Mostramos el mensaje de exito
            mensajesalerta("&Eacute;xito", data.text, "success", "dark"); 
            //Ocultamos la ventana modal
            $('#Actividades_Activo_Fijo').modal('hide');
            //Cargamos la tabla dinamica
            $('#displayListaActividades').DataTable().ajax.reload();
        },
        error: function () {
          mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
          }
      });
    }
*/
}

  
  limpiar=function(){
    //Boton generar pdf
    $("#td_formato").html('');
    $("#select_categoria").html('');
    $("#select_categoria_sub").html('');
    $("#folio_reporte_externo").val("");
    $("#nombre_ingeniero_externo").val("");
    $("#descripcion_de_lo_reportado").val("");
    $("#txt_Desc_Corta").val("");
    $("#Fecha_solicitud").val("");

      $("#sku_1").html();
      $("#referencia_1").html('');
      $("#clase_1").html('');
      $("#localizacion_1").html('');
      $("#unidad_1").html('');
      $("#costo_1").html('');
      $("#existencia_1").html('');
      $("#costo_valor_1").val('');
      $("#cantidad_1").val();
      $("#importe_1").html('0.00');
      $('#combo_accesorios_1').data('selectize').setValue("default");

      $("#sku_2").html();
      $("#referencia_2").html('');
      $("#clase_2").html('');
      $("#localizacion_2").html('');
      $("#unidad_2").html('');
      $("#costo_2").html('');
      $("#existencia_2").html('');
      $("#costo_valor_2").val('');
      $("#cantidad_2").val();
      $("#importe_2").html('0.00');
      $('#combo_accesorios_2').data('selectize').setValue("default");

      $("#sku_3").html();
      $("#referencia_3").html('');
      $("#clase_3").html('');
      $("#localizacion_3").html('');
      $("#unidad_3").html('');
      $("#costo_3").html('');
      $("#existencia_3").html('');
      $("#costo_valor_3").val('');
      $("#cantidad_3").val();
      $("#importe_3").html('0.00');
      $('#combo_accesorios_3').data('selectize').setValue("default");

      $("#sku_4").html();
      $("#referencia_4").html('');
      $("#clase_4").html('');
      $("#localizacion_4").html('');
      $("#unidad_4").html('');
      $("#costo_4").html('');
      $("#existencia_4").html('');
      $("#costo_valor_4").val('');
      $("#cantidad_4").val();
      $("#importe_4").html('0.00');
      $('#combo_accesorios_4').data('selectize').setValue("default");

      $("#sku_5").html();
      $("#referencia_5").html('');
      $("#clase_5").html('');
      $("#localizacion_5").html('');
      $("#unidad_5").html('');
      $("#costo_5").html('');
      $("#existencia_5").html('');
      $("#costo_valor_5").val('');
      $("#cantidad_5").val();
      $("#importe_5").html('0.00');
      $('#combo_accesorios_5').data('selectize').setValue("default");

      $("#manual_descripcion_1").val('');
      $("#manual_descripcion_2").val('');
      $("#manual_descripcion_3").val('');

      $( "#manual_codigo_de_barras_1" ).prop( "disabled", true );
      $( "#manual_costo_1" ).prop( "disabled", true );
      $( "#manual_cantidad_1" ).prop( "disabled", true );
      $( "#manual_codigo_de_barras_1" ).val('');
      $( "#manual_costo_1" ).val(null);
      $( "#manual_cantidad_1" ).val(null);
      $( "#manual_total_1" ).html('0.00');

      $( "#manual_codigo_de_barras_2" ).prop( "disabled", true );
      $( "#manual_costo_2" ).prop( "disabled", true );
      $( "#manual_cantidad_2" ).prop( "disabled", true );
      $( "#manual_codigo_de_barras_2" ).val('');
      $( "#manual_costo_2" ).val(null);
      $( "#manual_cantidad_2" ).val(null);
      $( "#manual_total_2" ).html('0.00');

      $( "#manual_codigo_de_barras_3" ).prop( "disabled", true );
      $( "#manual_costo_3" ).prop( "disabled", true );
      $( "#manual_cantidad_3" ).prop( "disabled", true );
      $( "#manual_codigo_de_barras_3" ).val('');
      $( "#manual_costo_3" ).val(null);
      $( "#manual_cantidad_3" ).val(null);
      $( "#manual_total_3" ).html('0.00');
      
      sumar();

    catalogos_carga_inicio();
    
    //Obtener fecha
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth()+1; //hoy es 0!
    var yyyy = hoy.getFullYear();

    if(dd<10) {
      dd='0'+dd
    } 

    if(mm<10) {
      mm='0'+mm
    } 

    hoy = yyyy+''+mm+''+dd;
    var Fech_Actual=dd+'/'+mm+'/'+yyyy;
    /////////////////////////////////////
              
    $("#Estatus_Realizado").val("");
    
    $("#Id_Actividad").val("");
    //Limpiamos los datos del activo
    //Limpiamos el autocomplete
    var Nom_Activo=$.trim($("#select-activos").val());
    if(Nom_Activo!=""){     
      if(Nom_Activo.length > 0){
        var $select3 = $('#select-activos').selectize({});  
        var control3 = $select3[0].selectize;
        control3.clear();
        control3.enable();
      }
    }
    $("#txt_Id_Activo").val("");
    $("#txt_Nom_Activo").val("");
    $("#txt_ubic_primaria").val("");
    $("#text_No_Serie").val("");
    $("#txt_ubic_secundaria").val("");
    $("#text_Desc_Corta").val("");
    $("#txt_marca").val("");
    $("#text_Modelo").val("");
    $("#text_AFBC").val("");
    $("#text_Usr_Resp").val("");
    $("#text_Id_Usuario").val("");
    /////////////////////////////////
    /////////////////////////////////
    $("#Usuario_Responsable").val($("#Usuario_Logueado").val());
    $("#cmb_motivo_real").val("-1");
    
    //Deshabilita radios quien realiza
    $("#radio_interno").attr('disabled', false);
    $("#radio_externo").attr('disabled', false);
    
    //$("#Fecha_Realizada").attr('disabled', true);
    $("#Fecha_Realizada").val(Fech_Actual);
    //$("#cmb_frecuencia").val("-1");
    $("#txt_Desc_Corta").val("");
    //////
    /*
    $("#Mant_RAC1").val("");
    $("#Mant_RAC2").val("");
    $("#Mant_RAC3").val("");
    $("#Mant_RAC4").val("");
    $("#Cantidad_M_1").val("");
    $("#Cantidad_M_2").val("");
    $("#Cantidad_M_3").val("");
    $("#Cantidad_M_4").val("");
    $("#Costo_M_1").val("");
    $("#Costo_M_2").val("");
    $("#Costo_M_3").val("");
    $("#Costo_M_4").val("");
    $("#Total_Costos").val("");
    $("#Horas").val("");
    $("#Costos_Materiales_CE").val("");
    $("#Mano_Obra_CE").val("");
    $("#Total_CE").val("");
    $("#Costos_Materiales_CI").val("");
    $("#Mano_Obra_CI").val("");
    $("#Total_CI").val("");
    $("#Ahorro").val("");
    */
    //////
    $("#url_documentos_adjuntos").val();
    $("#txt_comentarios").val("");
    $("#radio_interno").prop( "checked", true );
    
    //$("#vincular_mesa_ayuda_si").prop( "checked", true );
    $("#vincular_mesa_ayuda_no").prop( "checked", true );
    
    $("#radio_interno").prop( "checked", true );
     
    Archivos_Multiples_Adjuntar();

    // #8
    
    ///////////////////////////////////////////////////////////////
    //Habilitar radios vincular mesa de ayuda
    $("#Usuario_Responsable").attr('disabled', false);
    $("#cmb_motivo_real").attr('disabled', false);
    //$("#cmb_frecuencia").attr('disabled', false);
    $("#txt_Desc_Corta").attr('disabled', false);
    
    $("#vincular_mesa_ayuda_si").attr('disabled', false);
    $("#vincular_mesa_ayuda_no").attr('disabled', false);
  
    //Disable boton guardar
    $("#btn_guardar").attr('disabled', false);
    
  }
  

  //Llenar Tabla Dinamicamente
  $('#displayListaActividades').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",
            "type": "POST",
      "data": {
        Id_Area:$("#idareasesion").val(),
        Tipo_Actividad:"3",
      }
        },
        "columns": [
      { "data": "Id_Actividad", "visible": false},
      {
          "data": function (obj) {
              var edicion = '';
              edicion += '<span onclick="pasarvalores(' + obj.Id_Actividad + ', 1,null)"><i class="fa fa-pencil" aria-hidden="true" ></i></span>';
                    edicion += '<span onclick="pasarelimina(' + obj.Id_Actividad + ')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
          return edicion;
          }
      },
      { "data": "AF_BC"},
      { "data": "Nombre_Activo"},
      { "data": "Marca"},
      { "data": "Modelo"},
      { "data": "NumSerie"},
      { "data": "Motivo_Servicio"},
      { "data": "Desc_Frecuencia"},
      { "data": "Descripcion"},
      { "data": "Estatus_Activo"}
      
        ], "language": {
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
  
  //Pasar Valores al Editar
  pasarvalores=function(id, estatus, fecha=null) {
    
    if(estatus==1 || estatus==3){
      limpiar();
    }
    
    $("#Estatus_Realizado").val(estatus);
        if (id != "") {
            $.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",
                async: false,
                data: {
          //Fecha_Det_Programada:fecha,
          Estatus_Reg:"1",
                    Id_Actividad: id,
                    accion: "consultar"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
                success: function (data) {
          var LoRealiza=0;
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
            
            $("#td_formato").html('<a href="../controladores/activos/siga_actividades/Reporte-Mantenimiento-Correctivo.php?Id_Actividad='+id+'" class="btn chs" role="button" target="_blank" id="Btn_Formato">Formato</a>');
            
            if(estatus==1 || estatus==3){
              var $select3 = $('#select-activos').selectize({});  
              var control3 = $select3[0].selectize;
              control3.addItem(data.data[0].Id_Activo);
              
              $("#Id_Actividad").val(data.data[0].Id_Actividad);
              $("#Usuario_Responsable").val(data.data[0].Usuario_Responsable);
              $("#cmb_motivo_real").val(data.data[0].Id_Motivo_Real);
              
              var eliminar_archivo="";
            
              if(data.data[0]["Id_Actividad"]!=""){
                eliminar_archivo="no";
              }
              
              //Chekear radios quien realiza
            if(data.data[0].Realiza=="0"){$("#radio_interno").prop( "checked", true );LoRealiza=0;}
            if(data.data[0].Realiza=="1"){$("#radio_externo").prop( "checked", true );LoRealiza=1;}
              
              /*
              var Fecha_Prog=data.data[0].Fecha_Programada[6]+''+data.data[0].Fecha_Programada[7]+'/'+data.data[0].Fecha_Programada[4]+''+data.data[0].Fecha_Programada[5]+'/'+data.data[0].Fecha_Programada[0]+''+data.data[0].Fecha_Programada[1]+''+data.data[0].Fecha_Programada[2]+''+data.data[0].Fecha_Programada[3];
              $("#Fecha_Programada").val(Fecha_Prog);
              */
              if(estatus==3){
                //Si se han calificado los estatus de cada actividad ya sea ok, fallo, no aplica., mostrara el div de calificaciones
                if(data.data[0].Fecha_Realizada.length>0){
                  $("#Estatus_Calif_Guardar").val("1");
                  //Mostrar div Calificacion
                  //$("#div_calificacion").show();
                  //Muestro boton formato
                  $("#Btn_Formato").show();
                }else{
                  //Ocultar div Calificacion 
                  //$("#div_calificacion").hide();
                  //Muestro boton formato
                  $("#Btn_Formato").hide();
                }
              
                if(data.data[0].Fecha_Realizada.length>0){
                  var Fecha_Real=data.data[0].Fecha_Realizada[6]+''+data.data[0].Fecha_Realizada[7]+'/'+data.data[0].Fecha_Realizada[4]+''+data.data[0].Fecha_Realizada[5]+'/'+data.data[0].Fecha_Realizada[0]+''+data.data[0].Fecha_Realizada[1]+''+data.data[0].Fecha_Realizada[2]+''+data.data[0].Fecha_Realizada[3];
                  $("#Fecha_Realizada").val(Fecha_Real);
                  consultar_actividades_calif(id);
                }
              }else{
                //Ocultar div Calificacion 
                //$("#div_calificacion").hide();
                //Muestro boton formato
                $("#Btn_Formato").hide();
              }
              
              
              
              //$("#cmb_frecuencia").val(data.data[0].Id_Frecuencia);
              $("#txt_Desc_Corta").val(data.data[0].Descripcion);
              
              $("#Mant_RAC1").val(data.data[0].Mant_RAC1);
              $("#Mant_RAC2").val(data.data[0].Mant_RAC2);
              $("#Mant_RAC3").val(data.data[0].Mant_RAC3);
              $("#Mant_RAC4").val(data.data[0].Mant_RAC4);
              $("#Cantidad_M_1").val(data.data[0].Cantidad_1);
              $("#Cantidad_M_2").val(data.data[0].Cantidad_2);
              $("#Cantidad_M_3").val(data.data[0].Cantidad_3);
              $("#Cantidad_M_4").val(data.data[0].Cantidad_4);
              $("#Costo_M_1").val(data.data[0].Costo_1);
              $("#Costo_M_2").val(data.data[0].Costo_2);
              $("#Costo_M_3").val(data.data[0].Costo_3);
              $("#Costo_M_4").val(data.data[0].Costo_4);
              $("#Horas").val(data.data[0].Horas);
              $("#Costos_Materiales_CE").val(data.data[0].Costos_Materiales_CE);
              $("#Mano_Obra_CE").val(data.data[0].Mano_Obra_CE);
              $("#Total_CE").val(data.data[0].Total_CE);
              $("#Costos_Materiales_CI").val(data.data[0].Costos_Materiales_CI);
              $("#Mano_Obra_CI").val(data.data[0].Mano_Obra_CI);
              $("#Total_CI").val(data.data[0].Total_CI);
              $("#Ahorro").val(data.data[0].Ahorro);
              
              var Total=0;
              var Cantidad=0;
              var Costo=0;
              for(var i=1; i<5;i++){
                if($("#Cantidad_M_"+i).val()!=""){Cantidad=$("#Cantidad_M_"+i).val();}
                if($("#Costo_M_"+i).val()!=""){Costo=$("#Costo_M_"+i).val();}
                Total=Total+(Cantidad*Costo);Cantidad=0;Costo=0;
              }
              
              $("#Total_Costos").val(Total);
              
              //Pasar imagenes al dropzone
              if (data.data[0].url_documentos_adjuntos.length>0){
                //var Doc_adjuntos="";
                //Doc_adjuntos+='<input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading"/>';
                //Doc_adjuntos+='<input type="hidden" id="url_documentos_adjuntos">';
                //$("#Cadena_doc_adjuntos").html(Doc_adjuntos);
                //
                //var hidden_url="url_documentos_adjuntos";
                //var file_adjuntos="documentos_adjuntos_FILE";
                var nombre_url=data.data[0].url_documentos_adjuntos;
                //  
                //cargarimagenes(hidden_url, file_adjuntos, nombre_url, true, -1);
              
                if(nombre_url!=null && nombre_url.length>0){
                  $("#url_documentos_adjuntos").val(nombre_url);
                  
                  if($('#url_documentos_adjuntos').val()!=""){
                    var Proveedor_contrato = $('#url_documentos_adjuntos').val().indexOf("---");
                    if(Proveedor_contrato!=-1){
                      mostrar_archivos_lista($('#url_documentos_adjuntos').val(), "div_archivos_multiples_lista", url_direccion, "si", "url_documentos_adjuntos", eliminar_archivo);
                    }else{
                      mostrar_archivos_lista($('#url_documentos_adjuntos').val(), "div_archivos_multiples_lista", url_direccion, "no", "url_documentos_adjuntos", eliminar_archivo);
                    }
                  }
                }
              }
              
              $("#txt_comentarios").val(data.data[0].Comentarios);
              
              
              if(data.data[0].vincular_mesa_ayuda=="1"){$("#vincular_mesa_ayuda_si").prop( "checked", true );}
              if(data.data[0].vincular_mesa_ayuda=="2"){$("#vincular_mesa_ayuda_no").prop( "checked", true );}
                
              //Obtener fecha
              var hoy = new Date();
              var dd = hoy.getDate();
              var mm = hoy.getMonth()+1; //hoy es 0!
              var yyyy = hoy.getFullYear();

              if(dd<10) {
                dd='0'+dd
              } 

              if(mm<10) {
                mm='0'+mm
              } 

              hoy = yyyy+''+mm+''+dd;
              var Fech_Actual=dd+'/'+mm+'/'+yyyy;
              /////////////////////////////////////

              
              //Click Desde el Calendario
              if(estatus==3){
                var $select3 = $('#select-activos').selectize({});  
                var control3 = $select3[0].selectize;
                control3.disable();
                
                //Deshabilita radios vincular mesa de ayuda
                $("#Usuario_Responsable").attr('disabled', false);
                $("#cmb_motivo_real").attr('disabled', false);
                
                //$("#Fecha_Realizada").val(Fech_Actual);
                
                
                //$("#cmb_frecuencia").attr('disabled', true);
                $("#txt_Desc_Corta").attr('disabled', false);
                
                $("#vincular_mesa_ayuda_si").attr('disabled', true);
                $("#vincular_mesa_ayuda_no").attr('disabled', true);
              }else{
                //Habilitar radios vincular mesa de ayuda
                $("#Usuario_Responsable").attr('disabled', false);
                $("#cmb_motivo_real").attr('disabled', false);
                //$("#Fecha_Programada").attr('disabled', false);
                //$("#cmb_frecuencia").attr('disabled', false);
                $("#txt_Desc_Corta").attr('disabled', false);
                
                $("#vincular_mesa_ayuda_si").attr('disabled', false);
                $("#vincular_mesa_ayuda_no").attr('disabled', false);
              }
              
              //////////////////////////////////////////////////
              //Muestra pantalla modal
              $("#Actividades_Activo_Fijo").modal("show");
            } 
              
          }
                },
                error: function () {
                  mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
        }
    }  

  
  function combo_motivo_real() {
    var Id_Area=$("#idareasesion").val();
    var resultado=new Array();
    data={Estatus_Reg: "1", Id_Area:Id_Area, accion: "consultar"};
    resultado=cargo_cmb("../fachadas/activos/siga_cat_motivo_real/Siga_cat_motivo_realFacade.Class.php",false, data);
    if(resultado.totalCount>0){
      $('#cmb_motivo_real_search').append($('<option>', { value: "-1" }).text("--Motivo Real--"));
      $('#cmb_motivo_real').append($('<option>', { value: "-1" }).text("--Motivo Real--"));
      for(var i = 0; i < resultado.totalCount; i++){
        $('#cmb_motivo_real_search').append($('<option>', { value: resultado.data[i].Id_Motivo_Real }).text(resultado.data[i].Desc_Motivo_Real));
        $('#cmb_motivo_real').append($('<option>', { value: resultado.data[i].Id_Motivo_Real }).text(resultado.data[i].Desc_Motivo_Real));
      }
    }else{
      $('#cmb_motivo_real_search').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
      $('#cmb_motivo_real').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
    }
  }



});//ND

</script>

<!-- # 1
          <span><font color="red">*</font></span>
          <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Fecha Programada</label>  
          <div class="input-group date">
          <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
          </div>
          <input type="text" class="form-control pull-right datepicker" placeholder="Fecha Programada" id="Fecha_Programada">
          </div>
-->

<!-- # 2
<div class="col-md-4"> 
<div class="form-group">
<span><font color="red">*</font></span>
<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Frecuencia</label>
<select class="form-control" id="cmb_frecuencia">
</select>
</div>
</div>-->

<!-- #3 
          <input type="radio" name="quien_lo_realiza" id="radio_interno">Interno
          <input type="radio" name="quien_lo_realiza" id="radio_externo" checked>Externo
-->

<!-- #4

<div class="row" id="div_calificacion" >
<input type="hidden" id="Estatus_Calif_Guardar">
<input type="hidden" id="Id_Calificacion">  
<div class="col-md-10 col-md-offset-1">
<div class="admin-content">
<div class="col-md-12">
<div class="form-group">
<div class="col-md-3 col-md-offset-1">
<form class="faces">
<p class="question" align="center"><strong>Solución Ofrecida</strong></p>
<div align="center">
<input type="radio" id="faces-1-1" id="p11" onclick="guardaRespuestaP1(1)" name="faces-1-set" class="faces-radio cinco">
<label for="faces-1-1"></label>
<input type="radio" id="faces-1-2" id="p12" onclick="guardaRespuestaP1(2)" name="faces-1-set" class="faces-radio tres">
<label for="faces-1-2"></label>
<input type="radio" id="faces-1-3" id="p13" onclick="guardaRespuestaP1(3)" name="faces-1-set" class="faces-radio uno">
<label for="faces-1-3"></label>
<input type="hidden" id="hddP1" value="">
</div>
</form>
<div class="form-group">
<textarea rows="2" class="form-control" id="Solucion" placeholder="Comentarios..."></textarea>
</div>
</div>

<div class="col-md-3 col-md-offset-1">
<form class="faces">
<p class="question">Actitud de Servicio</p>
<input type="radio" id="faces-2-1" id="p21" onclick="guardaRespuestaP2(1)" name="faces-1-set" class="faces-radio cinco">
<label for="faces-2-1"></label>
<input type="radio" id="faces-2-2" id="p22" onclick="guardaRespuestaP2(2)" name="faces-1-set" class="faces-radio tres">
<label for="faces-2-2"></label>
<input type="radio" id="faces-2-3" id="p23" onclick="guardaRespuestaP2(3)" name="faces-1-set" class="faces-radio uno">
<label for="faces-2-3"></label>
<input type="hidden" id="hddP2" value="">
</form>
<div class="form-group">
<textarea rows="2" class="form-control"  id="Actitud" placeholder="Comentarios..."></textarea>
</div>
</div>

<div class="col-md-3 col-md-offset-1">
<form class="faces">
<p class="question">Tiempo de respuesta</p>
<input type="radio" id="faces-3-1"  id="p31" onclick="guardaRespuestaP3(1)" name="faces-1-set" class="faces-radio cinco">
<label for="faces-3-1"></label>
<input type="radio" id="faces-3-2"  id="p32" onclick="guardaRespuestaP3(2)" name="faces-1-set" class="faces-radio tres">
<label for="faces-3-2"></label>
<input type="radio" id="faces-3-3"  id="p33" onclick="guardaRespuestaP3(3)" name="faces-1-set" class="faces-radio uno">
<label for="faces-3-3"></label>
<input type="hidden" id="hddP3" value="">
</form>
<div class="form-group">
<textarea rows="2" class="form-control"  id="TiempoRespuesta" placeholder="Comentarios..."></textarea>
</div>
</div>

</div>  
</div>
</div>  
</div>
</div>

-->

<!-- #5 

      <div class="row" >
        <div class="col-md-10 col-md-offset-1">
          <div class="col-md-12">
            <ul class="inline">
              <li>Vincular a mesa de ayuda</li>
              <li>
                <div class="checkbox">
                  <label>
                    <input type="radio" id="vincular_mesa_ayuda_si" name="vincular_mesa_ayuda" checked>Si
                  </label>
                </div>
              </li>
              <li>
                <div class="checkbox">
                  <label>
                    <input type="radio" id="vincular_mesa_ayuda_no" name="vincular_mesa_ayuda">No
                  </label>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

-->

<!-- #6

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer> -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar 

-->

<!-- #7

  //$(function(){
  //  //Fecha
  //  var nowTemp = new Date();
  //  var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
  //
  //  $('#Fecha_Realizada').datepicker({
  //    format: 'dd/mm/yyyy',
  //    onRender: function(date) {
  //      return date.valueOf() < now.valueOf() ? 'disabled' : '';
  //    }
  //  });    
  //});

 -->

<!-- #8 

    //var Doc_adjuntos="";
    //Doc_adjuntos+='<input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading" />';
    //Doc_adjuntos+='<input type="hidden" id="url_documentos_adjuntos">';
    //$("#Cadena_doc_adjuntos").html(Doc_adjuntos);
    //subirimagenes("documentos_adjuntos_FILE", "url_documentos_adjuntos", true, -1);
    
    //Date picker
    //$('.datepicker').datepicker({
    //  format: 'dd/mm/yyyy'
    //});
-->

<!-- #09 


/*
          var data;
          data = eval("(" + data + ")");

          if(data.totalCount>0){
            
            /*
            //Vincular con mesa de ayuda
            if(Id_Actividad.length <= 0){
              if(vincular_mesa_ayuda==1){
                var Descripcion_Det="";
                Descripcion_Det="[AF/BC: "+$.trim($("#text_AFBC").val())+"]";
                Descripcion_Det+=" [Nombre Activo: "+$.trim($("#txt_Nom_Activo").val())+"]";
                Descripcion_Det+=" [Marca: "+$("#txt_marca").val()+"]";
                Descripcion_Det+=" [Modelo: "+$("#text_Modelo").val()+"]";
                Descripcion_Det+=" [No. Serie: "+$("#text_No_Serie").val()+"]";
                Descripcion_Det+=" [Ubicación Primaria: "+$("#txt_ubic_primaria").val()+"]";
                Descripcion_Det+=" [Ubicación Secundaria: "+$("#txt_ubic_secundaria").val()+"]";
                Descripcion_Det+=" [Motivo Real: "+cmb_motivo_real+"]";
                Descripcion_Det+=" [Desc. Larga: "+Descripcion+"]";
                Descripcion_Det+=" [Usuario Responsable: "+$("#text_Usr_Resp").val()+"]";
                var Usuario_Sistem_Activo=$("#text_Id_Usuario").val();
                Vincular_Mesa_de_Ayuda("3",data.data[0].Id_Actividad,data.data[0].Id_Actividad,cmb_motivo_real, Descripcion, Descripcion_Det, Id_Activo, Usuario_Sistem_Activo, cmb_motivo_real,data.data[0].Desc_Frec,Descripcion);
              }
            }
            //
            */
            
            //Si estan habilitadas las caritas para la calificacion, permitira guardar la informacion en una diferente tabla
            /*
            if(Estatus_Calif_Guardar==1&&Fecha_Realizada.length>0){
              guardar_calificacion_actividades(Id_Actividad, Id_Calificacion, hddP1, coment_solucion, hddP2, coment_actitud, hddP3, coment_tiem_resp);
            }

            //Limpiar Campos
            limpiar();
            //Mostramos el mensaje de exito
            mensajesalerta("&Eacute;xito", data.text, "success", "dark"); 
            //Ocultamos la ventana modal
            $('#Actividades_Activo_Fijo').modal('hide');
            //Cargamos la tabla dinamica
            $('#displayListaActividades').DataTable().ajax.reload();


            
          
            array_DextrostixHora = new Array(); 
                        
            var anio=data.data[0].Fecha_Realizada[0]+''+data.data[0].Fecha_Realizada[1]+''+data.data[0].Fecha_Realizada[2]+''+data.data[0].Fecha_Realizada[3];
            var mes=data.data[0].Fecha_Realizada[4]+''+data.data[0].Fecha_Realizada[5];
            var dia=data.data[0].Fecha_Realizada[6]+''+data.data[0].Fecha_Realizada[7];
            
            if(dia<10){
              dia=dia[1];
            }
            
            if(dia>9){
              dia=(parseInt(dia)+1);
            }
            
          
            if(Id_Actividad.length <= 0){     
              //Llenamos el array
              array_DextrostixHora[0]={
                title: data.data[0].AF_BC,
                start: new Date(anio+'-'+mes+'-'+dia),
                //end: new Date('2017-11-30'),
                id: data.data[0].Id_Actividad,
                allDay: true,
                //editable: true,
                //eventDurationEditable: true,
                color: '#35a61e'
              };
            }else{
              //Eliminar del Calendario
              $('#calendario-shit').fullCalendar('removeEvents',""+data.data[0].Id_Actividad+""); 
              //Llenamos el array
              array_DextrostixHora[0]={
                title: data.data[0].AF_BC,
                start: new Date(anio+'-'+mes+'-'+dia),
                //end: new Date('2017-11-30'),
                id: data.data[0].Id_Actividad,
                allDay: true,
                //editable: true,
                //eventDurationEditable: true,
                color: '#35a61e'
              };
            }

            //Una vez llenado el array dinamicamente, lo pasamos al objeto calendario
            var source = { events: array_DextrostixHora};
                       
            console.log(source);
          $('#calendario-shit').fullCalendar( 'addEventSource', source, true );
          
          }else{
            mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
          }
          */ 


-->


<!-- #10 

    $("#Fecha_solicitud").datepicker({
      defaultDate: "+0d",
      changeMonth: true,
      changeYear: true,
      numberOfMonths: 1,
      dateFormat: "dd/mm/yy"
    });

  $("#Fecha_Realizada").datepicker({
      defaultDate: "+0d",
      changeMonth: true,
      changeYear: true,
      numberOfMonths: 1,
      dateFormat: 'dd/mm/yy'
    });

-->

<!-- #11

        /*    
        var Mant_RAC1=$.trim($("#Mant_RAC1").val());
        var Mant_RAC2=$.trim($("#Mant_RAC2").val());
        var Mant_RAC3=$.trim($("#Mant_RAC3").val());
        var Mant_RAC4=$.trim($("#Mant_RAC4").val());
        var Cantidad_1=$.trim($("#Cantidad_M_1").val());
        var Cantidad_2=$.trim($("#Cantidad_M_2").val());
        var Cantidad_3=$.trim($("#Cantidad_M_3").val());
        var Cantidad_4=$.trim($("#Cantidad_M_4").val());
        var Costo_1=$.trim($("#Costo_M_1").val());
        var Costo_2=$.trim($("#Costo_M_2").val());
        var Costo_3=$.trim($("#Costo_M_3").val());
        var Costo_4=$.trim($("#Costo_M_4").val());
        var Horas=$.trim($("#Horas").val());
        var Costos_Materiales_CE=$.trim($("#Costos_Materiales_CE").val());
        var Mano_Obra_CE=$.trim($("#Mano_Obra_CE").val());
        var Total_CE=$.trim($("#Total_CE").val());
        var Costos_Materiales_CI=$.trim($("#Costos_Materiales_CI").val());
        var Mano_Obra_CI=$.trim($("#Mano_Obra_CI").val());
        var Total_CI=$.trim($("#Total_CI").val());
        var Ahorro=$.trim($("#Ahorro").val());
        */

 -->

