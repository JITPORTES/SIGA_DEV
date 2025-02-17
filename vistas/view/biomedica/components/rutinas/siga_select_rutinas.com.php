<select class="form-group" id="siga_rutinasGet"></select>
<option value=""></option>


<script>
$(document).ready(function(){

  $.ajax({
    url: '/siga/class/biomedica/rutinas/rutinas.ajax.php',
    type: 'POST',
    dataType: 'JSON',
    cache: false,
    data: {accion:9},
      success:function(response) {
          $("#siga_rutinasGet").html(response);
          $("#siga_rutinasGet").selectize();          
      }
  });

//==================================================================================================================================  
});
//==================================================================================================================================
</script>