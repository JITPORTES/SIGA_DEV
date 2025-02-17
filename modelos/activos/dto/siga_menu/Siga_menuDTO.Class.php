<?php
 class Siga_menuDTO {
    private $Id_Menu;
    private $Id_Perfil;
    private $Nom_Menu;
    private $Url_Menu;
    private $Icono;
    private $Orden;
    private $Padre;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Menu(){
        return $this->Id_Menu;
    }
    public function setId_Menu($Id_Menu){
        $this->Id_Menu=$Id_Menu;
    }
    public function getId_Perfil(){
        return $this->Id_Perfil;
    }
    public function setId_Perfil($Id_Perfil){
        $this->Id_Perfil=$Id_Perfil;
    }
    public function getNom_Menu(){
        return $this->Nom_Menu;
    }
    public function setNom_Menu($Nom_Menu){
        $this->Nom_Menu=$Nom_Menu;
    }
    public function getUrl_Menu(){
        return $this->Url_Menu;
    }
    public function setUrl_Menu($Url_Menu){
        $this->Url_Menu=$Url_Menu;
    }
    public function getIcono(){
        return $this->Icono;
    }
    public function setIcono($Icono){
        $this->Icono=$Icono;
    }
    public function getOrden(){
        return $this->Orden;
    }
    public function setOrden($Orden){
        $this->Orden=$Orden;
    }
    public function getPadre(){
        return $this->Padre;
    }
    public function setPadre($Padre){
        $this->Padre=$Padre;
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
        return array("Id_Menu"=>$this->Id_Menu,
"Id_Perfil"=>$this->Id_Perfil,
"Nom_Menu"=>$this->Nom_Menu,
"Url_Menu"=>$this->Url_Menu,
"Icono"=>$this->Icono,
"Orden"=>$this->Orden,
"Padre"=>$this->Padre,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>