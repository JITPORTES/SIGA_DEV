<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/biomedica/biomedica.class.php");
$biomedicaClass = new biomedica();

$biomedicaActivosInfo       = $biomedicaClass->getSigaActivosArea(1);
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
            <br>
              <button type="button" class="btn btn-success btn-sm" id="siga_modal_asignar"><i class="fa fa-plus" aria-hidden="true"></i>  Asignar</button>
				    <br>
						
</section>

<script>


$(document).ready(function() {

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

$('#siga_modal_asignar').on('click', function(){
  $('#id_activos_para_rutina_tbody').html('');
  let siga_ids_activos 	= [];
  let validar = true;
  
  $("input[name=siga_id_activo]:checked").each(function(){
    siga_ids_activos.push(this.value);
	});

  if(siga_ids_activos == ''){
      alerta('error','Se requiere de seleccionar un activo');
    validar=false;
  }

  if(validar){
    $('#siga_rutina_modal_asignar').modal('show');

    $.ajax({
      type: "POST",
      url: "/siga/class/biomedica/rutinas/rutinas.ajax.php",
      data: {accion:5,siga_ids_activos:siga_ids_activos},
      dataType: "JSON",
      success: function (response) {        
        
        let activosEncontrados = [];
        let i=1;
        response.forEach(function(activos, index) {
          activosEncontrados.push("<tr>");          
          activosEncontrados.push("<td>"+activos.AF_BC+"<input type='hidden' name='siga_id_activo"+i+"' id='siga_id_activo"+i+"' value='"+activos.Id_Activo+"'></td>");
          activosEncontrados.push("<td>"+activos.Nombre_Activo+"</td>");
          activosEncontrados.push("<td><input type='date' name='fecha"+i+"' id='fecha"+i+"' style='' onkeydown='return false'; required value='<?php echo date('Y-m-d')?>'></td>");
          activosEncontrados.push("<td><select id='siga_frecuencia"+i+"' name='siga_frecuencia"+i+"'><option value='2'>MENSUAL</option><option value='3'>BIMESTRAL</option><option value='4'>TRIMESTRAL</option><option value='5'>CUATRIMESTRAL</option><option value='6'>SEMESTRAL</option><option value='7'>ANUAL</option></select></td>");
          activosEncontrados.push("<td><select id='siga_realiza"+i+"' name='siga_realiza"+i+"'><option value='0'>Interno</option><option value='1'>Externo</option></select></td>");          
          activosEncontrados.push("</tr>");
          $('#siga_contador').text(i);
          i++;
        });
            
      $('#id_activos_para_rutina_tbody').html(activosEncontrados);

        $('input[name="siga_id_activo"]').each(function(){
          this.checked = false;
        });

        $('input[name="siga_checkall"]').each(function(){
          this.checked = false;
        });
        

      }

    });

  }

});


//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
});//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
</script>
