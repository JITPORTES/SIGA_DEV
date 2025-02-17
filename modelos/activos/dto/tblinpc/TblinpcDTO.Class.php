<?php
 class TblinpcDTO {
    private $Id_INPC;
    private $Anio;
    private $Mes;
    private $Valor;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_INPC(){
        return $this->Id_INPC;
    }
    public function setId_INPC($Id_INPC){
        $this->Id_INPC=$Id_INPC;
    }
    public function getAnio(){
        return $this->Anio;
    }
    public function setAnio($Anio){
        $this->Anio=$Anio;
    }
    public function getMes(){
        return $this->Mes;
    }
    public function setMes($Mes){
        $this->Mes=$Mes;
    }
    public function getValor(){
        return $this->Valor;
    }
    public function setValor($Valor){
        $this->Valor=$Valor;
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
        return array("Id_INPC"=>$this->Id_INPC,
"Anio"=>$this->Anio,
"Mes"=>$this->Mes,
"Valor"=>$this->Valor,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>