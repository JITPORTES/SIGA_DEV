<?php
 class Siga_activosDTO {
    private $Id_Activo;
    private $AF_BC;
    private $Nombre_Activo;
    private $Id_Tipo_Vale_Resg;
    private $Mant_Prevent;
	private $Id_Area;
    private $Id_Departamento;
    private $Num_Empleado;
    private $Nombre_Completo;
    private $Fech_Inser;
    private $Usr_Inser;
    private $Fech_Mod;
    private $Usr_Mod;
    private $Estatus_Reg;
    private $Foto;
    private $Id_Clase;
	private $Id_Clasificacion;
    private $Id_Propiedad;
    private $Id_Tipo_Activo;
    private $DescCorta;
    private $DescLarga;
    private $Id_Ubic_Prim;
    private $Id_Ubic_Sec;
	private $Id_Situacion_Activo;
    private $Id_Motivo_Alta;
    private $Id_Familia;
    private $Id_Subfamilia;
    private $Marca;
    private $Modelo;
    private $NumSerie;
    private $Id_ActivoPadre;
    private $NumActivoAnterior;
    private $ParticipaPre;
    private $ParticipaSeguros;
    private $ImporteSeguros;
    private $ParticipaCertificacion;
    private $Garantia;
    private $ExtGarantia;
    private $Anexo;
	private $Especifica;
    // Se gragegaron estos tres campos alex arias 25/04/2024
    private $siga_cmb_condicion_recepcion;
    private $siga_activo_alta_fch_recepcion;
    private $siga_activo_alta_fch_operacion;

    // Se gragegaron estos tres campos alex arias 25/04/2024
	private $Depreciacion;
	private $DepreciacionAcumulada;
	private $DepreciacionMixta;
	private $DepreciacionAcumuladaMixta;	
	private $DepreciacionPeriodoFiscal;
	private $DepreciacionFiscal;
	private $DepreciacionPeriodoFiscalD4;
	private $DepreciacionFiscalD4;
	private $DepreciacionPeriodoFiscalB10;
	private $DepreciacionFiscalB10;
	private $Desc_Ubic_Prim;
	private $Desc_Ubic_Sec;
    private $Nom_Usuario_Reponsable;
    
    public function getId_Activo(){
        return $this->Id_Activo;
    }
    public function setId_Activo($Id_Activo){
        $this->Id_Activo=$Id_Activo;
    }
    public function getAF_BC(){
        return $this->AF_BC;
    }
    public function setAF_BC($AF_BC){
        $this->AF_BC=$AF_BC;
    }
    public function getNombre_Activo(){
        return $this->Nombre_Activo;
    }
    public function setNombre_Activo($Nombre_Activo){
        $this->Nombre_Activo=$Nombre_Activo;
    }
    public function getId_Tipo_Vale_Resg(){
        return $this->Id_Tipo_Vale_Resg;
    }
    public function setId_Tipo_Vale_Resg($Id_Tipo_Vale_Resg){
        $this->Id_Tipo_Vale_Resg=$Id_Tipo_Vale_Resg;
    }
	public function getMant_Prevent(){
        return $this->Mant_Prevent;
    }
    public function setMant_Prevent($Mant_Prevent){
        $this->Mant_Prevent=$Mant_Prevent;
    }
    public function getId_Area(){
        return $this->Id_Area;
    }
    public function setId_Area($Id_Area){
        $this->Id_Area=$Id_Area;
    }
    public function getId_Departamento(){
        return $this->Id_Departamento;
    }
    public function setId_Departamento($Id_Departamento){
        $this->Id_Departamento=$Id_Departamento;
    }
    public function getNum_Empleado(){
        return $this->Num_Empleado;
    }
    public function setNum_Empleado($Num_Empleado){
        $this->Num_Empleado=$Num_Empleado;
    }
    public function getNombre_Completo(){
        return $this->Nombre_Completo;
    }
    public function setNombre_Completo($Nombre_Completo){
        $this->Nombre_Completo=$Nombre_Completo;
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
    public function getFoto(){
        return $this->Foto;
    }
    public function setFoto($Foto){
        $this->Foto=$Foto;
    }
    public function getId_Clase(){
        return $this->Id_Clase;
    }
    public function setId_Clase($Id_Clase){
        $this->Id_Clase=$Id_Clase;
    }
	
	public function getId_Clasificacion(){
        return $this->Id_Clasificacion;
    }
    public function setId_Clasificacion($Id_Clasificacion){
        $this->Id_Clasificacion=$Id_Clasificacion;
    }
    public function getId_Propiedad(){
        return $this->Id_Propiedad;
    }
    public function setId_Propiedad($Id_Propiedad){
        $this->Id_Propiedad=$Id_Propiedad;
    }
    public function getId_Tipo_Activo(){
        return $this->Id_Tipo_Activo;
    }
    public function setId_Tipo_Activo($Id_Tipo_Activo){
        $this->Id_Tipo_Activo=$Id_Tipo_Activo;
    }
    public function getDescCorta(){
        return $this->DescCorta;
    }
    public function setDescCorta($DescCorta){
        $this->DescCorta=$DescCorta;
    }
    public function getDescLarga(){
        return $this->DescLarga;
    }
    public function setDescLarga($DescLarga){
        $this->DescLarga=$DescLarga;
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
	
	public function getId_Situacion_Activo(){
        return $this->Id_Situacion_Activo;
    }
    public function setId_Situacion_Activo($Id_Situacion_Activo){
        $this->Id_Situacion_Activo=$Id_Situacion_Activo;
    }
	
    public function getId_Motivo_Alta(){
        return $this->Id_Motivo_Alta;
    }
    public function setId_Motivo_Alta($Id_Motivo_Alta){
        $this->Id_Motivo_Alta=$Id_Motivo_Alta;
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
    public function getNumSerie(){
        return $this->NumSerie;
    }
    public function setNumSerie($NumSerie){
        $this->NumSerie=$NumSerie;
    }
    public function getId_ActivoPadre(){
        return $this->Id_ActivoPadre;
    }
    public function setId_ActivoPadre($Id_ActivoPadre){
        $this->Id_ActivoPadre=$Id_ActivoPadre;
    }
    public function getNumActivoAnterior(){
        return $this->NumActivoAnterior;
    }
    public function setNumActivoAnterior($NumActivoAnterior){
        $this->NumActivoAnterior=$NumActivoAnterior;
    }
    public function getParticipaPre(){
        return $this->ParticipaPre;
    }
    public function setParticipaPre($ParticipaPre){
        $this->ParticipaPre=$ParticipaPre;
    }
    public function getParticipaSeguros(){
        return $this->ParticipaSeguros;
    }
    public function setParticipaSeguros($ParticipaSeguros){
        $this->ParticipaSeguros=$ParticipaSeguros;
    }
    public function getImporteSeguros(){
        return $this->ImporteSeguros;
    }
    public function setImporteSeguros($ImporteSeguros){
        $this->ImporteSeguros=$ImporteSeguros;
    }
    public function getParticipaCertificacion(){
        return $this->ParticipaCertificacion;
    }
    public function setParticipaCertificacion($ParticipaCertificacion){
        $this->ParticipaCertificacion=$ParticipaCertificacion;
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
    public function getAnexo(){
        return $this->Anexo;
    }
    public function setAnexo($Anexo){
        $this->Anexo=$Anexo;
    }
	public function getEspecifica(){
        return $this->Especifica;
    }
    public function setEspecifica($Especifica){
        $this->Especifica=$Especifica;
    }

// Se agregaro estos getter y setter alex arias 25/04/2024
public function getsiga_cmb_condicion_recepcion(){
    return $this->siga_cmb_condicion_recepcion;
}
public function setsiga_cmb_condicion_recepcion($siga_cmb_condicion_recepcion){
    $this->siga_cmb_condicion_recepcion=$siga_cmb_condicion_recepcion;
}


public function getsiga_activo_alta_fch_recepcion(){
    return $this->siga_activo_alta_fch_recepcion;
}
public function setsiga_activo_alta_fch_recepcion($siga_activo_alta_fch_recepcion){
    $this->siga_activo_alta_fch_recepcion=$siga_activo_alta_fch_recepcion;
}

public function getsiga_activo_alta_fch_operacion(){
    return $this->siga_activo_alta_fch_operacion;
}
public function setsiga_activo_alta_fch_operacion($siga_activo_alta_fch_operacion){
    $this->siga_activo_alta_fch_operacion=$siga_activo_alta_fch_operacion;
}
// Se agregaro estos getter y setter alex arias 25/04/2024

	public function getDepreciacion(){
        return $this->Depreciacion;
    }
    public function setDepreciacion($Depreciacion){
        $this->Depreciacion=$Depreciacion;
    }
	public function getDepreciacionAcumulada(){
        return $this->DepreciacionAcumulada;
    }
    public function setDepreciacionAcumulada($DepreciacionAcumulada){
        $this->DepreciacionAcumulada=$DepreciacionAcumulada;
    }
	
	
		public function getDepreciacionMixta(){
        return $this->DepreciacionMixta;
    }
    public function setDepreciacionMixta($DepreciacionMixta){
        $this->DepreciacionMixta=$DepreciacionMixta;
    }
	public function getDepreciacionAcumuladaMixta(){
        return $this->DepreciacionAcumuladaMixta;
    }
    public function setDepreciacionAcumuladaMixta($DepreciacionAcumuladaMixta){
        $this->DepreciacionAcumuladaMixta=$DepreciacionAcumuladaMixta;
    }

	public function getDepreciacionPeriodoFiscal(){
        return $this->DepreciacionPeriodoFiscal;
    }
    public function setDepreciacionPeriodoFiscal($DepreciacionPeriodoFiscal){
        $this->DepreciacionPeriodoFiscal=$DepreciacionPeriodoFiscal;
    }
	public function getDepreciacionFiscal(){
        return $this->DepreciacionFiscal;
    }
    public function setDepreciacionFiscal($DepreciacionFiscal){
        $this->DepreciacionFiscal=$DepreciacionFiscal;
    }
	
	public function getDepreciacionPeriodoFiscalD4(){
        return $this->DepreciacionPeriodoFiscalD4;
    }
    public function setDepreciacionPeriodoFiscalD4($DepreciacionPeriodoFiscalD4){
        $this->DepreciacionPeriodoFiscalD4=$DepreciacionPeriodoFiscalD4;
    }
	public function getDepreciacionFiscalD4(){
        return $this->DepreciacionFiscalD4;
    }
    public function setDepreciacionFiscalD4($DepreciacionFiscalD4){
        $this->DepreciacionFiscalD4=$DepreciacionFiscalD4;
    }
	
		public function getDepreciacionPeriodoFiscalB10(){
        return $this->DepreciacionPeriodoFiscalB10;
    }
    public function setDepreciacionPeriodoFiscalB10($DepreciacionPeriodoFiscalB10){
        $this->DepreciacionPeriodoFiscalB10=$DepreciacionPeriodoFiscalB10;
    }
	public function getDepreciacionFiscalB10(){
        return $this->DepreciacionFiscalB10;
    }
    public function setDepreciacionFiscalB10($DepreciacionFiscalB10){
        $this->DepreciacionFiscalB10=$DepreciacionFiscalB10;
    }
	public function getDesc_Ubic_Prim(){
        return $this->Desc_Ubic_Prim;
    }
    public function setDesc_Ubic_Prim($Desc_Ubic_Prim){
        $this->Desc_Ubic_Prim=$Desc_Ubic_Prim;
    }
	public function getDesc_Ubic_Sec(){
        return $this->Desc_Ubic_Sec;
    }
    public function setDesc_Ubic_Sec($Desc_Ubic_Sec){
        $this->Desc_Ubic_Sec=$Desc_Ubic_Sec;
    }
	
    public function toString(){
        return array("Id_Activo"=>$this->Id_Activo,
"AF_BC"=>$this->AF_BC,
"Nombre_Activo"=>$this->Nombre_Activo,
"Id_Tipo_Vale_Resg"=>$this->Id_Tipo_Vale_Resg,
"Mant_Prevent"=>$this->Mant_Prevent,
"Id_Area"=>$this->Id_Area,
"Id_Departamento"=>$this->Id_Departamento,
"Num_Empleado"=>$this->Num_Empleado,
"Nombre_Completo"=>$this->Nombre_Completo,
"Fech_Inser"=>$this->Fech_Inser,
"Usr_Inser"=>$this->Usr_Inser,
"Fech_Mod"=>$this->Fech_Mod,
"Usr_Mod"=>$this->Usr_Mod,
"Estatus_Reg"=>$this->Estatus_Reg,
"Foto"=>$this->Foto,
"Id_Clase"=>$this->Id_Clase,
"Id_Clasificacion"=>$this->Id_Clasificacion,
"Id_Propiedad"=>$this->Id_Propiedad,
"Id_Tipo_Activo"=>$this->Id_Tipo_Activo,
"DescCorta"=>$this->DescCorta,
"DescLarga"=>$this->DescLarga,
"Id_Ubic_Prim"=>$this->Id_Ubic_Prim,
"Id_Ubic_Sec"=>$this->Id_Ubic_Sec,
"Id_Situacion_Activo"=>$this->Id_Situacion_Activo,
"Id_Motivo_Alta"=>$this->Id_Motivo_Alta,
"Id_Familia"=>$this->Id_Familia,
"Id_Subfamilia"=>$this->Id_Subfamilia,
"Marca"=>$this->Marca,
"Modelo"=>$this->Modelo,
"NumSerie"=>$this->NumSerie,
"Id_ActivoPadre"=>$this->Id_ActivoPadre,
"NumActivoAnterior"=>$this->NumActivoAnterior,
"ParticipaPre"=>$this->ParticipaPre,
"ParticipaSeguros"=>$this->ParticipaSeguros,
"ImporteSeguros"=>$this->ImporteSeguros,
"ParticipaCertificacion"=>$this->ParticipaCertificacion,
"Garantia"=>$this->Garantia,
"ExtGarantia"=>$this->ExtGarantia,
"Anexo"=>$this->Anexo,
"Especifica"=>$this->Especifica,
//se agregaron estas lineas alex arias 25/04/24
"siga_cmb_condicion_recepcion"=>$this->siga_cmb_condicion_recepcion,
"siga_activo_alta_fch_recepcion"=>$this->siga_activo_alta_fch_recepcion,
"siga_activo_alta_fch_operacion"=>$this->siga_activo_alta_fch_operacion,
//se agregaron estas lineas alex arias 25/04/24
"Depreciacion"=>$this->Depreciacion,
"DepreciacionAcumulada"=>$this->DepreciacionAcumulada,
"DepreciacionMixta"=>$this->DepreciacionMixta,
"DepreciacionAcumuladaMixta"=>$this->DepreciacionAcumuladaMixta,
"DepreciacionPeriodoFiscal"=>$this->DepreciacionPeriodoFiscal,
"DepreciacionFiscal"=>$this->DepreciacionFiscal,
"DepreciacionPeriodoFiscalD4"=>$this->DepreciacionPeriodoFiscalD4,
"DepreciacionFiscalD4"=>$this->DepreciacionFiscalD4,
"DepreciacionPeriodoFiscalB10"=>$this->DepreciacionPeriodoFiscalB10,
"DepreciacionFiscalB10"=>$this->DepreciacionFiscalB10,
"Desc_Ubic_Prim"=>$this->Desc_Ubic_Prim,
"Desc_Ubic_Sec"=>$this->Desc_Ubic_Sec
);
    }
}
?>