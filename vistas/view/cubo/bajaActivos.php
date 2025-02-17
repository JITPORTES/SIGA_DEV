<?php 
session_start();
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/archivosComunes.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/catalogos.class.php");

$catalogosClass = new catalogos();
$agnioInfo = $catalogosClass->getSigaCatAgnios();

?>
<!-- <link href="https://cdn.datatables.net/v/dt/dt-2.0.7/b-3.0.2/b-html5-3.0.2/fc-5.0.0/r-3.0.2/datatables.min.css" rel="stylesheet"> -->
<div class="row">
	<div class="container-fluid">
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>

<section class="content">

			<div class="panel">
				<div class="panel-heading">SIGA - Activos</div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>

							<table class="table table-striped">
								<tbody>
									<tr>
										<td><center>
											<select name="sigaFechacmb" id="sigaFechacmb" class="form-select">
												<option value="0" >Seleccionar Año</option>
                        <?php foreach($agnioInfo as $item) { ?>
												<option value="<?php echo $item['Desc_Anios'];?>"><?php echo $item['Desc_Anios'];?></option>
                        <?php } ?>
											</select>
                      </center>
										</td>
									</tr>
								</tbody>
							</table>
				<br>
				<br>
						
      <div class="row" id='siga_row_datos'>

        <div class="text-center">
          <div class="btn-group">
              <button type="button" class="btn bg-navy" onclick="sigaCargarBajas(1)">Enero</button>
              <button type="button" class="btn bg-navy" onclick="sigaCargarBajas(2)">Febrero</button>
              <button type="button" class="btn bg-navy" onclick="sigaCargarBajas(3)">Marzo</button>
              <button type="button" class="btn bg-navy" onclick="sigaCargarBajas(4)">Abril</button>
              <button type="button" class="btn bg-navy" onclick="sigaCargarBajas(5)">Mayo</button>
              <button type="button" class="btn bg-navy" onclick="sigaCargarBajas(6)">Junio</button>
              <button type="button" class="btn bg-navy" onclick="sigaCargarBajas(7)">Julio</button>
              <button type="button" class="btn bg-navy" onclick="sigaCargarBajas(8)">Agosto</button>
              <button type="button" class="btn bg-navy" onclick="sigaCargarBajas(9)">Septiembre</button>
              <button type="button" class="btn bg-navy" onclick="sigaCargarBajas(10)">Octubre</button>
              <button type="button" class="btn bg-navy" onclick="sigaCargarBajas(11)">Noviembre</button>
              <button type="button" class="btn bg-navy" onclick="sigaCargarBajas(12)">Diciembre</button>
              <button type="button" class="btn bg-navy" onclick="sigaCargarBajas(0)">Todos</button>
              
            </div>
        </div>


      </div>
      <!-- /.row -->
</section>

  <div id="siga_div_baja_activos">


      <table class="table table-striped" id="table_siga_baja_activos" style="width:100%">
        <thead>
          <tr>
            <th>AF BC</th>
            <th>Paso</th>
            <th>Nombre</th>
            <th>Área</th>
            <th>Clasificación</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Serie</th>
            <th>Propiedad</th>
            <th>Tipo</th>
            <th>Ubi. Primaria</th>
            <th>Ubi. Secundaria</th>
            <th>Fecha Alta</th>
            <th>Monto Factura</th>
            <th>Usuario Baja</th>
            <th>Usuario Resguardo</th>
            <th>F. Baja Responble</th>
            <th>F. Baja Dirección</th>
            <th>F. Baja Contabilidad</th>
            <th>Motivo Baja</th>
            <th>Comentarios</th>
            <th>Destino Final</th>
          </tr>
        </thead>
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

<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/excellentexport@3.4.3/dist/excellentexport.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/v/dt/dt-2.0.7/b-3.0.2/b-html5-3.0.2/fc-5.0.0/r-3.0.2/datatables.min.js"></script> -->
<script>
//-------------------------------------------------------------------------	
$(document).ready(function() {

$('#siga_div_baja_activos').hide();
$('#siga_row_datos').hide();
let area 	= $('#idareasesion').val();

//--------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------

$('#sigaFechacmb').on('change', function(){
  $('#siga_div_baja_activos').hide();
	let sigaCatalogosMaster = $('#sigaCatalogosMaster').val();
  $('#siga_row_datos').show();  
});
	
//-------------------------------------------------------------------------
});	
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------

function sigaCargarBajas(mes){
 
  let agnio = $('#sigaFechacmb').val();
  
  $.ajax({
    type: "post",
    url: "/siga/class/cubo/sigaBajaActivos.ajax.php",
    data: {accion:1, mes:mes, agnio:agnio },
    dataType: "JSON",
    success: function (response) {

      $('#table_siga_baja_activos').dataTable( {
        layout: {
        topStart: {
            buttons: ['excel']
        }
    },
                data : response,
                destroy:true,
                processing: true,
                columns: [
                    {"data" : "AF_BC"},
                    {"data" : "Paso"},
                    {"data" : "NombreActivo"},
                    {"data" : "Area"},
                    {"data" : "Id_Clasificacion"},
                    {"data" : "marca"},
                    {"data" : "Modelo"},
                    {"data" : "NumSerie"},
                    {"data" : "Id_Propiedad"},
                    {"data" : "Id_Tipo_Activo"},
                    {"data" : "Id_Ubic_Prim"},
                    {"data" : "Id_Ubic_Sec"},
                    {"data" : "fecha_alta"},
                    {"data" : "MontoFactura"},
                    {"data" : "id_baja"},
                    {"data" : "usuario_baja"},                    
                    {"data" : "fechaBajaResponbleResguardo"},
                    {"data" : "fechaBajaDireccion"},
                    {"data" : "fechaBajaContabilidad"},
                    {"data" : "Motivo_Baja"},
                    {"data" : "Comentarios"},
                    {"data" : "destino_final"},
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

      $('#siga_div_baja_activos').show();
  
    }
  });

}
</script>

