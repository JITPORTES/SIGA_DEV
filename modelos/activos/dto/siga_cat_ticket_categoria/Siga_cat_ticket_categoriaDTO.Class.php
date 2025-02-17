<?php
 class Siga_cat_ticket_categoriaDTO {
    private $Id_Categoria;
    private $Desc_Categoria;
    private $Id_Seccion;
    public function getId_Categoria(){
        return $this->Id_Categoria;
    }
    public function setId_Categoria($Id_Categoria){
        $this->Id_Categoria=$Id_Categoria;
    }
    public function getDesc_Categoria(){
        return $this->Desc_Categoria;
    }
    public function setDesc_Categoria($Desc_Categoria){
        $this->Desc_Categoria=$Desc_Categoria;
    }
    public function getId_Seccion(){
        return $this->Id_Seccion;
    }
    public function setId_Seccion($Id_Seccion){
        $this->Id_Seccion=$Id_Seccion;
    }
    public function toString(){
        return array("Id_Categoria"=>$this->Id_Categoria,
"Desc_Categoria"=>$this->Desc_Categoria,
"Id_Seccion"=>$this->Id_Seccion);
    }
}
?>