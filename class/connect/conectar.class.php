<?php
//include_once(dirname(__FILE__)."/class/utilities.class.php");

class conectar {

    private $servidorGestafSiga;
    private $BDGestafSiga;
    private $usuarioGestafSiga;
    private $contraGestafSiga;
    protected $pdoConexionGestafSiga;

    private $servidorchstcasol;
    private $BDtcadbchs;
    private $usuarioChsTcaSol;
    private $contraChsTcaSol;
    protected $pdoConexionChsTcaSol;

    public function __construct()
    {
        $this->servidorGestafSiga = "chsgestaf";
        $this->BDGestafSiga       = "siga";
        $this->usuarioGestafSiga  = "siga";
        $this->contraGestafSiga   = "Nacho2018";

        $this->servidorchstcasol = "chstcasol";
        $this->BDtcadbchs       = "tcadbchs";
        $this->usuarioChsTcaSol  = "sa";
        $this->contraChsTcaSol   = "Tca$2010";

     }

function ConexionGestafSiga(){
    
  try {
      $this->pdoConexionGestafSiga = new PDO("sqlsrv:server=$this->servidorGestafSiga;
                              Database=$this->BDGestafSiga", 
                              $this->usuarioGestafSiga,
                              $this->contraGestafSiga);
      $this->pdoConexionGestafSiga->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->pdoConexionGestafSiga;
  } catch (Exception $e) {
    //header("Location:/siga/site/components/500.php");
    $e->getMessage();        
  }
}

function ConexionChsTcaSol(){
    
  try {
      $this->pdoConexionChsTcaSol = new PDO("sqlsrv:server=$this->servidorchstcasol;
                              Database=$this->BDtcadbchs", 
                              $this->usuarioChsTcaSol,
                              $this->contraChsTcaSol);
      $this->pdoConexionChsTcaSol->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->pdoConexionChsTcaSol;
  } catch (Exception $e) {

    //header("Location:/siga/site/components/500.php");
    echo$e->getMessage();        
  }
}

}
