<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/biomedica/biomedica.class.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/admin/inventario/inventario.class.php");

$biomedicaClass         = new biomedica();
$biomedicaActivosInfo   = $biomedicaClass->getSigaActivosArea(1);

$inventarioClass        = new inventario();
?>

<section class="content">
  <div class="panel">
  
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<div class="table-responsive">
							<table class="table table-striped" id="siga_biomedica_activos">
                <thead>
                  <tr class="bg-chs-blue-01">
                    <th data-orderable="false"><input type="checkbox" name="siga_checkall" id="siga_checkall"></th>
                    <th>AF BC</th>
                    <th>Nombre_Activo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>NumSerie</th>

                    <th>Propiedad</th>
                    <th>U. Primaria</th>
                    <th>U. Secundaria</th>
                    <th>U. Especifica</th>

                    <th>Fch Alta</th>
                    <th>Fch Recep Equipo</th>
                    <th>Fch Operacion</th>
                    <th>Condicion Recepción</th>
                    <th>link</th>
                </tr>
                </thead>
								<tbody>
                  <?php foreach($biomedicaActivosInfo as $item) {?>
                  <tr>
                    <td><input type="checkbox" name="siga_id_activo" id="siga_id_activo" value="<?php echo $item['Id_Activo']; ?>"></td>
                    <td><?php echo $item['AF_BC']; ?></td>
                    <td><?php echo $item['Nombre_Activo']; ?></td>
                    <td><?php echo $item['Marca']; ?></td>
                    <td><?php echo $item['Modelo']; ?></td>
                    <td><?php echo $item['NumSerie']; ?></td>

                    <td><?php echo $item['Id_Propiedad']; ?></td>  
                    <td><?php echo $item['Id_Ubic_Prim']; ?></td>
                    <td><?php echo $item['Id_Ubic_Sec']; ?></td>
                    <td><?php echo $item['especifica']; ?></td>
                    
                    <td><?php echo $item['fecha_alta']; ?></td>
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

                    <td><?php if ($item['link'] != '') { echo "<a href=\"url\">link</a>"; }?></td>                    

                  </tr>
                  <?php }?>
								</tbody>
                <tfoot>
                  <tr class="bg-chs-blue-01">
                    <td data-orderable="false"></td>
                    <th>AC BC</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Serie</th>
                    
                    <th>Propiedad</th>
                    <th>U. Primaria</th>
                    <th>U. Secundaria</th>
                    <th>U. Especifica</th>                   
                    
                    <th>Fch Alta</th> 
                    <th>Fch Recep Equipo</th>                   
                    <th>Fch Operación</th>
                    <th>Condición</th>
                    <th>Link</th>                   
                    
                  </tr>
                </tfoot>
							</table>
              
            </div>
						
</section>

<script>

$(document).ready(function() {
  let Id_Area           = $("#idareasesion").val();
  let usuariosesion     = $("#usuariosesion").val();
  let nousuariosesion   = $('#nousuariosesion').val();
  


  $('#siga_biomedica_activos').DataTable({
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
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
});//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
</script>
