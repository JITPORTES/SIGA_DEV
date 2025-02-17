<?php
 class Siga_actividades_calificacionDTO {
    private $Id_Calificacion;
    private $Id_Actividad;
    private $Cal_Sol_Ofrecida;
    private $Comen_Sol_Ofrecida;
    private $Cal_Act_Servicio;
    private $Comen_Act_Servicio;
    private $Cal_Tiem_Respusta;
    private $Comen_Tiem_Respuesta;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_Calificacion(){
        return $this->Id_Calificacion;
    }
    public function setId_Calificacion($Id_Calificacion){
        $this->Id_Calificacion=$Id_Calificacion;
    }
    public function getId_Actividad(){
        return $this->Id_Actividad;
    }
    public function setId_Actividad($Id_Actividad){
        $this->Id_Actividad=$Id_Actividad;
    }
    public function getCal_Sol_Ofrecida(){
        return $this->Cal_Sol_Ofrecida;
    }
    public function setCal_Sol_Ofrecida($Cal_Sol_Ofrecida){
        $this->Cal_Sol_Ofrecida=$Cal_Sol_Ofrecida;
    }
    public function getComen_Sol_Ofrecida(){
        return $this->Comen_Sol_Ofrecida;
    }
    public function setComen_Sol_Ofrecida($Comen_Sol_Ofrecida){
        $this->Comen_Sol_Ofrecida=$Comen_Sol_Ofrecida;
    }
    public function getCal_Act_Servicio(){
        return $this->Cal_Act_Servicio;
    }
    public function setCal_Act_Servicio($Cal_Act_Servicio){
        $this->Cal_Act_Servicio=$Cal_Act_Servicio;
    }
    public function getComen_Act_Servicio(){
        return $this->Comen_Act_Servicio;
    }
    public function setComen_Act_Servicio($Comen_Act_Servicio){
        $this->Comen_Act_Servicio=$Comen_Act_Servicio;
    }
    public function getCal_Tiem_Respusta(){
        return $this->Cal_Tiem_Respusta;
    }
    public function setCal_Tiem_Respusta($Cal_Tiem_Respusta){
        $this->Cal_Tiem_Respusta=$Cal_Tiem_Respusta;
    }
    public function getComen_Tiem_Respuesta(){
        return $this->Comen_Tiem_Respuesta;
    }
    public function setComen_Tiem_Respuesta($Comen_Tiem_Respuesta){
        $this->Comen_Tiem_Respuesta=$Comen_Tiem_Respuesta;
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
        return array("Id_Calificacion"=>$this->Id_Calificacion,
"Id_Actividad"=>$this->Id_Actividad,
"Cal_Sol_Ofrecida"=>$this->Cal_Sol_Ofrecida,
"Comen_Sol_Ofrecida"=>$this->Comen_Sol_Ofrecida,
"Cal_Act_Servicio"=>$this->Cal_Act_Servicio,
"Comen_Act_Servicio"=>$this->Comen_Act_Servicio,
"Cal_Tiem_Respusta"=>$this->Cal_Tiem_Respusta,
"Comen_Tiem_Respuesta"=>$this->Comen_Tiem_Respuesta,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>