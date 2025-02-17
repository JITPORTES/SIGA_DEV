<?php
 class Siga_cat_gestoresDTO {
    private $Id_Gestor;
    private $Id_Area;
    private $Id_Seccion;
    private $Tipo_Gestor;
    private $Id_Usuario;
    private $Nombre_Empleado;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
	private $Desc_Seccion;
	private $Total_Nuevos;
	private $Total_Seguimiento;
    public function getId_Gestor(){
        return $this->Id_Gestor;
    }
    public function setId_Gestor($Id_Gestor){
        $this->Id_Gestor=$Id_Gestor;
    }
    public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
    public function getId_Seccion(){
        return $this->Id_Seccion;
    }
    public function setId_Seccion($Id_Seccion){
        $this->Id_Seccion=$Id_Seccion;
    }
    public function getTipo_Gestor(){
        return $this->Tipo_Gestor;
    }
    public function setTipo_Gestor($Tipo_Gestor){
        $this->Tipo_Gestor=$Tipo_Gestor;
    }
    public function getId_Usuario(){
        return $this->Id_Usuario;
    }
    public function setId_Usuario($Id_Usuario){
        $this->Id_Usuario=$Id_Usuario;
    }
    public function getNombre_Empleado(){
        return $this->Nombre_Empleado;
    }
    public function setNombre_Empleado($Nombre_Empleado){
        $this->Nombre_Empleado=$Nombre_Empleado;
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
	public function getDesc_Seccion(){
        return $this->Desc_Seccion;
    }
    public function setDesc_Seccion($Desc_Seccion){
        $this->Desc_Seccion=$Desc_Seccion;
    }
	public function getTotal_Nuevos(){
        return $this->Total_Nuevos;
    }
    public function setTotal_Nuevos($Total_Nuevos){
        $this->Total_Nuevos=$Total_Nuevos;
    }
	public function getTotal_Seguimiento(){
        return $this->Total_Seguimiento;
    }
    public function setTotal_Seguimiento($Total_Seguimiento){
        $this->Total_Seguimiento=$Total_Seguimiento;
    }
    public function toString(){
        return array("Id_Gestor"=>$this->Id_Gestor,
"Id_Area"=>$this->Id_Area,
"Id_Seccion"=>$this->Id_Seccion,
"Tipo_Gestor"=>$this->Tipo_Gestor,
"Id_Usuario"=>$this->Id_Usuario,
"Nombre_Empleado"=>$this->Nombre_Empleado,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg,
"Desc_Seccion"=>$this->Desc_Seccion,
"Total_Nuevos"=>$this->Total_Nuevos,
"Total_Seguimiento"=>$this->Total_Seguimiento
);
    }
}
?>