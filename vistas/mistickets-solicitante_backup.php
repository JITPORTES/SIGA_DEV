  <?php
	session_start();
	$Direccion_Ip_Sol="";
	$Direccion_Ip_Sol= $_SERVER["REMOTE_ADDR"];
	
	$Espacios="";
  ?>
  <input type="hidden" id="Direccion_Ip_Sol" value="<?php echo $Direccion_Ip_Sol;?>">
  <input type="hidden" id="No_Empleado_chat" >	
  <input type="hidden" id="Id_Solicitud">
	<input type="hidden" id="Id_Cirugia">
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- File Input -->
  <link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
  <link rel="stylesheet" href="../dist/css/jquery-confirm.min.css">
  <script src="../dist/js/jquery-confirm.min.js"></script>


      <div class="row">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs azulf" role="tablist">
          <li role="presentation" onclick="cargar_tablas();limpiarcampos();msjticketscerrar();" class="active"><a href="#nuevo" aria-controls="nuevo" role="tab" data-toggle="tab">Nuevo</a></li>
					<li role="presentation" onclick="cargar_tablas()" id="li_tab_sin_respuesta"><span class="label label-warning" id="notificacion_nuevos_t" style="display:none"></span><a id="tap_sin_respuesta" href="#sin_respuesta" aria-controls="sin_respuesta" id="tab_Sin_Respuesta" role="tab" data-toggle="tab">Sin respuesta aún</a></li>
          <li role="presentation" onclick="cargar_tablas()" id="li_tab_seguimiento"><span class="label label-success" id="notificacion_seguimiento_t" style="display:none"></span><a id="tab_seguimiento" href="#proceso" aria-controls="proceso" id="tabProceso" role="tab" data-toggle="tab">En Seguimiento</a></li>
					<li role="presentation" onclick="cargar_tablas()" id="li_tab_por_cerrar"><span class="label label-info" id="notificacion_porcerrar_t" style="display:none"></span><a id="tab_por_cerrar" href="#por_cerrar" aria-controls="por_cerrar" id="tabPorCerrar" role="tab" data-toggle="tab">Por Cerrar</a></li>
					<li role="presentation" onclick="cargar_tablas()" id="li_tab_cerrados"><a id="tab_cerrados" href="#historico" aria-controls="historico" role="tab" data-toggle="tab">Cerrados</a></li>
          <li class="export"><a href="#"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar</a></li>
        </ul>
      </div>
        
        
        
        
        
      <!-- Main row -->
      <div class="row">
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- nuevo -->
          <div role="tabpanel" class="tab-pane active" id="nuevo">
          <input type="hidden" id="hddArea" value="1">  
		  <input type="hidden" id="hddSeccion" value="">  	
		  <input type="hidden" id="hddEstatus_Proceso" value="">
              <!-- Centered Pills -->
         <div class="">
             <ul class="nav nav-pills nav-justified">
                 <div class="row">
                    <div class="col-md-12">
                      <li style="display:inline">
                         <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="info-box azul">
                                <!-- Button trigger modal -->
                                 <a data-toggle="tab" href="#biomedica" onclick="cambiaArea(1);carga_activos_vip('mis_activos');msjticketscerrar();">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-stethoscope"></i></span>
                                <div class="info-box-content">
                                <h3 class="info-box-text">Biomédica</h3>
                                </div>
                      <!-- /.info-box-content -->
                                </a>
                            </div>
                          </div>
                    </li>
                    <li class="active">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="info-box verde">
                                 <a data-toggle="tab" href="#tic" onclick="cambiaArea(2);carga_activos_vip('mis_activos');msjticketscerrar();">
                                <span class="info-box-icon bg-green"><i class="fa fa-laptop"></i></span>
                                <div class="info-box-content">
                                <h3 class="info-box-text">TIC</h3>
                                </div>
                                <!-- /.info-box-content -->
                                </a>
                            </div>
                      </div>
                    </li>
                     <li style="display:inline">
													<div class="col-md-3 col-sm-3 col-xs-12">
															<div class="info-box rojo">
																	<a data-toggle="tab" href="#juridico" onclick="cambiaArea(6);msjticketscerrar();">
																	<span class="info-box-icon bg-red"><i class="fa fa-gavel"></i></span>
																	<div class="info-box-content">
																	<h3 class="info-box-text">Jurídico</h3>
																	</div>
																	</a>
														</div>
													</div>
										 </li>
                     <li style="display:none" id="div_mantenimiento_solicitudes">
													<div class="col-md-3 col-sm-3 col-xs-12">
															<div class="info-box amarillo">
																	<a data-toggle="tab" href="#mantenimiento" onclick="cambiaArea(3);carga_activos_vip('mis_activos');msjticketscerrar();">
																	<span class="info-box-icon bg-orange"><i class="fa fa-wrench"></i></span>
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

						<div align="center" id="mensaje_cerrados"></div>
            <div class="tab-content">
                <div id="biomedica" class="tab-pane fade in active">
                  <form>
              <div class="col-md-12">
                <div class="box">
                  <div class="box-header azul with-border" id="headerArea">
                    <h3 class="box-title" id="h3Area">Solicitud de soporte Biomédica</h3>
					<input type="hidden" id="hidden_seleccion_activo">
                  </div>

                  <div class="box-body">
                    <div class="col-md-10 col-md-offset-1" id="divSeccion">
                      
                    </div>

                    <div class="col-md-10 col-md-offset-1">
                      <div class="col-md-12">
                        <div class="form-group">
						  <label class="control-label" style="font-size: 11px;">Titulo Reporte</label>	
                          <input type="text" id="desc_titulo" class="form-control" placeholder="Titulo Reporte">
                        </div>
                      </div>
                      <div class="col-md-6" style="display:none">
                        <div class="form-group">
                          <select class="form-control" id="cmb_categoria">
                            
                          </select>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
						  <label class="control-label" style="font-size: 11px;">Descripción Detallada de lo Reportado</label>
                          <textarea rows="4" id="Descripcion_ticket" class="form-control" placeholder="Descripción Detallada de lo Reportado(500 caracteres)"></textarea>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <ul class="inline">
                          <li>Prioridad</li>
                          <li>
                            <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <input type="radio" name="prioridad" id="Check_Alta"> Alta
                                </label>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <input type="radio" name="prioridad" id="Check_Media"> Media
                                </label>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="form-group">
                              <div class="checkbox">
                                <label>
                                  <input type="radio" name="prioridad" id="Check_Poca"> Baja
                                </label>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      
                      <div class="col-md-12">
                        <div class="form-group" id="Adjuntos_tickets">
                          <!--
						  <label for="documentos_adjuntos_FILE" class="control-label" id="documentos_adjuntos_FILELabel" style="font-size: 11px;">1.-Adjuntar Imagen</label>						  
                          <input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading">
						  <input type="hidden" id="Url_Foto_Activo">
						   -->
												</div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- mis activos -->
                <div class="box" id="solicitud_mis_activos">
                  <div class="box-header azul with-border" id="headerArea2">
                    <h3 class="box-title">Mis activos</h3>
                  </div>

                  <div class="box-body">
                    <div class="col-md-10 col-md-offset-1">
                      <div class="col-md-4">
                        <div class="form-group">
                          
						  <select id="select-activos" class="demo-default" placeholder="AF/BC" style="display:none">
							</select>
                        </div>
                      </div>
                      
					  
					  <div class="col-md-12" id="Seleccionar_Activos">
						<ul class="inline center">
							<li><strong>Activos: </strong></li>
							<li>
								<div class="form-group">
								<div class="checkbox icheck">
									<label>
									<input type="radio" name="Check_Mis_y_Todos_Activos"  id="Check_Mis_Activos" onchange="javascript:carga_activos_vip('mis_activos')" checked> Mis Activos
									</label>
								</div>
								</div>
							</li>
							<li>
								<div class="form-group">
								<div class="checkbox icheck">
									<label>
									<input type="radio" name="Check_Mis_y_Todos_Activos"  id="Check_Todos_Activos" onchange="javascript:carga_activos_vip('')"> Todos los Activos
									</label>
								</div>
								</div>
							</li>
						</ul>
					</div>

                      <div class="col-md-12">
                        <div class="table-responsive" id="div_tablaactivos">
                          <!--
						  <table id="tablaactivos" class="table table-bordered table-striped table-chs" width="100%">
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th>AF/BC</th>
                                <th>Foto</th>
                                <th>Descripción</th>
								<th>Elegir</th>
                              </tr>
                            </thead>
                          </table>
						  -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <div class="row">
                <div class="col-md-7 text-right" style="margin-top:15px;">
                <button type="button" id="solicitar" class="btn chs">Solicitar soporte</button>
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
                      
                  <table id="display_sin_respuesta" class="table table-bordered table-striped table-chs" width='100%'>
                    <thead>
                      <tr>
						  <th>Seguimiento</th>	
                          <!--<th><i class="fa fa-paperclip" aria-hidden="true"></i></th>-->
						  <th>Folio Solicitud</th>
						  <th>Solicitado</th>
						  <th>Estatus</th>
						  <th>Prioridad</th>
						  <th>Secci&oacute;n</th>
						  <th>Categoría</th>
						  <th>Subctegoría</th>
						  <th><?php echo $Espacios; ?>Titulo Reporte<?php echo $Espacios; ?></th>
                          <th><?php echo $Espacios; ?>Descripción Detalle de lo Reportado<?php echo $Espacios; ?></th>
						  <th>Area</th>
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
						  <th>Seguimiento</th>
						  <!--<th><i class="fa fa-paperclip" aria-hidden="true"></i></th>-->
                          <th>Folio Solicitud</th>
						  <th>En Seguimiento</th>
						  <th>Estatus</th>
						  <th>Gestor</th>
						  <th>Prioridad</th>
						  <th>Secci&oacute;n</th>
						  <th>Categoría</th>
						  <th>Subctegoría</th>
						  <th><?php echo $Espacios; ?>Titulo Reporte<?php echo $Espacios; ?></th>
                          <th><?php echo $Espacios; ?>Descripción&nbsp;Detalle de lo Reportado<?php echo $Espacios; ?></th>
						  <th>Area</th>
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
		
		  <div role="tabpanel" class="tab-pane" id="por_cerrar">
            <!-- table-results -->
            <div class="col-md-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                      
                  <table id="display_por_cerrar" class="table table-bordered table-striped table-chs" width="100%">
                    <thead>
                      <tr>
						  <th>Seguimiento</th>
						  <!--<th><i class="fa fa-paperclip" aria-hidden="true"></i></th>-->
                          <th>Folio Solicitud</th>
						  <th>Fecha Solicitud</th>
							<th>Fecha Seguimiento</th>
						  <th>Estatus</th>
						  <th>Gestor</th>
						  <th>Prioridad</th>
						  <th>Secci&oacute;n</th>
						  <th>Categoría</th>
						  <th>Subctegoría</th>
						  <th><?php echo $Espacios; ?>Titulo Reporte<?php echo $Espacios; ?></th>
                          <th><?php echo $Espacios; ?>Descripción&nbsp;Detalle de lo Reportado<?php echo $Espacios; ?></th>
						  <th>Area</th>
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
									<div class="table-responsive" align="center">
										<ul class="inline center">
											
											<li>
												<div class="form-group">
													<div class="checkbox icheck">
														<label>
														<input type="radio" value="5" onchange="javascript:todos_tickets()" id="tickets_actuales" name="radio_tickets"><strong>Tickets Actuales a 3 Meses</strong></label>
													</div>
												</div>
											</li>
											<li>
												<div class="form-group">
													<div class="checkbox icheck">
														<label>
														<input type="radio" value="4" onchange="javascript:todos_tickets()" id="todos_tickets" name="radio_tickets"><strong>Todos los Tickets</strong></label>
													</div>
												</div>
											</li>
										</ul>
									</div>
									<br>
                  <div class="table-responsive">
                     
                  <table id="tablacerrado" class="table table-bordered table-striped table-chs" width="100%">
                    <thead>
                      <tr>
					      <th>Seguimiento</th>
                          <th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
						  <th>Folio Solicitud</th>
						  <th>Cerrado</th>
						  <th>Estatus</th>
						  <th>Gestor</th>
						  <th>Prioridad</th>
						  <th>Secci&oacute;n</th>
						  <th>Categoría</th>
						  <th>Subctegoría</th>
						  <th><?php echo $Espacios; ?>Titulo Reporte<?php echo $Espacios; ?></th>
                          <th><?php echo $Espacios; ?>Descripción&nbsp;Detalle de lo Reportado<?php echo $Espacios; ?></th>
						  <th>Acciones Realizadas</th>
						  <th>Area</th>
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

		
		
		
		
		<div class="modal fade modalchs" data-backdrop="false" id="info_juridico">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header azuldef">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Ayuda Jurídico</h4>
					</div>
					<div class="modal-body nopsides">
						<div class="col-md-12">
							» Al entrar a SIGA como solicitante, selecciona el área de Jurídico donde existen las secciones: Asesoría y Gestión.
							<br><br>
							» Se podrán realizar diversos tipos de solicitudes, tanto de Asesoría como de Gestión y en cada una de ellas existe una breve orientación de las actividades que se incluyen, esto sucede cuando se coloca el puntero del mouse sobre la letra <span style="font-size:20px"><strong>“i”</strong></span>.   Ahora bien, para solicitudes de Alta de proveedores (para el cual existe un módulo), se personaliza la notificación que envía el sistema SIGA para que el Solicitante de click en el enlace para que llene la solicitud de alta y la pase a firmas para autorización.
							<br><br>
							» Cuando ya fue generada una solicitud, El gestor toma el ticket y lo tipifica según aplique. Tambien puede dividir el ticket con otro gestor en caso de ser necesario.
							<br><br>
							» La notificación del ticket tipificado se envía al solicitante e incluye hipervínculo <a href="http://lms.hospitalsatelite.com:8080/lms/cursos_sin_autenticacion.php?Curso=471&key=566"  target="_blank" style="font-size:18px;">al video tutorial</a>.
							<br><br>	
							» Por cada seguimiento del ticket en la sección de chat, se envía notificación por correo electrónico al solicitante y al gestor.
							<br><br>
							» En específico cuando se solicita un Alta de Proveedor, una vez que el área de Jurídico tiene el veredicto del dictamen, el gestor sube el documento firmado al chat de seguimiento, avisa al solicitante y solicitar el alta del proveedor a Tesorería en el módulo de CxP en el sistema ASSIST.
							<br><br>
							» Para el cierre del ticket esta personalizado los combo boxes de Motivo Aparente, Motivo Real de lo encontrado, Estatus Final y Comentarios del Cierre.
							<br><br>
							» Los SLAs están definidos por el área de Jurídico y personalizados en base a cada proceso / subcategoría.
							<br><br>
						</div>
					</div>
        </div>
      </div>
    </div>

    <!-- modal -->
    <div class="modal fade modalchs" data-backdrop="false" id="seguimientoReporte">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Mis tickets</h4>
          </div>
          <div class="modal-body nopsides">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs azuldef" role="tablist">
              <li role="presentation" class="active" onclick="cargachat()"><a href="#chat" aria-controls="chat" role="tab" data-toggle="tab" id="tabChat">Chat Seguimiento</a></li>
              <li role="presentation"><a id="tab_adjuntos" href="#adjuntos" aria-controls="adjuntos" role="tab" data-toggle="tab">Adjuntos</a></li>
			  <li role="presentation" style="display:none" id="li_actividades"><a id="tab_ver_actividades" href="#actividades" aria-controls="actividades" role="tab" data-toggle="tab">Ver Actividades</a></li>
              <li role="presentation"><a id="tab_cerrar" href="#finalizar" aria-controls="finalizar" role="tab" data-toggle="tab">Calificar Atención</a></li>
            </ul>

            <div class="tab-content tab-contenedor">
              <div role="tabpanel" class="tab-pane active" id="chat">
               <div class="col-md-10 col-md-offset-1">
                 <div class="col-md-5">
                   <ul class="heads">
                     <li><span>No. Solicitud de ayuda</span> <span style="color: #666;font-weight: normal;" id="spanNumsolicitud1"></span></li>
                     <li id="liSolicitudAnterior1"><span>No. Solicitud Anterior</span> <span style="color: #666;font-weight: normal;" id="spanNumsolicitudAnterior1"></span></li>
					 <li><span>Status</span> <span style="color: #666;font-weight: normal;" id="spanStatus1"></span></li>
					 <li><span>Lo Realiza</span> <span style="color: #666;font-weight: normal;" id="spanLo_Realiza1"></span></li>
					 <li><span>Activo</span> <span style="color: #666;font-weight: normal;" id="spanActivo1"></span></li>
					 <li><span>Marca</span> <span style="color: #666;font-weight: normal;" id="spanMarca1"></span></li>
					 <li><span>Modelo</span> <span style="color: #666;font-weight: normal;" id="spanModelo1"></span></li>
					 <li><span>No. Serie</span> <span style="color: #666;font-weight: normal;" id="spanNo_Serie1"></span></li>
					 <li><span>Ubic. Prim.</span> <span style="color: #666;font-weight: normal;" id="spanUbic_Prim1"></span></li>
					 <li><span>Ubic. Sec.</span> <span style="color: #666;font-weight: normal;" id="spanUbic_Sec1"></span></li>
                     <li><span>Área</span> <span style="color: #666;font-weight: normal;" id="spanArea1"></span></li>
                     <li><span>Prioridad</span> <span style="color: #666;font-weight: normal;" id="spanPrioridad1"></span></li>
                     <li id="liMedio1"><span>Medio</span> <span style="color: #666;font-weight: normal;" id="spanMedio1"></span></li>
					 <li><span>Sección</span> <span style="color: #666;font-weight: normal;" id="spanSeccion1"></span></li>
                     <li><span>Categoria</span> <span style="color: #666;font-weight: normal;" id="spanCategoria1"></span></li>
                     <li><span>Subcategoria</span> <span style="color: #666;font-weight: normal;" id="spanSubcategoria1"></span></li>
                     <li><span>Motivo de reporte</span> <span style="color: #666;font-weight: normal;" id="spanMotivo1"></span></li>
                     <li><span>Usuario</span> <span style="color: #666;font-weight: normal;" id="spanSolicitud1"></span></li>
                     <li><span>Horario de atención</span> </li>
                     <li><span>Gestor</span> <span style="color: #666;font-weight: normal;" id="spanFech_Solicitud1"></span></li>
										 <li><span>Fecha Solicitud</span> <span style="color: #666;font-weight: normal;" id="spanFech_Solicitud1"></span></li>
                   </ul>
                 </div>
                 <div class="col-md-7">
                  <div class="col-md-12">
                    <!-- DIRECT CHAT -->
                    <div class="box" id="div_box_chat">
                      <div class="box-header azul">
                        <h3 class="box-title" id="title_chat"></h3>

                        <div class="box-tools pull-right">
                          <span data-toggle="tooltip" title="3 New Messages" class="badge bg-blue">3</span>
                          <button type="button" class="btn btn-box-tool"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages" id="divChat">

                          <!-- /.direct-chat-msg -->

                          
                          
                          <!-- /.direct-chat-msg -->

                        </div>
                        <!--/.direct-chat-messages-->

                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                          <div class="input-group">
                            <input type="text" name="message" placeholder="Escribe tu mensaje ..." id="Mensaje" class="form-control" maxlength="1000">
                            <span class="input-group-btn">
                              <button type="button" data-toggle="modal" data-target="#Modal_Adjuntos_Imagenes" class="btn chs btn-flat" onclick="imagenes_chat()" ><i class="fa fa-paperclip" aria-hidden="true"></i></button>
                              <button type="button" id="botonEnviar" class="btn chs btn-flat">Enviar</button>	
							</span>
                          </div>
                      </div>
                      <div align="center" id="format_solicitud_prov">
												
											</div>
											<!-- /.box-footer-->
										</div>
                    <!--/.direct-chat -->
                  </div>
                  <!-- /.col -->
                 </div>
               </div>
              </div>

              <div role="tabpanel" class="tab-pane" id="adjuntos">
                <div class="col-md-3">

                  <ul class="nav nav-pills nav-stacked file-browser">
                    <li class="active"><a href="#tab_a" data-toggle="pill">Docs</a></li>
                    <li><a href="#tab_b" data-toggle="pill">Imagenes</a></li>
                  </ul>

                </div><!-- col-md-4 -->

                <div class="col-md-8 file-browser-container">
                  <div class="tab-content">
                    <div class="tab-pane active" id="tab_a">
                      <ul id="div_adjuntos_chat_archivos">
                      </ul>
                    </div>
                    <div class="tab-pane" id="tab_b">
                      <ul id="div_adjuntos_chat_imagenes">
					  </ul>
                    </div>
                   
                  </div><!-- tab content -->
                </div>
              </div>
				
			  <!--Actividades Ticket-->
			<div role="tabpanel" class="tab-pane" id="actividades">
				<input type="hidden" id="Id_Actividad">
			    <div class="row">
              <div class="col-md-12 ">
				
                <div class="col-md-12">
				  <div class="table-responsive">
                    <div id="datos_actividades"></div>
					<table class="table table-striped table-bordered" id="lista_actividades" width="100%">
                      <thead>
                        <tr>	
                          <td align="center">No.</td>
                          <td align="center">Actividades</td>
                          <td align="center">Valor Referencia</td>
                          <td align="center">Valor medido</td>
                          <td align="center">Ok</td>
                          <td align="center">Fallo</td>
                          <td align="center">No aplica</td>
						  <td align="center">V. Mesa de Ayuda</td>
                          <td align="center">Observaciones</td>
                          <td align="center">Adjuntos</td>
						  <td align="center">Fecha Programada</td>
                          <td align="center">Fecha Realizado</td>
                        </tr>
                      </thead>
					  <tbody id="Muestro_Agregados">
						
					  </tbody>
					</table>
					
					<div class="row">
					  <div class="col-md-10 col-md-offset-1">
						<div class="col-md-12">
						  <div class="table-responsive">
							<table class="table table-striped table-bordered" width="100%">
							  <thead>
								<tr>
								  <td>No.</td>
								  <td>Mantenimiento (Refacciones/Accesorios/Consumibles)</td>
								  <td>Conceptos</td>
								  <td>Costo extra</td>
								  <td>Costo interno</td>
								</tr>
							  </thead>
							  <tr>
								<td>1
								</td>
								<td>
								<div class="form-group">
									<textarea rows="1" class="form-control" placeholder="(200 caracteres)" id="Mant_RAC1" disabled></textarea>
								  </div>
								</td>
								  <td class="text-right"><strong>Costos Materiales</strong>
								</td>

								<td>
								  <div class="form-group">
									<input type="text" class="form-control" placeholder="$" id="Costos_Materiales_CE" disabled>
								  </div>
								</td>
								<td>
								  <div class="form-group">
									<input type="text" class="form-control" placeholder="$" id="Costos_Materiales_CI" disabled>
								  </div>
								</td>

							  </tr>
							  <tr>
								<td>2
								</td>
								<td>
								<div class="form-group">
									<textarea rows="1" class="form-control" placeholder="(200 caracteres)" id="Mant_RAC2" disabled></textarea>
								  </div>
								</td>
								<td class="text-right"><strong>Mano de obra</strong>
								</td>

								<td>
								  <div class="form-group">
									<input type="text" class="form-control" placeholder="$" id="Mano_Obra_CE" disabled>
								  </div>
								</td>
								<td>
								  <div class="form-group">
									<input type="text" class="form-control" placeholder="$" id="Mano_Obra_CI" disabled>
								  </div>
								</td>
							  </tr>
							  <tr>
								<td>3
								</td>
								<td>
								<div class="form-group">
									<textarea rows="1" class="form-control" placeholder="(200 caracteres)" id="Mant_RAC3" disabled></textarea>
								  </div>
								</td>
								<td class="text-right"><strong>Total</strong>
								</td>

								<td>
								  <div class="form-group">
									<input type="text" class="form-control" placeholder="$" id="Total_CE" disabled>
								  </div>
								</td>
								<td>
								  <div class="form-group">
									<input type="text" class="form-control" placeholder="$" id="Total_CI" disabled>
								  </div>
								</td>
							  </tr>
							  <tr>
								<td>4
								</td>
								<td>
								<div class="form-group">
									<textarea rows="1" class="form-control" placeholder="(200 caracteres)" id="Mant_RAC4" disabled></textarea>
								  </div>
								</td>
								<td >
								  <div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Hrs</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" placeholder="" id="Horas" disabled>
									</div>
								</div>
								</td>
							  
								  <td colspan="2">
								  <div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Ahorro</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" placeholder="" id="Ahorro" disabled>
									</div>
								</div>
								  </td>
							
							  </tr>
							</table>
							
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
			<!--Fin-->	
				
              <div role="tabpanel" class="tab-pane" id="finalizar">
                <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="col-md-6">
                     <ul class="heads">
                    <li><span>No. Solicitud de ayuda</span> <span style="color: #666;font-weight: normal;" id="spanNumsolicitud2"></span></li>
                     <li id="liSolicitudAnterior2"><span>No. Solicitud Anterior</span> <span style="color: #666;font-weight: normal;" id="spanNumsolicitudAnterior2"></span></li>
					 
					 <li><span>Status</span> <span style="color: #666;font-weight: normal;" id="spanStatus2"></span></li>
					 <li><span>Lo Realiza</span> <span style="color: #666;font-weight: normal;" id="spanLo_Realiza2"></span></li>
					 <li><span>Activo</span> <span style="color: #666;font-weight: normal;" id="spanActivo2"></span></li>
					 <li><span>Marca</span> <span style="color: #666;font-weight: normal;" id="spanMarca2"></span></li>
					 <li><span>Modelo</span> <span style="color: #666;font-weight: normal;" id="spanModelo2"></span></li>
					 <li><span>No. Serie</span> <span style="color: #666;font-weight: normal;" id="spanNo_Serie2"></span></li>
					 <li><span>Ubic. Prim.</span> <span style="color: #666;font-weight: normal;" id="spanUbic_Prim2"></span></li>
					 <li><span>Ubic. Sec.</span> <span style="color: #666;font-weight: normal;" id="spanUbic_Sec2"></span></li>
                     <li><span>Área</span> <span style="color: #666;font-weight: normal;" id="spanArea2"></span></li>
                     <li><span>Prioridad</span> <span style="color: #666;font-weight: normal;" id="spanPrioridad2"></span></li>
					 <li id="liMedio2"><span>Medio</span> <span style="color: #666;font-weight: normal;" id="spanMedio2"></span></li>
                     <li><span>Sección</span> <span style="color: #666;font-weight: normal;" id="spanSeccion2"></span></li>
                     <li><span>Categoria</span> <span style="color: #666;font-weight: normal;" id="spanCategoria2"></span></li>
                     <li><span>Subcategoria</span> <span style="color: #666;font-weight: normal;" id="spanSubcategoria2"></span></li>
                     <li><span>Motivo de reporte</span> <span style="color: #666;font-weight: normal;" id="spanMotivo2"></span></li>
                     <li><span>Usuario</span> <span style="color: #666;font-weight: normal;" id="spanSolicitud2"></span></li>
                     <li><span>Horario de atención</span> </li>
                     <li><span>Gestor</span> <span style="color: #666;font-weight: normal;" id="spanGestor2"></span></li>
										 <li><span>Fecha Solicitud</span> <span style="color: #666;font-weight: normal;" id="spanFech_Solicitud2"></span></li>
                    </ul>
                  </div>
                  
				  <div class="col-md-6">
                    <div class="row">
                      <p class="question"><strong>Motivo Aparente (Reportado): </strong><font id="Desc_Motivo_Aparente"></font></p>
					  <p class="question"><strong>Motivo Real Encontrado: </strong><font id="Desc_Motivo_Real"></font></p>
					  <p class="question"><strong>Estatus Final del Equipo: </strong><font id="Desc_Est_Equipo"></font></p>
					  <p class="question"><strong>Descripción de Acciones Realizadas: </strong> <font id="Desc_Cierre"></font></p>
					</div>
				  </div>	
				  <div class="col-md-6">
                    <div class="row">
					  <form class="faces">
                        <p class="question">Solución Ofrecida</p>
                        <input type="radio" id="faces-1-1" id="p15" onclick="javascript:guardaRespuestaP1(5);" name="faces-1-set" class="faces-radio cinco">
                        <label for="faces-1-1"></label>
                        <input type="radio" id="faces-1-2" id="p14" onclick="javascript:guardaRespuestaP1(4);" name="faces-1-set" class="faces-radio cuatro">
                        <label for="faces-1-2"></label>
                        <input type="radio" id="faces-1-3" id="p13" onclick="javascript:guardaRespuestaP1(3);" name="faces-1-set" class="faces-radio tres">
                        <label for="faces-1-3"></label>
                        <input type="radio" id="faces-1-4" id="p12" onclick="javascript:guardaRespuestaP1(2);" name="faces-1-set" class="faces-radio dos">
                        <label for="faces-1-4"></label>
                        <input type="radio" id="faces-1-5" id="p11" onclick="javascript:guardaRespuestaP1(1);" name="faces-1-set" class="faces-radio uno" checked>
                        <label for="faces-1-5"></label>
						<input type="hidden" id="hddP1" value="">
                      </form>
                      <div class="form-group">
                        <textarea rows="2" class="form-control" id="Solucion" placeholder="Comentarios..."></textarea>
                      </div>
                    </div>

                    <div class="row">
                      <form class="faces">
                        <p class="question">Actitud de Servicio</p>
                        <input type="radio" id="faces-2-1" id="p25" onclick="javascript:guardaRespuestaP2(5);" name="faces-1-set" class="faces-radio cinco">
                        <label for="faces-2-1"></label>
                        <input type="radio" id="faces-2-2" id="p24" onclick="javascript:guardaRespuestaP2(4);" name="faces-1-set" class="faces-radio cuatro">
                        <label for="faces-2-2"></label>
                        <input type="radio" id="faces-2-3" id="p23" onclick="javascript:guardaRespuestaP2(3);" name="faces-1-set" class="faces-radio tres">
                        <label for="faces-2-3"></label>
                        <input type="radio" id="faces-2-4" id="p22" onclick="javascript:guardaRespuestaP2(2);" name="faces-1-set" class="faces-radio dos">
                        <label for="faces-2-4"></label>
                        <input type="radio" id="faces-2-5" id="p21" onclick="javascript:guardaRespuestaP2(1);" name="faces-1-set" class="faces-radio uno">
                        <label for="faces-2-5"></label>
						<input type="hidden" id="hddP2" value="">
					  </form>
                      <div class="form-group">
                        <textarea rows="2" class="form-control"  id="Actitud" placeholder="Comentarios..."></textarea>
                      </div>
                    </div>

                    <div class="row">
                      <form class="faces">
                        <p class="question">Tiempo de respuesta</p>
						<input type="radio" id="faces-3-1" id="p35" onclick="javascript:guardaRespuestaP3(5);" name="faces-1-set" class="faces-radio cinco" checked >
                        <label for="faces-3-1"></label>
                        <input type="radio" id="faces-3-2" id="p34" onclick="javascript:guardaRespuestaP3(4);" name="faces-1-set" class="faces-radio cuatro">
                        <label for="faces-3-2"></label>
                        <input type="radio" id="faces-3-3" id="p33" onclick="javascript:guardaRespuestaP3(3);" name="faces-1-set" class="faces-radio tres">
                        <label for="faces-3-3"></label>
                        <input type="radio" id="faces-3-4" id="p32" onclick="javascript:guardaRespuestaP3(2);" name="faces-1-set" class="faces-radio dos">
                        <label for="faces-3-4"></label>
                        <input type="radio" id="faces-3-5" id="p31" onclick="javascript:guardaRespuestaP3(1);" name="faces-1-set" class="faces-radio uno" checked>
                        <label for="faces-3-5"></label>
						<input type="hidden" id="hddP3" value="">
					  </form>
                      <div class="form-group">
                        <textarea rows="2" class="form-control"  id="TiempoRespuesta" placeholder="Comentarios..."></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
               <div class="modal-footer">
                  <button type="button" id="botonEnviarCalificacion" class="btn chs">Enviar calificación</button>
				  <button type="button" onclick='$("#tabChat").click()' id="botonNoSolucionado" class="btn chs">No Solucionado</button>
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



