<?php
 class Siga_cat_estatusDTO {
    private $Id_Estatus;
    private $Id_Area;
    private $Desc_Estatus;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
		private $Solo_Juridico;
    public function getId_Estatus(){
        return $this->Id_Estatus;
    }
    public function setId_Estatus($Id_Estatus){
        $this->Id_Estatus=$Id_Estatus;
    }
    public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
    public function getDesc_Estatus(){
        return $this->Desc_Estatus;
    }
    public function setDesc_Estatus($Desc_Estatus){
        $this->Desc_Estatus=$Desc_Estatus;
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
		public function getSolo_Juridico(){
        return $this->Solo_Juridico;
    }
    public function setSolo_Juridico($Solo_Juridico){
        $this->Solo_Juridico=$Solo_Juridico;
    }
    public function toString(){
        return array("Id_Estatus"=>$this->Id_Estatus,
"Id_Area"=>$this->Id_Area,
"Desc_Estatus"=>$this->Desc_Estatus,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg,
"Solo_Juridico"=>$this->Solo_Juridico);
    }
}
?>