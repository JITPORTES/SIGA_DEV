    <!-- modal reubicación de equipo -->
    <div class="modal fade modalchs" id="reubicacionEquipo" data-backdrop="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header amarillo">
            <button type="button" class="close" aria-label="Close" onclick="confirmacion_cerrar('reubicacionEquipo')">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><i class="fa fa-map-marker" aria-hidden="true"></i>Reubicación de equipo</h4>
          </div>
          <div class="modal-body nopsides npt">
           <form>
                 <div class="gray nm">
                    <div class="row">
                      <div class="col-md-10 col-md-offset-1">

                        <div class="col-md-4">
                          <input type="hidden" id="Id_reubicacion_activo">
						  <input type="hidden" id="Id_Activo_reubicacion_Form">
						  <div class="form-group">
						  	<div id="muestro_select">
						  		<span><font color="red">*</font></span>
						  		<label class="control-label"  style="font-size: 11px;">AF/BC</label>	
						  		<select id="AF_BC_reubicacion" class="demo-default" placeholder="AF/BC" style="display:none">
						  		</select>
						  	</div>
						  	<div id="gifcargando2" style="display:none" align="center">
						  	   <img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
						  	</div>
						  </div>
						  	
                          <div class="form-group">
						    <label class="control-label"  style="font-size: 11px;">Serie</label>
                            <input type="text" id="Serie_reubicacion" disabled class="form-control" placeholder="Serie" disabled>
                          </div>

                          <div class="form-group">
						    <label  class="control-label" style="font-size: 11px;">Estatus</label>
                            <select class="form-control" id="cmbestatus_reubicacion" disabled>
                              
                            </select>
                          </div>

                          <div class="form-group">
						    <label  class="control-label" style="font-size: 11px;">Ubicación primaria procedencia</label>
                            <select class="form-control" id="cmbubicacionprimaria_reubicacion" disabled>
                              
                            </select>
                          </div>
													<div class="form-group">
														<label class="control-label"  style="font-size: 11px;">Responsable Procedencia</label>
                            <input type="text" class="form-control" id="responsable_procedencia" placeholder="Responsable Procedencia" disabled>
                          </div>
                        </div><!-- columna#1 -->

                        <div class="col-md-4">
                          <div class="form-group">
						  <label class="control-label"  style="font-size: 11px;">Marca</label>
                            <input type="text" class="form-control" id="marca_reubicacion" placeholder="Marca" disabled>
                          </div>

                          <div class="form-group">
						  <label  class="control-label"  style="font-size: 11px;">Modelo</label>
                            <input type="text" class="form-control" id="modelo_reubicacion" placeholder="Modelo" disabled>
                          </div>

                          <div class="form-group">
						  <label  class="control-label"  style="font-size: 11px;">Área Gestora</label>
                            <select class="form-control" id="cmbarea_reubicacion" disabled>
                              
                            </select>
                          </div>

                          <div class="form-group">
						  <label  class="control-label" style="font-size: 11px;">Ubicación secundaria procedencia</label>
                            <select class="form-control" id="cmbubicacionsecundaria_reubicacion" disabled>
                              
                            </select>
                          </div>
													<div class="form-group">
														<label class="control-label"  style="font-size: 11px;">Ubicación Especifica Procedencia</label>
                            <input type="text" class="form-control" id="ubic_especifica_procedencia" placeholder="Ubicación Especifica Procedencia" disabled>
                          </div>
                        </div><!-- columna#2 -->

                        <div class="col-md-4">
                          <div class="form-group">
						  <label class="control-label"  style="font-size: 11px;">Descripción Corta</label>
                          <textarea rows="4" height="" class="form-control" id="desccorta_reubicacion" placeholder="Descripción Corta" disabled></textarea>
                          </div>
						  <div class="form-group">
						  <label  class="control-label"  style="font-size: 11px;">Gerencia/Jefatura que Autoriza</label>
                            <input type="text" class="form-control" id="jefearea_reubicacion" disabled>
                           
                          </div>
						  <div class="form-group">
						    <label class="control-label" id="numempleadoresguardoLabel" style="font-size: 11px;">Usuario Responsable/Resguardo Destino</label>
                            
							<select id="numempleadoreubicacion" class="demo-default" placeholder="Usuario Responsable/Resguardo Destino" style="display:none"></select>
							<div id="gifcargandoreubicacion" style="display:none" align="center">
							   <img src="../dist/img/cargando-loading.gif" style="max-width: 25px; max-height: 25px" alt="cargando-loading-037.gif">
							</div>
						  </div>
						  
						  <div class="form-group" style="display:none">
						  <label  class="control-label"  style="font-size: 11px;">Usuario Responsable</label>
                            <input type="text" class="form-control" placeholder="Usuario Responsable" id="usuario_resp_guardar">
                           
                          </div>
						  
						  
						  
                        </div><!-- columna#2 -->


                      </div>
                    </div>
                  </div>

              <div class="row">
                <div class="col-md-8 col-md-offset-2">

                  <div class="col-md-6">
                    <div class="form-group">
					<label class="control-label" id="areaLabel" style="font-size: 11px;">Área Gestora</label>
                      <select class="form-control" id="cmb_area_guardar">
                      </select>
                    </div>

                    <div class="form-group">
					<label class="control-label" id="UbicacionPrimariaLabel" style="font-size: 11px;">Ubicación Primaria Destino</label>
                      <select class="form-control" id="cmb_ubic_prim_reub_guar">
						<option value="-1">--Ubicación Primaria Destino--</option>
                      </select>
                    </div>

                    <div class="form-group">
					<label class="control-label" id="UbicacionSecundariaLabel" style="font-size: 11px;">Ubicación Secundaria Destino</label>
                      <select class="form-control" id="cmb_ubic_sec_reub_guar">
						<option value="-1">--Ubicación Secundaria Destino--</option>
                      </select>
                    </div>
										<div class="form-group">
											<label class="control-label"  style="font-size: 11px;">Ubicación Especifica</label>
                      <input type="text" class="form-control" id="ubic_especifica_guardar" placeholder="Ubicación Especifica">
                    </div>
                    <div class="form-group">
					<label class="control-label" id="CentroCostosLabel" style="font-size: 11px;">Centro de Costos Destino</label>
                      <select class="form-control" id="centro_costos_guardar">        
                      </select>	
					</div>
					
					
					<div class="form-group">
						<!--<label for="Fecha_baja" class="control-label" id="Fecha_bajaLabel" style="font-size: 11px;">Cuenta contable reubicacion</label>-->
                        <!--<input type="text" class="form-control datepicker" id="Cuenta_reubicacion" placeholder="Cuenta contable reubicacion">-->
						<label class="control-label" id="CuentaLabel" style="font-size: 11px;">Cuenta Depreciación</label>
						<input type="text" id="Cuenta_reubicacion" class="form-control">
						   <select class="form-control" id="cmbCuenta_reubicacion" style="display:none">
           
                          </select>
                    </div>
					
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
					<label class="control-label" id="MotivoLabel" style="font-size: 11px;">Motivo Reubicación</label>
                      <textarea rows="3" class="form-control" placeholder="Motivo reubicación" id="Motivo_Reubicacion"></textarea>
                    </div>
                    <div class="form-group">
					<label class="control-label" id="ComentariosLabel" style="font-size: 11px;">Comentarios Reubicación</label>
                      <textarea rows="5" class="form-control" placeholder="Comentarios" id="comentarios_reubicacion"></textarea>
                    </div>
                  </div>
                </div>
              </div>

           </form>
          </div>
          <div class="modal-footer">
            <a href="formato-reubicacion.html" class="btn chs" role="button" target="_blank" style="display:none">Formato</a>
            <button type="button" class="btn chs" id="generarreubicacion">Reubicar</button>
          </div>
        </div>
      </div>
    </div>