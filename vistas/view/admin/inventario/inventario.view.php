<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/archivosComunes.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/catalogos.class.php");

$catalogoClass = new catalogos();
$usuariosInfo = $catalogoClass->getSigaUsuariosVigentes();

?>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="/siga/plugins/sweetalert2/sweetalert2.css">
  <link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
  <link rel="stylesheet" href="../dist/css/jquery-confirm.min.css">
  <link rel="stylesheet" href="/siga/dist/css/spinner.css">
	<link rel="stylesheet" href="../plugins/fileinput/fileinput.css">
	<link href="DataTables1.10.0/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" />
  <script src="../plugins/docsupport/standalone/selectize.js"></script>
	<script src="../plugins/docsupport/index.js"></script>
	<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>  
	<script src="DataTables1.10.0/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="../dist/js/jquery.qrcode.js"></script>
	<script src="../dist/js/qrcode.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
	<script src="../plugins/signature_pad/signature_pad.min.js"></script>
	<script src="/siga/plugins/sweetalert2/sweetalert2.js"></script>
  <script src="../dist/js/jquery-confirm.min.js"></script>
  <script src="../js/prettify.js"></script> -->

	<style>
  a:link    {color: black; text-decoration: none;}
  a:visited {color: black; text-decoration: none;}
  a:hover   {color: black; text-decoration: none;}
	.modal .modal-dialog {width: 70%;max-width: 100%;} */
	</style>

<link rel="stylesheet" href="/siga/dist/css/spinner.css">
	
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
	
<div class="loadingState" id="loadingState">
  <div class="loader"></div>
</div>

<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
<div class="content">
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->

<div class="row">
<!-- ===================================================================================================================================================================================== -->			
        <div class="col-md-3 col-sm-6 col-xs-12">
					<a href="#" title="Activo Alta">		
						<div class="info-box" id="sigaActivoAlta">
							<span class="info-box-icon" style="background-color:#19294a; color:white;"><i class="fa fa-arrow-circle-o-up"></i></span>
							<div class="info-box-content"><br><br><br>
								<span class="info-box-text">Alta</span>
							</div>
						</div>
					</a>
        </div>
			
        <div class="col-md-3 col-sm-6 col-xs-12">
					<a href="#" title="Activo Baja">
						<div class="info-box" id="sigaActivoBaja">
							<span class="info-box-icon" style="background-color:#19294a; color:white;"><i class="fa fa-arrow-circle-o-down"></i></span>

							<div class="info-box-content"><br><br><br>
								<span class="info-box-text">Baja</span>
							</div>
							
						</div>
          </a>
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
					<a href="#" title="Activo Reubicación">
						<div class="info-box" id="sigaActivoReubicacion">
							<span class="info-box-icon" style="background-color:#19294a; color:white;"><i class="fa fa-map-marker"></i></span>
							<div class="info-box-content"><br><br><br>
								<span class="info-box-text">Reubicación de Equipo</span>
							</div>
						</div>
					</a> 
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
					<a href="#" title="Activo Reasignación">
						<div class="info-box" id="sigaActivoReasignacion">
							<span class="info-box-icon" style="background-color:#19294a; color:white;"><i class="fa fa-users" aria-hidden="true"></i></span>
							<div class="info-box-content"><br><br><br>
								<span class="info-box-text">Reasignación de equipo</span>
							</div>							
						</div>
					</a>
        </div>
<!-- ================================================================================================================================================================================ -->
      </div>
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->

