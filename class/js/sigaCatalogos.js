function getSigaCatAgnios(valor){
  $.ajax({
    type: "POST",
    url: "/siga/class/ajax/sigaCatalogos.ajax.php",
    data: {accion:1,valor:valor},
    dataType: "JSON",
    success: function (response) {
      console.log(response);
    }
  });
}