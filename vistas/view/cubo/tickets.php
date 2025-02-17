
<div class="row">
	<div class="container">
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>

<section class="content">

			<div class="panel">
				<div class="panel-heading">SIGA - Ticket</div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>

							<table class="table table-striped">
								<tbody>
									<tr>
										<td>
											<select name="sigaFechacmb" id="sigaFechacmb">
												<option value="0" >Seleccionar Año</option>
												<option value="2024">2024</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
				<br>
				<br>
						<div id='siga_div_tabla_cubo_tickets'>							
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




      <div class="row" id='siga_row_titulo'>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Nuevo</span>
              <span class="info-box-number">1,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Seguimiento</span>
              <span class="info-box-number">410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Por Calificar</span>
              <span class="info-box-number">13,648</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Cerrados</span>
              <span class="info-box-number">93,139</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <div class="text-center">
          <div class="btn-group">
              <button type="button" class="btn bg-navy">Enero</button>
              <button type="button" class="btn bg-navy">Febrero</button>
              <button type="button" class="btn bg-navy">Marzo</button>
              <button type="button" class="btn bg-navy">Abril</button>
              <button type="button" class="btn bg-navy">Mayo</button>
              <button type="button" class="btn bg-navy">Junio</button>
              <button type="button" class="btn bg-navy">Julio</button>
              <button type="button" class="btn bg-navy">Agosto</button>
              <button type="button" class="btn bg-navy">Septiembre</button>
              <button type="button" class="btn bg-navy">Octubre</button>
              <button type="button" class="btn bg-navy">Noviembre</button>
              <button type="button" class="btn bg-navy">Diciembre</button>
              <button type="button" class="btn bg-navy">Completo</button>
            </div>
        </div>



      </div>
      <!-- /.row -->
</section>



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



<!-------------------------------------------------------------------------------------------------------------------------------------------------------------  -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------  -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------  -->

<script>
//-------------------------------------------------------------------------	
$(document).ready(function() {
//-------------------------------------------------------------------------
$('#siga_div_tabla_cubo_tickets').hide();
$('#accordion').hide();
$('#siga_row_titulo').hide();

let area 	= $('#idareasesion').val();

$('#sigaFechacmb').on('change', function(){

	let sigaCatalogosMaster = $('#sigaCatalogosMaster').val();
	$('#accordion').show();
  $('#siga_row_titulo').show();
  


});
	
//-------------------------------------------------------------------------
});	
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------


</script>
