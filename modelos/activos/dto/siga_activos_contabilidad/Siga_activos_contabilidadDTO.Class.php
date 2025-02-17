<?php
 class Siga_activos_contabilidadDTO {
    private $Id_Activo_Contabilidad;
    private $Id_Activo;
    private $Centro_Costos;
    private $No_Capex;
	private $Prorrateo;
    private $Participa_Depreciacion;
    private $Fecha_Inicio_Depr;
    private $Url_Factura;
	private $Cuent_Cont_Act;
	private $Cuent_Cont_Act_B10;
	private $Cuent_Cont_Result;
	private $Cuent_Cont_Result_B10;
	private $Cuent_Cont_Dep;
	private $Cuent_Cont_Dep_B10;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
	private $Url_Xml;
    public function getId_Activo_Contabilidad(){
        return $this->Id_Activo_Contabilidad;
    }
    public function setId_Activo_Contabilidad($Id_Activo_Contabilidad){
        $this->Id_Activo_Contabilidad=$Id_Activo_Contabilidad;
    }
    public function getId_Activo(){
        return $this->Id_Activo;
    }
    public function setId_Activo($Id_Activo){
        $this->Id_Activo=$Id_Activo;
    }
    public function getCentro_Costos(){
        return $this->Centro_Costos;
    }
    public function setCentro_Costos($Centro_Costos){
        $this->Centro_Costos=$Centro_Costos;
    }
    public function getNo_Capex(){
        return $this->No_Capex;
    }
    public function setNo_Capex($No_Capex){
        $this->No_Capex=$No_Capex;
    }
	public function getProrrateo(){
        return $this->Prorrateo;
    }
    public function setProrrateo($Prorrateo){
        $this->Prorrateo=$Prorrateo;
    }
    public function getParticipa_Depreciacion(){
        return $this->Participa_Depreciacion;
    }
    public function setParticipa_Depreciacion($Participa_Depreciacion){
        $this->Participa_Depreciacion=$Participa_Depreciacion;
    }
    public function getFecha_Inicio_Depr(){
        return $this->Fecha_Inicio_Depr;
    }
    public function setFecha_Inicio_Depr($Fecha_Inicio_Depr){
        $this->Fecha_Inicio_Depr=$Fecha_Inicio_Depr;
    }
    public function getUrl_Factura(){
        return $this->Url_Factura;
    }
    public function setUrl_Factura($Url_Factura){
        $this->Url_Factura=$Url_Factura;
    }
	
	public function getCuent_Cont_Act(){
        return $this->Cuent_Cont_Act;
    }
    public function setCuent_Cont_Act($Cuent_Cont_Act){
        $this->Cuent_Cont_Act=$Cuent_Cont_Act;
    }
	public function getCuent_Cont_Act_B10(){
        return $this->Cuent_Cont_Act_B10;
    }
    public function setCuent_Cont_Act_B10($Cuent_Cont_Act_B10){
        $this->Cuent_Cont_Act_B10=$Cuent_Cont_Act_B10;
    }
	public function getCuent_Cont_Result(){
        return $this->Cuent_Cont_Result;
    }
    public function setCuent_Cont_Result($Cuent_Cont_Result){
        $this->Cuent_Cont_Result=$Cuent_Cont_Result;
    }
	public function getCuent_Cont_Result_B10(){
        return $this->Cuent_Cont_Result_B10;
    }
    public function setCuent_Cont_Result_B10($Cuent_Cont_Result_B10){
        $this->Cuent_Cont_Result_B10=$Cuent_Cont_Result_B10;
    }
	
	public function getCuent_Cont_Dep(){
        return $this->Cuent_Cont_Dep;
    }
    public function setCuent_Cont_Dep($Cuent_Cont_Dep){
        $this->Cuent_Cont_Dep=$Cuent_Cont_Dep;
    }
	
	public function getCuent_Cont_Dep_B10(){
        return $this->Cuent_Cont_Dep_B10;
    }
    public function setCuent_Cont_Dep_B10($Cuent_Cont_Dep_B10){
        $this->Cuent_Cont_Dep_B10=$Cuent_Cont_Dep_B10;
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
	public function getUrl_Xml(){
        return $this->Url_Xml;
    }
    public function setUrl_Xml($Url_Xml){
        $this->Url_Xml=$Url_Xml;
    }
    public function toString(){
        return array("Id_Activo_Contabilidad"=>$this->Id_Activo_Contabilidad,
"Id_Activo"=>$this->Id_Activo,
"Centro_Costos"=>$this->Centro_Costos,
"No_Capex"=>$this->No_Capex,
"Prorrateo"=>$this->Prorrateo,
"Participa_Depreciacion"=>$this->Participa_Depreciacion,
"Fecha_Inicio_Depr"=>$this->Fecha_Inicio_Depr,
"Url_Factura"=>$this->Url_Factura,
"Cuent_Cont_Act"=>$this->Cuent_Cont_Act,
"Cuent_Cont_Act_B10"=>$this->Cuent_Cont_Act_B10,
"Cuent_Cont_Result"=>$this->Cuent_Cont_Result,
"Cuent_Cont_Result_B10"=>$this->Cuent_Cont_Result_B10,
"Cuent_Cont_Dep"=>$this->Cuent_Cont_Dep,
"Cuent_Cont_Dep_B10"=>$this->Cuent_Cont_Dep_B10,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg,
"Url_Xml"=>$this->Url_Xml);
    }
}
?>