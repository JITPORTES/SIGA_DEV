<?php
 class Siga_cat_area_de_polizaDTO {
    private $Id_Area_de_poliza;
    private $Id_Area;
    private $Desc_Area_de_poliza;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Area_de_poliza(){
        return $this->Id_Area_de_poliza;
    }
    public function setId_Area_de_poliza($Id_Area_de_poliza){
        $this->Id_Area_de_poliza=$Id_Area_de_poliza;
    }
    public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
    public function getDesc_Area_de_poliza(){
        return $this->Desc_Area_de_poliza;
    }
    public function setDesc_Area_de_poliza($Desc_Area_de_poliza){
        $this->Desc_Area_de_poliza=$Desc_Area_de_poliza;
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
        return array("Id_Area_de_poliza"=>$this->Id_Area_de_poliza,
"Id_Area"=>$this->Id_Area,
"Desc_Area_de_poliza"=>$this->Desc_Area_de_poliza,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>