      <div class="row">
        <div class="col-md-3">
          <a href="notificacion-nueva.html" class="btn btn-primary btn-block margin-bottom">Nuevo Mensaje</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active" id="bandeja_entrada"><a href="#"><i class="fa fa-inbox"></i> Entrada
                  <span class="label label-primary pull-right" id="Total_Mensajes_Entrada"></span></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> Enviados</a></li>
                <!--<li><a href="#"><i class="fa fa-file-text-o"></i> Borradores</a></li>-->
                </li>
                <li class="" id="bandeja_borrados"><a href="#"><i class="fa fa-trash-o "></i> Basura</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Estatus</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-circle-o text-green"></i> Le&iacute;dos</a></li>
				<li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> No Le&iacute;dos</a></li>
			  </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Buscar correo">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody id="tabla_notificacion">
                  
				  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
              
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
   
   
<div class="modal fade modalchs" id="myModal" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header azul">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i>Mensaje</h4>
      </div>
      <div class="modal-body">
		<input type="hidden" id="id_formula">	
        <form class="form-horizontal" id="Mensaje_Largo">
          
        </form>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

   


<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App   Se comento esta linea ya que no deja desplegar el menu-->
<!--<script src="../dist/js/app.min.js"></script>-->
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  var array_activos=[];
  var array_notificaciones=[];

  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        alert("no");
        array_activos=[];
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        alert("checkedo");

        console.log(array_activos);
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });

$(document).ready(function(){
	tabla_notificaciones();
	
	$("#bandeja_entrada").click(function () {
		$("#bandeja_borrados").removeClass("active");
    $("#bandeja_entrada").removeClass("active");

    $("#bandeja_entrada").addClass("active");
    tabla_notificaciones();
	});

  $("#bandeja_borrados").click(function () {
    $("#bandeja_entrada").removeClass("active");
    $("#bandeja_borrados").removeClass("active");
    $("#bandeja_borrados").addClass("active");
  });

	function tabla_notificaciones(){
    array_notificaciones=[];
		//Id_Usuario Logueado
		var Id_Usuario_Recibe=$("#usuariosesion").val();
		//Aplicacion
		var Id_Aplicacion=$("#idmenusesion").val();

		$.ajax({
			type: "POST",
			encoding:"UTF-8",
			url: "../fachadas/activos/siga_notificaciones/Siga_notificacionesFacade.Class.php",
			async: true,
			data: {
				//Datos Notificacion
				Id_Usuario_Recibe:Id_Usuario_Recibe,
				Id_Aplicacion:Id_Aplicacion,
				accion:"notificaciones_usuario"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				tabla="";
				contador_msj_no_leidos=0;
				if(json.totalCount>0){
					for (var i = 0; i < json.totalCount; i++){
						if(json.data[i].Estatus_Leido==0){
							contador_msj_no_leidos=contador_msj_no_leidos+1;
						}
            array_activos[i]=json.data[i].Id_Notificacion;

						tabla+='<tr onclick="cambioestatus(\''+json.data[i].Id_Notificacion+'\', \''+json.data[i].Nombre_Usuario+'\', \''+json.data[i].Fecha_Envio+'\')">';
						tabla+='	<td><input type="checkbox" id="checkbox'+i+'" onchange="pasarcheckelimina('+i+','+json.data[i].Id_Notificacion+')"></td>';
						if(json.data[i].Estatus_Leido!=0){
							tabla+='	<td class="mailbox-star"><a href="#"><i class="fa fa-circle-o text-green"></i></a></td>';
						}else{
							tabla+='	<td class="mailbox-star"><a href="#"><i class="fa fa-circle-o text-light-blue"></i></a></td>';
						}
						tabla+='	<td class="mailbox-name"><a href="#noir">'+json.data[i].Nombre_Usuario+'</a></td>';
						tabla+='	<td class="mailbox-subject"><b>'+json.data[i].Mensaje_Corto+'</b></td>';
						tabla+='	<td class="mailbox-attachment"></td>';
						tabla+='	<td class="mailbox-date">'+json.data[i].Fecha_Envio+'</td>';
						tabla+=' </tr>';
					}
				}else{
						tabla+='<tr><td colspan="6" align="center">Por el momento no tienes Notificaciones</td></tr>';
				}
				
				if(json.estatus!="ok"){
					mensajesalerta("Error", json.mensaje, "error", "dark"); 
				}
				
				$("#tabla_notificacion").html(tabla);
				$("#Total_Mensajes_Entrada").html(contador_msj_no_leidos);
				$('.mailbox-messages input[type="checkbox"]').iCheck({
				  checkboxClass: 'icheckbox_flat-blue',
				  radioClass: 'iradio_flat-blue'
				});

			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}

  pasarcheckelimina=function(Indice, Id_Notificacion){
    alert("entro");
    if(!$("#checkbox"+Indice).prop('checked')){
      array_activos[Indice]="N";
    }else{
      array_activos[Indice]=""+Id_Notificacion+"";
    }
    //console.log(array_activos);
    console.log(array_activos);
  }

	cambioestatus=function(Id_Notificacion, Nombre_Usuario, Fecha_Envio){
		$.ajax({
			type: "POST",
			encoding:"UTF-8",
			url: "../fachadas/activos/siga_notificaciones/Siga_notificacionesFacade.Class.php",        
			async: true,
			data: {
				//Datos Notificacion
				Id_Notificacion:Id_Notificacion,
				Estatus_Leido:"1",
				accion:"guardar"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				tabla="";
				contador_msj_no_leidos=0;
				if(json.totalCount>0){
					contenido_mensaje(Id_Notificacion, Nombre_Usuario, Fecha_Envio);
					tabla_notificaciones();
					
				}else{
					mensajesalerta("Error", json.text, "error", "dark"); 
				}
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}
	
	contenido_mensaje=function(Id_Notificacion, Nombre_Usuario, Fecha_Envio){
		$.ajax({
			type: "POST",
			encoding:"UTF-8",
			url: "../fachadas/activos/siga_notificaciones/Siga_notificacionesFacade.Class.php",        
			async: true,
			data: {
				Estatus_Eliminado:"0",
				Id_Notificacion:Id_Notificacion,
				accion:"consultar"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				tabla="";
				contador_msj_no_leidos=0;
				if(json.totalCount>0){
					var Html='<div width="100%"><strong>Envi&oacute;</strong>: '+Nombre_Usuario+'  <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha y Hora:</strong> '+Fecha_Envio+'</div><br><br>';
					Html+=json.data[0].Mensaje_Largo;
					$("#Mensaje_Largo").html(Html);
					$("#myModal").modal("show");
				
				}else{
					mensajesalerta("Error", json.text, "error", "dark"); 
				}
				
			},
			error: function () {
				mensajesalerta("Oh No!", "Ocurrio un error al consultar.", "error", "dark");
			}
		});
	}

});
</script>