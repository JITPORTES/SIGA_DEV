<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_catalogos/Siga_cat_catalogosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_catalogos/Siga_cat_catalogosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__) . "/../../../datos/logger/Logger.Class.php");
class Siga_cat_catalogosController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_catalogos($Siga_cat_catalogosDto){
$Siga_cat_catalogosDto->setId_Catalogo(strtoupper(str_ireplace("'","",trim($Siga_cat_catalogosDto->getId_Catalogo()))));
$Siga_cat_catalogosDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_catalogosDto->getId_Area()))));
$Siga_cat_catalogosDto->setNom_Tabla(strtoupper(str_ireplace("'","",trim($Siga_cat_catalogosDto->getNom_Tabla()))));
$Siga_cat_catalogosDto->setNom_Id_Campo(strtoupper(str_ireplace("'","",trim($Siga_cat_catalogosDto->getNom_Id_Campo()))));
$Siga_cat_catalogosDto->setNom_Desc_Campo(strtoupper(str_ireplace("'","",trim($Siga_cat_catalogosDto->getNom_Desc_Campo()))));
$Siga_cat_catalogosDto->setDescripcion(strtoupper(str_ireplace("'","",trim($Siga_cat_catalogosDto->getDescripcion()))));
$Siga_cat_catalogosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_catalogosDto->getFech_Inser()))));
$Siga_cat_catalogosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_catalogosDto->getUsr_Inser()))));
$Siga_cat_catalogosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_catalogosDto->getFech_Mod()))));
$Siga_cat_catalogosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_catalogosDto->getUsr_Mod()))));
return $Siga_cat_catalogosDto;
}
public function selectSiga_cat_catalogos($Siga_cat_catalogosDto,$proveedor=null){
$Siga_cat_catalogosDto=$this->validarSiga_cat_catalogos($Siga_cat_catalogosDto);
$Siga_cat_catalogosDao = new Siga_cat_catalogosDAO();
$Siga_cat_catalogosDto = $Siga_cat_catalogosDao->selectSiga_cat_catalogos($Siga_cat_catalogosDto,$proveedor);
return $Siga_cat_catalogosDto;
}


