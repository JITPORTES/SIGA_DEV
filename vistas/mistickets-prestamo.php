   <?php
	$Espacios="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
  ?>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">



      
      <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs azulf" role="tablist">
          <li role="presentation" onclick="tab_active(0);limpiarcampos()" class="active"><a href="#nuevo" aria-controls="nuevo" role="tab" data-toggle="tab">Nuevo</a></li>
		  <li role="presentation" onclick="tab_active(1)" id="li_tab_sin_respuesta"><a id="tap_sin_respuesta" href="#sin_respuesta" aria-controls="sin_respuesta" id="tab_Sin_Respuesta" role="tab" data-toggle="tab">Sin respuesta aún</a></li>
          <li role="presentation" onclick="tab_active(2)" id="li_tab_seguimiento"><a id="tab_seguimiento" href="#proceso" aria-controls="proceso" id="tabProceso" role="tab" data-toggle="tab">En Prestamo</a></li>
          <li role="presentation" onclick="tab_active(3)" id="li_tab_cerrados"><a id="tab_cerrados" href="#historico" aria-controls="historico" role="tab" data-toggle="tab">Histórico</a></li>
          <li class="export"><a href="#"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar</a></li>
        </ul>
      </div>
        
        
        
        
        
      <!-- Main row -->
      <div class="row">
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- nuevo -->
          <div role="tabpanel" class="tab-pane active" id="nuevo">
          <input type="hidden" id="hddArea" value="">  
		  <input type="hidden" id="hddSeccion" value="">  	
		  <input type="hidden" id="hddEstatus_Proceso" value="">  			  
              <!-- Centered Pills -->
         <div class="">
             <ul class="nav nav-pills nav-justified">
                 <div class="row">
                    <div class="col-md-12">
                      <li class="active">
                         <div class="col-md-4 col-sm-3 col-xs-12">
                            <div class="info-box azul">
                                <!-- Button trigger modal -->
                                 <a data-toggle="tab" href="#biomedica" onclick="cambiaArea(1);">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-stethoscope"></i></span>
                                <div class="info-box-content">
                                <h3 class="info-box-text">Biomédica</h3>
                                </div>
                      <!-- /.info-box-content -->
                                </a>
                            </div>
                          </div>
                    </li>
                      
                    <li>
                        <div class="col-md-4 col-sm-3 col-xs-12">
                            <div class="info-box verde">
                                 <a data-toggle="tab" href="#tic" onclick="cambiaArea(2);">
                                <span class="info-box-icon bg-green"><i class="fa fa-laptop"></i></span>
                                <div class="info-box-content">
                                <h3 class="info-box-text">TIC</h3>
                                </div>
                                <!-- /.info-box-content -->
                                </a>
                            </div>
                      </div>
                    </li>
                      
                    <li>
                        <div class="col-md-4 col-sm-3 col-xs-12">
                            <div class="info-box amarillo">
                                <a data-toggle="tab" href="#mantenimiento" onclick="cambiaArea(3);">
                                <span class="info-box-icon bg-yellow"><i class="fa fa-wrench"></i></span>
                                <div class="info-box-content">
                                <h3 class="info-box-text">Mantenimiento</h3>
                                </div>
                                </a>
                          </div>
                        </div>
                   </li>
                        
                  <li>

                  </li>
                </div>
            </div>
        </ul>

        
            <div class="tab-content">
                <div id="biomedica" class="tab-pane fade in active">
                  <form>
              <div class="col-md-12">
                <div class="box">
                  <div class="box-header azul with-border" id="headerArea">
                    <h3 class="box-title" id="h3Area">Solicitud de préstamo Biomédica</h3>
					<input type="hidden" id="Id_Solicitud">
					<input type="hidden" id="hidden_seleccion_activo">
                  </div>

                  <div class="box-body">

                    <div class="col-md-10 col-md-offset-1">
                      
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea rows="4" id="Descripcion_ticket" class="form-control" placeholder="Descripción Detallada(500 caracteres)"></textarea>
                        </div>
                      </div>
					  
					  <div class="col-md-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="Fecha_Prestamo"  placeholder="Fecha de préstamo" class="form-control pull-right datepicker">
                                  </div>
                              </div>
                        
                              <div class="col-md-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="Fecha_Devolucion" placeholder="Fecha de devolución" class="form-control pull-right datepicker">
                                  </div>
                              </div>

                      <div class="col-md-12">
                        <ul class="inline">
                          <li>Prioridad</li>
                          <li>
                            <div class="form-group">
                              <div class="checkbox icheck">
                                <label>
                                  <input type="radio" name="prioridad" id="Check_Alta"> Alta
                                </label>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <div class="checkbox icheck">
                                <label>
                                  <input type="radio" name="prioridad" id="Check_Media"> Media
                                </label>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <div class="checkbox icheck">
                                <label>
                                  <input type="radio" name="prioridad" id="Check_Poca"> Baja
                                </label>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      

                    </div>


                  </div>
                </div>
                
              </div>
            </form>
            <div class="row">
                <div class="col-md-7 text-right" style="margin-top:15px;">
                <button type="button" id="solicitar" class="btn chs">Solicitar préstamo</button>
            </div>
          </div>
        </div>
        <!-- tab-panel -->
        </div>
              </div>
        
            
          </div><!-- tab-panel -->
            
          <!-- altas -->
		  <div role="tabpanel" class="tab-pane" id="sin_respuesta">
            <!-- table-results -->
            <div class="col-md-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                      
                  <table id="display_sin_respuesta" class="table table-bordered table-striped table-chs" width="100%">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th width="10px">Editar</th>
                        <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
                        <th>Folio Solicitud</th>
						<th>Fecha Solicitud</th>
						<th>Usuario<br>solicitante</th>
                        <th>Prioridad</th>
                        <th>Área</th>
                        <th><?php echo $Espacios; ?>Fecha Prestamo / Devolución<?php echo $Espacios; ?></th>
                        <th><?php echo $Espacios; ?>Descripción&nbsp;Detalle<?php echo $Espacios; ?></th>
                        <th>Enviado</th>
                      </tr>
                    </thead>
                    
                  </table>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div><!-- tab#2 -->
			

		  <div role="tabpanel" class="tab-pane" id="proceso">
            <!-- table-results -->
            <div class="col-md-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                      
                  <table id="display_seguimiento" class="table table-bordered table-striped table-chs" width="100%">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th width="10px">Editar</th>
                        <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
                        <th>Folio Solicitud</th>
						<th>Fecha Solicitud</th>
						<th>Usuario<br>solicitante</th>
                        <th>Prioridad</th>
                        <th>Área</th>
						<th>Gestor</th>
                        <th><?php echo $Espacios; ?>Fecha Prestamo / Devolución<?php echo $Espacios; ?></th>
                        <th><?php echo $Espacios; ?>Descripción&nbsp;Detalle<?php echo $Espacios; ?></th>
                        <th>Activo Fijo</th>
                      </tr>
                    </thead>
                    
                  </table>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div><!-- tab#2 -->
		
          <div role="tabpanel" class="tab-pane" id="historico">
            <!-- table-results -->
            <div class="col-md-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                     
                  <table id="tablacerrado" class="table table-bordered table-striped table-chs" width="100%">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th width="10px">Editar</th>
                        <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
                        <th>Folio Solicitud</th>
						<th>Fecha Solicitud</th>
						<th>Usuario<br>solicitante</th>
                        <th>Prioridad</th>
                        <th>Área</th>
						<th>Gestor</th>
                        <th><?php echo $Espacios; ?>Fecha Prestamo / Devolución<?php echo $Espacios; ?></th>
                        <th><?php echo $Espacios; ?>Descripción&nbsp;Detalle<?php echo $Espacios; ?></th>
                        <th>Activo Fijo</th>
                      </tr>
                    </thead>
                  </table>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>

        </div>
      </div>
      <!-- /.row -->

