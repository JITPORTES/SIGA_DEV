<?php
 class Siga_cat_ticket_subcategoriaDTO {
    private $Id_Subcategoria;
    private $Desc_Subcategoria;
    private $Id_Categoria;
    public function getId_Subcategoria(){
        return $this->Id_Subcategoria;
    }
    public function setId_Subcategoria($Id_Subcategoria){
        $this->Id_Subcategoria=$Id_Subcategoria;
    }
    public function getDesc_Subcategoria(){
        return $this->Desc_Subcategoria;
    }
    public function setDesc_Subcategoria($Desc_Subcategoria){
        $this->Desc_Subcategoria=$Desc_Subcategoria;
    }
    public function getId_Categoria(){
        return $this->Id_Categoria;
    }
    public function setId_Categoria($Id_Categoria){
        $this->Id_Categoria=$Id_Categoria;
    }
    public function toString(){
        return array("Id_Subcategoria"=>$this->Id_Subcategoria,
"Desc_Subcategoria"=>$this->Desc_Subcategoria,
"Id_Categoria"=>$this->Id_Categoria);
    }
}
?>