<div class="row">
  <div class="col-md-12">
    <div class="col-md-12">      
      <div class="table-responsive">

        <table class="table table-striped table-bordered" width="100%">
          <thead>
            <tr>
              <td width="35%">Materiales Externos</td>
              <td>Refer.</td>
              <td>Costo</td>
              <td>Cantidad</td>
              <td>Importe</td>
            </tr>
          </thead>
					<tbody>
						<tr>
							<td width="35%"><input type="text" class="form-control" id="manual_descripcion_1" name="manual_descripcion_1" maxlength="255" placeholder="Descripción Material"></td>
							<td><input type="text" class="form-control" id="manual_codigo_de_barras_1" name="manual_codigo_de_barras_1" maxlength="30" placeholder="Código Barras"></td>
							<td><input type="text" class="form-control" id="manual_costo_1" name="manual_costo_1" maxlength="6" placeholder="Costo"></td>
							<td><input type="text" min="0" class="form-control" id="manual_cantidad_1" name="manual_cantidad_1" maxlength="6" placeholder="Cantidad"></td>
							<td width="8%" class="text-right"><span id="manual_total_1" name="manual_total_1">0.00</span></td>
						</tr>
						<tr>
							<td width="35%"><input type="text" class="form-control" id="manual_descripcion_2" name="manual_descripcion_2" maxlength="255" placeholder="Descripción Material"></td>
							<td><input type="text" class="form-control" id="manual_codigo_de_barras_2" name="manual_codigo_de_barras_2" maxlength="30" placeholder="Código Barras"></td>
							<td><input type="text" class="form-control" id="manual_costo_2" name="manual_costo_2" maxlength="6" placeholder="Costo"></td>
							<td><input type="text" min="0" class="form-control" id="manual_cantidad_2" name="manual_cantidad_2" maxlength="6" placeholder="Cantidad"></td>
							<td width="8%" class="text-right"><span id="manual_total_2" name="manual_total_2">0.00</span></td>
						</tr>
						<tr>
							<td width="35%"><input type="text" class="form-control" id="manual_descripcion_3" name="manual_descripcion_3" maxlength="255" placeholder="Descripción Material"></td>
							<td><input type="text" class="form-control" id="manual_codigo_de_barras_3" name="manual_codigo_de_barras_3" maxlength="30" placeholder="Código Barras"></td>
							<td><input type="text" class="form-control" id="manual_costo_3" name="manual_costo_3" maxlength="6" placeholder="Costo"></td>
							<td><input type="text" min="0" class="form-control" id="manual_cantidad_3" name="manual_cantidad_3" maxlength="6" placeholder="Cantidad"></td>
							<td width="8%" class="text-right"><span id="manual_total_3" name="manual_total_3">0.00</span></td>
						</tr>
						<tr>
							<td width="35%"><input type="text" class="form-control" id="manual_descripcion_4" name="manual_descripcion_4" maxlength="255" placeholder="Descripción Material"></td>
							<td><input type="text" class="form-control" id="manual_codigo_de_barras_4" name="manual_codigo_de_barras_4" maxlength="30" placeholder="Código Barras"></td>
							<td><input type="text" class="form-control" id="manual_costo_4" name="manual_costo_4" maxlength="6" placeholder="Costo"></td>
							<td><input type="text" min="0" class="form-control" id="manual_cantidad_4" name="manual_cantidad_4" maxlength="6" placeholder="Cantidad"></td>
							<td width="8%" class="text-right"><span id="manual_total_4" name="manual_total_4">0.00</span></td>
						</tr>
						<tr>
							<td width="35%"><input type="text" class="form-control" id="manual_descripcion_5" name="manual_descripcion_5" maxlength="255" placeholder="Descripción Material"></td>
							<td><input type="text" class="form-control" id="manual_codigo_de_barras_5" name="manual_codigo_de_barras_5" maxlength="30" placeholder="Código Barras"></td>
							<td><input type="text" class="form-control" id="manual_costo_5" name="manual_costo_5" maxlength="6" placeholder="Costo"></td>
							<td><input type="text" class="form-control" id="manual_cantidad_5" name="manual_cantidad_5" maxlength="6" placeholder="Cantidad" min="0"></td>
							<td width="8%" class="text-right"><span id="manual_total_5" name="manual_total_5">0.00</span></td>
						</tr>
						</tbody>
            <tfoot>
              <tr>
                <td colspan="3"></td>
                <td>Total</td>
                <td class="text-right"><span id="Total_Costos" name="Total_Costos">0.00</span></td>
              </tr>
            </tfoot>
        </table>

      </div>
    </div>
  </div>
</div>

<script>

