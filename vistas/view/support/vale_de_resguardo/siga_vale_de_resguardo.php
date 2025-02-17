<?php 
session_start();
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/archivosComunes.php");
//include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/tic/tic.class.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/catalogos.class.php");

$catalogosClass = new catalogos();

$catalogosUsuVigentes = $catalogosClass->getSigaUsuariosVigentes();

$titulo ="Vale de Resguardo ";

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
    <h3 class="box-title"><?php echo $titulo;?></h3>
      <div class="box-footer bg-chs-blue-02">      
      <select class="form-control" id="siga_colaborador_select2" name="siga_colaborador_select2" style="width: 35%;">
          <option value="0" disabled selected>Selecionar Colaborador</option>
          <?php foreach ($catalogosUsuVigentes as $value) { ?>
            <option value="<?php echo $value['No_Usuario'];?>"><?php echo $value['No_Usuario'];?>-<?php echo $value['Nombre_Usuario'];?></option>
          <?php  } ?>
            
        </select>

      <button type="button" class="btn btn-success btn-sm" id="siga_vale_resguardo_btn_generar" name="siga_vale_resguardo_btn_generar"><i class="fa fa-plus" aria-hidden="true"></i> Generar</button>

      </div>
      <br>        
      <table class="table table-striped" style="width:100%" id='siga_tabla_rutina'>
          <thead class="bg-chs-blue-01">
            <tr>
              <th style="width:85%;text-align: left;">Vales</th>              
              <th style="width:5%" data-orderable="false"></th>
              <th style="width:5%" data-orderable="false"></th>
            </tr>         
          </thead>
          <tbody>
            <tr>
              <td>Vales de Resgurado</td>              
              <td><button type="button" class="btn btn-warning btn-sm">Detalle</button></td>
              <td><button type="button" class="btn btn-danger btn-sm">PDF</button></td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>



<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
</div><!----------------------------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-- Modal Agregar Inicio --------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="modal fade" tabindex="-1" role="dialog" id="siga_vale_resguardo_agregar_modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-chs-blue-01">
        <h5 class="modal-title"><?php echo $titulo; ?> / Alta</h5>
      </div>
      <div class="modal-body">
        
    <div class="form-control">
      <label>
        <input type="radio" name="r3" class="flat-red" id="siga_vale_resguardo_colaborador">
          Colaborador
      </label>

      <label>
        <input type="radio" name="r3" class="flat-red" id="siga_vale_resguardo_area">
          Área
      </label>
    </div>
    <br>

    <div id="siga_vale_resguardo_colaborador_div">

    </div>

<!--  -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Generar</button>
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
  
//-------------------------------------------------------------------------	
$(document).ready(function() {

$('#siga_vale_resguardo_colaborador_div').hide();

$('#siga_colaborador_select2').select2();

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

    });



$('#siga_vale_resguardo_btn_generar').on('click', function(){

    let siga_numero_empleado = $('#siga_colaborador_select2').val();
    let validar = true;
    
    if(siga_numero_empleado == null){
      alert('Error');
      validar= false;
    }

    if(validar){
      
      $.ajax({
        type: "POST",
        url: "/siga/class/tic/ajax/vale_de_resguardo.ajax.php",
        data: {accion:1, siga_numero_empleado:siga_numero_empleado},
        dataType: "JSON",
        cache: false,
        success: function (response) {
          console.log(response);
        }
      });

    }

  //$('#siga_vale_resguardo_agregar_modal').modal('show');
});

$('#siga_vale_resguardo_colaborador').on('click', function(){  
  $('#siga_vale_resguardo_colaborador_div').show();
});

$('#siga_vale_resguardo_area').on('click', function(){
  $('#siga_vale_resguardo_colaborador_div').hide();
});


//-------------------------------------------------------------------------
});	
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------

</script>