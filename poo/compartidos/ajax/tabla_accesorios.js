accesorios = function(){

$( "#manual_codigo_de_barras_1" ).prop( "disabled", true );
$( "#manual_codigo_de_barras_2" ).prop( "disabled", true );
$( "#manual_codigo_de_barras_3" ).prop( "disabled", true );
$( "#manual_codigo_de_barras_4" ).prop( "disabled", true );
$( "#manual_codigo_de_barras_5" ).prop( "disabled", true );
$( "#manual_costo_1" ).prop( "disabled", true );
$( "#manual_costo_2" ).prop( "disabled", true );
$( "#manual_costo_3" ).prop( "disabled", true );
$( "#manual_costo_4" ).prop( "disabled", true );
$( "#manual_costo_5" ).prop( "disabled", true );
$( "#manual_cantidad_1" ).prop( "disabled", true );
$( "#manual_cantidad_2" ).prop( "disabled", true );
$( "#manual_cantidad_3" ).prop( "disabled", true );
$( "#manual_cantidad_4" ).prop( "disabled", true );
$( "#manual_cantidad_5" ).prop( "disabled", true );
 
  $.ajax({
    url: '../poo/compartidos/ajax/ajax_accesorios_assist.php',
    type: 'POST',
    dataType: 'JSON',
    cache: false,
    data: {},
      success:function(data) {
          $("#combo_accesorios_1").html(data);
          $("#combo_accesorios_2").html(data);
          $("#combo_accesorios_3").html(data);
          $("#combo_accesorios_4").html(data);
          $("#combo_accesorios_5").html(data);

          $("#combo_accesorios_1").selectize();
          $("#combo_accesorios_2").selectize();
          $("#combo_accesorios_3").selectize();
          $("#combo_accesorios_4").selectize();
          $("#combo_accesorios_5").selectize();  
      }
  });

}

$("#combo_accesorios_1").change(function(){
  var sku_id=$(this).val();

  $("#sku_1").html();
  $("#referencia_1").html('');
  $("#clase_1").html('');
  $("#localizacion_1").html('');
  $("#unidad_1").html('');
  $("#costo_1").html('');
  $("#existencia_1").html('');
  $("#cantidad_1").val();
  $("#sku_vista_1").html('');
  $("#descripcion_accesorios_1").val();
  $("#importe_1").html('0.00');
  $("#costo_valor_1").val(0);
  $("#cantidad_1").val('');
  $("#cantidad_1").prop("disabled", true);
  $("#Folio_Almacen_1").val('');
  $("#Folio_Almacen_1").prop("disabled", true);
  
  $.ajax({
    url: '../poo/compartidos/ajax/ajax_accesorios_assist_por_id.php',
    type: 'POST',
    dataType: 'JSON',
    cache: false,
    data: {sku_id: sku_id},
    success:function(data){

      var costo=parseFloat(data[0]['cto_prom']).toFixed(2);
      var Existencia=parseFloat(data[0]['Existencia']).toFixed();

      $.trim($("#sku_1").html(data[0]['art']));
      $("#sku_vista_1").html(data[0]['sku_vista']);
      $("#descripcion_accesorios_1").val(data[0]['des1']);
      $.trim($("#referencia_1").html(data[0]['cod_barras']));
      $("#clase_1").html(data[0]['s_lin']);
      $.trim($("#localizacion_1").html(data[0]['localizacion']));
      $("#unidad_1").html(data[0]['uds_min']);
      $("#costo_1").html(costo);
      $("#existencia_1").html(Existencia);
      $("#costo_valor_1").val(costo);
      $("#cantidad_1").prop("disabled", false);
      $("#Folio_Almacen_1").prop("disabled", false);
    }
  });

$("#Total_Costos").val('');
sumar();

});

