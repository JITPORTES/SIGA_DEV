<?php 
session_start();
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/archivosComunes.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/biomedica/rutinas/rutinas.class.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/class/utilities.class.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/biomedica/biomedica.class.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/catalogos.class.php");

$biomedicaClass = new biomedica();
$utilitiesClass = new utilities();
$rutinasClass   = new rutinas();
$catalogosClass = new catalogos();

$frecuenciasInfo            = $catalogosClass->getFrecuencia();
$biomedicaActivosInfo       = $biomedicaClass->getSigaActivosArea(1);
$Id_Usuario                 = $_SESSION["Id_Usuario"];
$sigaUsuarioPerfilPermiso 	= $utilitiesClass->getSigaPerfilPermisos($_SESSION["Id_Usuario"]);
$rutinasInfo                = $rutinasClass->sigaRutinas();

?>

<link rel="stylesheet" href="/siga/plugins/datatables2.0/datatables2.css">
<link rel="stylesheet" href="/siga/plugins/sweetalert2/sweetalert2.css">
<link rel="stylesheet" href="/siga/plugins/selectize/selectize.default.css">
<link rel="stylesheet" href="/siga/plugins/awesome/css/font-awesome.min.css">

<style>
 table {
  font-size: 12px;
  }
</style>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="container-fluid"><!------------------------------------------------------------------------------------------------------------------------------------>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<span id="siga_id_rutina_a_editar" style="display:none"></span>
<span id="siga_id_actividad_a_editar" style="display:none"></span>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="row"><!------------------------------------------------------------------------------------------------------------------------------------------------>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-- Botón Alta de rutina Inicio --------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Botón Alta de rutina Inicio --------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="box box-chs-01" id="siga_rutina_tabla_div">

  <div class="box-header">
      <h3 class="box-title">Rutinas</h3>
        <div class="box-footer bg-chs-blue-02">
          <?php if(in_array(29, $sigaUsuarioPerfilPermiso) || in_array(0, $sigaUsuarioPerfilPermiso)){ ?>
            <button type="button" class="btn btn-success btn-sm" id="siga_rutina_agregar_btn"><i class="fa fa-plus" aria-hidden="true"></i>  Agregar</button>
          <?php } ?>
        </div>
        <br>        
        <div class="box box-chs-01" id="tabla_mis_rutinas"></div>
  </div>

</div>

<!-- Botón Alta de rutina Fin --------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Botón Alta de rutina Fin --------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
</div><!----------------------------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-- Alta de rutina Inicio --------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Alta de rutina Inicio --------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="modal fade" role="dialog" id="siga_rutina_agregar">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-chs-blue-01">
        <h5 class="modal-title">Rutina / Alta</h5>
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

<!-- Alta de rutina fin --------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Alta de rutina fin --------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-- Baja de rutina inicio --------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Baja de rutina inicio --------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="modal fade modal-danger" id="siga_rutina_eliminar" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Rutina</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="siga_rutina_titulo_id" style="display: none;"></p>
        <p id="siga_rutina_titulo"></p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-outline" id="siga_rutinas_btn_eliminar">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<!-- Baja de rutina fin --------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Baja de rutina fin --------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-- Detalle de rutina Inicio --------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Detalle de rutina Inicio --------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="siga_rutina_detalle" aria-labelledby="" aria-hidden="true">

  <div class="modal-dialog modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><p id="siga_rutinas_titulo_detalle"></p></h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <table class="table table-striped" style="width:100%" id="id_alex">
        <thead>
          <tr>
            <th scope="col" style="width:50%">Nombre de Actividad</th>
            <th scope="col" style="width:30%">Valor Referencia</th>
            <th scope="col" style="width:10%">Valor Medio</th>
            <th scope="col" style="width:10%">Adjunto</th>
          </tr>
        </thead>
      </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>   
      </div>
    </div>
  </div>
</div>
<!-- Detalle de rutina Fin --------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Detalle de rutina Fin --------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-- Tabla de activos Inicio --------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Tabla de activos Inicio --------------------------------------------------------------------------------------------------------------------------------------------------------------->
<div id="siga_com_tabla_activos"></div>
<!-- Tabla de activos Fin --------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Tabla de activos Fin --------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-- Modal Bajas  ------------------------------------------------------------------------------------------------------------------------------------------------------------------>

<div id="siga_div_baja_activos">

  <div class="table-responsive">
    <table class="table table-striped" id="table_siga_baja_activos"></table>
  </div>
  
</div>

<!-- Modal asignar rutina ------------------------------------------------------------------------------------------------------------------------------------------------------------------>

