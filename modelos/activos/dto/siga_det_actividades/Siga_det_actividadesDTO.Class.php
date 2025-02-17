<?php
 class Siga_det_actividadesDTO {
    private $Id_Det_Actividad;
	private $Id_Actividad;
	private $Num_Actividad;
    private $Nombre_Actividad;
    private $Valor_Referencia;
    private $Valor_Medido;
    private $Estatus_Actividad;
    private $Observaciones;
    private $Url_Adjunto;
    private $Fecha_Programada;
    private $Fecha_Realizada;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    private $V_Mesa;
    private $Campo_2;
    private $Campo_3;
    private $Campo_4;
    private $Campo_5;
    private $Campo_6;
    public function getId_Det_Actividad(){
        return $this->Id_Det_Actividad;
    }
    public function setId_Det_Actividad($Id_Det_Actividad){
        $this->Id_Det_Actividad=$Id_Det_Actividad;
    }
	public function getId_Actividad(){
        return $this->Id_Actividad;
    }
    public function setId_Actividad($Id_Actividad){
        $this->Id_Actividad=$Id_Actividad;
    }
    
	public function getNum_Actividad(){
        return $this->Num_Actividad;
    }
    public function setNum_Actividad($Num_Actividad){
        $this->Num_Actividad=$Num_Actividad;
    }
	
	
	
	public function getNombre_Actividad(){
        return $this->Nombre_Actividad;
    }
    public function setNombre_Actividad($Nombre_Actividad){
        $this->Nombre_Actividad=$Nombre_Actividad;
    }
    public function getValor_Referencia(){
        return $this->Valor_Referencia;
    }
    public function setValor_Referencia($Valor_Referencia){
        $this->Valor_Referencia=$Valor_Referencia;
    }
    public function getValor_Medido(){
        return $this->Valor_Medido;
    }
    public function setValor_Medido($Valor_Medido){
        $this->Valor_Medido=$Valor_Medido;
    }
    public function getEstatus_Actividad(){
        return $this->Estatus_Actividad;
    }
    public function setEstatus_Actividad($Estatus_Actividad){
        $this->Estatus_Actividad=$Estatus_Actividad;
    }
    public function getObservaciones(){
        return $this->Observaciones;
    }
    public function setObservaciones($Observaciones){
        $this->Observaciones=$Observaciones;
    }
    public function getUrl_Adjunto(){
        return $this->Url_Adjunto;
    }
    public function setUrl_Adjunto($Url_Adjunto){
        $this->Url_Adjunto=$Url_Adjunto;
    }
    public function getFecha_Programada(){
        return $this->Fecha_Programada;
    }
    public function setFecha_Programada($Fecha_Programada){
        $this->Fecha_Programada=$Fecha_Programada;
    }
    public function getFecha_Realizada(){
        return $this->Fecha_Realizada;
    }
    public function setFecha_Realizada($Fecha_Realizada){
        $this->Fecha_Realizada=$Fecha_Realizada;
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
    public function getV_Mesa(){
        return $this->V_Mesa;
    }
    public function setV_Mesa($V_Mesa){
        $this->V_Mesa=$V_Mesa;
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
    public function getCampo_6(){
        return $this->Campo_6;
    }
    public function setCampo_6($Campo_6){
        $this->Campo_6=$Campo_6;
    }
    public function toString(){
        return array("Id_Det_Actividad"=>$this->Id_Det_Actividad,
"Id_Actividad"=>$this->Id_Actividad,		
"Num_Actividad"=>$this->Num_Actividad,
"Nombre_Actividad"=>$this->Nombre_Actividad,
"Valor_Referencia"=>$this->Valor_Referencia,
"Valor_Medido"=>$this->Valor_Medido,
"Estatus_Actividad"=>$this->Estatus_Actividad,
"Observaciones"=>$this->Observaciones,
"Url_Adjunto"=>$this->Url_Adjunto,
"Fecha_Programada"=>$this->Fecha_Programada,
"Fecha_Realizada"=>$this->Fecha_Realizada,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg,
"V_Mesa"=>$this->V_Mesa,
"Campo_2"=>$this->Campo_2,
"Campo_3"=>$this->Campo_3,
"Campo_4"=>$this->Campo_4,
"Campo_5"=>$this->Campo_5,
"Campo_6"=>$this->Campo_6);
    }
}
?>