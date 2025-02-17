<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/catalogos.class.php");

$catalogoClass = new catalogos();
$usuariosInfo = $catalogoClass->getSigaUsuariosVigentes();

	session_start();
	@$Id_Gestor=$_POST["Id_Gestor"];
	@$Tipo_Gestor=$_POST["Tipo_Gestor"];
	@$Id_Seccion=$_POST["Id_Seccion"];

	$Espacios="";

  ?>
  <style>
	.datepicker{z-index:1151 !important;}
	.modal { overflow-y: auto }

	/* .signature-pad {
  width:100%;
  height:100%;
  background-color: #CCCCCC;
} */

	.card {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  margin: auto;
  /* -webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 16, 0.19), 0 0.3rem 0.3rem rgba(0, 0, 16, 0.23);
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 16, 0.19), 0 0.3rem 0.3rem rgba(0, 0, 16, 0.23); */
  background-color: rgb(255, 255, 255);
  padding: 0.4rem;
  width: 25rem;  
}

.rating-container {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  padding: 0.4rem 0.8rem;
  width: 100%;
}

.rating-text p {
  color: rgba(0, 0, 16, 0.8);
  font-size: 1.3rem;
  padding: 0.3rem;
}

svg {
  fill: rgb(105, 105, 105);
  height: 3.6rem;
  width: 3.6rem;
  margin: 0.2rem;
}

.rating-form-2 svg {
  height: 3rem;
  width: 3rem;
  margin: 0.5rem;
}

#radios label {
  position: relative;
}


.inputCierre {
  position: absolute;
  opacity: 0;
}

/* input[type="radio"] {
  position: absolute;
  opacity: 0;
} */

input[type="radio"] + svg {
  -webkit-transition: all 0.2s;
  transition: all 0.2s;
}

input[type="radio"] + svg {
  -webkit-transition: all 0.2s;
  transition: all 0.2s;
}

input + svg {
  cursor: pointer;
}

input[class="super-happy01"]:hover + svg,
input[class="super-happy01"]:checked + svg,
input[class="super-happy01"]:focus + svg {
  fill: rgb(59, 157, 255);
}

input[class="happy01"]:hover + svg,
input[class="happy01"]:checked + svg,
input[class="happy01"]:focus + svg {
  fill: rgb(0, 204, 79);
}

input[class="neutral01"]:hover + svg,
input[class="neutral01"]:checked + svg,
input[class="neutral01"]:focus + svg {
  fill: rgb(232, 214, 0);
}

input[class="sad01"]:hover + svg,
input[class="sad01"]:checked + svg,
input[class="sad01"]:focus + svg {
  fill: rgb(229, 132, 0);
}

input[class="super-sad01"]:hover + svg,
input[class="super-sad01"]:checked + svg,
input[class="super-sad01"]:focus + svg {
  fill: rgb(226, 36, 11);
}

/*******************************************************************************************************/
input[class="super-happy02"]:hover + svg,
input[class="super-happy02"]:checked + svg,
input[class="super-happy02"]:focus + svg {
  fill: rgb(59, 157, 255);
}

input[class="happy02"]:hover + svg,
input[class="happy02"]:checked + svg,
input[class="happy02"]:focus + svg {
  fill: rgb(0, 204, 79);
}

input[class="neutral02"]:hover + svg,
input[class="neutral02"]:checked + svg,
input[class="neutral02"]:focus + svg {
  fill: rgb(232, 214, 0);
}

input[class="sad02"]:hover + svg,
input[class="sad02"]:checked + svg,
input[class="sad02"]:focus + svg {
  fill: rgb(229, 132, 0);
}

input[class="super-sad02"]:hover + svg,
input[class="super-sad02"]:checked + svg,
input[class="super-sad02"]:focus + svg {
  fill: rgb(226, 36, 11);
}

/*******************************************************************************************************/
input[class="super-happy03"]:hover + svg,
input[class="super-happy03"]:checked + svg,
input[class="super-happy03"]:focus + svg {
  fill: rgb(59, 157, 255);
}

input[class="happy03"]:hover + svg,
input[class="happy03"]:checked + svg,
input[class="happy03"]:focus + svg {
  fill: rgb(0, 204, 79);
}

input[class="neutral03"]:hover + svg,
input[class="neutral03"]:checked + svg,
input[class="neutral03"]:focus + svg {
  fill: rgb(232, 214, 0);
}

input[class="sad03"]:hover + svg,
input[class="sad03"]:checked + svg,
input[class="sad03"]:focus + svg {
  fill: rgb(229, 132, 0);
}

input[class="super-sad03"]:hover + svg,
input[class="super-sad03"]:checked + svg,
input[class="super-sad03"]:focus + svg {
  fill: rgb(226, 36, 11);
}


  </style>
	
  <input type="hidden" id="Id_Solicitud">
  <input type="hidden" id="Id_Cirugia">
  <input type="hidden" id="No_Empleado_chat">
	
  <!--<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">-->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="/siga/plugins/sweetalert2/sweetalert2.css">
  <link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
  <link rel="stylesheet" href="../dist/css/jquery-confirm.min.css">
	<link rel="stylesheet" href="/siga/dist/css/spinner.css">

  <script src="../dist/js/jquery-confirm.min.js"></script>
  <script src="../js/prettify.js"></script>
	
	<div class="loadingState" id="loadingState">
  	<div class="loader"></div>
	</div>

	  <!-- <div id="secciones_radio_cambiar"></div> -->
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
<div clase="container">
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->

<div class="row">

	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon" style="background-color:#19294a; color:white;"><i class="fa fa-envelope-o"></i></span>

			<div class="info-box-content"><br><br><br>
				<span class="info-box-text">Soporte Técnico</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon" style="background-color:#19294a; color:white;"><i class="fa fa-flag-o"></i></span>

			<div class="info-box-content"><br><br><br>
				<span class="info-box-text">Renta de Equipo Médico</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon" style="background-color:#19294a; color:white;"><i class="fa fa-files-o"></i></span>

			<div class="info-box-content"><br><br><br>
				<span class="info-box-text">Capacitación</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>

</div>

<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
    <div class="row">
		
			<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>2</h3><p>Nuevos</p>
            </div>
            <div class="icon">
						<i class="fa fa-ticket" aria-hidden="true"></i>
            </div>
          </div>
      </div>

			<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>65</h3>

              <p>Seguimiento</p>
            </div>
            <div class="icon">
							<i class="fa fa-user-md" aria-hidden="true"></i>
            </div>            
          </div>
      </div>

      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>25</h3><p>Por Calificar</p>
            </div>
            <div class="icon">
							<i class="fa fa-unlock" aria-hidden="true"></i>
            </div>            
          </div>
      </div>

      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>70</h3><p>Cerrados</p>
            </div>
            <div class="icon">
							<i class="fa fa-lock" aria-hidden="true"></i>
            </div>            
          </div>
      </div>

    </div>

<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
 
<div class="row">
	<div class="col-lg-12 col-xs-6">
		<div class="box box-warning" style="background-color:rgba(247, 247, 247, 0.96);">
				<div class="box-header" style="background-color: #f7f7f7;">
					<h3 class="box-title">Titulo Siga</h3>
				</div>
				<div class="box-body"  style="background-color: #f9f9f9;">
						<!-- Custom tabs (Charts with tabs)-->
						<div class="nav-tabs-custom">
							<!-- Tabs within a box -->
							<ul class="nav nav-tabs navbar-left">
								<li class="active"><a href="#siga_dinamico_activo" data-toggle="tab" style="color:#000000">Activo</a></li>
								<li><a href="#siga_dinamico_baja" data-toggle="tab" style="color:#000000">Proveedor</a></li>
								<li><a href="#siga_dinamico_reubicacion" data-toggle="tab" style="color:#000000">Reubicación</a></li>			
							</ul>
							
								<div class="tab-content no-padding">
						
									<div class="chart tab-pane active" id="siga_dinamico_activo" style="position: relative; height: 300px;">
										prueba01
									</div>
									<div class="chart tab-pane" id="siga_dinamico_baja" style="position: relative; height: 300px;">
										Prueba 02
									</div>
									<div class="chart tab-pane" id="siga_dinamico_reubicacion" style="position: relative; height: 300px;">
										Prueba 03
									</div>

								</div>
							</div>

				</div>		
		</div>		
	</div>
</div>

<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
</div>
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->




<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
	  <!-- <div class="row">
      <div class="col-md-12">
        <hr class="separation-line">
      </div>
    </div> -->

<!-- ==== Sección Menu Fin ========================================================================================================================================================== -->
<!-- ==== Sección Menu Fin ========================================================================================================================================================== -->




          <!-- /.nav-tabs-custom -->

<!-- ==== Sección Tabla Tickets Inicio ======================================================================================================================================================= -->
<!-- ==== Sección Tabla Tickets Inicio ======================================================================================================================================================= -->


<div class="row">
	<!-- Tab panes -->
	<div class="tab-content">
		<!-- inventario -->
		<div role="tabpanel" class="tab-pane active" id="inventario">
			<!-- table-results -->
			<div class="col-md-12">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						<br>

						<table id="tablaNuevos" class="table table-bordered table-striped table-chs" width="100%">
							<thead>
								<tr>
									<th>No.</th>
									<th width="10px">Editar</th>
									<th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
									<th><i class="fa fa-info-circle" aria-hidden="true"></i></th>
									<th>Enviado</th>
									<th>Estatus</th>
									<th>Usuario<br>solicitante</th>
									<th>Prioridad</th>
									<th>Sección</th>
									<th>Categoria</th>
									<th>Subcategoria</th>
									<th><?php echo $Espacios; ?>Titulo Reporte<?php echo $Espacios; ?></th>
									<th><?php echo $Espacios; ?>Descripción&nbsp;Detalle de lo Reportado<?php echo $Espacios; ?></th>
									<th>Datos Activo</th>
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

		<!-- altas -->
		<div role="tabpanel" class="tab-pane" id="altas">
					<!-- table-results -->
			<div class="col-md-12">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
								
						<table id="tablaSeguimiento" class="table table-bordered table-striped table-chs" width="100%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Editar</th>
									<th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
									<th><i class="fa fa-info-circle" aria-hidden="true"></i></th>
									<th>Fecha Solicitud</th>
									<th>Fecha Seguimiento</th>
									<th>Estatus</th>
									<th>Usuario<br>Solicitante</th>
									<th>Gestor<br>asignado</th>
									<th>Prioridad</th>
									<th>Sección</th>
									<th>Categoria</th>
									<th>Subcategoria</th>
									<th><?php echo $Espacios; ?>Titulo Reporte<?php echo $Espacios; ?></th>
									<th><?php echo $Espacios; ?>Descripción&nbsp;Detalle de lo Reportado<?php echo $Espacios; ?></th>
									<th>Datos Activo</th>
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

<div role="tabpanel" class="tab-pane" id="porcerrar">
					<!-- table-results -->
			<div class="col-md-12">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
								
						<table id="tablaPorCerrar" class="table table-bordered table-striped table-chs" width="100%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Editar</th>
									<th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
									<th><i class="fa fa-info-circle" aria-hidden="true"></i></th>
									<th>Fecha Solicitud</th>
									<th>Fecha Seguimiento</th>
									<th>Fecha Por Cerrar</th>
									<th>Estatus</th>
									<th>Usuario<br>Solicitante</th>
									<th>Gestor<br>asignado</th>
									<th>Prioridad</th>
									<th>Sección</th>
									<th>Categoria</th>
									<th>Subcategoria</th>
									<th><?php echo $Espacios; ?>Titulo Reporte<?php echo $Espacios; ?></th>
									<th><?php echo $Espacios; ?>Descripción&nbsp;Detalle de lo Reportado<?php echo $Espacios; ?></th>
									<th>Datos Activo</th>
			<!--<th>Área</th>-->
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
			
		
<div role="tabpanel" class="tab-pane" id="historico">
	<!-- table-results -->
	<div class="col-md-12">
		<div class="box">
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
						
				<table id="tablaCierre" class="table table-bordered table-striped table-chs" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th><i class="fa fa-info-circle" aria-hidden="true"></i></th>
							<th><i class="fa fa-paperclip" aria-hidden="true"></i></th>
							<th><i class="fa fa-info-circle" aria-hidden="true"></i></th>
							<th>Fecha Solicitud</th>
							<th>Fecha Seguimiento</th>
							<th>Fecha Por Cerrar</th>
							<th>Fecha Cierre</th>
							<th>Estatus</th>
							<th>Usuario<br>Solicitante</th>
							<th>Gestor<br>asignado</th>
							<th>Prioridad</th>
							<th>Sección</th>
							<th>Categoria</th>
							<th>Subcategoria</th>
							<th><?php echo $Espacios; ?>Titulo Reporte<?php echo $Espacios; ?></th>
							<th><?php echo $Espacios; ?>Descripción&nbsp;Detalle de lo Reportado<?php echo $Espacios; ?></th>
							<th>Acciones Realizadas</th>
							<th>Comentarios Cierre para gestores</th>
							<th>Datos Activo</th>
							<th id="Estat_Final_1">Estatus Final del Equipo</th>
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

<div role="tabpanel" class="tab-pane" id="reubicacion">....</div>
<div role="tabpanel" class="tab-pane" id="reporte"></div>
		
		</div><!-- /.tab-content -->       
</div>
 
<!-- ==== Sección Tabla Tickets Fin ======================================================================================================================================================= -->
<!-- ==== Sección Tabla Tickets Fin ======================================================================================================================================================= -->

<!-- ==== Sección Modal Asistencia Especial Inicio ======================================================================================================================================================= -->
<!-- ==== Sección Modal Asistencia Especial Inicio ======================================================================================================================================================= -->
	
<div class="modal fade modalchs" id="ticket_asistencia_especial">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header azuldef">
				<button type="button" class="close" id="closeModal_Asist_Esp" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Tickets Asistencia Especial</h4>
			</div>
			<div class="modal-body nopsides">
	
	<div class="col-md-1">
	</div>
	<div class="col-md-5">
		<span><font color="red">*</font></span>	
		<label class="control-label" style="font-size: 11px;">Usuario Solicitante</label>
		<select id="numempleadoresguardo1" class="demo-default" placeholder="Usuario Solicitante" style="display:none"></select>
		<div id="gifcargandoaltausuarios1" style="display:none" align="center">
				<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
		</div>
	</div>
	
	<div class="col-md-5">
		
		<input type="hidden" id="hdd_Medio_Asis_Esp">
		<input type="hidden" id="hidden_seleccion_activo">	
		<ul class="inline center" id="divMedios_Asis_Esp">
					</ul>
	</div>	
	<div class="col-md-1">
	</div>
	<div class="col-md-12">
	</div>
	
	
	<div class="col-md-1">
	</div>
	
	<div class="col-md-10">
					<ul class="inline center" id="divSeccion_Asis_Esp">
					</ul>
		
		<!---->
		<ul class="inline center" id="ul_lo_realiza_AE">
			<li><strong>Lo Realiza</strong></li>         
			<li>            
			<div class="form-group">              
				<div class="checkbox icheck">                
					<label><input type="radio" value="0" id="Realiza_Interno_AE" name="chkLorealiza_AE" checked="checked">INTERNO</label>              
				</div>
			</div>          
			</li>          
			<li>            
			<div class="form-group">              
				<div class="checkbox icheck">
					<label><input type="radio" value="1" id="Realiza_Externo_AE" name="chkLorealiza_AE">EXTERNO</label>
				</div>
			</div>
			</li>
		</ul>
		
		<!---->
				</div>
	<div class="col-md-1">
	</div>
	<div class="col-md-12">
	</div>
	
	<div class="col-md-1">
	</div>
				<div class="col-md-5">
		<input type="hidden" id="hdd_Seccion_Asis_Esp">
						<div class="form-group">
			<span><font color="red">*</font></span>	
			<label class="control-label" style="font-size: 11px;">Categoría</label>	
							<select class="form-control" id="cmbcategoria_Asis_Esp">
								<option value="-1">--Categoría--</option>
							</select>
						</div>
				</div>
				
				<div class="col-md-5">
						<div class="form-group">
			<span><font color="red">*</font></span>	
			<label class="control-label" style="font-size: 11px;">Subcategoria</label>	
							<select class="form-control"  id="cmbsubcategoria_Asis_Esp">
								<option value="-1">--Subcategoría--</option>
							</select>
						</div>
				</div>
	<div class="col-md-12">
	</div>
	
	
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
					<div class="form-group">
		<span><font color="red">*</font></span>	
		<label class="control-label" style="font-size: 11px;">Titulo Reporte</label>	
						<input type="text" class="form-control" id="Descripcion_Asis_Esp" placeholder="Titulo Reporte">
					</div>
				</div>
	<div class="col-md-1">
	</div>
	<div class="col-md-12">
	</div>
	
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
						<div class="form-group">
			<span><font color="red">*</font></span>	
			<label class="control-label" style="font-size: 11px;">(1) Descripción Detallada de lo Reportado</label>	
							<textarea rows="4" class="form-control" id="Descripcion_Det_Asis_Esp" placeholder="Descripción Detallada de lo Reportado(500 caracteres)"></textarea>
						</div>
				</div>
	<div class="col-md-1">
	</div>
	<div class="col-md-12">
	</div>
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
		<ul class="inline center">
			<li><strong>Prioridad: </strong></li>
			<li>
				<div class="form-group">
				<div class="checkbox icheck">
					<label>
					<input type="radio" name="prioridad_Asis_Esp" class="fakeRadio_prioridad" id="Check_Alta_Asis_Esp"> Alta
					</label>
				</div>
				</div>
			</li>
			<li>
				<div class="form-group">
				<div class="checkbox icheck">
					<label>
					<input type="radio" name="prioridad_Asis_Esp" class="fakeRadio_prioridad" id="Check_Media_Asis_Esp"> Media
					</label>
				</div>
				</div>
			</li>
			<li>
				<div class="form-group">
				<div class="checkbox icheck">
					<label>
					<input type="radio" name="prioridad_Asis_Esp" class="fakeRadio_prioridad" id="Check_Poca_Asis_Esp"> Baja
					</label>
				</div>
				</div>
			</li>
		</ul>
	</div>
	<div class="col-md-1">
	</div>
	<div class="col-md-12">
	</div>
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
		<div class="form-group" id="Adjuntos_tickets"></div>
	</div>
	<div class="col-md-1">
	</div>
	<div class="col-md-12">
	</div>
	<div class="col-md-1">
	</div>
	<div class="col-md-10" id="Seleccionar_Activos" style="display:none">
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
					<input type="radio" name="Check_Mis_y_Todos_Activos"  id="Check_Todos_Activos" onchange="javascript:carga_activos_vip(0)"> Todos los Activos
					</label>
				</div>
				</div>
			</li>
		</ul>
	</div>
	
	
	<div class="col-md-1">
	</div>
	<div class="col-md-12">
	</div>
	<div class="col-md-1">
	</div>
	<div class="col-md-10" id="divGestores_Asis_Esp" style="display:none">
		<select id="Id_Usuario_Gestor" class="demo-default" placeholder="Asignar otro Gestor" style="display:none">
		</select>
		<div id="gifcargandogestores" style="display:none" align="center">
			<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
		</div>
		<br>
		<br>
		<br>
		<br>
	</div>
	<div class="col-md-1">
	</div>
				<div class="box-body">
					<div class="col-md-10 col-md-offset-1">
						<div class="col-md-12">
							<div class="table-responsive" id="div_tablaactivos">
								
							</div>
						</div>
					</div>
				</div>
						
					
	
	<br>
	<div class="row">
						<div class="col-md-7 text-right" style="margin-top:15px;">
						<button type="button" id="solicitar" class="btn chs">Generar Ticket</button>
		</div>
	</div>
	</div>
		</div>
	</div>
</div>

<!-- ==== Sección Modal Asistencia Especial Fin ========================================================================================================================================================= -->
<!-- ==== Sección Modal Asistencia Especial Fin ========================================================================================================================================================= -->
	
    <!-- modal reubicación de equipo -->
    <div class="modal fade modalchs" data-backdrop="false" id="seguimientoTickets">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" id="closeModal" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Tickets</h4>
          </div>
		  
		  <input type="hidden" id="hddArea" value="">  
		  <input type="hidden" id="hddSeccion" value=""> 
		  <input type="hidden" id="hddEstatus_Proceso" value="">
			<input type="hidden" id="hddEstatus_Recepcion" value="">
			
		  <input type="hidden" id="hddTipo_Gestor" value="">
		  <input type="hidden" id="hddId_Seccion" value="">
		  <input type="hidden" id="hddEst_div_tick" value="">
		  <input type="hidden" id="hddId_Usuario" value="">
		  <input type="hidden" id="hddId_Area" value="">
		  <input type="hidden" id="hddId_Medio" value="">
		  <input type="hidden" id="hddId_Activo" value="">
			
			<input type="hidden" id="hddActivo_Externo" value="">
			<input type="hidden" id="hddAF_BC_Ext" value="">
		  <input type="hidden" id="hddNombre_Act_Ext" value="">
		  <input type="hidden" id="hddMarca_Act_Ext" value="">
		  <input type="hidden" id="hddModelo_Act_Ext" value="">
		  <input type="hidden" id="hddNo_Serie_Act_Ext" value="">
		  <input type="hidden" id="hddId_Ubic_Prim" value="">
		  <input type="hidden" id="hddId_Ubic_Sec" value="">
			<input type="hidden" id="hddEmpresa_Ext" value="">
		  <input type="hidden" id="hddNombre_Completo_Ext" value="">
		  <input type="hidden" id="hddTelefono_Ext" value="">
		  <input type="hidden" id="hddCorreo_Ext" value="">
			
          <div class="modal-body nopsides">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs azuldef" role="tablist">
              <li role="presentation" class="active" ><a id="tab_datos_generales" href="#datos" aria-controls="datos" role="tab" data-toggle="tab">Datos Generales</a></li>
              <li role="presentation" onclick="cargachat()"><a id="tab_chat_seguimiento" href="#chat" aria-controls="chat" role="tab" data-toggle="tab">Chat Seguimiento</a></li>
              <li role="presentation" ><span class="label label-success" id="Indicador_Adjuntos" style="display:none"></span><a id="tab_adjuntos" href="#adjuntos" aria-controls="adjuntos" role="tab" data-toggle="tab">Adjuntos</a></li>
              <li role="presentation" style="display:none" id="li_actividades"><a id="tab_ver_actividades" href="#actividades" aria-controls="actividades" role="tab" data-toggle="tab">(730)Ver Actividades</a></li>
							<li role="presentation" style="display:none" id="li_materiales"><a id="tab_ver_materiales" href="#materiales" aria-controls="materiales" role="tab" data-toggle="tab">(731)Ver Materiales</a></li>
			  			<li role="presentation" ><a id="tab_cerrar_ticket" href="#cerrar" aria-controls="cerrar" role="tab" data-toggle="tab">Solicitar Cierre</a></li>

            </ul>

            <div class="tab-content">
			<!--Datos del Ticket-->
                <div role="tabpanel" class="tab-pane active" id="datos">
                <div class="box-body">
               <div class="col-md-14 col-md-offset-1">
                 <div class="col-md-3">
                   <ul class="heads">
											<li><span id="text_Numsolicitud">(739)No. Solicitud de ayuda</span> <span style="color: #666;font-weight: normal;" id="spanNumsolicitud1"></span></li>
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
											<li style="display:none" class="direccion_ip"><span>Dirección Ip</span> <span style="color: #666;font-weight: normal;" id="spanDireccion_Ip1"></span></li>
											<li><span>Extensión</span> <span style="color: #666;font-weight: normal;" id="spanExtension_Tel1"></span></li>
											<li><input type="button" class="btn btn-success btn-xs"  value="Asignar Activo" style="display: inline-block;" onclick="ver_activos()" id="relacionar_activo"> <span style="color: #666;font-weight: normal;" id="spanActivos"></span></li>
                   </ul>
                 </div>
                   
                   <div class="col-md-8">
                      <div id="div_seccion_dat_gener">
												<ul class="inline center" id="divSeccion"></ul>
											</div>
														<br><!---->
												<ul class="inline center" id="ul_lo_realiza">
												  <li><strong>Lo Realiza</strong></li>         
												  <li>            
													<div class="form-group">              
														<div class="checkbox icheck">                
															<label><input type="radio" value="0" id="Realiza_Interno" name="chkLorealiza" checked="checked">INTERNO</label>              
														</div>
													</div>          
												  </li>          
												  <li>            
													<div class="form-group">              
														<div class="checkbox icheck">
															<label><input type="radio" value="1" id="Realiza_Externo" name="chkLorealiza">EXTERNO</label>
														</div>
													</div>
												  </li>
												</ul>
					  <input type="button" class="btn btn-success btn-xs" id="Cambia_LoRealiza" value="">
					  <!---->
					
              <br>
              
              <div class="col-md-6">
                <div class="form-group">
						  			<span><font color="red">*</font></span>	
						  			<label class="control-label" style="font-size: 11px;">Categoría</label>	
                    <select class="demo-default" id="cmbcategoria" placeholder="Categoria">  
                    </select>
                </div>
              </div>
               
              <div class="col-md-6">
                 <div class="form-group">
						  		<span><font color="red">*</font></span>	
						  		<label class="control-label" style="font-size: 11px;">Subcategoria</label>	<label id="error_cmbsubcategoria" class="control-label" style="font-size: 11px;"></label>	
                  <select class="demo-default"  id="cmbsubcategoria" placeholder="Subcategoria">
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
									<label class="control-label" style="font-size: 11px;">(2) Descripción Detallada de lo Reportado</label>
								<br>								
									<textarea rows="7" class="form-control" id="Descripcion" placeholder="Descripción Detallada de lo Reportado(500 caracteres)" readonly style="resize: none;"></textarea>
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
						<div class="col-md-12">
							<div id="divgestorejecutante" style="display:inline">
								<label class="control-label" style="font-size: 11px;">Ejecutante</label>
								<select id="gestorejecutante" class="demo-default" placeholder="Gestor Ejecutante" style="display:none">
								</select>
								<div id="gifcargandogestorejecutante" style="display:none" align="center">
								<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
								</div>
							</div>
						</div>
				 </div>		 
				</div>
			</div>
            <div class="modal-footer">
            	<button style="font-size:13px" type="button" class="btn chs" id="ticket_actualizar_categoria" type="button">Actualiza Categoría</button>
							<button style="font-size:13px" type="button" class="btn chs" id="cambiar_area" type="button" onclick="abrir_modal_cambiar_area()">Cambiar Área</button>
							<button style="font-size:13px" type="button" class="btn chs" id="seguimiento">Dar seguimiento</button>
							<button style="font-size:13px" type="button" class="btn chs" id="reasignar" >Dividir Ticket</button>
							<button style="font-size:13px" type="button" class="btn btn-danger" id="Cancelar_reasig" style="display:none">Cancelar</button>
						</div>
      </div>
			<!--Fin Datos del Ticket-->

            
			<!--Chat Ticket-->
			<div role="tabpanel" class="tab-pane" id="chat">
                <div class="box-body">
               <div class="col-md-10 col-md-offset-1">
                 <div class="col-md-5">
                   <ul class="heads">
											<li><span>(900)No. Solicitud de ayuda:</span><span style="color: #666;font-weight: normal;" id="spanNumsolicitud2"></span></li>
											<li id="liSolicitudAnterior2"><span>No. Solicitud Anterior</span><span style="color: #666;font-weight: normal;" id="spanNumsolicitudAnterior2"></span></li>
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
											<li style="display:none" class="direccion_ip"><span>Dirección Ip</span> <span style="color: #666;font-weight: normal;" id="spanDireccion_Ip2"></span></li>
											<li><span>Extensión</span> <span style="color: #666;font-weight: normal;" id="spanExtension_Tel2"></span></li>
											<li><span>Activos</span> <span style="color: #666;font-weight: normal;" id="spanActivos"></span></li>
											<li style="display:none" id="li_enviar_preregistro">
											<input type="button" class="btn btn-primary"  value="Enviar Pre registro" onclick="ver_preregistro()" style="display: inline-block;" id="enviar_prer_egistro">
											<span style="color: #666;font-weight: normal;" id="spanpreregistro"></span>
											<button style="display: none;" type="button" class="btn btn-primary" id="recepcion_equipo" type="button" onclick="recepcion_equipo()">Recepción</button>												
											</li>											
                   </ul>
                 </div>
                 <div class="col-md-7"> 
									<div class="col-md-12">
                    <!-- DIRECT CHAT -->
                    <div class="box">
                      <div class="box-header azul">
                        <h5 class="box-title" id="title_chat"></h5>

                        <div class="box-tools pull-right">
                          <span data-toggle="tooltip" title="3 New Messages" class="badge bg-blue" style="display:none">3</span>
                          <button type="button" class="btn btn-box-tool" style="display:none"><i class="fa fa-search"></i></button>
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
                      <div class="box-footer">
                          <div class="input-group">
                            <input type="text" name="message" placeholder="Escribe tu mensaje ..." id="Mensaje" class="form-control" maxlength="1000">
                            <span class="input-group-btn">

                              <button id="btnsubir_imagenes_chat" type="button" data-toggle="modal" data-target="#Modal_Adjuntos_Imagenes" class="btn chs btn-flat" 
                              onclick="imagenes_chat()"><i class="fa fa-paperclip" aria-hidden="true"></i></button>
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
                </div><!-- col-md-4 -->

								<div class="col-md-8 file-browser-container">
									<div class="tab-content">
										<div class="tab-pane active" id="tab_a">
											<ul id="div_adjuntos_chat_archivos"></ul>
										</div>
										<div class="tab-pane" id="tab_b">
											<ul id="div_adjuntos_chat_imagenes"></ul>
										</div>
									</div><!-- tab content -->
								</div>

            </div>

<!--Fin Adjuntos Ticket-->
			

<!-- ==== Sección Actividades Ticket Ini ================================================================================================================================================================ -->
<!-- ==== Sección Actividades Ticket Ini ================================================================================================================================================================ -->

<div role="tabpanel" class="tab-pane" id="actividades">	
	<div class="row">
		<div class="container-fluid">
			<div class="col-md-12 p-1">
<!-- ==================================================================================================================================================================================================== -->
					<div class="table-responsive">
						<div id="actividades_rutinas_component"></div>
						<div id="datos_actividades"></div>


							<!-- <input type="hidden" id="Id_Actividad"> -->
							<input type='hidden' id='act_id_operacion' name='act_id_operacion' readonly>
							<input type='hidden' id='act_fch_operacion' name='act_fch_operacion' readonly>
								<table class="table table-striped table-bordered" id="lista_actividades_rutinas" width="100%">
									<thead>
										<tr>	
											<td align="center" style="width:3%">No.</td>
											<td align="center" style="width:12%">Actividades</td>
											<td align="center" style="width:12%">Valor Referencia</td>
											<td align="center" style="width:12%">Valor medido</td>
											<td align="center" style="width:10%" colspan="3">Estatus</td>
											<td align="center" style="width:12%">Observaciones</td>
											<td align="center" style="width:23%">Adjuntos</td>
											<td align="center" style="width:5%">F Progr</td>
											<td align="center" style="width:5%">F Realizado</td>
											<td align="center"></td>
										</tr>
									</thead>
									<tbody id="Muestro_Agregados_rutinas"></tbody>
								</table>


						<div class="modal-footer">
						<!-- <center>
						<button type="button" class="btn chs" onclick="guardar_actividades()" id="btn_guardar_actividades">Guardar 1048</button>
						</center> -->
						</div> 

					</div>

<!-- ==================================================================================================================================================================================================== -->
			</div>
		</div>
	</div>
</div>
			
<!-- ==== Sección Actividades Ticket Fin ================================================================================================================================================================ -->
<!-- ==== Sección Actividades Ticket Fin ================================================================================================================================================================ -->

<!-- ==== Sección Actividades Ticket Ini ================================================================================================================================================================ -->
<!-- ==== Sección Actividades Ticket Ini ================================================================================================================================================================ -->

<div role="tabpanel" class="tab-pane" id="materiales">	
	<div class="row">

		<div class="container-fluid">
			<div class="col-md-12">

							<!-- <div class="table-responsive"> -->
							<input type="hidden" id="Id_Actividad">

							<div id="tabla_de_accesorios"></div>
							<div id="tabla_de_materiales"></div>							

									<div class="modal-footer">
										<center>
											<button type="button" class="btn chs" onclick="guardar_actividades()" id="btn_guardar_actividades">Guardar Material 1079</button>
										</center>
									</div> 

							<!-- </div> -->

			</div>
		</div>
	</div>
</div>
			
