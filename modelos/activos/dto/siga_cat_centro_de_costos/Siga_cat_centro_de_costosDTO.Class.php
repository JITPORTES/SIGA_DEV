<?php
 class Siga_cat_centro_de_costosDTO {
    private $Id_Centros_de_costos;
    private $Id_Area;
    private $Desc_Centro_de_costos;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
		private $NoCentroCostos;
		private $NombreReporte;
		private $Clave;
		private $Nomenclatura;
    public function getId_Centros_de_costos(){
        return $this->Id_Centros_de_costos;
    }
    public function setId_Centros_de_costos($Id_Centros_de_costos){
        $this->Id_Centros_de_costos=$Id_Centros_de_costos;
    }
    public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
    public function getDesc_Centro_de_costos(){
        return $this->Desc_Centro_de_costos;
    }
    public function setDesc_Centro_de_costos($Desc_Centro_de_costos){
        $this->Desc_Centro_de_costos=$Desc_Centro_de_costos;
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
		public function getNoCentroCostos(){
        return $this->NoCentroCostos;
    }
    public function setNoCentroCostos($NoCentroCostos){
        $this->NoCentroCostos=$NoCentroCostos;
    }
		public function getNombreReporte(){
        return $this->NombreReporte;
    }
    public function setNombreReporte($NombreReporte){
        $this->NombreReporte=$NombreReporte;
    }
		public function getClave(){
        return $this->Clave;
    }
    public function setClave($Clave){
        $this->Clave=$Clave;
    }
		public function getNomenclatura(){
        return $this->Nomenclatura;
    }
    public function setNomenclatura($Nomenclatura){
        $this->Nomenclatura=$Nomenclatura;
    }
    public function toString(){
        return array("Id_Centros_de_costos"=>$this->Id_Centros_de_costos,
"Id_Area"=>$this->Id_Area,
"Desc_Centro_de_costos"=>$this->Desc_Centro_de_costos,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg,
"NoCentroCostos"=>$this->NoCentroCostos,
"NombreReporte"=>$this->NombreReporte,
"Clave"=>$this->Clave,
"Nomenclatura"=>$this->Nomenclatura

);
    }
}
?>