public function insertSiga_cat_catalogos($Siga_cat_catalogosDto,$proveedor=null){
//$Siga_cat_catalogosDto=$this->validarSiga_cat_catalogos($Siga_cat_catalogosDto);
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	$resultado = array();
	$tabla="";
	$error = false;
	$msg ="";
	$consulta="SELECT * FROM INFORMATION_SCHEMA.TABLES where TABLE_NAME='siga_".$Siga_cat_catalogosDto->getNom_Tabla()."'";
	$proveedor->execute($consulta);
	
	if (!$proveedor->error()) {
        if ($proveedor->rows($proveedor->stmt) > 0) {
			$error = true;
			$msg="LA TABLA YA EXISTE";		
        }else {
			$Siga_cat_catalogosDto->setNom_Tabla("siga_".$Siga_cat_catalogosDto->getNom_Tabla());
			$Siga_cat_catalogosDao = new Siga_cat_catalogosDAO();
			$Siga_cat_catalogos = $Siga_cat_catalogosDao->insertSiga_cat_catalogos($Siga_cat_catalogosDto,$proveedor);
			if($Siga_cat_catalogos!=""){
				//Se crea la tabla con los parametros recibidos
				$tabla.="CREATE TABLE ".$Siga_cat_catalogosDto->getNom_Tabla()."(";
				$tabla.=$Siga_cat_catalogosDto->getNom_Id_Campo()." int IDENTITY(1,1) NOT NULL,";
				$tabla.=$Siga_cat_catalogosDto->getNom_Desc_Campo()." varchar (50) NULL,";
				$tabla.="Fech_Inser datetime NULL,";
				$tabla.="Usr_Inser char(25) NULL,";
				$tabla.="Fech_Mod datetime NULL,";
				$tabla.="Usr_Mod char(25) NULL,";
				$tabla.="Estatus_Reg int NULL,";
				$tabla.="CONSTRAINT PK_".$Siga_cat_catalogosDto->getNom_Tabla()." PRIMARY KEY (".$Siga_cat_catalogosDto->getNom_Id_Campo().")";
				$tabla.=")";
				//Fin de creacion de la tabla";
				
				$proveedor->execute($tabla);
				if(!$proveedor->error()){
					
				}else{
					$error = true;
					$msg="OCURRIO UN ERROR AL GENERAR LA TABLA siga_".$Siga_cat_catalogosDto->getNom_Tabla();
					$logger = new Logger("/../../logs/", "siga_cat_catalogos");	
					$logger->w_onError("**********OCURRIO UN ERROR AL GENERAR LA TABLA ".$Siga_cat_catalogosDto->getNom_Tabla()." **********");	
					$logger->w_onError("**********CREATE TABLE siga_".$Siga_cat_catalogosDto->getNom_Tabla()."(");
					$logger->w_onError("**********".$Siga_cat_catalogosDto->getNom_Id_Campo()." int IDENTITY(1,1) NOT NULL,");
					$logger->w_onError("**********".$Siga_cat_catalogosDto->getNom_Desc_Campo()." varchar (50) NULL,");
					$logger->w_onError("**********Fech_Inser datetime NULL,");
					$logger->w_onError("**********Usr_Inser char(25) NULL,");
					$logger->w_onError("**********Fech_Mod datetime NULL,");
					$logger->w_onError("**********Usr_Mod char(25) NULL,");
					$logger->w_onError("**********Estatus_Reg int NULL,");	
					$logger->w_onError("**********CONSTRAINT PK_".$Siga_cat_catalogosDto->getNom_Tabla()." PRIMARY KEY (".$Siga_cat_catalogosDto->getNom_Id_Campo().")");	
					$logger->w_onError("**********)\n");
				}
			}else{
				$error = true;
				$msg[] = array("OCURRIO UN ERROR AL INSERTAR LOS DATOS A LA TABLA");
				$logger = new Logger("/../../logs/", "siga_cat_catalogos");	
				$logger->w_onError("**********OCURRIO UN ERROR AL INSERTAR DATOS EN LA TABLA SIGA_CAT_CATALOGOS**********");	
				$logger->w_onError("**********Nom Tabla: " . $Siga_cat_catalogosDto->getId_Area());
				$logger->w_onError("**********Nom Tabla: " . $Siga_cat_catalogosDto->getNom_Tabla());
				$logger->w_onError("**********Nom Id Campo: " . $Siga_cat_catalogosDto->getNom_Id_Campo());
				$logger->w_onError("**********Nom Desc Campo: " . $Siga_cat_catalogosDto->getNom_Desc_Campo());
				$logger->w_onError("**********Descripcion: " . $Siga_cat_catalogosDto->getDescripcion());
				$logger->w_onError("**********Usuario: " . $Siga_cat_catalogosDto->getUsr_Inser()."\n");	
			}
        }
    }else{
		$error = true;
		$msg="OCURRIO UN ERROR AL BUSCAR LA TABLA EN LA BD";
		$logger = new Logger("/../../logs/", "siga_cat_catalogos");	
		$logger->w_onError("**********OCURRIO UN ERROR AL BUSCAR LA TABLA EN LA BD**********");
		$logger->w_onError("**********".$consulta);
		$logger->w_onError("\n");
	}

	if ($error==false) {
        $proveedor->commit();
		$resultado = array("totalCount" => "1", "mensaje" => "SE HA CREADO LA TABLA");
	} else {
        $proveedor->rollback();
		$resultado = array("totalCount" => "0", "mensaje" => $msg);
	}
	$proveedor->close();
	return $resultado;
}

