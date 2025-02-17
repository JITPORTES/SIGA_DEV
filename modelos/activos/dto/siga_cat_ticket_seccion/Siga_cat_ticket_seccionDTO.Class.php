<?php
 class Siga_cat_ticket_seccionDTO {
    private $Id_Seccion;
    private $Desc_Seccion;
    private $Id_Area;
    public function getId_Seccion(){
        return $this->Id_Seccion;
    }
    public function setId_Seccion($Id_Seccion){
        $this->Id_Seccion=$Id_Seccion;
    }
    public function getDesc_Seccion(){
        return $this->Desc_Seccion;
    }
    public function setDesc_Seccion($Desc_Seccion){
        $this->Desc_Seccion=$Desc_Seccion;
    }
    public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
    public function toString(){
        return array("Id_Seccion"=>$this->Id_Seccion,
"Desc_Seccion"=>$this->Desc_Seccion,
"Id_Area"=>$this->Id_Area);
    }
}
?>