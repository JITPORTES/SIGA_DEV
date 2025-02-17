<?php
 class Siga_cat_tipo_vale_resgDTO {
    private $Id_Tipo_Vale_Resg;
    private $Id_Area;
    private $Desc_Tipo_Vale_Resg;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Tipo_Vale_Resg(){
        return $this->Id_Tipo_Vale_Resg;
    }
    public function setId_Tipo_Vale_Resg($Id_Tipo_Vale_Resg){
        $this->Id_Tipo_Vale_Resg=$Id_Tipo_Vale_Resg;
    }
    public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
    public function getDesc_Tipo_Vale_Resg(){
        return $this->Desc_Tipo_Vale_Resg;
    }
    public function setDesc_Tipo_Vale_Resg($Desc_Tipo_Vale_Resg){
        $this->Desc_Tipo_Vale_Resg=$Desc_Tipo_Vale_Resg;
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
        return array("Id_Tipo_Vale_Resg"=>$this->Id_Tipo_Vale_Resg,
"Id_Area"=>$this->Id_Area,
"Desc_Tipo_Vale_Resg"=>$this->Desc_Tipo_Vale_Resg,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>