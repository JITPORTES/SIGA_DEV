<?php 
session_start();
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/archivosComunes.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/biomedica/biomedica.class.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/class/utilities.class.php");

$utilitiesClass 						= new utilities();
$sigaUsuarioPerfilPermiso 	= $utilitiesClass->getSigaPerfilPermisos($_SESSION["Id_Usuario"]);

$biomedicaClass       = new biomedica();
$biomedicaActivosInfo = $biomedicaClass->getSigaActivosArea(1);
?>

<link href="/siga/plugins/datatables2.0/datatables2.css" rel="stylesheet">

<style>
 table {
  font-size: 11px;
  }
</style>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="container-fluid"><!------------------------------------------------------------------------------------------------------------------------------------>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->


<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="row"><!------------------------------------------------------------------------------------------------------------------------------------------------>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->




<div class="box box-chs-01">
    <div class="box-header">
    <h3 class="box-title">Rutinas</h3>
      <div class="box-footer bg-chs-blue-02">      
        
      </div>
      <br>
      <table class="table table-striped" style="width:100%" id='siga_tabla_rutina'>
          <thead class="bg-chs-blue-01">
            <tr>
              <th style="width:85%;text-align: left;">Rutina</th>
              <th style="width:5%" data-orderable="false"></th>
              <th style="width:5%" data-orderable="false"></th>
              <th style="width:5%" data-orderable="false"></th>
            </tr>         
          </thead>
          <tbody>
            <tr>
              <td>nombre de rutina</td>
              <td><button type="button" class="btn btn-primary btn-sm">Editar</button></td>
              <td><button type="button" class="btn btn-warning btn-sm">Detalle</button></td>
              <td><button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
            </tr>
          </tbody>
          <tfoot>
          <tr>
              <th style="width:85%;text-align: left;">Rutina</th>
              <th style="width:5%" data-orderable="false"></th>
              <th style="width:5%" data-orderable="false"></th>
              <th style="width:5%" data-orderable="false"></th>
            </tr>    
          </tfoot>
        </table>
    </div>
  </div>



<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
</div><!----------------------------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-- Modal Agregar Inicio --------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="modal fade" tabindex="-1" role="dialog" id="siga_rutina_agregar">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-chs-blue-01">
        <h5 class="modal-title">Rutina / Alta</h5>
      </div>
      <div class="modal-body">
        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>  Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">  Cerrar</button>
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
  
//-------------------------------------------------------------------------	
$(document).ready(function() {

$('#siga_tabla_rutina').DataTable({
  order: [[0, 'desc']],
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

$('#siga_prueba_alex').on('click', function(){

  $('#siga_rutina_agregar').modal('show');

});


//-------------------------------------------------------------------------
});	
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------

</script>