<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>

  <!-- File Input -->
  <link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
  <script src="../plugins/docsupport/standalone/selectize.js"></script>
  <script src="../plugins/docsupport/index.js"></script>

<script>
	var archivos_adjuntos="";
	var imagenes_adjuntos="";
	var cont_ticket_biomedica=0;
	var cont_ticket_tic=0;
	var cont_ticket_mantenimiento=0;
	var cont_ticket_mob_equi=0;
	var cont_ticket_juridico=0;
	
	
	var array_img=["PNG", "JPG", "BMP", "GIF"];
	var array_arch=["PDF", "DOCX", "DOC", "XLS","XLSX", "PPT","PPTX"];
	function imagenes_chat(){
		$("#url_documentos_adjuntos_chat").val("");
		$("#adjunto_imagenes").html('<input name="imagenes[]" type="file" multiple="multiple" class="file-loading" id="upload_adjuntos_chat">');
		carga_arch_mesa("upload_adjuntos_chat", "url_documentos_adjuntos_chat","../Archivos/Archivos-Chat/",true,false);
	}


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

  $(".upload-files").fileinput({
    browseClass: "btn chs",
    language: 'es',
    allowedFileExtensions : ['jpg','png'],
  });

  $(".upload-simple").fileinput({
    browseClass: "btn chs",
    language: 'es',
  });
  /*	
  $(function () {
    $('.icheck input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      increaseArea: '20%' // optional
    });
  });
  */
   function guardaRespuestaP1(valor)
   {
	  $("#hddP1").val(valor);
   }
   
   function guardaRespuestaP2(valor)
   {
	  $("#hddP2").val(valor);
   }
   
   function guardaRespuestaP3(valor)
   {
	  $("#hddP3").val(valor);
   }
  
   function carga_tabla_activos(Id_Area){
		
		var table = $('#tablaactivos').DataTable();
		table.destroy();
		$('#tablaactivos').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": { 
				"url": "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				"type": "POST",
				"data": {
					orden:'AF_BC',
					Num_Empleado: $("#nousuariosesion").val(),
					Id_Area:Id_Area
				}
			},
			"columns": [
				{ "data": "AF_BC", "visible": false},
				{ "data": "AF_BC"},
				{
					"data": function (obj) {
						var foto = '';
						if ($.trim(obj.Foto) != '')
						foto += '<img src="../Archivos/Archivos-Activos/' + obj.Foto + '">';
						return foto;
					}
				},
				{ "data": "Nombre_Activo"},
				{
					"data": function (obj) {
						var edicion = '';
						edicion += '<div align="center"><input type="radio" name="radio_activos" onclick="selec_activo_radio(\'radio'+obj.Id_Activo+'\',\''+obj.Id_Activo+'\')" id="radio'+obj.Id_Activo+'"></div>';
						return edicion;
					}
				}
				
			], "language": {
				"lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
				"zeroRecords": "Sin Resultados",
				"info": "Monstrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
				"infoEmpty": "Sin Resultados",
				"infoFiltered": "(Mostrando  _MAX_ del total de registros)",
				"search": "Busqueda: ",
				"paginate": {
					"first": "Primera",
					"last": "Ultima",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			}
		});
	
	
	}
	
	
   function carga_activos_vip(activos){
		var num_empleado="";
		
		if(activos=="mis_activos"){
			num_empleado=$("#nousuariosesion").val();
		}
		
		if(num_empleado!=0||activos!="mis_activos"){
		
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",     
				async: false,
				data: {
					Num_Empleado: num_empleado,
					Estatus_Reg:"1",
					Id_Area:$("#hddArea").val(),
					soloactivos:"1",
					accion: "Tabla_Activos_Asis_Esp"
				},
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (data) {
					data = eval("(" + data + ")");
					
					if (data.totalCount > 0) {
						$("#div_tablaactivos").html("");
						var tabla="";
						tabla+='<table id="tablaactivos" class="table table-bordered table-striped table-chs">';
						tabla+='	<thead>';
						tabla+='	<tr>';
						tabla+='		<th>AF/BC</th>';
						tabla+='		<th>Responsable Activo</th>';
						tabla+='		<th>Nombre Activo</th>';
						tabla+='		<th>Marca</th>';
						tabla+='		<th>Modelo</th>';
						tabla+='		<th>No. Serie</th>';
						tabla+='		<th>Ubic. Primaria</th>';
						tabla+='		<th>Ubic. Secundaria</th>';
						tabla+='		<th>Elegir</th>';
						tabla+='	</tr>';
						tabla+='	</thead>'; 
						tabla+='	<tbody>';
						for(var i=0;i<data.totalCount; i++)
						{
							tabla+='<tr>';
							tabla+=' <td class=" ">'+data.data[i].AF_BC+'</td>';
							tabla+=' <td class=" ">'+data.data[i].Nombre_Responsable+'</td>';
							tabla+=' <td class=" ">'+data.data[i].Nombre_Activo+'</td>';
							tabla+=' <td class=" ">'+data.data[i].Marca+'</td>';
							tabla+=' <td class=" ">'+data.data[i].Modelo+'</td>';
							tabla+=' <td class=" ">'+data.data[i].NumSerie+'</td>';
							tabla+=' <td class=" ">'+data.data[i].Desc_Ubic_Prim+'</td>';
							tabla+=' <td class=" ">'+data.data[i].Desc_Ubic_Sec+'</td>';
							tabla+=' <td class=" "><div align="center"><input type="radio" name="radio_activos" onclick="selec_activo_radio(\'radio'+data.data[i].Id_Activo+'\',\''+data.data[i].Id_Activo+'\')" id="radio'+data.data[i].Id_Activo+'"></div></td>';
							tabla+='</tr>';
						}
						tabla+='	</tbody>'; 
						tabla+='</table>';	
						
						$("#div_tablaactivos").html(tabla);
						
						$('#tablaactivos').DataTable({
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
					}else{
						$("#div_tablaactivos").html("<label>No se Encontraron Activos</label>");
						
					}
					
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}else{
			$("#div_tablaactivos").html("<label>No se Encontraron Activos</label>");
		}
	}
		
	
	
   $(document).ready(function(){
		
		
		
		//Carga combobox tipo valde de resguardo
		cambiaArea(2);
		var tab_activex=0;
		var cont_recarga_dat_tabl=0;
		var estatus_tickets="";
		
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
			var Seccion="";
			var Titulo=$.trim($("#desc_titulo").val());
			//var Id_Categoria=$("#cmb_categoria").val();
			var Desc_Categoria=$.trim($("#Descripcion_ticket").val());
			var Prioridad="";
			var Url_archivo="";
			var Foto=$.trim($("#Url_Foto_Activo").val());
			//////////
			var Id_Solicitud_Correo="";
			 
			Seccion=$("#hddSeccion").val();
			
			
			
			
			
			if(cont_ticket_biomedica>0&&Id_Area==1){
				Agregar = false;
				mensaje_error += " -Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.<br />";
				$("#mensaje_cerrados").html("<h3><font color='red'>Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.</font></h3>");
			}else{
				if(cont_ticket_tic>0&&Id_Area==2){
						Agregar = false;
						mensaje_error += " -Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.<br />";
						$("#mensaje_cerrados").html("<h3><font color='red'>Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.</font></h3>");
				}else{
					if(cont_ticket_mantenimiento>0&&Id_Area==3){
							Agregar = false;
							mensaje_error += " -Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.<br />";
							$("#mensaje_cerrados").html("<h3><font color='red'>Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.</font></h3>");
					}else{
						if(cont_ticket_mob_equi>0&&Id_Area==4){
								Agregar = false;
								mensaje_error += " -Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.<br />";
								$("#mensaje_cerrados").html("<h3><font color='red'>Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.</font></h3>");
						}else{
							if(cont_ticket_juridico>0&&Id_Area==6){
									Agregar = false;
									mensaje_error += " -Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.<br />";
									$("#mensaje_cerrados").html("<h3><font color='red'>Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.</font></h3>");
							}else{
								$("#mensaje_cerrados").html("");
								$("#desc_titulo").prop( "disabled", false );
								$("#Descripcion_ticket").prop( "disabled", false );
								$("#solicitar").prop( "disabled", false );
							
								if (Id_Area.length <= 0) {
									Agregar = false; 
									mensaje_error += " -Falta elegir el área (Biomedica, TIC, etc)<br />";
									
								}
								
								if (Seccion.length <= 0) {
									Agregar = false; 
									mensaje_error += " -Falta elegir la sección<br />";
									$("#desc_titulo").focus();
								}
								
								if (Titulo.length <= 0) {
									Agregar = false; 
									mensaje_error += " -Falta agregar el T&iacute;tulo<br />";
									$("#desc_titulo").focus();
								}
								
								//if (Id_Categoria == "-1") {
								//	Agregar = false; 
								//	mensaje_error += " -Falta agregar el Motivo del Reporte<br />";
								//	$("#cmb_categoria").focus();
								//}
								
								if (Desc_Categoria.length <= 0) {
									Agregar = false; 
									mensaje_error += " -Falta agregar la descripci&oacute;n del Ticket<br />";
									$("#Descripcion_ticket").focus();
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
								
								if (Prioridad.length <= 0) {
									Agregar = false; 
									mensaje_error += " -Selecciona la Prioridad<br />";
								}
								/////////
							}
						}
					}
				}
			}
			
			
			
			
			
			
			
			if (!Agregar) {
				mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
			}
			
			if(Agregar)
			{
				strDatos = "Id_Usuario="+Id_Usuario; 
				strDatos += "&Id_Area="+Id_Area;
				strDatos += "&Id_Activo="+Id_Activo;
							//Medio= 5 (Web)
				strDatos += "&Id_Medio=5";
				strDatos += "&Seccion="+Seccion;
				strDatos += "&Titulo="+Titulo;
				strDatos += "&Estatus_Proceso=1";
				//strDatos += "&Id_Categoria="+Id_Categoria;
				strDatos += "&Desc_Motivo_Reporte="+Desc_Categoria;
				strDatos += "&Prioridad="+Prioridad;
				//strDatos += "&Url_archivo="+Url_archivo;
				strDatos += "&Url_archivo="+Foto;
				strDatos += "&Direccion_Ip_Sol="+$("#Direccion_Ip_Sol").val();
				if(Id_Solicitud.length <= 0){
					strDatos += "&Usr_Inser="+Id_Usuario;
					strDatos += "&Estatus_Reg=1";				
					strDatos += "&accion=guardar";
				}else{
					strDatos += "&Id_Solicitud="+Id_Solicitud;
					strDatos += "&Usr_Mod="+Id_Usuario;
					strDatos += "&Estatus_Reg=2";				
					strDatos += "&accion=guardar";
				}
				
				$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
					async: false,
					data: strDatos,
					dataType: "html",
					beforeSend: function (xhr) {
						$("#solicitar").hide();
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
						$('#display_por_cerrar').DataTable().ajax.reload();
						Id_Solicitud_Correo=json.data[0].Id_Solicitud;
						$("#tap_sin_respuesta").click();
						limpiarcampos();
						$("#solicitar").show();
					},
					error: function () {
						$("#solicitar").show();
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
				}
				*/
			}
		});
		
		//Tabla Sin Respuesta
		$('#display_sin_respuesta').DataTable({
			"ordering": false,
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
				"type": "POST",
				"dataSrc": function ( json ) {
					if(json.recordsTotal>0){
						$("#notificacion_nuevos_t").show();
						$("#notificacion_nuevos_t").html(json.recordsTotal);
					}else{
						$("#notificacion_nuevos_t").hide();
					}
					return json.data;
				},
				"data": {
					orden:'AF_BC',
					Id_Usuario:$("#usuariosesion").val(),
					//Id_Area:$("#idareasesion").val(),
					Estatus_Proceso:'1'
				}
			},
			"columns": [
				{ "width": "5%", "data": function (obj) {
						var seguimiento = '';
						seguimiento += '<a href="#" data-toggle="modal" data-target="#seguimientoReporte" onclick="pasarvalores('+obj.Id_Solicitud+',1)"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>';
						return seguimiento;
					}
				},
				{ "width": "5%", "data": "Id_Solicitud"},
				{ "width": "6%", "data": "Fecha"},
				{ "width": "6%", "data": function (obj) {
						
					
						var Estatus = '';
						
						if(obj.Asist_Especial=="1"){
							Estatus += 'Enviado ('+obj.A_Especial+')';
							Estatus="<font color='green' >"+Estatus+"</span>"; 
						}else{
							Estatus += obj.Estatus_Proceso;
						}
						return Estatus;
					}
				},
				{ "width": "5%","data": "Desc_Prioridad"},
				{ "width": "5%", "data": "Nombre_Seccion"},
				{ "width": "10%", "data": "Desc_Categoria"},
			    { "width": "10%", "data": "Desc_Subcategoria"},
				{ "width": "15%", "data": function (obj) {
						var Desc = '';
						Desc=obj.Titulo;
						
						return Desc;
					}
				},
				{ "width": "15%", "data": function (obj) {
						var Desc = '';
						if(obj.Id_Actividad!=""){
							Desc='<a href="#noir" id="Ver_Act'+obj.Id_Solicitud+'" onclick="ver_actividades('+obj.Id_Solicitud+')">Ver Actividades</a><a href="#noir" id="Ocult_Act'+obj.Id_Solicitud+'" onclick="ocult_actividades('+obj.Id_Solicitud+')" style="display:none">Ocultar Actividades</a><div id="Desc_Motiv_Repor'+obj.Id_Solicitud+'" style="display:none">'+obj.Desc_Motivo_Reporte+"</div>";
						}else{
							Desc=obj.Desc_Motivo_Reporte;
						}
						
						if(obj.Asist_Especial=="1"){
							if(obj.Gestor!=null){
								Desc+="<br><font color='green' >[Gestor Reasignado: "+obj.Gestor+"]</font>"; 
							}
						}
						
						if(obj.Id_Gestor_Reasignado!=null){
							Desc+="<br><font color='green' >[Reasignado: "+obj.Nom_usr_reasignado+"]</font>"; 
						}
						return Desc;
					}
				
				},
				{ "width": "10%", "data": "Nom_Area"},
				
				
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
			"ordering": false,
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
				"type": "POST",
				"data": {
					orden:'AF_BC',
					Id_Usuario:$("#usuariosesion").val(),
					//Id_Area:$("#idareasesion").val(),
					Estatus_Proceso:'2'
				},
				"dataSrc": function ( json ) {					
   					//cont_ticket_tic=0;
					if(json.recordsTotal>0){
						$("#notificacion_seguimiento_t").show();
						$("#notificacion_seguimiento_t").html(json.recordsTotal);
						
						//for(var i=0; i<json.recordsTotal;i++){
						//	if(json.data[i].Id_Estatus_Proceso==3){
						//		cont_ticket_tic=cont_ticket_tic+1;
						//	}
						//}
					}else{
						$("#notificacion_seguimiento_t").hide();
					}
					return json.data;
   				}
				
			},
			"columns": [
				{ "width": "5%","data": function (obj) {
						var seguimiento = '';
						
						if(obj.Id_Estatus_Proceso==2){
							seguimiento = '<a href="#" data-toggle="modal" data-target="#seguimientoReporte" onclick="pasarvalores('+obj.Id_Solicitud+', 2)" data-toggle="tooltip" title="Chat"> <strong>Contestar </strong></a>';
						}
						
						return seguimiento;
					}
				},
				{ "width": "5%","data": "Id_Solicitud"},
				{ "width": "5%","data": "Fecha_Seguimiento"},
				{ "width": "6%", "data": function (obj) {
						var Estatus_Proceso="";
						if(obj.Id_Estatus_Proceso==2){
							Estatus_Proceso = '<font>'+obj.Estatus_Proceso;
							
							if(obj.Asist_Especial=="1"){
								Estatus_Proceso += ' ('+obj.A_Especial+')'; 
							}
							Estatus_Proceso+='</font>';
						}
						
						return Estatus_Proceso;
					}
				
				},
				{ "width": "8%", "data": "Gestor"},
				{ "width": "5%","data": "Desc_Prioridad"},
				{ "width": "5%", "data": "Nombre_Seccion"},
				{ "width": "10%", "data": "Desc_Categoria"},
				{ "width": "10%", "data": "Desc_Subcategoria"},
				{ "width": "15%", "data": function (obj) {
						var Desc = '';
						
						Desc=obj.Titulo;
						
						return Desc;
					}
				},
				{ "width": "15%", "data": function (obj) {
						var Desc = '';
						if(obj.Id_Actividad!=""){
							Desc='<a href="#noir" id="Ver_Act'+obj.Id_Solicitud+'" onclick="ver_actividades('+obj.Id_Solicitud+')">Ver Actividades</a><a href="#noir" id="Ocult_Act'+obj.Id_Solicitud+'" onclick="ocult_actividades('+obj.Id_Solicitud+')" style="display:none">Ocultar Actividades</a><div id="Desc_Motiv_Repor'+obj.Id_Solicitud+'" style="display:none">'+obj.Desc_Motivo_Reporte+"</div>";
						}else{
							Desc=obj.Desc_Motivo_Reporte;
						}
						return Desc;
					}
				
				},
				{ "width": "4%", "data": "Nom_Area"}
				
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
		
		//Tabla por cerrar
		$('#display_por_cerrar').DataTable({
			"async": false,
			"ordering": false,
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
				"type": "POST",
				"data": {
					orden:'AF_BC',
					Id_Usuario:$("#usuariosesion").val(),
					//Id_Area:$("#idareasesion").val(),
					Estatus_Proceso:'3'
				},
				"dataSrc": function ( json ) {						
   				cont_ticket_biomedica=0;
					cont_ticket_tic=0;
					cont_ticket_mantenimiento=0;
					cont_ticket_mob_equi=0;
					cont_ticket_juridico=0;
					cont_recarga_dat_tabl=cont_recarga_dat_tabl+1;
					if(json.recordsTotal>0){
						$("#notificacion_porcerrar_t").show();
						$("#notificacion_porcerrar_t").html(json.recordsTotal);
						//cont_ticket_tic=json.recordsTotal;
						
						for(var i=0; i<json.recordsTotal;i++){
							if(json.data[i].Id_Estatus_Proceso==3&&json.data[i].Id_Area==1){
								cont_ticket_biomedica=cont_ticket_biomedica+1;
							}
							if(json.data[i].Id_Estatus_Proceso==3&&json.data[i].Id_Area==2){
								cont_ticket_tic=cont_ticket_tic+1;
							}
							if(json.data[i].Id_Estatus_Proceso==3&&json.data[i].Id_Area==3){
								cont_ticket_mantenimiento=cont_ticket_mantenimiento+1;
							}
							if(json.data[i].Id_Estatus_Proceso==3&&json.data[i].Id_Area==4){
								cont_ticket_mob_equi=cont_ticket_mob_equi+1;
							}
							if(json.data[i].Id_Estatus_Proceso==3&&json.data[i].Id_Area==6){
								cont_ticket_juridico=cont_ticket_juridico+1;
							}
						}
					
						
					}else{
						$("#notificacion_porcerrar_t").hide();
					}
					
					if(cont_recarga_dat_tabl==1){
						msjticketscerrar();
					}
					
					return json.data;
   				}
				
			},
			"columns": [
				{ "width": "5%","data": function (obj) {
						var seguimiento = '';
						
						if(obj.Id_Estatus_Proceso==3){
							seguimiento = '<a href="#" data-toggle="modal" data-target="#seguimientoReporte" onclick="pasarvalores('+obj.Id_Solicitud+', 3)" data-toggle="tooltip" title="Calificar"><strong> Calificar </strong></a>';
						}
						
						
						return seguimiento;
					}
				},
				{ "width": "5%","data": "Id_Solicitud"},
				{"width": "5%","data": "Fecha"},
				{ "width": "5%","data": "Fecha_Esp_Cierre"},
				{ "width": "6%", "data": function (obj) {
						var Estatus_Proceso="";
						if(obj.Id_Estatus_Proceso==3){
							Estatus_Proceso = '<font color="red">'+obj.Estatus_Proceso;
						
							if(obj.Asist_Especial=="1"){
								Estatus_Proceso += ' ('+obj.A_Especial+')'; 
							}
							
							Estatus_Proceso+='</font>';
						}
						
						return Estatus_Proceso;
					}
				
				},
				{ "width": "8%", "data": "Gestor"},
				{ "width": "5%","data": "Desc_Prioridad"},
				{ "width": "5%", "data": "Nombre_Seccion"},
				{ "width": "10%", "data": "Desc_Categoria"},
				{ "width": "10%", "data": "Desc_Subcategoria"},
				{ "width": "15%", "data": function (obj) {
						var Desc = '';
						
						Desc=obj.Titulo;
						
						return Desc;
					}
				},
				{ "width": "15%", "data": function (obj) {
						var Desc = '';
						if(obj.Id_Actividad!=""){
							Desc='<a href="#noir" id="Ver_Act'+obj.Id_Solicitud+'" onclick="ver_actividades('+obj.Id_Solicitud+')">Ver Actividades</a><a href="#noir" id="Ocult_Act'+obj.Id_Solicitud+'" onclick="ocult_actividades('+obj.Id_Solicitud+')" style="display:none">Ocultar Actividades</a><div id="Desc_Motiv_Repor'+obj.Id_Solicitud+'" style="display:none">'+obj.Desc_Motivo_Reporte+"</div>";
						}else{
							Desc=obj.Desc_Motivo_Reporte;
						}
						
						return Desc;
					}
				
				},
				{ "width": "4%", "data": "Nom_Area"}
				
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
		
		//Tabla Cerrados
		$('#tablacerrado').DataTable({
			"ordering": false,
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
				"type": "POST",
				"data": {orden:'AF_BC',
					Id_Usuario: $("#usuariosesion").val(),
					Estatus_Proceso:'4',
					Todos_Tickets: function() { return estatus_tickets; }
					
					
				}
			},
			"columns": [
				{
					"data": function (obj) {
						var seguimiento = '';
						seguimiento += '<a href="#" data-toggle="modal" id="cerrados'+obj.Id_Solicitud+'" data-target="#seguimientoReporte" onclick="pasarvalores('+obj.Id_Solicitud+', 3)"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>';
						return seguimiento;
					}
				},
				{
					"data": function (obj) {
						var clip = '';
						clip += '<a target="_blank"  href="../controladores/activos/siga_solicitud_tickets/Reporte-Ticket.php?Id_Solicitud='+obj.Id_Solicitud+'" class="fa fa-paperclip" aria-hidden="true"></a>';
						return clip;
					}
				},
				{ "data": "Id_Solicitud"},
				{ "data": "Fecha_Cierre"},
				{	
					"data": function (obj) {
						var Estatus_Proceso="";	
						if(obj.Id_Estatus_Proceso==4){
							Estatus_Proceso = '<font color="green">'+obj.Estatus_Proceso;
						}
						
						if(obj.Asist_Especial=="1"){
							Estatus_Proceso += ' ('+obj.A_Especial+')'; 
						}
						Estatus_Proceso+='</font>';
						
						return Estatus_Proceso;
					}
				
				},
				{ "data": "Gestor"},
				{ "width": "5%","data": "Desc_Prioridad"},
				{ "data": "Nombre_Seccion"},
				{ "data": "Desc_Categoria"},
				{ "data": "Desc_Subcategoria"},
				{
					"data": function (obj) {
						var Desc = '';
						Desc=obj.Titulo;
						
						return Desc;
					}
				},
				{
				"data": function (obj) {
					var Desc = '';
					if(obj.Id_Actividad!=""){
						Desc='<a href="#noir" id="Ver_Act'+obj.Id_Solicitud+'" onclick="ver_actividades('+obj.Id_Solicitud+')">Ver Actividades</a><a href="#noir" id="Ocult_Act'+obj.Id_Solicitud+'" onclick="ocult_actividades('+obj.Id_Solicitud+')" style="display:none">Ocultar Actividades</a><div id="Desc_Motiv_Repor'+obj.Id_Solicitud+'" style="display:none">'+obj.Desc_Motivo_Reporte+"</div>";
					}else{
						Desc=obj.Desc_Motivo_Reporte;
					}
					return Desc;
				}
			
			},
				{ "data": "ComentarioCierre"},
				{ "data": "Nom_Area"}
				
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

		todos_tickets=function(){
			
			if($("#todos_tickets").prop('checked')){
				estatus_tickets=1;
			}else{
				estatus_tickets="";
			}
			
			$('#tablacerrado').DataTable().ajax.reload();
		}
		
		
		ver_actividades=function(Id_Solicitud){
			$("#Desc_Motiv_Repor"+Id_Solicitud).show();
			$("#Ver_Act"+Id_Solicitud).hide();
			$("#Ocult_Act"+Id_Solicitud).show();
		}
		
		ocult_actividades=function(Id_Solicitud){
			$("#Desc_Motiv_Repor"+Id_Solicitud).hide();
			$("#Ver_Act"+Id_Solicitud).show();
			$("#Ocult_Act"+Id_Solicitud).hide();
		}
		
		carga_activos_vip("mis_activos");	
		
		selec_activo_radio=function(nombre_radio, Id_Activo){
			$("#hidden_seleccion_activo").val(Id_Activo);
		}	
		
		habilita_solicitudes_mant();
		function habilita_solicitudes_mant(){
			$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",        
					async: false,
					data: {
						No_Usuario: "<?php echo $_SESSION["No_Usuario"]; ?>",
						accion: "consultar_depto"
					},
					dataType: "html",
					beforeSend: function (xhr) {
					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						
						if(json.totalCount>0){
							$("#div_mantenimiento_solicitudes").show();
						}
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
					}
				});
			
		}

		//Pasar Valores al Editar
		pasarvalores=function(id, Estatus_Proceso) {
			$("#Id_Cirugia").val("");
			limpiarcampos_tabcalificacion();
			$("#botonEnviarCalificacion").attr("disabled", false);
			$("#botonNoSolucionado").attr("disabled", false);

			// Habilita los campos para evitar la edición
			$("div.tab-contenedor :input").attr("disabled", false);
			
			if(Estatus_Proceso=="1"){
				$("#tabChat").click();
				$("#tabChat").hide();
				$("#tab_adjuntos").hide();
				$("#tab_cerrar").hide();
				//Ocultamos div chat
				$("#div_box_chat").hide();
			}else{
				if(Estatus_Proceso=="2"){
					$("#tabChat").click();
					$("#tabChat").show();
					$("#tab_adjuntos").show();
					$("#tab_cerrar").hide();
					$("#div_box_chat").show();
				} else {
					// Tickets cerrados
					if (Estatus_Proceso == "3") {

						// Muestra las secciones
						$("#tab_cerrar").click();
						$("#tabChat").show();
						$("#tab_adjuntos").show();
						$("#tab_cerrar").show();
						$("#div_box_chat").show();
					}
				}			
			}
			
			limpiarcampos();
			if (id != "") {
				$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
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
							if(data.data[0].Id_Subcategoria=="4484"||data.data[0].Id_Subcategoria=="4485"||data.data[0].Id_Subcategoria=="6487"||data.data[0].Id_Subcategoria=="8491"||data.data[0].Id_Subcategoria=="8492"||data.data[0].Id_Subcategoria=="8493"){
								var formato_link='<a target="_blank" href="http://siga.hospitalsatelite.com:8080/gesjur/vistas/proveedores_doc_sol.asp?key='+id+'" type="button" class="btn btn-warning btn-xs">Ver Formato de Solicitud</a>';
								$("#format_solicitud_prov").html(formato_link);
							}else{
								if(data.data[0].Id_Subcategoria=="8499"||data.data[0].Id_Subcategoria=="8597"){
										var formato_link='<a target="_blank" href="http://siga.hospitalsatelite.com:8080/gesjur/archivos/archivos_contratos_form_estandar/Solicitud Contractual.pdf" type="button" class="btn btn-warning btn-xs">Solicitud Contractual</a>';
										$("#format_solicitud_prov").html(formato_link);
								}else{
									$("#format_solicitud_prov").html("");
								}
							}
							
							
							//Limpiamos los divs y variables 
							$("#div_adjuntos_chat_archivos").html("");
							$("#div_adjuntos_chat_imagenes").html("");
							archivos_adjuntos="";
							imagenes_adjuntos="";
							
							var li_img="";
							var li_arch="";
							var archivos="";
							if(data.data[0].Url_archivo!=""){
								var url_cad_dinamic="";
								url_cad_dinamic=data.data[0].Url_archivo.toString().split("---");
								
								if(url_cad_dinamic.length<=0){
									archivos=data.data[0].Url_archivo.toString().split(".");
									for(var j=0; j<array_img.length;j++){
										if(array_img[j].toString()==archivos[1].toUpperCase()){
											li_img+='<li>';
											li_img+='  <a href="#">';
											li_img+='	<a href="../Archivos/Archivos-Mesa/'+data.data[0].Url_archivo+'" target="_blank">Ver Imágen</a>';
											//li_img+='	<span class="name">listadoProd.xls</span>';
											li_img+='  </a>';
											li_img+='</li>';
										}
									}
									
									for(var k=0; k<array_arch.length;k++){
										if(array_arch[k].toString()==archivos[1].toUpperCase()){
											li_arch+='<li>';
											li_arch+='  <a href="#">';
											li_arch+='	<a href="../Archivos/Archivos-Mesa/'+data.data[0].Url_archivo+'" target="_blank">Ver Archivo</a>';
											//li_img+='	<span class="name">listadoProd.xls</span>';
											li_arch+='  </a>';
											li_arch+='</li>';
										}
									}
								}else{
									for(var k1=0; k1<url_cad_dinamic.length;k1++){
										archivos=url_cad_dinamic[k1].toString().split(".");
										for(var j=0; j<array_img.length;j++){
											if(array_img[j].toString()==archivos[1].toUpperCase()){
												li_img+='<li>';
												li_img+='  <a href="#">';
												li_img+='	<a href="../Archivos/Archivos-Mesa/'+url_cad_dinamic[k1]+'" target="_blank">Ver Imágen</a>';
												//li_img+='	<span class="name">listadoProd.xls</span>';
												li_img+='  </a>';
												li_img+='</li>';
											}
										}
										
										for(var k=0; k<array_arch.length;k++){
											if(array_arch[k].toString()==archivos[1].toUpperCase()){
												li_arch+='<li>';
												li_arch+='  <a href="#">';
												li_arch+='	<a href="../Archivos/Archivos-Mesa/'+url_cad_dinamic[k1]+'" target="_blank">Ver Archivo</a>';
												//li_img+='	<span class="name">listadoProd.xls</span>';
												li_arch+='  </a>';
												li_arch+='</li>';
											}
										}
									}
								}	
							}
							
							archivos_adjuntos=li_arch;
							imagenes_adjuntos=li_img;
							
							$("#div_adjuntos_chat_archivos").html(archivos_adjuntos);
							$("#div_adjuntos_chat_imagenes").html(imagenes_adjuntos);
							
							
							if(data.data[0].Prioridad==1){
								Prioridad="Alta";
							}else{
								if(data.data[0].Prioridad==2){
									Prioridad="Mdia";
								}else{
									if(data.data[0].Prioridad==3){
										Prioridad="Baja";
									}
								}
							}
						    for (var i=1; i <=2; i++)
							{
							 var Estatus_Proce="";
							 Estatus_Proce=data.data[0].Estatus_Proceso;
							 if(data.data[0].Asist_Especial=="1"){
								Estatus_Proce+=" (Asistencia Especial)";
							 }
							
							 $("#spanNumsolicitud"+i).text(data.data[0].Id_Solicitud);
							 $("#Id_Solicitud").val(data.data[0].Id_Solicitud);
							 //Si existe la imagen, pasamos el numero del empleado
							 if(data.data[0].Existe_Imagen=="si"){
								$("#No_Empleado_chat").val(data.data[0].No_Gestor);
							 }
							 
							 $("#spanStatus"+i).text(Estatus_Proce);
							 if(data.data[0].Lo_Realiza=="0"){
								$("#spanLo_Realiza"+i).text("Interno");
							 }else{
								if(data.data[0].Lo_Realiza=="1"){
									$("#spanLo_Realiza"+i).text("Externo");
								 }
							 }
							 
							 
							 if(data.data[0].Activo_Externo=="1"){
								 $("#spanActivo"+i).html(data.data[0].AF_BC_Ext+' '+data.data[0].Nombre_Act_Ext+' <span class="label label-warning">Activo Externo</span>');
								 $("#spanMarca"+i).text(data.data[0].Marca_Act_Ext);
								 $("#spanModelo"+i).text(data.data[0].Modelo_Act_Ext);
								 $("#spanNo_Serie"+i).text(data.data[0].No_Serie_Act_Ext);
								 $("#spanUbic_Prim"+i).text(data.data[0].Desc_Ubic_Prim_Act_Ext);
								 $("#spanUbic_Sec"+i).text(data.data[0].Desc_Ubic_Sec_Act_Ext);
							}else{
								 $("#spanActivo"+i).text(data.data[0].AF_BC_Ext+' '+data.data[0].Nombre_Act_Ext);
								 $("#spanMarca"+i).text(data.data[0].Marca_Act_Ext);
								 $("#spanModelo"+i).text(data.data[0].Modelo_Act_Ext);
								 $("#spanNo_Serie"+i).text(data.data[0].No_Serie_Act_Ext);
								 $("#spanUbic_Prim"+i).text(data.data[0].Desc_Ubic_Prim_Act_Ext);
								 $("#spanUbic_Sec"+i).text(data.data[0].Desc_Ubic_Sec_Act_Ext);
							 }
							 
							 $("#spanArea"+i).text(data.data[0].Area);
							 $("#spanPrioridad"+i).text(Prioridad);
							 if(data.data[0].Desc_Medio!=null && data.data[0].Desc_Medio!=""){
								$("#spanMedio"+i).text(data.data[0].Desc_Medio);
								$("#liMedio"+i).show();
							 }else{
								$("#liMedio"+i).hide();
							 }
							 if(data.data[0].Id_Solicitud_Anterior!=null && data.data[0].Id_Solicitud_Anterior!=""){
							   $("#spanNumsolicitudAnterior"+i).text(data.data[0].Id_Solicitud_Anterior);
							   $("#liSolicitudAnterior"+i).show(); 
							 }else{
							   $("#liSolicitudAnterior"+i).hide(); 
							 }
							 
							 $("#Id_Cirugia").val(data.data[0].Id_Cirugia);
							 
							 $("#spanSeccion"+i).text(data.data[0].NombreSeccion);
							 $("#spanCategoria"+i).text(data.data[0].Categoria);
						     $("#spanSubcategoria"+i).text(data.data[0].Subcategoria);
							 $("#spanMotivo"+i).text(data.data[0].Motivo);
							 $("#spanSolicitud"+i).text(data.data[0].Usuario);
							 $("#spanGestor"+i).text(data.data[0].Gestor);
							 $("#spanFech_Solicitud"+i).text(data.data[0].Fech_Solicitud);
							}
							
							$("#hddEstatus_Proceso").val(data.data[0].Id_Estatus_Proceso);
							
							if(data.data[0].Id_Estatus_Proceso=="4"){
								$("#botonEnviarCalificacion").attr("disabled", true);
								$("#botonNoSolucionado").attr("disabled", true);
								
								cargar_calificacion(data.data[0].Id_Solicitud);

								// Deshabilita los campos para evitar la edición solo en caso de ticktes cerrados
								setTimeout(function () { $("div.tab-contenedor :input").attr("disabled", true); }, 100);
							}
							
							$("#Desc_Motivo_Aparente").html("");
							$("#Desc_Motivo_Real").html("");
							$("#Desc_Est_Equipo").html("");
							$("#Desc_Cierre").html("");
							$("#Desc_Motivo_Aparente").html(data.data[0].Desc_Motivo_Aparente);
							$("#Desc_Motivo_Real").html(data.data[0].Desc_Motivo_Real);
							$("#Desc_Est_Equipo").html(data.data[0].Desc_Est_Equipo);
							$("#Desc_Cierre").html(data.data[0].ComentarioCierre);
							
							//Titulo del chat
							$("#title_chat").html("<font FACE='Arial' style='font-size:13px'>"+data.data[0].Usuario+"</font>");
						
							//Activar el tab Actividades si el ticket viene de las Actividades
							 if(data.data[0].Id_Estatus_Proceso>1&& data.data[0].Id_Estatus_Proceso<5){
								if((data.data[0].Id_Actividad!="")){
									$("#li_actividades").show();
									carga_actividades(data.data[0].Id_Actividad);
								}else{
									$("#li_actividades").hide();
								}
							 }else{
								$("#li_actividades").hide();
							 }
						}
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
					}
				});
			}
			cargachat();
		}
	
		function autocomplete_activos(){
			//Area
			var Id_Area=$("#idareasesion").val();
			var strdatos="";
			
			if(Id_Area!="5"){
				strdatos={
					Id_Area:Id_Area,
					Estatus_Reg:"1",
					accion: 'consultar'
				}
			}else{
				strdatos={
					Estatus_Reg:"1",
					accion: 'consultar'
				}
			}
				
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",
				data: {
					Id_Area:Id_Area,
					Estatus_Reg:"1",
					accion: 'consultar'
				},
				async: true,
				dataType: "html",
				beforeSend: function (objeto) {
					$("#gifcargando1").show();
				},
				success: function (datos) {
					var json = "";
						json = eval("(" + datos + ")"); //Parsear JSON

						if (json.totalCount > 0) {

							var activos='';
							activos+='<option></option>';
							activos+='<optgroup label="Activos">';

							for (var i = 0; i < json.totalCount; i++) {
								activos+='<option value="'+json.data[i].Id_Activo+'">'+json.data[i].AF_BC+' '+json.data[i].Nombre_Activo+' ('+json.data[i].Marca+'/'+json.data[i].Modelo+'/'+json.data[i].NumSerie+')</option>';
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
							$('#select-activos').append($('<option>', { value: "" }).text("Sin resultados"));
						}

				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
					$('#select-activos').append($('<option>', { value: "-1" }).text("Sin resultados"));
				}
			});
		}
		
	
		$("#select-activos").change(function() {
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
								/*$("#txt_Id_Activo").val(json.data[0].Id_Activo);
								$("#txt_Nom_Activo").val(json.data[0].Nombre_Activo);
								$("#txt_ubic_primaria").val(json.data[0].Desc_Ubic_Prim);
								$("#txt_ubic_secundaria").val(json.data[0].Desc_Ubic_Sec);
								$("#txt_marca").val(json.data[0].Marca);
								$("#text_Modelo").val(json.data[0].Modelo);*/
								$("#desc_corta_activo").val(json.data[0].DescLarga);
								//$("#text_No_Serie").val(json.data[0].NumSerie);
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
		
		
		$("#closeModal").click(function () {
			$("#No_Empleado_chat").val("");
			$("#Id_Solicitud").val("");
			$('#display_sin_respuesta').DataTable().ajax.reload();
			$('#display_seguimiento').DataTable().ajax.reload();
			$('#display_por_cerrar').DataTable().ajax.reload();
			$('#tablacerrado').DataTable().ajax.reload();
		});
		
		
		//setInterval('cargar_tablas()',300000);
		cargar_tablas=function(){
			$('#display_sin_respuesta').DataTable().ajax.reload();
			$('#display_seguimiento').DataTable().ajax.reload();
			$('#display_por_cerrar').DataTable().ajax.reload();
			$('#tablacerrado').DataTable().ajax.reload();
			$("#tickets_actuales").prop("checked", true);
		}
		
		
		
		
		//setInterval('cargachatentreintaseg()',30000);
		cargachatentreintaseg=function(){
			var Id_Solicitud=$("#Id_Solicitud").val();
		
			if(Id_Solicitud!=""){
				cargachat();
			}
		}
		
		$("#botonNoSolucionado").click(function () {
			$.confirm({
				title: 'Confirm!',
				content: 'Al confirmar el ticket se pasara a seguimiento!',
				buttons: {
					confirm: function () {
						$.ajax({
							type: "POST",
							url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
							data: {
								Id_Solicitud: $("#Id_Solicitud").val(),
								accion: 'Por_cerrar_a_seguimiento'
							},
							async: false,
							dataType: "html",
							beforeSend: function (objeto) {
							},
							success: function (datos) {
								var json = "";
								json = eval("(" + datos + ")"); //Parsear JSON
			
								if (json.totalCount > 0) {
									mensajesalerta("&Eacute;xito", "La solicitud con el Folio: "+$("#Id_Solicitud").val()+", se paso a seguimiento", "success", "dark");
									//$("#closeModal").click();
									cargar_tablas();
									$('#seguimientoReporte').modal('show');
									pasarvalores($("#Id_Solicitud").val(), 2);
								}else {
									mensajesalerta("", "Ocurrio un error al cambiar el estatus", "error", "dark");
								}
			
							},
							error: function (objeto, quepaso, otroobj) {
								mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
							}
						});
					},
					cancel: function () {
					}
				}
			});
	
		});
		
		
		<?php
			if(!empty($_SESSION["url_id_solicitud"])&&!empty($_SESSION["url_est_proceso"])){
		?>
				carga_modal_url();
		<?php
			}
		?>
   });
   
    //Se carga la funcion al abrir el link de el correo electronico
	//carga_modal_url();
	function carga_modal_url(){
		
		
		
		<?php if($_SESSION["url_id_solicitud"]!=""&&($_SESSION["url_id_usuario"]==$_SESSION["Id_Usuario"])){?>
			var url_est_proceso="<?php echo $_SESSION["url_est_proceso"]; ?>";
			var url_id_solicitud="<?php echo $_SESSION["url_id_solicitud"]; ?>";
			
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
				data: {
					Id_Solicitud: url_id_solicitud,
					Estatus_Proceso: url_est_proceso,
					accion: 'Consulta_Estatus_Proceso'
				},
				async: false,
				dataType: "html",
				beforeSend: function (objeto) {
				},
				success: function (datos) {
					var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON
			
					if (json.totalCount > 0) {
						$('#seguimientoReporte').modal('show');
					
						if(json.Estatus_Proceso==url_est_proceso){
							pasarvalores(url_id_solicitud,"3");
							
							if(url_est_proceso==1){
								$("#li_tab_sin_respuesta").click();
							}else{
								if(url_est_proceso==2){
									$("#li_tab_seguimiento").click();
								}else{
									if(url_est_proceso==3){
										$("#li_tab_por_cerrar").click(); 
									}else{
										if(url_est_proceso==4){
											$("#li_tab_cerrados").click();
										}
									}
								}
							}
						}
					}else {
						mensajesalerta("Informaci&oacute;n", "-El ticket "+url_id_solicitud+" se encuentra en otro estatus", "", "dark");
					}
			
				},
				error: function (objeto, quepaso, otroobj) {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				}
			});
			//Se borran ls sesiones y campos
			$("#url_sistema").val("");
		<?php
			$_SESSION["url_est_proceso"]="";
			$_SESSION["url_sistema"]="";
			$_SESSION["url_id_solicitud"]="";
			$_SESSION["url_id_usuario"]="";
		}else{
			$_SESSION["url_est_proceso"]="";
			$_SESSION["url_sistema"]="";
			$_SESSION["url_id_solicitud"]="";
			$_SESSION["url_id_usuario"]="";
		}?>
	}
   
	function cambiaSeccion(idseccion){
	   //alert(idseccion);
	   $("#hddSeccion").val(idseccion);
	}

    function carga_secciones(idarea) {
			var resultado=new Array();
			data={accion: "consultar",Id_Area:idarea};
			resultado=cargo_cmb("../fachadas/activos/siga_cat_ticket_seccion/Siga_cat_ticket_seccionFacade.Class.php",false, data);

			var htmlDiv = '<ul class="inline center">'+
                        '<li>Sección</li>';
						
						for(var i = 0; i < resultado.totalCount; i++)
						{
						var resultado2=new Array();
						data2={accion: "consultar",Id_Seccion:resultado.data[i].Id_Seccion};
						resultado2=cargo_cmb("../fachadas/activos/siga_cat_ticket_subseccion/Siga_cat_ticket_subseccionFacade.Class.php",false, data2);
	
                        htmlDiv +='<li>'+
                          '<div class="form-group">'+
                            '<div class="checkbox icheck">'+
                              '<label>'+
                                '<input type="radio" value="'+resultado.data[i].Id_Seccion+'" onChange="javascript:cambiaSeccion('+resultado.data[i].Id_Seccion+')" id="chkSoporte'+resultado.data[i].Id_Seccion+'" name="chkSoporte"> '+resultado.data[i].Desc_Seccion+
                              '</label>'+
                            '</div>'+
                          '</div>'+
                        '</li>'+
                        '<li class="infotip">'+
                          '<a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i>'+

                            '<div class="tooltip-login">'+
                              '<div class="head">'+
                                '<h5><font color="white">SERVICIOS QUE SE PUEDEN REPORTAR EN LA SECCIÓN DE '+resultado.data[i].Desc_Seccion+'</font></h5>'+
                              '</div>'+
                              '<div class="body">';
							  var desc_subseccion="";
							  for(var j = 0; j < resultado2.totalCount; j++)
						      {
								desc_subseccion+="-"+resultado2.data[j].Desc_Subseccion+"<br>";
							  
                                //htmlDiv +='<div class="col-md-6">'+
                                //resultado2.data[j].Desc_Subseccion+', '+
								//  '<ul>'+
                                //  '<li>'+resultado2.data[j].Desc_Subseccion+'</li>'+
                                //'</ul>'+
                                //'</div>';
                              }
							  htmlDiv +='<div class="col-md-12">';
							  htmlDiv +=desc_subseccion;
                              
							  htmlDiv +='</div>';
							  htmlDiv +='</div>'+
                            '</div>'+

                          '</a>'+
                        '</li>';
						}
                        
                      htmlDiv +='</ul>';
					  
					  $("#divSeccion").html(htmlDiv);
			
	}
   
	function carga_categorias(idarea) {
		var resultado=new Array();
		data={Estatus_Reg: "1",accion: "consultar",Id_Area:idarea};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ticket_categoria/Siga_cat_ticket_categoriaFacade.Class.php",false, data);
        $('#cmb_categoria').empty();
		if(resultado.totalCount>0){
			$('#cmb_categoria').append($('<option>', { value: "-1" }).text("--Categoria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmb_categoria').append($('<option>', { value: resultado.data[i].Id_Categoria }).text(resultado.data[i].Desc_Categoria));
			}
		}else{
			$('#cmb_categoria').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
		
    function limpiarcampos(){
			
			$("#No_Empleado_chat").val("");
			//Limpio radios seleccion activos empleados
			$("input:radio[name='radio_activos']").attr("checked",false);
			$("#hidden_seleccion_activo").val("");
			
			$("#Id_Solicitud").val("");
			//$("#hddArea").val("");
			$("#cmb_categoria").val("-1");
			$("#desc_titulo ").val("");
			$("#Descripcion_ticket").val("");
			$("#Check_Alta").is(':checked');
			//$("#chkSoporte").is(':checked');
			$("#Url_Foto_Activo").val("");
			//$('.upload-simple').fileinput('destroy');
			
			//Pinta nuevamente el control de adjuntos
			carga_control_adjuntos();
			
			//var $el4 = $('#documentos_adjuntos_FILE'), initPlugin = function() {
			//	$el4.fileinput({previewClass:''});
			//};
			//initPlugin();
			//
			//$el4.fileinput('clear');
	}		
    
	function msjticketscerrar(){
		var Id_Area_Nuevo=$("#hddArea").val();
		$('#display_por_cerrar').DataTable().ajax.reload();
		
		if(cont_ticket_biomedica>0&&Id_Area_Nuevo==1){
			mensajesalerta("Informaci&oacute;n", "-Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.<br />", "", "dark");
			$("#mensaje_cerrados").html("<h3><font color='red'>Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.</font></h3>");
			$("#desc_titulo").prop( "disabled", true );
			$("#Descripcion_ticket").prop( "disabled", true );
			$("#solicitar").prop( "disabled", true );
		}else{
			if(cont_ticket_tic>0&&Id_Area_Nuevo==2){
				mensajesalerta("Informaci&oacute;n", "-Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.<br />", "", "dark");
				$("#mensaje_cerrados").html("<h3><font color='red'>Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.</font></h3>");
				$("#desc_titulo").prop( "disabled", true );
				$("#Descripcion_ticket").prop( "disabled", true );
				$("#solicitar").prop( "disabled", true );
			}else{
				if(cont_ticket_mantenimiento>0&&Id_Area_Nuevo==3){
					mensajesalerta("Informaci&oacute;n", "-Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.<br />", "", "dark");
					$("#mensaje_cerrados").html("<h3><font color='red'>Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.</font></h3>");
					$("#desc_titulo").prop( "disabled", true );
					$("#Descripcion_ticket").prop( "disabled", true );
					$("#solicitar").prop( "disabled", true );
				}else{
					if(cont_ticket_mob_equi>0&&Id_Area_Nuevo==4){
						mensajesalerta("Informaci&oacute;n", "-Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.<br />", "", "dark");
						$("#mensaje_cerrados").html("<h3><font color='red'>Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.</font></h3>");
						$("#desc_titulo").prop( "disabled", true );
						$("#Descripcion_ticket").prop( "disabled", true );
						$("#solicitar").prop( "disabled", true );
					}else{
						if(cont_ticket_juridico>0&&Id_Area_Nuevo==6){
							mensajesalerta("Informaci&oacute;n", "-Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.<br />", "", "dark");
							$("#mensaje_cerrados").html("<h3><font color='red'>Para generar un nuevo ticket, debes cerrar los que se encuentran en la pestaña por cerrar.</font></h3>");
							$("#desc_titulo").prop( "disabled", true );
							$("#Descripcion_ticket").prop( "disabled", true );
							$("#solicitar").prop( "disabled", true );
						}else{
							$("#mensaje_cerrados").html("");
							$("#desc_titulo").prop( "disabled", false );
							$("#Descripcion_ticket").prop( "disabled", false );
							$("#solicitar").prop( "disabled", false );
						}
					}
				}
			}
		}
	}
	
	function cambiaArea(idarea){
	   $("#Check_Mis_Activos").prop("checked", true); 	
	   limpiarcampos();
	   $("#hddArea").val(idarea);
	   $("#headerArea").removeAttr('class');
	   $("#headerArea").attr('class', '');
	   $('#headerArea')[0].className = '';
	   
	   $("#headerArea2").removeAttr('class');
	   $("#headerArea2").attr('class', '');
	   $('#headerArea2')[0].className = '';
	   
	   
	   carga_secciones(idarea);
	   carga_categorias(idarea);
	   
     if (idarea == 1)	   
	   {
	   $("#headerArea").addClass("box-header azul with-border");
	   $("#headerArea2").addClass("box-header azul with-border");
	   $("#h3Area").html("Solicitud de soporte Biomédica");
	   $("#solicitud_mis_activos").show();
		 $("#solicitar").html("Solicitar Soporte");
		 }
     if (idarea == 2){	   
	   $("#headerArea").addClass("box-header verde with-border");
	   $("#headerArea2").addClass("box-header verde with-border");
	   $("#h3Area").html("Solicitud de soporte TIC");
	   $("#solicitud_mis_activos").show();
		 $("#solicitar").html("Solicitar Soporte");
		 }
	   if (idarea == 3){
	   $("#headerArea").addClass("box-header amarillo with-border");
	   $("#headerArea2").addClass("box-header amarillo with-border");
	   $("#h3Area").html("Solicitud de soporte Mantenimiento");
	   $("#solicitud_mis_activos").show();
		 $("#solicitar").html("Solicitar Soporte");
		 }
		 if (idarea == 6){
	   $("#headerArea").addClass("box-header rojo with-border");
	   $("#headerArea2").addClass("box-header rojo with-border");
	   $("#h3Area").html('<ul class="inline center" style="font-size:13px"><li class="infotip"><a href="#" onclick="muestro_info_juridico()" title="Ayuda"><i class="fa fa-info-circle" aria-hidden="true" title="Ayuda"></i></a></li></ul> Solicitud de servico Jurídico');
		 $("#solicitud_mis_activos").hide();
		 $("#solicitar").html("Solicitar Servicio");
	   }
	   
	   
   }
   
    $(".upload-files").fileinput({
		browseClass: "btn chs",
		language: 'es',
		allowedFileExtensions : ['jpg','png'],
	});

	$(".upload-simple").fileinput({
		browseClass: "btn chs",
		language: 'es',
	});
  

    //Subir Imagenes al servidor 
	
	muestro_info_juridico=function(){
		$("#info_juridico").modal("show");
		
	}
	
	carga_control_adjuntos();
	
	
	function carga_control_adjuntos(){
		var Adjuntos="";
		Adjuntos='<label for="documentos_adjuntos_FILE" class="control-label" id="documentos_adjuntos_FILELabel" style="font-size: 11px;">1.-Adjuntar Imagen</label>';			  
        Adjuntos+='<input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
		Adjuntos+='<input type="hidden" id="Url_Foto_Activo">';
	
		$("#Adjuntos_tickets").html(Adjuntos);
		carga_arch_mesa("documentos_adjuntos_FILE", "Url_Foto_Activo","../Archivos/Archivos-Mesa",true,false);
	}
	
	
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
		
		if(Agregar){
		
			strDatos = "Id_Solicitud="+Id_Solicitud; 
			strDatos += "&Mensaje="+Mensaje;
			strDatos += "&Id_Usuario="+Id_Usuario;
			strDatos += "&Id_Estatus_Proceso=1";
			strDatos += "&Estatus_Reg=1";				
			strDatos += "&accion=guardar";
			//Archivos Adjuntos
			strDatos += "&Url_Adjunto="+url_documentos_adjuntos_chat;
			
			if(Id_Solicitud!=""){
				$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_ticket_chat/Siga_ticket_chatFacade.Class.php",        
					async: false,
					data: {
						Id_Solicitud: Id_Solicitud, 
						Mensaje: Mensaje,
						Id_Usuario: Id_Usuario,
						Id_Estatus_Proceso: 1,
						Estatus_Reg:1,				
						accion: "guardar",
						Url_Adjunto: url_documentos_adjuntos_chat
					},
					dataType: "html",
					beforeSend: function (xhr) {
				
					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						$("#Mensaje").val('');
						mensajesalerta("&Eacute;xito", "Generado Correctamente.", "success", "dark");
						cargachat();
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
		}
	});
		
	
	//Al Dar enter sobre la caja de texto del mensaje
	$('#Mensaje').keyup(function(e){
		if(e.keyCode == 13){
			$("#botonEnviar").click();
		}
	});
	
	$("#botonEnviarCalificacion").click(function(e){
		var Agregar = true;
		var mensaje_error = "";
		var strDatos="";
		
		var Id_Solicitud=$.trim($("#Id_Solicitud").val());
		var Id_Cirugia=$.trim($("#Id_Cirugia").val());
		//Usuario Sesion
		var Id_Usuario=$("#usuariosesion").val();
		//Area de sesion
		//var Id_Area=$("#idareasesion").val();
		var Resp1=$.trim($("#Solucion").val());
		var Resp2=$.trim($("#Actitud").val());
		var Resp3=$.trim($("#TiempoRespuesta").val());
		var Estatus_Proceso = $("#hddEstatus_Proceso").val();
		var P1=$("#hddP1").val();
		var P2=$("#hddP2").val();
		var P3=$("#hddP3").val();
		//alert(Estatus_Proceso);
		
		if (Estatus_Proceso == 1 || Estatus_Proceso == 2 || Estatus_Proceso == '') {
			Agregar = false; 
			mensaje_error += " -El ticket debe estar cerrado por el gestor para ser calificado<br />";
			$("#Solucion").focus();
		}
		
		if (Resp1.length <= 0) {
			Agregar = false; 
			mensaje_error += " -El campo de Solución no puede ser vacio<br />";
			$("#Solucion").focus();
		}
		if (Resp2.length <= 0) {
			Agregar = false; 
			mensaje_error += " -El campo de Actitud no puede ser vacio<br />";
			$("#Actitud").focus();
		}
		if (Resp3.length <= 0) {
			Agregar = false; 
			mensaje_error += " -El campo de Tiempo de Respuesta no puede ser vacio<br />";
			$("#TiempoRespuesta").focus();
		}
		
		if (P1.length <= 0) {
			Agregar = false; 
			mensaje_error += " -La respuesta de la primera pregunta puede ser vacia<br />";
			$("#p11").focus();
		}
		if (P2.length <= 0) {
			Agregar = false; 
			mensaje_error += " -La respuesta de la segunda pregunta puede ser vacia<br />";
			$("#p21").focus();
		}
		if (P3.length <= 0) {
			Agregar = false; 
			mensaje_error += " -La respuesta de la tercera pregunta puede ser vacia<br />";
			$("#p31").focus();
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		//alert(Agregar);
		if(Agregar)
		{
			strDatos = "Id_Solicitud="+Id_Solicitud; 
			strDatos += "&Id_Cirugia="+Id_Cirugia; 
			strDatos += "&Id_Pregunta1=1";
			strDatos += "&Id_Respuesta1="+P1;	
			strDatos += "&Desc_Comentario1="+Resp1;
			strDatos += "&Id_Pregunta2=2";
			strDatos += "&Id_Respuesta2="+P2;
			strDatos += "&Desc_Comentario2="+Resp2;
			strDatos += "&Id_Pregunta3=3";
			strDatos += "&Id_Respuesta3="+P3;	
			strDatos += "&Desc_Comentario3="+Resp3;
			strDatos += "&Usr_Inser="+Id_Usuario;
			strDatos += "&Estatus_Reg=1";
			strDatos += "&accion=guardar";
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_ticket_calificacion/Siga_ticket_calificacionFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					
					limpiarcampos_tabcalificacion();
					cerrar_por_solicitante();
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});	
		}
	});
		
	function cerrar_por_solicitante(){
		var Id_Solicitud=$.trim($("#Id_Solicitud").val());
		var strDatos="";
		strDatos = "Id_Solicitud="+Id_Solicitud; 
		strDatos += "&Estatus_Proceso=4";
		strDatos += "&accion=guardar";
		
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
			async: false,
			data: strDatos,
			dataType: "html",
			beforeSend: function (xhr) {
		
			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				if (json.totalCount > 0) {
					mensajesalerta("&Eacute;xito", "El ticket ha sido cerrado", "success", "dark");
					/*	
					//Envia Correo
					$.ajax({
						type: "POST",
						url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsCorreo.Class.php",        
						async: false,
						data: {
							tipocorreo:"cerrar",
							nombre:"Javier",
							telefono:"5514284951",
							email:"javjava@gmail.com",
							mensaje:"Hola",
							Id_Solicitud_Correo:Id_Solicitud
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
					*/
				}
				
				$('#display_seguimiento').DataTable().ajax.reload();
				$('#display_por_cerrar').DataTable().ajax.reload();	
				$('#tablacerrado').DataTable().ajax.reload();
				limpiarcampos_tabcalificacion();
				$(".close").click();
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
			}
		});
	
	}	
	
	function cargar_calificacion(Id_Solicitud){
		
		if(Id_Solicitud!=""){
			var strDatos="";
			strDatos="Id_Solicitud="+Id_Solicitud;
			strDatos+="&accion=consultar";
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_ticket_calificacion/Siga_ticket_calificacionFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {
			
				},
				success: function (datos) {
					var json;
					json = eval("(" + datos + ")"); //Parsear JSON
					if(json.totalCount>0){
						
								$("#Solucion").val(json.data[0].Desc_Comentario1);
								
								if(json.data[0].Id_Respuesta1==5){
									$("#faces-1-1").prop('checked', true); 
								}else{
									if(json.data[0].Id_Respuesta1==4){
										$("#faces-1-2").prop('checked', true); 
									}else{
										if(json.data[0].Id_Respuesta1==3){
											$("#faces-1-3").prop('checked', true); 
										}else{
											if(json.data[0].Id_Respuesta1==2){
												$("#faces-1-4").prop('checked', true); 
											}else{
												if(json.data[0].Id_Respuesta1==1){
													$("#faces-1-5").prop('checked', true); 
												}
											}
										}
									}	
								}
							
							
							
							
								$("#Actitud").val(json.data[0].Desc_Comentario2);
								
								
								if(json.data[0].Id_Respuesta2==5){
									$("#faces-2-1").prop('checked', true); 
								}else{
									if(json.data[0].Id_Respuesta2==4){
										$("#faces-2-2").prop('checked', true); 
									}else{
										if(json.data[0].Id_Respuesta2==3){
											$("#faces-2-3").prop('checked', true); 
										}else{
											if(json.data[0].Id_Respuesta2==2){
												$("#faces-2-4").prop('checked', true); 
											}else{
												if(json.data[0].Id_Respuesta2==1){
													$("#faces-2-5").prop('checked', true); 
												}
											}
										}
									}	
								}
							
							
							
								$("#TiempoRespuesta").val(json.data[0].Desc_Comentario3);
								
								if(json.data[0].Id_Respuesta3==5){
									$("#faces-3-1").prop('checked', true); 
								}else{
									if(json.data[0].Id_Respuesta3==4){
										$("#faces-3-2").prop('checked', true); 
									}else{
										if(json.data[0].Id_Respuesta3==3){
											$("#faces-3-3").prop('checked', true); 
										}else{
											if(json.data[0].Id_Respuesta3==2){
												$("#faces-3-4").prop('checked', true); 
											}else{
												if(json.data[0].Id_Respuesta3==1){
													$("#faces-3-5").prop('checked', true); 
												}
											}
										}
									}	
								}
							
						
						
					}
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
		
	}
	
	function limpiarcampos_tabcalificacion(){
		$("#faces-1-1").prop('checked', false); 
		$("#faces-1-2").prop('checked', false);
		$("#faces-1-3").prop('checked', false);
		$("#faces-1-4").prop('checked', false);
		$("#faces-1-5").prop('checked', false);
		$("#Solucion").val("");

		$("#faces-2-1").prop('checked', false); 
		$("#faces-2-2").prop('checked', false);
		$("#faces-2-3").prop('checked', false); 
		$("#faces-2-4").prop('checked', false);
		$("#faces-2-5").prop('checked', false);
		$("#Actitud").val("");
		
		$("#faces-3-1").prop('checked', false); 
		$("#faces-3-2").prop('checked', false);
		$("#faces-3-3").prop('checked', false);
		$("#faces-3-4").prop('checked', false);
		$("#faces-3-5").prop('checked', false);
		$("#TiempoRespuesta").val("");
	}
	    
	function cargachat() {
		$("#divChat").html("");
		var idsolicitud=$("#Id_Solicitud").val();
		if(idsolicitud!=""){
			if(idsolicitud!=undefined){
				var resultado=new Array();
				data={accion: "consultar",Id_Solicitud:idsolicitud};
				resultado=cargo_cmb("../fachadas/activos/siga_ticket_chat/Siga_ticket_chatFacade.Class.php",false, data);

				var htmlDiv = '';
				var li_img="";
				var li_img_chat="";
				var li_arch_chat="";
				for(var i = 0; i < resultado.totalCount; i++)
				{
					if(resultado.data[i].Url_Adjunto!=""){
						var arch_img_chat="";
						arch_img_chat=resultado.data[i].Url_Adjunto.toString().split(".");
						for(var k=0; k<array_img.length;k++){
							if(array_img[k].toString()==arch_img_chat[1].toUpperCase()){
								
								li_img_chat+='<li>';
								li_img_chat+='  <a href="#">';
								li_img_chat+='	<a href="../Archivos/Archivos-Chat/'+resultado.data[i].Url_Adjunto+'" target="_blank">Ver Imágen</a>';
								//li_img+='	<span class="name">listadoProd.xls</span>';
								li_img_chat+='  </a>';
								li_img_chat+='</li>';
							}
						}
						$("#div_adjuntos_chat_imagenes").html(imagenes_adjuntos+li_img_chat);
						//Fin Imagenes
						
						//Archivos
						var arch_arch_chat="";
						arch_arch_chat=resultado.data[i].Url_Adjunto.toString().split(".");
						for(var l=0; l<array_arch.length;l++){
							if(array_arch[l].toString()==arch_arch_chat[1].toUpperCase()){
								
								li_arch_chat+='<li>';
								li_arch_chat+='  <a href="#">';
								li_arch_chat+='	<a href="../Archivos/Archivos-Chat/'+resultado.data[i].Url_Adjunto+'" target="_blank">Ver Archivo</a>';
								//li_img+='	<span class="name">listadoProd.xls</span>';
								li_arch_chat+='  </a>';
								li_arch_chat+='</li>';
							}
						}
						$("#div_adjuntos_chat_archivos").html(archivos_adjuntos+li_arch_chat);
						//Fin Archivos
					}
				
				
							htmlDiv += '<!-- Message. Default to the left -->';
							if (resultado.data[i].Id_Estatus_Proceso == 1)
							{
								//Verifica si existe la ruta de la imagen (Solicitante)
								var existe_img=new Array();
								var Url_img="http://192.168.1.234/Fotos/"+resultado.data[i].No_Empl_Solicitante+".jpg";
								var Ruta="";
								data={accion: "existe_archivo",Url:Url_img};
								existe_img=cargo_cmb("../fachadas/activos/Existe_Archivo/Existe_ArchivoFacade.Class.php",false, data);	
								
														if(existe_img.totalCount){
								Ruta='<img class="direct-chat-img" src="'+Url_img+'" alt="message user image">';
								}else{
								Ruta='<img class="direct-chat-img" src="../dist/img/boxed-bg.jpg" alt="message user image">';
								}
							 //Fin
							 htmlDiv +='<div class="direct-chat-msg">'+
		'                        <div class="direct-chat-info clearfix">'+
		'                          <span class="direct-chat-name pull-left">'+resultado.data[i].Nombre_Usuario+'</span>'+
		'                          <span class="direct-chat-timestamp pull-right">'+resultado.data[i].Fecha_Alta+'</span>'+
		'                        </div>'+
								 Ruta+
								'<div class="direct-chat-text">';
								 if(resultado.data[i].Url_Adjunto!=""){
									if(resultado.data[i].Mensaje!="Archivo"){
										htmlDiv +=resultado.data[i].Mensaje+'<br>';
									}	
									htmlDiv+='	<a href="../Archivos/Archivos-Chat/'+resultado.data[i].Url_Adjunto+'" target="_blank">Ver Adjunto</a>';
								 }else{
									htmlDiv +=resultado.data[i].Mensaje;	
								 }
							htmlDiv +='</div>'+
		'                        <!-- /.direct-chat-text -->'+
		'                      </div>';
							}
							if (resultado.data[i].Id_Estatus_Proceso == 2)
							{
								//Verifica si existe la ruta de la imagen (Gestor)
								var existe_img_g=new Array();
								var Url_img_g="http://192.168.1.234/Fotos/"+resultado.data[i].No_Empl_Gestor+".jpg";
								var Ruta_g="";
								data={accion: "existe_archivo",Url:Url_img_g};
								existe_img_g=cargo_cmb("../fachadas/activos/Existe_Archivo/Existe_ArchivoFacade.Class.php",false, data);	
								
														if(existe_img_g.totalCount){
								Ruta_g='<img class="direct-chat-img" src="'+Url_img_g+'" alt="message user image">';
								}else{
								Ruta_g='<img class="direct-chat-img" src="../dist/img/boxed-bg.jpg" alt="message user image">';
								}
							 //Fin
							 
							
								htmlDiv +='<!-- /.direct-chat-msg -->'+
		'                      <!-- Message to the right -->'+
		'                      <div class="direct-chat-msg right">'+
		'                        <div class="direct-chat-info clearfix">'+
		'                          <span class="direct-chat-name pull-right">'+resultado.data[i].Nombre_Gestor+'</span>'+
		'                          <span class="direct-chat-timestamp pull-left">'+resultado.data[i].Fecha_Alta+'</span>'+
		'                        </div>'+Ruta_g+'<div class="direct-chat-text">';
								 if(resultado.data[i].Url_Adjunto!=""){
									
									if(resultado.data[i].Mensaje!="Archivo"){
										htmlDiv +=resultado.data[i].Mensaje+'<br>';
									}	
									htmlDiv+='	<a href="../Archivos/Archivos-Chat/'+resultado.data[i].Url_Adjunto+'" target="_blank">Ver Adjunto</a>';
								 }else{
									htmlDiv +=resultado.data[i].Mensaje;	
								 }
								 htmlDiv +='</div>';
		'                        <!-- /.direct-chat-text -->'+
		'                      </div>';
							}
							
							if(resultado.data[i].Url_Adjunto!=""){
								archivos=resultado.data[i].Url_Adjunto.toString().split(".");
								for(var j=0; j<array_img.length;j++){
									if(array_img[j].toString()==archivos[1].toUpperCase()){
										li_img+='<li>';
										li_img+='  <a href="#">';
										li_img+='	<a href="../Archivos/Archivos-Chat/'+resultado.data[i].Url_Adjunto+'" target="_blank">Ver Imágen</a>';
										//li_img+='	<span class="name">listadoProd.xls</span>';
										li_img+='  </a>';
										li_img+='</li>';
									}
								}
							}
				}
				//$("#div_adjuntos_chat_imagenes").append(li_img);
				$("#divChat").html(htmlDiv);
			}
		}
	}	
	
	/////////////////////////////////////////////////////////////////////////////////////////
	///Actividades que se ligan a la mesa de ayuda
	/////////////////////////////////////////////////////////////////////////////////////////
	
	//Variables
	var cont_array_actividades_M=0;
	var array_actividades_M=[];
	array_actividades_M[0]="S";
	
	var url_direccion_archivos="";
	
	carga_actividades=function(id) {
		url_direccion_archivos="";
	
		$("#Id_Actividad").val("");
        cont_array_actividades_M=0;
		array_actividades_M=[];
		array_actividades_M[0]="S";
		$("#datos_actividades").html("");
		$("#Muestro_Agregados").html("");
		
		$("#Mant_RAC1").val("");
		$("#Mant_RAC2").val("");
		$("#Mant_RAC3").val("");
		$("#Mant_RAC4").val("");
		$("#Horas").val("");
		$("#Costos_Materiales_CE").val("");
		$("#Mano_Obra_CE").val("");
		$("#Total_CE").val("");
		$("#Ahorro").val("");
		$("#Costos_Materiales_CI").val("");
		$("#Mano_Obra_CI").val("");
		$("#Total_CI").val("");
		if (id != "") {
			
			//Contador que valida si los estatus ok, fallo y no aplica estan checkeados
			var cont_est_act=0;
			
            $.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",
                async: false,
                data: {
					Estatus_Reg:"1",
                    Id_Actividad: id,
                    accion: "consultar_actividades"
                },
                dataType: "html",
                beforeSend: function (xhr) {

                },
                success: function (data) {
                    data = eval("(" + data + ")");
                    if (data.totalCount > 0) {
						var vista_imagen=false;
						var contenido="";
						var Estatus_Fech_Real=0;
						if(data.data[0].Tipo_Actividad=="1"){
							url_direccion_archivos="../Archivos/Archivos-Actividades/Mantenimiento-Predictivo";
						}else{						
							if(data.data[0].Tipo_Actividad=="2"){
								url_direccion_archivos="../Archivos/Archivos-Actividades/Mantenimiento-Preventivo";
							}else{
								if(data.data[0].Tipo_Actividad=="3"){
									url_direccion_archivos="../Archivos/Archivos-Actividades/Mantenimiento-Correctivo";
								}else{
									if(data.data[0].Tipo_Actividad=="4"){
										url_direccion_archivos="../Archivos/Archivos-Actividades/Capacitaciones";
									}
								}
							}
						}
						for(var i=0;i < data.totalCountDetalle; i++){
							var Fecha_Prog="";
							var Fecha_Real="";
							
							Fecha_Prog=data.data_det[i].Fecha_Programada[6]+''+data.data_det[i].Fecha_Programada[7]+'/'+data.data_det[i].Fecha_Programada[4]+''+data.data_det[i].Fecha_Programada[5]+'/'+data.data_det[i].Fecha_Programada[0]+''+data.data_det[i].Fecha_Programada[1]+''+data.data_det[i].Fecha_Programada[2]+''+data.data_det[i].Fecha_Programada[3];
							
							if(data.data_det[i].Fecha_Realizada.trim()!=""){
								Fecha_Real=data.data_det[i].Fecha_Realizada[6]+''+data.data_det[i].Fecha_Realizada[7]+'/'+data.data_det[i].Fecha_Realizada[4]+''+data.data_det[i].Fecha_Realizada[5]+'/'+data.data_det[i].Fecha_Realizada[0]+''+data.data_det[i].Fecha_Realizada[1]+''+data.data_det[i].Fecha_Realizada[2]+''+data.data_det[i].Fecha_Realizada[3];	
								Estatus_Fech_Real=1;
							}
							
							cont_array_actividades_M=i;
							array_actividades_M[cont_array_actividades_M]="S";
							contenido+='<tr id="Contenido_tr'+i+'">';
							contenido+='  <td>';
							contenido+='    <div class="form-group" style="width:30px;font-size: 11px"  align="center" >';
							contenido+='      <input type="hidden" id="Id_Det_Actividad'+i+'" value="'+data.data_det[i].Id_Det_Actividad+'">';
							contenido+=       data.data_det[i].Num_Actividad.trim();
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group" style="font-size:11px">';
							contenido+=		data.data_det[i].Nombre_Actividad.trim();
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group" style="font-size:11px">';
							contenido+=		data.data_det[i].Valor_Referencia;
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group">';
							contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Valor_Medido'+i+'" style="font-size: 11px;" disabled>'+data.data_det[i].Valor_Medido+'</textarea>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							contenido+='  	<input type="radio" id="radio_ok'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="1"){contenido+=' checked ';cont_est_act=cont_est_act+1;}contenido+='disabled>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							contenido+='  	<input type="radio" id="radio_fallo'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="2"){contenido+=' checked ';cont_est_act=cont_est_act+1;}contenido+='disabled>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							contenido+='  	<input type="radio" id="radio_no_aplica'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="3"){contenido+=' checked ';cont_est_act=cont_est_act+1;}contenido+='disabled>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							if(data.data_det[i].V_Mesa==1){
								contenido+='  	<input type="checkbox" id="check_vincular_mesa_ayuda'+i+'" checked disabled>';
							}else{
								contenido+='  	<input type="checkbox" id="check_vincular_mesa_ayuda'+i+'" disabled>';
							}
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group">';
							contenido+='      <textarea rows="2" class="form-control" placeholder="(200 caracteres)" id="observaciones'+i+'" style="font-size: 10px;" disabled>'+data.data_det[i].Observaciones+'</textarea>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='   <div class="form-group" align="center">';
							contenido+='      <div id="div_input_dymanic'+i+'"><input name="imagenes[]" type="file" multiple="multiple" class="file-loading" id="upload_adjuntos'+i+'" disabled></div>';
							contenido+='      <input type="hidden"  id="url_det_adjuntos'+i+'">';
							contenido+='      <div id="divVer_Imagen'+i+'">';
							if(data.data_det[i].Url_Adjunto!=null && data.data_det[i].Url_Adjunto!=""){
								contenido+='<a href="'+url_direccion_archivos+'/'+data.data_det[i].Url_Adjunto+'" target="_blank">Ver Im&aacute;gen</a>';
							}
							contenido+='	  </div>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='<td style="font-size:11px">';
							contenido+=		Fecha_Prog;
							contenido+='</td>';
							contenido+='<td>';
							contenido+='  <div class="input-group date">';
							//contenido+='	<div class="input-group-addon">';
							//contenido+='	  <i class="fa fa-calendar"></i>';
							//contenido+='	</div>';
							contenido+='	<input type="text" class="form-control pull-right datepicker" onclick="Cambio_Fecha_Reali_Array('+i+', '+data.totalCountDetalle+')" id="fecha_realizada'+i+'" style="font-size: 11px;" value="'+Fecha_Real+'" disabled>';
							contenido+='  </div>';
							contenido+='</td>';
							contenido+='</tr>';
						}
						
						$("#Muestro_Agregados").html(contenido);
						
						
						for(var k=0;k < data.totalCountDetalle; k++){
							//Pasar imagenes a la tabla dinamica
							if (data.data_det[k].Url_Adjunto.length>0){
								var hidden_url="url_det_adjuntos"+k;
								var file_adjuntos="upload_adjuntos"+k;
								var nombre_url=data.data_det[k].Url_Adjunto;
								
								cargarimagenes(hidden_url, file_adjuntos, nombre_url, false, k);
							}
							else{
								var file_adjuntos="upload_adjuntos"+k;
								var hidden_url="url_det_adjuntos"+k;
								subirimagenes(file_adjuntos, hidden_url, false, k);
							}							
						}
						
						//Date picker
						$('.datepicker').datepicker({
							format: 'dd/mm/yyyy'
						});
						
						//pasar valores datos de la actividad
						var Datos_Actividades='';
						Datos_Actividades+='';
						Datos_Actividades+=' <span><strong>Nombre Rutina: </strong></span> <span style="color: #666;font-weight: normal;" >'+data.data[0].Nombre_Rutina+'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						Datos_Actividades+=' <span><strong>Descripción Corta: </strong></span> <span style="color: #666;font-weight: normal;">'+data.data[0].Descripcion+'</span>';
						Datos_Actividades+='';
						
						$("#datos_actividades").html(Datos_Actividades);
						
						//Pasar valores costos
						$("#Mant_RAC1").val(data.data[0].Mant_RAC1);
						$("#Mant_RAC2").val(data.data[0].Mant_RAC2);
						$("#Mant_RAC3").val(data.data[0].Mant_RAC3);
						$("#Mant_RAC4").val(data.data[0].Mant_RAC4);
						$("#Horas").val(data.data[0].Horas);
						$("#Costos_Materiales_CE").val(data.data[0].Costos_Materiales_CE);
						$("#Mano_Obra_CE").val(data.data[0].Mano_Obra_CE);
						$("#Total_CE").val(data.data[0].Total_CE);
						$("#Costos_Materiales_CI").val(data.data[0].Costos_Materiales_CI);
						$("#Mano_Obra_CI").val(data.data[0].Mano_Obra_CI);
						$("#Total_CI").val(data.data[0].Total_CI);
						$("#Ahorro").val(data.data[0].Ahorro);
					}
                },
                error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
        }
    }
	
	function cargarimagenes(hidden_url, file_adjuntos, nombre_url, vista_imagen, Posicion){
		$("#"+hidden_url).val(nombre_url);
		$('#'+file_adjuntos).fileinput({
			uploadUrl: "../Archivos/upload.php?carpeta="+url_direccion_archivos+"",
			uploadAsync: true,
			showUpload: true,
			showRemove: false,
			showPreview: vista_imagen,
			maxFileCount: 0,
			minFileCount: 0,
			browseClass: "btn chs",
			validateInitialCount: true,
			language: 'es',
			
			initialPreviewConfig: [{
			caption: '' + nombre_url + '', 
			width: '100px',
			url: '../Archivos/borrar.php?carpeta='+url_direccion_archivos+'', 
			key: '' + nombre_url + '',  
			extra: { id: 100 }
			}]
			, initialPreview: [
			//NOMBRE IMAGEN CARGADA OBTENER EL NOMBRE DE LA CAJA DE TEXTO
			"<img src='"+url_direccion_archivos+"/" + nombre_url + "' class='kv-preview-data file-preview-image' style='width:auto;height:160px;' alt='Imagen Cargada' title='Imagen Cargada'>"
			]
		});
		
		//Cargar Archivo
		$('#'+file_adjuntos).on('fileuploaded', function (event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			$('#'+hidden_url).val(response.initialPreviewConfig[0].caption);
			$('#divVer_Imagen'+Posicion).html('<a href="'+url_direccion_archivos+'/'+response.initialPreviewConfig[0].caption+'" target="_blank">Ver Im&aacute;gen</a>');
		});
		
		$('#'+file_adjuntos).on('filereset', function (event) {
			$('#'+hidden_url).val("");
			
			$('#divVer_Imagen'+Posicion).html("");
		});
		
	}
	
	function subirimagenes(file_adjuntos, url_hidden, vista_imagen, Posicion){
		//inicializar el file upload
		$('#'+file_adjuntos).fileinput({
			uploadUrl: "../Archivos/upload.php?carpeta="+url_direccion_archivos+"",
			uploadAsync: true,
			showUpload: true,
			showRemove: false,
			showPreview: vista_imagen,
			//showCaption: false,
			maxFileCount: 1,
			minFileCount: 0,
			browseClass: "btn chs",
			validateInitialCount: true,
			language: 'es'
		});
		//Cargar Archivo
		$('#'+file_adjuntos).on('fileuploaded', function (event, data, previewId, index) {
			
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			$('#'+url_hidden).val(response.initialPreviewConfig[0].caption);
			$('#divVer_Imagen'+Posicion).html('<a href="'+url_direccion_archivos+'/'+response.initialPreviewConfig[0].caption+'" target="_blank">Ver Im&aacute;gen</a>');
		});
		
		//Eliminar Archivo desde la imagen
		$('#'+file_adjuntos).on('filereset', function (event, data, previewId, index) {
			$('#'+url_hidden).val("");
			$('#divVer_Imagen'+Posicion).html("");
		});
		
		
		//$('#'+file_adjuntos).on('fileclear', function (event) {
		//	$('#'+url_hidden).val("");
		//	$('#Ver_Imagen'+Posicion).hide();
		//});
		
	}
	
	
	/////////////////////////////////////////////////////////////////////////////////////////
	///Fin Actividades que se ligan a la mesa de ayuda
	/////////////////////////////////////////////////////////////////////////////////////////
	
</script>