$("#combo_accesorios_2").change(function(){
  var sku_id=$(this).val();

  $("#sku_2").html('');
  $("#referencia_2").html('');
  $("#clase_2").html('');
  $("#localizacion_2").html('');
  $("#unidad_2").html('');
  $("#costo_2").html('');
  $("#existencia_2").html('');
  $("#cantidad_2").val();
  $("#sku_vista_2").html('');
  $("#descripcion_accesorios_2").val();
  $("#importe_2").html('0.00');
  $("#costo_valor_2").val(0);
  $("#cantidad_2").val('');
  $("#cantidad_2").prop("disabled", true);
  $("#Folio_Almacen_2").val('');
  $("#Folio_Almacen_2").prop("disabled", true);
  
  $.ajax({
    url: '../poo/compartidos/ajax/ajax_accesorios_assist_por_id.php',
    type: 'POST',
    dataType: 'JSON',
    cache: false,
    data: {sku_id: sku_id},
    success:function(data){

      var costo=parseFloat(data[0]['cto_prom']).toFixed(2);
      var Existencia=parseFloat(data[0]['Existencia']).toFixed();

      $.trim($("#sku_2").html(data[0]['art']));
      $("#sku_vista_2").html(data[0]['sku_vista']);
      $("#descripcion_accesorios_2").val(data[0]['des1']);
      $.trim($("#referencia_2").html(data[0]['cod_barras']));
      $("#clase_2").html(data[0]['s_lin']);
      $.trim($("#localizacion_2").html(data[0]['localizacion']));
      $("#unidad_2").html(data[0]['uds_min']);
      $("#costo_2").html(costo);
      $("#existencia_2").html(Existencia);
      $("#costo_valor_2").val(costo);
      $("#cantidad_2").prop("disabled", false);
      $("#Folio_Almacen_2").prop("disabled", false);
    }
  });

$("#Total_Costos").val('');
sumar();

});

$("#combo_accesorios_3").change(function(){
  var sku_id=$(this).val();

  $("#sku_3").html();
  $("#referencia_3").html('');
  $("#clase_3").html('');
  $("#localizacion_3").html('');
  $("#unidad_3").html('');
  $("#costo_3").html('');
  $("#existencia_3").html('');
  $("#cantidad_3").val();
  $("#sku_vista_3").html('');
  $("#descripcion_accesorios_3").val();
  $("#importe_3").html('0.00');
  $("#costo_valor_3").val(0);
  $("#cantidad_3").val('');
  $("#cantidad_3").prop("disabled", true);
  $("#Folio_Almacen_3").val('');
  $("#Folio_Almacen_3").prop("disabled", true);
  
  $.ajax({
    url: '../poo/compartidos/ajax/ajax_accesorios_assist_por_id.php',
    type: 'POST',
    dataType: 'JSON',
    cache: false,
    data: {sku_id: sku_id},
    success:function(data){

      var costo=parseFloat(data[0]['cto_prom']).toFixed(2);
      var Existencia=parseFloat(data[0]['Existencia']).toFixed();

      $.trim($("#sku_3").html(data[0]['art']));
      $("#sku_vista_3").html(data[0]['sku_vista']);
      $("#descripcion_accesorios_3").val(data[0]['des1']);
      $.trim($("#referencia_3").html(data[0]['cod_barras']));
      $("#clase_3").html(data[0]['s_lin']);
      $.trim($("#localizacion_3").html(data[0]['localizacion']));
      $("#unidad_3").html(data[0]['uds_min']);
      $("#costo_3").html(costo);
      $("#existencia_3").html(Existencia);
      $("#costo_valor_3").val(costo);
      $("#cantidad_3").prop("disabled", false);
      $("#Folio_Almacen_3").prop("disabled", false);
    }
  });

$("#Total_Costos").val('');
sumar();

});

$("#combo_accesorios_4").change(function(){
  var sku_id=$(this).val();

  $("#sku_4").html();
  $("#referencia_4").html('');
  $("#clase_4").html('');
  $("#localizacion_4").html('');
  $("#unidad_4").html('');
  $("#costo_4").html('');
  $("#existencia_4").html('');
  $("#cantidad_4").val();
  $("#sku_vista_4").html('');
  $("#descripcion_accesorios_4").val();
  $("#importe_4").html('0.00');
  $("#costo_valor_4").val(0);
  $("#cantidad_4").val('');
  $("#cantidad_4").prop("disabled", true);
  $("#Folio_Almacen_4").val('');
  $("#Folio_Almacen_4").prop("disabled", true);
  
  $.ajax({
    url: '../poo/compartidos/ajax/ajax_accesorios_assist_por_id.php',
    type: 'POST',
    dataType: 'JSON',
    cache: false,
    data: {sku_id: sku_id},
    success:function(data){

      var costo=parseFloat(data[0]['cto_prom']).toFixed(2);
      var Existencia=parseFloat(data[0]['Existencia']).toFixed();

      $.trim($("#sku_4").html(data[0]['art']));
      $("#sku_vista_4").html(data[0]['sku_vista']);
      $("#descripcion_accesorios_4").val(data[0]['des1']);
      $.trim($("#referencia_4").html(data[0]['cod_barras']));
      $("#clase_4").html(data[0]['s_lin']);
      $.trim($("#localizacion_4").html(data[0]['localizacion']));
      $("#unidad_4").html(data[0]['uds_min']);
      $("#costo_4").html(costo);
      $("#existencia_4").html(Existencia);
      $("#costo_valor_4").val(costo);
      $("#cantidad_4").prop("disabled", false);
      $("#Folio_Almacen_4").prop("disabled", false);
    }
  });

$("#Total_Costos").val('');
sumar();

});

