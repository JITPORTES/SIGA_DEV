<?php
 class Siga_perfilesDTO {
    private $Id_Perfil;
    private $Nom_Perrfil;
    private $Tipo;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Perfil(){
        return $this->Id_Perfil;
    }
    public function setId_Perfil($Id_Perfil){
        $this->Id_Perfil=$Id_Perfil;
    }
    public function getNom_Perrfil(){
        return $this->Nom_Perrfil;
    }
    public function setNom_Perrfil($Nom_Perrfil){
        $this->Nom_Perrfil=$Nom_Perrfil;
    }
    public function getTipo(){
        return $this->Tipo;
    }
    public function setTipo($Tipo){
        $this->Tipo=$Tipo;
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
        return array("Id_Perfil"=>$this->Id_Perfil,
"Nom_Perrfil"=>$this->Nom_Perrfil,
"Tipo"=>$this->Tipo,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>