<div class="row">
<!-- ================================================================================================================================================================================ -->
	<div class="col-lg-3 col-xs-6">
		<a href="#" title="Inventario">
				<div class="small-box bg-red">
					<div class="inner">
						<h3>2</h3><p>Inventario</p>
					</div>
					<div class="icon">
						<i class="fa fa-arrow-circle-o-up"></i>
					</div>
				</div>
		</a>
	</div>

	<div class="col-lg-3 col-xs-6">
		<a href="#" title="Inventario">
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>65</h3>
					<p>En Proceso de Baja </p>
				</div>
				<div class="icon">
					<i class="fa fa-arrow-circle-o-down"></i>
				</div>            
			</div>
		</a>
	</div>

	<div class="col-lg-3 col-xs-6">
		<a href="#" title="Inventario"></a>    
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>25</h3><p>Baja Definitiva</p>
				</div>
				<div class="icon">
					<i class="fa fa-map-marker"></i>
				</div>            
			</div>
		</a>
	</div>

	<div class="col-lg-3 col-xs-6">
		<a href="#" title="Inventario">
			<div class="small-box bg-green">
				<div class="inner">
					<h3>70</h3><p>Reubicación</p>
				</div>
				<div class="icon">
					<i class="fa fa-users" aria-hidden="true"></i>
				</div>            
			</div>
		</a>
	</div>
<!-- ================================================================================================================================================================================ -->
</div>
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
<!-- ==== Sección Menu Inicio ======================================================================================================================================================= -->
<div class="row">
<!-- ================================================================================================================================================================================ -->	
	<div class="col-lg-6 col-xs-6 has-error">

		<div class="col-sm-6">
			<select class="form-control" style="width: 100%;">
				<option selected="selected"><b>Vistas Disponibles</b></option>
				<option>Vista Dos</option>
			</select>
		</div>

	</div>
</div>

<!-- ==== Sección Modal Alta Activo Inicio======================================================================================================================================================= -->
<!-- ==== Sección Modal Alta Activo Inicio======================================================================================================================================================= -->

<div class="modal fade" tabindex="-1" role="dialog"  id="sigaModalAltaActivo">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" style="background-color: #19294a; color: white;">
          	<h4 class="modal-title"><i class="fa fa-arrow-circle-o-up"></i> Activos / Alta </h4>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>

        <div class="modal-body nopsides">
<!-- ================================================================================================================================================================================ -->	

<div class="nav-tabs-custom">
	<ul class="nav nav-tabs navbar-left">
		<li class="active"><a href="#sigaActivoDatosGenerales" data-toggle="tab" style="color:#000000;">Datos Generales</a></li>
		<li><a href="#sigaActivoDatosProveedor" data-toggle="tab" style="color:#000000;color:red;pointer-events: none;">Datos Proveedor</a></li>
		<li style="pointer-events: none;"><a href="#sigaActivoDatosContabilidad" data-toggle="tab" style="color:#000000;" >Datos Contabilidad</a></li>
		<li style="pointer-events: none;"><a href="#sigaActivoDatosRutina" data-toggle="tab" style="color:#000000;" >Rutina</a></li>	
		<li style="pointer-events: none;"><a href="#sigaActivoDatosAccesorios" data-toggle="tab" style="color:#000000;">Accesorios</a></li>	
		<li style="pointer-events: none; display:none;"><a href="#sigaActivoDatosConsumibles" data-toggle="tab" style="color:#000000;">Consumibles</a></li>	
	</ul>
