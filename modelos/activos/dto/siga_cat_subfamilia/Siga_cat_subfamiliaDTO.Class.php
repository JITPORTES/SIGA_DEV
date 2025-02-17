<?php
 class Siga_cat_subfamiliaDTO {
    private $Id_Subfamilia;
    private $Id_Familia;
    private $Desc_Subfamilia;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Subfamilia(){
        return $this->Id_Subfamilia;
    }
    public function setId_Subfamilia($Id_Subfamilia){
        $this->Id_Subfamilia=$Id_Subfamilia;
    }
    public function getId_Familia(){
        return $this->Id_Familia;
    }
    public function setId_Familia($Id_Familia){
        $this->Id_Familia=$Id_Familia;
    }
    public function getDesc_Subfamilia(){
        return $this->Desc_Subfamilia;
    }
    public function setDesc_Subfamilia($Desc_Subfamilia){
        $this->Desc_Subfamilia=$Desc_Subfamilia;
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
        return array("Id_Subfamilia"=>$this->Id_Subfamilia,
"Id_Familia"=>$this->Id_Familia,
"Desc_Subfamilia"=>$this->Desc_Subfamilia,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>