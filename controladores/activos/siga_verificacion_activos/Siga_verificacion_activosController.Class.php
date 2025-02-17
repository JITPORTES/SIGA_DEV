<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_verificacion_activos/Siga_verificacion_activosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_verificacion_activos/Siga_verificacion_activosDAO.Class.php");

include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_verificacion/Siga_det_verificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_det_verificacion/Siga_det_verificacionDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");

//include_once(dirname(__FILE__)."/../../../logger/Logger.Class.php");

class Siga_verificacion_activosController {
private $proveedor;
public function __construct() {
}
public function validarSiga_verificacion_activos($Siga_verificacion_activosDto){
$Siga_verificacion_activosDto->setId_Verificacion(strtoupper(str_ireplace("'","",trim($Siga_verificacion_activosDto->getId_Verificacion()))));
$Siga_verificacion_activosDto->setFecha(strtoupper(str_ireplace("'","",trim($Siga_verificacion_activosDto->getFecha()))));
$Siga_verificacion_activosDto->setComentarios(strtoupper(str_ireplace("'","",trim($Siga_verificacion_activosDto->getComentarios()))));
$Siga_verificacion_activosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_verificacion_activosDto->getFech_Inser()))));
$Siga_verificacion_activosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_verificacion_activosDto->getUsr_Inser()))));
$Siga_verificacion_activosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_verificacion_activosDto->getFech_Mod()))));
$Siga_verificacion_activosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_verificacion_activosDto->getUsr_Mod()))));
$Siga_verificacion_activosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_verificacion_activosDto->getEstatus_Reg()))));
return $Siga_verificacion_activosDto;
}
public function selectSiga_verificacion_activos($Siga_verificacion_activosDto,$proveedor=null){
$Siga_verificacion_activosDto=$this->validarSiga_verificacion_activos($Siga_verificacion_activosDto);
$Siga_verificacion_activosDao = new Siga_verificacion_activosDAO();
$Siga_verificacion_activosDto = $Siga_verificacion_activosDao->selectSiga_verificacion_activos($Siga_verificacion_activosDto,$proveedor);
return $Siga_verificacion_activosDto;
}


