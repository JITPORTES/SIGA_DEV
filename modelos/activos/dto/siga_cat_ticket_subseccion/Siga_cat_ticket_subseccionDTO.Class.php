<?php
 class Siga_cat_ticket_subseccionDTO {
    private $Id_Subseccion;
    private $Desc_Subseccion;
    private $Id_Seccion;
    public function getId_Subseccion(){
        return $this->Id_Subseccion;
    }
    public function setId_Subseccion($Id_Subseccion){
        $this->Id_Subseccion=$Id_Subseccion;
    }
    public function getDesc_Subseccion(){
        return $this->Desc_Subseccion;
    }
    public function setDesc_Subseccion($Desc_Subseccion){
        $this->Desc_Subseccion=$Desc_Subseccion;
    }
    public function getId_Seccion(){
        return $this->Id_Seccion;
    }
    public function setId_Seccion($Id_Seccion){
        $this->Id_Seccion=$Id_Seccion;
    }
    public function toString(){
        return array("Id_Subseccion"=>$this->Id_Subseccion,
"Desc_Subseccion"=>$this->Desc_Subseccion,
"Id_Seccion"=>$this->Id_Seccion);
    }
}
?>