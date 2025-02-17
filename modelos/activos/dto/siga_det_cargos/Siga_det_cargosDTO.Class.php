<?php
 class Siga_det_cargosDTO {
    private $Id_Det_Cargo;
    private $Id_Menu;
    private $Id_Submenu;
    private $Id_Cargo;
	private $Id_Aplicacion;
    private $Lectura;
    private $Alta;
    private $Baja;
    private $Cambio;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Det_Cargo(){
        return $this->Id_Det_Cargo;
    }
    public function setId_Det_Cargo($Id_Det_Cargo){
        $this->Id_Det_Cargo=$Id_Det_Cargo;
    }
    public function getId_Menu(){
        return $this->Id_Menu;
    }
    public function setId_Menu($Id_Menu){
        $this->Id_Menu=$Id_Menu;
    }
    public function getId_Submenu(){
        return $this->Id_Submenu;
    }
    public function setId_Submenu($Id_Submenu){
        $this->Id_Submenu=$Id_Submenu;
    }
    public function getId_Cargo(){
        return $this->Id_Cargo;
    }
    public function setId_Cargo($Id_Cargo){
        $this->Id_Cargo=$Id_Cargo;
    }
	public function getId_Aplicacion(){
        return $this->Id_Aplicacion;
    }
    public function setId_Aplicacion($Id_Aplicacion){
        $this->Id_Aplicacion=$Id_Aplicacion;
    }
    public function getLectura(){
        return $this->Lectura;
    }
    public function setLectura($Lectura){
        $this->Lectura=$Lectura;
    }
    public function getAlta(){
        return $this->Alta;
    }
    public function setAlta($Alta){
        $this->Alta=$Alta;
    }
    public function getBaja(){
        return $this->Baja;
    }
    public function setBaja($Baja){
        $this->Baja=$Baja;
    }
    public function getCambio(){
        return $this->Cambio;
    }
    public function setCambio($Cambio){
        $this->Cambio=$Cambio;
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
        return array("Id_Det_Cargo"=>$this->Id_Det_Cargo,
"Id_Menu"=>$this->Id_Menu,
"Id_Submenu"=>$this->Id_Submenu,
"Id_Cargo"=>$this->Id_Cargo,
"Id_Aplicacion"=>$this->Id_Aplicacion,
"Lectura"=>$this->Lectura,
"Alta"=>$this->Alta,
"Baja"=>$this->Baja,
"Cambio"=>$this->Cambio,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>