public function selectSiga_verificacion_activos_detalle($Siga_verificacion_activosDto,$proveedor=null){
	$Siga_verificacion_activosDto=$this->validarSiga_verificacion_activos($Siga_verificacion_activosDto);
	$Siga_verificacion_activosDao = new Siga_verificacion_activosDAO();
	$Siga_verificacion_activosDto = $Siga_verificacion_activosDao->selectSiga_verificacion_activos($Siga_verificacion_activosDto,$proveedor);
	
	$error=true;
	if($Siga_verificacion_activosDto!=""){
		//Vale Array
		$Verif_ResgE = array();
		$Verif_Envia = array();
		$respuesta = array();
		
		$Verif_ResgE = array(
			"Id_Verificacion" => $Siga_verificacion_activosDto[0]->getId_Verificacion(),
			"Comentarios" => $Siga_verificacion_activosDto[0]->getComentarios(),
			"Fecha" => $Siga_verificacion_activosDto[0]->getFecha(),
			"Fech_Inser" => $Siga_verificacion_activosDto[0]->getFech_Inser(),
			"Usr_Inser" => $Siga_verificacion_activosDto[0]->getUsr_Inser(),
			"Fech_Mod" => $Siga_verificacion_activosDto[0]->getFech_Mod(),
			"Usr_Mod" => $Siga_verificacion_activosDto[0]->getUsr_Mod(),
			"Estatus_Reg" => $Siga_verificacion_activosDto[0]->getEstatus_Reg()
		);
		
		array_push($Verif_Envia, $Verif_ResgE);	
		
		//Buscar Detalle Vale Resguardo
		$campos=[];
		$contador = 0;
		
		$proveedor = new Proveedor('sqlserver', 'activos');
		$proveedor->connect();
		
		$consulta="select DV.Id_Det_Verficacion, DV.Id_Verificacion, DV.Id_Activo, SA.AF_BC, SA.Nombre_Activo, CA.Nom_Area, CD.Des_Departamento, SA.Estatus_Reg as Estatus_Activo, SA.Marca, SA.Modelo, SA.NumSerie, CUP.Desc_Ubic_Prim, CUS.Desc_Ubic_Sec  ";
		$consulta.=" from siga_det_verificacion DV";
		$consulta.=" left join siga_activos SA on DV.Id_Activo=SA.Id_Activo";
		$consulta.=" left join siga_catareas CA on SA.Id_Area=CA.Id_Area ";
		$consulta.=" left join siga_cat_departamento CD on SA.Id_Departamento=CD.Id_Departamento";
		$consulta.=" left join siga_cat_ubic_prim CUP on SA.Id_Ubic_Prim = CUP.Id_Ubic_Prim";
		$consulta.=" left join siga_cat_ubic_sec CUS on SA.Id_Ubic_Sec = CUS.Id_Ubic_Sec";
		$consulta.=" where DV.Estatus_Reg <> '3' and DV.Id_Verificacion=".$Siga_verificacion_activosDto[0]->getId_Verificacion()."";
		
		$proveedor->execute($consulta);
		if (!$proveedor->error()) {
			if ($proveedor->rows($proveedor->stmt) > 0) {
				
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					//Verificado Anteriormente
					/////////////////////////////////////////////
					$sql=" select Id_Verificacion as Lote, FORMAT(Fech_Mod,'dd/MM/yyyy hh:mm:ss') as Fecha ";
					$sql.=" from siga_det_verificacion  where Id_Activo='".$row[2]."' and Estatus_Reg<>'3' and Id_Verificacion<>'".$row[1]."' order by Fecha asc";
					
					$proveedor_con2 = new Proveedor('sqlserver', 'activos');
					$proveedor_con2->connect();
					$proveedor_con2->execute($sql);
					//Consulta 2
					$respuesta2= "No";	
					if (!$proveedor_con2->error()) {
						if ($proveedor_con2->rows($proveedor_con2->stmt) > 0) {
							$respuesta2="";
							while ($row2 = $proveedor_con2->fetch_array($proveedor_con2->stmt, 0)) {
								$respuesta2.="Lote: ".$row2[0]." Fecha: ".$row2[1]." <br><br>";
							}
						}
					
					}else{
						$error=true;
					}
					$proveedor_con2->close();
					///////////////////////////////////////////
					
					
					$campos[$contador] = array(
						"Id_Det_Verficacion" => $row[0], 
						"Id_Verificacion" => $row[1], 
						"Id_Activo"=>$row[2],
						"AF_BC"=>$row[3],
						"Nombre_Activo"=>$row[4],
						'Nom_Area'=>$row[5],
						'Des_Departamento'=>$row[6],
						'Estatus_Activo'=>$row[7],
						'Marca'=>$row[8],
						'Modelo'=>$row[9],
						'NumSerie'=>$row[10],
						'Desc_Ubic_Prim'=>$row[11],
						'Desc_Ubic_Sec'=>$row[12],
						'Lote'=>$respuesta2
						);
                    $contador++;
                }
			}
		}
		$proveedor->close();
		
	}else{
		$error=false;
	}
	
	if($error==true){
		$respuesta = array("totalCount" => count($Verif_Envia), "data" => $Verif_Envia, "totalCountDetalle" => count($campos), "data_Detalle" => $campos, "estatus" => "ok", "mensaje" => "Registros Encontrados");   
	}else{
		$respuesta = array("totalCount" => "", "data" => "", "estatus" => "error", "mensaje" => "Ocurrio un Error");   
	}
	
	return $respuesta;
}

public function insertSiga_verificacion_activos($Siga_verificacion_activosDto,$array_activos, $proveedor=null){
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	$error = false;
	$respuesta = array();
	
	$Siga_verificacion_activosDao = new Siga_verificacion_activosDAO();
	$Siga_verificacion_activosDto = $Siga_verificacion_activosDao->insertSiga_verificacion_activos($Siga_verificacion_activosDto,$proveedor);
	
	if($Siga_verificacion_activosDto!=""){
		$Id_Verificacion=$Siga_verificacion_activosDto[0]->getId_Verificacion();
		
					
			if ( !is_array($array_activos) )
			{
			/*$log = new Logger();
            $text = "Entro..\n";
            $log->w_onError($text);*/

			$array_activos = str_replace("[","",$array_activos);
			$array_activos = str_replace("]","",$array_activos);
			$array_activos = explode(",",$array_activos);
			}
		
		if(count($array_activos)>0)
		{
			for($i=0; $i<count($array_activos); $i++) {
				if($array_activos[$i]!="N"&&$array_activos[$i]!="")
				{
					$Siga_det_verificacionDto= new Siga_det_verificacionDTO();
					$Siga_det_verificacionDao= new Siga_det_verificacionDAO();
				
					$Siga_det_verificacionDto->setId_Verificacion($Siga_verificacion_activosDto[0]->getId_Verificacion());
					$Siga_det_verificacionDto->setId_Activo($array_activos[$i]);
					$Siga_det_verificacionDto->setUsr_Inser($Siga_verificacion_activosDto[0]->getUsr_Inser());
					$Siga_det_verificacionDto->setEstatus_Reg($Siga_verificacion_activosDto[0]->getEstatus_Reg());
					$Siga_det_verificacionDto = $Siga_det_verificacionDao->insertSiga_det_verificacion($Siga_det_verificacionDto,$proveedor);
					
					if($Siga_det_verificacionDto==""){
						$error=true;
					}
				}	
			}
		}else{
			$error = true;
		}
	}else{
		$error = true;
	}
	
	if ($error == false) {
		$proveedor->commit();
		$respuesta = array("totalCount" => "1", "text" => "VERIFICACION GENERADA CORRECTAMENTE", "Id_Verificacion"=>$Id_Verificacion);
	} else {
		$proveedor->rollback();
		$respuesta = array("totalCount" => "0", "text" => "OCURRIO UN ERROR AL VERIFICAR");
	}
	$proveedor->close();
	return $respuesta;
	

}

