<?php
 class Siga_solicitud_prestamosDTO {
    private $Id_Solicitud;
    private $Id_Activo;
	private $AF_BC_Activo;
	private $Id_Usuario;
    private $Id_Area;
	private $Id_Categoria;
	private $Id_Subcategoria;
    private $Id_Medio;
	private $Desc_Medio;
	private $Seccion;
    private $Titulo;
    private $Id_Det_Actividad;
    private $Desc_Motivo_Reporte;
    private $Prioridad;
    private $Url_archivo;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
	private $Estatus_Proceso;
	private $Id_Estatus_Proceso;
	private $Area;
	private $NombreSeccion;
	private $Categoria;
	private $Subcategoria;
	private $Motivo;
	private $Usuario;
    private $Id_Gestor;
    private $Gestor;
	private $TituloCierre;	
	private $Marca;
	private $Modelo;	
	private $No_Serie;
	private $Ubic_Prim;
	private $Ubic_Sec;
	private $Ubic_Esp;
	private $Accesorios_Cierre;
    private $ComentarioCierre;
    private $Fecha_Prestamo;
    private $Fecha_Devolucion;
	private $ComentarioEntrega;
    private $Fecha_Entrega;
    
	public function getId_Solicitud(){
        return $this->Id_Solicitud;
    }
    public function setId_Solicitud($Id_Solicitud){
        $this->Id_Solicitud=$Id_Solicitud;
    }
	
	public function getId_Activo(){
        return $this->Id_Activo;
    }
    public function setId_Activo($Id_Activo){
        $this->Id_Activo=$Id_Activo;
    }
	
	public function getAF_BC_Activo(){
        return $this->AF_BC_Activo;
    }
    public function setAF_BC_Activo($AF_BC_Activo){
        $this->AF_BC_Activo=$AF_BC_Activo;
    }
	
    public function getId_Usuario(){
        return $this->Id_Usuario;
    }
    public function setId_Usuario($Id_Usuario){
        $this->Id_Usuario=$Id_Usuario;
    }
	
	public function getId_Gestor(){
        return $this->Id_Gestor;
    }
    public function setId_Gestor($Id_Gestor){
        $this->Id_Gestor=$Id_Gestor;
    }
	
	public function getGestor(){
        return $this->Gestor;
    }
    public function setGestor($Gestor){
        $this->Gestor=$Gestor;
    }	
	
    public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
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
    public function getId_Medio(){
        return $this->Id_Medio;
    }
    public function setId_Medio($Id_Medio){
        $this->Id_Medio=$Id_Medio;
    }
	public function getDesc_Medio(){
        return $this->Desc_Medio;
    }
    public function setDesc_Medio($Desc_Medio){
        $this->Desc_Medio=$Desc_Medio;
    }
	public function getSeccion(){
        return $this->Seccion;
    }
    public function setSeccion($Seccion){
        $this->Seccion=$Seccion;
    }
    public function getTitulo(){
        return $this->Titulo;
    }
    public function setTitulo($Titulo){
        $this->Titulo=$Titulo;
    }
    public function getId_Det_Actividad(){
        return $this->Id_Det_Actividad;
    }
    public function setId_Det_Actividad($Id_Det_Actividad){
        $this->Id_Det_Actividad=$Id_Det_Actividad;
    }
    public function getDesc_Motivo_Reporte(){
        return $this->Desc_Motivo_Reporte;
    }
    public function setDesc_Motivo_Reporte($Desc_Motivo_Reporte){
        $this->Desc_Motivo_Reporte=$Desc_Motivo_Reporte;
    }
    public function getPrioridad(){
        return $this->Prioridad;
    }
    public function setPrioridad($Prioridad){
        $this->Prioridad=$Prioridad;
    }
    public function getUrl_archivo(){
        return $this->Url_archivo;
    }
    public function setUrl_archivo($Url_archivo){
        $this->Url_archivo=$Url_archivo;
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

    public function getEstatus_Proceso(){
        return $this->Estatus_Proceso;
    }
    public function setEstatus_Proceso($Estatus_Proceso){
        $this->Estatus_Proceso=$Estatus_Proceso;
    }
	
	public function getId_Estatus_Proceso(){
        return $this->Id_Estatus_Proceso;
    }
    public function setId_Estatus_Proceso($Id_Estatus_Proceso){
        $this->Id_Estatus_Proceso=$Id_Estatus_Proceso;
    }

	public function getArea(){
        return $this->Area;
    }
    public function setArea($Area){
        $this->Area=$Area;
    }

	public function getNombreSeccion(){
        return $this->NombreSeccion;
    }
    public function setNombreSeccion($NombreSeccion){
        $this->NombreSeccion=$NombreSeccion;
    }

	public function getCategoria(){
        return $this->Categoria;
    }
    public function setCategoria($Categoria){
        $this->Categoria=$Categoria;
    }
	
	public function getUsuario(){
        return $this->Usuario;
    }
    public function setUsuario($Usuario){
        $this->Usuario=$Usuario;
    }
	
	public function getSubcategoria(){
        return $this->Subcategoria;
    }
    public function setSubcategoria($Subcategoria){
        $this->Subcategoria=$Subcategoria;
    }
	
	public function getMotivo(){
        return $this->Motivo;
    }
    public function setMotivo($Motivo){
        $this->Motivo=$Motivo;
    }

	public function getTituloCierre(){
        return $this->TituloCierre;
    }
    public function setTituloCierre($TituloCierre){
        $this->TituloCierre=$TituloCierre;
    }
	
	public function getComentarioCierre(){
        return $this->ComentarioCierre;
    }
    public function setComentarioCierre($ComentarioCierre){
        $this->ComentarioCierre=$ComentarioCierre;
    }
	
	///////////////////
	public function getMarca(){
        return $this->Marca;
    }
    public function setMarca($Marca){
        $this->Marca=$Marca;
    }

	public function getModelo(){
        return $this->Modelo;
    }
    public function setModelo($Modelo){
        $this->Modelo=$Modelo;
    }
	
	public function getNo_Serie(){
        return $this->No_Serie;
    }
    public function setNo_Serie($No_Serie){
        $this->No_Serie=$No_Serie;
    }
	
	public function getUbic_Prim(){
        return $this->Ubic_Prim;
    }
    public function setUbic_Prim($Ubic_Prim){
        $this->Ubic_Prim=$Ubic_Prim;
    }
	
	public function getUbic_Sec(){
        return $this->Ubic_Sec;
    }
    public function setUbic_Sec($Ubic_Sec){
        $this->Ubic_Sec=$Ubic_Sec;
    }
	
	public function getUbic_Esp(){
        return $this->Ubic_Esp;
    }
    public function setUbic_Esp($Ubic_Esp){
        $this->Ubic_Esp=$Ubic_Esp;
    }
	
    public function getAccesorios_Cierre(){
        return $this->Accesorios_Cierre;
    }
    public function setAccesorios_Cierre($Accesorios_Cierre){
        $this->Accesorios_Cierre=$Accesorios_Cierre;
    }

    public function getFecha_Prestamo(){
        return $this->Fecha_Prestamo;
    }
    public function setFecha_Prestamo($Fecha_Prestamo){
        $this->Fecha_Prestamo=$Fecha_Prestamo;
    }
    public function getFecha_Devolucion(){
        return $this->Fecha_Devolucion;
    }
    public function setFecha_Devolucion($Fecha_Devolucion){
        $this->Fecha_Devolucion=$Fecha_Devolucion;
    }	
	
	public function getComentarioEntrega(){
        return $this->ComentarioEntrega;
    }
    public function setComentarioEntrega($ComentarioEntrega){
        $this->ComentarioEntrega=$ComentarioEntrega;
    }

    public function getFecha_Entrega(){
        return $this->Fecha_Entrega;
    }
    public function setFecha_Entrega($Fecha_Entrega){
        $this->Fecha_Entrega=$Fecha_Entrega;
    }		
	
    public function toString(){
        return array("Id_Solicitud"=>$this->Id_Solicitud,
"Id_Activo"=>$this->Id_Activo,
"AF_BC_Activo"=>$this->AF_BC_Activo,
"Id_Usuario"=>$this->Id_Usuario,
"Id_Area"=>$this->Id_Area,
"Id_Medio"=>$this->Id_Medio,
"Desc_Medio"=>$this->Desc_Medio,
"Seccion"=>$this->Seccion,
"Titulo"=>$this->Titulo,
"Id_Det_Actividad"=>$this->Id_Det_Actividad,
"Desc_Motivo_Reporte"=>$this->Desc_Motivo_Reporte,
"Prioridad"=>$this->Prioridad,
"Url_archivo"=>$this->Url_archivo,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg,"Estatus_Proceso"=>$this->Estatus_Proceso,
"Id_Estatus_Proceso"=>$this->Id_Estatus_Proceso,
"Area"=>$this->Area,"NombreSeccion"=>$this->NombreSeccion,
"Id_Categoria"=>$this->Id_Categoria,"Id_Subcategoria"=>$this->Id_Subcategoria,
"Categoria"=>$this->Categoria,"Subcategoria"=>$this->Subcategoria,"Motivo"=>$this->Motivo
,"Usuario"=>$this->Usuario,"Id_Gestor"=>$this->Id_Gestor,"Gestor"=>$this->Gestor
,"ComentarioCierre"=>$this->ComentarioCierre,
"TituloCierre"=>$this->TituloCierre,
"Marca"=>$this->Marca,
"Modelo"=>$this->Modelo, 
"No_Serie"=>$this->No_Serie,
"Ubic_Prim"=>$this->Ubic_Prim,
"Ubic_Sec"=>$this->Ubic_Sec, 
"Ubic_Esp"=>$this->Ubic_Esp,
"Accesorios_Cierre"=>$this->Accesorios_Cierre,
"Fecha_Prestamo"=>$this->Fecha_Prestamo,
"Fecha_Devolucion"=>$this->Fecha_Devolucion,
"ComentarioEntrega"=>$this->ComentarioEntrega,
"Fecha_Entrega"=>$this->Fecha_Entrega
);
    }
}
?>