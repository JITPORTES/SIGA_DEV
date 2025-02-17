<?php

error_reporting(E_ALL);
error_reporting(-1);
include_once(ROOT . DS . "datos" . DS . "connect" . DS . "Proveedor.Class.php");
include_once(ROOT . DS . "datos" . DS . "logger" . DS . "Logger.Class.php");

class Controller {
    public function __construct() {
        
    }

    public static function run($arraytablas) {
        
		$tablas=[];
        $contador = 0;
        $error = false;
		
        $proveedor = new Proveedor(DEFECTO_GESTOR, DEFECTO_BD);
        $proveedor->connect();
        //$proveedor->execute(" SELECT CAST(table_name as varchar) as tabla FROM INFORMATION_SCHEMA.TABLES ");
        //if (!$proveedor->error()) {			
		//	if ($proveedor->rows($proveedor->stmt) > 0) {
        //        while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
		//			$tablas[$contador] = $row[0];
        //            $contador++;
        //        }
        //    } else {
        //        $error = true;
        //        throw new Exception("No se loalizaron tablas de la bd");
        //    }
        //} else {
        //    $error = true;
        //    throw new Exception("Ocurrio un error al obtener el listado de tablas de la base");
        //}
		
		$array_cadena_tablas=explode(',', $arraytablas);	
		if(count($array_cadena_tablas)>0)
		{
			for($i = 0; $i <count($array_cadena_tablas); $i++){
				$tablas[]=$array_cadena_tablas[$i];
			}
		}else{
			$error = true;
			throw new Exception("No se encontraron tablas en la cadena");
		}
		
		if ((!$error) && (count($tablas) > 0)) {
            $logger = new Logger("/../../logs/", "Controllers");
            $logger->w_onError("**********COMIENZA EL PROGRAMA CON LA CREACION DEL CONTROLLER**********");
            for ($i = 0; $i < count($tablas); $i++) {
                $campos=[];
                $contador = 0;
                $proveedor->execute(" exec sp_columns " . $tablas[$i]);
                
				if (!$proveedor->error()) {
                    if ($proveedor->rows($proveedor->stmt) > 0) {
                        while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
							$campos[$contador] = array("field" => $row[3], "primary" => $row[16]);
                            $contador++;
						}
                    } else {
                        $error = true;
                    }
                } else {
                    $error = true;
                }
				
                if (count($campos) > 0) {
                    
					$pref = substr($tablas[$i], 0, 3);
                    $name = "";
                    if ($pref == DEFECTO_PREFIJO) {
                        $name = substr($tablas[$i], 3);
                    } else {
                        $name = $tablas[$i];
                    }
					
                    $controller = new Controller();
                    $controller->creaDirectorio(ROOT . "controladores" . DS . DEFECTO_BD . DS . $name);
                    //$logger->w_onError("CREAMOS EL DIRECTORIO: " . ROOT . "controladores" . DS . $name);
                    if ($controller->existeDirectorio(ROOT . "controladores" . DS . DEFECTO_BD . DS . $name)) {
                        if (!$controller->existeArchivo(ROOT . "controladores" . DS . DEFECTO_BD . DS . $name . DS . ucwords($name) . "Controller.Class.php")) {
                            $dto = fopen(ROOT . "controladores" . DS . DEFECTO_BD . DS . $name . DS . ucwords($name) . "Controller.Class.php", "w");
                            $logger->w_onError("CREAMOS EL ARCHIVO: " . ROOT . "controladores" . DS . DEFECTO_BD . DS . $name . DS . ucwords($name) . "Controller.Class.php");
                            $cuerpo = "<?php\n";
                            
                            $cuerpo.=" include_once(dirname(__FILE__).\"" . DS . ".." . DS . ".." . DS . ".." . DS . "modelos" . DS . DEFECTO_BD . DS . "dto" . DS . $name . DS . ucwords($name) . "DTO.Class.php\");\n";
                            $cuerpo.= "include_once(dirname(__FILE__).\"" . DS . ".." . DS . ".." . DS . ".." . DS . "modelos" . DS . DEFECTO_BD . DS . "dao" . DS . $name . DS . ucwords($name) . "DAO.Class.php\");\n";
                            $cuerpo.= "include_once(dirname(__FILE__).\"" . DS . ".." . DS . ".." . DS . ".." . DS . "datos" . DS . "connect" . DS . "Proveedor.Class.php\");\n";
                            $cuerpo.= "class " . ucwords($name) . "Controller {\n";
                            $cuerpo.= "private \$proveedor;\n";
                            $cuerpo.="public function __construct() {\n";
                            $cuerpo.="}\n";
                            $cuerpo.="public function validar" . ucwords($name) . "($" . ucwords($name) . "Dto){\n";
                            for ($x = 0; $x < count($campos); $x++) {
                                $cuerpo.="$" . ucwords($name) . "Dto->set" . $campos[$x]["field"] . "(strtoupper(str_ireplace(\"'\",\"\",trim($" . ucwords($name) . "Dto->get" . $campos[$x]["field"] . "()))));\n";			
                            }
                            $cuerpo.="return $" . ucwords($name) . "Dto;\n";
                            $cuerpo.="}\n";
                            $cuerpo.="public function select" . ucwords($name) . "($" . ucwords($name) . "Dto,\$proveedor=null){\n";
                            $cuerpo.="$" . ucwords($name) . "Dto=\$this->validar" . ucwords($name) . "($" . ucwords($name) . "Dto);\n";
                            $cuerpo.="$" . ucwords($name) . "Dao = new " . ucwords($name) . "DAO();\n";
                            $cuerpo.="$" . ucwords($name) . "Dto = $" . ucwords($name) . "Dao->select" . ucwords($name) . "($" . ucwords($name) . "Dto,\$proveedor);\n";
                            $cuerpo.="return $" . ucwords($name) . "Dto;\n";
                            $cuerpo.="}\n";
                            $cuerpo.="public function insert" . ucwords($name) . "($" . ucwords($name) . "Dto,\$proveedor=null){\n";
                            $cuerpo.="$" . ucwords($name) . "Dto=\$this->validar" . ucwords($name) . "($" . ucwords($name) . "Dto);\n";
                            $cuerpo.="$" . ucwords($name) . "Dao = new " . ucwords($name) . "DAO();\n";
                            $cuerpo.="$" . ucwords($name) . "Dto = $" . ucwords($name) . "Dao->insert" . ucwords($name) . "($" . ucwords($name) . "Dto,\$proveedor);\n";
                            $cuerpo.="return $" . ucwords($name) . "Dto;\n";
                            $cuerpo.="}\n";
                            $cuerpo.="public function update" . ucwords($name) . "($" . ucwords($name) . "Dto,\$proveedor=null){\n";
                            $cuerpo.="$" . ucwords($name) . "Dto=\$this->validar" . ucwords($name) . "($" . ucwords($name) . "Dto);\n";
                            $cuerpo.="$" . ucwords($name) . "Dao = new " . ucwords($name) . "DAO();\n";
                            $cuerpo.="//\$tmpDto = new " . ucwords($name) . "DTO();\n";

                            $cuerpo.="//\$tmpDto = $" . ucwords($name) . "Dao->select" . ucwords($name) . "($" . ucwords($name) . "Dto,\$proveedor);\n";
                            $cuerpo.="//if(\$tmpDto!=\"\"){";
                            $cuerpo.="//$" . ucwords($name) . "Dto->setFechaRegistro(\$tmpDto[0]->getFechaRegistro());\n";
                            $cuerpo.="$" . ucwords($name) . "Dto = $" . ucwords($name) . "Dao->update" . ucwords($name) . "($" . ucwords($name) . "Dto,\$proveedor);\n";
                            $cuerpo.="return $" . ucwords($name) . "Dto;\n";
                            $cuerpo.="//}\n";
                            $cuerpo.="//return \"\";\n";
                            $cuerpo.="}\n";
                            $cuerpo.="public function delete" . ucwords($name) . "($" . ucwords($name) . "Dto,\$proveedor=null){\n";
                            $cuerpo.="$" . ucwords($name) . "Dto=\$this->validar" . ucwords($name) . "($" . ucwords($name) . "Dto);\n";
                            $cuerpo.="$" . ucwords($name) . "Dao = new " . ucwords($name) . "DAO();\n";
                            $cuerpo.="$" . ucwords($name) . "Dto = $" . ucwords($name) . "Dao->delete" . ucwords($name) . "($" . ucwords($name) . "Dto,\$proveedor);\n";
                            $cuerpo.="return $" . ucwords($name) . "Dto;\n";
                            $cuerpo.="}\n";
                            $cuerpo.= "}\n?>";
                            fwrite($dto, $cuerpo);
                        } else {
                            $logger->w_onError("EL ARCHIVO YA EXISTE NO SE PUEDE REESCRIBIR " . ROOT . "controladores" . DS . $name . DS . ucwords($name) . "Controller.Class.php");
                        }
                    } else {
                        $logger->w_onError("EL DIRECTORIO NO SE LOGRO CREAR");
                    }
                }

//                break;
            }
        }
        $logger->w_onError("**********TERMINA EL PROGRAMA CON LA CREACION DEL CONTROLLER**********");
        $proveedor->free_result($proveedor->stmt);
        $proveedor->close();
    }

    private function existeArchivo($NomArchivo) {
        if (file_exists($NomArchivo)) {
            return true;
        } else {
            return false;
        }
    }

    private function creaDirectorio($NomDirectorio) {
        $VectorDirectorio = preg_split("[" . DS . "]", $NomDirectorio);
        $ruta = "";
		foreach ($VectorDirectorio as $Carpeta) {
            if ($Carpeta != "." && trim($Carpeta) != "") {
                if (DEFECTO_SO == "windows") {
                    if ($ruta == "") {
                        $ruta = $Carpeta;
                    } else {
                        $ruta = $ruta . "" . DS . "" . $Carpeta;
                    }
                } else {
                    $ruta = $ruta . "/" . $Carpeta;
                }
				if (!$this->existeDirectorio($ruta)) {
					mkdir($ruta, 0777);
                }
            }
        }
    }

    private function existeDirectorio($NomDirectorio) {
        if (is_dir($NomDirectorio) == true)
            return true;

        return false;
    }

    private function funcionExiste($function) {
        if (function_exists($function))
            return true;
        else
            return false;
    }

}

?>