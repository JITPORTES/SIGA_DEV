<?php
 class Siga_cat_prestamo_procesoDTO {
    private $Id_Estatus_Proceso;
    private $Desc_Proceso;
    public function getId_Estatus_Proceso(){
        return $this->Id_Estatus_Proceso;
    }
    public function setId_Estatus_Proceso($Id_Estatus_Proceso){
        $this->Id_Estatus_Proceso=$Id_Estatus_Proceso;
    }
    public function getDesc_Proceso(){
        return $this->Desc_Proceso;
    }
    public function setDesc_Proceso($Desc_Proceso){
        $this->Desc_Proceso=$Desc_Proceso;
    }
    public function toString(){
        return array("Id_Estatus_Proceso"=>$this->Id_Estatus_Proceso,
"Desc_Proceso"=>$this->Desc_Proceso);
    }
}
?>