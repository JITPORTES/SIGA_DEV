<?php
session_start();
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/archivosComunes.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/biomedica/biomedica.class.php");

$biomedicaClass       = new biomedica();
// $biomedicaActivosInfo = $biomedicaClass->getSigaActivosArea(1);

?>

<link href="/siga/plugins/datatables2.0/datatables2.css" rel="stylesheet">

<script src="/siga/plugins/datatables2.0/datatable2.js"></script>

<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>  -->


<style>
  table {
  font-size: 11px;
}

.panel.with-nav-tabs .panel-heading{
    padding: 5px 5px 5px 5px;
}
.panel.with-nav-tabs .nav-tabs{
	border-bottom: none;
}
.panel.with-nav-tabs .nav-justified{
	margin-bottom: -1px;
}
/********************************************************************/
/********************************************************************/
/*** PANEL PRIMARY ***/
.with-nav-tabs.panel-primary .nav-tabs > li > a,
.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
    color: #fff;
}
.with-nav-tabs.panel-primary .nav-tabs > .open > a,
.with-nav-tabs.panel-primary .nav-tabs > .open > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > .open > a:focus,
.with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
	color: #fff;
	background-color: #3071a9;
	border-color: transparent;
}
.with-nav-tabs.panel-primary .nav-tabs > li.active > a,
.with-nav-tabs.panel-primary .nav-tabs > li.active > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.active > a:focus {
	color: #428bca;
	background-color: #fff;
	border-color: #428bca;
	border-bottom-color: transparent;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu {
    background-color: #428bca;
    border-color: #3071a9;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a {
    color: #fff;   
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
    background-color: #3071a9;
}
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
.with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
    background-color: #4a9fe9;
}
/********************************************************************/



</style>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
  
<div class="container-fluid">
    <div class="page-header">
        <h2>Panels with nav tabs.<span class="pull-right label label-default"></span></h2>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                  <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab1primary" data-toggle="tab">Activos</a></li>
                      <li><a href="#tab2primary" data-toggle="tab">Baja</a></li>
                      <li><a href="#tab3primary" data-toggle="tab">Reubicación</a></li>
                  </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">Primary 1</div>
                        <div class="tab-pane fade" id="tab2primary">Primary 2</div>
                        <div class="tab-pane fade" id="tab3primary">Primary 3</div>                      
                    </div>
                </div>
            </div>
        </div>

	</div>
</div>

<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------------------>

  <!-- Latest compiled and minified CSS -->

  
  
  <!-- sort: true -->
  
  


<div class="panel panel-default">
  <!-- <div class="panel-heading">Agregar</div> -->
    <div class="panel-body">
    <div class="list-group-item static" style="pointer-events:none;">Editar</div>
    <div class="list-group-item static" style="pointer-events:none;">Borrar</div>
    <div class="list-group-item static" style="pointer-events:none;">PDF</div>
      <div id="sortTrue" class="list-group">
        

       </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">      
    <div class="row">  
    <div id="sortFalse" class="list-group">
        <div class="list-group-item ">dos</div>    
        <div class="list-group-item ">AF_AB</div>   
        <div class="list-group-item ">qux</div>
        <div class="list-group-item ">quux</div>    
        <div class="list-group-item ">foo</div>
        <div class="list-group-item ">bar</div>
        <div class="list-group-item ">baz</div>
      </div>
    </div>
</div>

  </div>


<script>
//-------------------------------------------------------------------------
$(document).ready(function() {


// sort: true
Sortable.create(sortTrue, {
  group: "sorting",
  sort: true,
  // Element is dropped into the list from another list
      onAdd: function (/**Event*/evt) {
        console.log('onAdd-false');
    },

    // Changed sorting within list
    onUpdate: function (/**Event*/evt) {
      console.log('onUpdate-false');
    },

    // Called by any change to the list (add / update / remove)
    onSort: function (/**Event*/evt) {
      console.log('onSort-false');
    },

    // Element is removed from the list into another list
    onRemove: function (/**Event*/evt) {
      console.log('onRemove-false');
    },
});

// sort: false
Sortable.create(sortFalse, {
  group: "sorting",
  sort: false,
  grid: [ 20, 10 ],
      // Element is dropped into the list from another list
      onAdd: function (/**Event*/evt) {
        console.log('onAdd-false');
    },

    // Changed sorting within list
    onUpdate: function (/**Event*/evt) {
      console.log('onUpdate-false');
    },

    // Called by any change to the list (add / update / remove)
    onSort: function (/**Event*/evt) {
      console.log('onSort-false');
    },

    // Element is removed from the list into another list
    onRemove: function (/**Event*/evt) {
      console.log('onRemove-false');
    },
});





$('#siga_dt_activos').DataTable({
  autoWidth: false,
  layout: {
    bottomStart: {
            buttons: ['excel']
        }
    },
  aLengthMenu: [
        [10,25, 50, 100, 200, -1],
        [10,25,50,100,200,"All"]
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
            count = 0;
            this.api().columns().every( function () {
                var title = this.header();
                //replace spaces with dashes
                title = $(title).html().replace(/[\W]/g, '-');
                var column = this;
                var select = $('<select id="' + title + '" class="select2"></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                      //Get the "text" property from each selected data
                      //regex escape the value and store in array
                      var data = $.map( $(this).select2('data'), function( value, key ) {
                        return value.text ? '^' + $.fn.dataTable.util.escapeRegex(value.text) + '$' : null;
                                 });

                      //if no data selected use ""
                      if (data.length === 0) {
                        data = [""];
                      }

                      //join array into string with regex or (|)
                      var val = data.join('|');

                      //search for the option(s) selected
                      column
                            .search( val ? val : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' );
                } );

              //use column title as selector and placeholder
              $('#' + title).select2({
                multiple: true,
                closeOnSelect: false,
                placeholder: "Seleccionar"
              });

              //initially clear select otherwise first option is selected
              $('.select2').val(null).trigger('change');
            } );
        }
  });

//-------------------------------------------------------------------------
});
//-------------------------------------------------------------------------
//-------------------------------------------------------------------------

</script>