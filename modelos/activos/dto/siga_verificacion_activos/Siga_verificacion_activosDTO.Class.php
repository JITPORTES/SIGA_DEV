<?php
 class Siga_verificacion_activosDTO {
    private $Id_Verificacion;
    private $Id_AF_BC;
    private $Id_Ubic_Prim;
    private $Id_Ubic_Sec;
    private $Desc_Corta;
    private $Id_Area;
    private $Id_Propiedad;
    private $Id_Familia;
    private $Id_Subfamilia;
    private $Id_Departamento;
    private $Id_Usuario_Resp;
    private $Fecha;
    private $Comentarios;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Verificacion(){
        return $this->Id_Verificacion;
    }
    public function setId_Verificacion($Id_Verificacion){
        $this->Id_Verificacion=$Id_Verificacion;
    }
    public function getId_AF_BC(){
        return $this->Id_AF_BC;
    }
    public function setId_AF_BC($Id_AF_BC){
        $this->Id_AF_BC=$Id_AF_BC;
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
    public function getDesc_Corta(){
        return $this->Desc_Corta;
    }
    public function setDesc_Corta($Desc_Corta){
        $this->Desc_Corta=$Desc_Corta;
    }
    public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
    public function getId_Propiedad(){
        return $this->Id_Propiedad;
    }
    public function setId_Propiedad($Id_Propiedad){
        $this->Id_Propiedad=$Id_Propiedad;
    }
    public function getId_Familia(){
        return $this->Id_Familia;
    }
    public function setId_Familia($Id_Familia){
        $this->Id_Familia=$Id_Familia;
    }
    public function getId_Subfamilia(){
        return $this->Id_Subfamilia;
    }
    public function setId_Subfamilia($Id_Subfamilia){
        $this->Id_Subfamilia=$Id_Subfamilia;
    }
    public function getId_Departamento(){
        return $this->Id_Departamento;
    }
    public function setId_Departamento($Id_Departamento){
        $this->Id_Departamento=$Id_Departamento;
    }
    public function getId_Usuario_Resp(){
        return $this->Id_Usuario_Resp;
    }
    public function setId_Usuario_Resp($Id_Usuario_Resp){
        $this->Id_Usuario_Resp=$Id_Usuario_Resp;
    }
    public function getFecha(){
        return $this->Fecha;
    }
    public function setFecha($Fecha){
        $this->Fecha=$Fecha;
    }
    public function getComentarios(){
        return $this->Comentarios;
    }
    public function setComentarios($Comentarios){
        $this->Comentarios=$Comentarios;
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
        return array("Id_Verificacion"=>$this->Id_Verificacion,
"Id_AF_BC"=>$this->Id_AF_BC,
"Id_Ubic_Prim"=>$this->Id_Ubic_Prim,
"Id_Ubic_Sec"=>$this->Id_Ubic_Sec,
"Desc_Corta"=>$this->Desc_Corta,
"Id_Area"=>$this->Id_Area,
"Id_Propiedad"=>$this->Id_Propiedad,
"Id_Familia"=>$this->Id_Familia,
"Id_Subfamilia"=>$this->Id_Subfamilia,
"Id_Departamento"=>$this->Id_Departamento,
"Id_Usuario_Resp"=>$this->Id_Usuario_Resp,
"Fecha"=>$this->Fecha,
"Comentarios"=>$this->Comentarios,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>