<div class="modal fade" id="siga_rutina_modal_asignar" aria-labelledby="" aria-hidden="true">

  <div class="modal-dialog modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><p id="siga_rutinas_titulo_detalle"></p></h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="borradoDivActivos();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        
        <div class="form-group">
          <label for="recipient-name" class="col-form-label ">Rutina:</label>

          <select id="siga_cmb_rutinas" style="width:50%">
            <option value="-1" disabled Selected>Selecionar Rutina</option>
              <?php foreach($rutinasInfo as $item){ ?>
            <option value="<?php echo $item['siga_cat_rutinas_id']; ?>"><?php echo $item['siga_cat_rutinas_titulo']; ?></option>
              <?php }?>
          </select>
          <span id="siga_contador" style="display:none"></span>
        </div>
    

      <table class="table table-striped" style="width:100%" id="id_activos_para_rutina">
        <thead class="bg-chs-blue-01">
          <tr>
            <th scope="col" style="width:10%">AF BC</th>
            <th scope="col" style="width:30%">Activo</th>
            <th scope="col" style="width:10%">Fecha Programada</th>
            <th scope="col" style="width:10%">Frecuencia</th>
            <th scope="col" style="width:10%">Realiza </th>            
          </tr>
        </thead>
        <tbody id="id_activos_para_rutina_tbody">
        </tbody>
      </table>
    
    
    </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success btn-sm pull-left" id="siga_modal_asignar_guardar"><i class="fa fa-plus" aria-hidden="true"></i>  Guardar</button>
      <button type="button" class="btn btn-danger btn-sm pull-left" data-dismiss="modal" onclick="borradoDivActivos();"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>      
      </div>
    </div>

  </div>
</div>

<!-- Modal editar rutina ------------------------------------------------------------------------------------------------------------------------------------------------------------------>

<div class="modal fade" id="siga_rutina_modal_editar" aria-labelledby="" aria-hidden="true">

<div class="modal-dialog modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Actividades</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="tabla_rutinas_actividades_edit"></div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>   
      </div>
    </div>
  </div>
</div>

<!-- Modal editar rutina ------------------------------------------------------------------------------------------------------------------------------------------------------------------>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="siga_rutina_modal_edicion_actividad">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rutina - Actividad - Edición</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table style="width:100%">
          <tbody>
            <tr>
              <td>Actividad:</td>
              <td>
              <p id="siga_id_actividad_editar" style="display:none"></p>  
              <input type="text" class="form-control" placeholder="Obligatorio...." name="siga_rutina_act_desc" id="siga_rutina_act_desc" size="50">
              </td>
            </tr>
            <tr>
              <td>Actividad:</td>
              <td><input type="text" class="form-control" name="siga_rutina_act_valor_ref" id="siga_rutina_act_valor_ref" size="50"></td>
            </tr>
            <tr>
              <td>Valor Medio:</td>
              <td><input class='form-check-input col-lg-offset-4' type='checkbox' name="siga_rutina_act_valor_medio" id="siga_rutina_act_valor_medio"></td>
            </tr>
            <tr>
              <td>Valor Adjunto:</td>
              <td>
                <input class='form-check-input col-lg-offset-4' type='checkbox' name="siga_rutina_act_adjunto" id="siga_rutina_act_adjunto"></p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-sm pull-left" id="siga_actividades_actualizar_guardar"> Actualizar</button>
        <button type="button" class="btn btn-danger btn-sm pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
	</div>
</div>
	
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
	</div>
</div><!-- /.row -->


<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
</div><!----------------------------------------------------------------------------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

<script src="/siga/plugins/datatables2.0/datatable2.js"></script>
<script src="/siga/plugins/sweetalert2/sweetalert2.js"></script>
<script src="/siga/class/fx.js"></script>
<script src="/siga/plugins/selectize/selectize.js"></script>
<script src="/siga/js/Funciones.js"></script>


<script>

$(document).ready(function() {

  $('#siga_com_tabla_activos').load('/siga/vistas/view/biomedica/components/rutinas/siga_rutinas_activos.com.php');

  $('#siga_cmb_rutinas').selectize();

  $("#siga_checkall").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
  });

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


$('#siga_rutinas_btn_eliminar').on('click', function(){
  
  let siga_rutina_titulo_id = $('#siga_rutina_titulo_id').html();
  
  $.ajax({
    type: "POST",
    url: "/siga/class/biomedica/rutinas/rutinas.ajax.php",
    data: {accion:3,siga_rutina_titulo_id:siga_rutina_titulo_id,Id_Usuario:Id_Usuario},
    dataType: "JSON",
    cache: false,
    success: function (response) {
      cargaPhp();
    }
  });
  $('#siga_rutina_eliminar').modal('hide');
});

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------

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

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