<!-- ================================================================================================================================================================================ -->	
	
		<div class="tab-content">
			<div class="chart tab-pane active" id="sigaActivoDatosGenerales" style="position: relative;">
			<div class="col-lg-12 col-xs-6">
				
			<div class="row" style="color:#000000; background-color:#eeeeee;">
				<div class="col-md-10 col-md-offset-1">
					<!-- columna#1 -->
					<div class="col-md-4">
						<div class="form-group">
							<span><font color="red">*</font></span><label for="AF_BC" class="control-label" id="AF_BCLabel" style="font-size: 11px;">AF/BC</label>
							<input type="text" class="form-control" id="AF_BC" placeholder="AF/BC" maxlength="25">
						</div>
						<div class="form-group">
							<span><font color="red">*</font></span><label for="cmbubicacionprim" class="control-label" id="cmbubicacionprimLabel" style="font-size: 11px;">Ubicación Primaria</label>
							<select class="form-control" id="cmbubicacionprim"></select>
						</div>
						<div class="form-group">
							<span><font color="red">*</font></span><label for="cmbubicacionsec" class="control-label" id="cmbubicacionsecLabel" style="font-size: 11px;">Ubicación Secundaria</label>
							<select class="form-control" id="cmbubicacionsec">
								<option value="-1">--Ubicación Secundaria--</option>
							</select>
						</div>
						<div class="form-group">
							<label for="especifica" class="control-label" id="especificaLabel" style="font-size: 11px;">Ubicacion Especifica</label>
							<input type="text" class="form-control" id="especifica" placeholder="Ubicación Específica">
						</div>
					</div>
					<!-- columna#2 -->
					<div class="col-md-4">
						<div class="form-group">
							<span><font color="red">*</font></span><label for="Nombre" class="control-label" id="NombreLabel" style="font-size: 11px;">Nombre del Activo</label>
							<input type="text" class="form-control" id="Nombre" placeholder="Nombre">
						</div>
						<div class="form-group">
							<span><font color="red">*</font></span><label for="cmbestatus" class="control-label" id="cmbestatusLabel" style="font-size: 11px;">Estatus</label>
							<select class="form-control" id="cmbestatus"></select>
						</div>
						<div class="form-group">
							<label for="DescCorta" class="control-label" id="DescCortaLabel" style="font-size: 11px;">Descripción Corta</label>
							<textarea rows="1" placeholder="Descripción Corta" id="DescCorta" class="form-control"></textarea>
						</div>
						<div class="form-group" id="divFoto">
							
							<label for="documentos_adjuntos_FILE" class="control-label" id="documentos_adjuntos_FILELabel" style="font-size: 11px;">Imagen (240x160px)</label>
							<input class="form-group" id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple">
							<input type="hidden" id="Url_Foto_Activo">
							
						</div>


					</div>
					<!-- columna#3 -->
					<div class="col-md-4">
						<!--div class="form-group" id="Carrusel_Fotos"></div-->
						<div class="form-group">
							<label for="documentos_adjuntos_FILE_tmp" class="control-label" style="font-size: 11px;">Imagen</label>
							<div class="file-preview">
								<div class=" file-drop-zone">
									<div class="file-preview-thumbnails">
										<div class="file-initial-thumbs" style="display: table; margin: 0 auto;">
											<div class="file-preview-frame file-preview-initial" data-template="image" style="display: flex; align-items: center; justify-content: center;">
												<div class="kv-file-content">
													<div id="Carrusel_Fotos"></div>
												</div>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
						<!-- ==== Area del input para la subida de archivos ==== -->
						<!-- <div class="form-group" id="divFoto">
							
							<label for="documentos_adjuntos_FILE" class="control-label" id="documentos_adjuntos_FILELabel" style="font-size: 11px;">Imagen (240x160px)</label>
							<input class="form-group" id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple">
							<input type="hidden" id="Url_Foto_Activo">
							
						</div> -->
					</div>
				</div>
			</div>
		<br>
			<div class="row">
			<div class="col-md-10 col-md-offset-1">

				<div class="col-md-4">

					<div class="form-group">
						<span><font color="red">*</font></span><label for="cmbareas" class="control-label" id="cmbareasLabel" style="font-size: 11px;"> Área Gestora</label>
						<select class="form-control" id="cmbareas"></select>
					</div>
					<div class="form-group">
						<span><font color="red">*</font></span><label for="cmbclasificacion" class="control-label" id="cmbclasificacionLabel" style="font-size: 11px;"> Clase / Clasificación</label>
						<table>
							<tr>
								<td><select class="form-control" id="cmbclase"></select></td>
								<td><select class="form-control" id="cmbclasificacion"><option value="-1">--Clasificación--</option></select></td>
							</tr>
						</table>
					</div>
					<div class="form-group">
						<label for="Marca" class="control-label" id="MarcaLabel" style="font-size: 11px;">Marca</label>
						<input type="text" class="form-control" id="Marca" placeholder="Marca">
					</div>
					<div class="form-group">
						<span><font color="red">*</font></span><label for="cmbtipoactivo" class="control-label" id="cmbtipoactivoLabel" style="font-size: 11px;">Tipo de Activo</label>
						<select class="form-control" id="cmbtipoactivo"></select>
					</div>
					<div class="form-group">
						<span><font color="red">*</font></span><label for="cmbPRE" class="control-label" id="cmbPRELabel" style="font-size: 11px;">Participa en PRE</label>
						<select class="form-control" id="cmbPRE">
							<option value="-1">Participa en PRE</option>
							<option value="1">Si</option>
							<option value="0">No</option>
						</select>
					</div>
					<div class="form-group">
						<span><font color="red">*</font></span><label for="cmbcertificacion" class="control-label" id="cmbcertificacionLabel" style="font-size: 11px;">Participa en Certificacion</label>
						<select class="form-control" id="cmbcertificacion">
							<option value="-1">Participa en certificación</option>
							<option value="1">Si</option>
							<option value="0">No</option>
						</select>
					</div>
					<div class="form-group">
						<span><font color="red">*</font></span><label for="cmbtipovaleresguardo" class="control-label" id="cmbtipovaleresguardoLabel" style="font-size: 11px;">Tipo de vale de resguardo</label>
						<select class="form-control" id="cmbtipovaleresguardo"></select>
					</div>

					<div class="form-group">
						<span><font color="red">*</font></span><label for="FechaFactura" class="control-label" id="FechaFacturaLabel" style="font-size: 11px;">Fecha de recepción</label>
						<input type="date" class="form-control" id="siga_activo_alta_fch_recepcion" name='siga_activo_alta_fch_recepcion' placeholder="Fecha de Recepción" onkeydown="return false">
					</div>

				</div><!-- columna#1 -->

				<div class="col-md-4">
					<div class="form-group">
						<span><font color="red">*</font></span><label for="cmbmotivo" class="control-label" id="cmbmotivoLabel" style="font-size: 11px;">Motivo Alta</label>
						<select class="form-control" id="cmbmotivo"></select>
					</div>
					<div class="form-group">
						<span><font color="red">*</font></span><label for="cmbfamilia" class="control-label" id="cmbfamiliaLabel" style="font-size: 11px;">Familia</label>
						<select class="form-control" id="cmbfamilia"></select>
					</div>
					<div class="form-group">
						<label for="modelo" class="control-label" id="modeloLabel" style="font-size: 11px;">Modelo</label>
						<input type="text" class="form-control" id="modelo" placeholder="Modelo">
					</div>

					<div class="form-group">
						<span><font color="red">*</font></span><label for="activopadre" class="control-label" id="activopadre" style="font-size: 11px;">Activo Padre</label>
						<select class="form-control" id="activopadre">
							<option  value="-1">Activo Padre</option>
							<option value="1">Si</option>
							<option value="0">No</option>
						</select>
					</div>

					<div class="form-group">
						<span><font color="red">*</font></span><label for="cmbseguros" class="control-label" id="cmbsegurosLabel" style="font-size: 11px;">Participa en Seguros</label>
						<select class="form-control" id="cmbseguros">
							<option  value="-1">Participa en seguros</option>
							<option value="1">Si</option>
							<option value="0">No</option>
						</select>
					</div>
					
					<div class="form-group">
						<span><font color="red">*</font></span><label for="cmbseguros" class="control-label" id="cmbsegurosLabel" style="font-size: 11px;">Usuario Resguardo/Responsable activo</label>
						<select class="form-control" id="numempleadoresguardo">
							<option  value="-1">Participa en seguros</option>
							<option value="1">Si</option>
							<option value="0">No</option>
						</select>
					</div>


					<!-- <div class="form-group">
						<span><font color="red">*</font></span><label for="numempleadoresguardo" class="control-label" id="numempleadoresguardoLabel" style="font-size: 11px;">Usuario Resguardo/Responsable activo</label>
						<select id="numempleadoresguardo" class="demo-default" placeholder="Usuario Solicitante" style="display:none"></select>
						<div id="gifcargandoaltausuarios" style="display:none" align="center">
							<img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
						</div>
					</div> -->

					<div class="form-group">
						<span><font color="red">*</font></span>
						<label class="control-label" style="font-size: 11px;">Mantenimiento Preventivo</label>
						<select class="form-control" id="cmb_mant_prevent">
							<option  value="-1">Mantenimiento Preventivo</option>
							<option value="1">Si</option>
							<option value="0">No</option>
						</select>											
					</div>
					
					<div class="form-group">
						<span><font color="red"></font></span>
						<label class="control-label" style="font-size: 11px;">Fecha de Puesta Operación</label>
						<input type="date" class="form-control" id="siga_activo_alta_fch_operacion" name='siga_activo_alta_fch_operacion' placeholder="Fecha de puesta en operación" onkeydown="return false">
					</div>

					<div class="form-group" style="display:none">
						<label for="nombreusuarioalta" class="control-label" id="nombreusuarioaltaLabel" style="font-size: 11px;"></label>
						<input type="text" class="form-control" id="nombreusuarioalta" placeholder="Nombre usuario alta">
					</div>
				</div><!-- columna#2 -->

			<div class="col-md-4">
				
				<div class="form-group">
						<span><font color="red">*</font></span>
						<label for="cmbpropiedad" class="control-label" id="cmbpropiedadLabel" style="font-size: 11px;">Propiedad</label>
						<select class="form-control" id="cmbpropiedad"></select>
					</div>
					<div class="form-group">
						<label for="cmbsubfamilia" class="control-label" id="cmbsubfamiliaLabel" style="font-size: 11px;">Subfamilia</label>
						<select class="form-control" id="cmbsubfamilia"><option value="-1">--Subfamilia--</option></select>
					</div>
					<div class="form-group">
						<span id="spannunmserie"><font color="red">*</font></span><label for="numserie" class="control-label" id="numserieLabel" style="font-size: 11px;">Número de Serie</label>
						<input type="checkbox" id="chknumserie"> No Aplica
						<input type="text" class="form-control" id="numserie" placeholder="No. serie">
					</div>
					<div class="form-group">
						<label for="numactivoanterior" class="control-label" id="numactivoanteriorLabel" style="font-size: 11px;">Número de activo anterior</label>
						<input type="text" class="form-control" id="numactivoanterior" placeholder="No. activo anterior">
					</div>
					<div class="form-group">
						<font color="red">*</font></span><label for="importeseguros" class="control-label" id="importesegurosLabel" style="font-size: 11px;">Importe Seguros</label>
						<input type="text" class="form-control" id="importeseguros" placeholder="Importe de seguros">
					</div>
					<div class="form-group" style="display:none">
						<label for="nombreempleadoresguardo" class="control-label" id="nombreempleadoresguardoLabel" style="font-size: 11px;">Usuario solicitante</label>
						<input type="text" class="form-control" id="nombreempleadoresguardo" placeholder="Nombre Empleado Resguardo">
					</div>
					<div class="form-group">
						<label for="numusuarioalta" class="control-label" id="numusuarioaltaLabel" style="font-size: 11px;">Condición de Recepción</label>
						<input type="text" class="form-control" id="numusuarioalta" placeholder="No. Usuario alta">
					</div>
					<div class="form-group">
						<span><font color="red">*</font></span>
						<label class="control-label" style="font-size: 11px;">Condición de Recepción</label>
						<select class="form-control" id="siga_cmb_condicion_recepcion" name="siga_cmb_condicion_recepcion">
							<option value="0" selected>Seleccionar</option>	
							<option value="1">Nuevo</option>
							<option value="2">Seminuevo</option>
							<option value="3">Reconstruido</option>
						</select>
					</div>

				</div>
			</div>
			</div>

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="col-md-12">
						<div class="form-group">
							<label for="polizagarantia" class="control-label" id="polizagarantiaLabel" style="font-size: 11px;">Descripción Larga</label>
							<textarea rows="4" class="form-control" id="DescLarga" placeholder="Descripción Larga"></textarea>
						</div>
					</div>
				</div>
			</div>

	<!-- <div class="row">
			<center>
				<button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-arrow-circle-o-up"></i> Alta Activo</button>
			</center>
	</div>		 -->
								
			</div>

			</div>
