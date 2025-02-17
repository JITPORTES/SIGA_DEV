<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/class/utilities.class.php");

$utilitiesClass       = new utilities();
$utilitiesNavegador   = $utilitiesClass->getSigaNavegador();
$utilitiesVersion     = $utilitiesClass->getSigaVersion();

$url_id_area="";
$url_id_usuario="";
$url_est_proceso="";
$url_sistema="";
$url_id_solicitud="";
$url_id_seccion="";

if(!empty($_GET["Area"])){
	$url_id_area = $_GET['Area'];
}

if((!empty($_GET["EstProc"]))){
	$url_est_proceso = $_GET['EstProc'];
}

if(!empty($_GET["Sis"])){
	$url_sistema = $_GET['Sis'];
}

if(!empty($_GET["Solic"])){
	$url_id_solicitud = $_GET['Solic'];
}

if(!empty($_GET["Usr"])){
	$url_id_usuario = $_GET['Usr'];
}

if(!empty($_GET["Seccion"])){
	$url_id_seccion = $_GET['Seccion'];
}
 

session_start();
unset($_SESSION["Nombre_Usuario"]); 
unset($_SESSION["Id_Usuario"]);
unset($_SESSION["No_Usuario"]);
unset($_SESSION["Activo_Fijo"]);
unset($_SESSION["Mesa_Ayuda"]);
////////////////
unset($_SESSION["url_id_area"]);
unset($_SESSION["url_est_proceso"]);
unset($_SESSION["url_sistema"]);
unset($_SESSION["url_id_solicitud"]);
unset($_SESSION["url_id_seccion"]);
unset($_SESSION["url_id_usuario"]);
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>| SIGA v<?php echo $utilitiesVersion;?> |</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="icon" type="image/x-icon" href="/siga/components/siga.ico">
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <input type="hidden" id="Area_Id" value="<?php echo $url_id_area;?>">
    <input type="hidden" id="Usuario_Id" value="<?php echo $url_id_usuario;?>">
    <input type="hidden" id="EstProc" value="<?php echo $url_est_proceso;?>">
    <input type="hidden" id="Sis" value="<?php echo $url_sistema;?>">
    <input type="hidden" id="Solicitud_url" value="<?php echo $url_id_solicitud;?>">
    <input type="hidden" id="Seccion_url" value="<?php echo $url_id_seccion;?>">

  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="login-logo">
      <a href="#"><img src="../dist/img/logo.png" alt=""></a>
    </div>

    <div class="fluid-container" align="center" style="align:center;background-color:#19294a">
	  <br>
      <img src="../dist/img//LOGO-SIGA-BLANCO.PNG" style="width:155px;height:55px" alt="User Image">
      <br>
	</div>
	<br>
  <form action="#" method="post">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" id="txtUsuario" name="txtUsuario">
      </div>
    
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" id="txtPassword" name="txtPassword">
      </div>

    <div class="row">  
		
      <div class="col-md-8">  
        <div class="checkbox icheck">
          <label>
            <input type="checkbox"> Recordar Datos
          </label>
        </div>
      </div>
          
      <div class="col-md-4 col-md-offset-4">
        <input type="button" class="btn btn-primary btn-block chs" id="btnIngresar" name="btnIngresar" value="ENTRAR">
      </div>

      <div class="col-md-12"><br>        
        <div class="alert alert-danger alert-dismissible fade in" role="alert" style="display:none" id="divmensajeerror">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <strong id="divErrorMnj"></strong>
        </div>
      </div>


<?php if (strcmp($utilitiesNavegador, "Chrome") !== 0) { ?>
      <div class="col-md-12"><br>        
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <center><span class="text-dark">Para una correcta experiencia <br> le sugerimos utilizar <b>Chrome</b></span></center>
        </div>
      </div>

<?php } ?>



    </div>
  </form>
	
	
	
    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
  	
  </div>

<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script type="text/javascript">

	$(function () {
        $('#txtUsuario').focus();
        $("#txtUsuario").keypress(function (e) {
            if (e.which === 13) {
                if ($("#txtUsuario").val() !== "")
                {
                    $("#txtPassword").focus();                            
                }
            }
        });

        $("#txtPassword").keypress(function (e) {
            if (e.which === 13) {
                $('#btnIngresar').focus();
                valida();
            }
        });
        
    valida=function(){
        var txtUsuario = $.trim($('#txtUsuario').val());
        var txtPassword = $.trim($('#txtPassword').val());
        if ((txtUsuario !== "" && txtPassword !== "")) {
            $("#cargando").show();
            $("#btnIngresar").hide();
            login();
        } else {
            $("#divErrorMnj").html("Por favor ingrese el usuario y/o contrase&ntilde;a.");
            $("#divmensajeerror").show("fade");
            $('#txtUsuario').focus();   
        }
    };
        $('#btnIngresar').on('click', function () {
            valida();
        });
    });

    login = function () {
		var Area_Id=$("#Area_Id").val();
		var Usuario_Id=$("#Usuario_Id").val();
        var EstProc=$("#EstProc").val();
		var Sistema=$("#Sis").val();
		var Solicitud=$("#Solicitud_url").val();
		var Seccion=$("#Seccion_url").val();
		
    $.post("../fachadas/activos/siga_usuarios/Siga_usuariosFacade.Class.php", {
		Usuario: $.trim($('#txtUsuario').val()), 
		Password: $.trim($('#txtPassword').val()),
		EstProc: EstProc, 
		Sistema: Sistema,
		Solicitud: Solicitud,
		Seccion: Seccion,
		Usuario_Id:Usuario_Id,
		Area_Id:Area_Id,
    accion: "login"
		},
        function (result) {
             $("#cargando").hide();
             $("#btnIngresar").show();
            if (result !== "") {
                var jsonResult = eval("(" + result + ")");
                if (jsonResult.estatus === "ok") {
                    $(location).attr('href', jsonResult.location);
                } else {
                    if($("#txtUsuario").val()!="")
                    {    
                        $("#divErrorMnj").html("El usuario y/o contrase&ntilde;a es incorrecta");
                        $("#divmensajeerror").show("fade");
                        $('#txtUsuario').focus();
                    }
                    else
                    {
                        $("#divErrorMnj").html("Usuario o contrase&ntilde;a incorrecta");
                        $("#divmensajeerror").show("fade");
                        $('#txtUsuario').focus();
                    }
                }
            }
        });
    };
</script>
</body>
</html>