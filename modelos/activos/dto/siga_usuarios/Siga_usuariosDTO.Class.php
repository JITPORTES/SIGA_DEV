<?php
 class Siga_usuariosDTO {
    private $Id_Usuario;
    private $No_Usuario;
    private $Nombre_Usuario;
	private $Correo;
    private $Usuario;
    private $Password;
    private $Puesto;
    private $Activo_Fijo;
    private $Mesa_Ayuda;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
	private $EstProc;
    private $Sistema;
	private $Solicitud;
	
    public function getId_Usuario(){
        return $this->Id_Usuario;
    }
    public function setId_Usuario($Id_Usuario){
        $this->Id_Usuario=$Id_Usuario;
    }
    public function getNo_Usuario(){
        return $this->No_Usuario;
    }
    public function setNo_Usuario($No_Usuario){
        $this->No_Usuario=$No_Usuario;
    }
    public function getNombre_Usuario(){
        return $this->Nombre_Usuario;
    }
    public function setNombre_Usuario($Nombre_Usuario){
        $this->Nombre_Usuario=$Nombre_Usuario;
    }
	public function getCorreo(){
        return $this->Correo;
    }
    public function setCorreo($Correo){
        $this->Correo=$Correo;
    }
    public function getUsuario(){
        return $this->Usuario;
    }
    public function setUsuario($Usuario){
        $this->Usuario=$Usuario;
    }
    public function getPassword(){
        return $this->Password;
    }
    public function setPassword($Password){
        $this->Password=$Password;
    }
    public function getPuesto(){
        return $this->Puesto;
    }
    public function setPuesto($Puesto){
        $this->Puesto=$Puesto;
    }
    public function getActivo_Fijo(){
        return $this->Activo_Fijo;
    }
    public function setActivo_Fijo($Activo_Fijo){
        $this->Activo_Fijo=$Activo_Fijo;
    }
    public function getMesa_Ayuda(){
        return $this->Mesa_Ayuda;
    }
    public function setMesa_Ayuda($Mesa_Ayuda){
        $this->Mesa_Ayuda=$Mesa_Ayuda;
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
	public function getEstProc(){
        return $this->EstProc;
    }
    public function setEstProc($EstProc){
        $this->EstProc=$EstProc;
    }
	
	public function getSistema(){
        return $this->Sistema;
    }
    public function setSistema($Sistema){
        $this->Sistema=$Sistema;
    }
	
	public function getSolicitud(){
        return $this->Solicitud;
    }
    public function setSolicitud($Solicitud){
        $this->Solicitud=$Solicitud;
    }
	
    public function toString(){
        return array("Id_Usuario"=>$this->Id_Usuario,
"No_Usuario"=>$this->No_Usuario,
"Nombre_Usuario"=>$this->Nombre_Usuario,
"Correo"=>$this->Correo,
"Usuario"=>$this->Usuario,
"Password"=>$this->Password,
"Puesto"=>$this->Puesto,
"Activo_Fijo"=>$this->Activo_Fijo,
"Mesa_Ayuda"=>$this->Mesa_Ayuda,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg,
"EstProc"=>$this->EstProc,
"Sistema"=>$this->Sistema,
"Solicitud"=>$this->Solicitud
);
    }
}
?>