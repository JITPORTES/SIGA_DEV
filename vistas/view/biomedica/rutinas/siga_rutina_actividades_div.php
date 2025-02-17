<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/biomedica/rutinas/rutinas.class.php");
$rutinasClass = new rutinas();

//$rutinasDatos = $rutinasClass->sigaRutinasInfo(40);

?>

<table class="table table-striped" style="width:100%" id="siga_table_actividades_editar">
  <thead>
    <tr>
      <th scope="col" style="width:40%">Nombre de Actividad</th>
      <th scope="col" style="width:30%">Valor Referencia</th>
      <th scope="col" style="width:10%">Valor Medio</th>
      <th scope="col" style="width:10%">Adjunto</th>
      <th scope="col" style="width:10%">Acción</th> 
    </tr>
  </thead>
</table>

<script>

$(document).ready(function() {

let siga_id_rutina_a_editar = $('#siga_id_rutina_a_editar').text();

  $.ajax({
  type: "POST",
  url: "/siga/class/biomedica/rutinas/rutinas.ajax.php",  
  data: {accion:4, siga_rutinas_id:siga_id_rutina_a_editar},
  dataType: "JSON",
  cache: false,
  success: function (response) {   

  $('#siga_table_actividades_editar').dataTable( {
                data : response,
                destroy:true,
                processing: true,
                columns: [
                    {"data" : "siga_cat_rutinas_act_desc"},
                    {"data" : "siga_cat_rutinas_act_valor_ref"},
                    {"data" : "valor_medio"},
                    {"data" : "valor_adjunto"},
                    {"data" : ""}
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
                        columnDefs: [
                        {
                          targets: -1,
                          orderable: false,
                          data: null,
                          render: function (data, type, row, meta) {
                            let fila = meta.row;
                            let botones = `
                              <button class='btn btn-primary btn-circle' onclick='mostrar_tabla_activos(`+response[fila].id_actividad+`); return false;'><i class="fa fa-list" style="font-size:15px;"></i></button>`;
                            return botones;
                            }
                          }
                        ],
            
            });

  },
  error:function(response){
    alert(response);
  }
});

//------------------------------------------------------------------------------------------------------------------------------------------------------
});
//------------------------------------------------------------------------------------------------------------------------------------------------------

function mostrar_tabla_activos(id){

  $('#siga_actividades_actualizar_guardar').attr('disabled',false);
  $('#siga_actividades_actualizar_guardar').html(' Actualizar');

  $.ajax({
    type: "POST",
    url: "/siga/class/biomedica/rutinas/rutinas.ajax.php",
    data: {accion:7, id:id},
    dataType: "JSON",
    cache: false,
      success: function(response) {
        
        $('#siga_rutina_act_desc').val(response.siga_cat_rutinas_act_desc);
        $('#siga_rutina_act_valor_ref').val(response.siga_cat_rutinas_act_valor_ref);        
        $('#siga_id_actividad_editar').html(response.siga_cat_rutinas_act_id);
        
        let valor_medio   = Number(response.siga_cat_rutinas_act_valor_medio);
        let valor_adjunto = Number(response.siga_cat_rutinas_act_adjunto);
        
        if(valor_medio==1){ $('#siga_rutina_act_valor_medio').prop('checked',true);
        }else{ $('#siga_rutina_act_valor_medio').prop('checked',false); }
        
        if(valor_adjunto==1){ $('#siga_rutina_act_adjunto').prop('checked',true);
        }else{ $('#siga_rutina_act_adjunto').prop('checked',false); }
      },
      error:function(response){
        console.log(response);
      }
  });

  $('#siga_rutina_modal_edicion_actividad').modal('show'); 
}



</script>