<!-- ==== Sección Actividades Ticket Fin ================================================================================================================================================================ -->
<!-- ==== Sección Actividades Ticket Fin ================================================================================================================================================================ -->


			<!--Cerrar Ticket-->
      <div role="tabpanel" class="tab-pane" id="cerrar">
        <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="col-md-5">
            <ul class="heads">
              <li><span>(1177)No. Solicitud de ayuda: </span> <span style="color: #666;font-weight: normal;" id="spanNumsolicitud3"></span></li>
		 					<li id="liSolicitudAnterior3"><span>No. Solicitud Anterior: </span> <span style="color: #666;font-weight: normal;" id="spanNumsolicitudAnterior3"></span></li>
              <li><span>Status: </span> <span style="color: #666;font-weight: normal;" id="spanStatus3"></span></li>
		 					<li><span>Lo Realiza: </span> <span style="color: #666;font-weight: normal;" id="spanLo_Realiza3"></span></li>
              <li><span>Activo: </span> <span style="color: #666;font-weight: normal;" id="spanActivo3"></span></li>
		 					<li><span>Marca: </span> <span style="color: #666;font-weight: normal;" id="spanMarca3"></span></li>
		 					<li><span>Modelo: </span> <span style="color: #666;font-weight: normal;" id="spanModelo3"></span></li>
		 					<li><span>No. Serie: </span> <span style="color: #666;font-weight: normal;" id="spanNo_Serie3"></span></li>
		 					<li><span>Ubic. Prim.: </span> <span style="color: #666;font-weight: normal;" id="spanUbic_Prim3"></span></li>
		 					<li><span>Ubic. Sec.: </span> <span style="color: #666;font-weight: normal;" id="spanUbic_Sec3"></span></li>
		 					<li><span>Área: </span><span style="color: #666;font-weight: normal;" id="spanArea3"></span></li>
              <li><span>Prioridad: </span> <span style="color: #666;font-weight: normal;" id="spanPrioridad3"></span></li>
		 					<li id="liMedio3"><span>Medio: </span> <span style="color: #666;font-weight: normal;" id="spanMedio3"></span></li>
              <li><span>Sección: </span> <span style="color: #666;font-weight: normal;" id="spanSeccion3"></span></li>
              <li><span>Categoria: </span> <span style="color: #666;font-weight: normal;" id="spanCategoria3"></span></li>
              <li><span>Subcategoria: </span> <span style="color: #666;font-weight: normal;" id="spanSubcategoria3"></span></li>
              <li><span>Motivo de reporte: </span> <span style="color: #666;font-weight: normal;" id="spanMotivo3"></span></li>
              <li><span>Usuario: </span> <span style="color: #666;font-weight: normal;" id="spanSolicitud3"></span></li>
              <li><span>Horario de atención: </span> </li>
              <li><span>Gestor: </span> <span style="color: #666;font-weight: normal;" id="spanGestor3"></span></li>
		 					<li style="display:none" class="direccion_ip"><span>Dirección Ip: </span> <span style="color: #666;font-weight: normal;" id="spanDireccion_Ip3"></span></li>
		 					<li><span>Extensión:</span> <span style="color: #666;font-weight: normal;" id="spanExtension_Tel3"></span></li>
		 					<li><span>Activos: </span><span style="color: #666;font-weight: normal;" id="spanActivos"></span></li>
		 					<li><span>Adjuntos: </span>
		 								<span style="color: #666;font-weight: normal;" id="spanImagenesAdjuntasOK"><i class="fa fa-check" aria-hidden="true" style="color:green"></i></span>
		 								<span style="color: #666;font-weight: normal;" id="spanImagenesAdjuntasFail"><i class="fa fa-times" aria-hidden="true" style="color:red"></i></span>
		 					</li>
            </ul>
          <input type="hidden" id="validar_url" name="validar_url" disabled>
          </div>

        <div class="col-md-7">
          <div class="col-md-12" style="display:none">
            <div class="form-group">
            	<input type="text" class="form-control" id="TituloCierre" placeholder="Titulo">
            </div>
          </div>


					<div class="col-md-12">
						<div class="form-group">
						  <span><font color="red">*</font></span>
						  <label class="control-label" style="font-size: 11px;">Motivo Aparente (Reportado)</label>	
						  <select class="demo-default" id="cmb_motivo_aparente">
						  </select>
						</div>
					</div>
					
			    <div id="div_categoria_solicitar_cierre" class="col-md-12" style="display: none;">
            <div class="form-group">
				  			<span><font color="red">*</font></span>
				  			<label class="control-label" style="font-size: 11px;">Categoría</label>	
                <select class="form-control" id="cmbcategoria_solicitar_cierre">  
                </select>
            </div>
          </div>
           
          <div id="div_subcategoria_solicitar_cierre" class="col-md-12" style="display: none;">
             <div class="form-group">
				  		<span><font color="red">*</font></span>	
				  		<label class="control-label" style="font-size: 11px;">Subcategoria</label>
              <select class="form-control"  id="cmbsubcategoria_solicitar_cierre">
              </select>
            </div>
          </div>

					<div class="col-md-12">
						<div class="form-group">
						  <span><font color="red">*</font></span>
						  <label class="control-label" style="font-size: 11px;">Motivo Real Encontrado:</label>		
						  <select class="demo-default" id="cmb_motivo_real">
						  </select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
						  <span><font color="red">*</font></span>
						  <label class="control-label" style="font-size: 11px;" id="Estat_Final_2">Estatus Final del Equipo:</label>		
						  <select class="form-control" id="cmb_estatus_equipo">
						  </select>
						</div>
					</div>
					<div class="col-md-12" id="div_usuarios_enf" style="display:none">
						<div class="form-group">
						  <span><font color="red">*</font></span>
						  <label class="control-label" style="font-size: 11px;">Usuario Final</label>		
						  <select id="cmb_usuarios_enf" class="demo-default" placeholder="Usuario Final" style="display:none"></select>
						</div>
					</div>					
					
					<div class="col-md-12">
            <div class="form-group">
						  <span><font color="red">*</font></span>
						  <label class="control-label" style="font-size: 11px;">Descripción de Acciones Realizadas para el Usuario</label>	 
              <textarea rows="5" class="form-control" id="ComentarioCierre"  placeholder="Descripción de Acciones Realizadas para el Usuario(1000 caracteres)" maxlength="1000"></textarea>
            </div>
          </div>
					
					<div class="col-md-12" style="display:none" id="div_desc_acc_real_gest">
            <div class="form-group">
					  <span><font color="red">*</font></span>
					  <label class="control-label" style="font-size: 11px;">Descripción de Acciones Realizadas para Gestores</label>	 
            <textarea rows="5" class="form-control" id="ComentarioCierreGestor" placeholder="Descripción de Acciones Realizadas para Gestores(1000 caracteres)" maxlength="1000"></textarea>
            </div>
          </div>					
					
					<div class="col-md-12" style="display:none" id="div_calificacion">
						<form class="faces">
							<p class="question">Solución Ofrecida</p>
							<input type="radio" id="faces-1-1" id="p15"  name="faces-1-set" class="faces-radio cinco">
							<label for="faces-1-1"></label>
							<input type="radio" id="faces-1-2" id="p14"  name="faces-1-set" class="faces-radio cuatro">
							<label for="faces-1-2"></label>
							<input type="radio" id="faces-1-3" id="p13"  name="faces-1-set" class="faces-radio tres">
							<label for="faces-1-3"></label>
							<input type="radio" id="faces-1-4" id="p12"  name="faces-1-set" class="faces-radio dos">
							<label for="faces-1-4"></label>
							<input type="radio" id="faces-1-5" id="p11"  name="faces-1-set" class="faces-radio uno" checked>
							<label for="faces-1-5"></label>
							<input type="hidden" id="hddP1" value="">
						</form>
						<div class="form-group">
							<textarea rows="2" class="form-control" id="Solucion" placeholder="Comentarios..."></textarea>
						</div>
						
						<form class="faces">
							<p class="question">Actitud de Servicio</p>
							<input type="radio" id="faces-2-1" id="p25"  name="faces-1-set" class="faces-radio cinco">
							<label for="faces-2-1"></label>
							<input type="radio" id="faces-2-2" id="p24"  name="faces-1-set" class="faces-radio cuatro">
							<label for="faces-2-2"></label>
							<input type="radio" id="faces-2-3" id="p23"  name="faces-1-set" class="faces-radio tres">
							<label for="faces-2-3"></label>
							<input type="radio" id="faces-2-4" id="p22"  name="faces-1-set" class="faces-radio dos">
							<label for="faces-2-4"></label>
							<input type="radio" id="faces-2-5" id="p21"  name="faces-1-set" class="faces-radio uno">
							<label for="faces-2-5"></label>
							<input type="hidden" id="hddP2" value="">
						</form>
							<div class="form-group">
							<textarea rows="2" class="form-control"  id="Actitud" placeholder="Comentarios..."></textarea>
						</div>
	
						<form class="faces">
							<p class="question">Tiempo de respuesta</p>
							<input type="radio" id="faces-3-1" id="p35"  name="faces-1-set" class="faces-radio cinco" checked >
							<label for="faces-3-1"></label>
							<input type="radio" id="faces-3-2" id="p34"  name="faces-1-set" class="faces-radio cuatro">
							<label for="faces-3-2"></label>
							<input type="radio" id="faces-3-3" id="p33"  name="faces-1-set" class="faces-radio tres">
							<label for="faces-3-3"></label>
							<input type="radio" id="faces-3-4" id="p32"  name="faces-1-set" class="faces-radio dos">
							<label for="faces-3-4"></label>
							<input type="radio" id="faces-3-5" id="p31"  name="faces-1-set" class="faces-radio uno" checked>
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
                  <button type="button" id="botonCerrar" class="btn chs">Solicitar Cierre</button>
               </div>
              </div>
            </div>
			<!--Fin Cerrar Ticket-->
          </div>
        </div>
      </div>
    </div>
	
	
	<!-- modal reubicación de equipo -->
    <div class="modal fade modalchs" data-backdrop="false" id="Modal_Cancelacion">
		<div class="modal-dialog modal-lg">
			<input type="hidden" id="hdd_Id_Solicitud">
			<input type="hidden" id="hdd_Id_Actividad">
			<div class="modal-content">
			  <div class="modal-header azuldef">
				<button type="button" class="close"  data-dismiss="modal" aria-label="Close" onclick="limpiar_cerrar_cancelacion()" id="btn_cerrar_cancelacion">
				  <span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Cancelación de Ticket con Folio: <label id="cancelacion_folio"></label> </h4>
			  </div>

			  <div class="modal-body nopsides">
				<div class="col-md-12">
					<div class="form-group">
					  <span><font color="red">*</font></span>
					  <label class="control-label" style="font-size: 11px;">Motivo de Cncelación</label>
					  <textarea rows="7" class="form-control" id="Motivo_Cancelacion" placeholder="Descripción Motivo Cancelación"></textarea>
					</div>
				</div>
				<div class="tab-content">
					 <div class="modal-footer">
						<button type="button" id="botonCancelar" onclick="Cancelar_Solicitud()" class="btn btn-danger">Cancelar Ticket</button>
					 </div>
				</div>
			</div>
		  </div>
		</div>
	</div>	
	
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->	
	
	    <!-- modal char adjuntos -->
    <div class="modal fade modalchs" id="Modal_Adjuntos_Imagenes" >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" data-dismiss="modal" >
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

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
		
		<div class="modal fade modalchs" id="Modal_seguimiento_ticket" data-backdrop="static" data-keyboard="false">
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
								<input type="button" class="btn chs btn-xs" value="<-- Regresar" style="display: inline-block;" onclick="Regresar_tbl_reasig_act()">
								<br>
							</div>
							
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
                  <input type="text" class="form-control" id="Empresa_Ext" placeholder="Empresa" >
                </div>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<span id="oblig_ext_nomb_compl"><font color="red">*</font></span>
									<label class="control-label" style="font-size: 11px;">Nombre Completo de Contacto</label>	
                  <input type="text" class="form-control" id="Nombre_Completo_Ext" placeholder="Nombre Proveedor" >
                </div>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<label class="control-label" style="font-size: 11px;">Teléfono</label>	
                  <input type="text" class="form-control" id="Telefono_Ext" placeholder="Teléfono" >
                </div>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<span id="oblig_ext_correo"><font color="red">*</font></span>
									<label class="control-label" style="font-size: 11px;">Correo <span id='Valid_Correo_Ext' style="color:red"></span></label>	
                  <input type="text" class="form-control" id="Correo_Ext" placeholder="Correo" onkeyup="validarEmail(this, 'Valid_Correo_Ext')">
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
                  <input type="text" class="form-control" id="Nombre_Act_Ext" placeholder="Nombre Activo" >
                </div>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<label class="control-label" style="font-size: 11px;">Marca</label>	
                  <input type="text" class="form-control" id="Marca_Act_Ext" placeholder="Marca" >
                </div>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<label class="control-label" style="font-size: 11px;">Modelo</label>	
                  <input type="text" class="form-control" id="Modelo_Act_Ext" placeholder="Modelo" >
                </div>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<label class="control-label" style="font-size: 11px;">No Serie</label>	
                  <input type="text" class="form-control" id="No_Serie_Act_Ext" placeholder="No. Serie" >
                </div>
              </div>
							
							<div class="col-md-4">
                <div class="form-group">
									<span><font color="red">*</font></span>
									<label class="control-label" style="font-size: 11px;">Ubicación Primaria</label>	
									<select class="form-control" id="cmbubicacionprim">
                  </select>
                </div>
              </div>
							<div class="col-md-4">
                <div class="form-group">
									<span><font color="red">*</font></span>
									<label class="control-label" style="font-size: 11px;">Ubicación Secundaria</label>
									<select class="form-control" id="cmbubicacionsec">
										<option value="-1">--Ubicación Secundaria--</option>
									</select>
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
							<div class="col-md-12">
                <div class="form-group" align="center">
									<input type="button" class="btn chs" value="Agregar" id="Agregar_Accesorios" style="display: inline-block;">
                </div>
              </div>
							<div class="col-md-12"></div>
							<div class="col-md-12" align="left">
								<input type="button" class="btn btn-success" value="Guardar" style="display: inline-block;" onclick="guardar_activo_externo()">	
								<br><br>
							</div>
						</div>
						
						<div class="col-md-12 " id="div_alta_activo_externo" align="center">
							<input type="button" class="btn btn-success btn-xs" value="Asignar Activo Externo" style="display: inline-block;" onclick="mostrar_mod_asignar_activo()">
						</div>

						<div class="col-md-12 " id="div_activos_seguimiento">
						</div>	
			
          </div>
        </div>
      </div>
    </div>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
		
		<div class="modal fade modalchs" id="Modal_enviar_preregistro">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" data-dismiss="modal" >
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Enviar Pre-registro a Proveedor</h4>

          </div>
					
					<div class="col-md-12" align="center">
						<label class="control-label" style="font-size: 11px;">DATOS DE LA CIRUGÍA / PROCEDIMIENTO</label>
					</div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Nombre Procedimiento</label>	
              <input  class="form-control" id="Pre_Re_Procedimiento" placeholder="Nombre Procedimiento" autocomplete="off" disabled>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Fecha / Hora Cirugía / Procedimiento</label>
              <input  class="form-control date" id="Pre_Re_Fecha_Hora_Cirugia" placeholder="Fecha / Hora Cirugía / Procedimiento" autocomplete="off" disabled>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Quirófano / Sala</label>	
              <input  class="form-control" id="Pre_Re_Quirofano" placeholder="Quirófano / Sala" autocomplete="off" disabled>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Paciente</label>	
              <input  class="form-control" id="Pre_Re_Paciente" placeholder="Paciente" autocomplete="off" disabled>
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Cirujano / Médico Tratante</label>	
              <input  class="form-control" id="Pre_Re_Cirujano" placeholder="Cirujano / Médico Tratante" autocomplete="off" disabled>
            </div>
          </div>
					<div class="col-md-12" align="center">
						<label class="control-label" style="font-size: 11px;">DATOS DEL POVEEDOR</label>
					</div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Empresa (Razón Social)</label>	
              <input  class="form-control" id="Pre_Re_Empresa" placeholder="Empresa (Razón Social">
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Nombre Completo de Contacto</label>	
              <input  class="form-control" id="Pre_Re_Nombre_Proveedor" placeholder="Nombre Completo de Contacto">
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Teléfono</label>	
              <input  class="form-control" id="Pre_Re_Telefono" placeholder="Teléfono">
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Correo <span id='Valid_Pre_Re_Correo' style="color:red"></span></label>	
              <input  class="form-control" id="Pre_Re_Correo" placeholder="Correo" onkeyup="validarEmail(this, 'Valid_Pre_Re_Correo')">
							
						</div>
          </div>
					<div class="col-md-12" align="center">
						<label class="control-label" style="font-size: 11px;">DATOS DEL EQUIPO</label>
					</div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Nombre</label>	
              <input  class="form-control" id="Pre_Re_Nombre" placeholder="Nombre">
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Marca</label>	
              <input  class="form-control" id="Pre_Re_Marca" placeholder="Marca">
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Modelo</label>	
              <input  class="form-control" id="Pre_Re_Modelo" placeholder="Modelo">
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">No. Serie</label>	
              <input  class="form-control" id="Pre_Re_No_Serie" placeholder="No. Serie">
            </div>
          </div>
					<div class="col-md-4">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label">Cantidad de Equipos</label>	
              <input  class="form-control" id="Pre_Re_Cantidad_Equipos" placeholder="Cantidad">
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
            <div class="form-group" align="center">
							<input type="button" class="btn chs" value="Agregar" id="Agregar_Accesorios_Preregistro" style="display: inline-block;">
            </div>
          </div>
					
					<div class="col-md-12">
            <div class="form-group">
							<span><font color="red">*</font></span>
							<label class="control-label" >Observaciones:</label>	
              <textarea  class="form-control" id="Pre_Re_Observaciones"></textarea>
            </div>
          </div>
					
					<div id="qr_proveedor" class="col-md-12" style="display:none"></div>
          
					<div class="form-group row" align="center">
						<div class="col-md-12 col-sm-12  offset-md-3">
							<button type="button" class="btn btn-primary" onclick="Guardar_Preregistro()" id="btn_guardar_preregistro">Guardar</button>
						</div>
					</div>
        </div>
      </div>
    </div>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

	<div class="modal fade modalchs" id="Modal_Cambiar_Area" data-backdrop="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header azuldef">
            <button type="button" class="close" aria-label="Close" onclick="CierraPopup()">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
		  <div class="modal-body nopsides">
            <input type="hidden" id="hddSeccion_cmb_area">
			<div class="col-md-3">
				<div class="form-group">
				  <span><font color="red">*</font></span>
				  <label class="control-label" style="font-size: 11px;">&Aacute;rea</label>	
				  <select class="form-control" id="cmb_area_cambio">
				  </select>
				</div>
			</div>
			<div class="col-md-9">
				<div class="form-group">
					<ul class="inline center" id="divSeccion_cambia_area">
					</ul>
				</div>
			</div>	
			<div class="col-md-12" align="center">
				<div class="form-group" >
					<button type="button" id="btn_cambiar_area" class="btn chs">Cambiar de Área</button>
				</div>
			</div>
		  </div>
        </div>
      </div>
    </div>


<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="modal fade modalchs" id="sigaCerrarTicketAppModal" data-backdrop="false">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header azuldef">
		<span style="color: #FFFFFF">Ticket por calificar</span>
		<button type="button" class="close" aria-label="Close" onclick="CierraModal()">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>

		<div class="col-md-10 col-md-offset-1">

		<table  width="100%" border="0">
			<tbody>
				<tr>
					<td width="40%"><b>Ticket:</b></td>					
					<td width="60%"><p id="siga_appSiga_idSolicitud" name="siga_appSiga_idSolicitud"></p></td>
				</tr>
				<tr>
					<td width="40%"><b>Título de lo reportado:</b></td>
					<td width="60%"><p id="siga_appSiga_titulo" name="siga_appSiga_idSolicitud"></p></td>
				</tr>
				<tr>
					<td width="40%"><b>Descripción detalle de lo reportado:</b></td>					
					<td width="60%"><p id="siga_appSiga_desc_detalle" name="siga_appSiga_idSolicitud"></p></td>
				</tr>
				<tr>
					<td width="40%"><b>F. Solicitud:</b></td>
					<td width="60%"><p id="siga_appSiga_Fech_Solicitud"></p></td>
				</tr>
				<tr>
					<td width="40%"><b>F. Solicitud Cierre:</b></td>
					<td width="60%"><p id="siga_appSiga_Fech_Espera_Cierre"></p></td>
				</tr>
				<tr>
					<td><b>Activo:</b></td>
					<td width="60%"><p id="siga_appSiga_activo"></p></td>
				</tr>
				<tr>
					<td><b>Marca:</b></td>
					<td width="60%"><p id="siga_appSiga_marca"></p></td>
				</tr>
				<tr>
					<td><b>No. de Serie:</b></td>
					<td width="60%"><p id="siga_appSiga_serie"></p></td>
				</tr>
				<tr>
					<td><b>Modelo:</b></td>
					<td width="60%"><p id="siga_appSiga_modelo"></p></td>
				</tr>
				<tr>
					<td><b>Ubic. Prim.:</b></td>
					<td width="60%"><p id="siga_appSiga_uPrimaria"></p></td>
				</tr>
				<tr>
					<td><b>Ubic. Sec:</b></td>
					<td width="60%"><p id="siga_appSiga_uSecundaria"></p></td>
				</tr>
				<tr>
					<td><b>Mot. Aparente:</b></td>
					<td width="60%"><p id="siga_appSiga_aparente"></p></td>
				</tr>
				<tr>
					<td><b>Mot. Real:</b></td>
					<td width="60%"><p id="siga_appSiga_real"></p></td>
				</tr>
				<tr>
					<td><b>Categoría:</b></td>
					<td width="60%"><p id="siga_appSiga_categoria"></p></td>
				</tr>
				<tr>
					<td><b>Sub categoría:</b></td>
					<td width="60%"><p id="siga_appSiga_subCategoria"></p></td>
				</tr>
				<tr>
					<td><b>Estatus final del equipo:</b></td>
					<td width="60%"><p id="siga_appSiga_estatus"></p></td>
				</tr>
					<td colspan="2"><b>Descripción de acciones realizadas:</b></td>                              
				</tr>
				<tr>
					<td colspan="2">
						<div style="overflow-wrap: anywhere;">
						<p id="siga_appSiga_ComentarioCierre"></p>
						</div>                                
					</td>                              
				</tr>
			</tbody>
		</table>


					<div class="card">					
						<div class="rating-container">
							
							<div class="rating">
								<form class="rating-form">

								<p class="text-center"><b>Solución Ofrecida</b></p>

								<label for="super-happy01">
									<input type="radio" name="siga_solucion" class="super-happy01" id="super-happy01" value="1" checked style="position: absolute; opacity: 0;"/>
									<svg viewBox="0 0 24 24">
									<path d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
								</label>

								<label for="happy01">
									<input type="radio" name="siga_solucion" class="happy01" id="happy01" value="2" style="position: absolute; opacity: 0;"/>
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24">
									<path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z" /></svg>
								</label>

								<label for="neutral01">
									<input type="radio" name="siga_solucion" class="neutral01" id="neutral01" value="3" style="position: absolute; opacity: 0;"/>
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24">
									<path d="M8.5,11A1.5,1.5 0 0,1 7,9.5A1.5,1.5 0 0,1 8.5,8A1.5,1.5 0 0,1 10,9.5A1.5,1.5 0 0,1 8.5,11M15.5,11A1.5,1.5 0 0,1 14,9.5A1.5,1.5 0 0,1 15.5,8A1.5,1.5 0 0,1 17,9.5A1.5,1.5 0 0,1 15.5,11M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M9,14H15A1,1 0 0,1 16,15A1,1 0 0,1 15,16H9A1,1 0 0,1 8,15A1,1 0 0,1 9,14Z" /></svg>
								</label>

								<label for="sad01">
									<input type="radio" name="siga_solucion" class="sad01" id="sad01" value="4" style="position: absolute; opacity: 0;"/>
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24">
									<path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M15.5,8C16.3,8 17,8.7 17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M12,14C13.75,14 15.29,14.72 16.19,15.81L14.77,17.23C14.32,16.5 13.25,16 12,16C10.75,16 9.68,16.5 9.23,17.23L7.81,15.81C8.71,14.72 10.25,14 12,14Z" /></svg>
								</label>

								<label for="super-sad01">
									<input type="radio" name="siga_solucion" class="super-sad01" id="super-sad01" value="5" style="position: absolute; opacity: 0;" />
									<svg viewBox="0 0 24 24">
									<path d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg>
								</label>

								</form>
							</div>
						</div>
					</div>

					<div class="form-group">
            <textarea rows="2" class="form-control" id="solucion" name="solucion" placeholder="Comentarios..."></textarea>
          </div>


					<div class="card">					
						<div class="rating-container">
							
							<div class="rating">
								<form class="rating-form">

								<p class="text-center"><b>Actitud de Servicio</b></p>

								<label for="super-happy02">
									<input type="radio" name="siga_servicio" class="super-happy02" id="super-happy02" value="1" checked style="position: absolute; opacity: 0;"/>
									<svg viewBox="0 0 24 24">
									<path d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
								</label>

								<label for="happy02">
									<input type="radio" name="siga_servicio" class="happy02" id="happy02" value="2" style="position: absolute; opacity: 0;" />
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24">
									<path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z" /></svg>
								</label>

								<label for="neutral02">
									<input type="radio" name="siga_servicio" class="neutral02" id="neutral02" value="3" style="position: absolute; opacity: 0;"/>
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24">
									<path d="M8.5,11A1.5,1.5 0 0,1 7,9.5A1.5,1.5 0 0,1 8.5,8A1.5,1.5 0 0,1 10,9.5A1.5,1.5 0 0,1 8.5,11M15.5,11A1.5,1.5 0 0,1 14,9.5A1.5,1.5 0 0,1 15.5,8A1.5,1.5 0 0,1 17,9.5A1.5,1.5 0 0,1 15.5,11M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M9,14H15A1,1 0 0,1 16,15A1,1 0 0,1 15,16H9A1,1 0 0,1 8,15A1,1 0 0,1 9,14Z" /></svg>
								</label>

								<label for="sad02">
									<input type="radio" name="siga_servicio" class="sad02" id="sad02" value="4" style="position: absolute; opacity: 0;" />
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24">
									<path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M15.5,8C16.3,8 17,8.7 17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M12,14C13.75,14 15.29,14.72 16.19,15.81L14.77,17.23C14.32,16.5 13.25,16 12,16C10.75,16 9.68,16.5 9.23,17.23L7.81,15.81C8.71,14.72 10.25,14 12,14Z" /></svg>
								</label>

								<label for="super-sad02">
									<input type="radio" name="siga_servicio" class="super-sad02" id="super-sad02" value="5" style="position: absolute; opacity: 0;" />
									<svg viewBox="0 0 24 24">
									<path d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg>
								</label>

								</form>
							</div>
						</div>
					</div>

					<div class="form-group">
            <textarea rows="2" class="form-control" id="servicio" name="servicio" placeholder="Comentarios..."></textarea>
          </div>

					<div class="card">					
						<div class="rating-container">
							
							<div class="rating">
								<form class="rating-form">

								<p class="text-center"><b>Tiempo de Respuesta</b></p>

								<label for="super-happy03">
									<input type="radio" name="siga_tiempo_respuesta" class="super-happy03" id="super-happy03" value="1" checked style="position: absolute; opacity: 0;"/>
									<svg viewBox="0 0 24 24">
									<path d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
								</label>

								<label for="happy03">
									<input type="radio" name="siga_tiempo_respuesta" class="happy03" id="happy03" value="2" style="position: absolute; opacity: 0;" />
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24">
									<path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z" /></svg>
								</label>

								<label for="neutral03">
									<input type="radio" name="siga_tiempo_respuesta" class="neutral03" id="neutral03" value="3" style="position: absolute; opacity: 0;"/>
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24">
									<path d="M8.5,11A1.5,1.5 0 0,1 7,9.5A1.5,1.5 0 0,1 8.5,8A1.5,1.5 0 0,1 10,9.5A1.5,1.5 0 0,1 8.5,11M15.5,11A1.5,1.5 0 0,1 14,9.5A1.5,1.5 0 0,1 15.5,8A1.5,1.5 0 0,1 17,9.5A1.5,1.5 0 0,1 15.5,11M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M9,14H15A1,1 0 0,1 16,15A1,1 0 0,1 15,16H9A1,1 0 0,1 8,15A1,1 0 0,1 9,14Z" /></svg>
								</label>

								<label for="sad03">
									<input type="radio" name="siga_tiempo_respuesta" class="sad03" id="sad03" value="4" style="position: absolute; opacity: 0;" />
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%" viewBox="0 0 24 24">
									<path d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M15.5,8C16.3,8 17,8.7 17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M12,14C13.75,14 15.29,14.72 16.19,15.81L14.77,17.23C14.32,16.5 13.25,16 12,16C10.75,16 9.68,16.5 9.23,17.23L7.81,15.81C8.71,14.72 10.25,14 12,14Z" /></svg>
								</label>

								<label for="super-sad03">
									<input type="radio" name="siga_tiempo_respuesta" class="super-sad03" id="super-sad03" value="5" style="position: absolute; opacity: 0;" />
									<svg viewBox="0 0 24 24">
									<path d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg>
								</label>

								</form>
							</div>
						</div>
					</div>

					<div class="form-group">
            <textarea rows="2" class="form-control" id="tiempo_respuesta" name="tiempo_respuesta" placeholder="Comentarios..."></textarea>
          </div>

					<div>
					<p class="text-center"><b>Usuario Cierre</b></p>
						<select id="siga_appSiga_UsuarioFinal" name="siga_appSiga_UsuarioFinal">
						<option></option>
						<?php foreach($usuariosInfo as $item) { ?>
								<option value="<?php echo $item['Id_Usuario']; ?>"><?php echo $item['Nombre_Usuario'].' / '.$item['No_Usuario'];?></option>
							<?php } ?>                                  
						</select>


					</div>
						<br>
					<div style="border: 1px solid #EEEEEE; border-radius: 6px; -moz-border-radius: 6px; -webkit-border-radius: 6px; padding: 10px;" style="width: 98%;">
						<p class="text-center"><b>Firma / Para calificar y revisar el detalle de ticket desplace hacia arriba</b></p>
					<div>
						<center>
							<canvas id="signature-pad" class="signature-pad" width="414" height="192" style="background-color: #fcfcfc;"></canvas>
						</center>
					</div>																				
					<p class="text-center"><b>Para calificar y revisar el detalle de ticket desplace hacia arriba</b></p>
	</div>
</div>

			<div class="modal-body nopsides">

					<div class="col-md-10 col-md-offset-1">
        	</div>	

					<div class="col-md-9">
						<div class="form-group">
							<ul class="inline center" id="divSeccion_cambia_area"></ul>
						</div>
					</div>

					<div class="col-md-12" align="center">
						<div class="form-group" >
						<input type="button" value="Limpiar Firma" id="clear" class="btn chs"> 
						<button type="button" id="sigaCerrarTicketAppBtn" class="btn chs">Cerrar Ticket</button>
						</div>
					</div>

				</div>
		
		</div>
	</div>
</div>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

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

</div>
<!-- ./wrapper -->

<!-- bootstrap datepicker -->
<!--<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>-->
<!-- SlimScroll 1.3.0 -->
	<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>

	<!-- File Input -->
	<link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
	<script src="../plugins/docsupport/standalone/selectize.js"></script>
	<script src="../plugins/docsupport/index.js"></script>
	<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>  
	<script src="DataTables1.10.0/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
	<link href="DataTables1.10.0/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../dist/js/jquery.qrcode.js"></script>
	<script type="text/javascript" src="../dist/js/qrcode.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
	<script src="../plugins/signature_pad/signature_pad.min.js"></script>
	<script src="/siga/plugins/sweetalert2/sweetalert2.js"></script>


<!-- 
<script src="../ckeditor/ckeditor.js"></script>
<script src="../ckeditor/ver5/ckeditor.js"></script>
-->	

<script>

	if($("#idareasesion").val()=="1"){
		$("#div_desc_acc_real_gest").hide();
	}else{
		$("#div_desc_acc_real_gest").show();
	}

	var numfila=0;
	var array_accesorios_act_ext=[];
	var array_eliminados_act_ext=[]; 
	var cont_eliminados_act_ext=0;	
	
	var switch_fech_prog=0;
	var archivos_adjuntos="";
	var imagenes_adjuntos="";
	var array_img=["PNG", "JPG", "JPEG", "BMP", "GIF", "HEIC"];
	//var array_arch=["PDF", "DOCX", "DOC", "XLS","XLSX", "PPT","PPTX","MSG", "TXT"];
	var array_arch=["DOCX", "DOC", "XLS","XLSX", "PPT","PPTX","MSG", "TXT","PDF","SQL","TXT"];

	function validar_si_existe_imagen(id){
		$("#spanImagenesAdjuntasOK").hide();
		$("#spanImagenesAdjuntasFail").hide();
			$.ajax({
				url: '../poo/mistickets-gestor/ajax_validar_si_existe_fotografia.php',
				type: 'POST',
				dataType: 'JSON',
				data: {Id_Solicitud: id},
				cache:false,
				success: function(data){
					console.log(data);

					$("#validar_url").val(data);
						if(data == ''){
							$("#spanImagenesAdjuntasOK").hide();
							$("#spanImagenesAdjuntasFail").show();
						}else{
							$("#spanImagenesAdjuntasOK").show();
							$("#spanImagenesAdjuntasFail").hide();
						}

				}
			});

	}

	function validar_area(id){

		$.ajax({
			url: '../poo/mistickets-gestor/ajax_validar_area_por_ticket.php',
			type: 'POST',
			dataType: 'JSON',
			data: {Id_Solicitud_dato: id},
			cache: false,
			success: function(data){
				var area=data[0];
				if(data==1){
					div_categoria_solicitar_cierre_fn(id);
					div_subcategoria_solicitar_cierre_fn(id);
				}else{
					$("#div_categoria_solicitar_cierre").hide();
					$("#div_subcategoria_solicitar_cierre").hide();
				}
			}
		});		

	}

	function div_categoria_solicitar_cierre_fn(id){

		$.ajax({
			url: '../poo/mistickets-gestor/ajax_categoria_por_ticket.php',
			type: 'POST',
			dataType: 'JSON',
			cache: false,
			data: {Id_Solicitud_dato: id},
			success:function(data){
					$("#cmbcategoria_solicitar_cierre").html(data);
					$("#div_categoria_solicitar_cierre").show();
			}
		});	

	}

	function div_subcategoria_solicitar_cierre_fn(id){

		$.ajax({
			url: '../poo/mistickets-gestor/ajax_subcategoria_por_ticket.php',
			type: 'POST',
			dataType: 'JSON',
			data: {Id_Solicitud_dato: id},
			success:function(data){
					$("#cmbsubcategoria_solicitar_cierre").html(data);
					$("#div_subcategoria_solicitar_cierre").show();
			}
		});	

	}	


$("#cmbcategoria_solicitar_cierre").on("change",function(){
		var id_categoria 	=$(this).val();

		$.ajax({
			url: '../poo/mistickets-gestor/ajax_subcategoria_por_id.php',
			type: 'POST',
			dataType: 'JSON',
			data: {id_categoria_select: id_categoria},
			cache:false,
			success:function(data){
				$("#cmbsubcategoria_solicitar_cierre").html(data);
			}
		});	

});

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
	
	
	function validarEmail(elemento, div){
		var texto = document.getElementById(elemento.id).value;
		var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
		
		if (!regex.test(texto)) {
				document.getElementById(div).innerHTML = "(Correo invalido)";
		} else {
			document.getElementById(div).innerHTML = "";
		}

	}
	
updateStatus=function(Id_ticket){

	$.confirm({
	    title: 'Cambiar Estado.',
	    content: '¿Desea regresar el ticket a estado "Seguimiento"?',
	    icon: 'fa fa-question',
	    type: 'red',
	    buttons: {
	        confirm: function () {

						$.ajax({
	        		url: '../poo/mistickets-gestor/ajax_update_estatus.php',
	        		type: 'POST',
	        		dataType: 'JSON',
	        		data: {Id_ticket: Id_ticket},
	        		cache:false,
	        		success: function(data){
	        			console.log(data);
	        			$.alert('Operación éxitosa!');
	        			$('#tablaPorCerrar').DataTable().ajax.reload();
	        		}
	        	});        	
	        	
	        },
	        cancel: function () {
	            $.alert('Operación Cancelada!');
	        },
	    }
	});

}

//********************************************************************************************************************************************************************************************** */
//********************************************************************************************************************************************************************************************** */

function sigaCerrarTicketApp(id_solicitud){

  $.ajax({
    type: "POST",
    url: "../class/biomedica/appSiga/appSiga.ajax.php",
    data: {accion:1,siga_ticket_por_cerrar_noTicket:id_solicitud},
    dataType: "JSON",
    cache: false,    
    success: function (response) {
		
      let bandera_int = response['bandera_int'];
			let bandera_ext = response['bandera_ext'];
			
			if(bandera_int==0 && bandera_ext==0){
				$('#siga_appSiga_activo').html('');
				$('#siga_appSiga_marca').html('');
				$('#siga_appSiga_serie').html('');
			} else if (bandera_int==0 && bandera_ext !=0){
				$('#siga_appSiga_activo').html(response['Nombre_Act_Ext']);
        $('#siga_appSiga_marca').html(response['Marca_Act_Ext']);
        $('#siga_appSiga_serie').html(response['No_Serie_Act_Ext']);
				$('#siga_appSiga_modelo').html(response['Modelo_Act_Ext']);				
			} else if (bandera_int !=0){
				$('#siga_appSiga_activo').html(response['AF_BC']+'/'+response['DescCorta']);
        $('#siga_appSiga_marca').html(response['Marca']);
        $('#siga_appSiga_serie').html(response['NumSerie']);
				$('#siga_appSiga_modelo').html(response['modelo']);			
			}

				$('#siga_appSiga_titulo').html(response['Titulo']);
				$('#siga_appSiga_desc_detalle').html(response['Desc_Motivo_Reporte']);
				$('#siga_appSiga_Fech_Solicitud').html(response['Fech_Solicitud']);
        $('#siga_appSiga_Fech_Espera_Cierre').html(response['Fech_Espera_Cierre']);
				$('#siga_appSiga_idSolicitud').html(response['Id_Solicitud']);
				$('#siga_appSiga_uPrimaria').html(response['Id_Ubic_Prim']);
				$('#siga_appSiga_uSecundaria').html(response['Id_Ubic_Sec']);
				$('#siga_appSiga_aparente').html(response['Id_Motivo_Aparente']);
				$('#siga_appSiga_real').html(response['Id_Motivo_Real']);
				$('#siga_appSiga_estatus').html(response['Id_Est_Equipo']);
				$('#siga_appSiga_categoria').html(response['Id_Categoria']);
				$('#siga_appSiga_subCategoria').html(response['Id_Subcategoria']);
				$('#siga_appSiga_ComentarioCierre').html(response['ComentarioCierre']);
				$('#siga_appSiga_UsuarioInicial').html(response['Id_Usuario_Inicial']);
				$("#sigaCerrarTicket").prop("disabled", false);
				$("#clear").prop("disabled", false); 
			},
			error:function(response){
				alerta('error','No se puede mostrar información.'+response);
			}

		});
	$('#sigaCerrarTicketAppModal').modal('show');
	$('#siga_id_ticket').text(id_solicitud);
}

function alerta(icon,text){
  Swal.fire({
  position: "center",
  icon: icon,
  title: text,
  showConfirmButton: false,
  timer: 1500
});
}


function CierraModal(){
	$('#sigaCerrarTicketAppModal').modal('hide');
	limpiarCalificarTicket();

}

function limpiarCalificarTicket(){
	$('#solucion').val('');
	$('#servicio').val('');
	$('#tiempo_respuesta').val('');
	$("input[name=siga_solucion][value='1']").prop("checked",true);
	$("input[name=siga_servicio][value='1']").prop("checked",true);
	$("input[name=siga_tiempo_respuesta][value='1']").prop("checked",true);
	$('#siga_appSiga_UsuarioFinal').val(null).trigger('change');
	firma();
}

function firma(){
	var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
			backgroundColor: 'rgba(255, 255, 255, 0)',
			penColor: 'rgb(0, 0, 0)',			

	});

  signaturePad.clear();
}



//********************************************************************************************************************************************************************************************** */
//********************************************************************************************************************************************************************************************** */

