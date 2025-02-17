<?php
 class Siga_activo_proveedorDTO {
    private $Id_activo_proveedor;
    private $id_Activo;
    private $NumOrdenCompra;
    private $NumFactura;
    private $FechaFactura;
    private $UUID;
    private $Folio_Fiscal;
	private $Monto_F;
	private $MontoFactura;
    private $NumContrato;
    private $VidaUtilFabricante;
    private $VidaUtilCHS;
    private $Garantia;
    private $ExtGarantia;
    private $Fecha_Vencimiento;
    private $Poliza_Url;
    private $NombreProveedor;
    private $Id_Proveedor;
    private $Contacto;
    private $Telefono;
    private $DocRecibida;
    private $Accesorios;
    private $Correo;
    private $Consumibles;
    private $Url_Contrato;
    private $Url_Otro_Doc;
    private $Url_Factura;
    private $Url_Xml;
    private $Link;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    public function getId_activo_proveedor(){
        return $this->Id_activo_proveedor;
    }
    public function setId_activo_proveedor($Id_activo_proveedor){
        $this->Id_activo_proveedor=$Id_activo_proveedor;
    }
    public function getId_Activo(){
        return $this->id_Activo;
    }
    public function setId_Activo($id_Activo){
        $this->id_Activo=$id_Activo;
    }
    public function getNumOrdenCompra(){
        return $this->NumOrdenCompra;
    }
    public function setNumOrdenCompra($NumOrdenCompra){
        $this->NumOrdenCompra=$NumOrdenCompra;
    }
    public function getNumFactura(){
        return $this->NumFactura;
    }
    public function setNumFactura($NumFactura){
        $this->NumFactura=$NumFactura;
    }
    public function getFechaFactura(){
        return $this->FechaFactura;
    }
    public function setFechaFactura($FechaFactura){
			if($FechaFactura!=NULL){$this->FechaFactura=$FechaFactura;}else{$this->FechaFactura='';}
    }
    public function getUUID(){
        return $this->UUID;
    }
    public function setUUID($UUID){
        $this->UUID=$UUID;
    }
    public function getFolio_Fiscal(){
        return $this->Folio_Fiscal;
    }
    public function setFolio_Fiscal($Folio_Fiscal){
        $this->Folio_Fiscal=$Folio_Fiscal;
    }
	public function getMonto_F(){
        return $this->Monto_F;
    }
    public function setMonto_F($Monto_F){
        $this->Monto_F=$Monto_F;
    }
	public function getMontoFactura(){
        return $this->MontoFactura;
    }
    public function setMontoFactura($MontoFactura){
        $this->MontoFactura=$MontoFactura;
    }
	
    public function getNumContrato(){
        return $this->NumContrato;
    }
    public function setNumContrato($NumContrato){
        $this->NumContrato=$NumContrato;
    }
    public function getVidaUtilFabricante(){
        return $this->VidaUtilFabricante;
    }
    public function setVidaUtilFabricante($VidaUtilFabricante){
        $this->VidaUtilFabricante=$VidaUtilFabricante;
    }
    public function getVidaUtilCHS(){
        return $this->VidaUtilCHS;
    }
    public function setVidaUtilCHS($VidaUtilCHS){
        $this->VidaUtilCHS=$VidaUtilCHS;
    }
    public function getGarantia(){
        return $this->Garantia;
    }
    public function setGarantia($Garantia){
        $this->Garantia=$Garantia;
    }
    public function getExtGarantia(){
        return $this->ExtGarantia;
    }
    public function setExtGarantia($ExtGarantia){
        $this->ExtGarantia=$ExtGarantia;
    }
    public function getFecha_Vencimiento(){
        return $this->Fecha_Vencimiento;
    }
    public function setFecha_Vencimiento($Fecha_Vencimiento){
        $this->Fecha_Vencimiento=$Fecha_Vencimiento;
    }
    public function getPoliza_Url(){
        return $this->Poliza_Url;
    }
    public function setPoliza_Url($Poliza_Url){
        $this->Poliza_Url=$Poliza_Url;
    }
    public function getNombreProveedor(){
        return $this->NombreProveedor;
    }
    public function setNombreProveedor($NombreProveedor){
        $this->NombreProveedor=$NombreProveedor;
    }
    public function getId_Proveedor(){
        return $this->Id_Proveedor;
    }
    public function setId_Proveedor($Id_Proveedor){
        $this->Id_Proveedor=$Id_Proveedor;
    }
    public function getContacto(){
        return $this->Contacto;
    }
    public function setContacto($Contacto){
        $this->Contacto=$Contacto;
    }
    public function getTelefono(){
        return $this->Telefono;
    }
    public function setTelefono($Telefono){
        $this->Telefono=$Telefono;
    }
    public function getDocRecibida(){
        return $this->DocRecibida;
    }
    public function setDocRecibida($DocRecibida){
        $this->DocRecibida=$DocRecibida;
    }
    public function getAccesorios(){
        return $this->Accesorios;
    }
    public function setAccesorios($Accesorios){
        $this->Accesorios=$Accesorios;
    }
    public function getCorreo(){
        return $this->Correo;
    }
    public function setCorreo($Correo){
        $this->Correo=$Correo;
    }
    public function getConsumibles(){
        return $this->Consumibles;
    }
    public function setConsumibles($Consumibles){
        $this->Consumibles=$Consumibles;
    }
    public function getUrl_Contrato(){
        return $this->Url_Contrato;
    }
    public function setUrl_Contrato($Url_Contrato){
        $this->Url_Contrato=$Url_Contrato;
    }
    public function getUrl_Otro_Doc(){
        return $this->Url_Otro_Doc;
    }
    public function setUrl_Otro_Doc($Url_Otro_Doc){
        $this->Url_Otro_Doc=$Url_Otro_Doc;
    }
    public function getUrl_Factura(){
        return $this->Url_Factura;
    }
    public function setUrl_Factura($Url_Factura){
        $this->Url_Factura=$Url_Factura;
    }
    public function getUrl_Xml(){
        return $this->Url_Xml;
    }
    public function setUrl_Xml($Url_Xml){
        $this->Url_Xml=$Url_Xml;
    }
    public function getLink(){
        return $this->Link;
    }
    public function setLink($Link){
        $this->Link=$Link;
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
        return array(
            "Id_activo_proveedor"=>$this->Id_activo_proveedor,
            "id_Activo"=>$this->id_Activo,
            "NumOrdenCompra"=>$this->NumOrdenCompra,
            "NumFactura"=>$this->NumFactura,
            "FechaFactura"=>$this->FechaFactura,
            "UUID"=>$this->UUID,
            "Folio_Fiscal"=>$this->Folio_Fiscal,
            "Monto_F"=>$this->Monto_F,
            "MontoFactura"=>$this->MontoFactura,
            "NumContrato"=>$this->NumContrato,
            "VidaUtilFabricante"=>$this->VidaUtilFabricante,
            "VidaUtilCHS"=>$this->VidaUtilCHS,
            "Garantia"=>$this->Garantia,
            "ExtGarantia"=>$this->ExtGarantia,
            "Fecha_Vencimiento"=>$this->Fecha_Vencimiento,
            "Poliza_Url"=>$this->Poliza_Url,
            "NombreProveedor"=>$this->NombreProveedor,
            "Id_Proveedor"=>$this->Id_Proveedor,
            "Contacto"=>$this->Contacto,
            "Telefono"=>$this->Telefono,
            "DocRecibida"=>$this->DocRecibida,
            "Accesorios"=>$this->Accesorios,
            "Correo"=>$this->Correo,
            "Consumibles"=>$this->Consumibles,
            "Url_Contrato"=>$this->Url_Contrato,
            "Url_Otro_Doc"=>$this->Url_Otro_Doc,
            "Url_Factura"=>$this->Url_Factura,
            "Url_Xml"=>$this->Url_Xml,
            "Link"=>$this->Link,
            "Fech_Inser"=>$this->Fech_Inser,
            "Usr_Inser"=>$this->Usr_Inser,
            "Fech_Mod"=>$this->Fech_Mod,
            "Usr_Mod"=>$this->Usr_Mod,
            "Estatus_Reg"=>$this->Estatus_Reg);
        }
    }
?>