<?php
 class Siga_jefe_areaDTO {
    private $Id_Jefe_Area;
    private $Id_Area;
    private $Num_Empleado;
    private $Nombre;
    private $Correo;
    private $Campo_1;
    private $Campo_2;
    private $Campo_3;
    private $Campo_4;
    private $Campo_5;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Jefe_Area(){
        return $this->Id_Jefe_Area;
    }
    public function setId_Jefe_Area($Id_Jefe_Area){
        $this->Id_Jefe_Area=$Id_Jefe_Area;
    }
    public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
    public function getNum_Empleado(){
        return $this->Num_Empleado;
    }
    public function setNum_Empleado($Num_Empleado){
        $this->Num_Empleado=$Num_Empleado;
    }
    public function getNombre(){
        return $this->Nombre;
    }
    public function setNombre($Nombre){
        $this->Nombre=$Nombre;
    }
    public function getCorreo(){
        return $this->Correo;
    }
    public function setCorreo($Correo){
        $this->Correo=$Correo;
    }
    public function getCampo_1(){
        return $this->Campo_1;
    }
    public function setCampo_1($Campo_1){
        $this->Campo_1=$Campo_1;
    }
    public function getCampo_2(){
        return $this->Campo_2;
    }
    public function setCampo_2($Campo_2){
        $this->Campo_2=$Campo_2;
    }
    public function getCampo_3(){
        return $this->Campo_3;
    }
    public function setCampo_3($Campo_3){
        $this->Campo_3=$Campo_3;
    }
    public function getCampo_4(){
        return $this->Campo_4;
    }
    public function setCampo_4($Campo_4){
        $this->Campo_4=$Campo_4;
    }
    public function getCampo_5(){
        return $this->Campo_5;
    }
    public function setCampo_5($Campo_5){
        $this->Campo_5=$Campo_5;
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
    public function toString(){
        return array("Id_Jefe_Area"=>$this->Id_Jefe_Area,
"Id_Area"=>$this->Id_Area,
"Num_Empleado"=>$this->Num_Empleado,
"Nombre"=>$this->Nombre,
"Correo"=>$this->Correo,
"Campo_1"=>$this->Campo_1,
"Campo_2"=>$this->Campo_2,
"Campo_3"=>$this->Campo_3,
"Campo_4"=>$this->Campo_4,
"Campo_5"=>$this->Campo_5,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>