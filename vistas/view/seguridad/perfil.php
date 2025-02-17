<?php session_start();
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/archivosComunes.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/catalogos.class.php");

$catalogosClass = new catalogos();
$permisosInfo = $catalogosClass->getSigaPermisos();

?>
<div class="row">
	<div class="container">
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>

			<div class="panel">
				<div class="panel-heading bg-info">SIGA - Perfíl</div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
					<br>
						<button type="button" class="btn btn-primary btn-sm" id='siga_perfil_agregar'> + Agregar Perfíl</button>
           		<br><br>
							<table class="table table-striped" id='datatable_siga_permisos'>
								<thead class="thead-light">
									<tr>
										<th>Rol</th><th>Acción</th>
									</tr>
								</thead>
								<tbody>
									<!-- <?php foreach ($permisosInfo as $item) { ?>                    
                  <tr>
										<td><?php echo $item['siga_permiso_desc'];?></td>
										<td></td>
									</tr>
                  <?php }?> -->
								</tbody>
							</table>
					<br>
				<br>
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

<div class="modal fade" id="sigaMenuModalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLabel">SIGA - Agregar Permisos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="form-group" id='siga_permiso_descripcion_div'>
            <label for="recipient-name" class="col-form-label">Permisos</label>
              <input type="text" class="form-control" id="siga_permiso_descripcion">
          </div>

          <div class="form-group" id="siga_permiso_menu_select_div">
            <label>Menú</label>
            <select class="form-control" id="siga_menu">
              <option value="0">Seleccionar</option>
              <?php foreach($menuInfo as $item){?>
                <option value="<?php echo $item[0];?>"><?php echo $item[1];?></option>
              <?php }?>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id='siga_btn_permiso_alta'> + Agregar</button>
      </div>
    </div>
  </div>
</div>

<!-------------------------------------------------------------------------------------------------------------------------------------------------------------  -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------  -->
<!-------------------------------------------------------------------------------------------------------------------------------------------------------------  -->

<script>
//-------------------------------------------------------------------------	
$(document).ready(function() {
  
  //--------------------------------------------------------------------------------------------------------------------
	$("#datatable_siga_permisos").DataTable({
        order: [[0, 'DESC']],
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

  //--------------------------------------------------------------------------------------------------------------------

$('#siga_div_tabla').hide();

let area 	      = $('#idareasesion').val();
let Id_Usuario  = <?php echo $_SESSION["Id_Usuario"];?>;
let validar     = true;

$('#siga_btn_permiso_alta').on('click', function(){

  let siga_permiso_descripcion  = $('#siga_permiso_descripcion').val();
  let siga_menu                 = $('#siga_menu').val();

  if(siga_permiso_descripcion == ''){
    $('#siga_permiso_descripcion_div').attr('class','form-group has-error');
    $('#siga_permiso_descripcion').focus();            
      validar = false;
  } else if(siga_menu == 0){
    $('#siga_permiso_descripcion_div').attr('class','form-group');
    $('#siga_permiso_menu_select_div').attr('class','form-group has-error');
    $('#siga_menu').focus();            
      validar = false;
  }

  if(validar){

    $.ajax({
      type: "POST",
      url: "../class/seguridad/permisos.ajax.php",
      data: {accion:1,Id_Usuario:Id_Usuario,siga_permiso_descripcion:siga_permiso_descripcion,siga_menu:siga_menu },
      dataType: "JSON",
      success: function (response) {
         console.log(response);
      }
    });
  
  }

});

//-------------------------------------------------------------------------
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------

$('#siga_perfil_agregar').on('click', function(){

// borrar();
// $('#sigaMenuModalAgregar').modal('show');

});


//-------------------------------------------------------------------------
});	
//-------------------------------------------------------------------------

function borrar(){
  $('#siga_permiso_descripcion_div').attr('class','form-group');
  $('#siga_permiso_menu_select_div').attr('class','form-group');
  $('#siga_permiso_descripcion').val('');
}

</script>