<!-- modal prestamos -->
    <div class="modal fade modalchs" id="seguimientoPrestamos">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" id="closeModal"  data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Préstamos</h4>
          </div>
          <div class="modal-body nopsides">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs azuldef" role="tablist">
              <li role="presentation" class="active"><a href="#datos" id="tab_datos_generales" aria-controls="datos" role="tab" data-toggle="tab">Datos Generales</a></li>
              <li role="presentation" ><a id="tab_activos" href="#activos" aria-controls="activos" role="tab" data-toggle="tab">Activo Asignado</a></li>
              <li role="presentation"><a  href="#cerrar" id="tab_cerrar_ticket" aria-controls="cerrar" role="tab" data-toggle="tab">Comentarios Gestor</a></li>
			  <li role="presentation"><a  href="#devolver" id="tab_devolver" aria-controls="cerrar" role="tab" data-toggle="tab">Devolución</a></li>
            </ul>

            <div class="tab-content">
             <div role="tabpanel" class="tab-pane active" id="datos">
                  <div class="box-body">
               <div class="col-md-12 col-md-offset-1">
                 <div class="col-md-4">
                   <ul class="heads">
                     <li><span>No. Solicitud de prestamo</span> <span style="color: #666;font-weight: normal;" id="spanNumsolicitud1"></span></li>
                     <li><span>Área</span> <span style="color: #666;font-weight: normal;" id="spanArea1"></span></li>
                     <li><span>Fecha solicitud</span> <span style="color: #666;font-weight: normal;" id="spanFechaSolicitud1"></span></li>
                     <li><span>Usuario Solicitante</span> <span style="color: #666;font-weight: normal;" id="spanUsuarioSolicitante1"></span></li>
                     <li><span>Fecha Préstamo / Devolución</span> <span style="color: #666;font-weight: normal;" id="spanFechaPrestamo1"></span></li>
                   </ul>
                 </div>
                   
                
                  <div class="col-md-6">
                        <ul class="inline">
                          <li>Prioridad</li>
                          <li>
                            <div class="form-group">
                              <div class="checkbox icheck">
                                <label>
                                  <input type="radio" name="prioridad" id="Check_Alta"> Alta
                                </label>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <div class="checkbox icheck">
                                <label>
                                  <input type="radio" name="prioridad" id="Check_Media"> Media
                                </label>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <div class="checkbox icheck">
                                <label>
                                  <input type="radio" name="prioridad" id="Check_Poca"> Poca
                                </label>
                              </div>
                            </div>
                          </li>
                        </ul>

                   
                  <!--
                       <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Titulo">
                        </div>
                      </div>
                   
                    <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Titulo">
                        </div>
                      </div>
                   -->
                  
                    <div class="col-md-12">
                        <div class="form-group">
                          <textarea rows="3" disabled id="textDescripcion" class="form-control" placeholder="Descripción de la solicitud de préstamo"></textarea>
                        </div>
                    </div>
                   
               
                 </div>
               </div>
                  
                </div>
                <div class="modal-footer">
                  
                </div>
              </div>

            <div role="tabpanel" class="tab-pane" id="activos">
               <div class="box-body">
                    
				<div class="col-md-10 col-md-offset-1">
					
                  <div class="col-md-4">
					
					<input type="hidden" id="Estatus_Realizado">  
					<input type="hidden" id="Id_Solicitud">
					<input type="hidden" id="hddEstatus_Proceso" value="">  
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
                <div class="modal-footer">
                  
                </div>
                
              </div>

              <div role="tabpanel" class="tab-pane" id="cerrar">
                <div class="row">
                <div class="col-md-12">
                      <div class="col-md-6 col-md-offset-3 ">
                        <!--<div class="form-group">
                          <select class="form-control">
                            <option>Categoría</option>
                          </select>
                        </div>-->
						<div class="form-group">
								  <div class="col-md-6">
								  <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Fecha Préstamo</label>
                                <div class="input-group date">
								    
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="Fecha_Prestamo"  placeholder="Fecha de préstamo" class="form-control pull-right datepicker">
                                  </div>
                              </div>
                       
                              <div class="col-md-6">
							  <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Fecha Devolución</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="Fecha_Devolucion" placeholder="Fecha de devolución" class="form-control pull-right datepicker">
                                  </div>
                              </div> 
						</div>

                      
                        <div class="form-group">
						  <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Estado del equipo</label>
                          <textarea rows="4" id="textEstadoEquipo" class="form-control" placeholder="Estado del equipo (500 caracteres)"></textarea>
                        </div>
                          
                        <div class="form-group">
						  <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Accesorios</label>
                          <textarea rows="4" id="textAccesorios" class="form-control" placeholder="Accesorios (500 caracteres)"></textarea>
                        </div>
						
						<div class="form-group">
						  <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Accesorios</label>
                          <textarea rows="4" id="textComentarios" class="form-control" placeholder="Comentarios (500 caracteres)"></textarea>
                        </div>
                          
                      </div>
                   </div>
                </div>
               <div class="modal-footer">
                  
               </div>
              </div>
			  
			  <div role="tabpanel" class="tab-pane" id="devolver">
                <div class="row">
                <div class="col-md-12">
                      <div class="col-md-6 col-md-offset-3 ">
                        <!--<div class="form-group">
                          <select class="form-control">
                            <option>Categoría</option>
                          </select>
                        </div>-->
						<div class="form-group">
                       
                              
							  <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Fecha Entrega</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="Fecha_Entrega" placeholder="Fecha de entrega real" class="form-control pull-right datepicker">
                                  </div>
                              
						</div>

                      
                   
						<div class="form-group">
						  <label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;">Comentarios entrega</label>
                          <textarea rows="4" id="textComentariosEntrega" class="form-control" placeholder="Comentarios entrega (500 caracteres)"></textarea>
                        </div>
                          
                      </div>
                   </div>
                </div>
               <div class="modal-footer">
                  
               </div>
              </div>
			  
			  
            </div>

          </div>
        </div>
      </div>
    </div>

    
    </div>

	    <!-- modal char adjuntos -->
    <div class="modal fade modalchs" id="Modal_Adjuntos_Imagenes">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Adjuntar Imagen</h4>
          </div>
		  <input type="hidden" id="url_documentos_adjuntos_chat">
          <div class="modal-body nopsides" id="adjunto_imagenes">
            
			
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



