<?php
 class MenuDTO {
    private $Id_Menu;
    private $Nombre_Menu;
    private $Descripcion;
    private $Id_Menu_Padre;
    private $Estatus_Reg;
    private $Usr_Modifico;
    private $Fecha;
    public function getId_Menu(){
        return $this->Id_Menu;
    }
    public function setId_Menu($Id_Menu){
        $this->Id_Menu=$Id_Menu;
    }
    public function getNombre_Menu(){
        return $this->Nombre_Menu;
    }
    public function setNombre_Menu($Nombre_Menu){
        $this->Nombre_Menu=$Nombre_Menu;
    }
    public function getDescripcion(){
        return $this->Descripcion;
    }
    public function setDescripcion($Descripcion){
        $this->Descripcion=$Descripcion;
    }
    public function getId_Menu_Padre(){
        return $this->Id_Menu_Padre;
    }
    public function setId_Menu_Padre($Id_Menu_Padre){
        $this->Id_Menu_Padre=$Id_Menu_Padre;
    }
    public function getEstatus_Reg(){
        return $this->Estatus_Reg;
    }
    public function setEstatus_Reg($Estatus_Reg){
        $this->Estatus_Reg=$Estatus_Reg;
    }
    public function getUsr_Modifico(){
        return $this->Usr_Modifico;
    }
    public function setUsr_Modifico($Usr_Modifico){
        $this->Usr_Modifico=$Usr_Modifico;
    }
    public function getFecha(){
        return $this->Fecha;
    }
    public function setFecha($Fecha){
        $this->Fecha=$Fecha;
    }
    public function toString(){
        return array("Id_Menu"=>$this->Id_Menu,
"Nombre_Menu"=>$this->Nombre_Menu,
"Descripcion"=>$this->Descripcion,
"Id_Menu_Padre"=>$this->Id_Menu_Padre,
"Estatus_Reg"=>$this->Estatus_Reg,
"Usr_Modifico"=>$this->Usr_Modifico,
"Fecha"=>$this->Fecha);
    }
}
?>