$('#siga_modal_asignar_guardar').on('click', function(){

  let validar  = true;
  let siga_cmb_rutinas = $('#siga_cmb_rutinas').val();
  let siga_cmb_rutinasD= $('#siga_cmb_rutinas').text();
  let siga_contador    = $('#siga_contador').text();
  let Id_Usuario       = <?php echo $Id_Usuario;?>;
  let array            = new Array(); 

  if(siga_cmb_rutinas==-1){
    alerta('error','Debe seleccionar una rutina');
    validar = false;
  }

  for(let i = 1; i <= siga_contador; ){
    array.push({id_activo: $('#siga_id_activo'+i).val(), Frecuencia: $('#siga_frecuencia'+i).val(), fecha: $('#fecha'+i).val(), realiza: $('#siga_realiza'+i).val() });          
    i++
  }

  if(validar){
    
    $.ajax({
      type: "POST",
      url: "/siga/class/biomedica/rutinas/rutinas.ajax.php",
      data: {accion:6, array:array,siga_cmb_rutinas:siga_cmb_rutinas,siga_cmb_rutinasD:siga_cmb_rutinasD,Id_Usuario:Id_Usuario},
      dataType: "JSON",
      cache: false,
      beforeSend: function(){
        jsShowWindowLoad("Por favor espere, procesando información");
      },
      success: function (response) {
        $('#siga_com_tabla_activos').load('/siga/vistas/view/biomedica/components/rutinas/siga_rutinas_activos.com.php');            
          $('#siga_rutina_modal_asignar').modal('hide');
          jsRemoveWindowLoad();
      },
      error : function(response) {          
        alerta('error','Contacte a sistemas.');
        jsRemoveWindowLoad();
				}
    });   
  }
});

//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------

$('#siga_actividades_actualizar_guardar').on('click', function(){
let siga_id_actividad_editar    = $('#siga_id_actividad_editar').html();
let validar                     = true;
let siga_rutina_act_desc        = $('#siga_rutina_act_desc').val();
let siga_rutina_act_valor_ref   = $('#siga_rutina_act_valor_ref').val();
let siga_rutina_act_valor_medio = $('#siga_rutina_act_valor_medio').is(':checked')
let siga_rutina_act_adjunto     = $('#siga_rutina_act_adjunto').is(':checked')

if(siga_id_actividad_editar==''){
  alerta('error','Error, sesión vencida');
  validar = false;
}else if(siga_rutina_act_desc ==''){
  alerta('error','Se requiere de seleccionar un activo');
  validar = false;
}

if(siga_rutina_act_valor_medio==true){
  siga_rutina_act_valor_medio=1;
}else{
  siga_rutina_act_valor_medio=0;
}

if(siga_rutina_act_adjunto==true){
  siga_rutina_act_adjunto=1;
}else{
  siga_rutina_act_adjunto=0;
}

if(validar){

  $.ajax({
    type: "POST",
    url: "/siga/class/biomedica/rutinas/rutinas.ajax.php",
    data: {accion:8, 
            siga_id_actividad_editar:siga_id_actividad_editar,
            siga_rutina_act_desc:siga_rutina_act_desc,
            siga_rutina_act_valor_ref:siga_rutina_act_valor_ref,
            siga_rutina_act_valor_medio:siga_rutina_act_valor_medio,
            siga_rutina_act_adjunto:siga_rutina_act_adjunto},
    dataType: "JSON",
    beforeSend:function(){
      $('#siga_actividades_actualizar_guardar').attr('disabled',true);
      $('#siga_actividades_actualizar_guardar').html('Procesando');
    },
    success: function (response) {
      $('#tabla_rutinas_actividades_edit').hide().load('/siga/vistas/view/biomedica/rutinas/siga_rutina_actividades_div.php').fadeIn('500');
      $('#siga_rutina_modal_edicion_actividad').modal('hide');
    },
    error: function(response){
      alerta('error', 'error'+response);
      $('#siga_actividades_actualizar_guardar').attr('disabled',false);
    }
  });

}


});

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
});	
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------

function siga_rutinas_eliminar(siga_rutinas_id,siga_cat_rutinas_titulo){
  $('#siga_rutina_eliminar').modal('show');
  $('#siga_rutina_titulo').html(siga_cat_rutinas_titulo);
  $('#siga_rutina_titulo_id').html(siga_rutinas_id);
}

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
                    {"data" : "siga_cat_rutinas_act_desc"},
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
function siga_rutinas_editar(siga_rutinas_id){
  $('#siga_id_rutina_a_editar').html(siga_rutinas_id);  
  $('#tabla_rutinas_actividades_edit').load('/siga/vistas/view/biomedica/rutinas/siga_rutina_actividades_div.php');
  $('#siga_rutina_modal_editar').modal('show');
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function cargaPhp(){
  $('#tabla_mis_rutinas').load('/siga/vistas/view/biomedica/rutinas/siga_rutina_php_div.php');
}

//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function borradoDivActivos(){
  $('#id_activos_para_rutina_tbody').html('');  
}

</script>