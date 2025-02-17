<?php
 class Siga_cataplicacionesDTO {
    private $Id_Aplicacion;
    private $Nom_Aplicacion;
    private $Estatus_Reg;
    public function getId_Aplicacion(){
        return $this->Id_Aplicacion;
    }
    public function setId_Aplicacion($Id_Aplicacion){
        $this->Id_Aplicacion=$Id_Aplicacion;
    }
    public function getNom_Aplicacion(){
        return $this->Nom_Aplicacion;
    }
    public function setNom_Aplicacion($Nom_Aplicacion){
        $this->Nom_Aplicacion=$Nom_Aplicacion;
    }
    public function getEstatus_Reg(){
        return $this->Estatus_Reg;
    }
    public function setEstatus_Reg($Estatus_Reg){
        $this->Estatus_Reg=$Estatus_Reg;
    }
    public function toString(){
        return array("Id_Aplicacion"=>$this->Id_Aplicacion,
"Nom_Aplicacion"=>$this->Nom_Aplicacion,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>