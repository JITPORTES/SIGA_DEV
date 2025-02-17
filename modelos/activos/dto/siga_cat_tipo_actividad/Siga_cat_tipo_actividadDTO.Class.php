<?php
 class Siga_cat_tipo_actividadDTO {
    private $Id_Tipo_Actividad;
    private $Id_Area;
    private $Desc_Tipo_Actividad;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Tipo_Actividad(){
        return $this->Id_Tipo_Actividad;
    }
    public function setId_Tipo_Actividad($Id_Tipo_Actividad){
        $this->Id_Tipo_Actividad=$Id_Tipo_Actividad;
    }
    public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
    public function getDesc_Tipo_Actividad(){
        return $this->Desc_Tipo_Actividad;
    }
    public function setDesc_Tipo_Actividad($Desc_Tipo_Actividad){
        $this->Desc_Tipo_Actividad=$Desc_Tipo_Actividad;
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
        return array("Id_Tipo_Actividad"=>$this->Id_Tipo_Actividad,
"Id_Area"=>$this->Id_Area,
"Desc_Tipo_Actividad"=>$this->Desc_Tipo_Actividad,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>