<?php
	$Id_Solicitud=$_GET['key'];
	$Tab=$_GET['tab'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ticket</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- File Input -->
  <link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- fullCalendar -->
  <link rel="stylesheet" href="../plugins/fullcalendaryear/fullcalendar.css">
  <link rel="stylesheet" href="../plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-collapse">
 <input type="hidden" id="Id_Solicitud">
  <input type="hidden" id="No_Empleado_chat">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content">
        <div class="modal-body nopsides">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs azulf" role="tablist">
            <li role="presentation" class="<?php if($Tab==1){ echo "active";} ?>"><a id="tab_datos_generales" href="#datos" aria-controls="datos" role="tab" data-toggle="tab">Datos Generales</a></li>
            <li role="presentation" class="<?php if($Tab==2||$Tab=="2-1"){ echo "active";} ?>"><a id="tab_chat_seguimiento" href="#chat" aria-controls="chat" role="tab" data-toggle="tab">Chat Seguimiento</a></li>
            <li role="presentation"><span class="label label-success" id="Indicador_Adjuntos" style="display:none"></span><a id="tab_adjuntos" href="#adjuntos" aria-controls="adjuntos" role="tab" data-toggle="tab">Adjuntos</a></li>
          </ul>
          <div class="tab-content">
            <!--Datos del Ticket-->
            <div role="tabpanel" class="tab-pane <?php if($Tab==1){ echo "active";} ?>" id="datos">
              <div class="box-body">
                <div class="col-md-14 col-md-offset-1">
                  <div class="col-md-3">
                    <ul class="heads">
                      <li><span id="text_Numsolicitud">No. Solicitud de ayuda</span> <span style="color: #666;font-weight: normal;" id="spanNumsolicitud1"></span></li>
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
                      <li><span>Gestor</span> <span style="color: #666;font-weight: normal;" id="spanGestor1"></span></li>
                      <li style="display:none"><span>Dirección Ip</span> <span style="color: #666;font-weight: normal;" id="spanDireccion_Ip1"></span></li>
                      <li><span>Extensión</span> <span style="color: #666;font-weight: normal;" id="spanExtension_Tel1"></span></li>
											<li><input type="button" class="btn btn-success btn-xs" value="Asignar Activo" style="display: inline-block;" onclick="ver_activos()" id="relacionar_activo"> <span style="color: #666;font-weight: normal;" id="spanActivos"></span></li>
                    </ul>
                  </div>

                  <div class="col-md-8">
                    <div id="div_seccion_dat_gener">
                      <ul class="inline center" id="divSeccion">
                      </ul>
                    </div>
                    <br>
                    <!---->
                    <ul class="inline center" id="ul_lo_realiza">
                      <li><strong>Lo Realiza</strong></li>
                      <li>
                        <div class="form-group">
                          <div class="checkbox icheck">
                            <label>
                            <input type="radio" value="0" id="Realiza_Interno" name="chkLorealiza" checked="checked">INTERNO</label>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="form-group">
                          <div class="checkbox icheck">
                            <label>
                            <input type="radio" value="1" id="Realiza_Externo" name="chkLorealiza">EXTERNO</label>
                          </div>
                        </div>
                      </li>
                    </ul>

                    <br>
                    <div class="col-md-6">
                      <div class="form-group">
                        <span><font color="red">*</font></span>
                        <label class="control-label" style="font-size: 11px;">Categoría</label>
                        <select class="form-control" id="cmbcategoria">
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <span><font color="red">*</font></span>
                        <label class="control-label" style="font-size: 11px;">Subcategoria</label>
                        <select class="form-control" id="cmbsubcategoria">
                          <option value="-1">--Subcategoría--</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <span><font color="red">*</font></span>
                        <label class="control-label" style="font-size: 11px;">Titulo Reporte</label>
                        <input type="text" class="form-control" id="Titulo" placeholder="Titulo Reporte" readonly>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <span><font color="red">*</font></span>
                        <label class="control-label" style="font-size: 11px;">Descripción Detallada de lo Reportado</label>
                        <textarea rows="7" class="form-control" id="Descripcion" placeholder="Descripción Detallada de lo Reportado(500 caracteres)" readonly style="display:none;"></textarea>																																
												<p id="DescripcionHtml" style="border-style: solid; border-color: #cccccc; background-color:#f0f0f0; border-width: thin; overflow-wrap: anywhere; padding: 5px 5px 5px 5px;"></p>
                      </div>
                    </div>
								

                    <br>
                    <div id="div_prioridad_dat_gener">
                      <ul class="inline center">
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
                    <div class="col-md-12">
                      <div id="divUsuarioReasignar" style="display:inline">
                        <span id="asterisco_gestores" style="display:none"><font color="red">*</font></span>
                        <label id="label_gestores" class="control-label" style="font-size: 11px;display:none">Gestores</label>
                        <select id="numempleadoresguardo" class="demo-default" placeholder="Gestor Seguimiento" style="display:none">
                        </select>
                        <div id="gifcargandoaltausuarios" style="display:none" align="center">
                          <img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
                        </div>
                      </div>
                      
                    </div>
                  </div>
									<div class="col-md-11" align="center" id="tabla_cancelacion" style="display:none">
										<table border="3" bordercolor="red" width="100%">
											<tbody>
												<tr>
													<td><strong>Motivo de la Cancelación: </strong><span id="Motivo_Cancelacion"></span></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
              </div>
              <div class="modal-footer" style="display:none">
                <button type="button" class="btn chs" id="cambiar_area" type="button" onclick="abrir_modal_cambiar_area()">Cambiar de &Aacute;rea</button>
                <button type="button" class="btn chs" id="seguimiento">Dar seguimiento</button>
                <button type="button" class="btn chs" id="reasignar">Dividir Ticket</button>
                <button type="button" class="btn chs" id="Cancelar_reasig" style="display:none">Cancelar</button>
							</div>
            </div>
            <!--Fin Datos del Ticket-->

            <!--Chat Ticket-->
            <div role="tabpanel" class="tab-pane <?php if($Tab==2||$Tab=="2-1"){ echo "active";} ?>" id="chat">
              <div class="box-body">
                <div class="col-md-10 col-md-offset-1">
                  <div class="col-md-5">
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
                      <li style="display:none"><span>Dirección Ip</span> <span style="color: #666;font-weight: normal;" id="spanDireccion_Ip2"></span></li>
                      <li><span>Extensión</span> <span style="color: #666;font-weight: normal;" id="spanExtension_Tel2"></span></li>
											<li style="display:none" id="li_enviar_preregistro"><input type="button" class="btn btn-primary"  value="Enviar Pre registro" onclick="ver_preregistro()" style="display: inline-block;" id="enviar_prer_egistro"> <span style="color: #666;font-weight: normal;" id="spanpreregistro"></span></li>
									
										</ul>
                  </div>
                  <div class="col-md-7">
                    <div class="col-md-12">
                      <!-- DIRECT CHAT -->
                      <div class="box">
                        <div class="box-header azul" style="background:#19294a">
                          <h5 class="box-title" id="title_chat"></h5>
													<div class="box-tools pull-right" style="display:none">
                            <span data-toggle="tooltip" title="3 New Messages" class="badge bg-blue">3</span>
                            <button type="button" class="btn btn-box-tool"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <!-- Conversations are loaded here -->
                          <div class="direct-chat-messages" id="divChat">
													</div>
                          <!--/.direct-chat-messages-->
												</div>
                        <!-- /.box-body -->
                        <div class="box-footer" style="display:none">
                          <div class="input-group">
                            <input type="text" name="message" placeholder="Escribe tu mensaje ..." id="Mensaje" class="form-control" maxlength="1000">
                            <span class="input-group-btn">
															<button id="btnsubir_imagenes_chat" type="button" data-toggle="modal" data-target="#Modal_Adjuntos_Imagenes" class="btn chs btn-flat" onclick="imagenes_chat()"><i class="fa fa-paperclip" aria-hidden="true"></i></button>
															<button type="button" id="botonEnviar" class="btn chs btn-flat">Enviar</button>
														</span>
                          </div>
                        </div>
                        <!-- /.box-footer-->
                      </div>
                      <!--/.direct-chat -->
                    </div>
                    <!-- /.col -->
                  </div>
                </div>
              </div>
              <div class="modal-footer">
              </div>
						</div>
            <!--Fin Chat Ticket-->

            <!--Adjuntos Ticket-->
            <div role="tabpanel" class="tab-pane" id="adjuntos">
              <div class="col-md-3">
								<ul class="nav nav-pills nav-stacked file-browser">
                  <li class="active"><a href="#tab_a" data-toggle="pill">Docs</a></li>
                  <li><a href="#tab_b" data-toggle="pill">Imagenes</a></li>
								</ul>
							</div>
              <!-- col-md-4 -->

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
                </div>
                <!-- tab content -->
              </div>
            </div>
            <!--Fin Adjuntos Ticket-->
          </div>
        </div>
      </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <div class="control-sidebar-bg"></div>
		
		<div class="modal fade modalchs" id="Modal_enviar_preregistro">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" data-dismiss="modal" >
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Pre registro</h4>
          </div>
					
					<div class="col-md-12" align="center">
						<label class="control-label" style="font-size: 11px;">DATOS DE LA CIRUGÍA</label>
					</div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Procedimiento</label>	
              <input  class="form-control" id="Pre_Re_Procedimiento" placeholder="Procedimiento" readonly>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Fecha/Hora Cirugía</label>	
              <input  class="form-control" id="Pre_Re_Fecha_Hora_Cirugia" placeholder="Fecha/Hora Cirugía" readonly>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Quirófano</label>	
              <input  class="form-control" id="Pre_Re_Quirofano" placeholder="Quirófano" readonly>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Paciente</label>	
              <input  class="form-control" id="Pre_Re_Paciente" placeholder="Paciente" readonly>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Cirujano</label>	
              <input  class="form-control" id="Pre_Re_Cirujano" placeholder="Cirujano" readonly>
            </div>
          </div>
					<div class="col-md-12" align="center">
						<label class="control-label" style="font-size: 11px;">DATOS DEL POVEEDOR</label>
					</div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Empresa</label>	
              <input  class="form-control" id="Pre_Re_Empresa" placeholder="Empresa" readonly>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Nombre Proveedor</label>	
              <input  class="form-control" id="Pre_Re_Nombre_Proveedor" placeholder="Nombre Proveedor" readonly>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Teléfono</label>	
              <input  class="form-control" id="Pre_Re_Telefono" placeholder="Teléfono" readonly>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Correo</label>	
              <input  class="form-control" id="Pre_Re_Correo" placeholder="Correo" readonly>
            </div>
          </div>
					<div class="col-md-12" align="center">
						<label class="control-label" style="font-size: 11px;">DATOS DEL EQUIPO</label>
					</div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Nombre</label>	
              <input  class="form-control" id="Pre_Re_Nombre" placeholder="Nombre" readonly>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Marca</label>	
              <input  class="form-control" id="Pre_Re_Marca" placeholder="Marca" readonly>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Modelo</label>	
              <input  class="form-control" id="Pre_Re_Modelo" placeholder="Modelo" readonly>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">No. Serie</label>	
              <input  class="form-control" id="Pre_Re_No_Serie" placeholder="No. Serie" readonly>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Cantidad de Equipos</label>	
              <input  class="form-control" id="Pre_Re_Cantidad_Equipos" placeholder="Cantidad de Equipos" readonly>
            </div>
          </div>
					<div class="col-md-12">
						<hr>
						<div class="form-group" align="center">
							<label class="control-label" style="font-size: 11px;">Accesorios</label>
						</div>
						</hr>
          </div>
					<table class="table" id="tbl_accesorios_act_pre">
						<tbody id="body_accesorios_act_pre" border="0">
							
						</tbody>
					</table>
					
							
					<div class="col-md-12">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" style="font-size: 11px;">Observaciones</label>	
              <textarea  class="form-control" id="Pre_Re_Observaciones" placeholder="Observaciones" readonly></textarea>
            </div>
          </div>
          
					
					
        </div>
      </div>
    </div>
		
		
		<div class="modal fade modalchs" id="Modal_seguimiento_ticket" >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" data-dismiss="modal" >
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Activos</h4>
          </div>
					
					
					
          <div class="modal-body nopsides">
						
					
						
						<div class="col-md-12"  id="div_asignar_activo_externo" style="display:none">
							<div class="col-md-12">
								<hr>
								<div class="form-group" align="center">
									<label class="control-label" style="font-size: 11px;">DATOS DEL PROVEEDOR</label>
								</div>
								</hr>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<span><font color="red">*</font></span>
									<label class="control-label" style="font-size: 11px;">Empresa (Razón Social)</label>	
                  <input type="text" class="form-control" id="Empresa_Ext" placeholder="Empresa" readonly>
                </div>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<span><font color="red">*</font></span>
									<label class="control-label" style="font-size: 11px;">Nombre Completo de Contacto</label>	
                  <input type="text" class="form-control" id="Nombre_Completo_Ext" placeholder="Nombre Proveedor" readonly>
                </div>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<label class="control-label" style="font-size: 11px;">Teléfono</label>	
                  <input type="text" class="form-control" id="Telefono_Ext" placeholder="Teléfono" readonly>
                </div>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<span><font color="red">*</font></span>
									<label class="control-label" style="font-size: 11px;">Correo</label>	
                  <input type="text" class="form-control" id="Correo_Ext" placeholder="Correo" readonly>
                </div>
              </div>
							
							<div class="col-md-12">
								<hr>
								<div class="form-group" align="center">
									<label class="control-label" style="font-size: 11px;">DATOS DEL EQUIPO</label>
								</div>
								</hr>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<span><font color="red">*</font></span>
									<label class="control-label" style="font-size: 11px;">Nombre Activo</label>	
                  <input type="text" class="form-control" id="Nombre_Act_Ext" placeholder="Nombre Activo" readonly>
                </div>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<label class="control-label" style="font-size: 11px;">Marca</label>	
                  <input type="text" class="form-control" id="Marca_Act_Ext" placeholder="Marca" readonly>
                </div>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<label class="control-label" style="font-size: 11px;">Modelo</label>	
                  <input type="text" class="form-control" id="Modelo_Act_Ext" placeholder="Modelo" readonly>
                </div>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<label class="control-label" style="font-size: 11px;">No Serie</label>	
                  <input type="text" class="form-control" id="No_Serie_Act_Ext" placeholder="No. Serie" readonly>
                </div>
              </div>
							
							<div class="col-md-4">
                <div class="form-group">
									<span><font color="red">*</font></span>
									<label class="control-label" style="font-size: 11px;">Ubicación Primaria</label>	
									<input type="text" class="form-control" id="Ubic_Prim" placeholder="Ubicación Primaria" readonly>
                </div>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<span><font color="red">*</font></span>
									<label class="control-label" style="font-size: 11px;">Ubicación Secundaria</label>
									<input type="text" class="form-control" id="Ubic_Sec" placeholder="Ubicación Secundaria" readonly>
                </div>
              </div>
							
							<div class="col-md-12">
								<hr>
								<div class="form-group" align="center">
									<label class="control-label" style="font-size: 11px;">Accesorios</label>
								</div>
								</hr>
              </div>
							
							<table class="table" id="tbl_accesorios_act_ext">
								<tbody id="body_accesorios_act_ext" border="0">
									
								</tbody>
							</table>
							
						</div>
						
			
          </div>
        </div>
      </div>
    </div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- File Input -->
<script src="../plugins/fileinput/fileinput.js"></script>
<script src="../plugins/fileinput/fileinput_locale_es.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/fullcalendaryear/fullcalendar.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../js/Funciones.js"></script>
<script>
	var array_img=["PNG", "JPG", "BMP", "GIF"];
	var array_arch=["PDF", "DOCX", "DOC", "XLS","XLSX", "PPT","PPTX"];
	
	
	function cargacategoria(Id_Seccion) {
		var resultado=new Array();
		data={orden:'Desc_Categoria',accion: "consultar",Id_Seccion:Id_Seccion};
		resultado=cargo_cmb("../fachadas/activos/Siga_cat_ticket_categoria/Siga_cat_ticket_categoriaFacade.Class.php",false, data);
				$('#cmbcategoria').empty();
		if(resultado.totalCount>0){
			$('#cmbcategoria').append($('<option selected value="-1">', { value: "-1" }).text("--Categoría--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{
				if (resultado.data[i].Id_Categoria != '') 			
				$('#cmbcategoria').append($('<option>', { value: resultado.data[i].Id_Categoria }).text(resultado.data[i].Desc_Categoria));
			}
		}else{
			$('#cmbcategoria').append($('<option selected value="-1">', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	function bloqueardatosgenerales(bolean){
		$('#div_seccion_dat_gener').find(':radio[name=chkSoporte]').attr('disabled', bolean);
		$('#ul_lo_realiza').find(':radio[name=chkLorealiza]').attr('disabled', bolean);
	
		$("#cmbcategoria").prop('disabled', bolean);
		$("#cmbsubcategoria").prop('disabled', bolean);
		$("#Titulo").prop('disabled', bolean);
		$("#Descripcion").prop('disabled', bolean);
		
		$('#div_prioridad_dat_gener').find(':radio[name=prioridad]').attr('disabled', bolean);
	
		
		$("#seguimiento").prop('disabled', bolean);
	}
		

  $(document).ready(function(){
		var Id_Solicitud="<?php echo $Id_Solicitud; ?>";
		if(Id_Solicitud!=""){
			Estatus_Proceso();
		}
		
		function Estatus_Proceso() {
			var resultado=new Array();
			data={
				Id_Solicitud: Id_Solicitud,
				Estatus_Reg:'3',
				accion: "consultar"
			};
			resultado=cargo_cmb("../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",false, data);
			if(resultado.totalCount>0){
				var Estatus_Proceso="";
				Estatus_Proceso=resultado.data[0].Id_Estatus_Proceso;
				if(Estatus_Proceso!=""){
					pasarvalores(Id_Solicitud, Estatus_Proceso, "");
					cargachat();
				}
			}
		}
	
	
	
	
		
		
		
		
		
		
    function pasarvalores	(id, Estatus_Proceso, Estatus_Desh) {
			var Estatus_Deshabilita="";
			if(Estatus_Desh!=undefined){
				Estatus_Deshabilita=Estatus_Desh;
			}
			
			$("#Titulo").prop("readonly",true);
			$("#Descripcion").prop("readonly",true);
			$("#Titulo").prop("disabled",true);
			$("#Descripcion").prop("disabled",true);
			
			
			
			$("#url_documentos_adjuntos_chat").val("");
			//Controles Dividir ticket
			$("#hddEst_div_tick").val("");
			$("#hddId_Usuario").val("");
			$("#hddId_Area").val("");
			$("#hddId_Medio").val("");
			$("#hddId_Activo").val("");
			
			$("#hddActivo_Externo").val("");
			$("#hddAF_BC_Ext").val("");
			$("#hddNombre_Act_Ext").val("");
			$("#hddMarca_Act_Ext").val("");
			$("#hddModelo_Act_Ext").val("");
			$("#hddNo_Serie_Act_Ext").val("");
			$("#hddId_Ubic_Prim").val("");
			$("#hddId_Ubic_Sec").val("");
			
			
			
			
			$("#text_Numsolicitud").html("No. Solicitud de ayuda");
			//Controles Chat
			$("#botonEnviar").prop('disabled', false);
			$("#btnsubir_imagenes_chat").prop('disabled', false);
			$("#Mensaje").prop('disabled', false);
			$("#btnsubir_imagenes_chat").prop('disabled', false);
			//Controles Cierre
			$("#div_calificacion").hide();
			$("#botonCerrar").attr("disabled", false);
			if(Estatus_Proceso=="1"){
				$("#tab_datos_generales").show();
				$("#tab_chat_seguimiento").hide();
				$("#tab_adjuntos").show();
				$("#tab_cerrar_ticket").hide();
				$("#reasignar").show();
				$("#tab_datos_generales").click();
				$("#Cancelar_reasig").hide();
				if($("#hddTipo_Gestor").val()==2){
					$("#cambiar_area").hide();
				}
			}else{
				if(Estatus_Proceso=="2"){
					//$("#tab_datos_generales").show();
					$("#tab_chat_seguimiento").show();
					$("#tab_adjuntos").show();
					$("#tab_cerrar_ticket").show();
					$("#reasignar").show();
					//$("#tab_datos_generales").click();
					
					//$("#TituloCierre").prop('disabled', false);
					$("#ComentarioCierre").prop('disabled', false);
					$("#cmb_motivo_real").prop('disabled', false);
					$("#cmb_motivo_aparente").prop('disabled', false);
					$("#cmb_estatus_equipo").prop('disabled', false);
					$("#Cancelar_reasig").hide();
					$("#cambiar_area").hide();
				
					if(Estatus_Deshabilita=="1"){
						$("#btnsubir_imagenes_chat").prop('disabled', true);
						$("#Mensaje").prop('disabled', true);
						$("#botonEnviar").attr("disabled", true);
						$("#btn_guardar_actividades").attr("disabled", true);
						$("#botonCerrar").attr("disabled", true);
					
						
					}else{
						$("#btnsubir_imagenes_chat").prop('disabled', false);
						$("#Mensaje").prop('disabled', false);
						$("#botonEnviar").attr("disabled", false);
						$("#btn_guardar_actividades").attr("disabled", false);
						$("#botonCerrar").attr("disabled", false);
					
					}
					
				}else{
					if(Estatus_Proceso=="3"){
						
						$("#tab_datos_generales").hide();
						$("#tab_chat_seguimiento").show();
						$("#tab_adjuntos").show();
						$("#tab_cerrar_ticket").show();
						$("#reasignar").hide();
						$("#tab_cerrar_ticket").click();
						
						//$("#TituloCierre").prop('disabled', false);
						$("#ComentarioCierre").prop('disabled', false);
						$("#cmb_motivo_real").prop('disabled', false);
						$("#cmb_motivo_aparente").prop('disabled', false);
						$("#cmb_estatus_equipo").prop('disabled', false);
						$("#Cancelar_reasig").hide();
						$("#cambiar_area").hide();
						if(Estatus_Deshabilita=="1"){
							$("#btnsubir_imagenes_chat").prop('disabled', true);
							$("#Mensaje").prop('disabled', true);
							$("#botonEnviar").attr("disabled", true);
							$("#btn_guardar_actividades").attr("disabled", true);
							$("#botonCerrar").attr("disabled", true);
						}else{
							$("#btnsubir_imagenes_chat").prop('disabled', false);
							$("#Mensaje").prop('disabled', false);
							$("#botonEnviar").attr("disabled", false);
							$("#btn_guardar_actividades").attr("disabled", false);
							$("#botonCerrar").attr("disabled", true);
						}
					}else{
						if(Estatus_Proceso=="4"){
							$("#tab_datos_generales").hide();
							$("#tab_chat_seguimiento").show();
							$("#tab_adjuntos").show();
							$("#tab_cerrar_ticket").show();
							$("#reasignar").hide();
							$("#tab_cerrar_ticket").click();
							$("#cambiar_area").hide();
							//$("#TituloCierre").prop('disabled', true);
							$("#ComentarioCierre").prop('disabled', true);
							$("#cmb_motivo_real").prop('disabled', true);
							$("#cmb_motivo_aparente").prop('disabled', true);
							$("#cmb_estatus_equipo").prop('disabled', true);
							//Controles Chat
							$("#botonEnviar").prop('disabled', true);
							$("#Mensaje").prop('disabled', true);
							$("#btnsubir_imagenes_chat").prop('disabled', true);
							$("#Cancelar_reasig").hide();
						}	
					}
				}
				
			}
			
			if (id != "") {
				$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
					async: false,
					data: {
						Id_Solicitud: id,
						Estatus_Reg:'3',
						accion: "consultar"
					},
					dataType: "html",
					beforeSend: function (xhr) {
						jsShowWindowLoad("Cargando Informaci&oacuten.");
					},
					success: function (data) {
						data = eval("(" + data + ")");
						var Prioridad = "";
						if (data.totalCount > 0) {
							if(Estatus_Proceso==2){
								if(data.data[0].Id_Cirugia!=""){
									consulta_gtiqx(data.data[0].Id_Cirugia);
									if(data.data[0].Id_Activo!=""&&data.data[0].Activo_Externo==1&&data.data[0].Pre_Registro_Ext==1){
										$("#li_enviar_preregistro").show();	
										<?php if($Tab=="2-1"){ echo '$("#Modal_enviar_preregistro").modal("show");';} ?>
									}else{
										$("#li_enviar_preregistro").hide();
										$("#Modal_enviar_preregistro").modal("hide");
									}
								}else{
									$("#li_enviar_preregistro").hide();
									$("#Modal_enviar_preregistro").modal("hide");
								}
							}
							
							
							var Extension_Telef="";
							if(data.data[0].No_Usuario!=""){
								Extension_Telef=consult_ext_bd_nomina(data.data[0].No_Usuario);
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
							
							$('#cmbcategoria').children('option').remove();
							$('#cmbcategoria').append($('<option>', { value: "-1" }).text("--Categoría--"));
							
							$('#cmbsubcategoria').children('option').remove();
							$('#cmbsubcategoria').append($('<option>', { value: "-1" }).text("--Subcategoría--"));
							
							cargacategoria(data.data[0].Seccion);
							carga_secciones(data.data[0].Id_Area,data.data[0].Seccion);
							
							if(data.data[0].Lo_Realiza=="0"){
								$("#Realiza_Interno").prop('checked', true);
							
							}else{
								if(data.data[0].Lo_Realiza=="1"){
									$("#Realiza_Externo").prop('checked', true);
									
								}
							}
							
							
							 if ($.trim(data.data[0].Id_Categoria) != '')
							 {
							 $("#cmbcategoria").val(data.data[0].Id_Categoria);
							 cargasubcategoria($.trim(data.data[0].Id_Categoria));
							 if ($.trim(data.data[0].Id_Subcategoria) != '')
								$("#cmbsubcategoria").val(data.data[0].Id_Subcategoria);
							 }
							 else{
								$("#cmbcategoria").val(-1);
								$("#cmbsubcategoria").val(-1);							  
							 }
							 
							 $("#Id_Solicitud").val(data.data[0].Id_Solicitud);
							 
							 //Si existe la imagen, pasamos el numero del empleado
							 if(data.data[0].Existe_Imagen=="si"){
								$("#No_Empleado_chat").val(data.data[0].No_Usuario);
							 }
							 
							
							 $("#hddEstatus_Proceso").val(data.data[0].Id_Estatus_Proceso);
							 
							 if(data.data[0].Id_Estatus_Proceso=="4"){	
								$("#botonCerrar").attr("disabled", true);
							 }
							 
							 if (data.data[0].Prioridad ==1)
							 {
								 Prioridad = "Alta";
								 $("#Check_Alta").attr('checked',true);
							 }
							 if (data.data[0].Prioridad ==2)
							 {
								 Prioridad = "Media";
								 $("#Check_Media").attr('checked',true);
							 }
							 if (data.data[0].Prioridad ==3)
							 {
								 Prioridad = "Baja";
								 $("#Check_Poca").attr('checked',true);
							 }
		
							 $("#Titulo").val(data.data[0].Titulo);
							 $("#hddArea").val(data.data[0].Id_Area);
							 $("#hddSeccion").val(data.data[0].Seccion);
							 $("#Descripcion").val(data.data[0].Desc_Motivo_Reporte);
							 $("#DescripcionHtml").html(data.data[0].Desc_Motivo_Reporte);			 

							 //$("#TituloCierre").val(data.data[0].TituloCierre);
							 if(data.data[0].Id_Motivo_Aparente!=null){
								$("#cmb_motivo_aparente").val(data.data[0].Id_Motivo_Aparente);
							 }
							 if(data.data[0].Id_Motivo_Real!=null){
								$("#cmb_motivo_real").val(data.data[0].Id_Motivo_Real);
							 }
							 if(data.data[0].Id_Est_Equipo!=null){
								$("#cmb_estatus_equipo").val(data.data[0].Id_Est_Equipo);
							 }
							 $("#ComentarioCierre").val(data.data[0].ComentarioCierre);

							 for (var i=1; i <=3; i++)
							 {
							 var Estatus_Proce="";
							 $("#spanNumsolicitud"+i).text(data.data[0].Id_Solicitud);
							 Estatus_Proce=data.data[0].Estatus_Proceso;
							 if(data.data[0].Asist_Especial=="1"){
								Estatus_Proce+=" (Asistencia Especial)";
							 }
							 $("#spanStatus"+i).text(Estatus_Proce);
							 if(data.data[0].Estatus_Reg==3){
								$("#spanStatus"+i).text("Cancelado"); 
							 }
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
								 
								 if(data.data[0].Nombre_Act_Ext!=""){
									 $("#relacionar_activo").show();
								 }
								 
							 $("#spanArea"+i).text(data.data[0].Area);
							 
							 if(data.data[0].Id_Solicitud_Anterior!=null && data.data[0].Id_Solicitud_Anterior!=""){
								$("#spanNumsolicitudAnterior"+i).text(data.data[0].Id_Solicitud_Anterior);
								$("#liSolicitudAnterior"+i).show(); 
							 }else{
								$("#liSolicitudAnterior"+i).hide(); 
							 }
							 
							 if(data.data[0].Desc_Medio!=null && data.data[0].Desc_Medio!=""){
									$("#spanMedio"+i).text(data.data[0].Desc_Medio);
								$("#liMedio"+i).show();
							 } else{
								$("#liMedio"+i).hide();
							 } 
							 
							 $("#spanPrioridad"+i).text(Prioridad);
							 $("#spanSeccion"+i).text(data.data[0].NombreSeccion);
							 $("#spanCategoria"+i).text(data.data[0].Categoria);
							 $("#spanSubcategoria"+i).text(data.data[0].Subcategoria);
							 $("#spanMotivo"+i).text(data.data[0].Motivo);
							 $("#spanSolicitud"+i).text(data.data[0].Usuario);
							 $("#spanGestor"+i).text(data.data[0].Gestor);
							 $("#spanDireccion_Ip"+i).text(data.data[0].Direccion_Ip_Sol);
							 $("#spanExtension_Tel"+i).text(Extension_Telef);
							 }
							 
							 //Psar valores para dividir el ticket
							 $("#hddId_Usuario").val(data.data[0].Id_Usuario);
							 $("#hddId_Area").val(data.data[0].Id_Area);
							 $("#hddId_Medio").val(data.data[0].Id_Medio);
							 $("#hddId_Activo").val(data.data[0].Id_Activo);
							 
							 if(data.data[0].Activo_Externo==0){
								$("#hddActivo_Externo").val("");
							 }else{
								$("#hddActivo_Externo").val(data.data[0].Activo_Externo); 
							 }
							 $("#hddAF_BC_Ext").val(data.data[0].AF_BC_Ext);
							 $("#hddNombre_Act_Ext").val(data.data[0].Nombre_Act_Ext);
							 $("#hddMarca_Act_Ext").val(data.data[0].Marca_Act_Ext);
							 $("#hddModelo_Act_Ext").val(data.data[0].Modelo_Act_Ext);
							 $("#hddNo_Serie_Act_Ext").val(data.data[0].No_Serie_Act_Ext);
							 $("#hddId_Ubic_Prim").val(data.data[0].Id_Ubic_Prim);
							 $("#hddId_Ubic_Sec").val(data.data[0].Id_Ubic_Sec);
							
							
							 $("#Pre_Re_Nombre").val(data.data[0].Nombre_Act_Ext);
						   $("#Pre_Re_Marca").val(data.data[0].Marca_Act_Ext);
						   $("#Pre_Re_Modelo").val(data.data[0].Modelo_Act_Ext);
						   $("#Pre_Re_No_Serie").val(data.data[0].No_Serie_Act_Ext);
						   $("#Pre_Re_Cantidad_Equipos").val(data.data[0].Cantidad_Equ_Ext);
						   $("#Pre_Re_Empresa").val(data.data[0].Empresa_Ext);
						   $("#Pre_Re_Nombre_Proveedor").val(data.data[0].Nombre_Completo_Ext);
						   $("#Pre_Re_Telefono").val(data.data[0].Telefono_Ext);
						   $("#Pre_Re_Correo").val(data.data[0].Correo_Ext);
						   $("#Pre_Re_Observaciones").val(data.data[0].Observ_Pre_Reg_Ext);
							 
								$.ajax({
									type: "POST",
									url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
									async: true,
									data: {
										Id_Solicitud: data.data[0].Id_Solicitud,
										accion: "Accesorios_Ext"
									},
									dataType: "html",
									beforeSend: function (xhr) {
										jsShowWindowLoad("Cargando Informaci&oacuten.");
									},
									success: function (json) {
										json = eval("(" + json + ")");
										var Prioridad = "";
										if (json.totalCount > 0) {
											var tr="";
											tr+='<tr>';
											tr+='	<td>';
											tr+='		<div class="col-md-12">';
											tr+='			<div class="form-group">';
											tr+='				<span><font color="red">*</font></span>';
											tr+='				<label class="control-label" style="font-size: 11px;">Accesorio</label>	';
											tr+='			</div>';
											tr+='		</div>';
											tr+='	</td>';
											tr+='	<td>';
											tr+='		<div class="col-md-12">';
											tr+='			<div class="form-group">';
											tr+='				<span><font color="red">*</font></span>';
											tr+='				<label class="control-label" style="font-size: 11px;">Cantidad</label>	';
											tr+='			</div>';
											tr+='		</div>';
											tr+='	</td>';
											tr+='	<td>';
											tr+='		<div class="col-md-12">';
											tr+='			<div class="form-group">';
											tr+='				<label class="control-label" style="font-size: 11px;">Marca</label>';
											tr+='			</div>';
											tr+='		</div>';
											tr+='	</td>';
											tr+='	<td>';
											tr+='		<div class="col-md-12">';
											tr+='			<div class="form-group">';
											tr+='				<label class="control-label" style="font-size: 11px;">Modelo</label>';
											tr+='			</div>';
											tr+='		</div>';
											tr+='	</td>';
											tr+='	<td>';
											tr+='		<div class="col-md-12">';
											tr+='			<div class="form-group">';
											tr+='				<label class="control-label" style="font-size: 11px;">No Serie</label>';
											tr+='			</div>';
											tr+='		</div>';
											tr+='	</td>';
											
											tr+='</tr>';
											$("#body_accesorios_act_pre").html(tr);
											for(var i=0; i<json.totalCount; i++){
												var clonarfila= "";
												clonarfila='<tr id="tr_acc_act_pre_'+i+'">';
												clonarfila+='	<td>';
												clonarfila+='		<div class="col-md-12">';
												clonarfila+='			<div class="form-group">';
												clonarfila+='				<input type="hidden" class="form-control revision_check_list_act_pre" readonly id="hdd_id_accesorio_pre_'+i+'" placeholder="Nombre" value="'+json.data[i].Id_Accesorio_Ext+'">';
												clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" readonly id="Acc_Nombre_Pre_'+i+'" placeholder="Nombre" value="'+json.data[i].Nombre_Ext+'">';
												clonarfila+='			</div>';
												clonarfila+='		</div>';
												clonarfila+='	</td>';
												clonarfila+='	<td>';
												clonarfila+='		<div class="col-md-12">';
												clonarfila+='			<div class="form-group">';
												clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" readonly id="Acc_Cantidad_Pre_'+i+'" placeholder="Cantidad" value="'+json.data[i].Cantidad_Ext+'">';
												clonarfila+='			</div>';
												clonarfila+='		</div>';
												clonarfila+='	</td>';
												clonarfila+='	<td>';
												clonarfila+='		<div class="col-md-12">';
												clonarfila+='			<div class="form-group">';
												clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" readonly id="Acc_Marca_Pre_'+i+'" placeholder="Marca" value="'+json.data[i].Marca_Ext+'">';
												clonarfila+='			</div>';
												clonarfila+='		</div>';
												clonarfila+='	</td>';
												clonarfila+='	<td>';
												clonarfila+='		<div class="col-md-12">';
												clonarfila+='			<div class="form-group">';
												clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" readonly id="Acc_Modelo_Pre_'+i+'" placeholder="Modelo" value="'+json.data[i].Modelo_Ext+'">';
												clonarfila+='			</div>';
												clonarfila+='		</div>';
												clonarfila+='	</td>';
												clonarfila+='	<td>';
												clonarfila+='		<div class="col-md-12">';
												clonarfila+='			<div class="form-group">';
												clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" readonly id="Acc_SeriePre_'+i+'" placeholder="No. Serie" value="'+json.data[i].No_Serie_Ext+'">';
												clonarfila+='			</div>';
												clonarfila+='		</div>';
												clonarfila+='	</td>';
												clonarfila+='</tr>';
												
												
												$("#tbl_accesorios_act_pre tbody").append(clonarfila);
												
											}
										}
									},
									complete: function (xhr) {
										jsRemoveWindowLoad();
									},
									error: function () {
										mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
									}
								});
						
							 //Activar el tab Actividades si el ticket viene de las Actividades
							 if(Estatus_Proceso>1&& Estatus_Proceso<5){
								if((data.data[0].Id_Actividad!="")){
									$("#li_actividades").show();
									carga_actividades(data.data[0].Id_Actividad);
								}else{
									$("#li_actividades").hide();
								}
							 }else{
								$("#li_actividades").hide();
							 }
							 
							 if(Estatus_Proceso=="4"){
								//cargar_calificacion(data.data[0].Id_Solicitud);
							 }
							 
							 //Bloquear y desbloquear controles de datos generales
							 if(Estatus_Proceso>1){
								bloqueardatosgenerales(true);
							 }else{
								bloqueardatosgenerales(true);//Era False
							 }
							 
							//Cuando el estatus se encuentre en seguimiento 
							if(Estatus_Proceso=="2"){
								//Se deshabilita cuando el gestor es senior
								if($("#hddTipo_Gestor").val()=="1"){
									var $select3 = $('#numempleadoresguardo').selectize({});	
									var control3 = $select3[0].selectize;
									control3.enable();
									$("#seguimiento").prop('disabled', false);
									$("#btnsubir_imagenes_chat").prop('disabled', false);
									$("#Mensaje").prop('disabled', false);
									$("#botonEnviar").attr("disabled", false);
									$("#btn_guardar_actividades").attr("disabled", false);
									$("#botonCerrar").prop('disabled', false);
									$("#seguimiento").html("Reasignar");
								}
							}else{
								$("#seguimiento").html("Dar Seguimiento");
							}
							
							if(data.data[0].Id_Estatus_Proceso!=Estatus_Proceso){
								$('#closeModal').click();
								mensajesalerta("Warning", "El ticket se encuentra en otro estatus por lo tanto no se podra abrir.", "error", "dark");
							}
							
						}
					},
					complete: function (xhr) {
						jsRemoveWindowLoad();
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
					}
				});
				
			}
		}
		
		function consulta_gtiqx(Id_Cirugia) {
			if(Id_Cirugia!=""){
				$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
					async: false,
					data: {
						Id_Cirugia: Id_Cirugia,
						accion: "consulta_gtiqx"
					},
					dataType: "html",
					beforeSend: function (xhr) {
						jsShowWindowLoad("Cargando Informaci&oacuten.");
					},
					success: function (data) {
						data = eval("(" + data + ")");
						
						if (data.totalCount > 0) {
							for(var i = 0; i < data.totalCount; i++){
								$("#Pre_Re_Procedimiento").val(data.data[0].procedimiento);
								$("#Pre_Re_Fecha_Hora_Cirugia").val(data.data[0].fechacirugia+" "+data.data[0].horainicio);
								$("#Pre_Re_Quirofano").val(data.data[0].quirofano);
								$("#Pre_Re_Paciente").val(data.data[0].paciente);
								$("#Pre_Re_Cirujano").val(data.data[0].nombrecirujano);
							}
						}
					},
					complete: function (xhr) {
						jsRemoveWindowLoad();
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
					}
				});
			}
			
		}
		
		function consult_ext_bd_nomina(num_empleado) 
		{
			var extension="";
			var resultado=new Array();
			data={accion: "consultar", num_empleado:num_empleado};
			resultado=cargo_cmb("../fachadas/activos/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoFacade.Class.php",false, data);
			if(resultado.totalCount>0){
				extension=resultado.data[0].ext_telefonica;
			}
			return extension;
		}
		
		buscar_ticket_cancelado("<?php echo $Id_Solicitud; ?>");
		function buscar_ticket_cancelado(Id_Solicitud) 
		{
			var Desc_Motivio_Cancelacion="";
			var resultado=new Array();
			data={accion: "Buscar_Cancelados", Id_Solicitud:Id_Solicitud};
			resultado=cargo_cmb("../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",false, data);
			if(resultado.totalCount>0){
				Desc_Motivio_Cancelacion=resultado.data[0].Desc_Motivio_Cancelacion;
				$("#Motivo_Cancelacion").html(Desc_Motivio_Cancelacion);
				$("#tabla_cancelacion").show();
			}
		}
		
		
		function carga_secciones(idarea,idseccion) 
		{
			var resultado=new Array();
			data={accion: "consultar",Id_Area:idarea};
			resultado=cargo_cmb("../fachadas/activos/siga_cat_ticket_seccion/Siga_cat_ticket_seccionFacade.Class.php",false, data);

			var htmlDiv = '<li><strong>Sección</strong></li>';
						
			for(var i = 0; i < resultado.totalCount; i++)
			{
			var checked = "";
						if (idseccion == resultado.data[i].Id_Seccion)
						checked = "checked";							
						htmlDiv +=
	'          <li>'+
	'            <div class="form-group">'+
	'              <div class="checkbox icheck">'+
	'                <label>'+
	'                  <input '+checked+' type="radio" value="'+resultado.data[i].Id_Seccion+'" onChange="javascript:cambiaSeccion('+resultado.data[i].Id_Seccion+')" name="chkSoporte">'+resultado.data[i].Desc_Seccion+
	'                </label>'+
	'              </div>'+
	'            </div>'+
	'          </li>';                     
			}
						
			htmlDiv +='<li></li>';
			
					htmlDiv +='</ul>';
			
			$("#divSeccion").html(htmlDiv);	
		}
		
		function cargasubcategoria(idcategoria){
			var resultado=new Array();
			data={orden:'Desc_Subcategoria',accion: "consultar",Id_Categoria:idcategoria};
			resultado=cargo_cmb("../fachadas/activos/Siga_cat_ticket_subcategoria/Siga_cat_ticket_subcategoriaFacade.Class.php",false, data);
					$('#cmbsubcategoria').empty();
			if(resultado.totalCount>0){
				$('#cmbsubcategoria').append($('<option>', { value: "-1" }).text("--Subcategoría--"));
				for(var i = 0; i < resultado.totalCount; i++)
				{
					if(resultado.data[i].Id_Subcategoria!="1338"&&resultado.data[i].Id_Subcategoria!="1339"&&resultado.data[i].Id_Subcategoria!="1340"&&resultado.data[i].Id_Subcategoria!="1341"&&resultado.data[i].Id_Subcategoria!="1342"){
						if (resultado.data[i].Id_Subcategoria != '') 			
						$('#cmbsubcategoria').append($('<option>', { value: resultado.data[i].Id_Subcategoria }).text(resultado.data[i].Desc_Subcategoria));
					}
				}
			}else{
				$('#cmbsubcategoria').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
			}
		}
		
		
		function cargachat() {
			$("#divChat").html("");
		
			var idsolicitud=Id_Solicitud;
			if(idsolicitud!=""){
				if(idsolicitud!=undefined){
					var resultado=new Array();
					data={accion: "consultar",Id_Solicitud:idsolicitud};
					resultado=cargo_cmb("../fachadas/activos/siga_ticket_chat/Siga_ticket_chatFacade.Class.php",false, data);
						
					var htmlDiv = '';
					var li_img="";
					var li_img_chat="";	

					var li_arch_chat="";		
					var contador_adjuntos=0;
					for(var i = 0; i < resultado.totalCount; i++)
					{
							
								if(resultado.data[i].Url_Adjunto!=""){
										contador_adjuntos=contador_adjuntos+1;
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
								
								var No_Empleado_chat=$("#No_Empleado_chat").val(); 	
								var imagen_solicitante="";
								if(No_Empleado_chat!=""){
									//imagen_solicitante='<img class="direct-chat-img" src="http://192.168.1.234/Fotos/'+No_Empleado_chat+'.jpg" alt="message user image">';
									imagen_solicitante='<img class="direct-chat-img" src="/SIGA/fotos_empleados/'+No_Empleado_chat+'.jpg" alt="message user image">';
								}else{
									imagen_solicitante='<img class="direct-chat-img" src="../dist/img/boxed-bg.jpg" alt="message user image">';
								}
								
								
								 htmlDiv +='<div class="direct-chat-msg">'+
			'                        <div class="direct-chat-info clearfix">'+
			'                          <span class="direct-chat-name pull-left">'+resultado.data[i].Nombre_Usuario+'</span>'+
			'                          <span class="direct-chat-timestamp pull-right">'+resultado.data[i].Fecha_Alta+'</span>'+
			'                        </div>'+imagen_solicitante+'                        <div class="direct-chat-text">';
									
									 if(resultado.data[i].Url_Adjunto!=""){
										if(resultado.data[i].Mensaje!="Archivo"){
											htmlDiv +=resultado.data[i].Mensaje+'<br>';
										}	
										htmlDiv+='	<a href="../Archivos/Archivos-Chat/'+resultado.data[i].Url_Adjunto+'" target="_blank">Ver Adjunto</a>';
									 }else{
										htmlDiv +=resultado.data[i].Mensaje;	
									 }
									htmlDiv +='</div>'+	
			'                      </div>';
								}
								if (resultado.data[i].Id_Estatus_Proceso == 2)
								{
								
										
									var existe_img=new Array();
									//var Url_img="http://192.168.1.234/Fotos/"+resultado.data[i].No_Empl_Gestor+".jpg";
									var Url_img="/SIGA/fotos_empleados/"+resultado.data[i].No_Empl_Gestor+".jpg";
									var Ruta="";
									if(resultado.data[i].No_Empl_Gestor!=""){
										data={accion: "existe_archivo",Url:Url_img};
										existe_img=cargo_cmb("../fachadas/activos/Existe_Archivo/Existe_ArchivoFacade.Class.php",false, data);	
										
										if(existe_img.totalCount){
										Ruta='<img class="direct-chat-img" src="'+Url_img+'" alt="message user image">';
										}else{
										Ruta='<img class="direct-chat-img" src="../dist/img/boxed-bg.jpg" alt="message user image">';
										}
									}else{
									Ruta='<img class="direct-chat-img" src="../dist/img/boxed-bg.jpg" alt="message user image">';
									}
										
								
									htmlDiv +='<!-- /.direct-chat-msg -->'+
			'                      <!-- Message to the right -->'+
			'                      <div class="direct-chat-msg right">'+
			'                        <div class="direct-chat-info clearfix">'+
			'                          <span class="direct-chat-name pull-right">'+resultado.data[i].Nombre_Gestor+'</span>'+
			'                          <span class="direct-chat-timestamp pull-left">'+resultado.data[i].Fecha_Alta+'</span>'+
			'                        </div>'+
			'                        <!-- /.direct-chat-info -->'+
									Ruta+
			'                        <!-- /.direct-chat-img -->'+
			'                        <div class="direct-chat-text">';
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
					
					if(contador_adjuntos>0){
						$("#Indicador_Adjuntos").html(contador_adjuntos);
						$("#Indicador_Adjuntos").show();
						
					}
					//$("#div_adjuntos_chat_imagenes").append(li_img);	
					$("#divChat").html(htmlDiv);
				}
			}else{
				$("#Indicador_Adjuntos").html("");
				$("#Indicador_Adjuntos").hide();
			}
		}
		
		
		
		ver_activos=function(){
			
		numfila=0;
		array_accesorios_act_ext=[];
		array_eliminados_act_ext=[]; 
		cont_eliminados_act_ext=0;
		var tr="";
		tr+='<tr>';
		tr+='	<td>';
		tr+='		<div class="col-md-12">';
		tr+='			<div class="form-group">';
		tr+='				<span><font color="red">*</font></span>';
		tr+='				<label class="control-label" style="font-size: 11px;">Accesorio</label>	';
		tr+='			</div>';
		tr+='		</div>';
		tr+='	</td>';
		tr+='	<td>';
		tr+='		<div class="col-md-12">';
		tr+='			<div class="form-group">';
		tr+='				<span><font color="red">*</font></span>';
		tr+='				<label class="control-label" style="font-size: 11px;">Cantidad</label>	';
		tr+='			</div>';
		tr+='		</div>';
		tr+='	</td>';
		tr+='	<td>';
		tr+='		<div class="col-md-12">';
		tr+='			<div class="form-group">';
		tr+='				<label class="control-label" style="font-size: 11px;">Marca</label>';
		tr+='			</div>';
		tr+='		</div>';
		tr+='	</td>';
		tr+='	<td>';
		tr+='		<div class="col-md-12">';
		tr+='			<div class="form-group">';
		tr+='				<label class="control-label" style="font-size: 11px;">Modelo</label>';
		tr+='			</div>';
		tr+='		</div>';
		tr+='	</td>';
		tr+='	<td>';
		tr+='		<div class="col-md-12">';
		tr+='			<div class="form-group">';
		tr+='				<label class="control-label" style="font-size: 11px;">No Serie</label>';
		tr+='			</div>';
		tr+='		</div>';
		tr+='	</td>';
		tr+='</tr>';
		$("#body_accesorios_act_ext").html(tr);
		
		$("#div_asignar_activo_externo").hide();
		
		$('#Nombre_Act_Ext').val("");
		$('#Marca_Act_Ext').val("");
		$('#Modelo_Act_Ext').val("");
		$('#No_Serie_Act_Ext').val("");
		$('#Ubic_Prim').val("");
		$('#Ubic_Sec').val("");
		$('#Empresa_Ext').val("");
		$('#Nombre_Completo_Ext').val("");
		$('#Telefono_Ext').val("");
		$('#Correo_Ext').val("");
		
		
		$("#Modal_seguimiento_ticket").modal("show");
		
		
		
		if($("#Id_Solicitud").val()!=""){
			$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
					async: true,
					data: {
						Id_Solicitud: $.trim($("#Id_Solicitud").val()),
						Estatus_Reg:'1',
						accion: "consultar"
					},
					dataType: "html",
					beforeSend: function (xhr) {
						jsShowWindowLoad("Cargando Informaci&oacuten.");
					},
					success: function (data) {
						data = eval("(" + data + ")");
						var Prioridad = "";
						if (data.totalCount > 0) {
							if(data.data[0].Activo_Externo=="1"){
								 $("#div_asignar_activo_externo").show();
								
								 $("#Nombre_Act_Ext").val(data.data[0].Nombre_Act_Ext);
								 $("#Marca_Act_Ext").val(data.data[0].Marca_Act_Ext);
								 $("#Modelo_Act_Ext").val(data.data[0].Modelo_Act_Ext);
								 $("#No_Serie_Act_Ext").val(data.data[0].No_Serie_Act_Ext);
								 $("#Ubic_Prim").val(data.data[0].Ubic_Prim);
								 $("#Ubic_Sec").val(data.data[0].Ubic_Sec);
								 
								 $('#Empresa_Ext').val(data.data[0].Empresa_Ext);
								 $('#Nombre_Completo_Ext').val(data.data[0].Nombre_Completo_Ext);
								 $('#Telefono_Ext').val(data.data[0].Telefono_Ext);
								 $('#Correo_Ext').val(data.data[0].Correo_Ext);
							}
						}
					},
					complete: function (xhr) {
						jsRemoveWindowLoad();
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
					}
			});
			
			$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
					async: true,
					data: {
						Id_Solicitud: $.trim($("#Id_Solicitud").val()),
						accion: "Accesorios_Ext"
					},
					dataType: "html",
					beforeSend: function (xhr) {
						jsShowWindowLoad("Cargando Informaci&oacuten.");
					},
					success: function (json) {
						json = eval("(" + json + ")");
						var Prioridad = "";
						if (json.totalCount > 0) {
							for(var i=0; i<json.totalCount; i++){
								var clonarfila= "";
								clonarfila='<tr id="tr_acc_act_ext_'+numfila+'">';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<input type="hidden" class="form-control revision_check_list_act_ext" id="hdd_id_accesorio_'+numfila+'" placeholder="Nombre" value="'+json.data[i].Id_Accesorio_Ext+'" readonly>';
								clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Acc_Nombre_Ext_'+numfila+'" placeholder="Nombre" value="'+json.data[i].Nombre_Ext+'" readonly>';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Acc_Cantidad_Ext_'+numfila+'" placeholder="Cantidad" value="'+json.data[i].Cantidad_Ext+'" readonly>';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Acc_Marca_Ext_'+numfila+'" placeholder="Marca" value="'+json.data[i].Marca_Ext+'" readonly>';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Acc_Modelo_Ext_'+numfila+'" placeholder="Modelo" value="'+json.data[i].Modelo_Ext+'" readonly>';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Acc_SerieExt_'+numfila+'" placeholder="No. Serie" value="'+json.data[i].No_Serie_Ext+'" readonly>';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='</tr>';
								numfila=numfila+1;
								
								
								$("#tbl_accesorios_act_ext tbody").append(clonarfila);
							}
						}
					},
					complete: function (xhr) {
						jsRemoveWindowLoad();
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
					}
			});
			
		}
	}
		<?php if($Tab=="1-1"){ echo 'ver_activos();';} ?>
		ver_preregistro=function(){
			$("#Modal_enviar_preregistro").modal("show");
		}
	
	});
</script>
</body>
</html>