$(document).ready(function (){

$('#manual_descripcion_1').val('');
$("#manual_codigo_de_barras_1" ).prop( "disabled", true );
$("#manual_codigo_de_barras_2" ).prop( "disabled", true );
$("#manual_codigo_de_barras_3" ).prop( "disabled", true );
$("#manual_codigo_de_barras_4" ).prop( "disabled", true );
$("#manual_codigo_de_barras_5" ).prop( "disabled", true );
$("#manual_costo_1" ).prop( "disabled", true );
$("#manual_costo_2" ).prop( "disabled", true );
$("#manual_costo_3" ).prop( "disabled", true );
$("#manual_costo_4" ).prop( "disabled", true );
$("#manual_costo_5" ).prop( "disabled", true );
$("#manual_cantidad_1" ).prop( "disabled", true );
$("#manual_cantidad_2" ).prop( "disabled", true );
$("#manual_cantidad_3" ).prop( "disabled", true );
$("#manual_cantidad_4" ).prop( "disabled", true );
$("#manual_cantidad_5" ).prop( "disabled", true );

$("#manual_descripcion_1").keyup(function(event) {
  if($("#manual_descripcion_1").val() != 0){
    $("#manual_codigo_de_barras_1").prop( "disabled", false);
    $("#manual_costo_1").prop( "disabled", false);
    $("#manual_cantidad_1").prop( "disabled", false);

  }else{
    $("#manual_codigo_de_barras_1").prop( "disabled", true);
    $("#manual_costo_1").prop( "disabled", true);
    $("#manual_cantidad_1").prop( "disabled", true);
    $("#manual_codigo_de_barras_1").val('');
    $("#manual_costo_1").val(null);
    $("#manual_cantidad_1").val(null);
    $("#manual_total_1").html('0.00');
    $("#sku_1").html();
    sumar();
  }  
});

$("#manual_descripcion_2").keyup(function(event) {
  if($("#manual_descripcion_2").val() != 0){
    $("#manual_codigo_de_barras_2").prop( "disabled", false);
    $("#manual_costo_2").prop( "disabled", false);
    $("#manual_cantidad_2").prop( "disabled", false);

  }else{
    $("#manual_codigo_de_barras_2").prop( "disabled", true);
    $("#manual_costo_2").prop( "disabled", true);
    $("#manual_cantidad_2").prop( "disabled", true);
    $("#manual_codigo_de_barras_2").val('');
    $("#manual_costo_2").val(null);
    $("#manual_cantidad_2").val(null);
    $("#manual_total_2").html('0.00');
    $("#sku_2").html();
    sumar();
  }  
});

$("#manual_descripcion_3").keyup(function(event) {
  if($("#manual_descripcion_3").val() != 0){
    $("#manual_codigo_de_barras_3").prop( "disabled", false);
    $("#manual_costo_3").prop( "disabled", false);
    $("#manual_cantidad_3").prop( "disabled", false);

  }else{
    $("#manual_codigo_de_barras_3").prop( "disabled", true);
    $("#manual_costo_3").prop( "disabled", true);
    $("#manual_cantidad_3").prop( "disabled", true);
    $("#manual_codigo_de_barras_3").val('');
    $("#manual_costo_3").val(null);
    $("#manual_cantidad_3").val(null);
    $("#manual_total_3").html('0.00');
    $("#sku_3").html();
    sumar();
  }  
});

$("#manual_descripcion_4").keyup(function(event) {
  if($("#manual_descripcion_4").val() != 0){
    $("#manual_codigo_de_barras_4").prop( "disabled", false);
    $("#manual_costo_4").prop( "disabled", false);
    $("#manual_cantidad_4").prop( "disabled", false);

  }else{
    $("#manual_codigo_de_barras_4").prop( "disabled", true);
    $("#manual_costo_4").prop( "disabled", true);
    $("#manual_cantidad_4").prop( "disabled", true);
    $("#manual_codigo_de_barras_4").val('');
    $("#manual_costo_4").val(null);
    $("#manual_cantidad_4").val(null);
    $("#manual_total_4").html('0.00');
    $("#sku_4").html();
    sumar();
  }  
});

$("#manual_descripcion_5").keyup(function(event) {
  if($("#manual_descripcion_5").val() != 0){
    $("#manual_codigo_de_barras_5").prop( "disabled", false);
    $("#manual_costo_5").prop( "disabled", false);
    $("#manual_cantidad_5").prop( "disabled", false);

  }else{
    $("#manual_codigo_de_barras_5").prop( "disabled", true);
    $("#manual_costo_5").prop( "disabled", true);
    $("#manual_cantidad_5").prop( "disabled", true);
    $("#manual_codigo_de_barras_5").val('');
    $("#manual_costo_5").val(null);
    $("#manual_cantidad_5").val(null);
    $("#manual_total_5").html('0.00');
    $("#sku_5").html();
    sumar();
  }  
});

$("#cantidad_1").keyup(function(){
  $("#importe_1").html(0.00);
  var cantidad=$(this).val();

  if($.isNumeric(cantidad)) {
    var costo_valor=$("#costo_valor_1").val();
    var resultado=costo_valor*cantidad;
    var resultado=parseFloat(resultado).toFixed(2);
    $("#importe_1").html(resultado);
    sumar();
  }else{
    $("#cantidad_1").val('');
    $("#cantidad_1").focus();
    sumar();
  }

});

$("#cantidad_2").keyup(function(){
  $("#importe_2").html(0.00);
  var cantidad=$(this).val();

  if($.isNumeric(cantidad)) {
    var costo_valor=$("#costo_valor_2").val();
    var resultado=costo_valor*cantidad;
    var resultado=parseFloat(resultado).toFixed(2);
    $("#importe_2").html(resultado);
    sumar();
  }else{
    $("#cantidad_2").val('');
    $("#cantidad_2").focus();
    sumar();
  }

});

$("#cantidad_3").keyup(function(){
  $("#importe_3").html(0.00);
  var cantidad=$(this).val();

  if($.isNumeric(cantidad)) {
    var costo_valor=$("#costo_valor_3").val();
    var resultado=costo_valor*cantidad;
    var resultado=parseFloat(resultado).toFixed(2);
    $("#importe_3").html(resultado);
    sumar();
  }else{
    $("#cantidad_3").val('');
    $("#cantidad_3").focus();
    sumar();
  }
});

$("#cantidad_4").keyup(function(){
  $("#importe_4").html(0.00);
  var cantidad=$(this).val();

  if($.isNumeric(cantidad)) {
    var costo_valor=$("#costo_valor_4").val();
    var resultado=costo_valor*cantidad;
    var resultado=parseFloat(resultado).toFixed(2);
    $("#importe_4").html(resultado);
    sumar();
  }else{
    $("#cantidad_4").val('');
    $("#cantidad_4").focus();
    sumar();
  }
});

$("#cantidad_5").keyup(function(){
  $("#importe_5").html(0.00);
  var cantidad=$(this).val();

  if($.isNumeric(cantidad)) {
    var costo_valor=$("#costo_valor_5").val();
    var resultado=costo_valor*cantidad;
    var resultado=parseFloat(resultado).toFixed(2);
    $("#importe_5").html(resultado);
    sumar();
  }else{
    $("#cantidad_5").val('');
    $("#cantidad_5").focus();
    sumar();
  }
});

$("#manual_costo_1").keyup(function(){
  $("#manual_total_1").html(0.00);
  var manual_costo_1=$("#manual_costo_1").val();
  
  if(manual_costo_1.length!=0){
    
   if(!$.isNumeric(manual_costo_1)){
    $("#manual_total_1").html(0.00);
    $("#manual_costo_1").val('');
    $("#manual_costo_1").focus();
      sumar();
    }else{
      
    $("#manual_total_1").html();
    var manual_costo_1= $("#manual_costo_1").val();
    var manual_cantidad_1= $("#manual_cantidad_1").val();
    var resultado=manual_costo_1*manual_cantidad_1;
    var resultado=parseFloat(resultado).toFixed(2);
      $("#manual_total_1").html(0.00);
      $("#manual_total_1").html(resultado);
      sumar();
    }
  }

});

$("#manual_costo_2").keyup(function(){
  $("#manual_total_2").html(0.00);
  var manual_costo_2=$("#manual_costo_2").val();
  
  if(manual_costo_2.length!=0){
    
   if(!$.isNumeric(manual_costo_2)){
    $("#manual_costo_2").val('');
    $("#manual_costo_2").focus();
      sumar();
    }else{
    $("#manual_total_2").html();
    var manual_costo_2= $("#manual_costo_2").val();
    var manual_cantidad_2= $("#manual_cantidad_2").val();
    var resultado=manual_costo_2*manual_cantidad_2;
    var resultado=parseFloat(resultado).toFixed(2);
      $("#manual_total_2").html(resultado);
      sumar();
    }
  }

});

$("#manual_costo_3").keyup(function(){
  $("#manual_total_3").html(0.00);
  var manual_costo_3=$("#manual_costo_3").val();
  
  if(manual_costo_3.length!=0){
    
   if(!$.isNumeric(manual_costo_3)){
    $("#manual_costo_3").val('');
    $("#manual_costo_3").focus();
      sumar();
    }else{
    $("#manual_total_3").html();
    var manual_costo_3= $("#manual_costo_3").val();
    var manual_cantidad_3= $("#manual_cantidad_3").val();
    var resultado=manual_costo_3*manual_cantidad_3;
    var resultado=parseFloat(resultado).toFixed(2);
      $("#manual_total_3").html(resultado);
      sumar();
    }
  }

});

$("#manual_costo_4").keyup(function(){
  $("#manual_total_4").html(0.00);
  var manual_costo_4=$("#manual_costo_4").val();
  
  if(manual_costo_4.length!=0){
    
   if(!$.isNumeric(manual_costo_4)){
    $("#manual_costo_4").val('');
    $("#manual_costo_4").focus();
      sumar();
    }else{
    $("#manual_total_4").html();
    var manual_costo_4= $("#manual_costo_4").val();
    var manual_cantidad_4= $("#manual_cantidad_4").val();
    var resultado=manual_costo_4*manual_cantidad_4;
    var resultado=parseFloat(resultado).toFixed(2);
      $("#manual_total_4").html(resultado);
      sumar();
    }
  }

});

$("#manual_costo_5").keyup(function(){
  $("#manual_total_5").html(0.00);
  var manual_costo_5 = $("#manual_costo_5").val();
  
  if(manual_costo_5.length!=0){
    
   if(!$.isNumeric(manual_costo_5)){
    $("#manual_costo_5").val('');
    $("#manual_costo_5").focus();
      sumar();

    } else {

    $("#manual_total_5").html();
    var manual_costo_5= $("#manual_costo_5").val();
    var manual_cantidad_5= $("#manual_cantidad_5").val();
    var resultado=manual_costo_5*manual_cantidad_5;
    var resultado=parseFloat(resultado).toFixed(2);
      $("#manual_total_5").html(resultado);
      sumar();
    }
  }

});

$("#manual_cantidad_1").keyup(function(){

$("#manual_cantidad_1").html(0.00);
$("#manual_total_1").html(0.00);
	var manual_cantidad_1=$(this).val();
	var manual_costo_1=$("#manual_costo_1").val();  

if($.isNumeric(manual_cantidad_1)){
	var resultado=manual_costo_1*manual_cantidad_1;
	var resultado=parseFloat(resultado).toFixed(2);
		$("#manual_total_1").html(resultado);
			sumar();
}else{
		$("#manual_cantidad_1").val('');
		$("#manual_cantidad_1").focus();
			sumar();
}

});

$("#manual_cantidad_2").keyup(function(){

$("#manual_cantidad_2").html(0.00);
$("#manual_total_2").html(0.00);
	var manual_cantidad_2=$(this).val();
	var manual_costo_2=$("#manual_costo_2").val();  

if($.isNumeric(manual_cantidad_2)){
	var resultado=manual_costo_2*manual_cantidad_2;
	var resultado=parseFloat(resultado).toFixed(2);
		$("#manual_total_2").html(resultado);
			sumar();
}else{
		$("#manual_cantidad_2").val('');
		$("#manual_cantidad_2").focus();
			sumar();
}

});

$("#manual_cantidad_3").keyup(function(){

$("#manual_cantidad_3").html(0.00);
$("#manual_total_3").html(0.00);
	var manual_cantidad_3=$(this).val();
	var manual_costo_3=$("#manual_costo_3").val();  

if($.isNumeric(manual_cantidad_3)){
	var resultado=manual_costo_3*manual_cantidad_3;
	var resultado=parseFloat(resultado).toFixed(2);
		$("#manual_total_3").html(resultado);
			sumar();
}else{
		$("#manual_cantidad_3").val('');
		$("#manual_cantidad_3").focus();
			sumar();
}

});

$("#manual_cantidad_4").keyup(function(){

$("#manual_cantidad_4").html(0.00);
$("#manual_total_4").html(0.00);
	var manual_cantidad_4=$(this).val();
	var manual_costo_4=$("#manual_costo_4").val();  

if($.isNumeric(manual_cantidad_4)){
	var resultado=manual_costo_4*manual_cantidad_4;
	var resultado=parseFloat(resultado).toFixed(2);
		$("#manual_total_4").html(resultado);
			sumar();
}else{
		$("#manual_cantidad_4").val('');
		$("#manual_cantidad_4").focus();
			sumar();
}

});

$("#manual_cantidad_5").keyup(function(){

$("#manual_cantidad_5").html(0.00);
$("#manual_total_5").html(0.00);
	var manual_cantidad_5=$(this).val();
	var manual_costo_5=$("#manual_costo_5").val();  

if($.isNumeric(manual_cantidad_5)){
	var resultado=manual_costo_5*manual_cantidad_5;
	var resultado=parseFloat(resultado).toFixed(2);
		$("#manual_total_5").html(resultado);
			sumar();
}else{
		$("#manual_cantidad_5").val('');
		$("#manual_cantidad_5").focus();
			sumar();
}

});

//=======================================================================================================================================================	
});
//=======================================================================================================================================================

//=======================================================================================================================================================
//=======================================================================================================================================================


</script>