$(document).ready(function(){

	let miDatoArea = $('#idareasesion').val();
	alert(miDatoArea);

// $('#lista_actividades_rutinas').DataTable();

	let Id_Area=$("#idareasesion").val();
	$('#loadingState').hide();

	if(Id_Area==1){
		$('#li_materiales').show();
		$('#tabla_de_accesorios').load('/siga/vistas/view/biomedica/components/rutinas/siga_tabla_accesorios.com.php');
		$('#tabla_de_materiales').load('/siga/vistas/view/biomedica/components/rutinas/siga_tabla_materiales.com.php');	
	}

	$('#siga_appSiga_UsuarioFinal').selectize({});
		
	var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
			backgroundColor: 'rgba(255, 255, 255, 0)',
			penColor: 'rgb(0, 0, 0)',

	});

  signaturePad.clear();

  $('#clear').click(function(e) {
      e.preventDefault();
      signaturePad.clear();
  });

	$('#siga_biomedica_activos').DataTable({
  aLengthMenu: [
        [5,25, 50, 100, 200, -1],
        [5,25,50,100,200,"All"]
    ],    
    language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
                },
                "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
							}
});


	
//********************************************************************************************************************************************************************************************** */
//********************************************************************************************************************************************************************************************** */

	$('#sigaCerrarTicketAppBtn').on('click', function(){

	let dato = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAAAXNSR0IArs4c6QAABGJJREFUeF7t1AEJAAAMAsHZv/RyPNwSyDncOQIECEQEFskpJgECBM5geQICBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAAYPlBwgQyAgYrExVghIgYLD8AAECGQGDlalKUAIEDJYfIEAgI2CwMlUJSoCAwfIDBAhkBAxWpipBCRAwWH6AAIGMgMHKVCUoAQIGyw8QIJARMFiZqgQlQMBg+QECBDICBitTlaAECBgsP0CAQEbAYGWqEpQAgQdWMQCX4yW9owAAAABJRU5ErkJggg==';
	let solucion 					= $('#solucion').val();
	let servicio 					= $('#servicio').val();
	let	tiempo_respuesta 	= $('#tiempo_respuesta').val();
	let id_solicitud			= $('#siga_appSiga_idSolicitud').text();
	let imageData					= signaturePad.toDataURL('image/png');
	let siga_appSiga_UsuarioFinal = $('#siga_appSiga_UsuarioFinal').val();
	let siga_solucion			= $('input:radio[name=siga_solucion]:checked').val();
	let siga_servicio			= $('input:radio[name=siga_servicio]:checked').val();
	let siga_tiempo_respuesta	= $('input:radio[name=siga_tiempo_respuesta]:checked').val();
	let validar 					= true;

	if(id_solicitud == ""){
		alerta('error','Ticket no válido');
    location.reload(true);
		validar = false;
	} else if(solucion == ""){
		$('#solucion').attr('placeholder','Campo Obligatorio');
    $('#solucion').focus();
    alerta('error','Solución Ofrecida: Campo Obligatorio');
		validar = false;
	} else if(servicio==""){
    $('#servicio').attr('placeholder','Campo Obligatorio');
		$('#servicio').focus();
    alerta('error','Actitud de servicio: Campo Obligatorio');
    validar = false;
	} else if(tiempo_respuesta==""){
    $('#tiempo_respuesta').attr('placeholder','Campo Obligatorio');
		$('#tiempo_respuesta').focus();
    alerta('error','Tiempo de Respuesta: Campo Obligatorio');
    validar = false;
	} else if (siga_appSiga_UsuarioFinal==-1){
    alerta('error','Usuario cierre: Obligatorio');
    validar = false;
  } else if(imageData == dato){
    alerta('error','Firma: Campo Obligatorio');
    validar=false;
	}

	if(validar){
		

    $.ajax({
      type: "POST",
      url: "../class/biomedica/appSiga/appSiga.ajax.php",
      data: {accion:2,id_solicitud:id_solicitud,siga_appSiga_UsuarioFinal:siga_appSiga_UsuarioFinal,siga_appSiga_Ofrecida:solucion,
            siga_appSiga_Servicio:servicio,siga_appSiga_Respuesta:tiempo_respuesta,siga_appSiga_Ofrecida_c:siga_solucion,
            siga_appSiga_Servicio_c:siga_servicio,siga_appSiga_Respuesta_c:siga_tiempo_respuesta,imageData:imageData},
      dataType: "JSON",
      cache: false,
      beforeSend:function(){

      },
      success: function (response) {
        
        if(response == 1){
          Swal.fire({
              position: "center",
              icon: "success",
              title: "Ticket cerrado correctamente",
              showConfirmButton: false,
              timer: 1500
            }).then(function() {
              location.reload(); 
            });
        
        } else if(response == 5){
          Swal.fire({
              position: "center",
              icon: "error",
              title: "Ticket cerrado sin éxito.",
              showConfirmButton: false,
              timer: 1500
            }).then(function() {
							location.reload();
             
            });
        
        }
      
      }
    });



	}


});

//********************************************************************************************************************************************************************************************** */
//********************************************************************************************************************************************************************************************** */

$("#cmbcategoria").on('change',function(){
	$("#error_cmbsubcategoria").html('');
});
	

$("#cmbsubcategoria").on('change',function(){
	var id_subcategoria=$("#cmbsubcategoria").val();
	$("#error_cmbsubcategoria").html('');
});