public function insertCatalogos($Siga_cat_catalogosDto,$Desc_Campo,$Id_Campoedit,$proveedor=null){
	$Siga_cat_catalogosDao = new Siga_cat_catalogosDAO();
	$Usuario=$Siga_cat_catalogosDto->getUsr_Inser();
	$Id_Catalogo=$Siga_cat_catalogosDto->getId_Catalogo();
	$Siga_cat_catalogosDto->setUsr_Inser("");
	//Buscamos la tabla a eliminar en la tabla de catalogos Siga_cat_catalogos, enviando como parametro el Id_Catalogo
	$Siga_cat_catalogosDto = $Siga_cat_catalogosDao->selectSiga_cat_catalogos($Siga_cat_catalogosDto,$proveedor);
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	$resultado = array();
	$error = false;
	$msg ="";
	$Id_Cat_Agregado="";
	//Si la consulta viene vacia, marcara un error
	if($Siga_cat_catalogosDto!="")
	{
		//Tomamos los valores de la tabla siga_cat_catalogos para poder realizar el insert o update
		$Nom_tabla=$Siga_cat_catalogosDto[0]->getNom_Tabla();
		$Id_Campo=$Siga_cat_catalogosDto[0]->getNom_Id_Campo();
		$Nom_Desc_Campo=$Siga_cat_catalogosDto[0]->getNom_Desc_Campo();
		
		
		//Id_CampoEdit, es el Id del campo que queremos editar, si viene vacio entonces se hace una insersion sino, se realiza el update
		if($Id_Campoedit=="")
		{
			//Realiza una consulta para verficar que el registro no exista
			$sql="select * from ".$Nom_tabla." where ".$Nom_Desc_Campo."= rtrim(ltrim('".$Desc_Campo."')) and Estatus_Reg<>'3'";
			$proveedor->execute($sql);
			if (!$proveedor->error()) {
				//Si la consulta trae resultados mandara un mensaje de que el registro existe
				if ($proveedor->rows($proveedor->stmt) > 0) {
					$error = true;
					$msg="EL REGISTRO YA EXISTE";
				}else{
					//sino realiza la operacion
					$sql="INSERT INTO ".$Nom_tabla."(";
					//$sql.=$Id_Campo.",";
					$sql.=$Nom_Desc_Campo.",";
					$sql.="Fech_Inser,";
					$sql.="Usr_Inser,";
					$sql.="Fech_Mod,";
					$sql.="Usr_Mod,";
					$sql.="Estatus_Reg";
					$sql.=") VALUES(";
					$sql.="'".$Desc_Campo."',";
					$sql.="getdate(),";
					$sql.="'".$Usuario."',";
					$sql.="getdate(),";
					$sql.="'',";
					$sql.="'1'";
					$sql.=")";
					$proveedor->execute($sql);
					
					if (!$proveedor->error()) {
						if($Id_Campoedit==""){
							$Id_Cat_Agregado=$proveedor->lastID();
							$msg="AGREGADO CORRECTAMENTE";
						}
					} else {
						$error = true;
						$msg="NO SE ENCONTRO LA TABLA";	
						$logger = new Logger("/../../logs/", "Alta_Catalogos");	
						$logger->w_onError("**********OCURRIO UN ERROR INSERTAR EN LA TABLA **********");	
						$logger->w_onError("**********Query: ".$sql);
					}
				}
			}
		}else{
			//Realiza una consulta para verficar que el registro no exista
			$sql="select * from ".$Nom_tabla." where ".$Nom_Desc_Campo."= rtrim(ltrim('".$Desc_Campo."')) and ".$Id_Campo." <> '".$Id_Campoedit."' and Estatus_Reg<>'3'";
			$proveedor->execute($sql);
			if (!$proveedor->error()) {
				if ($proveedor->rows($proveedor->stmt) > 0) {
					$error = true;
					$msg="EL REGISTRO YA EXISTE";
				}else{
					$sql="UPDATE ".$Nom_tabla." SET ";
					$sql.=$Nom_Desc_Campo."= '".$Desc_Campo."'";
					$sql.=",Fech_Mod=getdate()";
					$sql.=",Usr_Mod='".$Usuario."'";
					$sql.=",Estatus_Reg='2'";
					$sql.=" WHERE ";
					$sql.=$Id_Campo." ='".$Id_Campoedit."'";
					
					//Se realiza la operacion  Update
					$proveedor->execute($sql);
					
					if (!$proveedor->error()) {
						$msg="MODIFICADO CORRECTAMENTE";
					} else {
						$error = true;
						$msg="NO SE ENCONTRO LA TABLA";	
						$logger = new Logger("/../../logs/", "Alta_Catalogos");	
						$logger->w_onError("**********OCURRIO UN ERROR MODIFICAR EN LA TABLA **********");	
						$logger->w_onError("**********Query: ".$sql);
					}
				}
			} else {
				$error = true;
				$msg="OCURRIO UN ERROR";	
				$logger = new Logger("/../../logs/", "Alta_Catalogos");	
				$logger->w_onError("**********OCURRIO UN ERROR AL BUSCAR LA TABLA EN LA TABLA **********");	
				$logger->w_onError("**********Query: ".$sql);
			}	
		}
	}else{
		$error=true;
		$msg="NO SE ENCONTRO LA TABLA";	
		$logger = new Logger("/../../logs/", "Alta_Catalogos");	
		$logger->w_onError("**********NO SE ENCONTRO LA TABLA **********");	
		$logger->w_onError("**********Id_Catalogo: ".$Id_Catalogo);
	}
	if ($error==false) {
        $proveedor->commit();
		$resultado = array("totalCount" => "1", "mensaje" => $msg, "Id_Cat_Agregado"=>$Id_Cat_Agregado);
	} else {
        $proveedor->rollback();
		$resultado = array("totalCount" => "0", "mensaje" => $msg);
	}
	$proveedor->close();
	return $resultado;
}

