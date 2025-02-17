<?php
 class Siga_cat_ubic_secDTO {
    private $Id_Ubic_Sec;
    private $Id_Ubic_Prim;
    private $Desc_Ubic_Sec;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Ubic_Sec(){
        return $this->Id_Ubic_Sec;
    }
    public function setId_Ubic_Sec($Id_Ubic_Sec){
        $this->Id_Ubic_Sec=$Id_Ubic_Sec;
    }
    public function getId_Ubic_Prim(){
        return $this->Id_Ubic_Prim;
    }
    public function setId_Ubic_Prim($Id_Ubic_Prim){
        $this->Id_Ubic_Prim=$Id_Ubic_Prim;
    }
    public function getDesc_Ubic_Sec(){
        return $this->Desc_Ubic_Sec;
    }
    public function setDesc_Ubic_Sec($Desc_Ubic_Sec){
        $this->Desc_Ubic_Sec=$Desc_Ubic_Sec;
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
        return array("Id_Ubic_Sec"=>$this->Id_Ubic_Sec,
"Id_Ubic_Prim"=>$this->Id_Ubic_Prim,
"Desc_Ubic_Sec"=>$this->Desc_Ubic_Sec,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>