<!-- ================================================================================================================================================================================ -->	
			<div class="chart tab-pane" id="sigaActivoDatosProveedor" style="position: relative; height: 300px; background-color:#eeeeee;">
				Prueba 02
			</div>
<!-- ================================================================================================================================================================================ -->	
			<div class="chart tab-pane" id="sigaActivoDatosContabilidad" style="position: relative; height: 300px; background-color:#eeeeee;">
				Prueba 03
			</div>
<!-- ================================================================================================================================================================================ -->	
		</div>
<!-- ================================================================================================================================================================================ -->	
</div>	
<!-- ================================================================================================================================================================================ -->	  
			</div>
      
      <div class="modal-footer">
				

				<button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-arrow-circle-o-up"></i> Alta Activo</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar Ventana</button>


      </div>
    </div>
  </div>
</div>


<!-- ==== Sección Modal Alta Activo Fin======================================================================================================================================================= -->
<!-- ==== Sección Modal Alta Activo Fin======================================================================================================================================================= -->

<div class="row">
	<br>
	<div class="col-lg-12 col-xs-6">

		<table id="siga_mi_tabla_prueba" class="table" >
			<thead style="background-color: #19294a; color:white;">
			<?php for ($x = 1; $x <= 4; $x++) { ?>
			<th><?php echo $x; ?></th>
			<?php }?>	

			</thead>
		</table>

	</div>

