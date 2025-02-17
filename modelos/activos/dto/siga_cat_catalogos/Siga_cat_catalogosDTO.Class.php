<?php
 class Siga_cat_catalogosDTO {
    private $Id_Catalogo;
	private $Id_Area;
    private $Nom_Tabla;
    private $Nom_Id_Campo;
    private $Nom_Desc_Campo;
    private $Descripcion;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    public function getId_Catalogo(){
        return $this->Id_Catalogo;
    }
    public function setId_Catalogo($Id_Catalogo){
        $this->Id_Catalogo=$Id_Catalogo;
    }
	public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
    public function getNom_Tabla(){
        return $this->Nom_Tabla;
    }
    public function setNom_Tabla($Nom_Tabla){
        $this->Nom_Tabla=$Nom_Tabla;
    }
    public function getNom_Id_Campo(){
        return $this->Nom_Id_Campo;
    }
    public function setNom_Id_Campo($Nom_Id_Campo){
        $this->Nom_Id_Campo=$Nom_Id_Campo;
    }
    public function getNom_Desc_Campo(){
        return $this->Nom_Desc_Campo;
    }
    public function setNom_Desc_Campo($Nom_Desc_Campo){
        $this->Nom_Desc_Campo=$Nom_Desc_Campo;
    }
    public function getDescripcion(){
        return $this->Descripcion;
    }
    public function setDescripcion($Descripcion){
        $this->Descripcion=$Descripcion;
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
    public function toString(){
        return array("Id_Catalogo"=>$this->Id_Catalogo,
		"Id_Area"=>$this->Id_Area,
"Nom_Tabla"=>$this->Nom_Tabla,
"Nom_Id_Campo"=>$this->Nom_Id_Campo,
"Nom_Desc_Campo"=>$this->Nom_Desc_Campo,
"Descripcion"=>$this->Descripcion,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod);
    }
}
?>