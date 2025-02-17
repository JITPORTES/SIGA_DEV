<?php
 class Siga_det_verificacionDTO {
    private $Id_Det_Verficacion;
    private $Id_Verificacion;
    private $Id_Activo;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Det_Verficacion(){
        return $this->Id_Det_Verficacion;
    }
    public function setId_Det_Verficacion($Id_Det_Verficacion){
        $this->Id_Det_Verficacion=$Id_Det_Verficacion;
    }
    public function getId_Verificacion(){
        return $this->Id_Verificacion;
    }
    public function setId_Verificacion($Id_Verificacion){
        $this->Id_Verificacion=$Id_Verificacion;
    }
    public function getId_Activo(){
        return $this->Id_Activo;
    }
    public function setId_Activo($Id_Activo){
        $this->Id_Activo=$Id_Activo;
    }
    public function getFech_Inser(){
        return $this->Fech_Inser;
    }
    public function setFech_Inser($Fech_Inser){
        $this->Fech_Inser=$Fech_Inser;
    }
    public function getUsr_Inser(){
        return $this->Usr_Inser;
    }
    public function setUsr_Inser($Usr_Inser){
        $this->Usr_Inser=$Usr_Inser;
    }
    public function getFech_Mod(){
        return $this->Fech_Mod;
    }
    public function setFech_Mod($Fech_Mod){
        $this->Fech_Mod=$Fech_Mod;
    }
    public function getUsr_Mod(){
        return $this->Usr_Mod;
    }
    public function setUsr_Mod($Usr_Mod){
        $this->Usr_Mod=$Usr_Mod;
    }
    public function getEstatus_Reg(){
        return $this->Estatus_Reg;
    }
    public function setEstatus_Reg($Estatus_Reg){
        $this->Estatus_Reg=$Estatus_Reg;
    }
    public function toString(){
        return array("Id_Det_Verficacion"=>$this->Id_Det_Verficacion,
"Id_Verificacion"=>$this->Id_Verificacion,
"Id_Activo"=>$this->Id_Activo,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>