$("#combo_accesorios_5").change(function(){
  var sku_id=$(this).val();

  $("#sku_5").html();
  $("#referencia_5").html('');
  $("#clase_5").html('');
  $("#localizacion_5").html('');
  $("#unidad_5").html('');
  $("#costo_5").html('');
  $("#existencia_5").html('');
  $("#cantidad_5").val();
  $("#sku_vista_5").html('');
  $("#descripcion_accesorios_5").val();
  $("#importe_5").html('0.00');
  $("#costo_valor_5").val(0);
  $("#cantidad_5").val('');
  $("#cantidad_5").prop("disabled", true);
  $("#Folio_Almacen_5").val('');
  $("#Folio_Almacen_5").prop("disabled", true);
  
  $.ajax({
    url: '../poo/compartidos/ajax/ajax_accesorios_assist_por_id.php',
    type: 'POST',
    dataType: 'JSON',
    cache: false,
    data: {sku_id: sku_id},
    success:function(data){

      var costo=parseFloat(data[0]['cto_prom']).toFixed(2);
      var Existencia=parseFloat(data[0]['Existencia']).toFixed();

      $.trim($("#sku_5").html(data[0]['art']));
      $("#sku_vista_5").html(data[0]['sku_vista']);
      $("#descripcion_accesorios_5").val(data[0]['des1']);
      $.trim($("#referencia_5").html(data[0]['cod_barras']));
      $("#clase_5").html(data[0]['s_lin']);
      $.trim($("#localizacion_5").html(data[0]['localizacion']));
      $("#unidad_5").html(data[0]['uds_min']);
      $("#costo_5").html(costo);
      $("#existencia_5").html(Existencia);
      $("#costo_valor_5").val(costo);
      $("#cantidad_5").prop("disabled", false);
      $("#Folio_Almacen_5").prop("disabled", false);
    }
  });

$("#Total_Costos").val('');
sumar();

});

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
  var manual_costo_5=$("#manual_costo_5").val();
  
  if(manual_costo_5.length!=0){
    
   if(!$.isNumeric(manual_costo_5)){
    $("#manual_costo_5").val('');
    $("#manual_costo_5").focus();
      sumar();
    }else{
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

function sumar() {

	var total = 0;
  
	var importe_1=parseFloat($("#importe_1").text());
	var importe_2=parseFloat($("#importe_2").text());
	var importe_3=parseFloat($("#importe_3").text());
	var importe_4=parseFloat($("#importe_4").text());
	var importe_5=parseFloat($("#importe_5").text());

  var manual_total_1=parseFloat($("#manual_total_1").text());
  var manual_total_2=parseFloat($("#manual_total_2").text());
  var manual_total_3=parseFloat($("#manual_total_3").text());
  var manual_total_4=parseFloat($("#manual_total_4").text());
  var manual_total_5=parseFloat($("#manual_total_5").text());

  
  if(!isNaN(importe_1)){
    total+=importe_1;
  }

  if(!isNaN(importe_2)){
    total+=importe_2;
  }

  if(!isNaN(importe_3)){
    total+=importe_3;
  }

  if(!isNaN(importe_4)){
    total+=importe_4;
  }

  if(!isNaN(importe_5)){
    total+=importe_5;
  }

  if(!isNaN(manual_total_1)){
    total+=manual_total_1;
  }
  
  if(!isNaN(manual_total_2)){
    total+=manual_total_2;
  }

  if(!isNaN(manual_total_3)){
    total+=manual_total_3;
  }

  if(!isNaN(manual_total_4)){
    total+=manual_total_4;
  }

  if(!isNaN(manual_total_5)){
    total+=manual_total_5;
  }
  var mi_total=parseFloat(total).toFixed(2);
  $("#Total_Costos").html(mi_total);
}

