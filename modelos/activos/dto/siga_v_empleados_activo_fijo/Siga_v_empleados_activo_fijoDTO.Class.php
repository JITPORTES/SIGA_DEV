<?php
 class Siga_v_empleados_activo_fijoDTO {
    private $id;
    private $num_empleado;
    private $tipo_empleado;
    private $fecha_alta;
    private $nombres;
    private $nombre_completo;
    private $nombre_completo2;
    private $puesto;
    private $departamento;
    private $gerencia;
    private $centro_costo;
    private $foto;
    private $apellidos;
    private $estatus;
    private $nom_estatus;
    private $ext_telefonica;
    private $email;
    private $EMAIL_CFDI;
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getNum_empleado(){
        return $this->num_empleado;
    }
    public function setNum_empleado($num_empleado){
        $this->num_empleado=$num_empleado;
    }
    public function getTipo_empleado(){
        return $this->tipo_empleado;
    }
    public function setTipo_empleado($tipo_empleado){
        $this->tipo_empleado=$tipo_empleado;
    }
    public function getFecha_alta(){
        return $this->fecha_alta;
    }
    public function setFecha_alta($fecha_alta){
        $this->fecha_alta=$fecha_alta;
    }
    public function getNombres(){
        return $this->nombres;
    }
    public function setNombres($nombres){
        $this->nombres=$nombres;
    }
    public function getNombre_completo(){
        return $this->nombre_completo;
    }
    public function setNombre_completo($nombre_completo){
        $this->nombre_completo=$nombre_completo;
    }
    public function getNombre_completo2(){
        return $this->nombre_completo2;
    }
    public function setNombre_completo2($nombre_completo2){
        $this->nombre_completo2=$nombre_completo2;
    }
    public function getPuesto(){
        return $this->puesto;
    }
    public function setPuesto($puesto){
        $this->puesto=$puesto;
    }
    public function getDepartamento(){
        return $this->departamento;
    }
    public function setDepartamento($departamento){
        $this->departamento=$departamento;
    }
    public function getGerencia(){
        return $this->gerencia;
    }
    public function setGerencia($gerencia){
        $this->gerencia=$gerencia;
    }
    public function getCentro_costo(){
        return $this->centro_costo;
    }
    public function setCentro_costo($centro_costo){
        $this->centro_costo=$centro_costo;
    }
    public function getFoto(){
        return $this->foto;
    }
    public function setFoto($foto){
        $this->foto=$foto;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function setApellidos($apellidos){
        $this->apellidos=$apellidos;
    }
    public function getEstatus(){
        return $this->estatus;
    }
    public function setEstatus($estatus){
        $this->estatus=$estatus;
    }
    public function getNom_estatus(){
        return $this->nom_estatus;
    }
    public function setNom_estatus($nom_estatus){
        $this->nom_estatus=$nom_estatus;
    }
    public function getExt_telefonica(){
        return $this->ext_telefonica;
    }
    public function setExt_telefonica($ext_telefonica){
        $this->ext_telefonica=$ext_telefonica;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function getEMAIL_CFDI(){
        return $this->EMAIL_CFDI;
    }
    public function setEMAIL_CFDI($EMAIL_CFDI){
        $this->EMAIL_CFDI=$EMAIL_CFDI;
    }
    public function toString(){
        return array("id"=>$this->id,
"num_empleado"=>$this->num_empleado,
"tipo_empleado"=>$this->tipo_empleado,
"fecha_alta"=>$this->fecha_alta,
"nombres"=>$this->nombres,
"nombre_completo"=>$this->nombre_completo,
"nombre_completo2"=>$this->nombre_completo2,
"puesto"=>$this->puesto,
"departamento"=>$this->departamento,
"gerencia"=>$this->gerencia,
"centro_costo"=>$this->centro_costo,
"foto"=>$this->foto,
"apellidos"=>$this->apellidos,
"estatus"=>$this->estatus,
"nom_estatus"=>$this->nom_estatus,
"ext_telefonica"=>$this->ext_telefonica,
"email"=>$this->email,
"EMAIL_CFDI"=>$this->EMAIL_CFDI);
    }
}
?>