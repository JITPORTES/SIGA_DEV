<div class="row">
	<div class="container">
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>

			<div class="panel">
				<div class="panel-heading">SIGA - Catálogos</div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>

							<table class="table table-striped">
								<tbody>
									<tr>
										<td>
											<select name="sigaCatalogosMaster" id="sigaCatalogosMaster">
												<option value="0" >Catálogos</option>
												<option value="1">Condición de Recepción</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
				<br>
				<br>
						<div id='siga_div_tabla'>
							<button type="button" class="btn btn-success">+ Agregar</button>
							<table class="table">
								<tbody>
									<tr>
										<td>Datos</td>
									</tr>
									<tr>
										<td>datos</td>
									</tr>
									<tr>
										
									</tr>
								</tbody>
							</table>
						</div>

							<!------------------------------------------------------------------------------------------------------------------------------------------------------>
				</div>
			</div>



	
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
	</div>
</div><!-- /.row -->




<!-------------------------------------------------------------------------------------------------------------------------------------------------------------  -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------  -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------  -->

<div class="modal fade modalchs" id="myModal">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header azul">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="Titulo"></h4>
      </div>
      <div class="modal-body">
		<input type="hidden" id="Txt_Fachada">
		<input type="hidden" id="Txt_Id_Catalogo">
		<input type="hidden" id="Txt_Desc_Catalogo">
		<input type="hidden" id="Id_Catalogo">
		<input type="hidden" id="Estatus_Editar">
        <form class="form-horizontal">
          <div class="form-group" id="div_areas">
			<label class="col-sm-3 control-label" >Áreas</label>
            <div class="col-sm-8">
				<select class="form-control" id="cmbareas">
				</select>
			</div>	
          </div>
		  
		  <div class="form-group" style="display:none" id="div_seccion">
			<label class="col-sm-3 control-label" >Sección</label>
            <div class="col-sm-8">
				<select class="form-control" id="cmb_seccion">
				</select>
			</div>	
          </div>
		  
		  <div class="form-group">
            <label class="col-sm-3 control-label" id="Desc_Catalogo"></label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="Txt_Descripcion">
            </div>
		  </div>
		  <div align="center">
			<button type="button" class="btn chs" id="guardar">Guardar</button>
			<button type="button" class="btn chs" onclick="limpiarcamposcat()">Limpiar</button>
		  </div>
		  <br>
		  <br>
		  <div class="table-responsive" id="div_tabla_categorias" align="center">
          </div>
        </form>
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------  -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------  -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------  -->

<script>
//-------------------------------------------------------------------------	
$(document).ready(function() {
//-------------------------------------------------------------------------
$('#siga_div_tabla').hide();

let area 	= $('#idareasesion').val();

$('#sigaCatalogosMaster').on('change', function(){

	let sigaCatalogosMaster = $('#sigaCatalogosMaster').val();
	$('#siga_div_tabla').show();


});
	
//-------------------------------------------------------------------------
});	
//-------------------------------------------------------------------------
</script>
