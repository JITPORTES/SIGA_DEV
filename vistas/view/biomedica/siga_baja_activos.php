<?php 
session_start();
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/archivosComunes.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/biomedica/biomedica.class.php");

$biomedicaClass = new biomedica();
$biomedicaInfo = $biomedicaClass->getSigaActivosBajaArea(1);

?>
<link href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.7/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/cr-2.0.2/fc-5.0.0/fh-4.0.1/r-3.0.2/datatables.min.css" rel="stylesheet">

<style>
  table {
  font-size: 11px;
}
</style>

<div class="row">
	<div class="container-fluid">
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>

<section class="content">

			<div class="panel">
				<div class="panel-heading">SIGA - Baja Activos</div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<div class="table-responsive">
							<table class="table table-striped" id="siga_biomedica_activos_baja">
                <thead>
                  <tr>
                    <th>Activo</th>
                    <th>Pasos</th>
                    <th>fecha_baja_solicitante</th>
                    <th>fechaBajaDireccion</th>
                    <th>fechaBajaContabilidad</th>

                    <th>NombreActivo</th>
                    <th>Id_Clasificacion</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>NumSerie</th>

                    <th>Id_Propiedad</th>
                    <th>Id_Tipo_Activo</th>
                    <th>DescCorta</th>
                    <th>Id_Ubic_Prim</th>
                    <th>Id_Ubic_Sec</th>

                    <th>fecha_alta</th>
                    <th>MontoFactura</th>
                </tr>
                </thead>
								<tbody>
                  <?php foreach($biomedicaInfo as $item) {?>
                  <tr>
                    <td><?php echo $item['AF_BC']; ?></td>
                    <td><?php echo $item['Paso']; ?></td>
                    <td><?php echo $item['fecha_baja_solicitante']; ?></td>
                    <td><?php echo $item['fechaBajaDireccion']; ?></td>
                    <td><?php echo $item['fechaBajaContabilidad']; ?></td>

                    <td><?php echo $item['NombreActivo']; ?></td>  
                    <td><?php echo $item['Id_Clasificacion']; ?></td>
                    <td><?php echo $item['marca']; ?></td>
                    <td><?php echo $item['Modelo']; ?></td>
                    <td><?php echo $item['NumSerie']; ?></td>

                    <td><?php echo $item['Id_Propiedad']; ?></td>
                    <td><?php echo $item['Id_Tipo_Activo']; ?></td>
                    <td><?php echo $item['DescCorta']; ?></td>
                    <td><?php echo $item['Id_Ubic_Prim']; ?></td>  
                    <td><?php echo $item['Id_Ubic_Sec']; ?></td>

                    <td><?php echo $item['fecha_alta']; ?></td>
                    <td><?php echo $item['MontoFactura']; ?></td>         
                  </tr>
                  <?php }?>
								</tbody>
                <tfoot>
                  <tr>
                    <th>AC FC</th>
                    <th>Pasos</th>
                    <th>fecha_baja_solicitante</th>
                    <th>fechaBajaDireccion</th>
                    <th>fechaBajaContabilidad</th>
                    
                    <th>Nombre Activo</th>
                    <th>Clasificación</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Serie</th>
                    
                    <th>Propiedad</th>
                    <th>Tipo</th>
                    <th>Desc Corta</th>
                    <th>U. Primaria</th>
                    <th>U. Secundaria</th>                    

                    <th>fch Alta</th>
                    <th>Monto Factura</th>
                </tr>
                </tfoot>
							</table>
  </div>
				<br>
				<br>
						
</section>

<div id="siga_div_baja_activos">
<!-- <a class="btn btn-success" download="activosBajas.xls" href="#" onclick="return ExcellentExport.excel(this,'siga_biomedica_activos_baja', 'Sheet Name Here');"><i class="fa fa-file-excel-o" aria-hidden="true"></i>Excel</a> -->

 <div class="table-responsive">

  <table class="table table-striped" id="table_siga_baja_activos">   
  </table>
  
</div>
  
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/excellentexport@3.4.3/dist/excellentexport.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.7/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/cr-2.0.2/fc-5.0.0/fh-4.0.1/r-3.0.2/datatables.min.js"></script>
<script>
//-------------------------------------------------------------------------	
$(document).ready(function() {

$('#siga_biomedica_activos_baja').DataTable({
  autoWidth: true,
  order: [[1, 'desc']],
  layout: {
        topStart: {
            buttons: ['excel']
        }
    },
  initComplete: function () {
        this.api()
            .columns()
            .every(function () {
                let column = this;
                let title = column.footer().textContent;
 
                // Create input element
                let input = document.createElement('input');
                input.placeholder = title;
                column.footer().replaceChildren(input);
 
                // Event listener for user input
                input.addEventListener('keyup', () => {
                    if (column.search() !== this.value) {
                        column.search(input.value).draw();
                    }
                });
            });
    }
});

//-------------------------------------------------------------------------
});	
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------

</script>