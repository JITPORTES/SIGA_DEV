<?php
 class Siga_reubicacion_activoDTO {
    private $Id_Activo_Reubicacion;
    private $Id_Activo;
		private $Id_Area;
		private $Id_Ubic_Prim;
    private $Id_Ubic_Sec;
		private $Ubic_Especifica;
    private $Id_Usuario_Responsable;
    private $Nom_Usuario_Reponsable;
    private $Centro_Costos;
    private $Jefe_Area;
    private $Motivo_Reubicacion;
    private $Comentarios_Reubicacion;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Activo_Reubicacion(){
        return $this->Id_Activo_Reubicacion;
    }
    public function setId_Activo_Reubicacion($Id_Activo_Reubicacion){
        $this->Id_Activo_Reubicacion=$Id_Activo_Reubicacion;
    }
		public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
		public function getId_Activo(){
        return $this->Id_Activo;
    }
    public function setId_Activo($Id_Activo){
        $this->Id_Activo=$Id_Activo;
    }
    public function getId_Ubic_Prim(){
        return $this->Id_Ubic_Prim;
    }
    public function setId_Ubic_Prim($Id_Ubic_Prim){
        $this->Id_Ubic_Prim=$Id_Ubic_Prim;
    }
    public function getId_Ubic_Sec(){
        return $this->Id_Ubic_Sec;
    }
    public function setId_Ubic_Sec($Id_Ubic_Sec){
        $this->Id_Ubic_Sec=$Id_Ubic_Sec;
    }
		public function getUbic_Especifica(){
        return $this->Ubic_Especifica;
    }
    public function setUbic_Especifica($Ubic_Especifica){
        $this->Ubic_Especifica=$Ubic_Especifica;
    }
    public function getId_Usuario_Responsable(){
        return $this->Id_Usuario_Responsable;
    }
    public function setId_Usuario_Responsable($Id_Usuario_Responsable){
        $this->Id_Usuario_Responsable=$Id_Usuario_Responsable;
    }
    public function getNom_Usuario_Reponsable(){
        return $this->Nom_Usuario_Reponsable;
    }
    public function setNom_Usuario_Reponsable($Nom_Usuario_Reponsable){
        $this->Nom_Usuario_Reponsable=$Nom_Usuario_Reponsable;
    }
    public function getCentro_Costos(){
        return $this->Centro_Costos;
    }
    public function setCentro_Costos($Centro_Costos){
        $this->Centro_Costos=$Centro_Costos;
    }
    public function getJefe_Area(){
        return $this->Jefe_Area;
    }
    public function setJefe_Area($Jefe_Area){
        $this->Jefe_Area=$Jefe_Area;
    }
    public function getMotivo_Reubicacion(){
        return $this->Motivo_Reubicacion;
    }
    public function setMotivo_Reubicacion($Motivo_Reubicacion){
        $this->Motivo_Reubicacion=$Motivo_Reubicacion;
    }
    public function getComentarios_Reubicacion(){
        return $this->Comentarios_Reubicacion;
    }
    public function setComentarios_Reubicacion($Comentarios_Reubicacion){
        $this->Comentarios_Reubicacion=$Comentarios_Reubicacion;
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
        return array("Id_Activo_Reubicacion"=>$this->Id_Activo_Reubicacion,
"Id_Activo"=>$this->Id_Activo,
"Id_Area"=>$this->Id_Area,
"Id_Ubic_Prim"=>$this->Id_Ubic_Prim,
"Id_Ubic_Sec"=>$this->Id_Ubic_Sec,
"Ubic_Especifica"=>$this->Ubic_Especifica,
"Id_Usuario_Responsable"=>$this->Id_Usuario_Responsable,
"Nom_Usuario_Reponsable"=>$this->Nom_Usuario_Reponsable,
"Centro_Costos"=>$this->Centro_Costos,
"Jefe_Area"=>$this->Jefe_Area,
"Motivo_Reubicacion"=>$this->Motivo_Reubicacion,
"Comentarios_Reubicacion"=>$this->Comentarios_Reubicacion,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>