$("#ticket_actualizar_categoria").click(function() {
	$("#error_cmbsubcategoria").html('');
	var id_categoria_update=$("#cmbcategoria").val();
	var id_subcategoria_update=$("#cmbsubcategoria").val();
	var id_solicitud_update=$("#spanNumsolicitud1").text();
	var validado=true;

	if(id_subcategoria_update =="" ){
		$("#id_subcategoria").focus();
		$("#error_cmbsubcategoria").html('* Campo Requerido');
		$("#error_cmbsubcategoria").css({color:"red", fontSize: "11px"});
		validado=false;
	}

	if(validado){
		$.ajax({
			url: '../poo/mistickets-gestor/ajax_update_categoria_subcategoria.php',
			type: 'POST',
			dataType: 'JSON',
			cache:false,
			data: {	id_categoria_update: id_categoria_update,
							id_subcategoria_update:id_subcategoria_update,
							id_solicitud_update:id_solicitud_update},

			success:function(data){
				$('#tablaSeguimiento').DataTable().ajax.reload();

						$.ajax({
							url: '../poo/mistickets-gestor/ajax_mostrar_solo_categoria.php',
							type: 'POST',
							dataType: 'JSON',
							cache:false,
							data: {id_categoria_update: id_categoria_update},
							success:function(data){
								$("#spanCategoria1").html(data);								
							}
						});
						
						$.ajax({
							url: '../poo/mistickets-gestor/ajax_mostrar_solo_sub_categoria.php',
							type: 'POST',
							dataType: 'JSON',
							cache:false,
							data: {id_subcategoria_update: id_subcategoria_update},
							success:function(data){
								$("#spanSubcategoria1").html(data);
							}
						});

			},error:function(){
				alert('No se puedo realizar la actualización. Contacte a ');
			}
		});	

	}

});


	$('#Pre_Re_Fecha_Hora_Cirugia').datetimepicker({
      dateFormat: 'yyyy:mm:dd HH:ii'
  });
	
	carga_control_adjuntos();
	function carga_control_adjuntos(){
		var Adjuntos="";
		Adjuntos='<label for="documentos_adjuntos_FILE" class="control-label" id="documentos_adjuntos_FILELabel" style="font-size: 11px;">1.-Adjuntar Imagen</label>';			  
        Adjuntos+='<input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
		Adjuntos+='<input type="hidden" id="Url_Foto_Activo">';
	
		$("#Adjuntos_tickets").html(Adjuntos);
		carga_arch_mesa("documentos_adjuntos_FILE", "Url_Foto_Activo","../Archivos/Archivos-Mesa",true,false);
	}
	
	//Se inicia el control de gestores
	$('#numempleadoresguardo').selectize({
		//sortField: 'text'
	});
		
	$('#cmb_motivo_aparente').selectize({
	//sortField: 'text'
	});
	
	$('#cmb_motivo_real').selectize({
		//sortField: 'text'
	});
	
	$('#cmbcategoria').selectize({
		//sortField: 'text'
	});
	
	$('#cmbsubcategoria').selectize({
		//sortField: 'text'
	});

	
	function isFlashEnabled(){
		var hasFlash = false;
		try
		{
			var fo = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
			if(fo) hasFlash = true;
		}
		catch(e)
		{
			if(navigator.mimeTypes ["application/x-shockwave-flash"] != undefined) hasFlash = true;
		}
		return hasFlash;
	}

	//Validacion Tabla de Costos
	$("#Total_CE").prop( "disabled", true );
	$("#Total_CI").prop( "disabled", true );
	
	$('#Horas').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
	
	$("#Horas").on('keyup', function(){
        var value = $(this).val().length;
        if(value>0){
			var Respuesta1=$(this).val()*1500
			$("#Mano_Obra_CE").val(Respuesta1);
			
			var Respuesta2=$(this).val()*70
			$("#Mano_Obra_CI").val(Respuesta2);
		}else{
			$("#Mano_Obra_CE").val("");
			$("#Mano_Obra_CI").val("");
		}
				
		//Total Costo Interno
		var Costos_Mat=$("#Costos_Materiales_CE").val().length;
		if(Costos_Mat>0){
			var Cos_Mater=parseFloat($("#Costos_Materiales_CE").val());
			$("#Total_CE").val(Cos_Mater);
			if($("#Mano_Obra_CE").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CE").val());
				var resultado=(Cos_Mater+Mano_Obra);
				$("#Total_CE").val(resultado);
			}
		}else{
			$("#Total_CE").val("");
			if($("#Mano_Obra_CE").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CE").val());
				var resultado=(Mano_Obra);
				$("#Total_CE").val(resultado);
			}
		}
		
		
		//Total Costo Externo
		var Costos_Mat_CI=$("#Costos_Materiales_CI").val().length;
		if(Costos_Mat_CI>0){
			var Cos_Mater_CI=parseFloat($("#Costos_Materiales_CI").val());
			$("#Total_CI").val(Cos_Mater_CI);
			if($("#Mano_Obra_CI").val()!=""){
				var Mano_Obra_CI=parseFloat($("#Mano_Obra_CI").val());
				var resultado_CI=(Cos_Mater_CI+Mano_Obra_CI);
				$("#Total_CI").val(resultado_CI);
			}
		}else{
			$("#Total_CI").val("");
			$("#Total_CI").val("");
			if($("#Mano_Obra_CI").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CI").val());
				var resultado=(Mano_Obra);
				$("#Total_CI").val(resultado);
			}
		}
				
		
		if($("#Total_CE").val()!=""){
			if($("#Total_CI").val()!=""){
				var Total_CE=parseFloat($("#Total_CE").val());
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CE-Total_CI;
				$("#Ahorro").val(Res_Total);
			}
		}else{
			if($("#Total_CI").val()!=""){
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CI;
				$("#Ahorro").val(Res_Total);
			}else{
				$("#Ahorro").val("");
			}
		}
		
		if($("#Total_CI").val()==""){
			$("#Ahorro").val("");
		}
		
    }).keyup();
	
	$("#Mano_Obra_CE").on('keyup', function(){
		var value = $(this).val().length;
        
		if(value>0){
			var Mano_Obra=parseFloat($("#Mano_Obra_CE").val());
			var resultado=(Mano_Obra);
			$("#Total_CE").val(resultado);
			
			if($("#Costos_Materiales_CE").val()!=""){
				var Cos_Mater=parseFloat($("#Costos_Materiales_CE").val());
				$("#Total_CE").val(Cos_Mater);
				var resultado=(Cos_Mater+Mano_Obra);
				$("#Total_CE").val(resultado);
			}
		}else{
			$("#Total_CE").val("");
			if($("#Costos_Materiales_CE").val()!=""){
				var Costos_Materiales_CE=parseFloat($("#Costos_Materiales_CE").val());
				var resultado=(Costos_Materiales_CE);
				$("#Total_CE").val(resultado);
			}
		}
		
		if($("#Total_CE").val()!=""){
			if($("#Total_CI").val()!=""){
				var Total_CE=parseFloat($("#Total_CE").val());
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CE-Total_CI;
				$("#Ahorro").val(Res_Total);
			}
		}else{
			if($("#Total_CI").val()!=""){
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CI;
				$("#Ahorro").val(Res_Total);
			}else{
				$("#Ahorro").val("");
			}
		}
		
		if($("#Total_CI").val()==""){
			$("#Ahorro").val("");
		}
    }).keyup();
	
	$("#Mano_Obra_CI").on('keyup', function(){
		var value = $(this).val().length;
        
		if(value>0){
			var Mano_Obra=parseFloat($("#Mano_Obra_CI").val());
			var resultado=(Mano_Obra);
			$("#Total_CI").val(resultado);
			
			if($("#Costos_Materiales_CI").val()!=""){
				var Cos_Mater=parseFloat($("#Costos_Materiales_CI").val());
				$("#Total_CI").val(Cos_Mater);
				var resultado=(Cos_Mater+Mano_Obra);
				$("#Total_CI").val(resultado);
			}

		}else{
			$("#Total_CI").val("");
			if($("#Costos_Materiales_CI").val()!=""){
				var Costos_Materiales_CI=parseFloat($("#Costos_Materiales_CI").val());
				var resultado=(Costos_Materiales_CI);
				$("#Total_CI").val(resultado);
			}
		}
		
		if($("#Total_CE").val()!=""){
			if($("#Total_CI").val()!=""){
				var Total_CE=parseFloat($("#Total_CE").val());
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CE-Total_CI;
				$("#Ahorro").val(Res_Total);
			}
		}else{
			if($("#Total_CI").val()!=""){
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CI;
				$("#Ahorro").val(Res_Total);
			}else{
				$("#Ahorro").val("");
			}
		}
		
		if($("#Total_CI").val()==""){
			$("#Ahorro").val("");
		}		
		
    }).keyup();
	
	$("#Costos_Materiales_CE").on('keyup', function(){
		var value = $(this).val().length;
        
		if(value>0){
			var Cos_Mater=parseFloat($("#Costos_Materiales_CE").val());
			$("#Total_CE").val(Cos_Mater);
			if($("#Mano_Obra_CE").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CE").val());
				var resultado=(Cos_Mater+Mano_Obra);
				$("#Total_CE").val(resultado);
			}
		}else{
			$("#Total_CE").val("");
			if($("#Mano_Obra_CE").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CE").val());
				var resultado=(Mano_Obra);
				$("#Total_CE").val(resultado);
			}
		}
		
		if($("#Total_CE").val()!=""){
			if($("#Total_CI").val()!=""){
				var Total_CE=parseFloat($("#Total_CE").val());
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CE-Total_CI;
				$("#Ahorro").val(Res_Total);
			}
		}else{
			if($("#Total_CI").val()!=""){
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CI;
				$("#Ahorro").val(Res_Total);
			}else{
				$("#Ahorro").val("");
			}
		}
		
		if($("#Total_CI").val()==""){
			$("#Ahorro").val("");
		}
		
    }).keyup();
	
	$("#Costos_Materiales_CI").on('keyup', function(){
		var value = $(this).val().length;
        
		if(value>0){
			var Cos_Mater=parseFloat($("#Costos_Materiales_CI").val());
			$("#Total_CI").val(Cos_Mater);
			if($("#Mano_Obra_CI").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CI").val());
				var resultado=(Cos_Mater+Mano_Obra);
				$("#Total_CI").val(resultado);
			}
		}else{
			$("#Total_CI").val("");
			if($("#Mano_Obra_CI").val()!=""){
				var Mano_Obra=parseFloat($("#Mano_Obra_CI").val());
				var resultado=(Mano_Obra);
				$("#Total_CI").val(resultado);
			}
		}
		
		if($("#Total_CE").val()!=""){
			if($("#Total_CI").val()!=""){
				var Total_CE=parseFloat($("#Total_CE").val());
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CE-Total_CI;
				$("#Ahorro").val(Res_Total);
			}
		}else{
			if($("#Total_CI").val()!=""){
				var Total_CI=parseFloat($("#Total_CI").val());
				var Res_Total=Total_CI;
				$("#Ahorro").val(Res_Total);
			}else{
				$("#Ahorro").val("");
			}
		}
		
		if($("#Total_CI").val()==""){
			$("#Ahorro").val("");
		}
		
    }).keyup();
	//Fin Validacion Tabla de Costos


	bloqueardatosgenerales=function(bolean){

		$('#div_seccion_dat_gener').find(':radio[name=chkSoporte]').attr('disabled', bolean);
		$('#ul_lo_realiza').find(':radio[name=chkLorealiza]').attr('disabled', bolean);
		
		var $selectcat= $('#cmbcategoria').selectize({});
		var controlcat = $selectcat[0].selectize;
		
		var $selectsub= $('#cmbsubcategoria').selectize({});	
		var controlsub = $selectsub[0].selectize;
		
		if(bolean==false){
			controlcat.enable();
			controlsub.enable();
		}else{
			controlcat.enable();
			controlsub.enable();
		}
						
		$("#cmbcategoria").prop('disabled', bolean);

		$("#cmbsubcategoria").prop('disabled', bolean);
		$("#Titulo").prop('disabled', bolean);
		$("#Descripcion").prop('disabled', bolean);
		$('#div_prioridad_dat_gener').find(':radio[name=prioridad]').attr('disabled', bolean);
	
		var $select3 = $('#numempleadoresguardo').selectize({});	
		var control3 = $select3[0].selectize;
		if(bolean==true)
		control3.disable();
		else
		control3.enable();
		
		$("#seguimiento").prop('disabled', bolean);
		
		var $select4 = $('#gestorejecutante').selectize({});	
		var control4 = $select4[0].selectize;
		if(bolean==true)
		control4.disable();
		else
		control4.enable();
		
	}

	//Variables que se cargan al Inicio
	var tab_activex=1;
	
	//Guardar Registros Asistencia Especual
	$("#solicitar").click(function () {
		var Agregar = true;
		var mensaje_error = "";
		var strDatos={};
		//Area de sesion
		var Id_Area=$("#idareasesion").val();
		
		//Usuario Sesion empleado
		var Id_Usuario_Vip=$("#numempleadoresguardo1").val();
		var Medio=$("#hdd_Medio_Asis_Esp").val();
		var Seccion=$("#hdd_Seccion_Asis_Esp").val();
		var Id_Categoria=$("#cmbcategoria_Asis_Esp").val();
		var Id_Subcategoria=$("#cmbsubcategoria_Asis_Esp").val();
		var Titulo=$.trim($("#Descripcion_Asis_Esp").val());
		var Id_Activo=$.trim($("#hidden_seleccion_activo").val());
		var Desc_Categoria=$.trim($("#Descripcion_Det_Asis_Esp").val());
		var Id_Gestor=$("#Id_Usuario_Gestor").val();
		var Foto=$.trim($("#Url_Foto_Activo").val());
		var Prioridad="";
		var Url_archivo="";
		
		var Lo_Realiza=0;
		if($("#Realiza_Interno_AE").is(':checked')) {  
            Lo_Realiza=0;
        }else{
			if($("#Realiza_Externo_AE").is(':checked')) {  
				Lo_Realiza=1;   
			}
		}
		//////////
		 
		
		if (Id_Area.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta elegir el área (Biomedica, TIC, etc)<br />";	
		}
		
		if (Id_Usuario_Vip=="") {
			Agregar = false; 
			mensaje_error += " -Selecciona al usuario Solicitante<br/>";	
		}
		
		if (Medio.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta elegir el Medio<br />";
		}
		
		if (Seccion.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta elegir la sección<br />";
		}
		
		if (Id_Categoria=="-1") {
			Agregar = false; 
			mensaje_error += " -Selecciona la categoria<br/>";	
		}
		
		if (Id_Subcategoria=="-1") {
			Agregar = false; 
			mensaje_error += " -Selecciona la Subcategoria<br/>";	
		}
		
		if (Titulo.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Descripción<br />";
		}
		
		
		/////////
		if($("#Check_Alta_Asis_Esp").is(':checked')) {  
			Prioridad="1";
		}
		
		if($("#Check_Media_Asis_Esp").is(':checked')) {  
			Prioridad="2";
		}
		
		if($("#Check_Poca_Asis_Esp").is(':checked')) {  
			Prioridad="3";
		}
		
		if (Prioridad=="") {
			Agregar = false; 
			mensaje_error += " -Falta agregar la Prioridad<br />";
		}
		/////////
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		
		
		if(Agregar)
		{
			strDatos.Id_Usuario=Id_Usuario_Vip;
			strDatos.Id_Area=Id_Area;
			strDatos.Id_Medio=Medio;
			strDatos.Id_Activo=Id_Activo;
			strDatos.Seccion=Seccion;
			strDatos.Lo_Realiza=Lo_Realiza;
			strDatos.Id_Categoria=Id_Categoria;
			strDatos.Id_Subcategoria=Id_Subcategoria;
			strDatos.Titulo=Titulo;
			strDatos.Desc_Motivo_Reporte=Desc_Categoria;
			strDatos.Prioridad=Prioridad;
			strDatos.Url_archivo=Foto;
			strDatos.Usr_Inser=$("#usuariosesion").val();
			strDatos.Estatus_Reg="1";			
			strDatos.accion="guardar";
			strDatos.Asist_Especial="1";
			
			if(Seccion==$("#hddId_Seccion").val()){
				if(Id_Gestor!=""){
					strDatos.Id_Gestor=Id_Gestor;
					strDatos.Estatus_Proceso="1";
				}else{
					strDatos.Id_Gestor=$("#usuariosesion").val();
					strDatos.Estatus_Proceso="2";
				}
			}else{
				strDatos.Estatus_Proceso="1";
			}
			
			var confirmar=0;
			
			if(Id_Activo==""){
				var bool=confirm("Deseas generar el ticket sin selecceioanar el activo!");
				if(bool){
					confirmar=1;
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
							$("#closeModal_Asist_Esp").click();
							limpiarcamposasistenciaesp();
							
							if (json.totalCount > 0) {
								mensajesalerta("&Eacute;xito", "Generado Correctamente.", "success", "dark");
								$('#tablaNuevos').DataTable().ajax.reload();
								$('#tablaSeguimiento').DataTable().ajax.reload();
								Carga_Perfil_Gestor();
								if(json.data[0].Id_Estatus_Proceso=="2"){
									$("#tabSeguimiento").click();
								}else{
									$("#tabNuevas").click();
								}
								
							}else{
								mensajesalerta("Oh No!", "Ocurrio un error al guardar comuniquese con el administrador.", "error", "dark");
							}
							
						},
						error: function () {
							mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
						}
					});
				}else{
					confirmar=0;
				}
				
			}else{
				confirmar=1;
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
						$("#closeModal_Asist_Esp").click();
						limpiarcamposasistenciaesp();
						
						if (json.totalCount > 0) {
							mensajesalerta("&Eacute;xito", "Generado Correctamente.", "success", "dark");
							$('#tablaNuevos').DataTable().ajax.reload();
							$('#tablaSeguimiento').DataTable().ajax.reload();
							Carga_Perfil_Gestor();
							if(json.data[0].Id_Estatus_Proceso=="2"){
								$("#tabSeguimiento").click();
							}else{
								$("#tabNuevas").click();
							}
							
						}else{
							mensajesalerta("Oh No!", "Ocurrio un error al guardar comuniquese con el administrador.", "error", "dark");
						}
						
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
					}
				});
			}
		}
	});	
	
	usuarios_empleados_Asis_Esp();
	
	function usuarios_empleados_Asis_Esp(){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",
			data: {
				Estatus_Reg: '1',
				accion: 'consultar'
			},
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargandoaltausuarios1").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {

						var usuarios='';
						usuarios+='<option></option>';
						usuarios+='<optgroup label="Usuarios">';

						for (var i = 0; i < json.totalCount; i++) {
							usuarios+='<option value="'+json.data[i].Id_Usuario.trim()+'">'+json.data[i].No_Usuario.trim()+'-'+json.data[i].Nombre_Usuario.trim()+'</option>';
						}
						usuarios+='</optgroup>';
						$('#numempleadoresguardo1').html(usuarios);

						$("#gifcargandoaltausuarios1").hide();
						$("#numempleadoresguardo1").show();
							
						$('#numempleadoresguardo1').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargandoaltausuarios1").hide();
						$('#numempleadoresguardo1').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#numempleadoresguardo1').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	gestores_ejecutantes();

	function gestores_ejecutantes(){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",
			data: {
				Id_Area:$("#idareasesion").val(),
				accion: "cmb_ejecutantes"
			},
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargandogestorejecutante").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {

						var usuarios='';
						usuarios+='<option></option>';
						usuarios+='<optgroup label="Ejecutantes">';

						for (var i = 0; i < json.totalCount; i++) {
							usuarios+='<option value="'+json.data[i].Nombre_Completo.trim()+'">'+json.data[i].Nombre_Completo.trim()+'</option>';
						}
						usuarios+='</optgroup>';
						$('#gestorejecutante').html(usuarios);
						$("#gifcargandogestorejecutante").hide();
						$("#gestorejecutante").show();
						$('#gestorejecutante').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargandogestorejecutante").hide();
						$('#gestorejecutante').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#gestorejecutante').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	
	function gestores_asis_esp(Id_Seccion){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_cat_gestores/Siga_cat_gestoresFacade.Class.php",
			data: {
				Id_Area:$("#idareasesion").val(),
				Estatus_Reg:"1",
				Id_Seccion:Id_Seccion,
				accion: 'consultar'
			},
			async: true,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargandogestores").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {

						var usuarios='';
						usuarios+='<option></option>';
						usuarios+='<optgroup label="Usuarios">';

						for (var i = 0; i < json.totalCount; i++) {
							if($("#usuariosesion").val()!=json.data[i].Id_Usuario){
								usuarios+='<option value="'+json.data[i].Id_Usuario.trim()+'">'+json.data[i].Nombre_Empleado.trim()+'</option>';
							}
						}
						usuarios+='</optgroup>';
						$('#Id_Usuario_Gestor').html(usuarios);

						$("#gifcargandogestores").hide();
						$("#Id_Usuario_Gestor").attr("style","display:none");
						//$("#Id_Usuario_Gestor").show();
							
						$('#Id_Usuario_Gestor').selectize({
							//sortField: 'text'
						});
					}
					else {
						$("#gifcargandogestores").hide();
						$('#Id_Usuario_Gestor').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#Id_Usuario_Gestor').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	Carga_Perfil_Gestor();



	function Carga_Perfil_Gestor() {
		var resultado=new Array();
		data={accion: "consultar",Id_Usuario:$("#usuariosesion").val()};
	
		resultado=cargo_cmb("../fachadas/activos/siga_cat_gestores/Siga_cat_gestoresFacade.Class.php",false, data);
	
		
		var htmlDiv="";
		if(resultado.totalCount>0){
			htmlDiv='<div align="center"><h3 class="info-box-text"><label>SECCIONES<label></h3></div>';
			htmlDiv+='<ul class="nav nav-tabs azulf" role="tablist">';
			
			for(var i = 0; i < resultado.totalCount; i++)
			{
				
				var active_class="";
				if("<?php echo $Id_Gestor?>"=="" &&"<?php echo $Tipo_Gestor?>"=="" && "<?php echo $Id_Seccion?>"==""){
					if($("#hidd_url_id_seccion").val()!=""){
						if($("#hidd_url_id_seccion").val()==resultado.data[i]["Id_Seccion"]){
							active_class="active"; 
							$("#hddTipo_Gestor").val(resultado.data[i]["Tipo_Gestor"]);
							$("#hddId_Seccion").val(resultado.data[i]["Id_Seccion"]);
							
							gestores_asis_esp(resultado.data[0]["Id_Seccion"]);	
							//Autocomplete Usuarios Resguardo
							if(resultado.data[i]["Tipo_Gestor"]=="1"){
								usuarios_empleados(resultado.data[i]["Id_Seccion"]);
								$("#divUsuarioReasignar").show();
								$("#asterisco_gestores").show();
								$("#label_gestores").show();
							}
							
							if($("#hidd_url_est_proceso").val()==1){
								$("#li_tab_nuevos").addClass("active");
								$("#li_tab_seguimiento").removeClass("active");
								$("#li_tab_por_cerrar").removeClass("active");
								$("#li_tab_cerrados").removeClass("active");
								
								$("#inventario").addClass("active");
								$("#altas").removeClass("active");
								$("#porcerrar").removeClass("active");
								$("#historico").removeClass("active");
							}else{
								if($("#hidd_url_est_proceso").val()==2){
									$("#li_tab_nuevos").removeClass("active");
									$("#li_tab_seguimiento").addClass("active");
									$("#li_tab_por_cerrar").removeClass("active");
									$("#li_tab_cerrados").removeClass("active");
									
									$("#inventario").removeClass("active");
									$("#altas").addClass("active");
									$("#porcerrar").removeClass("active");
									$("#historico").removeClass("active");
								}else{
									if($("#hidd_url_est_proceso").val()==3){
										$("#li_tab_nuevos").removeClass("active");
										$("#li_tab_seguimiento").removeClass("active");
										$("#li_tab_por_cerrar").addClass("active");
										$("#li_tab_cerrados").removeClass("active");
										
										$("#inventario").removeClass("active");
										$("#altas").removeClass("active");
										$("#porcerrar").addClass("active");
										$("#historico").removeClass("active");
									}else{
										if($("#hidd_url_est_proceso").val()==4){
											$("#li_tab_nuevos").removeClass("active");
											$("#li_tab_seguimiento").removeClass("active");
											$("#li_tab_por_cerrar").removeClass("active");
											$("#li_tab_cerrados").addClass("active");
											
											$("#inventario").removeClass("active");
											$("#altas").removeClass("active");
											$("#porcerrar").removeClass("active");
											$("#historico").addClass("active");
										}
									}
								}
							}
							
							
						}
					}else{
						if(i==0){
							active_class="active"; 
							$("#hddTipo_Gestor").val(resultado.data[0]["Tipo_Gestor"]);
							$("#hddId_Seccion").val(resultado.data[0]["Id_Seccion"]);
							
							gestores_asis_esp(resultado.data[0]["Id_Seccion"]);	
							//Autocomplete Usuarios Resguardo
							if(resultado.data[0]["Tipo_Gestor"]=="1"){
								usuarios_empleados(resultado.data[0]["Id_Seccion"]);
								$("#divUsuarioReasignar").show();
								$("#asterisco_gestores").show();
								$("#label_gestores").show();
							}
						}
						else{
							active_class="";
						}	
					}
					
				}else{
				
					if("<?php echo $Id_Gestor?>"==resultado.data[i].Id_Gestor){
						active_class="active";
						$("#hddTipo_Gestor").val(resultado.data[i]["Tipo_Gestor"]);
						$("#hddId_Seccion").val(resultado.data[i]["Id_Seccion"]);
						
						gestores_asis_esp(resultado.data[0]["Id_Seccion"]);	
						//Autocomplete Usuarios Resguardo
						if(resultado.data[i]["Tipo_Gestor"]=="1"){
							usuarios_empleados(resultado.data[i]["Id_Seccion"]);
							$("#divUsuarioReasignar").show();
							$("#asterisco_gestores").show();
							$("#label_gestores").show();
						}
						
						//$("#cambiar_area").hide();
					}else{
						active_class="";
					}
				}
				var Indicacores="";

				if(resultado.data[i]["Total_Nuevos"]>0){
					Indicacores+='<span class="label label-warning" id="Indicador_nuevos_t_'+i+'" data-toggle="tooltip" title="Nuevas!!">'+resultado.data[i]["Total_Nuevos"]+'</span> ';
				}

				if(resultado.data[i]["Total_Seguimiento"]>0){
					Indicacores+='<span class="label label-success" id="Indicador_seguimiento-t_'+i+'" data-toggle="tooltip" title="Seguimiento!!">'+resultado.data[i]["Total_Seguimiento"]+'</span>';
				}
				
				htmlDiv +='<li role="presentation" class="'+active_class+'">'+Indicacores+'<a  href="#noir" aria-controls="inventario" role="tab" data-toggle="tab" onclick="cambio_de_seccion(\''+resultado.data[i]["Id_Gestor"]+'\',\''+resultado.data[i]["Tipo_Gestor"]+'\',\''+resultado.data[i]["Id_Seccion"]+'\')">'+resultado.data[i].Desc_Seccion+'</a></li>';                
			}
			htmlDiv+='</ul>';
		}
		
		$("#secciones_radio_cambiar").html(htmlDiv);
		
	}
	
	cambio_de_seccion=function(Id_Gestor, Tipo_Gestor, Id_Seccion){
		    $.ajax({
            type: 'POST',
            url: "mistickets-gestor.php",
            data: {
				Id_Gestor:Id_Gestor,
				Tipo_Gestor:Tipo_Gestor,
				Id_Seccion:Id_Seccion
			},
            async: true,
            dataType: "html",
            beforeSend: function (objeto) {
				jsShowWindowLoad();
            },
            success: function (datos) {
				$("#contenedorprincipalactivofijo").html(datos);
				jsRemoveWindowLoad();	
			},
            error: function (objeto, quepaso, otroobj) {
				jsShowWindowLoad("Ocurrio un error<br>Comuniquese con Sistemas");
            }
        });
    
	}
	
	
	$('#tablaNuevos').DataTable({
		"order": [[ 3, "desc" ]],
		//"lengthMenu": [ [10, 25, 50, 100, 100000], [10, 25, 50,100,"Todos"] ] ,
		"dom": 'Bfrtip',
        "lengthMenu": [
            [ 10, 25, 50, 100000 ],
            [ '10 Filas', '25 Filas', '50 Filas', 'Todos' ]
        ],
		"buttons": [
			
            'copy',  'excel', 'pageLength'
        ],
	    "scrollY": 500,
        "scrollX": true,
        "processing": true,
        "serverSide": true,
		"ajax": {
			"url": "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
			"type": "POST",
			"dataSrc": function ( json ) {
				//if(json.recordsTotal>0){
				//	$("#notificacion_nuevos_t").show();
				//	$("#notificacion_nuevos_t").html(json.recordsTotal);
				//}else{
				//	$("#notificacion_nuevos_t").hide();
				//}
				return json.data;
			},
			"data": {
				orden:'AF_BC',
				Gestor_Solicitante:"gestor",
				Id_Area:$("#idareasesion").val(),
				Tipo_Gestor:$("#hddTipo_Gestor").val(),
				Id_Seccion:$("#hddId_Seccion").val(),
				Estatus_Proceso:'1'
			}
		},
		columnDefs: [
				{ orderable: true,className: 'reorder', targets: 3 },
				{ orderable: true, className: 'reorder', targets: 6 },
				{ orderable: false, targets: '_all' }
			],
		"columns": [
		    { "width": "5%","data": "Id_Solicitud", "visible": false},
			{ "width": "9%","data": function (obj) {
					var seguimiento = '';
					seguimiento += '<a href="#" data-toggle="modal" data-target="#seguimientoTickets" onclick="pasarvalores('+obj.Id_Solicitud+', 1,0,0),cargachat()"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>';
					if($("#hddTipo_Gestor").val()=="1"){
						//Cancelar Cita
						seguimiento += '<a href="#"  data-toggle="modal" data-target="#Modal_Cancelacion" onclick="Pasar_val_cancelacion('+obj.Id_Solicitud+','+obj.Id_Actividad+')"><span><i class="fa fa-ban" style="font-size:11px;color:red" aria-hidden="true"></i></span></a>';
					}
					return seguimiento;
				}
			},
			{ "width": "5%","data": function (obj) {
					var clip = '';
					clip += '<i class="fa fa-paperclip" aria-hidden="true"></i>';
					return clip;
				},"visible": false
			},
			{"width": "4%","data": "Id_Solicitud"},
			{"width": "5%","data": "Fecha"},
			{"width": "6%","data": function (obj) {
					
					var Estatus = '';
					if(obj.Id_Estatus_Proceso=="1"){
						Estatus += 'Nuevo '+obj.Not_SLA_Enviadas;
					}else{
						Estatus += obj.Estatus_Proceso
					}
					
					if(obj.Asist_Especial=="1"){
						Estatus += '('+obj.A_Especial+')';
						Estatus="<font color='green' >"+Estatus+"</span>"; 
					}
					
					if(obj.Id_Gestor_Reasignado!=null){
						Estatus += '(Reasignado)';
						Estatus="<font color='green' >"+Estatus+"</span>"; 
					}
					return Estatus;
				}
			},
			{"width": "8%","data": function (obj) {
					var Nombre_Usuario = obj.Nombre_Usuario;
					
					if(obj.Nombre_Ejecutante!=""){
						if(obj.Nombre_Ejecutante!=null){
							Nombre_Usuario += '<br>';
							Nombre_Usuario +="<font color='green' >EJECUTANTE: "+obj.Nombre_Ejecutante+"</span>"; 
						}
					}
					return Nombre_Usuario;
				}
			},
			{ "width": "5%","data": "Desc_Prioridad"},
		
			{ "width": "5%","data": "Nombre_Seccion"},
			{ "width": "10%","data": "Desc_Categoria"},
			{ "width": "10%","data": "Desc_Subcategoria"},
			{ "width": "15%","data": function (obj) {
					var Desc = '';
					
					Desc=obj.Titulo;
					
					return Desc;
				}
			},
			{ "width": "15%",
				"data": function (obj) {
					var Desc = '';
					
					//if(obj.Id_Activo!=null){
						//Desc=obj.Activo;
					//}else{
					
						if(obj.Id_Actividad!=""){
							Desc='<a href="#noir" id="Ver_Act'+obj.Id_Solicitud+'" onclick="ver_actividades('+obj.Id_Solicitud+')">Actividades </a>';//Desc+='<a href="#noir" id="Ocult_Act'+obj.Id_Solicitud+'" onclick="ocult_actividades('+obj.Id_Solicitud+')" style="display:none">Ocultar Actividades</a>';
							Desc+='<div id="Desc_Motiv_Repor'+obj.Id_Solicitud+'" style="display:none">'+obj.Desc_Motivo_Reporte+"</div>";
						}else{
							Desc=obj.Desc_Motivo_Reporte;
						}
					
					//}
					
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
			{ "width": "20%",
				"data": function (obj) {
					var Desc = '';
					
					if(obj.Datos_Activo!=""){
						Desc='<a href="#noir" id="Ver_Info_Activos'+obj.Id_Solicitud+'" onclick="Ver_info_Activos('+obj.Id_Solicitud+')" style="display:none">Activos </a>';//Desc+='<a href="#noir" id="Ocult_Activos'+obj.Id_Solicitud+'" onclick="Ocultar_info_Activos('+obj.Id_Solicitud+')" style="display:none">Ocultar Info Activos</a>';
						Desc+='<div id="Div_Info_Activos'+obj.Id_Solicitud+'" style="display:inline">'+obj.Datos_Activo+"</div>";
					}
					return Desc;
				}
			
			}
			//{ "width": "4%","data": "Nom_Area"}
			
			
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

	$('#tablaSeguimiento').DataTable({

		"order": [[ 3, "desc" ]],
		//"lengthMenu": [ [10, 25, 50, 100, 100000], [10, 25, 50,100,"Todos"] ] ,
		"dom": 'Bfrtip',
        "lengthMenu": [
            [ 10, 25, 50, 100000 ],
            [ '10 Filas', '25 Filas', '50 Filas', 'Todos' ]
        ],
		"buttons": [
			
            'copy',  'excel', 'pageLength'
        ],
	    "scrollY": 500,
        "scrollX": true,
        "processing": true,
        "serverSide": true,
		"ajax": {
			"url": "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
			"type": "POST",
			"dataSrc": function ( json ) {
				//if(json.recordsTotal>0){
				//	$("#notificacion_seguimiento_t").show();
				//	$("#notificacion_seguimiento_t").html(json.recordsTotal);
				//}else{
				//	$("#notificacion_seguimiento_t").hide();
				//}
				return json.data;
			},
			"data": {orden:'AF_BC',
				//Id_Gestor:$("#usuariosesion").val(),
				Id_Area:$("#idareasesion").val(),
				Id_Seccion:$("#hddId_Seccion").val(),
				Estatus_Proceso:'2'
			}
		},
		columnDefs: [
			{ orderable: true, className: 'reorder', targets: 3 },
			{ orderable: true, className: 'reorder', targets: 7 },
			{ orderable: true, className: 'reorder', targets: 8 },
			{ orderable: false, targets: '_all' }
		],
		"columns": [
		    { "width": "5%","data": "Id_Solicitud", "visible": false},
			{ "width": "12%","data": function (obj) {
					var seguimiento = '';
					
					/*Esta Validacion se comento porque todos los gestores pueden ver todos los tickets y darle el seguimiento
					//Si el gestor es senior puede visualizar los seguimientos
					if($("#hddTipo_Gestor").val()=="1"){
						if(obj.Id_Gestor==$("#usuariosesion").val()){
							if(obj.Id_Estatus_Proceso==2){
								seguimiento += '<a href="#" data-toggle="modal" data-target="#seguimientoTickets" onclick="pasarvalores('+obj.Id_Solicitud+', 2,0,0),cargachat()"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>';
							}
							
							
						}else{
							//En la funcion de pasar valores se envia el estatus para solo visualizar los tickets de otros gestores y no poder guardarlos (Se deshabilitaran los botones del chat, actividades y cierre)
							if(obj.Id_Estatus_Proceso==2){
								seguimiento += '<a href="#" data-toggle="modal" data-target="#seguimientoTickets" onclick="pasarvalores('+obj.Id_Solicitud+', 2, 1,0),cargachat()"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>';
							}
							
						}
						
					}else //Si el gestor es junior solo puede visualizar sus tickets y no dar seguimiento al de los demas
					{
						if(obj.Id_Gestor==$("#usuariosesion").val()){
							if(obj.Id_Estatus_Proceso==2){
								seguimiento += '<a href="#" data-toggle="modal" data-target="#seguimientoTickets" onclick="pasarvalores('+obj.Id_Solicitud+', 2,0,0),cargachat()"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>';
							}
							
						}
					}
					*/
					
					if(obj.Id_Estatus_Proceso==2){
						seguimiento += '<a href="#" data-toggle="modal" data-target="#seguimientoTickets" onclick="pasarvalores('+obj.Id_Solicitud+', 2,0,0),cargachat()"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>';
						
						if($("#hddTipo_Gestor").val()=="1"){
							//Cancelar Cita
							seguimiento += '<a href="#"  data-toggle="modal" data-target="#Modal_Cancelacion" onclick="Pasar_val_cancelacion('+obj.Id_Solicitud+','+obj.Id_Actividad+')"><span><i class="fa fa-ban" style="font-size:11px;color:red" aria-hidden="true"></i></span></a>';
						}
					}
					
					return seguimiento;
				}
			},
			{ "width": "5%","data": function (obj) {
					var clip = '';
					clip += '<i class="fa fa-paperclip" aria-hidden="true"></i>';
					return clip;
				},"visible": false
			},
			{ "width": "4%","data": "Id_Solicitud"},
			{"width": "5%","data": "Fecha"},
			{ "width": "5%","data": "Fecha_Seguimiento"},
			{ "width": "6%","data": function (obj) {
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
			{ "width": "8%","data": "Nombre_Usuario"},
			{"width": "8%","data": function (obj) {
					var Gestor = obj.Gestor;
					
					if(obj.Nombre_Ejecutante!=""){
						if(obj.Nombre_Ejecutante!=null){
							Gestor += '<br>';
							Gestor +="<font color='green' >EJECUTANTE: "+obj.Nombre_Ejecutante+"</span>"; 
						}
					}
					return Gestor;
				}
			},
			{ "width": "5%","data": "Desc_Prioridad"},
			{ "width": "5%","data": "Nombre_Seccion"},
			{ "width": "10%","data": "Desc_Categoria"},
			{ "width": "10%","data": "Desc_Subcategoria"},
			{ "width": "15%","data": function (obj) {
					var Desc = '';
					Desc=obj.Titulo;
					
					return Desc;
				}
			},
			{ "width": "15%","data": function (obj) {
					var Desc = '';
					
					if(obj.Id_Actividad!=""){
						Desc='<a href="#noir" id="Ver_Act'+obj.Id_Solicitud+'" onclick="ver_actividades('+obj.Id_Solicitud+')">Actividades </a>';//Desc+='<a href="#noir" id="Ocult_Act'+obj.Id_Solicitud+'" onclick="ocult_actividades('+obj.Id_Solicitud+')" style="display:none">Ocultar Actividades</a>';
						Desc+='<div id="Desc_Motiv_Repor'+obj.Id_Solicitud+'" style="display:none">'+obj.Desc_Motivo_Reporte+"</div>";
					}else{
						Desc=obj.Desc_Motivo_Reporte;
					}
					
					return Desc;
				}
			
			},
			{ "width": "20%",
				"data": function (obj) {
					var Desc = '';
					
					if(obj.Datos_Activo!=""){
						Desc='<a href="#noir" id="Ver_Info_Activos'+obj.Id_Solicitud+'" onclick="Ver_info_Activos('+obj.Id_Solicitud+')" style="display:none">Activos </a>';//Desc+='<a href="#noir" id="Ocult_Activos'+obj.Id_Solicitud+'" onclick="Ocultar_info_Activos('+obj.Id_Solicitud+')" style="display:none">Ocultar Info Activos</a>';
						Desc+='<div id="Div_Info_Activos'+obj.Id_Solicitud+'" style="display:inline">'+obj.Datos_Activo+"</div>";
					}
					return Desc;
				}
			
			}
			//{ "width": "4%","data": "Nom_Area"}
			
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
		
	$('#tablaPorCerrar').DataTable({
		"order": [[ 3, "desc" ]],
		//"lengthMenu": [ [10, 25, 50, 100, 100000], [10, 25, 50,100,"Todos"] ] ,
		"dom": 'Bfrtip',
        "lengthMenu": [
            [ 10, 25, 50, 100000 ],
            [ '10 Filas', '25 Filas', '50 Filas', 'Todos' ]
        ],
		"buttons": [
			
            'copy',  'excel', 'pageLength'
        ],
	    "scrollY": 500,
        "scrollX": true,
        "processing": true,
        "serverSide": true,
		"ajax": {
			"url": "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
			"type": "POST",
			"data": {orden:'AF_BC',
				//Id_Gestor:$("#usuariosesion").val(),
				Id_Area:$("#idareasesion").val(),
				Id_Seccion:$("#hddId_Seccion").val(),
				Estatus_Proceso:'3'
			}
		},
		columnDefs: [
			{ orderable: true, className: 'reorder', targets: 3 },
			{ orderable: true, className: 'reorder', targets: 8 },
			{ orderable: true, className: 'reorder', targets: 9 },
			{ orderable: false, targets: '_all' }
		],
		"columns": [
		    { "width": "5%","data": "Id_Solicitud", "visible": false},
			{ "width": "5%","data": function (obj) {
					var seguimiento = '';
					//Si el gestor es senior puede visualizar los seguimientos
					if($("#idareasesion").val() == 1){
						seguimiento += '<a href="#" data-toggle="modal" title="Cerrar Ticket" onclick="sigaCerrarTicketApp('+obj.Id_Solicitud+')"><span><i class="fa fa-thumbs-o-up" aria-hidden="true" style="color:black" fa-lg></i></span></a>';
					}					

					if($("#hddTipo_Gestor").val()=="1"){
						if(obj.Id_Gestor==$("#usuariosesion").val()){
							
							if(obj.Id_Estatus_Proceso==3){
								seguimiento += '<a href="#" data-toggle="modal" data-target="#seguimientoTickets" onclick="pasarvalores('+obj.Id_Solicitud+', 3,0,0),cargachat()"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>';
								seguimiento += '<a href="#" data-toggle="modal" title="Cambio Estatus" onclick="updateStatus('+obj.Id_Solicitud+')"><span><i class="fa fa-reply" aria-hidden="true"></i></span></a>';
									
								
								if($("#hddTipo_Gestor").val()=="1"){
									//Cancelar Cita
									seguimiento += '<a href="#"  data-toggle="modal" data-target="#Modal_Cancelacion" onclick="Pasar_val_cancelacion('+obj.Id_Solicitud+','+obj.Id_Actividad+')"><span><i class="fa fa-ban" style="font-size:11px;color:red" aria-hidden="true"></i></span></a>';
								}
							}
						}else{
							//En la funcion de pasar valores se envia el estatus para solo visualizar los tickets de otros gestores y no poder guardarlos (Se deshabilitaran los botones del chat, actividades y cierre)
							if(obj.Id_Estatus_Proceso==3){
								seguimiento += '<a href="#" data-toggle="modal" title="Editar" data-target="#seguimientoTickets" onclick="pasarvalores('+obj.Id_Solicitud+', 3, 1,0),cargachat()"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>';
								
								seguimiento += '<a href="#" data-toggle="modal" title="Cambio Estatus" onclick="updateStatus('+obj.Id_Solicitud+')"><span><i class="fa fa-reply" aria-hidden="true"></i></span></a>';
								//seguimiento += '<a href="#" data-toggle="modal" title="Cerrar Ticket" onclick="sigaCerrarTicketApp('+obj.Id_Solicitud+')"><span><i class="fa fa-thumbs-o-up" aria-hidden="true" style="color:black" fa-lg></i></span></a>';
							}
							
							if($("#hddTipo_Gestor").val()=="1"){
								//Cancelar Cita
								seguimiento += '<a href="#"  data-toggle="modal" data-target="#Modal_Cancelacion" onclick="Pasar_val_cancelacion('+obj.Id_Solicitud+','+obj.Id_Actividad+')"><span><i class="fa fa-ban" style="font-size:11px;color:red" aria-hidden="true"></i></span></a>';
								
							}
						}
						
					}else
					{
						if(obj.Id_Gestor==$("#usuariosesion").val()){
							
							if(obj.Id_Estatus_Proceso==3){
								seguimiento += '<a href="#" data-toggle="modal" data-target="#seguimientoTickets" onclick="pasarvalores('+obj.Id_Solicitud+', 3,0,0),cargachat()"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>';								
							}
						}
					}	
					return seguimiento;
				}
			},
			{ "width": "5%","data": function (obj) {
					var clip = '';
					clip += '<i class="fa fa-paperclip" aria-hidden="true"></i>';
					return clip;
				},"visible": false
			},
			{ "width": "4%","data": "Id_Solicitud"},
			{"width": "5%","data": "Fecha"},
			{ "width": "5%","data": "Fecha_Seguimiento"},
			{ "width": "5%","data": "Fecha_Esp_Cierre"},
			{ "width": "6%","data": function (obj) {
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
			{ "width": "8%","data": "Nombre_Usuario"},
			{ "width": "8%","data": "Gestor"},
			{ "width": "5%","data": "Desc_Prioridad"},
			{ "width": "5%","data": "Nombre_Seccion"},
			{ "width": "10%","data": "Desc_Categoria"},
			{ "width": "10%","data": "Desc_Subcategoria"},
			{ "width": "15%","data": function (obj) {
					var Desc = '';
					Desc=obj.Titulo;
					
					return Desc;
				}
			},
			{ "width": "15%","data": function (obj) {
					var Desc = '';
					if(obj.Id_Actividad!=""){
						Desc='<a href="#noir" id="Ver_Act'+obj.Id_Solicitud+'" onclick="ver_actividades('+obj.Id_Solicitud+')">Actividades </a>';//Desc+='<a href="#noir" id="Ocult_Act'+obj.Id_Solicitud+'" onclick="ocult_actividades('+obj.Id_Solicitud+')" style="display:none">Ocultar Actividades</a>';
						Desc+='<div id="Desc_Motiv_Repor'+obj.Id_Solicitud+'" style="display:none">'+obj.Desc_Motivo_Reporte+"</div>";
					}else{
						Desc=obj.Desc_Motivo_Reporte;
					}
					return Desc;
				}
			
			},
			{ "width": "20%",
				"data": function (obj) {
					var Desc = '';
					
					if(obj.Datos_Activo!=""){
						Desc='<a href="#noir" id="Ver_Info_Activos'+obj.Id_Solicitud+'" onclick="Ver_info_Activos('+obj.Id_Solicitud+')" style="display:none">Activos </a>';//Desc+='<a href="#noir" id="Ocult_Activos'+obj.Id_Solicitud+'" onclick="Ocultar_info_Activos('+obj.Id_Solicitud+')" style="display:none">Ocultar Info Activos</a>';
						Desc+='<div id="Div_Info_Activos'+obj.Id_Solicitud+'" style="display:inline">'+obj.Datos_Activo+"</div>";
					}
					return Desc;
				}
			
			}
			//{ "width": "4%","data": "Nom_Area"}
			
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
	
	$('#tablaCierre').DataTable({
		"order": [[ 3, "desc" ]],
		//"lengthMenu": [ [10, 25, 50, 100, 100000], [10, 25, 50,100,"Todos"] ] ,
		"dom": 'Bfrtip',
        "lengthMenu": [
            [ 10, 25, 50, 100000 ],
            [ '10 Filas', '25 Filas', '50 Filas', 'Todos' ]
        ],
		"buttons": [
			
            'copy',  'excel', 'pageLength'
        ],
	    "scrollY": 500,
        "scrollX": true,
        "processing": true,
        "serverSide": true,
		"ajax": {
			"url": "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
			"type": "POST",
			"data": {orden:'AF_BC',
				//Id_Gestor:$("#usuariosesion").val(),
				Id_Area:$("#idareasesion").val(),
				Id_Seccion:$("#hddId_Seccion").val(),
				Estatus_Proceso:'4'
			}
		},
		columnDefs: [
			{ orderable: true, className: 'reorder', targets: 3 },
			{ orderable: true, className: 'reorder', targets: 9 },
			{ orderable: true, className: 'reorder', targets: 10 },
			{ orderable: false, targets: '_all' }
		],
		"columns": [
		    { "width": "5%", "data": "Id_Solicitud", "visible": false},
			{ "width": "5%", "data": function (obj) {
					var clip = '';
					
					if($("#hddTipo_Gestor").val()=="1"){
						clip += '<a href="#" data-toggle="modal" data-target="#seguimientoTickets" onclick="pasarvalores('+obj.Id_Solicitud+', 4,0,0),cargachat()"><i class="fa fa-paperclip" aria-hidden="true" style="font-size:17px; color:#333;"></i></a>';
					}else{
						if(obj.Id_Gestor==$("#usuariosesion").val()){
							clip += '<a href="#" data-toggle="modal" data-target="#seguimientoTickets" onclick="pasarvalores('+obj.Id_Solicitud+', 4,0,0),cargachat()"><i class="fa fa-paperclip" aria-hidden="true" style="font-size:17px; color:#333;"></i></a>';
						}
					}
					
					return clip;
				}
			},
			{ "width": "5%", "data": function (obj) {
					var clip = '';
					clip += '<a target="_blank"  href="../controladores/activos/siga_solicitud_tickets/Reporte-Ticket.php?Id_Solicitud='+obj.Id_Solicitud+'" class="fa fa-file-pdf-o" style="font-size:17px; color:#333;" aria-hidden="true"></a>';
					return clip;
				}
			},
			{ "width": "4%", "data": "Id_Solicitud"},
			{"width": "5%","data": "Fecha"},
			{ "width": "5%","data": "Fecha_Seguimiento"},
			{ "width": "5%","data": "Fecha_Esp_Cierre"},
			{ "width": "5%", "data": "Fecha_Cierre"},
			{ "width": "6%", "data": function (obj) {
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
			{ "width": "8%", "data": "Nombre_Usuario"},
			{ "width": "8%", "data": "Gestor"},
			{ "width": "5%","data": "Desc_Prioridad"},
			{ "width": "5%","data": "Nombre_Seccion"},
			{ "width": "10%","data": "Desc_Categoria"},
			{ "width": "10%","data": "Desc_Subcategoria"},
			{ "width": "15%","data": function (obj) {
					var Desc = '';
					Desc=obj.Titulo;
					
					return Desc;
				}
			},
			{ "width": "15%",
				"data": function (obj) {
					var Desc = '';
					if(obj.Id_Actividad!=""){
						Desc='<a href="#noir" id="Ver_Act'+obj.Id_Solicitud+'" onclick="ver_actividades('+obj.Id_Solicitud+')">Actividades </a>';//Desc+='<a href="#noir" id="Ocult_Act'+obj.Id_Solicitud+'" onclick="ocult_actividades('+obj.Id_Solicitud+')" style="display:none">Ocultar Actividades</a>';
						Desc+='<div id="Desc_Motiv_Repor'+obj.Id_Solicitud+'" style="display:none">'+obj.Desc_Motivo_Reporte+"</div>";
					}else{
						Desc=obj.Desc_Motivo_Reporte;
					}
					return Desc;
				}
			
			},
			{ "width": "8%","data": "ComentarioCierre"},
			{ "width": "8%","data": "ComentarioCierreGestor", "visible": false},
			{ "width": "12%",
				"data": function (obj) {
					var Desc = '';
					
					if(obj.Datos_Activo!=""){
						Desc='<a href="#noir" id="Ver_Info_Activos'+obj.Id_Solicitud+'" onclick="Ver_info_Activos('+obj.Id_Solicitud+')" style="display:none">Activos </a>';//Desc+='<a href="#noir" id="Ocult_Activos'+obj.Id_Solicitud+'" onclick="Ocultar_info_Activos('+obj.Id_Solicitud+')" style="display:none">Ocultar Info Activos</a>';
						Desc+='<div id="Div_Info_Activos'+obj.Id_Solicitud+'" style="display:inline">'+obj.Datos_Activo+"</div>";
					}
					return Desc;
				}
			
			},
			{ "width": "4%","data": "Desc_Est_Equipo"}
			
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
	
	Pasar_val_cancelacion=function(Id_Solicitud, Id_Actividad){
		$("#hdd_Id_Solicitud").val(Id_Solicitud);
		$("#hdd_Id_Actividad").val(Id_Actividad);
		$("#cancelacion_folio").html(Id_Solicitud);
	}
	
	limpiar_cerrar_cancelacion=function(){
		$("#hdd_Id_Solicitud").val("");
		$("#hdd_Id_Actividad").val("");
		$("#cancelacion_folio").html("");
		$("#Motivo_Cancelacion").val("");
	}
	
	Cancelar_Solicitud=function(){
	
		var encontrado=0;
		
		if($("#Motivo_Cancelacion").val()!=""){
			//Se Cancela cuando solo es una solicitud
			if($("#hdd_Id_Solicitud").val()!="" && $("#hdd_Id_Actividad").val()==""){
				$.confirm({
					title: 'Confirm!',
					content: 'Esta Seguro de Cancelar esta Solicitud!',
					buttons: {
						confirm: function () {
							$.ajax({
								type: "POST",
								url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",     
								async: false,
								data: {
									Id_Solicitud: $("#hdd_Id_Solicitud").val(),
									Id_Actividad: $("#hdd_Id_Actividad").val(),
									Motivo_Cancelacion: $("#Motivo_Cancelacion").val(),
									Usr_Inser:$("#usuariosesion").val(),
									Id_Cirugia:$("#Id_Cirugia").val(),
									accion: "Cancelar_Solicitud"
								},
								dataType: "html",
								beforeSend: function (xhr) {
							
								},
								success: function (data) {
									data = eval("(" + data + ")");
									
									if (data.totalCount > 0) {
										limpiar_cerrar_cancelacion();
										$("#btn_cerrar_cancelacion").click();
										$('#tablaNuevos').DataTable().ajax.reload();
										$('#tablaSeguimiento').DataTable().ajax.reload();
										
										mensajesalerta("&Eacute;xito", "Cancelado Correctamente.", "success", "dark");
									}else{
										mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
									}
								},
								error: function () {
									mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
								}
							});
						},
						cancel: function () {
						}
					}
				});
			}
			
			//Se cancela cuando es una solicitud y trae con sigo una actividad
			if($("#hdd_Id_Solicitud").val()!="" && $("#hdd_Id_Actividad").val()!=""){
				$.confirm({
					title: 'Confirm!',
					content: 'Esta Seguro de Cancelar esta Solicitud (Nota: Esta solicitud viene de una actividad, por lo tanto al cancelarla tambien se cancelara la actividad.)',
					buttons: {
						confirm: function () {
							$.ajax({
								type: "POST",
								url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",     
								async: false,
								data: {
									Id_Solicitud: $("#hdd_Id_Solicitud").val(),
									Id_Actividad: $("#hdd_Id_Actividad").val(),
									Motivo_Cancelacion: $("#Motivo_Cancelacion").val(),
									Usr_Inser:$("#usuariosesion").val(),
									accion: "Cancelar_Solicitud"
								},
								dataType: "html",
								beforeSend: function (xhr) {
							
								},
								success: function (data) {
									data = eval("(" + data + ")");
									
									if (data.totalCount > 0) {
										limpiar_cerrar_cancelacion();
										$("#btn_cerrar_cancelacion").click();
										$('#tablaNuevos').DataTable().ajax.reload();
										$('#tablaSeguimiento').DataTable().ajax.reload();
										
										mensajesalerta("&Eacute;xito", "Cancelado Correctamente.", "success", "dark");
									}else{
										mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
									}
								},
								error: function () {
									mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
								}
							});
						},
						cancel: function () {
						}
					}
				});
			}
			
		}else{
			mensajesalerta("Informaci&oacute;n", "-Falta agregar el motivo de la cancelación", "", "dark");
		}
			
		
		
	}
	
	ver_actividades=function(Id_Solicitud){
		$("#Desc_Motiv_Repor"+Id_Solicitud).show();
		$("#Ver_Act"+Id_Solicitud).hide();
		//$("#Ocult_Act"+Id_Solicitud).show();
		$("#Ocult_Act"+Id_Solicitud).html("");
	}
	
	ocult_actividades=function(Id_Solicitud){
		$("#Desc_Motiv_Repor"+Id_Solicitud).hide();
		$("#Ver_Act"+Id_Solicitud).show();
		$("#Ocult_Act"+Id_Solicitud).hide();
	}
	
	Ver_info_Activos=function(Id_Solicitud){
		$("#Div_Info_Activos"+Id_Solicitud).show();
		$("#Ver_Info_Activos"+Id_Solicitud).hide();
		//$("#Ocult_Activos"+Id_Solicitud).show();
		$("#Ocult_Activos"+Id_Solicitud).html("");
	}
	
	Ocultar_info_Activos=function(Id_Solicitud){
		$("#Div_Info_Activos"+Id_Solicitud).hide();
		$("#Ver_Info_Activos"+Id_Solicitud).show();
		$("#Ocult_Activos"+Id_Solicitud).hide();
	}
	
	
		
		
		
	//Asistencia Especial	
	cargacategoria_Asis_Esp=function(Id_Seccion) {
		var resultado=new Array();
		data={orden:'Desc_Categoria',accion: "consultar",Id_Seccion:Id_Seccion};
		resultado=cargo_cmb("../fachadas/activos/Siga_cat_ticket_categoria/Siga_cat_ticket_categoriaFacade.Class.php",false, data);
        $('#cmbcategoria_Asis_Esp').empty();
		if(resultado.totalCount>0){
			$('#cmbcategoria_Asis_Esp').append($('<option selected value="-1">', { value: "-1" }).text("--Categoría--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{
				if (resultado.data[i].Id_Categoria != '') 			
				$('#cmbcategoria_Asis_Esp').append($('<option>', { value: resultado.data[i].Id_Categoria }).text(resultado.data[i].Desc_Categoria));
			}
		}else{
			$('#cmbcategoria_Asis_Esp').append($('<option selected value="-1">', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$("#cmbcategoria_Asis_Esp").change(function (event){
		if ($("#cmbcategoria_Asis_Esp").val() != -1)
			cargasubcategoria_asis_esp($("#cmbcategoria_Asis_Esp").val());
	    else
		{
			$("#cmbsubcategoria_Asis_Esp").empty();
			$('#cmbsubcategoria_Asis_Esp').append($('<option>', { value: "-1" }).text("--Subcategoría--"));
		}
	});
	
	function cargasubcategoria_asis_esp(idcategoria){
		var resultado=new Array();
		data={orden:'Desc_Subcategoria',accion: "consultar",Id_Categoria:idcategoria};
		resultado=cargo_cmb("../fachadas/activos/Siga_cat_ticket_subcategoria/Siga_cat_ticket_subcategoriaFacade.Class.php",false, data);
        $('#cmbsubcategoria_Asis_Esp').empty();
		if(resultado.totalCount>0){
			$('#cmbsubcategoria_Asis_Esp').append($('<option>', { value: "-1" }).text("--Subcategoría--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{
				if(resultado.data[i].Id_Subcategoria!="1338"&&resultado.data[i].Id_Subcategoria!="1339"&&resultado.data[i].Id_Subcategoria!="1340"&&resultado.data[i].Id_Subcategoria!="1341"&&resultado.data[i].Id_Subcategoria!="1342"){
					if (resultado.data[i].Id_Subcategoria != '') 			
					$('#cmbsubcategoria_Asis_Esp').append($('<option>', { value: resultado.data[i].Id_Subcategoria }).text(resultado.data[i].Desc_Subcategoria));
				}
			}
		}else{
			$('#cmbsubcategoria_Asis_Esp').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	limpiarcamposasistenciaesp=function(){
		
		$("#Seleccionar_Activos").hide();
		
		$("#div_tablaactivos").html("");
		var Empleado_Especial=$.trim($("#numempleadoresguardo1").val());
		if(Empleado_Especial!=""){			
			if(Empleado_Especial.length > 0){
				var $select3 = $('#numempleadoresguardo1').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
				control3.enable();
			}
		}
		
		$("#divGestores_Asis_Esp").hide();
		var Usuarios_Especial=$.trim($("#Id_Usuario_Gestor").val());
		if(Usuarios_Especial!=""){
			if(Usuarios_Especial.length > 0){
				var $selectusuarios= $('#Id_Usuario_Gestor').selectize({});	
				var controlcleanusr = $selectusuarios[0].selectize;
				controlcleanusr.clear();
				controlcleanusr.enable();
			}
		}
		
		
		
		$("#hidden_seleccion_activo").val("");
		
		$("#Realiza_Interno_AE").prop( "checked", true );
		
		$("#hdd_Medio_Asis_Esp").val("");
		
		$("#hdd_Seccion_Asis_Esp").val("");
		$(".fakeRadio").prop( "checked", false );
		
		$('#cmbcategoria_Asis_Esp').children('option').remove();
	    $('#cmbcategoria_Asis_Esp').append($('<option>', { value: "-1" }).text("--Categoría--"));
	   
	    $('#cmbsubcategoria_Asis_Esp').children('option').remove();
	    $('#cmbsubcategoria_Asis_Esp').append($('<option>', { value: "-1" }).text("--Subcategoría--"));
		
		$("#Descripcion_Asis_Esp").val("");
		
		$("#Descripcion_Det_Asis_Esp").val("");
		
		$(".fakeRadio_prioridad").prop( "checked", false );
		
		$(".fakeMedio_prioridad").prop( "checked", false );
		
		$("#Check_Mis_Activos").prop( "checked", true );
		
		carga_control_adjuntos();
		$("#Url_Foto_Activo").val("");
	}
	 
	carga_secciones_aten_esp();
	function carga_secciones_aten_esp() 
	{
		var resultado=new Array();
		data={accion: "consultar",Id_Area:$("#idareasesion").val()};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ticket_seccion/Siga_cat_ticket_seccionFacade.Class.php",false, data);

		var htmlDiv = '<li><strong>Sección</strong></li>';
					
		for(var i = 0; i < resultado.totalCount; i++)
		{
		var checked = "";
          checked = "checked";							
          htmlDiv +=
'          <li>'+
'            <div class="form-group">'+
'              <div class="checkbox icheck">'+
'                <label>'+
'                  <input type="radio" class="fakeRadio" value="'+resultado.data[i].Id_Seccion+'" onChange="javascript:cambiaSeccion_asis_esp('+resultado.data[i].Id_Seccion+')" name="chkSoporte_asist_esp">'+resultado.data[i].Desc_Seccion+
'                </label>'+
'              </div>'+
'            </div>'+
'          </li>';                     
		}
          
		htmlDiv +='<li></li>';
		
        htmlDiv +='</ul>';
		
		$("#divSeccion_Asis_Esp").html(htmlDiv);
	}
	
	carga_medios_aten_esp();
	function carga_medios_aten_esp() 
	{
		var resultado=new Array();
		data={accion: "consultar",Estatus_Reg:"1"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_medios/Siga_cat_mediosFacade.Class.php",false, data);

		var htmlDiv = '<li><strong>Medios</strong></li>';
					
		for(var i = 0; i < resultado.totalCount; i++)
		{
		var checked = "";
          checked = "checked";							
          htmlDiv +=
'          <li>'+
'            <div class="form-group">'+
'              <div class="checkbox icheck">'+
'                <label>'+
'                  <input type="radio" class="fakeRadio" value="'+resultado.data[i].Id_Medio+'" onChange="javascript:cambiaMedio_asis_esp('+resultado.data[i].Id_Medio+')" name="chkMedios_asist_esp">'+resultado.data[i].Desc_Medio+
'                </label>'+
'              </div>'+
'            </div>'+
'          </li>';                     
		}
          
		htmlDiv +='<li></li>';
		
        htmlDiv +='</ul>';
		
		$("#divMedios_Asis_Esp").html(htmlDiv);
	}
	
	
	
	
	carga_activos_vip=function(activos){
		$("#hidden_seleccion_activo").val("");
		var num_empleado="";
		
		if(activos=="mis_activos"){
			var valoption=$("#numempleadoresguardo1 option:selected" ).text();
			
			if(valoption!=""){
				valoption=valoption.split("-");
				if(valoption[0]!=""){
					num_empleado=valoption[0];
				}
				
			}
		}
		
		
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",     
			async: false,
			data: {
				Num_Empleado: num_empleado,
				Estatus_Reg:"1",
				Id_Area:$("#idareasesion").val(),
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
					//tabla+='		<th>Foto</th>';
					tabla+='		<th>Nombre Activo</th>';
					tabla+='		<th>Cantidad</th>';
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
						//tabla+=' <td class=" ">';
						//if ($.trim(data.data[i].Foto) != ''){
						//	tabla+='<img width="5px" height="15px" src="../Archivos/Archivos-Activos/' + data.data[i].Foto + '">';
						//}
						//tabla+='</td>';
						tabla+=' <td class=" ">'+data.data[i].Nombre_Activo+'</td>';
						tabla+=' <td class=" ">'+data.data[i].Marca+'</td>';
						tabla+=' <td class=" ">'+data.data[i].Marca+'</td>';
						tabla+=' <td class=" ">'+data.data[i].Modelo+'</td>';
						tabla+=' <td class=" ">'+data.data[i].NumSerie+'</td>';
						
						tabla+=' <td class=" ">'+data.data[i].Desc_Ubic_Prim+'</td>';
						tabla+=' <td class=" ">'+data.data[i].Desc_Ubic_Sec+'</td>';
						
						tabla+=' <td class=" "><div align="center"><input type="radio" name="radio_activos" onclick="selec_activo_radio_asis_esp(\'radio'+data.data[i].Id_Activo+'\',\''+data.data[i].Id_Activo+'\')" id="radio'+data.data[i].Id_Activo+'"></div></td>';
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
	}
	
	selec_activo_radio_asis_esp=function(nombre_radio, Id_Activo){
		$("#hidden_seleccion_activo").val(Id_Activo);
	}
	
	cambiaSeccion_asis_esp=function(idseccion){
		$("#divGestores_Asis_Esp").hide();
		$("#hdd_Seccion_Asis_Esp").val(idseccion);
		cargacategoria_Asis_Esp(idseccion);
		
		
		var Usuarios_Especial=$.trim($("#Id_Usuario_Gestor").val());
		if(Usuarios_Especial!=""){			
			if(Usuarios_Especial.length > 0){
				var $selectusuarios= $('#Id_Usuario_Gestor').selectize({});	
				var controlcleanusr = $selectusuarios[0].selectize;
				controlcleanusr.clear();
				controlcleanusr.enable();
			}
		}
		var hddId_Seccion=$("#hddId_Seccion").val();
		if(hddId_Seccion==idseccion){
			$("#divGestores_Asis_Esp").show();
		}else{
			$("#divGestores_Asis_Esp").hide();
		}
	}
	
	cambiaMedio_asis_esp=function(Id_Medio){
		$("#hdd_Medio_Asis_Esp").val(Id_Medio);
	}
	//Fin

	cargacategoria=function(Id_Seccion) {
		var resultado=new Array();
		data={orden:'Desc_Categoria',accion: "consultar",Id_Seccion:Id_Seccion};
		resultado=cargo_cmb("../fachadas/activos/Siga_cat_ticket_categoria/Siga_cat_ticket_categoriaFacade.Class.php",false, data);
        //$('#cmbcategoria').empty();
		if(resultado.totalCount>0){
			var $selectcategoria= $('#cmbcategoria').selectize({});	
			var controlcategorias = $selectcategoria[0].selectize;
			controlcategorias.clearOptions(); 
			
			//$('#cmbcategoria').append($('<option selected value="-1">', { value: "-1" }).text("--Categoría--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{
				if (resultado.data[i].Id_Categoria != '') 			
					controlcategorias.addOption({value: resultado.data[i].Id_Categoria, text: resultado.data[i].Desc_Categoria.trim()});
				//$('#cmbcategoria').append($('<option>', { value: resultado.data[i].Id_Categoria }).text(resultado.data[i].Desc_Categoria));
			}
		}else{
			//$('#cmbcategoria').append($('<option selected value="-1">', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	function cargasubcategoria(idcategoria){
		var resultado=new Array();
		data={orden:'Desc_Subcategoria',accion: "consultar",Id_Categoria:idcategoria};
		resultado=cargo_cmb("../fachadas/activos/Siga_cat_ticket_subcategoria/Siga_cat_ticket_subcategoriaFacade.Class.php",false, data);
        $('#cmbsubcategoria').empty();
		if(resultado.totalCount>0){
			var $selectsubcategoria= $('#cmbsubcategoria').selectize({});	
			var controlsubcategorias = $selectsubcategoria[0].selectize;
			controlsubcategorias.clearOptions(); 
			//$('#cmbsubcategoria').append($('<option>', { value: "-1" }).text("--Subcategoría--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{
				if(resultado.data[i].Id_Subcategoria!="1338"&&resultado.data[i].Id_Subcategoria!="1339"&&resultado.data[i].Id_Subcategoria!="1340"&&resultado.data[i].Id_Subcategoria!="1341"&&resultado.data[i].Id_Subcategoria!="1342"){
					if (resultado.data[i].Id_Subcategoria != '') 			
						controlsubcategorias.addOption({value: resultado.data[i].Id_Subcategoria, text: resultado.data[i].Desc_Subcategoria.trim()});
					//$('#cmbsubcategoria').append($('<option>', { value: resultado.data[i].Id_Subcategoria }).text(resultado.data[i].Desc_Subcategoria));
				}
			}
		}else{
			//$('#cmbsubcategoria').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	} 


	recepcion_equipo=function(){
		var num_empleado_recepcion=$("#usuariosesion").val();
		var id_ticket_recepcion=$("#spanNumsolicitud2").text();
		// window.open("http://siga.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key="+id_ticket_recepcion+"&gest="+num_empleado_recepcion+"&tipo=2");
		window.open("https://apps2.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key="+id_ticket_recepcion+"&gest="+num_empleado_recepcion+"&tipo=2");
	}

//Pasar Valores al Editar

pasarvalores=function(id, Estatus_Proceso, Estatus_Desh,tab) {

//----------------------------------------------------------------------------
// Alex Arias
// Ajax que busca si existe una foto registrada en el ticket. Sino existe se manda la alerta.
// La validación es jquery y está en la línea 7646 y se llama validar_url. Se le da valor a un input(L-1056) y se obtiene de ahí. Funcion línea 1647
// 22 junio, 2023
//----------------------------------------------------------------------------
validar_si_existe_imagen(id);
//----------------------------------------------------------------------------
// Alex Arias
// Ajax que carga los combos de categoria y subcategoria en base a número de ticket.
// 
// 26 junio, 2023
//----------------------------------------------------------------------------
validar_area(id);
//----------------------------------------------------------------------------

		//$("#Id_Solicitud_recepcion").val('');
			$.ajax({
			url: '../poo/mistickets-gestor/ajax_validar_pre_registro.php',
			type: 'POST',
			dataType: 'JSON',
			cache:false,
			data: {Id_ticket: id},
			success: function (data) {
				
				var preRegistro=data[0]['preRegistro'];
				var estatus=data[0]['estatus'];
				if(estatus==2 && preRegistro!==null){

				}
			},
		});	

		var Estatus_Deshabilita="";
		if(Estatus_Desh!=0){
			Estatus_Deshabilita=Estatus_Desh;
		}
		$("#div_usuarios_enf").hide();
		var $usr_enf = $('#cmb_usuarios_enf').selectize({});
		var control_usr_enf = $usr_enf[0].selectize;
		control_usr_enf.clear();
		
		$("#Titulo").prop("readonly",true);
		$("#Descripcion").prop("readonly",true);
		$("#Titulo").prop("disabled",true);
		$("#Descripcion").prop("disabled",true);
		//$("#li_enviar_preregistro").show();
		
		var $select_n = $('#numempleadoresguardo').selectize({});
		var control_n = $select_n[0].selectize;
		control_n.clear();
		
		var $select_n2 = $('#gestorejecutante').selectize({});
		var control_n2 = $select_n2[0].selectize;
		control_n2.clear();
		
		var $select_categoria= $('#cmbcategoria').selectize({});	
		var control_cate = $select_categoria[0].selectize;
		
		var $select_subcategoria= $('#cmbsubcategoria').selectize({});	
		var control_subcate = $select_subcategoria[0].selectize;

		$("#relacionar_activo").show();
		$("#Cambia_LoRealiza").hide();
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
		$("#hddEmpresa_Ext").val("");
		$("#hddNombre_Completo_Ext").val("");
		$("#hddTelefono_Ext").val("");
		$("#hddCorreo_Ext").val("");
		
		$("#Pre_Re_Nombre").val("");
		$("#Pre_Re_Marca").val("");
		$("#Pre_Re_Modelo").val("");
		$("#Pre_Re_No_Serie").val("");
		$("#Pre_Re_Cantidad_Equipos").val("");
		$("#Pre_Re_Empresa").val("");
		$("#Pre_Re_Nombre_Proveedor").val("");
		$("#Pre_Re_Telefono").val("");
		$("#Pre_Re_Correo").val("");
		$("#Pre_Re_Observaciones").val("");
		
		if(Estatus_Proceso=="1"){
			if($("#usuariosesion").val()!=""){
				var $select_gestores= $('#numempleadoresguardo').selectize({});	
				var controlgest = $select_gestores[0].selectize;
				controlgest.addItem($("#usuariosesion").val());
			}
		}
		
		if($("#idareasesion").val()=="3"){
			$("#divgestorejecutante").show();
		}else{
			$("#divgestorejecutante").hide();
		}
		
		$("#text_Numsolicitud").html("(4731)No. Solicitud de ayuda");
		//Controles Chat
		$("#botonEnviar").prop('disabled', false);
		$("#btnsubir_imagenes_chat").prop('disabled', false);
		$("#Mensaje").prop('disabled', false);
		$("#btnsubir_imagenes_chat").prop('disabled', false);
		//Controles Cierre
		$("#div_calificacion").hide();
		$("#botonCerrar").attr("disabled", false);
		limpiarcampos();
		
		var $select_motivoaparente = $('#cmb_motivo_aparente').selectize({});
		var motivoaparente = $select_motivoaparente[0].selectize;
		
		var $select_motivoreal = $('#cmb_motivo_real').selectize({});
		var motivoreal = $select_motivoreal[0].selectize;
	
		if(Estatus_Proceso=="1"){
			$("#tab_datos_generales").show();
			$("#tab_chat_seguimiento").hide();
			$("#tab_adjuntos").show();
			$("#tab_cerrar_ticket").hide();
			$("#ticket_reclasificar_categoria").hide();
			$("#reasignar").show();
			$("#tab_datos_generales").click();
			$("#Cancelar_reasig").hide();
			if($("#hddTipo_Gestor").val()==2){
				//$("#cambiar_area").hide();
			}
		}else{

			if(Estatus_Proceso=="2"){
				$("#tab_datos_generales").show();
				$("#tab_chat_seguimiento").show();
				$("#tab_adjuntos").show();
				$("#tab_cerrar_ticket").show();
				$("#ticket_reclasificar_categoria").show();
				$("#reasignar").show();
				$("#tab_datos_generales").click();
				
				//$("#TituloCierre").prop('disabled', false);
				$("#ComentarioCierre").prop('disabled', false);
				$("#ComentarioCierreGestor").prop('disabled', false);
				motivoreal.enable();
				motivoaparente.enable();
				$("#cmb_estatus_equipo").prop('disabled', false);
				$("#Cancelar_reasig").hide();
				//$("#cambiar_area").hide();

				if(Estatus_Deshabilita=="1"){
					$("#btnsubir_imagenes_chat").prop('disabled', true);
					$("#Mensaje").prop('disabled', true);
					$("#botonEnviar").attr("disabled", true);
					$("#btn_guardar_actividades").attr("disabled", true);
					$("#botonCerrar").attr("disabled", true);
					$("#Cambia_LoRealiza").hide();
					
				}else{
					$("#btnsubir_imagenes_chat").prop('disabled', false);
					$("#Mensaje").prop('disabled', false);
					$("#botonEnviar").attr("disabled", false);
					$("#btn_guardar_actividades").attr("disabled", false);
					$("#botonCerrar").attr("disabled", false);
					$("#Cambia_LoRealiza").show();
				}
				
			}else{
				if(Estatus_Proceso=="3"){
					$("#tab_datos_generales").hide();
					$("#tab_chat_seguimiento").show();
					$("#tab_adjuntos").show();
					$("#tab_cerrar_ticket").show();
					$("#reasignar").hide();
					$("#tab_cerrar_ticket").click();
					$("#ticket_reclasificar_categoria").hide();
					
					//$("#TituloCierre").prop('disabled', false);
					$("#ComentarioCierre").prop('disabled', false);
					$("#ComentarioCierreGestor").prop('disabled', false);
					motivoreal.enable();
					motivoaparente.enable();
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
						$("#ComentarioCierreGestor").prop('disabled', true);
						$("#ticket_reclasificar_categoria").hide();
						motivoreal.disable();
						motivoaparente.disable();
						$("#cmb_estatus_equipo").prop('disabled', true);
						//Controles Chat
						$("#botonEnviar").prop('disabled', true);
						$("#Mensaje").prop('disabled', true);
						$("#btnsubir_imagenes_chat").prop('disabled', true);
						$("#Cancelar_reasig").hide();
						// Botón de Actividades
						$("#btn_guardar_actividades").attr("disabled", true);
						setTimeout(function () { $("#actividades :input").attr("disabled", true); }, 1000);
					}	
				}
			}	
		}
		
		
		
		limpiarcampos();
		if (id != "") {
			
			if($("#idareasesion").val()==6){
				$("#relacionar_activo").hide();
				$("#Cambia_LoRealiza").hide();
			}
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
				async: true,
				data: {
					Id_Solicitud: id,
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
						if(data.data[0].Id_Area==2){$(".direccion_ip").show();}
						if(data.data[0].Id_Area==6){$("#Estat_Final_1").html("Estatus Final");$("#Estat_Final_2").html("Estatus Final");}
						
						
						if(data.data[0].Nombre_Ejecutante!=""){
							var $select_ejecutante= $('#gestorejecutante').selectize({});	
							var controlejecutante = $select_ejecutante[0].selectize;
							controlejecutante.addItem(data.data[0].Nombre_Ejecutante);
						}
						
						
						if(Estatus_Proceso==2&&data.data[0].Id_Area==1){
							//if(data.data[0].Id_Cirugia!=""){
								//if(data.data[0].Id_Cirugia!=""){
									$("#div_usuarios_enf").show();
								//}
								
								
								//Cuando sea de la seccion 2
								if(data.data[0].Seccion==2){
									//Cuando el Id del activo se diferente a vacio
									if(data.data[0].Id_Activo!=""){
										$("#qr_proveedor").html(""); //Se limpia div qr
										$("#li_enviar_preregistro").show();	
										var Request_Uri="<?php echo $_SERVER["REQUEST_URI"];?>";
										Request_Uri = Request_Uri.split('/');
										if(Request_Uri[1]=="sigapruebas"||Request_Uri[1]=="SIGAPRUEBAS"){
											jQuery(function(){
												// jQuery('#qr_proveedor').qrcode("http://siga.hospitalsatelite.com:8080/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key="+id+"&tipo=2");
												jQuery('#qr_proveedor').qrcode("https://apps2.hospitalsatelite.com/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key="+id+"&tipo=2");
												var canvas = document.querySelector("#qr_proveedor canvas");
												var img = canvas.toDataURL("image/jpg");
												$("#qr_proveedor").html(img);
											})
										}
										if(Request_Uri[1]=="siga"||Request_Uri[1]=="SIGA"){
											jQuery(function(){
												// jQuery('#qr_proveedor').qrcode("http://siga.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key="+id+"&tipo=2");
												jQuery('#qr_proveedor').qrcode("https://apps2.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key="+id+"&tipo=2");
												var canvas = document.querySelector("#qr_proveedor canvas");
												var img = canvas.toDataURL("image/jpg");
												$("#qr_proveedor").html(img);
											})
										}
									}
									
									//Cuando sea un activo externo
									if(data.data[0].Activo_Externo==1){
										$("#qr_proveedor").html(""); //Se limpia div qr
										$("#li_enviar_preregistro").show();	
										var Request_Uri="<?php echo $_SERVER["REQUEST_URI"];?>";
										Request_Uri = Request_Uri.split('/');
										if(Request_Uri[1]=="sigapruebas"||Request_Uri[1]=="SIGAPRUEBAS"){
											jQuery(function(){
												// jQuery('#qr_proveedor').qrcode("http://siga.hospitalsatelite.com:8080/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key="+id+"&tipo=2");
												jQuery('#qr_proveedor').qrcode("https://apps2.hospitalsatelite.com/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key="+id+"&tipo=2");
												var canvas = document.querySelector("#qr_proveedor canvas");
												var img = canvas.toDataURL("image/jpg");
												$("#qr_proveedor").html(img);
											})
										}
										if(Request_Uri[1]=="siga"||Request_Uri[1]=="SIGA"){
											jQuery(function(){
												// jQuery('#qr_proveedor').qrcode("http://siga.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key="+id+"&tipo=2");
												jQuery('#qr_proveedor').qrcode("https://apps2.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key="+id+"&tipo=2");
												var canvas = document.querySelector("#qr_proveedor canvas");
												var img = canvas.toDataURL("image/jpg");
												$("#qr_proveedor").html(img);
											})
										}
									}
									
								}
								
								//Cuando el activo solo sea externo y sea diferente a la seccion renta de equipo
								if(data.data[0].Activo_Externo==1&&data.data[0].Seccion!=2){
									$("#qr_proveedor").html(""); //Se limpia div qr
									$("#li_enviar_preregistro").show();	
									var Request_Uri="<?php echo $_SERVER["REQUEST_URI"];?>";
									Request_Uri = Request_Uri.split('/');
									if(Request_Uri[1]=="sigapruebas"||Request_Uri[1]=="SIGAPRUEBAS"){
										jQuery(function(){
											// jQuery('#qr_proveedor').qrcode("http://siga.hospitalsatelite.com:8080/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key="+id+"&tipo=2");
											jQuery('#qr_proveedor').qrcode("https://apps2.hospitalsatelite.com/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key="+id+"&tipo=2");
											var canvas = document.querySelector("#qr_proveedor canvas");
											var img = canvas.toDataURL("image/jpg");
											$("#qr_proveedor").html(img);
										})
									}
									if(Request_Uri[1]=="siga"||Request_Uri[1]=="SIGA"){
										jQuery(function(){
											//jQuery('#qr_proveedor').qrcode("http://siga.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key="+id+"&tipo=2");
											jQuery('#qr_proveedor').qrcode("https://apps2.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key="+id+"&tipo=2");
											var canvas = document.querySelector("#qr_proveedor canvas");
											var img = canvas.toDataURL("image/jpg");
											$("#qr_proveedor").html(img);
										})
									}
								}
							//}
						}
						
						if(Estatus_Proceso==3){
							//if(data.data[0].Id_Cirugia!=""){
								$("#div_usuarios_enf").show();
								var $select_enf= $('#cmb_usuarios_enf').selectize({});	
								var controlenf = $select_enf[0].selectize;
								controlenf.addItem(data.data[0].Id_Usuario);
							//}
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
									
									for(var k=0; k<array_arch.length;k++){ console.log('4401-'+k);
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
												
						cargacategoria(data.data[0].Seccion);
						carga_secciones(data.data[0].Id_Area,data.data[0].Seccion);
						
						if(data.data[0].Lo_Realiza=="0"){
							$("#Realiza_Interno").prop('checked', true);
							$("#Cambia_LoRealiza").prop('value', 'Cambiar Externo');
						}else{
							if(data.data[0].Lo_Realiza=="1"){
								$("#Realiza_Externo").prop('checked', true);
								$("#Cambia_LoRealiza").prop('value', 'Cambiar Interno');
							}
						}
						
						
						 if ($.trim(data.data[0].Id_Categoria) != '')
						 {
							 
						 
						 control_cate.addItem(data.data[0].Id_Categoria);
						 cargasubcategoria($.trim(data.data[0].Id_Categoria));
						 if ($.trim(data.data[0].Id_Subcategoria) != '')
						 control_subcate.addItem(data.data[0].Id_Subcategoria);
						 }
						 else{
								control_cate.clear();
								control_subcate.clear();								
						 }
						 
						 $("#Id_Solicitud").val(data.data[0].Id_Solicitud);
						 
						 //Si existe la imagen, pasamos el numero del empleado
						 if(data.data[0].Existe_Imagen=="si"){
							$("#No_Empleado_chat").val(data.data[0].No_Usuario);
						 }
						 
						
						 $("#hddEstatus_Proceso").val(data.data[0].Id_Estatus_Proceso);
						 $("#hddEstatus_Recepcion").val(data.data[0].Estatus_Recepcion);
						 
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
	
/*
	ClassicEditor
	.create( document.querySelector( '#Descripcion' ), {
		toolbar: [ 'heading', '|', 'bold', 'italic' ]
	} )
	.then( editor => {
		window.editor = editor;
	} )
	.catch( err => {
		console.error( err.stack );
	} );
*/
	 					 $("#DescripcionShow").html(data.data[0].Desc_Motivo_Reporte);
						 //$("#Descripcion").val(data.data[0].Desc_Motivo_Reporte);
						 //$("#TituloCierre").val(data.data[0].TituloCierre);
						 if(data.data[0].Id_Motivo_Aparente!=null){
							motivoaparente.addItem(data.data[0].Id_Motivo_Aparente);
						 }
						 



						 if(data.data[0].Id_Motivo_Real!=null){
							motivoreal.addItem(data.data[0].Id_Motivo_Real);
						 }
						 if(data.data[0].Id_Est_Equipo!=null){
							$("#cmb_estatus_equipo").val(data.data[0].Id_Est_Equipo);
						 }
						 $("#ComentarioCierre").val(data.data[0].ComentarioCierre);
						 $("#ComentarioCierreGestor").val(data.data[0].ComentarioCierreGestor);

						 for (var i=1; i <=3; i++)
						 {
						 var Estatus_Proce="";
						 $("#spanNumsolicitud"+i).text(data.data[0].Id_Solicitud);
						 Estatus_Proce=data.data[0].Estatus_Proceso;
						 if(data.data[0].Asist_Especial=="1"){
							Estatus_Proce+=" (Asistencia Especial)";
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
								 $('#recepcion_equipo').show();
							}else{
								 $("#spanActivo"+i).text(data.data[0].AF_BC_Ext+' '+data.data[0].Nombre_Act_Ext);
								 $("#spanMarca"+i).text(data.data[0].Marca_Act_Ext);
								 $("#spanModelo"+i).text(data.data[0].Modelo_Act_Ext);
								 $("#spanNo_Serie"+i).text(data.data[0].No_Serie_Act_Ext);
								 $("#spanUbic_Prim"+i).text(data.data[0].Desc_Ubic_Prim_Act_Ext);
								 $("#spanUbic_Sec"+i).text(data.data[0].Desc_Ubic_Sec_Act_Ext);
								 $('#recepcion_equipo').hide();
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
						 $("#Id_Cirugia").val(data.data[0].Id_Cirugia);
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
						 $("#hddEmpresa_Ext").val(data.data[0].Empresa_Ext);
						 $("#hddNombre_Completo_Ext").val(data.data[0].Nombre_Completo_Ext);
						 $("#hddTelefono_Ext").val(data.data[0].Telefono_Ext);
						 $("#hddCorreo_Ext").val(data.data[0].Correo_Ext);
						
						 
						 //$("#Pre_Re_Nombre").val(data.data[0].Nombre_Act_Ext);
						 //$("#Pre_Re_Marca").val(data.data[0].Marca_Act_Ext);
						 //$("#Pre_Re_Modelo").val(data.data[0].Modelo_Act_Ext);
						 //$("#Pre_Re_No_Serie").val(data.data[0].No_Serie_Act_Ext);
						 //$("#Pre_Re_Cantidad_Equipos").val(data.data[0].Cantidad_Equ_Ext);
						 //$("#Pre_Re_Empresa").val(data.data[0].Empresa_Ext);
						 //$("#Pre_Re_Nombre_Proveedor").val(data.data[0].Nombre_Completo_Ext);
						 //$("#Pre_Re_Telefono").val(data.data[0].Telefono_Ext);
						 //$("#Pre_Re_Correo").val(data.data[0].Correo_Ext);
						 //$("#Pre_Re_Observaciones").val(data.data[0].Observ_Pre_Reg_Ext);
						 
						 //Activar el tab Actividades si el ticket viene de las Actividades
						 if(Estatus_Proceso>1&& Estatus_Proceso<5){
							if((data.data[0].Id_Actividad!="")){
								$("#li_actividades").show();
								carga_actividades_rutinas(data.data[0].Id_Actividad, data.data[0].Fech_Solicitud);

							}else{
								$("#li_actividades").hide();
							}
						 }else{
							$("#li_actividades").hide();
						 }
						 
						 if(Estatus_Proceso=="4"){
							cargar_calificacion(data.data[0].Id_Solicitud);
						 }
						 
						 //Bloquear y desbloquear controles de datos generales
						 if(Estatus_Proceso>1){
							bloqueardatosgenerales(true);
						 }else{
							bloqueardatosgenerales(false);
						 }
						 
						//Cuando el estatus se encuentre en seguimiento 
						if(Estatus_Proceso=="2"){
							//Se deshabilita cuando el gestor es senior
							if($("#hddTipo_Gestor").val()=="1"){
								var $select3 = $('#numempleadoresguardo').selectize({});	
								var control3 = $select3[0].selectize;
								control3.enable();
								
								var $select4 = $('#gestorejecutante').selectize({});	
								var control4 = $select4[0].selectize;
								control4.enable();
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
						
						if($("#hddTipo_Gestor").val()=="2"){
							$("#divUsuarioReasignar").hide();
						}else{
							$("#divUsuarioReasignar").show();
						}
						
						if(data.data[0].Id_Estatus_Proceso!=Estatus_Proceso){
							$('#closeModal').click();
							mensajesalerta("Warning", "El ticket se encuentra en otro estatus por lo tanto no se podra abrir.", "error", "dark");
						}else{
							if(tab==4){
								$("#ComentarioCierre").val(data.data[0].Comentarios_Recepcion);
								$("#tab_cerrar_ticket").click();
							}
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
	
	//Funcion para cargar las calificaciones una vez que se ha cerrado el ticket
	function cargar_calificacion(Id_Solicitud){
		
		if(Id_Solicitud!=""){
			$("#div_calificacion").show();
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
						
							$("#faces-1-1").prop('disabled', true);
							$("#faces-1-2").prop('disabled', true);
							$("#faces-1-3").prop('disabled', true);
							$("#faces-1-4").prop('disabled', true);
							$("#faces-1-5").prop('disabled', true);
							$("#Solucion").prop('disabled', true);
							//if(json.data[0].Id_Pregunta=="1"){
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
							
							//}
							
							$("#faces-2-1").prop('disabled', true);
							$("#faces-2-2").prop('disabled', true);
							$("#faces-2-3").prop('disabled', true);
							$("#faces-2-4").prop('disabled', true);
							$("#faces-2-5").prop('disabled', true);
							$("#Actitud").prop('disabled', true);
							//if(json.data[0].Id_Pregunta=="2"){
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
							//}
							
							$("#faces-3-1").prop('disabled', true);
							$("#faces-3-2").prop('disabled', true);
							$("#faces-3-3").prop('disabled', true);
							$("#faces-3-4").prop('disabled', true);
							$("#faces-3-5").prop('disabled', true);
							$("#TiempoRespuesta").prop('disabled', true);
							//if(json.data[0].Id_Pregunta=="3"){
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
							//}
						}
						
					
					
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
		
	}
	
	
	$("#cmbcategoria").change(function (event){
		if ($("#cmbcategoria").val() != "")
			cargasubcategoria($("#cmbcategoria").val());
	    else
		{
			var $selectsubc= $('#cmbsubcategoria').selectize({});	
			var controlsubc = $selectsubc[0].selectize;
			controlsubc.clearOptions(); 
		}
	});
	 
	limpiarcampos=function(){
		$("#Realiza_Interno").prop('checked', true); 
	
		//Limpiamos el hidden Id_Actividad del tab actividades
		$("#Id_Actividad").val("");
		
		//$("#Id_Solicitud").val("");
		
		var Id_Empleado_Seguimiento=$.trim($("#numempleadoresguardo").val());
		if(Id_Empleado_Seguimiento!=""){	
			if(Id_Empleado_Seguimiento.length > 0){
				var $select3 = $('#numempleadoresguardo').selectize({});	
				var control3 = $select3[0].selectize;
				control3.clear();
				control3.enable();
			}
		}
		
		var gestorejecutante=$.trim($("#gestorejecutante").val());
		if(gestorejecutante!=""){
			if(gestorejecutante.length > 0){
				var $select4 = $('#gestorejecutante').selectize({});	
				var control4 = $select4[0].selectize;
				control4.clear();
				control4.enable();
			}
		}
		
		
		var $select_mot_ap = $('#cmb_motivo_aparente').selectize({});	
		var control_mot_apar = $select_mot_ap[0].selectize;
		control_mot_apar.clear();
		
		var $select_mot_real = $('#cmb_motivo_real').selectize({});	
		var control_mot_real = $select_mot_real[0].selectize;
		control_mot_real.clear();
		
		$("#cmb_estatus_equipo").val(-1);
		
		
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
		
	$("#Cambia_LoRealiza").click(function () {
		if($("#Realiza_Interno").is(':checked')) {  
           cambio_realiza_seguimiento(0);
        } else {
			if($("#Realiza_Externo").is(':checked')) {  
				cambio_realiza_seguimiento(1);
			}
		}  
	});
	
	function cambio_realiza_seguimiento(Estatus){
		var mensaje="";
		var Estatus_R="";
		if(Estatus=="0"){
			Estatus_R="1";
			mensaje="Requiere Cambiar de Interno a Externo";
		}
		
		if(Estatus=="1"){
			Estatus_R="0";
			mensaje="Requiere Cambiar de Externo a Interno";
		}
		
		
		
		if (confirm("Advertencia!! "+mensaje)) {
			if($("#Id_Solicitud").val()!=""){
				$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
					async: false,
					data: {
						Id_Solicitud:$("#Id_Solicitud").val(),
						Lo_Realiza: Estatus_R,
						accion:"Cambiar_lo_Realiza"
					},
					
					dataType: "html",
					beforeSend: function (xhr) {
				
					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						if (json.totalCount > 0) {
							
							mensajesalerta("&Eacute;xito", "Actualizado Correctamente.", "success", "dark");
							if(Estatus_R=="0"){$("#Realiza_Interno").prop("checked", true);$("#Cambia_LoRealiza").prop('value', 'Cambiar Externo');}
							
							if(Estatus_R=="1"){$("#Realiza_Externo").prop("checked", true);$("#Cambia_LoRealiza").prop('value', 'Cambiar Interno');}
						}
					
					},
					error: function () {
						mensajesalerta("Oh No!", "Ocurrio un error al Actualizar.", "error", "dark");
					}
				});
			}else{
				mensajesalerta("Oh No!", "Ocurrio un error, no Existe el Id de la Solicitud", "error", "dark");
			}
					
		}
		
		/*	
		bootbox.dialog({
			message: "Advertencia!! <br><br>"+mensaje,
			buttons: {
				danger: {
					label: "ACEPTAR",
					className: "btn-primary",
					callback: function() {
					}	
				},
				success: {
					label: "CANCELAR!",
					className: "btn-primary",
					callback: function() {
					}
				}
				
				
			}
		});
		*/
	}
	
	
	$("#seguimiento").click(function () {
		var Agregar = true;
		var mensaje_error = "";
		var strDatos={};
		var Id_Solicitud=$.trim($("#Id_Solicitud").val());
		//Usuario Sesion
		var Id_Usuario=$("#usuariosesion").val();
		//Area de sesion
		//var Id_Area=$("#idareasesion").val();
		var Id_Area=$("#hddArea").val();
		var Seccion="";
		var Titulo=$.trim($("#Titulo").val());
		var Desc_Motivo_Reporte=$.trim($("#Descripcion").val());
		var Prioridad="";
		var Id_Categoria=$("#cmbcategoria").val();
		var Id_Subcategoria=$("#cmbsubcategoria").val();
		var Lo_Realiza=0;
		var Id_Empleado_Seguimiento=$("#numempleadoresguardo").val();
		var Nombre_Ejecutante=$("#gestorejecutante").val();
		if($("#Realiza_Interno").is(':checked')) {  
            Lo_Realiza=0;  
        }else{
			if($("#Realiza_Externo").is(':checked')) {  
				Lo_Realiza=1;   
			}
		}
		
		Seccion=$("#hddSeccion").val();
		/////////
		
		if (Id_Area.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta elegir el área (Biomedica, TIC, etc)<br />";
		}
		
		if (Seccion.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta elegir la sección<br />";
			$("#Titulo").focus();
		}
		
		if (Id_Categoria == "") {
			Agregar = false; 
			mensaje_error += " -Falta elegir una categoría<br />";
			$("#cmbcategoria").focus();
		}
		
		if (Id_Subcategoria == "") {
			Agregar = false; 
			mensaje_error += " -Falta elegir una Subcategoría<br />";
			$("#cmbsubcategoria").focus();
		}			
		
		if (Titulo.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar el T&iacute;tulo<br />";
			$("#Titulo").focus();
		}
		
		if($("#hddTipo_Gestor").val()=="1"){
			if(Id_Empleado_Seguimiento.length<=0){
				Agregar = false; 
				mensaje_error += " -Selecciona al gestor<br />";
			}
		}
		
		
		
		/*if (Id_Motivo == "-1") {
			Agregar = false; 
			mensaje_error += " -Falta agregar el Motivo del Reporte<br />";
			$("#cmb_motivo_reporte").focus();
		}*/
		
		if (Desc_Motivo_Reporte.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Falta agregar la descripci&oacute;n del Ticket<br />";
			$("#Descripcion").focus();
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
		/////////
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		
		if(Agregar){
			//Controles Dividir ticket
			var estatus_dividir=$("#hddEst_div_tick").val();
			var Id_Usuario_divide=$("#hddId_Usuario").val();
			var Id_Area_divide=$("#hddId_Area").val();
			var Id_Medio_divide=$("#hddId_Medio").val();
			var Id_Activo_divide=$("#hddId_Activo").val();
			//Datos del Activo
			var Activo_Externo=$("#hddActivo_Externo").val();
			var AF_BC_Ext=$("#hddAF_BC_Ext").val();
			var Nombre_Act_Ext=$("#hddNombre_Act_Ext").val();
			var Marca_Act_Ext=$("#hddMarca_Act_Ext").val();
			var Modelo_Act_Ext=$("#hddModelo_Act_Ext").val();
			var No_Serie_Act_Ext=$("#hddNo_Serie_Act_Ext").val();
			var Id_Ubic_Prim_Ext=$("#hddId_Ubic_Prim").val();
			var Id_Ubic_Sec_Ext=$("#hddId_Ubic_Sec").val();
			var Empresa_Ext=$("#hddEmpresa_Ext").val();
			var Nombre_Completo_Ext=$("#hddNombre_Completo_Ext").val();
			var Telefono_Ext=$("#hddTelefono_Ext").val();
			var Correo_Ext=$("#hddCorreo_Ext").val();
			
			
			//
			var Id_Solicitud_Correo="";
			
			//Si el ticket pertenece a la misma seccion 
			if(Seccion==$("#hddId_Seccion").val()){
				strDatos.Seccion=Seccion;
				strDatos.Titulo=Titulo;
				strDatos.Lo_Realiza=Lo_Realiza;
				
				//strDatos += "&Id_Motivo="+Id_Motivo;
				strDatos.Desc_Motivo_Reporte=Desc_Motivo_Reporte;
				strDatos.Prioridad=Prioridad;
				strDatos.Id_Categoria=Id_Categoria;
				strDatos.Id_Subcategoria=Id_Subcategoria;
				strDatos.Nombre_Ejecutante=Nombre_Ejecutante;
				if(estatus_dividir!="1"){
					strDatos.Id_Solicitud=Id_Solicitud;
				}
				
				strDatos.Estatus_Reg="1";
				strDatos.accion="guardar";
				//Si el gestor es senior entra aqui
				if($("#hddTipo_Gestor").val()=="1"){
					//Si el gestor senior reasigna el ticket hacia un gestor junior
					if(Id_Empleado_Seguimiento!=""){
						if($("#hddEstatus_Proceso").val()=="1"||$("#hddEstatus_Proceso").val()=="2"){
							
							strDatos.Id_Gestor=Id_Empleado_Seguimiento;
							strDatos.Estatus_Proceso="2";
						}else{
							strDatos.Estatus_Proceso="1";
						}
						strDatos.Id_Gestor_Reasignado=Id_Empleado_Seguimiento;
						$('#closeModal').click();
						$("#Id_Solicitud").val("");
					}
					//Si el gestor senior toma el ticket
					else{
						strDatos.Estatus_Proceso="2";
						strDatos.Id_Gestor=Id_Usuario;
					}
				}
				//Si el gestor es junior solo podra darle seguimiento al ticket
				else{
					strDatos.Estatus_Proceso="2";
					strDatos.Usr_Mod=Id_Usuario;
					strDatos.Id_Gestor=Id_Usuario;
				}
			}
			//Si el ticket no pertenece a la seccion	
			else{
				strDatos.Estatus_Reg="1";
				if(estatus_dividir!="1"){
					strDatos.Id_Solicitud=Id_Solicitud;
				}
				strDatos.Seccion=Seccion;
				strDatos.Titulo=Titulo;
				strDatos.Desc_Motivo_Reporte=Desc_Motivo_Reporte;
				strDatos.Prioridad=Prioridad;
				strDatos.Id_Categoria=Id_Categoria;
				strDatos.Id_Subcategoria=Id_Subcategoria;
				strDatos.accion="guardar";
				strDatos.Nombre_Ejecutante=Nombre_Ejecutante;
				//Si el tipo de gestor es senior y se envia a otra seccion esta obligado a seleccionar un gestor por lo tanto el ticket pasara a seguimiento
				if($("#hddTipo_Gestor").val()=="1"){
					//strDatos += "&Id_Gestor_Reasignado="+Id_Empleado_Seguimiento;
					strDatos.Id_Gestor=Id_Empleado_Seguimiento;
					strDatos.Estatus_Proceso="2";
				}else{ //Si el tipo de gestor es junior y se envia a otra seccion el ticket llegara como nuevo
					strDatos.Estatus_Proceso="1";
				}
			}
			//Si el ticket se divide
			if(estatus_dividir=="1"){
				strDatos.Estatus_Reg="1";
				strDatos.Usr_Inser=$("#usuariosesion").val();
				
				strDatos.Id_Solicitud_Anterior=Id_Solicitud;
				strDatos.Id_Usuario=Id_Usuario_divide;
				strDatos.Id_Area=Id_Area_divide;
				strDatos.Id_Medio=Id_Medio_divide;
				//Datos del Activo
				//Preguntar a Mauricio si al dividir un ticket los datos del equipo de igual manera se pasarian
				strDatos.Id_Activo=Id_Activo_divide;
				strDatos.Id_Cirugia=$("#Id_Cirugia").val();
				strDatos.Activo_Externo=Activo_Externo;
				strDatos.AF_BC_Ext=AF_BC_Ext;
				strDatos.Nombre_Act_Ext=Nombre_Act_Ext;
				strDatos.Marca_Act_Ext=Marca_Act_Ext;
				strDatos.Modelo_Act_Ext=Modelo_Act_Ext;
				strDatos.No_Serie_Act_Ext=No_Serie_Act_Ext;
				strDatos.Id_Ubic_Prim=Id_Ubic_Prim_Ext;
				strDatos.Id_Ubic_Sec=Id_Ubic_Sec_Ext;
				strDatos.Empresa_Ext=Empresa_Ext;
				strDatos.Nombre_Completo_Ext=Nombre_Completo_Ext;
				strDatos.Telefono_Ext=Telefono_Ext;
				strDatos.Correo_Ext=Correo_Ext;
				strDatos.Nombre_Ejecutante=Nombre_Ejecutante;
				//Si el tipo de gestor es senior y se envia a otra seccion esta obligado a seleccionar un gestor por lo tanto el ticket pasara a seguimiento
				if($("#hddTipo_Gestor").val()=="1"){
					//strDatos += "&Id_Gestor_Reasignado="+Id_Empleado_Seguimiento;
					strDatos.Id_Gestor=Id_Empleado_Seguimiento;
					strDatos.Estatus_Proceso="2";
				}else{ //Si el tipo de gestor es junior y se envia a otra seccion el ticket llegara como nuevo
					if(Seccion==$("#hddId_Seccion").val()){
						strDatos.Id_Gestor=Id_Usuario;
						strDatos.Estatus_Proceso="2";
					}else{
						strDatos.Estatus_Proceso="1";
					}
				}
			}
		
			//console.log(strDatos);
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
				async: false,
				data: strDatos,
				dataType: "html",
				beforeSend: function (xhr) {
					
				},
				success: function (data) {
					data = eval("(" + data + ")");
					limpiarcampos();
					//$('#closeModal').click();
					//Controle dividir ticket
					$("#Cancelar_reasig").hide();
					$("#text_Numsolicitud").html("No. Solicitud de ayuda");
					//
					if(Seccion==$("#hddId_Seccion").val()){
						mensajesalerta("&Eacute;xito", "Generado Correctamente.", "success", "dark");
						$('#tablaNuevos').DataTable().ajax.reload();
						$('#tablaSeguimiento').DataTable().ajax.reload();
						$('#tablaPorCerrar').DataTable().ajax.reload();
						Carga_Perfil_Gestor();
						var estatus_lo_tomo=0;
						if($("#hddTipo_Gestor").val()=="1"){
							if(Id_Empleado_Seguimiento!=""){
								$('#closeModal').click();
								$("#Id_Solicitud").val("");
							}else{
								$("#tabSeguimiento").click();
								estatus_lo_tomo=1;
							}
						}else{
							$("#tabSeguimiento").click();
							estatus_lo_tomo=1;
						}
						
						if(estatus_lo_tomo==1){
							if (data.totalCount > 0) {
								var Extension_Telef="";
								if(data.data[0].No_Usuario!=""){
									Extension_Telef=consult_ext_bd_nomina(data.data[0].No_Usuario);
								}
								$("#tab_chat_seguimiento").show();
								$("#tab_adjuntos").show();
								$("#tab_cerrar_ticket").show();
								$("#hddEstatus_Proceso").val(data.data[0].Id_Estatus_Proceso);
								$("#hddEstatus_Recepcion").val(data.data[0].Estatus_Recepcion);
								Id_Solicitud_Correo=data.data[0].Id_Solicitud;
								
								var $select_ejecutante= $('#gestorejecutante').selectize({});	
							  var controlejecutante = $select_ejecutante[0].selectize;
							  controlejecutante.addItem(data.data[0].Nombre_Ejecutante);
								
								if(Prioridad=="1"){
									Prioridad="Alta";
								}else{
									if(Prioridad=="2"){
										Prioridad="Media";
									}else{
										if(Prioridad=="3"){
											Prioridad="Baja";
										}
									}
								}
								for (var i=1; i <=3; i++)
								{
									var Estatus_Proce="";
									$("#spanNumsolicitud"+i).text(data.data[0].Id_Solicitud);
									if(data.data[0].Id_Solicitud_Anterior!=null && data.data[0].Id_Solicitud_Anterior!=""){
									  $("#spanNumsolicitudAnterior"+i).text(data.data[0].Id_Solicitud_Anterior);
									  $("#liSolicitudAnterior"+i).show(); 
									}else{
									  $("#liSolicitudAnterior"+i).hide(); 
									}
									
									Estatus_Proce=data.data[0].Estatus_Proceso;
									if(data.data[0].Asist_Especial=="1"){
										Estatus_Proce+=" (Asistencia Especial)";
									}
									$("#spanStatus"+i).text(Estatus_Proce);
									if(data.data[0].Lo_Realiza=="0"){
										$("#spanLo_Realiza"+i).text("Interno");
									}else{
										if(data.data[0].Lo_Realiza=="1"){
											$("#spanLo_Realiza"+i).text("Externo");
										}
									}
										$("#spanArea"+i).text(data.data[0].Area);
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
								//Titulo del chat
								$("#title_chat").html("<font FACE='Arial' style='font-size:13px'>"+data.data[0].Gestor+"</font>");
								
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
								
								
								//Bloquear y desbloquear controles de datos generales
								if(data.data[0].Id_Estatus_Proceso>1){
									bloqueardatosgenerales(true);
								}else{
									bloqueardatosgenerales(false);
								}
								
								//Cuando el estatus se encuentre en seguimiento 
								if($("#hddEstatus_Proceso").val()=="2"){
									//Se deshabilita cuando el gestor es senior
									if($("#hddTipo_Gestor").val()=="1"){
										var $select3 = $('#numempleadoresguardo').selectize({});	
										var control3 = $select3[0].selectize;
										control3.enable();
										$("#seguimiento").prop('disabled', false);
										$("#btnsubir_imagenes_chat").prop('disabled', false);
										$("#Mensaje").prop('disabled', false);
										$("#botonEnviar").attr("disabled", false)
										$("#botonCerrar").prop('disabled', false);
										$("#seguimiento").html("Reasignar");
									}
								}else{
									$("#seguimiento").html("Dar Seguimiento");
								}
								
							}
						}
						
						if(data.data[0].Id_Estatus_Proceso==2&&data.data[0].Id_Area==1){
							//if(data.data[0].Id_Cirugia!=""){
								//if(data.data[0].Id_Cirugia!=""){
									$("#div_usuarios_enf").show();
								//}
								//Cuando sea de la seccion 2
								if(data.data[0].Seccion==2){
									//Cuando el Id del activo se diferente a vacio
									if(data.data[0].Id_Activo!=""){
										$("#qr_proveedor").html(""); //Se limpia div qr
										$("#li_enviar_preregistro").show();	
										var Request_Uri="<?php echo $_SERVER["REQUEST_URI"];?>";
										Request_Uri = Request_Uri.split('/');

										if(Request_Uri[1]=="sigapruebas"||Request_Uri[1]=="SIGAPRUEBAS"){
											jQuery(function(){
												//jQuery('#qr_proveedor').qrcode("http://siga.hospitalsatelite.com:8080/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key="+Id_Solicitud+"&tipo=2");
												jQuery('#qr_proveedor').qrcode("https://apps2.hospitalsatelite.com/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key="+Id_Solicitud+"&tipo=2");
												var canvas = document.querySelector("#qr_proveedor canvas");
												var img = canvas.toDataURL("image/jpg");
												$("#qr_proveedor").html(img);
											})
										}

										if(Request_Uri[1]=="siga"||Request_Uri[1]=="SIGA"){
											jQuery(function(){
												//jQuery('#qr_proveedor').qrcode("http://siga.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key="+Id_Solicitud+"&tipo=2");
												jQuery('#qr_proveedor').qrcode("https://apps2.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key="+Id_Solicitud+"&tipo=2");
												var canvas = document.querySelector("#qr_proveedor canvas");
												var img = canvas.toDataURL("image/jpg");
												$("#qr_proveedor").html(img);
											})
										}
									}
									
									//Cuando sea un activo externo
									if(data.data[0].Activo_Externo==1){
										$("#qr_proveedor").html(""); //Se limpia div qr
										$("#li_enviar_preregistro").show();	
										var Request_Uri="<?php echo $_SERVER["REQUEST_URI"];?>";
										Request_Uri = Request_Uri.split('/');

										if(Request_Uri[1]=="sigapruebas"||Request_Uri[1]=="SIGAPRUEBAS"){
											jQuery(function(){
												//jQuery('#qr_proveedor').qrcode("http://siga.hospitalsatelite.com:8080/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key="+Id_Solicitud+"&tipo=2");
												jQuery('#qr_proveedor').qrcode("https://apps2.hospitalsatelite.com/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key="+Id_Solicitud+"&tipo=2");
												var canvas = document.querySelector("#qr_proveedor canvas");
												var img = canvas.toDataURL("image/jpg");
												$("#qr_proveedor").html(img);
											})
										}

										if(Request_Uri[1]=="siga"||Request_Uri[1]=="SIGA"){
											jQuery(function(){
												//jQuery('#qr_proveedor').qrcode("http://siga.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key="+Id_Solicitud+"&tipo=2");
												jQuery('#qr_proveedor').qrcode("https://apps2.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key="+Id_Solicitud+"&tipo=2");
												var canvas = document.querySelector("#qr_proveedor canvas");
												var img = canvas.toDataURL("image/jpg");
												$("#qr_proveedor").html(img);
											})
										}
									}
									
								}
								
								//Cuando el activo solo sea externo y sea diferente a la seccion renta de equipo
								if(data.data[0].Activo_Externo==1&&data.data[0].Seccion!=2){
									$("#qr_proveedor").html(""); //Se limpia div qr
									$("#li_enviar_preregistro").show();	
									var Request_Uri="<?php echo $_SERVER["REQUEST_URI"];?>";
									Request_Uri = Request_Uri.split('/');

									if(Request_Uri[1]=="sigapruebas"||Request_Uri[1]=="SIGAPRUEBAS"){
										jQuery(function(){
											//jQuery('#qr_proveedor').qrcode("http://siga.hospitalsatelite.com:8080/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key="+Id_Solicitud+"&tipo=2");
											jQuery('#qr_proveedor').qrcode("https://apps2.hospitalsatelite.com/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key="+Id_Solicitud+"&tipo=2");
											var canvas = document.querySelector("#qr_proveedor canvas");
											var img = canvas.toDataURL("image/jpg");
											$("#qr_proveedor").html(img);
										})
									}

									if(Request_Uri[1]=="siga"||Request_Uri[1]=="SIGA"){
										jQuery(function(){
											//jQuery('#qr_proveedor').qrcode("http://siga.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key="+Id_Solicitud+"&tipo=2");
											jQuery('#qr_proveedor').qrcode("https://apps2.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key="+Id_Solicitud+"&tipo=2");
											var canvas = document.querySelector("#qr_proveedor canvas");
											var img = canvas.toDataURL("image/jpg");
											$("#qr_proveedor").html(img);
										})
									}
								}
							//}
						}
						
					}else{
						$('#closeModal').click();
						$("#Id_Solicitud").val("");
						$("#Id_Cirugia").val("");
						$('#tablaNuevos').DataTable().ajax.reload();
						$('#tablaSeguimiento').DataTable().ajax.reload();
						$('#tablaPorCerrar').DataTable().ajax.reload();
						Carga_Perfil_Gestor();
					}
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
						tipocorreo:"seguimiento",
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
  	
	//Carga la tabla en donde el tab se encuentra activa
	
	$("#closeModal").click(function () {
		cont_array_actividades_M=0;
		array_actividades_M=[];
		
		$("#No_Empleado_chat").val("");
		$("#Id_Solicitud").val("");
		$('#tablaNuevos').DataTable().ajax.reload();
		$('#tablaSeguimiento').DataTable().ajax.reload();
		$('#tablaPorCerrar').DataTable().ajax.reload();
		$('#tablaCierre').DataTable().ajax.reload();
		Carga_Perfil_Gestor();
	});
	
	//setInterval('cargar_tablas()',300000);
	cargar_tablas=function(){
		//isFlashEnabled();
		$('#tablaNuevos').DataTable().ajax.reload();
		$('#tablaPorCerrar').DataTable().ajax.reload();
		$('#tablaSeguimiento').DataTable().ajax.reload();
		$('#tablaCierre').DataTable().ajax.reload();
		Carga_Perfil_Gestor();
	}
	
	//setInterval('cargachatentreintaseg()',30000);
	cargachatentreintaseg=function(){
		if($("#Id_Solicitud").val()!=""){
			//cargachat();
		}
	}
	//Fin
	
	$("#numempleadoresguardo1").change(function() {
		
		$("#Check_Mis_Activos").prop( "checked", true );
		
		var valoption=$("#numempleadoresguardo1 option:selected" ).text();
		$("#hidden_seleccion_activo").val("");
		if(valoption!=""){
			valoption=valoption.split("-");
			if(valoption[0]!=""){
				carga_activos_vip("mis_activos");
				$("#Seleccionar_Activos").show();
			}
			
			
		}else{
			$("#Seleccionar_Activos").hide();
			$("#tablaactivos").html("");
		}
	});
	
	
	ver_preregistro=function(){
		$("#Pre_Re_Procedimiento").val("");
		$("#Pre_Re_Procedimiento").prop("disabled", true);
		$("#Pre_Re_Fecha_Hora_Cirugia").val("");
		$("#Pre_Re_Fecha_Hora_Cirugia").prop("disabled", true);
		$("#Pre_Re_Quirofano").val("");
		$("#Pre_Re_Quirofano").prop("disabled", true);
		$("#Pre_Re_Paciente").val("");
		$("#Pre_Re_Paciente").prop("disabled", true);
		$("#Pre_Re_Cirujano").val("");
		$("#Pre_Re_Cirujano").prop("disabled", true);
		
		$("#Valid_Pre_Re_Correo").html("");
		numfila=0;
		array_accesorios_act_ext=[];
		array_eliminados_act_ext=[]; 
		cont_eliminados_act_ext=0;
		var readonly_estatus_recepcion="";
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
		tr+='				<label class="control-label" style="font-size: 11px;">Cantidad</label>';
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
		tr+='	<td>';
		tr+='		<div class="col-md-12">';
		tr+='			<div class="form-group">';
		tr+='				<label class="control-label" style="font-size: 11px;">Eliminar</label>';
		tr+='			</div>';
		tr+='		</div>';
		tr+='	</td>';
		tr+='</tr>';
		$("#body_accesorios_act_pre").html(tr);
		
		$("#Modal_enviar_preregistro").modal("show");
		
		if($("#Id_Solicitud").val()!=""){
			$.ajax({
					type: "POST",
					url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
					async: false,
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
							
							if(data.data[0].Estatus_Recepcion==1){
								readonly_estatus_recepcion="disabled";
								$("#Pre_Re_Nombre").prop("disabled", true);
								$("#Pre_Re_Marca").prop("disabled", true);
								$("#Pre_Re_Modelo").prop("disabled", true);
								$("#Pre_Re_No_Serie").prop("disabled", true);
								$("#Pre_Re_Cantidad_Equipos").prop("disabled", true);
								$("#Pre_Re_Empresa").prop("disabled", true);
								$("#Pre_Re_Nombre_Proveedor").prop("disabled", true);
								$("#Pre_Re_Telefono").prop("disabled", true);
								$("#Pre_Re_Correo").prop("disabled", true);
								$("#Pre_Re_Observaciones").prop("disabled", true);
								$("#Agregar_Accesorios_Preregistro").hide();
								$("#btn_guardar_preregistro").hide();
								mensajesalerta("Informaci&oacute;n", "El Preregistro no se puede enviar debido a que ya se realizo la recepción del equipo.", "", "dark");			
							}else{
								readonly_estatus_recepcion="enabled";
								$("#Pre_Re_Nombre").prop("disabled", false);
								$("#Pre_Re_Marca").prop("disabled", false);
								$("#Pre_Re_Modelo").prop("disabled", false);
								$("#Pre_Re_No_Serie").prop("disabled", false);
								$("#Pre_Re_Cantidad_Equipos").prop("disabled", false);
								$("#Pre_Re_Empresa").prop("disabled", false);
								$("#Pre_Re_Nombre_Proveedor").prop("disabled", false);
								$("#Pre_Re_Telefono").prop("disabled", false);
								$("#Pre_Re_Correo").prop("disabled", false);
								$("#Pre_Re_Observaciones").prop("disabled", false);
								$("#Agregar_Accesorios_Preregistro").show();
								$("#btn_guardar_preregistro").show();
							}
							
							if(data.data[0].Id_Cirugia==""){
									$("#Pre_Re_Procedimiento").val(data.data[0].Pre_Re_Procedimiento);
									$("#Pre_Re_Fecha_Hora_Cirugia").val(data.data[0].Pre_Re_Fecha_Hora_Cirugia);
									$("#Pre_Re_Quirofano").val(data.data[0].Pre_Re_Quirofano);
									$("#Pre_Re_Paciente").val(data.data[0].Pre_Re_Paciente);
									$("#Pre_Re_Cirujano").val(data.data[0].Pre_Re_Cirujano);
							}
							
							
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
							consulta_gtiqx(data.data[0].Id_Cirugia)
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
								clonarfila='<tr id="tr_acc_act_pre_'+numfila+'">';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<input type="hidden" class="form-control revision_check_list_act_pre" id="hdd_id_accesorio_pre_'+numfila+'" placeholder="Nombre" value="'+json.data[i].Id_Accesorio_Ext+'" '+readonly_estatus_recepcion+'>';
								clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" id="Acc_Nombre_Pre_'+numfila+'" placeholder="Nombre" value="'+json.data[i].Nombre_Ext+'" '+readonly_estatus_recepcion+'>';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<input type="text" class="form-control input-number revision_check_list_act_pre" id="Acc_Cantidad_Pre_'+numfila+'" placeholder="Marca" value="'+json.data[i].Cantidad_Ext+'" '+readonly_estatus_recepcion+'>';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" id="Acc_Marca_Pre_'+numfila+'" placeholder="Marca" value="'+json.data[i].Marca_Ext+'" '+readonly_estatus_recepcion+'>';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" id="Acc_Modelo_Pre_'+numfila+'" placeholder="Modelo" value="'+json.data[i].Modelo_Ext+'" '+readonly_estatus_recepcion+'>';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" id="Acc_SeriePre_'+numfila+'" placeholder="No. Serie" value="'+json.data[i].No_Serie_Ext+'" '+readonly_estatus_recepcion+'>';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<button type="button"  class="btn btn-danger eliminalinea_pre" onclick="elimina_acc_pre('+numfila+')" '+readonly_estatus_recepcion+'>Eliminar</button>';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='</tr>';
								numfila=numfila+1;
								
								
								$("#tbl_accesorios_act_pre tbody").append(clonarfila);
								$('.input-number').on('input', function () { 
									this.value = this.value.replace(/[^0-9]/g,'');
								});
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
		}else{
			//Realiza la consulta para traer los datos del preregistro capturados manualmente
		  $("#Pre_Re_Fecha_Hora_Cirugia").prop("disabled", false);
			$("#Pre_Re_Procedimiento").prop("disabled", false);
			$("#Pre_Re_Fecha_Hora_Cirugia").prop("disabled", false);
			$("#Pre_Re_Quirofano").prop("disabled", false);
			$("#Pre_Re_Paciente").prop("disabled", false);
			$("#Pre_Re_Cirujano").prop("disabled", false);
		}
		
	}
	
	ver_activos=function(){
		$("#Valid_Correo_Ext").html("");
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
		tr+='	<td>';
		tr+='		<div class="col-md-12">';
		tr+='			<div class="form-group">';
		tr+='				<label class="control-label" style="font-size: 11px;">Eliminar</label>';
		tr+='			</div>';
		tr+='		</div>';
		tr+='	</td>';
		tr+='</tr>';
		$("#body_accesorios_act_ext").html(tr);
		
		$("#div_asignar_activo_externo").hide();
		$("#div_alta_activo_externo").show();
		$("#div_activos_seguimiento").show();
		
		$('#Nombre_Act_Ext').val("");
		$('#Marca_Act_Ext').val("");
		$('#Modelo_Act_Ext').val("");
		$('#No_Serie_Act_Ext').val("");
		$('#cmbubicacionprim').val(-1);
		$('#cmbubicacionsec').children('option').remove();
		$('#cmbubicacionsec').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
		
		$('#Empresa_Ext').val("");
		$('#Nombre_Completo_Ext').val("");
		$('#Telefono_Ext').val("");
		$('#Correo_Ext').val("");
		
		
		$("#Modal_seguimiento_ticket").modal("show");
		if($("#Id_Cirugia").val()!=""){
			$("#oblig_ext_nomb_compl").show();
			$("#oblig_ext_correo").show();
		}else{
			$("#oblig_ext_nomb_compl").hide();
			$("#oblig_ext_correo").hide();
		}
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",     
			async: false,
			data: {
				Estatus_Reg:"1",
				Id_Area:$("#idareasesion").val(),
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
					tabla+='<table id="tablaactivosseguimiento" class="table table-bordered table-striped table-chs">';
					tabla+='	<thead>';
					tabla+='	<tr>';
					tabla+='		<th>AF/BC</th>';
					//tabla+='		<th>Foto</th>';
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
						//tabla+=' <td class=" ">';
						//if ($.trim(data.data[i].Foto) != ''){
						//	tabla+='<img width="5px" height="15px" src="../Archivos/Archivos-Activos/' + data.data[i].Foto + '">';
						//}
						//tabla+='</td>';
						tabla+=' <td class=" ">'+data.data[i].Nombre_Activo+'</td>';
						tabla+=' <td class=" ">'+data.data[i].Marca+'</td>';
						tabla+=' <td class=" ">'+data.data[i].Modelo+'</td>';
						tabla+=' <td class=" ">'+data.data[i].NumSerie+'</td>';
						
						tabla+=' <td class=" ">'+data.data[i].Desc_Ubic_Prim+'</td>';
						tabla+=' <td class=" ">'+data.data[i].Desc_Ubic_Sec+'</td>';
						
						tabla+=' <td class=" "><div align="center"><input type="radio" name="radio_activos_cambio" onclick="cambio_de_activo(\''+data.data[i].Id_Activo+'\')" id="radio_cambio_act_'+data.data[i].Id_Activo+'"></div></td>';
						tabla+='</tr>';
					}
					tabla+='	</tbody>'; 
					tabla+='</table>';	
					
					$("#div_activos_seguimiento").html(tabla);
					
					$('#tablaactivosseguimiento').DataTable({
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
					$("#div_activos_seguimiento").html("<label>No se Encontraron Activos</label>");
					
				}
				
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
			}
		});
		
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
								 $("#div_alta_activo_externo").hide();
								 $("#div_activos_seguimiento").hide();
								
								 $("#Nombre_Act_Ext").val(data.data[0].Nombre_Act_Ext);
								 $("#Marca_Act_Ext").val(data.data[0].Marca_Act_Ext);
								 $("#Modelo_Act_Ext").val(data.data[0].Modelo_Act_Ext);
								 $("#No_Serie_Act_Ext").val(data.data[0].No_Serie_Act_Ext);
								 $("#cmbubicacionprim").val(data.data[0].Id_Ubic_Prim);
								 ubic_sec(data.data[0].Id_Ubic_Prim);
								 $("#cmbubicacionsec").val(data.data[0].Id_Ubic_Sec);
								 
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
								clonarfila+='				<input type="hidden" class="form-control revision_check_list_act_ext" id="hdd_id_accesorio_'+numfila+'" placeholder="Nombre" value="'+json.data[i].Id_Accesorio_Ext+'">';
								clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Acc_Nombre_Ext_'+numfila+'" placeholder="Nombre" value="'+json.data[i].Nombre_Ext+'">';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<input type="text" class="form-control input-number revision_check_list_act_ext" id="Acc_Cantidad_Ext_'+numfila+'" placeholder="Cantidad" value="'+json.data[i].Cantidad_Ext+'">';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Acc_Marca_Ext_'+numfila+'" placeholder="Marca" value="'+json.data[i].Marca_Ext+'">';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Acc_Modelo_Ext_'+numfila+'" placeholder="Modelo" value="'+json.data[i].Modelo_Ext+'">';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Acc_SerieExt_'+numfila+'" placeholder="No. Serie" value="'+json.data[i].No_Serie_Ext+'">';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='	<td>';
								clonarfila+='		<div class="col-md-12">';
								clonarfila+='			<div class="form-group">';
								clonarfila+='				<button type="button" class="btn btn-danger eliminalinea" onclick="elimina_acc_ext('+numfila+')">Eliminar</button>';
								clonarfila+='			</div>';
								clonarfila+='		</div>';
								clonarfila+='	</td>';
								clonarfila+='</tr>';
								numfila=numfila+1;
								
								
								$("#tbl_accesorios_act_ext tbody").append(clonarfila);
								$('.input-number').on('input', function () { 
									this.value = this.value.replace(/[^0-9]/g,'');
								});
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
	
	
	mostrar_mod_asignar_activo=function(){
		$("#div_asignar_activo_externo").show();
		$("#div_alta_activo_externo").hide();
		$("#div_activos_seguimiento").hide();
	}
	
	Regresar_tbl_reasig_act=function(){
		$("#div_asignar_activo_externo").hide();
		$("#div_alta_activo_externo").show();
		$("#div_activos_seguimiento").show();
	}
	
	ubic_prim();
	function ubic_prim() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Area:Id_Area, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_prim/Siga_cat_ubic_primFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbubicacionprim').append($('<option>', { value: "-1" }).text("--Ubicación Primaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbubicacionprim').append($('<option>', { value: resultado.data[i].Id_Ubic_Prim }).text(resultado.data[i].Desc_Ubic_Prim));
			}
		}else{
			$('#cmbubicacionprim').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	usuarios_enf();
	function usuarios_enf() {
		var Id_Area=$("#idareasesion").val();
		var resultado=new Array();
		data={ accion: "consultar", Estatus_Reg: "1"};
		resultado=cargo_cmb("../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			if (resultado.totalCount > 0) {

				var usuarios='';
				usuarios+='<option></option>';
				usuarios+='<optgroup label="Usuarios">';

				for (var i = 0; i < resultado.totalCount; i++) {
					usuarios+='<option value="'+resultado.data[i].Id_Usuario.trim()+'">'+resultado.data[i].No_Usuario.trim()+'-'+resultado.data[i].Nombre_Usuario.trim()+'</option>';
				}
				usuarios+='</optgroup>';
				$('#cmb_usuarios_enf').html(usuarios);

				$("#cmb_usuarios_enf").show();
					
				$('#cmb_usuarios_enf').selectize({
					//sortField: 'text'
				});
			}
			else {
				$('#cmb_usuarios_enf').append($('<option>', { value: "" }).text("Sin resultados"));
			}
		}else{
			$('#cmb_usuarios_enf').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
		
		
		
	}
	
	
	$( "#cmbubicacionprim" ).change(function() {
		if($(this).val()!="-1"){
			ubic_sec($(this).val());
		}else{
			$('#cmbubicacionsec').children('option').remove();
			$('#cmbubicacionsec').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
		}
	});
	
	function ubic_sec(Id_Ubic_Prim) {
		$('#cmbubicacionsec').children('option').remove();
		var resultado=new Array();
		data={Estatus_Reg: "1", Id_Ubic_Prim:Id_Ubic_Prim, accion: "consultar"};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ubic_sec/Siga_cat_ubic_secFacade.Class.php",false, data);
		if(resultado.totalCount>0){
			$('#cmbubicacionsec').append($('<option>', { value: "-1" }).text("--Ubicación Secundaria--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmbubicacionsec').append($('<option>', { value: resultado.data[i].Id_Ubic_Sec }).text(resultado.data[i].Desc_Ubic_Sec));
			}
		}else{
			$('#cmbubicacionsec').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	guardar_activo_externo=function(){
		var Agregar = true;
		var mensaje_error = "";
		var strDatos="";
		var Id_Solicitud=$.trim($("#Id_Solicitud").val());
		//Usuario Sesion
		var Id_Usuario=$("#usuariosesion").val();
		//Area de sesion
		var Nombre_Act_Ext=$.trim($("#Nombre_Act_Ext").val());
		var Marca_Act_Ext=$.trim($("#Marca_Act_Ext").val());
		var Modelo_Act_Ext=$.trim($("#Modelo_Act_Ext").val());
		var No_Serie_Act_Ext=$.trim($("#No_Serie_Act_Ext").val());
		var Id_Ubic_Prim=$("#cmbubicacionprim").val();
		var Id_Ubic_Sec=$("#cmbubicacionsec").val();
		var Empresa_Ext=$.trim($('#Empresa_Ext').val());
		var Nombre_Completo_Ext=$.trim($('#Nombre_Completo_Ext').val());
		var Telefono_Ext=$.trim($('#Telefono_Ext').val());
		var Correo_Ext=$.trim($('#Correo_Ext').val());
		
		
		if (Nombre_Act_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el nombre del activo<br/>";
		}
		
		if (Id_Ubic_Prim ==-1) {
			Agregar = false; 
			mensaje_error += " -Selecciona la ubicación Primaria<br/>";
		}
		
		if (Id_Ubic_Sec ==-1) {
			Agregar = false; 
			mensaje_error += " -Selecciona la ubicación Secundaria<br/>";
		}
		
		if (Empresa_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega la Empresa<br/>";
		}
		
		if($("#Id_Cirugia").val()!=""){
			if (Nombre_Completo_Ext.length <= 0) {
				Agregar = false; 
				mensaje_error += " -Agrega el nombre del proveedor<br/>";
			}
			
			if (Correo_Ext.length <= 0) {
				Agregar = false; 
				mensaje_error += " -Agrega el correo electrónico<br/>";
			}
		}
		
		
		var contador_existe_textbox=0; var valida_texto=0;
		for(var k=0; k<=numfila; k++){
			if ( $("#Acc_Nombre_Ext_"+k).length > 0) {
				var array_existe_textbox=[];
				array_existe_textbox[0]=$.trim($("#Acc_Nombre_Ext_"+k).val());
				array_existe_textbox[1]=$.trim($("#Acc_Marca_Ext_"+k).val());
				array_existe_textbox[2]=$.trim($("#Acc_Modelo_Ext_"+k).val());
				array_existe_textbox[3]=$.trim($("#Acc_SerieExt_"+k).val());
				array_existe_textbox[4]=$.trim($("#hdd_id_accesorio_"+k).val());
				array_existe_textbox[5]=$.trim($("#Acc_Cantidad_Ext_"+k).val());
				array_accesorios_act_ext[contador_existe_textbox]=array_existe_textbox;
				if($.trim($("#Acc_Nombre_Ext_"+k).val())==""){
					valida_texto=1;
					Agregar=false;
				}
				
				if($.trim($("#Acc_Cantidad_Ext_"+k).val())==""){
					valida_texto=1;
					Agregar=false;
				}
				contador_existe_textbox=contador_existe_textbox+1;
			}
		}
		if(valida_texto==1){
			mensaje_error+="-Agrega información en los campos obligatorios de los Accesorios\n";
			error=true;
		}
		
		/////////
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		
		if(Agregar){
			
			
			$.confirm({
				title: 'Confirm!',
				content: 'Esta usted seguro de guardar este activo.\n Al aceptar se asignará el activo al ticket.',
				buttons: {
					aceptar: function () {
						$("#Modal_seguimiento_ticket").modal("hide");
						//$("#closeModal").click();
						var Id_Solicitud=$("#Id_Solicitud").val();
						var Estatus_Proceso=$("#hddEstatus_Proceso").val();
						if(Id_Solicitud!=""){
							
							$.ajax({
								type: "POST",
								url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
								async: false,
								data: {
									accion:"Guardar_Activo_Externo",
									Id_Solicitud: Id_Solicitud,
									Id_Cirugia: $("#Id_Cirugia").val(),
									Id_Usuario: $("#usuariosesion").val(),
									Activo_Externo:"1",
									Nombre_Act_Ext:Nombre_Act_Ext,
									Marca_Act_Ext:Marca_Act_Ext,
									Modelo_Act_Ext:Modelo_Act_Ext,
									No_Serie_Act_Ext:No_Serie_Act_Ext,
									Id_Ubic_Prim:Id_Ubic_Prim,
									Id_Ubic_Sec:Id_Ubic_Sec,
									Empresa_Ext:Empresa_Ext,
									Nombre_Completo_Ext:Nombre_Completo_Ext,
									Telefono_Ext:Telefono_Ext,
									Correo_Ext: Correo_Ext,
									array_accesorios_act_ext: array_accesorios_act_ext,
									array_eliminados_act_ext:array_eliminados_act_ext
									
								},
								dataType: "html",
								beforeSend: function (xhr) {
									
								},
								success: function (data) {
									data = eval("(" + data + ")");
									if(data.totalCount>0){
										if (Id_Solicitud != "") {
											$.ajax({
												type: "POST",
												url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
												async: true,
												data: {
													Id_Solicitud: Id_Solicitud,
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
														 for (var i=1; i <=3; i++)
														 {
															 var Estatus_Proce="";
															 $("#spanNumsolicitud"+i).text(data.data[0].Id_Solicitud);
															 Estatus_Proce=data.data[0].Estatus_Proceso;
															 if(data.data[0].Asist_Especial=="1"){
																Estatus_Proce+=" (Asistencia Especial)";
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
															 //$("#spanExtension_Tel"+i).text(Extension_Telef);
														 }
														 
														 //Psar valores para dividir el ticket
														 $("#Id_Cirugia").val(data.data[0].Id_Cirugia);
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
														 $("#hddEmpresa_Ext").val(data.data[0].Empresa_Ext);
														 $("#hddNombre_Completo_Ext").val(data.data[0].Nombre_Completo_Ext);
														 $("#hddTelefono_Ext").val(data.data[0].Telefono_Ext);
														 $("#hddCorreo_Ext").val(data.data[0].Correo_Ext);
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
										mensajesalerta("Éxito!", "Se ha actualizado el activo correctamente.", "success", "dark");
									}else{
										mensajesalerta("Oh No!", "Ocurrio un error al actualizar el activo.", "error", "dark");
									}
								},
								error: function () {
									mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
								}
							});
						
						}
					},
					cancel: function () {
					}
				}
			});
			
			
		}
		
	}
	
	
	
	
	
	Guardar_Preregistro=function(){
		var Agregar = true;
		var mensaje_error = "";
		var strDatos="";
		var Id_Solicitud=$.trim($("#Id_Solicitud").val());
		
		//Datos de la cirugia
		var Pre_Re_Procedimiento=$.trim($("#Pre_Re_Procedimiento").val());
		var Pre_Re_Fecha_Hora_Cirugia=$.trim($("#Pre_Re_Fecha_Hora_Cirugia").val());
		var Pre_Re_Quirofano=$.trim($("#Pre_Re_Quirofano").val());
		var Pre_Re_Paciente=$.trim($("#Pre_Re_Paciente").val());
		var Pre_Re_Cirujano=$.trim($("#Pre_Re_Cirujano").val());
		//Fin Datos de la cirugia
		
		//Usuario Sesion
		var Id_Usuario=$("#usuariosesion").val();
		//Area de sesion
		var Nombre_Act_Ext=$.trim($("#Pre_Re_Nombre").val());
		var Marca_Act_Ext=$.trim($("#Pre_Re_Marca").val());
		var Modelo_Act_Ext=$.trim($("#Pre_Re_Modelo").val());
		var No_Serie_Act_Ext=$.trim($("#Pre_Re_No_Serie").val());
		var Cantidad_Equ_Ext=$.trim($("#Pre_Re_Cantidad_Equipos").val());
		//var Id_Ubic_Prim=$("#cmbubicacionprim").val();
		//var Id_Ubic_Sec=$("#cmbubicacionsec").val();
		var Empresa_Ext=$.trim($('#Pre_Re_Empresa').val());
		var Nombre_Completo_Ext=$.trim($('#Pre_Re_Nombre_Proveedor').val());
		var Telefono_Ext=$.trim($('#Pre_Re_Telefono').val());
		var Correo_Ext=$.trim($('#Pre_Re_Correo').val());
		var Observ_Pre_Reg_Ext=$.trim($('#Pre_Re_Observaciones').val());
		var qr_proveedor=$('#qr_proveedor').html();
		
		if($.trim($("#Id_Cirugia").val())==""){
				if (Pre_Re_Procedimiento.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el nombre del procedimiento<br/>";
				}
				
				if (Pre_Re_Fecha_Hora_Cirugia.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega la fecha y hora de la cirugía<br/>";
				}
				
				if (Pre_Re_Quirofano.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el quirofano / sala<br/>";
				}
				
				if (Pre_Re_Paciente.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el nombre del paciente<br/>";
				}
				
				if (Pre_Re_Cirujano.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el cirujano / médico tratante<br/>";
				}
		}
		
		
		if (Nombre_Act_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el nombre del activo<br/>";
		}
		
		if (Marca_Act_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega la marca<br/>";
		}
		
		if (Modelo_Act_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el modelo<br/>";
		}
		
		if (No_Serie_Act_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el número de serie<br/>";
		}
		
		if (Cantidad_Equ_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega la cantidad de equipos<br/>";
		}
		
		
		
		
		//if (Id_Ubic_Prim ==-1) {
		//	Agregar = false; 
		//	mensaje_error += " -Selecciona la ubicación Primaria<br/>";
		//}
		//
		//if (Id_Ubic_Sec ==-1) {
		//	Agregar = false; 
		//	mensaje_error += " -Selecciona la ubicación Secundaria<br/>";
		//}
		
		if (Empresa_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega la Empresa<br/>";
		}
		
		if (Nombre_Completo_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el nombre del proveedor<br/>";
		}
		
		if (Correo_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el correo electrónico<br/>";
		}
		
		if (Observ_Pre_Reg_Ext.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega las Observaciones<br/>";
		}
		
		
		var contador_existe_textbox=0; var valida_texto=0;
		for(var k=0; k<=numfila; k++){
			if ( $("#Acc_Nombre_Pre_"+k).length > 0) {
				var array_existe_textbox=[];
				array_existe_textbox[0]=$.trim($("#Acc_Nombre_Pre_"+k).val());
				array_existe_textbox[1]=$.trim($("#Acc_Marca_Pre_"+k).val());
				array_existe_textbox[2]=$.trim($("#Acc_Modelo_Pre_"+k).val());
				array_existe_textbox[3]=$.trim($("#Acc_SeriePre_"+k).val());
				array_existe_textbox[4]=$.trim($("#hdd_id_accesorio_pre_"+k).val());
				array_existe_textbox[5]=$.trim($("#Acc_Cantidad_Pre_"+k).val());
				array_accesorios_act_ext[contador_existe_textbox]=array_existe_textbox;
				if($.trim($("#Acc_Nombre_Pre_"+k).val())==""){
					valida_texto=1;
					Agregar=false;
				}
				if($.trim($("#Acc_Cantidad_Pre_"+k).val())==""){
					valida_texto=1;
					Agregar=false;
				}
				contador_existe_textbox=contador_existe_textbox+1;
			}
		}
		if(valida_texto==1){
			mensaje_error+="-Agrega información en los campos obligatorios de los Accesorios\n";
			error=true;
		}
		
		/////////
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		var html_pre_reg="";
		html_pre_reg+='<!DOCTYPE html>';
		html_pre_reg+='<html>';
		html_pre_reg+='<head>';
		html_pre_reg+='	<meta charset="utf-8">';
		html_pre_reg+='	<meta http-equiv="X-UA-Compatible" content="IE=edge">';
		html_pre_reg+='<head>';
		html_pre_reg+='<style type="text/css">';
		html_pre_reg+='	#tbl';
		html_pre_reg+='	{';
		html_pre_reg+='		border-collapse: collapse; ';
		html_pre_reg+='		border-spacing: 0; ';
		html_pre_reg+='		background-color: transparent;'; 
		html_pre_reg+='		margin-bottom: 20px; ';
		html_pre_reg+='		max-width: 100%; ';
		html_pre_reg+='		width: 100%;';
		html_pre_reg+='	}';
		html_pre_reg+='	.text-center';
		html_pre_reg+='	{';
		html_pre_reg+='		text-align: center;';
		html_pre_reg+='	}';
		html_pre_reg+='	body { font-family: Source Sans Pro,Helvetica Neue,Helvetica,Arial,sans-serif; font-weight: 400; overflow-x: hidden; overflow-y: auto; }';
		html_pre_reg+='	#pdf_1 #tbl .thead #tr .td{';
		html_pre_reg+='		text-align:center;';
		html_pre_reg+='		background:#19294a;';
		html_pre_reg+='		color:#fff;';
		html_pre_reg+='		font-family: Arial;';
		html_pre_reg+='	}';
		html_pre_reg+='	#pdf_1 #tbl .tbody #tr .td{';
		html_pre_reg+='		border:1px solid #ccc;';
		html_pre_reg+='		font-size:12px;';
		html_pre_reg+='		background:#848382;';
		html_pre_reg+='		padding: 3px;';
		html_pre_reg+='		color:#fff; font-family: Arial;';
		html_pre_reg+='		font-family: Arial;';
		html_pre_reg+='	}';
		html_pre_reg+='	#pdf_1 #tbl .tbody #tr .td_r{';
		html_pre_reg+='		border:1px solid #ccc;';
		html_pre_reg+='		font-size:12px;';
		html_pre_reg+='		padding: 3px;';
		html_pre_reg+='		font-family: Arial;';
		html_pre_reg+='	}';
		html_pre_reg+='	#pdf_1 #tbl .tbody #tr.photo{';
		html_pre_reg+='		background:#f4f4f4;';
		html_pre_reg+='		color:#666;';
		html_pre_reg+='		text-align:center;';
		html_pre_reg+='	}';
		html_pre_reg+='	#pdf_1 #tbl .tbody tr.adjuntos td{';
		html_pre_reg+='		padding:1em 0;';
		html_pre_reg+='	}';
		html_pre_reg+='	#pdf_1 #tbl .tbody tr td.check img{';
		html_pre_reg+='		width:15px;';
		html_pre_reg+='		height:15px;';
		html_pre_reg+='		margin:0 auto;';
		html_pre_reg+='		display:block;';
		html_pre_reg+='	}';
		html_pre_reg+='	#pdf_1 #tbl .tbody #tr .sign{';
		html_pre_reg+='		vertical-align:top;';
		html_pre_reg+='		height:6em;';
		html_pre_reg+='		text-align:center;';
		html_pre_reg+='	}';
		html_pre_reg+='	#pdf_1 #tbl .tbody #tr .td .sign .comments{';
		html_pre_reg+='		text-align:left;';
		html_pre_reg+='	}';
		html_pre_reg+='	#pdf_1 #tbl .tbody #tr .td .author{';
		html_pre_reg+='		vertical-align:center;';
		html_pre_reg+='		text-align:center;';
		html_pre_reg+='	}';
		html_pre_reg+='	#pdf_1 #tbl .tbody #tr.faces .td{';
		html_pre_reg+='	}';
		html_pre_reg+='	#pdf_1 #tbl .tbody #tr.faces .td img{';
		html_pre_reg+='		margin:0 auto;';
		html_pre_reg+='		display:block;';
		html_pre_reg+='		width:40px;';
		html_pre_reg+='		vertical-align:middle;';
		html_pre_reg+='	}';
		html_pre_reg+=' .verticalText {';
		html_pre_reg+=' -webkit-transform: rotate(-90deg);';
		html_pre_reg+=' -moz-transform: rotate(-90deg);';
		html_pre_reg+=' }';
		html_pre_reg+='	</style>';
		html_pre_reg+='</head>';
		html_pre_reg+='<body><img style="width:155px;height:55px" width="120px" src="https://apps2.hospitalsatelite.com/SIGA/dist/img/bannersiga.png"><br><br>';
		html_pre_reg+='	<div  id="pdf_1"> ';
		html_pre_reg+='	  <table id="tbl">';
		html_pre_reg+='			<thead class="thead">';
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td class="td" style="border-top: 1px solid #ddd;padding: 0px;vertical-align: top;">PRE REGISTRO EQUIPO BIOM&Eacute;DICA</td>';
		html_pre_reg+='				</tr>';
		html_pre_reg+='			</thead>';
		html_pre_reg+='		</table>';
		//Mensaje al Proveedor
		html_pre_reg+='		||msj_proveedor||';
		html_pre_reg+='	  <table id="tbl">';
		html_pre_reg+='			<thead class="thead">';
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td colspan="8" class="td" style="border-top: 1px solid #ddd;padding: 0px;vertical-align: top;">DATOS DE LA CIRUGÍA</td>';
		html_pre_reg+='				</tr>';
		html_pre_reg+='			</thead>';
		html_pre_reg+='			<tbody class="tbody">';
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td class="td"><strong>Consecutivo: </strong></td>';
		html_pre_reg+='					<td class="td_r">'+$("#Id_Cirugia").val()+'</td>';
		html_pre_reg+='					<td class="td"><strong>Nombre Procedimiento: </strong></td>';
		html_pre_reg+='					<td class="td_r">'+$("#Pre_Re_Procedimiento").val()+'</td>';
		html_pre_reg+='					<td class="td"><strong>Fecha / Hora Cirugía / Procedimiento: </strong></td>';
		html_pre_reg+='					<td class="td_r">'+$("#Pre_Re_Fecha_Hora_Cirugia").val()+'</td>';
		html_pre_reg+='					<td class="td"><strong>Quirófano / Sala: </strong></td>';
		html_pre_reg+='					<td class="td_r">'+$("#Pre_Re_Quirofano").val()+'</td>';
		html_pre_reg+='				</tr>';
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td class="td"><strong>Paciente: </strong></td>';
		html_pre_reg+='					<td class="td_r" colspan="3">'+$("#Pre_Re_Paciente").val()+'</td>';
		html_pre_reg+='					<td class="td"><strong>Cirujano / Médico Tratante: </strong></td>';
		html_pre_reg+='					<td class="td_r" colspan="3">'+$("#Pre_Re_Cirujano").val()+'</td>';
		html_pre_reg+='				</tr>';
		html_pre_reg+='			</tbody>';
		html_pre_reg+='		</table>';
		html_pre_reg+='		<br><br>';
		html_pre_reg+='		<table id="tbl">';
		html_pre_reg+='			<thead class="thead">';
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td colspan="6" class="td" style="border-top: 1px solid #ddd;padding: 0px;vertical-align: top;">DATOS DEL EQUIPO</td>';
		html_pre_reg+='				</tr>';
		html_pre_reg+='			</thead>';
		html_pre_reg+='			<tbody class="tbody">';
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td class="td"><strong>Nombre: </strong></td>';
		html_pre_reg+='					<td class="td_r">'+Nombre_Act_Ext+'</td>';
		html_pre_reg+='					<td class="td"><strong>Marca: </strong></td>';
		html_pre_reg+='					<td class="td_r">'+Marca_Act_Ext+'</td>';
		html_pre_reg+='					<td class="td"><strong>Modelo: </strong></td>';
		html_pre_reg+='					<td class="td_r">'+Modelo_Act_Ext+'</td>';
		html_pre_reg+='				</tr>';
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td class="td"><strong>No. Serie: </strong></td>';
		html_pre_reg+='					<td class="td_r">'+No_Serie_Act_Ext+'</td>';
		html_pre_reg+='					<td class="td"><strong>Cantidad de Equipos: </strong></td>';
		html_pre_reg+='					<td class="td_r" colspan="3">'+Cantidad_Equ_Ext+'</td>';
		html_pre_reg+='				</tr>';
		html_pre_reg+='			</tbody>';
		html_pre_reg+='		</table>';
		if(array_accesorios_act_ext.length>0){
		html_pre_reg+='		<br><br>';
		html_pre_reg+='		<table id="tbl">';
		html_pre_reg+='			<thead class="thead">';
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td colspan="5" class="td" style="border-top: 1px solid #ddd;padding: 0px;vertical-align: top;">ACCESORIOS</td>';
		html_pre_reg+='				</tr>';
		html_pre_reg+='			</thead>';
		html_pre_reg+='			<tbody class="tbody">';
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td class="td"><strong>Accesorio</strong></td>';
		html_pre_reg+='					<td class="td"><strong>Cantidad</strong></td>';
		html_pre_reg+='					<td class="td"><strong>Marca</strong></td>';
		html_pre_reg+='					<td class="td"><strong>Modelo</strong></td>';
		html_pre_reg+='					<td class="td"><strong>No. Serie</strong></td>';
		html_pre_reg+='				</tr>';
		for(var n=0; n<array_accesorios_act_ext.length; n++){
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td class="td_r">'+array_accesorios_act_ext[n][0]+'</td>';
		html_pre_reg+='					<td class="td_r">'+array_accesorios_act_ext[n][5]+'</td>';
		html_pre_reg+='					<td class="td_r">'+array_accesorios_act_ext[n][1]+'</td>';
		html_pre_reg+='					<td class="td_r">'+array_accesorios_act_ext[n][2]+'</td>';
		html_pre_reg+='					<td class="td_r">'+array_accesorios_act_ext[n][3]+'</td>';
		html_pre_reg+='				</tr>';
		}
		html_pre_reg+='			</tbody>';
		html_pre_reg+='		</table>';
		}
		html_pre_reg+='		<br><br>';
		html_pre_reg+='		<table id="tbl">';
		html_pre_reg+='			<thead class="thead">';
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td colspan="6" class="td" style="border-top: 1px solid #ddd;padding: 0px;vertical-align: top;">DATOS DEL PROVEEDOR</td>';
		html_pre_reg+='				</tr>';
		html_pre_reg+='			</thead>';
		html_pre_reg+='			<tbody class="tbody">';
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td class="td"><strong>Empresa: </strong></td>';
		html_pre_reg+='					<td class="td_r">'+Empresa_Ext+'</td>';
		html_pre_reg+='					<td class="td"><strong>Nombre Proveedor: </strong></td>';
		html_pre_reg+='					<td class="td_r">'+Nombre_Completo_Ext+'</td>';
		html_pre_reg+='					<td class="td"><strong>Teléfono: </strong></td>';
		html_pre_reg+='					<td class="td_r">'+Telefono_Ext+'</td>';
		html_pre_reg+='				</tr>';
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td class="td"><strong>Correo: </strong></td>';
		html_pre_reg+='					<td colspan="5" class="td_r">'+Correo_Ext+'</td>';
		html_pre_reg+='				</tr>';
		html_pre_reg+='			</tbody>';
		html_pre_reg+='		</table>';
		html_pre_reg+='		<br><br>';
		html_pre_reg+='		<table id="tbl">';
		html_pre_reg+='			<thead class="thead">';
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td class="td" colspan="2" style="border-top: 1px solid #ddd;padding: 0px;vertical-align: top;">OBSERVACIONES / ||Link_QR||</td>';
		html_pre_reg+='				</tr>';
		html_pre_reg+='			</thead>';
		html_pre_reg+='			<tbody class="tbody">';
		html_pre_reg+='				<tr id="tr">';
		html_pre_reg+='					<td class="td_r" width="50%">'+Observ_Pre_Reg_Ext+'</td>';
		html_pre_reg+='					<td class="td_r" align="center" width="50%">||QR||</td>';
		html_pre_reg+='				</tr>';
		html_pre_reg+='			</tbody>';
		html_pre_reg+='		</table>';
		html_pre_reg+='		<br><br>';
		html_pre_reg+='	</div>';
		html_pre_reg+='</body>';
		html_pre_reg+='</html>';
		
		
		if(Agregar){
			$.confirm({
				title: 'Confirm!',
				content: 'Esta seguro de guardar el Pre registro.\n Al aceptar se enviará el Mail al Proveedor',
				buttons: {
					aceptar: function () {
						$("#Modal_enviar_preregistro").modal("hide");
						//$("#closeModal").click();
						var Id_Solicitud=$("#Id_Solicitud").val();
						var Estatus_Proceso=$("#hddEstatus_Proceso").val();
						if(Id_Solicitud!=""){
							
							$.ajax({
								type: "POST",
								url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
								async: false,
								data: {
									accion: "Guardar_Preregistro",
									Id_Solicitud: Id_Solicitud,
									Id_Cirugia: $("#Id_Cirugia").val(),
									Id_Usuario: $("#usuariosesion").val(),
									Pre_Registro_Ext: "1",
									Nombre_Act_Ext: Nombre_Act_Ext,
									Marca_Act_Ext: Marca_Act_Ext,
									Modelo_Act_Ext: Modelo_Act_Ext,
									No_Serie_Act_Ext: No_Serie_Act_Ext,
									Cantidad_Equ_Ext: Cantidad_Equ_Ext,
									//Id_Ubic_Prim:Id_Ubic_Prim,
									//Id_Ubic_Sec:Id_Ubic_Sec,
									Pre_Re_Procedimiento: Pre_Re_Procedimiento,
									Pre_Re_Fecha_Hora_Cirugia: Pre_Re_Fecha_Hora_Cirugia,
									Pre_Re_Quirofano: Pre_Re_Quirofano,
									Pre_Re_Paciente: Pre_Re_Paciente,
									Pre_Re_Cirujano: Pre_Re_Cirujano,
									Empresa_Ext: Empresa_Ext,
									Nombre_Completo_Ext: Nombre_Completo_Ext,
									Telefono_Ext: Telefono_Ext,
									Correo_Ext: Correo_Ext,
									Observ_Pre_Reg_Ext: Observ_Pre_Reg_Ext,
									html_pre_reg: html_pre_reg,
									qr_proveedor: qr_proveedor,
									array_accesorios_act_ext: array_accesorios_act_ext,
									array_eliminados_act_ext: array_eliminados_act_ext

								},
								dataType: "html",
								beforeSend: function (xhr) {

								},
								success: function (data) {
									data = eval("(" + data + ")");
									if(data.totalCount>0){
										pasarvalores(Id_Solicitud, Estatus_Proceso, 0, 0);
										mensajesalerta("Éxito!", "Se ha creado el preregistro correctamente.", "success", "dark");
									}else{
										mensajesalerta("Oh No!", "Ocurrio un error al crear el preregistro.", "error", "dark");
									}
								},
								error: function () {
									mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
								}
							});
						
						}
					},
					cancel: function () {
					}
				}
			});
		}
	}
	
	
	
	cambio_de_activo=function(Id_Activo){
		$.confirm({
				title: 'Confirm!',
				content: 'Esta usted seguro de seleccionar este activo.\n Al aceptar se asignará el activo al ticket.',
				buttons: {
					aceptar: function () {
						$("#Modal_seguimiento_ticket").modal("hide");
						//$("#closeModal").click();
						var Id_Solicitud=$("#Id_Solicitud").val();
						var Estatus_Proceso=$("#hddEstatus_Proceso").val();
						if(Id_Solicitud!=""&&Id_Activo!=""){
							
							$.ajax({
								type: "POST",
								url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
								async: false,
								data: {
									accion:"Cambiar_Activo_Solicitud",
									Id_Cirugia: $("#Id_Cirugia").val(),
									Id_Usuario: $("#usuariosesion").val(),
									Id_Solicitud: Id_Solicitud,
									Id_Activo: Id_Activo
									
								},
								dataType: "html",
								beforeSend: function (xhr) {
									
								},
								success: function (data) {
									data = eval("(" + data + ")");
									if(data.totalCount>0){
										if (Id_Solicitud != "") {
											$.ajax({
												type: "POST",
												url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",
												async: true,
												data: {
													Id_Solicitud: Id_Solicitud,
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
														 for (var i=1; i <=3; i++)
														 {
															 var Estatus_Proce="";
															 $("#spanNumsolicitud"+i).text(data.data[0].Id_Solicitud);
															 Estatus_Proce=data.data[0].Estatus_Proceso;
															 if(data.data[0].Asist_Especial=="1"){
																Estatus_Proce+=" (Asistencia Especial)";
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
															 //$("#spanExtension_Tel"+i).text(Extension_Telef);
														 }
														 
														 //Psar valores para dividir el ticket
														 $("#Id_Cirugia").val(data.data[0].Id_Cirugia);
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
														 $("#hddEmpresa_Ext").val(data.data[0].Empresa_Ext);
														 $("#hddNombre_Completo_Ext").val(data.data[0].Nombre_Completo_Ext);
														 $("#hddTelefono_Ext").val(data.data[0].Telefono_Ext);
														 $("#hddCorreo_Ext").val(data.data[0].Correo_Ext);
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
										
										//pasarvalores(Id_Solicitud,Estatus_Proceso,0,0);
										mensajesalerta("Éxito!", "Se ha actualizado el activo correctamente.", "success", "dark");
									}else{
										mensajesalerta("Oh No!", "Ocurrio un error al actualizar el activo.", "error", "dark");
									}
								},
								error: function () {
									mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
								}
							});
						}
					},
					cancel: function () {
						$("#radio_cambio_act_"+Id_Activo).prop("checked", false)
					}
				}
		});
		
	}
	
	
});
	 
	$("#reasignar").click(function () {

		var Id_Solicitud=$.trim($("#Id_Solicitud").val());
		if(Id_Solicitud!=""){
			$("#relacionar_activo").hide();
			mensajesalerta("&Eacute;xito", "El Ticket con el número de folio "+Id_Solicitud+" Sera Dividido.", "success", "dark");
			$("#text_Numsolicitud").html("No. Solicitud Anterior");
			$("#spanStatus1").html("");
			$("#Cancelar_reasig").show();
			$("#reasignar").hide();
						
			$("#hddEst_div_tick").val(1);
			$("#liSolicitudAnterior1").hide();
			bloqueardatosgenerales(false);

			$("#Titulo").prop("readonly",false);
			$("#Descripcion").prop("readonly",false);
			$("#Titulo").prop("disabled",false);
			$("#Descripcion").prop("disabled",false);


		}else{
			mensajesalerta("Informaci&oacute;n", "Ocurrio un error, cierra y habre el Pupup", "", "dark");	
		}
	});
	
	$("#Cancelar_reasig").click(function () {
		$("#hddEst_div_tick").val("");
		if(Id_Solicitud!=""){
			$("#relacionar_activo").show();	
			$("#reasignar").show();
			$("#Cancelar_reasig").hide();
			var Id_Solicitud=$.trim($("#Id_Solicitud").val());
			
			pasarvalores(Id_Solicitud,$("#hddEstatus_Proceso").val(),0,0);
		}else{
			mensajesalerta("Informaci&oacute;n", "Ocurrio un error, cierra y habre el Pupup", "", "dark");	
		}
	});
	
	function cambiaSeccion(idseccion){
	   
	  var $selectcategoria= $('#cmbcategoria').selectize({});	
	  var controlcategorias = $selectcategoria[0].selectize;
	  controlcategorias.clearOptions(); 
		
		var $selectsubcategoria= $('#cmbsubcategoria').selectize({});	
		var controlsubcategorias = $selectsubcategoria[0].selectize;
		controlsubcategorias.clearOptions(); 
	  cargacategoria(idseccion);
	  $("#hddSeccion").val(idseccion);
	   
		
		
		if($("#hddTipo_Gestor").val()=="1"){
			usuarios_empleados(idseccion);
		}else{
			var hddId_Seccion=$("#hddId_Seccion").val();
			if(hddId_Seccion==idseccion){
				$("#divUsuarioReasignar").show();
			}else{
				$("#divUsuarioReasignar").hide();
			}	
		}
		
	}
	
	
	function usuarios_empleados(Id_Seccion){
		$.ajax({
			type: "POST",
			url: "../fachadas/activos/siga_cat_gestores/Siga_cat_gestoresFacade.Class.php",
			data: {
				Id_Area:$("#idareasesion").val(),
				Estatus_Reg:"1",
				Id_Seccion:Id_Seccion,
				accion: 'consultar'
			},
			async: false,
			dataType: "html",
			beforeSend: function (objeto) {
				$("#gifcargandoaltausuarios").show();
			},
			success: function (datos) {
				var json = "";
					json = eval("(" + datos + ")"); //Parsear JSON

					if (json.totalCount > 0) {
						var $selectusuarios= $('#numempleadoresguardo').selectize({});	
						var controlcleanusr = $selectusuarios[0].selectize;
						controlcleanusr.clearOptions(); 
						
						
						for (var i = 0; i < json.totalCount; i++) {
							controlcleanusr.addOption({value: json.data[i].Id_Usuario, text: json.data[i].Nombre_Empleado.trim()});
						}
						
						//var usuarios='';
						//usuarios+='<option></option>';
						//usuarios+='<optgroup label="Usuarios">';
            //
						//for (var i = 0; i < json.totalCount; i++) {
						//	if($("#usuariosesion").val()!=json.data[i].Id_Usuario){
						//		
						//		usuarios+='<option value="'+json.data[i].Id_Usuario.trim()+'">'+json.data[i].Nombre_Empleado.trim()+'</option>';
						//	}
						//}
						//usuarios+='</optgroup>';
						//$('#numempleadoresguardo').html(usuarios);

						$("#gifcargandoaltausuarios").hide();
						$("#divUsuarioReasignar").show();
						$("#asterisco_gestores").show();
						$("#label_gestores").show();
							
						
					}
					else {
						$("#gifcargandoaltausuarios").hide();
						$('#numempleadoresguardo').append($('<option>', { value: "" }).text("Sin resultados"));
					}

			},
			error: function (objeto, quepaso, otroobj) {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
				$('#numempleadoresguardo').append($('<option>', { value: "-1" }).text("Sin resultados"));
			}
		});
	}
	
	
	
	//Al Dar enter sobre la caja de texto del mensaje
	$('#Mensaje').keyup(function(e){
		if(e.keyCode == 13){
			$("#botonEnviar").click();
		}
	});
	
	function cargachat() {
		
		$("#divChat").html("");
	
		var idsolicitud=$.trim($("#Id_Solicitud").val());



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
									//if($("#cmbsubcategoria").val()==4484||$("#cmbsubcategoria").val()==4485||$("#cmbsubcategoria").val()==4486||$("#cmbsubcategoria").val()==6487||$("#cmbsubcategoria").val()==8491||$("#cmbsubcategoria").val()==8492||$("#cmbsubcategoria").val()==8493){
									//	if(resultado.data[i].Iniciar_SLA_Juridico!="1"){
									//		htmlDiv+='	<input type="button" class="btn btn-success btn-xs confirma_sol_gesjur" value="Confirma solicitud firmada para iniciar SLA" onclick="confirm_solic_firm_gesjur()" style="display: inline-block;">';
									//	}
									//}
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
									//if($("#cmbsubcategoria").val()==4484||$("#cmbsubcategoria").val()==4485||$("#cmbsubcategoria").val()==4486||$("#cmbsubcategoria").val()==6487||$("#cmbsubcategoria").val()==8491||$("#cmbsubcategoria").val()==8492||$("#cmbsubcategoria").val()==8493){
									//	if(resultado.data[i].Iniciar_SLA_Juridico!="1"){
									//		htmlDiv+='	<input type="button" class="btn btn-success btn-xs confirma_sol_gesjur" value="Confirma solicitud firmada para iniciar SLA" onclick="confirm_solic_firm_gesjur()" style="display: inline-block;">';
									//	}
									//}
								 }else{
									htmlDiv +=resultado.data[i].Mensaje;	
								 }
								 htmlDiv +='</div>'+
		'                        <!-- /.direct-chat-text -->'+
		'                      </div>';
							}
							
							
							if (resultado.data[i].Id_Estatus_Proceso > 2)
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

/*************************************************
|| Alejandro Arias
|| Se agrego condición solicitada por Mauricio Ramos para mostrar boton Ver Formato de Solicitud Clientes
|| if($("#cmbcategoria").val()==5099) 
**************************************************/

	if($("#cmbcategoria").val()==5099){
			//var formato_link='<a target="_blank" href="http://siga.hospitalsatelite.com:8080/gesjur/vistas/clientes_doc_sol.asp?key='+idsolicitud+'" type="button" class="btn btn-warning btn-xs">Ver Formato de Solicitud Clientes</a>';
			var formato_link='<a target="_blank" href="https://apps2.hospitalsatelite.com/gesjur/vistas/clientes_doc_sol.asp?key='+idsolicitud+'" type="button" class="btn btn-warning btn-xs">Ver Formato de Solicitud Clientes</a>';
			$("#format_solicitud_prov").html(formato_link);
		} else if($("#cmbsubcategoria").val()==8666){
			//var formato_link='<a target="_blank" href="http://siga.hospitalsatelite.com:8080/gesjur/archivos/archivos_contratos_form_estandar/Solicitud Contractual Cliente.pdf" type="button" class="btn btn-warning btn-xs">Solicitud Contractual Cliente</a>';
			var formato_link='<a target="_blank" href="https://apps2.hospitalsatelite.com/gesjur/archivos/archivos_contratos_form_estandar/Solicitud Contractual Cliente.pdf" type="button" class="btn btn-warning btn-xs">Solicitud Contractual Cliente</a>';
				$("#format_solicitud_prov").html(formato_link);
		} else if($("#cmbsubcategoria").val()==8667){
			//var formato_link='<a target="_blank" href="http://siga.hospitalsatelite.com:8080/gesjur/archivos/archivos_contratos_form_estandar/Solicitud Contractual Proveedor.pdf" type="button" class="btn btn-warning btn-xs">Solicitud Contractual Proveedor</a>';
			var formato_link='<a target="_blank" href="https://apps2.hospitalsatelite.com/gesjur/archivos/archivos_contratos_form_estandar/Solicitud Contractual Proveedor.pdf" type="button" class="btn btn-warning btn-xs">Solicitud Contractual Proveedor</a>';
				$("#format_solicitud_prov").html(formato_link);
		} else if($("#cmbsubcategoria").val()==8498){
			//var formato_link='<a target="_blank" href="http://siga.hospitalsatelite.com:8080/gesjur/archivos/archivos_contratos_form_estandar/Solicitud Contractual Proveedor.pdf" type="button" class="btn btn-warning btn-xs">Solicitud Contractual Proveedor</a>';
			var formato_link='<a target="_blank" href="https://apps2.hospitalsatelite.com/gesjur/archivos/archivos_contratos_form_estandar/Solicitud Convenio de Terminacion.pdf" type="button" class="btn btn-warning btn-xs">Solicitud Convenio de Terminación</a>';
				$("#format_solicitud_prov").html(formato_link);
		} else {
				if($("#cmbsubcategoria").val()==4484||$("#cmbsubcategoria").val()==4485||$("#cmbsubcategoria").val()==6487||$("#cmbsubcategoria").val()==8491||$("#cmbsubcategoria").val()==8492||$("#cmbsubcategoria").val()==8493){
				//var formato_link='<a target="_blank" href="http://siga.hospitalsatelite.com:8080/gesjur/vistas/proveedores_doc_sol.asp?key='+idsolicitud+'" type="button" class="btn btn-warning btn-xs">Ver Formato de Solicitud</a>';
				var formato_link='<a target="_blank" href="https://apps2.hospitalsatelite.com/gesjur/vistas/proveedores_doc_sol.asp?key='+idsolicitud+'" type="button" class="btn btn-warning btn-xs">Ver Formato de Solicitud</a>';
					$("#format_solicitud_prov").html(formato_link);
				}else{
					if($("#cmbsubcategoria").val()==8499||$("#cmbsubcategoria").val()==8597||$("#cmbsubcategoria").val()==8497){
						//var formato_link='<a target="_blank" href="http://siga.hospitalsatelite.com:8080/gesjur/archivos/archivos_contratos_form_estandar/Solicitud Contractual.pdf" type="button" class="btn btn-warning btn-xs">Solicitud Contractual</a>';
						var formato_link='<a target="_blank" href="https://apps2.hospitalsatelite.com/gesjur/archivos/archivos_contratos_form_estandar/Solicitud Contractual.pdf" type="button" class="btn btn-warning btn-xs">Solicitud Contractual</a>';
					$("#format_solicitud_prov").html(formato_link);
					}else{
							$("#format_solicitud_prov").html("");		
						}
					}
				}
			
	}
		}else{
			$("#Indicador_Adjuntos").html("");
			$("#Indicador_Adjuntos").hide();
		}
	}
	
	
	confirm_solic_firm_gesjur=function(){
		if($("#Id_Solicitud").val()!=""){
			$.confirm({
				title: 'Confirm!',
				content: 'Esta seguro de que la solicitud esta llena y firmada correctamente, al Aceptar se iniciará el SLA?',
				buttons: {
					confirm: function () {
						$.ajax({
							type: "POST",
							url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
							async: false,
							data: {
								Id_Solicitud:$("#Id_Solicitud").val(),
								Usr_Inser:$("#usuariosesion").val(),
								accion: "confirm_solic_firm_gesjur"
							},
							dataType: "html",
							beforeSend: function (xhr) {
							},
							success: function (datos) {
								var json;
								json = eval("(" + datos + ")"); //Parsear JSON
								
								if (json.totalCount > 0) {
									mensajesalerta("&Eacute;xito", "Actualizado Correctamente.", "success", "dark");
									$(".confirma_sol_gesjur").hide();
								}
							},
							error: function () {
								mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
							}
						});
					},
					cancel: function () {
					}
				}
			});
		}
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
			strDatos += "&Id_UsuarioGestor="+Id_Usuario;
			strDatos += "&Id_Estatus_Proceso=2";
			strDatos += "&Estatus_Reg=1";				
			strDatos += "&accion=guardar";
			//Archivos Adjuntos
			strDatos += "&Url_Adjunto="+url_documentos_adjuntos_chat;
			
			$.ajax({
				type: "POST",
				url: "../fachadas/activos/siga_ticket_chat/Siga_ticket_chatFacade.Class.php",        
				async: false,
				data: {
					Id_Solicitud: Id_Solicitud, 
					Mensaje: Mensaje,
					Id_UsuarioGestor: Id_Usuario,
					Id_Estatus_Proceso: 2,
					Estatus_Reg:1,				
					accion: "guardar",
					Url_Adjunto:url_documentos_adjuntos_chat
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
					validar_si_existe_imagen(Id_Solicitud);
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});
		}
	});
	carga_motivo_aparente();

	function carga_motivo_aparente() {
		var resultado=new Array();
		data={accion: "consultar",Estatus_Reg:"1",Id_Area:$("#idareasesion").val()};
		resultado=cargo_cmb("../fachadas/activos/Siga_cat_motivo_aparente/Siga_cat_motivo_aparenteFacade.Class.php",false, data);
        //$('#cmb_motivo_aparente').empty();
		if(resultado.totalCount>0){
			
			var $selectmotiv_apar= $('#cmb_motivo_aparente').selectize({});	
			var motivo_aparente = $selectmotiv_apar[0].selectize;
			motivo_aparente.clearOptions(); 
						
			//$('#cmb_motivo_aparente').append($('<option selected value="-1">', { value: "-1" }).text("--Motivo Aparente (Reportado)--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{ 			
				//$('#cmb_motivo_aparente').append($('<option>', { value: resultado.data[i].Id_Motivo_Aparente }).text(resultado.data[i].Desc_Motivo_Aparente));
				motivo_aparente.addOption({value: resultado.data[i].Id_Motivo_Aparente, text: resultado.data[i].Desc_Motivo_Aparente.trim()});
			}
		}else{
			//$('#cmb_motivo_aparente').append($('<option selected value="-1">', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	carga_motivo_real();
	function carga_motivo_real() {
		var resultado=new Array();
		data={accion: "consultar",Estatus_Reg:"1",Id_Area:$("#idareasesion").val()};
		resultado=cargo_cmb("../fachadas/activos/Siga_cat_motivo_real/Siga_cat_motivo_realFacade.Class.php",false, data);
        //$('#cmb_motivo_real').empty();
		if(resultado.totalCount>0){
			var $selectmotiv_real= $('#cmb_motivo_real').selectize({});	
			var motivo_real = $selectmotiv_real[0].selectize;
			motivo_real.clearOptions(); 
			
			//$('#cmb_motivo_real').append($('<option selected value="-1">', { value: "-1" }).text("--Motivo Real Encontrado--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{ 			
				motivo_real.addOption({value: resultado.data[i].Id_Motivo_Real, text: resultado.data[i].Desc_Motivo_Real.trim()});
				//$('#cmb_motivo_real').append($('<option>', { value: resultado.data[i].Id_Motivo_Real }).text(resultado.data[i].Desc_Motivo_Real));
			}
		}else{
			//$('#cmb_motivo_real').append($('<option selected value="-1">', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	carga_estatus_equipo();
	function carga_estatus_equipo() {
		var resultado=new Array();
		var Solo_Juridico="";
		if($("#idareasesion").val()=="6"){
			Solo_Juridico=6;
		} else if ($("#idareasesion").val()=="7"){
			Solo_Juridico=7;
		} else if ($("#idareasesion").val()=="8"){
			Solo_Juridico=8;
		} else if ($("#idareasesion").val()=="2"){
			Solo_Juridico=2;
		}
		
		data={
			accion: "consultar",
			Estatus_Reg:"1",
			Solo_Juridico:Solo_Juridico
			//,Id_Area:$("#idareasesion").val()
		};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_estatus/Siga_cat_estatusFacade.Class.php",false, data);
        $('#cmb_estatus_equipo').empty();
		if(resultado.totalCount>0){
			$('#cmb_estatus_equipo').append($('<option selected value="-1">', { value: "-1" }).text("--- Selecciona una opción ---"));
			for(var i = 0; i < resultado.totalCount; i++)
			{ 			
				if(resultado.data[i].Id_Estatus!="12"){
					$('#cmb_estatus_equipo').append($('<option>', { value: resultado.data[i].Id_Estatus }).text(resultado.data[i].Desc_Estatus));
				}
			}
		}else{
			$('#cmb_estatus_equipo').append($('<option selected value="-1">', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	

	$("#botonCerrar").click(function(e){
		var Agregar = true;
		var mensaje_error = "";
		var strDatos="";
		
		var Id_Solicitud=$.trim($("#Id_Solicitud").val());
		//Usuario Sesion
		var Id_Usuario=$("#usuariosesion").val();
		
		//var TituloCierre=$.trim($("#TituloCierre").val());
		var Id_Motivo_Real=$("#cmb_motivo_real").val();
		var Id_Motivo_Aparente=$("#cmb_motivo_aparente").val();
		var Id_Est_Equipo=$("#cmb_estatus_equipo").val();
		var Id_Activo=$.trim($("#hddId_Activo").val());
		var Id_Cirugia=$.trim($("#Id_Cirugia").val());
		var Id_Usuario_Solicitante=$.trim($("#cmb_usuarios_enf").val());		
		
		var ComentarioCierre=$.trim($("#ComentarioCierre").val());
		var ComentarioCierreGestor=$.trim($("#ComentarioCierreGestor").val());
		var Estatus_Proceso = $("#hddEstatus_Proceso").val();
		var validar_url = $("#validar_url").val();
		var Id_Area 		= $("#hddId_Area").val();

		var cmbcategoria_cierre			= $("#cmbcategoria_solicitar_cierre").val();
		var cmbsubcategoria_cierre 	= $("#cmbsubcategoria_solicitar_cierre").val();
		
		if (Estatus_Proceso == 1 || Estatus_Proceso == '') {
			Agregar = false; 
			mensaje_error += " -El ticket debe estar asignado a un gestor para ser cerrado<br />";
			$("#Solucion").focus();
		}
		
		//if (TituloCierre.length <= 0) {
		//	Agregar = false; 
		//	mensaje_error += " -El título de cierre no puede ser vacio<br />";
		//	$("#TituloCierre").focus();
		//}
		
		if (ComentarioCierre.length <= 0) {
			Agregar = false; 
			mensaje_error += " -El comentario de cierre para el usuario no puede ser vacio:<br />";
			$("#ComentarioCierre").focus();
		}
		
		if($("#idareasesion").val()!="1"){
			if (ComentarioCierreGestor.length <= 0) {
				Agregar = false; 
				mensaje_error += " -El comentario de cierre para gestor no puede ser vacio<br />";
				$("#ComentarioCierreGestor").focus();
			}
		}
		
		if(Id_Motivo_Aparente =="") {
			Id_Motivo_Aparente="";
			Agregar = false; 
			mensaje_error += " -Selecciona el Motivo Aparente<br />";
		}
		if(Id_Motivo_Real =="") {
			Id_Motivo_Real="";
			Agregar = false; 
			mensaje_error += " -Selecciona el Motivo Real<br />";
		}
		if(Id_Est_Equipo =="-1") {
			Id_Est_Equipo="";
			Agregar = false; 
			mensaje_error += " -Selecciona el Estatus de la Solicitud<br />";
		}
		
		if(Id_Cirugia!=""){
			
			if($("#hddEstatus_Recepcion").val()==""){
				if($("#hddSeccion").val()=="2"){
					Agregar = false;
					mensaje_error += " -El Ticket no se puede cerrar debido a que no se ha realizado el Preregistro<br />";
				}
			}
		}

	//-------------------------------------------------------------------
	// Alex Arias
	// Válida si existe fotografía
	// 22 junio,2023
	//-------------------------------------------------------------------

		if(Id_Area==1){
				if(validar_url == ''){
					Agregar = false;
					mensaje_error += " -El ticket debe tener asignada una imagen (Chat o Apertura)<br>";
				}
		}
	//-------------------------------------------------------------------

		if($("#idareasesion").val()=="1"){
			if(Id_Usuario_Solicitante==""){
				Id_Usuario_Solicitante="";
				Agregar = false;
			  mensaje_error += " -Selecciona al usuario final<br />";
			}
		}else{
			Id_Usuario_Solicitante="";
		}
		
		
		//Validación Actividades
		///////////////////////////////////////////////////////////////////////////////////////////////////
		var mensaje_error_act="";
		//Iniciamos el contador a -1 para que el indice del arreglo comienze con 0
		var cont=-1;		
		
		//Recorremos el array de actividades  
		for(var i=0;i < array_actividades_M.length; i++){
			if(array_actividades_M[i]=="S"){
				//Se comienza el contador desde 0
				cont=cont+(1);
				var Estatus=0;
				
				var Array_por_actividad= new Array();
				var Id_Det_Actividad="";	Id_Det_Actividad=$.trim($("#Id_Det_Actividad"+i).val());
				var Valor_Medido=""; 			Valor_Medido=$.trim($("#Valor_Medido"+i).val());
				var Estatus_Actividad=0;	//Tomamos el radio checkeado
				var vincular_mesa_ayuda_det=0;//Tomamos el valor del chechbox
				var observaciones=""; 		observaciones=$.trim($("#observaciones"+i).val());
				var upload_adjuntos="";		upload_adjuntos=$.trim($("#url_det_adjuntos"+i).val());
				var fecha_realizada="";		fecha_realizada=$.trim($("#fecha_realizada"+i).val());
				
					
				if (Valor_Medido.length<= 0) {
					Agregar = false; 
					mensaje_error_act += " -Agrega el Valor Medido (Columna "+(cont+1)+")<br />";
					Estatus=1;
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
				
				if(Estatus_Actividad==0){
					Agregar = false; 
					mensaje_error_act += " -Elige un Estatus de la Actividad (Columna "+(cont+1)+")<br />";
				}
				
				if (fecha_realizada.length<= 0) {
					Agregar = false; 
					mensaje_error_act += " -Agrega la fecha realizada (Columna "+(cont+1)+")<br />";
					Estatus=1;
				}
				
				if (Estatus==1) {
					mensaje_error_act += "<br/>";
				}
			}
		}
		////////////////////////////////////////////////////////////////////////////
		//Fin Validación Actividades
		
		if (!Agregar) {
			if(mensaje_error_act!=""){
				mensaje_error_act="-Debe concluir las actividades del mantenimiento.<br>";
			
				$("#tab_ver_actividades").click();
			}
			
			mensajesalerta("Informaci&oacute;n", mensaje_error_act+mensaje_error, "", "dark");
		}
		
		if(Agregar)
		{
			var Id_Solicitud_Correo=Id_Solicitud;
		
			strDatos = "Id_Solicitud="+Id_Solicitud; 
			//strDatos += "&TituloCierre="+TituloCierre;
			strDatos += "&ComentarioCierre="+ComentarioCierre;
			strDatos += "&ComentarioCierreGestor="+ComentarioCierreGestor;
			strDatos += "&Id_UsuarioGestor="+Id_Usuario;
			strDatos += "&Usr_Mod="+Id_Usuario;
			strDatos += "&Id_Motivo_Aparente="+Id_Motivo_Aparente;
			strDatos += "&Id_Motivo_Real="+Id_Motivo_Real;
			strDatos += "&Id_Est_Equipo="+Id_Est_Equipo;
			strDatos += "&Id_Usuario="+Id_Usuario_Solicitante;
			strDatos += "&Estatus_Proceso=3";
			strDatos += "&Estatus_Reg=2";			
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
					$("#TituloCierre").val('');
					$("#ComentarioCierre").val('');
					$("#ComentarioCierreGestor").val('');
					mensajesalerta("&Eacute;xito", "Generado Correctamente.", "success", "dark");
					$("#tabSeguimiento").click();
					$("#tabPorcerrar").click();
					$('#tablaSeguimiento').DataTable().ajax.reload();
					$('#tablaPorCerrar').DataTable().ajax.reload();					
					$('#tablaCierre').DataTable().ajax.reload();							
					//$('#myModal').modal('hide');
					//$('#display_seguimiento').DataTable().ajax.reload();
					$("#closeModal").click();
					

					//Se actualiza el estatud del activo, si la solicitud esta ligado a un activo
					if(Id_Activo!=""){
						$.ajax({
							type: "POST",
							url: "../fachadas/activos/siga_activos/Siga_activosFacade.Class.php",        
							async: false,
							data: {
								Id_Activo:Id_Activo,
								Id_Situacion_Activo:Id_Est_Equipo,
								accion:"guardar"
							},
							dataType: "html",
							beforeSend: function (xhr) {
						
							},
							success: function (datos) {
								limpiarcampos();

								if(Id_Area == 1){									
									sigaActualizarCatSub(Id_Solicitud,cmbcategoria_cierre,cmbsubcategoria_cierre);
								}

							},
							error: function () {
								mensajesalerta("Oh No!", "Ocurrio un error al Actualizar el estatus del activo en el inventario.", "error", "dark");
							}
						});
					}
					//Fin se Actualiza
				},
				error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
				}
			});


//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			
	}
});
		
	$("#numempleadoresguardo").change(function() {
		$("#nombreempleadoresguardo").val("");
		if(this.value!=""){
			var valor = $("#numempleadoresguardo option:selected").html();
			var res = valor.split("-");
			
			$("#nombreempleadoresguardo").val(res[1]);
		}
	});
	
	/////////////////////////////////////////////////////////////////////////////////////////
	///Actividades que se ligan a la mesa de ayuda
	/////////////////////////////////////////////////////////////////////////////////////////
	
	//Variables
	var cont_array_actividades_M=0;
	var array_actividades_M=[];
	//array_actividades_M[0]="S";
	
	var url_direccion_archivos="";
	
	function sigaActualizarCatSub(Id_Solicitud,categoria_cierre,subcategoria_cierre){

		$.ajax({
					type: "POST",
					url: "../poo/mistickets-gestor/ajax_update_categoria_subcategoria_area.php",
					dataType: "JSON",
					cache: false,
					data: {id_solicitud_update: Id_Solicitud,
								id_categoria_update:categoria_cierre,
								id_subcategoria_update:subcategoria_cierre},			
					success: function (response) {
						//console.log(response);
					},
					error:function(response){
						//console.log(response);
					}
				});
	
	}

	carga_actividades=function(id) {
		url_direccion_archivos="";
	
		$("#Id_Actividad").val("");
    cont_array_actividades_M=0;
		array_actividades_M=[];
		//array_actividades_M[0]="S";
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
			//Pasamos el Id de la Actividad a la caja de texto
			$("#Id_Actividad").val(id);
			
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
							contenido+=				data.data_det[i].Nombre_Actividad.trim();
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group" style="font-size:11px">';
							contenido+=		data.data_det[i].Valor_Referencia;
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group">';
							contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Valor_Medido'+i+'" style="font-size: 11px;">'+data.data_det[i].Valor_Medido+'</textarea>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							contenido+='  	<input type="radio" id="radio_ok'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="1"){contenido+=' checked ';cont_est_act=cont_est_act+1;}contenido+='>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							contenido+='  	<input type="radio" id="radio_fallo'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="2"){contenido+=' checked ';cont_est_act=cont_est_act+1;}contenido+='>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							contenido+='  	<input type="radio" id="radio_no_aplica'+i+'" name="groupradioactividad'+i+'"'; if(data.data_det[i].Estatus_Actividad=="3"){contenido+=' checked ';cont_est_act=cont_est_act+1;}contenido+='>';
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
							contenido+='      <textarea rows="2" class="form-control" placeholder="(200 caracteres)" id="observaciones'+i+'" style="font-size: 10px;">'+data.data_det[i].Observaciones+'</textarea>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='   <div class="form-group" align="center">';
							contenido+='      <div id="div_input_dymanic'+i+'"><input name="imagenes[]" type="file" multiple="multiple" class="file-loading" id="upload_adjuntos'+i+'"></div>';
							contenido+='      <input type="hidden"  id="url_det_adjuntos'+i+'">';
							contenido+='      <div id="divVer_Imagen'+i+'">';
							if(data.data_det[i].Url_Adjunto!=null && data.data_det[i].Url_Adjunto!=""){
								contenido+='<a href="'+url_direccion_archivos+'/'+data.data_det[i].Url_Adjunto+'" target="_blank">Ver Im&aacute;gen</a>';
							}
							contenido+='	  </div>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='<td style="font-size:11px">';
							contenido+='	<input type="hidden" id="fecha_programada'+i+'" value="'+Fecha_Prog+'">';
							contenido+=		Fecha_Prog;
							contenido+='</td>';
							contenido+='<td>';
							contenido+='  <div class="input-group date">';
							//contenido+='	<div class="input-group-addon">';
							//contenido+='	  <i class="fa fa-calendar"></i>';
							//contenido+='	</div>';
							contenido+='	<input type="text" class="form-control pull-right datepicker" onclick="Cambio_Fecha_Reali_Array('+i+', '+data.totalCountDetalle+')" id="fecha_realizada'+i+'" style="font-size: 11px;" value="'+Fecha_Real+'">';
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
						
							//Fecha
							var nowTemp = new Date();
							var fec_sin_formato=moment(data.data_det[k].Fecha_Programada).format('YYYYMMDD');							
							
							//De acuerdo al formato de datepicker se le resta un mes a la fecha programada
							fec_sin_formato=moment(fec_sin_formato).add(-1, 'month').format('YYYYMMDD');
							
							
						var FechProg_Date= new Date (fec_sin_formato.substring(0, 4), fec_sin_formato.substring(4, 6), fec_sin_formato.substring(6, 8), 0, 0, 0, 0);
							$('#fecha_realizada'+k).datepicker({
								format: 'dd/mm/yyyy',
								startDate: FechProg_Date,
								onRender: function(date) {
									return date.valueOf() < FechProg_Date.valueOf() ? 'disabled' : '';
								}
							});
							//Fecha
						}					
						
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
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///Fin Actividades que se ligan a la mesa de ayuda
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	carga_actividades_rutinas=function(id,Fech_Solicitud) {
						
		url_direccion_archivos="";
		// $("#Id_Actividad").val("");
    // cont_array_actividades_M=0;
		// array_actividades_M=[];
		//array_actividades_M[0]="S";
		// $("#datos_actividades").html("");
		// $("#Muestro_Agregados").html("");

		if (id != "") {

			$("#Id_Actividad").val(id);
			var cont_est_act=0;
			
			$.ajax({
				type: "POST",
				url: "/siga/class/biomedica/mtoPreventivo/mtoPreventivo.ajax.php",
				data: {accion : 1, id:id, Fech_Solicitud:Fech_Solicitud},
				dataType: "JSON",
				cache: false,
				beforeSend :function (){
					$('#loadingState').show();
				},
				success: function (response) {
					$('#loadingState').hide();					
					$("#Muestro_Agregados_rutinas").html(response);
					$('#act_id_operacion').val(id);
					$('#act_fch_operacion').val(Fech_Solicitud);
				},
				error:function(response){
					$('#loadingState').hide();
					console.log(response);
				}
			});
			
            $.ajax({
                type: "POST",
                url: "../fachadas/activos/siga_actividades/Siga_actividadesFacade.Class.php",
                async: false,
                data: {
										Estatus_Reg:"1",
                    Id_Actividad: id,
										Fecha_Det_Programada: Fech_Solicitud,
                    accion: "consultar_actividades"
                },
                dataType: "html",
                beforeSend: function (xhr) {
									//$('#loadingState').show();
                },
                success: function (data) {
									//$('#loadingState').hide();

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
							contenido+='    <div class="form-group" align="center" >';
							contenido+='      <input type="hidden" id="Id_Det_Actividad'+i+'" value="'+data.data_det[i].Id_Det_Actividad+'">';
							contenido+=       data.data_det[i].Num_Actividad.trim();
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group" style="font-size:11px">';
							contenido+=				data.data_det[i].Nombre_Actividad.trim();
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group" style="font-size:11px">';
							contenido+=				data.data_det[i].Valor_Referencia;
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='    <div class="form-group">';
							contenido+='      <textarea rows="2" class="form-control" placeholder="" id="Valor_Medido'+i+'" style="font-size: 11px;">'+data.data_det[i].Valor_Medido+'</textarea>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td align="center">';
							contenido+='  	<select class="form-control" name="act_estatus" id="act_estatus"><option value="1">Correcto</option><option value="2">Fallo</option><option value="3">N/A</option></select>';
							contenido+='  </td>';							
							contenido+='  <td>';
							contenido+='    <div class="form-group">';
							contenido+='      <textarea rows="2" class="form-control" placeholder="(200 caracteres)" id="observaciones'+i+'" style="font-size: 10px;">'+data.data_det[i].Observaciones+'</textarea>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='  <td>';
							contenido+='   <div class="form-group" align="center">';
							contenido+='      <div id="div_input_dymanic'+i+'"><input name="imagenes[]" type="file" multiple="multiple" class="file-loading" id="upload_adjuntos'+i+'"></div>';
							contenido+='      <input type="hidden"  id="url_det_adjuntos'+i+'">';
							contenido+='      <div id="divVer_Imagen'+i+'">';
							if(data.data_det[i].Url_Adjunto!=null && data.data_det[i].Url_Adjunto!=""){
								contenido+='<a href="'+url_direccion_archivos+'/'+data.data_det[i].Url_Adjunto+'" target="_blank">Ver Im&aacute;gen</a>';
							}
							contenido+='	  </div>';
							contenido+='    </div>';
							contenido+='  </td>';
							contenido+='<td style="font-size:11px">';
							contenido+='	<input type="hidden" id="fecha_programada'+i+'" value="'+Fecha_Prog+'">';
							contenido+=		Fecha_Prog;
							contenido+='</td>';
							contenido+='<td>';
							contenido+='  <div class="input-group date">';
							contenido+='	<input type="text" class="form-control pull-right datepicker" onclick="Cambio_Fecha_Reali_Array('+i+', '+data.totalCountDetalle+')" id="fecha_realizada'+i+'" style="font-size: 11px;" value="'+Fecha_Real+'">';
							contenido+='  </div>';
							contenido+='</td>';
							contenido+='	<div class="input-group-addon">';
							contenido+='	  <i class="fa fa-check" aria-hidden="true"></i>';
							contenido+='	</div>';
							contenido+='</tr>';
						}
						
						//$("#Muestro_Agregados_rutinas").html(contenido);						
						
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
						
							//Fecha
							var nowTemp = new Date();
							var fec_sin_formato=moment(data.data_det[k].Fecha_Programada).format('YYYYMMDD');							
							
							//De acuerdo al formato de datepicker se le resta un mes a la fecha programada
							fec_sin_formato=moment(fec_sin_formato).add(-1, 'month').format('YYYYMMDD');
							
							
						var FechProg_Date= new Date (fec_sin_formato.substring(0, 4), fec_sin_formato.substring(4, 6), fec_sin_formato.substring(6, 8), 0, 0, 0, 0);
							$('#fecha_realizada'+k).datepicker({
								format: 'dd/mm/yyyy',
								startDate: FechProg_Date,
								onRender: function(date) {
									return date.valueOf() < FechProg_Date.valueOf() ? 'disabled' : '';
								}
							});
							//Fecha
						}					
						
						//pasar valores datos de la actividad
						var Datos_Actividades='';
						Datos_Actividades+='';
						Datos_Actividades+=' <span><strong>Nombre Rutina: </strong></span> <span style="color: #666;font-weight: normal;" >'+data.data[0].Nombre_Rutina+'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						Datos_Actividades+=' <span><strong>Descripción Corta: </strong></span> <span style="color: #666;font-weight: normal;">'+data.data[0].Descripcion+'</span>';
						Datos_Actividades+='';
						Datos_Actividades+=' <span style="color:red"><b>&nbsp;&nbsp;Los campos en color rojo son obligatorios</b></span>';
						Datos_Actividades+='';
						

						$("#datos_actividades").html(Datos_Actividades);
						
						//Pasar valores costos
						// $("#Mant_RAC1").val(data.data[0].Mant_RAC1);
						// $("#Mant_RAC2").val(data.data[0].Mant_RAC2);
						// $("#Mant_RAC3").val(data.data[0].Mant_RAC3);
						// $("#Mant_RAC4").val(data.data[0].Mant_RAC4);
						// $("#Horas").val(data.data[0].Horas);
						// $("#Costos_Materiales_CE").val(data.data[0].Costos_Materiales_CE);
						// $("#Mano_Obra_CE").val(data.data[0].Mano_Obra_CE);
						// $("#Total_CE").val(data.data[0].Total_CE);
						// $("#Costos_Materiales_CI").val(data.data[0].Costos_Materiales_CI);
						// $("#Mano_Obra_CI").val(data.data[0].Mano_Obra_CI);
						// $("#Total_CI").val(data.data[0].Total_CI);
						// $("#Ahorro").val(data.data[0].Ahorro);
					}
                },
                error: function () {
					mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
                }
            });
        }
    }
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
	//Funcion Agregar Fecha en automatico (Fecha realizada)
	function Cambio_Fecha_Reali_Array(Indice, Total){
		//Al dar click sobre el calendario se crea el evento
		$("#fecha_realizada"+Indice).on("changeDate", function (e) {
			var Fecha_Realizada_Select=$("#fecha_realizada"+Indice).val();
			var Fecha_Programada_Select=$("#fecha_programada"+Indice).val();
			if(Fecha_Realizada_Select!=""){
				var fec_realizada_sin_formato=Fecha_Realizada_Select.substring(6, 10)+Fecha_Realizada_Select.substring(3, 5)+Fecha_Realizada_Select.substring(0, 2);
				var fec_program_sin_formato=Fecha_Programada_Select.substring(6, 10)+Fecha_Programada_Select.substring(3, 5)+Fecha_Programada_Select.substring(0, 2);
				if(parseInt(fec_realizada_sin_formato)<parseInt(fec_program_sin_formato)){
					$("#fecha_realizada"+Indice).val("");
				}
			}
			
			/*Como se generan varios eventos del mismo al dar click, se creo un contador que incrementa a uno 
			solo cuando se da click sobre un dia en el calendario
			*/
			switch_fech_prog=switch_fech_prog+1;
			
			if((Total>0)&&(Indice<Total)){
				if(switch_fech_prog==1){
					if($("#fecha_realizada"+Indice).val()!=""){
						$.confirm({
							title: 'Confirm!',
							content: 'Cambiar Fecha Solo a este campo CAMBIAR<br> Cambiar fecha de aqui en adelante TODOS',
							buttons: {
								cambiar: function () {
								},
								todos: function () {
									for(var i=Indice;i < (Total+1); i++){
										$("#fecha_realizada"+i).val(Fecha_Realizada_Select);
									}
								}
							}
						});
					}
				}
			}
		});
		//Se comienza nuevamente con el objetivo de que no muestra varias alertas de confirmacion
		switch_fech_prog=0;
	}
	
	guardar_actividades=function(){
		var Agregar = true;  
		var mensaje_error="";
		
		var Id_Actividad=$("#Id_Actividad").val();
		
		//Usuario Logueado
		var Id_Usuario=$("#usuariosesion").val();
		
		//Mant. Predictivo=1, Mant. Preventivo=2, Mant. Correctivo=3, Capacitacion=4 
		var Tipo_Actividad=2;
			
		///////////////////////////////////////////////////////////////////////////////////////////////////
		//Valores Tabla Dinamica
		Array_general= new Array();
		//Iniciamos el contador a -1 para que el indice del arreglo comienze con 0
		var cont=-1;
		
		var estatus_seleccionado=false;
		var estatus_fecha_realizada=false;
		//Recorremos el array de actividades  
		for(var i=0;i < array_actividades_M.length; i++){
			if(array_actividades_M[i]=="S"){
				//Se comienza el contador desde 0
				cont=cont+(1);
				var Estatus=0;
				
				var Array_por_actividad= new Array();
				var Id_Det_Actividad="";	Id_Det_Actividad=$.trim($("#Id_Det_Actividad"+i).val());
				var Valor_Medido=""; 		Valor_Medido=$.trim($("#Valor_Medido"+i).val());
				var Estatus_Actividad=0;	//Tomamos el radio checkeado
				var vincular_mesa_ayuda_det=0;//Tomamos el valor del chechbox
				var observaciones="";		observaciones=$.trim($("#observaciones"+i).val());
				var upload_adjuntos="";		upload_adjuntos=$.trim($("#url_det_adjuntos"+i).val());
				var fecha_realizada="";		fecha_realizada=$.trim($("#fecha_realizada"+i).val());
				
				
				if($("#radio_ok"+i).prop('checked')){
					Estatus_Actividad=1;
				}
				if($("#radio_fallo"+i).prop('checked')){
					Estatus_Actividad=2;
				}
				if($("#radio_no_aplica"+i).prop('checked')){
					Estatus_Actividad=3;
				}
				
				
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
				
				//Si no esta seleciconado el estatus y la fecha programada, los campos se van vacios
				if(Estatus_Actividad==0&&fecha_realizada.length==0){
					Estatus_Actividad="";
					fecha_realizada="";
				}
				
				
				Array_por_actividad[0]=Valor_Medido;
				Array_por_actividad[1]=Estatus_Actividad;
				Array_por_actividad[2]=observaciones;
				Array_por_actividad[3]=upload_adjuntos;
				Array_por_actividad[4]=fecha_realizada;
				Array_por_actividad[5]=Id_Det_Actividad;
				Array_general[cont]=Array_por_actividad;
			}
		}
		if(estatus_seleccionado==false&&estatus_fecha_realizada==false){
			Agregar = false; 
			mensaje_error += " -Debes realizar almenos una actividad.<br />";	
		}
		////////////////////////////////////////////////////////////////////////////
		//////Costos
		var Mant_RAC1=$.trim($("#Mant_RAC1").val());
		var Mant_RAC2=$.trim($("#Mant_RAC2").val());
		var Mant_RAC3=$.trim($("#Mant_RAC3").val());
		var Mant_RAC4=$.trim($("#Mant_RAC4").val());
		var Horas=$.trim($("#Horas").val());
		var Costos_Materiales_CE=$.trim($("#Costos_Materiales_CE").val());
		var Mano_Obra_CE=$.trim($("#Mano_Obra_CE").val());
		var Total_CE=$.trim($("#Total_CE").val());
		var Costos_Materiales_CI=$.trim($("#Costos_Materiales_CI").val());
		var Mano_Obra_CI=$.trim($("#Mano_Obra_CI").val());
		var Total_CI=$.trim($("#Total_CI").val());
		var Ahorro=$.trim($("#Ahorro").val());
		////////////////////////////////////////////////////////
		
		if (!Agregar){
			mensajesalerta("Informaci&oacute;n", mensaje_error, "info", "dark");			
		}
		
		
		
		if(Agregar){
			var strDatos="";
				strDatos={
					Id_Actividad:Id_Actividad,
					Tipo_Actividad:Tipo_Actividad,
					Array_det_actividades:Array_general,
					//
					Usr_Mod:Id_Usuario,
					Estatus_Reg:"2",
					//
					Mant_RAC1:Mant_RAC1,
					Mant_RAC2:Mant_RAC2,
					Mant_RAC3:Mant_RAC3,
					Mant_RAC4:Mant_RAC4,
					Horas:Horas,
					Costos_Materiales_CE:Costos_Materiales_CE,
					Mano_Obra_CE:Mano_Obra_CE,
					Total_CE:Total_CE,
					Costos_Materiales_CI:Costos_Materiales_CI,
					Mano_Obra_CI:Mano_Obra_CI,
					Total_CI:Total_CI,
					Ahorro:Ahorro,
					//
					accion:"update_actividades_mesa"
				};
				
			
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
						mensajesalerta("&Eacute;xito", "Se han guardado los datos correctamente", "success", "dark");
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
	////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////Funciones cambiar de area////////////////////////////////////////////////////////
	function CierraPopup() {
		//$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
		//$('.modal-backdrop').remove();//eliminamos el backdrop del modal
		
		//if ($('.modal-backdrop').is(':visible')) {
		  
		  //$('body').removeClass('modal-open'); 
		  $('.modal-backdrop').remove(); 
		  $("#Modal_Cambiar_Area").hide();//ocultamos el modal
		
		//};
	}
	
	function abrir_modal_cambiar_area(){
		
		$("#Modal_Cambiar_Area").modal("show");
		$("#Modal_Cambiar_Area").show();
		$("#divSeccion_cambia_area").html("");
		$("#cmb_area_cambio").val($("#idareasesion").val());
		if($.trim($("#idareasesion").val())!=""){
			if($("#cmb_area_cambio").val()!="-1"){
				carga_secciones_cambiaarea($("#cmb_area_cambio").val());
			}
		}
		$("#hddSeccion_cmb_area").val("");
		//$("#Modal_Cambiar_Area").dialog();
		//$("#Modal_Cambiar_Area").dialog({modal: true, height: 590, width: 1005 });
	}
	
	carga_areas_cambiar();
	ticket_url();
	function ticket_url(){
		
		if($("#hidd_url_id_solicitud").val()!=""){
			//alert($("#hidd_url_est_proceso").val());
			$("#seguimientoTickets").modal("show");
			pasarvalores($("#hidd_url_id_solicitud").val(), $("#hidd_url_est_proceso").val(),0,4);
			
			
			//Se limpian sesiones y se borran los hidden	
			var resultado=new Array();
			data={accion: "romper_sesion"};
			resultado=cargo_cmb("../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php",true, data);
			//$("#hidd_url_id_area").val("");
			//$("#hidd_url_est_proceso").val("");
			//$("#hidd_url_sistema").val("");
			$("#hidd_url_id_solicitud").val("");
			//$("#hidd_url_id_seccion").val("");
			
		}
	}
	
	function carga_areas_cambiar() {
		var resultado=new Array();
		data={accion: "consultar",Estatus_Reg:"1"};
		resultado=cargo_cmb("../fachadas/activos/Siga_catareas/Siga_catareasFacade.Class.php",false, data);
        $('#cmb_area_cambio').empty();
		if(resultado.totalCount>0){
			$('#cmb_area_cambio').append($('<option selected value="-1">', { value: "-1" }).text("--Selecciona un Area--"));
			for(var i = 0; i < resultado.totalCount; i++)
			{ 	
				if(resultado.data[i].Id_Area!=5)
				$('#cmb_area_cambio').append($('<option>', { value: resultado.data[i].Id_Area }).text(resultado.data[i].Nom_Area));
			}
		}else{
			$('#cmb_area_cambio').append($('<option selected value="-1">', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$("#cmb_area_cambio").change(function (event){
		$("#hddSeccion_cmb_area").val("");
		
		if ($("#cmb_area_cambio").val() != -1)
			carga_secciones_cambiaarea($("#cmb_area_cambio").val());
	    
	});
	
	function carga_secciones_cambiaarea(idarea) {
		var resultado=new Array();
		data={accion: "consultar",Id_Area:idarea};
		resultado=cargo_cmb("../fachadas/activos/siga_cat_ticket_seccion/Siga_cat_ticket_seccionFacade.Class.php",false, data);

		var htmlDiv = '<li><strong><font color="red">*</font>Sección</strong></li>';
					
		for(var i = 0; i < resultado.totalCount; i++)
		{
								
          htmlDiv +=
'          <li>'+
'            <div class="form-group">'+
'              <div class="checkbox icheck">'+
'                <label>'+
'                  <input type="radio" value="'+resultado.data[i].Id_Seccion+'" onChange="javascript:Seccion_cambio_area('+resultado.data[i].Id_Seccion+')" name="rd_seccion_cambio">'+resultado.data[i].Desc_Seccion+
'                </label>'+
'              </div>'+
'            </div>'+
'          </li>';                     
		}
          
		htmlDiv +='<li></li>';
		
        htmlDiv +='</ul>';
		
		$("#divSeccion_cambia_area").html(htmlDiv);	
	}
	
	function Seccion_cambio_area(Id_Seccion){
		$("#hddSeccion_cmb_area").val(Id_Seccion);
	}
	
	$("#btn_cambiar_area").click(function () {
		var Agregar = true;
		var mensaje_error = "";
		var strDatos="";
		var Id_Area_Cambio=$("#cmb_area_cambio").val();
		var Seccion_Cambio=$("#hddSeccion_cmb_area").val();
		var Id_Usuario=$("#usuariosesion").val();
		var Id_Solicitud=$.trim($("#Id_Solicitud").val());
		if (Id_Area_Cambio == -1) {
			Agregar = false; 
			mensaje_error += " -Elige un Área<br />";
		}
		
		if (Seccion_Cambio.length<=0) {
			Agregar = false; 
			mensaje_error += " -Selecciona una Sección<br />";
		}
		
		if (!Agregar) {
			mensajesalerta("Informaci&oacute;n", mensaje_error, "", "dark");			
		}
		
		
		if(Agregar){
			strDatos += "&Id_Area="+Id_Area_Cambio;
			strDatos += "&Seccion="+Seccion_Cambio;
			strDatos += "&Usr_Mod="+Id_Usuario;
			strDatos += "&Id_Solicitud="+Id_Solicitud;
			strDatos += "&accion=Cambiar_Area";
		
		
			$.confirm({
				title: 'Confirm!',
				content: 'Deseas cambiar de Área este Ticket!',
				buttons: {
					confirm: function () {
						$.ajax({
							type: "POST",
							url: "../fachadas/activos/siga_solicitud_tickets/Siga_solicitud_ticketsFacade.Class.php",        
							async: false,
							data: strDatos,
							dataType: "html",
							beforeSend: function (xhr) {
								jsShowWindowLoad("Guardando Información");
							},
							success: function (data) {
								data = eval("(" + data + ")");
								if(data.totalCount>0){
									$('.modal-backdrop').remove(); 
									$("#Modal_Cambiar_Area").hide();//ocultamos el modal
									$("#seguimientoTickets").modal("hide");
									cargar_tablas();
									mensajesalerta("Éxito!", "El ticket con el número de folio "+Id_Solicitud+", se ha cambiado de área correctamente.", "success", "dark");
								}else{
									mensajesalerta("Oh No!", "Ocurrio un error al cambiar de área.", "error", "dark");
								}
							},
							error: function () {
								mensajesalerta("Oh No!", "Ocurrio un error al guardar.", "error", "dark");
							},
							complete : function(xhr, status) {
								jsRemoveWindowLoad();
							}
						});
					},
					cancel: function () {
					}
				}
			});
		}
		
		
	});
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	///////Agregar Accesorios
	$("#Agregar_Accesorios").click(function(){
		var clonarfila= "";
		clonarfila='<tr id="tr_acc_act_ext_'+numfila+'">';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		//clonarfila+='				<span><font color="red">*</font></span>';
		clonarfila+='				<input type="hidden" class="form-control revision_check_list_act_ext" id="hdd_id_accesorio_'+numfila+'" placeholder="Nombre" >';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Acc_Nombre_Ext_'+numfila+'" placeholder="Nombre" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		//clonarfila+='				<label class="control-label" style="font-size: 11px;">Marca</label>';
		clonarfila+='				<input type="text" class="form-control input-number revision_check_list_act_ext" id="Acc_Cantidad_Ext_'+numfila+'" placeholder="Cantidad" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		//clonarfila+='				<label class="control-label" style="font-size: 11px;">Marca</label>';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Acc_Marca_Ext_'+numfila+'" placeholder="Marca" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		//clonarfila+='				<label class="control-label" style="font-size: 11px;">Modelo</label>';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Acc_Modelo_Ext_'+numfila+'" placeholder="Modelo" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		//clonarfila+='				<label class="control-label" style="font-size: 11px;">No Serie</label>';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_ext" id="Acc_SerieExt_'+numfila+'" placeholder="No. Serie" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		//clonarfila+='				<label class="control-label" style="font-size: 11px;">Eliminar</label>';
		clonarfila+='				<button type="button" name="eliminarfila[]" id="eliminarfila" class="btn btn-danger eliminalinea" onclick="elimina_acc_ext('+numfila+')">Eliminar</button>';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='</tr>';
		numfila=numfila+1;
		
		
		
		//var eliminar = document.getElementsByClassName("revision_check_list_act_ext");

		//if(eliminar.length==0){
			//$("#tbl_accesorios_act_ext tbody").append(copia);
		//}else{
			$("#tbl_accesorios_act_ext tbody").append(clonarfila);
			$('.input-number').on('input', function () { 
					this.value = this.value.replace(/[^0-9]/g,'');
			});
		//}
		
		//var mat_utilizar = document.getElementsByClassName("fec_mat_label");
		
		//Limpiamos el campo fecha de inicia
		//mat_utilizar[(mat_utilizar.length-1)].value="";
		
		var revision_check_list_act_ext = document.getElementsByClassName("revision_check_list_act_ext");
		//Limpiamos los campos
		revision_check_list_act_ext[(revision_check_list_act_ext.length-1)].value="";
		
	});
	
	function elimina_acc_ext(num_fila){
		var id_eliminado=$("#hdd_id_accesorio_"+num_fila).val();
		$("#tr_acc_act_ext_"+num_fila).closest('tr').remove();
		if(id_eliminado!=""){
			array_eliminados_act_ext[cont_eliminados_act_ext]=id_eliminado;
			cont_eliminados_act_ext=cont_eliminados_act_ext+1;
		}
	}
	
	$("#Agregar_Accesorios_Preregistro").click(function(){
		var clonarfila= "";
		clonarfila='<tr id="tr_acc_act_pre_'+numfila+'">';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		//clonarfila+='				<span><font color="red">*</font></span>';
		clonarfila+='				<input type="hidden" class="form-control revision_check_list_act_pre" id="hdd_id_accesorio_pre_'+numfila+'" placeholder="Nombre" >';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" id="Acc_Nombre_Pre_'+numfila+'" placeholder="Nombre" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		//clonarfila+='				<label class="control-label" style="font-size: 11px;">Marca</label>';
		clonarfila+='				<input type="text" class="form-control input-number revision_check_list_act_pre" id="Acc_Cantidad_Pre_'+numfila+'" placeholder="Cantidad" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		//clonarfila+='				<label class="control-label" style="font-size: 11px;">Marca</label>';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" id="Acc_Marca_Pre_'+numfila+'" placeholder="Marca" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		//clonarfila+='				<label class="control-label" style="font-size: 11px;">Modelo</label>';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" id="Acc_Modelo_Pre_'+numfila+'" placeholder="Modelo" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		//clonarfila+='				<label class="control-label" style="font-size: 11px;">No Serie</label>';
		clonarfila+='				<input type="text" class="form-control revision_check_list_act_pre" id="Acc_SeriePre_'+numfila+'" placeholder="No. Serie" >';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='	<td>';
		clonarfila+='		<div class="col-md-12">';
		clonarfila+='			<div class="form-group">';
		//clonarfila+='				<label class="control-label" style="font-size: 11px;">Eliminar</label>';
		clonarfila+='				<button type="button" class="btn btn-danger eliminalinea_pre" onclick="elimina_acc_pre('+numfila+')">Eliminar</button>';
		clonarfila+='			</div>';
		clonarfila+='		</div>';
		clonarfila+='	</td>';
		clonarfila+='</tr>';
		numfila=numfila+1;
		
		
		
		//var eliminar = document.getElementsByClassName("revision_check_list_act_pre");

		//if(eliminar.length==0){
			//$("#tbl_accesorios_act_ext tbody").append(copia);
		//}else{
			$("#tbl_accesorios_act_pre tbody").append(clonarfila);
			$('.input-number').on('input', function () { 
				this.value = this.value.replace(/[^0-9]/g,'');
			});
		//}
		
		//var mat_utilizar = document.getElementsByClassName("fec_mat_label");
		
		//Limpiamos el campo fecha de inicia
		//mat_utilizar[(mat_utilizar.length-1)].value="";
		
		var revision_check_list_act_pre = document.getElementsByClassName("revision_check_list_act_pre");
		//Limpiamos los campos
		revision_check_list_act_pre[(revision_check_list_act_pre.length-1)].value="";
		
	});
	
	
	function elimina_acc_pre(num_fila){
		var id_eliminado=$("#hdd_id_accesorio_pre_"+num_fila).val();
		$("#tr_acc_act_pre_"+num_fila).closest('tr').remove();
		if(id_eliminado!=""){
			array_eliminados_act_ext[cont_eliminados_act_ext]=id_eliminado;
			cont_eliminados_act_ext=cont_eliminados_act_ext+1;
		}
	}
	
	function sigaValidarActividades(id, valida1, valida2, descripcion){		

		let act_valor_medido 	= $('#act_valor_medido_'+id).val();		
		let act_estatus 			= $("input[name="+"act_estatus_"+id+"]:checked").val()
		let act_observaciones = $('#act_observaciones_'+id).val();		
		let act_adjunto 			= $('#act_adjunto_'+id)[0];
		let act_fch_realizado	= $('#act_fch_realizado_'+id).val();
		let act_id						= $('#act_id_'+id).val();
		let act_id_operacion 	= $('#act_id_operacion').val();
		let act_fch_operacion = $('#act_fch_operacion').val();
		let Id_Usuario 				=	$("#usuariosesion").val();
		let act_adjunto_valida= $("#act_adjunto_valida_"+id).val();
		let validar 					= true;		
		let mensaje 					= "";		
		let file 							= act_adjunto.files[0];
		let data 							= new FormData();

//===========================================		
		if(act_id != '' && Id_Usuario != ''){
//===========================================
		if(typeof act_estatus === "undefined"){
			mensaje+='Es requerido "Estado del Activo" en: '+descripcion+'\n';
			validar= false;
		}

		if(valida1==1){
			if(act_valor_medido == ''){
					mensaje+='Es requerido "Valor Medido" en: '+descripcion+'\n';				
				validar = false;
			}
		}
		
		if(valida2 == 1){
				if(act_adjunto_valida == 0){
					if(typeof file === "undefined"){				
						mensaje+='Es requerido "Archivo Adjunto" en: '+descripcion+'\n';				
					validar = false;
				}	
			}
		} 
		
		if (act_fch_realizado==''){
				mensaje+='Es requerida "Fecha Realizado" en: '+descripcion+'\n';
			validar= false;
		}

		if(mensaje != ''){
			alert(mensaje);
		}		
		
		data.append('accion',2);
		data.append('act_id',act_id);
		data.append('Id_Usuario',Id_Usuario);
		data.append('act_valor_medido',act_valor_medido);
		data.append('act_estatus',act_estatus);
		data.append('act_observaciones',act_observaciones);
		data.append('act_fch_realizado',act_fch_realizado);
		data.append('act_adjunto_valida',act_adjunto_valida);
		data.append('file',file);
			
		if(validar){
			$.ajax({
				type: "POST",
				url: "/siga/class/biomedica/mtoPreventivo/mtoPreventivo.ajax.php",
				contentType:false, 
 				data:data,
				processData:false,
				// data: {accion:2,
				// 			act_id:act_id,
				// 			act_valor_medido:act_valor_medido,
				// 			act_estatus:act_estatus,
				// 			act_observaciones:act_observaciones,
				// 			act_fch_realizado:act_fch_realizado,
				// 			act_adjunto:act_adjunto,
				// 			Id_Usuario:Id_Usuario,
				// 			file:file},
				dataType: "JSON",
				cache: false,
				beforeSend:function(){
					$('#loadingState').show();
				},
				success: function (response) {
					$('#loadingState').hide();					
					console.log('success'+response);
					carga_actividades_rutinas(act_id_operacion,act_fch_operacion);
					//alert('Operación Correcta');
				},
				error:function(response){
					$('#loadingState').hide();
					console.log('error'+response);					
				}

			});
		}



//===========================================
		}
//===========================================
	}
//================================================================================================================================================

	function sigaActividadesEliminarImagen(idActividad,Fech_Solicitud2,id){
		
		let Fech_Solicitud = $('#act_fch_operacion').val();		
		
		if(confirm('¿Desea eliminar el archivo?')){

				$.ajax({
				type: "POST",
				url: "/siga/class/biomedica/mtoPreventivo/mtoPreventivo.ajax.php",
				data: {accion:4, id:idActividad},
				dataType: "JSON",
				beforeSend: function(){
					$('#loadingState').show();
				},
				success: function (response) {
					$('#loadingState').hide();				
					carga_actividades_rutinas(id,Fech_Solicitud2);
					console.log(response);
				},
				error: function(){
					$('#loadingState').hide();
					console.log(response);
				}
			});
			
	}

}

	function onBlurActividades(campo, id, valida1, valida2, descripcion){		
		
// 		let actFormData	= new FormData();
// 		let valor 		= $('#'+campo+'_'+id).val();		
// 		let act_adjunto = $('#act_adjunto_'+id)[0];
// 		let file 				= act_adjunto.files[0];

// 		if(campo=='act_adjunto'){
// 		actFormData.append('accion',3);
// 		actFormData.append('campo',campo);
// 		actFormData.append('act_id',id);
// 		actFormData.append('file',file);
// 		} else {
// 		actFormData.append('accion',3);
// 		actFormData.append('act_id',id);
// 		actFormData.append('campo',campo);
// 		actFormData.append('valor',valor);
// 		}


// $.ajax({
// 	type: "POST",
// 	url: "/siga/class/biomedica/mtoPreventivo/mtoPreventivo.ajax.php",
// 	contentType:false, 
// 	data:actFormData,
// 	processData:false,
// 	beforeSend:function(){
// 		$('#loadingState').show();
// 	},
// 	success: function (response) {
// 		$('#loadingState').hide();
// 		//carga_actividades_rutinas(act_id_operacion,act_fch_operacion);
// 		console.log(response);
// 	},
// 	error: function (response) { 
// 		$('#loadingState').hide();
// 		console.log(response);
// 	}

// });



	}

	//////Fin Agregar Accesorios
</script>