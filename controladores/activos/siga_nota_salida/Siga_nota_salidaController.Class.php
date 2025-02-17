<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_nota_salida/Siga_nota_salidaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_nota_salida/Siga_nota_salidaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_nota_salidaController {
private $proveedor;
public function __construct() {
}
public function validarSiga_nota_salida($Siga_nota_salidaDto){
$Siga_nota_salidaDto->setId_Nota_Salida(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getId_Nota_Salida()))));
$Siga_nota_salidaDto->setId_Area_Realiza(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getId_Area_Realiza()))));
$Siga_nota_salidaDto->setId_Ubic_Prim(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getId_Ubic_Prim()))));
$Siga_nota_salidaDto->setId_Ubic_Sec(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getId_Ubic_Sec()))));
$Siga_nota_salidaDto->setId_Motivo_Salida(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getId_Motivo_Salida()))));
$Siga_nota_salidaDto->setId_Usr_Realiza_Nota(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getId_Usr_Realiza_Nota()))));
$Siga_nota_salidaDto->setNombre_Realiza_Nota(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getNombre_Realiza_Nota()))));
$Siga_nota_salidaDto->setMail_Realiza_Nota(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getMail_Realiza_Nota()))));
$Siga_nota_salidaDto->setFirma_Realiza_Nota(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getFirma_Realiza_Nota()))));
$Siga_nota_salidaDto->setFech_Realiza_Nota(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getFech_Realiza_Nota()))));
$Siga_nota_salidaDto->setId_Usr_Quien_Autoriza(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getId_Usr_Quien_Autoriza()))));
$Siga_nota_salidaDto->setNombre_Quien_Autoriza(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getNombre_Quien_Autoriza()))));
$Siga_nota_salidaDto->setMail_Quien_Autoriza(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getMail_Quien_Autoriza()))));
$Siga_nota_salidaDto->setFirma_Quien_Autoriza(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getFirma_Quien_Autoriza()))));
$Siga_nota_salidaDto->setFech_Autoriza(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getFech_Autoriza()))));
$Siga_nota_salidaDto->setEmpresa_Recibe(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getEmpresa_Recibe()))));
$Siga_nota_salidaDto->setNombre_Contacto(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getNombre_Contacto()))));
$Siga_nota_salidaDto->setTelefono_Contacto(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getTelefono_Contacto()))));
$Siga_nota_salidaDto->setMail_Contacto(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getMail_Contacto()))));
$Siga_nota_salidaDto->setFirma_Quien_Recibe(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getFirma_Quien_Recibe()))));
$Siga_nota_salidaDto->setFech_Firma_Recibe(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getFech_Firma_Recibe()))));
$Siga_nota_salidaDto->setObservaciones(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getObservaciones()))));
$Siga_nota_salidaDto->setUrl_Adjuntos(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getUrl_Adjuntos()))));
$Siga_nota_salidaDto->setEstatus_Proceso(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getEstatus_Proceso()))));
$Siga_nota_salidaDto->setTipo_Solicitud(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getTipo_Solicitud()))));
$Siga_nota_salidaDto->setDesc_Motivo_Cancel_Proceso(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()))));
$Siga_nota_salidaDto->setNota_Duplicada(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getNota_Duplicada()))));
$Siga_nota_salidaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getUsr_Inser()))));
$Siga_nota_salidaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getFech_Inser()))));
$Siga_nota_salidaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getUsr_Mod()))));
$Siga_nota_salidaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getFech_Mod()))));
$Siga_nota_salidaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_nota_salidaDto->getEstatus_Reg()))));
return $Siga_nota_salidaDto;
}
public function selectSiga_nota_salida($Siga_nota_salidaDto,$proveedor=null){
$Siga_nota_salidaDto=$this->validarSiga_nota_salida($Siga_nota_salidaDto);
$Siga_nota_salidaDao = new Siga_nota_salidaDAO();
$Siga_nota_salidaDto = $Siga_nota_salidaDao->selectSiga_nota_salida($Siga_nota_salidaDto,$proveedor);
return $Siga_nota_salidaDto;
}
public function insertSiga_nota_salida($Siga_nota_salidaDto,$proveedor=null){
$Siga_nota_salidaDto=$this->validarSiga_nota_salida($Siga_nota_salidaDto);
$Siga_nota_salidaDao = new Siga_nota_salidaDAO();
$Siga_nota_salidaDto = $Siga_nota_salidaDao->insertSiga_nota_salida($Siga_nota_salidaDto,$proveedor);
return $Siga_nota_salidaDto;
}
public function updateSiga_nota_salida($Siga_nota_salidaDto,$proveedor=null){
$Siga_nota_salidaDto=$this->validarSiga_nota_salida($Siga_nota_salidaDto);
$Siga_nota_salidaDao = new Siga_nota_salidaDAO();
//$tmpDto = new Siga_nota_salidaDTO();
//$tmpDto = $Siga_nota_salidaDao->selectSiga_nota_salida($Siga_nota_salidaDto,$proveedor);
//if($tmpDto!=""){//$Siga_nota_salidaDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_nota_salidaDto = $Siga_nota_salidaDao->updateSiga_nota_salida($Siga_nota_salidaDto,$proveedor);
return $Siga_nota_salidaDto;
//}
//return "";
}
public function deleteSiga_nota_salida($Siga_nota_salidaDto,$proveedor=null){
$Siga_nota_salidaDto=$this->validarSiga_nota_salida($Siga_nota_salidaDto);
$Siga_nota_salidaDao = new Siga_nota_salidaDAO();
$Siga_nota_salidaDto = $Siga_nota_salidaDao->deleteSiga_nota_salida($Siga_nota_salidaDto,$proveedor);
return $Siga_nota_salidaDto;
}
}
?>