<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
  function obtenEvaluaciones($Mes,$Anio,$AcumuladoFiltro,$CveAsistencia="",$CveServicio="",$CveRazon="")
 {


 
	   $query_rs = "(
	    select CveCita,(select Descripcion from RazonComentario R where R.CveRazon=C.CveRazon)  as Razon,C.Comentario,C.CveCliente,
		(Select A.Descripcion from Asistencia A where A.CveAsistencia=C.CveAsistencia) as Asistencia,C.CveServicio,C.FechaAlta,
 C.CAS,case when C.Audio=null or C.Audio='' then '' else concat('<audio id=\"audio\" controls=\"\"><source src=\"http://173.255.158.169/pifaudios/',C.Audio,'\" type=\"audio/mp4\"><p>Your user agent does not support the HTML5 Audio element.</p></audio>') end as Audio
		from CitaComentario C where 0=0 ";

	    if ($CveAsistencia != "")
	    $query_rs .= " and C.CveAsistencia=".$CveAsistencia;  
   
		if ($CveServicio != "")
	    $query_rs .= " and C.CveServicio='".$CveServicio."'";  

		if ($CveRazon != "")
	    $query_rs .= " and C.CveRazon='".$CveRazon."'";  	
   
		if ($Acumulado == 0)
		$query_rs .= ' and MONTH(C.FechaAlta)='.$Mes;	
		else
		$query_rs .=  " and MONTH(C.FechaAlta)>= 1 and MONTH(C.FechaAlta)<=".$Mes;	

    	$query_rs .= ' and YEAR(C.FechaAlta)='.$Anio;
		
		$query_rs .= ") Tabla ";
		//echo $query_rs;
		
		
		return $query_rs;
	 
	}
	
	session_start();
	$Mes = $_SESSION["mes"];
	$Anio = $_SESSION["anio"];
	$AcumuladoFiltro = $_SESSION["AcumuladoFiltro"];
	$CveOrigen = $_SESSION["CveOrigenFiltro"];
	$CveAsistencia = "";
	$CveServicio = "";
	$CveRazon = "";

	if (isset($_GET["CveAsistencia"]))
	$CveAsistencia = $_GET["CveAsistencia"];
	if (isset($_GET["CveServicio"]))
	$CveServicio = $_GET["CveServicio"];
	if (isset($_GET["CveRazon"]))
	$CveRazon = $_GET["CveRazon"];


	$query = obtenEvaluaciones($Mes,$Anio,$AcumuladoFiltro,$CveAsistencia,$CveServicio,$CveRazon);

	// DB table to use
	$table = $query;

	// Table's primary key
	$primaryKey = 'CveCita';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes


$columns = array(
	array( 'db' => 'CveCita', 'dt' => 0 ),
	array( 'db' => 'Razon',  'dt' => 1 ),
	array( 'db' => 'Comentario',   'dt' => 2 ),
	array( 'db' => 'CveCliente',     'dt' => 3 ),
	array( 'db' => 'CAS',     'dt' => 4 ),
	array( 'db' => 'Asistencia',     'dt' => 5 ),
	array( 'db' => 'CveServicio',     'dt' => 6 ),
	array( 'db' => 'FechaAlta',     'dt' => 7 ),
	array( 'db' => 'Audio',     'dt' => 8 ),

);

// SQL server connection information

//include('../../../conf/config.php');

$sql_details['host'] = "internal-db.s148218.gridserver.com";
$sql_details['db'] = "db148218_privilegios";
$sql_details['user'] = "db148218";
$sql_details['pass'] = "Mockup2015-";


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.php' );

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);


