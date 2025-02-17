<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_v_empleados_activo_fijoController {
private $proveedor;
public function __construct() {
}
public function validarSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto){
$Siga_v_empleados_activo_fijoDto->setid(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getid()))));
$Siga_v_empleados_activo_fijoDto->setnum_empleado(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getnum_empleado()))));
$Siga_v_empleados_activo_fijoDto->settipo_empleado(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->gettipo_empleado()))));
$Siga_v_empleados_activo_fijoDto->setfecha_alta(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getfecha_alta()))));
$Siga_v_empleados_activo_fijoDto->setnombres(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getnombres()))));
$Siga_v_empleados_activo_fijoDto->setnombre_completo(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getnombre_completo()))));
$Siga_v_empleados_activo_fijoDto->setnombre_completo2(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getnombre_completo2()))));
$Siga_v_empleados_activo_fijoDto->setpuesto(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getpuesto()))));
$Siga_v_empleados_activo_fijoDto->setdepartamento(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getdepartamento()))));
$Siga_v_empleados_activo_fijoDto->setgerencia(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getgerencia()))));
$Siga_v_empleados_activo_fijoDto->setcentro_costo(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getcentro_costo()))));
$Siga_v_empleados_activo_fijoDto->setfoto(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getfoto()))));
$Siga_v_empleados_activo_fijoDto->setapellidos(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getapellidos()))));
$Siga_v_empleados_activo_fijoDto->setestatus(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getestatus()))));
$Siga_v_empleados_activo_fijoDto->setnom_estatus(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getnom_estatus()))));
$Siga_v_empleados_activo_fijoDto->setext_telefonica(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getext_telefonica()))));
$Siga_v_empleados_activo_fijoDto->setemail(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getemail()))));
$Siga_v_empleados_activo_fijoDto->setEMAIL_CFDI(strtoupper(str_ireplace("'","",trim($Siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()))));
return $Siga_v_empleados_activo_fijoDto;
}
public function selectSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto,$proveedor=null){
$Siga_v_empleados_activo_fijoDto=$this->validarSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto);
$Siga_v_empleados_activo_fijoDao = new Siga_v_empleados_activo_fijoDAO();
$Siga_v_empleados_activo_fijoDto = $Siga_v_empleados_activo_fijoDao->selectSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto,$proveedor);
return $Siga_v_empleados_activo_fijoDto;
}
public function insertSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto,$proveedor=null){
//$Siga_v_empleados_activo_fijoDto=$this->validarSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto);
$Siga_v_empleados_activo_fijoDao = new Siga_v_empleados_activo_fijoDAO();
$Siga_v_empleados_activo_fijoDto = $Siga_v_empleados_activo_fijoDao->insertSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto,$proveedor);
return $Siga_v_empleados_activo_fijoDto;
}
public function updateSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto,$proveedor=null){
//$Siga_v_empleados_activo_fijoDto=$this->validarSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto);
$Siga_v_empleados_activo_fijoDao = new Siga_v_empleados_activo_fijoDAO();
//$tmpDto = new Siga_v_empleados_activo_fijoDTO();
//$tmpDto = $Siga_v_empleados_activo_fijoDao->selectSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto,$proveedor);
//if($tmpDto!=""){//$Siga_v_empleados_activo_fijoDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_v_empleados_activo_fijoDto = $Siga_v_empleados_activo_fijoDao->updateSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto,$proveedor);
return $Siga_v_empleados_activo_fijoDto;
//}
//return "";
}
public function deleteSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto,$proveedor=null){
//$Siga_v_empleados_activo_fijoDto=$this->validarSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto);
$Siga_v_empleados_activo_fijoDao = new Siga_v_empleados_activo_fijoDAO();
$Siga_v_empleados_activo_fijoDto = $Siga_v_empleados_activo_fijoDao->deleteSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto,$proveedor);
return $Siga_v_empleados_activo_fijoDto;
}
}
?>