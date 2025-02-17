<?php
 class Siga_nota_salidaDTO {
    private $Id_Nota_Salida;
    private $Id_Area_Realiza;
    private $Id_Ubic_Prim;
    private $Id_Ubic_Sec;
    private $Id_Motivo_Salida;
    private $Id_Usr_Realiza_Nota;
    private $Nombre_Realiza_Nota;
    private $Mail_Realiza_Nota;
    private $Firma_Realiza_Nota;
    private $Fech_Realiza_Nota;
    private $Id_Usr_Quien_Autoriza;
    private $Nombre_Quien_Autoriza;
    private $Mail_Quien_Autoriza;
    private $Firma_Quien_Autoriza;
    private $Fech_Autoriza;
    private $Empresa_Recibe;
    private $Nombre_Contacto;
    private $Telefono_Contacto;
    private $Mail_Contacto;
    private $Firma_Quien_Recibe;
    private $Fech_Firma_Recibe;
    private $Observaciones;
    private $Url_Adjuntos;
    private $Estatus_Proceso;
    private $Tipo_Solicitud;
    private $Desc_Motivo_Cancel_Proceso;
    private $Nota_Duplicada;
    private $Usr_Inser;
    private $Fech_Inser;
    private $Usr_Mod;
    private $Fech_Mod;
    private $Estatus_Reg;
    public function getId_Nota_Salida(){
        return $this->Id_Nota_Salida;
    }
    public function setId_Nota_Salida($Id_Nota_Salida){
        $this->Id_Nota_Salida=$Id_Nota_Salida;
    }
    public function getId_Area_Realiza(){
        return $this->Id_Area_Realiza;
    }
    public function setId_Area_Realiza($Id_Area_Realiza){
        $this->Id_Area_Realiza=$Id_Area_Realiza;
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
    public function getId_Motivo_Salida(){
        return $this->Id_Motivo_Salida;
    }
    public function setId_Motivo_Salida($Id_Motivo_Salida){
        $this->Id_Motivo_Salida=$Id_Motivo_Salida;
    }
    public function getId_Usr_Realiza_Nota(){
        return $this->Id_Usr_Realiza_Nota;
    }
    public function setId_Usr_Realiza_Nota($Id_Usr_Realiza_Nota){
        $this->Id_Usr_Realiza_Nota=$Id_Usr_Realiza_Nota;
    }
    public function getNombre_Realiza_Nota(){
        return $this->Nombre_Realiza_Nota;
    }
    public function setNombre_Realiza_Nota($Nombre_Realiza_Nota){
        $this->Nombre_Realiza_Nota=$Nombre_Realiza_Nota;
    }
    public function getMail_Realiza_Nota(){
        return $this->Mail_Realiza_Nota;
    }
    public function setMail_Realiza_Nota($Mail_Realiza_Nota){
        $this->Mail_Realiza_Nota=$Mail_Realiza_Nota;
    }
    public function getFirma_Realiza_Nota(){
        return $this->Firma_Realiza_Nota;
    }
    public function setFirma_Realiza_Nota($Firma_Realiza_Nota){
        $this->Firma_Realiza_Nota=$Firma_Realiza_Nota;
    }
    public function getFech_Realiza_Nota(){
        return $this->Fech_Realiza_Nota;
    }
    public function setFech_Realiza_Nota($Fech_Realiza_Nota){
        $this->Fech_Realiza_Nota=$Fech_Realiza_Nota;
    }
    public function getId_Usr_Quien_Autoriza(){
        return $this->Id_Usr_Quien_Autoriza;
    }
    public function setId_Usr_Quien_Autoriza($Id_Usr_Quien_Autoriza){
        $this->Id_Usr_Quien_Autoriza=$Id_Usr_Quien_Autoriza;
    }
    public function getNombre_Quien_Autoriza(){
        return $this->Nombre_Quien_Autoriza;
    }
    public function setNombre_Quien_Autoriza($Nombre_Quien_Autoriza){
        $this->Nombre_Quien_Autoriza=$Nombre_Quien_Autoriza;
    }
    public function getMail_Quien_Autoriza(){
        return $this->Mail_Quien_Autoriza;
    }
    public function setMail_Quien_Autoriza($Mail_Quien_Autoriza){
        $this->Mail_Quien_Autoriza=$Mail_Quien_Autoriza;
    }
    public function getFirma_Quien_Autoriza(){
        return $this->Firma_Quien_Autoriza;
    }
    public function setFirma_Quien_Autoriza($Firma_Quien_Autoriza){
        $this->Firma_Quien_Autoriza=$Firma_Quien_Autoriza;
    }
    public function getFech_Autoriza(){
        return $this->Fech_Autoriza;
    }
    public function setFech_Autoriza($Fech_Autoriza){
        $this->Fech_Autoriza=$Fech_Autoriza;
    }
    public function getEmpresa_Recibe(){
        return $this->Empresa_Recibe;
    }
    public function setEmpresa_Recibe($Empresa_Recibe){
        $this->Empresa_Recibe=$Empresa_Recibe;
    }
    public function getNombre_Contacto(){
        return $this->Nombre_Contacto;
    }
    public function setNombre_Contacto($Nombre_Contacto){
        $this->Nombre_Contacto=$Nombre_Contacto;
    }
    public function getTelefono_Contacto(){
        return $this->Telefono_Contacto;
    }
    public function setTelefono_Contacto($Telefono_Contacto){
        $this->Telefono_Contacto=$Telefono_Contacto;
    }
    public function getMail_Contacto(){
        return $this->Mail_Contacto;
    }
    public function setMail_Contacto($Mail_Contacto){
        $this->Mail_Contacto=$Mail_Contacto;
    }
    public function getFirma_Quien_Recibe(){
        return $this->Firma_Quien_Recibe;
    }
    public function setFirma_Quien_Recibe($Firma_Quien_Recibe){
        $this->Firma_Quien_Recibe=$Firma_Quien_Recibe;
    }
    public function getFech_Firma_Recibe(){
        return $this->Fech_Firma_Recibe;
    }
    public function setFech_Firma_Recibe($Fech_Firma_Recibe){
        $this->Fech_Firma_Recibe=$Fech_Firma_Recibe;
    }
    public function getObservaciones(){
        return $this->Observaciones;
    }
    public function setObservaciones($Observaciones){
        $this->Observaciones=$Observaciones;
    }
    public function getUrl_Adjuntos(){
        return $this->Url_Adjuntos;
    }
    public function setUrl_Adjuntos($Url_Adjuntos){
        $this->Url_Adjuntos=$Url_Adjuntos;
    }
    public function getEstatus_Proceso(){
        return $this->Estatus_Proceso;
    }
    public function setEstatus_Proceso($Estatus_Proceso){
        $this->Estatus_Proceso=$Estatus_Proceso;
    }
    public function getTipo_Solicitud(){
        return $this->Tipo_Solicitud;
    }
    public function setTipo_Solicitud($Tipo_Solicitud){
        $this->Tipo_Solicitud=$Tipo_Solicitud;
    }
    public function getDesc_Motivo_Cancel_Proceso(){
        return $this->Desc_Motivo_Cancel_Proceso;
    }
    public function setDesc_Motivo_Cancel_Proceso($Desc_Motivo_Cancel_Proceso){
        $this->Desc_Motivo_Cancel_Proceso=$Desc_Motivo_Cancel_Proceso;
    }
    public function getNota_Duplicada(){
        return $this->Nota_Duplicada;
    }
    public function setNota_Duplicada($Nota_Duplicada){
        $this->Nota_Duplicada=$Nota_Duplicada;
    }
    public function getUsr_Inser(){
        return $this->Usr_Inser;
    }
    public function setUsr_Inser($Usr_Inser){
        $this->Usr_Inser=$Usr_Inser;
    }
    public function getFech_Inser(){
        return $this->Fech_Inser;
    }
    public function setFech_Inser($Fech_Inser){
        $this->Fech_Inser=$Fech_Inser;
    }
    public function getUsr_Mod(){
        return $this->Usr_Mod;
    }
    public function setUsr_Mod($Usr_Mod){
        $this->Usr_Mod=$Usr_Mod;
    }
    public function getFech_Mod(){
        return $this->Fech_Mod;
    }
    public function setFech_Mod($Fech_Mod){
        $this->Fech_Mod=$Fech_Mod;
    }
    public function getEstatus_Reg(){
        return $this->Estatus_Reg;
    }
    public function setEstatus_Reg($Estatus_Reg){
        $this->Estatus_Reg=$Estatus_Reg;
    }
    public function toString(){
        return array("Id_Nota_Salida"=>$this->Id_Nota_Salida,
"Id_Area_Realiza"=>$this->Id_Area_Realiza,
"Id_Ubic_Prim"=>$this->Id_Ubic_Prim,
"Id_Ubic_Sec"=>$this->Id_Ubic_Sec,
"Id_Motivo_Salida"=>$this->Id_Motivo_Salida,
"Id_Usr_Realiza_Nota"=>$this->Id_Usr_Realiza_Nota,
"Nombre_Realiza_Nota"=>$this->Nombre_Realiza_Nota,
"Mail_Realiza_Nota"=>$this->Mail_Realiza_Nota,
"Firma_Realiza_Nota"=>$this->Firma_Realiza_Nota,
"Fech_Realiza_Nota"=>$this->Fech_Realiza_Nota,
"Id_Usr_Quien_Autoriza"=>$this->Id_Usr_Quien_Autoriza,
"Nombre_Quien_Autoriza"=>$this->Nombre_Quien_Autoriza,
"Mail_Quien_Autoriza"=>$this->Mail_Quien_Autoriza,
"Firma_Quien_Autoriza"=>$this->Firma_Quien_Autoriza,
"Fech_Autoriza"=>$this->Fech_Autoriza,
"Empresa_Recibe"=>$this->Empresa_Recibe,
"Nombre_Contacto"=>$this->Nombre_Contacto,
"Telefono_Contacto"=>$this->Telefono_Contacto,
"Mail_Contacto"=>$this->Mail_Contacto,
"Firma_Quien_Recibe"=>$this->Firma_Quien_Recibe,
"Fech_Firma_Recibe"=>$this->Fech_Firma_Recibe,
"Observaciones"=>$this->Observaciones,
"Url_Adjuntos"=>$this->Url_Adjuntos,
"Estatus_Proceso"=>$this->Estatus_Proceso,
"Tipo_Solicitud"=>$this->Tipo_Solicitud,
"Desc_Motivo_Cancel_Proceso"=>$this->Desc_Motivo_Cancel_Proceso,
"Nota_Duplicada"=>$this->Nota_Duplicada,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Mod"=>$this->Usr_Mod,
"Fech_Mod"=>$this->Fech_Mod,
"Estatus_Reg"=>$this->Estatus_Reg);
    }
}
?>