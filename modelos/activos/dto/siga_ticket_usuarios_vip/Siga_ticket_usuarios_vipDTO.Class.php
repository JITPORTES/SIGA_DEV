<?php
 class Siga_ticket_usuarios_vipDTO {
    private $Id_Usuario_Vip;
    private $Id_Usuario;
    private $No_Empleado;
    private $Nombre_Usuario;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Usuario_Vip(){
        return $this->Id_Usuario_Vip;
    }
    public function setId_Usuario_Vip($Id_Usuario_Vip){
        $this->Id_Usuario_Vip=$Id_Usuario_Vip;
    }
    public function getId_Usuario(){
        return $this->Id_Usuario;
    }
    public function setId_Usuario($Id_Usuario){
        $this->Id_Usuario=$Id_Usuario;
    }
    public function getNo_Empleado(){
        return $this->No_Empleado;
    }
    public function setNo_Empleado($No_Empleado){
        $this->No_Empleado=$No_Empleado;
    }
    public function getNombre_Usuario(){
        return $this->Nombre_Usuario;
    }
    public function setNombre_Usuario($Nombre_Usuario){
        $this->Nombre_Usuario=$Nombre_Usuario;
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
        return array("Id_Usuario_Vip"=>$this->Id_Usuario_Vip,
"Id_Usuario"=>$this->Id_Usuario,
"No_Empleado"=>$this->No_Empleado,
"Nombre_Usuario"=>$this->Nombre_Usuario,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>