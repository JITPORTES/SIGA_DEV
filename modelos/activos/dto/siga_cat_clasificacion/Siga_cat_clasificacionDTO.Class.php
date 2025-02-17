<?php
 class Siga_cat_clasificacionDTO {
    private $Id_Clasificacion;
    private $Id_Clase;
    private $Desc_Clasificacion;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Clasificacion(){
        return $this->Id_Clasificacion;
    }
    public function setId_Clasificacion($Id_Clasificacion){
        $this->Id_Clasificacion=$Id_Clasificacion;
    }
    public function getId_Clase(){
        return $this->Id_Clase;
    }
    public function setId_Clase($Id_Clase){
        $this->Id_Clase=$Id_Clase;
    }
    public function getDesc_Clasificacion(){
        return $this->Desc_Clasificacion;
    }
    public function setDesc_Clasificacion($Desc_Clasificacion){
        $this->Desc_Clasificacion=$Desc_Clasificacion;
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
        return array("Id_Clasificacion"=>$this->Id_Clasificacion,
"Id_Clase"=>$this->Id_Clase,
"Desc_Clasificacion"=>$this->Desc_Clasificacion,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>