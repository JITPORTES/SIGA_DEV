<?php
session_start();
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/archivosComunes.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/biomedica/biomedica.class.php");

$biomedicaClass       = new biomedica();
$biomedicaActivosInfo = $biomedicaClass->getSigaActivosArea(1);

?>

<link href="/siga/plugins/datatables2.0/datatables2.css" rel="stylesheet">

<style>
  table {
  font-size: 11px;
}
</style>

<div class="container-fluid">

<div class="row">
	<div class="container-fluid">
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>

<section class="content ">
  <div class="panel">
    <div class="panel-heading"></div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<div class="table-responsive">
							<table class="table table-striped" id="siga_dt_activos" width="100%">
                <thead class="">
                  <tr>
                    <th>Activo</the=>
                    <th>Nombre_Activo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>NumSerie</th>

                    <th>Propiedad</th>
                    <th>U. Primaria</th>
                    <th>U. Secundaria</th>
                    <th>U. Especifica</th>
                    <th>Responsable</th>

                    <th>Fch Alta</th>
                    <th>Fch Recep Equipo</th>
                    <th>Fch Operacion</th>
                    <th>Condicion Recepción</th>
                    <th>link</th>

                    <th>ValeResguardo</th>
                    <th>Importe Factura</th>
                    <th>Importe Reposición</th>
                    <th>VidaUtilCHS</th>
                </tr>
                </thead>
								<tbody>
                  <?php foreach($biomedicaActivosInfo as $item) {?>
                  <tr>
                    <td><?php echo $item['AF_BC'];?></td>
                    <td><?php echo $item['Nombre_Activo'];?></td>
                    <td><?php echo $item['Marca'];?></td>
                    <td><?php echo $item['Modelo'];?></td>
                    <td><?php echo $item['NumSerie'];?></td>

                    <td><?php echo $item['Id_Propiedad'];?></td>
                    <td><?php echo $item['Id_Ubic_Prim'];?></td>
                    <td><?php echo $item['Id_Ubic_Sec'];?></td>
                    <td><?php echo $item['especifica'];?></td>
                    <td><?php echo $item['Nombre_Completo'];?></td>
                    <td><?php echo $item['fecha_alta'];?></td>
                    <td><?php
                    if($item['fch_recepcion_equipo']!=''){
                      echo date('Y/m/d', strtotime(str_replace('/','-', $item['fch_recepcion_equipo'])));
                    }else{
                      echo 'S/F';
                    }?></td>
                    <td><?php
                    if($item['fch_operacion']!=''){
                      echo date('Y/m/d', strtotime(str_replace('/','-', $item['fch_operacion'])));
                    }else{
                      echo 'S/F';
                    }?></td>
                    <td><?php echo $item['condicion_recepcion']; ?></td>

                    <td><?php if ($item['link'] != '') { echo "<a href=\"url\">link</a>";}?></td>
                    <td><?php echo $item['ValeResguardo'];?></td>
                    <td><?php echo $item['MontoFactura'];?></td>
                    <td><?php echo intval($item['siga_activo_valor_de_reposicion']);?></td>
                    <td><?php echo $item['VidaUtilCHS'];?></td>
                  </tr>
                  <?php }?>
								</tbody>
                <tfoot>
                  <tr class="bg-chs-blue-01">
                    <th>AC FC</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Serie</th>

                    <th>Propiedad</th>
                    <th>U. Primaria</th>
                    <th>U. Secundaria</th>
                    <th>U. Especifica</th>
                    <th>Responsable</th>

                    <th>Fch Alta</th>
                    <th>Fch Recep Equipo</th>
                    <th>Fch Operación</th>
                    <th>Condición</th>

                    <th>Link</th>
                    <th>Vale de resguardo</th>

                    <th>Importe Factura</th>
                    <th>Importe Reposición</th>
                    <th>Vida Útil</th>
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

<script src="/siga/plugins/datatables2.0/datatable2.js"></script>
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<script>
//-------------------------------------------------------------------------
$(document).ready(function() {



$('#siga_dt_activos').DataTable({
  autoWidth: false,
  layout: {
    bottomStart: {
            buttons: ['excel']
        }
    },
  aLengthMenu: [
        [10,25, 50, 100, 200, -1],
        [10,25,50,100,200,"All"]
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

          initComplete: function () {
            count = 0;
            this.api().columns().every( function () {
                var title = this.header();
                //replace spaces with dashes
                title = $(title).html().replace(/[\W]/g, '-');
                var column = this;
                var select = $('<select id="' + title + '" class="select2"></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                      //Get the "text" property from each selected data
                      //regex escape the value and store in array
                      var data = $.map( $(this).select2('data'), function( value, key ) {
                        return value.text ? '^' + $.fn.dataTable.util.escapeRegex(value.text) + '$' : null;
                                 });

                      //if no data selected use ""
                      if (data.length === 0) {
                        data = [""];
                      }

                      //join array into string with regex or (|)
                      var val = data.join('|');

                      //search for the option(s) selected
                      column
                            .search( val ? val : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' );
                } );

              //use column title as selector and placeholder
              $('#' + title).select2({
                multiple: true,
                closeOnSelect: false,
                placeholder: "Seleccionar"
              });

              //initially clear select otherwise first option is selected
              $('.select2').val(null).trigger('change');
            } );
        }
  });

//-------------------------------------------------------------------------
});
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------

</script>