public function deleteCatalogos($Siga_cat_catalogosDto,$Id_Campoedit,$proveedor=null){
	$Siga_cat_catalogosDao = new Siga_cat_catalogosDAO();
	$Usuario=$Siga_cat_catalogosDto->getUsr_Mod();
	$Id_Catalogo=$Siga_cat_catalogosDto->getId_Catalogo();
	$Siga_cat_catalogosDto->setUsr_Mod("");
	//Buscamos la tabla a eliminar en la tabla de catalogos Siga_cat_catalogos, enviando como parametro el Id_Catalogo
	$Siga_cat_catalogosDto = $Siga_cat_catalogosDao->selectSiga_cat_catalogos($Siga_cat_catalogosDto,$proveedor);
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	$resultado = array();
	$error = false;
	$msg ="";
	//Si la consulta viene vacia, marcara un error
	if($Siga_cat_catalogosDto!="")
	{
		//Tomamos los valores de la tabla siga_cat_catalogos para poder realizar el update
		$Nom_tabla=$Siga_cat_catalogosDto[0]->getNom_Tabla();
		$Id_Campo=$Siga_cat_catalogosDto[0]->getNom_Id_Campo();
		$Nom_Desc_Campo=$Siga_cat_catalogosDto[0]->getNom_Desc_Campo();
		//Se Realiza la operacion Update
		$sql="UPDATE ".$Nom_tabla." SET ";
		$sql.="Fech_Mod=getdate()";
		$sql.=",Usr_Mod='".$Usuario."'";
		$sql.=",Estatus_Reg='3'";
		$sql.=" WHERE ";
		$sql.=$Id_Campo." ='".$Id_Campoedit."'";
		$proveedor->execute($sql);
		
		//Si realiza la operacion correctamente, enviara una notificacion a la vista 
		if (!$proveedor->error()) {
			$msg="ELIMINADO CORRECTAMENTE";
		} else {
			$error = true;
			$msg="NO SE ENCONTRO LA TABLA";	
			$logger = new Logger("/../../logs/", "Alta_Catalogos");	
			$logger->w_onError("**********OCURRIO UN ERROR AL ELIMINAR EN LA TABLA (Eliminacion Logica) **********");	
			$logger->w_onError("**********Query: ".$sql);
		}
	}else{
		$error=true;
		$msg="NO SE ENCONTRO LA TABLA";	
		$logger = new Logger("/../../logs/", "Alta_Catalogos");	
		$logger->w_onError("**********NO SE ENCONTRO LA TABLA **********");	
		$logger->w_onError("**********Id_Catalogo: ".$Id_Catalogo);
	}
	if ($error==false) {
        $proveedor->commit();
		$resultado = array("totalCount" => "1", "mensaje" => $msg);
	} else {
        $proveedor->rollback();
		$resultado = array("totalCount" => "0", "mensaje" => $msg);
	}
	$proveedor->close();
	return $resultado;
}


