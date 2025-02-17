<?php
 class Siga_det_vale_resguardoDTO {
    private $Id_Det_Vale_Resguardo;
    private $Id_Vale_Resguardo;
    private $Id_Activo;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Det_Vale_Resguardo(){
        return $this->Id_Det_Vale_Resguardo;
    }
    public function setId_Det_Vale_Resguardo($Id_Det_Vale_Resguardo){
        $this->Id_Det_Vale_Resguardo=$Id_Det_Vale_Resguardo;
    }
    public function getId_Vale_Resguardo(){
        return $this->Id_Vale_Resguardo;
    }
    public function setId_Vale_Resguardo($Id_Vale_Resguardo){
        $this->Id_Vale_Resguardo=$Id_Vale_Resguardo;
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
        return array("Id_Det_Vale_Resguardo"=>$this->Id_Det_Vale_Resguardo,
"Id_Vale_Resguardo"=>$this->Id_Vale_Resguardo,
"Id_Activo"=>$this->Id_Activo,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>