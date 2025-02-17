<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.class.php");
class utilities extends conectar{

function getSigaUsuarios($siga_usuario){

$sqlgetUsuariosPermisos ="SELECT Id_Usuario, No_Usuario, Nombre_Usuario  
                          FROM siga_usuarios
                          WHERE Estatus_Reg <> 3 
                          AND Id_Usuario NOT IN (2)
                          AND Correo <> '0'
                          AND Correo <> ''
                          AND correo != '@hospitalsatelite.com'
                          ORDER BY Nombre_Usuario ASC
                          ";

  return $sqlgetUsuariosPermisos;
}

function getSigaPerfilPermisos($siga_usuario){
  
  $pdoConexionGestafSiga = conectar::ConexionGestafSiga();
  $siga_usuario = trim($siga_usuario);
  
  $sqlgetUsuariosPermisos ="SELECT  siga_id_permiso
                            FROM    siga_usuarios_perfil_permiso
                            WHERE   siga_id_perfil = (SELECT siga_id_perfil FROM siga_usuarios_activos WHERE Id_Usuario = $siga_usuario)
                          ";

  $getUsuariosPermisos  = $pdoConexionGestafSiga->query($sqlgetUsuariosPermisos);
  $getUsuariosPermisosR = $getUsuariosPermisos->fetchAll(PDO::FETCH_COLUMN);
  $pdoConexionGestafSiga=null;
  
  return $getUsuariosPermisosR;
  }
  
  function getSigaVersion(){
    $pdoConexionGestafSiga = conectar::ConexionGestafSiga();
    
      $sqlGetVersion ="SELECT  siga_version_desc
                       FROM    siga_version";
    
    $GetVersion  = $pdoConexionGestafSiga->query($sqlGetVersion);
    $GetVersionR = $GetVersion->fetchColumn();
    $pdoConexionGestafSiga=null;
  
    return $GetVersionR;
  }

function getSigaNavegador(){
  
  $browser = get_browser(null, true);
    return $browser['browser'];

  }

  function validarVed($num_emp, $password){
      
    $sistema='SIGA';
    $log = new utilities();

      $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apps2.hospitalsatelite.com/ws_ved/api/validador',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'sistema='.$sistema.'&num_emp='.$num_emp.'&password='.$password,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded'),
          ));                

        if(curl_exec($curl) === FALSE){            
          //$log->fnlog("api::class::error:".curl_error($curl));
        }else{
          $response   = curl_exec($curl);          
          $data       = json_decode($response);
          $validarID  = $data->status;
        }
        curl_close($curl);

    return $validarID;
  }
	
  function envioWhatappSiga($usuario){

    $pdoConexionGestafSiga = conectar::ConexionGestafSiga();
    
    $sqlSigaTelefono = "SELECT num_celular from empleados_chs where num_empleado = $usuario";
    $getSigaTelefono  = $pdoConexionGestafSiga->query($sqlSigaTelefono);
    $getSigaTelefonoR = $getSigaTelefono->fetchColumn();

    if($getSigaTelefonoR){

    $pdoConexionGestafSiga=null;
    
    $utilitiesClass = new utilities();
    $user = $utilitiesClass->encriptar($usuario);
    
			$body ='Le enviamos su vale de resguardo: https://apps2.hospitalsatelite.com/siga/vistas/view/tic/vale_de_resguardo/vale-resguardo-digital.php?aa='.$user;
			$url  = "https://apps2.hospitalsatelite.com/envio_what/envia_whatsapp.asp";
			$data = array('x_token'=>'TxbWvzvsw8QvQwokQ9GzdAMDaH_Hk8iYsHYiRTQE','x_strSubject' => 'SIGA: ', 'x_msj_body'=>$body,'x_num_cel'=>$getSigaTelefonoR);
			$postvars = http_build_query($data);
			
			$ch = curl_init();
							
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, count($data));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_exec($ch);
			curl_close($ch);
      echo json_encode('ok');
    }else{
      echo json_encode('error');
    }

	}

  public function encriptar($id){
		$id = 'miIdIncCHS='.$id;
		$pass = 'sigaIngAlexArias2024';
		$method = 'AES-128-ECB';
		$idDesencriptado = urlencode(openssl_encrypt($id, $method, $pass));
	return $idDesencriptado;
}

public function desencriptar($id){	
		$pass = 'sigaIngAlexArias2024';
		$method = 'AES-128-ECB';		
		$idDesencriptado = urldecode(openssl_decrypt($id, $method, $pass));
		$dato = str_replace('miIdIncCHS=','',$idDesencriptado);
	return $dato;
}

function getSigaDatos($siga_num){

  $pdoConexionGestafSiga = conectar::ConexionGestafSiga();
    
  $sqlSigaDato  = "SELECT nombre_completo2 from empleados_chs where num_empleado = $siga_num";
  $getSigaDato  = $pdoConexionGestafSiga->query($sqlSigaDato);
  $getSigaDatoR = $getSigaDato->fetchColumn();

  return $getSigaDatoR;
}

}
