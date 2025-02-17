<?php 
session_start();
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/archivosComunes.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/biomedica/biomedica.class.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/class/utilities.class.php");
$Id_Usuario = $_SESSION["Id_Usuario"];
$utilitiesClass 						= new utilities();
$sigaUsuarioPerfilPermiso 	= $utilitiesClass->getSigaPerfilPermisos($_SESSION["Id_Usuario"]);

$biomedicaClass = new biomedica();
$biomedicaInfo  = $biomedicaClass->getSigaTicketPorCerrar();

?>

<link href="/siga/plugins/datatables2.0/datatables2.css" rel="stylesheet">

<style>
 table {
  font-size: 12px;
  }
</style>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="container-fluid"><!------------------------------------------------------------------------------------------------------------------------------------>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->


<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="row"><!------------------------------------------------------------------------------------------------------------------------------------------------>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="box box-chs-01" id="siga_rutina_tabla_div">

  <div class="box-header">
    <h3 class="box-title">Ticket por Calificar</h3>
  </div>

<table class="table table-light">
  <thead>
    <tr>
      <td></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
    </tr>
  </tbody>
</table>

</div>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
</div><!----------------------------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-- Modal Agregar Inicio --------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="modal fade" role="dialog" id="siga_tickets_agregar">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-chs-blue-01">
        <h5 class="modal-title">Calificar Ticket</h5>
      </div>
      <div class="modal-body">
        
    
      <div class="form-group" id="siga_rutinas_nombre">
        <label>Nombre de Rutina:</label>
          <input type="text" class="form-control" placeholder="Nombre Rutina" id="siga_rutinas_descripcion" name="siga_rutinas_descripcion">
      </div>

        
        <table class="table table-striped" id="siga_table_actividades">
              <colgroup>
                  <col width="5%">
                  <col width="40%">
                  <col width="30%">
                  <col width="12%">
                  <col width="13%">

              </colgroup>
              <thead class="bg-chs-blue-02 fw-semibold text-white" style="color:white;">
                  <tr>
                      <th class="text-center">
                          <div class="form-check">
                              <!-- <input class="form-check-input" type="checkbox" id="SelectAll"> -->
                          </div>
                      </th>
                      <th class="text-center text-white">Nombre de Actividad</th>
                      <th class="text-center text-white">Valor Referencia</th>
                      <th class="text-center text-white">Valor Medido ¿Obligatorio?</th>
                      <th class="text-center text-white">Adjunto ¿Obligatorio?</th>
                  </tr>
              </thead>
              <tbody>

              </tbody>
          </table>


      <button type="button" class="btn btn-primary btn-sm" id="siga_rutinas_actividades_agregar_btn"><i class="fa fa-plus" aria-hidden="true"></i>  Agregar Actividad</button>
      <button type="button" class="btn btn-danger btn-sm" id="siga_rutinas_actividades_eliminar_btn"><i class="fa fa-times" aria-hidden="true"></i>  Eliminar Actividad</button>

    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-sm" id="siga_rutinas_guardar_btn" name="siga_rutinas_guardar_btn"><i class="fa fa-plus" aria-hidden="true"></i>  Guardar</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">  Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Agregar Fin ------------------------------------------------------------------------------------------------------------------------------------------------------------------>


<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
</div><!----------------------------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

<script src="/siga/plugins/datatables2.0/datatable2.js"></script>

<script>

