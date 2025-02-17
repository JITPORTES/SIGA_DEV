<?php
 class Siga_sla_pDTO {
    private $Id_Sla_P;
    private $Id_Area;
    private $Id_Seccion;
    private $Id_Categoria;
    private $Id_Subcategoria;
		private $Interno_Externo;
    private $Proceso_Ticket;
    private $Escala;
    private $Horas;
    private $Correos;
    private $Estatus_Reg;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    public function getId_Sla_P(){
        return $this->Id_Sla_P;
    }
    public function setId_Sla_P($Id_Sla_P){
        $this->Id_Sla_P=$Id_Sla_P;
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
    public function getId_Categoria(){
        return $this->Id_Categoria;
    }
    public function setId_Categoria($Id_Categoria){
        $this->Id_Categoria=$Id_Categoria;
    }
    public function getId_Subcategoria(){
        return $this->Id_Subcategoria;
    }
    public function setId_Subcategoria($Id_Subcategoria){
        $this->Id_Subcategoria=$Id_Subcategoria;
    }
		public function getInterno_Externo(){
        return $this->Interno_Externo;
    }
    public function setInterno_Externo($Interno_Externo){
        $this->Interno_Externo=$Interno_Externo;
    }
    public function getProceso_Ticket(){
        return $this->Proceso_Ticket;
    }
    public function setProceso_Ticket($Proceso_Ticket){
        $this->Proceso_Ticket=$Proceso_Ticket;
    }
    public function getEscala(){
        return $this->Escala;
    }
    public function setEscala($Escala){
        $this->Escala=$Escala;
    }
    public function getHoras(){
        return $this->Horas;
    }
    public function setHoras($Horas){
        $this->Horas=$Horas;
    }
    public function getCorreos(){
        return $this->Correos;
    }
    public function setCorreos($Correos){
        $this->Correos=$Correos;
    }
    public function getEstatus_Reg(){
        return $this->Estatus_Reg;
    }
    public function setEstatus_Reg($Estatus_Reg){
        $this->Estatus_Reg=$Estatus_Reg;
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
    public function toString(){
        return array("Id_Sla_P"=>$this->Id_Sla_P,
"Id_Area"=>$this->Id_Area,
"Id_Seccion"=>$this->Id_Seccion,
"Id_Categoria"=>$this->Id_Categoria,
"Id_Subcategoria"=>$this->Id_Subcategoria,
"Interno_Externo"=>$this->Interno_Externo,
"Proceso_Ticket"=>$this->Proceso_Ticket,
"Escala"=>$this->Escala,
"Horas"=>$this->Horas,
"Correos"=>$this->Correos,
"Estatus_Reg"=>$this->Estatus_Reg,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod);
    }
}
?>