public function updateSiga_verificacion_activos($Siga_verificacion_activosDto,$array_activos,$proveedor=null){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	
	//$Siga_verificacion_activosDto=$this->validarSiga_verificacion_activos($Siga_verificacion_activosDto);
	$Siga_verificacion_activosDao = new Siga_verificacion_activosDAO();
	//Variables para modificar
	$Fecha=$Siga_verificacion_activosDto->getFecha();
	$Comentarios=$Siga_verificacion_activosDto->getComentarios();
	$Usr_Mod=$Siga_verificacion_activosDto->getUsr_Mod();
	$Id_Area=$Siga_verificacion_activosDto->getId_Area();
	$Siga_verificacion_activosDto ->setEstatus_Reg("2");
	
	//Realizamos el update
	$Siga_verificacion_activosDto = $Siga_verificacion_activosDao->updateSiga_verificacion_activos($Siga_verificacion_activosDto,$proveedor);
	
	$error = false;
	$respuesta = array();
	
	if($Siga_verificacion_activosDto!=""){
		$Id_Verificacion=$Siga_verificacion_activosDto[0]->getId_Verificacion();
		
		$consulta="UPDATE siga_det_verificacion SET Estatus_Reg='3', Fech_Mod=getdate(), Usr_Mod=".$Usr_Mod." ";
		$consulta.=" where Id_Verificacion=".$Siga_verificacion_activosDto[0]->getId_Verificacion()."";
		$proveedor->execute($consulta);
		if (!$proveedor->error()) {
			if(count($array_activos)>0){
				for($i=0; $i<count($array_activos); $i++) {
					if($array_activos[$i]!="N"&&$array_activos[$i]!="")
					{
						$Siga_det_verificacionDto= new Siga_det_verificacionDTO();
						$Siga_det_verificacionDao= new Siga_det_verificacionDAO();
					
						$Siga_det_verificacionDto->setId_Verificacion($Siga_verificacion_activosDto[0]->getId_Verificacion());
						$Siga_det_verificacionDto->setId_Activo($array_activos[$i]);
						$Siga_det_verificacionDto->setUsr_Inser($Siga_verificacion_activosDto[0]->getUsr_Inser());
						$Siga_det_verificacionDto->setEstatus_Reg($Siga_verificacion_activosDto[0]->getEstatus_Reg());
						$Siga_det_verificacionDto = $Siga_det_verificacionDao->insertSiga_det_verificacion($Siga_det_verificacionDto,$proveedor);

						if($Siga_det_verificacionDto==""){
							$error=true;
						}
					}	
				}
			}else{
				$error = true;
			}	
		}else{
			$error = true;
		}
		
	}else{
		$error = true;
	}
	
	if ($error == false) {
		$proveedor->commit();
		$respuesta = array("totalCount" => "1", "text" => "VERIFICACION GENERADA CORRECTAMENTE", "Id_Verificacion"=>$Id_Verificacion);
	} else {
		$proveedor->rollback();
		$respuesta = array("totalCount" => "0", "text" => "OCURRIO UN ERROR AL VERIFICAR");
	}
	$proveedor->close();
	
	return $respuesta;
}

public function deleteSiga_verificacion_activos($Siga_verificacion_activosDto,$proveedor=null){
//$Siga_verificacion_activosDto=$this->validarSiga_verificacion_activos($Siga_verificacion_activosDto);
$Siga_verificacion_activosDao = new Siga_verificacion_activosDAO();
$Siga_verificacion_activosDto = $Siga_verificacion_activosDao->deleteSiga_verificacion_activos($Siga_verificacion_activosDto,$proveedor);
return $Siga_verificacion_activosDto;
}
public function llenarDataTable($draw, $columns, $order, $start, $length, $search, $siga_verificacion_activosDto) {
$Siga_verificacion_activosDao = new Siga_verificacion_activosDAO();
return $Siga_verificacion_activosDao->llenarDataTable($draw, $columns, $order, $start, $length, $search, $siga_verificacion_activosDto);
}
}
?>