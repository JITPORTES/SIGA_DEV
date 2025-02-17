<?php
 class Siga_usuario_cargosDTO {
    private $Id_Usuario_Cargos;
    private $Id_Usuario;
    private $Id_Cargo;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
	private $Nom_Cargo;
	
    public function getId_Usuario_Cargos(){
        return $this->Id_Usuario_Cargos;
    }
    public function setId_Usuario_Cargos($Id_Usuario_Cargos){
        $this->Id_Usuario_Cargos=$Id_Usuario_Cargos;
    }
    public function getId_Usuario(){
        return $this->Id_Usuario;
    }
    public function setId_Usuario($Id_Usuario){
        $this->Id_Usuario=$Id_Usuario;
    }
    public function getId_Cargo(){
        return $this->Id_Cargo;
    }
    public function setId_Cargo($Id_Cargo){
        $this->Id_Cargo=$Id_Cargo;
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
	////////////////////////////////////////
	public function getNom_Cargo(){
        return $this->Nom_Cargo;
    }
    public function setNom_Cargo($Nom_Cargo){
        $this->Nom_Cargo=$Nom_Cargo;
    }
    public function toString(){
        return array("Id_Usuario_Cargos"=>$this->Id_Usuario_Cargos,
"Id_Usuario"=>$this->Id_Usuario,
"Id_Cargo"=>$this->Id_Cargo,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg,
"Nom_Cargo"=>$this->Nom_Cargo);
    }
}
?>