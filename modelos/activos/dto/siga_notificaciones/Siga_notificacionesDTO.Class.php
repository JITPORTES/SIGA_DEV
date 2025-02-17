<?php
 class Siga_notificacionesDTO {
    private $Id_Notificacion;
    private $Id_Usuario_Envia;
    private $Id_Usuario_Recibe;
    private $Mensaje_Largo;
    private $Mensaje_Corto;
    private $Estatus_Leido;
    private $Estatus_Eliminado;
    private $Url_Archivho_Enviado;
    private $Id_Aplicacion;
    private $Id_Area;
    private $Id_Menu;
    private $Id_Submenu;
    private $Fecha_Envio;
    public function getId_Notificacion(){
        return $this->Id_Notificacion;
    }
    public function setId_Notificacion($Id_Notificacion){
        $this->Id_Notificacion=$Id_Notificacion;
    }
    public function getId_Usuario_Envia(){
        return $this->Id_Usuario_Envia;
    }
    public function setId_Usuario_Envia($Id_Usuario_Envia){
        $this->Id_Usuario_Envia=$Id_Usuario_Envia;
    }
    public function getId_Usuario_Recibe(){
        return $this->Id_Usuario_Recibe;
    }
    public function setId_Usuario_Recibe($Id_Usuario_Recibe){
        $this->Id_Usuario_Recibe=$Id_Usuario_Recibe;
    }
    public function getMensaje_Largo(){
        return $this->Mensaje_Largo;
    }
    public function setMensaje_Largo($Mensaje_Largo){
        $this->Mensaje_Largo=$Mensaje_Largo;
    }
    public function getMensaje_Corto(){
        return $this->Mensaje_Corto;
    }
    public function setMensaje_Corto($Mensaje_Corto){
        $this->Mensaje_Corto=$Mensaje_Corto;
    }
    public function getEstatus_Leido(){
        return $this->Estatus_Leido;
    }
    public function setEstatus_Leido($Estatus_Leido){
        $this->Estatus_Leido=$Estatus_Leido;
    }
    public function getEstatus_Eliminado(){
        return $this->Estatus_Eliminado;
    }
    public function setEstatus_Eliminado($Estatus_Eliminado){
        $this->Estatus_Eliminado=$Estatus_Eliminado;
    }
    public function getUrl_Archivho_Enviado(){
        return $this->Url_Archivho_Enviado;
    }
    public function setUrl_Archivho_Enviado($Url_Archivho_Enviado){
        $this->Url_Archivho_Enviado=$Url_Archivho_Enviado;
    }
    public function getId_Aplicacion(){
        return $this->Id_Aplicacion;
    }
    public function setId_Aplicacion($Id_Aplicacion){
        $this->Id_Aplicacion=$Id_Aplicacion;
    }
    public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
    public function getId_Menu(){
        return $this->Id_Menu;
    }
    public function setId_Menu($Id_Menu){
        $this->Id_Menu=$Id_Menu;
    }
    public function getId_Submenu(){
        return $this->Id_Submenu;
    }
    public function setId_Submenu($Id_Submenu){
        $this->Id_Submenu=$Id_Submenu;
    }
    public function getFecha_Envio(){
        return $this->Fecha_Envio;
    }
    public function setFecha_Envio($Fecha_Envio){
        $this->Fecha_Envio=$Fecha_Envio;
    }
    public function toString(){
        return array("Id_Notificacion"=>$this->Id_Notificacion,
"Id_Usuario_Envia"=>$this->Id_Usuario_Envia,
"Id_Usuario_Recibe"=>$this->Id_Usuario_Recibe,
"Mensaje_Largo"=>$this->Mensaje_Largo,
"Mensaje_Corto"=>$this->Mensaje_Corto,
"Estatus_Leido"=>$this->Estatus_Leido,
"Estatus_Eliminado"=>$this->Estatus_Eliminado,
"Url_Archivho_Enviado"=>$this->Url_Archivho_Enviado,
"Id_Aplicacion"=>$this->Id_Aplicacion,
"Id_Area"=>$this->Id_Area,
"Id_Menu"=>$this->Id_Menu,
"Id_Submenu"=>$this->Id_Submenu,
"Fecha_Envio"=>$this->Fecha_Envio);
    }
}
?>