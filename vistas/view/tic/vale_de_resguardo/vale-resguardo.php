<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/class/utilities.class.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/tic/vrd/vrd.class.php");
session_start();

if(!isset($_SESSION["siga_VED"]) || (empty($_SESSION["siga_VED"]))){
  echo "<script>location.replace('https://apps2.hospitalsatelite.com/siga/'); alert('Sesión Vencida');</script>;";
  session_destroy();
  exit();
}

$aa= $_SESSION['siga_VED'];
$vrdClass = new vrd();

$vrdActivosVigentes = $vrdClass->sigaVrdAltaActivo($aa);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CHS | Log in </title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="../../../../bootstrap/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../../../../dist/css/AdminLTE.min.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="../../../../plugins/iCheck/square/blue.css">
		
		<!-- ==== File Input ==== -->
		<link href="../../../../plugins/fileinput/fileinput.css" type="text/css" rel="stylesheet" />
		<!-- /.login-box -->
		<!-- jQuery 2.2.3 -->
		<script src="../../../../plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="../../../../bootstrap/js/bootstrap.min.js"></script>
		<!-- iCheck -->
		<script src="../../../../plugins/iCheck/icheck.min.js"></script>

		<!-- ==== File Input ==== -->
		<link rel="stylesheet" href="../../../../plugins/fileinput/fileinput.css">
		<script src="../../../../plugins/fileinput/fileinput.js"></script>
		<script src="../../../../plugins/fileinput/fileinput_locale_es.js"></script>
		<script src="../../../../plugins/fileinput/fileInputFuncionesGenericas.js"></script>

		<style>
			.login-page { background-attachment: fixed; }
			.tablaAnchoAltoFull { display: table; width: 100%; height: 100%; }
				.pseudoTr { display: table-row; }
				.pseudoTd { display: table-cell; }
				.pseudoTdCentradoVertical  { display: table-cell; vertical-align: middle; }
			.vcenter { display: inline-block; vertical-align: middle; float: none; }
			@media(max-width: 767px) {
				.vcenter { display: block; }
			}
		</style>
	</head>
	

	<body class="hold-transition login-page">

		<div class="tablaAnchoAltoFull">
			<div class="pseudoTr">
				<div class="pseudoTdCentradoVertical">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-md-offset-3" style="padding: 1em;">
							<div class="panel panel-default">
								<div class="panel-body">
									
                            <div>
                              <div class="login-logo"><a href="#">
                                <img src="../../../../dist/img/logo.png" style="max-width: 140px;" class="img-responsive center-block" alt=""></a>
                              </div>
                              <div class="text-center" style="background-color: #19294a; border: green solid 1px; margin-bottom: 1em;">
                                <img src="../../../../dist/img/LOGO-SIGA-BLANCO.PNG" style="width: initial; height: 60px; margin: 1.5em; display: inline-block;" alt="User Image">
                              </div>
                            </div>
                            <input type="hidden" name="aa" id="aa" value="<?php echo $aa;?>" readonly>
                            <div class="row">
                                <div class="col-md-12">

                                  <table class="table table-light" width="100%">
                                    <thead>
                                      <tr>
                                        <th width="15%">AF BC</th>
                                        <th width="85%">Descripción</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($vrdActivosVigentes as $item) {?>
                                      <tr>
                                        <td><?php echo $item['AF_BC']; ?></td>
                                        <td><?php echo trim($item['Nombre_Activo']).'/'.$item['Marca'].'/'.$item['Modelo'].'/'.$item['NumSerie']; ?></td>
                                      </tr>
                                      <?php }?>
                                    </tbody>
                                  </table>

                                </div>
                              </div>
					
                              <div class="row">
                                <div class="col-md-12 text-center">
                                  <input type="button" class="btn btn-primary btn-block chs" id="btnAceptar" name="btnAceptar" value="ACEPTAR">
                                  <input type="button" class="btn btn-primary btn-block chs" id="btnNo" name="btnNo" value="ACLARACIÓN">
                                </div>
                              </div>
                  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<script type="text/javascript">			
		$(document).ready(function() {


      //************************************************************************************************************************************************************/
      $('#btnAceptar').on('click', function(){
        let aa  = $('#aa').val();
        
        if(aa){

          $.ajax({
            type: "POST",
            url: "../../../../class/tic/vrd/vrd.ajax.php",
            data: {accion:4},
            dataType: "JSON",
            cache: false,
            beforeSend:function(){

            },
            success: function (response) {
              console.log(response);
            }
          });

        } else {
          alert('Sesión vencida');
        }

      });
//************************************************************************************************************************************************************/

});
	</script>

	</body>
</html>