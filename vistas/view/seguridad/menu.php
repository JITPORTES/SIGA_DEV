<?php session_start();
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/archivosComunes.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/seguridad/menu.class.php");

$menuClass = new menu();
$menuInfo = $menuClass->getSigaMenu();

?>
<div class="row">
	<div class="container">
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>

			<div class="panel">
				<div class="panel-heading bg-info">SIGA - Menú</div>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
					<br>
						<button type="button" class="btn btn-primary btn-sm" id='siga_usuarios_agregar'> + Agregar Menú</button>
           		<br>
							<table class="table table-striped">
								<thead class="thead-light">
									<tr>
										<th>Menú</th>
                    <th>Acción</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($menuInfo as $item) {?>
                <tr>
										<td><?php echo $item[1];?></td>
										<td></td>
									</tr>
                  <?php }?>
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
        <h5 class="modal-title" id="exampleModalLabel">SIGA - Agregar Menú</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="form-group" id='siga_menu_descripcion_div'>
            <label for="recipient-name" class="col-form-label">Menú:</label>
              <input type="text" class="form-control" id="siga_menu_descripcion">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id='siga_btn_menu_alta'> + Agregar</button>
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

$('#siga_div_tabla').hide();

let area 	      = $('#idareasesion').val();
let Id_Usuario  = <?php echo $_SESSION["Id_Usuario"];?>;
let validar     = true;

$('#siga_usuarios_agregar').on('click', function(){
  borrar();
  $('#sigaMenuModalAgregar').modal('show');
});

$('#siga_btn_menu_alta').on('click', function(){

  let siga_menu_descripcion = $('#siga_menu_descripcion').val();

  if(siga_menu_descripcion == ''){
    $('#siga_menu_descripcion_div').attr('class','form-group has-error');
    $('#siga_menu_descripcion').focus();            
      validar = false;
  }

  if(validar){
  
    $.ajax({
      type: "POST",
      url: "../class/seguridad/menu.ajax.php",
      data: {accion:1,Id_Usuario:Id_Usuario,siga_menu_descripcion:siga_menu_descripcion },
      dataType: "JSON",
      success: function (response) {
        
        //console.log(response);

      }
    });
  
  }

});

//-------------------------------------------------------------------------
});	
//-------------------------------------------------------------------------

function borrar(){
  $('#siga_menu_descripcion_div').attr('class','form-group');
  $('#siga_menu_descripcion').val('');
}

</script>