public function consultartablas($Siga_cat_catalogosDto,$proveedor=null){
	$Siga_cat_catalogosDao = new Siga_cat_catalogosDAO();
	$CadenaTabla=$Siga_cat_catalogosDto->getNom_Tabla();
	$Siga_cat_catalogosDto = $Siga_cat_catalogosDao->selectSiga_cat_catalogos($Siga_cat_catalogosDto,$proveedor);
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	$resultado = array();
	$error = false;
	$msg ="";
	if($Siga_cat_catalogosDto!="")
	{
		
		$Id_Catalogo=$Siga_cat_catalogosDto[0]->getId_Catalogo();
		$Id_Area=$Siga_cat_catalogosDto[0]->getId_Area();
		$Nom_tabla=$Siga_cat_catalogosDto[0]->getNom_Tabla();
		$Id_Campo=$Siga_cat_catalogosDto[0]->getNom_Id_Campo();
		$Nom_Desc_Campo=$Siga_cat_catalogosDto[0]->getNom_Desc_Campo();
		$sql="select * from ". $Nom_tabla." where Estatus_Reg <> '3'";
		$proveedor->execute($sql);
		//Variables
		$campos=[];
		$contador = 0;
		//Fin Variables
		if (!$proveedor->error()) {			
			if ($proveedor->rows($proveedor->stmt) > 0) {
                while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					//$campos[$contador] = $row[0];
					$campos[$contador] = array("Id_Campo" => $row[0], "DescCampo" => $row[1], "Id_Catalogo"=>$Id_Catalogo, "Id_Area"=>$Id_Area);
                    $contador++;
                }
            } else {
                $error = true;
				$msg="NO SE ENCONTRARON DATOS EN LA TABLA ".$Nom_tabla;	
            }
        } else {
            $error = true;
			$msg="OCURRIO UN ERROR AL OBTENER EL LISTADO DE LA TABLA: ".$Nom_tabla;	
			$logger = new Logger("/../../logs/", "Alta_Catalogos");	
			$logger->w_onError("**********OCURRIO UN ERROR **********");	
			$logger->w_onError("**********".$msg);
        }
		
	}else{
		$error=true;
		$msg="NO SE ENCONTRO LA TABLA";	
		$logger = new Logger("/../../logs/", "Alta_Catalogos");	
		$logger->w_onError("**********NO SE ENCONTRO LA TABLA **********");	
		$logger->w_onError("**********Nom Tabla: ".$CadenaTabla);
	}
	if ($error==false) {
        $proveedor->commit();
		$resultado = array("totalCount" => count($campos), "mensaje" => "BUSQUEDA EXITOSA", "data"=>$campos);
	} else {
        $proveedor->rollback();
		$resultado = array("totalCount" => "0", "mensaje" => $msg);
	}
	$proveedor->close();
	return $resultado;
}



public function updateSiga_cat_catalogos($Siga_cat_catalogosDto,$proveedor=null){
//$Siga_cat_catalogosDto=$this->validarSiga_cat_catalogos($Siga_cat_catalogosDto);
$Siga_cat_catalogosDao = new Siga_cat_catalogosDAO();
//$tmpDto = new Siga_cat_catalogosDTO();
//$tmpDto = $Siga_cat_catalogosDao->selectSiga_cat_catalogos($Siga_cat_catalogosDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_catalogosDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_catalogosDto = $Siga_cat_catalogosDao->updateSiga_cat_catalogos($Siga_cat_catalogosDto,$proveedor);
return $Siga_cat_catalogosDto;
//}
//return "";
}
public function deleteSiga_cat_catalogos($Siga_cat_catalogosDto,$proveedor=null){
//$Siga_cat_catalogosDto=$this->validarSiga_cat_catalogos($Siga_cat_catalogosDto);
$Siga_cat_catalogosDao = new Siga_cat_catalogosDAO();
$Siga_cat_catalogosDto = $Siga_cat_catalogosDao->deleteSiga_cat_catalogos($Siga_cat_catalogosDto,$proveedor);
return $Siga_cat_catalogosDto;
}
public function llenarDataTable($draw, $columns, $order, $start, $length, $search) {
$Siga_cat_catalogosDao = new Siga_cat_catalogosDAO();
return $Siga_cat_catalogosDao->llenarDataTable($draw, $columns, $order, $start, $length, $search);
}
}
?>