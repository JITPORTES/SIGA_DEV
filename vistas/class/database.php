<?php 
class Database 
{
    

	public function connect() 
	{
		
		$xml_file = file_get_contents(dirname(__FILE__)."/../../datos/connect/Configuracion.xml") or die("Error: Cannot create object");
		$xml = simplexml_load_string($xml_file);	
		//print_r($xml);
		
		$db_host		= $xml->SQLSERVER->ACTIVOS->host."";
		$db_user		= $xml->SQLSERVER->ACTIVOS->user."";
		$db_pass		= $xml->SQLSERVER->ACTIVOS->password."";
		$db_database	= $xml->SQLSERVER->ACTIVOS->db."";
		$db_port 		= 9000;
		
		$connectionInfo = array("UID" => $db_user, "PWD" => $db_pass, "Database"=>$db_database,"CharacterSet"  => 'UTF-8');
		$db_connect 	= sqlsrv_connect($db_host, $connectionInfo);	
		
		if( $db_connect === false )
		{
			 echo "Connection could not be established.\n";
			 echo "<pre>";
			 die( print_r( sqlsrv_errors(), true));
		     echo "</pre>";		
		}		
			return $db_connect;
	}
	
	public function disconnect($db_connect) 
	{
	  sqlsrv_close ($db_connect);
	}
	
}


