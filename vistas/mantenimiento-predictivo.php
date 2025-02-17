<style>
	.datepicker{z-index:1151 !important;}
</style> 
  <link rel="stylesheet" href="../dist/css/jquery-confirm.min.css">
  <script src="../dist/js/jquery-confirm.min.js"></script>

    <!-- File Input -->
  <link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
  <script src="../plugins/docsupport/standalone/selectize.js"></script>
  <script src="../plugins/docsupport/index.js"></script>
  
  <!--<script src="../js/bootstrap-datepicker.js"></script>-->
	<script src="../js/prettify.js"></script>
	<!--<script src="../js/datepicker.css"></script>-->

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
          <div class="info-box verde">
          <!-- Button trigger modal -->
            <a href="#" data-toggle="modal" data-target="#Actividades_Activo_Fijo" onclick="limpiar()" id="abrir_popup">
              <span class="info-box-icon bg-green"><i class="fa fa-check-circle-o"></i></span>
              <div class="info-box-content">
                <h3 class="info-box-text">Nuevo Mant. Predictivo</h3>
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
                    <div class="col-md-4">
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
                    <div class="col-md-8">
                      <div class="form-group">
						<label  class="control-label" style="font-size: 11px;">Rutina</label>
                        <input rows="2" class="form-control" placeholder="Rutina" id="txt_Rutina_Search">
                      </div>
                    </div>
                    <div class="col-md-12"></div>
					<div class="col-md-8">
                      <div class="form-group">
						<label  class="control-label" style="font-size: 11px;">Descripción Corta</label>
						<input class="form-control" placeholder="Descripción Corta" id="txt_Desc_Corta_Search">
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
                    <button type="button" class="btn chs" id="btn_buscar_full_calendar" onclick="busqueda_full_calendar(1)">Buscar</button>
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
                      <li>Interno <span class="interno"></span></li>
                      <li>Externo <span class="externo"></span></li>
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
                  <div class="" width="100%">
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
						<th>Nombre Rutina</th>
                        <th>Frecuencia</th>
                        <th>Descripción corta</th>
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


    <!-- modal reubicación de Predictivo -->
    <div class="modal fade modalchs" id="Actividades_Activo_Fijo" data-backdrop="false">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header verde">
            <button type="button" class="close" onclick="confirmacion_cerrar('Actividades_Activo_Fijo')">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title">Mantenimiento Predictivo</h4>
          </div>
          <div class="modal-body nopsides npt">
           <form>
            <div class="gray nm">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
					
                  <div class="col-md-4">
					
					<input type="hidden" id="Estatus_Realizado">  
                    <div class="form-group">
						<span><font color="red">*</font></span>
						<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">AF/BC</label>
						<div id="muestro_select">
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
                      <img src="http://ferreteriaelpuente.com.ar/wp-content/uploads/2015/08/sin-imagen.png" style="width:150px;height:150px;">
					</div>
                  </div><!-- columna#2 -->

                </div>
              </div>
            </div>
               
               
            <div class="row">
                 <div class="col-md-10 col-md-offset-1">
                     <div class="col-md-4">
                         <div class="form-group">
						    <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Nombre Rutina</label>
                            <textarea rows="1" class="form-control" placeholder="Nombre Rutina" id="txt_Nombre_Rutina"></textarea>
                         </div>
						 <div class="form-group">
							 <ul class="inline">
								<li><strong>¿Qui&eacute;n lo realiza?</strong></li>
								<input type="radio" name="quien_lo_realiza" id="radio_interno" checked> Interno&nbsp;&nbsp;
								<input type="radio" name="quien_lo_realiza" id="radio_externo"> Externo
							  </ul>
						  </div>
                     </div>
                     <div class="col-md-4">
                         <div class="form-group">
							<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Frecuencia</label>
                            <select class="form-control" id="cmb_frecuencia">
                            </select>
                         </div>
						 <div class="form-group">
                            <label for="inputEmail3" class="col-sm-5 control-label">Copiar desde</label>
                            <div class="col-sm-7">
                              <select class="form-control" id="cmb_copiar">
                              </select>
                            </div>
                         </div>
                         
                     </div>
                     <div class="col-md-4">
                         <div class="form-group">
							<label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Descripción Corta</label>
                            <textarea rows="1" class="form-control" placeholder="Descripción Corta" id="txt_Desc_Corta"></textarea>
                         </div>
						 <button type="button" class="btn chs" onclick="copiar()" id="btn_copiar">Copiar</button>
                     </div>
					 
					
                </div>
            </div><br/>
               

            <div class="row">
              <div class="col-md-12 ">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="lista_actividades" width="100%">
                      <thead>
                        <tr>
						  <td><span><i class="fa fa-plus" aria-hidden="true"></i></span></td>	
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                          <td>Actividades</td>
                          <td>Valor Referencia</td>
                          <td>Valor medido</td>
                          <td>Ok</td>
                          <td>Fallo</td>
                          <td>No aplica</td>
						  <td>V. Mesa de Ayuda</td>
                          <td>Observaciones</td>
                          <td>Adjuntos</td>
						  <td>Fecha Programada</td>
                          <td>Fecha Realizado</td>
                          <td><span><i class="fa fa-trash" aria-hidden="true"></i></span></td>
                        </tr>
                      </thead>
					  <tbody id="Muestro_Agregados">
						
					  </tbody>
					  <tfoot>
						<tr>
							<td colspan="14">
								 <a href="#" class="add-more button_agregar_actividad" onclick="Agregar_Mas()" id="agregarmas_table_dinamyc"> <i class="fa fa-plus" aria-hidden="true"></i> Agregar más</a>
							</td>
						</tr>
					  </tfoot>
					</table>
                      
                  </div>
                </div>
              </div>
            </div>

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
            </div><!-- row -->
			<br>
			<br>
			<div class="row" id="div_calificacion" style="display:none">
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
            </div><!-- row -->

            <div class="row" style="display:none">
              <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12">
                  <ul class="inline">
                    <li>Vincular a mesa de ayuda</li>
                    <li>
                      <div class="checkbox">
                        <label>
                          <input type="radio" id="vincular_mesa_ayuda_si" name="vincular_mesa_ayuda" checked> Si
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="checkbox">
                        <label>
                          <input type="radio" id="vincular_mesa_ayuda_no" name="vincular_mesa_ayuda"> No
                        </label>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
			
			
           </form>
          </div>
          <div class="modal-footer">
			<table border="0" align="center">
				<tr>
					<td width="50%" id="td_formato">
						
					</td>
					<td width="50%">
						<button type="button" class="btn chs" onclick="guardar()" id="btn_guardar">Guardar</button>
					</td>
				</tr>
			</table>
			<div id="div_btn_pdf">
				
            </div>
			
			<div id="div_btn_guardar">
				
			</div>
		  </div>
        </div>
      </div>
    </div>



  <!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer> -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
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
<script>


	//ver actividades por fecha
	function muestro_actividades_por_fecha(Id_dia_calendar){
		var val=Id_dia_calendar.split("-");
		var Id_Actividad=val[0];
		var Fecha=val[1];
		pasarvalores_full_calendar(Id_Actividad, 3, Fecha);
	}

	
  $(document).ready(function(){
	url_direccion="../Archivos/Archivos-Actividades/Mantenimiento-Predictivo";
	Estatus_Tipo_Actividad=1;
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	llenar_calendario(1);
	autocomplete_activos();
	/*Inicia Controles Busqueda*/
	autocomplete_activos_search();
	/*Fin*/
	cmb_rutina(1);
	cmb_frecuencia();
	
	guardar=function(){
		var Agregar = true; 
		var mensaje_error="";
		var Estatus_Realizado=$.trim($("#Estatus_Realizado").val());
		
		var Id_Actividad=$("#Id_Actividad").val();
		
		//Usuario Logueado
		var Id_Usuario=$("#usuariosesion").val();
		//Area
		var Id_Area=$("#idareasesion").val();
		//Mant. Predictivo=1, Mant. Preventivo=2, Mant. Correctivo=3, Capacitacion=4 
		var Tipo_Actividad=1;
		
		var Id_Activo=$.trim($("#txt_Id_Activo").val());
		var Nombre_Rutina=$.trim($("#txt_Nombre_Rutina").val());
		var Id_Frecuencia=$("#cmb_frecuencia").val();
		var Descripcion=$.trim($("#txt_Desc_Corta").val());
		var quien_realiza=0;
		var url_documentos_adjuntos=$.trim($("#url_documentos_adjuntos").val());
		var vincular_mesa_ayuda=0;
		
		if (Id_Activo.length<= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Activo <br />";
		}
		
		if (Nombre_Rutina.length<= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Rutina <br />";
		}
		
		if (Id_Frecuencia=="-1") {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Frecuencia <br />";
		}
		
		if($("#radio_interno").prop('checked')){
			quien_realiza=0;
		}
		
		if($("#radio_externo").prop('checked')){
			quien_realiza=1;
		}
		
		if($("#vincular_mesa_ayuda_si").prop('checked')){
			vincular_mesa_ayuda=1;
			
		}
		
		if($("#vincular_mesa_ayuda_no").prop('checked')){
			vincular_mesa_ayuda=2;
		}
		
		///Validacion Calificacion general de las actividades 
		/*
		var Estatus_Calif_Guardar=$("#Estatus_Calif_Guardar").val();
		
		if(Estatus_Calif_Guardar==1){
			var Id_Calificacion=$("#Id_Calificacion").val();
			var hddP1=$.trim($("#hddP1").val());
			var hddP2=$.trim($("#hddP2").val());
			var hddP3=$.trim($("#hddP3").val());
			
			var coment_solucion=$.trim($("#Solucion").val());
			var coment_actitud=$.trim($("#Actitud").val());
			var coment_tiem_resp=$.trim($("#TiempoRespuesta").val());
			if (hddP1.length<= 0) {
				Agregar = false; 
				mensaje_error += " -Selecciona una carita en solución ofrecida <br/>";
			}
			
			if (hddP2.length<= 0) {
				Agregar = false; 
				mensaje_error += " -Selecciona una carita en actitud del servicio <br/>";
			}
			
			if (hddP3.length<= 0) {
				Agregar = false;
				mensaje_error += " -Selecciona una carita en tiempo de respuesta <br/>";
			}
		}
		*/
		//Fin 
		
		
		///////////////////////////////////////////////////////////////////////////////////////////////////
		//Valores Tabla Dinamica
		Array_general= new Array();
		//Iniciamos el contador a -1 para que el indice del arreglo comienze con 0
		var cont=-1;
		
		var estatus_seleccionado=false;
		var estatus_fecha_realizada=false;
		
		//Recorremos el array de actividades  
		for(var i=0;i < array_actividades.length; i++){
			if(array_actividades[i]=="S"){
				//Se comienza el contador desde 0
				cont=cont+(1);
				var Estatus=0;
				
				var Array_por_actividad= new Array();
				var Id_Det_Actividad="";	Id_Det_Actividad=$.trim($("#Id_Det_Actividad"+i).val());
				var Num_Actividad=""; 		Num_Actividad=$.trim($("#Num_Actividad"+i).val());
				var Nombre_Actividad=""; 	Nombre_Actividad=$.trim($("#Nombre_Actividad"+i).val());
				var Valor_Referencia=""; 	Valor_Referencia=$.trim($("#Valor_Referencia"+i).val());
				var Valor_Medido=""; 		Valor_Medido=$.trim($("#Valor_Medido"+i).val());
				var Estatus_Actividad=0;	//Tomamos el radio checkeado
				var vincular_mesa_ayuda_det=0;//Tomamos el valor del chechbox
				var observaciones="";		observaciones=$.trim($("#observaciones"+i).val());
				var upload_adjuntos="";		upload_adjuntos=$.trim($("#url_det_adjuntos"+i).val());
				var fecha_programada="";	fecha_programada=$.trim($("#fecha_programada"+i).val());
				var fecha_realizada="";		fecha_realizada=$.trim($("#fecha_realizada"+i).val());
				
				
				if(Estatus_Realizado!="1"){
					
					if (Num_Actividad.length<= 0) {
						Agregar = false; 
						mensaje_error += " -Agrega el Num. de la Actividad en la Columna "+(cont+1)+"<br />";
						Estatus=1;
					}
					
					
					if (Nombre_Actividad.length<= 0) {
						Agregar = false; 
						mensaje_error += " -Agrega el Nombre de la Actividad en la Columna "+(cont+1)+"<br />";
						Estatus=1;
					}
					
					if (Valor_Referencia.length<= 0) {
						Agregar = false; 
						mensaje_error += " -Agrega el Valor de Referencia en la Columna "+(cont+1)+"<br />";
						Estatus=1;
					}
					
					//if (Valor_Medido.length<= 0) {
					//	Agregar = false; 
					//	mensaje_error += " -Agrega el Valor Medido en la Columna "+(cont+1)+"<br />";
					//	Estatus=1;
					//}
				
					if (fecha_programada.length<= 0) {
						Agregar = false; 
						mensaje_error += " -Agrega la Fecha Programada en la Columna "+(cont+1)+"<br />";
						Estatus=1;
					}
				}
				
				if($("#radio_ok"+i).prop('checked')){
					Estatus_Actividad=1;
				}
				if($("#radio_fallo"+i).prop('checked')){
					Estatus_Actividad=2;
				}
				if($("#radio_no_aplica"+i).prop('checked')){
					Estatus_Actividad=3;
				}
				
				if(Estatus_Realizado=="1"){
					if(Estatus_Actividad==0){
						//Agregar = false; 
						//mensaje_error += " -Selecciona un Estatus de la Actividad en la Columna "+(cont+1)+"<br />";
					}else{
						if(fecha_realizada.length==0){
							Agregar = false;
							mensaje_error += " -Agrega la Fecha Realizada en la Actividad en la Columna "+(cont+1)+"<br />";
						}
						estatus_seleccionado=true;
					}
				
					if(fecha_realizada.length>0){
						estatus_fecha_realizada=true;
						if(Estatus_Actividad==0){
							Agregar = false; 
							mensaje_error += " -Selecciona un Estatus de la Actividad en la Columna "+(cont+1)+"<br />";
						}
						
						if(Valor_Medido.length==0){
							Agregar = false;
							mensaje_error += " -Agrega el Valor Medido en la Columna "+(cont+1)+"<br />";
						}
					}							
				}
				
				//Si no esta seleciconado el estatus y la fecha programada, los campos se van vacios
				if(Estatus_Actividad==0&&fecha_realizada.length==0){
					Estatus_Actividad="";
					fecha_realizada="";
				}
				
				//Check vincular mesa de ayuda
				if($("#check_vincular_mesa_ayuda"+i).prop('checked')){
					vincular_mesa_ayuda_det=1;
				}else{
					vincular_mesa_ayuda_det=2;
				}
				
				if (Estatus==1) {	
					mensaje_error += "<br/>";
				}
				
				
				Array_por_actividad[0]=Num_Actividad;
				Array_por_actividad[1]=Nombre_Actividad;
				Array_por_actividad[2]=Valor_Referencia;
				Array_por_actividad[3]=Valor_Medido;
				Array_por_actividad[4]=Estatus_Actividad;
				Array_por_actividad[5]=observaciones;
				Array_por_actividad[6]=upload_adjuntos;
				Array_por_actividad[7]=fecha_programada;
				Array_por_actividad[8]=fecha_realizada;
				Array_por_actividad[9]=Id_Det_Actividad;
				Array_por_actividad[10]=vincular_mesa_ayuda_det;
				Array_general[cont]=Array_por_actividad;
			}
		}
		
		if(Estatus_Realizado=="1"){
			if(estatus_seleccionado==false&&estatus_fecha_realizada==false){
				Agregar = false; 
				mensaje_error += " -Debes realizar almenos una actividad.<br />";	
			}
		}
		////////////////////////////////////////////////////////////////////////////
		
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
					Nombre_Rutina:Nombre_Rutina,
					Id_Frecuencia:Id_Frecuencia,
					Descripcion:Descripcion,
					Realiza:quien_realiza,
					url_documentos_adjuntos:url_documentos_adjuntos,
					vincular_mesa_ayuda:vincular_mesa_ayuda,
					Array_det_actividades:Array_general,
					//
					Usr_Inser:Id_Usuario,
					Estatus_Reg:"1",			
					accion:"guardar"
					};
			}
			else
			{
				strDatos={
					Id_Actividad:Id_Actividad,
					Id_Area:Id_Area,
					Tipo_Actividad:Tipo_Actividad,
					Id_Activo:Id_Activo,
					Nombre_Rutina:Nombre_Rutina,
					Id_Frecuencia:Id_Frecuencia,
					Descripcion:Descripcion,
					Realiza:quien_realiza,
					url_documentos_adjuntos:url_documentos_adjuntos,
					vincular_mesa_ayuda:vincular_mesa_ayuda,
					Array_det_actividades:Array_general,
					Estatus_Realizado:$("#Estatus_Realizado").val(),
					//
					Usr_Inser:Id_Usuario,
					Usr_Mod:Id_Usuario,
					Estatus_Reg:"2",			
					accion:"guardar"
					};
			}
		
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
					var data;
					data = eval("(" + data + ")");
					if(data.totalCount>0){
						//Vincular con mesa de ayuda
						//var Descripcion_Det="";
						//if(data.CountActividades_Det>0){
						//	Descripcion_Det="[AF/BC: "+$.trim($("#text_AFBC").val())+"]";
						//	Descripcion_Det+=" [Nombre Activo: "+$.trim($("#txt_Nom_Activo").val())+"]";
						//	Descripcion_Det+=" [Marca: "+$("#txt_marca").val()+"]";
						//	Descripcion_Det+=" [Modelo: "+$("#text_Modelo").val()+"]";
						//	Descripcion_Det+=" [No. Serie: "+$("#text_No_Serie").val()+"]";
						//	Descripcion_Det+=" [Ubicación Primaria: "+$("#txt_ubic_primaria").val()+"]";
						//	Descripcion_Det+=" [Ubicación Secundaria: "+$("#txt_ubic_secundaria").val()+"]";
						//	Descripcion_Det+=" [Rutina: "+Nombre_Rutina+"]";
						//	Descripcion_Det+=" [Desc. Corta: "+Descripcion+"]";
						//	Descripcion_Det+=" [Usuario Responsable: "+$("#text_Usr_Resp").val()+"]";
						//	var Usuario_Sistem_Activo=$("#text_Id_Usuario").val();
						//	
						//	Descripcion_Det="[Actividades:]\n";
						//	for(var i1=0; i1 < data.CountActividades_Det; i1++){
						//		Descripcion_Det+="["+data.Actividades_Det[i1].Nombre_Actividad+"]"+"\n";
						//	}
						//	
						//	if(Id_Actividad.length <= 0){
						//		for(var i=0; i < data.CountActividades_Det;i++){
						//			if(data.Actividades_Det[i].V_Mesa=="1"){
						//				Vincular_Mesa_de_Ayuda("1",data.Actividades_Det[i].Id_Actividad,data.Actividades_Det[i].Id_Det_Actividad,data.Actividades_Det[i].Nombre_Actividad, data.Actividades_Det[i].Valor_Referencia, Descripcion_Det, Id_Activo, Usuario_Sistem_Activo, Nombre_Rutina,data.Frecuencia,Descripcion);
						//			}
						//		}
						//	}
						//}
						
						//Si estan habilitadas las caritas para la calificacion, permitira guardar la informacion en una diferente tabla
						/*
						if(Estatus_Calif_Guardar==1){
							guardar_calificacion_actividades(Id_Actividad, Id_Calificacion, hddP1, coment_solucion, hddP2, coment_actitud, hddP3, coment_tiem_resp);
						}
						*/
						if($("#Estatus_Realizado").val()==""){
							//Carga Comgo de Rutinas
							cmb_rutina();
							
							//Añadir al calendario el registro agregado
							if(data.Add.totalCount>0){
								array_DextrostixHora = new Array();	
								for(var i=0;i < data.Add.totalCount; i++){
							
									var anio=data.Add.data[i].Fecha_Programada[0]+''+data.Add.data[i].Fecha_Programada[1]+''+data.Add.data[i].Fecha_Programada[2]+''+data.Add.data[i].Fecha_Programada[3];
									var mes=data.Add.data[i].Fecha_Programada[4]+''+data.Add.data[i].Fecha_Programada[5];
									var dia=data.Add.data[i].Fecha_Programada[6]+''+data.Add.data[i].Fecha_Programada[7];
									if(dia<10){
										dia=dia[1];
									}
									
									if(dia>9){
										dia=(parseInt(dia)+1);
									}
									
									//Llenamos el array
									array_DextrostixHora[i]={
										title: data.Add.data[i].Nombre_Rutina.trim(),
										start: new Date(anio+'-'+mes+'-'+dia),
										//end: new Date('2017-11-30'),
										id: data.Add.data[i].Id_Actividad+'-'+data.Add.data[i].Fecha_Programada,
										allDay: true,
										//editable: true,
										//eventDurationEditable: true,
										color: '#35a61e'
									};
								}
								
								//Una vez llenado el array dinamicamente, lo pasamos al objeto calendario
								var source = { events: array_DextrostixHora};
								$('#calendario-shit').fullCalendar( 'addEventSource', source, true );
							}
							//
							//Remover del calendrio
							if(data.Remove!=""){
								if(data.Remove.totalCount>0){
									for(var j=0;j < data.Remove.totalCount; j++){
										$('#calendario-shit').fullCalendar('removeEvents',""+data.Remove.data[j].Id_Actividad+'-'+data.Remove.data[j].Fecha_Programada+"");	
									}
									
								}
							}	
							//
						}
						
						
						//Limpiamos los campos y arrays
						limpiar();
						//Mostramos el mensaje de exito
						mensajesalerta("&Eacute;xito", data.text, "success", "dark");	
						//Ocultamos la ventana modal
						$('#Actividades_Activo_Fijo').modal('hide');						
						//Cargamos la tabla dinamica
						$('#displayListaActividades').DataTable().ajax.reload();
						
						
						//Se carga el tab de Global y se limpian los campos
						global();
						limpiar_global();
						
					}else{
						mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
					}
					
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	}
	
	
	limpiar=function(){
		//Boton generar pdf
		$("#td_formato").html('');
		
		$("#Imagen_Activo").html('<img src="http://ferreteriaelpuente.com.ar/wp-content/uploads/2015/08/sin-imagen.png" style="width:150px;height:150px;">');
		
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
		//
		//Habilitar controles
		$("#txt_Nombre_Rutina").attr('disabled', false);
		$("#cmb_frecuencia").attr('disabled', false);
		$("#txt_Desc_Corta").attr('disabled', false);
		//Deshabilita radios quien realiza
		$("#radio_interno").attr('disabled', false);
		$("#radio_externo").attr('disabled', false);
		
		$("#cmb_copiar").attr('disabled', false);
		$("#btn_copiar").attr('disabled', false);
		
		//Deshabilita radios vincular mesa de ayuda
		$("#vincular_mesa_ayuda_si").attr('disabled', false);
		$("#vincular_mesa_ayuda_no").attr('disabled', false);
		
		$("#agregarmas_table_dinamyc").show();
		$("#btn_guardar").attr('disabled', false);
		//
		
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
		$("#text_Id_Usuario").val();
		/////////////////////////////////
		$("#txt_Nombre_Rutina").val("");
		$("#cmb_frecuencia").val("-1");
		$("#txt_Desc_Corta").val("");
		
		$("#radio_interno").prop( "checked", true );
		//$("#url_documentos_adjuntos").val("");
		$("#vincular_mesa_ayuda_si").prop( "checked", true );
		
		//Limpiar arrays de llenar mas
		cont_array_actividades=0;
		array_actividades=[];
		array_actividades[0]="S";
		//
		$("#Muestro_Agregados").html("");
		
		//Limpiar input
		$("#url_documentos_adjuntos").val("");
		//$('#documentos_adjuntos_FILE').fileinput('clear');
         
		var contenido="";
		contenido+='<tr id="Contenido_tr0">';
		contenido+='  <td><span><i class="fa fa-plus" aria-hidden="true" onclick="Agregar_Mas(0)" id="mas_table_dinamyc0"></i></span></td>';
        contenido+='  <td>';
        contenido+='    <div class="form-group" style="width:50px;" align="center">';
        contenido+='      <input type="text" class="form-control" placeholder="" id="Num_Actividad0" value="1" style="font-size: 11px;" disabled>';
		contenido+='    </div>';
        contenido+='  </td>';
        contenido+='  <td>';
        contenido+='    <div class="form-group">';
        contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Nombre_Actividad0" style="font-size: 11px;"></textarea>';
        contenido+='    </div>';
        contenido+='  </td>';
        contenido+='  <td>';
        contenido+='    <div class="form-group">';
        contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Valor_Referencia0" style="font-size: 11px;"></textarea>';
        contenido+='    </div>';
        contenido+='  </td>';
        contenido+='  <td>';
        contenido+='    <div class="form-group">';
        contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Valor_Medido0" style="font-size: 11px;" disabled></textarea>';
        contenido+='    </div>';
        contenido+='  </td>';
        contenido+='  <td align="center">';
        contenido+='  	<input type="radio" id="radio_ok0" name="groupradioactividad0" disabled>';
        contenido+='  </td>';
        contenido+='  <td align="center">';
        contenido+='  	<input type="radio" id="radio_fallo0" name="groupradioactividad0" disabled>';
        contenido+='  </td>';
        contenido+='  <td align="center">';
        contenido+='  	<input type="radio" id="radio_no_aplica0" name="groupradioactividad0" disabled>';
        contenido+='  </td>';
		contenido+='  <td align="center">';
        contenido+='  	<input type="checkbox" id="check_vincular_mesa_ayuda0">';
        contenido+='  </td>';
        contenido+='  <td>';
        contenido+='    <div class="form-group">';
        contenido+='      <textarea rows="2" class="form-control" placeholder="(200 caracteres)" id="observaciones0" style="font-size: 11px;" disabled></textarea>';
        contenido+='    </div>';
        contenido+='  </td>';
        contenido+='  <td>';
        contenido+='   <div class="form-group" align="center">';
        contenido+='      <div id="div_input_dymanic0"><input name="imagenes[]" type="file" multiple="multiple" class="file-loading" id="upload_adjuntos0"></div>';
		contenido+='      <input type="hidden"  id="url_det_adjuntos0">';
		contenido+='      <div id="divVer_Imagen0"></div>';
        contenido+='    </div>';
        contenido+='  </td>';
		contenido+='<td>';
		contenido+='  <div class="input-group date">';
		contenido+='	<div class="input-group-addon">';
		contenido+='	  <i class="fa fa-calendar"></i>';
		contenido+='	</div>';
		contenido+='	<input type="text" class="form-control pull-right datepicker" onclick="Cambio_Fecha_Progr_Array(0)" id="fecha_programada0" style="font-size: 11px;">';
		contenido+='  </div>';
		contenido+='</td>';
		contenido+='<td>';
		contenido+='  <div class="input-group date">';
		contenido+='	<div class="input-group-addon">';
		contenido+='	  <i class="fa fa-calendar"></i>';
		contenido+='	</div>';
		contenido+='	<input type="text" class="form-control pull-right datepicker" onclick="Cambio_Fecha_Reali_Array(0)" id="fecha_realizada0" disabled style="font-size: 11px;">';
		contenido+='  </div>';
		contenido+='</td>';
        contenido+='  <td><span><i class="fa fa-trash" aria-hidden="true" id="quitarmas_table_dinamyc0" onclick="quitarmas(0)"></i></span></td>';
        contenido+='</tr>';
		jQuery("#Muestro_Agregados").append(contenido);
		
		var file_adjuntos="upload_adjuntos0";
		var hidden_url="url_det_adjuntos0";
		subirimagenes(file_adjuntos, hidden_url, false, 0);
		
		Archivos_Multiples_Adjuntar();
		//var Doc_adjuntos="";
		//Doc_adjuntos+='<input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading" />';
		//Doc_adjuntos+='<input type="hidden" id="url_documentos_adjuntos">';
		//$("#Cadena_doc_adjuntos").html(Doc_adjuntos);
		//subirimagenes("documentos_adjuntos_FILE", "url_documentos_adjuntos", true, -1);
		
		//Fecha
		var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
		
		$('#fecha_programada0').datepicker({
			format: 'dd/mm/yyyy',
			onRender: function(date) {
				return date.valueOf() < now.valueOf() ? 'disabled' : '';
			  }
		});
		//Fecha
		
		
		//limpiar_campos_y_div_calif();
	}
	
	
	//Llenar Tabla Dinamicamente
	$('#displayListaActividades').DataTable({
		"scrollY": 500,
		"scrollX": true,
		"paging": true,
		"autoWidth": false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",
            "type": "POST",
			"data": {
				Id_Area:$("#idareasesion").val(),
				Tipo_Actividad:"1",
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
			{ "data": "Nombre_Rutina"},
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
		if(estatus==1){
			limpiar();
		}
		
        if (id != "") {
            $.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",
                async: false,
                data: {
					Fecha_Det_Programada:fecha,
					Estatus_Reg:"1",
                    Id_Actividad: id,
                    accion: "consultar_actividades"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
                success: function (data) {
					var LoRealiza=0;
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
						if(estatus==1 || estatus==3){
							var $select3 = $('#select-activos').selectize({});	
							var control3 = $select3[0].selectize;
							control3.addItem(data.data[0].Id_Activo);
							
							$("#Id_Actividad").val(data.data[0].Id_Actividad);
							var eliminar_archivo="";
						
							if(data.data[0]["Id_Actividad"]!=""){
								eliminar_archivo="no";
							}
							
							$("#txt_Nombre_Rutina").val(data.data[0].Nombre_Rutina);
							$("#cmb_frecuencia").val(data.data[0].Id_Frecuencia);
							$("#txt_Desc_Corta").val(data.data[0].Descripcion);
							//$("#url_documentos_adjuntos").val(data.data[0].url_documentos_adjuntos);

							//Chekear radios quien realiza
							if(data.data[0].Realiza=="1"){$("#radio_interno").prop( "checked", true );LoRealiza=1;}
							if(data.data[0].Realiza=="2"){$("#radio_externo").prop( "checked", true );LoRealiza=2;}
							
							if(data.data[0].vincular_mesa_ayuda=="1"){$("#vincular_mesa_ayuda_si").prop( "checked", true );}
							if(data.data[0].vincular_mesa_ayuda=="2"){$("#vincular_mesa_ayuda_no").prop( "checked", true );}
							
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
							//////////////////////////////////////////////////
							//Muestra pantalla modal
							$("#Actividades_Activo_Fijo").modal("show");
						}
						var vista_imagen=false;
						var contenido="";
						var Estatus_Fech_Real=0;
						
						for(var i=0;i < data.totalCountDetalle; i++){
							var Estatus_check=0;
							var Fecha_Prog="";
							var Fecha_Real="";
							if(estatus==1 || estatus==3){
								Fecha_Prog=data.data_det[i].Fecha_Programada[6]+''+data.data_det[i].Fecha_Programada[7]+'/'+data.data_det[i].Fecha_Programada[4]+''+data.data_det[i].Fecha_Programada[5]+'/'+data.data_det[i].Fecha_Programada[0]+''+data.data_det[i].Fecha_Programada[1]+''+data.data_det[i].Fecha_Programada[2]+''+data.data_det[i].Fecha_Programada[3];
								
								if(data.data_det[i].Fecha_Realizada.trim()!=""){
									Fecha_Real=data.data_det[i].Fecha_Realizada[6]+''+data.data_det[i].Fecha_Realizada[7]+'/'+data.data_det[i].Fecha_Realizada[4]+''+data.data_det[i].Fecha_Realizada[5]+'/'+data.data_det[i].Fecha_Realizada[0]+''+data.data_det[i].Fecha_Realizada[1]+''+data.data_det[i].Fecha_Realizada[2]+''+data.data_det[i].Fecha_Realizada[3];	
									Estatus_Fech_Real=1;
								}
							}
							cont_array_actividades=i;
							array_actividades[cont_array_actividades]="S";
							contenido+='<tr id="Contenido_tr'+i+'">';
							contenido+='  <td><span><i class="fa fa-plus" aria-hidden="true" onclick="Agregar_Mas('+i+')" id="mas_table_dinamyc'+i+'"></i></span></td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group" style="width:50px;"  align="center">';
							contenido+='      <input type="hidden" id="Id_Det_Actividad'+i+'" value="'+data.data_det[i].Id_Det_Actividad+'">';
							contenido+='      <input type="text" class="form-control" placeholder="" id="Num_Actividad'+i+'" value='+data.data_det[i].Num_Actividad.trim()+' style="font-size: 11px;" disabled>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group">';
							contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Nombre_Actividad'+i+'" style="font-size: 11px;">'+data.data_det[i].Nombre_Actividad.trim()+'</textarea>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group">';
							contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Valor_Referencia'+i+'" style="font-size: 11px;">';
							contenido+=					data.data_det[i].Valor_Referencia;
							contenido+='			</textarea>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group">';
							contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Valor_Medido'+i+'" style="font-size: 11px;"';if(estatus==2||estatus==1){contenido+='disabled';}contenido+='>';
							if(estatus!=2 && estatus!=1){
								contenido+=					data.data_det[i].Valor_Medido;
							}
							contenido+=				'</textarea>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							contenido+='  	<input type="radio" id="radio_ok'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="1" && estatus!=2){contenido+=' checked ';Estatus_check=1;}contenido+=' disabled>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							contenido+='  	<input type="radio" id="radio_fallo'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="2" && estatus!=2){contenido+=' checked ';Estatus_check=1;}contenido+=' disabled>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							contenido+='  	<input type="radio" id="radio_no_aplica'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="3" && estatus!=2){contenido+=' checked ';Estatus_check=1;}contenido+=' disabled>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							if(data.data_det[i].V_Mesa==1){
								contenido+='  	<input type="checkbox" id="check_vincular_mesa_ayuda'+i+'" checked>';
							}else{
								contenido+='  	<input type="checkbox" id="check_vincular_mesa_ayuda'+i+'">';	
							}
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group">';
							contenido+='      <textarea rows="2" class="form-control" placeholder="(200 caracteres)" id="observaciones'+i+'" style="font-size: 11px;" disabled></textarea>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='   <div class="form-group" align="center">';
							contenido+='      <div id="div_input_dymanic'+i+'"><input name="imagenes[]" type="file" multiple="multiple" class="file-loading" id="upload_adjuntos'+i+'"></div>';
							contenido+='      <input type="hidden"  id="url_det_adjuntos'+i+'">';
							if(estatus!=2){
								contenido+='      <div id="divVer_Imagen'+i+'">';
								if(data.data_det[i].Url_Adjunto!=null && data.data_det[i].Url_Adjunto!=""){
									contenido+='<a href="../Archivos/Archivos-Actividades/Mantenimiento-Predictivo/'+data.data_det[i].Url_Adjunto+'" target="_blank">Ver Im&aacute;gen</a>';
								}
								contenido+='	  </div>';
							}
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='<td>';
							contenido+='  <div class="input-group date">';
							contenido+='	<div class="input-group-addon">';
							contenido+='	  <i class="fa fa-calendar"></i>';
							contenido+='	</div>';
							contenido+='	<input type="text" class="form-control pull-right datepicker"  onclick="Cambio_Fecha_Progr_Array('+i+')" id="fecha_programada'+i+'" style="font-size: 11px;" value="'+Fecha_Prog+'">';
							contenido+='  </div>';
							contenido+='</td>';
							contenido+='<td>';
							contenido+='  <div class="input-group date">';
							contenido+='	<div class="input-group-addon">';
							contenido+='	  <i class="fa fa-calendar"></i>';
							contenido+='	</div>';
							contenido+='	<input type="text" class="form-control pull-right datepicker" onclick="Cambio_Fecha_Reali_Array('+i+')" id="fecha_realizada'+i+'" style="font-size: 11px;" disabled value="'+Fecha_Real+'">';
							contenido+='  </div>';
							contenido+='</td>';
							contenido+='  <td>';
							if(Estatus_check<=0){
							contenido+='   		<span><i class="fa fa-trash" aria-hidden="true"  onclick="quitarmas(\''+i+'\')" id="quitarmas_table_dinamyc'+i+'"></i></span>';
							}
							contenido+='  </td>';
							contenido+='</tr>';
						}
						
						$("#Muestro_Agregados").html(contenido);
						
						var Content_Cal="";
						Content_Cal+='<div class="col-md-6">';
						Content_Cal+='  <div class="row">';
						Content_Cal+='		<form class="faces">';
						Content_Cal+='      <p class="question">Solución Ofrecida</p>';
						Content_Cal+='      <input type="radio" id="faces-1-1" id="p11" onclick="javascript:guardaRespuestaP1(1);" name="faces-1-set" class="faces-radio cinco">';
						Content_Cal+='      <label for="faces-1-1"></label>';
						Content_Cal+='      <input type="radio" id="faces-1-2" id="p12" onclick="javascript:guardaRespuestaP1(2);" name="faces-1-set" class="faces-radio tres">';
						Content_Cal+='      <label for="faces-1-2"></label>';
						Content_Cal+='      <input type="radio" id="faces-1-3" id="p13" onclick="javascript:guardaRespuestaP1(3);" name="faces-1-set" class="faces-radio uno">';
						Content_Cal+='      <label for="faces-1-3"></label>';
						Content_Cal+='			<input type="hidden" id="hddP1" value="">';
						Content_Cal+='    </form>';
						Content_Cal+='    <div class="form-group">';
						Content_Cal+='      <textarea rows="2" class="form-control" id="Solucion" placeholder="Comentarios..."></textarea>';
						Content_Cal+='    </div>';
						Content_Cal+='  </div>';
			
						Content_Cal+='  <div class="row">';
						Content_Cal+='    <form class="faces">';
						Content_Cal+='  	  <p class="question">Actitud de Servicio</p>';
						Content_Cal+='    	  <input type="radio" id="faces-2-1" id="p21" onclick="javascript:guardaRespuestaP2(1);" name="faces-1-set" class="faces-radio cinco">';
						Content_Cal+='        <label for="faces-2-1"></label>';
						Content_Cal+='        <input type="radio" id="faces-2-2" id="p22" onclick="javascript:guardaRespuestaP2(2);" name="faces-1-set" class="faces-radio tres">';
						Content_Cal+='        <label for="faces-2-2"></label>';
						Content_Cal+='        <input type="radio" id="faces-2-3" id="p23" onclick="javascript:guardaRespuestaP2(3);" name="faces-1-set" class="faces-radio uno">';
						Content_Cal+='        <label for="faces-2-3"></label>';
						Content_Cal+='        <input type="hidden" id="hddP2" value="">';
						Content_Cal+='		</form>';
						Content_Cal+='    <div class="form-group">';
						Content_Cal+='      <textarea rows="2" class="form-control"  id="Actitud" placeholder="Comentarios..."></textarea>';
						Content_Cal+='    </div>';
						Content_Cal+='  </div>';
			
						Content_Cal+='  <div class="row">';
						Content_Cal+='    <form class="faces">';
						Content_Cal+='      <p class="question">Tiempo de respuesta</p>';
						Content_Cal+='      <input type="radio" id="faces-3-1"  id="p31" onclick="javascript:guardaRespuestaP3(1);" name="faces-1-set" class="faces-radio cinco">';
						Content_Cal+='      <label for="faces-3-1"></label>';
						Content_Cal+='      <input type="radio" id="faces-3-2"  id="p32" onclick="javascript:guardaRespuestaP3(2);" name="faces-1-set" class="faces-radio tres">';
						Content_Cal+='      <label for="faces-3-2"></label>';
						Content_Cal+='      <input type="radio" id="faces-3-3"  id="p33" onclick="javascript:guardaRespuestaP3(3);" name="faces-1-set" class="faces-radio uno">';
						Content_Cal+='      <label for="faces-3-3"></label>';
						Content_Cal+='			<input type="hidden" id="hddP3" value="">';
						Content_Cal+='    </form>';
						Content_Cal+='    <div class="form-group">';
						Content_Cal+='      <textarea rows="2" class="form-control"  id="TiempoRespuesta" placeholder="Comentarios..."></textarea>';
						Content_Cal+='    </div>';
						Content_Cal+='  </div>';
						Content_Cal+='</div>';




						$("#td_formato").html('<a href="../controladores/activos/siga_actividades/Reporte-Mantenimiento-Predictivo.php?Id_Actividad='+id+'" class="btn chs" role="button" target="_blank" id="Btn_Formato" style="display:none">Formato</a>');
						
						for(var k=0;k < data.totalCountDetalle; k++){
							//Pasar imagenes al dropzone
							if (data.data_det[k].Url_Adjunto.length>0){
								var hidden_url="url_det_adjuntos"+k;
								var file_adjuntos="upload_adjuntos"+k;
								var nombre_url=data.data_det[k].Url_Adjunto;
								
								if(estatus==2){
									//Estatus 2=copiado no se pasan las imagenes
									subirimagenes(file_adjuntos, hidden_url, false, k);
								}else{
									cargarimagenes(hidden_url, file_adjuntos, nombre_url, false, k);
								}
								
							  
							}
							else{
								var file_adjuntos="upload_adjuntos"+k;
								var hidden_url="url_det_adjuntos"+k;
								
								subirimagenes(file_adjuntos, hidden_url, false, k);
							}
							//////////////////////////////////////////////////
						
							//Fecha
							var nowTemp = new Date();
							var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
							
							$('#fecha_programada'+k).datepicker({
								format: 'dd/mm/yyyy',
								onRender: function(date) {
									return date.valueOf() < now.valueOf() ? 'disabled' : '';
								  }
							});
							
							
							$('#fecha_realizada'+k).datepicker({
								format: 'dd/mm/yyyy',
								onRender: function(date) {
									return date.valueOf() < now.valueOf() ? 'disabled' : '';
								}
							});
								
							//Fecha
						}
						
						
						
						
						//console.log(array_actividades);
                    }
                },
                error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
        }
    }
	

});//ND

</script>