</div>

<!-- ================================================================================================================================================================================ -->
</div>
 
<!-- ==== Sección Modal Asistencia Especial Inicio ======================================================================================================================================================= -->
<!-- ==== Sección Modal Asistencia Especial Inicio ======================================================================================================================================================= -->
	
<script>

$(document).ready(function(){
$('#loadingState').show();

let id_empleado = $('#usuariosesion').val();
let numEmpleado = $('#nousuariosesion').val();
let Id_Area     = $("#idareasesion").val();

$('#loadingState').hide();

//$('#siga_area_trabajo_inventario').load('view/admin/inventario/components/inventario.com.php');

$('#sigaActivoAlta').on('click',function(){

	$('#sigaModalAltaActivo').modal('show');

});

$('#sigaActivoBaja').on('click',function(){

	alert('Baja');

});

$('#sigaActivoReubicacion').on('click',function(){

	alert('Reubicacion');

});

$('#sigaActivoReasignacion').on('click',function(){

	alert('Reasignacion');

});

$('#siga_mi_tabla_prueba').dataTable({
	destroy:true,
	processing: true,
    data: [
        {
            name: 'Tiger Nixon',
            position: 'System Architect',
            salary: '3120',
						col4: '5300'
        },
        {
            name: 'Garrett Winters',
            position: 'Director',
            salary: '5300',
						col4: '5300'
        }

    ],
    columns: [
        {data: 'name'},
        {data: 'position'},
        {data: 'salary'},
				{data: 'col4'}
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
									    }, 
});

  //   $.confirm({
  //     title: 'Cambiar Estado.',
  //     content: '¿Desea regresar el ticket a estado "Seguimiento"?',
  //     icon: 'fa fa-question',
  //     type: 'red',
  //     buttons: {
        
  //         confirm: function () {

  //           // $.ajax({
  //           //   url: '../poo/mistickets-gestor/ajax_update_estatus.php',
  //           //   type: 'POST',
  //           //   dataType: 'JSON',
  //           //   data: {Id_ticket: Id_ticket},
  //           //   cache:false,
  //           //   success: function(data){
  //           //     console.log(data);
  //           //     $.alert('Operación éxitosa!');
  //           //     $('#tablaPorCerrar').DataTable().ajax.reload();
  //           //   }
  //           // });        	
            
  //         },
  //         Cancelar: function () {
  //             $.alert('Operación Cancelada!');
  //         },
  //     }
  // });


});
//********************************************************************************************************************************************************************************************** */
//********************************************************************************************************************************************************************************************** */

function alerta(icon,text){
  Swal.fire({
  position: "center",
  icon: icon,
  title: text,
  showConfirmButton: false,
  timer: 1500
});
}

//********************************************************************************************************************************************************************************************** */
//********************************************************************************************************************************************************************************************** */


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

	}
	////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////Funciones cambiar de area////////////////////////////////////////////////////////
	
</script>