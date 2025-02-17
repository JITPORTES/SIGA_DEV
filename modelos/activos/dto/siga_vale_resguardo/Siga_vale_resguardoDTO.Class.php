<?php
 class Siga_vale_resguardoDTO {
    private $Id_Vale_Resguardo;
    private $Id_Tipo_Vale_Resg;
    private $Id_Area;
	private $Num_Empleado;
    private $Extension_Tel;
    private $Correo;
    private $Observaciones;
	private $Estatus_Envio;
	private $Estatus_Correo_Responsable;
	private $Estatus_Correo_Solicitante;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
	private $Desc_Tipo_Vale_Resg;
    private $Nom_Area;
    public function getId_Vale_Resguardo(){
        return $this->Id_Vale_Resguardo;
    }
    public function setId_Vale_Resguardo($Id_Vale_Resguardo){
        $this->Id_Vale_Resguardo=$Id_Vale_Resguardo;
    }
    public function getId_Tipo_Vale_Resg(){
        return $this->Id_Tipo_Vale_Resg;
    }
    public function setId_Tipo_Vale_Resg($Id_Tipo_Vale_Resg){
        $this->Id_Tipo_Vale_Resg=$Id_Tipo_Vale_Resg;
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
    public function getExtension_Tel(){
        return $this->Extension_Tel;
    }
    public function setExtension_Tel($Extension_Tel){
        $this->Extension_Tel=$Extension_Tel;
    }
    public function getCorreo(){
        return $this->Correo;
    }
    public function setCorreo($Correo){
        $this->Correo=$Correo;
    }
    public function getObservaciones(){
        return $this->Observaciones;
    }
    public function setObservaciones($Observaciones){
        $this->Observaciones=$Observaciones;
    }
	public function getEstatus_Envio(){
        return $this->Estatus_Envio;
    }
    public function setEstatus_Envio($Estatus_Envio){
        $this->Estatus_Envio=$Estatus_Envio;
    }
	public function getEstatus_Correo_Responsable(){
        return $this->Estatus_Correo_Responsable;
    }
    public function setEstatus_Correo_Responsable($Estatus_Correo_Responsable){
        $this->Estatus_Correo_Responsable=$Estatus_Correo_Responsable;
    }
	public function getEstatus_Correo_Solicitante(){
        return $this->Estatus_Correo_Solicitante;
    }
    public function setEstatus_Correo_Solicitante($Estatus_Correo_Solicitante){
        $this->Estatus_Correo_Solicitante=$Estatus_Correo_Solicitante;
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
	//////////////////////////////////
	public function getDesc_Tipo_Vale_Resg(){
        return $this->Desc_Tipo_Vale_Resg;
    }
    public function setDesc_Tipo_Vale_Resg($Desc_Tipo_Vale_Resg){
        $this->Desc_Tipo_Vale_Resg=$Desc_Tipo_Vale_Resg;
    }
	
	public function getNom_Area(){
        return $this->Nom_Area;
    }
    public function setNom_Area($Nom_Area){
        $this->Nom_Area=$Nom_Area;
    }
    public function toString(){
        return array("Id_Vale_Resguardo"=>$this->Id_Vale_Resguardo,
"Id_Tipo_Vale_Resg"=>$this->Id_Tipo_Vale_Resg,
"Id_Area"=>$this->Id_Area,
"Num_Empleado"=>$this->Num_Empleado,
"Extension_Tel"=>$this->Extension_Tel,
"Correo"=>$this->Correo,
"Observaciones"=>$this->Observaciones,
"Estatus_Envio"=>$this->Estatus_Envio,
"Estatus_Correo_Responsable"=>$this->Estatus_Correo_Responsable,
"Estatus_Correo_Solicitante"=>$this->Estatus_Correo_Solicitante,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg,
"Desc_Tipo_Vale_Resg"=>$this->Desc_Tipo_Vale_Resg,
"Nom_Area"=>$this->Nom_Area

);
    }
}
?>