<!-- ./wrapper -->

<!-- DataTables -->
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- File Input -->
<script src="../plugins/fileinput/fileinput.js"></script>
<script src="../plugins/fileinput/fileinput_locale_es.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App   Se comento esta linea ya que no deja desplegar el menu-->
<!--<script src="../dist/js/app.min.js"></script>-->
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!--<script src="../plugins/fullcalendaryear/fullcalendar.js"></script>-->
  <!-- File Input -->
  <link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
  <script src="../plugins/docsupport/standalone/selectize.js"></script>
  <script src="../plugins/docsupport/index.js"></script>

<script>

  $(function () {
    $('#example1, #example2, #example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });




  
   //Date picker
  $('.datepicker').datepicker({ 
    format: 'dd/mm/yyyy',
  }).datepicker("setDate", new Date());
 
    
   $(document).ready(function(){
		//Carga combobox tipo valde de resguardo
		
		cambiaArea(1);
		var tab_activex=0;
		var cont_estatus_3=0;
		autocomplete_activos();
		/*Inicia Controles Busqueda*/
		autocomplete_activos_search();
		
		//Guardar Registros
		$("#solicitar").click(function () {
			var Agregar = true;
			var mensaje_error = "";
			var strDatos="";
			
			var Id_Solicitud=$.trim($("#Id_Solicitud").val());
			var Id_Activo=$("#hidden_seleccion_activo").val();
			
			//Usuario Sesion
			var Id_Usuario=$("#usuariosesion").val();
			
			//Area de sesion
			//var Id_Area=$("#idareasesion").val();
			var Id_Area=$("#hddArea").val();
			var Fecha_Prestamo=$.trim($("#Fecha_Prestamo").val());
			var Fecha_Devolucion=$.trim($("#Fecha_Devolucion").val());
			//var Id_Categoria=$("#cmb_categoria").val();
			var Desc_Categoria=$.trim($("#Descripcion_ticket").val());
			var Prioridad="";
			//////////
			var Id_Solicitud_Correo="";
			 			
			/////////
				
				if (Id_Area.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Falta elegir el área (Biomedica, TIC, etc)<br />";		
				}
			
				if (Desc_Categoria.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Falta agregar la descripci&oacute;n del Préstamo<br />";
					$("#Descripcion_ticket").focus();
				}
				if (Fecha_Prestamo.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Falta agregar la fecha del préstamo<br />";
					$("#Fecha_Prestamo").focus();
				}			
				if (Fecha_Devolucion.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Falta agregar la fecha del¿ la devolución del préstamo<br />";
					$("#Fecha_Devolucion").focus();
				}			
				/////////
				if($("#Check_Alta").is(':checked')) {  
					Prioridad="1";
				}
				
				if($("#Check_Media").is(':checked')) {  
					Prioridad="2";
				}
				
				if($("#Check_Poca").is(':checked')) {  
					Prioridad="3";
				}
				
			
			if (!Agregar) {
				mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
			}
			
			if(Agregar)
			{
				strDatos = "Id_Usuario="+Id_Usuario; 
				strDatos += "&Id_Area="+Id_Area;
				strDatos += "&Id_Activo="+Id_Activo;
				//strDatos += "&Id_Categoria="+Id_Categoria;
				strDatos += "&Desc_Motivo_Reporte="+Desc_Categoria;
				strDatos += "&Prioridad="+Prioridad;
				strDatos += "&Fecha_Prestamo="+Fecha_Prestamo;
				strDatos += "&Fecha_Devolucion="+Fecha_Devolucion;
				//strDatos += "&Url_archivo="+Url_archivo;
				
				if(Id_Solicitud.length <= 0)
				{
					strDatos += "&Usr_Inser="+Id_Usuario;
					strDatos += "&Estatus_Reg=1";				
					strDatos += "&accion=guardar";
				}
				else
				{
					strDatos += "&Id_Solicitud="+Id_Solicitud;
					strDatos += "&Usr_Mod="+Id_Usuario;
					strDatos += "&Estatus_Reg=2";				
					strDatos += "&accion=guardar";
				}
				
				$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_solicitud_prestamos/Siga_solicitud_prestamosFacade.Class.php",        
					async: false,
					data: strDatos,
					dataType: "html",
					beforeSend: function (xhr) {
				
					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						limpiarcampos();
						mensajesalerta("&Eacute;xito", "Generado Correctamente.", "success", "dark");
						$("#tab_Sin_Respuesta").click();						
						//$('#myModal').modal('hide');
						$('#display_sin_respuesta').DataTable().ajax.reload();
						$('#display_seguimiento').DataTable().ajax.reload();
						Id_Solicitud_Correo=json.data[0].Id_Solicitud;
						
						$("#tap_sin_respuesta").click();
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
					}
				});
				/*
				if(Id_Solicitud_Correo!=""){
					$.ajax({
						type: "POST",
						url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsCorreo.Class.php",        
						async: false,
						data: {
							tipocorreo:"nuevo",
							nombre:"Javier",
							telefono:"5514284951",
							email:"javjava@gmail.com",
							mensaje:"Hola",
							Id_Solicitud_Correo:Id_Solicitud_Correo,
						},
						
						dataType: "html",
						beforeSend: function (xhr) {
					
						},
						success: function (datos) {
							var json;
							json = eval("(" + datos + ")"); //Parsear JSON
							limpiarcampos();
							mensajesalerta("&Eacute;xito", "Correo enviado Correctamente.", "success", "dark");
						
							
						},
						error: function () {
							mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
						}
					});
				}*/
			
			}
		});
		
		//Tabla Sin Respuesta
		$('#display_sin_respuesta').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": "../fachadas/activos/siga_solicitud_prestamos/Siga_solicitud_prestamosFacade.Class.php",
			"type": "POST",
			"data": {
				orden:'AF_BC',
				Gestor_Solicitante:"gestor",
				Id_Area:$("#idareasesion").val(), /* Ajuste JGR 28/06/2018*/
				Tipo_Gestor:$("#hddTipo_Gestor").val(),
				/*Id_Seccion:$("#hddId_Seccion").val(),*/
				Estatus_Proceso:'1'
			}
		},
		"aoColumnDefs" : [ 
                            {"aTargets" : [6], "sClass":  "prioridad"},   
                         ],
		"columns": [
		    { "data": "Id_Solicitud", "visible": false},
			{	
				"data": function (obj) {
					var seguimiento = '';
					seguimiento += '<a href="#" data-toggle="modal" data-target="#seguimientoPrestamos" onclick="pasarvalores('+obj.Id_Solicitud+', 1)"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>';
					return seguimiento;
				}
			},
			
			{
				"data": function (obj) {
					var clip = '';
					clip += '<i class="fa fa-paperclip" aria-hidden="true"></i>';
					return clip;
				},"visible": false
			},
			{ "data": "Id_Solicitud"},
			{ "data": "Fecha"},
			{ "data": "Nombre_Usuario"},
			{
				"data": function (obj) {
					var prioridad = '';
					if(obj.Prioridad==1){
						prioridad = '<i class="fa fa-circle red" aria-hidden="true"></i>';
					}
					if(obj.Prioridad==2){
						prioridad = '<i class="fa fa-circle yellow" aria-hidden="true"></i>';
					}
					if(obj.Prioridad==3){
						prioridad = '<i class="fa fa-circle green" aria-hidden="true"></i>';
					}
					
					return prioridad;
				}
			},
			{ "data": "Nom_Area"},
			{ "width": "30%","data": function (obj) {
				var Desc = obj.Fecha_Prestamo + ' - ' + obj.Fecha_Devolucion;
				return Desc;
			}
			},
			{
				"width": "40%",
				"data": function (obj) {
					var Desc = '';
					
					if(obj.Id_Activo!=null){
						Desc=obj.Activo;
					}else{
						Desc=obj.Desc_Motivo_Reporte;
					}
					return Desc;
				}
			
			},
			
			{ "data": "Fecha"}
			
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
		
		
		//Tabla Seguimiento
		$('#display_seguimiento').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": "../fachadas/activos/siga_solicitud_prestamos/Siga_solicitud_prestamosFacade.Class.php",
			"type": "POST",
			"data": {
				orden:'AF_BC',
				Gestor_Solicitante:"gestor",
				Id_Area:$("#idareasesion").val(),
				Tipo_Gestor:$("#hddTipo_Gestor").val(),
				/*Id_Seccion:$("#hddId_Seccion").val(),*/
				Estatus_Proceso:'2,3'
			}
		},
		"aoColumnDefs" : [ 
                            {"aTargets" : [6], "sClass":  "prioridad"},   
                         ],
		"columns": [
		    { "data": "Id_Solicitud", "visible": false},
			{	
				"data": function (obj) {
					var seguimiento = '';
					seguimiento += '<a href="#" data-toggle="modal" data-target="#seguimientoPrestamos" onclick="pasarvalores('+obj.Id_Solicitud+', 3)"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>';
					return seguimiento;
				}
			},
			
			{
				"data": function (obj) {
					var clip = '';
					clip += '<i class="fa fa-paperclip" aria-hidden="true"></i>';
					return clip;
				},"visible": false
			},
			{ "data": "Id_Solicitud"},
			{ "data": "Fecha"},
			{ "data": "Nombre_Usuario"},
			{
				"data": function (obj) {
					var prioridad = '';
					if(obj.Prioridad==1){
						prioridad = '<i class="fa fa-circle red" aria-hidden="true"></i>';
					}
					if(obj.Prioridad==2){
						prioridad = '<i class="fa fa-circle yellow" aria-hidden="true"></i>';
					}
					if(obj.Prioridad==3){
						prioridad = '<i class="fa fa-circle green" aria-hidden="true"></i>';
					}
					
					return prioridad;
				}
			},
			{ "data": "Nom_Area"},
			{ "data": "Gestor"},
			{ "width": "30%","data": function (obj) {
				var Desc = obj.Fecha_Prestamo + ' - ' + obj.Fecha_Devolucion;
				return Desc;
			}
			},
			{
				"width": "40%",
				"data": function (obj) {
					var Desc = '';
					
					Desc=obj.Desc_Motivo_Reporte;
					
					return Desc;
				}
			
			},
			
			{ "data": "Activo"}
			
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
		
		
		selec_activo_radio=function(nombre_radio, Id_Activo){
			$("#hidden_seleccion_activo").val(Id_Activo);
		}	
		
		$('#tablacerrado').DataTable({
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": "../fachadas/activos/siga_solicitud_prestamos/Siga_solicitud_prestamosFacade.Class.php",
			"type": "POST",
			"data": {
				orden:'AF_BC',
				Gestor_Solicitante:"usuario",
				Id_Area:$("#idareasesion").val(),
				Tipo_Gestor:$("#hddTipo_Gestor").val(),
				Id_Usuario:$("#usuariosesion").val(),
				/*Id_Seccion:$("#hddId_Seccion").val(),*/
				Estatus_Proceso:'4'
			}
		},
		"aoColumnDefs" : [ 
                            {"aTargets" : [6], "sClass":  "prioridad"},   
                         ],
		"columns": [
		    { "data": "Id_Solicitud", "visible": false},
			{	
				"data": function (obj) {
					var seguimiento = '';
					seguimiento += '<a href="#" data-toggle="modal" data-target="#seguimientoPrestamos" onclick="pasarvalores('+obj.Id_Solicitud+', 3)"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>';
					return seguimiento;
				}
			},
			
			{
				"data": function (obj) {
					var clip = '';
					clip += '<i class="fa fa-paperclip" aria-hidden="true"></i>';
					return clip;
				},"visible": false
			},
			{ "data": "Id_Solicitud"},
			{ "data": "Fecha"},
			{ "data": "Nombre_Usuario"},
			{
				"data": function (obj) {
					var prioridad = '';
					if(obj.Prioridad==1){
						prioridad = '<i class="fa fa-circle red" aria-hidden="true"></i>';
					}
					if(obj.Prioridad==2){
						prioridad = '<i class="fa fa-circle yellow" aria-hidden="true"></i>';
					}
					if(obj.Prioridad==3){
						prioridad = '<i class="fa fa-circle green" aria-hidden="true"></i>';
					}
					
					return prioridad;
				}
			},
			{ "data": "Nom_Area"},
			{ "data": "Gestor"},
			{ "width": "30%","data": function (obj) {
				var Desc = obj.Fecha_Prestamo + ' - ' + obj.Fecha_Devolucion;
				return Desc;
			}
			},
			{
				"width": "40%",
				"data": function (obj) {
					var Desc = '';
					
					Desc=obj.Desc_Motivo_Reporte;
					
					return Desc;
				}
			
			},
			
			{ "data": "Activo"}
			
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
	pasarvalores=function(id, Estatus_Proceso) {
		//Controles Chat
		$("#botonEnviar").prop('disabled', false);
		$("#Mensaje").prop('disabled', false);
		//Controles Cierre
		$("#div_calificacion").hide();
		$("#botonCerrar").attr("disabled", false);
		limpiarcampos();
		
		if(Estatus_Proceso=="1"){
			$("#tab_datos_generales").show();
			$("#tab_activos").hide();
			$("#tab_cerrar_ticket").hide();
			$("#tab_devolver").hide();
			$("#tab_datos_generales").click();
		}
		if(Estatus_Proceso=="2")
		{
			$("#tab_datos_generales").show();
			$("#tab_activos").show();
			$("#tab_cerrar_ticket").hide();
			$("#tab_devolver").hide();
			$("#tab_datos_generales").click();
		}
		if(Estatus_Proceso=="3")
		{
			$("#tab_datos_generales").show();
			$("#tab_activos").show();
			$("#tab_cerrar_ticket").show();
			$("#tab_datos_generales").click();
		}
		if(Estatus_Proceso=="4")
		{
			$("#tab_datos_generales").show();
			$("#tab_activos").show();
			$("#tab_cerrar_ticket").show();
			$("#tab_devolver").show();
			$("#tab_datos_generales").click();
			//Controles Chat
			$("#btnAsignar2").prop('disabled', true);
			$("#botonCerrar").prop('disabled', true);
			$("#botonDevolver").prop('disabled', true);
						
		}	
		
		
		if (id != "") {
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_solicitud_prestamos/Siga_solicitud_prestamosFacade.Class.php",
				async: false,
				data: {
					Id_Solicitud: id,
					Estatus_Reg:'1',
					accion: "consultar"
				},
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (data) {
					data = eval("(" + data + ")");
					var Prioridad = "";
					if (data.totalCount > 0) 
					{
						 							 
						 $("#Id_Solicitud").val(data.data[0].Id_Solicitud);
						 $("#hddEstatus_Proceso").val(data.data[0].Id_Estatus_Proceso);
						 //alert(data.data[0].Id_Estatus_Proceso);
						 
						 if(data.data[0].Id_Estatus_Proceso=="4"){	
							$("#botonCerrar").attr("disabled", true);
						 }
						
						 if (data.data[0].Prioridad ==1)
						 {
							 Prioridad = "Alta";
							 $("#Check_Alta").prop('checked',true);
						 }
						 if (data.data[0].Prioridad ==2)
						 {
							 Prioridad = "Media";
							 $("#Check_Media").prop('checked',true);
						 }
						 if (data.data[0].Prioridad ==3)
						 {
							 Prioridad = "Baja";
							 $("#Check_Poca").prop('checked',true);
						 }
	
				         $("#Titulo").val(data.data[0].Titulo);
						 $("#hddArea").val(data.data[0].Id_Area);
						 $("#Descripcion").val(data.data[0].Desc_Motivo_Reporte);
						 $("#textEstadoEquipo").val(data.data[0].TituloCierre);
						 $("#textComentarios").val(data.data[0].ComentarioCierre);
						 $("#textAccesorios").val(data.data[0].Accesorios_Cierre);
						 $("#textComentariosEntrega").val(data.data[0].ComentarioEntrega);
						 
						 $("#textEstadoEquipo").attr("disabled", true);
						 $("#textComentarios").attr("disabled", true);
						 $("#textAccesorios").attr("disabled", true);
						 $("#textComentariosEntrega").attr("disabled", true);
						 $("#Fecha_Prestamo").attr("disabled", true);
						 $("#Fecha_Devolucion").attr("disabled", true);
						 $("#Fecha_Entrega").attr("disabled", true);

						 var $select3 = $('#select-activos').selectize({});	
						 var control3 = $select3[0].selectize;
						 control3.addItem(data.data[0].Id_Activo);
						 control3.disable();
	
						 $("#spanNumsolicitud1").text(data.data[0].Id_Solicitud);
						 $("#spanFechaSolicitud1").text(data.data[0].Fech_Inser);
						 $("#spanFechaPrestamo1").text(data.data[0].Fecha_Prestamo + ' - '+ data.data[0].Fecha_Devolucion);
						 $("#spanUsuarioSolicitante1").text(data.data[0].Usuario);
						 $("#textDescripcion").text(data.data[0].Desc_Motivo_Reporte);
						 $("#Fecha_Prestamo").val(data.data[0].Fecha_Prestamo);
						 $("#Fecha_Devolucion").val(data.data[0].Fecha_Devolucion);
						 $("#Fecha_Entrega").val(data.data[0].Fecha_Entrega);
						 
						 $("#spanActivo1").text(data.data[0].AF_BC_Activo);
						 $("#spanMarca1").text(data.data[0].Marca);
						 $("#spanModelo1").text(data.data[0].Modelo);
						 $("#spanNo_Serie1").text(data.data[0].No_Serie);
						 $("#spanUbic_Prim1").text(data.data[0].Ubic_Prim);
						 $("#spanUbic_Sec1").text(data.data[0].Ubic_Sec);	 
						 $("#spanArea1").text(data.data[0].Area);
						 $("#spanPrioridad1").text(Prioridad);
						 $("#spanMotivo1").text(data.data[0].Motivo);
						 $("#spanSolicitud1").text(data.data[0].Usuario);
						 $("#spanGestor1").text(data.data[0].Gestor);
						 
					}
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
		}
	}		
	
	function autocomplete_activos(){
		//Area
		var Id_Area=$("#idareasesion").val();
		var strdatos="";
		
		if(Id_Area!="5"){
			strdatos={
				soloactivos:"1",
				Id_Area:Id_Area,
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}else{
			strdatos={
				soloactivos:"1",
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}
			
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
			data: strdatos,
			async: true,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargando1").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var activos='';
					if (json.totalCount > 0) {

						
						activos+='<option></option>';
						activos+='<optgroup label="Activos">';
						
						for (var i = 0; i < json.totalCount; i++) {
							activos+='<option value="'+json.data[i].Id_Activo+'">'+json.data[i].AF_BC+' '+json.data[i].Nombre_Activo+'</option>';
						}
						activos+='</optgroup>';
						$('#select-activos').html(activos);

						$("#gifcargando1").hide();
						$("#select-activos").show();
							
						$('#select-activos').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargando1").hide();
						activos+='<option>--Sin Resultados--</option>';
						activos+='<optgroup label="Activos">';
						activos+='</optgroup>';
						$('#select-activos').html(activos);
						$("#select-activos").show();
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#select-activos').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	function autocomplete_activos_search(){
		//Area
		var Id_Area=$("#idareasesion").val();
		var strdatos="";
		
		if(Id_Area!="5"){
			strdatos={
				soloactivos:"1",
				Id_Area:Id_Area,
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}else{
			strdatos={
				soloactivos:"1",
				Estatus_Reg:"1",
				accion: 'autocomplete_activos'
			}
		}
			
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
			data: strdatos,
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargando-search").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
					var activos='';
					if (json.totalCount > 0) {
						activos+='<option></option>';
						activos+='<optgroup label="Activos">';
						
						for (var i = 0; i < json.totalCount; i++) {
							activos+='<option value="'+json.data[i].Id_Activo+'">'+json.data[i].AF_BC+' '+json.data[i].Nombre_Activo+'</option>';
						}
						activos+='</optgroup>';
						$('#select-activos-search').html(activos);

						$("#gifcargando-search").hide();
						$("#select-activos-search").show();
							
						$('#select-activos-search').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargando-search").hide();
						activos+='<option>--Sin Resultados--</option>';
						activos+='<optgroup label="Activos">';
						activos+='</optgroup>';
						$('#select-activos-search').html(activos);
						$("#select-activos-search").show();
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#select-activos-search').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	
	$("#select-activos").change(function() {
		$("#Imagen_Activo").html('<img src="sin-imagen.png" style="width:150px;height:150px;">');
		$("#txt_Id_Activo").val("");
		$("#txt_Nom_Activo").val("");
		$("#txt_ubic_primaria").val("");
		$("#txt_ubic_secundaria").val("");
		$("#txt_marca").val("");
		$("#text_Modelo").val("");
		$("#text_Desc_Corta").val("");
		$("#text_No_Serie").val("");
		$("#text_AFBC").val("");
		$("#text_Usr_Resp").val("");
		$("#text_Id_Usuario").val("");
		
		if(this.value!=""){
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					Id_Activo:this.value,
					accion: 'activos'
				},
				async: false,
				dataType: "html",
				beforeSend: function (objeto) {
				},
				success: function (datos) {
					var json = "";
						json = eval("(" + datos + ")"); //Parsear JSON

						if (json.totalCount > 0) {
							$("#txt_Id_Activo").val(json.data[0].Id_Activo);
							$("#txt_Nom_Activo").val(json.data[0].Nombre_Activo);
							$("#txt_ubic_primaria").val(json.data[0].Desc_Ubic_Prim);
							$("#txt_ubic_secundaria").val(json.data[0].Desc_Ubic_Sec);
							$("#txt_marca").val(json.data[0].Marca);
							$("#text_Modelo").val(json.data[0].Modelo);
							$("#text_Desc_Corta").val(json.data[0].DescCorta);
							$("#text_No_Serie").val(json.data[0].NumSerie);
							$("#text_AFBC").val(json.data[0].AF_BC);
							$("#text_Usr_Resp").val(json.data[0].Nombre_Completo);
							//Buscar_Id_Usuario(json.data[0].Num_Empleado);
							
							if(json.data[0].Foto!=null && json.data[0].Foto.length>0){
								$("#Imagen_Activo").html('<img src="../Archivos/Archivos-Activos/'+json.data[0].Foto+'" style="width:150px;height:150px;">');
							}else{
								$("#Imagen_Activo").html('<img src="sin-imagen.png" style="width:150px;height:150px;">');
							}
							
						}else {
							mensajesalerta("", "No se encontraron resultados", "error", "dark");
						}

				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
		}
	});
		
		tab_active=function(valor){
			tab_activex=valor;
		}
		
		//Carga la tabla en donde el tab se encuentra activa
		setInterval('cargar_tablas()',300000);
		cargar_tablas=function(){
			if(tab_activex==1){
				$('#display_sin_respuesta').DataTable().ajax.reload();
			}else{
				if(tab_activex==2){
					$('#display_seguimiento').DataTable().ajax.reload();
				}else{
					if(tab_activex==3){
						$('#tablacerrado').DataTable().ajax.reload();
					}
				}
			}
		}
		
   });
   
   
		
   function limpiarcampos()
	{
		$("#Id_Solicitud").val("");
		$("#textComentarios").val("");
		$("#textComentarios").val("");
		$("#textAccesorios").val("");
		var Nom_Activo=$.trim($("#select-activos").val());
		if(Nom_Activo!=""){			
			if(Nom_Activo.length > 0){
				var $select3 = $('#select-activos').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
				control3.enable();
			}
		}
		$("#Check_Alta").prop('checked',false);
		$("#Check_Media").prop('checked',false);
		$("#Check_Poca").prop('checked',false);
		
		$("#btnAsignar2").prop('disabled', false);
		$("#botonCerrar").prop('disabled', false);
		$("#botonDevolver").prop('disabled', false);
	}	
   
	function cambiaArea(idarea){
	   
	   limpiarcampos();
	   $("#hddArea").val(idarea);
	   $("#headerArea").removeAttr('class');
	   $("#headerArea").attr('class', '');
	   $('#headerArea')[0].className = '';
	   	   
	   
	   //carga_secciones(idarea);
	   //carga_categorias(idarea);
	   
       if (idarea == 1)	   
	   {
	   $("#headerArea").addClass("box-header azul with-border");
	   $("#h3Area").html("Solicitud de préstamo Biomédica");
	   }
       if (idarea == 2)	
	   {		   
	   $("#headerArea").addClass("box-header verde with-border");
	   $("#h3Area").html("Solicitud de préstamo TIC");
	   }
	   if (idarea == 3)	
	   {		   
	   $("#headerArea").addClass("box-header amarillo with-border");
	   $("#h3Area").html("Solicitud de préstamo Mantenimiento");
	   }
   }
   
    
  

   //Subir Imagenes al servidor 
	//fileuploaded("documentos_adjuntos_FILE", "Url_Foto_Activo","../Archivos/Archivos-Mesa",true,false);

	$("#botonEnviar").click(function(e){
		var Agregar = true;
		var mensaje_error = "";
		var strDatos="";
		
		var Id_Solicitud=$.trim($("#Id_Solicitud").val());
		//Usuario Sesion
		var Id_Usuario=$("#usuariosesion").val();
		//Area de sesion
		//var Id_Area=$("#idareasesion").val();
		var Mensaje=$.trim($("#Mensaje").val());
		//var Estatus_Proceso = $("#hddEstatus_Proceso").val();
		
		var url_documentos_adjuntos_chat=$.trim($("#url_documentos_adjuntos_chat").val());
		
		if(url_documentos_adjuntos_chat.length==0){
			if (Mensaje.length <= 0) {
				Agregar = false; 
				mensaje_error += " -El mensaje no puede ser vacio<br />";
				$("#Mensaje").focus();
			}
		}
		
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		if(Agregar)
		{
			strDatos = "Id_Solicitud="+Id_Solicitud; 
			strDatos += "&Mensaje="+Mensaje;
			strDatos += "&Id_Usuario="+Id_Usuario;
			strDatos += "&Id_Estatus_Proceso=1";
			strDatos += "&Estatus_Reg=1";				
			strDatos += "&accion=guardar";
			//Archivos Adjuntos
			strDatos += "&Url_Adjunto="+url_documentos_adjuntos_chat;
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_ticket_chat/Siga_ticket_chatFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					$("#Mensaje").val('');
					mensajesalerta("&Eacute;xito", "Generado Correctamente.", "success", "dark");
					
					$("#botonEnviar").html("Enviar");
					$("#url_documentos_adjuntos_chat").val("");
					//$("#tabProceso").click();						
					//$('#myModal').modal('hide');
					//$('#display_seguimiento').DataTable().ajax.reload();
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
		
	
	
</script>