$(document).ready(function() {
  let i=0;
  let Id_Usuario = <?php echo $Id_Usuario;?>;
  cargaPhp();
  $('#siga_rutina_titulo').val();

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------  
$('#siga_rutina_agregar_btn').on('click', function(){

  $('#siga_rutina_agregar').modal('show');
  $('#siga_table_actividades tbody').html('');
  $('#siga_rutinas_descripcion').val('');
  $('#siga_rutinas_nombre').attr('class','form-group');
  i=0;
  
});

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        $('#siga_rutinas_actividades_agregar_btn').click(function() {
          i=i+1;
            var tr = $("<tr>")
            tr.append("<td><div class='form-check text-center'><input class='form-check-input row-item' type='checkbox'></div></td>")
            tr.append(`<td><input type="text" class="form-control" placeholder="Actividad...." name="siga_rutina_actividad${i}" id="siga_rutina_actividad${i}" value=""></td>`)           
            tr.append(`<td><input type="text" class="form-control" placeholder="Valor Referencia...." name="siga_rutina_valor_referenciado${i}" id="siga_rutina_valor_referenciado${i}" value=""></td>`)
            tr.append(`<td><center><input class='form-check-input col-lg-offset-4' type='checkbox' id="siga_rutina_valor_medio${i}" name="siga_rutina_valor_medio${i}"></center></td>`)
            tr.append(`<td><center><input class='form-check-input col-lg-offset-4' type='checkbox' id="siga_rutina_adjunto${i}" name="siga_rutina_adjunto${i}"></center></td>`)
            $('#siga_table_actividades tbody').append(tr)            

            // Row Item Change Event Listener
            $('tr').find('.row-item').change(function() {
                if ($(".row-item").length == $(".row-item:checked").length) {
                    $('#SelectAll').prop('checked', true)
                } else {
                    $('#SelectAll').prop('checked', false)
                }
            })

        });

        // Remove Selected Table Row(s)
      
        $('#siga_rutinas_actividades_eliminar_btn').click(function() {
          
            var count = $('.row-item:checked').length
            i=i-count;
          
            if (count <= 0) {
                alert("Selecciona el registro a eliminar.")
            } else {
                $('.row-item:checked').closest('tr').remove()
            }
        })

        // Select All
        $('#SelectAll').change(function() {
            if ($(this).is(':checked') == true) {
                $('.row-item').prop("checked", true)
            } else {
                $('.row-item').prop("checked", false)
            }
        });
        
        // Row Item Change Event Listener
        $('.row-item').change(function() {

            if ($(".row-item").length == $(".row-item:checked").length) {
                $('#SelectAll').prop('checked', true)
            } else {
                $('#SelectAll').prop('checked', false)
            }
        });

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------

$('#siga_rutinas_guardar_btn').on('click', function(){

let siga_rutina_array=[];
let x=1;
let siga_rutinas_descripcion = $('#siga_rutinas_descripcion').val();
let validar = true;
let Id_Usuario = <?php echo $Id_Usuario;?>;

if(siga_rutinas_descripcion ==''){
  $('#siga_rutinas_nombre').attr('class','form-group has-error');
  $('#siga_rutinas_nombre').on('focus');  
  validar = false;
}

    if(validar){

        while (x <= i) {
          let siga_rutina_actividad           = $('#siga_rutina_actividad'+x).val();
          let siga_rutina_valor_referenciado  = $('#siga_rutina_valor_referenciado'+x).val();
          let siga_rutina_valor_medio         = $('#siga_rutina_valor_medio'+x).is(":checked");
          let siga_rutina_adjunto             = $('#siga_rutina_adjunto'+x).is(":checked");
          siga_rutina_array.push({key:siga_rutina_actividad,key2:siga_rutina_valor_referenciado,key3:siga_rutina_valor_medio,key4:siga_rutina_adjunto,key4:siga_rutina_adjunto});
          x++;
        }

          $.ajax({
              type: "POST",
              url: "/siga/class/biomedica/rutinas/rutinas.ajax.php",
              data:  {'array': JSON.stringify(siga_rutina_array),siga_rutinas_descripcion:siga_rutinas_descripcion,accion:1,Id_Usuario:Id_Usuario},
              dataType: "JSON",
              success: function (response) {
                $('#siga_rutina_agregar').modal('hide');
                cargaPhp();
              },
                  error:function(response){
                    alert('Error en la carga ');
                    $('#siga_rutina_agregar').modal('hide');
                  }
          });
      }

});

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
});	
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------


//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function siga_rutinas_info(siga_rutinas_id,siga_cat_rutinas_titulo){

  $('#siga_rutinas_titulo_detalle').val(siga_cat_rutinas_titulo);
  
  $.ajax({
    type: "POST",
    url: "/siga/class/biomedica/rutinas/rutinas.ajax.php",
    data: {accion:4,siga_rutinas_id:siga_rutinas_id},
    dataType: "JSON",
    success: function (response) {

      $('#id_alex').dataTable( {
                data : response,
                destroy:true,
                processing: true,
                columns: [
                    {"data" : "Paso"},
                    {"data" : "siga_cat_rutinas_act_valor_ref"},
                    {"data" : "valor_medio"},
                    {"data" : "valor_adjunto"}
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

            $('#siga_rutina_detalle').modal('show'); 
    }
  });
  

}


//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function cargaPhp(){
  $('#tabla_mis_rutinas').load('/siga/vistas/view/biomedica/siga_cierre_ticket_ved/siga_rutina_php_div.php');
}

</script>